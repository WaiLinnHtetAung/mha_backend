@extends('layouts.app')
@section('styles')
<style>
    body {
        min-height: auto;
    }

    .authentication-inner {
        width: 100%;
        height: 100vh !important;
        background-image: linear-gradient(to bottom, #13a4bf, #536ec0,#9537c1);

    }

    .authentication-inner img {
        width: 80%;
        object-fit: contain;
    }

    form {
        width: 70%;
        margin: 10px auto;

    }

    .user {
        width: 70px;
        height: 70px;
        background: rgb(226, 190, 155, .2);
        border-radius: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px auto;
    }
    .user i {
        font-size: 38px;
        color: #eee;
    }

    form .input-group .input-group-prepend span{
        background-color: rgb(226, 190, 155, .5) !important;
        border: none !important;

    }

    form .input-group input {
        border: none !important;
        outline: none !important;
        background-color: rgb(226, 190, 155, .2) !important;
        color: #eee !important;
    }

    @media(min-width:1500px) {
        .user {
            width: 100px;
            height: 100px;
            background: rgb(226, 190, 155, .2);
            border-radius: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px auto;
        }

        .user i {
            font-size: 48px;
            color: #eee;
        }
        form .input-group input {
        border: none !important;
        outline: none !important;
        padding: 25px 20px !important;
        background-color: rgb(226, 190, 155, .2) !important;
    }
    }

    form .input-group input:focus {
        outline: none !important;
    }

    form .input-group input::placeholder {
        color: #fff;
    }

    form .sigin-btn {
        background: linear-gradient(to right, #13a4bf, #5e85fa,#4c32dd);
    }


</style>
@endsection
@section('content')
<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0 p-0">
        <div class="col-lg-4 offset-lg-2 d-flex align-items-center justify-content-center">
            <img src="{{asset('logo.svg')}}" alt="">
        </div>
        <div class="col-lg-5 d-flex align-items-center justify-content-start">
            <form id="formAuthentication" class="" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="user text-center mb-4">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                </div>
                <div class="mb-4 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i class='text-white bx bxs-user'></i></span>
                      </div>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus />
                    @if ($errors->has('email'))
                    <div class="small text-danger">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
                <div class="mb-4 form-password-toggle input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i class='text-white bx bxs-lock-alt'></i></span>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">

                    @if ($errors->has('password'))
                    <div class="small text-danger">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
                    <!-- {{-- </div> --}} -->
                </div>
                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
                        <label class="form-check-label text-white" for="remember-me "> Remember Me </label>
                    </div>
                </div>
                <button class="btn sigin-btn d-grid w-100 text-white" id="sign-in">Sign in</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember-me').attr('checked', 'checked');
                    $('#email').val(localStorage.email);
                    $('#password').val(localStorage.password);
                } else {
                    $('#remember-me').removeAttr('checked');
                    $('#email').val('');
                    $('#password').val('');
                }
                $('#sign-in').on('click',function(){
                    if ($('#remember-me').is(':checked')) {
                        // save username and password
                        localStorage.email = $('#email').val();
                        localStorage.password = $('#password').val();
                        localStorage.chkbx = $('#remember-me').val();
                    } else {
                        localStorage.email = '';
                        localStorage.password = '';
                        localStorage.chkbx = '';
                    }
                })

</script>
@endsection
