@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header h2 text-center text-bold">{{ __('Categoria') }}</div>

                    <div class="card-body">

                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold col-form-label-lg">name</label>
                                    <div class="input-group input-group-lg">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" required placeholder="name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="font-weight-bold col-form-label-lg">description</label>
                                    <div class="input-group input-group-lg">
                                        <input type="text" name="description"
                                            class="form-control @error('description') is-invalid @enderror"
                                            value="{{ old('description') }}" required placeholder="description">
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-md-center p-5">
                                <a class="btn btn-outline-secondary " href="{{ route('category.index') }}"> <i
                                        class="fas fa-arrow-left"></i> Regresar</a>

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
