<!doctype html>
<html lang="en" >
<head>
    
    <meta charset="utf-8" />
    <title>Violet Medical</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('')}}assets/img/favicon.ico" type="image/x-icon" >
    <!-- Bootstrap Css -->
    <link href="{{ asset('')}}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('')}}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" type="text/css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" type="text/css"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">
    
    <style>
        .font-ar{font-family: 'El Messiri', sans-serif;}
        .vs__search{opacity: 0.6!important;}
        .sp-colorize-container{
            width:10%!important;
        }
        .modal-backdrop{
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body class="font-ar" >

        <div id="app">
            <router-view></router-view>
        </div>
        
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        
        <!-- JAVASCRIPT -->
        <script src="{{ asset('')}}assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('')}}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('')}}assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ asset('')}}assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('')}}assets/libs/node-waves/waves.min.js"></script>
        <script src="{{ asset('')}}assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="{{ asset('')}}assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        
       
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.5/bluebird.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
        <!-- App js -->
        <script src="https://pagination.js.org/dist/2.1.5/pagination.js"></script>
        <script src="{{ asset('js/app.js?v0.1')}}"></script>                
        
        <script src="{{ asset('')}}assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
        
        <script src="{{ asset('')}}assets/js/pages/form-wizard.init.js"></script>
        
        <script>
            $(document).on('click','.link-page', function () {
                $("body").removeClass("sidebar-enable")
            });
            // document.body.style.zoom="80%";
        </script>
        
    </body>
    
    </html>
    