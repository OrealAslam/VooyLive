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

    <div class="container p-2">
        <div class="row mt-4">
            <div class="col-md-5 offset-md-4 col-8 offset-3">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h4 class="text-center text-light">Verify OTP</h4>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('verify_email_code') }}">
                            {{ csrf_field() }}
                            <input type="number" name="system_generated_code" class="form-control" placeholder="OTP code here" autofocus>
                            <br>
                            <button type="submit" name="submit" class="btn btn-block btn-primary">Verify Code</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                            <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        @endif

                        @if(\Session::has('status') )
                        <span class="text-danger text-center">{{ Session::get('status') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>