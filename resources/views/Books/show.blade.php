@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header h2 text-center text-bold">{{ __('Book') }}</div>

                    <div class="card-body">

                        <form>
                            <fieldset disabled>
                                <div class="form-row">
                                    <div class="col-md-1">
                                        <label class="font-weight-bold col-form-label-lg">id</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control" value="{{ $book->id }}"
                                                placeholder="id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold col-form-label-lg">name</label>
                                        <div class="input-group input-group-lg">

                                            <input type="" class="form-control form-control-lg" value="{{ $book->name }}"
                                                placeholder=" name">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="font-weight-bold col-form-label-lg">author</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control" value="{{ $book->author }}"
                                                placeholder="id">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="font-weight-bold col-form-label-lg">Published Date</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control" value="{{ $book->publishedDate }}"
                                                placeholder="publishedDate">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="font-weight-bold col-form-label-lg">Category</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control" value="{{ $book->category->name }}"
                                                placeholder="category">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="font-weight-bold col-form-label-lg">User</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control" value="{{ $book->user->name }}"
                                                placeholder="user">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <label class="font-weight-bold col-form-label-lg">Status Prestamo</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control"
                                                value="{{ $book->statusPrestamo ? 'Prestado' : 'Disponible' }}"
                                                placeholder="statusPrestamo">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="font-weight-bold col-form-label-lg">Fecha de creación</label>
                                        <div class="input-group input-group-lg">
                                            <input type="datetime-local" class="form-control"
                                                value={{ $book->created_at->format('Y-m-d\TH:i') ?? '' }}
                                                placeholder="created_at">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold col-form-label-lg">Fecha de actualización</label>
                                        <div class="input-group input-group-lg">
                                            <input type="datetime-local" class="form-control"
                                                value={{ $book->updated_at->format('Y-m-d\TH:i') ?? '' }}
                                                placeholder="updated_at">
                                        </div>
                                    </div>

                                </div>

                            </fieldset>
                        </form>

                        <div class="row justify-content-md-center p-5">
                            <a class="btn btn-outline-primary " href="{{ route('book.index') }}"> <i
                                    class="fas fa-arrow-left"></i>
                                Regresar</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
