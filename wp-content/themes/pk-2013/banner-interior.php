<header role="banner">
	<h3 class="site-description visually-hidden"> <?php bloginfo('description'); ?> </h3>	
	<nav class="main-navigation <?php if(is_raffle_open()){echo 'raffle-open'; } ?>">
		<ul>
			<li class="logo">
				<h2 class="site-name">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ir" title="<?php bloginfo('name') ?>" rel="home"> 
						<?php bloginfo('name'); ?> 
					</a>
				</h2>	
			</li>
			<?php pk_display_raffle(); ?>
			<?php wp_nav_menu( array(
				'theme_location' => 'primary-menu',
				'container' => false,
				'items_wrap' => '%3$s',
				) ); ?>	
			</ul>
		</nav>			
	</header>	