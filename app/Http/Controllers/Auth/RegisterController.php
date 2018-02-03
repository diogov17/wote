<?php

namespace App\Http\Controllers\Auth;

use App\Http\Utilizador;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'nomeUser' => 'required|string|max:255',
            'nomeArtistico' => 'required|string|max:255',
            'emailUser' => 'required|string|email|max:255|unique:users',
            'telemovelContactos' => 'required|string|max:255',
            'concelhos' => 'required|digits_between:1,1000',
            'tiposEspetaculos' => 'required|digits_between:1,1000',
            'idQuestao' => 'required|string',
            'verificacaoRegisto' => 'required|string',
            'tipoConta' => 'required|integer| Rule::in(["1", "2", "3"]),',
        ],
        $messages = [
           'nomeUser.required' => 'Deverá disponibilizar o seu nome',
           'nomeArtistico.required' => 'Preencha o seu nome artístico',
           'telemovelContactos.required' => 'Preencha o telemóvel de contacto',
           'emailUser.required' => 'Email inválido',
           'emailUser.unique' => 'Email já registado na plataforma',
           'concelhos.required' => 'Concelho não preenchido',
           'verificacaoRegisto.required' => 'Falha na verificação de segurança.',
           'tiposEspetaculos.required' => 'Seleccione a sua principal área profissional de atuação.',
           'tipoConta' => 'Funcionalidade indisponível. Tente mais tarde. Obrigado!'
        ]

    );

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $utilizador = Utilizador::create([
            'name' => $data['nomeUser'],
            
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $idUtilizador = $utilizador->id;
        $novoTipoConta = $data['tipoConta'];

        if($novoTipoConta == 1 || $novoTipoConta == 2 || $novoTipoConta == 3)
        

        return $utilizador;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        
        $this->validator($request->all())->validate();

        $this->guard()->login($this->create($request->all()));

        return redirect($this->redirectPath());
    }


}