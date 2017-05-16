<?php 
require_once("IATname.inc"); 
require_once('locations.php');
?>
<html>

<head>
<title><?php echo $IATname; ?> IAT Survey</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css"> @import "core/css/iat.css";

.labelClass {
    border: 1px rgb(128,227,132);
    min-width: 100%;
}


</style>	
<script type="text/javascript" src="core/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="core/js/IAT.js"></script>
</head>

<body>
   
<div id="surveylist">
	<form id="demographics">
    <ol>
    <label>
		"Please rate much you agree or disagree with the following statements:<br>
        (1: Strongly Disagree, 2: Disagree, 3: Undecided, 4: Agree, 5:Strongly agree) <br>
</label>
        <br>
        <p>
        <form>
       <label class="labelClass">
        I would feel uneasy if robots really had emotions.
        <br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
      </label>
        <p>Something bad might happen if robots developed into living beings.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>I would feel relaxed talking with robots.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>I would feel uneasy if I was given a job where I had to use robots.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>If robots had emotions, I would be able to make friends with them.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>I feel comforted being with robots that have emotions.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>The word "robot" means nothing to me.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>I would feel nervous operating a robot in front of other people.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>I would hate the idea that robots or artificial intelligences were making judgements about things.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>I would feel very nervous just standing in front of a robot.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>I feel that if I depend on robots too much, something bad might happen.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
         <p>I would feel paranoid talking with a robot.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
        <p>I am concerned that robots would be a bad influence on children.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
        <p>I feel that in a future society will be dominated by robots.<br>
        <label>
        <input type="radio" name="editList" value="1"/>Strongly Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="2"/>Disagree
        </label>
        <label>
        <input type="radio" name="editList" value="3"/>Undecided
        </label>
        <label>
        <input type="radio" name="editList" value="4"/>Agree
        </label>
        <label>
        <input type="radio" name="editList" value="5"/>Strongly Agree
        </label>
        </p> 
        </form>
       
        
        <input type="button" value="Submit Questionairre" onclick='checkQuestionairre()'/>
    </form>
    
       
</div>
</body>