# API de Gestión de Personas

Esta API permite realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) sobre registros de personas.

## Tabla de Contenidos

1. [Descripción General](#descripción-general)
2. [Base URL](#base-url)
3. [Autenticación](#autenticación)
4. [Endpoints](#endpoints)
   - [Crear Persona](#crear-persona)
   - [Consultar Persona por ID](#consultar-persona-por-id)
   - [Actualizar Persona Completa](#actualizar-persona-completa)
   - [Actualizar Persona Parcialmente](#actualizar-persona-parcialmente)
   - [Eliminar Persona](#eliminar-persona)
5. [Modelos de Datos](#modelos-de-datos)
6. [Códigos de Respuesta](#códigos-de-respuesta)
7. [Ejemplos](#ejemplos)

## Descripción General

Esta API proporciona un conjunto completo de endpoints para gestionar información de personas, permitiendo crear nuevos registros, consultar registros existentes, actualizar información completa o parcial, y eliminar registros.

## Base URL

```
https://api-laravel-production-ed2b.up.railway.app/api/personas
```

## Autenticación

[Aquí se incluiría información sobre el método de autenticación requerido para acceder a la API]

## Endpoints

### Crear Persona

Crea un nuevo registro de persona en el sistema.

- **URL:** `/personas`
- **Método:** `POST`
- **Autenticación requerida:** Sí

**Parámetros de solicitud:**

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| identificacion | String | Sí | Número de identificación personal (máx. 20 caracteres) |
| nombre | String | Sí | Nombre de la persona (máx. 255 caracteres) |
| apellido | String | Sí | Apellido de la persona (máx. 255 caracteres) |
| email | String | Sí | Correo electrónico (formato válido) |
| telefono | String | Sí | Número de teléfono (máx. 13 caracteres) |
| direccion | String | Sí | Dirección física (máx. 255 caracteres) |

**Ejemplo de solicitud:**

```json
{
  "identificacion": "1234567890",
  "nombre": "Juan",
  "apellido": "Pérez",
  "email": "juan.perez@example.com",
  "telefono": "555-123-4567",
  "direccion": "Av. Principal 123"
}
```

**Respuesta exitosa:**

- **Código:** 201 Created
- **Contenido:**

```json
{
  "persona": {
    "id": 1,
    "identificacion": "1234567890",
    "nombre": "Juan",
    "apellido": "Pérez",
    "email": "juan.perez@example.com",
    "telefono": "555-123-4567",
    "direccion": "Av. Principal 123",
    "created_at": "2025-03-22T10:30:45.000Z",
    "updated_at": "2025-03-22T10:30:45.000Z"
  },
  "status": 201
}
```

**Respuestas de error:**

- **Código:** 400 Bad Request
- **Contenido:**

```json
{
  "message": "Error en la validación de los datos",
  "errors": {
    "email": ["El formato del email es inválido."]
  },
  "status": 400
}
```

- **Código:** 500 Internal Server Error
- **Contenido:**

```json
{
  "message": "Error al crear el persona",
  "status": 500
}
```

### Consultar Persona por ID

Obtiene la información detallada de una persona específica.

- **URL:** `/personas/{id}`
- **Método:** `GET`
- **Autenticación requerida:** Sí

**Parámetros de URL:**

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | Integer | Sí | Identificador único de la persona |

**Respuesta exitosa:**

- **Código:** 200 OK
- **Contenido:**

```json
{
  "persona": {
    "id": 1,
    "identificacion": "1234567890",
    "nombre": "Juan",
    "apellido": "Pérez",
    "email": "juan.perez@example.com",
    "telefono": "555-123-4567",
    "direccion": "Av. Principal 123",
    "created_at": "2025-03-22T10:30:45.000Z",
    "updated_at": "2025-03-22T10:30:45.000Z"
  },
  "status": 200
}
```

**Respuesta de error:**

- **Código:** 404 Not Found
- **Contenido:**

```json
{
  "message": "Persona no encontrada",
  "status": 404
}
```

### Actualizar Persona Completa

Actualiza toda la información de una persona existente.

- **URL:** `/personas/{id}`
- **Método:** `PUT`
- **Autenticación requerida:** Sí

**Parámetros de URL:**

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | Integer | Sí | Identificador único de la persona |

**Parámetros de solicitud:**

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| identificacion | String | Sí | Número de identificación personal (máx. 20 caracteres) |
| nombre | String | Sí | Nombre de la persona (máx. 255 caracteres) |
| apellido | String | Sí | Apellido de la persona (máx. 255 caracteres) |
| email | String | Sí | Correo electrónico (formato válido) |
| telefono | String | Sí | Número de teléfono (máx. 13 caracteres) |
| direccion | String | Sí | Dirección física (máx. 255 caracteres) |

**Ejemplo de solicitud:**

```json
{
  "identificacion": "1234567890",
  "nombre": "Juan Carlos",
  "apellido": "Pérez Rodríguez",
  "email": "juanc.perez@example.com",
  "telefono": "555-987-6543",
  "direccion": "Calle Nueva 456"
}
```

**Respuesta exitosa:**

- **Código:** 200 OK
- **Contenido:**

```json
{
  "message": "Datos actualizados de Persona",
  "persona": {
    "id": 1,
    "identificacion": "1234567890",
    "nombre": "Juan Carlos",
    "apellido": "Pérez Rodríguez",
    "email": "juanc.perez@example.com",
    "telefono": "555-987-6543",
    "direccion": "Calle Nueva 456",
    "created_at": "2025-03-22T10:30:45.000Z",
    "updated_at": "2025-03-22T11:45:23.000Z"
  },
  "status": 200
}
```

**Respuestas de error:**

- **Código:** 404 Not Found
- **Contenido:**

```json
{
  "message": "Persona no encontrada",
  "status": 404
}
```

- **Código:** 400 Bad Request
- **Contenido:**

```json
{
  "message": "Error en la validación de los datos",
  "errors": {
    "email": ["El formato del email es inválido."]
  },
  "status": 400
}
```

### Actualizar Persona Parcialmente

Actualiza solo los campos especificados de una persona existente.

- **URL:** `/personas/{id}/parcial`
- **Método:** `PATCH`
- **Autenticación requerida:** Sí

**Parámetros de URL:**

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | Integer | Sí | Identificador único de la persona |

**Parámetros de solicitud (todos opcionales):**

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| identificacion | String | Número de identificación personal (máx. 20 caracteres) |
| nombre | String | Nombre de la persona (máx. 255 caracteres) |
| apellido | String | Apellido de la persona (máx. 255 caracteres) |
| email | String | Correo electrónico (formato válido) |
| telefono | String | Número de teléfono (máx. 13 caracteres) |
| direccion | String | Dirección física (máx. 255 caracteres) |

**Ejemplo de solicitud:**

```json
{
  "telefono": "555-777-8888",
  "direccion": "Av. Central 789"
}
```

**Respuesta exitosa:**

- **Código:** 200 OK
- **Contenido:**

```json
{
  "message": "Persona actualizada",
  "persona": {
    "id": 1,
    "identificacion": "1234567890",
    "nombre": "Juan Carlos",
    "apellido": "Pérez Rodríguez",
    "email": "juanc.perez@example.com",
    "telefono": "555-777-8888",
    "direccion": "Av. Central 789",
    "created_at": "2025-03-22T10:30:45.000Z",
    "updated_at": "2025-03-22T14:20:33.000Z"
  },
  "status": 200
}
```

**Respuestas de error:**

- **Código:** 404 Not Found
- **Contenido:**

```json
{
  "message": "Persona no encontrada",
  "status": 404
}
```

- **Código:** 400 Bad Request
- **Contenido:**

```json
{
  "message": "Error en la validación de los datos",
  "errors": {
    "email": ["El formato del email es inválido."]
  },
  "status": 400
}
```

### Eliminar Persona

Elimina un registro de persona del sistema.

- **URL:** `/personas/{id}`
- **Método:** `DELETE`
- **Autenticación requerida:** Sí

**Parámetros de URL:**

| Parámetro | Tipo | Requerido | Descripción |
|-----------|------|-----------|-------------|
| id | Integer | Sí | Identificador único de la persona |

**Respuesta exitosa:**

- **Código:** 200 OK
- **Contenido:**

```json
{
  "message": "Persona eliminada",
  "status": 200
}
```

**Respuesta de error:**

- **Código:** 404 Not Found
- **Contenido:**

```json
{
  "message": "Persona no encontrado",
  "status": 404
}
```

## Modelos de Datos

### Modelo Persona

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | Integer | Identificador único (autogenerado) |
| identificacion | String | Número de identificación personal |
| nombre | String | Nombre de la persona |
| apellido | String | Apellido de la persona |
| email | String | Correo electrónico |
| telefono | String | Número de teléfono |
| direccion | String | Dirección física |
| created_at | Timestamp | Fecha y hora de creación (autogenerado) |
| updated_at | Timestamp | Fecha y hora de última actualización (autogenerado) |

## Códigos de Respuesta

| Código | Descripción |
|--------|-------------|
| 200 | OK - La solicitud se ha completado exitosamente |
| 201 | Created - Se ha creado un nuevo recurso |
| 400 | Bad Request - La solicitud tiene un formato incorrecto o datos inválidos |
| 404 | Not Found - El recurso solicitado no existe |
| 500 | Internal Server Error - Error en el servidor |

## Ejemplos

### Ejemplo de flujo completo

1. **Crear una nueva persona**

```
POST /personas
```

2. **Consultar la persona creada**

```
GET /personas/1
```

3. **Actualizar parcialmente la información**

```
PATCH /personas/1/parcial
```

4. **Actualizar completamente la información**

```
PUT /personas/1
```

5. **Eliminar la persona**

```
DELETE /personas/1
```
