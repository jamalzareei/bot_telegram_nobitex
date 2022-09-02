@extends('panel.layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/app-assets/vendors/css/forms/select/select2.min.css') }}">

    <style>
        .data-list-view-header .table-responsive .top .action-btns .dt-buttons .btn {
            display: none;
        }
    </style>


    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css" />
@endsection

@section('js')
    <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
    <script type="text/javascript">
        var p = new persianDate();
            $(".datepicker").pDatepicker({
                cellWidth: 37,
                cellHeight: 30,
                fontSize: 9,

                persianNumbers: !0,
                // selectedBefore: !1,
                format: "YYYY/MM/DD",
                // selectedBefore: !0,
                selectedDate: null,
                startDate: "1398/01/01",
            });
    </script>
@endsection

@section('content')
    <section id="data-list-view" class="data-list-view-header">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">فیلتر </h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                        <li><a data-action=""><i class="feather icon-rotate-cw categories-data-filter"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="categories-list-filter">
                        <form method="GET" action="">
                            <div class="row">
                                <div class="col-12 col-sm-3 col-lg-3 form-group">
                                    <label for="">شماره تلفن</label>
                                    <fieldset class="form-group">
                                        <input type="text" name="phone" value="{{ request('phone') }}"
                                            class="form-control filter" placeholder="شماره تلفن">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-2 col-lg-2 form-group">
                                    <label for="">مبلغ</label>
                                    <fieldset class="form-group">
                                        <input type="text" name="amount" value="{{ request('amount') }}"
                                            class="form-control filter" placeholder="مبلغ">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-3 col-lg-3 form-group">
                                    <label for="">کد پیگیری</label>
                                    <fieldset class="form-group">
                                        <input type="text" name="tracking_code" value="{{ request('tracking_code') }}"
                                            class="form-control filter" placeholder="کد پیگیری">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-3 col-lg-3 form-group">
                                    <label for="">تاریخ</label>
                                    <fieldset class="form-group">
                                        <input type="text" name="date" value="{{ request('date') }}"
                                            class="form-control filter datepicker" placeholder="تاریخ">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-sm-1 col-lg-1 form-group">
                                    <label for="categories-list-status">&nbsp;</label>
                                    <fieldset class="form-group">
                                        <button type="submit"
                                            class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1 waves-effect waves-light"><i
                                                class="feather icon-search"></i></button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                            <td>{{ $pay->code_verify == '0' && $pay->code_verify != '' ? 'پرداخت شده' : $pay->code_verify }}
                            </td>
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
