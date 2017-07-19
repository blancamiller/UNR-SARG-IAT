template = {};
sub = '';
resulttext = [];
function randomString(length) {
	var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var result = '';
    for (var i = length; i > 0; --i) result += chars.charAt(Math.floor(Math.random() * (chars.length - 1)));
    return result;
}

// Loads the input file and starts introduction
var demo = true;
var first = true;
function initialize( val)
{	
	if(val == 0)
	{
		first = false;
		demo = true;

	$.getJSON("templates/active.txt", function(input) {
		document.title = input.active + " IAT";
		$.getJSON("templates/"+input.active+"/input.txt", function(data) { 
			template = data;
			
		}); 
		});
	//console.log("FIRST");
		loadInstructions("one");
	//loadInstructions("Three");
			}
	else if(val == 1)
	{
		demo = false;
		$.getJSON("templates/active.txt", function(input) {
		document.title = input.active + " IAT";
		$.getJSON("templates/"+input.active+"/input.txt", function(data) { 
			template = data;
			$.get("core/survey.php", function(data) {
				$("#instructions").html(data);
				$("#subID").val(randomString(10));
			});
		});
	});

	}
	else
	{
	// get active template & load data into global variable
	$.getJSON("templates/active.txt", function(input) {
		document.title = input.active + " IAT";
		$.getJSON("templates/"+input.active+"/input.txt", function(data) { 
			template = data;
			$.get("core/instruct2.html", function(data) {
				$(".IATname").html(template.name);
				$("#instructions").html(data);
				$("#subID").val(randomString(10));
			});
		});
	});

}
	



}

function loadInstructions(stage)
{
	switch(stage)
	{
		case '0':
			sub = $("#subID").val();
			$.get("core/survey.php", function(data) {
					$("#instructions").html(data);
					$(".IATname").html(template.name);
					if(	template.catA.itemtype == "img" || 
						template.catB.itemtype == "img" || 
						template.cat1.itemtype == "img" || 
						template.cat2.itemtype == "img")
					{
						$("#andpics").html(" and pictures ");
					}
				});
			break;
		case 'one':
			sub = $("#subID").val();
			if(/*sub.search('/[^a-zA-Z0-9]/g')==-1 */ true) // not working yet
			{
				$.get("core/instruct1.html", function(data) {
					$("#instructions").html(data);
					$(".IATname").html(template.name);
					if(	template.catA.itemtype == "img" || 
						template.catB.itemtype == "img" || 
						template.cat1.itemtype == "img" || 
						template.cat2.itemtype == "img")
					{
						$("#andpics").html(" and pictures ");
					}
				});
			}
			else
			{
				alert("Please enter a valid subject ID");
			}
			break;
		case 'two':
			$.get("core/instruct2.html", function(data) {
				$("#instructions").html(data);
				
				$("#clabel1").html(template.cat1.label);
		        $("#clabel2").html(template.cat2.label);
		        $("#clabelA").html(template.catA.label);
		        $("#clabelB").html(template.catB.label);
		        if (template.cat1.itemtype == "txt")
		            { $("#citems1").html(template.cat1.items.join(", ")); }
		        else if (template.cat1.itemtype == "img")
		            { $("#citems1").html("Images of "+template.cat1.label); }
		        if (template.cat2.itemtype == "txt")
		            { $("#citems2").html(template.cat2.items.join(", ")); }
		        else if (template.cat2.itemtype == "img")
		            { $("#citems2").html("Images of "+template.cat2.label); }
		        if (template.catA.itemtype == "txt")
		            { $("#citemsA").html(template.catA.items.join(", ")); }
		        else if (template.catA.itemtype == "img")
		            { $("#citemsA").html("Images of "+template.catA.label); }
		        if (template.catB.itemtype == "txt")
		            { $("#citemsB").html(template.catB.items.join(", ")); }
		        else if (template.catB.itemtype == "img")
		            { $("#citemsB").html("Images of "+template.catB.label); }
			});
			break;
		case 'IAT':
			$.get("core/IAT.html", function(data) {
				$('body').html(data);
				document.onkeypress = keyHandler; 
				document.getElementById("experiment_frame").onmousedown = handleClick;
				startIAT();
			});
			break;
		case 'Three':
			$.get("core/NARS.php", function(data) {
				$('body').html(data);
				
			});
			break;
			case 'Four': 
			$.get("core/finish.html", function(data) {
				$('body').html(data);
				
			});

	}
}

// Initialize variables, build page & data object, display instructions
function startIAT()
{
	currentState = "instruction";
	session = 0;
	roundnum = 0;
	
	// default to show results to participant
	if (!('showResult' in template))
	{
	    template.showResult = "show";
	}
	
	// make the target or association words green
	if (Math.random() < 0.5)
	{
		openA = "<font color=green>";
		closeA = "</font>";
		open1 = "";
		close1 = "";
	}
	else
	{		
		open1 = "<font color=green>";
		close1 = "</font>";
		openA = "";
		closeA = "";
	}
	buildPage();
	roundArray = initRounds();
    instructionPage();
    
}

