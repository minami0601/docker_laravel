@if (session('flash_message'))
    <div class="flash_message alert alert-info">
        {{ session('flash_message') }}
    </div>
@endif
@if (session('flash_danger'))
    <div class="alert alert-danger">
        {{ session('flash_danger') }}
    </div>
@endif