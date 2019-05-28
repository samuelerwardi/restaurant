<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ Session::get('business.name') }}</title>
    @include('layouts.partials.css')
    @yield('css')
</head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <script type="text/javascript">
                if (localStorage.getItem("upos_sidebar_collapse") == 'true') {
                    var body = document.getElementsByTagName("body")[0];
                    body.className += " sidebar-collapse";
                }
            </script>
            @include('layouts.partials.header')
            @include('layouts.partials.sidebar')
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <!-- <div class="user-panel">
                      <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <div class="pull-left info">
                        <p>Alexander Pierce</p> -->
                    <!-- Status -->
                    <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                  </div>
                </div> -->

                    <!-- search form (Optional) -->
                    <!-- <form action="#" method="get" class="sidebar-form">
                      <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                              </button>
                            </span>
                      </div>
                    </form> -->
                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">

                        <!-- Call superadmin module if defined -->

                        <!-- <li class="header">HEADER</li> -->
                        <li class="active">
                            <a href="http://dev.ultimate-pos.localhost/home">
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
                            </ul>
                        </li>

                        <li class="treeview ">
                            <a href="#"><i class="fa fa-minus-circle"></i> <span>Expenses</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="http://dev.ultimate-pos.localhost/expenses"><i class="fa fa-list"></i>List
                                        Expenses</a></li>
                                <li class=""><a href="http://dev.ultimate-pos.localhost/expenses/create"><i
                                                class="fa fa-plus-circle"></i>Add Expenses</a></li>
                                <li class=""><a href="http://dev.ultimate-pos.localhost/expense-categories"><i
                                                class="fa fa-circle-o"></i>Expense Categories</a></li>
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
                                    <i class="fa fa-money"></i>Pembelian</a>
                                </li>
                                <li class="">
                                    <a href="http://dev.ultimate-pos.localhost/reports/stock-report">
                                        <i class="fa fa-hourglass-half" aria-hidden="true"></i>Stock Report
                                    </a>
                                </li>

                                <li class="">
                                    <a href="http://dev.ultimate-pos.localhost/reports/lot-report">
                                        <i class="fa fa-hourglass-half" aria-hidden="true"></i>Lot Report
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class=" content-wrapper">
                @yield('content')
                <!-- This will be printed -->
                <section class="invoice print_section" id="receipt_section">
                </section>
            </div>
            <div class="modal fade" id="todays_profit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Today&#039;s profit</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="modal_today" value="2019-04-23">
                            <table class="table table-striped">
                                <tr>
                                    <th>Opening Stock:</th>
                                    <td>
                                        <span class="modal_opening_stock">
                                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        </span>
                                    </td>
                                    <th>Closing stock:</th>
                                    <td>
                                        <span class="modal_closing_stock">
                                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total purchase:</th>
                                    <td>
                                         <span class="modal_total_purchase">
                                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        </span>
                                    </td>
                                    <th>Total Sales:</th>
                                    <td>
                                         <span class="modal_total_sell">
                                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Stock Adjustment:</th>
                                    <td>
                                         <span class="modal_total_adjustment">
                                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        </span>
                                    </td>
                                    <th>Total Stock Recovered:</th>
                                    <td>
                                         <span class="modal_total_recovered">
                                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Expense:</th>
                                    <td colspan="3">
                                        <span class="modal_total_expense">
                                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Transfer Shipping Charges:</th>
                                    <td colspan="3">
                                        <span class="modal_total_transfer_shipping_charges">
                                            <i class="fa fa-refresh fa-spin fa-fw"></i>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                            <h3 class="text-center">Net Profit: 
                                <span class="modal_net_profit">
                                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                                </span>
                            </h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
            <audio id="success-audio">
                <source src="http://dev.ultimate-pos.localhost/audio/success.ogg?v=27" type="audio/ogg">
                <source src="http://dev.ultimate-pos.localhost/audio/success.mp3?v=27" type="audio/mpeg">
            </audio>
            <audio id="error-audio">
                <source src="http://dev.ultimate-pos.localhost/audio/error.ogg?v=27" type="audio/ogg">
                <source src="http://dev.ultimate-pos.localhost/audio/error.mp3?v=27" type="audio/mpeg">
            </audio>
            <audio id="warning-audio">
                <source src="http://dev.ultimate-pos.localhost/audio/warning.ogg?v=27" type="audio/ogg">
                <source src="http://dev.ultimate-pos.localhost/audio/warning.mp3?v=27" type="audio/mpeg">
            </audio>
        </div>
        <div class="modal fade view_modal" tabindex="-1" role="dialog"
         aria-labelledby="gridSystemModalLabel"></div>
    </body>
</html>
@include('layouts.partials.modal')
<script type="text/javascript">
  var base_url = '<?php echo asset("") ?>'
</script>
@include('layouts.partials.javascripts')
