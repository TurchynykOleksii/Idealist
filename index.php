<?php get_header(); 
$IDS = get_the_ID();
?>

<section class="trust">
    <div class="container">
        <div class="trust__inner">
            <h3 class="banner__slogan"><?= get_post_meta($IDS,'banner_slogan',true);?></h3>
            <ul class="trust__list">
                <?php   $banner_list = get_post_meta($IDS,"banner_company",true); 

                        for($i=0; $i<$banner_list; $i++):
                        $banner_icn = get_post_meta($IDS,"banner_company_" . $i .'_banner_logo',true);
                        $banner_url = get_post_meta($IDS,"banner_company_" . $i .'_banner_url',true);?>
                <li class="trust__item">
                    <a href="<?= $banner_url['url']; ?>">
                        <?=wp_get_attachment_image( $banner_icn, 'full'); ?></a>
                </li>
                <?php endfor;?>
            </ul>
        </div>
    </div>
</section>
<section class="slogan">
    <div class="container">
        <div class="slogan__inner">
            <h6 class="hidden">Слоган</h6>
            <div class="slogan__text">
                <?= get_post_meta($IDS,'slogan_text',true);?>
            </div>
        </div>
    </div>
</section>


<section class="services" id="services">
    <div class="container">
        <div class="services__inner">
            <div class="services__left-wrap">
                <h6 class="services__title">
                    <span class="services__title-animation"><?= get_post_meta($IDS,'services_title',true);?></span>
                </h6>
                <p class="services__slogan">
                    <?= get_post_meta($IDS,'services__slogan',true);?>
                </p>
                <button class="services__btn">Записатись</button>
            </div>
            <div class="services__right-wrap">
                <ul class="services__areas-list">
                    <?php $serviceList = get_post_meta($IDS,'services_list',true);
                    for($i=0; $i<$serviceList; $i++):?>
                    <li class="services__area-item">
                        <div class="services__area-title">
                            <p><?= get_post_meta($IDS,'services_list_'.$i.'_services_title',true)?></p>
                            <?php if(get_post_meta($IDS,'services_list_'. $i .'_services_accordion',true) > 0):?>
                            <div class="services__icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/build/img/icons/accordion-arrow.svg"
                                    alt="">
                            </div>
                            <?php endif; ?>
                        </div>

                        <ul class="services__subareas-list">
                            <?php if($serviceSubarea = get_post_meta($IDS,'services_list_'. $i. '_services_subareas',true)):
                            for($j=0; $j<$serviceSubarea;$j++):?>
                            <li class="services__subarea-item">
                                <p class="services__subarea-title">
                                    <?= get_post_meta($IDS,'services_list_'. $i. '_services_subareas_'. $j. '_service_subtitle',true);?>
                                </p>
                            </li>
                            <?php endfor;
                                endif;?>
                        </ul>
                        <?php if($servicesAccordion = get_post_meta($IDS,'services_list_'. $i .'_services_accordion',true)):?>
                        <div class="services__accordion-item">
                            <ul class="services__accordion-list">
                                <?php for($k=0; $k<$servicesAccordion;$k++):?>
                                <li class="services__info-item">
                                    <p class="services__info-headline">
                                        <?= get_post_meta($IDS,'services_list_'. $i .'_services_accordion_' .$k.'_services_headline',true);?>
                                    </p>
                                    <ul class="services__info-list">
                                        <?php if($serviceListInfo = get_post_meta($IDS,'services_list_'.$i.'_services_accordion_'.$k.'_services_lists', true)) ;
                                    for($l=0;$l<$serviceListInfo;$l++):?>

                                        <li><?= get_post_meta($IDS,'services_list_'.$i.'_services_accordion_'.$k.'_services_lists_'.$l.'_services_info', true)?>
                                        </li>
                                        <?php endfor;?>
                                    </ul>
                                </li>
                                <?php endfor;?>
                            </ul>

                        </div>
                        <?php endif;?>
                    </li>
                    <?php endfor; ?>
                </ul>
                <button class="services__btn-mob">Записатись</button>
            </div>
        </div>
    </div>
