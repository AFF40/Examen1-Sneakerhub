<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SneakerHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">SneakerHub</a>
            <button class="btn btn-danger" id="logout-btn">Cerrar sesión</button>
        </div>
    </nav>

    <div class="container">
        <h1>Bienvenido al Dashboard</h1>
        <p class="lead">Has iniciado sesión correctamente.</p>
        
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Información del usuario</h5>
                <div id="user-info"></div>
            </div>
        </div>
    </div>

    <script>
        // Verificar autenticación al cargar la página
        const token = localStorage.getItem('auth_token');
        
        if (!token) {
            // Si no hay token, redirigir al login
            window.location.href = '/login';
        } else {
            // Mostrar información del usuario
            const userInfo = document.getElementById('user-info');
            
            // Obtener información del usuario
            fetch('/api/user', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    // Si el token no es válido, redirigir al login
                    if (response.status === 401) {
                        localStorage.removeItem('auth_token');
                        window.location.href = '/login';
                        return;
                    }
                    throw new Error('Error al obtener información del usuario');
                }
                return response.json();
            })
            .then(user => {
                userInfo.innerHTML = `
                    <p><strong>Nombre:</strong> ${user.name}</p>
                    <p><strong>Email:</strong> ${user.email}</p>
                    <p><strong>Miembro desde:</strong> ${new Date(user.created_at).toLocaleDateString()}</p>
                `;
            })
            .catch(error => {
                console.error('Error:', error);
                // En caso de error, limpiar token y redirigir
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
            });
        }

        // Manejar logout
        document.getElementById('logout-btn').addEventListener('click', async function() {
            const token = localStorage.getItem('auth_token');
            try {
                const response = await fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });
                
                // Independientemente de la respuesta, limpiar el token y redirigir
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
                
            } catch (error) {
                console.error('Error al cerrar sesión:', error);
                // Aún así, limpiar el token y redirigir
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
            }
        });
    </script>
</body>
</html>