@section('title', 'Criar')
    
<x-layout>
    <section>
        <div class="py-3 d-flex justify-content-between align-items-center">
            <h4>Criar novo produto</h4>
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
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome:</label>
                            <input type="text" name="name" id="name" placeholder="Digite o nome do produto" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição:</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="photos" class="form-label">Imagen:</label>
                            <input type="file" name="photos[]" id="photos" multiple class="form-control">
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