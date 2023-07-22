<script>
    remove = (id) => {
        if (confirm('Deseja realmente excluir esta marca?')) {

            $.ajax({
                    url: '{{ route('modelos.delete') }}',
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
                        <button type="button" class="btn btn-small btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-form-marcas">Cadastrar</button>

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
                                        <th>Modelo</th>
                                        <th>Marca</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @forelse($modelos as $modelo)
                                        <tr>
                                            <td class="text-center">{{ $modelo->id }}</td>
                                            <td class="text-center">{{ $modelo->nome }}</td>
                                            <td class="text-center">{{ $modelo->marca->nome }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a type="button" href='{{ route('modelos.edit', $modelo->id) }}'
                                                        class="btn btn-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" onclick="remove({{ $modelo->id }})"
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
            </div>
        </div>
      
        @include('modelos.form')
    </div>
@endsection
