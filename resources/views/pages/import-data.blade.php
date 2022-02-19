@extends('layouts.main')
@section('title', 'Impoer Data')
@section('content')

<!--  BEGIN CONTENT AREA  -->

<div class="container">
                <div class="container">

                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Import Master</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Sales Import</a></li>
                             </ol>
                             
                        </nav>
                        
                    </div>
                    
                
                    <div class="row layout-top-spacing">
                        <div id="modalVerticallyCentered" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <p class="mb-1" style="text-align: center; font-size: 20px;
                                         font-weight: 800;">Upload Data</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <p class="mb-3" style="text-align: center;">Click on the below buttons to upload a Excel File </p>


                                    <div class="text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#exampleModalCenter">
                                         Upload  New File
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Upload New</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <form id="new_item_master" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    
                                                    <div class="form-row mb-4">
                                                
                                                        <label for="inputState">Import Type</label>
                                                        <select id="itype" class="form-control" name="import_type">
                                                            <option selected disabled>Choose...</option>
                                                            <option value="1">Item Master</option>
                                                            <option value="2">Sale Data</option>
                                                            <option value="3">Purchase Data</option>
                                                            <option value="4">Stock Transfer</option>
                                                            <option value="5">Opening Balance</option>
                                                            
                                                        </select>  
                                                   </div>
                                                   <div class="form-row mb-4">
                                                
                                                <label for="inputState">Identity</label>
                                                <select id="identity" class="form-control" name="identity">
                                                    <option selected disabled>Choose...</option>
                                                     @foreach($identitys as $identity)
                                                     <option value="{{$identity->identity}}">{{$identity->identity}}</option>
                                                     @endforeach
                                                </select>  
                                           </div>
                                           <div class="form-row mb-4">
                                                
                                                <label for="inputState">Client</label>
                                                <select id="client" class="form-control" name="client">
                                                    <option selected disabled>Choose...</option>
                                                     @foreach($clients as $client)
                                                     <option value="{{$client->client}}">{{$client->client}}</option>
                                                     @endforeach
                                                </select>  
                                           </div>
                                                   <div class="custom-file-container" data-upload-id="myFirstImage">
                                        <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                       <label class="custom-file-container__custom-file" >
                                        <input type="file"       class="custom-file-container__custom-file__custom-file-input" id="myCsv" name="file" accept = '.csv'>
         
                                       <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
    
                                      </div>
                                                                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                    <button type="submit" class="btn btn-primary"><span class="indicator-label">Import</span>
		                                          <span class="indicator-progress" style="display: none;">Please wait...
	                                     	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span></button> 
                                                </div>
                                             </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                  
                  
                </div>

                </div>



@endsection