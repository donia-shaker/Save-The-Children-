@extends('admin.layout.dashboard')
@section('content')
@if (session()->has('success'))
    <div class="alert bg_color message_animation">
        {{ session()->get('success') }}
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger message_animation">
        {{ session()->get('error') }}
    </div>
@endif
@foreach ($webSiteInfo as $website)
    <div class="col-md-12 m-auto">
        <div class="card mb-4 p-4 ">
            <h1 class="text-start fs-3 "> {!! $website->getTranslation('table_key','ar') !!} </h1>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form class="row g-3" action="{{ route('editwebsite',$website->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="websiteId" value="{{ $website->id }}">
                    <input type="hidden" name="table_key_ar" value="{{ $website->getTranslation('table_key','ar') }}">
                    <input type="hidden" name="table_key_en" value="{{ $website->getTranslation('table_key','en') }}">
                    
                    <div class="col-md-12">
                        <label for="defaultFormControlInput" class="form-label">محتوى الصفحة AR</label>
                        <textarea type="text" name="table_valueAr" class="form-control"> {{ $website->getTranslation('table_value','ar') }}
                        </textarea>
                        @error('table_valueAr')
                            <span class="help-block text-danger">* {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="defaultFormControlInput" class="form-label">محتوى الصفحة EN</label>
                        <textarea type="text" name="table_valueEn" class="form-control  ">{{ $website->getTranslation('table_value', 'en') }}
                    </textarea>
                        @error('table_valueEn')
                            <span class="help-block text-danger">* {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-12 text-center">
                        <button type="mit" class="btn color me-sm-3 me-1 mt-3 addwebsite">
                            نعديل معلومات الصفحة</button>
                        <button type="reset" class="btn btn-label-secondary  btn-reset mt-3" data-bs-dismiss="modal"
                            aria-label="Close">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
@section('javaScript')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('table_valueAr');
        CKEDITOR.replace('table_valueEn');
    </script>
@endsection