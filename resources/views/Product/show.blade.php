<x-layout>
    <section>
        <div class="py-3 d-flex justify-content-between align-items-center">
            <h4>Detalhes do produto</h4>
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-success">Voltar</a>
        </div>
        <div class="row my-5">
            <div class="card border-0 mb-3 p-2 shadow">
                <div class="row g-0">
                  <div class="col-md-4">
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      <p class="card-text">{{ $product->description }}</p>
                      <p class="card-text"><small class="text-body-secondary">Criado em: {{ $product->created_at }}</small></p>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                        @foreach($product->images as $pimages)
                        <div class="col-md-6">
                            <img src="../../../storage/{{ $pimages->url }}" alt="ProjectImage" class=" shadow rounded img-fluid"/>
                        </div>
                        @endforeach 
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>