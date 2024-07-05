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
# Імпорт:
- HTML компоненти

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
// Вставити інлайновий svg в html, не загромаджуючи код.
@@include('img/example.svg')
CSS файли

scss
@import "modules/example";
JS файли

js
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


- @mixin minw($breakpoint) {...}

- @mixin maxw($breakpoint) {...}

- @mixin minh($breakpoint) {...}

- @mixin maxh($breakpoint) {...}
На виході отримуємо:


- @media only screen and(min-width: $breakpoint) {
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


### Налаштування:

```bash
# Встановити залежності:
npm i

# Запустити збірник (http://localhost:3000/)
npm run dev или gulp

# Зібрати проєкт
npm run build

# Конвертувати otf, ttf в woff, woff2
npm run fonts

```

## Структура:

**Development**

- `dev/index.html` - Головний HTML файл
- `dev/html/` - HTML компоненти
- `dev/styles/` - CSS/SCSS бібліотеки, компоненти, змінні, міксіни, шрифти, стилі модулів, стилі сторінок
- `dev/img` - Зображення
- `dev/js` - Бібліотеки та скрипти
- `dev/fonts` - Шрифти

**Production**

- `build/index.html` - Головний HTML файл
- `build/css` - CSS стилі
- `build/img` - Зображення
- `build/js` - Скрипти
- `build/fonts` - Шрифти

**Wordpress**

- `functions.php` - Підключення файлів functions-parts/, налаштування теми, додаткові функції, зміна параметрів
- `functions-parts/ajax/` - Файли с ajax підключенням в \_ajax.php
- `functions-parts/super-filter/` - Функції для фиіьтра
- `functions-parts/_ajax.php` - Основний файл с ajax запитами
- `functions-parts/_assets.php` - Підключення стилів та скриптів
- `functions-parts/_breadcrumbs.php` - Хлібні крихти
- `functions-parts/_custom-functions.php` - Універсальні функції
- `functions-parts/_hooks.php` - Хуки
- `functions-parts/_post-types-registration.php` - Реєстрація пост тайпів
- `functions-parts/_taxonomies-registration.php` - Реєстрація таксономій
- `functions-parts/Mobile_Detect.php` - Детект типу гаджета

## Імпорт:

**HTML компоненти**

```js
// Підключити компонент, передати значення
@@include('html/header.html',{
"title":"Головна"
})

//Отримати значення в компоненті html/header.html
@@title
```

**Інлайнові SVG**

```js
// вставити інлайновий svg в html, не мусоря в  коді.
@@include('img/example.svg')
```

**CSS файли**

```scss
@import "modules/example";
```

**JS файли**

```js
// Підключити файл, виконати функцію
import * as functions from "./modules/functions.js";
functions.isWebp();

// Підключити бібліотеку
import Swiper, { Navigation, Pagination } from "swiper";
const swiper = new Swiper();
```
