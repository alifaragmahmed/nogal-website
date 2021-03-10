<?php

use Illuminate\Database\Seeder;

use App\Setting;

class SettingTableSeeder extends Seeder
{
    
    /**
     * setting data
     * 
     * @var Array
     */
    private $data = [
        ["id" => 1, "name" => "domain", "value" => "nogal.com"],
        ["id" => 2, "name" => "title", "value" => "nogal"],
        ["id" => 3, "name" => "theme", "value" => "skin-blue-light"],
        ["id" => 4, "name" => "phone", "value" => "0112390424"],
        ["id" => 5, "name" => "about_ar", "value" => "lorem text"],
        ["id" => 6, "name" => "about_en", "value" => "lorem text"],
        ["id" => 7, "name" => "language", "value" => "En"],
    ];
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() { 
        foreach ($this->data as $item) {
            Setting::create($item);
        }
    }
}
