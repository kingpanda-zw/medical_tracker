@extends('layouts.app')

@section('content')
<div class="container">

<div class="row clearfix">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="card" style="background: white; padding: 10px;">
			<div class="header">
                <h2>
	                {{ $employee->first_name }} {{ $employee->last_name }}
	            </h2>
            </div>
			<form method="post" action="{{route('employees.update',[$employee->id]) }}">
				{{ csrf_field() }}

				<input type="hidden" name="_method" value="put">

				<div class="body table-responsive">
					<div class="row clearfix">
                        <div class="col-sm-12">
			                <div class="form-group">
			                    <div class="form-line">
			                        <input type="text" placeholder="First Name" id="employee-name" required name="first_name" spellcheck="false" class="form-control" value="{{ $employee->first_name }}"/>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <div class="form-line">
			                        <input type="text" placeholder="Surname" id="last-name" required name="last_name" spellcheck="false" class="form-control" value="{{ $employee->last_name }}"/>
			                    </div>
			                </div>
			                            
							<div class="">
								<input type="text" id="last-name" name="last_name" spellcheck="false" class="form-control" value="{{ $occupation->name }}" disabled="" />
								<span class="small" style="color: red;"> *Occupation can not be edited</span>
							</div>
							<br>

							<div class="">
								<select class="form-control" name="occupation_type">
									<option value="{{ $employee->occupation_type }}" selected>{{ $employee->occupation_type }}</option>
									<option value=""></option>
									<option value="">-- Please select new occupation type--</option>
									<option value="permanent">Permanent</option>
									<option value="contract">Contract</option>
								</select>
							</div>
							<br>

							<div class="header">
				                <h2>
					                <b>Medicals for {{ $employee->first_name }} {{ $employee->last_name }}</b>
					            </h2>
				            </div>

							<!--medicals table-->
							<table id="mainTable" class="table table-bordered">
			                    <thead>
			                        <tr>
			                            <th>#</th>
			                            <th>Medical Test Name</th>
			                            <th>Last Exam</th>
			                            <th>Due Exam</th>
			                            <th>Last Updated on</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                    	@foreach($medicals as $medical)
			                    	<input type="hidden" name="employee_id" value="{{ $employee->id }}">
			                    	<input type="hidden" name="id[]" value="{{ $medical->id }}">
			                        <tr>
			                            <td scope="row"><input type="hidden" name="medical_id[]" value="{{ $medical->medical_id }}">{{ $medical->medical_id }} </td>
			                            <td>{{ $medical->name }}</td>
			                            <td><input type="date" name="last_exam[]" value="{{ $medical->last_exam }}" class="form-control"></td>
			                            <td><input type="date" name="due_exam[]" value="{{ $medical->due_exam }}" class="form-control"></td>
			                            <td>{{ date('d-m-Y', strtotime($medical->updated_at)) }}</td>
			                        </tr>
			                        @endforeach
			                    </tbody>
		                	</table>

			               <p style="color:red;"><b>Employee</b> has driving capabilities &nbsp;<input type="checkbox" checked> </p>

		                	<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Update Details"/>
							</div>

						</div><!-- end of col-md12-->
					</div><!-- end of row clearfix-->
				</div><!--body table responsive-->
			</form><!-- end of form-->
		</div><!--end of div card class-->
	</div><!-- end of main col-md-12-->
</div><!-- end of main row clearfix -->

{{--<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>
	                Medicals for {{ $employee->first_name }} {{ $employee->last_name }}
	            </h2>
	        </div>
	        <form id="update-medical" action="{{route('employees.updatemed') }}" method="POST">
	        	{{ csrf_field() }}

	        	<input type="hidden" name="_method" value="put">

		        <div class="body">
		            <table id="mainTable" class="table table-bordered">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th>Medical Test Name</th>
	                            <th>Last Exam</th>
	                            <th>Due Exam</th>
	                            <th>Last Updated on</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($medicals as $medical)
	                    	<input type="hidden" name="employee_id" value="{{ $employee->id }}">
	                    	<input type="hidden" name="id" value="{{ $medical->id }}">
	                        <tr>
	                            <td scope="row"><input type="hidden" name="medical_id[]" value="{{ $medical->id }}">{{ $medical->medical_id }} </td>
	                            <td>{{ $medical->name }}</td>
	                            <td><input type="date" name="last_exam[]" value="{{ $medical->last_exam }}" class="form-control"></td>
	                            <td><input type="date" name="due_exam[]" value="{{ $medical->due_exam }}" class="form-control"></td>
	                            <td>{{ date('d-m-Y', strtotime($medical->updated_at)) }}</td>
	                        </tr>
	                        @endforeach
	                    </tbody>
                	</table>
			               <p style="color:red;"><b>Employee</b> has driving capabilities &nbsp;<input type="checkbox" checked> </p>
	               <div class="form-group">
						<input type="submit" class="btn btn-primary" value="Update Medicals"/>
					</div>
		        </div>

	        
	    </form>
	    </div>
	</div>
</div>--}}

</div><!-- end of container-->
@endsection