# Administrador de Ofertas

Dillinger is a cloud-enabled, mobile-ready, offline-storage, AngularJS powered HTML5 Markdown editor.

  1. descargar el git clone https://github.com/jdospinaAT/pruebaSynfony -b proyecto
  2. cd proyecto
  3. Realizar configuracion el entorno en la raiz del proyecto 
    - docker-compose build
    - docker-compose up
  4. Realizamos configuracion del composer y BD 
  
    docker exec -it (nombre del contenedor PHP "proyecto_php-fpm_1") bash
    composer install
    php bin/console doctrine:migrations:migrate
    create user admin
    
  Creacion del usuario administrador

    php bin/console doctrine:query:sql "INSERT INTO user (email, roles, password, is_verified) VALUES ('admin@admin.com', '[\"ROLE_ADMIN\"]', '\$argon2id\$v=19\$m=65536,t=4,p=1\$zHd8/9QmaFCkXITvBXNcKg\$kLZXWpuUrRH0FOhMaGbX4aZildau7gMym4PUHTTK44I', 1)

    
        
**Rutas**

| Plugin | README |
| ------ | ------ |
| [_preview_error]: | <http://localhost:8000/_error/{code}.{_format> |
| [_wdt]: | <http://localhost:8000/_wdt/{token> |
| [_profiler_home]: | <http://localhost:8000/_profiler> |
| [_profiler_search]: | <http://localhost:8000/_profiler/search> |
| [_profiler_search_bar]: | <http://localhost:8000/_profiler/search_bar> |
| [_profiler_phpinfo]: | <http://localhost:8000/_profiler/phpinfo> |
| [_profiler_search_results]: | <http://localhost:8000/_profiler/{token}/search/results> |
| [_profiler_open_file]: | <http://localhost:8000/_profiler/open> |
| [_profiler]: | <http://localhost:8000/_profiler/{token> |
| [_profiler_router]: | <http://localhost:8000/_profiler/{token}/router> |
| [_profiler_exception]: | <http://localhost:8000/_profiler/{token}/exception> |
| [_profiler_exception_css]: | <http://localhost:8000/_profiler/{token}/exception.css> |
| [company]: | <http://localhost:8000/company> |
| [company_new]: | <http://localhost:8000/company/new> |
| [company_offers]: | <http://localhost:8000/company/{id}/offers> |
| [offer_new]: | <http://localhost:8000/company/{id}/offers/new> |
| [offers]: | <http://localhost:8000> |
| [offer_show]: | <http://localhost:8000/offer/{id> |
| [offer_apply]: | <http://localhost:8000/offer/{id}/apply> |
| [app_register]: | <http://localhost:8000/register> |
| [app_login]: | <http://localhost:8000/login> |
| [app_logout]: | <http://localhost:8000/logout> |
| [user_index]: | <http://localhost:8000/user> |
| [user_new]: | <http://localhost:8000/user/new> |
| [user_show]: | <http://localhost:8000/user/{id> |
| [user_edit]: | <http://localhost:8000/user/{id}/edit> |
| [user_delete]: | <http://localhost:8000/user/{id> |
    

**Roles**
- ROLE_ADMIN
- ROLE_COMPANY
- ROLE_APPLICANT