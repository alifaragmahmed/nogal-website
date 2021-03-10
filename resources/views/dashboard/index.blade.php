<!doctype html>
<html lang="">
    <head>
        <!-- load css files -->
        {!! view("dashboard.layout.css") !!}

    </head>
    <body class="hold-transition fixed sidebar-mini {{ App\Setting::find(3)->value }}"  >

        <div id="root" >
            <!-- include topbar html -->
            {!! view("dashboard.layout.topbar") !!}

            <!-- include navbar html -->
            {!! view("dashboard.layout.navbar") !!}

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper " style="overflow: auto"  > 
                <div class="frame" ></div>
            </div>


        </div>

    </body>

    <!-- load js files -->
    {!! view("dashboard.layout.js") !!} 

    <!-- datatable files -->
    {!! view("dashboard.layout.datatable-plugins") !!} 

    <!-- message scripts -->
    {!! view("dashboard.layout.msg") !!}  
</html>
