<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <style>
   /* Our Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');

/* Global */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins'
}

body {
  height: 100vh;
  background-color: #D3E1E1
}

/* The Receipt */
.receipt {
  width: 360px; 
  background-color: white;
  border-radius: 30px;
  position: relative;
  top: 50%;
  left: 50%;
  margin-top: -360px; /* -half height and width to center */
  margin-left: -180px;
  box-shadow: 14px 14px 22px -18px;
  padding: 20px
}

/* Heading */
.name {
  text-transform: uppercase;
  text-align: center;
  color: #6c8b8e;
  letter-spacing: 10px;
  font-size: 1.8em;
  margin-top: 10px
}

/* Big thank */
.greeting {
  font-size: 21px;
  text-transform: capitalize;
  text-align: center;
  color: #6f8d90;
  margin: 35px 0;
  letter-spacing: 1.2px
}

/* Order info */
.order p {
  font-size: 13px;
  color: #aaa;
  padding-left: 10px;
  letter-spacing: .7px
}

/* Our line */
hr {
  border: .7px solid #ddd;
  margin: 15px 0;
}

/* Order details */
.details {
  padding-left: 10px;
  margin-bottom: 35px;
  overflow: hidden;
  position: relative;
}

.details h3 {
  font-weight: 400;
  color: #6c8b8e;
  font-size: 1.5em;
  margin-bottom: 15px
}

/* Image and the info of the order */
.product {
  float: left;
  width: 83%
}

.product img {
  width: 65px;
  float: left
}

.product .info {
  float: left;
  margin-left: 15px
}

.product .info h4 {
  color: #6f8d90;
  font-weight: 400;
  text-transform: uppercase;
  margin-top: 10px
}

.product .info p {
  font-size: 12px;
  color: #aaa;
}

/* Net price */
.details > p {
  color: #6f8d90;
  margin-top: 25px;
  font-size: 15px
}

/* Total price */
.totalprice p {
  padding-left: 10px
}

.totalprice .sub,
.totalprice .del {
  font-size: 13px;
  color: #aaa
}

.totalprice span {
  float: right;
  margin-right: 17px
}

.totalprice .tot {
  color: #6f8d90;
  font-size: 15px
}

/* Footer */
footer {
  font-size: 10px;
  text-align: center;
  margin-top: 135px; /* You can make it with position try it */
  color: #aaa
}
 </style>
</head>
<body>
    <br><br>
     <div class="receipt" style="width: 360px; 
  background-color: white;
  border-radius: 30px;
  position: relative;
  top: 50%;
  left: 50%;
  margin-top: -360px; /* -half height and width to center */
  margin-left: -180px;
  box-shadow: 14px 14px 22px -18px;
  padding: 20px" >

      <h2 class="name"> <img src="{{ url('/image/logo.png') }}" style="height: 30px" > NOGAL FURNITURE </h2>

      <p class="greeting"> New Order No {{ optional($order)->id }} From {{ optional($order->user)->name }}! </p>

      <!-- Order info -->
      <div class="order">

        <p> Order No : {{ optional($order)->id }} </p>
        <p> First Name : {{ optional($order)->first_name }} </p>
        <p> Last Name : {{ optional($order)->last_name }} </p>
        <p> Phone : {{ optional($order)->phone }} </p>
        <p> Date : {{ optional($order)->created_at }} </p>
        <p> Address : {{ optional($order)->address }} </p>
        <p> Zipcode : {{ optional($order)->zipcode }} </p>
        <p> City : {{ optional($order)->city }} </p>
        <p> Discount : {{ optional($order)->discount }} EGP </p>
        <p> Total : {{ optional($order)->total }} EGP </p>

      </div>

      <hr>

      <!-- Details -->
      <div class="details" style=" padding-left: 10px;
  margin-bottom: 35px;
  overflow: hidden;
  position: relative;" >

        <h3> Details </h3>

        @foreach($order->details()->get() as $detail)
        @php
        $product = $detail->prodoct;
        @endphp
        
        @if ($product)
        <div class="product" style="margin-bottom: 5px;padding-bottom: 5px;border-bottom: 1px dashed gray" >

          <img src="{{ optional($product->photos()->first())->url }}" style="height: 50px" >

          <a style="text-decoration: none;" class="info" target="_blank" href="{{ url('/show/product/') }}/{{ $product->id }}" >

            <h4 style="text-decoration: none;" > {{ $product->name_en }} </h4>
            @if (optional($product->colors())->count() > 0)
            <p style="position: relative" > Color:  
            @foreach($product->colors()->get() as $color)
            <img  src="{{ optional($color)->url }}" style="height: 15px;width: 15px;border-radius: 5px;float: right" >
            @endforeach
            </p>
            @endif
            <p> Amount: {{ $detail->amount }} * {{ $detail->price }}</p>

          </a>

        </div>
        
        <p> {{ $detail->total }}  EGP</p>
        @endif
        @endforeach

      </div>

      <!-- Sub and total price -->
      <div class="totalprice">

        <p class="sub"> visit out site now <span> <a class="w3-button w3-gray" target="_blank" href="{{ url('/') }}" >NOGAL FURNITURE</a> </span></p>
 
      <br>
      <img src="{{ url('/image/logo.png') }}" style="height: 30px" > 
      </div>
      

      <!-- Footer -->
      <footer> NOGAL FURNITURE is a family owned company that become among the leading furniture stores in Egypt	. </footer>

    </div>

</body>
</html> 
