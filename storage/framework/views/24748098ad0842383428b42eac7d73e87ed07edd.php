<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" align="center">All User Roles</div>
                <div class="card-header"> <a href="/roles/create" class="btn btn-primary pull-right">Add New Role</a></div>

					<div class="body">
						<table class="table table-bordered">
		                    <thead>
		                        <tr>
		                            <th>#</th>
		                            <th align="center">Role Name</th>
		                            <th align="center">Date Created</th>
		                            <th align="center">Date Updated</th>
		                            <th align="center">Action</th>
		                        </tr>
		                    </thead>
		                    <tbody>
								<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<th scope="row"><?php echo e($role->id); ?></th>
									<td><?php echo e($role->name); ?></td>
									<td><?php echo e(date('d-m-Y', strtotime($role->created_at))); ?></td>
									<td><?php echo e(date('d-m-Y', strtotime($role->updated_at))); ?>

									<td><a href="/roles/<?php echo e($role->id); ?>"> Edit Role </a></td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>