<style>
    #DataTables_Table_0_paginate{
        display: none;
    }
</style>
<div class="d-flex justify-content-center">

    @if ($data->lastPage() > 1)
        <ul class="pagination">
            <li class="paginate_button page-item previous  {{ $data->currentPage() == 1 ? ' disabled' : '' }}"
                id="DataTables_Table_0_previous">
                <a href="{{ $data->url(1) }}" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                    class="page-link">Previous</a>
            </li>
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                <li class="paginate_button page-item  {{ $data->currentPage() == $i ? ' active' : '' }}">
                    <a href="{{ $data->url($i) }}" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                        class="page-link">{{ $i }}</a>
                </li>
            @endfor
            <li class="paginate_button page-item next  {{ $data->currentPage() == $data->lastPage() ? ' disabled' : '' }}"
                id="DataTables_Table_0_next">
                <a href="{{ $data->url($data->currentPage() + 1) }}" aria-controls="DataTables_Table_0" data-dt-idx="2"
                    tabindex="0" class="page-link">Next</a>
            </li>
        </ul>
    @endif
</div>
