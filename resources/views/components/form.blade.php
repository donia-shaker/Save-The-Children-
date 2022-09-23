<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-3 fs-2">{{$title}}</h4>

    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">

        <form class="card-body row" {{$attributes }} method="POST" enctype="multipart/form-data">
            @csrf
            {{$formInput}}

            <div class="col-md-6 my-2">
                <div class="form-password-toggle d-flex mt-5">
                    <label class="form-label fs-6 mx-3" for="multicol-confirm-password">تفعيل </label>
                    <div class="input-group input-group-merge ">
                        <label class="switch">
                            <input name="is_active" value=1 type="checkbox" checked class="switch-input" />
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="pt-4">
                <button type="submit" class="btn text-white me-sm-3 me-1"
                style="background-color:#111 !important;">{{$action}}</button>
                <button type="reset" class="btn btn-label-secondary">الغاء</button>
            </div>
        </form>
    </div>

</div>