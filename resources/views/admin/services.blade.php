@extends('admin.layout.dashboard')
@section('content')

    @if ($do == 'Manage')
        <!-- Start Show Services Content -->
        <x-table>
            <x-slot name='tableName'>الخدمات</x-slot>
            <x-slot name='button'>
                <a href="services?do=Add">
                    <button type="button" class="btn text-white p-2 my-3 w-25"
                        style="background-color:#111 !important;">
                        اضافه خدمة
                    </button>
                </a>
            </x-slot>
            <x-slot name='tableHead'>
                <th >#</th>
                <th >اسم الخدمة </th>
                <th   class="text-wrap d-flex" width="300">الوصف</th>
                <th style="white-space: nowrap; padding:10px 20px 10px 140px" width =200>صورة الخلفية</th>
                <th >الاهداف الرئيسية </th>
                <th >الحالة</th>
                <th >العمليات</th>
            </x-slot>
            <x-slot name='tableBody'>
                <?php $i = 1; ?>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="white-space: nowrap;">{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td style="white-space: nowrap;">
                            <img class="img-fluid rounded"  width="200px"
                                src="{{ asset("images/$service->background_image") }}">
                        </td>
                        <td style="white-space: nowrap;"><a href="{{route('main_goals',$service->id)}}" class="text-info">انقر لعرض الاهداف الرئيسية </a></td>
                        <td>
                            @if ($service->is_active)
                                <span class="badge bg-label-info me-1">مفعل</span>
                            @else
                                <span class="badge bg-label-danger me-1">موقف</span>
                            @endif
                        </td>
                        <td style="white-space: nowrap;">
                            @if ($service->is_active)
                                <a class="btn btn-icon text-info btn-outline-info mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $service->id }}">
                                    <i class="bx bx-show"></i>
                                </a>
                            @else
                                <a class="btn btn-icon btn-outline-secondary mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $service->id }}">
                                    <i class="bx bx-hide "></i>
                                </a>
                            @endif
                            <x-modal id='activeModal{{ $service->id }}'>
                                <x-slot name='title'>حالة الخدمة</x-slot>
                                <x-slot name='message'>هل انت متاكد انك تريد تغيير حالة الخدمة</x-slot>
                                <x-slot name='link'>{{ route('active_service', $service->id) }}</x-slot>
                                <x-slot name='action'>
                                    <button type="button" class="btn btn-danger"> تغيير حالة الخدمة</button>
                                </x-slot>
                            </x-modal>
                            <a href="services?do=Edit&Id={{ $service->id }}"
                                class="btn btn-icon btn-outline-success mx-1">
                                <i class="tf-icons bx bx-edit-alt me-1"></i>
                            </a>
                            <a class="btn btn-icon btn-outline-dribbble text-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $service->id }}">
                                <i class="tf-icons bx bx-trash me-1"></i>
                            </a>
                            <x-modal id='deleteModal{{ $service->id }}'>
                                <x-slot name='title'>حذف الخدمة</x-slot>
                                <x-slot name='message'>هل انت متاكد انك تريد حذف بيانات الخدمة</x-slot>
                                <x-slot name='link'>{{ route('delete_service', $service->id) }}</x-slot>
                                <x-slot name='action'>
                                    <button type="button" class="btn btn-danger"> حذف الخدمة</button>
                                </x-slot>
                            </x-modal>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        <!-- End Show Services Content -->
    @elseif ($do == 'Add')
        {{-- Start Add service --}}
        <x-form action="{{ route('add_service') }}">
            <x-slot name='title'> اضافه خدمة جديدة</x-slot>
            <x-slot name='formInput'>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> اسم الخدمة (AR)</label>
                    <input name="nameAr" value="{{ old('nameAr') }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('nameAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> اسم الخدمة (EN)</label>
                    <input name="nameEn" value="{{ old('nameEn') }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('nameEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (AR)</label>
                    <textarea  class="form-control" name="descriptionAr" cols="30" rows="10" >{{ old('descriptionAr') }}</textarea>
                    @error('descriptionAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (EN)</label>
                    <textarea  class="form-control" name="descriptionEn" cols="30" rows="10" >{{ old('descriptionEn') }}</textarea>
                    @error('descriptionEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الجملة (AR)</label>
                    <textarea  class="form-control" name="sentenceAr" cols="30" rows="10" >{{ old('sentenceAr') }}</textarea>
                    @error('sentenceAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الجملة (EN)</label>
                    <textarea  class="form-control" name="sentenceEn" cols="30" rows="10" >{{ old('sentenceEn') }}</textarea>
                    @error('sentenceEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-email">صورة </label>
                    <div class="input-group input-group-merge">
                        <input name="image" value="{{ old('image') }}" type="file" class="form-control"
                            oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                            aria-describedby="multicol-email2" />
                    </div>
                    @error('image')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                    <img id="previewImage" style="max-height: 100px;">
                </div>
            </x-slot>
            <x-slot name='action'>اضافة</x-slot>
        </x-form>
        {{-- End Add service --}}
    @elseif ($do == 'Edit')
        {{-- Start Edit service --}}
        <x-form action="{{ route('update_service', $service->id) }}">
            <x-slot name='title'> تعديل معلومات الخدمة</x-slot>
            <x-slot name='formInput'>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username"> اسم الخدمة (AR)</label>
                    <input name="nameAr" value="{{ $service->getTranslation('name', 'ar') }}" type="text"
                        id="multicol-username" class="form-control" />
                    @error('nameAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username"> اسم الخدمة (EN)</label>
                    <input name="nameEn" value="{{ $service->getTranslation('name', 'en') }}" type="text"
                        id="multicol-username" class="form-control" />
                    @error('nameEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (AR)</label>
                    <textarea  class="form-control" name="descriptionAr" cols="30" rows="10" >{{ $service->getTranslation('description', 'ar') }}</textarea>
                    @error('descriptionAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (EN)</label>
                    <textarea  class="form-control" name="descriptionEn" cols="30" rows="10" >{{ $service->getTranslation('description', 'en') }}</textarea>
                    @error('descriptionEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الجملة (AR)</label>
                    <textarea  class="form-control" name="sentenceAr" cols="30" rows="10" >{{$service->getTranslation('sentence', 'ar') }}</textarea>
                    @error('sentenceAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الجملة (EN)</label>
                    <textarea  class="form-control" name="sentenceEn" cols="30" rows="10" >{{$service->getTranslation('sentence', 'ar') }}</textarea>
                    @error('sentenceEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-email">صورة </label>
                    <div class="input-group input-group-merge">
                        <input name="image" value="{{ $service->image }}" type="file" class="form-control"
                            oninput="previewImage.src=window.URL.createObjectURL(this.files[0])"
                            aria-describedby="multicol-email2" />
                    </div>
                    @error('image')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                    <img id="previewImage" style="max-height: 100px;">
                </div>
            </x-slot>
            <x-slot name='action'>تعديل</x-slot>
        </x-form>
        {{-- End Edit service --}}
    @endif
@endsection
@section('javaScript')
<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script>
        CKEDITOR.replace('sentenceAR');
        CKEDITOR.replace('sentenceEN');
    </script>
@endsection