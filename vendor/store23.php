<?php 

require_once("config.php");


//The variables Declartion & inititalization with Empty Value//
$name = $father = $subject = $roll = $date = "";
$name_err = $father_err = $subject_err = $roll_err = $date_err = "";


// validation Check//

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Validation on name //
             $input_name = trim($_POST['name']);
            if(empty($input_name)){
               $name_err =  "Please Enter a name";
            }else {
                 $name = $input_name;
            }


        //Validation on Father//
        $input_father = trim($_POST['father']);
        if(empty($input_father)){
                $father_err = "Please enter a Father name";
        } else {
                $father  = $input_father;
        }
            // Validation on subject//

           $input_subject =  trim($_POST['subject']);
           if(empty($input_subject)){
               $subject_err = "Please enter a subject";
           }else {
                $subject = $input_subject;
           }

           //Validation on roll //

                $input_roll = trim($_POST['roll']);
                if(empty($input_roll)){
                        $roll_err = "Please enter a roll number";
                }else {
                    $roll = $input_roll;
                }
            //Validation on Date of birth //
           $input_date =  trim($_POST['date']);

                if(empty($input_date)){
                    $date_err = "Please enter a date";
                }else {
                    $date = $input_date;
                }

//Check emptry error before inserting data in Database //

if(empty($name_err) && empty($father_err) && empty($subject_err) && empty($roll_err) && empty($date_err)){
    //prepare insert statement //

   $sql =  'INSERT INTO students (Student_name, Father, Subject, roll, Date_birth) VALUES(?, ?, ?, ?, ?)';

    if($stmt = mysqli_prepare($connect, $sql)){

        //Bind the variables to the parament //

        mysqli_stmt_bind_param($stmt, 'sssss', $param_name, $param_father, $param_subject, $param_roll, $param_date);

        // set parameters//

        $param_name = $name;
        $param_father = $father;
        $param_subject = $subject;
        $param_roll = $roll;
        $param_date = $date;



        // Attempting Execute stmt//

        if(mysqli_stmt_execute($stmt)){
            echo "Your Data has been saved in database";
        }else {
            echo " Your data has not been saved in database";
        }

    }

// Close Statement //
    mysqli_stmt_close($stmt);

}

// Close Connection //
mysqli_close($connect);
                
}

?>