// Adds all images to page (initially hidden) so they are pre-loaded for IAT
function buildPage()
{
	if (template.catA.itemtype == "img")
	{
		for (i in template.catA.items)
		{
			var itemstr = '<img id="'+template.catA.datalabel+i+'" class="IATitem" src="templates/'+template.name+'/img/'+template.catA.items[i]+'">';
			$("#exp_instruct").after(itemstr);
		}
	}
	if (template.catB.itemtype == "img")
	{
		for (i in template.catB.items)
		{
			var itemstr = '<img id="'+template.catB.datalabel+i+'" class="IATitem" src="templates/'+template.name+'/img/'+template.catB.items[i]+'">';
			$("#exp_instruct").after(itemstr);
		}
	}
	if (template.cat1.itemtype == "img")
	{
		for (i in template.cat1.items)
		{
			var itemstr = '<img id="'+template.cat1.datalabel+i+'" class="IATitem" src="templates/'+template.name+'/img/'+template.cat1.items[i]+'">';
			$("#exp_instruct").after(itemstr);
		}
	}
	if (template.cat2.itemtype == "img")
	{
		for (i in template.cat2.items)
		{
			var itemstr = '<img id="'+template.cat2.datalabel+i+'" class="IATitem" src="templates/'+template.name+'/img/'+template.cat2.items[i]+'">';
			$("#exp_instruct").after(itemstr);
		}
	}
}

// Round object
function IATround()
{
	this.starttime = 0;
	this.endtime = 0;
	this.itemtype = "none";
	this.category = "none";
	this.catIndex = 0;
	this.correct = 0;
	this.errors = 0;
}

// Create array for each session & round, with pre-randomized ordering of images
function initRounds()
{
    var roundArray = [];
    // for each session
    for (var i=0; i<7; i++)
    {
        roundArray[i] = [];
        switch (i)
        {
            case 0:
            case 4:
                stype = "target";
                numrounds = 20;
                break;
            case 1:    
                stype = "association";
                numrounds = 20;
                break;
            case 2:
            case 3:
            case 5:
            case 6:
                stype = "both";
                numrounds = 40;
                break;
            
        }
		prevIndexA = -1; prevIndex1 = -1;
        for (var j = 0; j<numrounds; j++)
        {
            var round = new IATround();
            
            if (stype == "target")
            {
                round.category = (Math.random() < 0.5 ? template.catA.datalabel : template.catB.datalabel);
            }
            else if (stype == "association")
            {
                round.category = (Math.random() < 0.5 ? template.cat1.datalabel : template.cat2.datalabel);  
            }
            else if (stype == "both")
            {
				if (j % 2 == 0) { round.category = (Math.random() < 0.5 ? template.catA.datalabel : template.catB.datalabel); }
				else { round.category = (Math.random() < 0.5 ? template.cat1.datalabel : template.cat2.datalabel); }
            }
        	// pick a category
        	if (round.category == template.catA.datalabel) 
        	{ 
				round.itemtype = template.catA.itemtype;
				if (i < 4) { round.correct = 1; }
				else { round.correct = 2; }
				
				// pick an item different from the last
				do 
					{ round.catIndex = Math.floor(Math.random()*template.catA.items.length); }
	        	while (prevIndexA == round.catIndex)
	        	prevIndexA = round.catIndex;
        		
        	}
        	else if (round.category == template.catB.datalabel)
        	{ 
				round.itemtype = template.catB.itemtype;
				if (i < 4) { round.correct = 2; }
				else { round.correct = 1; }
				// pick an item different from the last
				do
	        	    { round.catIndex = Math.floor(Math.random()*template.catB.items.length); }
	        	while (prevIndexA == round.catIndex)
	        	prevIndexA = round.catIndex;
        	}
        	else if (round.category == template.cat1.datalabel)
        	{ 
				round.itemtype = template.cat1.itemtype;
        		round.correct = 1;
				// pick an item different from the last
				do
	        	    { round.catIndex = Math.floor(Math.random()*template.cat1.items.length); }
	        	while (prevIndex1 == round.catIndex)
	        	prevIndex1 = round.catIndex;
        	}
        	else if (round.category == template.cat2.datalabel)
        	{ 
				round.itemtype = template.cat2.itemtype;
        		round.correct = 2;
				// pick an item different from the last
				do
	        	    { round.catIndex = Math.floor(Math.random()*template.cat2.items.length); }
	        	while (prevIndex1 == round.catIndex)
	        	prevIndex1 = round.catIndex;
        	}	
        	
        	roundArray[i].push(round);
        }
    }
    
    return roundArray;
}

