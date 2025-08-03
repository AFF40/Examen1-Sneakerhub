<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - SneakerHub</title>
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
            padding: 20px 0;
        }

        .auth-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            width: 90%;
            max-width: 500px;
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
            padding: 35px 30px;
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
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .logo i {
            font-size: 2.2rem;
        }

        .auth-subtitle {
            font-size: 0.95rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .auth-body {
            padding: 45px 30px 25px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #555;
            font-size: 13px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px 12px 40px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }

        .form-icon {
            position: absolute;
            left: 12px;
            top: 32px;
            color: #999;
            font-size: 14px;
        }

        .form-input:focus + .form-icon {
            color: #667eea;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .btn-register {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-register:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .message {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: none;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            animation: slideInMessage 0.3s ease;
        }

        .error-message {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
        }

        .success-message {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
        }

        @keyframes slideInMessage {
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
            padding: 15px 30px 25px;
            color: #666;
            font-size: 13px;
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
            width: 18px;
            height: 18px;
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
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            animation: float 8s ease-in-out infinite;
        }

        .floating-elements::before {
            top: 15%;
            right: 15%;
            animation-delay: 0s;
        }

        .floating-elements::after {
            bottom: 15%;
            left: 15%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(180deg); }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .auth-container {
                margin: 10px;
                width: calc(100% - 20px);
            }
            
            .auth-header {
                padding: 25px 20px;
            }
            
            .auth-body {
                padding: 35px 20px 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .logo {
                font-size: 1.6rem;
            }
            
            .logo i {
                font-size: 1.9rem;
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
            <p class="auth-subtitle">Únete a la comunidad premium</p>
        </div>
        
        <div class="auth-body">
            <div id="error-message" class="message error-message">
                <i class="fas fa-exclamation-triangle"></i>
                <span></span>
            </div>
            
            <div id="success-message" class="message success-message">
                <i class="fas fa-check-circle"></i>
                <span></span>
            </div>
            
            <form id="register-form">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <input type="text" class="form-input" id="name" required>
                    <i class="fas fa-user form-icon"></i>
                </div>
                
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-input" id="email" required>
                    <i class="fas fa-envelope form-icon"></i>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-input" id="password" required>
                        <i class="fas fa-lock form-icon"></i>
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar</label>
                        <input type="password" class="form-input" id="password_confirmation" required>
                        <i class="fas fa-lock form-icon"></i>
                    </div>
                </div>
                
                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i>
                    <span class="btn-text">Crear Cuenta</span>
                </button>
            </form>
        </div>
        
        <div class="auth-footer">
            ¿Ya tienes cuenta? <a href="/login">Inicia sesión</a>
        </div>
    </div>

    <script>
        document.getElementById('register-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Elementos del DOM
            const submitBtn = document.querySelector('.btn-register');
            const btnText = document.querySelector('.btn-text');
            const btnIcon = submitBtn.querySelector('i');
            const errorMessage = document.getElementById('error-message');
            const successMessage = document.getElementById('success-message');
            const errorText = errorMessage.querySelector('span');
            const successText = successMessage.querySelector('span');
            
            // Mostrar estado de carga
            submitBtn.disabled = true;
            btnIcon.className = 'spinner';
            btnText.textContent = 'Creando cuenta...';
            
            // Ocultar mensajes previos
            errorMessage.style.display = 'none';
            successMessage.style.display = 'none';
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            
            try {
                const response = await fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: passwordConfirmation
                    })
                });
                
                const data = await response.json();
                
                if (!response.ok) {
                    throw new Error(data.message || 'Error al registrarse');
                }
                
                // Mostrar éxito
                btnIcon.className = 'fas fa-check';
                btnText.textContent = '¡Cuenta creada!';
                submitBtn.style.background = 'linear-gradient(135deg, #27ae60 0%, #2ecc71 100%)';
                
                successText.textContent = '¡Registro exitoso! Redirigiendo a tu tienda...';
                successMessage.style.display = 'flex';
                
                // Guardar el token
                localStorage.setItem('auth_token', data.access_token);
                
                // Pequeña pausa para mostrar el éxito
                setTimeout(() => {
                    window.location.href = '/tienda';
                }, 2000);
                
            } catch (error) {
                // Mostrar error
                errorText.textContent = error.message;
                errorMessage.style.display = 'flex';
                
                // Restaurar botón
                submitBtn.disabled = false;
                btnIcon.className = 'fas fa-user-plus';
                btnText.textContent = 'Crear Cuenta';
                submitBtn.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
            }
        });
    </script>
</body>
</html>