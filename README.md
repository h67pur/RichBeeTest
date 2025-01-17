# Учебный проект по тестированию в Laravel
## Спонсор данного мероприятия:

[![RichBeeLogo](app/public/RB_Logo.jpeg)](https://richbee.ru/)

## Описание проекта

Этот проект включает учебные тесты для основной логики, связанной с управлением продукцией. 
Тесты написаны с использованием PHPUnit и Laravel и проверяют условия валидации и функциональности API для работы с продуктами. 

### Используемый стек

- **Laravel 10**
- **PostgreSQL**
- **Docker**

### Развертывание проекта

Развертывание проекта осуществляется через Docker. Для этого выполните следующую команду:

```bash
make start
```
После выполнения данной команды ничего дополнительно устанавливать не нужно — проект будет развернут и запущен, готовый к использованию.
Все миграции для проекта пройдут автоматически во время развертывания проекта.

### Запуск тестов

Для запуска тестов используйте следующую команду:
```bash
make test
```

## Тесты

Проект включает следующие тесты:

1. **Получение всех продуктов**: Проверка того, что API корректно возвращает список всех продуктов из базы данных.
2. **Создание нового продукта**: Проверка возможности успешного добавления нового продукта в систему через API.
3. **Валидация создания продукта**: Проверка правил валидации, обеспечивающих, что основные обязательные поля заполнены корректно при создании продукта.
4. **Получение продукта по ID**: Проверка, что API возвращает корректные данные о продукте по его уникальному идентификатору.

### 1. `GetAllProductsTest`

- **Описание**: Проверяет, что метод `index` контроллера возвращает список всех продуктов из базы данных.
- **Ожидаемый результат**:
    - Статус ответа: `200 OK`
    - Ответ содержит массив продуктов с правильной структурой.

### 2. `CreateProductSuccessTest`

- **Описание**: Проверяет возможность успешного создания нового продукта с корректными данными.
- **Ожидаемый результат**:
    - Статус ответа: `201 Created`
    - Продукт успешно добавляется в базу данных с правильными данными.

### 3. `CreateProductValidationFailureTest`

- **Описание**: Проверяет, что попытка создания продукта без обязательных полей возвращает ошибку валидации.
- **Ожидаемый результат**:
    - Статус ответа: `422 Unprocessable Entity`
    - Ответ содержит сообщения об ошибках валидации, указывающие на отсутствующие обязательные поля.

### 4. `GetProductByIdTest`

- **Описание**: Проверяет, что метод получения продукта по его уникальному ID работает корректно.
- **Ожидаемый результат**:
    - Статус ответа: `200 OK`
    - Ответ содержит данные продукта, соответствующие указанному ID.
