# Proyecto: Milenio 📚

## Descripción del Proyecto

Este proyecto es una biblioteca virtual diseñada para gestionar libros, géneros literarios y usuarios. Se implementa un sistema de gestión de bases de datos que permite realizar operaciones como crear, leer, actualizar y eliminar en las diferentes tablas de la base de datos. 

El sistema está desarrollado en PHP y utiliza **MySQL** como sistema de gestión de bases de datos. Se estructura con un modelo de datos relacional que permite vincular géneros literarios con libros, además de gestionar usuarios con roles específicos para acceder a las funcionalidades del sistema.

![Diagrama](/der.png)

## Integrantes del Proyecto

- **Francisco Merlino Dabove**
  [francisco_mer004@hotmail.com](mailto:francisco_mer004@hotmail.com)
- **Mateo Corsi**
  [mateocorsi@gmail.com](mailto:mateocorsi@gmail.com)

---

## Diseño de la Base de Datos

La base de datos se compone de tres tablas principales:

### Tabla `generos`
- **Atributos:**
  - `id` (Clave primaria, Auto Incremental)
  - `nombre` (Nombre del género literario)
  - `descripcion` (Descripción del género)

- **Descripción:**
  Contiene los géneros literarios disponibles en la biblioteca.

### Tabla `libros`
- **Atributos:**
  - `id` (Clave primaria, Auto Incremental)
  - `titulo` (Título del libro)
  - `autor` (Autor del libro)
  - `reseña` (Resumen o reseña del libro)
  - `genero_id` (Clave foránea que referencia la tabla `generos`)

- **Descripción:**
  Almacena información sobre los libros, con un vínculo directo al género correspondiente.

### Tabla `usuarios`
- **Atributos:**
  - `id_usuario` (Clave primaria, Auto Incremental)
  - `nombre` (Nombre del usuario)
  - `email` (Correo electrónico del usuario)
  - `password` (Contraseña del usuario, almacenada de manera segura)

- **Descripción:**
  Gestiona los usuarios del sistema, con permisos específicos para realizar acciones en la biblioteca.

---

## Características Técnicas

- **Lenguaje de programación:** PHP
- **Base de datos:** MySQL
- **ORM:** PDO para la interacción segura con la base de datos
- **Servidor web:** Apache
- **Entorno de desarrollo:** XAMPP

---

## Funcionalidades Principales

1. **Gestión de Géneros:**
   - Crear, leer, actualizar y eliminar géneros literarios.

2. **Gestión de Libros:**
   - Crear, leer, actualizar y eliminar los libros.

3. **Gestión de Usuarios:**
   - Registrar nuevos usuarios y autenticarlos para acceder a las funcionalidades del sistema.
   - Acceso restringido mediante un sistema de autenticación basado en contraseñas.

---

## Despliegue del Sitio en un Servidor Local

### Requisitos previos
1. Descargar e instalar [XAMPP](https://www.apachefriends.org/index.html).
2. Clonar o descargar el proyecto.

### Pasos para el despliegue:
1. Colocar la carpeta del proyecto dentro de la carpeta `htdocs` de XAMPP (ubicada en `C:/xampp/htdocs`).
2. Abrir el panel de control de XAMPP y activar los servicios de **Apache** y **MySQL**.
3. Importar la base de datos `milenio_db` en **phpMyAdmin**:
   - Acceder a `http://localhost/phpmyadmin` en el navegador.
   - Crear una nueva base de datos llamada `milenio_db`.
   - Importar el archivo `milenio_db.sql` incluido en el proyecto.

4. Acceder al proyecto en el navegador mediante la URL:
- `http://localhost/home`
-📝 **Nota:** La URL podria variar, dependiendo de donde se clona el repositorio,
se debera acceder a `home` desde la ruta raiz del proyecto.

5. Iniciar sesión utilizando las credenciales predeterminadas:
- **Usuario:** `webadmin@gmail.com`
- **Contraseña:** `admin`

---

## Uso del CRUD
- **Géneros:** Consultar, crear nuevos géneros, editar descripciones o eliminarlos.
- **Libros:** Gestionar la lista de libros, vincularlos con géneros, crear nuevos, editar existentes y eliminar registros.
- **Usuarios:** Acceso seguro al sistema mediante login, registro de nuevos usuarios y administración de cuentas existentes, que permiten realizar acciones sobre géneros y libros.

---
