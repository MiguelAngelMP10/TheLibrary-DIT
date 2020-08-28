@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header h2 text-center text-bold">{{ __('Categoria') }}</div>

                    <div class="card-body">

                        <form>
                            <fieldset disabled>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label class="font-weight-bold col-form-label-lg">id</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control" value="{{ $category->id }}"
                                                placeholder="id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold col-form-label-lg">Nombre</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control" value="{{ $category->name }}"
                                                placeholder="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold col-form-label-lg">Descripción</label>
                                        <div class="input-group input-group-lg">
                                            <input type="text" class="form-control" value="{{ $category->description }}"
                                                placeholder="description">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold col-form-label-lg">Fecha de creación</label>
                                        <div class="input-group input-group-lg">
                                            <input type="datetime-local" class="form-control"
                                                value={{ $category->created_at->format('Y-m-d\TH:i') ?? '' }}
                                                placeholder="created_at">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold col-form-label-lg">Fecha de actualización</label>
                                        <div class="input-group input-group-lg">
                                            <input type="datetime-local" class="form-control"
                                                value={{ $category->updated_at->format('Y-m-d\TH:i') ?? '' }}
                                                placeholder="updated_at">
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                        </form>

                        <div class="row justify-content-md-center p-5">
                            <a class="btn btn-outline-primary " href="{{ route('category.index') }}"> <i
                                    class="fas fa-arrow-left"></i>
                                Regresar</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
