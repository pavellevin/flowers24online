<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success')[0] }}
        </div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger">
            {{ Session::get('danger') }}
        </div>
    @endif
</div>