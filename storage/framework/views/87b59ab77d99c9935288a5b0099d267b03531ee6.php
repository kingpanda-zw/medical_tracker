<?php $__env->startSection('content'); ?>
<div class="container">

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>
	                <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>

	            </h2>
	        </div>
	        <form id="add-medical" action="<?php echo e(route('employees.addmed')); ?>" method="POST">
	        <?php echo e(csrf_field()); ?> 

	        <div class="body bg-teal">
	            <div class="m-b--35 font-bold"> </div>
		            <ul class="dashboard-stat-list">
		                <li>
		                    <b>Occupation Name:</b> <?php echo e($occupation->name); ?> (<?php echo e($employee->occupation_id); ?>)
		                </li>
		                <li>
		                    <b>Occupation Type:</b> <?php echo e($employee->occupation_type); ?>

		                </li>
		                <li>
		                    <b>Medical Status:</b> 
		                    <?php if($employee->medical_status == 0){
		                    	echo "<span class='label bg-red'>&nbsp;Not Available&nbsp;</span>";
		                	}else{
		                		echo "<span class='label bg-green'>&nbsp;Available&nbsp;</span>";
		                	}?>
		                </li>
		                <li>
		                    <b>Date Created:</b> <?php echo e(date('d-m-Y', strtotime($employee->created_at))); ?> at <?php echo e(date('H:i:s', strtotime($employee->created_at))); ?>

		                </li>
		                <li>
		                    <b>Date Updated:</b> <?php echo e(date('d-m-Y', strtotime($employee->updated_at))); ?> at <?php echo e(date('H:i:s', strtotime($employee->updated_at))); ?>

		                </li>

		            </ul>
	        </div>
	    </form>
	    </div>
	</div>
</div>

<?php if($employee->medical_status == 0): ?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>
	                Medicals for <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>

	            </h2>
	        </div>
	        <form id="add-medical" action="<?php echo e(route('employees.addmed')); ?>" method="POST">
	        	<?php echo e(csrf_field()); ?>

		        <div class="body">
		            <table id="mainTable" class="table table-bordered">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th>Medical Test Name</th>
	                            <th>Last Exam</th>
	                            <th>Due Exam</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $__currentLoopData = $meds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    	<input type="hidden" name="employee_id" value="<?php echo e($employee->id); ?>">
	                        <tr>
	                            <td scope="row"><input type="hidden" name="medical_id[]" value="<?php echo e($medical->id); ?>"><?php echo e($medical->id); ?> </td>
	                            <td><?php echo e($medical->name); ?></td>
	                            <td><input type="date" name="last_exam[]" class="form-control"></td>
	                            <td><input type="date" name="due_exam[]" class="form-control"></td>
	                            <td><a href="#">Remove</a></td>
	                        </tr>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </tbody>
                	</table>
			            <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eye_test">

                                <label class="form-check-label" for="eye_test" style="color:red;">
                                    <?php echo e(__('Please tick if Employee has driving capabilities')); ?>

                                </label>
                            </div>
                        </div>
	               <div class="form-group">
						<input type="submit" class="btn btn-primary" value="Submit"/>
					</div>
		        </div>

	        
	    </form>
	    </div>
	</div>
</div>
<?php else: ?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>
	                Medicals for <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>

	            </h2>
	        </div>
	        <form id="add-medical" action="<?php echo e(route('employees.addmed')); ?>" method="POST">
	        	<?php echo e(csrf_field()); ?>

		        <div class="body">
		            <table id="mainTable" class="table table-bordered">
	                    <thead>
	                        <tr>
	                            <th>Employee ID</th>
	                            <th>Medical Test Name</th>
	                            <th>Last Exam</th>
	                            <th>Due Exam</th>
	                            <th>Last Updated on</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $__currentLoopData = $medicals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <tr>
	                            <td scope="row"><?php echo e($employee->id); ?></td>
	                            <td><?php echo e($medical->name); ?></td>
	                            <td><?php echo e(date('d-m-Y', strtotime($medical->last_exam))); ?></td>
	                            <td><?php echo e(date('d-m-Y', strtotime($medical->due_exam))); ?></td>
	                            <td><?php echo e(date('d-m-Y', strtotime($medical->updated_at))); ?></td>
	                        </tr>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </tbody>
                	</table>
	               <div class="form-group">
						<a href="/employees/<?php echo e($employee->id); ?>/edit" class="btn btn-primary">Edit Details</a>
					</div>
		        </div>

	        
	    </form>
	    </div>
	</div>
</div>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>