
<!DOCTYPE html>
<html>
    <head>
        <title>Receipt Email - Mobel Furniture</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />

        <style type="text/css">
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            body {
                background-color: rgba(0,0,0,0)!important;
            }
            /****** EMAIL CLIENT BUG FIXES - BEST NOT TO CHANGE THESE ********/

            .ExternalClass {
                width: 100%;
            }
            /* Forces Outlook.com to display emails at full width */
            .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
                line-height: 100%;
            }

            /* Forces Outlook.com to display normal line spacing, here is more on that*/

            body {
                -webkit-text-size-adjust: none;
                -ms-text-size-adjust: none;
            }

            /* Prevents Webkit and Windows Mobile platforms from changing default font sizes. */

            html,
            body {
                margin: 0;
                padding: 0;
                border: 0;
                outline: 0;
            }

            /* Resets all body margins and padding to 0 for good measure */

            table td {
                border-collapse: collapse;
                border-spacing: 0px;
                border: 0px none;
                vertical-align: middle;
                width: auto;
            }

            /*This resolves the Outlook 07, 10, and Gmail td padding issue. Heres more info */
            /****** END BUG FIXES ********/
            /****** RESETTING DEFAULTS, IT IS BEST TO OVERWRITE THESE STYLES INLINE ********/

            .table-mobile {
                width: 600px;
                margin: 0 auto;
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                border-radius: 5px;
                background-color: white;
                margin-top: 50px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            }

            .table-mobile-small {
                width: 560px !important;
            }

            body, p {
                font-family: Arial, Helvetica, sans-serif;
                line-height: 1.5;
                color: #222222;
                font-size: 12px;
                margin: 0;
                padding: 0;
            }

            p {
                margin: 0;
            }

            a {
                color: #ffbb00;
                text-decoration: none;
                display: inline-block;
            }

            img {
                border: 0 none;
                display: block;
            }

            @media(min-width:480px) {
                .product-header td {
                    padding: 25px;
                }

                .product-image,
                .product-title,
                .product-price {
                    border-bottom: 1px solid #eeeeee;
                }

                .product-title {
                    padding-left: 15px;
                }

                .product-price {
                    padding-right: 25px;
                }
            }

            @media (max-width:479px) {
                body {
                    padding-left: 10px;
                    padding-right: 10px;
                }

                table,
                table > tbody,
                table > tr,
                table > tbody > tr,
                table > tr > td,
                table > tbody > tr > td {
                    width: 100% !important;
                    max-width: 100% !important;
                    display: block !important;
                    overflow: hidden !important;
                    box-sizing: border-box;
                    /*height: auto !important;*/
                }

                .table-mobile-small {
                    width: 95% !important;
                    max-width: 100% !important;
                    display: block !important;
                    overflow: hidden !important;
                    box-sizing: border-box;
                    height: auto !important;
                }

                .full-image {
                    width: 100% !important;
                }

                .footer-content p { 
                }

                .product-title,
                .product-price {
                    width: 50% !important;
                    float: left;
                    border-bottom: 1px solid #eeeeee;
                }

                .product-image,
                .product-title,
                .product-price {
                    padding: 10px;
                }

                .product-image img {
                    width: 100% !important;
                }

                .product-price p {
                    text-align: right !important;
                }

                .product-header {
                    display: none !important;
                }

                .header-item {
                    display: table-cell !important;
                    float: none !important;
                    width: 50% !important;
                }

                .table-mobile {
                    box-shadow: none !important;
                    margin: 0;
                    border-radius: 0;
                }
            }


            .modal, table, *, tr, td, th { 
                @if (Lang::getLang() == 'Ar') 
                direction: rtl!important;
                text-align: right;
                @else
                direction: ltr!important;
                text-align: left;
                @endif
            }

        </style>

    </head>
    <body>

        <table width="100%" cellpadding="0" cellspacing="0">

            <tr>
                <td >

                    <!-- ========= Table content ========= -->


                    <table cellpadding="0" cellspacing="0" width="600" class="table-mobile" align="center">
                        <tr>
                            <td height="25"></td>
                        </tr>

                        <!-- ========= Header ========= -->

                        <tr>
                            <td> 
                                <table cellpadding="0" cellspacing="0" class="table-mobile-small" align="center">
                                    <tr>
                                        <td class="header-item">
                                            <img src="{{ url('/image/logo.png') }}" alt="" width="50px" />
                                        </td>
                                        <td class="header-item">
                                            <p style="font-family:sans-serif;font-size:20px;font-weight:bold;text-transform:uppercase;margin-top:0;margin-bottom:0;color:#484848;text-align:right;">
                                                {{ __('Invoice') }}
                                            </p>
                                            <p style="font-family:sans-serif;font-size:12px;font-weight:normal;text-transform:uppercase;margin-top:0;margin-bottom:0;color:#484848;text-align:right;">
                                                {{ $order->id }}
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- ========= Divider ========= -->

                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" width="100%" align="center">
                                    <tr>
                                        <td height="20"></td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom:1px solid #f8f8f8;" height="1"></td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <!-- ========= Intro text ========= -->

                        <tr>
                            <td style="background:#f7f7f7;padding:35px 0;border-top:1px solid #eeeeee;">
                                <table cellpadding="0" cellspacing="0" class="table-mobile-small" align="center">

                                    <tr>
                                        <td colspan="2">
                                            <p style="font-family:sans-serif;font-size:22px;font-weight:bold;text-transform:none;margin-top:0;margin-bottom:10px;color:#464951;">
                                                {{ __('Your order is completed') }}!!
                                            </p>
                                            <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:20px;color:#464951;">
                                                {{ optional(optional(App\Setting::where('name', 'order_header'))->first())->value }}
                                                <!--                                            <a href="https://themeforest.net/item/mobel-furniture-website-template/20382155" style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:0;color:#3a3d45;text-decoration:underline;">
                                                                                                Mobel Furniture Store
                                                                                            </a>-->
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- ========= User info ========= -->

                        <tr>
                            <td style="background:#ffffff;padding:35px 0;border-top:1px solid #eeeeee;border-bottom:1px solid #eeeeee;">
                                <table cellpadding="0" cellspacing="0" class="table-mobile-small" align="center">
                                    <tr>
                                        <td width="50%" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%" align="center">
                                                <tr>
                                                    <td style="padding-top:5px;padding-bottom:5px;border-bottom:1px solid #f5f5f5;">
                                                        <p style="font-family:sans-serif;font-size:22px;font-weight:normal;text-transform:none;margin:0;color:#3a3d45;">
                                                            <strong>{{ __('order details') }}</strong>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top:5px;padding-bottom:5px;border-bottom:1px solid #f5f5f5;">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin:0;color:#3a3d45;">
                                                            <strong>{{ __('Name') }}:</strong> {{ $order->user->name }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top:5px;padding-bottom:5px;border-bottom:1px solid #f5f5f5;">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin:0;color:#3a3d45;">
                                                            <strong>{{ __('Phone') }}:</strong> {{ $order->phone }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top:5px;padding-bottom:5px;border-bottom:1px solid #f5f5f5;">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin:0;color:#3a3d45;">
                                                            <strong>{{ __('Email') }}:</strong> {{ $order->email }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top:5px;padding-bottom:5px;border-bottom:1px solid #f5f5f5;">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin:0;color:#3a3d45;">
                                                            <strong>{{ __('Address') }}:</strong> {{ $order->address }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top:5px;padding-bottom:5px;border-bottom:1px solid #f5f5f5;">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin:0;color:#3a3d45;">
                                                            <strong>{{ __('City') }}:</strong> {{ $order->city }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-top:5px;padding-bottom:5px;border-bottom:1px solid #f5f5f5;">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin:0;color:#3a3d45;">
                                                            <strong>{{ __('Zipcode') }}:</strong> {{ $order->zipcode }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td> 
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <!-- ========= Booking details ========= -->

                        <tr>
                            <td style="background-color:#ffffff;">

                                <table class="table" cellpadding="0" cellspacing="0" width="100%" align="center">

                                    <tbody>

                                        <!----------- product table header ----------->

                                        <tr class="product-header">
                                            <td width="180" valign="middle" style="background-color:#f7f7f7;width:180px;">
                                                <p style="font-family:sans-serif;font-size:10px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;">

                                                </p>
                                            </td>
                                            <td valign="middle" style="background-color:#f7f7f7;">
                                                <p style="font-family:sans-serif;font-size:10px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;">
                                                    {{ __('product') }}
                                                </p>
                                            <td valign="middle" style="background-color:#f7f7f7;">
                                                <p style="font-family:sans-serif;font-size:10px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;">
                                                    {{ __('amount') }}
                                                </p>
                                            </td>
                                            <td valign="middle" align="right" style="background-color:#f7f7f7;">
                                                <p style="font-family:sans-serif;font-size:10px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;text-align:right;">
                                                    {{ __('Price') }}
                                                </p>
                                            </td>
                                            <td valign="middle" align="right" style="background-color:#f7f7f7;">
                                                <p style="font-family:sans-serif;font-size:10px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;text-align:right;">
                                                    {{ __('shipping price') }}
                                                </p>
                                            </td>
                                            <td valign="middle" align="right" style="background-color:#f7f7f7;">
                                                <p style="font-family:sans-serif;font-size:10px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;text-align:right;">
                                                    {{ __('total') }}
                                                </p>
                                            </td>
                                        </tr>

                                        <!--product-->
                                        @foreach($order->details()->get() as $item)
                                        <tr>
                                            <td width="200" valign="middle" class="product-image" style="width:200px;">
                                                <a href="#" style="margin:0;padding:5px;text-decoration:none;">
                                                    <img src="{{ optional($item->product)->photos()->first()? optional($item->product)->photos()->first()->url : '' }}" alt="" height="30px" />
                                                </a>
                                            </td>
                                            <td width="300" valign="middle" class="product-title">
                                                <p style="font-family:sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;">
                                                    {{ optional($item->product)->name }}
                                                </p>
                                                <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin:0;color:#60636b;">
                                                    {{ optional($item->product)->category->name }}
                                                </p>
                                            </td>
                                            <td width="100" valign="middle" class="product-price">
                                                <p style="font-family:sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;text-align:right;">
                                                    {{ $item->amount }}
                                                </p> 
                                            </td>
                                            <td width="100" valign="middle" class="product-price">
                                                <p style="font-family:sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;text-align:right;">
                                                    EGP {{ $item->price }}
                                                </p> 
                                            </td>
                                            <td width="100" valign="middle" class="product-price">
                                                <p style="font-family:sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;text-align:right;">
                                                    EGP {{ $item->shipping_price }}
                                                </p> 
                                            </td>
                                            <td width="100" valign="middle" class="product-price">
                                                <p style="font-family:sans-serif;font-size:18px;font-weight:bold;text-transform:uppercase;margin:0;color:#3a3d45;text-align:right;">
                                                    EGP {{ $item->total + $item->shipping_price }}
                                                </p> 
                                            </td>
                                        </tr>
                                        @endforeach 
                                    </tbody>


                                </table>
                            </td>
                        </tr>

                        <!-- ========= Booking price ========= -->

                        <tr>
                            <td style="background-color:#f7f7f7;color:#3a3d45;padding:25px 0;" class="footer-content">

                                <table class="table" cellpadding="0" cellspacing="0" class="table-mobile-small" align="center">

                                    <tr>
                                        <td style="padding-bottom:20px;">
                                            <table cellpadding="0" cellspacing="0" width="100%" align="center">
                                                <tr>
                                                    <td width="50%" valign="top">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:0;padding:3px 0;color:#3a3d45;">
                                                            <strong>Discount {{ $order->discount }}%</strong>
                                                        </p>
                                                    </td>
                                                    <td width="50%" valign="top">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:0;padding:3px 0;color:#3a3d45;text-align:right;">
                                                            $ {{ $order->getDiscountValue() }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="50%" valign="top">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:0;padding:3px 0;color:#3a3d45;">
                                                            <strong>{{ __('shipping') }}</strong>
                                                        </p>
                                                    </td>
                                                    <td width="50%" valign="top">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:0;padding:3px 0;color:#3a3d45;text-align:right;">
                                                            $ {{ $order->getShipingTotal() }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="50%" valign="top">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:0;padding:3px 0;color:#3a3d45;">
                                                            <strong>{{ __('additional') }}  {{ $order->additional }}%</strong>
                                                        </p>
                                                    </td>
                                                    <td width="50%" valign="top">
                                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:0;padding:3px 0;color:#3a3d45;text-align:right;">
                                                            $ {{ $order->getAdditionalValue() }}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding-top:20px; border-top:1px solid #dddddd">
                                            <table cellpadding="0" cellspacing="0" width="100%" align="center">
                                                <tr>
                                                    <td width="50%" valign="top">
                                                        <p style="font-family:sans-serif;font-size:28px;font-weight:bold;text-transform:none;margin-top:0;margin-bottom:0;padding:0;color:#3a3d45;">
                                                            <strong>{{ __('Total price') }}</strong>
                                                        </p>
                                                    </td>
                                                    <td width="50%" valign="top">
                                                        <p style="font-family:sans-serif;font-size:28px;font-weight:bold;text-transform:none;margin-top:0;margin-bottom:0;padding:0;color:#3a3d45;text-align:right;">
                                                            $ {{ $order->getTotal() }}
                                                        </p>
                                                    </td>
                                                </tr> 
                                            </table>
                                        </td>
                                    </tr>


                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding-top:20px;">

                                <table cellpadding="0" cellspacing="0" class="table-mobile-small" align="center">
                                    <tr>
                                        <td>
                                            <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:20px;padding:0;color:#484848;text-align:center;">
                                                Payments should be made within 30 days with one of the options below, or you can enter any note here if necessary, you have much space:
                                            </p>
                                            <p style="font-family:sans-serif;font-size:14px;font-weight:normal;text-transform:none;margin-top:0;margin-bottom:0;padding:0;color:#484848;text-align:center;">
                                                <strong>Payment Methods:</strong> Cheque, PayPal, WesternUnion <br />
                                                <strong>We accept:</strong> MasterCard, Visa, AmericanExpress <br />
                                            </p>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <tr>
                            <td height="25"></td>
                        </tr>
                    </table>


                </td>
            </tr> 
        </table>

    </body>
</html>
