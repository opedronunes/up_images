<x-layout>
    <section class="row">
        <div class="col-md-6">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->description }}</p>
        </div>
        <div class="col-md-6 flex flex-row gap-2">
            @foreach($product->images as $pimages)
                <img src="../../../storage/{{ $pimages->url }}" alt="ProjectImage" class="img-thumbnail w-25 h-25 p-0"/>
            @endforeach 
        </div>
    </section>
</x-layout>