<?php

namespace App\Http\Livewire;

use App\Kategori;
use App\Yazi;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminYaziEkle extends Component
{
    public $baslik;
    public $icerik;
    public $kategori_id;
    public $aktif;


    public function submit(){
        $this->validate([
            'baslik' => 'required|max:255',
            'icerik' => 'required',
            'kategori_id' => 'required',
        ]);

        $yazi = new Yazi;
        $yazi->baslik = $this->baslik;
        $yazi->icerik = $this->icerik;
        $yazi->kategori_id = $this->kategori_id;
        $yazi->aktif = $this->aktif ? "1" : "0";
        $yazi->url = Str::slug($this->baslik);
        $yazi->save();
        session()->flash('message', 'Yazı Eklendi');
        return redirect()->route('admin.anasayfa');
    }

    public function render()
    {
        return view('livewire.admin.yazi-ekle',[
            "kategoriler" => Kategori::pluck('baslik', 'id')
        ]);
    }
}