</section>
<section class="about" id="about">
    <div class="container">
        <div class="about__inner">
            <div class="about__left">
                <?php if($aboutTitle = get_post_meta($IDS,'about_title',true)):?>
                <h6 class="about__title">
                    <span class="about__title-animation"><?= $aboutTitle; ?></span>
                </h6>
                <?php endif;
                 if($aboutSubtext = get_post_meta($IDS,'about_subtext',true)):?>
                <p class="about__subtext">
                    Забудь про складні процедури та приховані умови — ми завжди на твоєму
                    боці
                </p>
                <?php endif;?>
                <ul class="about__social desc">
                    <?php if($instagramLink = get_field('instagram_link', 'option')):?>
                    <li class="about__social-item">
                        <a href="<?= esc_url($instagramLink['url']); ?>" target="_blank">
                            <?= esc_html($instagramLink['title']); ?></a>
                    </li>
                    <?php endif;
                    if($telegramLink = get_field('telegram_link', 'option')):?>
                    <li class="about__social-item">
                        <a href="<?= esc_url($telegramLink['url']); ?>" target="_blank">
                            <?= esc_html($telegramLink['title']); ?></a>
                    </li>
                    <?php endif;
                     if($linkedinLink = get_field('linkedin-link', 'option')):?>
                    <li class="about__social-item">
                        <a href="<?= esc_url($linkedinLink['url']); ?>" target="_blank">
                            <?= esc_html($linkedinLink['title']); ?>
                        </a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>

            <div class="about__right">
                <?php if($aboutInfo = get_post_meta($IDS,'about_info',true)):
                    echo $aboutInfo;
                endif;?>
                <div class="about__anim-line desc"></div>
                <div class="about__consult">
                    <h6 class="about__subtitle">проводимо консультації</h6>
                    <div class="about__anim-line mob"></div>
                    <ul class="about__list">
                        <?php if($aboutListItem = get_post_meta($IDS,'about_list',true)):
                            for($i=0; $i<$aboutListItem;$i++):?>
                        <li class="about__item">
                            <div class="about__item-inner">
                                <div class="about__item-head">
                                    <strong><?= get_post_meta($IDS,'about_list_'.$i.'_about_head',true)?></strong>
                                    <?php if ( $image = get_post_meta( $IDS, 'about_list_' . $i . '_about_icon', true ) ): ?>
                                    <div class="about__icon">
                                        <?=wp_get_attachment_image( $image, 'full' ); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="about__headline">
                                    <p><?= get_post_meta($IDS,'about_list_'.$i.'_about_headline',true)?></p>
                                </div>
                            </div>
                            <div class="about__anim-line"></div>
                        </li>
                        <?php endfor; endif; ?>
                        <li class="about__item">
                            <div class="about__item-head">
                                <strong><?= get_post_meta($IDS,'about_time',true)?> </strong>
                                <div class="about__icon">
                                    <strong><?= get_post_meta($IDS,'about_hour',true)?></strong>
                                </div>
                            </div>
                            <div class="about__headline">
                                <p>
                                    <?= get_post_meta($IDS,'about_descr',true)?>
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="about__anim-line mob"></div>
                    <ul class="about__social mob">
                        <?php if($instagramLink = get_field('instagram_link', 'option')):?>
                        <li class="about__social-item">
                            <a href="<?= esc_url($instagramLink['url']); ?>" target="_blank">
                                <?= esc_html($instagramLink['title']); ?></a>
                        </li>
                        <?php endif;
                    if($telegramLink = get_field('telegram_link', 'option')):?>
                        <li class="about__social-item">
                            <a href="<?= esc_url($telegramLink['url']); ?>" target="_blank">
                                <?= esc_html($telegramLink['title']); ?></a>
                        </li>
                        <?php endif;
                     if($linkedinLink = get_field('linkedin-link', 'option')):?>
                        <li class="about__social-item">
                            <a href="<?= esc_url($linkedinLink['url']); ?>" target="_blank">
                                <?= esc_html($linkedinLink['title']); ?>
                            </a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
                <div class="about__anim-line"></div>
            </div>
        </div>
    </div>
</section>

<section class="meet">
    <div class="container">
        <div class="meet__inner">
            <h6 class="meet__title">Знайомтесь</h6>
            <div class="meet__subtitle">
                <p>Ті, хто стоять за</p> Вашим захистом
            </div>
            <?php if($swiper = get_post_meta($IDS,'swiper',true)): ?>
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php for($i=0; $i<$swiper; $i++):?>
                    <div class="swiper-slide">
                        <?php if($swiperImg = get_post_meta($IDS,'swiper_'.$i.'_meet_photo',true)):?>
                        <div class="meet__photo">
                            <?=wp_get_attachment_image( $swiperImg, 'full' ); ?>
                        </div>
                        <?php endif; ?>
                        <ul class="meet__list">
                            <li class="meet__item">
                                <?php if($swiperName = get_post_meta($IDS,'swiper_'.$i.'_meet_name',true)):?>
                                <div class="meet__name">
                                    <p class="meet__persone"><?= $swiperName; ?></p>
                                </div>
                                <?php endif; 
                                 if($swiperSpec = get_post_meta($IDS,'swiper_'.$i.'_meet_xp',true)):?>
                                <p class="meet__xp">
                                    <?= $swiperSpec; ?>
                                </p>
                                <?php endif; ?>
                            </li>
                            <li class="meet__item">
                                <div class="meet__slogan">
                                    <?php if($swiperSpec = get_post_meta($IDS,'swiper_'.$i.'_meet__slogan',true)):
                                        echo $swiperSpec; 
                                     endif; ?>
                                </div>
                            </li>
                            <li class="meet__item">
                            <?php if($swiperEduc = get_post_meta($IDS,'swiper_'.$i.'_meet_educating',true)):?>
                                <div class="meet__educating">
                                    <p><?= $swiperEduc; ?></p>
                                </div>
                            <?endif;
                            if($swiperIntrest = get_post_meta($IDS,'swiper_'.$i.'_meet_intrest',true)):?>
                                <div class="meet__intrest">
                                    <p><?= $swiperIntrest; ?></p>
                                </div>
                                <?endif;?>
                            </li>
                        </ul>
                    </div>
                    <?php endfor; ?>
                   
                </div>

                <div class="meet__navigation">
                    <div class="swiper-button-prev"><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/icons/arrow-left.svg"
                            alt="arrow left icon">
                    </div>
                    <span class="meet__line"></span>
                    <div class="swiper-button-next"><img
                            src="<?php echo get_template_directory_uri(); ?>/build/img/icons/arrow-right.svg"
                            alt="arrow right icon">
                    </div>
                </div>

            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="ready">
    <div class="container">
        <div class="ready__inner">
            <h6 class="hidden">Що ми готові</h6>
            <div class="ready__info">
                <?php if($readyText = get_post_meta($IDS,'ready_text',true)):?>
                <p class="ready__text">
                    <?= $readyText; ?>
                </p>
                <?php endif; ?>
                <?php if($readyBtn = get_post_meta($IDS,'ready_consultation',true)):?>
                <button class="ready__consultation"><?= $readyBtn; ?></button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>