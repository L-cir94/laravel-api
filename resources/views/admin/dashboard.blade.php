@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center g-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2 class="fs-4 text-secondary my-4">Preview</h2>
                    @foreach ( $projects as $project )
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$project->title}}</h4>
                            <p class="card-text">{{$project->content}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
