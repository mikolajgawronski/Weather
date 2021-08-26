<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    protected DatabaseManager $manager;

    public function __construct(DatabaseManager $manager)
    {
        $this->manager = $manager;
    }

    public function run(): void
    {
        $cities = ["Katowice","Lubin","Szczecin","Warszawa","Polkowice","Legnica","Opole","Bydgoszcz","Lublin","Gdynia"];

        for ($i = 0; $i < 10; $i++) {
            $this->manager->table('cities')->insert([
                'name' => $cities[$i],
            ]);
        }
    }
}
