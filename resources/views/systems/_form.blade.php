@csrf
<label for="name">Nome</label>
<input type="text" id="name" name="name" value="{{ old('name', $system->name) }}" required>
@error('name')<div class="error">{{ $message }}</div>@enderror

<label for="description">Descrição</label>
<textarea id="description" name="description" rows="4">{{ old('description', $system->description) }}</textarea>
@error('description')<div class="error">{{ $message }}</div>@enderror

<label for="url">URL</label>
<input type="url" id="url" name="url" value="{{ old('url', $system->url) }}">
@error('url')<div class="error">{{ $message }}</div>@enderror

<label for="active">
    <input type="checkbox" id="active" name="active" value="1" style="width: auto;" @checked(old('active', $system->active))>
    Ativo
</label>
@error('active')<div class="error">{{ $message }}</div>@enderror

<p>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a class="btn" href="{{ route('systems.index') }}">Cancelar</a>
</p>
