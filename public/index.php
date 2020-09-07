
<?php require_once("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 950px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
   
    </style>
</head>

<body> 


<div class="wrapper"> 
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-header"> 
                        <h2 class="pull-left"> Students Details </h2>
                        <a href="create.php" class="btn btn-primary pull-right"> Add New Student </a>
                    </div>
<?php 
    $sql = "SELECT * FROM students" ; 
    if($result = mysqli_query($connect, $sql)){
        if(mysqli_num_rows($result) > 0 ){
           echo '<table class="table table-bordered table-striped">'; 
            echo  '<thead>';
                   echo  '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Student</th>';
                        echo '<th>Father</th>';
                        echo '<th>Subject</th>';
                        echo '<th>Roll</th>';
                        echo '<th>Date_Birth</th>';
                        echo '<th>Gender</th>';
                        echo '<th>Language</th>';
                        echo '<th>Course</th>';
                        echo '<th>Comment</th>';
                        echo '<th>Action</th>';
                   echo  '</tr>';
            echo '</thead>';
           echo  '<tbody>';
           while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                        echo "<td>" .$row['Id']. "</td>";
                        echo "<td>" .$row['Student_Name']. "</td>";
                        echo "<td>" .$row['Father']. "</td>";
                        echo "<td>" .$row['Subject']. "</td>";
                        echo "<td>" .$row['roll']. "</td>";
                        echo "<td>" .$row['Date_birth']. "</td>";
                        echo "<td>" .$row['Gender'].  "</td>";
                        echo "<td>" .$row['Language']. "</td>";
                        echo "<td>" .$row['Course']. "</td>";
                        echo "<td>" .$row['Comment']. "</td>";
                        echo "<td>";
                        echo "<a href='read.php?Id=".$row['Id']."' title='View Record'><span class='glyphicon glyphicon-eye-open'></span></a>";
                        echo "<a href='update.php?Id=".$row['Id']."' title='Update Record'<span class='glyphicon glyphicon-pencil'></span></a>";
                        echo "<a href='delete.php?Id=".$row['Id']."' title='Delete Record'<span class='glyphicon glyphicon-trash'></span></a>";
                        echo "</td>";
                    echo "</tr>";
           }

        echo "</tbody>";
        echo "</table>";
            //free Result //
            mysqli_free_result($result);
        }else {
            echo "<p class='lead'> <em> Result were not fuound <em> </p>";
        }
    }else {
        echo "error: couldn't execute. $sql ".mysqli_error($connect);
    }
// Close Connection //
    mysqli_close($connect);
 
?>
        </div>
            
        </div>
        </div>
</div>


</body>

</html>
