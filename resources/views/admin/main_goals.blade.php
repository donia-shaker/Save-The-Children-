@extends('admin.layout.dashboard')
@section('content')

    @if ($do == 'Manage')
        <!-- Start Show main_goals Content -->
        <x-table>
            <x-slot name='tableName'>الاهداف الرئيسية </x-slot>
            <x-slot name='button'>
                <a href="/main_goals/{{$service_id}}?do=Add">
                    <button type="button" class="btn text-white p-2 my-3 w-25"
                        style="background-color:#111 !important;">
                        اضافه هدف
                    </button>
                </a>
            </x-slot>
            <x-slot name='tableHead'>
                <th >#</th>
                <th > الاسم</th>
                <th   class="text-wrap d-flex" width="300">الوصف</th>
                <th >الحالة</th>
                <th >العمليات</th>
            </x-slot>
            <x-slot name='tableBody'>
                <?php $i = 1; ?>
                @foreach ($main_goals as $main_goal)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="white-space: nowrap;">{{ $main_goal->name }}</td>
                        <td>{{ $main_goal->description }}</td>
                        <td>
                            @if ($main_goal->is_active)
                                <span class="badge bg-label-info me-1">مفعل</span>
                            @else
                                <span class="badge bg-label-danger me-1">موقف</span>
                            @endif
                        </td>
                        <td style="white-space: nowrap;">
                            @if ($main_goal->is_active)
                                <a class="btn btn-icon text-info btn-outline-info mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $main_goal->id }}">
                                    <i class="bx bx-show"></i>
                                </a>
                            @else
                                <a class="btn btn-icon btn-outline-secondary mx-1 " data-bs-toggle="modal"
                                    data-bs-target="#activeModal{{ $main_goal->id }}">
                                    <i class="bx bx-hide "></i>
                                </a>
                            @endif
                            <x-modal id='activeModal{{ $main_goal->id }}'>
                                <x-slot name='title'>حالة الهدف</x-slot>
                                <x-slot name='message'>هل انت متاكد انك تريد تغيير حالة الهدف</x-slot>
                                <x-slot name='link'>{{ route('active_main_goal', $main_goal->id) }}</x-slot>
                                <x-slot name='action'>
                                    <button type="button" class="btn btn-danger"> تغيير حالة الهدف</button>
                                </x-slot>
                            </x-modal>
                            <a href="/main_goals/{{$service_id}}?do=Edit&Id={{ $main_goal->id }}"
                                class="btn btn-icon btn-outline-success mx-1">
                                <i class="tf-icons bx bx-edit-alt me-1"></i>
                            </a>
                            <a class="btn btn-icon btn-outline-dribbble text-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $main_goal->id }}">
                                <i class="tf-icons bx bx-trash me-1"></i>
                            </a>
                            <x-modal id='deleteModal{{ $main_goal->id }}'>
                                <x-slot name='title'>حذف الهدف</x-slot>
                                <x-slot name='message'>هل انت متاكد انك تريد حذف بيانات الهدف</x-slot>
                                <x-slot name='link'>{{ route('delete_main_goal', $main_goal->id) }}</x-slot>
                                <x-slot name='action'>
                                    <button type="button" class="btn btn-danger"> حذف الهدف</button>
                                </x-slot>
                            </x-modal>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-table>
        <!-- End Show main_goals Content -->
    @elseif ($do == 'Add')
        {{-- Start Add main_goal --}}
        <x-form action="{{ route('add_main_goal') }}">
            <x-slot name='title'> اضافه هدف جديدة</x-slot>
            <x-slot name='formInput'>
                <input type="hidden" name="service_id" value="{{$service_id}}">
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> اسم الهدف (AR)</label>
                    <input name="nameAr" value="{{ old('nameAr') }}" type="text" id="multicol-username"
                        class="form-control" />
                    @error('nameAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> اسم الهدف (EN)</label>
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
            </x-slot>
            <x-slot name='action'>اضافة</x-slot>
        </x-form>
        {{-- End Add main_goal --}}
    @elseif ($do == 'Edit')
        {{-- Start Edit main_goal --}}
        <x-form action="{{ route('update_main_goal', $main_goal->id) }}">
            <x-slot name='title'> تعديل معلومات الهدف</x-slot>
            <x-slot name='formInput'>
                <input type="hidden" name="service_id" value="{{$service_id}}">
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username"> اسم الهدف (AR)</label>
                    <input name="nameAr" value="{{ $main_goal->getTranslation('name', 'ar') }}" type="text"
                        id="multicol-username" class="form-control" />
                    @error('nameAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-2">
                    <label class="form-label fs-6" for="multicol-username"> اسم الهدف (EN)</label>
                    <input name="nameEn" value="{{ $main_goal->getTranslation('name', 'en') }}" type="text"
                        id="multicol-username" class="form-control" />
                    @error('nameEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (AR)</label>
                    <textarea  class="form-control" name="descriptionAr" cols="30" rows="10" >{{ $main_goal->getTranslation('description', 'ar') }}</textarea>
                    @error('descriptionAr')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6 my-3">
                    <label class="form-label fs-6" for="multicol-username"> الوصف (EN)</label>
                    <textarea  class="form-control" name="descriptionEn" cols="30" rows="10" >{{ $main_goal->getTranslation('description', 'en') }}</textarea>
                    @error('descriptionEn')
                        <span class="text-end text-danger">* {{ $message }} </span>
                    @enderror
                </div>

            </x-slot>
            <x-slot name='action'>تعديل</x-slot>
        </x-form>
        {{-- End Edit main_goal --}}
    @endif
@endsection
@section('javaScript')
