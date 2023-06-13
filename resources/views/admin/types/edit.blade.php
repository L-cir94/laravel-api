@extends('layouts.admin')


@section('content')
    <h1 class="py-3">Create a new Project</h1>


    @include('partials.validation_errors')

    <form action="{{ route('admin.types.update', $type) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" required
                value="{{ old('name', $type->name) }}" name="name" id="name"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="type name here"
                aria-describedby="nameHelper">
            <small id="nameHelper" class="text-secondary @error('name') text-danger @enderror">
                Type the name of the type max 50 characters
            </small>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3">{{old('content', $type->content)}}</textarea>
        </div>

        <a class="btn btn-primary my-3" href="{{ route('admin.types.index') }}" role="button">Return</a>
        <button type="submit" class="btn btn-dark">Save</button>

    </form>
@endsection
