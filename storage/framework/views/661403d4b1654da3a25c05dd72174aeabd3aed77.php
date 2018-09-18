<?php $__env->startSection('content'); ?>
<div class="container">


<div class="row clearfix">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="card" style="background: white; padding: 10px;">
			<div class="header">
                <h2>
                    <b>Edit Role</b>
                </h2>
            </div>
				<form method="post" action="<?php echo e(route('roles.update',[$role->id])); ?>">
					<?php echo e(csrf_field()); ?>


					<div class="body table-responsive">
						<div class="row clearfix">
	                        <div class="col-sm-12">
								<input type="hidden" name="_method" value="put">
					

								<div class="form-group">
				                    <div class="form-line">
				                        <input placeholder="Enter Role Name" id="role-name" required name="name" spellcheck="false" class="form-control" value="<?php echo e($role->name); ?>"/>
				                    </div>
				                </div>

								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Update Role"/>
									<?php if(Auth::user()->role_id == 1): ?>
									<a href="" class="btn btn-danger btn-large" onclick="
										var result = confirm('Are you sure you wish to delete this role?');
										if( result ){
											event.preventDefault();
											document.getElementById('delete-form').submit();
										}
									">Delete Role
									</a>
									<?php endif; ?>
									<a href="/roles/" class="btn btn-default btn-large pull-right">&laquo; Cancel</a>
								</div>

							</div>
						</div>
					</div>
				</form>

				
					<form id="delete-form" action="<?php echo e(route('roles.destroy',[$role->id])); ?>" method="POST" style="display:none;">
						<input type="hidden" name="_method" value="delete">
						<?php echo e(csrf_field()); ?>

					</form>

		</div><!--end of div card class-->
	</div><!-- end of main col-md-12-->
</div><!-- end of main row clearfix -->

</div><!-- end of container-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>