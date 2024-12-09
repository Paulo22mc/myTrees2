# Aplicación Web para la Asociación de Amigos de Un Millón de Árboles 

## Objetivo
Este proyecto tiene como objetivo desarrollar una aplicación web utilizando **Laravel** para apoyar la recaudación de fondos en beneficio de las iniciativas de reforestación de la Asociación de Amigos de Un Millón de Árboles. La aplicación también forma parte de un ejercicio de clase para fortalecer habilidades en programación web, especialmente en el uso de Laravel y el patrón de diseño **MVC** (Modelo-Vista-Controlador).

## Descripción del Proyecto
La aplicación permite a la Asociación administrar sus especies de árboles y gestionar las ventas de árboles a través de tres tipos de usuarios:

1. **Administrador**: Puede gestionar todas las funciones internas de la aplicación, como el seguimiento de especies de árboles, administración de ventas, y supervisión de las actualizaciones de estado de cada árbol.

2. **Operador**: Tiene acceso a la gestión y actualización de los árboles, incluyendo la actualización del estado, tamaño y otras características de los árboles. Este rol tiene permisos similares al del Administrador para realizar actualizaciones, pero no tiene acceso a funciones críticas como la gestión de usuarios o configuraciones globales.

3. **Amigo**: Los usuarios registrados como "Amigos" pueden ver los árboles disponibles y solicitar la compra de aquellos en estado "Disponible". También pueden ver los árboles que han adquirido, pero sin posibilidad de editarlos.

### Funcionalidades

#### Para el Administrador

- **Dashboard**: Muestra estadísticas clave como:
  - Cantidad de amigos registrados.
  - Cantidad de árboles disponibles.
  - Cantidad de árboles vendidos.

- **Gestión de Especies de Árboles**: Permite realizar operaciones CRUD (crear, leer, actualizar y eliminar) sobre las especies, incluyendo el nombre comercial y científico de cada árbol.

- **Gestión de Árboles de Amigos**:
  - Visualizar los árboles registrados por cada amigo.
  - Editar los árboles de un amigo, incluyendo tamaño, especie, ubicación y estado (disponible o vendido).
  - Registrar actualizaciones de árboles para llevar un control del tamaño actual y estado.

- **Gestión de Árboles en Venta**:
  - Permite crear un nuevo árbol disponible para la venta, especificando la especie, ubicación, estado, precio y una foto.

- **Cerrar Sesión**: Función para que el administrador pueda cerrar sesión de manera segura.

#### Para el Operador

- **Gestión y Actualización de Árboles**:
  - El operador tiene acceso a la sección de actualizaciones de los árboles. Puede modificar los detalles de los árboles como el tamaño, especie, ubicación y estado (disponible o vendido).
  - El operador puede registrar actualizaciones del estado de cada árbol y supervisar su evolución en cuanto a tamaño y condición.

#### Para el Amigo

- **Registro**: Los amigos deben registrarse con su nombre, apellidos, teléfono, correo, dirección y país.

- **Compra de Árboles**:
  - Visualizan la lista de árboles disponibles y pueden solicitar la compra de uno de estos.
  - Al realizar una compra, el árbol seleccionado cambia su estado a "Vendido".

- **Listado de Árboles Adquiridos**:
  - Pueden ver un listado de los árboles que han comprado, junto con la información del árbol y las fotos. Esta vista es solo de lectura.

### Funcionalidad Adicional - Cronjob

Se desarrolló un cronjob que revisa los árboles cuya última actualización fue hace más de un mes. Si encuentra alguno, envía un correo al administrador solicitando una actualización. El correo incluye una lista con los nombres de los árboles que necesitan actualización.

### Tecnología Utilizada

- **Laravel**: Se utilizó el framework Laravel para el desarrollo de la aplicación, aprovechando sus características como la gestión de rutas, controladores, autenticación, y el sistema de migraciones para la base de datos.

- **MVC (Modelo-Vista-Controlador)**: La aplicación sigue el patrón de diseño **MVC** para separar claramente la lógica de negocio (Modelo), la presentación (Vista) y la gestión de las interacciones del usuario (Controlador). Esto facilita el mantenimiento y escalabilidad de la aplicación.

## Contacto
**Institución:** Universidad Técnica Nacional  
**Correos:**  
- avillegasmur23@gmail.com  
- juanpaulomejias@outlook.com
