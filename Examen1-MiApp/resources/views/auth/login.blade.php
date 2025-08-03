<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SneakerHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
        }

        .auth-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            width: 90%;
            max-width: 450px;
            overflow: hidden;
            animation: slideInUp 0.6s ease;
        }

        @keyframes slideInUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .auth-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }

        .auth-header::before {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            border-right: 20px solid transparent;
            border-top: 20px solid #764ba2;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .logo i {
            font-size: 2.5rem;
        }

        .auth-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .auth-body {
            padding: 50px 30px 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px 15px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            background: white;
        }

        .form-icon {
            position: absolute;
            left: 15px;
            top: 38px;
            color: #999;
            font-size: 16px;
        }

        .form-input:focus + .form-icon {
            color: #667eea;
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-login:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .error-message {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 15px 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            display: none;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            animation: slideInError 0.3s ease;
        }

        @keyframes slideInError {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .auth-footer {
            text-align: center;
            padding: 20px 30px 30px;
            color: #666;
            font-size: 14px;
        }

        .auth-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .auth-footer a:hover {
            color: #764ba2;
        }

        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Floating elements decoration */
        .floating-elements {
            position: fixed;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-elements::before,
        .floating-elements::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-elements::before {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-elements::after {
            bottom: 10%;
            right: 10%;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .auth-container {
                margin: 20px;
                width: calc(100% - 40px);
            }
            
            .auth-header {
                padding: 30px 20px;
            }
            
            .auth-body {
                padding: 40px 20px 20px;
            }
            
            .logo {
                font-size: 1.8rem;
            }
            
            .logo i {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements"></div>
    
    <div class="auth-container">
        <div class="auth-header">
            <div class="logo">
                <i class="fas fa-running"></i>
                <span>SneakerHub</span>
            </div>
            <p class="auth-subtitle">Bienvenido de vuelta</p>
        </div>
        
        <div class="auth-body">
            <div id="error-message" class="error-message">
                <i class="fas fa-exclamation-triangle"></i>
                <span></span>
            </div>
            
            <form id="login-form">
                @csrf
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-input" id="email" required>
                    <i class="fas fa-envelope form-icon"></i>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-input" id="password" required>
                    <i class="fas fa-lock form-icon"></i>
                </div>
                
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="btn-text">Iniciar Sesión</span>
                </button>
            </form>
        </div>
        
        <div class="auth-footer">
            ¿No tienes cuenta? <a href="/register">Crea una cuenta</a>
        </div>
    </div>

    <script>
    document.getElementById('login-form').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Elementos del DOM
        const submitBtn = document.querySelector('.btn-login');
        const btnText = document.querySelector('.btn-text');
        const btnIcon = submitBtn.querySelector('i');
        const errorMessage = document.getElementById('error-message');
        const errorText = errorMessage.querySelector('span');
        
        // Mostrar estado de carga
        submitBtn.disabled = true;
        btnIcon.className = 'spinner';
        btnText.textContent = 'Iniciando sesión...';
        
        // Ocultar errores previos
        errorMessage.style.display = 'none';
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
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
            
            console.log('Respuesta del servidor:', data);
            
            // Mostrar éxito
            btnIcon.className = 'fas fa-check';
            btnText.textContent = '¡Bienvenido!';
            submitBtn.style.background = 'linear-gradient(135deg, #27ae60 0%, #2ecc71 100%)';
            
            // Guardar el token
            localStorage.setItem('auth_token', data.access_token);
            
            // Pequeña pausa para mostrar el éxito
            setTimeout(() => {
                // Redirigir usando la URL proporcionada por el servidor
                if (data.redirect_to) {
                    window.location.href = data.redirect_to;
                } else {
                    window.location.href = '/dashboard';
                }
            }, 1000);
            
        } catch (error) {
            // Mostrar error
            errorText.textContent = error.message;
            errorMessage.style.display = 'flex';
            
            // Restaurar botón
            submitBtn.disabled = false;
            btnIcon.className = 'fas fa-sign-in-alt';
            btnText.textContent = 'Iniciar Sesión';
            submitBtn.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
        }
    });
    </script>
</body>
</html>