// insert instruction text based on stage in IAT
function instructionPage()
{	
	switch (session)
    {
		case 0:
			$('#left_cat').ready(function() { $('#left_cat').html(openA+template.catA.label+closeA); });
			$('#right_cat').ready(function() { $('#right_cat').html(openA+template.catB.label+closeA); });
			break;
        case 1:    
			$("#left_cat").html(open1+template.cat1.label+close1);
			$("#right_cat").html(open1+template.cat2.label+close1);
            break;
        case 2:
        case 3:
			$("#left_cat").html(openA+template.catA.label+closeA+'<br>or<br>'+open1+template.cat1.label+close1);
			$("#right_cat").html(openA+template.catB.label+closeA+'<br>or<br>'+open1+template.cat2.label+close1);
            break;
        case 4:
			$("#left_cat").html(openA+template.catB.label+closeA);
			$("#right_cat").html(openA+template.catA.label+closeA);
			break;
        case 5:
        case 6:
			$("#left_cat").html(openA+template.catB.label+closeA+'<br>or<br>'+open1+template.cat1.label+close1);
			$("#right_cat").html(openA+template.catA.label+closeA+'<br>or<br>'+open1+template.cat2.label+close1);
            break;
    }
	if (session == 7)
	{
		$("#left_cat").html("");
		$("#right_cat").html("");
		$("#exp_instruct").html("<img src='core/spinner.gif'>");
		$.post("core/fileManager.php", { 'op':'checkdb', 'template':template.name }, 
 			function(checkdb) {
 				if(true)
 				{
 					WriteFile();
 				}
				else if(checkdb == "success")
				{
				WriteDatabase();
				}
				else
				{
				WriteFile();
				}
			});	
		if(template.showResult == "show")
		{
		    calculateIAT();
		}
		else
		{
			calculateIAT();
		    resulttext += "<div style='text-align:center;padding:20px'>\nThank you for participating!\nPlease press space or click on the screen to continue to a short questionairre.</div>";
		    $("#picture_frame").html(resulttext);
		}
	}
	else
	{
		$.get("core/gInstruct"+(session+1)+".html", function(data) { $('#exp_instruct').html(data); });
	}
}


