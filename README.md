<img width="200" height="200" src="https://upload.wikimedia.org/wikipedia/commons/7/72/Gulp.js_Logo.svg">

## Gulp стартова збірка для Wordpress
### Що є в збірці:

- компілятор для препроцесора scss/sass;
- мініфікація готового css;
- автопрефіксер;
- імпорт одних файлів в інші, що дозволяє збирати html з модулів;
- конвертація шрифтів з ttf в woff та woff2;
- автоматичне формування та підключення @font-face;
- для живого оновлення сторінок - browsersync;
- стиснення зображень;
- створення svg-спрайтів та конвертація svg в background-image;
- конвертація растрових зображень у webp;
- базове налаштування для Wordpress;
- Структура php файлів з прикладами;
- вивантаження на FTP сервер;
- зібрати ZIP архів.

# Налаштування:
bash
Copy code
# Встановити залежності:
npm i

# Запустити збірник (http://localhost:3000/)
npm run dev або gulp

# Зібрати проект
npm run build

# Конвертувати otf, ttf в woff, woff2
npm run fonts
Структура:
Development

dev/index.html - Головний HTML файл
dev/html/ - HTML компоненти
dev/styles/ - CSS/SCSS бібліотеки, компоненти, змінні, міксини, шрифти, стилі модулів, стилі сторінок
dev/img - Зображення
dev/js - Бібліотеки та скрипти
dev/fonts - Шрифти
Production

build/index.html - Головний HTML файл
build/css - CSS стилі
build/img - Зображення
build/js - Скрипти
build/fonts - Шрифти
Wordpress

functions.php - Підключення файлів functions-parts/, налаштування теми, додаткові функції, зміна параметрів
functions-parts/ajax/ - Файли з ajax, підключені в _ajax.php
functions-parts/super-filter/ - Функції для фільтра
functions-parts/_ajax.php - Основний файл з ajax запитами
functions-parts/_assets.php - Підключення стилів та скриптів
functions-parts/_breadcrumbs.php - Хлібні крихти
functions-parts/_custom-functions.php - Універсальні функції
functions-parts/_hooks.php - Хуки
functions-parts/_post-types-registration.php - Реєстрація пост тайпів
functions-parts/_taxonomies-registration.php - Реєстрація таксономій
functions-parts/Mobile_Detect.php - Визначення типу пристроїв
Імпорт:
HTML компоненти

js
Copy code
// Підключити компонент, передати значення
@@include('html/header.html',{
"title":"Головна"
})

//Отримати значення в компоненті html/header.html
@@title
Інлайнові SVG

js
Copy code
// Вставити інлайновий svg в html, не загромаджуючи код.
@@include('img/example.svg')
CSS файли

scss
Copy code
@import "modules/example";
JS файли

js
Copy code
// Підключити файл, виконати функцію
import * as functions from "./modules/functions.js";
functions.isWebp();

// Підключити бібліотеку
import Swiper, { Navigation, Pagination } from "swiper";
const swiper = new Swiper();
Правила роботи
При роботі з змінними та міксинами в модулях стилів для компіляції необхідно підключати @import "../core";

Для автоматичного підключення шрифтів з папки dev/fonts написання в імені файлу повинні бути розділені через слеш (наприклад, Golos-bold.ttf, Golos-regular.ttf), при запуску gulp в папці dev/styles/partials/ буде згенеровано fonts.scss, якщо файл вже існує, для оновлення потрібно його видалити.

У функції @@include є особливий режим @@loop, який приймає другим аргументом масив об'єктів і повторює елемент стільки разів, скільки об'єктів є в масиві. Тобто можна створити, наприклад, слайдер з різними зображеннями, подавши функції @@loop масив шляхів до зображень. ВАЖЛИВЕ ОБМЕЖЕННЯ! loop не працює всередині include - тільки в кореневих файлах.

Намагайтеся розділяти свій код на якомога більше компонентів. Так вам буде зручніше розробляти свої проекти. У директорії modules можна створювати вкладені директорії, в яких зберігати шаблони окремого компонента (наприклад, слайдера).

Налаштування проекту
У файлі dev/styles/partials/_vars.scss вкажіть параметри з макета. При розробці використовуйте змінні та додавайте нові, всі дубльовані значення повинні бути записані тут.

