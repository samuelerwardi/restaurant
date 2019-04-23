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
        @include('layouts.partials.header')
        @include('layouts.partials.sidebar')
    </script>
    <!-- Main Header -->
    <header class="main-header no-print">
        <a href="/home" class="logo">

            <span class="logo-lg">businessName</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>


            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">


                <button id="btnCalculator" type="button"
                        class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10 popover-default"
                        data-toggle="popover" data-trigger="click" data-content='<div id="calculator">
  <div class="row text-center" id="calc">
    <div class="calcBG col-md-12 text-center">
      <div class="row" id="result">
        <form name="calc">
          <input type="text" class="screen text-right" name="result" readonly>
        </form>
      </div>
      <div class="row">
        <button id="allClear" type="button" class="btn btn-danger" onclick="clearScreen()">AC</button>
        <button id="clear" type="button" class="btn btn-warning" onclick="clearScreen()">CE</button>
        <button id="%" type="button" class="btn" onclick="calEnterVal(this.id)">%</button>
        <button id="/" type="button" class="btn" onclick="calEnterVal(this.id)">÷</button>
      </div>
      <div class="row">
        <button id="7" type="button" class="btn" onclick="calEnterVal(this.id)">7</button>
        <button id="8" type="button" class="btn" onclick="calEnterVal(this.id)">8</button>
        <button id="9" type="button" class="btn" onclick="calEnterVal(this.id)">9</button>
        <button id="*" type="button" class="btn" onclick="calEnterVal(this.id)">x</button>
      </div>
      <div class="row">
        <button id="4" type="button" class="btn" onclick="calEnterVal(this.id)">4</button>
        <button id="5" type="button" class="btn" onclick="calEnterVal(this.id)">5</button>
        <button id="6" type="button" class="btn" onclick="calEnterVal(this.id)">6</button>
        <button id="-" type="button" class="btn" onclick="calEnterVal(this.id)">-</button>
      </div>
      <div class="row">
        <button id="1" type="button" class="btn" onclick="calEnterVal(this.id)">1</button>
        <button id="2" type="button" class="btn" onclick="calEnterVal(this.id)">2</button>
        <button id="3" type="button" class="btn" onclick="calEnterVal(this.id)">3</button>
        <button id="+" type="button" class="btn" onclick="calEnterVal(this.id)">+</button>
      </div>
      <div class="row">
        <button id="0" type="button" class="btn" onclick="calEnterVal(this.id)">0</button>
        <button id="." type="button" class="btn" onclick="calEnterVal(this.id)">.</button>
        <button id="equals" type="button" class="btn btn-success" onclick="calculate()">=</button>
        <button id="blank" type="button" class="btn">&nbsp;</button>
      </div>
    </div>
  </div>
