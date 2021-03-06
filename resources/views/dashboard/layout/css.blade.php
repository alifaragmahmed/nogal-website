
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<!-- website title -->
<title>{{ App\Setting::find(2)->value }}</title>

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ url('/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">

<!-- Material Design
<link rel="stylesheet" href="{{ url('/') }}/css/materialize.min.css">
--> 

<!-- Material Design
<link rel="stylesheet" href="{{ url('/') }}/dist/css/bootstrap-material-design.min.css">
<link rel="stylesheet" href="{{ url('/') }}/dist/css/ripples.min.css">
 -->
<link rel="stylesheet" href="{{ url('/') }}/dist/css/MaterialAdminLTE.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ url('/') }}/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ url('/') }}/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="{{ url('/') }}/bower_components/select2/dist/css/select2.min.css">
 

<!-- Theme style -->
@if (Lang::getLang() == 'Ar') 
<link rel="stylesheet" href="{{ url('/') }}/dist/css/AdminLTE_ar.css">
@else
<link rel="stylesheet" href="{{ url('/') }}/dist/css/AdminLTE.css">
@endif
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. --> 
<link rel="stylesheet" href="{{ url('/') }}/dist/css/skins/_all-skins.min.css"> 
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('/') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{ url('/') }}/plugins/timepicker/bootstrap-timepicker.min.css">

<!-- my style -->
<link rel="stylesheet" href="{{ url('/') }}/css/w3.css">
<link rel="stylesheet" href="{{ url('/') }}/css/switch.css">
<link rel="stylesheet" href="{{ url('/') }}/css/iziToast.css">
<link rel="stylesheet" href="{{ url('/') }}/css/app.css">
 
<!-- print library -->  
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">  

<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Text+Me+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

<!-- jQuery 3 -->
<script src="{{ url('/') }}/js/jquery-3.2.1.min.js"></script>

<!-- commen style -->
<style>
    *, .font, h1, h2, h3, h4, h5, h6 {
        font-family: 'Cairo', sans-serif;
    } 

    .modal, .table { 
        @if (Lang::getLang() == 'Ar') 
        direction: rtl;
        @else
        direction: ltr;
        @endif
    }

    @if (Lang::getLang() == 'En') 
    .form-group {
        text-align: left!important;  
        direction: ltr!important;
    }
    @else
    .form-group {
        text-align: right!important;  
        direction: rtl!important;
    }
    @endif 

    @if (App\Setting::find(3)->value == 'skin-dark-light')
    .treeview a {
        color: inherit!important;
    }
    .main-sidebar {
        background-color: white;
    }
    @endif

    .treeview-menu {
        padding-right: 35px!important;
    }
    
    select {
        padding: 0px!important;
    }
    
    .select2 {
        width: 100%!important;
    }
</style>

<!-- commen script -->
<script>
    var public_path = '{{ url("/") }}';
</script>

<script>
    // url of the public path
    var url = '{{ url("/") }}';
    // max uploaded file size
    var MAX_UPLOADED_FILE = 5; // 5 MB

    // max uploaded image size
    var MAX_UPLOADED_IMAGE = 3; // 3 MB

</script>