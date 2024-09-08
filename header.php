<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idealist</title>
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="img/icons/favicon.ico" />

    <link rel="stylesheet" href="css/libs/swiper.min.css">
    <?php wp_head();?>
</head>

<body>

    <!-- Add autoHide class to automatically hide the header on scroll -->
    <div class="header-banner">
        <header class="header">
            <div class="container">
                <div class="header__inner">
                    <a href="/" class="header__logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/logo.svg"
                            alt="лого Idealist">
                    </a>
                    <nav class="header__nav">
                        <ul class="header__list">
                            <li class="header__item"><a href="#services">Послуги</a></li>
                            <li class="header__item"><a href="#about">про нас </a></li>
                            <li class="header__item"><a href="#contacts">контакти</a></li>
                        </ul>
                    </nav>
                    <div class="header__lang-switch">
                        <span class="header__ukr">Укр</span>
                        <span>/</span>
                        <span class="header__eng">Eng</span>
                    </div>
                    <button class="header__burger-menu">
                        <svg class="mobile__burger-icon" width="32" height="32" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 16H28" stroke="#B6B6B6" stroke-width="2" stroke-linecap="square"
                                stroke-linejoin="round" />
                            <path d="M4 8H28" stroke="#B6B6B6" stroke-width="2" stroke-linecap="square"
                                stroke-linejoin="round" />
                            <path d="M4 24H28" stroke="#B6B6B6" stroke-width="2" stroke-linecap="square"
                                stroke-linejoin="round" />
                        </svg>
                        <svg class="mobile__corss-icon hide-icon" width="32" height="32" viewBox="0 0 32 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 8L24.9706 24.9706" stroke="#B6B6B6" stroke-width="2" stroke-linecap="square"
                                stroke-linejoin="round" />
                            <path d="M8 25L24.9706 8.02944" stroke="#B6B6B6" stroke-width="2" stroke-linecap="square"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>

        </header>
        <section class="banner">
            <div class="container">
                <div class="banner__inner">
                    <div class="banner__wrap">
                        <div class="banner__info-left">
                            <h1 class="banner__title-left">Юридичний захист</h1>
                            <p class="banner__subtitle-left">Гарантуємо спокій та впевненість у кожному рішенні</p>
                            <div class="banner__rating">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/google-ic.svg"
                                    alt="google images">
                                <div class="banner__rating-info">
                                    <p class="banner__rating-text">Оцінка: 4,9</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/stars.svg"
                                        alt="rating stars">
                                </div>
                            </div>
                        </div>
                        <div class="banner__info-right">
                            <div class="banner__info-wrap">
                                <h2 class="banner__title-right"><span>Власників</span> <span>бізнесу</span></h2>
                                <p class="banner__subtitle-right"><span class="banner__mob-s"></span><span>Ви
                                        будуєте</span> свій бізнес,
                                    а <span>ми захищаємо</span> Ваші інтереси</p>
                            </div>
                            <div class="banner__rating-mob">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/icon-google-mob.svg"
                                    alt="google images">
                                <div class="banner__rating-info-mob">
                                    <p class="banner__rating-text-mob">Оцінка: 4,9</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/stars.svg"
                                        alt="rating stars">
                                </div>
                            </div>
                            <button class="banner__btn">Записатись на консультацію</button>
                        </div>
                    </div>
                    <div class="banner__company">
                        <p class="banner__slogan">нам довіряють</p>
                        <ul class="banner__list">
                            <li class="banner__item">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/parallel.svg"
                                    alt="company icons">
                            </li>
                            <li class="banner__item">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/pbc.svg"
                                    alt="company icons">
                            </li>
                            <li class="banner__item">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/kykil.svg"
                                    alt="company icons">
                            </li>
                            <li class="banner__item">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/ercy.svg"
                                    alt="company icons">
                            </li>
                            <li class="banner__item">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/ngn.svg"
                                    alt="company icons">
                            </li>
                            <li class="banner__item">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/way.svg"
                                    alt="company icons">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <main class="main">