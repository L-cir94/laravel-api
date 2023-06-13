@extends('layouts.admin')

@section('content')

    <div class="container-md my-5">
        <div class="row py-5 shadow">
            <div class="col-6">
                
            <div class="col px-5 me-5">
                <div class="card-body">
                    <h2 class="card-title py-4">{{$type->name}}</h2>
                    <div>
                        <span class="badge bg-info">{{$type->created_at}}</span>
                        <p>{{$type->content}}</p>
                    </div>
                    <p class="card-text p-2"></p>
                </div>
            </div>
        </div>
    </div>

    <a class="btn btn-primary my-3" href="{{ route('admin.types.index') }}" role="button">Return</a>
@endsection