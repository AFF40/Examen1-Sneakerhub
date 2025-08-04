# 🚀 SneakerHub - Sistema de Gestión de Sneakers

Un sistema completo de gestión de inventario de sneakers desarrollado en Laravel 11 con autenticación Sanctum y API REST completa.

## 📋 Características

- ✅ **Autenticación completa** con Laravel Sanctum
- ✅ **CRUD completo** para Productos, Marcas y Categorías
- ✅ **API REST** con 20 endpoints documentados
- ✅ **Eliminación en cascada** (Marca/Categoría → Productos)
- ✅ **Interfaz web moderna** con modals y notificaciones toast
- ✅ **Búsqueda avanzada** de productos con filtros
- ✅ **Sistema de numeración secuencial** en tablas
- ✅ **Gestión de imágenes** con URLs externas

## 🛠️ Tecnologías Utilizadas

- **Backend:** Laravel 11, PHP 8.2+
- **Base de datos:** SQLite (por defecto)
- **Autenticación:** Laravel Sanctum
- **Frontend:** Blade Templates, JavaScript Vanilla
- **Estilos:** CSS personalizado con animaciones

## 📋 Requisitos del Sistema

- PHP >= 8.2
- Composer
- Node.js >= 16.x
- NPM o Yarn
- SQLite (incluido con PHP) o MySQL/PostgreSQL

## 🚀 Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/AFF40/examen-1.git
cd examen-1/Examen1-MiApp
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Configurar el archivo de entorno
```bash
# Copiar el archivo de configuración
cp .env.example .env

# Generar la clave de aplicación
php artisan key:generate
```

### 4. Configurar la base de datos
El proyecto viene configurado para usar SQLite por defecto. La base de datos ya está incluida en `database/database.sqlite`.

**Opcional:** Si prefieres usar MySQL/PostgreSQL, edita el archivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sneakerhub
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### 5. Configurar API y Sanctum
```bash
# Instalar API scaffolding y Laravel Sanctum
php artisan install:api

# Publicar configuración de Sanctum (opcional)
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

### 6. Ejecutar migraciones y seeders
```bash
# Ejecutar migraciones
php artisan migrate

# Opcional: Poblar con datos de prueba
php artisan db:seed
```

### 7. Instalar dependencias de Node.js
```bash
npm install
```

### 8. Compilar assets
```bash
# Para desarrollo
npm run dev

# Para producción
npm run build
```

### 9. Crear enlaces simbólicos para storage (si usas imágenes locales)
```bash
php artisan storage:link
```

## ▶️ Ejecutar el Proyecto

### Servidor de desarrollo
```bash
php artisan serve
```

El proyecto estará disponible en: `http://localhost:8000`

### Con puerto personalizado
```bash
php artisan serve --host=127.0.0.1 --port=8080
```

## 🔐 Credenciales por Defecto

Si ejecutaste los seeders, puedes usar estas credenciales:

```
Email: admin@sneakerhub.com
Password: password123
```

## 📚 Rutas Principales

### Web
- `/` - Página de inicio
- `/login` - Iniciar sesión
- `/register` - Registrarse
- `/tienda` - Dashboard principal (requiere autenticación)

### API
Base URL: `http://localhost:8000/api`

Ver documentación completa en: `ENDPOINTS_API.md`

## 🗃️ Estructura de la Base de Datos

### Tablas principales:
- **users** - Usuarios del sistema
- **marcas** - Marcas de sneakers (Nike, Adidas, etc.)
- **categorias** - Categorías (Deportivos, Casuales, etc.)
- **productos** - Productos con relaciones a marcas y categorías

### Relaciones:
- `productos` ← `marcas` (muchos a uno)
- `productos` ← `categorias` (muchos a uno)
- Eliminación en cascada configurada

## 🧪 Testing

### Ejecutar tests
```bash
php artisan test
```

### Crear nuevo test
```bash
php artisan make:test NombreDelTest
```

## 📖 Documentación API

La documentación completa de la API está disponible en el archivo `ENDPOINTS_API.md` que incluye:

- 21 endpoints documentados
- Ejemplos de request/response
- Configuración para Postman
- Códigos de estado HTTP
- Ejemplos de errores

### Importar en Postman
1. Crear nueva colección
2. Configurar variables de entorno:
   - `BASE_URL`: `http://localhost:8000`
   - `token`: (se llenará automáticamente)
3. Usar la documentación en `ENDPOINTS_API.md`

## 🎨 Características de la Interfaz

### Dashboard Principal (`/tienda`)
- **Gestión de Productos:** CRUD completo con modales
- **Gestión de Marcas:** CRUD con eliminación en cascada
- **Gestión de Categorías:** CRUD con eliminación en cascada
- **Notificaciones Toast:** Reemplaza alertas del navegador
- **Numeración Secuencial:** Tablas numeradas 1, 2, 3... en lugar de IDs

### Funcionalidades UX
- ✅ Modals de confirmación para eliminaciones
- ✅ Notificaciones toast elegantes (4 segundos, auto-dismiss)
- ✅ Animaciones suaves en transiciones
- ✅ Formularios responsivos
- ✅ Validación en tiempo real

## 🔧 Configuración Avanzada

### Habilitar modo debug
En `.env`:
```env
APP_DEBUG=true
```

### Configurar CORS (si usas frontend separado)
```bash
php artisan vendor:publish --tag="cors"
```

### Limpiar caché
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

### Comandos de desarrollo adicionales
```bash
# Recrear base de datos completamente
php artisan migrate:fresh --seed

# Ver el estado de las migraciones
php artisan migrate:status

# Acceder a tinker (REPL de Laravel)
php artisan tinker

# Ver logs en tiempo real
php artisan pail

# Ejecutar tests
php artisan test
```

## 📝 Comandos Útiles

```bash
# Ver rutas disponibles
php artisan route:list

# Ver información de la aplicación
php artisan about

# Crear nueva migración
php artisan make:migration create_tabla_name

# Crear nuevo controlador
php artisan make:controller NombreController --resource

# Crear nuevo modelo con migración
php artisan make:model NombreModelo -m

# Crear seeder
php artisan make:seeder NombreSeeder

# Ejecutar en modo watch (assets)
npm run dev

# Generar clave de aplicación
php artisan key:generate

# Ver información del modelo
php artisan model:show NombreModelo

# Limpiar tokens expirados de Sanctum
php artisan sanctum:prune-expired

# Optimizar aplicación para producción
php artisan optimize
```

## 🐛 Solución de Problemas

### Error: "Target class does not exist"
```bash
composer dump-autoload
```

### Error de permisos en storage
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Error de base de datos
```bash
php artisan migrate:fresh --seed
```

### Error en assets
```bash
npm install
npm run dev
```

## 🤝 Contribución

1. Fork el proyecto
2. Crear rama para feature (`git checkout -b feature/AmazingFeature`)
3. Commit cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abrir Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver `LICENSE` para más detalles.

## 👥 Autor

**AFF40** - [GitHub](https://github.com/AFF40)

## 📞 Soporte

Si tienes problemas o preguntas:

1. Revisa la documentación en `ENDPOINTS_API.md`
2. Verifica que todos los requisitos estén instalados
3. Asegúrate de que el servidor esté corriendo
4. Revisa los logs en `storage/logs/laravel.log`

---

## 🎯 Próximas Características

- [ ] Sistema de roles y permisos
- [ ] Carrito de compras
- [ ] Gestión de órdenes
- [ ] Dashboard de analytics
- [ ] Exportar datos a Excel/PDF
- [ ] Sistema de notificaciones push
- [ ] API de webhooks

---

*Desarrollado con ❤️ usando Laravel 11*