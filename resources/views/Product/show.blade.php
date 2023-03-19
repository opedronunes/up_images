<x-layout>
    <section class="row vh-100 justfy-content-center">
        <div class="py-3 d-flex justify-content-between align-items-center">
            <h4>Detalhes do produto</h4>
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-success">Voltar</a>
        </div>
        <div class="col-md-6">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->description }}</p>
        </div>
        <div class="col-md-6">
            <div class="row gap-2">
                @foreach($product->images as $pimages)
                    <img src="../../../storage/{{ $pimages->url }}" alt="ProjectImage" class=" shadow img-fluid img-thumbnail"/>
                @endforeach 
            </div>
        </div>
    </section>
</x-layout>