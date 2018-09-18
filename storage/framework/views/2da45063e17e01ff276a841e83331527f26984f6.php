<?php if(session()->has('success')): ?>
<div class="alert alert-dismissable alert-success fade show">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	</button>
	<strong>
		<?php echo session()->get('success'); ?>

	</strong>
</div>
<?php endif; ?>