function removeOutliers( )
{
	var lowLatencyCount = 0;
	var totalTrials = 0;
	for( i = 2; i < 7; i++ )
	{
		if(i == 4)
		{
			continue;
		}
		for (j=0; j< roundArray[i].length; j++)
		{
			totalTrials++;
			score = roundArray[i][j].endtime - roundArray[i][j].starttime;
			if (score < 300)  //  count all instances of latencies lower than 300ms
			{ 
				lowLatencyCount++;
			}
			else if (score > 10000) 
			{
				roundArray[i].splice(j, 1); // remove latencies greater than 10000
			}
		}
	}
	if(lowLatencyCount > (totalTrials * .1)) //if 10 percent of trials have very low latency test is invalid
	{
		return -1;
	}
	else 
	{
		return 1;
	}
}
function meanOfCorrect( blockID)
{
	var sum = 0;
	var count = 0;
	for (j=0; j< roundArray[blockID].length; j++)
	{
		if(roundArray[blockID][j].errors == 0) //correct trial
		{
			sum += roundArray[blockID][j].endtime - roundArray[blockID][j].starttime;
			count++;
		}
	}
	sum /= count;
	return sum;	
}
function meanOfAll(blockID)
{
	var sum = 0;
	for (j=0; j< roundArray[blockID].length; j++)
	{
		sum += roundArray[blockID][j].endtime - roundArray[blockID][j].starttime;
	}
	sum /= roundArray[blockID].length;
	return sum;	
}
function mean(array)
{
	var sum = 0;
		for (j=0; j< array.length; j++)
	{
		sum += array[j];
	}
	sum /= array.length;
	return sum;	
}
function computerSD(blockID1, blockID2)
{
	var sdDiff = [];
	var avg1 = meanOfAll(blockID1);
	var avg2 = meanOfAll(blockID2);
	var newAvg = (avg1 + avg2)/2; //mean of both blocks
	for (j=0; j< roundArray[blockID1].length; j++)
	{ //subtract each value from mean, square result
		sdDiff.push(Math.pow((newAvg - (roundArray[blockID1][j].endtime - roundArray[blockID1][j].starttime)),2)); 	
	}
	for (j=0; j< roundArray[blockID2].length; j++)
	{//subtract each value from mean, square result
		sdDiff.push(Math.pow((newAvg - (roundArray[blockID2][j].endtime - roundArray[blockID2][j].starttime)),2));	
	}
	return Math.sqrt(mean(sdDiff)); //take mean of results, return square root of the mean

}
function replaceErrors()
{
	var avg = [0, 0, meanOfCorrect(2), meanOfCorrect(3), 0, meanOfCorrect(5), meanOfCorrect(6)];

	for( i = 2; i < 7; i++ )
	{
		if(i == 4)
		{
			continue;
		}
		for (j=0; j< roundArray[i].length; j++)
		{
			if(roundArray[i][j].errors > 0)
			{//replace trials with errors with block average plus constant
				roundArray[i][j].endtime = roundArray[i][j].starttime + avg[i] + 600; 
			}
		}
	}
}
function calculateIAT()
{
	//handle outliers
	var valid = removeOutliers();
	var B3_B6_SD = 0;
	var B4_B7_SD = 0;
	if( valid == -1 ) // too many responses below the 300ms threshold
	{
		resulttext = "<div style='text-align:center;padding:20px'>This test is invalid due to too many responses below the time threshold ";
        resulttext += ".</div>"; 
		$("#picture_frame").html(resulttext);
		//return valid;  // commented out for testing
	}

	var B6_B3_SD = computerSD(2,5);
	var B7_B4_SD = computerSD(3,6);

	replaceErrors();

	//get means for each test block after replacing errors
	var B3avg = meanOfAll(2); // 0 based arrays so index - 1
	var B4avg = meanOfAll(3); 
	var B6avg = meanOfAll(5); 
	var B7avg = meanOfAll(6); 

	var B6_B3_diff = B6avg - B3avg;
	var B7_B4_diff = B7avg - B4avg;

	B6_B3_diff /= B6_B3_SD;
	B7_B4_diff /= B7_B4_SD;
	//console.log(B6_B3_diff + " " + B6_B3_SD+ " " +	B7_B4_diff+ " " + B7_B4_SD);
	var tvalue = (B6_B3_diff + B7_B4_diff ) / 2.0;

    if (Math.abs(tvalue) > 2.89) { severity = " <b>much more</b> than "; }
	else if (Math.abs(tvalue) > 2.64) { severity = " <b>more</b> than "; }	
	else if (Math.abs(tvalue) > 1.99) { severity = " <b>a little more</b> than "; }
	else if (Math.abs(tvalue) > 1.66) { severity = " <b>just slightly more</b> than "; }
	else { severity = ""; }
	
	// put together feedback based on direction & magnitude
	if (tvalue < 0 && severity != "")
    { 
        resulttext = "<div style='text-align:center;padding:20px'>You associate "+openA+template.catB.label+closeA+" with "+open1+template.cat1.label+close1;
        resulttext += " and "+openA+template.catA.label+closeA+" with "+open1+template.cat2.label+close1+severity;
        resulttext += "you associate "+openA+template.catA.label+closeA+" with "+open1+template.cat1.label+close1;
        resulttext += " and "+openA+template.catB.label+closeA+" with "+open1+template.cat2.label+close1+".</div>"; 
        // resulttext += "<div>incompatible: "+incompatible+" ("+(ivar/39)+"); compatible: "+compatible+" ("+(cvar/39)+"); tvalue: "+tvalue+"</div>";
    }
    else if (tvalue > 0 && severity != "")
    { 
        resulttext = "<div style='text-align:center;padding:20px'>You associate "+openA+template.catA.label+closeA+" with "+open1+template.cat1.label+close1;
        resulttext += " and "+openA+template.catB.label+closeA+" with "+open1+template.cat2.label+close1+severity;
        resulttext += "you associate "+openA+template.catB.label+closeA+" with "+open1+template.cat1.label+close1;
        resulttext += " and "+openA+template.catA.label+closeA+" with "+open1+template.cat2.label+close1+".</div>"; 
        // resulttext += "<div>incompatible: "+incompatible+" ("+(ivar/39)+"); compatible: "+compatible+" ("+(cvar/39)+"); tvalue: "+tvalue+"</div>";
    }
    else
    { 
        resulttext = "<div style='text-align:center;padding:20px'>You do not associate "+openA+template.catA.label+closeA;
        resulttext += " with "+open1+template.cat1.label+close1+" any more or less than you associate ";
        resulttext += openA+template.catB.label+closeA+" with "+open1+template.cat1.label+close1+".</div>"; 
        // resulttext += "<div>incompatible: "+incompatible+" ("+(ivar/39)+"); compatible: "+compatible+" ("+(cvar/39)+"); tvalue: "+tvalue+"</div>";
    }
    //resulttext += "\nThank you for completing the UNR Robotics implicit assoicaition test.\n Please press space and complete a short questionairre."
	$("#picture_frame").html(resulttext);
    return tvalue;
} 

