@extends('admin.layout.dashboard')
@section('content')

    @if ($do == 'Manage')
        <!-- Start Show reports Content -->
        <x-table>
            <x-slot name='tableName'>التقارير</x-slot>
            <x-slot name='button'>
                <a href="reports?do=Add">
                    <button type="button" class="btn text-white p-2 my-3 w-25"
                    style="background-color: #111 !important;">
                        اضافه تقرير
                    </button>
                </a>
            </x-slot>
            <x-slot name='tableHead'>
                <tr>
                    <th>#</th>
                    <th>العنوان </th>
                    <th>وصف التقرير</th>
                    <th> الحاله</th>
                    <th>العمليات</th>
                </tr>
            </x-slot>
            <x-slot name='tableBody'>
                <?php $i = 1; ?>
                @foreach ($reports as $report)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $report->title }}</td>
                        <td>
                            <a href="reports?do=Edit&Id={{ $report->id }}" class="text-info">
                                معلومات التقرير
                            </a>
                        </td>
                        <td>
                            @if ($report->is_active)
                                <span class="badge bg-label-info me-1">مفعل</span>
                            @else
                                <span class="badge bg-label-danger me-1">موقف</span>
                            @endif
                        </td>
                        <td>
                            @if ($report->is_active)
                                <a class="btn btn-icon text-info btn-outline-info mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $report->id }}">
                                    <i class="bx bx-show"></i>
                                </a>
                            @else
                                <a class="btn btn-icon btn-outline-secondary mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $report->id }}">
                                    <i class="bx bx-hide "></i>
                                </a>
                            @endif
                            <x-modal id='activeModal{{ $report->id }}'>
                                <x-slot name='title'>حالة التقرير</x-slot>
                                <x-slot name='message'> هل انت متاكد انك تريد تغيير حالة التقرير</x-slot>
                                <x-slot name='link'>{{ route('active_report', $report->id) }}</x-slot>
                                <x-slot name='action'><button type="button" class="btn btn-danger"> تغيير حالة التقرير</button></x-slot>
                            </x-modal>
                            <a href="reports?do=Edit&Id={{ $report->id }}" class="btn btn-icon btn-outline-success mx-1">
                                <i class="tf-icons bx bx-edit-alt me-1"></i>
                            </a>
                            <a class="btn btn-icon btn-outline-dribbble text-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $report->id }}">
                                <i class="tf-icons bx bx-trash me-1"></i>
                            </a>
                            <x-modal id='deleteModal{{ $report->id }}'>
                                <x-slot name='title'>حذف التقرير</x-slot>
                                <x-slot name='message'>هل انت متاكد انك تريد حذف بيانات التقرير</x-slot>
                                <x-slot name='link'>{{ route('delete_report', $report->id) }}</x-slot>
                                <x-slot name='action'><button type="button" class="btn btn-danger"> حذف التقرير</button></x-slot>
                            </x-modal>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        <!-- End Show reports Content -->
    @elseif ($do == 'Add')
        {{-- Start Add report --}}
        <x-form action="{{ route('add_report') }}">
            <x-slot name='title'> اضافه تقرير جديدة</x-slot>
            <x-slot name='formInput'>
                <div class="col-md-6 mb-4">
                    <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                    <input type="text" name="titleAr" class="form-control  name ar" id="addreportsNameAr"
                        placeholder="اضف  تقارير" value="{{ old('titleAr') }}" aria-describedby="defaultFormControlHelp" />
                    @error('titleAr')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-4">
                    <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                    <input type="text" name="titleEn" class="form-control  " id="addreportsNameEn"
                        value="{{ old('titleEn') }}" placeholder="اسم  التقرير"
                        aria-describedby="defaultFormControlHelp" />
                    @error('titleEn')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-4">
                    <label for="defaultFormControlInput" class="form-label">ملف</label>
                    <input type="file" name="file"
                        oninput="previewImage.src=window.URL.createObjectURL(this.files[0])" class="form-control  "
                        id="addreportsPhone" placeholder="اضف ملف التقرير" aria-describedby="defaultFormControlHelp"
                        value="{{ old('file') }}" />
                    @error('file')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                        <img id="previewImage" style="max-height: 100px;">
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="defaultFormControlInput" class="form-label">( العربي) معلومات اخرى</label>
                    <textarea name="descriptionAr" id="" cols="30" rows="10"></textarea>
                    @error('descriptionAr')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-12 mb-4">
                    <label for="defaultFormControlInput" class="form-label">معلومات اخرى (انجليزي)</label>
                    <textarea name="descriptionEn" id="" cols="30" rows="10"></textarea>
                    @error('descriptionEn')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror
                </div>
            </x-slot>
            <x-slot name='action'>اضافة</x-slot>
        </x-form>
        {{-- End Add report --}}
    @elseif ($do == 'Edit')
        {{-- Start Edit report --}}
        <x-form action="{{ route('update_report', $report->id) }}">
            <x-slot name='title'> تعديل معلومات التقرير</x-slot>
            <x-slot name='formInput'>
                <input type="hidden" name="reportsId" value="{{ $report->id }}">
                <div class="col-md-6 mb-4">
                    <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                    <input type="text" name="titleAr" class="form-control"
                        value="{{ $report->getTranslation('title', 'ar') }}" id="addreportsNameAr"
                        placeholder="اسم  التقرير" aria-describedby="defaultFormControlHelp" />
                    @error('titleAr')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-4">
                    <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                    <input type="text" name="titleEn" class="form-control  " id="addreportsNameEn"
                        value="{{ $report->getTranslation('title', 'en') }}" placeholder="اسم  التقرير"
                        aria-describedby="defaultFormControlHelp" />
                    @error('titleEn')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-4">
                    <label for="defaultFormControlInput" class="form-label">اضف التقرير بصيغة ملف  </label>
                    <input type="file" name="file"
                        oninput="previewImage.src=window.URL.createObjectURL(this.files[0])" class="form-control  "
                        id="addreportsPhone"  value="{{ $report->file }}"
                        aria-describedby="defaultFormControlHelp" />
                    @error('file')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror <div class="col-md-12 mb-2 my-2 m-auto">
                        <img id="previewImage" src="{{ URL::asset('images/' . $report->file) }}"
                            style="max-height: 100px;">
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="defaultFormControlInput" class="form-label">معلومات اخرى (انجليزي)</label>
                    <textarea type="text" name="descriptionAr" class="form-control"> {{ $report->getTranslation('description', 'ar') }}
                    </textarea>
                    @error('descriptionAr')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-12 mb-4">
                    <label for="defaultFormControlInput" class="form-label">معلومات اخرى (انجليزي)</label>
                    <textarea type="text" name="descriptionEn" class="form-control  ">{{ $report->getTranslation('description', 'en') }}
                                        </textarea>
                    @error('descriptionEn')
                        <span class="help-block text-danger">* {{ $message }} </span>
                    @enderror
                </div>
            </x-slot>
            <x-slot name='action'>تعديل</x-slot>
        </x-form>
        {{-- End Edit report --}}
    @endif
@endsection
@section('javaScript')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('descriptionAr');
        CKEDITOR.replace('descriptionEn');
    </script>
@endsection
