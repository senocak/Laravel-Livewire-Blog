<?php

namespace App\Http\Livewire;

use App\Yorum;
use Livewire\Component;
use Livewire\WithPagination;

class AdminYorumlar extends Component{
    use WithPagination;

    protected $yorumlar;
    public $limit = 10;
    public $ara;

    public function gizle($id){
        $yorum = Yorum::findOrFail($id);
        $yorum->onay = $yorum->onay == 1 ? 0 : 1;
        $yorum->save();
        session()->flash('message', 'Yorum Güncellendi');
        $this->getYorum();
    }

    public function getYorum(){
        if ($this->ara == null)
            $this->yorumlar = Yorum::with("yazi")->orderBy("onay","asc")->paginate($this->limit);
        else
            $this->yorumlar = Yorum::where('email', 'LIKE', '%'.$this->ara.'%')->orWhere('yorum', 'LIKE', '%'.$this->ara.'%')->orderBy("onay","asc")->with("yazi")->paginate($this->limit);
    }

    public function render(){
        $this->getYorum();
        return view('livewire.admin.yorumlar',[
            "yorumlar" => $this->yorumlar
        ]);
    }
}
