<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check OTP Cookie</title>
</head>
<body>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- js-cookie plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>


<script>
	
	$(document).ready(function(){
       alert($.cookie('setOtpCookie'));
    });

</script>
    
</body>
</html>