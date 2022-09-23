<!DOCTYPE html>
@if (app()->getLocale() != 'en')
    <html lang="ar" dir="rtl">
@else
    <html lang="en" dir='ltr'>
@endif
{{-- <html lang="en" dir="rtl"> --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuraimi Bank</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <!-- CSS Normalized -->
    <link rel="stylesheet" href="{{ asset('css/normalized.css') }}" />
    <!-- CSS File -->
    <link rel="stylesheet" href="{{ asset('scss/header&footer/header&footer.css') }}" />
    @yield('css')
    <!-- Open  Font -->
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" />


</head>
@if (app()->getLocale() != 'en')

    <body dir="rtl">
    @else

        <body dir="ltr">
@endif
{{-- start Header Section --}}
<header>
    <div class="container ">
        <div class="content">
            <div>
                <div class="minu" id="minu" onclick="showNav()">
                    <span></span>
                    <span></span>
                </div>
                <ul class="right-list">
                    <li class="job"><a href=""><i class="fa-solid fa-user"></i>@lang('content.jobs')</a></li>
                    <li><a href="{{ route('contact_page') }}"><i class="fa-solid fa-phone"></i>@lang('content.contact_us')</a>
                    </li>
                </ul>
            </div>
            <div class="logo">
                <div class="top">
                    <div class="icon"><img src="{{ asset('images/logok.png') }}" alt=""></div>
                </div>
            </div>
            <div>
                <ul class="left-list">
                    <li class="points"><a><i
                                class="fa-solid fa-location-dot"></i>@lang('content.point_services')</a>
                    </li>
                    <li><a href=""><i class="fa-solid fa-search"></i></a>
                        @if (app()->getLocale() != 'en')
                            <a rel="alternate" hreflang="en" class="lang"
                                href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                EN
                            </a>
                        @else
                            <a rel="alternate" hreflang="ar" class="lang"
                                href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                AR
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        {{-- Start Nav Section --}}
        <nav>
            <ul class="main-list " id="main-list">
                <li><a href="{{ route('home') }}">@lang('content.home')</a></li>
                @foreach ($all_services as $service)
                <li><a href="{{ route('services_page', $service->id) }}">{{$service->name}}</a>
                @endforeach
                <li><a href="{{ route('about_us') }}">من نحن </a></li>
                <li><a href="{{ route('managers') }}"> اعضاء الادارة </a></li>
                <li><a href="{{ route('reports_page') }}"> التقارير السنوية </a></li>
            </ul>

        </nav>
        {{-- End Nav Section --}}
    </div>
</header>
{{-- End Header Section --}}
@yield('content')

{{-- Start Footer --}}
<footer>
    <div class="container">
        <div class="image">
            <img src="{{ asset('images/logok.png') }}" alt="" width="200">
        </div>
        <ul class="main">
            <li class="first">من نحن
                <ul>
                    <li><a href="{{ route('about_us') }}">الرؤية</a></li>
                    <li><a href="{{ route('about_us') }}">الرسالة</a></li>
                    <li><a href="{{ route('about_us') }}">الأهداف </a></li>
                    <li><a href="{{ route('about_us') }}">القيم والمبادئ</a></li>
                    <li><a href="{{ route('about_us') }}">بيان سياسة </a></li>
                    <li><a href="{{ route('about_us') }}">مكافحة غسل </a></li>
                    <li><a href="{{ route('companies') }}"> شركائنا </a></li>

                </ul>
            </li>
            <li class="first">شركائنا
                <ul>
                    <li><a href="{{ route('companies') }}">موني جرام</a></li>
                    <li><a href="{{ route('companies') }}">ماستر كارد</a></li>
                    <li><a href="{{ route('companies') }}">البنوك المراسلة</a></li>
                    <li><a href="{{ route('companies') }}">منظمة التمويل الدولية </a></li>
                    <li><a href="{{ route('companies') }}"> تيمينوس </a></li>

                </ul>
            </li>
            <li class="first">الخدمات
                <ul>
                    @foreach ($all_services as $service)
                        <li><a href="{{route('services_page',$service->id)}}">{{$service->name}}
                            </a></li>
                    @endforeach
                </ul>
            </li>
            <li class="first">التقارير
                <ul>
                    <li><a href="{{ route('reports_page') }}">التقارير المالية</a></li>
                    <li><a href="{{ route('reports_page') }}">القوائم المالية</a></li>

                </ul>
            </li>
            <li class="first">نقاط تواجدنا
                <ul>
                    <li><a >مواقع خدماتنا</a></li>
                </ul>
            </li>
            <li class="first">تواصل معنا
                <ul>
                    <li><a> 967 1 99999 : ت</a></li>
                    <li><a> 967 1 99999 : ف</a></li>
                    <li><a>967 1 99999 : ف</a></li>
                </ul>
            </li>
        </ul>
        <div class="copy-right">
            <span>Save Childern</span> 2022 &copy;
        </div>
    </div>
</footer>
{{-- End Footer --}}
@yield('javascript')
<script src="{{ asset('js/header&footer.js') }}"></script>

</body>

</html>
