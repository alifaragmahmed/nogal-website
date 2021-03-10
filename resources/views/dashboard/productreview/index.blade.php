@extends("dashboard.layout.app")

@section("title")
مرجعات الاصناف
@endsection
@php 
$builder = (new App\Category)->getViewBuilder(); 
@endphp  

@section("content")
<table class="table table-bordered" id="table" >
    <thead>
        <tr> 
            <th>الكود</th>   
            <th>الصنف</th>   
            <th>المشاهدات</th>   
            <th>التعليقات</th>   
            <th>التقيمات</th>   
            <th>متوسط التقيمات</th>   
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
    <div class="modal-dialog " role="document" style="width: 40%;" >
        <div class="modal-content" > 
            <div class="modal-body editModalPlace" >

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
@endsection


@section("js") 
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('/dashboard/productreview/data') }}",
            "columns": [
                {"data": "id"},
                {"data": "name_ar"},
                {"data": "views"},
                {"data": "comments"},
                {"data": "rates"},
                {"data": "rate"}, 
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
                $($("table th")[0]).click();
            } else {
                error( );
            }
        });
    }
</script>
@endsection
