<?php 

//Include Config File//
require_once('config.php');

// Decare & initialize variables with empty value//

$name = $father = $subject = $roll = $date = $gender = $language = $course = $comment = "";
$name_err = $father_err = $subject_err = $date_err = $gender_err = $language_err = $course_err = $comment = "";

//Check post-array//

if(isset($_POST['id']) && !empty($_POST['id'])){

        $id = $_POST['id'];
// echo "<pre>";
//     print_r($id);
// echo "<pre>";
// die();
//Validation All Post Value//
    // name Validation //
    $input_name = trim($_POST['name']);
    if(empty($input_name)){
           $name_err =  "Please enter a student name";
    }else {
        $name = $input_name;
    }


// Father Name Validation//
$input_father = trim($_POST['father']);
    if(empty($input_father)){
        $father_err = "Please enter a father name";
    }else {
        $father = $input_father;
    }


    // Subject Validation //
    $input_subject = trim($_POST['subject']);
    if(empty($input_subject)){
        $subject_err = "Please enter a any subject";
    }else {
        $subject = $input_subject;
    }


        // Roll Validation //
    $input_roll = trim($_POST['roll']);
    if(empty($input_roll)){
        $roll_err = "Please enter a number";
    }else {
        $roll = $input_roll;
    }


    // Date of Birth Validation // 
    $input_date  = trim($_POST['date']);
    if(empty($input_date)){
        $date_err = "Please enter a birth date";
    }else {
        $date = $input_date;
    }


    // Gender Validation //
    $input_gender = trim($_POST['gender']);
    if(empty($input_gender)){
            $gender_err = "Please enter a Gender crytaria";
    }else {
        $gender = $input_gender;
    }


//Langue Validation //

$input_language =  $_POST['languages'];
if(empty($input_language)){
    $language_err = "Please choose a language";
}else {
    $language = implode($input_language,', ');
   
}

$input_comment =  $_POST['comment'];
if(empty($input_comment)){
    $comment_err = "Please wirte some comment";
}else {
    $comment = $input_comment;
}


    // Course Validation //
    $input_course = trim($_POST['courses']);
    if(empty($input_course)){
            $course_err = "Please select a course name";
    }else {
         $course = $input_course;
    }


if(empty($name_err) && empty($father_err) && empty($subject_err) && empty($roll_err) && empty($date_err) && empty($gender_err) && empty($language_err) && empty($comment_err) && empty($course_err)){
// Update Statement//
  $sql = "UPDATE students SET Student_Name=?, Father=?, Subject=?, roll=?, Date_birth=?, Gender=?, Language=?, Course=?, Comment=? WHERE Id=?";

// Prepare statement //
if( $stmt = mysqli_prepare($connect, $sql)){
    //Variable binding to the parameters//
    mysqli_stmt_bind_param($stmt, 'sssisssssi', $param_name, $param_father, $param_subject, $param_roll, $param_date, $param_gender, $param_language, $param_course, $param_comment, $param_Id);

    // Set paramenters//

    $param_name = $name;
    $param_father = $father;
    $param_subject = $subject;
    $param_roll = $roll;
    $param_date = $date;
    $param_gender = $gender;
    $param_language = $language;
    $param_comment = $comment;
    $param_course = $course;
    $param_Id = $id;

    //Attempting Execute//

    if(mysqli_stmt_execute($stmt)){
        header('location: index.php');
        exit();
    }else {
        echo "Something went wrong please try again letter";
    }

}

// mysqli_stmt_close($stmt);

}
mysqli_close($connect);
}else {
    if(isset($_GET['Id']) && !empty(trim($_GET['Id']))){

           $id =  trim($_GET['Id']);
          $sql = 'SELECT * FROM students WHERE Id=?';
           if($stmt = mysqli_prepare($connect, $sql)){

            // Variables binding to parameters//
                mysqli_stmt_bind_param($stmt, 'i', $param_Id);
                // Parameter Set//

                $param_Id = $id;

                // attempt Execute//
                if(mysqli_stmt_execute($stmt)){
                       $result = mysqli_stmt_get_result($stmt);
                       
                       if(mysqli_num_rows($result) == 1){
                          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                          // Set Retrive Varialbes//
                         $name =  $row['Student_Name'];
                         $father =  $row['Father'];
                         $subject =  $row['Subject'];
                         $roll =  $row['roll'];
                         $Date_birth =  $row['Date_birth'];
                         $gender =  $row['Gender'];
                         $language_a = $row['Language'];
                         $language_b = explode(", ", $language_a);
                        //  echo "<pre>";
                        //     print_r($all_language);
                        //  echo "</pre>";
                         $comment =  $row['Comment'];
                         $course =  $row['Course'];
                       }else {
                           header('location:error.php');
                           exit();
                       }
                }else {
                    echo "Opps Something went wrong! Please try again latter";
                }
           }
           //Close Statement// 
           mysqli_stmt_close($stmt);
           //Close Connection // 
           mysqli_close($connect);
    }else {
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
    <title>Document</title>
    <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
    <style> 
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }

        .page-header{
        margin: 20px 0;
    }

    </style>
</head>
<body>
    

<div class="body_area"> 
    <div class="wrapper">

        <div class="page-header"> 
            <h2> Update Student Details</h2>
        </div>

    <div class="container-fluid"> 
        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST"> 
            <div class="student_name" class="form-group"> 
                <label for="user">Student Name </label>
                    <input type="text" name="name" id="user" class="form-control" value="<?= $name; ?>" >
            </div>

            <div class="father_name" class="form-group"> 
                <label for="father">Father Name </label>
                    <input type="text" name="father" id="father" class="form-control" value="<?= $father; ?>" >
            </div>

            <div class="subject" class="form-group"> 
                <label for="subject">Subject Name </label>
                    <input type="text" name="subject" id="subject" class="form-control" value="<?= $subject; ?>" >
            </div>

            <div class="Roll" class="form-group"> 
                <label for="roll">Roll </label>
                    <input type="text" name="roll" id="roll" class="form-control" value="<?= $roll; ?>" >
            </div>
        
            <div class="Date of Birth" class="form-group"> 
                <label for="date">Date of Birth </label>
                    <input type="date" name="date" id="date" class="form-control" value="<?= $Date_birth; ?>" >
            </div>
        
            <div class="gender"> 
                <h6> Gender</h6>
              <?php 
                  if($gender == 'female'){
                    echo "<input type='radio' name='gender' id='female' value='female' checked>";
                    echo "<label for='female'> Female </label>";
                }elseif($gender == 'male'){
                    echo "<input type='radio' name='gender' id='male' value='male'checked>";
                    echo "<label for='male'> Male </label>";
                }else {
                    echo "<input type='radio' name='gender' id='other' value='Other'checked>";
                    echo "<label for='other'> Other </label>" ;
                }
              ?>
                      
            </div>

            <div class="language"> 
                <h6> Choose your Teaching Language </h6>
            <div class="form_check"> 
                 <input type="checkbox" name="languages[]" id="ara" class="form_check_input" value="Arabic"
                    <?php 
                        if(in_array('Arabic', $language_b)){
                            echo "checked";
                        }
                    ?>
                >
                    <label for="ara">Arabic</label>
            
            </div>

            <div class="form_check"> 
                 <input type="checkbox" name="languages[]" id="Eng" class="form_check_input" value="English"
                    <?php 
                        if(in_array('English', $language_b)){
                            echo "checked";
                        }
                    ?>
                >
                    <label for="Eng">English</label>
            
            </div>

            <div class="form_check"> 
                 <input type="checkbox" name="languages[]" id="ben" class="form_check_input" value="Bengali"
                    <?php 
                        if(in_array('Bengali', $language_b)){
                            echo "checked";
                        }
                    ?>
                >
                    <label for="ben">Bengali</label>
            </div>

            <div class="form_check"> 
                 <input type="checkbox" name="languages[]" id="hin" class="form_check_input" value="Hindi"
                    <?php 
                        if(in_array('Hindi', $language_b)){
                            echo "checked";
                        }
                    ?>
                >
                    <label for="hin">Hindi</label>
            
            </div>
              
            </div>
        
        <div class="course"> 
            <h6> Select Your Course </h6>

            <select name="courses" id="">

                <?php if($course == 'Web Design'){ ?>
                    <option value="Web Design">Web Design</option>
                <?php }?>
                <?php if($course == "Php For Non Programmer"){ ?>
                    <option value="Php For Non Programmer">Php For non Programmer</option>
                <?php } ?>
                <?php if($course == 'JavaScript') { ?>
                    <option value="JavaScript"> JavaScript</option>
                <?php } ?>

            </select>

        </div>

        <div class="comment"> 
                <h6> Type your Comment </h6>
                    <textarea name="comment" id="" cols="30" rows="3" value="Hifsdl"> <?php echo $comment; ?></textarea>
            </div>

     <div class="btn"> 
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="submit" class="btn btn-primary" value="Submit">
         <a href="index.php" class="btn btn-default">Cancel</a>
     </div>

    </div>
</div>

    </form>

</div>

</div>



</body>
</html>