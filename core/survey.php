<?php 
require_once("IATname.inc"); 
require_once('locations.php');
?>
<html>
<head>
<title><?php echo $IATname; ?> IAT Survey</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css"> @import "core/css/iat.css";</style>	
<script type="text/javascript" src="core/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="core/js/IAT.js"></script>
<script type="text/javascript" src="core/js/IAT.js"></script>
</head>

<body>
   
<div id="surveylist" style="padding-right: 10px; padding-left: 20px; min-height: 80%; padding-bottom: 20px; border: double;border-width: 2px;background-color:#BABABA;">
	<form id="demographics">
		<div style="text-align: center;"> Before completing the survey please answer the following questions about yourself. </div>
        <ul id="demoglist" style="list-style: none">
            <li><p> <strong>How do you describe your gender identity?(Mark all that apply)</strong></p>
                <p> 
                    <input id="gender_male" name="gender" type="checkbox" value="Male"/>
                    <label for="gender_male">Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
                    <input id="gender_female" name="gender" type="checkbox" value="Female"/>
                    <label for="gender_female">Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                 <input id="gender_Nonbinary" name="gender" type="checkbox"" value="NonBinary"/>
                    <label for="gender_female">Genderqueer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <input id="gender_transgender" name="gender" type="checkbox" value="Transgender"/>
                    <label for="gender_transgendere">Transgender&nbsp;</label>
                    <br>
                <input id="gender_agender" name="gender" type="checkbox" value="Transgender"/>
                    <label for="gender_agendee">Agender&nbsp;&nbsp;</label> 
                  <input id="gender_cisgender" name="gender" type="checkbox" value="Transgender"/>
                    <label for="gender_cisgende">Cisgender&nbsp;&nbsp;</label>
                    <input id="gender_none" name="gender" type="checkbox" value="none"/>
                    <label for="gender_none">I prefer not to answer&nbsp;&nbsp;&nbsp;</label>
                    <input id="race_other" name="race" type="checkbox" value="Other"/> 
                    <label for="race_other">Other</label>   
                    
                </p>
            </li>            
            <li><label for="age"><strong>In what year were you born?</strong></label>
                <span> 
                    <select id="age" name="age">
                        <option value="unselected" selected="selected"></option>
						<?php for ($i=110;$i>0;$i--) echo "<option value=".(117-$i).">" . (1900 + $i) . "</option>"; ?>
	 				</select>
                </span> 
            </li>        
            <li>
                <p><strong>How do you describe your race and ethnicity? (Mark all that apply)</strong></p>
                <p>      
                     <input id="race_white" name="race" type="checkbox" value="White"/> 
                    <label for="race_white">White</label>
                <br>      
                    <input id="race_black" name="race" type="checkbox" value="Black"/> 
                    <label for="race_black">Black or African-American</label>
                <br>    
                    <input id="race_latino" name="race" type="checkbox" value="Latino"/> 
                    <label for="race_latino">Hispanic or Latino</label>
                <br>
                    <input id="race_indian" name="race" type="checkbox" value="Indian"/> 
                    <label for="race_indian">Native American</label>
                <br> 
                    <input id="race_asian" name="race" type="checkbox" value="Asian"/> 
                    <label for="race_asian">Asian</label>
                <br>
                    <input id="race_hawaii" name="race" type="checkbox" value="Hawaiian"/> 
                    <label for="race_hawaii">Hawaiian or Pacific Islander</label>
                <br> 
                    <input id="race_other" name="race" type="checkbox" value="Other"/> 
                    <label for="race_other">Other   </label>

                </p>
            </li>    
            <li>
                <p><strong>What is your nationality?</strong><p>
                <select id="loc" name="loc">';
                    <?php foreach($Countries as $abbr => $country) echo "<option value='" . $abbr . "'>" . $country . "</option>"; ?>       
                </select>
            </li>
            <li>
                <p><strong>What is your country of residence?</strong><p>
                <select id="coun" name="coun">';
                    <?php foreach($Countries as $abbr => $country) echo "<option value='" . $abbr . "'>" . $country . "</option>"; ?>       
                </select>
            </li>        
            <li>
                <p> 
                    <label for="income"><strong>Please select annual household income (in US dollars; click <a href="http://finance.yahoo.com/currency-converter/?u#from=INR;to=USD;amt=1" target="_blank">here</a> for currency conversion)</strong>.</label>        
                </p> 
                <p>
                    <select id="income" name="income">
                     <option disabled selected value="unselected"> -- select an option -- </option> 
                         <option value="25">Less than $25,000</option>
                        <option value="50">$25,000 - $50,000</option>
                        <option value="75">$50,000 - $75,000</option>
                        <option value="100">$75,000 - $100,000</option>
                        <option value="100+">More than $100,000</option>
                        </select>
                </p> 
            </li>         
            <li>
                <p> 
                    <label for="edu"><strong>Highest Education Level Attained:</strong></label>        
                </p> 
                <p>
                    <select id="edu" name="edu"> 
                       <option disabled selected value="unselected"> -- select an option -- </option>
                        <option value="none">No schooling completed, or less than 1 year</option>
                        <option value="elem">Nursery, kindergarten, and elementary (grades 1-8)</option>
                        <option value="high">High school (grades 9-12, no degree)</option>
                        <option value="hs">High school graduate (or equivalent)</option>
                        <option value="college">Some college (1-4 years, no degree)</option>
                        <option value="as">Associate's degree (including occupational or academic degrees)</option>
                        <option value="bs">Bachelor's degree (BA, BS, AB, etc)</option>
                        <option value="ms">Master's degree (MA, MS, MENG, MSW, etc)</option>
                        <option value="md">Professional school degree (MD, DDC, JD, etc)</option>
                        <option value="phd">Doctorate degree (PhD, EdD, etc)</option>
                    </select>
                </p> 
            </li>
             <li>
                <p><strong>Please indicate your marital status.</strong><p>
                <input id="married" name="marital" type="radio" value="Married">
                    <label for="marital">Married</label>
                   
                    <input id="single" name="marital" type="radio" value="Single">
                    <label for="Single">     Single</label>
                  
                    <input id="divorced" name="marital" type="radio" value="divorced" >
                    <label for="married">     Divorced</label>
                   
                    <input id="widowed" name="marital" type="radio" value="Widowed" >
                    <label for="married">     Widowed</label>
            </li>
            <li><p><strong>Do you identify as an English learner?</strong></p>
                <p> 
                    <input id="EL:NO" name="EL" type="radio" value="No" >
                    <label for="gender_male">No&nbsp;&nbsp;&nbsp;&nbsp;</label>    
                    <input id="EL:Yes" name="EL" type="radio" value="Yes"/>
                    <label for="gender_female">Yes</label>
             
                </p>
            </li> 
            <li><p><strong>Please identify your occupation.</strong></p>
                <p> 
                    <input id="employ" name="Employ" type="Text" style="min-width: 250px" >
                    <label for="gender_male"></label>
             
                </p>
            </li> 
            <li>
            <p><strong>Please identify your religion.</strong><p>
                  <select id ="religion" name = "religion" >
                  <option disabled selected value="unselected"> -- select an option -- </option>
                    <option value = "bu">Buddhism </option>
                    <option value = "ch">Christianity </option>
                    <option value = "Hi">Hinduism </option>                    
                    <option value = "IS">Islam </option>
                    <option value = "ot">other </option>
                    <option value = "none">none </option>
                  </select>
            </li>
            <li>
                <p>Definition: A robot is a machine designed to execute one or more tasks automatically with speed and precision. <br>
                <strong>Does your occupation currently involve working with a robot? </strong></p>
                <p> 
                    <input id="robot:no" name="robot" type="radio" value="No" >
                    <label for="robot:no">No&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input id="robot:yes" name="robot" type="radio" value="Yes"/>
                    <label for="robot:yes">Yes</label>
                </p>
            </li>
           
        </ul>
		<div id="error-1" class="error"></div>
		
        <input type="button" value="Submit Demographics" style="margin-left: 40%; margin-right: 40%;" onclick='checkDemographics()'/>
        <div id="participant">
            <p><input type="text" id="subID" name="subID" value="<?php echo base_convert(mt_rand(0x19A100, 0x39AA3FF), 10, 36); ?>" style="visibility: hidden"></p>
        </div>
    </form>
    
       
</div>
</body>