@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<?php
//echo'<pre>'; print_r($user->identity); die;
?>
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Create user
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Users</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method'=>'PATCH']) !!}
                <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-md-6">
                    <strong>Identity</strong>
                    <select class="form-control form-small" name="identity"> 
               
                          <option value="{{$user->identity}}">{{$user->identity}}</option>
                        
                        </select>
                  </div>
                  </div>
                  <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-md-6">
                    <strong>Client</strong>
                    <select class="form-control tagging" name="client[]" multiple="multiple"> 
                          <option selected="selected">{{$user->client}}</option>
                            @foreach($clients as $cl)
                            <option value="{{$cl->client}}">{{$cl->client}}</option>
                            @endforeach
                        </select>
                  </div>
                  </div>
                  <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <strong>Password:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-md-6">
                    <strong>Warehouse Sites</strong>
                    <select class="form-control tagging" name="sites[]" multiple="multiple"> 
                          <?php
                            $explodedSites = explode(',', $sites[0]->sites);
                            //echo'<pre>'; print_r($explodedSites); die;
                          ?>
                          @foreach($explodedSites as $site)
                          <option selected value="{{$site}}">{{$site}}</option>
                            @endforeach
                            @foreach($sites as $sit)
                            <option value="{{$sit->sites}}">{{$sit->sites}}</option>
                            @endforeach
                            
                        </select>
                  </div>
             </div>
                  <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                    

                       </div>
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection