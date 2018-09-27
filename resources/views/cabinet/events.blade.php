@if(Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif
@if(Session::has('danger'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ Session::get('danger') }}</li>
        </ul>
    </div>
@endif