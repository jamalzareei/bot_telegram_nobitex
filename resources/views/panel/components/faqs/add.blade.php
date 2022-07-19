<form action="{{ route('panel.faq.add') }}" method="post" class="ajaxForm">
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
                        <label for="title">عنوان</label>
                        <input name="title" type="text" class="form-control" id="title">
                        <small class="text-danger error-title"></small>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="answer">جواب (answer)</label>
                        <input type="text" name="answer" class="form-control" id="answer">
                        <small class="text-danger error-answer"></small>
                    </div>



                    <div class="col-sm-12 data-field-col">
                        <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                            <p class="mb-0">active</p>
                            <input type="checkbox" name="actived_at" class="custom-control-input" id="actived_at"
                                checked="checked">
                            <label class="custom-control-label" for="actived_at">
                                <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                <span class="switch-icon-right"><i class="feather icon-times"></i></span>
                            </label>
                        </div>
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
