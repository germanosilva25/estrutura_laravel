<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\OAuth2\Client\Provider\Google;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function createPaciente(Request $request)
    {
        $state = json_decode($request->state);
        $state = $request->state;
        // print_r($state);
        $ownerDetails = '';
        $token = [];
        $usuario = '';
        $email = '';
        $email_verified = '';
        $id = '';
        $user = [];
        $tem = '';

        if (Auth::user()){

            return 'kmklmlk mlm';
        }
        else{
            $google = new Google([
                'clientId'     => '751074459699-eamj9dgltibr9fqnbfk9qg8c2g886feo.apps.googleusercontent.com',
                // 'clientSecret' => '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',
                'clientSecret' => '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',
                'redirectUri'  => 'https://clinica.agathonpsicologia.com.br/bot',
                // 'hostedDomain' => 'example.com', // optional; used to restrict access to users on your G Suite/Google Apps for Business accounts
            ]);
            $url = $google->getAuthorizationUrl();
            $mensagem = 'Não logado';

            // print_r($state->code);exit;
        
            if ($state) {

                
                // $usuario = 'dentro';
                // Try to get an access token (using the authorization code grant)
                $token = $google->getAccessToken('authorization_code', [
                    'code' => $state
                ]);

                try {

                    // We got an access token, let's now get the owner details
                    $ownerDetails = $google->getResourceOwner($token);
                    $usuario = $ownerDetails->getName();
                    $email = $ownerDetails->getEmail();
                    $id = $ownerDetails->getId();
                    // $email_verified = $ownerDetails->getEmailVerified();
                    // Use these details to create a new profile
                    // printf('Hello %s!', $ownerDetails->getFirstName());

                    $user = User::where('email', $email)->get()->toArray();
                    // print_r($user);exit;

                    if(count($user)){
                        $user = User::find(intval($user[0]['id']));
                        // $user = User::where('id_google', $id)->get();
                        // $user = User::where('email', $email)->get();
                        $tem = 'tem';
                        // $user = User::find($email);
                        Auth::login($user, true);
                        return redirect()->action([PacienteController::class, 'pagamentoConsulta']);
                    } else {
                        return view('auth.login-paciente', array('url' => $url));
                        $newUser = new User();
                        $newUser->name = $usuario;
                        $newUser->email = $email;
                        $newUser->id_grupo = 3;
                        $newUser->password = Hash::make('sjkcnsbHBHJBJbjblkjhwdb34o3r478389hedjkbdaskx');
                        // $newUser->password = ;

                        $newUser->save();

                        $newPaciente = new Paciente();
                        $newPaciente->id_user       = $newUser->id;
                        $newPaciente->id_google = $id;
                        $newPaciente->email_google = $email;
                        $newPaciente->save();

                        $user = User::find($newUser->id);
                        Auth::login($user, true);
                        return response()->json([
                            'msg' => 'Logado', 
                            'logado' => true,
                            'nome_paciente' => $newUser->name,
                            'id' => $id
                        ]);
                    }
            
                } catch (Exception $e) {
            
                    return view('auth.login-paciente', array('url' => $url));
            
                }
            
            }

        }
        

        return response()->json([
            'msg' => $mensagem,
            'url' => $url,
            // 'token' => $token,
            'owner' => $usuario,
            'arr' => $ownerDetails,
            'email' => $email,
            'id' => $id,
            'tem user' => $tem
            // 'email_verified' => $email_verified
        ]);







        if (Auth::user() && Auth::user()->id_grupo == 2){
            return redirect()->action([PacienteController::class, 'pagamentoConsulta']);
        }
        $google = new Google([
            'clientId'     => '751074459699-eamj9dgltibr9fqnbfk9qg8c2g886feo.apps.googleusercontent.com',
            // 'clientSecret' => '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',
            'clientSecret' => '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',
            'redirectUri'  => 'https://clinica.agathonpsicologia.com.br/pagamento-consulta',
            // 'hostedDomain' => 'example.com', // optional; used to restrict access to users on your G Suite/Google Apps for Business accounts
        ]);
        $url = $google->getAuthorizationUrl();
        return view('auth.login-paciente', array('url' => $url));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
