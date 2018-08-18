<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("oc-config.php"); ?>
    <link rel="icon" href="<?php echo BASE_URL; ?>/images/favicon.ico" />
    <link href="<?php echo BASE_URL; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">
    <link href="<?php echo BASE_URL; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/css/custom.css" rel="stylesheet">
    <style>
        table,
        th,
        td {
            border: 1px solid gray;
            border-collapse: collapse;
        }

        #searchBar {
            padding: 10px 16px;
            background: lightgray;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        table {
            margin-top: 30px;
            margin-bottom: 60px;
        }

        #searchTxt {
            width: 50%;
        }
    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <span>Status Codes</span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Call History</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" id="codeList">
                                <div class="x_title">
                                    <h2>Call History</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p>Search:
                                        <input class="form-control" type="text" value="" name="search" id="searchTxt"
                                            onchange="onChange();">
                                    </p>
                                    <?php include_once("plugins/codes/codes.html"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function onChange() {
            var input = document.getElementById("searchTxt").value;
            if (!input)
                return;
            var codes = document.getElementsByTagName("td");

            for (let i = 0; i < codes.length; i++) {
                const element = codes[i];
                console.log(element);
                if (element.innerText.toLowerCase().includes(input.toLowerCase())) {
                    element.style.color = "red";
                    if (i > 10)
                        codes[i - 10].scrollIntoView()
                    else if (i <= 10)
                        document.getElementById("top").scrollIntoView();
                    else
                        element.scrollIntoView();
                } else
                    element.style.color = "gray";
            }

            document.getElementById("last").innerText = input;
        }
    </script>
</body>

</html>