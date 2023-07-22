<script type="text/javascript" src="{{ asset('js\veiculos.js') }}"></script>

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
                            <form action="{{ route('veiculos.store') }}" method="POST" id="form-veiculos"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    {{-- <div class="col-sm-12 position-relative top-0 start-0" style="display: flex; justify-content: center; align-items: center">
                                        <img class="img-fluid" style="max-height: 250px; max-width: 250px" src="{{ asset($marca->url_logo) }}" alt="">
                                    </div> --}}
                                    <div class="row">

                                        {{-- Marca --}}
                                        <div class="col-sm-6">
                                            <label for="id_marca" class="form-label">Marca:</label>
                                            <select required class="form-select" id='id_marca' name='id_marca'
                                                onchange="setModelos('{{ route('modelos.marca') }}', '{{ csrf_token() }}')">
                                                <option value="">[Selecione]</option>
                                                @foreach ($marcas as $marca)
                                                    <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Modelo --}}
                                        <div class="col-sm-6">
                                            <label for="id_modelos" class="form-label">Modelo:</label>
                                            <div id='div-select-modelos'>
                                                <select required class="form-select" id='id_modelo' name='id_modelo'>
                                                    <option value="">[Selecione a Marca]</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    <div class="row">

                                        {{-- Ano Fabricação --}}
                                        <div class="col-sm-4">
                                            <label for="ano_fabricacao" class="form-label">Ano Fabricação:</label>
                                            <select required class="form-select" id='ano_fabricacao' name='ano_fabricacao'>
                                                <option value="">[Selecione]</option>
                                                @foreach ($arrayAnos as $ano)
                                                    <option value="{{ $ano }}">{{ $ano }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Ano Modelo --}}
                                        <div class="col-sm-4">
                                            <label for="ano_modelo" class="form-label">Ano Modelo:</label>
                                            <select required class="form-select" id='ano_modelo' name='ano_modelo'>
                                                <option value="">[Selecione]</option>
                                                @foreach ($arrayAnos as $ano)
                                                    <option value="{{ $ano }}">{{ $ano }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- Cor --}}
                                        <div class="col-sm-4">
                                            <label for="cor" class="form-label">Cor:</label>
                                            <select required class="form-select" id='cor' name='cor'>
                                                <option value="">[Selecione]</option>
                                                @foreach ($cores as $cor)
                                                    <option value="{{ $cor }}">{{ $cor }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">

                                        {{-- Placa --}}
                                        <div class="col-sm-4">
                                            <label for="placa" class="form-label">Placa</label>
                                            <input required class="form-control" type="text" id="placa"
                                                name="placa" placeholder="AAA-9999">
                                        </div>

                                        {{-- KM --}}
                                        <div class="col-sm-4">
                                            <label for="quilometragem" class="form-label">Quilometragem</label>
                                            <input required class="form-control" type="text" id="quilometragem"
                                                name="quilometragem" placeholder="100000">
                                        </div>

                                        {{-- Preço --}}
                                        <div class="col-sm-4">
                                            <label for="preco" class="form-label">Preço</label>
                                            <input required class="form-control" type="number" id="preco"
                                                name="preco" placeholder="R$ 100.000">
                                        </div>

                                    </div>
                                    <div class="row">
                                        {{-- Descrição --}}
                                        <div class="col-sm-12">
                                            <label for="descricao" class="form-label">Descricao:</label>
                                            <textarea required class="form-control" rows="5" id="descricao" name="descricao"
                                                placeholder="Informe uma descição para o veiculo..."></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="formFile" class="form-label">Fotos</label>
                                            <input required class="form-control" type="file" id="fotos"
                                                name="fotos[]" multiple>
                                        </div>
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
