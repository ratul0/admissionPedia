@extends('layouts/master')

@section('content')






@if(!is_null($university))


	         <div class="well">
              {{Form::open(array('route'=>'university.update','method' => 'put','class'=>'bs-example form-horizontal'))}}

              <fieldset>
                  <legend>Add New University</legend>
                  <div class="form-group">
                    {{Form::label('name', "University Name:", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('name', $university->universityname,$attributes = array('class'=>'form-control','placeholder'=>"Type University Name"))}}
            
                      {{$errors->first('name')}}


                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('about', "About", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::textarea('about',$university->about,$attributes = array('class'=>'form-control','placeholder'=>"Write Something about this university..."))}}

                      {{$errors->first('about')}}
                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('capacity', "Capacity:", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('capacity', $university->capacity,$attributes = array('class'=>'form-control','placeholder'=>"capacity of this university"))}}
            
                      {{$errors->first('capacity')}}


                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('science', "Science", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('science',$university->science,$attributes = array('class'=>'form-control','placeholder'=>"Minimum Gpa required"))}}

                      {{$errors->first('science')}}
                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('arts', "Arts", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('arts',$university->arts,$attributes = array('class'=>'form-control','placeholder'=>"Minimum Gpa required"))}}

                      {{$errors->first('arts')}}
                    </div>
                  </div>
                 

                 <div class="form-group">
                    {{Form::label('commerce', "Commerce", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('commerce',$university->commerce,$attributes = array('class'=>'form-control','placeholder'=>"Minimum Gpa required"))}}

                      {{$errors->first('commerce')}}
                    </div>
                  </div>
                 

                 <div class="form-group">
                    {{Form::label('seatplan', "Seat Plan URL:", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('seatplan', $university->seatplan,$attributes = array('class'=>'form-control','placeholder'=>"URL for the seatplan"))}}
            
                      {{$errors->first('seatplan')}}


                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('admissiondate', "Addmission Date:", $attributes = array('class'=>'col-lg-2 control-label'))}}



                    <div class="col-lg-3">
                      {{Form::text('admissiondate', $university->admissiondate,$attributes = array('class'=>'form-control','id'=>'sandbox-container','placeholder'=>"dd--mm--yyyy"))}}
            
                      {{$errors->first('admissiondate')}}


                    </div>
                  </div>

                  {{Form::hidden('university_id',$university->id)}}
           
                  <div class="form-group">
                    <div class="col-lg-3 col-lg-offset-2">
                
                      {{Form::submit('Edit', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
        
                  

                </fieldset>
              {{Form::close()}}
            </div> 

<script>            
  $('#sandbox-container').datepicker({
      format: "dd-mm-yyyy",
      todayBtn: true
  });
</script>

@else
  <h1>There is no account with this id.</h1>
@endif

@stop