@include('emails.sub_views.header')

    <h3>Your OTP Confirmation Code</h3>
    <br><br>
    <div>
        <p>Enter the verification code given below</p>
        <br>
        <span>Code: </b>{{ $user['otp'] }}</span>  
    </div>

@include('emails.sub_views.footer')