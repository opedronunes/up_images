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
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-layout>