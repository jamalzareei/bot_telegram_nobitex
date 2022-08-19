<script>
    $('.select2').select2();
</script>
<form action="{{ route('panel.telegram.update.route') }}" method="post" class="ajaxForm">
    @csrf
    <input type="hidden" name="id" value="{{$keyboardTelegram->id}}">
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
                        <label for="orderby">موقعیت نمایش</label>
                        <input name="orderby" type="number" class="form-control" id="orderby"
                        value="{{ $keyboardTelegram->orderby ?? '' }}">
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="text">عنوان</label>
                        <input name="text" type="text" class="form-control" id="text"
                            value="{{ $keyboardTelegram->text ?? '' }}">
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="parent_callback_data"> پرنت </label>
                        <select name="parent_callback_data" class="form-control select2" id="parent_callback_data">

                            <option value=""> --- انتخاب نمایید --- </option>
                            @isset($keyboradTelegramsAll)
                                @forelse ($keyboradTelegramsAll as $keyboard)
                                    <option value="{{ $keyboard->callback_data }}"
                                        {{ $keyboardTelegram && $keyboard->id == $keyboardTelegram->parent_id ? 'selected' : '' }}>
                                        {{ $keyboard->text }}
                                    </option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="next_callback_data">مسیر بعدی</label>
                        <select name="next_callback_data" class="form-control select2" id="next_callback_data">
                            <option value=""> --- انتخاب نمایید --- </option>
                            @isset($keyboradTelegramsAll)
                                @forelse ($keyboradTelegramsAll as $keyboard)
                                    <option value="{{ $keyboard->callback_data }}"
                                        {{ $keyboardTelegram && $keyboard->callback_data == $keyboardTelegram->next_callback_data ? 'selected' : '' }}>
                                        {{ $keyboard->text }}</option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="type">نوع</label>
                        <select name="type" class="form-control select2" id="type">
                            <option value="text"
                                {{ $keyboardTelegram && 'text' == $keyboardTelegram->type ? 'selected' : '' }}>text
                            </option>
                            <option value="keyboard"
                                {{ $keyboardTelegram && 'keyboard' == $keyboardTelegram->type ? 'selected' : '' }}>
                                keyboard</option>
                            <option value="inline_keyboard"
                                {{ $keyboardTelegram && 'inline_keyboard' == $keyboardTelegram->type ? 'selected' : '' }}>
                                inline_keyboard</option>
                        </select>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="url">آدرس اینترنتی</label>
                        <input name="url" type="text" class="form-control" id="url"
                            value="{{ $keyboardTelegram->url ?? '' }}">
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="callback_data">اسلاگ (callback_data)</label>
                        <input type="text" name="callback_data" class="form-control" id="callback_data"
                            value="{{ $keyboardTelegram->callback_data ?? '' }}">
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="children_type">نوع فرزندان (children_type)</label>
                        <select name="children_type" class="form-control select2" id="children_type">
                            <option value="text"
                                {{ $keyboardTelegram && 'text' == $keyboardTelegram->children_type ? 'selected' : '' }}>
                                text</option>
                            <option value="keyboard"
                                {{ $keyboardTelegram && 'keyboard' == $keyboardTelegram->children_type ? 'selected' : '' }}>
                                keyboard</option>
                            <option value="inline_keyboard"
                                {{ $keyboardTelegram && 'inline_keyboard' == $keyboardTelegram->children_type ? 'selected' : '' }}>
                                inline_keyboard</option>
                        </select>
                    </div>

                    <div class="col-sm-12 data-field-col">
                        <label for="same_callback_data">اسلاگ یکسان شده (same_callback_data)</label>
                        <select name="same_callback_data" class="form-control select2" id="same_callback_data">
                            <option value=""> --- انتخاب نمایید --- </option>
                            @isset($keyboradTelegramsAll)
                                @forelse ($keyboradTelegramsAll as $keyboard)
                                    <option value="{{ $keyboard->callback_data }}"
                                        {{ $keyboardTelegram && $keyboard->callback_data == $keyboardTelegram->same_callback_data ? 'selected' : '' }}>
                                        {{ $keyboard->text }}</option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>

                    <div class="col-sm-12 data-field-col">
                        <label for="method_telegram">فانکشن تلگرام (method)</label>
                        <input type="text" name="method_telegram" class="form-control" id="method_telegram"
                            value="{{ $keyboardTelegram->method_telegram ?? '' }}">
                    </div>

                    <div class="col-sm-12 data-field-col">
                        <label for="file">آدرس اینترنتی فایل یا فایل ای دی تلگرام (file)</label>
                        <input type="text" name="file" class="form-control" id="file"
                            value="{{ $keyboardTelegram->file ?? '' }}">
                    </div>

                    <div class="col-sm-12 data-field-col">
                        <label for="details">جزئیات (details)</label>
                        <textarea name="details" id="details" cols="30" class="form-control" rows="5">{{ $keyboardTelegram->details ?? '' }}</textarea>
                    </div>

                    <div class="col-sm-12 data-field-col">
                        <label for="controller_method">کنترلر_متد (controller@method)</label>
                        <select name="controller_method" class="form-control select2" id="controller_method">
                            <option value=""> --- انتخاب نمایید --- </option>
                            @isset($controllers)
                                @forelse ($controllers as $controller)
                                    <option value="{{ $controller }}"
                                        {{ $keyboardTelegram && $controller == $keyboardTelegram->controller_method ? 'selected' : '' }}>
                                        {{ $controller }}</option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>
                    
                    <div class="col-sm-12 data-field-col">
                        <label for="controller_method_child">کنترلر_متد_فرزند (controller@method)</label>
                        <select name="controller_method_child" class="form-control select2" id="controller_method_child">
                            <option value=""> --- انتخاب نمایید --- </option>
                            @isset($controllers)
                                @forelse ($controllers as $controller)
                                    <option value="{{ $controller }}"
                                    {{ $keyboardTelegram && $controller == $keyboardTelegram->controller_method_child ? 'selected' : '' }}> {{ $controller }}</option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="chunk_children">chunk_children</label>
                        <input type="text" name="chunk_children" class="form-control" id="chunk_children"
                            value="{{ $keyboardTelegram->chunk_children ?? '' }}">
                    </div>
                    <div class="col-sm-12 data-field-col">
                        <label for="status_id">status</label>
                        <select name="status_id" class="form-control select2" id="status_id">
                            <option value=""> --- انتخاب نمایید --- </option>
                            @isset($statuses)
                                @forelse ($statuses as $status)
                                    <option value="{{ $status->id }}"
                                        {{ $keyboardTelegram && $status->id == $keyboardTelegram->status_id ? 'selected' : '' }}>
                                        {{ $status->name }}</option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>
                    
                    <div class="col-sm-12 data-field-col">
                        <label for="permissions">سطح دسترسی </label>
                        <select name="permissions[]" multiple="multiple" class="form-control select2" id="permissions">
                            <option value="guest" {{ ($keyboardTelegram && (strpos($keyboardTelegram->permissions, 'guest') !== false)) ? 'selected' : '' }}>guest</option>
                            <option value="login" {{ ($keyboardTelegram && (strpos($keyboardTelegram->permissions, 'login') !== false)) ? 'selected' : '' }}>login</option>
                            <option value="admin" {{ ($keyboardTelegram && (strpos($keyboardTelegram->permissions, 'admin') !== false)) ? 'selected' : '' }}>admin</option>
                            
                            @forelse ($roles as $role)
                                <option value="{{ $role->name }}" {{ ($keyboardTelegram && (strpos($keyboardTelegram->permissions, $role->name) !== false)) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>

                    <div class="col-sm-12 data-field-col">
                        <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                            <p class="mb-0">active</p>
                            <input type="checkbox" name="actived_at" class="custom-control-input" id="actived_at{{ $keyboardTelegram->id }}"
                                {{ ($keyboardTelegram && $keyboardTelegram->actived_at) ? 'checked=true' : '' }}>
                            <label class="custom-control-label" for="actived_at{{ $keyboardTelegram->id }}">
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
                <button class="btn btn-primary">ویرایش</button>
            </div>
            <div class="cancel-data-btn">
                <button class="btn btn-outline-danger">کنسل</button>
            </div>
        </div>
    </div>

</form>
