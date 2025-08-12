<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorChangePasswordForm extends Component
{
    public $current_password, $new_password, $confirm_new_password;

    public function ChangePassword()
    {
        $this->validate([
            'current_password' => [
                'required',
                function ($attributes, $value, $fail) {
                    if (!Hash::check($value, User::find(auth('web')->id())->password)) {
                        return $fail(__('Senha informada está incorreta'));
                    }
                },
            ],
            'new_password' => 'required|min:5|max:25',
            'confirm_new_password' => 'same:new_password',
        ], [
            'current_password.required' => 'Insira sua senha atual',
            'new_password.required' => 'Insira uma nova senha',
            'confirm_new_password.same' => 'A senha de confirmação deve ser igual à nova senha',
        ]);

        $query = User::find(auth('web')->id())->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($query) {
            session()->flash('success', 'Sua senha foi alterada com sucesso');
            $this->current_password = $this->new_password = $this->confirm_new_password = null;
        } else {
            session()->flash('error', 'Algo deu errado');
        }
    }

    public function showToast($message, $type)
    {
        return $this->dispatchBrowserEvent('showToast', [
            'tupe' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.author-change-password-form');
    }
}