// not currently used
function groupEvaluations()
{
	$('#demoglist').after(
		"Please rate how warm or cold you feel toward the following groups:\
		<br>\
		(0 = coldest feelings, 5 = neutral, 10 = warmest feelings)\
		<ol>\
		<li>\
		<p>"+template.catA.label+"</p>\
		<p>\
		<select id='catAwarm' name='catAwarm'> \
		<option value='unselected' selected='selected'></option>\
		<option value='0 coldest feelings'></option>\
		<option value='1'></option>\
		<option value='2'></option>\
		<option value='3'></option>\
		<option value='4'></option>\
		<option value='5 neutral'></option>\
		<option value='6'></option>\
		<option value='7'></option>\
		<option value='8'></option>\
		<option value='9'></option>\
		<option value='10 warmest feelings'></option>\
		</select>\
		</p> \
		</li>\
		<li>\
		<p>"+template.catB.label+"</p>\
		<p>\
		<select id='catBwarm' name='catBwarm'> \
		<option value='unselected' selected='selected'></option>\
		<option value='0 coldest feelings'></option>\
		<option value='1'></option>\
		<option value='2'></option>\
		<option value='3'></option>\
		<option value='4'></option>\
		<option value='5 neutral'></option>\
		<option value='6'></option>\
		<option value='7'></option>\
		<option value='8'></option>\
		<option value='9'></option>\
		<option value='10 warmest feelings'></option>\
		</select>\
		</p> \
		</li>\
		</ol>\
		");
}

function IsNumeric(input)
{
   return (input - 0) == input && input.length > 0;
}

