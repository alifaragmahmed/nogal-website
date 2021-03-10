@extends("dashboard.layout.app")

@section("title")
الطلبات
@endsection
@php 
$builder = (new App\Category)->getViewBuilder(); 
@endphp  

@section("content")
<div class="filter w3-row" >
    <div class="w3-col l4 m4 s4" >
        <button class="btn btn-success btn-flat" onclick="search()" >
            {{ __('search') }}
        </button>
    </div>
    <div class="w3-col l8 m8 s8 w3-padding" >
        <div class="form-group" >
            <select class="form-control status"  >
                <option value="" >{{ __('all') }}</option>
                <option value="new" >{{ __('new') }}</option>
                <option value="ready" >{{ __('ready') }}</option>
                <option value="delivered" >{{ __('delivered') }}</option>
                <option value="user_refused" >{{ __('user_refused') }}</option>
                <option value="admin_refused" >{{ __('admin_refused') }}</option>
            </select>
        </div>
    </div>
</div>
<table class="table table-bordered" id="table" >
    <thead>
        <tr>  
            <th>{{ __('user') }}</th>    
            <th>{{ __('first name') }}</th>    
            <th>{{ __('last name') }}</th>    
            <th>{{ __('zip code') }}</th>    
            <th>{{ __('city') }}</th>    
            <th>{{ __('email') }}</th>    
            <th>{{ __('phone') }}</th>    
            <th>{{ __('total') }}</th>    
            <th>{{ __('discount') }}</th>    
            <th>{{ __('additional') }}</th>    
            <th>{{ __('visa') }}</th>    
            <th>{{ __('paid') }}</th>    
            <th>{{ __('address') }}</th>   
            <th>{{ __('total') }}</th>     
            <th></th>
        </tr>
    </thead> 
    <tbody>

    </tbody>
</table>

@endsection


@section("additional") 

<!-- edit modal --> 
<div class="modal fade nicescroll" tabindex="-1" role="dialog" id="editModal" style="width: 100%!important;height: 100%!important" >
    <div class="modal-dialog modal-lg" role="document" >
        <div class="w3-modal-content" style="min-width: 400px;background-color: rgba(0,0,0,0)!important"> 
            <div class="  editModalPlace" >

            </div>
           <div style="text-align: center!important" >
                <center  >
                    <button class="w3-button w3-danger" data-dismiss="modal"  >{{ __('close') }}</button>
                </center> 
            </div><!-- -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
@endsection


@section("js") 
<script>

    var table = null;


    function search() {  
        //alert();
        var filter = {
            status: $('.status').val()
        };
        table.ajax.url("{{ url('/dashboard/order/data') }}?"+$.param(filter)).load();
    }
    
    $(document).ready(function () {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('/dashboard/order/data') }}",
            "columns": [ 
                {"data": "user"},
                {"data": "first_name"},
                {"data": "last_name"},
                {"data": "zipcode"},
                {"data": "city"},
                {"data": "email"},
                {"data": "phone"},
                {"data": "total"},
                {"data": "discount"},
                {"data": "additional"},
                {"data": "visa"},
                {"data": "paid"},
                {"data": "address"},
                {"data": "total"}, 
                {"data": "action"}
            ]
        });

        formAjax();

        $('.floatbtn-place').remove();
    });

    function confirmOrder(url, button) {      
        $(button).html("<i class='fa fa-spin fa-spinner' ></i>");
        $.get(url, function (data) {
            if (data.status == 1) {
                success(data.message);
                // remove row
                $(button).remove();
                // reload data
                $('#table').DataTable().ajax.reload();
            } else {
                error(data.message);
            }
        });
    }
</script>
@endsection
