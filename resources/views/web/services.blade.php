@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/services/services.css') }}" />
@endsection
@section('content')
    <main style="background-image: url('/images/{!!$service->background_image !!}')">
        <div class="overlay"></div>
        <div class="container">
                <div class="text">
                    <h1 class="h-1">{{$service->name}}</h1>
                    <p>{{$service->description}}</p>
                    <button class="btn-2"> تبرع الان</button>
                </div>
        </div>
    </main>

    {{-- Start Adventage Section --}}
    <section class="adventages">
        <div class="container">
            <div class="main-adv">
                <?php $i=1; ?>
                @foreach ( $main_goals as $main_goal)
                <div class="box">
                    <div class="image">
                        <img src="{{ asset('images/Rectangle 991.png') }}" alt="" height="80">
                        <img src="{{ asset('images/Layer 58.png') }}" alt="" class="two">
                        <span>{{$i++}}</span>
                    </div>
                    <h2 class="name h-2">   {{$main_goal->name}}</h2>
                    <p class="">{{$main_goal->description}}</p>
                </div>
                @endforeach
            </div>
            <div class="slider-list">
                <ul>
                    <li class="dot active" onclick="currentSlide(1)">الاهداف</li>
                    <li class="dot" onclick="currentSlide(2)">التمويل</li>
                    <li class="dot" onclick="currentSlide(3)">التبرعات</li>
                    <li class="dot" onclick="currentSlide(4)"> أسئلة شائعة</li>
                </ul>
            </div>
            <div class="slider-wrapper">
                <div class="box  mySlides fade active">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/Group -9.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h2 class="h-2">  اهداف {{$service->name}}</h2>
                            {!!$goal->description!!}
                            <div class="link">
                                <a>المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box  mySlides fade active">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/Group -9.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h2 class="h-2"> تمويل {{$service->name}}</h2>
                            {!! $financing->description !!}
                            <div class="link">
                                <a >المزيد</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box  mySlides fade active">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/Group -9.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h2 class="h-2">  التبرعات  {{$service->name}}</h2>
                            {!!$volunteered->description!!}
                            <div class="link">
                                <a> المزيد</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box  mySlides fade active">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/Group -9.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h2 class="h-2">اسئلة شائعه على  {{$service->name}}</h2>
                            {!!$questions->description!!}
                            <div class="link">
                                <a >المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </section>
    {{-- End Aventages Section --}}

    {{-- Start Text Section --}}
    <section class="text">
        <div class="container">
            <p class="one">لا تجعل خجلك يحرمك مساعدة الآخرين</p>
            <p>عندما تقرر المساعدة لا تفكر ...</p>
        </div>
    </section>
    {{-- End Text Section --}}

    {{-- Start Success Section --}}
    <section class="success">
        <div class="container">
            <h2 class="h-2"> المشاريع الناجحة </h2>
            <div class="slider-wrapper">
                <div class="box story-slides fade">
                    <div class="text">
                        <h3 class="h-3">
                        توفير الغذاء ل 30 منطقة
                        </h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                        </p>
                        <a href="{{ route('success_story') }}">قراءة المزيد</a>
                    </div>
                </div>
                <div class="box story-slides fade">
                    <div class="text">
                        <h3 class="h-3">
                            توفير عدد من العلاجات
                        </h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                        </p>
                        <a href="{{ route('success_story') }}">قراءة المزيد</a>
                    </div>
                </div>
                <div class="box story-slides fade">
                    <div class="text">
                        <h3 class="h-3">
                            200 طفلا يذهبو للمدرسة
                        </h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                        </p>
                        <a href="{{ route('success_story') }}">قراءة المزيد</a>
                    </div>
                </div>
                <div class="box story-slides fade">
                    <div class="text">
                        <h3 class="h-3">
                            توزيع وجبات لمخيمات النازحين
                        </h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا
                            النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل
                            في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا
                            النص هو مثال لنص يمكن أن يستبدل
                        </p>
                        <a href="{{ route('success_story') }}">قراءة المزيد</a>
                    </div>
                </div>
            </div>
            <div class="btn-success">
                <span class="btn next" onclick="plusStorySlides(-1)"><i class="fa-solid fa-chevron-right"></i></span>
                <span class="btn prev" onclick="plusStorySlides(1)"><i class="fa-solid fa-chevron-left"></i></span>
            </div>
        </div>
    </section>
    {{-- End Success Section --}}

    {{-- Start Other service Section --}}
    <section class="other">
        <h2 class="h-2">
            مشاريع اخرى  
        </h2>
        <div class="bg">
            <img src="{{ asset('images/bg-other.png') }}" alt="">
        </div>
        <div class="slides-wrapper" id="slides-wrapper">
            <div class="box">
                <img src="{{ asset('images/photo.png') }}" alt="">
                <h3 class="h-3">
                    توزيع القرطاسية المدرسية
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/photo-2.png') }}" alt="">
                <h3 class="h-3">
                    تجديد المدارس
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/photo.png') }}" alt="">
                <h3 class="h-3">
                    توزيع القرطاسية المدرسية
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/photo-2.png') }}" alt="">
                <h3 class="h-3">
                    تجديد المدارس
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/photo.png') }}" alt="">
                <h3 class="h-3">
                    توزيع القرطاسية المدرسية
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/photo-2.png') }}" alt="">
                <h3 class="h-3">
                    تجديد المدارس
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/photo.png') }}" alt="">
                <h3 class="h-3">
                    توزيع القرطاسية المدرسية
                </h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/photo.png') }}" alt="">
                <h3 class="h-3">
                    تجديد المدارس
                </h3>
            </div>
        </div>
        <div class="btn-other">
            <span class="other-btn next" onclick="servPrev(-1)"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="other-btn prev" onclick="servNext(1)"><i class="fa-solid fa-chevron-left"></i></span>
        </div>
    </section>
    {{-- End Other service Section --}}
@endsection
@section('javascript')
    <script src="{{ asset('js/servicePage.js') }}"></script>
    <script src="{{ asset('js/successStory.js') }}"></script>
    <script src="{{ asset('js/another_serv.js') }}"></script>
@endsection
