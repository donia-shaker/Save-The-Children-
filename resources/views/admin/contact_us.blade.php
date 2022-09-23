@extends('admin.layout.dashboard')
@section('content')
    <!-- Basic Bootstrap Table -->
    <x-table>
        <x-slot name='tableName'> وسائل التواصل </x-slot>
        <x-slot name='button'>
            <button type="button" class="btn text-white p-2 my-3 w-25" style="background-color: #111 !important;"
            data-bs-toggle="modal" data-bs-target="#addSocialMediaModal" id="addcontact_us">
                اضافه وسائل تواصل 
            </button>
        </x-slot>
        <x-slot name='tableHead'>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الرابط او رقم الهاتف</th>
                <th>الايقونة</th>
                <th>الحاله</th>
                <th>العمليات</th>
            </tr>
        </x-slot>
        <x-slot name='tableBody'>
        </x-slot>
    </x-table>

    <!-- Add SocialMedia Modal -->
    <x-form_modal id="addSocialMediaModal">
        <x-slot name='title'>اضف وسيلة تواصل جديدة للموقع</x-slot>
        <x-slot name='body'>
            <div class="m-4">
                <form id="add_form" class="row g-3" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                        <input type="text" name="nameAr" id="addNameAr" class="form-control  name ar" 
                            placeholder="اضف اسم وسيلة التواصل AR" aria-describedby="defaultFormControlHelp" />
                        <span data-error='nameAr' class="help-block text-danger"></span>
                    </div>
                    <div>
                        <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                        <input type="text" name="nameEn"  class="form-control  name en" id="addNameEn"
                            placeholder="اضف اسم وسيلة التواصل EN" />
                        <span data-error='nameEn' class="help-block text-danger"></span>
                    </div>
                    <div>
                        <label for="defaultFormControlInput" class="form-label">ادخل الرابط</label>
                        <input type="text" name="link" id="addLink" class="form-control" 
                            placeholder="ادخل الرابط "  />
                        <span data-error='link' class="help-block text-danger"></span>
                    </div>
                    <div class="col-12 my-4">
                        <label for="defaultFormControlInput" class="form-label">اختر ايقونة</label>
                        <select name="icon" id="addIcon" class="fa p-2 fs-5 border w-100 h-10"
                            style="direction:ltr ; " >
                            <option value="fa fa-location-arrow" class="fa">&#xf124 (location)</option>
                            <option value="fa fa-globe" class="fa">&#xf0ac (site)</option>
                            <option value="fa fa-envelope" class="fa">&#xf0e0 (email)</option>
                            <option value="fa fa-mobile" class="fa">&#xf10b (mobile)</option>
                            <option value="fa fa-phone" class="fa">&#xf095 (phone)</option>
                            <option value="fa fa-whatsapp" class="fa">&#xf232 (whatsapp)</option>
                            <option value="fa fa-twitter" class="fa">&#xf099 (twitter)</option>
                            <option value="fa fa-facebook" class="fa">&#xf082 (facebook)</option>
                        </select>
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="form-password-toggle d-flex mt-5">
                            <label class="form-label fs-6 mx-3" for="multicol-confirm-password">تفعيل </label>
                            <div class="input-group input-group-merge ">
                                <label class="switch">
                                    <input id="add_is_active" value=1 type="checkbox" checked class="switch-input" />
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </x-slot>
        <x-slot name='submit'>
            <button type="submit" id="add" class="btn  me-sm-3 me-1 mt-3 text-white" style="background-color: #111 !important;">اضافة</button>
        </x-slot>
    </x-form_modal>
    <!--/ Add SocialMedia Modal -->


    <!-- Update contact_us model-->
    <x-form_modal id="updateSocialMediaModal">
        <x-slot name='title'>تعديل طريقة التواصل </x-slot>
        <x-slot name='body'>
            <div class="m-4">
                <div class="m-4">
                    <form id="updateSocialMediaMForm" class="row g-3" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="update_contactus_id">
                        <div>
                            <label for="defaultFormControlInput" class="form-label"> الاسم (عربي)</label>
                            <input type="text" name="nameAr" id="updateNameAr" class="form-control  name ar" 
                                placeholder="اضف اسم وسيلة التواصل AR" aria-describedby="defaultFormControlHelp" />
                            <span data-error='nameAr' class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">الاسم (انجليزي)</label>
                            <input type="text" name="nameEn"  class="form-control  name en" id="updateNameEn"
                                placeholder="اضف اسم وسيلة التواصل EN" />
                            <span data-error='nameEn' class="help-block text-danger"></span>
                        </div>
                        <div>
                            <label for="defaultFormControlInput" class="form-label">ادخل الرابط</label>
                            <input type="text" name="link" id="updateLink" class="form-control" 
                                placeholder="ادخل الرابط "  />
                            <span data-error='link' class="help-block text-danger"></span>
                        </div>
                        <div class="col-12 my-4">
                            <label for="defaultFormControlInput" class="form-label">اختر ايقونة</label>
                            <select name="icon" id="updateIcon" class="fa p-2 fs-5 border w-100 h-10"
                                style="direction:ltr ; " >
                                <option value="fa fa-location-arrow" class="fa">&#xf124 (location)</option>
                                <option value="fa fa-globe" class="fa">&#xf0ac (site)</option>
                                <option value="fa fa-envelope" class="fa">&#xf0e0 (email)</option>
                                <option value="fa fa-mobile" class="fa">&#xf10b (mobile)</option>
                                <option value="fa fa-phone" class="fa">&#xf095 (phone)</option>
                                <option value="fa fa-whatsapp" class="fa">&#xf232 (whatsapp)</option>
                                <option value="fa fa-twitter" class="fa">&#xf099 (twitter)</option>
                                <option value="fa fa-facebook" class="fa">&#xf082 (facebook)</option>
                            </select>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-password-toggle d-flex mt-5">
                                <label class="form-label fs-6 mx-3" for="multicol-confirm-password">تفعيل </label>
                                <div class="input-group input-group-merge ">
                                    <label class="switch">
                                        <input id="update_is_active" value=1 type="checkbox" checked class="switch-input" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot>
        <x-slot name='submit'>
            <button type="button" class="btn text-white" style="background-color: #111 !important;" id="update">تعديل بيانات القسم</button>
        </x-slot>
    </x-form_modal>
    <!-- End Update contact_us model-->

    <!-- active contact_us model-->
    <x-form_modal  id="active_contact_us">
        <x-slot name='title'>تغيير حالة وسيلة التواصل </x-slot>
        <x-slot name='body'>
            <div class="m-4">
                <h3>هل انت متاكد انك تريد تغيير حالة وسيلة التواصل</h3>
            </div>
        </x-slot>
        <x-slot name='submit'>
            <button type="button" class="btn text-white" style="background-color: #111 !important;" id="active">تغيير</button>
        </x-slot>
    </x-form_modal>
    <!-- End active contact_us model-->

    <!-- Delete contact_us model-->
    <x-form_modal  id="delete_contact_us">
        <x-slot name='title'>حذف وسيلة التواصل </x-slot>
        <x-slot name='body'>
            <div class="m-4">
                <h3>هل انت متاكد انك تريد الحذف</h3>
            </div>
        </x-slot>
        <x-slot name='submit'>
            <button type="button" class="btn btn-danger" id="delete">حذف</button>
        </x-slot>
    </x-form_modal>
    <!-- End Delete contact_us model-->
@endsection
@section('javaScript')
    <script src="{{ URL::asset('js/api/contact_us.js') }}"></script>
@endsection
