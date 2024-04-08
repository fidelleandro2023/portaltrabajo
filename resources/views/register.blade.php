@extends('layouts.app_postulante')
@section('content')
<br>
<hr>
<div class="row">
    <div class="col-md-7">
        <h4>Registro de postulante</h4>
        <form id="registeruser" class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
        
            <div class="form-group has-feedback">
                <label for="name" class="col-md-4 control-label">Tipo de documento</label> 
                <div class="col-md-12">
                    <select id="name" type="text" class="form-control" name="doc_type" value="{{ old('doc_type') }}" required autofocus> 
                        <option value="">Selecciona el documento</option>
                        <option value="DNI">Dni</option>
                        <option value="Carnet">Carnet</option>
                    </select>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="name" class="col-md-4 control-label">Documento</label>
        
                <div class="col-md-12">
                    <input id="doc" type="text" class="form-control" name="doc" value="{{ old('doc') }}" required autofocus> 
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger">
                            <strong id="doc-error"></strong>
                        </span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="name" class="col-md-4 control-label">Nombres</label>
        
                <div class="col-md-12">
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus> 
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger">
                            <strong id="first_name-error"></strong>
                        </span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="name" class="col-md-4 control-label">Apellidos</label>
        
                <div class="col-md-12">
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus> 
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span class="text-danger">
                            <strong id="last_name-error"></strong>
                        </span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="email" class="col-md-4 control-label">Fecha de nacimiento</label>
        
                <div class="col-md-12">
                    <input id="birthdate" type="birthdate" class="form-control" name="birthdate" value="{{ old('birthdate') }}" required> 
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span class="text-danger">
                            <strong id="birthdate-error"></strong>
                        </span>
                </div>
            </div>
        
            <div class="form-group has-feedback">
                <label for="job_title" class="col-md-4 control-label">Email</label>
        
                <div class="col-md-12">
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        
                        <span class="glyphicon glyphicon-job form-control-feedback"></span>
                        <span class="text-danger">
                            <strong id="email-error"></strong>
                        </span>
                </div>
            </div>
        
            <div class="form-group has-feedback">
                <label for="password" class="col-md-4 control-label">Password</label>
        
                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" name="password" required>
        
                   <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span class="text-danger">
                        <strong id="password-error"></strong>
                    </span>
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="submitForm">
                        Registrar
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-5">
        <img src="{{asset('images/businesswoman.jpg')}}" width="100%" alt="">
    </div>
</div>

<hr>
@endsection