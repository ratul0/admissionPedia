@extends('layouts.master')

@section('content')

@if(!is_null($department))
<!--gpa create form -->
         <div class="well">
              {{Form::open(array('route'=>'department.update','method' => 'put','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Edit University Department</legend>
                  <div class="form-group">
          
                    {{Form::label('universityname','Universities',array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::select('universityname',$universities,$department->univ_id,array('class'=>'form-control'));}}
                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('department', "Department Name:", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('department',$department->department,$attributes = array('class'=>'form-control','placeholder'=>"Name Of the Department"))}}

                      {{$errors->first('department')}}
                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('seat', "Available Seats:", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-3">
                      {{Form::text('seat',$department->seat,$attributes = array('class'=>'form-control','placeholder'=>"Available seats in the Department"))}}

                      {{$errors->first('seat')}}
                    </div>
                  </div>

                  
                  {{Form::hidden('department_id',$department->id)}}

           
                  <div class="form-group">
                    <div class="col-lg-3 col-lg-offset-2">
                
                      {{Form::submit('Update', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>
              @else
                <h1>Currently There is no University.</h1>
              @endif

@stop


