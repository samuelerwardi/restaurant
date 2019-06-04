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
