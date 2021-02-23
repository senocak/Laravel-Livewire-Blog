<?php

namespace App\Http\Livewire;

use App\Kategori;
use App\Yazi;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminYaziDuzenle extends Component
{
    public $url;
    public $baslik;
    public $icerik;
    public $kategori_id;
    public $aktif;

    public function mount($url){
        $this->url = $url;
        $yazi = Yazi::whereUrl($url)->first();
        $this->baslik = $yazi->baslik;
        $this->icerik = $yazi->icerik;
        $this->kategori_id = $yazi->kategori_id;
        $this->aktif = $yazi->aktif;
    }

    public function submit(){
        $this->validate([
            'baslik' => 'required|max:255',
            'icerik' => 'required',
            'kategori_id' => 'required',
        ]);

        $yazi = Yazi::whereUrl($this->url)->firstOrFail();
        $yazi->baslik = $this->baslik;
        $yazi->icerik = $this->icerik;
        $yazi->kategori_id = $this->kategori_id;
        $yazi->aktif = $this->aktif ? "1" : "0";
        $yazi->url = Str::slug($this->baslik);
        $yazi->save();
        session()->flash('message', 'Yazı Güncellendi');
        return redirect()->route('admin.yazilar');
    }

    public function render(){
        return view('livewire.admin.yazi-duzenle', [
            "kategoriler" => Kategori::pluck('baslik', 'id')
        ]);
    }
}
