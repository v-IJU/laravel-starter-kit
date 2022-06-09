@extends('backend.layouts.master')

@section('tittle')
Lfm Configuration

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lfm Configuration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lfm Configuration</li>
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
                <h3 class="card-title">Lfm Configurations</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="mail_host">Lfm Image</label>
                              <div class="input-group">
                                <span class="input-group-btn">
                                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="filepath">
                              </div>
                              <div id="holder" style="margin-top:15px;max-height:100px;">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mail_host">Summer Note</label>
                                <textarea id="summernote" name="editordata"></textarea>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                      <div id="google_map"></div>
                    </div>
                 </div>
                <!-- /.card-body -->

              
              
            </div>
        </div>
    </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
  $('#lfm').filemanager('image');
</script>
{{-- //summernote --}}
<script>
  $(document).ready(function() {
      $('#summernote').summernote({
        placeholder: 'Hello Type Here..',
        tabsize: 2,
        height: 300
      });
  });
</script>
@endsection