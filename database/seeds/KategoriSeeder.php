<?php

use App\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/veriler/kategoris.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Kategori::create(array(
                'id' => $obj->id,
                'baslik' => $obj->baslik,
                'url' => $obj->url,
                "resim"=>$obj->resim
            ));
        }
    }
}
