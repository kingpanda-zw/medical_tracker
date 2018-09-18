<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" align="center">All Medical Tests</div>
                <div class="card-header"> <a href="/medicals/create" class="btn btn-primary pull-right">Add New Medical Test</a></div>
					<div class="body">
						<table class="table table-bordered">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th>Medical Test Name</th>
	                            <th>Date Created</th>
	                            <th>Date Updated</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
							<?php $__currentLoopData = $medicals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<th scope="row"><?php echo e($medical->id); ?></th>
								<td><?php echo e($medical->name); ?></td>
								<td><?php echo e(date('N-d-m-Y', strtotime($medical->created_at))); ?></td>
								<td><?php echo e(date('d-m-Y', strtotime($medical->updated_at))); ?></td>
								<td><a href="/medicals/<?php echo e($medical->id); ?>"> Edit Test</a>
								</td>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
							</tr>
						</tbody>
                	</table>
					</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>