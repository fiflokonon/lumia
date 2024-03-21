<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Enrolment;
use App\Models\Evaluation;
use App\Models\EvaluationAnswer;
use App\Models\Formation;
use App\Models\FormationExam;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function evaluation($id)
    {
        $enrolment = Enrolment::findOrFail($id);
        $formation = $enrolment->formation;
        $exam = $formation->exams->first();
        return view('pages.dashboard.formations.evaluation', ['exam' => $exam, 'enrolment' => $enrolment]);
    }

    public function submit_exam($id, Request $request)
    {
        $request->validate([
            'examId' => 'required|exists:formation_exams,id',
            'userResponses' => 'required|array',
            'userResponses.*' => 'array',
            'userResponses.*.*' => 'exists:question_options,id',
        ]);

        $enrolment = Enrolment::findOrFail($id);
        $exam = FormationExam::findOrFail($request->examId);

        $totalScore = 0;
        $correctAnswers = [];

        foreach ($exam->questions as $question) {
            $correctResponseCount = 0;
            $pointsPerCorrectResponse = $question->points / $question->answers->where('is_correct', true)->count();

            foreach ($question->answers as $answer) {
                $userResponse = $request->userResponses[$question->id] ?? [];
                $isCorrect = in_array($answer->id, $userResponse);

                if ($isCorrect && $answer->is_correct) {
                    $totalScore += $pointsPerCorrectResponse;
                    $correctAnswers[$question->id][] = $answer->id;
                    $correctResponseCount++;
                }
            }
        }

        // Score minimum de zéro
        $totalScore = max(0, $totalScore);

        $evaluation = Evaluation::create([
            'enrolment_id' => $enrolment->id,
            'score' => $totalScore,
            'status' => true,
            'pass' => $totalScore >= $exam->accepted_score
        ]);

        foreach ($request->userResponses as $questionId => $response) {
            foreach ($response as $answerId) {
                EvaluationAnswer::create([
                    'evaluation_id' => $evaluation->id,
                    'exam_question_id' => $questionId,
                    'question_option_id' => $answerId,
                ]);
            }
        }

        $passingGrade = $exam->accepted_score;
        $pass = $totalScore >= $passingGrade;

        return response()->json([
            'pass' => $pass,
            'totalScore' => $totalScore,
            'correctAnswers' => $correctAnswers,
            'evaluationId' => $evaluation->id,
        ]);
    }

}
