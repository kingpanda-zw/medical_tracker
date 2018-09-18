<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" align="center">Occupations List</div>
                <div class="card-header"> <a href="/occupations/create" class="btn btn-primary pull-right">Add New Occupation</a></div>
					<div class="body">
						<table class="table table-bordered">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th align="center">Occupation Name</th>
	                            <th align="center">Medicals</th>
	                            <th align="center">Action</th>
	                            <th align="center">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <tr>
	                            <th scope="row"><?php echo e($occupation->id); ?></th>
	                            <td><?php echo e($occupation->name); ?></td>
	                            <td align="center">
	                            	<?php $__currentLoopData = $occupation->medicals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                        	<font style="color: red;">[ </font><?php echo e($medical->name); ?><font style="color: red;"> ]</font>
			                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                            </td>
	                            <td><a href="/occupations/<?php echo e($occupation->id); ?>/edit">Edit Occupation</a>
	                            <td><a href="/occupations/<?php echo e($occupation->id); ?>">Medicals</a></td>
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