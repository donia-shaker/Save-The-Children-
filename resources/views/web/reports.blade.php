@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/reports/reports.css') }}" />
@endsection
@section('content')
    <main>
        <div class="overlay"></div>
        <div class="container">
            <div class="text">
                <span> التقارير السنوية</span>
            </div>
        </div>
    </main>

    {{-- Start Report Section --}}
    <section class="reports">
        <div class="image layer2">
            <img src="{{ asset('images/layer-1.png') }}" alt="layer">
        </div>
        <div class="image layer3">
            <img src="{{ asset('images/layer2.png') }}" alt="layer">
        </div>
        <div class="container">
            <div class="main">
                <div class="image layer1">
                    <img src="{{ asset('images/layer-1.png') }}" alt="layer">
                </div>
                <h2 class="h-2">التقارير المالية</h2>
                <div class="all-reports">
                    @foreach ($reports as $report)
                    <a href="{{asset("images/$report->pdf")}}" target='_blank'>
                        <div class="content">
                            <div class="box">
                                <p class="befor"> التقارير المالي <span>{{$report->title}}</span></p>
                                <p class="hover">استعراض
                                    <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                            class="fa-solid fa-chevron-left"></i></span>
                                    <span><img src="{{ asset('images/arrow.png') }}" alt=""><i
                                            class="fa-solid fa-chevron-left"></i></span>
                                </p>
                                <div class="pdf">
                                    <h3 class="h-3">{{$report->title}}</h3>
                                    <p class="text"> التقارير المالية لسنة <span>{{$report->title}}</span></p>
    
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    {{-- End Report Section --}}

    {{-- Start Social --}}
    <x-social></x-social>
    {{-- End Social --}}
@endsection
@section('javascript')
@endsection
