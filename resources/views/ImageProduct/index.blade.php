@section('title', 'Images')
<x-layout>
    <section>
        <div class="py-3 d-flex justify-content-between align-items-center">
            <h4>Imagens</h4>
            <div>
                <a href="" class="btn btn-sm btn-success">Novo</a>
            </div>
        </div>
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
                        <td>{{ $image->product->name }}</td>
                        <td>{{ $image->product->description }}</td>
                        <td></td>
                        <td>
                            <form id="form_{{ $image->id }}" action="{{ route('product-images.destroy', $image->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <!--<button type="submit">Excluir</button>-->
                                <a class="btn btn-sm btn-danger" href="#" onclick="document.getElementById('form_{{ $image->id }}').submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $images->appends($request)->links() }}
    </section>
</x-layout>