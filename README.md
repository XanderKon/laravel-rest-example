# Пример crud api

## Требования к локальной разработке

- Необходимо наличие установленного php версии >= 8.1 (на более ранних версиях, скорее всего, будут
проблемы с установкой зависимостей), со всеми базовыми расширениями;
- Необходим запущенный сервер с БД PostgreSQL (тесты проводились с использованием актуальной версии 15.4).
  Также необходимо проследить, что будет создана необходимая БД, которая указывается в файлике .env (см. ниже);
- Необходим установленный менеджер пакетов composer (https://getcomposer.org/doc/00-intro.md).

Рекомендуется также рассмотреть возможность запуска в докер-окружении, что избавит от необходимости
устанавливать необходимое ПО и даст гибкость в настройках и различного рода экспериментах.

## Для запуска

- Копируем конфиг

  `cp .env.example .env`

  и редактируем его согласно потребностям.

  Наиболее вероятно, что придётся изменить параметры подключения к локальной БД (опции с префиксом **DB_**)

- Устанавливаем зависимости

  `composer install`

- Запускаем миграции и сиды (в данном примере сидирование базы не используется)

  `php artisan migrate`

  `php artisan db:seed`

## Тесты

- Запускаем тесты

  `vendor/bin/phpunit`

  Важный момент! При запуске тестов будет использоваться подключение к БД, что может повлечь за собой удаление всех
  данных, добавленных туда до запуска тестов. При необходимости разграничить использование БД можно через дополнительную
  конфигурацию окружения, используя **.env.testing**, где указать подключение к тестовой БД (обычно то же подключение, но
  другая схема).

## Дополнительная информация

  [FAQ](docs/FAQ.md)
