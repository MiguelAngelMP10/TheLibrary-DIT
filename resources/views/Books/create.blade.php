@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header h2 text-center text-bold">{{ __('Book') }}</div>

                    <div class="card-body">

                        <form action="{{ route('book.store') }}" method="POST">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-5">
                                    <label class="font-weight-bold col-form-label-lg">name</label>
                                    <div class="input-group input-group-lg">
                                        <input type="text"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="name">
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
                                            value="{{ old('author') }}" placeholder="author" name="author">
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
                                            value="{{ old('publishedDate') }}" placeholder="publishedDate"
                                            name="publishedDate">
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
                                        <select
                                            class="js-example-basic-single col @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                            @foreach ($categories as $row)
                                                <option value="{{ $row->id }}">
                                                    {{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="font-weight-bold col-form-label-lg">User</label>
                                    <div class="input-group input-group-lg">
                                        <select class="js-example-basic-single col @error('user_id') is-invalid @enderror"
                                            name="user_id">
                                            @foreach ($users as $row)
                                                <option value="{{ $row->id }}">
                                                    {{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label class="font-weight-bold col-form-label-lg">Status Prestamo</label>
                                    <div class="input-group input-group-lg">

                                        <select class="form-control @error('statusPrestamo') is-invalid @enderror"
                                            name="statusPrestamo">
                                            <option value="1">
                                                Prestado
                                            </option>
                                            <option value="0">
                                                Disponible
                                            </option>
                                        </select>
                                        @error('statusPrestamo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror


                                    </div>
                                </div>


                            </div>

                            <div class="row justify-content-md-center p-5">
                                <a class="btn btn-outline-primary " href="{{ route('book.index') }}"> <i
                                        class="fas fa-arrow-left"></i>
                                    Regresar</a>
                                <button class="btn btn-outline-success" type="submit"><i class="far fa-plus-square"></i>
                                    guardar</button>

                            </div>

                        </form>


                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
