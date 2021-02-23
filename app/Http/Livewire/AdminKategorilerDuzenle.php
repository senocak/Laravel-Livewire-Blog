<?php

namespace App\Http\Livewire;

use App\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminKategorilerDuzenle extends Component{
    use WithFileUploads;

    public $url;
    public $baslik;
    public $image;
    public $imageYeni;

    public function mount($url){
        $this->url = $url;
        $kategori = Kategori::whereUrl($url)->first();
        $this->baslik = $kategori->baslik;
        $this->image = $kategori->resim;
    }

    public function submit(){
        $this->validate([
            'baslik' => 'required|max:25',
        ]);
        $kategori = Kategori::whereUrl($this->url)->first();
        $kategori->baslik = $this->baslik;
        $url = Str::slug($this->baslik);
        $kategori->url = $url;
        if ($this->imageYeni){
            $image_name = $url."_".rand(1111, 9999).".png";
            Storage::disk('kategoriler')->delete($this->image);
            $this->imageYeni->storeAs('kategoriler', $image_name);
            $kategori->resim = $image_name;
        }
        $kategori->save();
        session()->flash('message', 'Kategori Güncellendi');
        return redirect()->route('admin.kategoriler');
    }

    public function render(){
        return view('livewire.admin.kategoriler-duzenle');
    }
}
