
<!-- subscription section  -->
<section class="w3-padding w3-center w3-light-gray" >
    <form method="post" action="{{ url('/subscribe') }}" class="form" >
        @csrf
    <br>
    <div class="w3-center w3-xlarge" style="font-family: 'LinearIcons'" >{{ __('title_in_subscribe') }}</div> 
    <div class="w3-center" style="font-family: 'LinearIcons'" >{{ __('subtitle_in_subscribe') }}</div>
    <center>
        <span>_______</span>
    </center>
    <br>
    <div style="width: 60%;margin: auto" class="w3-white w3-padding w3-row" >
        <div class="w3-col l8 m8 s8" >
            <input class="w3-input w3-block" type="email" required="" name="email" placeholder="{{ __('your email') }}" > 
        </div>
        <div class="w3-col l4 m4 s4" >
            <button class="w3-button w3-black text-uppercase w3-block" style="float: right;max-width: 200px"  >{{ __('subscribe') }}</button>
        </div>
    </div>
    <br><br>
    </form>
</section>


<div style="position: fixed;right: 5%;bottom: 0;z-index: 99999999999;width: 338px;text-align: right" >
    <iframe  
        class="z-depth-5 chatwindow" 
        onload="$('.chatwindow').slideToggle(0)" 
        src="{{ url('/chat') }}" style="border-radius: 10px;width: 320px;height: 325px;border: none;background: transparent"  ></iframe> 
    <br>
    <br>
    @if (App\Cart::count() > 0)
        <button 
        onclick="$('.open-cart').click()" 
        style="width: 40px;height: 40px;border: 0px"
        class="z-depth-5 background w3-orange w3-card w3-circle fa fa-shopping-cart" > 
        {{ App\Cart::count() }}
        </button>
    @endif
    <center>
    </center>
    <br>
        <button 
        onclick="$('.chatwindow').slideToggle(600)" 
        style="width: 40px;height: 40px;border: 0px"
        class="z-depth-5 chatbtn background w3-teal w3-card w3-circle fa fa-comment" > 
        </button>
    <center>
    </center>
    
    
    <br>
</div> 

        <footer>
            <div class="container">

                <!--footer showroom-->
                <div class="footer-showroom">
                    <div class="row"> 
                        <div class="col-lg-3 col-sm-3 col-md-12 w3-hide-small">
                            <h5> {{__('Visit US')}}</h5>
                            <ul>
                            <li>
                                @if(session('locale') == 'En')
                                {{\App\Setting::find(8)->value}}
                                @else
                                {{\App\Setting::find(9)->value}}
                                @endif
                            </li> 
                            <li>
                                <br>
                                <p>From Saturday to Thursday: 10 am - 11 pm &nbsp; &nbsp;</p>
                                <p>Friday: 1 pm - 11 pm &nbsp; &nbsp;</p>
                            </li>

                            </ul>
                        </div>

                        <div class="col-lg-3 col-sm-3 col-md-12 w3-hide-small">
                            <h5> {{__('Short Links')}}</h5>
                            <ul>
                            <li>
                            <a href="{{route('website.shop')}}">{{__('shop')}}</a></li>           
                            <li><a href="{{route('website.about')}}">{{__('about')}}</a></li>
                            <li><a href="{{route('website.contact')}}">{{__('contact')}}</a></li>
                            <li><a href="{{route('register')}}">{{__('register')}}</a></li>
                            </ul>
                        </div>
                        
                        <div class="col-lg-3 col-sm-3  col-md-12">
                            <h5>{{__('more_info')}}</h5>
                            <ul>
                            <li>
                                <a href=""> 
                                    Tel.: 3851 9333 - 3851 9444 <br>
                                    Mob.: 0122 2222 712
                                </a>
                            </li>           
                            <li>-------------</li>
                            <li>
                                <a href="{{ url('/terms-and-conditions') }}" target="_blank" >{{ __('terms and conditions') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/privacy-policy') }}" target="_blank">{{ __('privacy policy') }}</a>
                            </li>
                            </ul>
                            
                            </br>  </br>  </br>
                            
                             
                        </div>
 
                        
                        <div class="col-lg-3 col-sm-3  col-md-12">
                            <h5>{{__('our location')}}</h5> 
                            <br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.2238941878877!2d30.995561085389074!3d30.03043392619027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14585a19354b2115%3A0x426e60c31501c5a!2sNOGAL%20Furniture!5e0!3m2!1sar!2seg!4v1583924843534!5m2!1sar!2seg" width="90%" class="w3-round"  height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                        </div>

                        
                    </div>
                </div>

            
                <!--footer social-->

                <div class="footer-social">
                    <div class="row">
                        <div class="col-sm-6">
                            <a  target="_blank"><i class="fa fa-website"></i> Nogal </a> &nbsp; | <a href="#">By Sphinx</a> &nbsp;  &nbsp; <a href="#"></a>
                        </div>
                        <div class="col-sm-6 links">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div> <!--/wrapper--> 
   
    <!--JS files-->
    <script src="{{ asset('website/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.bootstrap.js') }}"></script>
    <script src="{{ asset('website/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('website/js/jquery.owl.carousel.js') }}"></script>
    <script src="{{ asset('website/js/jquery.ion.rangeSlider.js') }}"></script>
    <script src="{{ asset('website/js/jquery.isotope.pkgd.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>
    <script src="{{ asset('website/js/toaster.min.js') }}"></script>
    <script src="{{ url('js/owl.carousel.min.js') }}"></script>
<script src="{{ url('/') }}/js/iziToast.min.js"></script>
<script src="{{ url('/') }}/js/sweetalert.min.js"></script> 
    <script src="{{ url('/') }}/js/app.js"></script> 
    <script src="{{ url('/') }}/js/formajax.js"></script> 
    <script>

@if(Session::has('success'))
toastr.success("{{ Session::get('success') }}")
 @elseif( Session::has('error'))
toastr.error("{{ Session::get('error') }}")
@elseif( Session::has('warning'))
 toastr.warning("{{ Session::get('warning') }}")
  @endif
</script>
 
<script type="text/javascript">
    $('.page-loader').hide();

    $('#carouselExample').on('slide.bs.carousel', function (e) {

    /*

    CC 2.0 License Iatek LLC 2018
    Attribution required
    
    */


    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 7;
    var totalItems = $('.carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});

    $('.blog-carsousel').owlCarousel({
            margin:10,
            //loop:true,
            autoWidth:true,
            items:4
        });
    $('.home-carsousel').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    $('.product-show-carsousel').owlCarousel({
        loop:false,
        margin:0,
        nav:true,
        dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    formAjax();
</script>

    @stack('custom-scripts')
</body>

</html>