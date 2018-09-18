@extends('layouts.app')

@section('content')
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
	                    	@foreach($employees as $employee)
	                        <tr>
	                            <th scope="row">{{ $employee->id }}</th>
	                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
	                            <td>{{ $employee->name }}</td>
	                            <td>{{ $employee->occupation_type }}</td>
	                            <td>
	                            	<?php 
	                            		if($employee->medical_status == 0){
		                    				echo "<span class='label bg-red'>&nbsp;Not Available&nbsp;</span>";
		                				}else{
		                					echo "<span class='label bg-green'>&nbsp;Available&nbsp;</span>";
		                				}
		                			?>	
		                		</td>
		                		@if($employee->medical_status == 0)
	                            <td><a href="/employees/{{ $employee->id }}/edit">Edit</a></td>
	                            @else
	                            <td><a href="/employees/{{ $employee->id }}">View</a></td>
	                            @endif
	                        </tr>
	                        @endforeach
	                    </tbody>
                	</table>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection