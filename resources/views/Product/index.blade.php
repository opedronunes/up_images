<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
    <h1>tela de produtos</h1>
    <div>
        <h3>Upload a Images</h3>
        <hr>
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div >
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter Product Name">
        <label>Discription</label>
        <textarea name="description" rows="4" >
        </textarea></div>
        <div >
        <label>Choose Images</label>
        <input type="file"  name="images" multiple>
        </div>
        <hr>
        <button type="submit" >Submit</button>
        </form>
        </div>
</body>
</html>