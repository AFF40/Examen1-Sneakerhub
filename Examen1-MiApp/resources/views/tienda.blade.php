<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerHub - Tienda Premium</title>
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
            color: #333;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            text-decoration: none;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-menu {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .admin-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .admin-btn.success {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
        }

        .admin-btn.success:hover {
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }

        .admin-btn.warning {
            background: linear-gradient(45deg, #f39c12, #e67e22);
        }

        .admin-btn.warning:hover {
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.4);
        }

        .divider {
            width: 1px;
            height: 30px;
            background: #e0e0e0;
            margin: 0 10px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 10px 40px 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            outline: none;
            width: 250px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .logout-btn {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(238, 90, 36, 0.4);
        }

        .hero {
            text-align: center;
            padding: 60px 20px;
            color: white;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 40px;
        }

        .productos-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            padding-bottom: 60px;
        }

        .producto {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
        }

        .producto-delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 35px;
            height: 35px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            z-index: 5;
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(231, 76, 60, 0.3);
        }

        .producto-edit-btn {
            position: absolute;
            top: 10px;
            right: 55px;
            width: 35px;
            height: 35px;
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            z-index: 5;
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(243, 156, 18, 0.3);
        }

        .producto:hover .producto-delete-btn,
        .producto:hover .producto-edit-btn {
            opacity: 1;
            transform: scale(1);
        }

        .producto-delete-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.5);
        }

        .producto-edit-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.5);
        }

        .producto:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .producto-imagen {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .producto:hover .producto-imagen {
            transform: scale(1.1);
        }

        .producto-imagen-placeholder {
            width: 100%;
            height: 250px;
            background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 16px;
            font-weight: 500;
        }

        .producto-info {
            padding: 25px;
        }

        .producto h3 {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #2c3e50;
        }

        .producto-descripcion {
            color: #7f8c8d;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 15px;
            height: 40px;
            overflow: hidden;
        }

        .precio {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
        }

        .producto-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .marca {
            background: linear-gradient(45deg, #ff9a9e, #fecfef);
            color: #333;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }

        .categoria {
            background: linear-gradient(45deg, #a8edea, #fed6e3);
            color: #333;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }

        .stock {
            color: #27ae60;
            font-size: 12px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-comprar {
            width: 100%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-comprar:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .loading {
            text-align: center;
            padding: 80px 20px;
            color: white;
        }

        .loading i {
            font-size: 3rem;
            margin-bottom: 20px;
            animation: spin 1s linear infinite;
        }

        .loading h3 {
            font-size: 1.5rem;
            font-weight: 500;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .error {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            margin: 40px 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .error h3 {
            color: #e74c3c;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .error button {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 15px;
            transition: all 0.3s ease;
        }

        .error button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .footer {
            background: rgba(0,0,0,0.1);
            color: white;
            text-align: center;
            padding: 30px 20px;
            margin-top: 60px;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }
            
            .search-box input {
                width: 200px;
            }
            
            .productos-container {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 20px;
            }

            .admin-menu {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        /* Modal de Confirmación */
        .confirm-modal {
            display: none;
            position: fixed;
            z-index: 3000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.6);
            backdrop-filter: blur(8px);
        }

        .confirm-modal-content {
            background: white;
            margin: 15% auto;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 25px 80px rgba(0,0,0,0.4);
            animation: confirmModalSlideIn 0.3s ease;
        }

        @keyframes confirmModalSlideIn {
            from {
                transform: translateY(-30px) scale(0.9);
                opacity: 0;
            }
            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        .confirm-modal-header {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 20px 25px;
            border-radius: 20px 20px 0 0;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .confirm-modal-header i {
            font-size: 24px;
        }

        .confirm-modal-header h3 {
            margin: 0;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .confirm-modal-body {
            padding: 25px;
            text-align: center;
        }

        .confirm-modal-body p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .confirm-modal-body .product-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 18px;
        }

        .confirm-modal-footer {
            padding: 20px 25px;
            display: flex;
            justify-content: center;
            gap: 15px;
            border-top: 1px solid #f0f0f0;
        }

        .btn-confirm {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        .btn-cancel {
            background: #6c757d;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-cancel:hover {
            background: #545b62;
            transform: translateY(-2px);
        }

        /* Estilos específicos para modal de marcas */
        .marca-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 18px;
        }

        #productosAsociados {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #e74c3c;
        }

        .productos-list {
            margin-top: 10px;
        }

        .producto-item {
            display: flex;
            align-items: center;
            padding: 8px 10px;
            background: white;
            border-radius: 5px;
            margin: 5px 0;
            border: 1px solid #dee2e6;
        }

        .producto-item img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 10px;
        }

        .producto-info {
            flex: 1;
        }

        .producto-nombre {
            font-weight: 600;
            color: #2c3e50;
            font-size: 14px;
        }

        .producto-precio {
            color: #27ae60;
            font-size: 12px;
            font-weight: 500;
        }

        .warning-text {
            color: #e74c3c;
            font-weight: 600;
            margin-top: 10px;
        }

        /* Estilos específicos para modal de categorías */
        .categoria-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 18px;
        }

        #productosAsociadosCategoria {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            border-left: 4px solid #e74c3c;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: white;
            margin: 5% auto;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: modalSlideIn 0.3s ease;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 20px 25px;
            border-radius: 20px 20px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .close {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            transition: background 0.3s ease;
        }

        .close:hover {
            background: rgba(255,255,255,0.2);
        }

        .modal-body {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .modal-footer {
            padding: 20px 25px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            border-top: 1px solid #f0f0f0;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #545b62;
            transform: translateY(-2px);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .data-table th,
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        .data-table th {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            font-weight: 600;
        }

        .data-table tr:hover {
            background-color: #f8f9fa;
        }

        .action-btns {
            display: flex;
            gap: 5px;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 15px;
        }

        .btn-edit {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }

        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            z-index: 10;
        }

        .form-error {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 12px 15px;
            border-radius: 10px;
            margin: 10px 0;
            display: flex;
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

        .form-success {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
            padding: 12px 15px;
            border-radius: 10px;
            margin: 10px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            animation: slideInError 0.3s ease;
        }

        /* Animaciones de entrada */
        .producto {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        .producto:nth-child(1) { animation-delay: 0.1s; }
        .producto:nth-child(2) { animation-delay: 0.2s; }
        .producto:nth-child(3) { animation-delay: 0.3s; }
        .producto:nth-child(4) { animation-delay: 0.4s; }
        .producto:nth-child(5) { animation-delay: 0.5s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-running"></i> SneakerHub
            </a>
            <div class="nav-actions">
                <div class="admin-menu">
                    <button class="admin-btn success" onclick="openModal('producto')">
                        <i class="fas fa-plus"></i> Producto
                    </button>
                    <button class="admin-btn" onclick="openModal('categoria')">
                        <i class="fas fa-list"></i> Categorías
                    </button>
                    <button class="admin-btn warning" onclick="openModal('marca')">
                        <i class="fas fa-tags"></i> Marcas
                    </button>
                </div>
                <div class="divider"></div>
                <div class="search-box">
                    <input type="text" placeholder="Buscar productos..." id="searchInput">
                    <i class="fas fa-search"></i>
                </div>
                <button class="logout-btn" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1><i class="fas fa-bolt"></i> SneakerHub Premium</h1>
        <p>Descubre la colección más exclusiva de sneakers y tenis deportivos del mundo</p>
    </section>

    <!-- Loading -->
    <div class="loading" id="loading">
        <i class="fas fa-spinner"></i>
        <h3>Cargando productos increíbles...</h3>
    </div>

    <!-- Error -->
    <div class="error" id="error" style="display: none;">
        <i class="fas fa-exclamation-triangle" style="font-size: 3rem; color: #e74c3c; margin-bottom: 15px;"></i>
        <h3>¡Ups! Algo salió mal</h3>
        <p id="error-message">No pudimos cargar los productos</p>
        <button onclick="cargarProductos()">
            <i class="fas fa-redo"></i> Reintentar
        </button>
    </div>

    <!-- Products Section -->
    <section class="container">
        <h2 class="section-title">Nuestros Productos Destacados</h2>
        <div class="productos-container" id="productos"></div>
    </section>

    <!-- Modals -->
    <!-- Modal Producto -->
    <div id="modalProducto" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-plus"></i> Gestionar Productos</h2>
                <button class="close" onclick="closeModal('producto')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formProducto">
                    <div class="form-group">
                        <label for="nombreProducto">Nombre del Producto</label>
                        <input type="text" id="nombreProducto" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcionProducto">Descripción</label>
                        <textarea id="descripcionProducto" name="descripcion" placeholder="Descripción del producto"></textarea>
                    </div>
                    <div style="display: flex; gap: 15px;">
                        <div class="form-group" style="flex: 1;">
                            <label for="precioProducto">Precio</label>
                            <input type="number" id="precioProducto" name="precio" step="0.01" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="stockProducto">Stock</label>
                            <input type="number" id="stockProducto" name="stock" min="0">
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px;">
                        <div class="form-group" style="flex: 1;">
                            <label for="marcaProducto">Marca</label>
                            <select id="marcaProducto" name="marca_id" required>
                                <option value="">Seleccionar marca</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label for="categoriaProducto">Categoría</label>
                            <select id="categoriaProducto" name="categoria_id" required>
                                <option value="">Seleccionar categoría</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imagenProducto">URL de la Imagen</label>
                        <input type="url" id="imagenProducto" name="imagen_url" placeholder="https://ejemplo.com/imagen.jpg">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal('producto')">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button type="button" class="btn btn-primary" onclick="guardarProducto()">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Categoría -->
    <div id="modalCategoria" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-list"></i> Gestionar Categorías</h2>
                <button class="close" onclick="closeModal('categoria')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formCategoria" style="margin-bottom: 30px;">
                    <div class="form-group">
                        <label for="nombreCategoria">Nombre de la Categoría</label>
                        <input type="text" id="nombreCategoria" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcionCategoria">Descripción</label>
                        <textarea id="descripcionCategoria" name="descripcion" placeholder="Descripción de la categoría"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="guardarCategoria()">
                        <i class="fas fa-plus"></i> Agregar Categoría
                    </button>
                </form>
                <div id="tablaCategorias">
                    <!-- Tabla se carga dinámicamente -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Marca -->
    <div id="modalMarca" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-tags"></i> Gestionar Marcas</h2>
                <button class="close" onclick="closeModal('marca')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formMarca" style="margin-bottom: 30px;">
                    <div class="form-group">
                        <label for="nombreMarca">Nombre de la Marca</label>
                        <input type="text" id="nombreMarca" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="paisMarca">País de Origen</label>
                        <input type="text" id="paisMarca" name="pais_origen" placeholder="Ej: Estados Unidos">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="guardarMarca()">
                        <i class="fas fa-plus"></i> Agregar Marca
                    </button>
                </form>
                <div id="tablaMarcas">
                    <!-- Tabla se carga dinámicamente -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminación de Marca -->
    <div id="confirmMarcaModal" class="confirm-modal">
        <div class="confirm-modal-content">
            <div class="confirm-modal-header">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>Confirmar Eliminación de Marca</h3>
            </div>
            <div class="confirm-modal-body">
                <p>¿Estás seguro de que quieres eliminar esta marca?</p>
                <p class="marca-name" id="marcaNameToDelete">Nombre de la marca</p>
                
                <div id="productosAsociados" style="margin-top: 20px;">
                    <!-- Aquí se cargarán los productos asociados -->
                </div>
                
                <p style="color: #e74c3c; font-size: 14px; margin-top: 15px;">
                    <i class="fas fa-warning"></i> Esta acción no se puede deshacer
                </p>
            </div>
            <div class="confirm-modal-footer">
                <button class="btn-cancel" onclick="closeConfirmMarcaModal()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button class="btn-confirm" id="btnConfirmMarca" onclick="confirmarEliminacionMarca()">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmación de Eliminación de Categoría -->
    <div id="confirmCategoriaModal" class="confirm-modal">
        <div class="confirm-modal-content">
            <div class="confirm-modal-header">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>Confirmar Eliminación de Categoría</h3>
            </div>
            <div class="confirm-modal-body">
                <p>¿Estás seguro de que quieres eliminar esta categoría?</p>
                <p class="categoria-name" id="categoriaNameToDelete">Nombre de la categoría</p>
                
                <div id="productosAsociadosCategoria" style="margin-top: 20px;">
                    <!-- Aquí se cargarán los productos asociados -->
                </div>
                
                <p style="color: #e74c3c; font-size: 14px; margin-top: 15px;">
                    <i class="fas fa-warning"></i> Esta acción no se puede deshacer
                </p>
            </div>
            <div class="confirm-modal-footer">
                <button class="btn-cancel" onclick="closeConfirmCategoriaModal()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button class="btn-confirm" id="btnConfirmCategoria" onclick="confirmarEliminacionCategoria()">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 SneakerHub. Todos los derechos reservados. | Diseñado con <i class="fas fa-heart" style="color: #e74c3c;"></i></p>
    </footer>

    <!-- Modal de Confirmación de Eliminación -->
    <div id="confirmModal" class="confirm-modal">
        <div class="confirm-modal-content">
            <div class="confirm-modal-header">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>Confirmar Eliminación</h3>
            </div>
            <div class="confirm-modal-body">
                <p>¿Estás seguro de que quieres eliminar este producto?</p>
                <p class="product-name" id="productNameToDelete">Nombre del producto</p>
                <p style="color: #e74c3c; font-size: 14px; margin-top: 15px;">
                    <i class="fas fa-warning"></i> Esta acción no se puede deshacer
                </p>
            </div>
            <div class="confirm-modal-footer">
                <button class="btn-cancel" onclick="closeConfirmModal()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button class="btn-confirm" onclick="confirmarEliminacion()">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </div>
        </div>
    </div>

    <script>
        function cargarProductos() {
            document.getElementById('loading').style.display = 'block';
            document.getElementById('error').style.display = 'none';
            document.getElementById('productos').innerHTML = '';
            
            const token = localStorage.getItem('auth_token');
            
            fetch('/api/productos', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('loading').style.display = 'none';
                
                let html = '';
                // Maneja tanto array directo como paginación
                const productos = Array.isArray(data) ? data : (data.data || data);
                
                console.log('Productos recibidos:', productos); // Para debugging
                
                if (productos && productos.length > 0) {
                    productos.forEach((producto, index) => {
                        const imagenHtml = producto.imagen_url 
                            ? `<img src="${producto.imagen_url}" alt="${producto.nombre}" class="producto-imagen" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">`
                            : '';
                        
                        const placeholderHtml = producto.imagen_url 
                            ? `<div class="producto-imagen-placeholder" style="display: none;"><i class="fas fa-image"></i> Sin imagen</div>`
                            : `<div class="producto-imagen-placeholder"><i class="fas fa-image"></i> Sin imagen</div>`;
                        
                        html += `
                            <div class="producto" style="animation-delay: ${index * 0.1}s">
                                <button class="producto-edit-btn" onclick="mostrarEditarProducto(${producto.id}, '${producto.nombre.replace(/'/g, "\\'")}', '${producto.descripcion ? producto.descripcion.replace(/'/g, "\\'") : ''}', ${producto.precio}, ${producto.stock || 0}, ${producto.marca_id}, ${producto.categoria_id}, '${producto.imagen_url || ''}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="producto-delete-btn" onclick="mostrarConfirmacionEliminacion(${producto.id}, '${producto.nombre.replace(/'/g, "\\'")}')">
                                    <i class="fas fa-times"></i>
                                </button>
                                ${imagenHtml}
                                ${placeholderHtml}
                                <div class="producto-info">
                                    <h3>${producto.nombre}</h3>
                                    <p class="producto-descripcion">${producto.descripcion || 'Producto de alta calidad'}</p>
                                    <div class="precio">$${parseFloat(producto.precio).toLocaleString('es-MX')}</div>
                                    <div class="producto-meta">
                                        <span class="marca">
                                            <i class="fas fa-tag"></i> ${producto.marca ? producto.marca.nombre : 'Marca'}
                                        </span>
                                        <span class="categoria">
                                            <i class="fas fa-layer-group"></i> ${producto.categoria ? producto.categoria.nombre : 'Categoría'}
                                        </span>
                                    </div>
                                    ${producto.stock ? `
                                        <div class="stock">
                                            <i class="fas fa-box"></i> Stock: ${producto.stock} disponibles
                                        </div>
                                    ` : ''}
                                    <button class="btn-comprar" onclick="agregarAlCarrito(${producto.id})">
                                        <i class="fas fa-shopping-cart"></i> Agregar al Carrito
                                    </button>
                                </div>
                            </div>
                        `;
                    });
                } else {
                    html = `
                        <div class="error" style="grid-column: 1 / -1;">
                            <i class="fas fa-box-open" style="font-size: 4rem; color: #bdc3c7; margin-bottom: 20px;"></i>
                            <h3>No hay productos disponibles</h3>
                            <p>Agrega algunos productos increíbles para mostrar en la tienda.</p>
                        </div>
                    `;
                }
                
                document.getElementById('productos').innerHTML = html;
                
                // Aplicar filtro de búsqueda si hay texto
                const searchInput = document.getElementById('searchInput');
                if (searchInput.value.trim()) {
                    filtrarProductos(searchInput.value);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('loading').style.display = 'none';
                document.getElementById('error').style.display = 'block';
                document.getElementById('error-message').textContent = error.message;
            });
        }
        
        function agregarAlCarrito(productoId) {
            // Animación de feedback
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i> ¡Agregado!';
            btn.style.background = 'linear-gradient(45deg, #27ae60, #2ecc71)';
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
            }, 1500);
            
            // Aquí puedes agregar la lógica para manejar el carrito
            console.log('Producto agregado al carrito:', productoId);
        }
        
        function filtrarProductos(termino) {
            const productos = document.querySelectorAll('.producto');
            const terminoLower = termino.toLowerCase();
            
            productos.forEach(producto => {
                const nombre = producto.querySelector('h3').textContent.toLowerCase();
                const descripcion = producto.querySelector('.producto-descripcion').textContent.toLowerCase();
                const marca = producto.querySelector('.marca').textContent.toLowerCase();
                
                if (nombre.includes(terminoLower) || descripcion.includes(terminoLower) || marca.includes(terminoLower)) {
                    producto.style.display = 'block';
                } else {
                    producto.style.display = 'none';
                }
            });
        }
        
        function logout() {
            const token = localStorage.getItem('auth_token');
            
            fetch('/api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(() => {
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
            })
            .catch(() => {
                localStorage.removeItem('auth_token');
                window.location.href = '/login';
            });
        }
        
        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            cargarProductos();
            cargarMarcas();
            cargarCategorias();
            
            // Búsqueda en tiempo real
            document.getElementById('searchInput').addEventListener('input', function() {
                filtrarProductos(this.value);
            });
        });

        // Funciones para modales
        function openModal(tipo) {
            const modal = document.getElementById(`modal${tipo.charAt(0).toUpperCase() + tipo.slice(1)}`);
            modal.style.display = 'block';
            
            if (tipo === 'producto') {
                // Asegurar que el modal esté en modo crear
                const header = document.querySelector('#modalProducto .modal-header h2');
                const saveBtn = document.querySelector('#modalProducto .btn-primary');
                
                header.innerHTML = '<i class="fas fa-plus"></i> Gestionar Productos';
                saveBtn.innerHTML = '<i class="fas fa-save"></i> Guardar';
                saveBtn.onclick = guardarProducto;
                saveBtn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                saveBtn.disabled = false;
                
                productoAEditar = null;
                cargarSelectores();
            } else if (tipo === 'categoria') {
                cargarTablaCategorias();
            } else if (tipo === 'marca') {
                cargarTablaMarcas();
            }
        }

        function closeModal(tipo) {
            const modal = document.getElementById(`modal${tipo.charAt(0).toUpperCase() + tipo.slice(1)}`);
            modal.style.display = 'none';
            
            // Limpiar formularios
            const form = document.getElementById(`form${tipo.charAt(0).toUpperCase() + tipo.slice(1)}`);
            if (form) form.reset();
            
            // Restaurar modal de productos a estado original si es necesario
            if (tipo === 'producto') {
                const header = document.querySelector('#modalProducto .modal-header h2');
                const saveBtn = document.querySelector('#modalProducto .btn-primary');
                
                header.innerHTML = '<i class="fas fa-plus"></i> Gestionar Productos';
                saveBtn.innerHTML = '<i class="fas fa-save"></i> Guardar';
                saveBtn.onclick = guardarProducto;
                saveBtn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                saveBtn.disabled = false;
                
                productoAEditar = null;
            }
        }

        // Cerrar modal al hacer click fuera
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
            if (event.target.id === 'confirmMarcaModal') {
                closeConfirmMarcaModal();
            }
            if (event.target.id === 'confirmCategoriaModal') {
                closeConfirmCategoriaModal();
            }
            if (event.target.id === 'confirmModal') {
                closeConfirmModal();
            }
        }

        // Funciones para productos
        function cargarSelectores() {
            cargarMarcasSelect();
            cargarCategoriasSelect();
        }

        function cargarMarcasSelect() {
            const token = localStorage.getItem('auth_token');
            fetch('/api/marcas', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('marcaProducto');
                select.innerHTML = '<option value="">Seleccionar marca</option>';
                
                const marcas = data.data || data;
                if (marcas && marcas.length > 0) {
                    marcas.forEach(marca => {
                        select.innerHTML += `<option value="${marca.id}">${marca.nombre}</option>`;
                    });
                }
            })
            .catch(error => console.error('Error cargando marcas:', error));
        }

        function cargarCategoriasSelect() {
            const token = localStorage.getItem('auth_token');
            fetch('/api/categorias', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('categoriaProducto');
                select.innerHTML = '<option value="">Seleccionar categoría</option>';
                
                const categorias = data.data || data;
                if (categorias && categorias.length > 0) {
                    categorias.forEach(categoria => {
                        select.innerHTML += `<option value="${categoria.id}">${categoria.nombre}</option>`;
                    });
                }
            })
            .catch(error => console.error('Error cargando categorías:', error));
        }

        function guardarProducto() {
            const form = document.getElementById('formProducto');
            const formData = new FormData(form);
            const token = localStorage.getItem('auth_token');
            
            const data = {};
            formData.forEach((value, key) => {
                if (value.trim()) data[key] = value;
            });

            console.log('Enviando producto:', data); // Para debugging

            fetch('/api/productos', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                console.log('Respuesta del servidor:', response.status); // Para debugging
                return response.json();
            })
            .then(result => {
                console.log('Resultado:', result); // Para debugging
                
                if (result.id || result.nombre) {
                    // Mostrar mensaje de éxito
                    const btn = document.querySelector('#modalProducto .btn-primary');
                    const originalText = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-check"></i> ¡Guardado!';
                    btn.style.background = 'linear-gradient(45deg, #27ae60, #2ecc71)';
                    
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                        closeModal('producto');
                        cargarProductos(); // Recargar productos
                    }, 1500);
                } else {
                    alert('Error al crear producto: ' + (result.message || JSON.stringify(result)));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al crear producto: ' + error.message);
            });
        }

        // Funciones para marcas
        let marcas = [];

        function cargarMarcas() {
            const token = localStorage.getItem('auth_token');
            fetch('/api/marcas', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                marcas = data.data || data || [];
            })
            .catch(error => console.error('Error cargando marcas:', error));
        }

        function cargarTablaMarcas() {
            const token = localStorage.getItem('auth_token');
            fetch('/api/marcas', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const marcas = data.data || data || [];
                let html = `
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>País de Origen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                `;
                
                if (marcas.length > 0) {
                    marcas.forEach(marca => {
                        html += `
                            <tr>
                                <td>${marca.id}</td>
                                <td>${marca.nombre}</td>
                                <td>${marca.pais_origen || 'No especificado'}</td>
                                <td class="action-btns">
                                    <button class="btn btn-edit btn-sm" onclick="editarMarca(${marca.id})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-delete btn-sm" onclick="eliminarMarca(${marca.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    html += '<tr><td colspan="4" style="text-align: center;">No hay marcas registradas</td></tr>';
                }
                
                html += '</tbody></table>';
                document.getElementById('tablaMarcas').innerHTML = html;
            })
            .catch(error => console.error('Error:', error));
        }

        function guardarMarca() {
            const form = document.getElementById('formMarca');
            const formData = new FormData(form);
            const token = localStorage.getItem('auth_token');
            
            const data = {};
            formData.forEach((value, key) => {
                if (value.trim()) data[key] = value;
            });

            const btn = form.querySelector('.btn-primary');
            const originalText = btn.innerHTML;
            
            // Mostrar estado de carga
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Guardando...';
            btn.disabled = true;

            fetch('/api/marcas', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.marca || result.id) {
                    // Mostrar éxito
                    btn.innerHTML = '<i class="fas fa-check"></i> ¡Guardado!';
                    btn.style.background = 'linear-gradient(45deg, #27ae60, #2ecc71)';
                    
                    setTimeout(() => {
                        form.reset();
                        cargarTablaMarcas();
                        cargarMarcas(); // Actualizar cache
                        
                        // Restaurar botón y cerrar modal
                        btn.innerHTML = originalText;
                        btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                        btn.disabled = false;
                        closeModal('marca');
                    }, 1500);
                } else {
                    // Mostrar error
                    btn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Error';
                    btn.style.background = 'linear-gradient(45deg, #e74c3c, #c0392b)';
                    
                    // Mostrar mensaje de error en el formulario
                    showFormError('formMarca', result.message || 'Error al crear marca');
                    
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                        btn.disabled = false;
                    }, 3000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Mostrar error
                btn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Error';
                btn.style.background = 'linear-gradient(45deg, #e74c3c, #c0392b)';
                
                // Mostrar mensaje de error en el formulario
                showFormError('formMarca', 'Error de conexión al servidor');
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                    btn.disabled = false;
                }, 3000);
            });
        }

        // Funciones para categorías
        let categorias = [];

        function cargarCategorias() {
            const token = localStorage.getItem('auth_token');
            fetch('/api/categorias', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                categorias = data.data || data || [];
            })
            .catch(error => console.error('Error cargando categorías:', error));
        }

        function cargarTablaCategorias() {
            const token = localStorage.getItem('auth_token');
            fetch('/api/categorias', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                const categorias = data.data || data || [];
                let html = `
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                `;
                
                if (categorias.length > 0) {
                    categorias.forEach(categoria => {
                        html += `
                            <tr>
                                <td>${categoria.id}</td>
                                <td>${categoria.nombre}</td>
                                <td>${categoria.descripcion || 'Sin descripción'}</td>
                                <td class="action-btns">
                                    <button class="btn btn-edit btn-sm" onclick="editarCategoria(${categoria.id})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-delete btn-sm" onclick="eliminarCategoria(${categoria.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    html += '<tr><td colspan="4" style="text-align: center;">No hay categorías registradas</td></tr>';
                }
                
                html += '</tbody></table>';
                document.getElementById('tablaCategorias').innerHTML = html;
            })
            .catch(error => console.error('Error:', error));
        }

        function guardarCategoria() {
            const form = document.getElementById('formCategoria');
            const formData = new FormData(form);
            const token = localStorage.getItem('auth_token');
            
            const data = {};
            formData.forEach((value, key) => {
                if (value.trim()) data[key] = value;
            });

            const btn = form.querySelector('.btn-primary');
            const originalText = btn.innerHTML;
            
            // Mostrar estado de carga
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Guardando...';
            btn.disabled = true;

            fetch('/api/categorias', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.categoria || result.id) {
                    // Mostrar éxito
                    btn.innerHTML = '<i class="fas fa-check"></i> ¡Guardado!';
                    btn.style.background = 'linear-gradient(45deg, #27ae60, #2ecc71)';
                    
                    setTimeout(() => {
                        form.reset();
                        cargarTablaCategorias();
                        cargarCategorias(); // Actualizar cache
                        
                        // Restaurar botón y cerrar modal
                        btn.innerHTML = originalText;
                        btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                        btn.disabled = false;
                        closeModal('categoria');
                    }, 1500);
                } else {
                    // Mostrar error
                    btn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Error';
                    btn.style.background = 'linear-gradient(45deg, #e74c3c, #c0392b)';
                    
                    // Mostrar mensaje de error en el formulario
                    showFormError('formCategoria', result.message || 'Error al crear categoría');
                    
                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                        btn.disabled = false;
                    }, 3000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Mostrar error
                btn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Error';
                btn.style.background = 'linear-gradient(45deg, #e74c3c, #c0392b)';
                
                // Mostrar mensaje de error en el formulario
                showFormError('formCategoria', 'Error de conexión al servidor');
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                    btn.disabled = false;
                }, 3000);
            });
        }

        // Funciones de edición y eliminación (placeholder)
        function editarMarca(id) {
            // Mostrar mensaje temporal en lugar de alert
            const btn = event.target;
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-cog fa-spin"></i>';
            btn.style.background = 'linear-gradient(45deg, #f39c12, #e67e22)';
            
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.style.background = 'linear-gradient(45deg, #f39c12, #e67e22)';
            }, 2000);
            
            console.log('Función de editar marca en desarrollo. ID:', id);
        }

        function eliminarMarca(id) {
            // Buscar la marca por ID
            const marca = marcas.find(m => m.id === id);
            if (!marca) {
                alert('Error: Marca no encontrada');
                return;
            }

            // Actualizar el nombre de la marca en el modal
            document.getElementById('marcaNameToDelete').textContent = marca.nombre;
            
            // Cargar productos asociados
            cargarProductosAsociados(id);
            
            // Mostrar el modal de confirmación
            document.getElementById('confirmMarcaModal').style.display = 'block';
            
            // Guardar el ID de la marca a eliminar
            window.marcaToDelete = id;
        }

        function cargarProductosAsociados(marcaId) {
            const token = localStorage.getItem('auth_token');
            const productosDiv = document.getElementById('productosAsociados');
            
            productosDiv.innerHTML = '<p><i class="fas fa-spinner fa-spin"></i> Cargando productos asociados...</p>';
            
            fetch(`/api/marcas/${marcaId}/productos`, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(productos => {
                if (productos.length > 0) {
                    let html = `
                        <div class="warning-text">
                            <i class="fas fa-exclamation-triangle"></i> 
                            ¡ATENCIÓN! Esta marca tiene ${productos.length} producto(s) asociado(s):
                        </div>
                        <div class="productos-list">
                    `;
                    
                    productos.forEach(producto => {
                        html += `
                            <div class="producto-item">
                                <img src="${producto.imagen_url || '/images/no-image.png'}" alt="${producto.nombre}">
                                <div class="producto-info">
                                    <div class="producto-nombre">${producto.nombre}</div>
                                    <div class="producto-precio">$${producto.precio}</div>
                                </div>
                            </div>
                        `;
                    });
                    
                    html += `
                        </div>
                        <div class="warning-text" style="margin-top: 15px;">
                            <i class="fas fa-trash"></i> 
                            ¡CUIDADO! Al eliminar esta marca, también se eliminarán TODOS estos productos de forma permanente.
                        </div>
                    `;
                    
                    productosDiv.innerHTML = html;
                    
                    // Cambiar el texto del botón de confirmación para ser más claro
                    const btnConfirm = document.getElementById('btnConfirmMarca');
                    btnConfirm.innerHTML = `<i class="fas fa-exclamation-triangle"></i> Eliminar marca y ${productos.length} producto(s)`;
                    btnConfirm.disabled = false;
                    btnConfirm.style.background = 'linear-gradient(45deg, #e74c3c, #c0392b)';
                    btnConfirm.style.cursor = 'pointer';
                } else {
                    productosDiv.innerHTML = `
                        <div style="color: #27ae60; text-align: center;">
                            <i class="fas fa-check-circle"></i> 
                            Esta marca no tiene productos asociados. Se puede eliminar sin problemas.
                        </div>
                    `;
                    
                    // Restaurar el texto original del botón
                    document.getElementById('btnConfirmMarca').innerHTML = 
                        `<i class="fas fa-trash"></i> Eliminar`;
                }
            })
            .catch(error => {
                console.error('Error cargando productos:', error);
                productosDiv.innerHTML = `
                    <div class="warning-text">
                        <i class="fas fa-exclamation-triangle"></i> 
                        Error al cargar productos asociados. La marca podría tener productos asociados.
                    </div>
                `;
            });
        }

        function closeConfirmMarcaModal() {
            document.getElementById('confirmMarcaModal').style.display = 'none';
            window.marcaToDelete = null;
            
            // Restaurar el botón a su estado original
            const btnConfirm = document.getElementById('btnConfirmMarca');
            btnConfirm.innerHTML = `<i class="fas fa-trash"></i> Eliminar`;
            btnConfirm.disabled = false;
            btnConfirm.style.background = '';
            btnConfirm.style.cursor = '';
        }

        function confirmarEliminacionMarca() {
            if (!window.marcaToDelete) return;
            
            const btn = document.getElementById('btnConfirmMarca');
            if (btn.disabled) return; // No permitir eliminación si está deshabilitado
            
            const token = localStorage.getItem('auth_token');
            const originalHTML = btn.innerHTML;
            const originalBackground = btn.style.background;
            
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Eliminando...';
            btn.disabled = true;
            
            fetch(`/api/marcas/${window.marcaToDelete}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                // Cerrar modal
                closeConfirmMarcaModal();
                
                // Mostrar mensaje de éxito detallado
                let mensaje = 'Marca eliminada exitosamente';
                if (data.productos_eliminados && data.productos_eliminados > 0) {
                    mensaje += `\nTambién se eliminaron ${data.productos_eliminados} producto(s) asociado(s)`;
                }
                alert(mensaje);
                
                // Recargar tabla de marcas y productos
                cargarTablaMarcas();
                cargarMarcas();
                cargarMarcasSelect();
                cargarProductos(); // También recargar productos ya que algunos pueden haber sido eliminados
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Mostrar error específico
                let errorMessage = error.message;
                
                alert('Error al eliminar marca: ' + errorMessage);
            })
            .finally(() => {
                btn.innerHTML = originalHTML;
                btn.disabled = false;
                btn.style.background = originalBackground;
            });
        }

        function editarCategoria(id) {
            alert('Función de editar categoría en desarrollo. ID: ' + id);
        }

        function eliminarCategoria(id) {
            if (confirm('¿Estás seguro de que quieres eliminar esta categoría?')) {
                alert('Función de eliminar categoría en desarrollo. ID: ' + id);
            }
        }

        // Función auxiliar para mostrar errores en formularios
        function showFormError(formId, message) {
            const form = document.getElementById(formId);
            
            // Remover mensaje de error anterior si existe
            const existingError = form.querySelector('.form-error');
            if (existingError) {
                existingError.remove();
            }
            
            // Crear nuevo mensaje de error
            const errorDiv = document.createElement('div');
            errorDiv.className = 'form-error';
            errorDiv.innerHTML = `
                <i class="fas fa-exclamation-triangle"></i>
                <span>${message}</span>
            `;
            
            // Insertar al inicio del formulario
            form.insertBefore(errorDiv, form.firstChild);
            
            // Remover después de 5 segundos
            setTimeout(() => {
                if (errorDiv.parentNode) {
                    errorDiv.remove();
                }
            }, 5000);
        }

        // Función auxiliar para mostrar éxito en formularios
        function showFormSuccess(formId, message) {
            const form = document.getElementById(formId);
            
            // Remover mensajes anteriores si existen
            const existingMessages = form.querySelectorAll('.form-error, .form-success');
            existingMessages.forEach(msg => msg.remove());
            
            // Crear nuevo mensaje de éxito
            const successDiv = document.createElement('div');
            successDiv.className = 'form-success';
            successDiv.innerHTML = `
                <i class="fas fa-check-circle"></i>
                <span>${message}</span>
            `;
            
            // Insertar al inicio del formulario
            form.insertBefore(successDiv, form.firstChild);
            
            // Remover después de 3 segundos
            setTimeout(() => {
                if (successDiv.parentNode) {
                    successDiv.remove();
                }
            }, 3000);
        }

        // Variables globales para eliminación y edición
        let productoAEliminar = null;
        let productoAEditar = null;

        // Función para mostrar modal de edición de producto
        function mostrarEditarProducto(id, nombre, descripcion, precio, stock, marcaId, categoriaId, imagenUrl) {
            productoAEditar = id;
            
            // Cargar selectores antes de llenar el formulario
            cargarSelectores();
            
            // Llenar el formulario con los datos actuales
            setTimeout(() => {
                document.getElementById('nombreProducto').value = nombre;
                document.getElementById('descripcionProducto').value = descripcion || '';
                document.getElementById('precioProducto').value = precio;
                document.getElementById('stockProducto').value = stock || 0;
                document.getElementById('marcaProducto').value = marcaId;
                document.getElementById('categoriaProducto').value = categoriaId;
                document.getElementById('imagenProducto').value = imagenUrl || '';
                
                // Cambiar el título del modal
                document.querySelector('#modalProducto .modal-header h2').innerHTML = '<i class="fas fa-edit"></i> Editar Producto';
                
                // Cambiar el texto del botón
                const saveBtn = document.querySelector('#modalProducto .btn-primary');
                saveBtn.innerHTML = '<i class="fas fa-save"></i> Actualizar';
                saveBtn.onclick = actualizarProducto;
                
                // Mostrar el modal
                document.getElementById('modalProducto').style.display = 'block';
            }, 300);
        }

        // Función para actualizar producto
        function actualizarProducto() {
            if (!productoAEditar) return;
            
            const form = document.getElementById('formProducto');
            const formData = new FormData(form);
            const token = localStorage.getItem('auth_token');
            
            const data = {};
            formData.forEach((value, key) => {
                if (value.trim()) data[key] = value;
            });

            const btn = document.querySelector('#modalProducto .btn-primary');
            const originalText = btn.innerHTML;
            
            // Mostrar estado de carga
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Actualizando...';
            btn.disabled = true;

            fetch(`/api/productos/${productoAEditar}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(result => {
                // Mostrar éxito
                btn.innerHTML = '<i class="fas fa-check"></i> ¡Actualizado!';
                btn.style.background = 'linear-gradient(45deg, #27ae60, #2ecc71)';
                
                setTimeout(() => {
                    // Restaurar modal a estado original
                    document.querySelector('#modalProducto .modal-header h2').innerHTML = '<i class="fas fa-plus"></i> Gestionar Productos';
                    btn.innerHTML = '<i class="fas fa-save"></i> Guardar';
                    btn.onclick = guardarProducto;
                    btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                    btn.disabled = false;
                    
                    closeModal('producto');
                    cargarProductos(); // Recargar productos
                    productoAEditar = null;
                }, 1500);
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Mostrar error
                btn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Error';
                btn.style.background = 'linear-gradient(45deg, #e74c3c, #c0392b)';
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                    btn.disabled = false;
                }, 3000);
            });
        }

        // Función para mostrar confirmación de eliminación
        function mostrarConfirmacionEliminacion(productoId, productoNombre) {
            productoAEliminar = productoId;
            document.getElementById('productNameToDelete').textContent = productoNombre;
            document.getElementById('confirmModal').style.display = 'block';
        }

        // Función para cerrar modal de confirmación
        function closeConfirmModal() {
            document.getElementById('confirmModal').style.display = 'none';
            productoAEliminar = null;
        }

        // Función para confirmar eliminación
        function confirmarEliminacion() {
            if (!productoAEliminar) return;
            
            const token = localStorage.getItem('auth_token');
            const confirmBtn = document.querySelector('.btn-confirm');
            const originalText = confirmBtn.innerHTML;
            
            // Mostrar estado de carga
            confirmBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Eliminando...';
            confirmBtn.disabled = true;
            
            fetch(`/api/productos/${productoAEliminar}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(result => {
                // Mostrar éxito
                confirmBtn.innerHTML = '<i class="fas fa-check"></i> ¡Eliminado!';
                confirmBtn.style.background = 'linear-gradient(45deg, #27ae60, #2ecc71)';
                
                setTimeout(() => {
                    closeConfirmModal();
                    cargarProductos(); // Recargar productos
                    
                    // Restaurar botón
                    confirmBtn.innerHTML = originalText;
                    confirmBtn.style.background = 'linear-gradient(45deg, #e74c3c, #c0392b)';
                    confirmBtn.disabled = false;
                }, 1500);
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Mostrar error
                confirmBtn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Error';
                confirmBtn.style.background = 'linear-gradient(45deg, #ff6b6b, #ee5a24)';
                
                setTimeout(() => {
                    confirmBtn.innerHTML = originalText;
                    confirmBtn.style.background = 'linear-gradient(45deg, #e74c3c, #c0392b)';
                    confirmBtn.disabled = false;
                }, 3000);
            });
        }

        // Cerrar modal de confirmación al hacer click fuera
        window.addEventListener('click', function(event) {
            const confirmModal = document.getElementById('confirmModal');
            if (event.target === confirmModal) {
                closeConfirmModal();
            }
        });
    </script>
</body>
</html>