<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
</head>
<body>
    <h1>Nuestros Tenis</h1>
    <div id="productos"></div>

    <script>
        fetch('/api/productos')
            .then(response => response.json())
            .then(data => {
                let html = '';
                data.forEach(producto => {
                    html += `
                        <div>
                            <h3>${producto.nombre}</h3>
                            <p>Precio: $${producto.precio}</p>
                            <p>Marca: ${producto.marca.nombre}</p>
                        </div>
                    `;
                });
                document.getElementById('productos').innerHTML = html;
            });
    </script>
</body>
</html>