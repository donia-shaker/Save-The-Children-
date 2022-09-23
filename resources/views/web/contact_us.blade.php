@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/contact_us/contact_us.css') }}" />
@endsection
@section('content')
    <main>
        <div class="overlay"></div>
        <div class="container">
            <div class="text">
                <span>@lang('content.contact_us')</span>
            </div>
        </div>
    </main>

    {{-- Start managers Section --}}
    <section class="managers">
        <div class="container">
            <div class="main">
                <img src="{{ asset('images/layer-1.png') }}" alt="" class="layer1">
                <h2 class="h-2 title"> @lang('content.call_us') </h2>
                <p class="description"> @lang('content.call_us_p')</p>
                <div class="boxes">
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/c-phone.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>@lang('content.contact_us')</h3>
                            <div class="info">
                                <p><span> تلفون </span> :<span class="number">967 1 503888</span></p>
                                <p><span> فاكس </span> :<span class="number">967 1 503888</span></p>
                                <p><span>  الايميل  </span> :<span class="number">967 1 503888</span></p>
                                <p><span> صندوق بريد  </span> :<span class="number">email@gmail.com</span></p>
                            </div>

                        </div>
                    </div>
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/c_email.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>@lang('content.email_contact_p')</h3>
                            <p class="email">CS@gmail.com</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="image">
                            <img src="{{ asset('images/c-location.png') }}" alt="">
                        </div>
                        <div class="text">
                            <h3>@lang('content.point_services')</h3>
                        </div>
                    </div>
                </div>
    </section>
    {{-- End Story Section --}}

    {{-- Start Contact Us Message --}}
    <section class="message">
        <img src="{{ asset('images/layer-1.png') }}" alt="layer" class="layer2">
        <img src="{{ asset('images/layer2.png') }}" alt="layer" class="layer3">
        <div class="container">
            <div class="main">
                <h2 class="h-2">@lang('content.help')</h2>
                <form action="">
                    <div class="input-group">
                        <label for="name">@lang('content.name')</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="input-group">
                        <label for="phone">@lang('content.phone')</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                    <div class="input-group">
                        <label for="email">@lang('content.mail')</label>
                        <input type="text" id="email" name="email">
                    </div>
                    <div class="input-group">
                        <label for="message" class="message">@lang('content.message')</label>
                        <textarea name="message" id="message"></textarea>
                    </div>

                    <button type="submit" class='btn'>@lang('content.send')</button>

                </form>
            </div>
        </div>
    </section>
    {{-- End Contact Us Message --}}
@endsection
@section('javascript')
    <script src="{{ asset('js/contact_us.js') }}"></script>
@endsection
