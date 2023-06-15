@extends('layouts.admin')


@section('content')
    <h1>Show Types table</h1>
    <a class="btn btn-dark" href="{{ route('admin.types.create') }}" role="button">Create New Type</a>

    @include('partials.session_message')

    <div class="table-responsive">
        <table class="table table-striped
    table-hover
    table-borderless
    align-middle">
            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse ($types as $type)
                    <tr class="table-white">
                        <td scope="row">{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            <div class="buttons d-flex gap-3">
                                <button type="button" class="btn btn-primary btn-lg rounded-circle" data-bs-toggle="modal"
                                    data-bs-target="#modalId">
                                    <a class="text-white" href="{{ route('admin.types.show', $type->id) }}"><i
                                            class="fa-solid fa-eye"></i></a>
                                </button>
                                <button type="button" class="btn btn-primary btn-lg rounded-circle" data-bs-toggle="modal"
                                    data-bs-target="#modalId">
                                    <a class="text-white" href="{{ route('admin.types.edit', $type->id) }}"><i
                                            class="fa-solid fa-pen"></i></a>
                                </button>
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $type->id }}">
                                    <i class="fa-solid fa-trash "> Delete</i>
                                </button>
                            </div>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modal-{{ $type->id }}" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $type->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle-{{ $type->id }}">Delete
                                                {{ $type->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicur*?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route('admin.types.destroy', $type->id) }}" method="post">
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
                                const myModal = new bootstrap.Modal(document.getElementById('{{ $type->id }}'), options)
                            </script>
                        </td>
                    </tr>
                @empty
                    <tr class="table-primary">
                        <td scope="row">No types yet.</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
@endsection
