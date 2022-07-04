@extends('panel.layout')
  
@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/forms/select/select2.min.css') }}">
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
@endsection

@section('js')

<script src="{{ asset('panel/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('panel/app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
@endsection

@section('content')
<section id="data-list-view" class="data-list-view-header">

    <!-- DataTable starts -->
    <div class="table-responsive">
        <table class="table data-list-view">
            <thead>
                <tr>
                    <th></th>
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>CALLBACK DATA</th>
                    <th>CONTROLLER METHOD</th>
                    <th>ACTIVE</th>
                    <th>CHILDREN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($keyboradTelegrams as $keyboard)
                    <tr>
                        <td></td>
                        <td>{{ $keyboard->text }}</td>
                        <td>{{ $keyboard->type }}</td>
                        <td>{{ $keyboard->callback_data }}</td>
                        <td>{{ $keyboard->controller_method }}</td>
                        <td>
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <input type="checkbox" name="active_at" class="custom-control-input" id="active_at" {{ $keyboard->actived_at ? 'checked' : '' }} >
                                <label class="custom-control-label" for="active_at">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-times"></i></span>
                                </label>
                            </div>
                        </td>
                        <td><a href="{{ route('panel.telegram.routes', ['parent_id'=>$keyboard->id]) }}"><i class="fa fa-eye"></i></a></td>
                        <td class="product-action">
                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                            <span class="action-delete"><i class="feather icon-trash"></i></span>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
                
            </tbody>
        </table>
    </div>
    <!-- DataTable ends -->

    <!-- add new sidebar starts -->
    <div class="add-new-data-sidebar">
        <div class="overlay-bg"></div>
        
        <form action="{{ route('panel.telegram.add.route') }}" method="post" class="ajaxForm">
            @csrf
            <div class="add-new-data">
                <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                    <div>
                        <h4 class="text-uppercase">مسیر جدید</h4>
                    </div>
                    <div class="hide-data-sidebar">
                        <i class="feather icon-x"></i>
                    </div>
                </div>
                    <div class="data-items pb-3">
                        <div class="data-fields px-2 mt-3">
                            <div class="row">
                                <div class="col-sm-12 data-field-col">
                                    <label for="text">عنوان</label>
                                    <input name="text" type="text" class="form-control" id="text">
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="parent_callback_data"> پرنت </label>
                                    <select name="parent_callback_data" class="form-control select2" id="parent_callback_data">
                                        
                                        <option value=""> --- انتخاب نمایید --- </option>
                                        @isset($keyboradTelegramsAll)
                                            @forelse ($keyboradTelegramsAll as $keyboard)
                                                <option value="{{ $keyboard->callback_data }}" {{ $keyboard->id == $parent_id ? 'selected' : '' }}> {{ $keyboard->text }}</option>
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
                                                <option value="{{ $keyboard->callback_data }}"> {{ $keyboard->text }}</option>
                                            @empty
                                                
                                            @endforelse
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="type">نوع</label>
                                    <select name="type" class="form-control select2" id="type">
                                        <option value="text">text</option>
                                        <option value="keyboard">keyboard</option>
                                        <option value="inline_keyboard">inline_keyboard</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="url">آدرس اینترنتی</label>
                                    <input name="url" type="text" class="form-control" id="url">
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="callback_data">اسلاگ (callback_data)</label>
                                    <input type="text" name="callback_data" class="form-control" id="callback_data">
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="children_type">نوع فرزندان (children_type)</label>
                                    <select name="children_type" class="form-control select2" id="children_type">
                                        <option value="text">text</option>
                                        <option value="keyboard">keyboard</option>
                                        <option value="inline_keyboard">inline_keyboard</option>
                                    </select>
                                </div>
                                
                                <div class="col-sm-12 data-field-col">
                                    <label for="same_callback_data">اسلاگ یکسان شده (same_callback_data)</label>
                                    <select name="same_callback_data" class="form-control select2" id="same_callback_data">
                                        <option value=""> --- انتخاب نمایید --- </option>
                                        @isset($keyboradTelegramsAll)
                                            @forelse ($keyboradTelegramsAll as $keyboard)
                                                <option value="{{ $keyboard->callback_data }}"> {{ $keyboard->text }}</option>
                                            @empty
                                                
                                            @endforelse
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="details">جزئیات (details)</label>
                                    <input type="text" name="details" class="form-control" id="details">
                                </div>
                                
                                <div class="col-sm-12 data-field-col">
                                    <label for="controller_method">کنترلر_متد (controller@method)</label>
                                    <select name="controller_method" class="form-control select2" id="controller_method">
                                        <option value=""> --- انتخاب نمایید --- </option>
                                        @isset($controllers)
                                            @forelse ($controllers as $controller)
                                                <option value="{{ $controller }}"> {{ $controller }}</option>
                                            @empty
                                                
                                            @endforelse
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="chunk_children">chunk_children</label>
                                    <input type="text" name="chunk_children" class="form-control" id="chunk_children">
                                </div>
                                <div class="col-sm-12 data-field-col">
                                    <label for="status_id">status</label>
                                    <select name="status_id" class="form-control select2" id="status_id">
                                        <option value=""> --- انتخاب نمایید --- </option>
                                        @isset($statuses)
                                            @forelse ($statuses as $status)
                                                <option value="{{ $status->id }}"> {{ $status->name }}</option>
                                            @empty
                                                
                                            @endforelse
                                        @endisset
                                    </select>
                                </div>
                                
                                <div class="col-sm-12 data-field-col">
                                    <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                        <p class="mb-0">active</p>
                                        <input type="checkbox" name="active_at" class="custom-control-input" id="active_at" checked="checked">
                                        <label class="custom-control-label" for="active_at">
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
                            <button class="btn btn-primary">Add Data</button>
                        </div>
                        <div class="cancel-data-btn">
                            <button class="btn btn-outline-danger">Cancel</button>
                        </div>
                    </div>
            </div>
            
        </form>
    </div>
    <!-- add new sidebar ends -->
</section>

@endsection