<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Casper
 */
?>
	<footer id="colophon" class="site-footer" role="contentinfo">
	    <a class="subscribe icon-feed" href="<?php bloginfo('rss2_url'); ?>"><span class="tooltip"><?php _e('Subscribe!', 'casper'); ?></span></a>
		<div class="site-info">
		    <section class="copyright">
		    	<?php echo get_bloginfo('name');?>
                <?php echo date('Y');?>
		    </section>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</main><!-- /#content -->

<?php wp_footer(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24383812-1']);
  _gaq.push(['_setDomainName', 'jorgerodriguez.dk']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
