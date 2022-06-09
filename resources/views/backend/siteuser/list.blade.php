@extends('backend.layouts.master')

@section('tittle')
Siteuser List

@endsection

@section('content')



    <!-- Main content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{__('text.DataTables')}}</li>
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
                <h3 class="card-title" id="cartdt">{{__('text.DataTables')}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="noExport">{!! Form::checkbox('select_all', 'checked_all', false, array('id'=>'select-all-item')) !!}{!! Html::decode(Form::label('select-all-item','<span></span>')) !!}</th>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phonenumber</th>
                    <th>Status</th>
                    <th class="noExport">Action</th>

                  </tr>
                  </thead>
                  <tbody>


                  </tbody>
                  <tfoot>
                    <tr>
                    <th class="noExport">{!! Form::checkbox('select_all', 'checked_all', false, array('id'=>'select-all-item')) !!}{!! Html::decode(Form::label('select-all-item','<span></span>')) !!}</th>
                     <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phonenumber</th>
                    <th>Status</th>
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


            var element = $("#example1");
            var url =  '{{route('getsiteuser_data')}}';

              var column= [
              { data: 'check', name: 'check', searchable: false, sortable: false , width: '9%' , render : function(data, type, row, meta)
                    {
                        return '<input id="'+data+'" class="check_class" type="checkbox" value='+row["id"]+' name="selected_Users[]"><label for="'+data+'"><span></span></label>';
                    }
                },
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phonenumber', name: 'phonenumber'},
           { data: 'status', name: 'id', searchable: false, sortable: false, className: 'textcenter',render : function(data, type, row, meta)
                    {
                        return `<label class="switch">
                        <input type="checkbox" id=${row['id']} ${row['status'] ? 'checked':''} class="toggle-class" onchange="myFunction(this.id)">
                        <span class="slider round"></span>
                      </label>`;
                    }
                  },

            { data: 'action', name: 'id', searchable: false, sortable: false, className: 'textcenter'},



          ];
          var csrf = '{{ csrf_token() }}';

            var options  = {

                button : [
                    {
                        name : "Enable" ,
                        url : ""
                    },
                    {
                        name : "Disable",
                        url : ""
                    },
                    {
                        name : "Trash",
                        url : ""
                    },
                    {
                        name : "Delete",
                        url : "{{route('destroy.siteuser',1)}}",
                        method : "DELETE"
                    }
                ],

            }

            dataTable(element,url,column,csrf,options);





        });

</script>
<script>
$(function(){
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
});
</script>
<script>
  function myFunction(id){
    var status = $('.toggle-class').prop('checked') == true ? 1 : 0;
       var userid=id;


         $.ajax({
           type: "GET",
            dataType: "json",
            url: '{{route('statuschange.siteuser')}}',
            data: {'status': status, 'userid': userid},
            success: function(data){

               const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{

                    Toast1.fire({
                        type: 'error',
                        title: data.error
                    })
                }
            },
            error: function (data) {
                console.log(data.responseText);
                const Toast1 = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'error',
                      showConfirmButton: false,
                      timer: 3000
                    })
                    Toast1.fire({
                        type: 'error',
                        title: data.responseText
                    })
            }

         });

}
  </script>


@endsection
@endsection
