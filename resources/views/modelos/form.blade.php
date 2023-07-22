<div class="modal fade" id="modal-form-marcas" tabindex="-1" aria-labelledby="modal-new-usuario-label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-new-modelo-label">Novo Modelo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('modelos.store') }}" method="POST" id="form-modelos"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" required class="form-control" id="nome" name='nome'
                                placeholder="Marca ...">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="id_marca" class="form-label">Marca:</label>
                            <select required class="form-select" id='id_marca' name='id_marca'>
                                <option value="">[Selecione]</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                {{-- <button type="submit" onclick="$('#form-modelos').submit()" class="btn btn-primary">Salvar</button> --}}
            </div>
        </div>
    </div>
</div>
