@extends('web.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('scss/managers/managers.css') }}" />
@endsection
@section('content')
    <main>
        <div class="background">
            <div class="col">
                <div class="one">
                    <img src="{{ asset('images/m-1.png') }}" alt="">
                    <img src="{{ asset('images/m-2.png') }}" alt="">
                    <img src="{{ asset('images/m-3.png') }}" alt="">
                    <img src="{{ asset('images/m-4.png') }}" alt="">
                    <img src="{{ asset('images/m-5.png') }}" alt="">
                    <img src="{{ asset('images/m-6.png') }}" alt="">
                    <img src="{{ asset('images/m-7.png') }}" alt="">
                </div>
            </div>
            <div class="col reverse">
                <div class="one">
                    <img src="{{ asset('images/m-1.png') }}" alt="">
                    <img src="{{ asset('images/m-2.png') }}" alt="">
                    <img src="{{ asset('images/m-3.png') }}" alt="">
                    <img src="{{ asset('images/m-4.png') }}" alt="">
                    <img src="{{ asset('images/m-5.png') }}" alt="">
                    <img src="{{ asset('images/m-6.png') }}" alt="">
                    <img src="{{ asset('images/m-7.png') }}" alt="">
                </div>
            </div>

            <div class="col ">
                <div class="one">
                    <img src="{{ asset('images/m-1.png') }}" alt="">
                    <img src="{{ asset('images/m-2.png') }}" alt="">
                    <img src="{{ asset('images/m-3.png') }}" alt="">
                    <img src="{{ asset('images/m-4.png') }}" alt="">
                    <img src="{{ asset('images/m-5.png') }}" alt="">
                    <img src="{{ asset('images/m-6.png') }}" alt="">
                    <img src="{{ asset('images/m-7.png') }}" alt="">
                </div>
            </div>
            <div class="col reverse">
                <div class="one">
                    <img src="{{ asset('images/m-1.png') }}" alt="">
                    <img src="{{ asset('images/m-2.png') }}" alt="">
                    <img src="{{ asset('images/m-3.png') }}" alt="">
                    <img src="{{ asset('images/m-4.png') }}" alt="">
                    <img src="{{ asset('images/m-5.png') }}" alt="">
                    <img src="{{ asset('images/m-6.png') }}" alt="">
                    <img src="{{ asset('images/m-7.png') }}" alt="">
                </div>
            </div>
            <div class="col">
                <div class="one">
                    <img src="{{ asset('images/m-1.png') }}" alt="">
                    <img src="{{ asset('images/m-2.png') }}" alt="">
                    <img src="{{ asset('images/m-3.png') }}" alt="">
                    <img src="{{ asset('images/m-4.png') }}" alt="">
                    <img src="{{ asset('images/m-5.png') }}" alt="">
                    <img src="{{ asset('images/m-6.png') }}" alt="">
                    <img src="{{ asset('images/m-7.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="overlay"></div>
        <div class="container">
            <div class="text">
                <span> اداره اعمال المنظمة </span>
            </div>
        </div>
    </main>

    {{-- Start managers Section --}}
    <section class="managers">
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
                <h2 class="h-2 title">اعضاء الإدارة</h2>
                <p class="description">يتشكل مجلس الإدارة من مجموعة من الأعضاء ذو
                    خبرات في مجالات مختلفة تساهم بشكل كبير من
                    قيادة المنظمة إلى التقدم بخط ً ثابتة نحو النجاح و تحقيق
                    أهدافه. </p>
                <div class="boxes">
                    <div class="all-box">
                        <div class="content">
                            <img src="{{ asset('images/m-2.png') }}" alt="">
                            <div class="text">
                                <h3>هشام محمود الحاج</h3>
                                <p>رئيس المجلس</p>
                            </div>
                        </div>
                        <div class="content">
                            <img src="{{ asset('images/m-1.png') }}" alt="">
                            <div class="text">
                                <h3>ماجيد سند السماوي</h3>
                                <p>نائب رئيس المجلس</p>
                            </div>
                        </div>
                        <div class="content">
                            <img src="{{ asset('images/m-5.png') }}" alt="">
                            <div class="text">
                                <h3>علي محمد علي الشميري</h3>
                                <p> عضو</p>
                            </div>
                        </div>
                        <div class="content">
                            <img src="{{ asset('images/m-4.png') }}" alt="">
                            <div class="text">
                                <h3>وليد محمد احمد</h3>
                                <p> عضو</p>
                            </div>
                        </div>

                        <div class="content">
                            <img src="{{ asset('images/m-3.png') }}" alt="">
                            <div class="text">
                                <h3>محمد عبداالله نايف</h3>
                                <p> عضو</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="boxes">
                    <h2 class="h-2"> هيئة الرقابة الشرعية في المنظمه</h2>
                    <div class="all-box">
                        <div class="content">
                            <img src="{{ asset('images/m-1.png') }}" alt="">
                            <div class="text">
                                <h3>عبداالله علي احمد</h3>
                                <p>عضو</p>
                            </div>
                        </div>

                        <div class="content">
                            <img src="{{ asset('images/m-6.png') }}" alt="">
                            <div class="text">
                                <h3>مها عبده محمد</h3>
                                <p>عضو</p>
                            </div>
                        </div>

                        <div class="content">
                            <img src="{{ asset('images/m-5.png') }}" alt="">
                            <div class="text">
                                <h3>محمد إبراهيم حسن</h3>
                                <p> عضو</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="boxes">
                    <h2 class="h-2">المحاسبون القانونيون</h2>
                    <div class="all-box">
                        <div class="content">
                            <img src="{{ asset('images/m-8.png') }}" alt="">
                            <div class="text">
                                <h3>سلمان اصيل ايمن العريقي</h3>
                                <p>عضو</p>
                            </div>
                        </div>

                        <div class="content">
                            <img src="{{ asset('images/m-3.png') }}" alt="">
                            <div class="text">
                                <h3>حسين حسن الحسن</h3>
                                <p>عضو</p>
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
@section('javascript')
    <script src="{{ asset('js/manager_page.js') }}"></script>
@endsection