Основні кольори

css
Copy code
$bgColor: #fff;
$bttnColor: rgb(53, 179, 55);
$bttnSecondColor: rgb(210, 59, 59);
$mainColor: #000;
Параметри адаптивної сітки

perl
Copy code
$minWidth: 320; // Мінімальна ширина сторінки
$maxWidth: 1920; // Ширина макета
$maxWidthContainerWide: 1400; // Ширина обмежуючого додаткового контейнера (0 = немає обмеження)
$maxWidthContainer: 1170; // Ширина обмежуючого контейнера (0 = немає обмеження)
$containerPadding: 30; // Відступ у контейнера (30 = по 15px зліва і справа)
$containerWidth: $maxWidthContainer + $containerPadding; // Ширина спрацьовування брейкпоінта при повному розмірі контейнера
$gridPadding: 50; // Відступ між блоками в сітці grid-*
Брейкпоінти

Використовуйте готові змінні в медіа-запитах

bash
Copy code
$uhd: 2160px;
$fhd: 1900px;
$lg: 1400px;
$pc: $containerWidth+px;
$sm-pc: 992px;
$tablet: 768px;
$mob: 576px;
$i5: 320px;
Міксини
Для роботи з медіа-запитами

В параметр передаємо брейкпоінт потрібного розміру з файлу _vars

less
Copy code
@mixin minw($breakpoint) {...}
less
Copy code
@mixin maxw($breakpoint) {...}
less
Copy code
@mixin minh($breakpoint) {...}
less
Copy code
@mixin maxh($breakpoint) {...}
На виході отримуємо:

scss
Copy code
@media only screen and(min-width: $breakpoint) {
   // styles
}
Адаптивна властивість

При розмірі екрану менше ширини контейнера вказана властивість буде плавно зменшуватися від стартового розміру (який беремо з макета 1920) до мінімального розміру (з макета моб), тим самим отримуємо чудове відображення на проміжних екранах

@include adaptiv-value(property, startSize, minSize, type);

В параметр задаємо будь-яку css властивість, яка буде динамічно адаптуватися від стартового розміру до мінімального padding, margin, font-size ...

Метод роботи (type):
1 - Тільки якщо менше контейнера
2 - Тільки якщо більше контейнера
3 - Завжди

В результаті отримуємо довге обчислення:
$property: calc($minSize + px + $addSize * ((100vw - 375px) / $maxWidth - 375));

Сніпети
Зібрав найуживаніші фрагменти коду, з якими можна значно прискорити процес розробки. <a href="https://gist.github.com/undefzahar/03f92157b474bdace55033bfe4c9a614" target="_blank">Завантажити</a>

Медіа-запити

_Працюють на основі










### Настройка:

```bash
# Установить зависимости:
npm i

# Запустить сборщик (http://localhost:3000/)
npm run dev или gulp

# Собрать проект
npm run build

# Конвертировать otf, ttf в woff, woff2
npm run fonts

```

## Структура:

**Development**

- `dev/index.html` - Главный HTML файл
- `dev/html/` - HTML компоненты
- `dev/styles/` - CSS/SCSS библиотеки, компоненты, переменные, миксины, шрифты, стили модулей, стили страниц
- `dev/img` - Изображения
- `dev/js` - Библиотеки и скрипты
- `dev/fonts` - Шрифты

**Production**

- `build/index.html` - Главный HTML файл
- `build/css` - CSS стили
- `build/img` - Изображения
- `build/js` - Скрипты
- `build/fonts` - Шрифты

**Wordpress**

- `functions.php` - Подключение файлов functions-parts/, настройка темы, дополнительные функции, изменение параметров
- `functions-parts/ajax/` - Файлы с ajax подключаемые в \_ajax.php
- `functions-parts/super-filter/` - Функции для фильтра
- `functions-parts/_ajax.php` - Основной файл с ajax запросами
- `functions-parts/_assets.php` - Подключение стилей и скриптов
- `functions-parts/_breadcrumbs.php` - Хлебные крошки
- `functions-parts/_custom-functions.php` - Универсальные функции
- `functions-parts/_hooks.php` - Хуки
- `functions-parts/_post-types-registration.php` - Регистрация пост тайпов
- `functions-parts/_taxonomies-registration.php` - Регистрация таксономий
- `functions-parts/Mobile_Detect.php` - Определение типа устройств

