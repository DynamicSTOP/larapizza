#Pizza site made with [laravel](https://laravel.com/)

You might want to install [docker](https://docs.docker.com/get-docker/) and [docker-compose](https://docs.docker.com/compose/install/) though it's optional.
I prefer keep things separate in containers.


### installation with docker

1. Create volume for db with
    ```bash
    docker volume create --name=larapizza_dbdata
    ```

2. Add network
    ```bash
    docker network create --gateway 172.28.5.254 --ip-range 172.28.5.0/24 --subnet 172.28.0.0/16 app_net
    ``` 
    This will allow having static ips for services in case you have nginx in proxy mode outside.
    
3. Copy and modify `.env.exmple` -> `.env` and `docker-compose.dev.yml` -> `docker-compose.yml`

4. Use `chown` and `chmod` onto project folder. User id and group id specified in .env. 
    
5. Start containers
    ```bash
   docker-compose up -d 
   ```
   
   Now you can access laravel container with
   ```bash
   docke-compose exec php bash
   ``` 

6. Inside container
   ```bash
   cd /var/www/web/laravel
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate:fresh --seed
   npm install
   npm run dev 
   ```   

#### P.S.

Free stock photos used from [unsplash.com](https://unsplash.com)

Opensource svgs from [OPEN ICONIC](https://useiconic.com/open/)
