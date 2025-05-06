## Подготовка и запуск
1. Создать файл `.env` со структурой как в файле `.env.example`
2. Создать папку cache в папке bootstrap
3. `composer install`
4. `sail artisan migrate:refresh --seed`
5. `sail up`

## Тестирование
`sail artisan test`
