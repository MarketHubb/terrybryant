<?php get_header(); ?>

<?php $bannerImage = get_field('post_practice_banner_image'); ?>

<!--Banner-->
<div id="banner-container" style="background: linear-gradient(rgba(3,16,41,0.78),rgba(3,16,41,0.78)),url(<?php echo $bannerImage['url']; ?>);">
    <div class="container">
        <div class="col-lg-6" id="logo-container">
            <?php $logo = get_field('global_practice_png_logo', 'option'); ?>
            <img src="<?php echo $logo['url']; ?>" alt="" id="logo">
        </div>
        <div class="col-lg-6" id="phone-container">
            <div class="phone-lead">
                <span><i class="fa <?php the_field('global_practice_phone_icon', 'option'); ?> fa-2x"></i><?php the_field('global_practice_phone_lead', 'option'); ?></span>
            </div>
        </div>
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

<!--Callout Columns-->
<div id="callout-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title text-center"><?php the_field('global_practice_callout_title', 'option'); ?></h2>
            </div>
        </div>
        <div class="row">
            <?php
            if( have_rows('global_practice_callout_sections', 'option') ):
                $callout = '';
                while ( have_rows('global_practice_callout_sections', 'option') ) : the_row();
                    $callout .= '<div class="col-lg-4 text-center">';
                    $callout .= '<span class="callout-icons">';
                    $callout .= '<i class="fa ' . get_sub_field('global_practice_callout_icon') . '">';
                    $callout .= '</i></span>';
                    $callout .= '<h4 class="callout-title">' . get_sub_field('global_practice_callout_title') . '</h4>';
                    $callout .= '<p class="callout-description">' . get_sub_field('global_practice_callout_description') . '</p>';
                    $callout .= '</div>';
                endwhile;
            endif;
            echo $callout;
            ?>
        </div>
    </div>
</div>

<!--Youtube-->
<div id="youtube-container" style="background: linear-gradient(rgba(3,16,41,0.78),rgba(3,16,41,0.78)),url(<?php echo $bannerImage['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 text-center">
                <?php the_field('post_practice_youtube_url'); ?>
            </div>
            <div class="col-lg-7">
                <h3 class="section-title white"><?php the_field('post_practice_youtube_title'); ?></h3>
                <p class="section-description white"><?php the_field('post_practice_youtube_description'); ?></p>
            </div>
        </div>
    </div>
</div>

<!--Tabs-->
<div id="tabs-container">
    <div class="container">
        <div class="row">
            <?php
            if( have_rows('post_practice_tabs') ):
                $tabs = '<div class="col-lg-5" id="services-tabs-title-container"><ul id="services-tabs-title-ul">';
                $tabBody = '<div class="col-lg-7" id="services-tabs-body-container">';
                $i = 1;
                while( have_rows('post_practice_tabs') ) : the_row();
                    $activeClass = ($i === 1) ? ' active' : '';
                    $tabName = strtolower(str_replace(' ', '-', get_sub_field('post_practice_tab_title')));

                    $tabs .= '<li class="' . $activeClass . '">';
                    $tabs .= '<a href="#" data-tab="tab' . $i . '">';
                    $tabs .= get_sub_field('post_practice_tab_title');
                    $tabs .= '</a></li>';

                    $tabBody .= '<div class="services-tab-body-container' . $activeClass . '" data-body="tab' . $i . '">';
                    $tabBody .= '<div class="row">';
                    $tabBody .= '<div class="col-lg-12">';
                    $tabBody .= '<div class="text-center"><h6 class="services-tabs-body-title">';
                    $tabBody .= get_sub_field('post_practice_tab_title');
                    $tabBody .= '</h6></div>';
                    $tabBody .= get_sub_field('post_practice_tab_description');
                    /*$tabBody .= '<div class="services-tabs-body-cta">';
                    $tabBody .= '<a href="#" data-toggle="modal" data-target="#servicesModal">';
                    $tabBody .= get_sub_field('options_services_tab_section_cta', 'option');
                    $tabBody .= '</a></div>';*/
                    $tabBody .= '</div></div></div>';

                    $i++;
                endwhile;
                $tabs .= '</ul></div>';
                $tabBody .= '</div>';
            endif;

            echo $tabs;
            echo $tabBody;

            ?>

        </div>
    </div>
</div>

<!--Testimonials-->
<div id="testimonial-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><?php the_field('global_practice_testimonials_title', 'option'); ?></div>
        </div>
        <div class="row">
            <?php
            if( have_rows('global_practice_testimonials', 'option') ):
                $testimonials = '';
                while ( have_rows('global_practice_testimonials', 'option') ) : the_row();
                    $testimonialImage = get_sub_field('global_practice_testimonial_image');

                    $testimonials .='<div class="col-lg-6"><div class="testimonial-divs text-center">';
                    $testimonials .='<p class="testimonial-copy">' . get_sub_field('global_practice_testimonial_copy') . '</p>';
                    $testimonials .='<img class="testimonial-img" src="' . $testimonialImage['url'] . '">';
                    $testimonials .='<p class="testimonial-author">' . get_sub_field('global_practice_testimonial_author') . '</p>';
                    $testimonials .='</div></div>';
                endwhile;
            endif;
            echo $testimonials;
            ?>
        </div>
    </div>
</div>

<!--Logos-->
<div id="logo-container">
    <div class="container">
        <div class="row">
            <?php 
            if( have_rows('global_practice_logos', 'option') ):
                $logos = '';
                while ( have_rows('global_practice_logos', 'option') ) : the_row();
                    $logoImage = get_sub_field('global_practice_logo');

                    $logos .= '<div class="col-lg-3">';
                    $logos .= '<img class="logo-img" src="' . $logoImage['url'] . '">';
                    $logos .= '</div>';
                endwhile;
            endif;
            echo $logos;
            ?>
        </div>
    </div>
</div>

<!--Guarantee-->
<div id="guarantee-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title"><?php the_field('global_practice_guarantee_title','option'); ?></h2>
                <?php $guaranteeLogo = get_field('global_practice_guarantee_logo', 'option'); ?>
                <img src="<?php echo $guaranteeLogo['url']; ?>" alt="" class="guarantee-logo">
                <p class="section-description"><?php the_field('global_practice_guarantee_description', 'option'); ?></p>
                <a href="" class="btn"><?php the_field('global_practice_guarantee_button_text', 'option'); ?></a>
            </div>
        </div>
    </div>
</div>

<!--Footer-->
<div id="footer-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><?php the_field('global_practice_disclaimer', 'option'); ?></div>
        </div>
        <div class="row">
            <div class="col-lg-7"><?php the_field('global_practice_terms_and_conditions', 'option'); ?></div>
            <div class="col-lg-5"><?php the_field('global_practice_address', 'option'); ?></div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center"><?php the_field('global_practice_copyright', 'option'); ?></div>
        </div>
    </div>
</div>













<?php get_footer(); ?>
