<?php

namespace App\Http\Livewire;

use App\Yazi;
use Livewire\Component;
use Livewire\WithPagination;

class Yazilar extends Component{

    use WithPagination;

    public $limit = 12;
    protected $yazilar;

    public function render(){
        $this->yazilar = $this->yazilar == null
            ? Yazi::whereAktif(1)->with('kategori')->with(["yorum" => function($q){ $q->where('yorums.onay', '=', 1); }])->orderBy("sira","asc")->paginate($this->limit)
            : $this->yazilar;
        return view('livewire.yazilar', [
            "yazilar" => $this->yazilar
        ]);
    }
}
