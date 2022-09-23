<?php

namespace Database\Seeders;

use App\Models\MainGoals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainGoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainGoals::create([
            'name'  =>[
                'ar'    =>  'توفير الادوية',
                'en'    =>  ' Health Care',
            ],
            'description' =>[
                'ar'    =>  'السعي لتوفير المستلزمات الطبية ',
                'en'    =>  'Lorem ipsum dolor sit amet'
            ],
            'service_id'    =>  1
        ]);

        MainGoals::create([
            'name'  =>[
                'ar'    =>  ' توفير الكادر الطبي ',
                'en'    =>  ' Health Care',
            ],
            'description' =>[
                'ar'    =>  'السعي لتوفير المستلزمات الطبية',
                'en'    =>  'Lorem ipsum dolor sit amet,'
            ],
            'service_id'    =>  1
        ]);

        MainGoals::create([
            'name'  =>[
                'ar'    =>  ' توفير الادوية',
                'en'    =>  ' Health Care',
            ],
            'description' =>[
                'ar'    =>  'السعي لتوفير المستلزمات الطبية ',
                'en'    =>  'Lorem ipsum dolor sit amet'
            ],
            'service_id'    =>  1
        ]);

        MainGoals::create([
            'name'  =>[
                'ar'    =>  'توفير القرطاسية',
                'en'    =>  ' learn ',
            ],
            'description' =>[
                'ar'    =>  'السعي لتوفير  القرطاسية ',
                'en'    =>  'Lorem ipsum dolor sit amet'
            ],
            'service_id'    =>  2
        ]);

        MainGoals::create([
            'name'  =>[
                'ar'    =>  'توفير الحقائب المدرسية',
                'en'    =>  ' learn ',
            ],
            'description' =>[
                'ar'    =>  'السعي لتوفير  الحقائب المدرسية ',
                'en'    =>  'Lorem ipsum dolor sit amet'
            ],
            'service_id'    =>  2
        ]);

        MainGoals::create([
            'name'  =>[
                'ar'    =>  'توفير الحقائب المدرسية',
                'en'    =>  ' learn ',
            ],
            'description' =>[
                'ar'    =>  'السعي لتوفير  الحقائب المدرسية ',
                'en'    =>  'Lorem ipsum dolor sit amet'
            ],
            'service_id'    =>  2
        ]);

        MainGoals::create([
            'name'  =>[
                'ar'    =>  'توفير الغذاء',
                'en'    =>  ' Food ',
            ],
            'description' =>[
                'ar'    =>  'السعي لتوفير  الغذاء ',
                'en'    =>  'Lorem ipsum dolor sit amet'
            ],
            'service_id'    =>  3
        ]);

        MainGoals::create([
            'name'  =>[
                'ar'    =>  'توفير الغذاء',
                'en'    =>  ' Food ',
            ],
            'description' =>[
                'ar'    =>  'السعي لتوفير  الغذاء ',
                'en'    =>  'Lorem ipsum dolor sit amet'
            ],
            'service_id'    =>  3
        ]);

        MainGoals::create([
            'name'  =>[
                'ar'    =>  'توفير الغذاء',
                'en'    =>  ' Food ',
            ],
            'description' =>[
                'ar'    =>  'السعي لتوفير  الغذاء ',
                'en'    =>  'Lorem ipsum dolor sit amet'
            ],
            'service_id'    =>  3
        ]);
    }
}
