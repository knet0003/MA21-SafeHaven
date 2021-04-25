
<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<form method="post" action="options.php">
		<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			wp_nonce_field( 'save_btn_options' );
			submit_button();
		?>
    </form>
</div>

