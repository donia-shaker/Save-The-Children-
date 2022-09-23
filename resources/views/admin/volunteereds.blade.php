@extends('admin.layout.dashboard')
@section('content')

    @if ($do == 'Manage')
        <!-- Start Show volunteereds Content -->
        <x-table>
            <x-slot name='tableName'>التطوع</x-slot>
            <x-slot name='button'>
                <a href="volunteereds?do=Add">
                    <button type="button" class="btn text-white p-2 my-3 w-25"
                        style="background-color:#111 !important;">
                        اضافه بيانات تطوع
                    </button>
                </a>
            </x-slot>
            <x-slot name='tableHead'>
                <th >#</th>
                <th   class="text-wrap d-flex" >الوصف</th>
                <th >الخدمة</th>
                <th > محتوى الصفحة</th>
                <th >الحالة</th>
                <th >العمليات</th>
            </x-slot>
            <x-slot name='tableBody'>
                <?php $i = 1; ?>
                @foreach ($volunteereds as $volunteered)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $volunteered->description !!}</td>
                        <td style="white-space: nowrap;">{{ $volunteered->service->name }}</td>
                        @if ($volunteered->page_content != null)
                            <td style="white-space: nowrap;"><a href="" class="text-info">انقر لعرض  محتوى الصفحة </a></td>
                        @else
                            <td style="white-space: nowrap;" class="text-danger">لايوجد محتوى للصفحة</td>
                        @endif
                        <td>
                            @if ($volunteered->is_active)
                                <span class="badge bg-label-info me-1">مفعل</span>
                            @else
                                <span class="badge bg-label-danger me-1">موقف</span>
                            @endif
                        </td>
                        <td style="white-space: nowrap;">
                            @if ($volunteered->is_active)
                                <a class="btn btn-icon text-info btn-outline-info mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $volunteered->id }}">
                                    <i class="bx bx-show"></i>
                                </a>
                            @else
                                <a class="btn btn-icon btn-outline-secondary mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $volunteered->id }}">
                                    <i class="bx bx-hide "></i>
                                </a>
                            @endif
                            <x-modal id='activeModal{{ $volunteered->id }}'>
                                <x-slot name='title'>حالة التطوع</x-slot>
                                <x-slot name='message'>هل انت متاكد انك تريد تغيير حالة التطوع</x-slot>
                                <x-slot name='link'>{{ route('active_volunteered', $volunteered->id) }}</x-slot>
                                <x-slot name='action'>
                                    <button type="button" class="btn btn-danger"> تغيير حالة التطوع</button>
                                </x-slot>
                            </x-modal>
                            <a href="volunteereds?do=Edit&Id={{ $volunteered->id }}"
                                class="btn btn-icon btn-outline-success mx-1">
                                <i class="tf-icons bx bx-edit-alt me-1"></i>
                            </a>
                            <a class="btn btn-icon btn-outline-dribbble text-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $volunteered->id }}">
                                <i class="tf-icons bx bx-trash me-1"></i>
                            </a>
                            <x-modal id='deleteModal{{ $volunteered->id }}'>
                                <x-slot name='title'>حذف التطوع</x-slot>
                                <x-slot name='message'>هل انت متاكد انك تريد حذف بيانات التطوع</x-slot>
                                <x-slot name='link'>{{ route('delete_volunteered', $volunteered->id) }}</x-slot>
                                <x-slot name='action'>
                                    <button type="button" class="btn btn-danger"> حذف التطوع</button>
                                </x-slot>
                            </x-modal>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        <!-- End Show volunteereds Content -->
    @elseif ($do == 'Add')
        {{-- Start Add volunteered --}}
        <x-form action="{{ route('add_volunteered') }}">
            <x-slot name='title'> اضافه بيانات تطوع </x-slot>
            <x-slot name='formInput'>

                <div class="col-md-6 my-3">
                    <label for="defaultFormControlInput" class="form-label "> الخدمة </label>
                    <select name="service_id" class="px-5 py-2" id="">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (AR)</label>
                    <textarea  class="form-control" name="descriptionAr" cols="30" rows="10" >{{ old('descriptionAr') }}</textarea>
                    @error('descriptionAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (EN)</label>
                    <textarea  class="form-control" name="descriptionEn" cols="30" rows="10" >{{ old('descriptionEn') }}</textarea>
                    @error('descriptionEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label fs-6" for="multicol-username"> محتوى الصفحة (AR)</label>
                    <textarea  class="form-control" name="page_contentAr" cols="30" rows="10" >{{ old('page_contentAr') }}</textarea>
                    @error('page_contentAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label fs-6" for="multicol-username"> محتوى الصفحة (EN)</label>
                    <textarea  class="form-control" name="page_contentEn" cols="30" rows="10" >{{ old('page_contentEn') }}</textarea>
                    @error('page_contentEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
            </x-slot>
            <x-slot name='action'>اضافة</x-slot>
        </x-form>
        {{-- End Add volunteered --}}
    @elseif ($do == 'Edit')
        {{-- Start Edit volunteered --}}
        <x-form action="{{ route('update_volunteered', $volunteered->id) }}">
            <x-slot name='title'> تعديل معلومات التطوع</x-slot>
            <x-slot name='formInput'>
                <div class="col-md-6 my-3">
                    <label for="defaultFormControlInput" class="form-label "> الخدمة </label>
                    <select name="service_id" class="px-5 py-2" id="">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (AR)</label>
                    <textarea  class="form-control" name="descriptionAr" cols="30" rows="10" >{{ $volunteered->getTranslation('description', 'ar') }}</textarea>
                    @error('descriptionAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (EN)</label>
                    <textarea  class="form-control" name="descriptionEn" cols="30" rows="10" >{{ $volunteered->getTranslation('description', 'en') }}</textarea>
                    @error('descriptionEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label fs-6" for="multicol-username"> محتوى الصفحة (AR)</label>
                    <textarea  class="form-control" name="page_contentAr" cols="30" rows="10" >{{$volunteered->getTranslation('page_content', 'ar') }}</textarea>
                    @error('page_contentAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12 my-3">
                    <label class="form-label fs-6" for="multicol-username"> محتوى الصفحة (EN)</label>
                    <textarea  class="form-control" name="page_contentEn" cols="30" rows="10" >{{$volunteered->getTranslation('page_content', 'ar') }}</textarea>
                    @error('page_contentEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
            </x-slot>
            <x-slot name='action'>تعديل</x-slot>
        </x-form>
        {{-- End Edit volunteered --}}
    @endif
@endsection
@section('javaScript')
<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script>
        CKEDITOR.replace('descriptionAr');
        CKEDITOR.replace('descriptionEn');
        CKEDITOR.replace('page_contentAr');
        CKEDITOR.replace('page_contentEn');
    </script>
@endsection