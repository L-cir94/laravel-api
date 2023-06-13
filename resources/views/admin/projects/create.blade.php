@extends('layouts.admin')


@section('content')
    <h1 class="py-4">Create a new project</h1>


    @include('partials.validation_errors')

    <form action="{{ route('admin.projects.store') }}" method="post">
        @csrf
       
        <div class="mb-3">
            <label for="title" class="form-label">Titolo progetto</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                aria-describedby="titleHelper" placeholder="Learn php">
            <small id="titleHelper" class="form-text text-muted">scrivi il nome del progetto (max 150 characters)</small>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image progetto</label>
            <input type="text" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                id="cover_image" aria-describedby="cover_imageHelper" placeholder="Cover image URL">
            <small id="cover_imageHelper" class="form-text text-muted">Inserisci URL di eventuali immagini di copertina del progetto (must be unique)</small>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia di Progetto</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option value="">Select a type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == old('type_id', '') ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach
            </select>
            <small id="type_idHelper" class="text-secondary @error('type_id') text-danger @enderror">
                Select one of the following project type
            </small>
        </div>

        <a class="btn btn-primary my-3" href="{{ route('admin.projects.index') }}" role="button">Return</a>
        <button type="submit" class="btn btn-dark">Save</button>

    </form>
@endsection
