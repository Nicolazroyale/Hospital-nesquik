# Hospital-nesquik
Es un trabajo practico que me pidieron realizar y que lo subo a github para mas facilidad y instrucciones de instalacion (Esta hecho con docker)

# Requerido
Docker

# Instalacion y ejecucion
Descarga el proyecto en una carpeta y ejecutalo por primera vez con "docker compose up -d --build"
Esto descargara las dependencias para que los contenedores funcionen correctamente

Una vez hecho esto. La pagina sera accesible desde el puerto 8080 (http://localhost:8080/)

# Funcionalidad
La pagina web se levanta con apache2 y esta escrita en html, css y php 
y la base de datos esta exportada desde acces a .SQL y se levanta con MariaDB

# Para pruebas
Ejecute el archivo "hospital.sql" con el siguiete comando para generar 100 pacientes fantasma (O imaginarios):
docker exec -i hospital-mysql mariadb -uuser -puserpassword hospital_db < initdb/datos_ficticios.sql
