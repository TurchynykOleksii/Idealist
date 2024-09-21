</main>
<?php $IDS = get_the_ID()?>
<footer class="footer" id="contacts">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__menus">
                <ul class="footer__social">
                    <li class="footer__item">
                        <a href="#">Instagram</a>
                    </li>
                    <li class="footer__item">
                        <a href="#">Telegram</a>
                    </li>
                    <li class="footer__item">
                        <a href="#">LinkedIn</a>
                    </li>
                </ul>
                <a href="/" class="footer__logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/logo.svg" alt="idealist logo">
                </a>
                <?php wp_nav_menu(array(
                            'theme_location' => 'footer_menu',
                            'menu' => 'header_new_spi',
                            'container' => 'ul',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'footer__menu',
                            'menu_id' => 'footer__menu',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 0,
                            'walker' => '',
                        ));?>
            </div>
            <div class="footer__info">
                <ul class="footer__adress">
                    <?php if($mobileNumber = get_field('mobile_number', 'option')):?>
                    <li class="footer__adress-item">
                        <a href="<?= esc_url($mobileNumber['url']); ?>" target="_blank">
                            <?= esc_html($mobileNumber['title']); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if($adress = get_field('address', 'option')):?>
                    <li class="footer__adress-item">
                        <a href="<?= esc_url($adress['url']); ?>" target="_blank">
                            <?= esc_html($adress['title']); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if($email = get_field('email', 'option')):?>
                    <li class="footer__adress-item">
                        <a href="<?= esc_url($email['url']); ?>" target="_blank">
                            <?= esc_html($email['title']); ?></a>
                    </li>
                    <?php endif; ?>
                    <li class="footer__adress-item hide__pc">
                        <?php $instagramLink = get_field('instagram_link', 'option');?>
                        <a href="<?= $instagramLink['url'];?>"><?= $instagramLink['title'];?></a>
                    </li>
                    <li class="footer__adress-item hide__pc">
                        <?php $telegramLink = get_field('telegram_link', 'option');?>
                        <a href="<?= $telegramLink['url'];?>"><?= $telegramLink['title'];?></a>
                    </li>
                    <li class="footer__adress-item hide__pc">
                        <?php $linkedinLink = get_field('linkedin-link', 'option');?>
                        <a href="<?= $linkedinLink['url'];?>"><?= $linkedinLink['title'];?></a>
                    </li>
                </ul>
                <button class="footer__btn">Записатись на консультацію</button>
            </div>
            <ul class="footer__slogan">
                <li class="footer__slogan-item">
                    <p>DON` T</p>
                    <div class="footer__slogan-img footer__slogan-img-first"><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer1.jpg"
                            alt="slogan img">
                    </div>
                    <p> WORRY</p>
                </li>
                <li class="footer__slogan-item">
                    <div class="footer__slogan-img footer__slogan-img-second"><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer2.jpg"
                            alt="slogan img">

                    </div>
                    <p>WE`LL DEAL </p>
                    <div class="footer__slogan-img footer__slogan-img-second-two"><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer2-2.jpg"
                            alt="slogan img">

                    </div>
                </li>
                <li class="footer__slogan-item">
                    <div class="footer__slogan-img footer__slogan-img-third"><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer3.jpg"
                            alt="slogan img">

                    </div>
                    <p>WITH THIS</p>

                </li>
            </ul>
            <div class="footer__copy">
                <?php if($footerPolicy = get_post_meta($IDS,'footer_policy',true)):?>
                <p class="footer__policy"><?= $footerPolicy; ?></p>
                <?php endif; 
                 if($linkBy = get_post_meta($IDS,'footer_by',true)):?>
                <p class="footer__by">Design by <a href="<?= $linkBy['url']; ?>"><?= $linkBy['title']; ?></a></p>
                <?php endif; 
                if($btnUp = get_post_meta($IDS,'footer_up',true)):?>
                <a href="<?= $btnUp['url']; ?>" class="footer__up"><?= $btnUp['title']; ?></a>
                <?php endif; ?>
            </div>
            <div class="mobile__menu hide__menu">
                <?php wp_nav_menu(array(
                            'theme_location' => 'footer_menu',
                            'menu' => 'header_new_spi',
                            'container' => 'ul',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'mobile__nav',
                            'menu_id' => 'mobile__nav',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 0,
                            'walker' => '',
                        ));?>
                <?php if($switchLangView = get_field('view_hide','option')):?>
                <div class="mobile__lang-switch">
                    <?php if($ukrLang = get_field('header_ukr','option')):?>
                    <a href="<?= $ukrLang['url']?>"
                        class="mobile__ukr <?= in_array('home', get_body_class()) ? 'active__lang' : ''; ?>"><?= $ukrLang['title']?></a>
                    <?php endif; ?>
                    <span>/</span>
                    <?php if($engLang = get_field('header_eng','option')):?>
                    <a href="<?= $engLang['url']?>"
                        class="mobile__eng <?= !in_array('home', get_body_class()) ? 'active__lang' : '';?>"><?= $engLang['title']?></a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <ul class="mobile__social">
                    <?php if($instagramLink = get_field('instagram_link', 'option')):?>
                    <li class="mobile__social-item">
                        <a href="<?= esc_url($instagramLink['url']); ?>" target="_blank">
                            <?= esc_html($instagramLink['title']); ?></a>
                    </li>
                    <?php endif;
                    if($telegramLink = get_field('telegram_link', 'option')):?>
                    <li class="mobile__social-item">
                        <a href="<?= esc_url($telegramLink['url']); ?>" target="_blank">
                            <?= esc_html($telegramLink['title']); ?></a>
                    </li>
                    <?php endif;
                     if($linkedinLink = get_field('linkedin-link', 'option')):?>
                    <li class="mobile__social-item">
                        <a href="<?= esc_url($linkedinLink['url']); ?>" target="_blank">
                            <?= esc_html($linkedinLink['title']); ?>
                        </a>
                    </li>
                    <?php endif;?>
                </ul>
                <ul class="footer__slogan mobile__slogan">
                    <li class="footer__slogan-item">
                        <p>DON` T</p>
                        <div class="footer__slogan-img footer__slogan-img-first"><img
                                src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer1.jpg"
                                alt="slogan img">

                        </div>
                        <p> WORRY</p>
                    </li>
                    <li class="footer__slogan-item">
                        <div class="footer__slogan-img footer__slogan-img-second"><img
                                src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer2.jpg"
                                alt="slogan img">

                        </div>
                        <p>WE`LL DEAL </p>
                        <div class="footer__slogan-img footer__slogan-img-second-two"><img
                                src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer2-2.jpg"
                                alt="slogan img">

                        </div>
                    </li>
                    <li class="footer__slogan-item">
                        <div class="footer__slogan-img footer__slogan-img-third"><img
                                src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer3.jpg"
                                alt="slogan img">

                        </div>
                        <p>WITH THIS</p>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="overlay overlay__hide">
    <div class="poppup poppup__hide">
        <div class="poppup__wrap">
            <button class="poppup__close">
                <svg class="poppup__close-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30 10L10 30" stroke="black" stroke-width="4" stroke-linecap="square"
                        stroke-linejoin="round" />
                    <path d="M10 10L30 30" stroke="black" stroke-width="4" stroke-linecap="square"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="poppup__header">
                <div class="poppup__header-wrap">
                    <h6 class="poppup__title">Привіт</h6>
                    <p class="poppup__slogan">Ми раді допомогти вам з юридичними питаннями</p>
                    <p class="poppup__text">Ця форма запису створена, щоб ви могли швидко залишити запит на
                        консультацію
                    </p>
                    <div class="details">
                        <div class="details__wrap">
                            <p class="details__hours"><strong>Тривалість</strong> до 1 години</p>
                            <div class="details__hover-text"><svg class="details__close-icon" viewBox="0 0 40 40"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30 10L10 30" stroke="black" stroke-width="4" stroke-linecap="square"
                                        stroke-linejoin="round" />
                                    <path d="M10 10L30 30" stroke="black" stroke-width="4" stroke-linecap="square"
                                        stroke-linejoin="round" />
                                </svg>Ми за чесність. Якщо у поцесі з’ясування запиту для
                                консультації, ми зясуємо, що не можемо вам допомогти, ми не проводимо консультацію і
                                не
                                подаємо марних надій.</div>
                        </div>
                        <div class="details__wrap">
                            <p class="details__coasts"><strong>Вартість</strong> 2000 грн</p>
                            <div class="details__hover-text"><svg class="details__close-icon" viewBox="0 0 40 40"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30 10L10 30" stroke="black" stroke-width="4" stroke-linecap="square"
                                        stroke-linejoin="round" />
                                    <path d="M10 10L30 30" stroke="black" stroke-width="4" stroke-linecap="square"
                                        stroke-linejoin="round" />
                                </svg>Якщо у вас виникнуть додаткові запитання, ми продовжимо
                                консультацію та надамо відповіді на всі ваші запитання</div>
                        </div>
                    </div>
                </div>
                <div class="schedule">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 22.5C17.5228 22.5 22 18.0228 22 12.5C22 6.97715 17.5228 2.5 12 2.5C6.47715 2.5 2 6.97715 2 12.5C2 18.0228 6.47715 22.5 12 22.5Z"
                            stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 6.5V12.5L16 14.5" stroke="black" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <p>пн - пт / 10.00 - 18.00 / (GMT+3)</p>
                </div>
            </div>
            <div class="poppup__content">
                <p class="poppup__content-title">Оберіть</p>
                <?php echo  do_shortcode( '[contact-form-7 id="6040091" title="poppup form"]' )?>
                <!-- <form class="poppup__form">
                    <div class="poppup__group poppup__service">
                        <label class="poppup__group-title poppup__service-service"><span>Послугу</span><svg
                                class="poppup__rotate" width="14" height="9" viewBox="0 0 14 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.5L7 7.5L13 1.5" stroke="black" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg></label>
                        <div class="poppup__form-service">
                            <div class="options">
                                <label for="service1"><input checked type="radio" name="service" id="service1">
                                    <span>Юридичний супровід бізнесу</span></label>
                                <label for="service2"><input type="radio" name="service" id="service2">
                                    <span>Захист / супровід партнерства</span></label>
                                <label for="service3"><input type="radio" name="service" id="service3">
                                    <span>Захист майна власника бізнесу</span></label>
                                <label for="service4"><input type="radio" name="service" id="service4">
                                    <span>Захист шлюбних відносин власника бізнесу</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="poppup__group poppup__format">
                        <label class="poppup__group-title poppup__service-format"><span>Формат</span><svg
                                class="poppup__rotate" width="14" height="9" viewBox="0 0 14 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.5L7 7.5L13 1.5" stroke="black" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg></label>
                        <div class="poppup__form-format">
                            <div class="options">
                                <label for="format1"><input checked type="radio" name="format" id="format1">
                                    <span>Offline / <span class="poppup__grey-text">Львів, вул. Академіка Андрія
                                            Сахарова, 42, офіс
                                            414</span></span></label>
                                <label for="format2"><input type="radio" name="format" id="format2">
                                    <span>Online / <span class="poppup__grey-text">Доступний вам спосіб
                                            зв'язку</span></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="poppup__group">
                        <label class="poppup__group-title">
                            <input class="form__input-name" required type="text" placeholder="Ваше Ім’я"></label>
                        <div class="poppup__errors"><span class="poppup__name-error">Обов’язкове поле для
                                заповнення!</span></div>
                    </div>
                    <div class="poppup__group">
                        <label class="poppup__group-title">
                            <input class="form__input-tel" required type="text" placeholder="Номер телефону"></label>
                        <div class="poppup__errors"><span class="poppup__tel-error">Введіть у форматі +КОД_КРАЇНИ
                                XXXXXXXXXX</span></div>
                    </div>
                    <div class="poppup__group">
                        <label class="poppup__group-title">
                            <input class="form__input-mail" required type="email" placeholder="Email"></label>
                        <div class="poppup__errors"><span class="poppup__mail-error">Введіть коректну електронну поштову
                                адресу</span></div>

                    </div>
                    <div class="poppup__group poppup__textarea">
                        <label class="poppup__group-title"><span class="poppup__textarea-title">Коротко опишіть ваш
                                запит</span>
                            <textarea
                                placeholder="в юридичному світі особливу роль відіграють дрібниці та уточнення"></textarea></label>
                    </div>
                    <div class="poppup__group poppup__submit">
                        <div class="poppup__btn-submit">
                            <input type="submit" value="Записатись на консультацію">
                        </div>
                    </div>
                </form> -->
            </div>
        </div>

    </div>
    <div class="thank__poppup poppup__hide">
        <div class="thank__poppup-wrap">
            <button class="thank__poppup-close">
                <svg class="poppup__close-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30 10L10 30" stroke="black" stroke-width="4" stroke-linecap="square"
                        stroke-linejoin="round" />
                    <path d="M10 10L30 30" stroke="black" stroke-width="4" stroke-linecap="square"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <h6 class="thank__title">Успішно</h6>
            <div class="thank__content">
                <p>Най ближчим часом ми зв’яжемось з вами, щоб обрати зручний час консультації
                </p>
                <p>Всі деталі відправимо на пошту, яку ви вказали у формі</p>
            </div>
            <div class="details">
                <p class="details__hours"><strong>Тривалість</strong> до 1 години</p>
                <p class="details__coasts"><strong>Вартість</strong> 2000 грн</p>
            </div>
            <div class="thank__schedule">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 22.5C17.5228 22.5 22 18.0228 22 12.5C22 6.97715 17.5228 2.5 12 2.5C6.47715 2.5 2 6.97715 2 12.5C2 18.0228 6.47715 22.5 12 22.5Z"
                        stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 6.5V12.5L16 14.5" stroke="black" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <p>пн - пт / 10.00 - 18.00 / (GMT+3)</p>
            </div>
        </div>
    </div>
