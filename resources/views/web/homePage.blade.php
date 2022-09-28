@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/main/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('scss/news/news.css') }}" />
@endsection
@section('content')
    {{-- Start Hero Section --}}
    @if (app()->getLocale() != 'en')
        <main dir="rtl">
        @else
            <main dir="ltr">
    @endif
    <div class="overlay"></div>
    <div class="container">
        @if (app()->getLocale() != 'en')
            <div class="text" dir="rtl">
            @else
                <div class="text" dir="ltr">
        @endif
        <h1 class="h-1">@lang('content.home_title')</h1>
        <p>@lang('content.home_p')</p>
    </div>
    </div>
    </main>
    {{-- End Hero Section --}}

    {{-- Start list Section --}}
    <section class="list">
        <div class="container shadow">
            <div class="box">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>توفير المسكن </p>
            </div>

            <div class="box">
                <i class="fa-solid fa-handshake"></i>
                <p>توفير الغذاء </p>
            </div>

            <div class="box">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>توفير التعليم</p>
            </div>

            <div class="box">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <p>الرعاية الصحية</p>
            </div>
        </div>
    </section>
    {{-- End list Section --}}

    {{-- Start Services Section --}}
    <section class="services ">
        <div class="container">
            <h2 class="h-2">خدمات  نقدمها </h2>
            <ul>
                <li class="ServicesDot active" onclick="currentservicesSlide(1)"> تعليم الاطفال</li>
                <li class="ServicesDot" onclick="currentservicesSlide(2)"> حماية الاطفال</li>
                <li class="ServicesDot" onclick="currentservicesSlide(3)"> توفير احتياجاتهم</li>
                <li class="ServicesDot" onclick="currentservicesSlide(4)">  توفير الغذاء </li>
                <li class="ServicesDot" onclick="currentservicesSlide(5)">العناية الطبية</li>
            </ul>
        </div>
        <div class="service shadow-inset">
            <div class="container">
                <div class="slider">
                    <div class="slider-wrapper">
                        <div class="box shadow myservicesSlides fade active">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3"> تعليم الاطفال</h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
                                        في نفس المساحة، لقد تم توليد هذا
                                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                                        مثال لنص يمكن أن يستبد
                                    </p>
                                </div>
                                <div class="button">
                                    <button class="btn">المزيد</button>
                                </div>
                            </div>
                                <img src="{{ asset('images/services.WebP ') }}" alt="services">
                        </div>
                        <div class="box shadow myservicesSlides fade">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3"> حماية الاطفال</h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
                                        في نفس المساحة، لقد تم توليد هذا
                                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                                        مثال لنص يمكن أن يستبد
                                    </p>
                                </div>
                                <div class="button">
                                    <button class="btn">المزيد</button>
                                </div>
                            </div>
                            <img src="{{ asset('images/services.WebP ') }}" alt="services">
                        </div>
                        <div class="box shadow myservicesSlides fade">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3"> توفير احتياجاتهم</h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
                                        في نفس المساحة، لقد تم توليد هذا
                                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                                        مثال لنص يمكن أن يستبد
                                    </p>
                                </div>
                                <div class="button">
                                    <button class="btn">المزيد</button>
                                </div>
                            </div>
                            <img src="{{ asset('images/services.WebP ') }}" alt="services">
                        </div>
                        <div class="box shadow myservicesSlides fade">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3">توفير الغذاء </h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
                                        في نفس المساحة، لقد تم توليد هذا
                                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                                        مثال لنص يمكن أن يستبد
                                    </p>
                                </div>
                                <div class="button">
                                    <button class="btn">المزيد</button>
                                </div>
                            </div>
                            <img src="{{ asset('images/services.WebP ') }}" alt="services">
                        </div>
                        <div class="box shadow myservicesSlides fade">
                            <div class="content">
                                <div class="text">
                                    <h3 class="h-3">العناية الطبية</h3>
                                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل
                                        في نفس المساحة، لقد تم توليد هذا
                                        النص من مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى هذا النص هو
                                        مثال لنص يمكن أن يستبد
                                    </p>
                                </div>
                                <div class="button">
                                    <button class="btn">المزيد</button>
                                </div>
                            </div>
                            <img src="{{ asset('images/services.WebP ') }}" alt="services">
                        </div>
                    </div>
                </div>
                <div class="slider-btn">
                    <a class="prev" onclick="prev(-1)">❮</a>
                    <a class="next" onclick="next(1)">❯</a>
                </div>
            </div>
            <div class="design">
                <img src="{{ asset('images/sasa.png') }}" alt="layer">
            </div>
        </div>
        </div>
    </section>
    {{-- End Services Section --}}

    {{-- Start Application Section --}}
    <section class="help">
        <div id="wave"></div>
        <div class="overflow">
            <div class="container">
                <div class="image">
                    <img src="{{ asset('images/child.WebP ') }}" alt="layer">
                </div>
                <div class="content">
                    <h2 class="h-2"> ساعد الاطفال</h2>
                    <p class="f-4">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                        مولد النص العربى هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد ت
                    </p>
                    <div class="boxes">
                        <div class="box mySlides shadow main-position">
                            <h3 class="h-3"> ساعد الاطفال للدراسة</h3>
                            <p>
                                تبرعك  سيأخذهم إلى المدرسة ونحو مستقبل جيد.
                            </p>
                            <div class="button">
                                <button class="btn">ساعدهم الان</button>
                            </div>
                        </div>
                        <div class="box mySlides shadow seconed-position">
                            <h3 class="h-3"> ساعدالاطفال المحتاجين</h3>
                            <p>
                                ستوفر مساعدتك لهم جميع الاحتياجات الأساسية للإنسان. انضم إلينا ، حتى لا ينام أحد جائعًا.
                            </p>
                            <div class="button">
                                <button class="btn">ساعدهم الان</button>
                            </div>
                        </div>

                    </div>
                    <div>
                        <span class="dot active" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                    </div>
                </div>
            </div>
        </div>

        <div id="wave-two"></div>
    </section>
    {{-- End Application Section --}}

    {{-- Start News Section --}}
    <section class="news">
        <img src="{{ asset('images/From selection.WebP') }}" alt="layer" class="layer1">
        <x-news></x-news>
        <div class="button"><button class="btn">المزيد</button></div>
        </div>
        <div class="new-wave"></div>
        <div class="layer2">
            <img src="{{ asset('images/aaaa.png') }}" alt="layer">
            <img src="{{ asset('images/From selection.WebP') }}" alt="layer">
        </div>
    </section>
    {{-- End News Section --}}

    {{-- Start Number Section --}}
    <section class="number">
        <div class="container">
            <h2 class="h-2">نجاحاتنا في أرقام</h2>
            <div class="boxes">
                <div class="box">
                    <a data-content="+889"><span class="h-2">+ 889</span></a>
                    <p>تطوع</p>
                </div>
                <div class="box">
                    <a data-content="+679"><span class="h-2">+ 679</span></a>
                    <p>جمع التبرعات
                    </p>
                </div>
                <div class="box">
                    <a data-content="+879"><span class="h-2">+ 879</span></a>
                    <p>المتبرع</p>
                </div>
                <div class="box">
                    <a data-content="+122"><span class="h-2">+ 122</span></a>
                    <p>جمع الأموال
                    </p>
                </div>
                <div class="box">
                    <a data-content="+267"><span class="h-2">+ 267</span></a>
                    <p>تطوع</p>
                </div>
                <div class="box">
                    <a data-content="+243"><span class="h-2">+ 243</span></a>
                    <p>جمع التبرعات
                    </p>
                </div>
                <div class="box">
                    <a data-content="+789"><span class="h-2">+ 789</span></a>
                    <p>المتبرع</p>
                </div>
                <div class="box">
                    <a data-content="+456"><span class="h-2">+ 456</span></a>
                    <p>جمع الأموال
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- End Number Section --}}

    {{-- Start Location Section --}}
    <section class="location">
        <div class="layer1">
            <img src="{{ asset('images/From selection.WebP') }}" alt="layer">
        </div>
        <div class="container">
            <div class="content">
                <h2 class="h-2"> نقاط تواجدنا </h2>
                <div class="button"><button class="btn"> المزيد </button></div>
            </div>
            <div class="image">
                <img src="{{ asset('images/map.WebP ') }}" alt="map">
            </div>
        </div>
        <div class="layer2">
            <img src="{{ asset('images/aaaa.png') }}" alt="layer">
        </div>
    </section>
    {{-- End Location Section --}}
@endsection
@section('javascript')
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="{{ asset('js/news_slider.js') }}"></script>
@endsection
