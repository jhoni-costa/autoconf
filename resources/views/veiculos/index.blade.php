<script>
    remove = (id) => {
        if (confirm('Deseja realmente excluir esta marca?')) {

            $.ajax({
                    url: '{{ route('marcas.delete') }}',
                    type: 'post',
                    data: {
                        "id": id,
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        //                $("#resultado").html("ENVIANDO...");
                    }
                })
                .done(function(ret) {
                    alert("Marca removida com sucesso!");
                    window.location.reload(true);
                })
                .fail(function(jqXHR, textStatus, msg) {
                    console.log(jqXHR, textStatus, msg);
                });
        }
    }
</script>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a type="button" class="btn btn-small btn-primary" href="{{ route('veiculos.new') }}">Cadastrar</a>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Veiculo</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @forelse($veiculos as $veiculo)
                                        <tr>
                                            <td class="text-center">{{ $veiculo->id }}</td>
                                            {{-- <td>
                                                <img style="max-width: 50px; max-height: 50px"
                                                    src="{{ asset($marca->url_logo) }}" alt="">
                                            </td> --}}
                                            <td class="text-center">{{ $veiculo->modelo->nome }}</td>
                                            <td class="text-center">{{ $veiculo->descricao }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a type="button" href='{{ route('veiculos.edit', $veiculo->id) }}'
                                                        class="btn btn-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" onclick="remove({{ $veiculo->id }})"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>

                                            <td class="text-center" colspan="3">Nenhum registro encontrado</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div style="margin-top: 1rem">
                        {{ $veiculos->links() }}
                    </div>
                </div>
            </div>
        </div>
        @include('marcas.form')
    </div>
@endsection