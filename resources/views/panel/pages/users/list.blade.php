@extends('panel.layout')
  
@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/forms/select/select2.min.css') }}">
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
@endsection

@section('js')

<script src="{{ asset('panel/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('panel/app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
<script>
    // $(document).on('click', '.action-edit', function(){
        function editRow(url){
            // alert(url)
            $.ajax({
                url: url,
                method: 'get',
                method: 'get',
                data: { ajax: 'true' },
                success: function(response) {
                    console.log(response);
                    $(".load-edit-old-data").html(response);
                },
                error: function(request, status, error) {}
            })
        }
    // })
</script>
@endsection

@section('content')
<section id="data-list-view" class="data-list-view-header">

    <!-- DataTable starts -->
    <div class="table-responsive">
        <table class="table data-list-view">
            <thead>
                <tr>
                    <th></th>
                    <th>نام</th>
                    <th>شماره تماس</th>
                    <th>کد ملی</th>
                    <th>کد تایید</th>
                    <th>تایید هویت کاربر</th>
                    <th>ROLES</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td></td>
                        <td>{{ $user->firstname . " " . $user->lastname }}</td>
                        <td dir="ltr">{{ $user->phone }}</td>
                        <td>{{ $user->national_code }}</td>
                        <td>
                            {{ $user->code_confirm }}
                            @if ( strpos($user->phone, '9135368845') !== false || strpos($user->phone, '9014252026') !== false )
                            ....
                            @endif
                                {{-- <form action="{{ route('panel.user.send.code.confirm', ['id'=>$user->id]) }}" method="post" class="ajaxForm">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-round btn-sm">
                                        ارسال کد تایید
                                    </button>
                                </form> --}}
                        </td>
                        <td>
                            <div class="custom-control custom-switch custom-switch-success switch-md mr-2 mb-1">
                                <input type="checkbox" class="custom-control-input" name="authenticate_user[{{$user->id}}]" id="customSwitchpage{{$user->id}}" {{$user->authenticate_user ? 'checked' : ''}}  onclick="changeStatus('{{ route('panel.user.authenticate', ['id'=> $user->id]) }}',this)">
                                <label class="custom-control-label" for="customSwitchpage{{$user->id}}">
                                    <span class="switch-text-left">فعال</span>
                                    <span class="switch-text-right">غیر فعال</span>
                                </label>
                            </div>
                        </td>
                        <td class="product-action">
                                <form action="{{ route('panel.user.roles.sync', ['id'=>$user->id]) }}" method="post" class="row ajaxForm">
                                    <div class="form-group col-8">

                                        <select name="roles[]" multiple="multiple" class="form-control select2" id="roles{{ $user->id }}">
                                            <option value="">انتخاب کنید</option>
                                            @forelse ($roles as $role)
                                                <option value="{{ $role->id }}" {{ ($user->roles->where('id', $role->id)->count() ?? null) ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>                                            
                                            @empty
                                                
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-flat-success mr-1 mb-1 waves-effect waves-light">
                                            <i class="feather icon-save"></i>
                                        </button>
                                    </div>
                                </form>
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
        
            {{-- @include('panel.components.faqs.add',[
                'title'                 => 'افزودن سوال جدید',
                'faqs'                  => $faqs,
                'breadcrumb'            => null
            ]) --}}
        <div class="edit-old-data load-edit-old-data">
            
        </div>
    </div>
    <!-- add new sidebar ends -->
</section>

@endsection