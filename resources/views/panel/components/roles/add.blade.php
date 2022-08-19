<form action="{{ route('panel.roles.add.role') }}" method="post" class="ajaxForm">
    @csrf
    <div class="add-new-data">
        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
                <h4 class="text-uppercase">اضافه کردن ردیف جدید</h4>
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
                        <input name="name" type="text" class="form-control" id="name">
                        <small class="text-danger error-name"></small>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="details">جزئیات</label>
                        <input type="text" name="details" class="form-control" id="details">
                        <small class="text-danger error-details"></small>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="guard_name">guarded</label>
                        <select name="guard_name" class="form-control select2" id="guard_name">
                            <option value="web">web</option>
                            <option value="telegram">telegram</option>
                        </select>
                        <small class="text-danger error-guard_name"></small>
                    </div>
                </div>

            </div>
        </div>
        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
                <button class="btn btn-primary">اضافه کردن</button>
            </div>
            <div class="cancel-data-btn">
                <button class="btn btn-outline-danger">کنسل</button>
            </div>
        </div>
    </div>

</form>
