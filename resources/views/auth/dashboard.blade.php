@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <a href="{{ route('panel') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">پنل مدیریت</a>

                    <a href="{{ route('user.data') }}" class="btn btn-info mr-1 mb-1 waves-effect waves-light">اطلاعات کاربر</a>

                    <a href="{{ route('logout') }}" class="btn btn-dark mr-1 mb-1 waves-effect waves-light">خروج از حساب کاربری</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection