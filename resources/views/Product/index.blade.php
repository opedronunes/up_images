@section('title', 'Produtos')
    
<x-layout>

    <section>
        <div class="py-5 d-flex justify-content-between align-items-center">
            <h4>Todos os Produtos</h4>
            <div>
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Novo
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Novo produto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-column">
                                            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nome:</label>
                                                    <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="Digite o nome do produto" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Descrição:</label>
                                                    <input class="form-control" name="description" value="{{old('description')}}" id="description">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="photos" class="form-label">Imagen:</label>
                                                    <input type="file" name="photos[]" id="photos" multiple class="form-control">
                                                </div>
                                                
                                                <div class="d-flex justify-content-between py-2">
                                                    <button class="btn btn-sm btn-primary" type="submit" >Criar</button>
                                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
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
            <thead class="text-center">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Imagens</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="text-center">
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <div class="d-flex flex-column flex-md-row gap-2 justify-content-center">
                                @foreach($product->images as $pimages)
                                <img src="../../../storage/{{ $pimages->url }}" alt="ProjectImage" class="shadow img-thumbnail w-25 h-25 p-0"/>
                                @endforeach 
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('products.show', $product->id) }}">Visualizar</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('products.edit', $product->id) }}">editar</a>
                        </td>
                        <td>
                            <form id="form_{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <!--<button type="submit">Excluir</button>-->
                                <a class="btn btn-sm btn-danger" href="#" onclick="document.getElementById('form_{{ $product->id }}').submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->appends($request)->links() }}
    </section>
</x-layout>