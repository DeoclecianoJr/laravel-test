@csrf
<label for="name">Nome</label>
<input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
@error('name')<div class="error">{{ $message }}</div>@enderror

<label for="description">Descrição</label>
<textarea id="description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
@error('description')<div class="error">{{ $message }}</div>@enderror

<label for="price">Preço</label>
<input type="number" step="0.01" min="0" id="price" name="price" value="{{ old('price', $product->price) }}" required>
@error('price')<div class="error">{{ $message }}</div>@enderror

<label for="stock">Estoque</label>
<input type="number" step="1" min="0" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
@error('stock')<div class="error">{{ $message }}</div>@enderror

<p>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a class="btn" href="{{ route('products.index') }}">Cancelar</a>
</p>
