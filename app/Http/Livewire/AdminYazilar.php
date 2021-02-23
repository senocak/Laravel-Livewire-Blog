<?php

namespace App\Http\Livewire;

use App\Kategori;
use App\Yazi;
use Livewire\Component;
use Livewire\WithPagination;

class AdminYazilar extends Component{

    use WithPagination;

    protected $yazilar;
    public $limit = 10;
    public $ara = null;
    public $kategori_id = null;

    public function sirala($data){
        $data = explode("&", $data);
        for ($i = 0; $i < count($data); $i++){
            $item = explode("=", $data[$i]);
            $post = Yazi::whereId($item[1])->firstOrFail();
            $post->sira=($i);
            $post->save();
        }
        session()->flash('message', 'Yazı Sıralandı');
    }

    public function sil($id){
        $yazi = Yazi::findOrFail($id);
        $yazi->delete();
        session()->flash('message', 'Yazı Silindi');

        $this->yazilar = $this->yazilar = Yazi::with('yorum')->with("kategori")->orderBy("sira","asc")->paginate($this->limit);
    }

    public function render(){
        if ($this->ara == null)
            if ($this->kategori_id == null)
                $this->yazilar = Yazi::with('yorum')->with("kategori")->orderBy("sira","asc")->paginate($this->limit);
            else
                $this->yazilar = Yazi::where("kategori_id", $this->kategori_id)->with('yorum')->with("kategori")->orderBy("sira","asc")->paginate($this->limit);
        else
            if ($this->kategori_id == null)
                $this->yazilar = Yazi::where('baslik', 'LIKE', '%'.$this->ara.'%')->with('yorum')->with("kategori")->orderBy("sira","asc")->paginate($this->limit);
            else
                $this->yazilar = Yazi::where("kategori_id", $this->kategori_id)->where('baslik', 'LIKE', '%'.$this->ara.'%')->with('yorum')->with("kategori")->orderBy("sira","asc")->paginate($this->limit);
        return view('livewire.admin.yazilar', [
            "yazilar" => $this->yazilar,
            "kategoriler" => Kategori::all()
        ]);
    }
}
