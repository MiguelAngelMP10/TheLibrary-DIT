@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header h2 text-center text-bold">{{ __('Categorias') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">

                                {{ $categories->links() }}
                            </div>
                            <div class="col-4">
                                <a href="{{ route('category.create') }}" class="btn btn-outline-success">
                                    <i class="far fa-plus-square"></i> Nueva categoria
                                </a>
                            </div>

                        </div>

                        <div class="table-responsive">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center" scope="col">#</th>
                                        <th class="align-middle text-center" scope="col" colspan="3">Opciones</th>
                                        <th class="align-middle text-center" scope="col">Id</th>
                                        <th class="align-middle text-center" scope="col">Nombre</th>
                                        <th class="align-middle text-center" scope="col">Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $row)
                                        <tr>
                                            <td>
                                                {{ $categories->currentPage() * $categories->perPage() + $loop->iteration - $categories->perPage() }}
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('category.show', $row) }}"
                                                    class="btn btn-outline-info btn-sm">
                                                    <i class="far fa-eye"></i> Ver
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit', $row) }}"
                                                    class="btn btn-outline-primary btn-sm">
                                                    <i class="far fa-edit"></i> Editar
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('category.destroy', $row) }}"
                                                    id="form-{{ $row->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a class="btn btn-outline-danger btn-sm"
                                                        v-on:click="eliminarRegistro('form-{{ $row->id }}')"><i
                                                            class="far fa-trash-alt"></i>&nbsp;Eliminar</a>
                                                </form>
                                            </td>
                                            <td>
                                                {{ $row->id }}
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
