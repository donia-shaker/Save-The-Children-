<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {
        Services::create([
            'name'  =>[
                'ar'    =>  'الرعاية الصحية',
                'en'    =>  ' Health Care',
            ],
            'description' =>[
                'ar'    =>  'لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،',
                'en'    =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.'
            ],
            'sentence'  =>[
                'ar'    =>  '',
                'en'    =>  ''
            ],
            'background_image'  =>  'Health.png',
        ]);

        Services::create([
            'name'  =>[
                'ar'    =>  ' التعليم',
                'en'    =>  ' Learn Care',
            ],
            'description' =>[
                'ar'    =>  'لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،',
                'en'    =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.'
            ],
            'sentence'  =>[
                'ar'    =>  '',
                'en'    =>  ''
            ],
            'background_image'  =>  'learn.png',
        ]);

        Services::create([
            'name'  =>[
                'ar'    =>  ' الغذاء',
                'en'    =>  ' Food ',
            ],
            'description' =>[
                'ar'    =>  'لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،',
                'en'    =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.'
            ],
            'sentence'  =>[
                'ar'    =>  '',
                'en'    =>  ''
            ],
            'background_image'  =>  'food.png',
        ]);
    }
}
