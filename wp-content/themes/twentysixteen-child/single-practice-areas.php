<?php get_header(); ?>

<?php 
$parentPost = get_post_ancestors($post);
$postID = (empty($parentPost)) ? $post->ID : $parentPost[0];
 ?>

<?php $bannerImage = get_field('post_practice_banner_image', $postID); ?>

<!--Banner-->
<div id="banner-container" class="content-section" style="background: linear-gradient(rgba(3,16,41,0.78),rgba(3,16,41,0.78)),url(<?php echo $bannerImage['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xs-6" id="logo-container">
                <?php $logo = get_field('global_practice_png_logo', 'option'); ?>
                <img src="<?php echo $logo['url']; ?>" id="logo" alt="" />
            </div>
            <div class="col-xs-6" id="phone-container">
                <div class="phone-lead">
                    <a href="tel:1-866-669-7720" id="phone-btn">
                        <i class="fa <?php the_field('global_practice_phone_icon', 'option'); ?> fa-lg"></i><?php the_field('global_practice_phone_lead', 'option'); ?>
                    </a>
                        <a href="tel:1-866-669-7720" id="phone-number"><?php the_field('global_practice_phone_number', 'option'); ?></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="banner-text-container">
                <div class="text-center">
                    <h1><?php the_field('post_practice_banner_title'); ?></h1>
                    <p><?php the_field('post_practice_banner_description'); ?></p>

                    <?php $btnText = (get_field('post_practice_banner_button_text') != "") ? get_field('post_practice_banner_button_text') : get_field('global_practice_banner_button_text', 'option'); ?>
                    <?php $btnCta = (get_field('post_practice_banner_button_cta') != "") ? get_field('post_practice_banner_button_cta') : get_field('global_practice_banner_button_cta', 'option'); ?>
                    <button class="banner-btn cta-btn" data-toggle="modal" data-target="#formModal"><?php echo $btnText; ?></button>
                    <br />
                    <span><?php echo $btnCta; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Callout Columns-->
<div id="callout-container" class="content-section">
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
                    $callout .= '<i class="fa ' . get_sub_field('global_practice_callout_icon') . ' fa-2x">';
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
<div id="youtube-container" class="content-section" style="background: linear-gradient(rgba(200, 117, 5,0.9),rgba(200, 117, 5,0.9)),url(<?php echo $bannerImage['url']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 text-center">
                <div class="embed-container">
                    <?php the_field('post_practice_youtube_url', $postID); ?>
                </div>
                <span id="youtube-caption"><?php the_field('post_practice_youtube_youtube_caption'); ?></span>
            </div>
            <div class="col-lg-7">
                <h2 class="section-title white youtube-title"><?php the_field('post_practice_youtube_title', $postID); ?></h2>
                <p class="section-description white youtube-description"><?php the_field('post_practice_youtube_description', $postID); ?></p>
            </div>
        </div>
    </div>
</div>

<!--Tabs-->
<div id="tabs-container" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title"><?php the_field('post_practice_tab_title'); ?></h2>
            </div>
        </div>
        <div class="row">
            <?php
            if( have_rows('post_practice_tabs', $postID) ):
                $tabs = '<div class="col-lg-5" id="services-tabs-title-container"><ul id="services-tabs-title-ul">';
                $tabBody = '<div class="col-lg-7" id="services-tabs-body-container">';
                $i = 1;
                while( have_rows('post_practice_tabs', $postID) ) : the_row();
                    $activeClass = ($i === 1) ? ' active' : '';
                    $tabName = strtolower(str_replace(' ', '-', get_sub_field('post_practice_tab_title')));

                    $tabs .= '<li class="' . $activeClass . '">';
                    $tabs .= '<a href="#" data-tab="tab' . $i . '">';
                    $tabs .= get_sub_field('post_practice_tab_title');
                    $tabs .= '</a></li>';

                    $tabBody .= '<div class="services-tab-body-container' . $activeClass . '" data-body="tab' . $i . '">';
                    $tabBody .= '<div class="row">';
                    $tabBody .= '<div class="col-lg-12">';
                    $tabBody .= '<div class="text-center"><h4 class="services-tabs-body-title">';
                    $tabBody .= get_sub_field('post_practice_tab_title');
                    $tabBody .= '</h4></div>';
                    $tabBody .= get_sub_field('post_practice_tab_description');
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
<div id="testimonial-container" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title"><?php the_field('global_practice_testimonials_title', 'option'); ?></h2>
            </div>
        </div>
        <div class="row">
            <?php
            if( have_rows('global_practice_testimonials', 'option') ):
                $testimonials = '';
                while ( have_rows('global_practice_testimonials', 'option') ) : the_row();
                    $testimonialImage = get_sub_field('global_practice_testimonial_image');

                    $testimonials .='<div class="col-lg-6"><i class="fa fa-quote-left fa-3x fa-pull-left fa-border"></i><div class="testimonial-divs text-center">';
                    $testimonials .='<p class="testimonial-copy">' . get_sub_field('global_practice_testimonial_copy') . '</p>';
                    $testimonials .='<img class="testimonial-img" src="' . $testimonialImage['url'] . '">';
                    $testimonials .='<p class="testimonial-author">-' . get_sub_field('global_practice_testimonial_author') . ' (actual client)</p>';
                    $testimonials .='</div></div>';
                endwhile;
            endif;
            echo $testimonials;
            ?>
        </div>
    </div>
