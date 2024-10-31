<?php
function postPRSplash(){
	if(get_option('prSplash_status') == 1 && is_front_page()) {
		?>
		<div id="prSplash">
			<a href="#" class="hide_prSplash">Fechar</a>
			<?php if(get_option('prSplash_type') == 1) { ?>
				<div class="prSplash_image">
					<?php echo get_option('prsplash_content'); ?>
				</div>
			<?php } else { ?>
				<div class="prSplash_content">
					<?php echo apply_filters('the_content', get_option('prsplash_content')); ?>
				</div>
			<?php } ?>
		</div>
		<style type="text/css">
			.prSplash_overlay {
				background: rgba(0,0,0,0.75);
				position: fixed;
				width: 100%;
				height: 100%;
				top: 0;
				z-index: 100;
			}
			#prSplash {
				top: 50%;
				left: 50%;
				padding: 20px;
				display: block;
				position: fixed;
				z-index: 9999;
			}
			#prSplash .hide_prSplash {
				background: white;
				border-radius: 25px;
				padding: 5px;
				position: absolute;
				right: 0;
				top: 0;
				border: 1px solid #333;
				font-size: 12px;
				color: #656565;
				font-weight: 800;
			}
			#prSplash .hide_prSplash:hover {
				background: #656565;
				color: #FFF;
			}
			#prSplash .prSplash_content {
				background: #FFF;
				padding: 20px;
			}
		</style>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			var window_height = $(window).height();
			var prSplash = $('#prSplash');
			var prSplash_image = $('#prSplash .prSplash_image img');

			if(prSplash_image.attr('height') > window_height) {
				prSplash_image.height(window_height - 50).css('width', 'auto').attr('height', (window_height - 50));;
			}
			if( prSplash_image.length > 0 ) {
				var prSplash_height = (prSplash_image.attr('height')/2);
				var prSplash_width = (prSplash_image.attr('width')/2);
			} else {
				var prSplash_height = (prSplash.height()/2);
				var prSplash_width = (prSplash.width()/2);
			}

			prSplash
				.show('bounce', { times:3 }, 300)
				.after('<div class="prSplash_overlay"></div>')
				.css('margin-left', "-"+prSplash_width+"px")
				.css('margin-top', "-"+prSplash_height+"px")
			;
			$('.showpop').hide();
			$('.hide_prSplash').click(function(){
				$('#prSplash').slideUp();
				$('.prSplash_overlay').fadeOut();
				return false;
			});
			setTimeout(function(){
				$('#prSplash').slideUp();
				$('.prSplash_overlay').fadeOut();
			}, <?php echo get_option('prSplash_time'); ?>);
		});
		</script>
		<?php
	}
}

add_action( 'wp_footer', 'postPRSplash' );
