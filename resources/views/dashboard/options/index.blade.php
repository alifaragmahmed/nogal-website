 
<style>
    label {
        color: black!important;
    }
</style>
<br>
<br>
<section class="content-header font">
    <h1 class="font" >
        options 
    </h1>
    <ol class="breadcrumb font">
        <li><a href="{{ url('/') }}/dashboard"><i class="fa fa-dashboard"></i>{{ __('dashboard') }}</a></li> 
        <li class="active">{{ __('settings') }}</li>
    </ol>
</section>


<!-- Main content -->
<section class="content w3-margin" style="direction: ltr">   
    
    <!-- theme section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row">   
        <div class="form-group w3-padding col-lg-12 col-md-12 col-sm-12">
            <label class="w3-xlarge" for="email">{{ __('theme') }}</label> 
            <div class="w3-large w3-text-gray" >
                {{ __('reload the page to see the changes') }}
            </div>
            <ul class="w3-ul row" >
                
                <li class=" col-lg-2 col-md-2 col-sm-2 w3-padding text-center" style="float: right" >
                    <img src="{{ url('/image/theme/dark-blue.jpg') }}" width="50px" height="50px" class="w3-circle" />
                    <center>
                        <span class="w3-large" >{{ __('blue sky night') }}</span>
                        <br>
                        <input type="radio" name="theme" onclick="editSetting('id=3&value=skin-blue', this)" >
                    </center>
                </li>
               
                <li class=" col-lg-2 col-md-2 col-sm-2 w3-padding text-center" style="float: right" >
                    <img src="{{ url('/image/theme/light-blue.jpg') }}" width="50px" height="50px" class="w3-circle" />
                    <center>
                        <span class="w3-large" >{{ __('light sky') }}</span>
                        <br>
                        <input type="radio" name="theme" onclick="editSetting('id=3&value=skin-blue-light', this)" >
                    </center>
                </li>
                
                <li class=" col-lg-2 col-md-2 col-sm-2 w3-padding text-center" style="float: right" >
                    <img src="{{ url('/image/theme/light-green.jpg') }}" width="50px" height="50px" class="w3-circle" />
                    <center>
                        <span class="w3-large" >{{ __('nature') }}</span>
                        <br>
                        <input type="radio" name="theme" onclick="editSetting('id=3&value=skin-green-light', this)" >
                    </center>
                </li>
                
                <li class=" col-lg-2 col-md-2 col-sm-2 w3-padding text-center" style="float: right" >
                    <img src="{{ url('/image/theme/colors.jpg') }}" width="50px" height="50px" class="w3-circle" />
                    <center>
                        <span class="w3-large" >{{ __('colorfully') }}</span>
                        <br>
                        <input type="radio" name="theme" onclick="editSetting('id=3&value=skin-dark-light', this)" >
                    </center>
                </li>
            </ul>
            <input type="hidden" id="theme" >
        </div> 
    </div> 
    <br>
    
    
    <!-- langauge section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row">   
        <div class="form-group w3-padding col-lg-12 col-md-12 col-sm-12">
            <label class="w3-xlarge" for="email">{{ __('language') }}</label> 
            <div class="w3-large w3-text-gray" >
                {{ __('reload the page to see the changes') }}
            </div>
            <ul class="w3-ul row" >
                
                <li class=" col-lg-2 col-md-2 col-sm-2 w3-padding text-center" style="float: right" >
                    <img src="{{ url('/image/flag/en_flag.png') }}" width="50px" height="50px" class="w3-circle" />
                    <center>
                        <span class="w3-large" >{{ __('english') }}</span>
                        <br>
                        <input type="radio" {{ App\Setting::find(7)->value == 'En'? 'checked' : '' }} name="theme" onclick="editSetting('id=7&value=En', this)" >
                    </center>
                </li>
               
                <li class=" col-lg-2 col-md-2 col-sm-2 w3-padding text-center" style="float: right" >
                    <img src="{{ url('/image/flag/ar_flag.png') }}" width="50px" height="50px" class="w3-circle" />
                    <center>
                        <span class="w3-large" >{{ __('arabic') }}</span>
                        <br>
                        <input type="radio" {{ App\Setting::find(7)->value == 'Ar'? 'checked' : '' }} name="theme" onclick="editSetting('id=7&value=Ar', this)" >
                    </center>
                </li> 
            </ul>
            <input type="hidden" id="theme" >
        </div> 
    </div> 
    <br>
    
    <!-- email section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row"> 
        <div class="form-group w3-padding col-lg-10 col-md-10 col-sm-10">
            <label class="w3-xlarge" for="email">{{ __('email') }}</label>
            <div class="w3-large w3-text-gray" >
               {{ __('this is the email whick the message will be sent with it') }}
            </div>
            <input  
                type="text" 
                class="form-control" 
                id="email" 
                value="{{ App\Setting::find(1)->value }}"
                placeholder="email">
        </div>  
        <div class="form-group w3-padding col-lg-2 col-md-2 col-sm-2">
            <button class="btn w3-indigo shadow btn-sm" onclick="editSetting('id=1&value='+$('#email').val(), this)" >
                <i class="fa fa-check" ></i> {{ __('save') }}
            </button>
        </div>
    </div> 
    <br>
    
    <!-- title section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row">
        <div class="form-group w3-padding col-lg-10 col-md-10 col-sm-10">
            <label class="w3-xlarge" for="title">{{ __('website title') }}</label>
            <div class="w3-large w3-text-gray" >
                {{ __('this is the title in top bar') }}
            </div>
            <input  
                type="text" 
                class="form-control" 
                id="title" 
                value="{{ App\Setting::find(2)->value }}"
                placeholder="website title">
        </div>   
        <div class="form-group w3-padding col-lg-2 col-md-2 col-sm-2">
            <button class="btn w3-indigo shadow btn-sm" onclick="editSetting('id=2&value='+$('#title').val(), this)" >
                <i class="fa fa-check" ></i> {{ __('save') }}
            </button>
        </div>
    </div> 
    <br>
    
    <!-- phone section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row">
        <div class="form-group w3-padding col-lg-10 col-md-10 col-sm-10">
            <label class="w3-xlarge" for="phone">{{ __('phone of the admin') }}</label> 
            <input  
                type="text" 
                class="form-control" 
                id="phone" 
                value="{{ App\Setting::find(4)->value }}"
                placeholder="{{ __('phone') }}">
        </div>   
        <div class="form-group w3-padding col-lg-2 col-md-2 col-sm-2">
            <button class="btn w3-indigo shadow btn-sm" onclick="editSetting('id=4&value='+$('#phone').val(), this)" >
                <i class="fa fa-check" ></i> {{ __('save') }}
            </button>
        </div>
    </div> 
    <br>
    
    <!-- about section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row">  
        <div class="form-group w3-padding col-lg-10 col-md-10 col-sm-10">
            <label class="w3-xlarge" for="phone">{{ __('privacy policy') }}</label> 
            <textarea 
                type="text" 
                class="form-control w3-large" 
                rows="10"
                id="privacy_policy"  
                placeholder="{{ __('description') }}"
                >{{ App\Setting::find(10)->value }}</textarea> 
        </div>  
        <div class="form-group w3-padding col-lg-2 col-md-2 col-sm-2">
            <button class="btn w3-indigo shadow btn-sm" onclick="editSetting2('id=10&value='+$('#privacy_policy').val(), this)" >
                <i class="fa fa-check" ></i> {{ __('save') }}
            </button>
        </div>
    </div>   
    <br>
    
      
    <!-- about section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row">  
        <div class="form-group w3-padding col-lg-10 col-md-10 col-sm-10">
            <label class="w3-xlarge" for="phone">{{ __('terms and conditions') }}</label> 
            <textarea 
                type="text" 
                class="form-control w3-large" 
                rows="10"
                id="termsAndConditions"  
                placeholder="{{ __('description') }}"
                >{{ App\Setting::find(11)->value }}</textarea> 
        </div>  
        <div class="form-group w3-padding col-lg-2 col-md-2 col-sm-2">
            <button class="btn w3-indigo shadow btn-sm" onclick="editSetting2('id=11&value='+$('#termsAndConditions').val(), this)" >
                <i class="fa fa-check" ></i> {{ __('save') }}
            </button>
        </div>
    </div>   
    <br>
    
    <!-- about section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row">  
        <div class="form-group w3-padding col-lg-10 col-md-10 col-sm-10">
            <label class="w3-xlarge" for="phone">{{ __('description arabic in about page') }}</label> 
            <textarea 
                type="text" 
                class="form-control w3-large" 
                rows="10"
                id="about_ar"  
                placeholder="{{ __('description') }}"
                >{{ App\Setting::find(5)->value }}</textarea> 
        </div>  
        <div class="form-group w3-padding col-lg-2 col-md-2 col-sm-2">
            <button class="btn w3-indigo shadow btn-sm" onclick="editSetting('id=5&value='+$('#about_ar').val(), this)" >
                <i class="fa fa-check" ></i> {{ __('save') }}
            </button>
        </div>
    </div>   
    <br>
    
    <!-- about section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row">   
        <div class="form-group w3-padding col-lg-10 col-md-10 col-sm-10">
            <label class="w3-xlarge" for="phone">{{ __('description english in about page') }}</label> 
            <textarea 
                type="text" 
                class="form-control w3-large" 
                rows="10"
                id="about_en"  
                placeholder="{{ __('description') }}"
                >{{ App\Setting::find(6)->value }}</textarea> 
        </div> 
        <div class="form-group w3-padding col-lg-2 col-md-2 col-sm-2">
            <button class="btn w3-indigo shadow btn-sm" onclick="editSetting('id=6&value='+$('#about_en').val(), this)" >
                <i class="fa fa-check" ></i> {{ __('save') }}
            </button>
        </div>
    </div> 
    <br>
    
    
    <!-- email section -->
    <div class="w3-white round shadow w3-animate-opacity table-responsive row"> 
        <div class="form-group w3-padding ">
            <label class="w3-xlarge" for="email">{{ __('translation') }}</label>
            <div class="w3-large w3-text-gray" >
               {{ __('you can translate each word in English or Arabic') }}
            </div>
            <table class="table table-bordered" >
                <tr>
                    <th>{{ __('key') }}</th>
                    <th>{{ __('word in English') }}</th>
                    <th>{{ __('word in Arabic') }}</th>
                </tr>
                @foreach(App\Translation::all() as $item)
                <tr class="dictionary-item" data-id="{{ $item->id }}" >
                    <td>
                        <div style="max-width: 150px;word-break: break-all;" >
                            {{ $item->key }}
                        </div>
                    </td>
                    <td> 
                        <input  
                            type="text" 
                            class="w3-input w3-block  word_en"   
                            value="{{ $item->word_en }}"
                            placeholder="">
                    </td>
                    <td>
                        <input  
                            type="text" 
                            class="w3-input w3-block  word_ar"   
                            value="{{ $item->word_ar }}"
                            placeholder="">
                    </td>
                </tr>
                @endforeach
            </table> 
            <br>
            <div class="form-group w3-padding ">
                <button class="btn w3-indigo shadow btn-sm" onclick="editTranslation(this)" >
                    <i class="fa fa-check" ></i> {{ __('save') }}
                </button>
            </div>
        </div>  
    </div> 
    <br>
    
    <!-- /.row -->
