@extends('layouts.admin')

@section('content')

    <div class="container-md my-5">
        <div class="row py-5 shadow">
            <div class="col-6">
                <p class="card-text p-2">{{$technology->content}}</p>
            </div>
            <div class="col px-5 me-5">
                <div class="card-body">
                    <h2 class="card-title py-4">{{$technology->name}}</h2>
                    <div>
                        <span class="badge bg-info">{{$technology->created_at}}</span>
                        <p>{{$technology->slug}}</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-primary my-3" href="{{ route('admin.technologies.index') }}" role="button">Return</a>
@endsection
