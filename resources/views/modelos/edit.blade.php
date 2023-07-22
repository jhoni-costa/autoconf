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
                            <form action="{{ route('modelos.update') }}" method="POST" id="form-modelos"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-12">
                                        <input type="hidden" id="id" name='id' value="{{ $modelo->id }}">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="nome" class="form-label">Nome:</label>
                                        <input type="text" required class="form-control" id="nome" name='nome'
                                            value="{{ $modelo->nome }}" placeholder="Modelo ...">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="id_marca" class="form-label">Marca:</label>
                                        <select required class="form-select" id='id_marca' name='id_marca'>
                                            <option value="">[Selecione]</option>
                                            @foreach ($marcas as $marca)
                                                <option {{ $marca->id == $modelo->id_marca ? 'selected' : '' }}
                                                    value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
