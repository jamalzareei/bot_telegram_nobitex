@extends('layout')
  
@section('content')
<section class="row flexbox-container">
    <div class="col-xl-10 col-11 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-12 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">ایجاد حساب کاربری</h4>
                            </div>
                        </div>
                        <p class="px-2"> === خوش آمدید، لطفا اطلاعات حساب خود را وارد نمایید. === </p>
                        <div class="card-content mb-5">
                            <div class="card-body pt-1">
                                <form action="{{ route('register.post') }}" method="post" class="ajaxForm">
                                    @csrf
                                    
                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="نام" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="name">نام</label>
                                        <small class="help-block text-danger error-name"></small>
                                    </fieldset>

                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="شماره تلفن" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="phone">شماره تلفن</label>
                                        <small class="help-block text-danger error-phone"></small>
                                    </fieldset>

                                    <fieldset class="form-label-group position-relative has-icon-left">
                                        <input type="password" class="form-control" name="password" id="user-password" placeholder="رمز عبور" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-lock"></i>
                                        </div>
                                        <label for="user-password">رمز عبور</label>
                                        <small class="help-block text-danger error-password"></small>
                                    </fieldset>
                                    
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary float-left btn-inline">ورود به حساب کاربری</a>
                                    <button type="submit" class="btn btn-primary float-right btn-inline">ثبت نام</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection