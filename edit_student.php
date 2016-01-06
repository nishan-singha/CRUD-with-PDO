#edit_student.php

<?php
require_once './includes/edit_student.php';
$student_id = $_GET['student_id'];

$obj = new Edit_student();
$result = $obj->view_by_id($student_id);
$student_info = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Student</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css" />
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/bootstrap.js"></script>
        
    </head>
    <body>
        
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
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
                            <li><a href="index.php">Add Student</a></li>
                            <li><a href="view_student.php">View Student</a></li>
                        </ul>
                    </div>
                </nav>
            </div> 
            <div class="col-md-9" style="background-color: #e9e9e9; height: 800px">
                <div class="row" style="margin-top: 25px">
                    
                    <div class="col-md-offset-2 col-md-7 col-md-offset-3" style="background-color: #99ffcc; border-radius: 10px; padding: 10px;" >
                        <h3>Add Student Data</h3><hr/>
                        <form class="form-horizontal" role="form" name="edit_student_form" action="update_student.php" method="post">
                            <div class="form-group">
                                <label class="control-label col-md-4" for="student_name">Name:</label>
                                <div class="col-md-8">
                                    <input type="text" name="student_name" value="<?php echo $student_info['student_name'];?>"class="form-control">
                                    <input type="hidden" name="student_id" value="<?php echo $student_info['student_id'];?>"class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="department">Department:</label>
                                <div class="col-md-8">
                                    <input type="text" name="department" value="<?php echo $student_info['department'];?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="email_address">Email:</label>
                                <div class="col-md-8">
                                    <input type="email" name="email_address" value="<?php echo $student_info['email_address'];?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="city">Division:</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="city" >
                                        <option>
                                            <?php
                                            $student_info['city'];
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
                                        </option>
                                        <option value="dhk">Dhaka</option>
                                        <option value="ctg">Chittagong</option>
                                        <option value="syl">Sylhet</option>
                                        <option value="raj">Rajshahi</option>
                                        <option value="khl">Khulna</option>
                                        <option value="rng">Rangpur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8">
                                <input class=" btn btn-primary btn-block " type="submit" name="btn"  value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <script>
            document.forms['edit_student_form'].elements['city'].value='<?php echo $student_info['city']; ?>';
        </script>
    </body>
</html>

