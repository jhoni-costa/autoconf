<select class="form-select" id='id_modelo' name='id_modelo'>
    <option value="">[Selecione]</option>
    @foreach ($modelos as $modelo)
    <option value="{{ $modelo->id }}">{{ $modelo->nome}}</option>
    @endforeach
</select>