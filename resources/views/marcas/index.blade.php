<script type="text/javascript" src="{{ asset('js\marcas.js') }}"></script>

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
                                        <th>Logo</th>
                                        <th>Marca</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @forelse($marcas as $marca)
                                        <tr>
                                            <td class="text-center">{{ $marca->id }}</td>
                                            <td>
                                                <img style="max-width: 50px; max-height: 50px"
                                                    src="{{ asset($marca->url_logo) }}" alt="">
                                            </td>
                                            <td class="text-center">{{ $marca->nome }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a type="button" href='{{ route('marcas.edit', $marca->id) }}'
                                                        class="btn btn-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" onclick="remove({{ $marca->id }}, '{{ route('marcas.delete') }}', '{{ csrf_token() }}')"
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
                        {{ $marcas->links() }}
                    </div>
                </div>
            </div>
        </div>
        @include('marcas.form')
    </div>
@endsection
