<header role="banner">
	<h1 class="site-name">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ir" title="<?php bloginfo('name') ?>" rel="home"> 
			<?php bloginfo('name'); ?> 
		</a>
	</h1>
	<h2 class="site-description visually-hidden"> <?php bloginfo('description'); ?> </h2>
	<a class="nav-toggle" href="#menu">menu</a>
	
	<nav class="main-navigation <?php if(function_exists('is_raffle_open') && is_raffle_open()){echo 'raffle-open'; } ?>">
		<div class="wrapper">
			<ul id="toggle-menu">
				<?php if(function_exists('pk_display_raffle')){pk_display_raffle();} ?>	
				<?php wp_nav_menu( array(
					'theme_location' => 'primary-menu',
					'container' => false,
					'items_wrap' => '%3$s',
					) ); ?>
				</ul>	
			</div>
		</nav>
		
	</header>	