@extends('website.app')
@section('content')

 
        <section class="banner" style="background-image:url(website/assets/images/about.png)">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h1 class="h2 title"> {{__('terms and conditions')}}</h1>
                        <div class="text"> 
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
     

        <section class="history">
            <div class="container">

                <!-- === History header === -->

                <header>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 text-center">
                            <h1 class="h2 title"> {{__('terms and conditions')}}</h1>
                            <div class="text"> 
                            </div>
                        </div>
                    </div>
                </header>

                <!-- === row item === -->

                <div class="container w3-padding"> 
                    {!! optional(App\Setting::find(11))->value !!}
                </div>

         

            
              
            </div>
        </section>

        <!-- ========================  Banner ======================== -->

        <!-- ========================  Blog Dark ======================== -->



        <!-- ======================== Quotes ======================== -->


@endsection