@extends('panel.layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/forms/select/select2.min.css') }}">
    
    <style>
        .data-list-view-header .table-responsive .top .action-btns .dt-buttons .btn{
            display: none;
        }
    </style>
@endsection

@section('js')
@endsection

@section('content')
    <section id="data-list-view" class="data-list-view-header">

        <!-- DataTable starts -->
        <div class="table-responsive">
            <table class="table data-list-view">
                <thead>
                    <tr>
                        <th></th>
                        <th>USER</th>
                        <th>TYPE</th>
                        <th>STATUS</th>
                        <th>AMOUNT</th>
                        <th>DATE REQUEST</th>
                        <th>َACTIVED (pay)</th>
                        <th>CHANGE STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td></td>
                            <td dir="ltr">{{ $request->user->phone ?? $request->user_id }}</td>
                            <td>{{ $request->type->name ?? $request->type_id }}</td>
                            <td>{{ $request->status->name ?? $request->status_id }}</td>
                            <td>{{ $request->amount }} ریال</td>
                            <td>{{ verta($request->created_at) }}</td>
                            <td>{{ verta($request->actived_at) }}</td>
                            <td>
                                <div class="custom-control custom-switch custom-switch-success switch-md mr-2 mb-1">
                                    <input type="checkbox" class="custom-control-input" name="authenticate_user[{{$request->id}}]" id="customSwitchpage{{$request->id}}" {{$request->actived_at ? 'checked' : ''}}  onclick="changeStatus('{{ route('panel.request.active', ['id'=> $request->id]) }}',this)">
                                    <label class="custom-control-label" for="customSwitchpage{{$request->id}}">
                                        <span class="switch-text-left">فعال</span>
                                        <span class="switch-text-right">غیر فعال</span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse

                </tbody>
            </table>

            @include('panel.components.pagination', ['data' => $requests])

        </div>

    </section>
@endsection