</div>

<div class="preloader">
    <div class="container">
        <div class="preloader__wrap">
            <ul class="preloader__slogan mobile__slogan">
                <li class="preloader-item">
                    <p class="text">DON` T</p>
                    <div class="preloader-img preloader-img-first "><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer1.jpg"
                            alt="slogan img">

                    </div>
                    <p class="text"> WORRY</p>
                </li>
                <li class="preloader-item">
                    <div class="preloader-img preloader-img-second"><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer2.jpg"
                            alt="slogan img">

                    </div>
                    <p class="text">WE`LL DEAL </p>
                    <div class="preloader-img preloader-img-second-two"><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer2-2.jpg"
                            alt="slogan img">

                    </div>
                </li>
                <li class="preloader-item">
                    <div class="preloader-img preloader-img-third"><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/general/footer3.jpg"
                            alt="slogan img">

                    </div>
                    <p class="text">WITH THIS</p>

                </li>
            </ul>
            <div class="preloader__timer">00</div>
        </div>
    </div>
</div>


<script src="<?php echo get_template_directory_uri(); ?>/build/js/libs/split-tyme.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/build/js/libs/ScrollTrigger.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/build/js/libs/gsap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/build/js/libs/swiper-bundle.min.js"></script>


<?php wp_footer(); ?>
</body>

</html>