<?php

use App\Yorum;
use Illuminate\Database\Seeder;

class YorumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<17; $i++)
            Yorum::create(array(
                'id' => $i,
                'yorum' => "Cum nihil vero alias iure voluptatem reiciendis aut incidunt. Quo rerum molestias rerum cum ut eos itaque. Animi velit enim et voluptatum sunt.",
                'onay' => 1,
                'yazi_id' => $i,
                "email"=>"lorem$i@ipsum$i.com"
            ));
    }
}