## Импорт:

**HTML компоненты**

```js
// Подключить компонент, передать значение
@@include('html/header.html',{
"title":"Главная"
})

//Получить значение в компоненте html/header.html
@@title
```

**Инлайновые SVG**

```js
// вставить инлайновый svg в html, не загромождая код.
@@include('img/example.svg')
```

**CSS файлы**

```scss
@import "modules/example";
```

**JS файлы**

```js
// Подключить файл, выполнить функцию
import * as functions from "./modules/functions.js";
functions.isWebp();

// Подключить библиотеку
import Swiper, { Navigation, Pagination } from "swiper";
const swiper = new Swiper();
```

## Правила работы

При работе из переменными и миксинами в модулях стилей для компиляции необходимо подключать @import "../core";

Для автоматического подключения шрифтов из папки dev/fonts начертания в имени файла должны быть разделены через слеш (например, Golos-bold.ttf, Golos-regular.ttf), при запуске gulp в папке dev/styles/partials/ сгенерируется fonts.scss, если файл уже существует, для обновления нужно его удалить.

В функции @@include есть особый режим @@loop, который принимает вторым аргументом массив объектов и повторяет элемент столько раз, сколько объектов есть в массиве. То есть можно создать, например, слайдер с разными картинками, скормив функции @@loop массив путей к картинкам. ВАЖНОЕ ОГРАНИЧЕНИЕ! loop не работает внутри includ'а - только в корневых файлах.

Старайтесь дробить свой код на как можно большее количество компонентов. Так вам будет удобнее разрабатывать свои проекты. В директории modules можно создавать вложенные директории, в которых хранить шаблоны отдельного компонента (например, слайдера).

## Настройка проекта

В файле `dev/styles/partials/_vars.scss` укажите параметры с макета. При разработке используйте переменные и добавляйте новые, все дублирующие значения должны быть записаны здесь.

**Основные цвета**

```
$bgColor: #fff;
$bttnColor: rgb(53, 179, 55);
$bttnSecondColor: rgb(210, 59, 59);
$mainColor: #000;
```

**Параметры адаптивной сетки**

```
$minWidth: 320; // Минимальная ширина страницы
$maxWidth: 1920; // Ширина макета
$maxWidthContainerWide: 1400; // Ширина ограничивающего дополнительного контейнера (0 = нет ограничения)
$maxWidthContainer: 1170; // Ширина ограничивающего контейнера (0 = нет ограничения)
$containerPadding: 30; // Отступ у контейнера (30 = по 15px слева и справа)
$containerWidth: $maxWidthContainer + $containerPadding; // Ширина срабатывания брейкпоинта при полном размере контейнера
$gridPadding: 50; // Отступ между блоками в сетке grid-*
```

**Брейкпоинты**

Используйте готовые переменные в медиа запросах

```
$uhd: 2160px;
$fhd: 1900px;
$lg: 1400px;
$pc: $containerWidth+px;
$sm-pc: 992px;
$tablet: 768px;
$mob: 576px;
$i5: 320px;
```

## Миксины

**Для работы с медиа запросами**

В параметр передаем брейкпоинт необходимого размера с файла `_vars`

```
@mixin minw($breakpoint) {...}
```

```
@mixin maxw($breakpoint) {...}
```

```
@mixin minh($breakpoint) {...}
```

```
@mixin maxh($breakpoint) {...}
```

На выходе получаем:

```
@media only screen and(min-width: $breakpoint) {
   // styles
}
```

**Адаптивное свойство**

При размере экрана меньше ширины контейнера указанное свойство будет плавно уменьшаться от стартового размера (который берем с макета 1920) до минимального размера (с макета моб), тем самым получаем отличное отображение на промежуточных экранах

`@include adaptiv-value(property, startSize, minSize, type);`

В параметр задаем любое css свойство которое будет динамически адаптироваться от стартового размера до минимального `padding, margin, font-size` ...

Метод работы (type):
1 - Только если меньше контейнера
2 - Только если больше контейнера
3 - Всегда

В результате получаем длинное вычисление:
`$property: calc($minSize + px + $addSize * ((100vw - 375px) / $maxWidth - 375));`

