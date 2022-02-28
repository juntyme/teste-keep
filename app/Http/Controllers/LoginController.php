<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('web.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastro()
    {
        return view('web.cadastro');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginAcessar(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.home');
        }

        return back()->withError('As credenciais fornecidas não correspondem aos nossos registros.');
    }

    /**
     * Salvar Usuario
     *
     * @return int
     */
    private function salvarUsuario($request)
    {

        $new_user = new User();
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->password = Hash::make($request->password);
        $new_user->remember_token = Hash::make(md5(time() . rand(0, 9999) . time()));
        $new_user->save();

        return $new_user->id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastroNovo(Request $request)
    {
        $cadastro = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($cadastro) {

            $verific_email = User::where('email', $request->email)->first();

            if (isset($verific_email)) return back()->withError('E-mail já cadastrado em nosso sistema favor fazer login.');

            $user_id = $this->salvarUsuario($request);

            if (Auth::loginUsingId($user_id)) {
                $request->session()->regenerate();
                return redirect()->route('admin.home');
            }
        }

        return back()->withError('Houve um ao verificar suas informações tente novamente.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