</div>

<!--Logos-->
<div id="logos-container" class="content-section">
    <div class="container">
        <div class="row">
            <?php 
            if( have_rows('global_practice_logos', 'option') ):
                $logos = '';
                while ( have_rows('global_practice_logos', 'option') ) : the_row();
                    $logoImage = get_sub_field('global_practice_logo');

                    $logos .= '<div class="col-xs-4">';
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
<div id="guarantee-container" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php $guaranteeLogo = get_field('global_practice_guarantee_logo', 'option'); ?>
                <img src="<?php echo $guaranteeLogo['url']; ?>" alt="" class="guarantee-logo">
                <h2 class="section-title guarantee-title"><?php the_field('global_practice_guarantee_title','option'); ?>&reg;</h2>
                <p class="section-description guarantee-description"><?php the_field('global_practice_guarantee_description', 'option'); ?></p>
                <br />
                <button class="banner-btn cta-btn" data-toggle="modal" data-target="#formModal"><?php the_field('global_practice_guarantee_button_text', 'option'); ?></button>
            </div>
        </div>
    </div>
</div>

<!--Footer-->
<div id="footer-container" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="white footer-disclaimer"><?php the_field('global_practice_disclaimer', 'option'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <p class="white footer-tc"><?php the_field('global_practice_terms_and_conditions', 'option'); ?></p>
            </div>
            <div class="col-lg-4">
                <p class="white footer-address"><?php the_field('global_practice_address', 'option'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="white footer-copyright">&copy; <?php echo date('Y') . ' '; ?><?php the_field('global_practice_copyright', 'option'); ?></p>
            </div>
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <img src="<?php get_stylesheet_directory_uri() . '/images/Terry-Bryant-Logo.svg' ?>" class="services-modal-header-logo" alt="" onerror="this.src='<?php echo $logo['url']; ?>'">
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 id="services-form-headline"><?php the_field('global_practice_form_title', 'option'); ?></h1>
                        <div class="feature-seperator"></div>
                        <p id="services-form-subheadline"><?php the_field('global_practice_form_description', 'option'); ?></p>
                    </div>
                </div>
                <div class="row" id="services-form-body-container">
                    <div class="col-sm-12 col-md-7 col-lg-7">
                        <h6 class="form-title"><?php the_field('global_practice_form_lead', 'option'); ?></h6>
                        <?php gravity_form(1, $display_title=false, $display_description=false, $display_inactive=false, $field_values=$dynamic, $ajax=true, $tabindex); ?>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5">
                        <div class="text-center">
                            <?php $formImage = get_field('global_practice_form_image', 'option'); ?>
                            <img src="<?php echo $formImage['url']; ?>" alt="" class="services-modal-img">
                        </div>
                        <?php
                        if( have_rows('global_practice_form_benefits', 'option') ):
                            $form_features = '<ul class="services-form-features">';
                            while( have_rows('global_practice_form_benefits', 'option') ) : the_row();
                                $form_feature = get_sub_field('global_practice_form_benefit');
                                $form_features .= '<li><i class="fa fa-check"></i>' . $form_feature . '</li>';
                            endwhile;
                        endif;

                        echo $form_features;
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <p id="services-modal-footer-text"><?php the_field('global_practice_form_reinforcement', 'option'); ?></p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>