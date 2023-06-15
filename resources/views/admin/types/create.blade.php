@extends('layouts.admin')


@section('content')
    <div class="container-fluid">

        @include('partials.validation_errors')

        <h5 class="text-muted my-3">Add a new type</h5>
        <form action="{{ route('admin.types.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3">{{old('content', $type->content)}}</textarea>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <input type="text" required value="{{ old('name') }}" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror" placeholder="type name here"
                    aria-describedby="nameHelper">
                <small id="nameHelper" class="text-secondary @error('name') text-danger @enderror">
                    Type the name of the type max 50 characters
                </small>
            </div>

            <a class="btn btn-primary my-3" href="{{ route('admin.types.index') }}" role="button">Return</a>
            <button type="submit" class="btn btn-dark my-4">Save</button>
        </form>
    </div>
@endsection
