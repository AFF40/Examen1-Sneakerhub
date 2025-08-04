# 🚀 SneakerHub - API Endpoints Completos

## ⚙️ Configuración Base
```
BASE_URL: http://localhost:8000
Content-Type: application/json
```

---

## 🔐 AUTENTICACIÓN (Endpoints Públicos)

### 1. REGISTRO DE USUARIO
```/api/register
Content-Type: application/json

{
    "name": "Juan Pérez",
    "email": "juan@ejemplo.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Respuesta Exitosa (201):**
```json
{
    "access_token": "1|abc123def456...",
    "token_type": "Bearer",
    "user": {
        "id": 1,
        "name": "Juan Pérez",
        "email": "juan@ejemplo.com",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:30:00.000Z"
    }
}
```

### 2. LOGIN
```/api/login
Content-Type: application/json

{
    "email": "juan@ejemplo.com",
    "password": "password123"
}
```

**Respuesta Exitosa (200):**
```json
{
    "access_token": "1|xyz789abc123...",
    "token_type": "Bearer",
    "redirect_to": "/tienda",
    "user": {
        "id": 1,
        "name": "Juan Pérez",
        "email": "juan@ejemplo.com",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:30:00.000Z"
    }
}
```

---

## 🔒 ENDPOINTS PROTEGIDOS
**Para todos los siguientes endpoints agregar en Headers:**
```
Authorization: Bearer {tu_token_aqui}
Content-Type: application/json
```

---

## 👤 USUARIO

### 3. OBTENER USUARIO ACTUAL
```
GET /api/user
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
{
    "id": 1,
    "name": "Juan Pérez",
    "email": "juan@ejemplo.com",
    "email_verified_at": null,
    "created_at": "2025-08-03T10:30:00.000Z",
    "updated_at": "2025-08-03T10:30:00.000Z"
}
```

### 4. LOGOUT
```
POST /api/logout
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
{
    "message": "Sesión cerrada exitosamente"
}
```

---

## 🏷️ MARCAS

### 5. LISTAR TODAS LAS MARCAS
```
GET /api/marcas
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
[
    {
        "id": 1,
        "nombre": "Nike",
        "pais_origen": "Estados Unidos",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:30:00.000Z"
    },
    {
        "id": 2,
        "nombre": "Adidas",
        "pais_origen": "Alemania",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:30:00.000Z"
    }
]
```

### 6. CREAR NUEVA MARCA
```
POST /api/marcas
Authorization: Bearer {{token}}
Content-Type: application/json

{
    "nombre": "Nike",
    "pais_origen": "Estados Unidos"
}
```

**Respuesta (201):**
```json
{
    "message": "Marca creada exitosamente",
    "marca": {
        "id": 1,
        "nombre": "Nike",
        "pais_origen": "Estados Unidos",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:30:00.000Z"
    }
}
```

### 7. ACTUALIZAR MARCA
```
PUT /api/marcas/1
Authorization: Bearer {{token}}
Content-Type: application/json

{
    "nombre": "Nike Air",
    "pais_origen": "Estados Unidos"
}
```

**Respuesta (200):**
```json
{
    "message": "Marca actualizada exitosamente",
    "marca": {
        "id": 1,
        "nombre": "Nike Air",
        "pais_origen": "Estados Unidos",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:35:00.000Z"
    }
}
```

### 8. ELIMINAR MARCA
```
DELETE /api/marcas/1
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
{
    "message": "Marca eliminada exitosamente",
    "productos_eliminados": 3
}
```

**Nota importante:** Al eliminar una marca, también se eliminan automáticamente todos sus productos asociados (eliminación en cascada).

### 9. PRODUCTOS POR MARCA
```http
GET {{BASE_URL}}/api/marcas/1/productos
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
[
    {
        "id": 1,
        "nombre": "Air Max 90",
        "descripcion": "Sneakers clásicos",
        "precio": "129.99",
        "stock": 50,
        "marca_id": 1,
        "categoria_id": 1,
        "imagen_url": "https://ejemplo.com/imagen.jpg"
    }
]
```

---

## 📁 CATEGORÍAS

### 10. LISTAR TODAS LAS CATEGORÍAS
```http
GET {{BASE_URL}}/api/categorias
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
[
    {
        "id": 1,
        "nombre": "Deportivos",
        "descripcion": "Calzado deportivo para actividades físicas",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:30:00.000Z"
    },
    {
        "id": 2,
        "nombre": "Casuales",
        "descripcion": "Calzado para uso diario",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:30:00.000Z"
    }
]
```

### 11. CREAR NUEVA CATEGORÍA
```http
POST {{BASE_URL}}/api/categorias
Authorization: Bearer {{token}}
Content-Type: application/json

{
    "nombre": "Deportivos",
    "descripcion": "Calzado deportivo para actividades físicas"
}
```

**Respuesta (201):**
```json
{
    "message": "Categoría creada exitosamente",
    "categoria": {
        "id": 1,
        "nombre": "Deportivos",
        "descripcion": "Calzado deportivo para actividades físicas",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:30:00.000Z"
    }
}
```

### 12. ACTUALIZAR CATEGORÍA
```http
PUT {{BASE_URL}}/api/categorias/1
Authorization: Bearer {{token}}
Content-Type: application/json

{
    "nombre": "Deportivos Premium",
    "descripcion": "Calzado deportivo de alta gama"
}
```

**Respuesta (200):**
```json
{
    "message": "Categoría actualizada exitosamente",
    "categoria": {
        "id": 1,
        "nombre": "Deportivos Premium",
        "descripcion": "Calzado deportivo de alta gama",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:35:00.000Z"
    }
}
```

### 13. ELIMINAR CATEGORÍA
```http
DELETE {{BASE_URL}}/api/categorias/1
Authorization: Bearer {{token}}
```

**Respuesta (204):** Sin contenido

---

## 👟 PRODUCTOS

### 14. LISTAR TODOS LOS PRODUCTOS
```http
GET {{BASE_URL}}/api/productos
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
[
    {
        "id": 1,
        "nombre": "Air Max 90",
        "descripcion": "Sneakers clásicos con amortiguación Air",
        "precio": "129.99",
        "stock": 50,
        "marca_id": 1,
        "categoria_id": 1,
        "imagen_url": "https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/00375837-849f-4f17-ba24-d201d27be49b/air-max-90-shoes-Nk3d0g.png",
        "created_at": "2025-08-03T10:30:00.000Z",
        "updated_at": "2025-08-03T10:30:00.000Z",
        "marca": {
            "id": 1,
            "nombre": "Nike",
            "pais_origen": "Estados Unidos"
        },
        "categoria": {
            "id": 1,
            "nombre": "Deportivos",
            "descripcion": "Calzado deportivo para actividades físicas"
        }
    }
]
```

### 15. CREAR NUEVO PRODUCTO
```http
POST {{BASE_URL}}/api/productos
Authorization: Bearer {{token}}
Content-Type: application/json

{
    "nombre": "Air Max 90",
    "descripcion": "Sneakers clásicos con amortiguación Air",
    "precio": 129.99,
    "stock": 50,
    "marca_id": 1,
    "categoria_id": 1,
    "imagen_url": "https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/00375837-849f-4f17-ba24-d201d27be49b/air-max-90-shoes-Nk3d0g.png"
}
```

**Respuesta (201):**
```json
{
    "id": 1,
    "nombre": "Air Max 90",
    "descripcion": "Sneakers clásicos con amortiguación Air",
    "precio": "129.99",
    "stock": 50,
    "marca_id": 1,
    "categoria_id": 1,
    "imagen_url": "https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/00375837-849f-4f17-ba24-d201d27be49b/air-max-90-shoes-Nk3d0g.png",
    "created_at": "2025-08-03T10:30:00.000Z",
    "updated_at": "2025-08-03T10:30:00.000Z",
    "marca": {
        "id": 1,
        "nombre": "Nike",
        "pais_origen": "Estados Unidos"
    },
    "categoria": {
        "id": 1,
        "nombre": "Deportivos",
        "descripcion": "Calzado deportivo para actividades físicas"
    }
}
```

### 16. OBTENER PRODUCTO ESPECÍFICO
```http
GET {{BASE_URL}}/api/productos/1
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
{
    "id": 1,
    "nombre": "Air Max 90",
    "descripcion": "Sneakers clásicos con amortiguación Air",
    "precio": "129.99",
    "stock": 50,
    "marca_id": 1,
    "categoria_id": 1,
    "imagen_url": "https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/00375837-849f-4f17-ba24-d201d27be49b/air-max-90-shoes-Nk3d0g.png",
    "created_at": "2025-08-03T10:30:00.000Z",
    "updated_at": "2025-08-03T10:30:00.000Z",
    "marca": {
        "id": 1,
        "nombre": "Nike",
        "pais_origen": "Estados Unidos"
    },
    "categoria": {
        "id": 1,
        "nombre": "Deportivos",
        "descripcion": "Calzado deportivo para actividades físicas"
    }
}
```

### 17. ACTUALIZAR PRODUCTO
```http
PUT {{BASE_URL}}/api/productos/1
Authorization: Bearer {{token}}
Content-Type: application/json

{
    "nombre": "Air Max 90 Premium",
    "precio": 149.99,
    "stock": 45
}
```

**Respuesta (200):**
```json
{
    "id": 1,
    "nombre": "Air Max 90 Premium",
    "descripcion": "Sneakers clásicos con amortiguación Air",
    "precio": "149.99",
    "stock": 45,
    "marca_id": 1,
    "categoria_id": 1,
    "imagen_url": "https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/00375837-849f-4f17-ba24-d201d27be49b/air-max-90-shoes-Nk3d0g.png",
    "created_at": "2025-08-03T10:30:00.000Z",
    "updated_at": "2025-08-03T10:35:00.000Z"
}
```

### 18. ELIMINAR PRODUCTO
```http
DELETE {{BASE_URL}}/api/productos/1
Authorization: Bearer {{token}}
```

**Respuesta (204):** Sin contenido

### 19. BUSCAR PRODUCTOS
```http
GET {{BASE_URL}}/api/productos/buscar?nombre=Air&precio_min=100&precio_max=200
Authorization: Bearer {{token}}
```

**Parámetros de Query:**
- `nombre`: Buscar por nombre (parcial)
- `precio_min`: Precio mínimo
- `precio_max`: Precio máximo

**Respuesta (200):**
```json
[
    {
        "id": 1,
        "nombre": "Air Max 90",
        "descripcion": "Sneakers clásicos con amortiguación Air",
        "precio": "129.99",
        "stock": 50,
        "marca": {
            "id": 1,
            "nombre": "Nike"
        },
        "categoria": {
            "id": 1,
            "nombre": "Deportivos"
        }
    }
]
```

---

## 📊 DASHBOARD

### 20. DASHBOARD
```http
GET {{BASE_URL}}/api/dashboard
Authorization: Bearer {{token}}
```

---

## 🚦 CÓDIGOS DE ESTADO HTTP

| Código | Significado | Descripción |
|--------|-------------|-------------|
| 200 | OK | Operación exitosa |
| 201 | Created | Recurso creado exitosamente |
| 204 | No Content | Eliminación exitosa |
| 400 | Bad Request | Datos de entrada inválidos |
| 401 | Unauthorized | Token de autenticación inválido |
| 404 | Not Found | Recurso no encontrado |
| 422 | Unprocessable Entity | Error de validación |

---

## ❌ EJEMPLOS DE ERRORES

### Error de Validación (422):
```json
{
    "message": "The given data was invalid.",
    "errors": {
        "nombre": ["The nombre field is required."],
        "precio": ["The precio must be a number."]
    }
}
```

### Error de Autenticación (401):
```json
{
    "message": "Unauthenticated."
}
```

### Error de Login (401):
```json
{
    "message": "Credenciales incorrectas",
    "errors": {
        "email": ["Las credenciales proporcionadas no son correctas."]
    }
}
```

### Error de Restricción de Integridad para Categorías (422):
```json
{
    "error": "No se puede eliminar la categoría porque tiene productos asociados", 
    "message": "Elimine primero todos los productos de esta categoría antes de eliminarla"
}
```

**Nota:** Las marcas se pueden eliminar libremente ya que sus productos se eliminan automáticamente en cascada.

---

## 🔧 CONFIGURACIÓN DE POSTMAN

### Variables de Entorno:
- `BASE_URL`: `http://localhost:8000`
- `token`: (se llenará automáticamente)

### Script para Auto-Login:
En el endpoint de login, agregar en "Tests":
```javascript
if (pm.response.code === 200) {
    const response = pm.response.json();
    pm.environment.set("token", response.access_token);
}
```

### Autorización Automática:
En requests protegidas:
- Type: Bearer Token
- Token: `{{token}}`

---

## 📝 NOTAS IMPORTANTES

1. **Reemplaza `{{BASE_URL}}`** con tu URL local: `http://localhost:8000`
2. **Reemplaza `{{token}}`** con el token obtenido del login
3. **Todos los IDs** en las URLs deben ser números reales de tu base de datos
4. **Los campos opcionales** pueden omitirse en las requests
5. **Las URLs con parámetros** como `{id}` deben reemplazarse con valores reales

---

## 🎯 FLUJO RECOMENDADO PARA TESTING

1. **Registro** → Obtener token
2. **Login** → Verificar token
3. **Crear Marca** → Anotar ID
4. **Crear Categoría** → Anotar ID
5. **Crear Producto** → Usar IDs anteriores
6. **Probar operaciones CRUD** en cada entidad
7. **Logout** → Finalizar sesión

---

*Archivo generado automáticamente para SneakerHub API v1.0*
