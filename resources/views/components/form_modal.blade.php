<div class="modal fade position-fixed edit_modal" {{ $attributes }} tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $body }}
            </div>
            <div class="modal-footer col-12 text-center">
                {{ $submit }}
                <button type="reset" class="btn btn-label-secondary btn-reset mt-3"  data-bs-dismiss="modal" aria-label="Close">الغاء</button>
            </div>
        </div>
    </div>
</div>
