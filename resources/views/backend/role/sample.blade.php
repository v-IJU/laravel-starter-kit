@extends('backend.layouts.master')

@section('tittle')
Role Create

@endsection

@section('content')

<table width="100%" border="0" cellspacing="0" cellpadding="0" id="table-data">
    <thead>
        <tr>
        <td>Day</td>
        <td>SelectOne</td>
        <td>Select two</td>
        
        
        <td>Add</td>
    </tr>
    </thead>
    
    @foreach(@$nodays as $key=>$days)
    <tr>
    	<?php $ind=$loop->iteration?>
    	<td>
    		<input type="text" name="day[{{$ind}}]" id="day{{$ind}}" class="days" data-id={{$key}} value="{{$days}}">
    		<input type="text" name="hidden{{$ind}}" value="{{$key}}" id="hidden{{$ind}}">
    	</td>
        <td>
            <select id="Id{{$ind}}" name="Id[{{$ind}}][45]">
                <option value=1>One</option>
                <option value=2>Two</option>
            </select>
        </td>
        <td>
            <select id="Id{{$ind}}" name="Id[{{$ind}}][46]">
                <option value=1>One</option>
                <option value=2 selected="">Two</option>
            </select>
        </td>
        
       
        <td><input type="button" class="addButton" value="Add" id="" /></td>
    </tr>
    @endforeach
    
</table>
<a href="{{route('export.excel')}}" class="btn btn-primary">Export</a>
@section('script')

<script>
	'use strict';
	$(document).ready(function(){
		
       
		let $clone;
		var $data_id;
		
		var daydata = <?php echo json_encode($data); ?>;
		var emparr=[];
		var index;
		let clicking=true;
		//document.querySelector(".days").value = emparr[index];
    $("#table-data").on('click', 'input.addButton', function() {
    	if(clicking){
    		
        var $tr = $(this).closest('tr');
        var allTrs = $tr.closest('table').find('tr');
        var $lastTr = allTrs[allTrs.length-1];
        //console.log($lastTr);
         $clone = $($lastTr).clone();
         
        	var dl=$($lastTr).find('> td:first-child > input');
            $data_id=dl.data("id");
           console.log($data_id);
            for (var i = $data_id+1; i <=daydata.length-1; i++) {
            	emparr.push(daydata[i]);
            }

            if(index<emparr.length-1)
            {
		    index++;
		    }
		  else{
		    index=0;
		      }
		      //console.log(daydata);
		//console.log(emparr);
		var dl=$($clone).find('> td:first-child > input');
            dl.val(emparr[index]);
      
        $clone.find('td').each(function(data_id){
            var el = $(this).find(':first-child');
            var dl=$(this).find(':nth-child(2)');
            var se=$(this).find('select');
            //console.log(se);
           /* var ed=$(this).find(':first-child > input');
            var data_id1=dl.data("id");*/
          
            var id = el.attr('id') || null;
            var name=el.attr('name')|| null;
             if(id) {
                var i = id.substr(id.length-1);
                let j=`[${+i+1}]`;
                var suffix=name.substr(name.indexOf(']') + 1 );
                console.log(j);

                var prefix = id.substr(0, (id.length-1));

                el.attr('id', prefix+(+i+1));
                el.attr('name', prefix+(j)+(suffix));
                el.attr('data-id',data_id+1);
                dl.attr('id',`h${prefix+(+i+1)}`);

    
            }
           
           

        });

        
        $clone.find('input:text').val('');
        
        let data=$clone.find('select');
 
        $tr.closest('table').append($clone);
       /* $clone.find('select').each(function(){
                	var el=$(this);
                	var id=el.attr('id')
                	$clone.find('select').val('') 
                	$(`#${id} option[value=""]`).remove();
                	$(`#${id}`).prepend('<option value="">my-option</option>'); 
                	
                });*/
                $clone.find('select').each(function(data_id){

        			var el=$(this);
                	var id=el.attr('name');
                	var lastChar = id.substr(id.length + 1);
                	//var data_id=el.data('id');
                	//console.log(lastChar);
                	
                	 
                	
        });

        $clone.find('input:text').each(function(data_id){

        			var el=$(this);
                	var id=el.attr('id');
                	//var data_id=el.data('id');
                	//console.log(data_id);
                	var lastChar = id.substr(id.length - 1);
                	if(lastChar==7){clicking=false;}
                	//console.log(lastChar);
                	document.querySelector(`#hday${lastChar}`).value=$data_id+1;
                	//document.querySelector(`#day${lastChar}`).val='';
                	 document.querySelector(`#day${lastChar}`).value=emparr[index];
                	 
                	
        });
       }
        
    });
     
    
    /*$("#table-data").on('change', 'select', function(){
        var val = $(this).val();
        $(this).closest('tr').find('input:text').val(val);
    });*/
});
</script>
@endsection
@endsection