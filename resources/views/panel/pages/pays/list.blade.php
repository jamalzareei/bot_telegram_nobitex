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
                        <th>PAYABLE</th>
                        <th>STATUS</th>
                        <th>AMOUNT</th>
                        <th>TRACKING CODE</th>
                        <th>CODE VERIFY</th>
                        <th>CART NUMBER</th>
                        <th>DATE</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pays as $pay)
                        <tr>
                            <td></td>
                            <td dir="ltr">{{ $pay->user->phone ?? $pay->user_id }}</td>
                            <td>{{ $pay->payable_type }} ({{ $pay->payable_id }})</td>
                            <td>{{ $pay->status->name ?? $pay->status_id }}</td>
                            <td>{{ $pay->amount }} ریال</td>
                            <td>{{ $pay->tracking_code }}</td>
                            <td>{{ ($pay->code_verify == '0' && $pay->code_verify != '') ? 'پرداخت شده' : $pay->code_verify }}</td>
                            <td>{{ $pay->cart_number }}</td>

                            <td>{{ verta($pay->created_at) }}</td>
                        </tr>
                    @empty
                    @endforelse

                </tbody>
            </table>

            @include('panel.components.pagination', ['data' => $pays])

        </div>

    </section>
@endsection
