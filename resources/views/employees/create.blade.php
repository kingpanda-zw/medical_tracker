@extends('layouts.app')

@section('content')
<div class="container">

<div class="row clearfix">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="card" style="background: white; padding: 10px;">
			<div class="header">
                <h2>
                    <b>ADD NEW EMPLOYEE</b>
                </h2>
            </div>
			<form method="post" action="{{route('employees.store') }}">
				{{ csrf_field() }}

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
									@foreach($occupations as $occupation)
									<option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
									@endforeach
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
@endsection