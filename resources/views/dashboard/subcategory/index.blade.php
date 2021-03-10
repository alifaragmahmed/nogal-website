@extends("dashboard.layout.app")

@section("title") 
{{ __('sub category') }}
@endsection
@php 
    $builder = (new App\SubCategory)->getViewBuilder(); 
@endphp  

@section("content") 
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
<div class="modal fade" tabindex="-1" role="dialog" id="addModal" style="width: 100%!important;height: 100%!important" >
    <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ __('add sub category') }}</h4>
      </div>
      <div class="modal-body">
        {!! $builder->loadAddView() !!} 
      </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 


<!-- edit modal --> 
<div class="modal fade" tabindex="-1" role="dialog" id="editModal" style="width: 100%!important;height: 100%!important" >
    <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ __('edit sub category') }}ه</h4>
      </div>
      <div class="modal-body editModalPlace">
         
      </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
@endsection

@section("js") 
<script>
$(document).ready(function() {
     $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ url('/dashboard/subcategory/data') }}",
        "columns":[
            @foreach($builder->cols as $col)
            { "data": "{{ $col['name'] }}" },     
            @endforeach
            { "data": "action" }
        ]
     });
     
     formAjax(); 
     //$("select").select2();
}); 
</script>
@endsection
