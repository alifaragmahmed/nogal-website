@extends("dashboard.layout.app")

@section("title")
المجموعات
@endsection
@php 
    $builder = (new App\ProductPhoto)->getViewBuilder(); 
@endphp  

@section("content")

<div class="w3-padding" >
 
    <button class="w3-button w3-orange fa fa-filter" onclick="$('#filter').slideToggle(200)" > </button>

    <br>
    <div class="w3-row" id="filter" style="" >
        <div class="w3-col l4 m4 s12" > 
            <select class="form-control select2 filter-product_id"  >
                @foreach(App\Product::all() as $item)
                <option value="{{ $item->id }}" >{{ session('locale') == 'Ar'? $item->name_ar : $item->name_en }}</option>
                @endforeach
            </select>
        </div>
        <div class="w3-col l4 m4 s12" > 
            <button class="btn btn-primary" onclick="search({product_id: $('.filter-product_id').val()})" >{{ __('search') }}</button>
        </div>
    </div>
</div>
<table class="table table-bordered" id="table" >
    <thead>
        <tr>
            @foreach($builder->cols as $col)
            <th>{{ $col['label'] }}</th>  
            @endforeach
            <th></th>
        </tr>
    </thead> 
    <tbody>
        
    </tbody>
</table>

@endsection

@section("additional")
<!-- add modal --> 
<div class="modal fade"   id="addModal" style="width: 100%!important;height: 100%!important" >
    <div class="modal-dialog modal-sm"   >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center class="modal-title w3-xlarge">{{ __('add category') }}</center>
      </div>
      <div class="modal-body">
        {!! $builder->loadAddView() !!} 
      </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 


<!-- edit modal --> 
<div class="modal fade" tabindex="-1" role="dialog" id="editModal" style="width: 100%!important;height: 100%!important" >
    <div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center class="modal-title w3-xlarge">{{ __('edit category') }}</center>
      </div>
      <div class="modal-body editModalPlace">
         
      </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
@endsection

@section("js") 
<script> 
var table = null;

function search(data) {  
    //alert();
    table.ajax.url("{{ url('/dashboard/productphoto/data') }}?"+$.param(data)).load();
}

$(document).ready(function() {
     table = $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 5,
        "ajax": "{{ url('/dashboard/productphoto/data') }}",
        "columns":[
            @foreach($builder->cols as $col)
            { "data": "{{ $col['name'] }}" },     
            @endforeach
            { "data": "action" }
        ]
     });
     
     formAjax(false, function(r){
         //alert();
         $('.imageView ').removeAttr('src');
     }); 
    $("#product_id").select2();
}); 
</script>
@endsection
