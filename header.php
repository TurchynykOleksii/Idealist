<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idealist</title>
    <link rel="Shortcut Icon" type="image/x-icon"
        href="<?php echo get_template_directory_uri(); ?>/build/img/icons/favicon.ico" />
    <link rel="Shortcut Icon" type="image/x-icon"
        href="<?php echo get_template_directory_uri(); ?>/build/css/style.css" />
    <link rel="Shortcut Icon" type="image/x-icon"
        href="<?php echo get_template_directory_uri(); ?>/build/css/libs/swiper.css" />

    <?php wp_head();
    $ID = get_the_ID();?>

</head>

<body <?php body_class();?>>

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
                        <?php wp_nav_menu(array(
                            'theme_location' => 'header_menu',
                            'menu' => 'header_new_spi',
                            'container' => 'ul',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'header__list',
                            'menu_id' => 'header__list',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 0,
                            'walker' => '',
                        ));?>
                    </nav>
                    <?php if($switchLangView = get_field('view_hide','option')):?>
                    <div class="header__lang-switch">
                        <?php if($ukrLang = get_field('header_ukr','option')):?>
                        <a href="<?= $ukrLang['url']?>"
                            class="header__ukr <?= in_array('home', get_body_class()) ? 'active__lang' : ''; ?>"><?= $ukrLang['title']?></a>
                        <?php endif; ?>
                        <span>/</span>
                        <?php if($engLang = get_field('header_eng','option')):?>
                        <a href="<?= $engLang['url']?>"
                            class="header__eng <?= !in_array('home', get_body_class()) ? 'active__lang' : '';?>"><?= $engLang['title']?></a>
                        <?php endif; ?>
                    </div>
                    <?php endif;?>

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
                            <h1  class="banner__title-left text"><?= get_post_meta($ID,'title_left',true)?></h1>
                            <p class="banner__subtitle-left"><?= get_post_meta($ID,'left_subtitle',true)?></p>
                            <a href="https://www.google.com/maps/place/IDEALIST%7C+%D0%90%D0%B4%D0%B2%D0%BE%D0%BA%D0%B0%D1%82%D1%81%D1%8C%D0%BA%D0%B5+%D0%BE%D0%B1'%D1%94%D0%B4%D0%BD%D0%B0%D0%BD%D0%BD%D1%8F+%22%D0%86%D0%94%D0%95%D0%90%D0%9B%D0%86%D0%A1%D0%A2%22/@49.8291844,24.0127997,17z/data=!4m8!3m7!1s0x473add8ea9f6df9f:0x1cac574b49d779ee!8m2!3d49.8291844!4d24.0127997!9m1!1b1!16s%2Fg%2F11spn32svr?entry=ttu&g_ep=EgoyMDI0MDkwOS4wIKXMDSoASAFQAw%3D%3D"
                                class="banner__rating">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/google-ic.svg"
                                    alt="google images">
                                <div class="banner__rating-info">
                                    <p class="banner__rating-text">Оцінка: 4,9</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/stars.svg"
                                        alt="rating stars">
                                </div>
                            </a>
                        </div>
                        <div class="banner__info-right">
                            <div class="banner__info-wrap">
                                <h2 class="banner__title-right "><?= get_post_meta($ID,'title_right',true)?></h2>
                                <p class="banner__subtitle-right"><?= get_post_meta($ID,'right_subtitle',true)?></p>
                            </div>
                            <a href="<?= get_post_meta($ID,'google_link',true)['url'];?>" class="banner__rating-mob">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/icon-google-mob.svg"
                                    alt="google images">
                                <div class="banner__rating-info-mob">
                                    <p class="banner__rating-text-mob">
                                        <?= get_post_meta($ID,'google_link',true)['title'];?></p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/stars.svg"
                                        alt="rating stars">
                                </div>
                            </a>
                            <button class="banner__btn"><?= get_post_meta($ID,'banner_btn',true);?></button>
                        </div>
                    </div>
                    <div class="banner__company">
                        <p class="banner__slogan"><?= get_post_meta($ID,'banner_slogan',true);?></p>
                        <ul class="banner__list">
                            <?php $banner_list = get_post_meta($ID,"banner_company",true); 
                            for($i=0; $i<$banner_list; $i++):
                            $banner_icn = get_post_meta($ID,"banner_company_" . $i .'_banner_logo',true);
                            $banner_url = get_post_meta($ID,"banner_company_" . $i .'_banner_url',true);?>
                            <li class="banner__item">
                                <a href="<?= $banner_url['url']; ?>">
                                    <?=wp_get_attachment_image( $banner_icn, 'full'); ?></a>
                            </li>
                            <?php endfor;?>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <main class="main">