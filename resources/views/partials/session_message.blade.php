@if (session('message'))
    <div class="alert alert-primary" role="alert">
        <strong><i class="fa-solid fa-check fa-flip"></i></strong> {{session('message')}}
    </div>
@endif
