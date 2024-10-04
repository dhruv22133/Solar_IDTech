<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Dashboard </title>

    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/').'images/logo/cropped-id-tech-fvicon-1-32x32.jpg';?>">

    <!-- Custom Stylesheet -->

    <link href="<?php echo base_url('assets/');?>css/style.css" rel="stylesheet">



    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/buttons.dataTables.min.css" />

    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery-1.12.3.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/dataTables.buttons.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/jszip.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/pdfmake.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/vfs_fonts.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/');?>js/buttons.html5.min.js"></script>

     <style>

        table {

          border-collapse: collapse;

          border-spacing: 0;

          width: 100%;

          border: 1px solid #ddd;

        }

        

        th, td {

          text-align: left;

          padding: 8px;

        }

        

        tr:nth-child(even){background-color: #f2f2f2}

        </style>

    <script type="text/javascript" language="javascript" class="init">



        $(document).ready(function() {

            $('#example').DataTable( {

                dom: 'Bfrtip',

                buttons: [

                    {

                        extend: 'print',

                        exportOptions: {

                            columns: ':visible'

                        }

                    },

                    {

                            extend: 'excel',

                            text: 'Excel',

                            className: 'exportExcel',

                            filename: 'Test_Excel',

                            exportOptions: { modifier: { page: 'all'} }

                        },

                        {

                            extend: 'csv',

                            text: 'CSV',

                            className: 'exportExcel',

                            filename: 'Test_Csv',

                            exportOptions: { modifier: { page: 'all'} }

                        },

                       

                    'colvis'

                ],

                columnDefs: [ {

                    targets: 0,

                    visible: true

                } ]

            } );

        } );

        

            </script>

</head>