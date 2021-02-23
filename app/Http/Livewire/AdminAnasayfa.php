<?php

namespace App\Http\Livewire;

use App\User;
use Auth;
use Livewire\Component;

class AdminAnasayfa extends Component{

    public $notifications;

    public function oku($id){
        $this->notifications->where('id', $id)->markAsRead();
    }

    public function getNotifications(){
        $user = Auth::user() != null ? Auth::user() : User::findOrFail(1);
        $this->notifications = $user->unreadNotifications;
    }

    public function render(){
        $this->getNotifications();
        return view('livewire.admin.anasayfa', [
           "notifications" => $this->notifications
        ]);
    }
}
