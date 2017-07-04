			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<div class="container">
					<div class="row">
						<div class="col-lg-3">
							<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-1')) ?>
						</div>
						<div class="col-lg-3">
						<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-2')) ?>
						</div>
						<div class="col-lg-3">
							<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-3')) ?>
						</div>
						<div class="col-lg-3">
						<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-4')) ?>
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