var demos = "";
function checkDemographics()
{
    //gender = $("input[name=gender]:checked").val();
    gender = [];
    $("input[name=gender]:checked").each(function() { gender.push($(this).val()); });
    age = $("#age option:selected").val();
   // console.log(age);
    loc = $("#loc option:selected").val().replace(/[^A-Za-z0-9,]/g,' ');
    //races = $("input[name=race]:checked").val();
    races = [];
	$("input[name=race]:checked").each(function() { races.push($(this).val()); });
    income = $("#income").val();
    education = $("#edu option:selected").val();
    marital = $("input[name = marital]:checked").val();
    religion = $("#religion option:selected").val();
    nationality = $("input[name=coun]:checked").val();
    //console.log(marital);
    // alert(income+"\n"+parseFloat(income)+"\n");
    // $.get('getLocation.php', 
    //         { 'q': loc},
    //         function(data) {
    //             alert(data);
    //         });
    
	// Do validation of input
    var error = false;
    var errmsg = "";
    
    if(gender==null)
    {
        error=true;
        errmsg += "<div class='error'>Please choose an option for gender</div>";
    }    
	if(age=="unselected")
    {
        error=true;
        errmsg += "<div class='error'>Please state the year you were born</div>";
    }
    else if(age < 18 )
    {
    	error = true;
    	errmsg += "<div class='error'>You must be 18 years or older to take this survey</div>";
    }
	if(loc.length == 0)
    {
        error=true;
        errmsg += "<div class='error'>Please indicate your current location</div>";
    }
    if(races==null)
    {
        error=true;
        errmsg += "<div class='error'>Please indicate your race and ethnicity</div>";
    }
    if(income==null ||income == "unselected" )
    {
        error=true;
        errmsg += "<div class='error'>Please select a valid option for household income</div>";
    }
    if(education=="unselected")
    {
        error=true;
        errmsg += "<div class='error'>Please indicate your highest level of education</div>";
    }
	if(subID.length == 0)
    {
        error=true;
        errmsg += "<div class='error'>Please enter a valid identifier</div>";
    }
    if(!marital )
    {
    	error = true;
    	errmsg += "<div class='error'>Please select a valid marital status</div>";
    }
    if(religion == null || religion == "unselected")
    {
    	error = true;
    	errmsg += "<div class = 'error'>Please select a valid option for religion.</div>";
    }
	// Output error message if input not valid
    if(error==false)
    {
    	sub = $("#subID").val();
    	
		subject = sub;
		demos += sub+'\t';
       demos += gender+'\t';
        demos += age+'\t';
       demos += loc+'\t';
      // demos += races.join(',')+'\t';
        demos += races+'\t';
       
       demos += income.replace(/[^0-9.]/g,'')+'\t';
       demos += marital+'\t';
       demos += religion +'\t';
       demos += education+'\n';
        demos += nationality +'\t';
        demo = false;
      //  console.log(demos);
         $.post("core/fileManager.php", { 'op':'writedemographics',   'data': demos });	
	   // $.post("core/writeFile.php", { 'subject': subject, 'src': "survey", 'data': demos }, function() {location.href = 'instruct2.php?sub='+sub;});
    	//loadInstructions("two");
    	initialize(3);
    }
    else
    {
        $('#error-1').html(errmsg);
    }
}
function checkQuestionairre()
{
	qError = false;
	questionArray = [];
	qerrormsg = "";
	if($("input[name=NARS-Q01]:checked").val() ==null )
	{
		document.getElementById('NARSQ01').style.backgroundColor = "white";
  		document.getElementById('NARSQ01').style.borderColor = "red";
  		document.getElementById('NARSQ01').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q02]:checked").val() ==null )
	{
		document.getElementById('NARSQ02').style.backgroundColor = "white";
  		document.getElementById('NARSQ02').style.borderColor = "red";
  		document.getElementById('NARSQ02').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q03]:checked").val() ==null )
	{
		document.getElementById('NARSQ03').style.backgroundColor = "white";
  		document.getElementById('NARSQ03').style.borderColor = "red";
  		document.getElementById('NARSQ03').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q04]:checked").val() ==null )
	{
		document.getElementById('NARSQ04').style.backgroundColor = "white";
  		document.getElementById('NARSQ04').style.borderColor = "red";
  		document.getElementById('NARSQ04').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q05]:checked").val() ==null )
	{
		document.getElementById('NARSQ05').style.backgroundColor = "white";
  		document.getElementById('NARSQ05').style.borderColor = "red";
  		document.getElementById('NARSQ05').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q06]:checked").val() ==null )
	{
		document.getElementById('NARSQ06').style.backgroundColor = "white";
  		document.getElementById('NARSQ06').style.borderColor = "red";
  		document.getElementById('NARSQ06').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q07]:checked").val() ==null )
	{
		document.getElementById('NARSQ07').style.backgroundColor = "white";
  		document.getElementById('NARSQ07').style.borderColor = "red";
  		document.getElementById('NARSQ07').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q08]:checked").val() ==null )
	{
		document.getElementById('NARSQ08').style.backgroundColor = "white";
  		document.getElementById('NARSQ08').style.borderColor = "red";
  		document.getElementById('NARSQ08').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q09]:checked").val() ==null )
	{
		document.getElementById('NARSQ09').style.backgroundColor = "white";
  		document.getElementById('NARSQ09').style.borderColor = "red";
  		document.getElementById('NARSQ09').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q10]:checked").val() ==null )
	{
		document.getElementById('NARSQ10').style.backgroundColor = "white";
  		document.getElementById('NARSQ10').style.borderColor = "red";
  		document.getElementById('NARSQ10').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q11]:checked").val() ==null )
	{
		document.getElementById('NARSQ11').style.backgroundColor = "white";
  		document.getElementById('NARSQ11').style.borderColor = "red";
  		document.getElementById('NARSQ11').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q12]:checked").val() ==null )
	{
		document.getElementById('NARSQ12').style.backgroundColor = "white";
  		document.getElementById('NARSQ12').style.borderColor = "red";
  		document.getElementById('NARSQ12').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q13]:checked").val() ==null )
	{
		document.getElementById('NARSQ13').style.backgroundColor = "white";
  		document.getElementById('NARSQ13').style.borderColor = "red";
  		document.getElementById('NARSQ13').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q14]:checked").val() ==null )
	{
		document.getElementById('NARSQ14').style.backgroundColor = "white";
  		document.getElementById('NARSQ14').style.borderColor = "red";
  		document.getElementById('NARSQ14').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q15]:checked").val() ==null )
	{
		document.getElementById('NARSQ15').style.backgroundColor = "white";
  		document.getElementById('NARSQ15').style.borderColor = "red";
  		document.getElementById('NARSQ15').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q16]:checked").val() ==null )
	{
		document.getElementById('NARSQ16').style.backgroundColor = "white";
  		document.getElementById('NARSQ16').style.borderColor = "red";
  		document.getElementById('NARSQ16').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q17]:checked").val() ==null )
	{
		document.getElementById('NARSQ17').style.backgroundColor = "white";
  		document.getElementById('NARSQ17').style.borderColor = "red";
  		document.getElementById('NARSQ17').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q18]:checked").val() ==null )
	{
		document.getElementById('NARSQ18').style.backgroundColor = "white";
  		document.getElementById('NARSQ18').style.borderColor = "red";
  		document.getElementById('NARSQ18').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q19]:checked").val() ==null )
	{
		document.getElementById('NARSQ19').style.backgroundColor = "white";
  		document.getElementById('NARSQ19').style.borderColor = "red";
  		document.getElementById('NARSQ19').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q20]:checked").val() ==null )
	{
		document.getElementById('NARSQ20').style.backgroundColor = "white";
  		document.getElementById('NARSQ20').style.borderColor = "red";
  		document.getElementById('NARSQ20').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q21]:checked").val() ==null )
	{
		document.getElementById('NARSQ21').style.backgroundColor = "white";
  		document.getElementById('NARSQ21').style.borderColor = "red";
  		document.getElementById('NARSQ21').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q22]:checked").val() ==null )
	{
		document.getElementById('NARSQ22').style.backgroundColor = "white";
  		document.getElementById('NARSQ22').style.borderColor = "red";
  		document.getElementById('NARSQ22').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q23]:checked").val() ==null )
	{
		document.getElementById('NARSQ23').style.backgroundColor = "white";
  		document.getElementById('NARSQ23').style.borderColor = "red";
  		document.getElementById('NARSQ23').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q24]:checked").val() ==null )
	{
		document.getElementById('NARSQ24').style.backgroundColor = "white";
  		document.getElementById('NARSQ24').style.borderColor = "red";
  		document.getElementById('NARSQ24').style.borderStyle = "double";
		qError = true;
	}
	if($("input[name=NARS-Q25]:checked").val() ==null )
	{
		document.getElementById('NARSQ25').style.backgroundColor = "white";
  		document.getElementById('NARSQ25').style.borderColor = "red";
  		document.getElementById('NARSQ25').style.borderStyle = "double";
		qError = true;
	}

	if(qError )
	{
		qerrormsg += "<div class='error'>Please answer all of the highlighted survey questions.</div>";
		$('#error-1').html(qerrormsg);
		//loadInstructions("two");
	}
	else
	{
		questionArray.push("NARS:");
		questionArray.push("," +$("input[name=NARS-Q01]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q02]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q03]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q04]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q05]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q06]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q07]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q08]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q09]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q10]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q11]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q12]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q13]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q14]:checked").val());

		questionArray.push("," +$("input[name=NARS-Q15]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q16]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q17]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q18]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q19]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q20]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q21]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q22]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q23]:checked").val());

		questionArray.push("," +$("input[name=NARS-Q24]:checked").val());
		questionArray.push("," +$("input[name=NARS-Q25]:checked").val());
		demos += questionArray;
		WriteFile();
		//console.log(demos);
		loadInstructions("Four");
	}
}


