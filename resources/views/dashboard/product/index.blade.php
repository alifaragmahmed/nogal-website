@extends("dashboard.layout.app")



<link rel="stylesheet" href="{{ url('/') }}/css/uploader.css">



@section("title")

{{ __('products') }}  

@endsection

@php 

$builder = (new App\Product)->getViewBuilder(); 

@endphp  



@section("content")

<div class="w3-padding" >

    <button class="w3-button w3-green" onclick="$('#importModal').modal()" >{{ __('import from excel') }}</button>
    
    <button class="w3-button w3-orange fa fa-filter" onclick="$('#filter').slideToggle(200)" > </button>

    <br>
    <div class="w3-row" id="filter" style="display: none" >
        <div class="w3-col l4 m4 s12" > 
            <select class="form-control select2 filter-category_id"  >
                @foreach(App\Category::all() as $item)
                <option value="{{ $item->id }}" >{{ session('locale') == 'Ar'? $item->name_ar : $item->name_en }}</option>
                @endforeach
            </select>
        </div>
        <div class="w3-col l4 m4 s12" > 
            <button class="btn btn-primary" onclick="search({category_id: $('.filter-category_id').val()})" >{{ __('search') }}</button>
        </div>
    </div>
</div>

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

<!-- import modal --> 

<div class="modal fade"  role="dialog" id="importModal" style="width: 100%!important;height: 100%!important" >

    <div class="modal-dialog modal-sm" role="document" >

        <div class="modal-content"   >

            <form action="{{ url('/dashboard/product/import') }}" enctype="multipart\form-data" class="form" method="post" id="import-form" >

                <div class="modal-header"  >

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <br>

                    <h4 class="modal-title text-center">{{ __('import products from excel file') }}</h4>

                </div>

                <div class="modal-body"  >

                    {{ csrf_field() }}



                    <center class="center" > 

                    <div class="title text-capitalize">{{ __('Drop file to upload') }}</div>

                    <div class="dropzone">

                        <div class="content">

                            <img src="https://100dayscss.com/codepen/upload.svg" class="upload">

                            <span class="filename"></span>

                            <input type="file" class="input" name="products" required="" >

                        </div>

                    </div>

                    <img src="https://100dayscss.com/codepen/syncing.svg" class="syncing">

                    <img src="https://100dayscss.com/codepen/checkmark.svg" class="done"> 

                    <br>

                    <div class="bar"></div>

                    </center>

                    <br>

                    <br>

                </div> 

                <div class="modal-footer"   >

                    <div class="upload-btn text-capitalize"  

                         onclick="$('#import-form').submit()" >{{ __('upload file') }}</div>  

                </div>



            </form>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog --> 

</div><!-- /.modal --> 



<!-- add modal --> 

<div class="modal fade"   role="dialog" id="addModal" style="width: 100%!important;height: 100%!important" >

    <div class="modal-dialog modal-lg" role="document" >

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">{{ __('add product') }}</h4>

            </div>

            <div class="modal-body">

                {!! $builder->loadAddView() !!} 

            </div> 

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal --> 





<!-- edit modal --> 

<div class="modal fade"   role="dialog" id="editModal" style="width: 100%!important;height: 100%!important" >

    <div class="modal-dialog modal-lg" role="document" >

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title">{{ __('edit product') }}</h4>

            </div>

            <div class="modal-body editModalPlace">



            </div> 

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->  

@endsection



@section("js") 

<script>

var droppedFiles = false;

var fileName = '';

var $dropzone = $('.dropzone');

var $button = $('.upload-btn');

var uploading = false;

var $syncing = $('.syncing');

var $done = $('.done');

var $bar = $('.bar');

var timeOut;

var table = null;



$dropzone.on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {

    e.preventDefault();

    e.stopPropagation();

})

        .on('dragover dragenter', function () {

            $dropzone.addClass('is-dragover');

        })

        .on('dragleave dragend drop', function () {

            $dropzone.removeClass('is-dragover');

        })

        .on('drop', function (e) {

            droppedFiles = e.originalEvent.dataTransfer.files;

            fileName = droppedFiles[0]['name'];

            $("input:file")[0].files = droppedFiles;

            $('.filename').html(fileName);

            $('.dropzone .upload').hide();

        });



$button.bind('click', function () {

    startUpload();

});



$("input:file").change(function () {

    fileName = $(this)[0].files[0].name;

    $('.filename').html(fileName);

    $('.dropzone .upload').hide();

});



function startUpload() {

    if (!uploading && fileName != '') {

        uploading = true;

        $button.html('Uploading...');

        $dropzone.fadeOut();

        $syncing.addClass('active');

        $done.addClass('active');

        $bar.addClass('active');

        //timeoutID = window.setTimeout(showDone, 3200);

    }

}



function showDone() {

    $button.click(function(){

        $('#importModal').modal('hide');

    });

    $button.html('Done');

}

formAjax(false, function(r){

    showDone();

});

function search(data) {  
    //alert();
    table.ajax.url("{{ url('/dashboard/product/data') }}?"+$.param(data)).load();
}

$(document).ready(function () {

    table = $('#table').DataTable({

        "processing": true,

        "serverSide": true,

        "pageLength": 5,

        "dom": 'Bfrtip',

        "buttons": [

            'copy', 'csv', 'excel', 'pdf', 'print'

        ],
 

        "ajax": "{{ url('/dashboard/product/data') }}",

        "columns": [

             @foreach($builder->cols as $col)

            {"data": "{{ $col['name'] }}"},

            @endforeach

            {"data": "action"}

        ]

    });

});

</script> 

@endsection

