@extends('layouts.admin')


@section('content')
    <div class="container-fluid">

        @include('partials.validation_errors')

        <h5 class="text-muted my-3">Add a new type</h5>
        <form action="{{ route('admin.types.store') }}" method="post">
            @csrf

            {{-- <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" required
                    value="{{ old('name') }}" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="type name here"
                    aria-describedby="nameHelper">
                <small id="nameHelper" class="text-secondary @error('name') text-danger @enderror">
                    Type the name of the type max 50 characters
                </small>
            </div> --}}

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <input type="text" required
                value="{{ old('name') }}" name="name" id="name"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="type name here"
                aria-describedby="nameHelper">
            <small id="nameHelper" class="text-secondary @error('name') text-danger @enderror">
                Type the name of the type max 50 characters
            </small>
                {{-- <select
                    class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option value="">Select a type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id}}" {{ $type->id == old('type_id', '') ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                <small id="type_idHelper"
                    class="text-secondary @error('type_id') text-danger @enderror">
                    Select one of the following project type
                </small> --}}
            </div>

            <a class="btn btn-primary my-3" href="{{ route('admin.types.index') }}" role="button">Return</a>
            <button type="submit" class="btn btn-dark my-4">Save</button>
        </form>
    </div>
@endsection