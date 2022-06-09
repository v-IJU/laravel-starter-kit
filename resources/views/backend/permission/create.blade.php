@extends('backend.layouts.master')

@section('tittle')
Permission Create

@endsection

@section('content')
<style type="text/css">
	.card-primary:not(.card-outline)>.card-header {
    background-color: #17a2b8!important;
}
.head{
  color: white;
    padding: 1px;
    background-color: #17a2b8;
    text-align: center;
}
.checkbox-list{
  padding: 20px;
}
.permissionlist{
  margin-top: 40px;
}
}
</style>
 <div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Permission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Permission</li>
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
                <h3 class="card-title">{{@$permission ? 'Update Permission ' :'Create a New Permission'}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="{{@$permission ? 'put' :'post'}}" action="{{@$permission ? route('permission.update',$permission->id) :route('permission.store') }}">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="permissionname">Permission Name</label>
                    <input type="text" class="form-control @error('permissionname') is-invalid @enderror" id="rolename" placeholder="Permission Name" name="permissionname" value="{{@$permission? $permission->name : ''}}" value="{{ old('permissionname') }}">
                    @error('permissionname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="rolename">Slug <small>(Route name)</small></label>
                    <input type="text" class="form-control @error('slugname') is-invalid @enderror" id="slug" placeholder="Slug Name" name="slugname" value="{{@$permission? $permission->name : ''}}" value="{{ old('slugname') }}"">
                    @error('slugname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="rolename">Group</label>
                    <input type="text" class="form-control @error('groupname') is-invalid @enderror" id="group" placeholder="Group Name" name="groupname" value="{{@$permission? $permission->name : ''}}" value="{{ old('groupname') }}"">
                    @error('groupname')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>



                     

                  


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Add</button>
                </div>
              </form>
            </div>
        </div>
    </div>
    </div>
  </section>
</div>
@endsection
