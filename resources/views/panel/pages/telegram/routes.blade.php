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
                    <th>ORDER</th>
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>CALLBACK DATA</th>
                    <th>CONTROLLER METHOD</th>
                    <th>ACTIVE</th>
                    <th>PARENT</th>
                    <th>CHILDREN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($keyboradTelegrams as $keyboard)
                    <tr>
                        <td></td>
                        <td>{{ $keyboard->orderby }}</td>
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
                        <td>{{ ($keyboard->parent) ? $keyboard->parent->text : '' }}</td>
                        <td><a href="{{ route('panel.telegram.routes', ['parent_id'=>$keyboard->id]) }}"><i class="fa fa-eye"></i></a></td>
                        <td class="product-action">
                            <span class="action-edit" onclick="editRow('{{ route('panel.telegram.edit.route', ['id'=> $keyboard->id]) }}')"><i class="feather icon-edit"></i></span>
                            {{-- <span class="action-delete"><i class="feather icon-trash"></i></span> --}}
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
        
            @include('panel.components.telegram.routes.add-new-route',[
                'title'                 => 'داشبورد',
                'keyboradTelegrams'     => $keyboradTelegrams,
                'keyboradTelegramsAll'  => $keyboradTelegramsAll,
                'statuses'              => $statuses,
                'controllers'           => $controllers,
                'parent_id'             => $parent_id,
                'breadcrumb'            => null
            ])
        <div class="edit-old-data load-edit-old-data">
            {{-- @include('panel.components.telegram.routes.edite-old-route',[
                'title'                 => 'داشبورد',
                'keyboradTelegrams'     => $keyboradTelegrams,
                'keyboradTelegramsAll'  => $keyboradTelegramsAll,
                'statuses'              => $statuses,
                'controllers'           => $controllers,
                'parent_id'             => $parent_id,
                'breadcrumb'            => null,
                'keyboardTelegram' => null
            ]) --}}
        </div>
    </div>
    <!-- add new sidebar ends -->
</section>

@endsection