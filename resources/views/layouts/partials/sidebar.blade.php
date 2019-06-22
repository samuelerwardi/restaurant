<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{action('HomeController@index')}}">
                    <i class="fa fa-dashboard"></i> 
                    <span>Home</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                        <span class="title">User Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="http://dev.ultimate-pos.localhost/users">
                            <i class="fa fa-user"></i>
                            <span class="title">Users</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                        <span class="title">Suppliers</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="{{action('SupplierController@create')}}">
                            <i class="fa fa-plus"></i>
                            <span class="title">Add</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{action('SupplierController@index')}}">
                            <i class="fa fa-list"></i>
                            <span class="title">List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview " id="tour_step5">
                <a href="#" id="tour_step5_menu">
                    <i class="fa fa-cubes"></i> 
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="{{action('ProductController@index')}}">
                            <i class="fa fa-list"></i>List Product
                        </a>
                    </li>
                    <li class="">
                        <a href="{{action('ProductController@create')}}">
                            <i class="fa fa-plus-circle"></i>Add Product
                        </a>
                    </li>
                    <li class="">
                        <a href="{{action('MasterBahanController@index')}}">
                            <i class="fa fa-list"></i>List Master Bahan
                        </a>
                    </li>
                    <li class="">
                        <a href="{{action('MasterBahanController@create')}}">
                            <i class="fa fa-plus-circle"></i>Add Master Bahan
                        </a>
                    </li>
                    <li class="">
                        <a href="http://dev.ultimate-pos.localhost/labels/show">
                            <i class="fa fa-barcode"></i>Print Labels
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview " id="tour_step5">
                <a href="#" id="tour_step5_menu">
                    <i class="fa fa-cubes"></i> 
                    <span>Transaksi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="{{action('TransaksiPembelianController@index')}}">
                            <i class="fa fa-plus-circle"></i>Pembelian
                        </a>
                    </li>
                    <li class="">
                        <a href="{{action('TransaksiPenjualanController@index')}}">
                            <i class="fa fa-plus-circle"></i>Penjualan
                        </a>
                    </li>
                    <li class="">
                        <a href="{{action('TransaksiKeluarController@index')}}">
                            <i class="fa fa-plus-circle"></i>Keluar
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview " id="tour_step8">
                <a href="#" id="tour_step8_menu">
                    <i class="fa fa-bar-chart-o"></i> 
                    <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="">
                        <a href="{{action('ReportController@transaksi_pembelian')}}">
                        <i class="fa fa-money"></i>Transaksi Pembelian</a>
                    </li>
                    <li class="">
                        <a href="{{action('ReportController@transaksi_penjualan')}}">
                        <i class="fa fa-money"></i>Transaksi Penjualan</a>
                    </li>
                    <li class="">
                        <a href="{{action('ReportController@transaksi_keluar')}}">
                        <i class="fa fa-money"></i>Transaksi Keluar</a>
                    </li>
                    <li class="">
                        <a href="{{action('ReportController@master_bahans_stok')}}">
                            <i class="fa fa-hourglass-half" aria-hidden="true"></i>Stok Master Bahan
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>