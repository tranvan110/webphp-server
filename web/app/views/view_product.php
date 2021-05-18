<!DOCTYPE html>
<html lang="en">
<?php include(COMPPATH . '_head.php'); ?>

<body>
	<?php include(COMPPATH . '_header.php'); ?>
	<?php include(COMPPATH . '_navbar.php'); ?>
	<main class="container">
		<?php include(COMPPATH . '_breadcrumb.php'); ?>
		<section class="row">
			<div class="col-rp md-6 sm-12">
				<?php include(COMPPATH . '_slides.php'); ?>
				<?php include(COMPPATH . '_thumbs.php'); ?>
			</div>
			<div class="col-rp md-6 sm-12">
				<?php include(COMPPATH . '_feature.php'); ?>
			</div>
		</section>
		<?php include(COMPPATH . '_pagination.php'); ?>
	</main>
	<?php include(COMPPATH . '_footer.php'); ?>
	<?php include(COMPPATH . '_script.php'); ?>
</body>

</html>