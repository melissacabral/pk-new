<footer class="clearfix" id="colophon" role="contentinfo">
    <div class="widget-container">  

    	<?php dynamic_sidebar( 'footer-area' ); ?>
     
    </div>

</footer><!-- end footer -->
<small class="credits">
    	<span>Copyright &copy; 2010-2013 Paulkaiju | <a href="<?php home_url( '/contact-paul/' ); ?>">Contact</a> </span>
    	<span class="alignright">
    	    	 <a href="http://melissacabral.com" title="Custom Wordpress Themes and Plugins by Melissa Cabral">Web Design &amp; Development by Mister Peekay Girlfriend</a>
    	</span>
    </small> 
<?php 
//must call wp_footer right before </body> for JS and plugins to run!
wp_footer();  ?>

</body>
</html>