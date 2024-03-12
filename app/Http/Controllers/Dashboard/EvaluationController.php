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

    public function submitExam($id, Request $request)
    {
        #return $request->userResponses[3];
        // Valider les données de la requête
        $request->validate([
            'examId' => 'required|exists:formation_exams,id',
            'userResponses' => 'required|array',
            'userResponses.*' => 'array',
            'userResponses.*.*' => 'exists:question_options,id',
        ]);
        $enrolment = Enrolment::findOrFail($id);
        // Récupérer l'examen
        $exam = FormationExam::findOrFail($request->examId);
        // Calculer le score de l'utilisateur et les réponses correctes
        $totalScore = 0;
        $correctAnswers = [];
        foreach ($exam->questions as $question) {
            foreach ($question->answers as $answer) {
                // Vérifier si la réponse de l'utilisateur est correcte
                $userResponse = $request->userResponses[$question->id] ?? [];
                #return $userResponse;
                $isCorrect = in_array($answer->id, $userResponse);
                // Si la réponse est correcte, ajouter les points de la question au score total
                if ($isCorrect && $answer->is_correct) {
                    $totalScore += $question->point;
                    $correctAnswers[$question->id][] = $answer->id;
                }
            }
            return $correctAnswers;
        }

        // Créer une évaluation pour l'utilisateur
        $evaluation = Evaluation::create([
            'enrolment_id' => $enrolment->id,
            'score' => $totalScore,
            'status' => true,
            'pass' => $totalScore >= $exam->accepted_score
        ]);

        // Enregistrer les réponses de l'utilisateur pour cette évaluation
        foreach ($request->userResponses as $questionId => $response) {
            foreach ($response as $answerId) {
                EvaluationAnswer::create([
                    'evaluation_id' => $evaluation->id,
                    'exam_question_id' => $questionId,
                    'question_option_id' => $answerId,
                    'status' => true
                ]);
            }
        }

        // Déterminer si l'utilisateur a réussi l'examen
        $passingGrade = $exam->accepted_score;
        $pass = $totalScore >= $passingGrade;

        // Retourner une réponse JSON avec le résultat de l'évaluation
        return response()->json([
            'pass' => $pass,
            'totalScore' => $totalScore,
            'correctAnswers' => $correctAnswers,
            'evaluationId' => $evaluation->id,
        ]);
    }
}
