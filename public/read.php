<?php 

require_once("config.php");
// Check Exixtence ID parameter before processing further//
if(isset($_GET['Id']) && !empty(trim($_GET['Id']))){
// prepare sql command//
   $sql = "SELECT * FROM students WHERE Id = ?";

    if($stmt = mysqli_prepare($connect, $sql)){
        // Varriable binding as parameter//
            mysqli_stmt_bind_param($stmt, 'i', $param_id);

        // Set paramenter//
        $param_id = trim($_GET['Id']);
        // Attempt to Execute the prepared statement//
        if(mysqli_stmt_execute($stmt)){
           $result =  mysqli_stmt_get_result($stmt);

           if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Set retrive parameter //
                $name = $row['Student_Name'];
                $father = $row['Father'];
                $subject = $row['Subject'];
                $roll = $row['roll'];
                $date_birth = $row['Date_birth'];
                $gender = $row['Gender'];
                $language = $row['Language'];
                $comment = $row['Comment'];
                $course = $row['Course'];
           }else{
               header('location: error.php');
               exit();
           }
        }else {
            echo "Opps Something went wrong! Please try again letter";
        }
        
    }
    // Close Statement //
    mysqli_stmt_close($stmt);

    //Close Connection // 
    mysqli_close($connect);

}else {
    header('location:error.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View the Each Record</title>
    <style> 
    
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }

        label{
            font-size: 16px;
            font-weight: bold;
        }
    
    </style>
    <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
</head>
<body>
    
<div class="wrapper"> 
    <div class="cotanier-fluid"> 
        <div class="row"> 
            <div class="col-md-12"> 
                <div class="page-header"> 
                    <h2> View Record </h2>
                </div>
            
           <div class="form-group"> 
                <label> Name </label>
                    <p class="form-control-static"> <?= $row['Student_Name'] ?>  </p>
           </div>
            
           <div class="form-group"> 
                <label> Father's Name </label>
                    <p class="form-control-static"> <?= $row['Father'] ?>  </p>
           </div>
            
           <div class="form-group"> 
                <label> Subject</label>
                    <p class="form-control-static"> <?= $row['Subject'] ?>  </p>
           </div>

           <div class="form-group"> 
                <label> Roll NO </label>
                    <p class="form-control-static"> <?= $row['roll'] ?>  </p>
           </div>

           <div class="form-group"> 
                <label> Date of Birth </label>
                    <p class="form-control-static"> <?= $row['Date_birth'] ?>  </p>
           </div>

           <div class="form-group"> 
                <label> Gender </label>
                    <p class="form-control-static"> <?= $row['Gender'] ?>  </p>
           </div>

           <div class="form-group"> 
                <label>Teaching Language </label>
                    <p class="form-control-static"> <?= $row['Language'] ?>  </p>
           </div>

           <div class="form-group"> 
                <label> Course Name </label>
                    <p class="form-control-static"> <?= $row['Course'] ?>  </p>
           </div>

           <div class="form-group"> 
                <label> Comment </label>
                    <p class="form-control-static"> <?= $row['Comment'] ?>  </p>
           </div>
            
        
        <div class="btn"> 
            <a href="index.php" class="btn btn-primary"> Back To HomePage</a>
        
        </div>
        
        
        </div>
    
    
    
    </div>


</div>



</body>
</html>