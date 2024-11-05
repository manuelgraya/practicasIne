<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aCompany =[
            [
                'id' => 1,
                'name' => 'MSI',
            ],
            [
                'id' => 2,
                'name' => 'ASUS',
            ],
            [
                'id' => 3,
                'name' => 'NVIDIA',
            ],
            [
                'id' => 4,
                'name' => 'AMD',
            ],
            [
                'id' => 5,
                'name' => 'Intel',
            ],
        ];
        
        foreach ($aCompany as $company){
            \App\Models\Company::updateOrCreate(['id' => $company['id']], $company);
        }
    }
}
