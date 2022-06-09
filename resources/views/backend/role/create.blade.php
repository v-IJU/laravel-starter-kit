@extends('backend.layouts.master')

@section('tittle')
Role Create

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
            <h1>Create Roll</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Role</li>
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
                <h3 class="card-title">{{@$role_id ? 'Update Role ' :'Create a New Role'}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{@$role_id ? route('role.update',$role_id->id) :route('role.store') }}">
              	@csrf
                @if(@$role_id)
                {{ method_field("PUT") }}
                @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="rolename">Role Name</label>
                    <input type="text" class="form-control" id="rolename" placeholder="Role Name" name="rolename" value="{{@$role_id? $role_id->name : ''}}">
                  </div>



                      <div class="form-group permissionlist">
                      <label for="rolename">Permissions</label>
                    </div>

                  <div class="row ">


                     <br>
                    @foreach($permissionlist as $permission=>$id)
                    <div class="col-md-3">
                      <div class="head">
                         <h4>{{$permission}}</h4>
                      </div>

                      <div class="checkbox-list">
                        @foreach($id as $key=>$value)
                          @foreach($value as $pid=>$pname)
                        <div class="form-check">
                            @if(@$role_id)
                            <input class="form-check-input" type="checkbox" {{@$role_id->permissions->contains(@$pid)? 'checked':''}}  value="{{$pid}}" id="flexCheckDefault" name="permission[]">
                            @else
                            <input class="form-check-input" type="checkbox"   value="{{$pid}}" id="flexCheckDefault" name="permission[]">
                            @endif

                          <label class="form-check-label" for="flexCheckDefault">
                            {{$pname}}
                          </label>
                          </div>
                          @endforeach
                        @endforeach
                      </div>

                    </div>
                    @endforeach

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
