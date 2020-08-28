# Pasos para la instalación del test "The library"

## Clonar el repositorio

```bash
git clone https://github.com/MiguelAngelMP10/TheLibrary-DIT.git
```

-   Entrar al directorio con:

```bash
cd TheLibrary-DIT
```

## Instalar las dependecias de nodejs

```bash
npm install
```

## Instalar las dependencias de laravel

```bash
composer install
```

## Compilar css y javascript

```bash
npm run dev

```

## Configuaciones del archivo .env

-   Realizar copia del archivo .env.example
    ```bash
       cp .env.example .env
    ```
-   Crear una APP_KEY del proyecto con el siguiente comando
    ```bash
       php artisan key:generate
    ```
-   Crear la base de datos en tu motor de base de datos favorito en este caso _mysql_ recuerda que el nombre de la base de datos debe ser el mismo que la variable _DB_DATABASE_

*   Editar las variables en el archivo **.env** para que queden a tus necesidades
    _DB_DATABASE_ es el nombre de la base de datos del proyecto, _DB_USERNAME_ es el usuario al servidor de bases de datos y _DB_PASSWORD_ es la clave del usuario

    ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=
    ```

-   Ejecutar las migraciones para contruir todo el esquema de la base de datos del proyecto usando el siguiente comando

    ```bash
       php artisan migrate
    ```

-   Arrancamos el proyecto con
    ```bash
      php artisan serve
    ```
-   El proyecto estara listo en el link: http://127.0.0.1:8000

#NOTAS

-   Registrar un usuario en la opcin de registro del sistema para poder acceder
