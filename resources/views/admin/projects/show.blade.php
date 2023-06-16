@extends('layouts.admin')

@section('content')

    <div class="container-md my-5">
        <div class="row py-5 shadow">
            <div class="col-6">
                <img height="100"src="{{ asset('storage/' . $project->cover_image)}}" alt="{{ $project->title }}">
            </div>
            <div class="col px-5 me-5">
                <div class="card-body">
                    <h2 class="card-title py-4">{{$project->title}}</h2>
                    <a href="{{ $project->repo}}" target="_blank">{{ $project->repo}}</a>
                    <div>
                        <span class="badge bg-info">{{$project->created_at}}</span>
                        <p>{{$project->content}}</p>
                    </div>
                    <span class="badge bg-primary">{{$project->type?->name}}</span>
                    @foreach ($project->technologies as $technology )
                    <span class="badge bg-primary">{{$technology->name}}</span>
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-primary my-3" href="{{ route('admin.projects.index') }}" role="button">Return</a>
@endsection
