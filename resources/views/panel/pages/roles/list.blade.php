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
                    <th>NAME</th>
                    <th>GUARD</th>
                    <th>TYPE</th>
                    <th>DETAILS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td></td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->TYPE }}</td>
                        <td>{{ $role->details }}</td>
                        <td class="product-action">
                            <span class="action-edit" onclick="editRow('{{ route('panel.roles.edit.role', ['id'=> $role->id]) }}')"><i class="feather icon-edit"></i></span>
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
        
            @include('panel.components.roles.add',[
                'title'                 => 'افزودن رول جدید',
                'roles'                 => $roles,
                'breadcrumb'            => null
            ])
        <div class="edit-old-data load-edit-old-data">
            
        </div>
    </div>
    <!-- add new sidebar ends -->
</section>

@endsection