<?php get_header(); ?>

<main>
	<?php 
	//THE LOOP.
	if( have_posts() ): 
		while( have_posts() ):
          the_post(); ?>

      <article id="post-<?php the_ID() ?>" <?php post_class( ); ?>>

       <?php if(has_post_thumbnail()):?>
       <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'pk-small-tile', array( 'class' => 'thumb' ) );?>
        </a>
        <?php endif; //has thumb ?>
        <?php the_terms( $post->ID, 'status', '<h2 class="status">', ', ', '</h2>' ) ?>
        <?php the_terms( $post->ID, 'project-tag', '<h3 class="project-tag"><span>', '</span><span>', '</span></h2>' ) ?>
        <h1 class="entry-title"> <a href="<?php the_permalink(); ?>"> 
           <?php the_title(); ?> 
        </a></h1>          

        <div class="entry-content">
            <?php the_excerpt(); ?>

            <?php wp_link_pages(); ?>
        </div>
        <?php pk_postmeta(); ?>

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