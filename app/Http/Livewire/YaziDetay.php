<?php

namespace App\Http\Livewire;

use App\Notifications\YeniYorum;
use App\User;
use App\Yazi;
use App\Yorum;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Auth;

class YaziDetay extends Component
{
    public $yazi;
    public $email;
    public $yorum;

    public function mount($url){
        $yazi = Yazi::whereUrl($url)->whereAktif(1)->with('kategori')->with(["yorum" => function($q){ $q->where('yorums.onay', '=', 1); }])->orderBy("sira","asc")->first();
        if (!$yazi){
            Session::flash('hata', 'Aradığınız sayfa bulunamadı.');
            $yazi = Yazi::whereAktif(1)->with('kategori')->with(["yorum" => function($q){ $q->where('yorums.onay', '=', 1); }])->orderBy("sira","asc")->first();
        }
        $this->yazi = $yazi;
    }

    public function yorumEkle($id){
        $this->validate([
            "email"=>"required|email|min:10",
            "yorum"=>"required|min:10|max:255"
        ]);
        $yorum = new Yorum;
        $yorum->email = $this->email;
        $yorum->yorum = $this->yorum;
        $yorum->yazi_id = $id;
        $yorum->save();
        $user = Auth::user() != null ? Auth::user() : User::findOrFail(1);
        $user->notify(new YeniYorum($this->email, $this->yorum, ($this->yazi)->baslik));
        Session::flash('basarı', 'Yorumunuz Onaylandıktan Sonra Yayınlanacak.');
        $this->yorumlar = Yorum::where("yazi_id", 16)->where("onay", 1)->get();
    }

    public function render(){
        return view('livewire.yazi', [
            "yazi" => $this->yazi,
            "yorumlar" => Yorum::where("yazi_id", $this->yazi->id)->where("onay", 1)->get()
        ]);
    }
}
