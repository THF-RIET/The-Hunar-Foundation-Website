<?php
include "../database/db.php";
global $conn;
$user_email = $userName = $stdStatus = $studentProfileStatus = "";
$getCNIC = isset($_GET['cnic']) ? intval($_GET['cnic']) : null;
$enableOption = false;

$selectStmt = "SELECT * FROM student WHERE stdCNIC = '" . $getCNIC . "'";
if ($result2 = $conn->query($selectStmt)) {
    while ($row = $result2->fetch_assoc()) {
        $user_email = $row["stdEmail"];
        $userName = $row["stdFullName"];
        $stdStatus = $row["stdStatus"];
        $studentProfileStatus = $row["isProfileComplete"];
    }
}
$query = "SELECT instituteName FROM institutes";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Enroll Course</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <link rel="stylesheet" href="./css/style.css">

    <style>
        nav {
            position: relative;
        }

        .logodesigness {
            position: absolute;
            background-color: green;
            width: 100%;
            height: auto;
            padding: 5px;
        }

        @media screen and (max-width:425px) {
            .logodesign img {
                width: 90px;
                height: 60.5px;
            }
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-white sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="index.php?cnic=<?php echo $getCNIC ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>

            </a>
            <div class="logodesigness"><img src="./images/3.png" alt=""></div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-dark" href="index.php?cnic=<?php echo $getCNIC ?>">
                    <i class="fas fa-fw fa-tachometer-alt text-dark"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark"
                    href="user_profile.php?cnic=<?php echo $getCNIC ?>&userName=<?php echo $userName ?>">
                    <i class="fas fa-fw fa-cog text-dark"></i>
                    <span>Profile</span></a>
            </li>

            <li style="background-color:#043C8B" class="nav-item active">
                <a class="nav-link text-dark"
                    href="course.php?cnic=<?php echo $getCNIC ?>&userName=<?php echo $userName ?>">
                    <i class="fas fa-fw fa-wrench text-light"></i>
                    <span style="color: antiquewhite;">Courses</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark"
                    href="payment.php?cnic=<?php echo $getCNIC ?>&userName=<?php echo $userName ?>">
                    <i class="fas fa-fw fa-folder text-dark"></i>
                    <span>Payment</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-dark"
                    href="admission.php?cnic=<?php echo $getCNIC ?>&userName=<?php echo $userName ?>">
                    <i class="fas fa-fw fa-folder text-dark"></i>
                    <span>Admission Test</span></a>
            </li>


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link text-dark"
                    href="interview.php?cnic=<?php echo $getCNIC ?>&userName=<?php echo $userName ?>">
                    <i class="fas fa-fw fa-chart-area text-dark"></i>
                    <span>Interview</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link text-dark"
                    href="status.php?cnic=<?php echo $getCNIC ?>&userName=<?php echo $userName ?>">
                    <i class="fas fa-fw fa-table text-dark"></i>
                    <span>Status</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0 bg-success" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <h1>Dashboard</h1>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $userName ?>
                                </span>
                                <img class="img-profile rounded-circle" src="./assets/images/icons/profile-icon.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <section class="linear">
                    <div>
                        <h1 class="Welcome">Welcome Back</h1>

                        <p class="color">"Congratulations! Your account registration on our portal has been successful.
                            To proceed
                            further, we kindly request you to complete your profile, pay the admission fee and attempt
                            the test. We wish you the best of luck!"</p>
                    </div>
                </section>


                <div class="container-fluid">
                    <section class="course-section course-information">
                        <h2> Course Information</h2>

                        <form action="add_course.php?cnic=<?php echo $getCNIC ?>" method="POST" id="container">

                            <select id="campus" name="campus" onchange="onSelect()">
                                <option>Select Institute</option>
                                <?php
                                foreach ($options as $option) {
                                    ?>
                                    <option value="<?php echo $option['instituteName']; ?>">
                                        <?php echo $option['instituteName']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>

                            <select id="program" name="program" onchange="show()">
                                <option>Select Institute First</option>
                            </select>
                            <input class="enroll btn btn-primary" type="submit" name="save_select" value="Enroll">

                        </form>
                    </section>
                </div>
                <br><br><br>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>

                <script>
                    function onSelect() {
                        // Get the selected value from dropdown1
                        var dropdown1 = document.getElementById("campus");
                        var selectedValue = dropdown1.value;
                        // Make an AJAX request to the server
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "fetch_courses.php?selectedValue=" + selectedValue, true);
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                var responseData = JSON.parse(xhr.responseText);
                                populateDropdown2(responseData);
                            }
                        };
                        xhr.send();
                    }

                    function populateDropdown2(data) {
                        var dropdown2 = document.getElementById("program");
                        dropdown2.innerHTML = ""; // Clear previous options

                        for (var i = 0; i < data.length; i++) {
                            var option = document.createElement("option");
                            option.text = data[i].courseName;
                            option.value = data[i].courseName;
                            dropdown2.add(option);
                        }

                    }
                    function show() {
                        // Get the selected value from dropdown1
                        var dropdown1 = document.getElementById("program");
                        var selectedValue = dropdown1.value;
                        // Make an AJAX request to the server
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "fetch_info.php?selectedValue=" + selectedValue, true);
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                var responseData = JSON.parse(xhr.responseText);
                                showData(responseData);
                            }
                        };
                        xhr.send();
                    }

                    function showData(data) {

                        var option = document.createElement("input");
                        option.value = "data.courseDuration";
                        option.disabled = true;

                        var option2 = document.createElement("input");
                        option2.value = data.courseFeePerMonth;
                        option2.disabled = true;

                        var container = document.getElementById("container");

                        container.appendChild(option);
                        container.appendChild(option2);


                    }

                </script>

</body>

</html>