@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header h2 text-center text-bold">{{ __('Book') }}</div>

                    <div class="card-body">

                        <form action="{{ route('book.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-5">
                                    <label class="font-weight-bold col-form-label-lg">name</label>
                                    <div class="input-group input-group-lg">
                                        <input type="text"
                                            class="form-control form-control-lg  @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name', $book->name) }}" placeholder="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="font-weight-bold col-form-label-lg">author</label>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control @error('author') is-invalid @enderror"
                                            value="{{ old('author', $book->author) }}" placeholder="author" name="author">
                                        @error('author')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="font-weight-bold col-form-label-lg">Published Date</label>
                                    <div class="input-group input-group-lg">
                                        <input type="datetime-local"
                                            class="form-control @error('publishedDate') is-invalid @enderror"
                                            value="{{ old('publishedDate', date('Y-m-d\TH:i', strtotime($book->publishedDate))) }}"
                                            placeholder="publishedDate" name="publishedDate">
                                        @error('publishedDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <label class="font-weight-bold col-form-label-lg">Category</label>
                                    <div class="input-group input-group-lg">
                                        <select class="js-example-basic-single col" name="category_id">
                                            @foreach ($categories as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $book->category->id == $row->id ? 'selected' : '' }}>
                                                    {{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="font-weight-bold col-form-label-lg">User</label>
                                    <div class="input-group input-group-lg">
                                        <select class="js-example-basic-single col" name="user_id">
                                            @foreach ($users as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $book->user->id == $row->id ? 'selected' : '' }}>
                                                    {{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label class="font-weight-bold col-form-label-lg">Status Prestamo</label>
                                    <div class="input-group input-group-lg">

                                        <select class="form-control" name="statusPrestamo">
                                            <option value="1" {{ $book->statusPrestamo ? 'selected' : '' }}>
                                                Prestado
                                            </option>
                                            <option value="0" {{ $book->statusPrestamo ? '' : 'selected' }}>
                                                Disponible
                                            </option>
                                        </select>


                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label class="font-weight-bold col-form-label-lg">Fecha de creación</label>
                                    <div class="input-group input-group-lg">
                                        <input type="datetime-local" class="form-control"
                                            value="{{ $book->created_at->format('Y-m-d\TH:i') ?? '' }}"
                                            placeholder="created_at" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="font-weight-bold col-form-label-lg">Fecha de actualización</label>
                                    <div class="input-group input-group-lg">
                                        <input type="datetime-local" class="form-control "
                                            value="{{ $book->updated_at->format('Y-m-d\TH:i') ?? '' }}"
                                            placeholder="updated_at" disabled>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-md-center p-5">
                                <a class="btn btn-outline-primary " href="{{ route('book.index') }}"> <i
                                        class="fas fa-arrow-left"></i>
                                    Regresar</a>
                                <button class="btn btn-outline-primary" type="submit"><i class="far fa-edit"></i>
                                    Actualizar</button>

                            </div>

                        </form>


                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
