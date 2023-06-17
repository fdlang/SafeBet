
<div style="background-color: white;">
  <img src="./laravel-SafeBet/public/img/logo2.jpg" alt="logo">
</div>


## PARA UN BUEN FUNCIONAMIENTO DE LA APLICACIÓN

### INSTALACION 

- Instale el paquete -> "node-v19.8.1-x64"
  Enlace: [https://nodejs.org/es/download](URL)

- Creea en la raiz del proyecto laravel-safebet un fichero ".env" 
- Creea en la raiz del proyecto react-safebet un fichero ".env"  

Para configurar los ficheros pongase en contacto con el propietario del repositorio.

Correo: [angel_arcos@outlook.es](URL)

Una vez configurado todos los ficheros, asegurarse de tener instalado todas las dependencias:
  - Abrir consola en la raiz del proyecto laravel-safebet y ejecutar el comando

    ```bash
      npm install
      composer install
    ```

  - Abrir consola en la raiz del proyecto react-safebet y ejecutar el comando

    ```bash
      npm install
    ```


### CONEXION API EXTERNA

Antes de conectar con la api externa debe darse de alta en el servio: 
  - URL: [https://brokersports.club/](URL)

Una vez dado de alta para conectar con la api externa debe crear el fichero apiBroker.php con sus credenciales. Dicho fichero debe ser alojado en el directorio laravel-safebet/config

Contenido del fichero apiBroker.php:

    ``` 
      <?php

      return [  
          'key' => "BEARER <INSERTAR TOKEN AQUI>",
          'content' => "application/json",
      ];
    ```

### MIGRAR BASE DE DATOS

Para migrar la base de datos introduzca desde el terminal en la raiz del proyecto laravel-safebet

    ``` 
      php artisan migrate --seed
    ```

### INICIAR APLICACION WEB (SERVIDOR)

Ejecutar el comando desde el terminal en la raiz del proyecto laravel-safebet 

    ``` 
      php artisan serve
    ```

### INICIAR APLICACION WEB (CLIENTE)

Ejecutar el comando desde el terminal en la raiz del proyecto react-safebet 

    ```
      npm run dev
    ```

### Dirección web SAFEBET 

URL: [localhost:5173/](URL)