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
						<p class="copyright">
							© <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>
						</p>
					</div>
				</div>
			</footer>

		<?php wp_footer(); ?>

	</body>
</html>