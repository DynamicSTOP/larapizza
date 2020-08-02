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
    docker network create app_net
    ``` 
    This will allow having static ips for services in case you have nginx in proxy mode outside.
    
3. Start containers
    ```bash
   docker-compose up -d 
   ```
   Now you can access laravel container with
   ```bash
   docke-compose exec php bash
   ``` 


todo artisan key, db, link to server
