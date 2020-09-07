<?php 

require_once("config.php");

// The variable is Declaring & initializing with empty values//

$name = $father = $subject = $roll = $date = $gender = $language = $course = $comment = "";
$name_err = $father_err = $subject_err = $date_err = $gender_err = $language_err = $course_err = $comment = "";


// Check Post method in server//
if($_SERVER['REQUEST_METHOD'] == 'POST'){

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

    // //Language Validation //
    // $language = [];
    // $languages = [];
    // if(array_key_exists('languages', $_POST)){
    //     $language = $_POST['languages'];
    // }
    //  $languages = count($language);
    
    //  if($languages == 1){
    //      $display_language =  "$language[0]";
    //  }

    //  if($languages > 1){
    //     $display_language = implode($language);
    //     if(empty($display_language)){
    //         $language_err = "Please select a language";
    //     }else {
    //         $language = $display_language;
    //     }
    //  }

// echo "<pre>";
//      print_r($display_language);
// echo "<pre>";
// die();
//Comment Validation //
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

    //Check empty error before inserting data in database//
if(empty($name_err) && empty($father_err) && empty($subject_err) && empty($roll_err) && empty($date_err) && empty($gender_err) && empty($language_err) && empty($comment_err) && empty($course_err)){
    // prepear insert statment//
   $sql = 'INSERT INTO students (Student_Name, Father, Subject, roll, Date_birth, Gender, Language, Comment, Course) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
    if($stmt = mysqli_prepare($connect, $sql)){

        //  Bind paremeter // 
        mysqli_stmt_bind_param($stmt, 'sssisssss', $param_name, $param_father, $param_subject, $param_roll, $param_date, $param_gender, $param_language, $param_comment, $param_course);

        // Set Parameters with variables // 
        $param_name = $name;
        $param_father = $father;
        $param_subject = $subject;
        $param_roll = $roll;
        $param_date = $date;
        $param_gender = $gender;
        $param_language = $language;
        $param_comment = $comment;
        $param_course = $course;

          // Attempting Execute statment//

    if(mysqli_stmt_execute($stmt)){
       header('location: index.php');
       exit();
//    echo  "your Data has been saved in Database";
    }else {
        echo "Something went wrong! Please try again leter.";
    }

    }

   // mysqli_close_stmt($stmt);
}

mysqli_close($connect);


}


?>