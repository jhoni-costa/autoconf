<div class="modal fade" id="modal-form-marcas" tabindex="-1" aria-labelledby="modal-new-usuario-label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-new-usuario-label">Nova Marca</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('marcas.store') }}" method="POST" id="form-marcas" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" required class="form-control" id="nome" name='nome' placeholder="Marca ...">
                        </div>
                        <div class="col-sm-12">
                            <label for="formFile" class="form-label">Logo...</label>
                            <input class="form-control" required type="file" id="file_logo" name="file_logo">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" onclick="$('#form-marcas').submit()" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
