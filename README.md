Блог

docker-compose up --build после сборки он доступен на localhost:8000 

при первой сборке миграции могут не запуститься, соберите проект
ещё раз, миграции выполнятся

npm i
npm run dev (так же при первом запуске может выдать ошибку, запустите 2 раз)

Наполним тестовыми данными
docker exec blog-api php artisan db:seed

Создались два пользователя
admin@test.com
12345678
bloger@test.com
123456789

http://localhost:8
025  -- тестирование почты при регистрации исользуем maihog

Запустить тесты
docker exec blog-api php artisan test