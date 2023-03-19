@section('title', 'Produtos')
    
<x-layout>

    <section>
        <div class="py-3 d-flex justify-content-between align-items-center">
            <h4>Todos os Produtos</h4>
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">Novo</a>
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