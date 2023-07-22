@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-small btn-primary" onclick="history.go(-1)">VOLTAR</button>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <form action="{{ route('marcas.update') }}" method="POST" id="form-marcas"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12 position-relative top-0 start-0" style="display: flex; justify-content: center; align-items: center">
                                        <img class="img-fluid" style="max-height: 250px; max-width: 250px" src="{{ asset($marca->url_logo) }}" alt="">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="hidden" id="id" name='id'value="{{ $marca->id }}">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="nome" class="form-label">Nome:</label>
                                        <input type="text" class="form-control" id="nome" name='nome'value="{{ $marca->nome }}" placeholder="">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="formFile" class="form-label">Logo...</label>
                                        <input class="form-control" type="file" id="file_logo" name="file_logo">
                                    </div>
                                    <div class="col-sm-12" style="padding-top: .5rem">
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('marcas.form')
    </div>
@endsection
