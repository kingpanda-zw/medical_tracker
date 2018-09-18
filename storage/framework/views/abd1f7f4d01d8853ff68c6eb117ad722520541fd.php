<?php $__env->startSection('content'); ?>
<div class="container">

<div class="row clearfix">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="card" style="background: white; padding: 10px;">
			<div class="header">
                <h2>
                    <b>ADD NEW EMPLOYEE</b>
                </h2>
            </div>
			<form method="post" action="<?php echo e(route('employees.store')); ?>">
				<?php echo e(csrf_field()); ?>


				<div class="body table-responsive">
					<div class="row clearfix">
                        <div class="col-sm-12">
			                <div class="form-group">
			                    <div class="form-line">
			                        <input type="text" placeholder="First Name" id="employee-name" required name="first_name" spellcheck="false" class="form-control" value=""/>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <div class="form-line">
			                        <input type="text" placeholder="Surname" id="last-name" required name="last_name" spellcheck="false" class="form-control" value=""/>
			                    </div>
			                </div>
			                            
							<div class="">
								<select class="form-control show-tick" name="occupation_id" id="occupation_id">
									<option value="">-- Please select Occupation--</option>
									<?php $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($occupation->id); ?>"><?php echo e($occupation->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<br>

							<div class="">
								<select class="form-control" name="occupation_type">
									<option value="">-- Please select Occupation Type--</option>
									<option value="permanent">Permanent</option>
									<option value="contract">Contract</option>
								</select>
							</div>
							<br>

		                	<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Continue"/>
							</div>

						</div><!-- end of col-md12-->
					</div><!-- end of row clearfix-->
				</div><!--body table responsive-->
			</form><!-- end of form-->
		</div><!--end of div card class-->
	</div><!-- end of main col-md-12-->
</div><!-- end of main row clearfix -->

</div><!-- end of container-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>