// Converts the data for each session and round into a comma-delimited string
// and passes it to writeFile.php to be written by the server
function saveTest()
{
	var subject = sub;
	subject = subject.length==0 ? "unknown" : subject;
	
	demos;
	for (i=0; i<roundArray.length; i++)
	{
		for (j=0;j<roundArray[i].length;j++)
		{
			demos += i + "," + j + ",";
	        demos += roundArray[i][j].category+",";
			demos += roundArray[i][j].catIndex+",";
			demos += roundArray[i][j].errors+",";
			demos += (roundArray[i][j].endtime - roundArray[i][j].starttime).toString();
			demos += "\r\n";
			var catIndex=roundArray[i][j].catIndex;
			var category=roundArray[i][j].category;
			var datai=i;
			var dataj=j;
			var mseconds=(roundArray[i][j].endtime - roundArray[i][j].starttime);
			
		}
	}
	var IATScore = calculateIAT(roundArray);
	demos += IATScore;
	demos += "\r\n";
	demos += "Scores used to calculateIAT"

	for (i=0; i<roundArray.length; i++)
	{
		for (j=0;j<roundArray[i].length;j++)
		{
			demos += i + "," + j + ",";
	        demos += roundArray[i][j].category+",";
			demos += roundArray[i][j].catIndex+",";
			demos += roundArray[i][j].errors+",";
			demos += (roundArray[i][j].endtime - roundArray[i][j].starttime).toString();
			demos += "\r\n";
			
		}
	}
	demos += resulttext +="\r\n";
	WriteFile();
}
function WriteFile()
{
	
	var subject = sub;
	subject = subject.length==0 ? "unknown" : subject;
	var str = demos;
    $.post("core/fileManager.php", { 'op':'writeoutput', 'template':"RobotImages", 
 			'subject': subject, 'data': str });	
 	
	// notify user of success?
}
function WriteDatabase()
{
	
	var subject = sub;
	subject = subject.length==0 ? "unknown" : subject;
	var str = "";
	for (i=0; i<roundArray.length; i++)
	{
		for (j=0;j<roundArray[i].length;j++)
		{
			str += i + "," + j + ",";
	        str += roundArray[i][j].category+",";
			str += roundArray[i][j].catIndex+",";
			str += roundArray[i][j].errors+",";
			str += (roundArray[i][j].endtime - roundArray[i][j].starttime)+"\n";
			var catIndex=roundArray[i][j].catIndex;
			var category=roundArray[i][j].category;
			var datai=i;
			var dataj=j;
			var mseconds=(roundArray[i][j].endtime - roundArray[i][j].starttime);
			//$.post("core/fileManager.php", { 'op':'writedatabase', 'template':template.name, 
 			//'subject': subject, 'data': str,'catindex':catIndex, 'category':category, 'datai':datai });
			$.post("core/fileManager.php", { 'op':'writedatabase', 'template':template.name, 
 			'subject': subject, 'data': str, 'datai':i, 'dataj':j,'category':roundArray[i][j].category, 'catindex':roundArray[i][j].catIndex,
 			'errors':roundArray[i][j].errors, 'mseconds':(roundArray[i][j].endtime - roundArray[i][j].starttime) });
		}
	}
	
 	
	// notify user of success?
}



