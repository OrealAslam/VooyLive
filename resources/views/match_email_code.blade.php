<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Verify OTP Code</title>
</head>
<body>

@php

function maskEmailAddress($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        list($first, $last) = explode('@', $email);
        $first = str_replace(substr($first, '3'), str_repeat('*', strlen($first)-3), $first);
        $last = explode('.', $last);
        $last_domain = str_replace(substr($last['0'], '1'), str_repeat('*', strlen($last['0'])-1), $last['0']);
        $hideEmailAddress = $first.'@'.$last_domain.'.'.$last['1'];
        return $hideEmailAddress;
    }
}
@endphp

    <div class="container p-2">
        <div class="row mt-4">
            <div class="col-md-5 offset-md-4 col-8 offset-3">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ url('img/dharro.png')}}" style="padding-left: 10px; width: 140px;" class="logo-header-menu img-fluid d-block mx-auto" alt="Community Feature Sheet&reg;">
                        <hr>
                        <h4 class="text-center mb-1" style="font-size: 18px;"><i>Check your 6-digit OTP code</i></h4>
                        <p class="text-muted" style="font-size: 16px; margin-top: 10px;">Enter the code sent to your email address 
                        <span class="font-weight-bold">{{ maskEmailAddress( Auth::user()->email ) }}</span>. Didn't get it?
                        <a class="text-primary font-weight-bolder" href="{{ route('resend/otp') }}">Resend Code</a></p>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('verify_email_code') }}">
                            {{ csrf_field() }}
                            <input type="text" name="system_generated_code" class="form-control" placeholder="Enter your code" autofocus>
                            <br>
                            <div class="col-10 offset-1">
                                <input type="checkbox" class="form-check-input" name="remember_device" id="remember_device">
                                <label class=" form-label text-muted" for="remember_device">Remember this device for 30 days </label>
                            </div>
                            <div class="text-center">
                                <button type="sumit" name="submit" class="btn btn-light" id="formSubmit">Submit</button><br>
                            </div>
                            @if($errors->any())                        
                        @foreach($errors->all() as $error)                            
                           <ul>
                               <li class="text-danger" style="font-size: 15px;"><span>{{ $error }}</span></li>
                           </ul>
                        @endforeach                        
                        @endif

                        @if(\Session::has('status') )
                            <span class="text-danger text-center" style="font-size: 15px;">{{ Session::get('status') }}</span>
                        @endif

                        <!-- resend OTP -->
                        @if(\Session::has('notFound') )
                            <span class="text-danger text-center" style="font-size: 15px;">{{ Session::get('notFound') }}</span>
                        @endif

                        <!-- otp expire message -->
                        @if(\Session::has('otpExpire') )
                            <span class="text-danger text-center" style="font-size: 15px;">{{ Session::get('otpExpire') }}</span><br>
                            <span class="text-danger text-center mt-2" style="font-size: 15px;">re-enter OTP code sent to your email address</span>
                        @endif
                        </form>
                    </div>

                    <div class="card-footer p-1" style="font-size: 14px; background-color: rgb(250,55,76);">
                        <p style=" padding: 8px; background-color: rgb(250,55,76); color: #fff;">{{__('layouts_footer.copyright')}} &copy; {{ date('Y') }}, {{__('layouts_footer.para3')}}</p>
                    </div>  
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>


</body>
</html>