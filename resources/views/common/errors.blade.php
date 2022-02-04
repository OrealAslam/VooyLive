@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger" style="margin-top: 60px;">
        <strong>{{__('common/errors.error')}}</strong>

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
    <div class="alert alert-danger" style="margin-top: 60px;">
        <ul>
            <li>{{ Session::get('error_msg') }}</li>
        </ul>
    </div>
@endif