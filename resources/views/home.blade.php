@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <h4><b>Confira os melhores veiculos...</b></h4>
            </div>
            <div class="row">
                @foreach ($veiculos as $veiculo)
                    <div class="col-sm-4">
                        <div class="card">
                            <div id="carouselExampleIndicators_{{$veiculo->id}}" class="carousel slide">
                                <div class="carousel-indicators">
                                    @foreach ($veiculo->fotos as $foto)
                                    <button type="button" data-bs-target="#carouselExampleIndicators_{{$veiculo->id}}" data-bs-slide-to="{{ $loop->iteration -1 }}"
                                        class="active" aria-current="true" aria-label="Slide {{ $loop->iteration }}"></button>

                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach ($veiculo->fotos as $foto)
                                        <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : ''}}">
                                            <img style="max-height: 350px; max-width: 350px" src="{{ asset($foto->url) }}" class="img-fluid d-block w-100 rounded mx-auto" alt="{{ $foto->nome }}">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators_{{$veiculo->id}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators_{{$veiculo->id}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$veiculo->marca->nome}} - {{ $veiculo->modelo->nome }} - {{ $veiculo->ano_fabricacao}}/{{$veiculo->ano_modelo}}</h5>
                                <p class="card-text">{{$veiculo->descricao}}</p>
                                <p>R$ {{ $veiculo->preco}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
