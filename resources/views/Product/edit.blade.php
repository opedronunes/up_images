@section('title', 'Edição')
<x-layout>
    <section>
        <div class="py-3 d-flex justify-content-between align-items-center">
            <h4>Editar produto</h4>
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-success">Voltar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $erro)
                                    <li>{{ $erro }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome:</label>
                            <input type="text" name="name" id="name" value="{{ $product->name ?? old('name') }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição:</label>
                            <input class="form-control" name="description" value="{{ $product->description ?? old('description') }}" id="description" rows="3">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex gap-2">
                                @foreach($product->images as $pimages)
                                <div class="d-flex flex-column w-auto h-100 gap-2">
                                    <img src="../../../storage/{{ $pimages->url }}" value="{{ $pimages->url ?? old('url') }}" class="w-100 rounded" alt="">
                                    <div class="my-3">
                                        <a href="{{ route('images.destroy', $pimages->id) }}" class="btn btn-sm btn-secondary">excluir</a>
                                    </div>
                                </div>
                                
                                @endforeach
                            </div>
                            <label for="photos" class="form-label">Imagen:</label>
                            <input type="file" name="photos[]" id="photos" placeholder="nova imagem" multiple class="form-control">
                        </div>
                        
                        <div class="py-2">
                            <button class="btn btn-sm btn-primary" type="submit" >Submit</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
</x-layout>