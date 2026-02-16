# PHP HTML Elements + Array Utils

Небольшой учебный проект на PHP 8.2 с двумя блоками задач:

- OOP-рендеринг HTML-элементов (`input`, `span`, `a`) с экранированием и форматированием чисел.
- Работа с массивами: трансформация структуры и сортировка (включая `counting sort`).

## Требования

- PHP `>= 8.2`
- Composer
- (Опционально) Docker + Docker Compose

## Установка

```bash
composer install
```

## Быстрый запуск

### Вариант 1: встроенный PHP-сервер

```bash
php -S localhost:8080 -t public
```

Откройте: `http://localhost:8080`

### Вариант 2: Docker

```bash
docker compose up --build
```

Откройте: `http://localhost:8080`

## Тесты

```bash
vendor/bin/phpunit
```

## CLI-команды

Точка входа: `bin/console.php`

```bash
php bin/console.php transform
php bin/console.php sort
```

Доступные команды:

- `transform` - преобразует массив формата `[{A,B,C}, ...]` в ассоциативный массив вида `B => C`.
- `sort` - сортирует массив целых чисел через `countingSort`.

## Примеры использования

### 1) Трансформация массива

```php
use App\Services\ArrayTransformer;

$transformer = new ArrayTransformer();

$data = [
    ['A' => 1, 'B' => 'x', 'C' => 'one'],
    ['A' => 2, 'B' => 'y', 'C' => 'two'],
];

$result = $transformer->transform($data);
// ['x' => 'one', 'y' => 'two']
```

### 2) Сортировка массива

```php
use App\Services\ArraySorter;

$sorter = new ArraySorter();

$result = $sorter->countingSort([5, 2, 9, 1, 0, 1024, 512]);
// [0, 1, 2, 5, 9, 512, 1024]
```

Важно: текущая реализация `countingSort` рассчитана на диапазон значений от `0` до `1024`.

### 3) HTML-элементы

```php
use App\Elements\InputText;
use App\Elements\InputNumber;
use App\Elements\SpanText;
use App\Elements\SpanNumber;
use App\Elements\Link;

$input = (new InputText('username', 'form-control', 'username', 'John'))
    ->setPlaceholder('Введите имя')
    ->setRequired();

echo $input->render();
// <input type="text" id="username" class="form-control" name="username" value="John" placeholder="Введите имя" required="required">

$price = new InputNumber('price', null, 'price', 1234.5);
echo $price->render();
// <input type="number" id="price" name="price" value="1,234.50">

echo (new SpanText(value: '<b>Hello</b>'))->render();
// <span>&lt;b&gt;Hello&lt;/b&gt;</span>

echo (new SpanNumber(value: 1000))->render();
// <span>1,000.00</span>

echo (new Link('https://example.com', text: 'Open'))->render();
// <a href="https://example.com">Open</a>
```

## Структура проекта

```text
.
|- bin/
|  `- console.php
|- docker/
|  `- php/Dockerfile
|- public/
|  `- index.php
|- src/
|  |- Core/
|  |  `- HtmlElement.php
|  |- Elements/
|  |  |- InputNumber.php
|  |  |- InputText.php
|  |  |- Link.php
|  |  |- SpanNumber.php
|  |  `- SpanText.php
|  |- Services/
|  |  |- ArraySorter.php
|  |  `- ArrayTransformer.php
|  `- Traits/
|     |- EditableTrait.php
|     `- NumberFormatTrait.php
`- tests/
   |- Elements/
   `- Services/
```

## Что проверяют тесты

- Корректный рендер HTML-элементов.
- Экранирование HTML-содержимого (`SpanText`, `Link`).
- Форматирование чисел (`InputNumber`, `SpanNumber`).
- Корректность трансформации массивов (`ArrayTransformer`).

## Лицензия

Проект учебный. Использование на ваше усмотрение.
