@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL CUSTOM STYLES -->


<div class="layout-px-spacing">
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Groups</a></li>
                            
                        </ol>
                    </nav>
                </div>
                
                <div class="row layout-top-spacing" id="cancel-row">
                   
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <table id="company-group" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Group</th>
							         	<th>Identity</th>
								        <th>Client</th>
                                        <th>Sites</th>
                                        <th>Action</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($group as $g)
                                 <tr>
                                     <td>{{$g->group}}</td>
                                     <td>{{$g->identity}}</td>
                                     <td>{{$g->client}}</td>
                                     <td>{{$g->sites}}</td>
                                     <td><a href="delete-identity/{{$g->id}}" class="btn btn-danger btn-sm">Delete</a> </td>
                                 </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
                </div>
@endsection