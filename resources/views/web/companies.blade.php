@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/companies/companies.css') }}" />
@endsection
@section('content')
    <main>
        <div class="overlay"></div>
        <div class="container">
            <div class="text">
                <span>رئيسية/شركائنا</span>
            </div>
        </div>
    </main>

    {{-- Start Adventage Section --}}
    <section class="companies">
        <div class="image layer2">
            <img src="{{ asset('images/layer-1.png') }}" alt="layer">
        </div>
        <div class="image layer3">
            <img src="{{ asset('images/layer2.png') }}" alt="layer">
        </div>
        <div class="container">
            <div class="main ">
                <div class="image layer1">
                    <img src="{{ asset('images/layer-1.png') }}" alt="layer">
                </div>
                <h2 class="h-2">شركائنا</h2>

                <?php $i = 0; ?>
                @foreach ($banks as $bank)
                    <?php $i++; ?>
                    <div class="content">
                        <span>{{ $i }}</span>
                        <div class="box">
                            <div class="image shadow">
                                <img src="{{ asset('images/' . $bank->image . '') }}" alt="">
                            </div>
                            <div class="text">
                                <h3 class="h-3">{{ $bank->title }}</h3>
                                <p>
                                    {{ $bank->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="content">
                    <span>3</span>
                    <div class="box">
                        <div class="title">
                            <h3>البنوك
                                المراسلة</h3>
                        </div>

                        <div class="all-bank">

                            <div class="country">
                                <h3 class="h-3">المملكة العربية السعودية</h3>
                                <div class="images">
                                    <div class="image shadow">
                                        <img src="{{ asset('images/IFC-2.png') }}" alt="">
                                    </div>
                                    <div class="image shadow">
                                        <img src="{{ asset('images/IFC-3.png') }}" alt="">
                                    </div>
                                    <div class="image shadow">
                                        <img src="{{ asset('images/IFC-4.png') }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="country">
                                <h3 class="h-3">مملكة البحرين</h3>
                                <div class="images">
                                    <div class="image shadow">
                                        <img src="{{ asset('images/2222.png') }}" alt="">
                                    </div>
                                    <div class="image shadow">
                                        <img src="{{ asset('images/IFC-1.png') }}" alt="">
                                    </div>
                                    <div class="image shadow">
                                        <img src="{{ asset('images/IFC-1.png') }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="country">
                                <h3 class="h-3">تركيا</h3>
                                <div class="images">
                                    <div class="image shadow">
                                        <img src="{{ asset('images/2222.png') }}" alt="">
                                    </div>
                                    <div class="image shadow">
                                        <img src="{{ asset('images/2222.png') }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="country">
                                <h3 class="h-3">الامارات العربية المتحدة
                                </h3>
                                <div class="images">
                                    <div class="image shadow">
                                        <img src="{{ asset('images/IFC-6.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <span>4</span>
                    <div class="box">
                        <div class="image shadow">
                            <img src="{{ asset('images/IFC.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3 class="h-3">هذا النص هو مثال</h3>
                            <p>
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد
                                .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،
                                النص لن يبدو مقسما ولا يحوي أخطاء
                                لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من
                                الأحيان أن يطلع على صورة
                                .حقيقية لتصميم الموقع
                                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد
                                النص العربى أن يوفر على
                                .المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق
                                هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير
                                منسق، أو حتى غير مفهوم.
                                لأنه مازال نصاً بديلاً ومؤقتاً
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد
                                .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،
                                النص لن يبدو مقسما ولا يحوي أخطا
                            </p>
                            <a href="#">قراءة المزيد</a>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <span>5</span>
                    <div class="box">
                        <div class="image shadow">
                            <img src="{{ asset('images/Mask Group 39.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3 class="h-3">هذا النص هو مثال</h3>
                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد
                                .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،
                                النص لن يبدو مقسما ولا يحوي أخطاء
                                لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من
                                الأحيان أن يطلع على صورة
                                .حقيقية لتصميم الموقع
                                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد
                                النص العربى أن يوفر على
                                .المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق
                                هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير
                                منسق، أو حتى غير مفهوم.
                                لأنه مازال نصاً بديلاً ومؤقتاً
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                                العربى، حيث يمكنك أن تولد
                                .مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،
                                النص لن يبدو مقسما ولا يحوي أخطا
                            </p>
                            <a href="#">قراءة المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Story Section --}}

    {{-- Start Social --}}
    <x-social></x-social>
    {{-- End Social --}}
@endsection
