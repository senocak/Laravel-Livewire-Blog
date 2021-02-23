<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component{

    use AuthenticatesUsers;

    public $email;
    public $password;

    public function submit(){
        $this->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $attempt = Auth::attempt([
            "email" => $this->email,
            "password" => $this->password
        ]);
        if ($attempt)
            return redirect()->route('admin.anasayfa');
        return redirect()->intended('login');
    }

    public function mount(){
        if (Auth::check())
            return redirect("/admin/anasayfa");
    }

    public function render(){
        return view('livewire.login');
    }
}
