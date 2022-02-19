@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
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
                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="form-row mb-4">
                    <div class="form-group col-md-6">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-md-6">
                    <strong>Identity</strong>
                    <select class="form-control form-small" name="identity"> 
                          <option selected="selected" disabled>select identity..</option>
                            @foreach($identitys as $i)
                            <option value="{{$i->identity}}">{{$i->identity}}</option>
                            @endforeach
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
                     
                    <select class="form-control tagging" name="client[]"multiple="multiple">
                   
                                     @foreach($clients as $c)
                                  <option value="{{$c->client}}">{{$c->client}}</option>
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
                    <strong>Sites</strong>
                                    <select class="form-control tagging" name="sites[]" multiple="multiple">
                                    @foreach($sites as $s)
                                     <option value="{{$s->sites}}">{{$s->sites}}</option>
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
                        <select class="form-control" name="role" multiple="multiple">
                                    @foreach($roles as $r)
                                     <option value="{{$r->name}}">{{$r->name}}</option>
                                     @endforeach
                                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection


