<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Products</title>
</head>
<body>
    <main class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column">
                    <h4>Criar produto</h4>
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
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>