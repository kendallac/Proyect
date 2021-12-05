# Pagina Web de Blogs autoadministrable  en Laravel 8

## Documentación

- [Traducción de la documentación oficial](https://docs.laraveles.com/docs/8)
  - [Autenticación](https://docs.laraveles.com/docs/8/authentication)
  - [Migraciones](https://docs.laraveles.com/docs/8/migrations)
  - [Eloquent](https://docs.laraveles.com/docs/8/eloquent)
  - [Relaciones](https://docs.laraveles.com/docs/8/eloquent-relationships)
  - [Seeders](https://docs.laraveles.com/docs/8/seeding)

## Trabajar con un Proyecto Compartido

### Clonar el Repositorio de git

```bash
git clone https://github.com/kendallac/Proyect.git
```

### Moverse al directorio del proyecto

```bash
cd Proyect
```

### Descargar Dependencias del Proyecto

Como las dependencias del proyecto las maneja **composer** debemos ejecutar el comando:

```bash
composer install
npm install
```

### Configurar Entorno

La configuración del entorno se hace en el archivo **.env** pero esé archivo no se puede versionar según las restricciones del archivo **.gitignore**, igualmente en el proyecto hay un archivo de ejemplo  **.env.example** debemos copiarlo con el siguiente comando:

```bash
cp .env.example .env
```

Luego es necesario modificar los valores de las variables de entorno para adecuar la configuración a nuestro entorno de desarrollo, por ejemplo los parámetros de conexión a la base de datos.

### Generar Clave de Seguridad de la Aplicación

```bash
php artisan key:generate
```

### Migrar la Base de Datos

el proyecto ya tiene los modelos, migraciones y seeders generados. Entonces lo único que nos hace falta es ejecutar la migración y ejecutar el siguiente comando:

```bash
php artisan migrate:fresh --seed
```

- **migrate:fresh** ejecuta la migración **eliminando** todas las tablas y volviendo a generarlas.
- **--seed** ejecuta los Seeders habilitados  

### Probar los modelos con Tinker

```bash
php artisan tinker
```

#### Obtener el usuario con id 1

```php
$u= App\User::find(1);
```
