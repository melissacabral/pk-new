<?php get_header(); ?>

<main>
    <?php get_search_form(); ?>
    <h2><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h2>


    <?php 
	//THE LOOP.
    if( have_posts() ): 
      while( have_posts() ):
          the_post(); ?>
      
      <article id="post-<?php the_ID() ?>" <?php post_class( 'clearfix' ); ?>>
       <?php the_post_thumbnail( 'pk-small-tile', array( 'class' => 'thumb' ) ); ?> <h1 class="entry-title"> <a href="<?php the_permalink(); ?>"> 
       <?php the_title(); ?> 
   </a></h1>
   

   
   <div class="entry-content">
    <?php the_excerpt(); ?>

</div>

<div class="postmeta"> 
    
    <span class="date"> Posted on <?php the_date(); ?> </span> 
    
    <span class="categories"> 
        in <?php the_category(' '); ?>                
    </span>              
    <span class="tags">
        <?php the_tags(); ?>
    </span> 
</div><!-- end postmeta --> 


<?php comments_template(); ?>
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