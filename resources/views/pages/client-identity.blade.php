@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="container">
                <div class="container">

                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Company Setup</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Client</a></li>
                            </ol>
                        </nav>
                       
                    </div>
                     
                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Client</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <form method="post" id="add-identity-client">
                                 @csrf
                                <div class="widget-content widget-content-area">
                                   
                                <div class="form-row mb-4">
                                <div class="form-group col-md-4">
                                        <label for="inputState">Group</label>
                                        <select id="group" name="group" class="form-control">
                                            @foreach($lgroup as $lg)
                                            <option value="{{$lg->group}}" selected>{{$lg->group}}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Identity</label>
                                        <select id="identity" name="identity" class="form-control">
                                             <option selected disabled>select..</option>
                                            @foreach($lidentity as $lg)
                                            <option value="{{$lg->identity}}">{{$lg->identity}}</option>  
                                            @endforeach
                                    </select>
                                    </div>
                                    </div>

                                        <div class="form-row mb-4">
                                       <div class="form-group col-md-4">
                                      <label for="inputEmail4">Client</label>
                                      <input type="text" class="form-control" id="client" placeholder="" name="client" autocomplete="off">
                                      </div>
                                    </div>
                                              
                            
                                     <button type="submit" class="btn btn-primary">Save</button> 
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

         </div>




@endsection