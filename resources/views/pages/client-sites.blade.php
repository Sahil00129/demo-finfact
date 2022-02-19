@extends('layouts.main')
@section('title', 'Company Group')
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
                       
                    </div>
                     
                 

                        <div class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                           
                                        </div>
                                    </div>
                                </div>
                                <form  id="client_sites" method="post" enctype="multipart/form-data">
                                    @csrf
                                 <div class="widget-content widget-content-area">
                                    <div id="circle-basic" class="">
                                        <h3>Group</h3>
                                        <section>
                                  <div class="form-row mb-4">
                                 <div class="form-group col-md-10">
                                       <label for="inputEmail4">Group</label>
                                             <input type="text" class="form-control" id="group" placeholder="" name="group" autocomplete="off">
                                    </div>
                                    </div>

                                        </section>
                                        <h3>Identity</h3>
                                        <section>
                                           
                                        <div class="form-row mb-4">
                                          <div class="form-group col-md-10">
                                            <label for="inputEmail4">Identity</label>
                                             <input type="text" class="form-control" id="identity" placeholder="" name="identity" autocomplete="off">
                                      </div>
                                    </div>
                                        </section>
                                        <h3>Client</h3>
                                        <section>
                                        <div class="form-row mb-4">
                                          <div class="form-group col-md-10">
                                            <label for="inputEmail4">Client</label>
                                             <input type="text" class="form-control" id="client" placeholder="" name="client" autocomplete="off">
                                      </div>
                                    </div>
                                        </section>
                                        <h3>Sites</h3>
                                        <section>
                                        <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                       <label class="custom-file-container__custom-file" >
                                        <input type="file"       class="custom-file-container__custom-file__custom-file-input" id="sites" name="file" accept = '.csv'>
         
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <button type="submit" class="btn btn-primary">Save</button> 
                                        </section>
                                        
                                    </div>

                                   
                                    </form>
                                </div>
                            </div>
                        </div>
         </div>




@endsection