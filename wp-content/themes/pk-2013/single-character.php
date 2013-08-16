<?php get_header(); ?>
    
    <main>
	<?php 
	//THE LOOP.
	if( have_posts() ): 
		while( have_posts() ):
		the_post(); ?>
	
        <article id="post-<?php the_ID() ?>" <?php post_class( ); ?>>
             <?php the_post_thumbnail( 'pk-full', array( 'class' => 'featured-header' ) ); ?> <h1 class="entry-title"> <a href="<?php the_permalink(); ?>"> 
				<?php the_title(); ?> 
			</a></h1>
            

                              
            <div class="entry-content">
                <?php the_content(); ?>

                 <?php wp_link_pages(); ?>

            </div>
             <?php pk_postmeta(); ?>

             <?php 

            $name = get_the_title();
            
             $args = array(
                //'post_type' => 'post',
                'showposts' => 4,
                //'tag' => $name,
                's' => $name
                );
             $char_query = new WP_Query($args);

             if($char_query->have_posts()): ?>
             <div class="related-posts">
                <h2> Posts about <?php the_title() ?> </h2>
                <?php while($char_query->have_posts()): $char_query->the_post(); ?>
                <div class="<?php post_class( 'clearfix' ) ?>">
               
                <?php the_post_thumbnail( 'thumbnail' ) ?>
                <h3> <?php the_title(); ?></h3>
            </div>
            <?php endwhile; ?>
             </div>
         <?php endif; 
         wp_reset_postdata();?>
        
		 </article><!-- end post -->
      <?php 
	  endwhile;
	  else: ?>
	  <h2>Sorry, no posts found</h2>
	  <?php endif; //END OF LOOP. ?>
	          
        
        <div id="nav-below" class="pagination">
        <?php //run the pagenavi function if it exists
        if( function_exists('wp_pagenavi') ):
            wp_pagenavi(); 
        else:
            //do the normal pagination if the plugin is missing
            next_posts_link( '&laquo; Older Posts' ); 
            previous_posts_link( 'Newer Posts &raquo;' );  
        endif; ?>
        </div><!-- end #nav-below --> 
        
    </main><!-- end content -->
    
<?php get_sidebar(); ?> 
<?php get_footer(); ?>  