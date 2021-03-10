 
<style>
    .form-group {
        height: 80px
    }
    label {
        color: black!important;
    }
</style>
<form method="post" enctype="multipart/form-data" class="form" action="{{ $builder['edit_route'] }}" id="edit-form" >   
    <div class="box-body row">
        {{ csrf_field() }}
        @foreach($builder["cols"] as $col)

        @if ($col["editable"])

        @if ($col["type"] == "select")
        <div class="form-group w3-padding {{ $col['col'] == null? 'col-lg-4 col-md-4 col-sm-6 col-xs-12' : $col['col'] }} ">
            <label for="edit-{{ $col['id'] }}">{{ $col['label'] }}</label>
            <select
                {{ $col["required"]? "required" : '' }} 
                class="form-control {{ $col['class'] }} select2" 
                name="{{ $col['name'] }}" 
                id="edit-{{ $col['id'] }}"  >
                <option disabled="" >select {{ $col["label"] }}</option>
                @foreach($col["data"] as $data)
                <option value="{{ $data[0] }}" >{{ $data[1] }}</option>
                @endforeach
            </select> 
            <script>
                $("#edit-{{ $col['id'] }}").val('{{ $col["value"] }}');
            </script>
        </div>
        @elseif ($col["type"] == "enum")
        <div class="form-group w3-padding {{ $col['col'] == null? 'col-lg-4 col-md-4 col-sm-6 col-xs-12' : $col['col'] }} " style="border: 1px solid lightgray;" >

            <label for="edit-{{ $col['id'] }}">{{ $col['label'] }}</label>  
            <br>
            <input type="hidden" id="edit-{{ $col['id'] }}" name="{{ $col['name'] }}" value="{{ $col['value'] }}" >
            @foreach($col["data"] as $data)
            <div 
                class="w3-round w3-col btn w3-white btn-sm btn-flat" 
                onclick="$(this).find('input[type=radio]')[0].click()"
                style="border: 1px solid lightgray;cursor: pointer;width: {{ (strlen($data[1]) * 5) + 15 }}px;margin: 5px;float:{{ ($builder['direction']=='rtl')? 'right' : 'left'  }}" >
                <span>{{ $data[1] }}</span>
                <input 
                    {{ $data[0] == $col['value'] ? 'checked': '' }}
                    type="radio" 
                    onclick="$('#edit-{{ $col['id'] }}').val(this.value)"
                    name="input-{{ $col['name'] }}" 
                    value="{{ $data[0] }}">
            </div>
            @endforeach 

        </div>
        @elseif ($col["type"] == "rate")
        <div class="form-group w3-padding {{ $col['col'] == null? 'col-lg-4 col-md-4 col-sm-6 col-xs-12' : $col['col'] }} "> 
            <label for="edit-{{ $col['id'] }}">{{ $col['label'] }}</label>  
            <input type="hidden" name="{{ $col['name'] }}" id='{{ $col["id"] }}' >
            <div class="{{ $col['class'] }}" id='rate-{{ $col["id"] }}'  >

            </div>
        </div>
        <script>
                    $(document).ready(function(){
            var r{{ $col['id'] }} = new Ratebar(document.getElementById('rate-{{ $col["id"] }}'));
                    r{{ $col['id'] }}.setOnRate(function(){
            document.getElementById('{{ $col["id"] }}').value = r{{ $col['id'] }}.value;
            });
                r{{ $col['id'] }}.rate({{ $col['value'] }});
            });</script> 
        @elseif ($col["type"] == "image")
        <div class="form-group w3-padding {{ $col['col'] == null? 'col-lg-4 col-md-4 col-sm-6 col-xs-12' : $col['col'] }} ">
            <label for="edit-">{{ $col['label'] }} *</label>
            <div class="form-control cursor" onclick="$('.edit-image-{{ $col['name'] }}').click()" >
                <span class="fa fa-image w3-large" ></span>
                <span> 90&times;90 </span>
            </div>
            <br>
            <img class="imageView w3-round" src="{{ $builder['url'] }}/{{ $col['value'] }}" width="50px" height="50px" onclick="viewImage(this)"  style="cursor: pointer" >
            <input 
                type="file" 
                onchange="loadImage(this, event)" 
                class="hidden edit-image-{{ $col['name'] }} {{ $col['class'] }}"  
                name="{{ $col['name'] }}" 
                accept="image/x-png,image/gif,image/jpeg" >
        </div>  
        @elseif ($col["type"] == "pdf")
        <div class="form-group w3-padding {{ $col['col'] == null? 'col-lg-4 col-md-4 col-sm-6 col-xs-12' : $col['col'] }} ">
            <label for="edit-">{{ $col['label'] }} *</label>
            <div class="form-control cursor" onclick="$('.edit-file-{{ $col['id'] }}').click()" >
                <span class="fa fa-image w3-large" ></span>
                <span> max file size 5M </span>
            </div>
            <br>
            <span class="fileView label label-primary" onclick="viewFile(this)" style="cursor: pointer" >
                {{ $col['value'] }}
            </span>
            <input 
                type="file" 
                onchange="loadFile(this, event)" 
                class="hidden edit-file-{{ $col['id'] }} {{ $col['class'] }}" 
                {{ $col["required"]? "required" : '' }}
                name="{{ $col['name'] }}" 
                accept="application/pdf" >
        </div>  
        @elseif ($col["type"] == "checkbox")
        <div class="form-group w3-padding {{ $col['col'] == null? 'col-lg-4 col-md-4 col-sm-6 col-xs-12' : $col['col'] }}">
            <div class="" > 
                <label for="edit-">{{ $col['label'] }} *</label> 
                <input type="hidden" name="{{ $col['name'] }}" id="edit-input-{{ $col['id'] }}" value="{{ $col['value'] }}" >
                <input type="checkbox" class="shadow" id="edit-{{ $col['id'] }}" placeholder="{{ $col['placeholder'] }}"
                {{ $col['value']==1? 'checked' : '' }}
                onclick="this.checked? $('#edit-input-{{ $col['id'] }}').val(1) : $('#edit-input-{{ $col['id'] }}').val(0)"  >
                <label for="edit-{{ $col['id'] }}" class="switch {{ $col['class'] }}"></label>
            </div> 
        </div>  
        @elseif ($col["type"] == "textarea")
        <div class="form-group w3-padding {{ $col['col'] == null? 'col-lg-4 col-md-4 col-sm-6 col-xs-12' : $col['col'] }} ">
            <label for="edit-{{ $col['id'] }}">{{ $col['label'] }}</label>
            <textarea
                {{ $col["required"]? "required" : '' }} 
                class="form-control {{ $col['class'] }}" 
                id="edit-{{ $col['id'] }}" 
                name="{{ $col['name'] }}" 
                placeholder="{{ $col['placeholder'] }}">{{ $col['value'] }}</textarea> 
        </div> 
        @elseif ($col["type"] == "phone")
        <div class="form-group w3-padding {{ $col['col'] == null? 'col-lg-4 col-md-4 col-sm-6 col-xs-12' : $col['col'] }} ">
            <label for="edit-{{ $col['id'] }}">{{ $col['label'] }}</label>
            <input 
                {{ $col["required"]? "required" : '' }}
                type="tel" 
                class="form-control {{ $col['class'] }}" 
                id="edit-{{ $col['id'] }}" 
                name="{{ $col['name'] }}" 
                value="{{ $col['value'] }}"
                placeholder="{{ $col['placeholder'] }}">
        </div> 
        @else 
        <div class="form-group w3-padding {{ $col['col'] == null? 'col-lg-4 col-md-4 col-sm-6 col-xs-12' : $col['col'] }} ">
            <label for="edit-{{ $col['id'] }}">{{ $col['label'] }}</label>
            <input 
                {{ $col["required"]? "required" : '' }}
                type="{{ $col['type'] }}" 
                class="form-control {{ $col['class'] }}" 
                id="edit-{{ $col['id'] }}" 
                
                {{ $col['type']=='number'? 'min=0' : '' }}
                
                name="{{ $col['name'] }}" 
                value="{{ $col['value'] }}"
                placeholder="{{ $col['placeholder'] }}">
        </div> 
        @endif


        @endif

        @endforeach
    </div>
    <br>
    <br>
    <div class="box-footer">
        <button type="button" class="btn bg-gray btn-flat margin shadow" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn bg-purple btn-flat margin shadow">حفظ</button>
    </div>  
</form>  