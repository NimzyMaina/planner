<!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") ?>" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p> <?= isset($_SESSION['full_name']) ? $_SESSION['full_name'] : "John Doe";?></p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- search form (Optional) -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..."/>
          <span class="input-group-btn">
            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
                    </div>
                </form>
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">HEADER</li>
                    <li class="<?=home('index')?>"><a href="./"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li class="treeview <?=parent('vendor')?>">
                        <a href="#"> <i class="fa fa-shopping-cart"></i> <span>Vendors</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="<?=child('list')?>"><a href="vendor_list"><i class="fa fa-circle-o"></i> List Vendors</a></li>
                            <li class="<?=child('add')?>"><a href="vendor_add"><i class="fa fa-circle-o"></i> Add Vendor</a></li>
                        </ul>
                    </li>
                    <li class="treeview <?=parent('user')?>">
                        <a href="#"> <i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="<?=child('list')?>"><a href="user_list"><i class="fa fa-circle-o"></i> List Users</a></li>
                            <li class="<?=child('add')?>"><a href="user_add"><i class="fa fa-circle-o"></i> Add User</a></li>
                        </ul>
                    </li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="#"><span>Link</span></a></li>
                    <li><a href="#"><span>Another Link</span></a></li>
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>