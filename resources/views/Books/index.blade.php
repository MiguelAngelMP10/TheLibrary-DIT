@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header h2 text-center text-bold">{{ __('Books') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">

                                {{ $Books->appends(request()->query())->links() }}
                            </div>
                            <div class="col-4">
                                <a href="{{ route('book.create') }}" class="btn btn-outline-success">
                                    <i class="far fa-plus-square"></i> Nuevo libro
                                </a>
                            </div>

                        </div>

                        <div class="row  text-center">
                            <div class="col-12">
                                <form class="form-inline" method="POST" action="{{ route('book.index') }}">
                                    @method('GET')
                                    <div class="form-group">
                                        <select id="my-select" class="form-control form-control-lg" name="buscarPor">
                                            <option>Buscar Por:</option>
                                            <option value="id">Id</option>
                                            <option value="name">Nombre</option>
                                            <option value="author">Autor</option>
                                            <option value="category_id">id Categoria</option>
                                            <option value="user_id">id Usuario</option>
                                            <option value="statusPrestamo">Estado de prestamo</option>
                                            <option value="mostrarTodos">Mostar Todos</option>
                                        </select>

                                    </div>
                                    <input class="form-control form-control-lg col-3" type="text" name="valorBusqueda"
                                        placeholder="Valor a buscar">
                                    <button type="submit" class="btn btn-outline-primary btn-lg"><i
                                            class="fas fa-search"></i>
                                        Buscar</button>
                                </form>
                            </div>

                        </div>
                        <h3>
                            {{ 'Total de registros ' . $Books->total() }}
                        </h3>

                        <div class="table-responsive">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center" scope="col">#</th>
                                        <th class="align-middle text-center" scope="col" colspan="4">Opciones</th>
                                        <th class="align-middle text-center" scope="col">Id</th>
                                        <th class="align-middle text-center" scope="col">Nombre</th>
                                        <th class="align-middle text-center" scope="col">Autor</th>
                                        <th class="align-middle text-center" scope="col">Fecha Publicacion</th>
                                        <th class="align-middle text-center" scope="col">Categoria</th>
                                        <th class="align-middle text-center" scope="col">Usuario</th>
                                        <th class="align-middle text-center" scope="col">Estado de prestamo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Books as $key => $row)
                                        <tr>
                                            <td>
                                                {{ $Books->currentPage() * $Books->perPage() + $loop->iteration - $Books->perPage() }}
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('book.show', $row) }}"
                                                    class="btn btn-outline-info btn-sm">
                                                    <i class="far fa-eye"></i> Ver
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('book.edit', $row) }}"
                                                    class="btn btn-outline-primary btn-sm">
                                                    <i class="far fa-edit"></i> Editar
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('book.destroy', $row) }}" id="form-{{ $row->id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a class="btn btn-outline-danger btn-sm"
                                                        v-on:click="eliminarRegistro('form-{{ $row->id }}')"><i
                                                            class="far fa-trash-alt"></i>&nbsp;Eliminar</a>
                                                </form>
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-dark btn-sm"
                                                    v-on:click="mostrarModal('{{ $row->id }}', '{{ $row->statusPrestamo }}' )">
                                                    Cambiar estatus
                                                </a>
                                            </td>
                                            <td>
                                                {{ $row->id }}
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->author }}</td>
                                            <td>{{ $row->publishedDate }}</td>
                                            <td>{{ $row->category_id . ' ' . $row->category->name }}</td>
                                            <td>{{ $row->user_id . ' ' . $row->user->name }}</td>
                                            <td>{{ $row->statusPrestamo ? 'Prestado' : 'Disponible' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $Books->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

        <div class="modal fade bd-example-modal-lg" id="modalStatus" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Cambiar estatus de prestamo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="radio-disponible" value="0" name="estatusPrestamo"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="radio-disponible">Disponible</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="radio-prestado" value="1" name="estatusPrestamo"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="radio-prestado">Prestado</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer align-items-center">
                        <button type="button" v-on:click="cambiarStatusPrestamo()" class="btn btn-outline-success"><i
                                class="far fa-save"></i>
                            Guardar</button>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i
                                class="fas fa-times"></i>
                            Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

    @endsection
