<?php
class Analysis_view
{
  public function Html_view()
  {
    $html='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add New Analysis</title>
        <link rel="stylesheet" href="add_new _analysis_css.css">

         <style>
         @import url(\'https://fonts.googleapis.com/css?family=Roboto\');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  font-family: \'Roboto\', sans-serif;
}

body{
  background: url(\'bg.jpg\') no-repeat top center;
  background-size: cover;
  height: 100vh;
}

.wrapper{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  max-width: 550px;
  background: rgba(0,0,0,0.8);
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
}

.wrapper .title h1{
  color: #c5ecfd;
  text-align: center;
  margin-bottom: 25px;
}

.contact-form{
  display: flex;
}

.input-fields{
  display: flex;
  flex-direction: column;
  margin-right: 4%;
}

.input-fields,
.msg{
  width: 48%;
}

.input-fields .input,
.msg textarea{
  margin: 10px 0;
  background: transparent;
  border: 0px;
  border-bottom: 2px solid #c5ecfd;
  padding: 10px;
  color: #c5ecfd;
  width: 100%;
}

.msg textarea{
  height: 212px;
}

::-webkit-input-placeholder {
  /* Chrome/Opera/Safari */
  color: #c5ecfd;
}
::-moz-placeholder {
  /* Firefox 19+ */
  color: #c5ecfd;
}
:-ms-input-placeholder {
  /* IE 10+ */
  color: #c5ecfd;
}

.btn {
    background: #39b7dd;
    text-align: center;
    padding: 15px;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    text-transform: uppercase;
}
      
@media screen and (max-width: 600px){
  .contact-form{
    flex-direction: column;
  }
  .msg textarea{
    height: 80px;
  }
  .input-fields,
  .msg{
    width: 100%;
  }
}


 .multipleSelection { 
            width: 200px; 
            background-color: #BCC2C1; 
        } 
  
        .selectBox { 
            position: relative; 
        } 
  
        .selectBox select { 
            width: 100%; 
            font-weight: bold; 
        } 
  
        .overSelect { 
            position: absolute; 
            left: 0; 
            right: 0; 
            top: 0; 
            bottom: 0; 
        } 
  
        #checkBoxes { 
            display: none; 
            border: 1px #8DF5E4 solid; 
        } 
  
        #checkBoxes label { 
            display: block; 
        } 
  
        #checkBoxes label:hover { 
            background-color: #4F615E; 
        } 

        
    /* The container */
    .container {
      display: block;
      position: relative;
      padding-left: 35px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 22px;
      color:white;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser\'s default checkbox */
    .container input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
      background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
    </style>

    </head>
    <body>
    <form  method="post">
        <div class="wrapper">
            <div class="title">
                <h1>Add New Analysis</h1>
            </div>
            <div class="contact-form">
                <div class="input-fields">
                    <input type="text" class="input" placeholder=" patient Name" name="name" required>
                    <input type="text" class="input" placeholder="patient ID" name="idd"required>

                    <label class="container" required>Blood package
                      <input type="radio" name="package[]" value="1" >
                      <span class="checkmark"></span>
                    </label>
                    <label class="container">Diapitic package
                      <input type="radio" name="package[]" value="2" required>
                      <span class="checkmark"></span>
                    </label> 
                    <br>
                    <br>
                    <br>
                      
                     <div class="multipleSelection"> 
                <div class="selectBox" 
                    onclick="showCheckboxes()"> 
                    <select> 
                        <option>Select Additional Tests</option> 
                    </select> 
                    <div class="overSelect"></div> 
                </div> 
      
                <div id="checkBoxes"> 
                    <label for="first"> 
                        <input type="checkbox" id="first" name="package[]" value="3"/> 
                        kidney function test
                    </label> 
                      
                    <label for="second"> 
                        <input type="checkbox" id="second" name="package[]" value="4"/> 
                        liver function test
                    </label> 

                   
                </div> 
            </div> 
                      
                  
                </div>
                <div class="msg">
                    <textarea placeholder="more information"></textarea>
                    <input id="btn"class="btn" type="submit" name="submit" value="submit"  onclick="location.href=\'invoice.php\';"> 
                    <br>
                    <div class="btn">Clear</div>
                </div>
            </div>

        </div>
        </form>

        <script> 
            var show = true; 
      
            function showCheckboxes() { 
                var checkboxes =  
                    document.getElementById("checkBoxes"); 
      
                if (show) { 
                    checkboxes.style.display = "block"; 
                    show = false; 
                } else { 
                    checkboxes.style.display = "none"; 
                    show = true; 
                } 
            } 
        </script> 

    </body>
    </html>';
    return $html;
}



public function resiving()
{


  if (isset ($_POST["submit"]))
  {
    if(!empty($_POST["package"]))
    {
      foreach ($_POST["package"] as $package) {
        //echo '<p>'.$package.'</p>';
      }
    }
    
    return $_POST["package"];
    
    //return [$_POST["package"],$_POST["additive"]];
  }

 } 
 
 public function recieve_price($x,$yy,$t,$t2)
{
 $html="<html>
<head>
  <h1>INVOICE<h1>
</head>
<body>
<br>
Main packages : $yy 
<br>
Addiative tests: $t $t2 
<br>
<br>
Total price : $x  
</body>
</html>";
echo  $html;
}
}

// $obj=new Analysis_view();
// $x=$obj->Html_view();
// echo $x;
// $z=$obj->resiving();
// print_r ($z);
//echo $y;

