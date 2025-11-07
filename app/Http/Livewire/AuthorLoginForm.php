<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorLoginForm extends Component
{
    public $login_id, $password;
    public $returnUrl;
    public function mount()
    {
        $this->returnUrl = request()->returnUrl;
    }

    public function  LoginHandler()
    {
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($fieldType == 'email') {
            $this->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5',
            ], [
                'login_id' => 'Email ou nome de usuário é obrigatório.',
                'login_id.email' => 'Endereço de e-mail inválido.',
                'login_id.exists' => 'E-mail não registrado.',
                'password.required' => 'Senha é obrigatória.',
            ]);
        } else {
            $this->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:5',
            ], [
                'login_id.required' => 'Email ou nome de usuário é obrigatório.',
                'login_id.exists' => 'Usuário não encontrado.',
                'password.required' => 'Senha é obrigatória.',
            ]);
        }

        $creds = array($fieldType => $this->login_id, 'password' => $this->password);

        if (Auth::guard('web')->attempt($creds)) {
            $checkUser = User::where($fieldType, $this->login_id)->first();
            if ($checkUser->blocked == 1) {
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail', 'Sua conta está bloqueada.');
            } else {
                if ($this->returnUrl != null) {
                    return redirect()->to($this->returnUrl);
                } else {
                    return redirect()->route('author.home');
                }
            }
        } else {
            session()->flash('fail', 'E-mail/Usuário ou senha incorreto.');
        }
    }
    public function render()
    {
        return view('livewire.author-login-form');
    }
}
