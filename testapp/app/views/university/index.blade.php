@extends('layouts/master')

@section('content')

	<div id="university">


			@if(!$university->isEmpty())
	      		<div class="bs-example table-responsive">
              		<table class="table table-striped table-bordered table-hover">
	                <thead>
	                  <tr>
	                    <th>University Name</th>
	                    <th>About</th>
	                    <th>Capacity</th>
	                    <th>Required Gpa for Science</th>
	                    <th>Required Gpa for Arts</th>
	                    <th>Required Gpa for Commerce</th>
	                    <th>Admission Date</th>
	                    <th>Seat Plan</th>
	                  </tr>
	                </thead>
                	<tbody>
					
                		@foreach($university as $data )
							<tr>
	                			<td>{{e($data->universityname)}}</td>
	                			
			                    <td>{{e($data->about)}}</td>

			                    <td>{{e($data->capacity)}}</td>

			                    <td>{{e($data->science)}}</td>

			                    <td>{{e($data->arts)}}</td>

			                    <td>{{e($data->commerce)}}</td>

			                    @if($data->admissiondate)

			                    	<td>{{e($data->admissiondate)}}</td>
			                    @else
			                    	<td>{{"Admission Date not published yet."}}</td>
			                    	
			                    @endif

			                    
			                    @if($data->seatplan)

			                    	<td>{{e($data->seatplan)}}</td>
			                    @else
			                    	<td>{{"Seat Plan not published yet."}}</td>
			                    @endif


			                    <td>{{ HTML::linkRoute('university.show','View',$parameters =[$data->id],$attributes=['class'=>'btn btn-primary']) }}</td>

			                    <td>{{ HTML::linkRoute('university.edit','Edit',$parameters =[$data->id],$attributes=['class'=>'btn btn-primary']) }}</td>

                			

							</tr>
	                	@endforeach
	                </tbody>
	              </table>
	            </div>
	            @else
	            	<h1>Currently There is no Accounts.</h1>
	            @endif


	</div>


@stop
