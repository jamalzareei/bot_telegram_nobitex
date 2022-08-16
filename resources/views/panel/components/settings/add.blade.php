<form action="{{ route('panel.settings.add.setting') }}" method="post" class="ajaxForm">
    @csrf
    <div class="add-new-data">
        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
                <h4 class="text-uppercase">اضافه کردن جدید</h4>
            </div>
            <div class="hide-data-sidebar">
                <i class="feather icon-x"></i>
            </div>
        </div>
        <div class="data-items pb-3">
            <div class="data-fields px-2 mt-3">

                <div class="row">
                    
                    <div class="col-sm-12 data-field-col">
                        <label for="role_id">سطح کاربری </label>
                        <select name="role_id" class="form-control select2" id="role_id">
                            <option value=""> --- انتخاب نمایید --- </option>
                            @isset($roles)
                                @forelse ($roles as $role)
                                    <option value="{{ $role->id }}"> {{ $role->name }}</option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                        <small class="text-danger error-role_id"></small>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="type_id">نوع </label>
                        <select name="type_id" class="form-control select2" id="type_id">
                            <option value=""> --- انتخاب نمایید --- </option>
                            @isset($types)
                                @forelse ($types as $type)
                                    <option value="{{ $type->id }}"> {{ $type->name }}</option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                        <small class="text-danger error-type_id"></small>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="value">مقدار</label>
                        <input name="value" type="text" class="form-control" id="value">
                        <small class="text-danger error-value"></small>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="details">توضیحات</label>
                        <input type="text" name="details" class="form-control" id="details">
                        <small class="text-danger error-details"></small>
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
