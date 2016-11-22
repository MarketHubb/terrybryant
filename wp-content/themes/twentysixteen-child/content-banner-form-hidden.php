<div class="row">
    <div class="col-lg-12" id="banner-text-container">
        <div class="text-center">
            <h1><?php the_field('post_practice_banner_title'); ?></h1>
            <p><?php the_field('post_practice_banner_description'); ?></p>

            <?php $btnText = (get_field('post_practice_banner_button_text') != "") ? get_field('post_practice_banner_button_text') : get_field('global_practice_banner_button_text', 'option'); ?>
            <?php $btnCta = (get_field('post_practice_banner_button_cta') != "") ? get_field('post_practice_banner_button_cta') : get_field('global_practice_banner_button_cta', 'option'); ?>
            <button class="banner-btn cta-btn" data-toggle="modal" data-target="#formModal"><?php echo $btnText; ?><i class="fa fa-chevron-right" aria-hidden="true"></i>
            </button>
            <br />
            <span><?php echo $btnCta; ?></span>
        </div>
    </div>
</div>