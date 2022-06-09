@extends('backend.layouts.master')

@section('tittle')
Role List

@endsection

@section('content')
<style type="text/css">
	.addbtn{
		text-align: right;
	}
</style>


    <!-- Main content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Roles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
              	<div class="row">
              		<div class="col-md-8">
              			<h3 class="card-title" id="cartdt">Roles List</h3>
              		</div>
              		<div class="col-md-4 addbtn">
              			<a href="{{route('role.create')}}"><button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Add New</button></a>
              		</div>
              	</div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="noExport">{!! Form::checkbox('select_all', 'checked_all', false, array('id'=>'select-all-item')) !!}{!! Html::decode(Form::label('select-all-item','<span></span>')) !!}</th>
                    <th>No</th>
                    <th>Roll Name</th>
                   
                    <th class="noExport">Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                  </tbody>
                  <tfoot>
                    <tr>
                    <th class="noExport">{!! Form::checkbox('select_all', 'checked_all', false, array('id'=>'select-all-item')) !!}{!! Html::decode(Form::label('select-all-item','<span></span>')) !!}</th>
                     <th>No</th>
                    <th>Roll Name</th>
                   
                    <th class="noExport">Action</th>
                  
                  </tr>
                  </tfoot>
               

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@section('script')
<script>
  
        $('document').ready(function(){

         
            $("#example1").DataTable({


              "lengthMenu": [ 10, 25, 50, 75, 100 ],
              "responsive": true, "lengthChange": false, "autoWidth": false,
               dom: 'Bfrtip',
               buttons: ["copy", "csv", "excel", "pdf", "print"],
              
                    
               ajax: "{{ route('role.getrolluser_data') }}",

              columns: [
              { data: 'check', name: 'check', searchable: false, sortable: false , width: '9%' , render : function(data, type, row, meta)
                    {
                        return '<input id="'+data+'" class="check_class" type="checkbox" value='+row["id"]+' name="selected_Products[]"><label for="'+data+'"><span></span></label>';
                    }
                },
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            
           
            { data: 'action', name: 'id', searchable: false, sortable: false, className: 'textcenter'},
               
            
          
        ],
        
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            


          

        });
    
</script>
<script>
$(function(){
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
});
</script>



@endsection
@endsection