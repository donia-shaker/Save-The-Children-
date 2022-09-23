@extends('admin.layout.dashboard')
@section('content')
    <div class=" col-12 col-md-8 col-lg-6 mx-auto " style="margin-top: -60px">
        <!-- show message -->
        <x-message></x-message>

        {{-- add user --}}
        <x-form action="{{ route('save_user') }}">
            <x-slot name='title'>
                <h2 class="text-center"> اضافه حساب جديدة 🚀</h2>
            </x-slot>
            <x-slot name='formInput'>
                <div class="mb-3">
                    <label for="name" class="form-label">ادخل لاسم</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                        autofocus>
                    @error('name')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">ادخل الايميل</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Enter your email">

                        @error('email')
                            <span class="help-block text-danger">* {{ $message }} </span>
                        @enderror
                        <div class="col-md-12 mb-2 my-2 m-auto"></div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">ادخل كلمة المرور</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        @error('password')
                            <span class="help-block text-danger">* {{ $message }} </span>
                        @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                        </div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">قم بتاكيد كلمة المرور</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="confirmPass" class="form-control" name="confirmPass"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="confirm password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        @error('confirmPass')
                            <span class="help-block text-danger">* {{ $message }} </span>
                        @enderror <div class="col-md-12 mb-2 my-2 m-auto"></div>
                    </div>
            </x-slot>
            <x-slot name='action'> انشاء حساب</x-slot>
        </x-form>
    </div>
@endsection
