## Deploy

```bash
docker-compose exec php bash -c "cd /var/www/web/laravel && php artisan down --message=\"Upgrading Database\" --retry=60"


docker-compose exec php bash -c "cd /var/www/web/laravel && php artisan config:cache"


docker-compose exec php bash -c "cd /var/www/web/laravel && php artisan up"
```
