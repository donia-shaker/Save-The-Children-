@extends('admin.layout.dashboard')
@section('content')
    <x-table>
        <x-slot name='tableName'>المستخدمين</x-slot>
        <x-slot name='button'>
            <a href="{{ route('register') }}">
                <button type="button" class="btn text-white p-2 my-3 w-25" style="background-color:#111 !important;">
                    اضافه مستخدم جديد
                </button>
            </a>
        </x-slot>
        <x-slot name='tableHead'>
            <th> الاسم </th>
            <th>الايميل</th>
            <th> الصلاحيات</th>
            <th>الحالة</th>
            <th>العمليات</th>
        </x-slot>
        <x-slot name='tableBody'>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="" class="pointer text-info " data-bs-toggle="modal"
                            data-bs-target="#editPermission{{ $user->id }}">
                            عرض الصلاحيات
                        </a>
                    </td>
                    <td>
                        @if ($user->is_active)
                            <span class="badge bg-label-info me-1">مفعل</span>
                        @else
                            <span class="badge bg-label-danger me-1">موقف</span>
                        @endif
                    </td>
                    <td>
                        @if ($user->is_active)
                            <a class="btn btn-icon text-info btn-outline-info mx-1 " data-bs-toggle="modal"
                                data-bs-target="#activeModal{{ $user->id }}">
                                <i class="bx bx-show"></i>
                            </a>
                        @else
                            <a class="btn btn-icon btn-outline-secondary mx-1 " data-bs-toggle="modal"
                                data-bs-target="#activeModal{{ $user->id }}">
                                <i class="bx bx-hide "></i>
                            </a>
                        @endif
                        <x-modal id='activeModal{{ $user->id }}'>
                            <x-slot name='title'>حالة المستخدم</x-slot>
                            <x-slot name='message'>هل انت متاكد انك تريد تغيير حالة المستخدم</x-slot>
                            <x-slot name='link'>{{ route('active_user', $user->id) }}
                            </x-slot>
                            <x-slot name='action'><button type="button" class="btn btn-danger"> تغيير حالة المستخدم </button></x-slot>
                        </x-modal>
                        <a class="btn btn-icon btn-outline-dribbble text-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $user->id }}">
                            <i class="tf-icons bx bx-trash me-1"></i>
                        </a>
                        <x-modal id='deleteModal{{ $user->id }}'>
                            <x-slot name='title'>حذف المستخدم</x-slot>
                            <x-slot name='message'>هل انت متاكد انك تريد حذف المستخدم</x-slot>
                            <x-slot name='link'>{{route('delete_user',$user->id)}}</x-slot>
                            <x-slot name='action'><button type="button" class="btn btn-danger">  حذف المستخدم </button></x-slot>
                        </x-modal>
                    </td>
                </tr>
                <!-- Updat SubCategory Modal -->
                <div class="modal fade" id="editPermission{{ $user->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                        <div class="modal-content p-3 p-md-5">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <div class="text-center mb-4">
                                    <h4 class="modal-title" id="userCrudModal">صلاحيات المستخدم</h4>
                                </div>
                                <form action="{{ route('updatePermission') }}" method="POST" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="editPermissionId" name="id" value="{{ $user->id }}">
                                    <input type="hidden" name="name" value="{{ $user->name }}">
                                    @if ($perimissions)
                                        @foreach ($perimissions as $perimission)
                                            <div class="form-group" style="font-size: 18px">
                                                <label for="{{ $perimission->name }}" class="my-2">
                                                    <input type="checkbox" name="permission[]"
                                                        id="{{ $perimission->name }}" value="{{ $perimission->name }}"
                                                        {{ $user->hasPermission($perimission->name) ? 'checked' : '' }}>
                                                    {{ $perimission->display_name }}
                                                </label>
                                            </div>
                                            {{-- @endforeach --}}
                                        @endforeach
                                    @endif

                                    <div class="col-12 text-center">
                                        <button type="submit"
                                            class="btn text-white me-sm-3 me-1 mt-3 updateSubCategory color">تعديل</button>
                                        <button type="reset" class="btn btn-label-secondary btn-reset mt-3"
                                            data-bs-dismiss="modal" aria-label="Close">الغاء</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Updat SubCategory Modal -->
            @endforeach
        </x-slot>
    </x-table>
@endsection
