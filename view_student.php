#view_student.php

<?php
require_once './includes/view_student.php';

$obj = new View_student();
$result = $obj->view();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Student</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        
    </head>
    <body>
        
        <nav class="navbar navbar-inverse navbar-fixed-top" >
            <div class="container">
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my_menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a href="#" class="navbar-brand">My Site</a>
                        
                </div>
                
                <div class="navbar-collapse collapse" id="my_menu">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="index.php">Add Student</a></li>
                        <li><a href="view_student.php">View Student</a></li>
                    </ul>
                </div>
            </div>
        </nav>
           
        <div class="container" style="margin-top: 60px">
            <div class="row">
            <div class="col-md-3" style="background-color: #e2e2e2 ; height: 800px">
                <nav class="" style="padding: 10px">
                    <div class="container-fluid">
                        <ul class="nav sidebar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="add_student.php">Add Student</a></li>
                            <li><a href="view_student.php">View Student</a></li>
                        </ul>
                    </div>
                </nav>
            </div> 
            <div class="col-md-9" style="background-color: #e9e9e9; height: 800px">
                <div class="row" style="margin-top: 25px">
                    <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                    <table class="table table-bordered table-responsive table-hover">
                        <caption><h3>Student Data</h3></caption>
                        <tr class="info">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        while ($student_info=$result->fetch(PDO::FETCH_ASSOC)) {?>
                        <tr align="center">
                            <td><?php echo $student_info['student_id']; ?></td>
                            <td><?php echo $student_info['student_name']; ?></td>
                            <td><?php echo $student_info['department']; ?></td>
                            <td><?php echo $student_info['email_address']; ?></td>
                            <td><?php
                                    switch ($student_info['city']) {
                                        case 'dhk':
                                            echo 'Dhaka';
                                            break;
                                        case 'ctg':
                                            echo 'Chittagong';
                                            break;
                                        case 'raj':
                                            echo 'Rajshahi';
                                            break;
                                        case 'khl':
                                            echo 'Khulna';
                                            break;
                                        case 'syl':
                                            echo 'Sylhet';
                                            break;
                                        case 'rng':
                                            echo 'Rangpur';
                                            break;
                                    }
                                    ?>
                            </td>
                            <td>
                                <a href="edit_student.php?student_id=<?php echo $student_info['student_id']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                                <a href="delete_student.php?student_id=<?php echo $student_info['student_id']; ?>" class="btn btn-danger" onclick="return confirm_delete()"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
            </div>
        </div>
            <footer style="text-align: center; height: 40px; padding-top: 10px"><b>&copy; Nishan</b></footer> 
        <script>
        function confirm_delete() {
            var chk=confirm('Are you want ot delete this !');
            if(chk) {
                return true;
            }
            else {
                return false;
            }
        }
        </script>    
    </body>
</html>

