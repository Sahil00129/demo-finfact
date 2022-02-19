@extends('layouts.main')
@section('title', 'Single Pdf')
@section('content')
<?php
  //$c = (json_decode($client));
  
  //echo'<pre>'; print_r($explodedString); die;
  
?>

<div class="container">
                <div class="container">

                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Get PDF</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Single Pdf</a></li>
                            </ol>
                        </nav>
                    </div>
                     
                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Filter Data</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <form method="post" action="{{ url('/generate-pdf') }}" id="filterSale">
                                 @csrf
                                <div class="widget-content widget-content-area">

                                <div class="form-row mb-4">   
                                <div class="form-group col-md-4">
                                        <label for="inputState">Identity</label>
                                        <select id="identity" name="identity" class="form-control">         
                                        @foreach($identity as $idty)
                                            <option value="{{$idty->identity}}">{{$idty->identity}}</option>
                                        @endforeach
                                           
                                              
                                          </select>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputState">Client</label>
                                        <select id="client" name="client" class="form-control">

                                            <?php
                                            $role = Auth::user()->role;
                                            if($role == 'super admin'){?>
                                                 @foreach($client as $cl)
                                                <option value="{{$cl->client}}">{{$cl->client}}</option>
                                                @endforeach
                                              </select>
                                           <?php }else{ ?>
                                            
                                             <?php   
                                             $explodedString = explode(',', $client[0]->client);
                                             //echo'<pre>'; print_r($client); die;
                                             ?>
                                           @foreach($explodedString as $cl)
                                            <option value="{{$cl}}">{{$cl}}</option>
                                           @endforeach
                                          </select>
                                       <?php  }  ?>
                                           
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="inputState">Site</label>
                                        <select id="siteId" name="site_id" class="form-control">

                                            <?php
                                            $role = Auth::user()->role;
                                            if($role == 'super admin'){?>
                                                 @foreach($site as $s)
                                                <option value="{{$s->sites}}">{{$s->sites}}</option>
                                                @endforeach
                                              </select>
                                           <?php }else{  ?>
                                          <?php 
                                            $explodedSites = explode(',', $site[0]->sites);
                                          ?>
                                            @foreach($explodedSites as $site)
                                            <option value="{{$site}}">{{$site}}</option>
                                              @endforeach
                                              
                                          </select>
                                     <?php } ?>

                                      </div>
                                    </div>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">From</label>
                                                <input type="date" class="form-control" id="fromDate" name="fromDate" placeholder="" autocomplete="off" Required>
                                            </div>

                                            <div class="form-group col-md-6">
                                            
                                                <label for="inputEmail4">To</label>
                                                <input type="date" class="form-control" id="toDate" name="toDate" placeholder="" autocomplete="off" Required>
                                            </div>       
                                        </div>
                                        <div class="form-row mb-4">
                              
                                      <div class="form-group col-md-6">
                                          <label for="inputState">Group</label>
                                          <select id="igroup" name="group" class="form-control">
                                              <option selected>Select...</option>
                                              @foreach($list as $l)

                                              <option value="{{$l->group}}">{{$l->group}}</option>
                                              @endforeach
                                             
                                          </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="inputState">Packing</label>
                                          <select id="ipacking" name="packing" class="form-control">
                                              <option selected>Select...</option>
                                                   
                                          </select>
                                      </div>
                                  </div>
                                     <button type="submit" class="btn btn-primary">Get Data</button> 
                                     <div class="spinner-border text-primary  align-self-center"  id ="singleloader" style="display: none;"></div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
@endsection