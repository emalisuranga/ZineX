@extends('user.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100" style="padding-top: 50px;">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG" style="padding-top: 140px;">
            </div>

            <form action="{{ route('register') }}" method="POST" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title">
                    Member Register
                </span>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
                </div>
                @endif
                <div class="wrap-input100 validate-input" data-validate="">
                    <input class="input100" type="text" name="name" placeholder="Name">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa  fa-user " aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="">
                    <input class="input100" type="text" name="nic" placeholder="ID Number">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-id-card-o " aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="">
                    <select name="user_role" class="input100" style="width:250px">
                        <option value="">--- Select User Type ---</option>
                        <option value="CUSTOMER">customer</option>
                        <option value="OPERATOR">operator</optio>
                        <option value="ADMIN">admin</optio>
                    </select>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa  fa-car " aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="text" name="telephone_number" placeholder="Telephone Number">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone " aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                    Register
                    </button>
                </div>

                <!-- <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div> -->

                <div class="text-center p-t-136" style="padding-top: 50px;">
                    <a class="txt2" href="/login">
                        Login your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection