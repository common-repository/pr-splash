<?php
add_action('admin_init', 'register_prSplash_setting');
if($_GET['page'] == 'prsplash') {
	add_filter("mce_buttons_3", "prSplash_add_more_buttons");
	add_action('init', 'prSplash_add_editor_styles');
}

function printAdminSplashPage(){
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>PR Splash</h2>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'prSplash_group' );
			do_settings_sections( 'prSplash_group' );
			?>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row"><label for="prSplash_status">Status</label></th>
						<td>
							<input type="checkbox" id="prSplash_status" name="prSplash_status" value="1" <?php checked(get_option('prSplash_status'), 1); ?> /> Marque para ativar o PR Splash.
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="prSplash_time">Tempo de Exibição</label></th>
						<td>
							<input type="text" id="prSplash_time" name="prSplash_time" value="<?php echo get_option('prSplash_time', 5000); ?>" /> Digite o tempo que o PR Splash será exibido (em ms).
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="prSplash_type">Tipo de Conteúdo</label></th>
						<td>
							<input type="checkbox" id="prSplash_type" name="prSplash_type" value="1" <?php checked(get_option('prSplash_type'), 1); ?> /> Marque se o conteúdo a ser exibido é apenas uma imagem.
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="prsplash_content">Conteúdo</label></th>
						<td>
							<?php
							$content = get_option('prsplash_content');
							$editor_id = 'prsplash_content';

							wp_editor( $content, $editor_id, $settings );
							?>
						</td>
					</tr>
				</tbody>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php

}

function register_prSplash_setting() {
	register_setting('prSplash_group', 'prSplash_status');
	register_setting('prSplash_group', 'prSplash_time');
	register_setting('prSplash_group', 'prSplash_type');
	register_setting('prSplash_group', 'prsplash_content');
}

function prSplash_add_more_buttons($buttons) {
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'hr';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	return $buttons;
}

function prSplash_add_editor_styles() {
    add_editor_style( plugin_dir_url(__FILE__).'assets/prSplash-editor-style.css');
}