</section>

{{ csrf_field() }}

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    function editSetting(values, button) {
        $(button).html('<i class="fa fa-spin fa-spinner" ></i>');
        $.get('{{ url("/dashboard/option/update?") }}' + values, function (r) {
            if (r.status == 1) {
                success(r.message);
                $(button).html(' <i class="fa fa-check" ></i> {{ __('save') }}');
            } else {
                error(r.message);
                $(button).html(' <i class="fa fa-check" ></i> {{ __('save') }}');
            }
            
            if (values.indexOf("id=3") >= 0 || values.indexOf("id=7") >= 0)
                window.location.reload();
        });
    }
    
    function editSetting2(values, button) {
        $(button).html('<i class="fa fa-spin fa-spinner" ></i>');
        $.post('{{ url("/dashboard/option/update") }}', values + "&_token={{ csrf_token() }}", function (r) {
            if (r.status == 1) {
                success(r.message);
                $(button).html(' <i class="fa fa-check" ></i> {{ __('save') }}');
            } else {
                error(r.message);
                $(button).html(' <i class="fa fa-check" ></i> {{ __('save') }}');
            }
            
            if (values.indexOf("id=3") >= 0 || values.indexOf("id=7") >= 0)
                window.location.reload();
        });
    }
    
    function editTranslation(button) {
        $(button).attr('disabled', 'disabled');
        $(button).html('<i class="fa fa-spin fa-spinner" ></i>');
        
        var translations = [];
        
        $(".dictionary-item").each(function(){
            var item = {};
            item.id = $(this).attr('data-id');
            item.word_en = $(this).find(".word_en").val();
            item.word_ar = $(this).find(".word_ar").val();
            
            translations.push(item);
        }); 
        
        var data = {
            translations: JSON.stringify(translations),
            _token: '{{ csrf_token() }}'
        };
        
        $.post('{{ url("/dashboard/translation/update?") }}', $.param(data), function(r){
            if (r.status == 1) {
                success(r.message); 
            } else {
                error(r.message); 
            }
            $(button).removeAttr("disabled");
            $(button).html(' <i class="fa fa-check" ></i> {{ __('save') }}');
        });
    }
    
     
    CKEDITOR.replace( 'privacy_policy' );
    CKEDITOR.replace( 'termsAndConditions' );
</script> 
