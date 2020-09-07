<?php 

require_once('config.php');

if(isset($_POST['Id']) && !empty($_POST['Id'])){
// SQL command for delete selected record//
  $sql = 'DELETE FROM students WHERE Id=?';
// prepare statement//
  if($stmt = mysqli_prepare($connect, $sql)){
      // bind the variable to parameter/
            mysqli_stmt_bind_param($stmt, 'i', $param_id);
            // set parameter//

            $param_id = trim($_POST['Id']);

            if(mysqli_stmt_execute($stmt)){
                header('location:index.php');
                exit();
            }else {
                echo "Opps! Something went wrong. Please try again latter";
            }
  }
  //Close statment//
  mysqli_stmt_close($stmt);
  //close connection//
  mysqli_close($connect);


}else {
    if(empty(trim($_GET['Id']))){
        header('location:error.php');
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <link rel="stylesheet" href="views/bootstrap/css/bootstrap.css">
    <style> 
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    
<div class="wrapper"> 
    <div class="container-fluid"> 

       <div class="row"> 
       <div class="col-md-12"> 
            <div class="page-header"> 
                <h2> Delete Selected Record</h2>
            </div>
        
        <section class="body-area"> 
            <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
                <P> Are you sure you want to delete?</P>
            <div> 
                 <input type="hidden" name="Id" value="<?= trim($_GET['Id'])?>">
                    <p> 
                        <input type="submit" value="Yes" class="btn btn-danger"> 
                        <a href="index.php" class="btn btn-primary">No</a>
                    </p>
            </div>
            
            
            
            </form>
        
        
        </section>
        
        
        
        
        
        </div>

       </div>
    
    
    
    
    </div>



</div>





</body>
</html>


