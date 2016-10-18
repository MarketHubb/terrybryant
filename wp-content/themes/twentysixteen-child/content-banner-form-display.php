<div class="row">
	<div class="col-lg-7" id="banner-text-display-container">
    	<h1><?php the_field('post_practice_banner_title'); ?></h1>
        <p><?php the_field('post_practice_banner_description'); ?></p>
	</div>
    <div class="col-lg-5" id="banner-form-display-container">
        <div class="text-center">
        	<h6 class="form-title"><?php the_field('global_practice_form_lead', 'option'); ?></h6>
        	<?php $dynamicFormFields = array('type' => $formType); ?>
            <?php gravity_form(1, $display_title=false, $display_description=false, $display_inactive=false, $field_values=$dynamicFormFields, $ajax=true, $tabindex); ?>
        </div>
    </div>
</div>
