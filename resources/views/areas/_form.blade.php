@csrf
<label for="name">Nome</label>
<input type="text" id="name" name="name" value="{{ old('name', $area->name) }}" required>
@error('name')<div class="error">{{ $message }}</div>@enderror

<label for="description">Descrição</label>
<textarea id="description" name="description" rows="4">{{ old('description', $area->description) }}</textarea>
@error('description')<div class="error">{{ $message }}</div>@enderror

<label for="active">
    <input type="checkbox" id="active" name="active" value="1" style="width: auto;"
           @checked(old('active', $area->exists ? $area->active : true))>
    Ativo
</label>
@error('active')<div class="error">{{ $message }}</div>@enderror

<p>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a class="btn" href="{{ route('areas.index') }}">Cancelar</a>
</p>
