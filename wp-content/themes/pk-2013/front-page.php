<?php get_header(); ?>

<main>
	<?php 
	//THE LOOP.
	if( have_posts() ): 
		while( have_posts() ):
          the_post(); ?>

      <article id="post-<?php the_ID() ?>" <?php post_class( 'clearfix' ); ?>>
        <a class="thumb-link" href="<?php the_permalink(); ?>"> 
           <?php 
           if( has_post_thumbnail() ){
                if(get_post_format() != 'image'){
                    the_post_thumbnail( 'pk-small-tile', array( 'class' => 'thumb' ) ); 
                }else{
                     the_post_thumbnail( 'pk-tall-tile', array( 'class' => 'thumb thumb-tall' ) ); 
                }
            
            }else{
                echo '<div class="placeholder">&nbsp;</div>';
            }
        ?>
      
        <h1 class="entry-title">

            <?php the_title(); ?> 

        </h1>
        
    </a>


     <?php pk_postmeta(); ?>

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