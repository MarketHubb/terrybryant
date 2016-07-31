<?php get_header(); ?>

<?php $bannerImage = get_field('post_practice_banner_image'); ?>

<div id="banner-container" style="background: linear-gradient(rgba(3,16,41,0.78),rgba(3,16,41,0.78)),url(<?php echo $bannerImage['url']; ?>);">

    <div class="container">
        <!--Logo-->
        <div class="col-lg-6" id="logo-container">
            <?php $logo = get_field('global_practice_png_logo', 'option'); ?>
            <img src="<?php echo $logo['url']; ?>" alt="" id="logo">
        </div>
        <!--Phone-->
        <div class="col-lg-6" id="phone-container">
            <div class="phone-lead">
                <span><i class="fa <?php the_field('global_practice_phone_icon', 'option'); ?> fa-2x"></i><?php the_field('global_practice_phone_lead', 'option'); ?></span>
            </div>
        </div>
        <!--Banner Text-->
        <div class="col-lg-12" id="banner-text-container">
            <div class="text-center">
                <h1><?php the_field('post_practice_banner_title'); ?></h1>
                <p><?php the_field('post_practice_banner_description'); ?></p>

                <?php $btnText = (get_field('post_practice_banner_button_text') != "") ? get_field('post_practice_banner_button_text') : get_field('global_practice_banner_button_text', 'option'); ?>
                <?php $btnCta = (get_field('post_practice_banner_button_cta') != "") ? get_field('post_practice_banner_button_cta') : get_field('global_practice_banner_button_cta', 'option'); ?>

                <a href="" class="btn"><?php echo $btnText; ?></a>
                <span><?php echo $btnCta; ?></span>
            </div>
        </div>
    </div>


</div>

<?php get_footer(); ?>
