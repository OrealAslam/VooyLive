@if(Session::has('success_msg'))
    <!-- Form Error List -->
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success_msg') }}</li>
        </ul>
    </div>
@endif