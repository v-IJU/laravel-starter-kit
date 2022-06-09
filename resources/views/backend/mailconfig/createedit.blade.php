@extends('backend.layouts.master')

@section('tittle')
Mail Configuration

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mail Configuration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mail Configuration</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Mail Configurations</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('mailconfig.update',@$mailconfig->id) }}" method="post">
              	@csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="permissionname">Mail Transport</label>
                                <input type="text" class="form-control @error('mail_transport') is-invalid @enderror" id="mail_transport" placeholder="mail_transport" name="mail_transport" value="{{@$mailconfig? $mailconfig->mail_transport :  old('mail_transport') }}" >
                                @error('mail_transport')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mail_host">Mail Host</label>
                                <input type="text" class="form-control @error('mail_host') is-invalid @enderror" id="mail_host" placeholder="mail_host" name="mail_host" value="{{@$mailconfig? $mailconfig->mail_host :  old('mail_host') }}" >
                                @error('mail_host')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mail_host">Mail Port</label>
                                <input type="text" class="form-control @error('mail_port') is-invalid @enderror" id="mail_port" placeholder="mail_port" name="mail_port" value="{{@$mailconfig? $mailconfig->mail_port :  old('mail_port') }}" >
                                @error('mail_port')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mail_host">Mail User Name</label>
                                <input type="text" class="form-control @error('mail_username') is-invalid @enderror" id="mail_username" placeholder="mail_username" name="mail_username" value="{{@$mailconfig? $mailconfig->mail_username :  old('mail_username') }}" >
                                @error('mail_username')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mail_host">Mail Password</label>
                                <input type="password" class="form-control @error('mail_password') is-invalid @enderror" id="mail_password" placeholder="mail_password" name="mail_password" value="{{@$mailconfig? $mailconfig->mail_password :  old('mail_password') }}" >
                                @error('mail_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mail_host">Mail Encryption</label>
                                <input type="text" class="form-control @error('mail_encryption') is-invalid @enderror" id="mail_encryption" placeholder="mail_encryption" name="mail_encryption" value="{{@$mailconfig? $mailconfig->mail_encryption :  old('mail_encryption') }}" >
                                @error('mail_encryption')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mail_host">Mail From</label>
                                <input type="text" class="form-control @error('mail_from') is-invalid @enderror" id="mail_from" placeholder="mail_from" name="mail_from" value="{{@$mailconfig? $mailconfig->mail_from :  old('mail_from') }}" >
                                @error('mail_from')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                 </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update</button>
                </div>
              </form>
            </div>
        </div>
    </div>
    </div>
  </section>
</div>
@endsection