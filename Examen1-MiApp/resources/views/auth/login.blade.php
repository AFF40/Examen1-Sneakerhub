<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SneakerHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .auth-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-container">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>
            
            <div id="error-message" class="alert alert-danger d-none"></div>
            
            <form id="login-form">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>
            
            <div class="mt-3 text-center">
                ¿No tienes cuenta? <a href="/register">Regístrate</a>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('login-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // Mostrar estado de carga
    const submitBtn = document.querySelector('#login-form button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Ingresando...';
    
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');
    
    errorMessage.classList.add('d-none');
    
    try {
        const response = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        });
        
        const data = await response.json();
        
        if (!response.ok) {
            throw new Error(data.message || 'Error al iniciar sesión');
        }
        
        console.log('Respuesta del servidor:', data); // Para depuración
        
        // 1. Guardar el token
        localStorage.setItem('auth_token', data.access_token);
        
        // 2. Pequeña pausa para asegurar que el token se guarde
        setTimeout(() => {
            // 3. Redirigir usando la URL proporcionada por el servidor
            if (data.redirect_to) {
                window.location.href = data.redirect_to;
            } else {
                // Redirección por defecto si no viene en la respuesta
                window.location.href = '/dashboard';
            }
        }, 100);
        
    } catch (error) {
        errorMessage.textContent = error.message;
        errorMessage.classList.remove('d-none');
    } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Ingresar';
    }
});
    </script>
</body>
</html>