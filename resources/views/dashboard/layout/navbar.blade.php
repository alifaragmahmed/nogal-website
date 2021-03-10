 
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar shadow"  >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="background: url({{ url('/image/user-info.jpg') }}) no-repeat;height: 150px;padding-top: 50px;" >
            <div class="pull-left image">
                <img src="{{ url('/') }}/image/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 
                </a>
            </div>
        </div> 
        
        <ul class="sidebar-menu font" data-widget="tree">
            <li class="header text-uppercase">{{ __('main navigation') }}</li>
            
            <li class="treeview font w3-text-amber" onclick="showPage('dashboard/main')" >
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{ __('dashboard') }}</span> 
                </a>
            </li>   
             
            <li class="treeview font w3-text-red" onclick="showPage('dashboard/category')">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>{{ __('categories') }}</span> 
                </a>
            </li> 
            <!--             
            <li class="treeview font w3-text-blue" onclick="showPage('dashboard/subcategory')">
                <a href="#">
                    <i class="fa fa-cube"></i> <span>{{ __('sub categories') }}</span> 
                </a>
            </li> 
             -->
            <li class="treeview font w3-text-cyan" onclick="showPage('dashboard/product')">
                <a href="#">
                    <i class="fa fa-ticket"></i> <span>{{ __('products') }}</span> 
                </a>
            </li>   
             
            <li class="treeview font w3-text-cyan" onclick="showPage('dashboard/productphoto')">
                <a href="#">
                    <i class="fa fa-picture-o"></i> <span>{{ __('products photo') }}</span> 
                </a>
            </li>   
            
            <li class="treeview font w3-text-cyan" onclick="showPage('dashboard/productcolor')">
                <a href="#">
                    <i class="fa fa-circle"></i> <span>{{ __('products colors') }}</span> 
                </a>
            </li>   
            
            <li class="treeview font w3-text-deep-purple" onclick="showPage('dashboard/slide')">
                <a href="#">
                    <i class="fa fa-desktop"></i> <span>{{ __('slides') }}</span> 
                </a>
            </li>  
            
            <li class="treeview font w3-text-indigo" onclick="showPage('dashboard/order')">
                <a href="#">
                    <i class="fa fa-send"></i> <span>{{ __('orders') }}</span> 
                </a>
            </li> 
            
            <li class="treeview font w3-text-purple" onclick="showPage('dashboard/user')">
                <a href="#">
                    <i class="fa fa-users"></i> <span>{{ __('users') }}</span> 
                </a>
            </li> 
            <!--
            <li class="treeview font w3-text-blue-gray" onclick="showPage('dashboard/option')">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>{{ __('settings') }}</span> 
                </a>
            </li>
            -->
             
            <li class="header text-uppercase">{{ __('website settings') }}</li>
            
            <li class="treeview font w3-text-blue-gray" onclick="showPage('dashboard/chatbot')">
                <a href="#">
                    <i class="fa fa-android"></i> <span>{{ __('chatbot') }}</span> 
                </a>
            </li>
            
            <li class="treeview font w3-text-blue-gray" onclick="showPage('dashboard/option')">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>{{ __('settings') }}</span> 
                </a>
            </li>
            <li class="treeview font w3-text-blue-gray" onclick="showPage('dashboard/idea')">
                <a href="#">
                    <i class="fa fa-lightbulb-o"></i> <span>{{ __('ideas') }}</span> 
                </a>
            </li>
            <li class="treeview font w3-text-blue-gray" onclick="showPage('dashboard/blog')">
                <a href="#">
                    <i class="fa fa-rss"></i> <span>{{ __('blogs') }}</span> 
                </a>
            </li>
            <li class="treeview font w3-text-blue-gray" onclick="showPage('dashboard/instagram')">
                <a href="#">
                    <i class="fa fa-instagram"></i> <span>{{ __('instagram') }}</span> 
                </a>
            </li>
            
           
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>