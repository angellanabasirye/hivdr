<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>HIV Drug Resistance Dashboard</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <!-- CSS Files -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
        <link href="../../assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../../assets/css/fonts-googleapis.css" rel="stylesheet" />
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../assets/css/main.css" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <!-- <link href="../assets/css/demo.css" rel="stylesheet" /> -->
    </head>

    <body class="sidebar-mini">
        <div class="wrapper">
            @include('layouts._partials._sidebar')  
            <div class="main-panel">
                <!-- Navbar -->
                @include('layouts._partials._navbar')
                <!-- End Navbar -->               
                    @yield('content')
                
                
            </div>
        </div> 
    </body>
    <!-- @include('layouts.scripts') -->

    <script src="../../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../../assets/js/popper.min.js" type="text/javascript"></script>
    <script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
    <script src="../../assets/js/main.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="../../assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
    <!--  Chartist Plugin  -->
    <script src="../../assets/js/plugins/chartist.min.js"></script>
    <script src="../../assets/js/plugins/chartist-bar-labels.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <!--  jVector Map  -->
    <script src="../../assets/js/plugins/jquery-jvectormap.js" type="text/javascript"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="../../assets/js/plugins/moment.min.js"></script>
    <!--  DatetimePicker   -->
    <script src="../../assets/js/plugins/bootstrap-datetimepicker.js"></script>
    <!--  Sweet Alert  -->
    <script src="../../assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script>
    <!--  Tags Input  -->
    <script src="../../assets/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script>
    <!--  Sliders  -->
    <script src="../../assets/js/plugins/nouislider.js" type="text/javascript"></script>
    <!--  Bootstrap Select  -->
    <script src="../../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
    <!--  jQueryValidate  -->
    <script src="../../assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--  Bootstrap Table Plugin -->
    <script src="../../assets/js/plugins/bootstrap-table.js"></script>
    <!--  DataTable Plugin -->
    <script src="../../assets/js/plugins/jquery.dataTables.min.js"></script>
    <!--  Full Calendar   -->
    <script src="../../assets/js/plugins/fullcalendar.min.js"></script>
     <script type="text/javascript">

            var $table = $('#bootstrap-table');

            function operateFormatter(value, row, index) {
                return [
                    '<a rel="tooltip" title="View/ Edit Facility Email" class="btn btn-link btn-info table-action view" href="javascript:void(0)">',
                    '<i class="fa fa-envelope"></i>',
                    '</a>',
                    '<a rel="tooltip" title="Add to Batch" class="btn btn-link btn-warning table-action edit" href="javascript:void(0)">',
                    '<i class="fa fa-cube"></i>',
                    '</a>',
                    '<a rel="tooltip" title="Defer Sample" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
                    '<i class="fa fa-user-times"></i>',
                    '</a>'
                ].join('');
            }

            $().ready(function () {
                window.operateEvents = {
                    'click .view': function (e, value, row, index) {
                        info = JSON.stringify(row);

                        swal('Facility contact', info);
                        console.log(info);
                    },
                    'click .edit': function (e, value, row, index) {
                        info = JSON.stringify(row);

                        swal('Add sample to Batch', info);
                        console.log(info);
                    },
                    'click .remove': function (e, value, row, index) {
                        console.log(row);
                        $table.bootstrapTable('remove', {
                            field: 'id',
                            values: [row.id]
                        });
                    }
                };

                $table.bootstrapTable({
                    toolbar: ".toolbar",
                    clickToSelect: true,
                    showRefresh: true,
                    search: true,
                    showToggle: true,
                    showColumns: true,
                    pagination: true,
                    searchAlign: 'right',
                    pageSize: 12,
                    clickToSelect: false,
                    pageList: [12, 20, 25, 50, 100],

                    formatShowingRows: function (pageFrom, pageTo, totalRows) {
                        //do nothing here, we don't want to show the text "showing x of y from..."
                    },
                    formatRecordsPerPage: function (pageNumber) {
                        return pageNumber + " rows visible";
                    },
                    icons: {
                        refresh: 'fa fa-refresh',
                        toggle: 'fa fa-th-list',
                        columns: 'fa fa-columns',
                        detailOpen: 'fa fa-plus-circle',
                        detailClose: 'fa fa-minus-circle'
                    }
                });

                //activate the tooltips after the data table is initialized
                $('[rel="tooltip"]').tooltip();

                $(window).resize(function () {
                    $table.bootstrapTable('resetView');
                });


            });
    </script>
</html>
