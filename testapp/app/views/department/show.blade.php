@extends('layouts/master')

@section('content')

@if(!is_null($department))





<div class="row">
    <div class="col-lg-6">
        <h2>Department Detail:</h2>
    </div>
</div>


<div class="col-lg-4">        

            <div class="panel panel-default">
              <div class="panel-heading">University Name</div>
              <div class="panel-body">
                {{$universities[$department->univ_id]}}
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Name Of the Department</div>
              <div class="panel-body">
                {{$department->department}}
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Available seats in the Department</div>
              <div class="panel-body">
                {{$department->seat}}
              </div>
            </div>




          <div class="col-lg-4">  

          <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">

                  {{ HTML::linkRoute('department.edit','Edit',$parameters =[$department->id],$attributes=['class'=>'btn btn-primary']) }}
                </div>
              </div>
          </div>

            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">Delete</div>
                <div class="panel-body">


                  {{link_to("department/delete/$department->id", 'Delete', $attributes = array("class"=>"btn btn-danger"))}}
                </div>
              </div>
              </div>



          </div>



@else
	<h1>There is no Department with this id.</h1>
@endif

@stop

