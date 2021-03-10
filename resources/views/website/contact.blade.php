
@extends('website.app')
@section('content')

<section class="main-header" style="background-image:url(website/assets/images/about.png)">

            <header>
                <div class="container text-center">
                    <h2 class="h2 title"> {{__('Contact')}}</h2>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href=""><span class="icon icon-home"></span></a></li>
                        <li><a class="active" href=""> {{__('Contact')}}</a></li>
                    </ol>
                </div>
            </header>
        </section>

        <!-- ========================  Contact ======================== -->

        <section class="contact">

            <!-- === Goolge map === -->

            <div id="map">
          
            <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.2238941878877!2d30.995561085389074!3d30.03043392619027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14585a19354b2115%3A0x426e60c31501c5a!2sNOGAL%20Furniture!5e0!3m2!1sar!2seg!4v1583924843534!5m2!1sar!2seg" 
            width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                     
          </div>

            <div class="container">

                <div class="row">

                    <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">

                        <div class="contact-block">

                            <div class="contact-info">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <figure class="text-center">
                                            <span class="icon icon-map-marker"></span>
                                            <figcaption>
                                                <strong> {{__('Where are we?')}}</strong>
                                                <span>  {{__('Egypt ,cairo')}}<br/> {{__(' Salah saleam street')}}</span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="col-sm-4">
                                        <figure class="text-center">
                                            <span class="icon icon-phone"></span>
                                            <figcaption>
                                                <strong>  {{__('Mobile Info')}}</strong>
                                             <a href=""> 
                                    Tel.: 3851 9333 - 3851 9444 <br>
                                    Mob.: 0122 2222 712
                                </a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="col-sm-4">
                                        <figure class="text-center">
                                            <span class="icon icon-clock"></span>
                                            <figcaption>
                                                <strong>  {{__('Working hours')}}</strong>
                                            
                                                    <p>From Saturday to Thursday: 10 am - 11 pm &nbsp; &nbsp;</p> 
                                                    <p>Friday: 1 pm - 11 pm &nbsp; &nbsp;</p>
                             
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>

                            <div class="banner">
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10 text-center">
                                        <h2 class="title">  {{__('Cantact With US')}} </h2>
                                        <p>

                                        {{__('contact title')}}
                                                 </p>


                                    </div>
                                </div>
                            </div>

                          
                        </div>


                    </div><!--col-sm-8-->
                </div> <!--/row-->
            </div><!--/container-->
        </section>
       
        @endsection