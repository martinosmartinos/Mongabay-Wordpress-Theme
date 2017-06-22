			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="container">
					<div class="row">
						<div class="col-lg-3">
						<h4><?php _e( 'About Mongabay', 'mongabay' ); ?></h4>
						<p><?php _e( 'Mongabay is an environmental science and conservation news and information site. Much of Mongabay has operated under a non-profit — Mongabay.org — since 2012.', 'mongabay' ); ?></p>
						</div>
						<div class="col-lg-3">

						</div>
						<div class="col-lg-3">

						</div>
						<div class="col-lg-3">

						</div>
						<!-- copyright -->
						<p class="copyright">
							© <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>
						</p>
						<!-- /copyright -->
					</div>
				</div>
			</footer>
			<!-- /footer -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>