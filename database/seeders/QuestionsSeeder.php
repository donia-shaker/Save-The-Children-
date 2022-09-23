<?php

namespace Database\Seeders;

use App\Models\Questions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Questions::create([
            'description'  =>[
                'ar'    =>  '
                <p class="f-4">لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                على مدار الساعة وطوال أيام الأسبوع
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس  
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                </p>
                ',
                'en'    =>  ' 
                <p class="f-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                </p>
                ',
            ],
            'page_content' =>[
                'ar'    =>  'لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،',
                'en'    =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.'
            ],
            'service_id'   =>  1
        ]);

        Questions::create([
            'description'  =>[
                'ar'    =>  '
                <p class="f-4">لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                على مدار الساعة وطوال أيام الأسبوع
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس  
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                </p>
                ',
                'en'    =>  ' 
                <p class="f-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                </p>
                ',
            ],
            'page_content' =>[
                'ar'    =>  'لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،',
                'en'    =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.'
            ],
            'service_id'   =>  2
        ]);

        Questions::create([
            'description'  =>[
                'ar'    =>  '
                <p class="f-4">لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                على مدار الساعة وطوال أيام الأسبوع
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                يستطيع العميل إيداع حوالته إلى حسابه مباشرة عبر خدمة الصرَّاف الآلي
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس  
                لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،
                </p>
                ',
                'en'    =>  ' 
                <p class="f-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.
                </p>
                ',
            ],
            'page_content' =>[
                'ar'    =>  'لقد تم توليد هذا النص من مولد النص العربى هذا النص هو مثال ل هذا النص من مولد النص العربى هذا النص هو مثال لنص لقد تم توليد هذا في نفس المساحة،',
                'en'    =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci debitis eos quam molestiae! Exercitationem consequatur eius amet veritatis.'
            ],
            'service_id'   =>  3
        ]);
    }
}
