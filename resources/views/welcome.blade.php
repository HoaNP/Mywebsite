@extends('layouts.app')

@section('content')
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Contact</h4>                
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('store')}}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">                 
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                            @if (Auth::guest())
                                <input id="name" type="text" class="form-control" name="name" >
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            @else
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::User()->name}}" READONLY>
                            @endif                            
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                        <div class="col-md-6">
                            @if (Auth::guest())
                                <input id="email" type="email" class="form-control" name="email">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            @else
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::User()->email}}" READONLY>
                            @endif                            
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label">Phone</label>
                        <div class="col-md-6">
                            <input id="phone" type="phone" class="form-control" name="phone">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label" >Content</label>
                        <div class="col-md-6">
                            <textarea name="content" id="input" class="form-control" rows="3" required="required"></textarea>  
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="receiver" class="col-md-4 control-label">Receiver</label>
                        <div class='col-md-6'>
                            <select name="receiver" id="input" class="form-control">
                                 <?php  
                                    foreach ($users as $user) {
                                ?>
                                    <option ><?php echo $user->email;?></option>
                                <?php
                                    }
                                 ?>       
                            </select>
                           
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-paper-plane"></i> Send
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>               
                </form>
            </div>        
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
