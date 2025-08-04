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
```
GET /api/marcas/1/productos
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
```
GET /api/categorias
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
```
POST /api/categorias
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
```
PUT /api/categorias/1
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
```
DELETE /api/categorias/1
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
{
    "message": "Categoría eliminada exitosamente",
    "productos_eliminados": 2
}
```

**Nota importante:** Al eliminar una categoría, también se eliminan automáticamente todos sus productos asociados (eliminación en cascada).

### 14. PRODUCTOS POR CATEGORÍA
```
GET /api/categorias/1/productos
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
        "imagen_url": "https://ejemplo.com/imagen.jpg",
        "marca": {
            "id": 1,
            "nombre": "Nike",
            "pais_origen": "Estados Unidos"
        }
    }
]
```

---

## 👟 PRODUCTOS

### 15. LISTAR TODOS LOS PRODUCTOS
```
GET /api/productos
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

### 16. CREAR NUEVO PRODUCTO
```
POST /api/productos
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

### 17. OBTENER PRODUCTO ESPECÍFICO
```
GET /api/productos/1
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

### 18. ACTUALIZAR PRODUCTO
```
PUT /api/productos/1
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

### 19. ELIMINAR PRODUCTO
```
DELETE /api/productos/1
Authorization: Bearer {{token}}
```

**Respuesta (200):**
```json
{
    "message": "Producto 'Air Max 90' eliminado exitosamente"
}
```

### 20. BUSCAR PRODUCTOS
```
GET /api/productos/buscar?nombre=Balenciaga_vagabundo
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
        "id": 13,
        "nombre": "Balenciaga vagabundo",
        "descripcion": "Tenis encontrados en el basurero",
        "precio": "1000.00",
        "stock": 10000,
        "marca_id": 15,
        "categoria_id": 4,
        "imagen_url": "https://media.gq-magazin.de/photos/627a65716f2c1a98b47dc249/master/w_1600%2Cc_limit/Mode-BalenciagaParis-EMbed22.jpg",
        "created_at": "2025-08-03T23:25:29.000000Z",
        "updated_at": "2025-08-03T23:25:29.000000Z",
        "marca": {
            "id": 15,
            "nombre": "balenciaga",
            "pais_origen": "Italia",
            "created_at": "2025-08-03T23:24:11.000000Z",
            "updated_at": "2025-08-03T23:24:11.000000Z"
        },
        "categoria": {
            "id": 4,
            "nombre": "Casual",
            "descripcion": "Zapatos para uso diario",
            "created_at": "2025-08-03T20:27:22.000000Z",
            "updated_at": "2025-08-03T20:27:22.000000Z"
        }
    }
]
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

**Nota:** Tanto las marcas como las categorías se pueden eliminar libremente ya que sus productos se eliminan automáticamente en cascada.

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
