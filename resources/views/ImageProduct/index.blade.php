@section('title', 'Images')
<x-layout>
    <section>
        <div class="py-3 d-flex justify-content-between align-items-center">
            <h4>Imagens</h4>
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
                            
                            <img src="../../../storage/{{ $image->url }}" alt="ProjectImage" class="img-thumbnail" style="width: 50%; height: 50px;"/> 
                                                            
                        </td>
                        <td>{{ $image->products->name }}</td>
                        <td>{{ $image->products->description }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $images->appends($request)->links() }}
    </section>
</x-layout>