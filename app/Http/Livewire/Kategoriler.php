<?php

namespace App\Http\Livewire;

use App\Kategori;
use Livewire\Component;

class Kategoriler extends Component
{
    public function render(){
        return view('livewire.kategoriler', [
            'kategoriler' => Kategori::orderBy("sira","asc")->get()
        ]);
    }
}
