@extends('layouts.master')

@section('content')

@if(!is_null($universities))
<!--gpa create form -->
         <div class="well">
              {{Form::open(array('route'=>'department.store','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Add New University</legend>
                  <div class="form-group">
          
                    {{Form::label('universityname','Universities',array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::select('universityname',$universities,NULL,array('class'=>'form-control'));}}
                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('department', "Department Name:", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('department',NULL,$attributes = array('class'=>'form-control','placeholder'=>"Name Of the Department"))}}

                      {{$errors->first('department')}}
                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('seat', "Available Seats:", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('seat',NULL,$attributes = array('class'=>'form-control','placeholder'=>"Available seats in the Department"))}}

                      {{$errors->first('seat')}}
                    </div>
                  </div>
                 





           
                  <div class="form-group">
                    <div class="col-lg-3 col-lg-offset-2">
                
                      {{Form::submit('Create', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>
              @else
                <h1>Currently There is no University.</h1>
              @endif

@stop


