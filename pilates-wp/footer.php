<footer class="footer">
	<div class="container">
		<div class="row-footer">
			<p class="row-footer__copy">Pilates Plus, <?php echo date('Y') ?> &copy</p>
			<a href=""<?php echo home_url() ?>" class="logo" style="background-image:url(<?php the_field('logo', 74);?>)"></a>
			<span class="row-footer__social">
				<a href="<?php the_field('vk',190);?>"><i class="ic ic-vkontakte"></i></a>
				<a href="<?php the_field('fb',190);?>"> <i class="ic ic-facebook"></i></a>
				<a href="<?php the_field('ing',190);?>"> <i class="ic ic-instagram"></i></a>
			</span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>


</body>

</html>