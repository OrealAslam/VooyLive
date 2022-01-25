@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>{{__('common_errors.error')}}</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error_msg'))
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <ul>
            <li>{{ Session::get('error_msg') }}</li>
        </ul>
    </div>
@endif