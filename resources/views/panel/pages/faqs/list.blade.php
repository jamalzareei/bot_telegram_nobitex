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
                    <th>TITLE</th>
                    <th>ANSWER</th>
                    <th>ACTIVE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($faqs as $faq)
                    <tr>
                        <td></td>
                        <td>{{ $faq->title }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>
                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                <input type="checkbox" name="active_at" class="custom-control-input" id="active_at" {{ $faq->actived_at ? 'checked' : '' }} >
                                <label class="custom-control-label" for="active_at">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                    <span class="switch-icon-right"><i class="feather icon-times"></i></span>
                                </label>
                            </div>
                        </td>
                        <td class="product-action">
                            <span class="action-edit" onclick="editRow('{{ route('panel.faq.edit', ['id'=> $faq->id]) }}')"><i class="feather icon-edit"></i></span>
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
        
            @include('panel.components.faqs.add',[
                'title'                 => 'افزودن سوال جدید',
                'faqs'                  => $faqs,
                'breadcrumb'            => null
            ])
        <div class="edit-old-data load-edit-old-data">
            
        </div>
    </div>
    <!-- add new sidebar ends -->
</section>

@endsection