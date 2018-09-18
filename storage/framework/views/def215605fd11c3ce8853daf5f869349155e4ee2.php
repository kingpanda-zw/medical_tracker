<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" align="center">Employees List</div>
                <div class="card-header"> <a href="/employees/create" class="btn btn-primary pull-right">Add New Employee</a></div>
					<div class="body">
						<table id="table_id" class="table table-bordered">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th>Employee Name</th>
	                            <th>Occupation</th>
	                            <th>Occupation Type</th>
	                            <th>Medical Status</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <tr>
	                            <th scope="row"><?php echo e($employee->id); ?></th>
	                            <td><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></td>
	                            <td><?php echo e($employee->name); ?></td>
	                            <td><?php echo e($employee->occupation_type); ?></td>
	                            <td>
	                            	<?php 
	                            		if($employee->medical_status == 0){
		                    				echo "<span class='label bg-red'>&nbsp;Not Available&nbsp;</span>";
		                				}else{
		                					echo "<span class='label bg-green'>&nbsp;Available&nbsp;</span>";
		                				}
		                			?>	
		                		</td>
		                		<?php if($employee->medical_status == 0): ?>
	                            <td><a href="/employees/<?php echo e($employee->id); ?>/edit">Edit</a></td>
	                            <?php else: ?>
	                            <td><a href="/employees/<?php echo e($employee->id); ?>">View</a></td>
	                            <?php endif; ?>
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