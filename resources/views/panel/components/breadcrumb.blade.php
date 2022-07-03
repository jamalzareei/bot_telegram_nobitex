<div class="row breadcrumbs-top">
    <div class="col-12">
        <h2 class="content-header-title float-left mb-0">{{ $title }}</h2>
        <div class="breadcrumb-wrapper col-12">
            @isset($breadcrumb)
                
                <ol class="breadcrumb">
                    @forelse ($breadcrumb as $bread)
                        <li class="breadcrumb-item"><a href="{{ $bread->route }}">{{ $bread->title }}</a></li>
                    @empty
                        
                    @endforelse
                    {{-- <li class="breadcrumb-item"><a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Data List</a>
                    </li>
                    <li class="breadcrumb-item active">List View
                    </li> --}}
                </ol>
            @endisset
        </div>
    </div>
</div>