@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/about_us/about_us.css') }}" />
@endsection
@section('content')
    {{-- Start Main Section --}}
    <main>
        <div class="overlay"></div>
        <div class="container">
            <div class="text">
                <h1 class="h-1">@lang('content.home_title')
                </h1>
                <p class="f-16pt">انضم لنا لضمان حقوقهم</p>
            </div>
        </div>
    </main>
    {{-- End Main Section --}}

    {{-- Start About Bank Section --}}
    <section class="about_us">
        <img src="{{asset('images/layer-1.png')}}" alt="layer image" class="layer1">
        <img src="{{asset('images/layer4.png')}}" alt="layer image" class="layer2">
        <div class="container">
            <div class="list">
                <h2 class="h-2">عن المنظمة</h2>
                <ul>
                    @foreach ($about_bank as $bank)
                        <li class="dot" onclick="currentSlide({{ $bank->id }})">{{ $bank->table_key }} </li>
                    @endforeach
                </ul>
            </div>
            <div class="content">
                <div class="overlay"></div>
                @foreach ($about_bank as $bank)
                    <div class="text mySlides fad">
                        <h3 class="h-3">{{ $bank->table_key }}</h3>
                        {!! $bank->table_value !!}
                    </div>
                @endforeach

                <div class="bank">
                    <span class="link perv" onclick="plusSlides(-1)">السابق</span>
                    <span class="link next" onclick="plusSlides(1)">التالي</span>
                </div>
            </div>

        </div>

    </section>
    {{-- End About Bank Section --}}

    {{-- Start Principles Section --}}
    <section class="principles">
        <img src="{{asset('images/layer-1.png')}}" alt="layer image" class="layer1">
        <img src="{{asset('images/layer4.png')}}" alt="layer image" class="layer2">
        <div class="container">
            <h2 class="h-2">القيم والمبادئ</h2>
            <?php $i = 0; ?>
            @foreach ($principles as $principle)
                <?php $i++; ?>
                <div class="content">
                    <h3 class="h-3">{{ $principle->table_key }}</h3>
                    <div class="box">
                        <div class="text">
                            {!! $principle->table_value !!}
                        </div>
                        <div class="images">
                            <img src="{{ asset('images/news.WebP ') }}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- End Principles Section --}}

    <x-social></x-social>
@endsection
@section('javascript')
    <script src="{{ asset('js/about_us.js') }}"></script>
@endsection
