<?php

namespace App\Http\Livewire;

use App\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminKategoriler extends Component{
    use WithFileUploads;

    protected $kategoriler;
    public $ara = null;
    public $baslik;
    public $image;

    public function sirala($data){
        $data = explode("&", $data);
        for ($i = 0; $i < count($data); $i++){
            $item = explode("=", $data[$i]);
            $post = Kategori::whereId($item[1])->firstOrFail();
            $post->sira=($i);
            $post->save();
        }
        session()->flash('message', 'Yazı Sıralandı');
    }

    public function sil($id){
        $kategori = Kategori::findOrFail($id);
        Storage::disk('kategoriler')->delete($kategori->resim);
        $kategori->delete();
        session()->flash('message', 'Yazı Silindi');
        return redirect()->route('admin.kategoriler');
    }

    public function ekle(){
        $this->validate([
            'baslik' => 'required|min:5|max:25',
            'image' => 'image|max:1024', // 1MB Max
        ]);
        $kategori = new Kategori;
        $kategori->baslik = $this->baslik;
        $url = Str::slug($this->baslik);
        $kategori->url = $url;
        $image_name = $url."_".rand(1111, 9999).".png";
        $this->image->storeAs('kategoriler', $image_name);
        $kategori->resim = $image_name;
        $kategori->save();
        session()->flash('message', 'Kategori Eklendi');
        return redirect()->route('admin.kategoriler');
    }

    public function render(){
        if ($this->ara != null)
            $this->kategoriler = Kategori::where('baslik', 'LIKE', '%'.$this->ara.'%')->get();
        else
            $this->kategoriler = Kategori::orderBy("sira","asc")->get();
        return view('livewire.admin.kategoriler', [
            "kategoriler" => $this->kategoriler
        ]);
    }
}