</div>' data-html="true" data-placement="bottom">
                    <strong><i class="fa fa-calculator fa-lg" aria-hidden="true"></i></strong>
                </button>


                <a href="http://dev.ultimate-pos.localhost/pos/create" title="POS" data-toggle="tooltip"
                   data-placement="bottom" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10">
                    <strong><i class="fa fa-th-large"></i> &nbsp; POS</strong>
                </a>
                <button type="button" id="view_todays_profit" title="Today&#039;s profit" data-toggle="tooltip"
                        data-placement="bottom" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10">
                    <strong><i class="fa fa-money fa-lg"></i></strong>
                </button>

                <!-- Help Button -->
                <button type="button" id="start_tour" title="Application Tour" data-toggle="tooltip"
                        data-placement="bottom" class="btn btn-success btn-flat pull-left m-8 hidden-xs btn-sm mt-10">
                    <strong><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></strong>
                </button>

                <div class="m-8 pull-left mt-15 hidden-xs" style="color: #fff;"><strong>04/23/2019</strong></div>

                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span>Samuel Erwardi</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="http://dev.ultimate-pos.localhost/storage/business_logos/lSYbj4oaxMInwpLZgxnLWvzIZbHrgjuBcJd4Pa10.png"
                                     alt="Logo"></span>
                                <p>
                                    Samuel Erwardi
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="http://dev.ultimate-pos.localhost/user/profile"
                                       class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="http://dev.ultimate-pos.localhost/logout" class="btn btn-default btn-flat">Sign
                                        Out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>                <!-- Left side column. contains the logo and sidebar -->
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
                        <i class="fa fa-dashboard"></i> <span>
            Home</span>
                    </a>
                </li>
                <li class="treeview ">
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
                                <span class="title">
                          Users                      </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/roles">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">
                        Roles                      </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/sales-commission-agents">
                                <i class="fa fa-handshake-o"></i>
                                <span class="title">
                        Sales Commission Agents                      </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview " id="tour_step4">
                    <a href="#" id="tour_step4_menu"><i class="fa fa-address-book"></i> <span>Contacts</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="http://dev.ultimate-pos.localhost/contacts?type=supplier"><i
                                        class="fa fa-star"></i> Suppliers</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/contacts?type=customer"><i
                                        class="fa fa-star"></i> Customers</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/customer-group"><i
                                        class="fa fa-users"></i> Customer Groups</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/contacts/import"><i
                                        class="fa fa-download"></i> Import Contacts</a></li>

                    </ul>
                </li>

                <li class="treeview " id="tour_step5">
                    <a href="#" id="tour_step5_menu"><i class="fa fa-cubes"></i> <span>Products</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="http://dev.ultimate-pos.localhost/products"><i class="fa fa-list"></i>List
                                Products</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/products/create"><i
                                        class="fa fa-plus-circle"></i>Add Product</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/labels/show"><i
                                        class="fa fa-barcode"></i>Print Labels</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/variation-templates"><i
                                        class="fa fa-circle-o"></i><span>Variations</span></a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/import-products"><i
                                        class="fa fa-download"></i><span>Import Products</span></a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/import-opening-stock"><i
                                        class="fa fa-download"></i><span>Import Opening Stock</span></a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/selling-price-group"><i
                                        class="fa fa-circle-o"></i><span>Selling Price Group</span></a></li>
                    </ul>
                </li>
                <li class="treeview " id="tour_step6">
                    <a href="#" id="tour_step6_menu"><i class="fa fa-arrow-circle-down"></i> <span>Purchases</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="http://dev.ultimate-pos.localhost/purchases"><i class="fa fa-list"></i>List
                                Purchases</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/purchases/create"><i
                                        class="fa fa-plus-circle"></i> Add Purchase</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/purchase-return"><i
                                        class="fa fa-undo"></i> List Purchase Return</a></li>
                    </ul>
                </li>

                <li class="treeview " id="tour_step7">
                    <a href="#" id="tour_step7_menu"><i class="fa fa-arrow-circle-up"></i> <span>Sell</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="http://dev.ultimate-pos.localhost/sells"><i class="fa fa-list"></i>All
                                Sales</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/sells/create"><i
                                        class="fa fa-plus-circle"></i>Add Sale</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/pos"><i class="fa fa-list"></i>List POS</a>
                        </li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/pos/create"><i
                                        class="fa fa-plus-circle"></i>POS</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/sells/drafts"><i
                                        class="fa fa-pencil-square" aria-hidden="true"></i>List Drafts</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/sells/quotations"><i
                                        class="fa fa-pencil-square" aria-hidden="true"></i>List quotations</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/sell-return"><i class="fa fa-undo"></i>List
                                Sell Return</a></li>
                    </ul>
                </li>

                <li class="treeview ">
                    <a href="#"><i class="fa fa-truck" aria-hidden="true"></i> <span>Stock Transfers</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="http://dev.ultimate-pos.localhost/stock-transfers"><i
                                        class="fa fa-list"></i>List Stock Transfers</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/stock-transfers/create"><i
                                        class="fa fa-plus-circle"></i>Add Stock Transfer</a></li>
                    </ul>
                </li>

                <li class="treeview ">
                    <a href="#"><i class="fa fa-database" aria-hidden="true"></i> <span>Stock Adjustment</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="http://dev.ultimate-pos.localhost/stock-adjustments"><i
                                        class="fa fa-list"></i>List Stock Adjustments</a></li>
                        <li class=""><a href="http://dev.ultimate-pos.localhost/stock-adjustments/create"><i
                                        class="fa fa-plus-circle"></i>Add Stock Adjustment</a></li>
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
                    <a href="#" id="tour_step8_menu"><i class="fa fa-bar-chart-o"></i> <span>Reports</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/profit-loss"><i
                                        class="fa fa-money"></i>Profit / Loss Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/purchase-sell"><i
                                        class="fa fa-exchange"></i>Purchase &amp; Sale</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/tax-report"><i
                                        class="fa fa-tumblr" aria-hidden="true"></i>Tax Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/customer-supplier"><i
                                        class="fa fa-address-book"></i>Supplier &amp; Customer Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/customer-group"><i
                                        class="fa fa-users"></i>Customer Groups Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/stock-report"><i
                                        class="fa fa-hourglass-half" aria-hidden="true"></i>Stock Report</a></li>


                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/lot-report"><i
                                        class="fa fa-hourglass-half" aria-hidden="true"></i>Lot Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/trending-products"><i
                                        class="fa fa-line-chart" aria-hidden="true"></i>Trending Products</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/stock-adjustment-report"><i
                                        class="fa fa-sliders"></i>Stock Adjustment Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/product-purchase-report"><i
                                        class="fa fa-arrow-circle-down"></i>Product Purchase Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/product-sell-report"><i
                                        class="fa fa-arrow-circle-up"></i>Product Sell Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/purchase-payment-report"><i
                                        class="fa fa-money"></i>Purchase Payment Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/sell-payment-report"><i
                                        class="fa fa-money"></i>Sell Payment Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/expense-report"><i
                                        class="fa fa-search-minus" aria-hidden="true"></i></i>Expense Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/register-report"><i
                                        class="fa fa-briefcase"></i>Register Report</a></li>

                        <li class=""><a href="http://dev.ultimate-pos.localhost/reports/sales-representative-report"><i
                                        class="fa fa-user" aria-hidden="true"></i>Sales Representative Report</a></li>


                    </ul>
                </li>


                <!-- Call restaurant module if defined -->


                <li class="treeview ">
                    <a href="http://dev.ultimate-pos.localhost/notification-templates"><i class="fa fa-envelope"></i>
                        <span>Notification Templates</span>
                    </a>
                </li>


                <li class="treeview ">

                    <a href="#" id="tour_step2_menu"><i class="fa fa-cog"></i> <span>Settings</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu" id="tour_step3">
                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/business/settings" id="tour_step2"><i
                                        class="fa fa-cogs"></i> Business Settings</a>
                        </li>
                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/business-location"><i
                                        class="fa fa-map-marker"></i> Business Locations</a>
                        </li>
                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/invoice-schemes"><i class="fa fa-file"></i>
                                <span>Invoice Settings</span></a>
                        </li>

                        <!-- payment account -->
                        <li class="hide ">
                            <a href="http://dev.ultimate-pos.localhost/payment-account"><i class="fa fa-money"></i>
                                <span>Payment Account</span></a>
                        </li>

                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/barcodes"><i class="fa fa-barcode"></i> <span>Barcode Settings</span></a>
                        </li>

                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/printers"><i class="fa fa-share-alt"></i> <span>Receipt Printers</span></a>
                        </li>

                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/brands"><i class="fa fa-diamond"></i> <span>Brands</span></a>
                        </li>

                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/tax-rates"><i class="fa fa-bolt"></i> <span>Tax Rates</span></a>
                        </li>

                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/units"><i class="fa fa-balance-scale"></i> <span>Units</span></a>
                        </li>

                        <li class="">
                            <a href="http://dev.ultimate-pos.localhost/categories"><i class="fa fa-tags"></i> <span>Categories </span></a>
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

        <!-- Add currency related field-->
        <input type="hidden" id="__code" value="IDR">
        <input type="hidden" id="__symbol" value="Rp">
        <input type="hidden" id="__thousand" value=",">
        <input type="hidden" id="__decimal" value=".">
        <input type="hidden" id="__symbol_placement" value="before">
        <!-- End of currency related field-->


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Welcome Samuel,
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="btn-group pull-right" data-toggle="buttons">
                        <label class="btn btn-info active">
                            <input type="radio" name="date-filter"
                                   data-start="2019-04-23"
                                   data-end="2019-04-23"
                                   checked> Today
                        </label>
                        <label class="btn btn-info">
                            <input type="radio" name="date-filter"
                                   data-start="2019-04-22"
                                   data-end="2019-04-28"
                            > This Week
                        </label>
                        <label class="btn btn-info">
                            <input type="radio" name="date-filter"
                                   data-start="2019-04-01"
                                   data-end="2019-04-30"
                            > This Month
                        </label>
                        <label class="btn btn-info">
                            <input type="radio" name="date-filter"
                                   data-start="2019-01-01"
                                   data-end="2019-12-31"
                            > This Financial Year
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total purchase</span>
                            <span class="info-box-number total_purchase"><i
                                        class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Sales</span>
                            <span class="info-box-number total_sell"><i
                                        class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
          <span class="info-box-icon bg-yellow">
            <i class="fa fa-dollar"></i>
        <i class="fa fa-exclamation"></i>
          </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Purchase due</span>
                            <span class="info-box-number purchase_due"><i
                                        class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <!-- <div class="clearfix visible-sm-block"></div> -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
          <span class="info-box-icon bg-yellow">
            <i class="ion ion-ios-paper-outline"></i>
            <i class="fa fa-exclamation"></i>
          </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Invoice due</span>
                            <span class="info-box-number invoice_due"><i
                                        class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <br>
            <!-- sales chart start -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Sales Last 30 Days</h3>
                        </div>
                        <div class="box-body">


                            <div class="charts" style="background: inherit;">
                                <div data-duration="500" class="charts-loader enabled"
                                     style="display: none; position: relative; top: 170px; height: 0;">
                                    <center>
                                        <div class="loading-spinner"
                                             style="border: 3px solid #000000; border-right-color: transparent;"></div>
                                    </center>
                                </div>
                                <div class="charts-chart">
                                    <div id="buHpmnfGJR" style="height: 400px;
    
    "></div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Sales Current Financial Year</h3>
                        </div>
                        <div class="box-body">


                            <div class="charts" style="background: inherit;">
                                <div data-duration="500" class="charts-loader enabled"
                                     style="display: none; position: relative; top: 170px; height: 0;">
                                    <center>
                                        <div class="loading-spinner"
                                             style="border: 3px solid #000000; border-right-color: transparent;"></div>
                                    </center>
                                </div>
                                <div class="charts-chart">
                                    <div id="dXPpRybJrs" style="height: 400px;
    
    "></div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- sales chart end -->

            <!-- products less than alert quntity -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="box box-warning">
                        <div class="box-header">
                            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                            <h3 class="box-title">Product Stock Alert <i class="fa fa-info-circle text-info hover-q "
                                                                         aria-hidden="true"
                                                                         data-container="body" data-toggle="popover"
                                                                         data-placement="auto"
                                                                         data-content="Products with low stock.<br/><small class='text-muted'>Based on product alert quantity set in add product screen.<br> Purchase this products before stock ends.</small>"
                                                                         data-html="true" data-trigger="hover"></i></h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped" id="stock_alert_table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Location</th>
                                    <th>Current stock</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box box-warning">
                        <div class="box-header">
                            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                            <h3 class="box-title">Payment Dues <i class="fa fa-info-circle text-info hover-q "
                                                                  aria-hidden="true"
                                                                  data-container="body" data-toggle="popover"
                                                                  data-placement="auto"
                                                                  data-content="Pending payment for purchases. <br/><small class='text-muted'>Based on supplier's pay term. <br/> Showing payments to be paid in 7 days or less.</small>"
                                                                  data-html="true" data-trigger="hover"></i></h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped" id="payment_dues_table">
                                <thead>
                                <tr>
                                    <th>Supplier</th>
                                    <th>Reference No</th>
                                    <th>Due Amount</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </section>
        <!-- /.content -->

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
                    <h3 class="text-center">Net Profit: <span class="modal_net_profit">
                    <i class="fa fa-refresh fa-spin fa-fw"></i>
                </span></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>            
    <!-- /.content-wrapper -->

    @include('layouts.partials.javascripts')
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