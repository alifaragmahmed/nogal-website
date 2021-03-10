@extends('website.app')
@section('content')

 
        <section class="banner" style="background-image:url(website/assets/images/about.png)">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h1 class="h2 title"> {{__('We love our work')}}</h1>
                        <div class="text">
                            <p>
                            {{__(' Nogal Company for furniture we hope to make customer find what who need .
                            ')}}
                              </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       
  <!--
        <section class="cards">

           

            <header>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h2 class="title"> {{__('Design of interiors')}}</h2>
                        <div class="text">
                            <p> {{__(' Our services team produces interior design solutions')}}</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container">
                <div class="row">

                  

                    <div class="col-md-8">
                        <figure>
                            <figcaption style="background-image:url(website/assets/images/about2.jpg)">
                                <img src="{{ asset('website/assets/images/about2.jpg') }}" alt="" />
                            </figcaption>
                            <a href="#" class="btn btn-clean"> {{__('Interior_design')}}</a>
                        </figure>
                    </div>

                 

                    <div class="col-md-4">
                        <figure>
                            <figcaption style="background-image:url(website/assets/images/about1.jpg)">
                                <img src=  "{{ asset('website/assets/images/about1.jpg') }}" alt="" />
                              
                            </figcaption>
                            <a href="#" class="btn btn-clean"> {{__('3D_modeling')}}</a>
                        </figure>
                    </div>

                  

                    <div class="col-md-4">
                        <figure>
                        <figcaption style="background-image:url(website/assets/images/about3.jpg)">
                                <img src=  "{{ asset('website/assets/images/about3.jpg') }}" alt="" />
                              </figcaption>
                            <a href="#" class="btn btn-clean"> {{__('Arhitect_serives')}}</a>
                        </figure>
                    </div>

                 

                    <div class="col-md-8">
                        <figure>
                        <figcaption style="background-image:url(website/assets/images/about4.jpg)">
                                <img src=  "{{ asset('website/assets/images/about4.jpg') }}" alt="" />
                                </figcaption>
                            <a href="#" class="btn btn-clean"> {{__('Manufacturing')}}</a>
                        </figure>
                    </div>

                  

                 
                </div> 

            </div> 
        </section>
        -->
     

        <section class="history">
            <div class="container">

                <!-- === History header === -->

                <header>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 text-center">
                            <h1 class="h2 title"> {{__('The_history_title')}}</h1>
                            <div class="text">
                                <p> {{__('The_history')}}</p>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- === row item === -->

                <div class="row row-block">
                    <div class="col-md-5 history-image" style="background-image:url(website/assets/images/about5.png)">
                        
                    </div>

                @if(session('locale') == 'En')
                    <div class="col-md-7 history-desc">

                       <p style="color:black;text-align: justify;">
                       Established in December 1995, NOGAL FURNITURE is a family owned company that became among the leading furniture stores in Egypt. 

                        The company  is known for its distinctive drift toward contemporary and classic collections,  meeting the styles of the modern day home, offices, hospitals, hotels and schools.
                        </br></br>

                        About Nogal Furniture The company started its business by importing high end products from Spain, Italy, USA and China, such as bed rooms,dining rooms,tables, office furniture, lighting and  living rooms, which was displayed in our 1100 m2 main showroom in ElShiekhZayed area.
                        </br></br>

                        Since then we have achieved substantial growths over the years in terms of  sales and distribution of classic and modern furniture in Egypt.
                        </br></br>

                        At Nogal Furniture, we believe in inspiring sense of a lifestyle not just decorating homes. By gathering art craft and fine woods, we produce high standard luxurious steel furniture with very distinguished designs in addition to classy home accessories which look fascinating and yet, so comfortable.</br></br>

                        What We Do For You
                        Our mission at Nogal Furniture is to the point: to provide you with great quality of furniture. </p>
                    </div>
                @else
                <div class="col-md-7 history-desc">

                    <p style=" font-size:20px;color:black;text-align: justify;direction: rtl;">

                    تأسست NOGAL FURNITURE في ديسمبر 1995 ، وهي شركة مملوكة عائليًا أصبحت من بين متاجر الأثاث الرائدة في مصر
تشتهر الشركة بانجرافها المميز نحو المجموعات المعاصرة والكلاسيكية ، وتلبية أنماط المنزل العصري والمكاتب والمستشفيات والفنادق والمدارس
نحو المجموعات المعاصرة والكلاسيكية ، وتلبية أنماط المنزل الحديث والمكاتب والمستشفيات والفنادق والمدارس. حول شركة نوجال للأثاث بدأت الشركة أعمالها من خلال استيراد منتجات راقية من إسبانيا وإيطاليا والولايات المتحدة الأمريكية والصين ، مثل غرف النوم وغرف الطعام والطاولات وأثاث المكاتب والإضاءة وغرف المعيشة ، والتي تم عرضها في صالة العرض الرئيسية بمساحة 1100 متر مربع في منطقة الشيخ زايد. ومنذ ذلك الحين حققنا نموًا كبيرًا على مر السنين من حيث مبيعات وتوزيع الأثاث الكلاسيكي والحديث في مصر.
                    </p>
                </div>

   </div>
  
<p></p>
</div>

                @endif

                </div>

         

            
              
            </div>
        </section>

        <!-- ========================  Banner ======================== -->

        <!-- ========================  Blog Dark ======================== -->



        <!-- ======================== Quotes ======================== -->


@endsection