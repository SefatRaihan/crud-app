<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="views/bootstrap/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/style.css">
    <style> 
        .course{
            margin: 15px 0;
        }
        .comment{
            margin: 15px 0;
        }

        .btn input{
            padding: 5px 30px;
        }
    </style>
</head>
<body>
<header class="header-area"> 
<div class="wrapper"> 
       <div class="container-fluid"> 
                 <div class="logo-area">
                    <H2> Pondit.com</H2>
                    <p> A qualityfyll & Responsible Training Center.</p>
                  </div>
                    <div class="add-area"> 
                    <a href="#" class="btn btn-warning">Add New Student</a>
                </div>
       </div>
</div>
</header>

<div class="body_area"> 
    <div class="wrapper"> 
    <div class="container-fluid"> 
        <form action="store.php" method="POST"> 
            <div class="student_name" class="form-group"> 
                <label for="user">Student Name </label>
                    <input type="text" name="name" id="user" class="form-control">
            </div>
        
            <div class="father_name" class="form-group"> 
                <label for="father">Father Name </label>
                    <input type="text" name="father" id="father" class="form-control">
            </div>

            <div class="subject" class="form-group"> 
                <label for="subject">Subject Name </label>
                    <input type="text" name="subject" id="subject" class="form-control">
            </div>


            <div class="Roll" class="form-group"> 
                <label for="roll">Roll </label>
                    <input type="text" name="roll" id="roll" class="form-control">
            </div>
        
            <div class="Date of Birth" class="form-group"> 
                <label for="date">Date of Birth </label>
                    <input type="date" name="date" id="date" class="form-control">
            </div>
        
        
            <div class="gender"> 
                <h6> Gender</h6>
                <input type="radio" name="gender" id="female" value="female">
                        <label for="female"> Female </label>

                 <input type="radio" name="gender" id="male" value="male">
                    <label for="male"> Male </label>

                    <input type="radio" name="gender" id="other" value="Other">
                    <label for="other"> Other </label>    
            </div>

            <div class="language"> 
                <h6> Choose your Teaching Language </h6>
                <input type="checkbox" name="languages[]" id="ara" value="Arabic">
                    <label for="ara">Arabic</label>
             
                <input type="checkbox" name="languages[]" id="Eng" value="English">
                    <label for="Eng">English</label>
               
                <input type="checkbox" name="languages[]" id="ben" value="Bengali">
                <label for="ben">Bengaly</label>
               
                <input type="checkbox" name="languages[]" id="hin" value="Hindi">
                <label for="hin">Hindi</label>
              
            </div>
        
        <div class="course"> 
            <h6> Select Your Course </h6>
            <select name="courses" id="">
                <option> Select </option>
                <option value="Web Design">Web Design</option>
                <option value="Php For Non Programmer">Php For non Programmer</option>
                <option value="JavaScript"> JavaScript</option>
            </select>
        </div>

        <div class="comment"> 
                <h6> Type your Comment </h6>
                <textarea name="comment" id="" cols="30" rows="3"></textarea>
            </div>

        <div class="btn"> 
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </div>
</div>

    </form>






</div>




</div>


<footer class="footer-area"> 

</footer>



</body>
</html>