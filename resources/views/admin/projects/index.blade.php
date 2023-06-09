@extends('layouts.admin')


@section('content')
    <h1>Show projects table</h1>
    <a class="btn btn-dark" href="{{ route('admin.projects.create') }}" role="button">Create Project</a>

    @include('partials.session_message')

    <div class="table-responsive">
        <table class="table table-striped
    table-hover
    table-borderless
    table-primary
    align-middle">
            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Cover Image</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Content</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse ($projects as $project)
                    <tr class="table-primary">
                        <td scope="row">{{ $project->id }}</td>
                        <td><img height="100" src="{{ $project->cover_image }}" alt="{{ $project->title }}"></td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->content }}</td>
                        <td>
                            <div class="buttons d-flex gap-3">
                                <button type="button" class="btn btn-primary btn-lg rounded-circle" data-bs-toggle="modal"
                                data-bs-target="#modalId">
                                <a class="text-white" href="{{ route('admin.projects.show', $project->id) }}"><i
                                        class="fa-solid fa-eye"></i></a>
                            </button>
                            <button type="button" class="btn btn-primary btn-lg rounded-circle" data-bs-toggle="modal"
                                data-bs-target="#modalId">
                                <a class="text-white" href="{{ route('admin.projects.edit', $project->id) }}"><i
                                        class="fa-solid fa-pen"></i></a>
                            </button>
                            <!-- Modal trigger button -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $project->id }}">
                                <i class="fa-solid fa-trash "> Delete</i>
                            </button>
                            </div>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $project->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle-{{ $project->id }}">Delete
                                                {{ $project->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicur*?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ">Si</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('{{ $project->id }}'), options)
                            </script>
                        </td>
                    </tr>
                @empty
                    <tr class="table-primary">
                        <td scope="row">No projects yet.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
@endsection