// This monitors for keyboard events
function keyHandler(kEvent)
{   
	// move from instructions to session on spacebar press
	var unicode;
	if (!kEvent) var kEvent = window.event;
	if (kEvent.keyCode) unicode = kEvent.keyCode;
	else if (kEvent.which) unicode = kEvent.which;
	if (currentState == "instruction" && unicode == 32 && session != 7)
    {
		currentState = "play";
		$('#exp_instruct').html('');
		displayItem();
    }
    else if( unicode == 32 && session == 7)
    {
    	//writeFile();
    	loadInstructions('Three');
    }

	// in session
	if (currentState == "play")
	{
		runSession(kEvent);
	}
}

// Get the stimulus for this session & round and display it
function displayItem()
{
	var tRound = roundArray[session][roundnum]; 
	tRound.starttime = new Date().getTime(); // the time the item was displayed
	if (tRound.itemtype == "img")
	{
		if (tRound.category == template.catA.datalabel)
			{ $("#"+template.catA.datalabel+tRound.catIndex).css("display","block"); }
		else if (tRound.category == template.catB.datalabel)
			{ $("#"+template.catB.datalabel+tRound.catIndex).css("display","block"); }
		else if (tRound.category == template.cat1.datalabel)
			{ $("#"+template.cat1.datalabel+tRound.catIndex).css("display","block"); }
		else if (tRound.category == template.cat2.datalabel)
			{ $("#"+template.cat2.datalabel+tRound.catIndex).css("display","block"); }
	}
	else if (tRound.itemtype == "txt")
	{
		if (tRound.category == template.catA.datalabel)
		{ 
			$("#word").html(openA+template.catA.items[tRound.catIndex]+closeA)
			$("#word").css("display","block"); 
		}
		else if (tRound.category == template.catB.datalabel)
		{ 
			$("#word").html(openA+template.catB.items[tRound.catIndex]+closeA)
			$("#word").css("display","block"); 
		}
		else if (tRound.category == template.cat1.datalabel)
		{ 
			$("#word").html(open1+template.cat1.items[tRound.catIndex]+close1)
			$("#word").css("display","block"); 
		}
		else if (tRound.category == template.cat2.datalabel)
		{ 
			$("#word").html(open1+template.cat2.items[tRound.catIndex]+close1)
			$("#word").css("display","block"); 
		}
	}
}
function handleClick(event)
{
	//console.log("click");
	if (currentState == "instruction"  && session != 7)
    {
		currentState = "play";
		$('#exp_instruct').html('');
		displayItem();
    }
    else if(  session == 7)
    {
    	//writeFile();
    	saveTest();
    	loadInstructions('Three');
    }

	// in session
	if (currentState == "play")
	{
		var x = event.pageX - $('#experiment_frame').offset().left;
		console.log(x);
		if(x > 0 && x < 200)
		{
			event.keyCode = 69;
		}
		else if(x > 300 && x < 500 )
		{
			event.keyCode = 73;
		}

		runSession(event);
	}
}
function runSession(kEvent)
{
	var rCorrect = roundArray[session][roundnum].correct;
	var unicode = kEvent.keyCode? kEvent.keyCode : kEvent.charCode;
	keyE = (unicode == 69 || unicode == 101 );
	keyI = (unicode == 73 || unicode == 105 );
	
	// if correct key (1 & E) or (2 & I)
	if ((rCorrect == 1 && keyE) || (rCorrect == 2 && keyI))
	{
		$("#wrong").css("display","none"); // remove X if it exists
		roundArray[session][roundnum].endtime = new Date().getTime(); // end time
		// if more rounds
		if (roundnum < roundArray[session].length-1)
		{
			roundnum++;
			$(".IATitem").css("display","none"); // hide all items
			displayItem(); // display chosen item
		}
		else
		{
    		$(".IATitem").css("display","none"); // hide all items
			currentState = "instruction"; // change state to instruction
			session++; // move to next session
			roundnum=0; // reset rounds to 0
		    instructionPage(); // show instruction page
		}
	}
	// incorrect key
	else if ((rCorrect == 1 && keyI) || (rCorrect == 2 && keyE))
	{
		$("#wrong").css("display","block"); // show X
		roundArray[session][roundnum].errors++; // note error
	}
}
