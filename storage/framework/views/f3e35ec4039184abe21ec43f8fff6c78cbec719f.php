

<?php if(session()->has('errors')): ?>
<div class="alert alert-dismissable alert-danger fade show">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	</button>
	<strong>
		<?php echo session()->get('errors'); ?>

	</strong>
</div>
<?php endif; ?>