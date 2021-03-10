
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="font w3-xxlarge" >
        {{ __('dashboard') }} 
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">{{ __('dashboard') }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content" style="overflow: auto!important" >
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a class="info-box" href="#" onclick="showPage('dashboard/user')" >
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('users') }}</span>
                    <span class="info-box-number">{{ App\User::count() }}<small></small></span>
                </div>
                <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a class="info-box"  href="#" onclick="showPage('dashboard/product')"   >
                <span class="info-box-icon bg-red"><i class="fa fa-ticket"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('products') }}</span>
                    <span class="info-box-number">{{ App\Product::count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a class="info-box" onclick="showPage('dashboard/category')"  >
                <span class="info-box-icon bg-green"><i class="fa fa-cubes"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('categories') }}</span>
                    <span class="info-box-number">{{ App\Category::count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
        </div>
 
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a class="info-box" onclick="showPage('dashboard/order')"  >
                <span class="info-box-icon bg-yellow"><i class="fa fa-newspaper-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('orders') }}</span>
                    <span class="info-box-number">{{ App\Order::count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
        </div> 

        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a class="info-box" href="#" onclick="showPage('dashboard/slide')" >
                <span class="info-box-icon bg-teal"><i class="fa fa-desktop"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('slides') }}</span>
                    <span class="info-box-number">{{ App\Slide::count() }}<small></small></span>
                </div>
                <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a class="info-box"  href="#" onclick="showPage('dashboard/subcategory')"   >
                <span class="info-box-icon bg-orange"><i class="fa fa-star"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ __('sub categories') }}</span>
                    <span class="info-box-number">{{ App\SubCategory::count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
  
        <!-- /.col -->
    </div>
    <div class="row">
        
        <div class="col-lg-4 col-md-4 col-sm-12">
            
            <div class="shadow w3-round box">
                <div class="box-header with-border">
                    <h3 class="box-title font">{{ __('products comparison') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button> 
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="padding: 5px!important" >
                    <div id="chart_div3" class="w3-block" ></div> 
                </div>
                <!-- ./box-body -->
                <div class="box-footer"> 
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div> 
            
            <!-- /.box -->
        </div>
        
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="shadow w3-round box">
                <div class="box-header with-border">
                    <h3 class="box-title font">{{ __('products reviews') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button> 
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <canvas id="myChart" class="w3-block" height="400"></canvas>
                </div>
                <!-- ./box-body -->
                <div class="box-footer"> 
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        
        
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="shadow w3-round box">
                <div class="box-header with-border">
                    <h3 class="box-title font">{{ __('products sales') }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button> 
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <canvas id="myChart1" class="w3-block" height="400"></canvas>
                </div>
                <!-- ./box-body -->
                <div class="box-footer"> 
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <br>
    <br>
    <br>
    <!-- /.row -->

</section>
        <script src="{{ url('/') }}/js/Chart.min.js"></script> 
        <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
            @foreach($productsViews as $pv)
            @if (App\Product::find($pv->p))
            ['{{ App\Product::find($pv->p)->name }}'],
            @endif
            @endforeach 
        ],
        datasets: [{
            label: '{{ __("products reviews") }}',
            data: [
            @foreach($productsViews as $pv)
            @if (App\Product::find($pv->p))
            [{{ $pv->count }}],
            @endif
            @endforeach 
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', 
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)', 
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<script>
var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            @foreach($productsAmounts as $pa)
            @if (App\Product::find($pa->p))
            ['{{ optional(App\Product::find($pa->p))->name }}'],
            @endif
            @endforeach 
        ],
        datasets: [{
            label: '{{ __("products sales") }}',
            data: [
            @foreach($productsAmounts as $pa)
            @if (App\Product::find($pa->p))
            [{{ $pa->amount }}],
            @endif
            @endforeach  
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', 
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)', 
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages': ['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([ 
            @foreach($productsViews as $pv)
            @if (App\Product::find($pv->p))
            ['{{ optional(App\Product::find($pv->p))->name_ar }}', {{ $pv->count }}],
            @endif
            @endforeach 
        ]);

        // Set chart options
        var options = {'title': "{{ __('products comparison') }}", 
          is3D: true,
            'height': 400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
    }
    
</script>