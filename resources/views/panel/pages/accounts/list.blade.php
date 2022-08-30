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
                        <th>NUMBER</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($accounts as $account)
                        <tr>
                            <td></td>
                            <td dir="ltr">{{ $account->user->phone ?? $account->user_id }}</td>
                            <td>{{ (strpos($account->number, 'IR') === 0) ? 'شبا' : 'کارت' }}</td>
                            <td>{{ $account->number }}</td>
                        </tr>
                    @empty
                    @endforelse

                </tbody>
            </table>

            @include('panel.components.pagination', ['data' => $accounts])

            {{-- @if ($accounts->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ $accounts->currentPage() == 1 ? ' disabled' : '' }}">
                        <a href="{{ $accounts->url(1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $accounts->lastPage(); $i++)
                        <li class="{{ $accounts->currentPage() == $i ? ' active' : '' }}">
                            <a href="{{ $accounts->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ $accounts->currentPage() == $accounts->lastPage() ? ' disabled' : '' }}">
                        <a href="{{ $accounts->url($accounts->currentPage() + 1) }}">Next</a>
                    </li>
                </ul>
            @endif
            {{ $accounts->withQueryString()->links() }} --}}
        </div>

    </section>
@endsection
