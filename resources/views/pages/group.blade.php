@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="container">
                <div class="container">

                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Company Setup</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Group</a></li>
                            </ol>
                        </nav>
                        <a href="{{url('group/identity')}}" class="btn btn-primary mb-2 mr-2" >Add Identity</a>
                    </div>
                     
                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Group</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <form method="post" id="add-group">
                                 @csrf
                                <div class="widget-content widget-content-area">
                                   
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Group</label>
                                                <input type="text" class="form-control" id="group" name="group" placeholder="" autocomplete="off">
                                            </div>
       
                                        </div>
                                     <button type="submit" class="btn btn-primary">Save</button> 
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row layout-top-spacing" id="cancel-row">
                
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <table class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                     <th>Group</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($group as $g)
                                <tr>
                                    <td>{{$g->id}}</td>
                                    <td>{{$g->group}}</td>
                                    <td>Delete</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

                </div>
                
@endsection