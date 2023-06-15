@extends('layouts.admin')


@section('content')
    <h1 class="py-4">Create a new Technology</h1>


    @include('partials.validation_errors')

    <form action="{{ route('admin.technologies.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                aria-describedby="nameHelper" placeholder="Learn php">
            <small id="nameHelper" class="form-text text-muted">Type the project name max 150 characters - must be
                unique</small>
        </div>
        <a class="btn btn-primary my-3" href="{{ route('admin.technologies.index') }}" role="button">Return</a>
        <button type="submit" class="btn btn-dark">Save</button>

    </form>
@endsection
