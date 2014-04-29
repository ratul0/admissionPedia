@extends('layouts/master')

@section('content')

	<div id="department">


			@if(!$department->isEmpty())
	      		<div class="bs-example table-responsive">
              		<table class="table table-striped table-bordered table-hover">
	                <thead>
	                  <tr>
	                    <th>University Name</th>
	                    <th>Department Name</th>
	                    <th>Seats</th>
	                    
	                  </tr>
	                </thead>
                	<tbody>
					
                		@foreach($department as $data )
							<tr>
	                			<td>{{e($universities[$data->univ_id])}}</td>
	                			
			                    <td>{{e($data->department)}}</td>

			                    <td>{{e($data->seat)}}</td>


			                    <td>{{ HTML::linkRoute('department.show','View',$parameters =[$data->id],$attributes=['class'=>'btn btn-primary']) }}</td>

			                    <td>{{ HTML::linkRoute('department.edit','Edit',$parameters =[$data->id],$attributes=['class'=>'btn btn-primary']) }}</td>

                			

							</tr>
	                	@endforeach
	                </tbody>
	              </table>
	            </div>
	            @else
	            	<h1>Currently There is no Department.</h1>
	            @endif


	</div>


@stop
