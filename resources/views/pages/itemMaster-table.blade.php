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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Item Master</a></li>
                            
                        </ol>
                    </nav>
                </div>
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <table>
							<!--begin::Table row-->
							<tr id="filters">
                            <th>ITEM NAME</th>
							         	<th>ITEM NUMBER</th>
								        <th>PACKAGING</th>
                                        <th>GROUP</th>
                                        
                                        
                                        
							</tr>
                 </table>      
                        <div class="widget-content widget-content-area br-6">
                            <table id="itemList" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ITEM NAME</th>
							         	<th>ITEM NUMBER</th>
								        <th>PACKAGING</th>
                                        <th>GROUP</th>
                                        <th>ACTION</th>
								       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemmasters as $itemmaster)
                                    <tr>
                                        <td>{{$itemmaster->item_name}}</td>
                                        <td>{{$itemmaster->item_number}}</td>
                                        <td>{{$itemmaster->pack}}</td>
                                        <td>{{$itemmaster->group}}</td>
                                        <td><a href="delete-courierCompany/{{$itemmaster->id}}" class="btn btn-danger btn-sm">Delete</a>  
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                </div>


               
@endsection