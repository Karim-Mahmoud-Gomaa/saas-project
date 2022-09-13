<?php

namespace App\Services;
use App\Services\CommandService;

class FileService {
    public static function pull($clientName){
        $commands = [
            "(cd public_html/$clientName && git init)",
            "(cd public_html/$clientName && git remote add origin ".env("GIT_CART_MONSTER").")",
            "(cd public_html/$clientName && git fetch)",
            "(cd public_html/$clientName && git checkout -f origin main)",
            "(cd public_html/$clientName && git checkout main)",
            "(cd public_html/$clientName && git pull origin main)",
            "touch public_html/$clientName/.env",
            "cat public_html/$clientName/.env.example > public_html/$clientName/.env",
            "cd public_html/$clientName && php /usr/local/bin/composer install --ignore-platform-reqs && php artisan cart:install $clientName; php artisan db:seed",
        ];
        CommandService::execute($commands);
    }

}