## Сниппеты

Собрал самые используемые фрагменты кода с которыми можно значительно ускорить процесс разработки. <a href="https://gist.github.com/undefzahar/03f92157b474bdace55033bfe4c9a614" target="_blank">Скачать</a>

**Медиа запросы**

_Работают на основе миксинов, а в параметр передаем брейкпоинты с файла `_vars`_

`@minw` - Минимальная ширина
`@maxw` - Максимальная ширина
`@minh` - Минимальная высота
`@maxh` - Максимальная высота

**Адаптивное свойство**

_Работает на основе миксина_

`adaptiv-value` - Передаем (property, startSize, minSize, type)

**Прочее**
`rem` - `rem()` конвертация px в rem
`.log` - `console.log();`
`php` - `<?php ?>`
`xml` - `<?xml version="1.0" encoding="utf-8" ?>` код в начале svg
`transition` - `transition: .2s ease-in-out;`

**WP плагин ACF**
Coming soon

## Стартовые компоненты и классы

**Header**
Адаптированная шапка с анимированным мобильным меню

**Footer**
Подвал с готовым прилипанием к низу, если не заполнен контент

**Классы**

Прописывать класс для тегов `<a></a>` и `<button></button>`

- `bttn` - Кнопка
- `bttn-border` - Прозрачная кнопка с границей
- `bttn-white` - Белая кнопка
- `bttn-loading` - Кнопка с анимацией загрузки (авто анимация для форм на основе плагина Contact Form 7)
- `bttn с атрибутом disabled` - Кнопка активная кнопка
- `bttn bttn--red` - Кнопка с модификатором

Сетка, работает на основе flexbox, прописывать для контейнера внутри которого лежат элементы. В переменной `$gridPadding` которая находиться внутри файла `_vars` можно изменить отступ между элементами.

- `grid-2` - Выровнять элементы в 2 колонки
- `grid-3` - Выровнять элементы в 3 колонки
- `grid-4` - Выровнять элементы в 4 колонки

## Настройки для Wordpress

#### functions.php

1. Подключение файлов из functions-parts/
   - `Mobile_Detect` - функция определения типа устройства
   - `_assets` - подключение стилей и скриптов
   - `_post-types-registration` - регистрация пост тайпов
   - `_taxonomies-registration` - регистрация таксономий
   - `_breadcrumbs` - настройка хлебных крошек
   - `_ajax` - общий файл аякс запросов, подключение с директории ajax/
   - `_hooks` - различные хуки
   - `_custom-functions` - универсальные функции
2. Удаление "мусора"
   2.1 Отключение емодзи в WordPress (Скрипт создает дополнительный HTTP-запрос, который увеличивает общее время загрузки страницы и замедляет работу вашего сайта)
   2.2 Удаление глобальных встроенных стилей WP
   2.3 Удаление фильтра render_block, добавляющий лишнее
   2.4 Отменить регистрацию стилей CF7 и Gutenberg
3. Удаление пунктов меню в админке
4. Поддержка SVG
5. Регистрация
   5.1 Регистрация меню
   5.2 Регистрация обложки для постов/страниц
   5.3 Кастомное WP меню
   5.4 Регистрация нового размера изображений
6. Стилизация админ-панели
   6.1 Добавить CSS стили
   6.2 Добавить Фавикон
   6.3 Изменение текста в подвале
   6.4 Изменение внутреннего логотипа
   6.5 Меняем логотип, его ссылку и title атрибут на странице входа
   6.6 Изменение ссылки в логотипе
   6.7 Изменяем атрибут title у ссылки логотипа
7. Редирект
   7.1 Редирект из url верхнего регистра в url нижнего регистра
8. Безопасность
   8.1 Полное Удаление версии WP
   8.2 Удаление параметра ver в добавляемых скриптах и стилях
   8.3 Авто удаление файлов license.txt и readme.html
   8.4 Зашифровать логин и пароль во время передачи их серверу
   8.5 SSL в админской части сайта
   8.6 Отключить вывод ошибок на странице авторизации
   8.7 Отключить возможность редактировать файлы в админке для тем, плагинов
   8.8 Закрыть возможность публикации через xmlrpc.php
