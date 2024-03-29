<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/formations';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:1'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'study_level' => ['required', 'string'],
            'high_graduation' => ['required', 'string'],
            'graduation' => ['nullable'],
            'field' => ['required', 'exists:fields,id']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role_client = Role::where('code', 'client')->first();

        // Vérifier si un fichier de diplôme a été soumis
        if(isset($data['graduation'])) {
            // Enregistrer le fichier sur le serveur
            $file = $data['graduation'];
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/graduation', $fileName); // Enregistrer le fichier dans le dossier "graduation"
        } else {
            // Si aucun fichier de diplôme n'a été soumis, attribuer une valeur null au nom du fichier
            $fileName = null;
        }

        $field = Field::find($data['field']);

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'field' => $field->title,
            'sex' => $data['sex'],
            'graduation_file' => $fileName, // Utiliser le nom du fichier enregistré ou null
            'status' => false,
            'role_id' => $role_client->id,
            'high_graduation' => $data['high_graduation'],
            'study_level' => $data['study_level']
        ]);
    }

}
