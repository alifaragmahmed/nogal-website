  
@php 
    $builder = (new App\MailBox)->getViewBuilder(); 
@endphp  
 
    <section class="content-header">
      <h1>
        صندوق الرسائل 
      </h1> 
    </section>
  

    <!-- Main content -->
    <section class="content" style="direction: rtl" >
        
      <div class="row">
        <!-- /.col -->
        <div class="col-md-9 message inbox">
            <div class="box box-primary w3-round shadow" style="min-height: 300px" >
            <div class="box-header with-border">
              <h3 class="box-title">صندوق الوارد</h3>
 
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding"> 
              <div class="table-responsive mailbox-messages">
                  <table class="table table-hover table-striped" id="table1" >
                    <thead >
                        <tr> 
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>  
                            <th></th>  
                        </tr>
                    </thead>
                  <tbody>   
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body --> 
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9 message sent" style="display: none" >
            <div class="box box-primary w3-round shadow" style="min-height: 300px" >
            <div class="box-header with-border">
              <h3 class="box-title">المرسل</h3>
 
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding"> 
              <div class="table-responsive mailbox-messages">
                  <table class="table table-hover table-striped" id="table2" >
                    <thead >
                        <tr> 
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>  
                            <th></th>  
                        </tr>
                    </thead>
                  <tbody>   
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body --> 
          </div>
          <!-- /. box -->
        </div>
        
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-raised btn-block margin-bottom" 
            data-toggle="modal" 
            data-target="#addModal" >ارسال رساله</a>

          <div class="box box-solid w3-round shadow">
            <div class="box-header with-border">
              <h3 class="box-title">الملف</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                  <li class="active" onclick="$('.message').hide();$('.inbox').slideDown(500);this.className='active'" ><a href="#"><i class="fa fa-inbox"></i> صندوق الوارد
                  <span class="label label-primary pull-right">{{ App\Mailbox::where('favourite', '1')->count() }}</span></a></li>
                <li onclick="$('.message').hide();$('.sent').slideDown(500);this.className='active'" ><a href="#"><i class="fa fa-envelope-o"></i> المرسل</a></li> 
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>   
    
<!-- add modal --> 
<div class="modal fade" tabindex="-1" role="dialog" id="addModal" style="width: 100%!important;height: 100%!important" >
    <div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">ارسال رساله</h4>
      </div>
      <div class="modal-body">
        {!! $builder->loadAddView() !!} 
      </div> 
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
 
<script>
$(document).ready(function() {
     $('#table1').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ url('/dashboard/mailbox/data1') }}",
        "columns":[ 
            { "data": "email" },      
            { "data": "title" },      
            { "data": "message" },      
            { "data": "date" },      
            { "data": "action" }
        ]
     });
     $('#table2').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ url('/dashboard/mailbox/data2') }}",
        "columns":[ 
            { "data": "email" },      
            { "data": "title" },      
            { "data": "message" },      
            { "data": "date" },      
            { "data": "action" }
        ]
     });
     
     formAjax(); 
        
}); 
</script> 