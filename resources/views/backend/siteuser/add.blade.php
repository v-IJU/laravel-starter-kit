@extends('backend.layouts.master')

@section('tittle')
Siteuser Add

@endsection

@section('content')
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
                  <h3 class="card-title">Create Siteuser</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div id="form__data">
                    <input type="text" name="city" id="city"/>
                    <input type="text" name="country" id="country"/>
                    <input type="text" name="pincode" id="pincode"/>
                    <button class="btn btn-dark" disabled="disabled" id="submit__btn">Submit</button>
                </div>
              </div>
          </div>
      </div>
      </div>
    </section>
</div>

@section('script')
<script>

(()=> {
    $('#form__data > input').keyup(function() {

        var empty = false;
        $('#form__data > input').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#submit__btn').attr('disabled', 'disabled'); 
        } else {
            $('#submit__btn').removeAttr('disabled'); 
        }
    });
})()
   
</script>
@endsection
