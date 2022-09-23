<div class="container-xxl flex-grow-1 container-p-y">
    <x-message></x-message>
    <div id="message"></div>

    <h4 class="fw-bold py-2 mb-3 fs-2"> {{$tableName}}</h4>

    <!-- Bordered Table -->
    <div class="card">
        <h5 class="card-header">{{$button}}</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        {{$tableHead}}
                    </thead>
                    <tbody>
                        {{$tableBody}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
</div>