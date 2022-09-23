@extends('admin.layout.dashboard')
@section('content')

    @if ($do == 'Manage')
        <!-- Start Show projects Content -->
        <x-table>
            <x-slot name='tableName'>المشاريع </x-slot>
            <x-slot name='button'>
                <a href="projects?do=Add">
                    <button type="button" class="btn text-white p-2 my-3 w-25"
                        style="background-color:#111 !important;">
                        اضافه مشروع
                    </button>
                </a>
            </x-slot>
            <x-slot name='tableHead'>
                <th >#</th>
                <th >اسم المشروع </th>
                <th   class="text-wrap d-flex" width="300">الوصف</th>
                <th style="white-space: nowrap; padding:10px 20px 10px 140px" width =200>صورة المشروع</th>
                <th >عرض الصفحة </th>
                <th >الحالة</th>
                <th >العمليات</th>
            </x-slot>
            <x-slot name='tableBody'>
                <?php $i = 1; ?>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="white-space: nowrap;">{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
                        <td style="white-space: nowrap;">
                            <img class="img-fluid rounded"  width="200px"
                                src="{{ asset("images/$project->image") }}">
                        </td>
                        <td style="white-space: nowrap;"><a class="text-info">انقر لعرض الصفحة  </a></td>
                        <td>
                            @if ($project->is_active)
                                <span class="badge bg-label-info me-1">مفعل</span>
                            @else
                                <span class="badge bg-label-danger me-1">موقف</span>
                            @endif
                        </td>
                        <td style="white-space: nowrap;">
                            @if ($project->is_active)
                                <a class="btn btn-icon text-info btn-outline-info mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $project->id }}">
                                    <i class="bx bx-show"></i>
                                </a>
                            @else
                                <a class="btn btn-icon btn-outline-secondary mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $project->id }}">
                                    <i class="bx bx-hide "></i>
                                </a>
                            @endif
                            <x-modal id='activeModal{{ $project->id }}'>
                                <x-slot name='title'>حالة المشروع</x-slot>
                                <x-slot name='message'>هل انت متاكد انك تريد تغيير حالة المشروع</x-slot>
                                <x-slot name='link'>{{ route('active_project', $project->id) }}</x-slot>
                                <x-slot name='action'>
                                    <button type="button" class="btn btn-danger"> تغيير حالة المشروع</button>
                                </x-slot>
                            </x-modal>
                            <a href="projects?do=Edit&Id={{ $project->id }}"
                                class="btn btn-icon btn-outline-success mx-1">
                                <i class="tf-icons bx bx-edit-alt me-1"></i>
                            </a>
                            <a class="btn btn-icon btn-outline-dribbble text-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $project->id }}">
                                <i class="tf-icons bx bx-trash me-1"></i>
                            </a>
                            <x-modal id='deleteModal{{ $project->id }}'>
                                <x-slot name='title'>حذف المشروع</x-slot>
                                <x-slot name='message'>هل انت متاكد انك تريد حذف بيانات المشروع</x-slot>
                                <x-slot name='link'>{{ route('delete_project', $project->id) }}</x-slot>
                                <x-slot name='action'>
                                    <button type="button" class="btn btn-danger"> حذف المشروع</button>
                                </x-slot>
                            </x-modal>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        <!-- End Show projects Content -->
    @elseif ($do == 'Add')
        {{-- Start Add project --}}
        <x-form action="{{ route('add_project') }}">
            <x-slot name='title'> اضافه مشروع جديدة</x-slot>
            <x-slot name='formInput'>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> اسم المشروع (AR)</label>
                    <input name="nameAr" value="{{ old('nameAr') }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('nameAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> اسم المشروع (EN)</label>
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
        {{-- End Add project --}}
    @elseif ($do == 'Edit')
        {{-- Start Edit project --}}
        <x-form action="{{ route('update_project', $project->id) }}">
            <x-slot name='title'> تعديل معلومات المشروع</x-slot>
            <x-slot name='formInput'>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username"> اسم المشروع (AR)</label>
                    <input name="nameAr" value="{{ $project->getTranslation('name', 'ar') }}" type="text"
                        id="multicol-username" class="form-control" />
                    @error('nameAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username"> اسم المشروع (EN)</label>
                    <input name="nameEn" value="{{ $project->getTranslation('name', 'en') }}" type="text"
                        id="multicol-username" class="form-control" />
                    @error('nameEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (AR)</label>
                    <textarea  class="form-control" name="descriptionAr" cols="30" rows="10" >{{ $project->getTranslation('description', 'ar') }}</textarea>
                    @error('descriptionAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (EN)</label>
                    <textarea  class="form-control" name="descriptionEn" cols="30" rows="10" >{{ $project->getTranslation('description', 'en') }}</textarea>
                    @error('descriptionEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> محتوى الصفحة (AR)</label>
                    <textarea  class="form-control" name="page_contentAr" cols="30" rows="10" >{{$project->getTranslation('page_content', 'ar') }}</textarea>
                    @error('page_contentAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> محتوى الصفحة (EN)</label>
                    <textarea  class="form-control" name="page_contentEn" cols="30" rows="10" >{{$project->getTranslation('page_content', 'ar') }}</textarea>
                    @error('page_contentEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-email">صورة </label>
                    <div class="input-group input-group-merge">
                        <input name="image" value="{{ $project->image }}" type="file" class="form-control"
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
        {{-- End Edit project --}}
    @endif
@endsection
@section('javaScript')
<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script>
        CKEDITOR.replace('page_contentAr');
        CKEDITOR.replace('page_contentEn');
    </script>
@endsection