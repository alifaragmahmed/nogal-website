@extends("dashboard.layout.app")

@section("title")
{{ __('slides') }}
@endsection
@php 
    $builder = (new App\Slide)->getViewBuilder(); 
@endphp  

@section("content")
<table class="table table-bordered" id="table" >
    <thead>
        <tr>
            @foreach($builder->cols as $col)
            <th>{{ __($col['label']) }}</th>  
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
        <h4 class="modal-title">{{ __('add slide') }}</h4>
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
        <h4 class="modal-title">{{ __('edit slide') }}</h4>
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
        "ajax": "{{ url('/dashboard/slide/data') }}",
        "columns":[
            @foreach($builder->cols as $col)
            { "data": "{{ $col['name'] }}" },     
            @endforeach
            { "data": "action" }
        ]
     });
     
     formAjax(); 
        
}); 
</script>
@endsection