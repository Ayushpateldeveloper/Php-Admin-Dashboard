   <?php
   include('session.php');
   ?> <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../includes/style.css">
        <script src="../includes/jquery.js"></script>

    <!-- Include Bootstrap CSS once -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Include Bootstrap JS once -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Include DataTables Buttons CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

    <!-- Include PDFMake and JSZip -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- boxicons script -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Include jQuery and Bootstrap JS once
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- Your custom script -->
    <script src="../includes/jquery.js"></script>




    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">BBBootstrap</span> </a>
                    <div class="nav_list"> 
                        <a href="../pages/index.php" class="nav_link" id="dashboard"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span></a> 
                        <a href="../pages/user.php" class="nav_link" id="userPage"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
                        <a href="../pages/report.php" class="nav_link" id="report"> <i class='bx bxs-report'></i> <span class="nav_name">Bookmark</span> </a> 
                        <a href="../pages/graphdemo.php" class="nav_link" id="graph"> <i class='bx bx-bar-chart-square'></i> <span class="nav_name">Bookmark</span> </a> 
                        <a href="../pages/memo.php" class="nav_link" id="memo"> <i class='bx bxs-bookmark' ></i> <span class="nav_name">Bookmark</span> </a> 
                        <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> 
                        <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> 
                        <a href="../pages/product.php" class="nav_link" id="product"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Products</span> </a> 
                    </div>
                </div> 
                <a href="http://localhost/Php-Admin-Dashboard/includes/session.php?action=logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light pt-5 mt-4">