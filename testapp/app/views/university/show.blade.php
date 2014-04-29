@extends('layouts/master')

@section('content')

@if(!is_null($university))





<div class="row">
    <div class="col-lg-6">
        <h2>University Detail:</h2>
    </div>
</div>


<div class="col-lg-4">        

            <div class="panel panel-default">
              <div class="panel-heading">University Name</div>
              <div class="panel-body">
                {{$university->universityname}}
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">About</div>
              <div class="panel-body">

                {{Str::limit($university->about, 10, '...')}}
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Capacity</div>
              <div class="panel-body">
                {{$university->capacity}}
              </div>
            </div>


            
            <div class="panel panel-default">
              <div class="panel-heading">Required GPA for Science</div>
              <div class="panel-body">
                {{$university->science}}
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Required GPA for Science</div>
              <div class="panel-body">
                {{$university->arts}}
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Required GPA for Science</div>
              <div class="panel-body">
                {{$university->commerce}}
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Admission Date</div>
              	@if($university->admissiondate)
	              <div class="panel-body">
	                {{$university->admissiondate}}
	              </div>
	          	@else
	          		{{"Admission Date not published yet."}}
	          	@endif
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Seat Plan</div>
              	@if($university->seatplan)
	              <div class="panel-body">
	                {{$university->seatplan}}
	              </div>
	          	@else
	          		{{"Seat Plan is not published yet."}}
	          	@endif
            </div>


          <div class="col-lg-4">  

          <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">

                  {{ HTML::linkRoute('university.edit','Edit',$parameters =[$university->id],$attributes=['class'=>'btn btn-primary']) }}
                </div>
              </div>
          </div>

            <div class="col-lg-4">
              <div class="panel panel-default">
                <div class="panel-heading">Delete</div>
                <div class="panel-body">

                  {{link_to("university/delete/$university->id", 'Delete', $attributes = array("class"=>"btn btn-danger"))}}
                </div>
              </div>
              </div>



          </div>



@else
	<h1>There is no University with this id.</h1>
@endif

@stop