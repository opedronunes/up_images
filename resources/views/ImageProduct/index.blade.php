@section('title', 'Images')
<x-layout>
    <section>
        <div class="py-3 d-flex justify-content-between align-items-center">
            <h4>Criar novo produto</h4>
            <div>
                <a href="" class="btn btn-sm btn-success">Novo</a>
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
                @foreach ($images as $image)
                    <tr>
                        <td>
                            <img src="{{ $image->url }}" alt="ProjectImage" class="img-thumbnail" style="width: 50%; height: 50px;"/> 
                                                            
                        </td>
                        <td>{{ $image->product->name }}</td>
                        <td>{{ $image->product->description }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $images->appends($request)->links() }}

            <!-- 
                
                {{ $images->count() }} - Total de reistros por página
                {{ $images->total() }} - Total de reistros da consulta
                {{ $images->firstItem() }} - Número do primeiro registro da página
                {{ $images->lastItem() }} - Número do último registro da página
            -->

            Exibindo {{ $images->count() }} images de {{ $images->total() }} (de {{ $images->firstItem() }} a {{ $images->lastItem() }})
    </section>
</x-layout>