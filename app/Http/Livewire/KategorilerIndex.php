<?php

namespace App\Http\Livewire;

use App\Kategori;
use App\Yazi;
use Livewire\Component;
use Livewire\WithPagination;

class KategorilerIndex extends Component{

    use WithPagination;

    public $limit = 12;
    public $kategori_id;
    protected $yazilar;

    public function mount($url){
        $this->kategori_id = Kategori::whereUrl($url)->first()["id"];
    }

    public function render(){
        $this->yazilar = Yazi::whereAktif(1)->with("kategori")->where("kategori_id", $this->kategori_id)->with(["yorum" => function($q){ $q->where('yorums.onay', '=', 1); }])->orderBy("sira","asc")->paginate($this->limit);
        return view('livewire.yazilar', [
            "yazilar" => $this->yazilar
        ]);
    }
    // New blade @livewire('yazilar', ['yazilar' => $yazilar])
}
