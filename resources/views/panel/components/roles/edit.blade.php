<script>
    $('.select2').select2();
</script>
<form action="{{ route('panel.roles.update.role') }}" method="post" class="ajaxForm">
    @csrf
    <input type="hidden" name="id" value="{{$role->id}}">
    <div class="edit-old-data" style="margin-left: 100%;">
        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
                <h4 class="text-uppercase">ویرایش</h4>
            </div>
            <div class="hide-data-sidebar">
                <i class="feather icon-x"></i>
            </div>
        </div>
        <div class="data-items pb-3">
            <div class="data-fields px-2 mt-3">

                <div class="row">
                    <div class="col-sm-12 data-field-col">
                        <label for="name">عنوان</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ $role->name }}">
                        <small class="text-danger error-name"></small>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="details">جزئیات</label>
                        <input type="text" name="details" class="form-control" id="details" value="{{ $role->details }}">
                        <small class="text-danger error-details"></small>
                    </div>
                </div>
            </div>

        </div>
        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
                <button class="btn btn-primary">ویرایش</button>
            </div>
            <div class="cancel-data-btn">
                <button class="btn btn-outline-danger">کنسل</button>
            </div>
        </div>
    </div>

</form>
