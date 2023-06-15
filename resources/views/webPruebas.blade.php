<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web pruebas</title>
</head>
<body>
    <h1>¡Bienvenido a nuestra tienda en línea!</h1>
     <p>Aquí puedes encontrar una gran variedad de productos para hacer tus compras en línea de manera segura y confiable.</p>

     <ul>
        @forelse($datas as $product)    
            <li> ref: {{$product->sku}} </li>
        @empty
            <li>No se encontraron países</li>
        @endforelse
    </ul>
    
    {{$products->links()}}
     
    <form action="/procesar_formulario" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre"><br>

        <label>Dirección:</label>
        <input type="text" name="direccion"><br>

        <label>Ref producto:</label>
        <input type="text" name="direccion"><br>

        <label>Tarjeta de crédito:</label>
        <input type="text" name="tarjeta"><br>

        <input type="submit" value="Comprar">
    </form>

</body>
</html>