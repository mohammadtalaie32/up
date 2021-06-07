<?
include("macros.php");
connectmysql();
?>
<style>
.noborder icolor2e3192{
	color:#000000;
}
.noborder icolor2e3192{
	color:#000000;
}
</style>
<script>
var currentarea='';
//var temp='';
function showarea(str){
	//temp=document.getElementById('area').innerText;
	document.getElementById('area').innerHTML='<h2>'+str+'</h2>';
}
function showtimer(str){
	document.getElementById('timerareadiv').innerHTML='Time your rollout for <b>'+str+'</b>:<br>';
	document.getElementById('currentarea').value=str;
	currentarea=str;
	clearstopwatch();
	stopstopwatch();
	document.getElementById('stopwatchlog').innerText='';
	document.getElementById('savebutton').style.display='none';
}
function cleararea(){
	document.getElementById('area').innerHTML='<h2>'+document.getElementById('currentarea').value+'</h2>';
}
function selectdiv(id){
	if(id=='stopwatch'){
		document.getElementById('stopwatchdiv').style.display="block";
		document.getElementById('timerdiv').style.display="none";
	}
	if(id=='timer'){
		document.getElementById('stopwatchdiv').style.display="none";
		document.getElementById('timerdiv').style.display="block";
	}
}
var time=0;
var i,i2;
function gettime(time,returnvalue){
	if(returnvalue=='') returnvalue='string';
	var returntime;
	var hours,minutes,seconds;
	hours=Math.floor(time/3600);
	minutes=time-(hours*3600);
	minutes=Math.floor(time/60);
	seconds=time-(minutes*60);
	var shorthours=hours,shortminutes=minutes,shortseconds=seconds;
	if(hours<10) hours='0'+hours;
	if(minutes<10) minutes='0'+minutes;
	if(seconds<10) seconds='0'+seconds;
	if(returnvalue=='hours')
		return shorthours;
	else if(returnvalue=='minutes')
		return shortminutes;
	else if(returnvalue=='seconds')
		return shortseconds;
	else
		return hours+':'+minutes+':'+seconds;
}
function clearstopwatch(){
	time=0;
	document.getElementById('stopwatchtime').innerText=gettime(time);
}
function startstopwatch(){
	if(currentarea=='') alert('Please select an area!');
	else{
		document.getElementById('startstopwatch').style.display="none";
		document.getElementById('stopstopwatch').style.display="block";
		i=setInterval(function() {
			time++;
			document.getElementById('stopwatchtime').innerText=gettime(time);
			//if(time==5)
			//	clearInterval(i);
		},1000);
	}
}
function stopstopwatch(){
	var localcurrentarea=document.getElementById('currentarea').value;
	document.getElementById('startstopwatch').style.display="block";
	document.getElementById('stopstopwatch').style.display="none";
	var logstring='You have rolled out your ';
	logstring+=localcurrentarea;
	logstring+=' for ';
	if(gettime(time,'hours')!=0) logstring+=gettime(time,'hours')+' hours, ';
	if(gettime(time,'minutes')!=0) logstring+=gettime(time,'minutes')+' minutes, ';
	logstring+=gettime(time,'seconds')+' seconds.<br>'
	<!--
	//savetolog(\''+localcurrentarea+'\',\''+gettime(time,'minutes')+':'+gettime(time,'seconds')+'\');
	document.getElementById('stopwatchlog').innerHTML=logstring;
	document.getElementById('savebutton').style.display='block';
	clearInterval(i);
}
var timertime=60;
function settimer(){
	var strfortime=document.getElementById('minutes').value;
	timertime=strfortime*60;
	if(strfortime<10) strfortime='0'+strfortime;
	document.getElementById('timertime').innerText='00:'+strfortime+':00';
}
function starttimer(){
	document.getElementById('starttimer').style.display="none";
	document.getElementById('stoptimer').style.display="block";
	i2=setInterval(function() {
		timertime--;
		document.getElementById('timertime').innerText=gettime(timertime);
		if(timertime==0){
			document.getElementById('completed').style.display='block';
			clearInterval(i2);
		}
	},1000);
}
function stoptimer(){
	document.getElementById('starttimer').style.display="block";
	document.getElementById('stoptimer').style.display="none";
	clearInterval(i2);
}
function savetolog(){
	if(document.getElementById('areas').value!='')
	document.getElementById('areas').value=document.getElementById('areas').value+'-SE-';
	document.getElementById('areas').value=document.getElementById('areas').value+document.getElementById('currentarea').value;
	if(document.getElementById('times').value!='')
	document.getElementById('times').value=document.getElementById('times').value+'-SE-';
	document.getElementById('times').value=document.getElementById('times').value+gettime(time);
	writelog();
}
function writelog2(areas,times,div,date){
	var areasarr=areas.split('-SE-');
	var timesarr=times.split('-SE-');
	var forlog='<table border="1" cellpadding="2"><tr><td colspan="2"><b>';
	if(date=='') forlog+='Daily Log - <? echo date('n/j/Y'); ?>';
	else forlog+='Saved Log - '+date;
	forlog+='</b></td></tr><tr><td>Area</td><td>Time</td></tr>';
	for(var i=0;i<areasarr.length;i++){
		forlog+='<tr><td>'+areasarr[i]+'</td><td>'+timesarr[i]+'</td></tr>';
		//document.getElementById('currentarea').value+' '+gettime(time)+'<br>';
	}
	if(date=='')
	forlog+='<tr><td colspan="2"><input type="submit" value="Save workout!"></td></tr>';
	forlog+='</table>';
	document.getElementById(div).innerHTML=forlog;
}
function writelog(){
	var areasarr=document.getElementById('areas').value.split('-SE-');
	var timesarr=document.getElementById('times').value.split('-SE-');
	var forlog='<table border="1" cellpadding="2"><tr><td colspan="2"><b>Daily Log - <? echo date('n/j/Y') ?></b></td></tr><tr><td>Area</td><td>Time</td></tr>';
	for(var i=0;i<areasarr.length;i++){
		forlog+='<tr><td>'+areasarr[i]+'</td><td>'+timesarr[i]+'</td></tr>';
		//document.getElementById('currentarea').value+' '+gettime(time)+'<br>';
	}
	forlog+='<tr><td colspan="2"><input type="submit" value="Save workout!"></table>';
	document.getElementById('log').innerHTML=forlog;
}
</script>
<form name="form" action="bodychartsubmit.php" method="post">
<input type="hidden" name="currentarea" id="currentarea" />
<input type="hidden" name="areas" id="areas" />
<input type="hidden" name="times" id="times" />
<script type="text/javascript" src="mapper.js"></script>
<table><tr><td align="center">
<DIV>
<IMG src="images/bodychartwithareasnew.png" class="mapper" name=footballfield width="600" height="546" border=1 useMap=#footballfieldMap>
<MAP name=footballfieldMap>
<area onmouseover="showarea('Lower Back')" onmouseout="cleararea()" onclick="showtimer('Lower Back')" shape="circle" class="noborder icolor2e3192" coords="338,209,35" />
<area onmouseover="showarea('Right Outer Thigh')" onmouseout="cleararea()" onclick="showtimer('Right Outer Thigh')" shape="poly" class="noborder icolor2e3192" coords="83,334,83,299,69,298,82,374" />
<area onmouseover="showarea('Left Outer Thigh')" onmouseout="cleararea()" onclick="showtimer('Left Outer Thigh')" shape="poly" class="noborder icolor2e3192" coords="158,337,158,297,172,298,157,377" />
<area onmouseover="showarea('Left Thigh')" onmouseout="cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="141,364,140,267,156,266,156,329" />
<area onmouseover="showarea('Right Thigh')" onmouseout="cleararea()" onclick="showtimer('Right Thigh')" shape="poly" class="noborder icolor2e3192" coords="82,328,82,264,98,263,98,361" />
<area onmouseover="showarea('Left Knee')" onmouseout="cleararea()" onclick="showtimer('Left Knee')" shape="circle" class="noborder icolor2e3192" coords="143,386,18" />
<area onmouseover="showarea('Left Inner Thigh')" onmouseout="cleararea()" onclick="showtimer('Left Inner Thigh')" shape="poly" class="noborder icolor2e3192" coords="125,336,125,285,140,286,140,337" />
<area onmouseover="showarea('Right Inner Thigh')" onmouseout="cleararea()" onclick="showtimer('Right Inner Thigh')" shape="poly" class="noborder icolor2e3192" coords="100,338,100,285,114,286,115,338" />
<area onmouseover="showarea('Left Ankle')" onmouseout="cleararea()" onclick="showtimer('Left Ankle')" shape="circle" class="noborder icolor2e3192" coords="138,498,15" />
<area onmouseover="showarea('Right Ankle')" onmouseout="cleararea()" onclick="showtimer('Right Ankle')" shape="circle" class="noborder icolor2e3192" coords="110,497,15" />
<area onmouseover="showarea('Right Knee')" onmouseout="cleararea()" onclick="showtimer('Right Knee')" shape="circle" class="noborder icolor2e3192" coords="101,384,18" />
<area onmouseover="showarea('Left Wrist')" onmouseout="cleararea()" onclick="showtimer('Left Wrist')" shape="circle" class="noborder icolor2e3192" coords="188,265,14" />
<area onmouseover="showarea('Right Wrist')" onmouseout="cleararea()" onclick="showtimer('Right Wrist')" shape="circle" class="noborder icolor2e3192" coords="51,266,14" />
<area onmouseover="showarea('Left Forearm')" onmouseout="cleararea()" onclick="showtimer('Left Forearm')" shape="circle" class="noborder icolor2e3192" coords="184,226,16" />
<area onmouseover="showarea('Right Forearm')" onmouseout="cleararea()" onclick="showtimer('Right Forearm')" shape="circle" class="noborder icolor2e3192" coords="59,224,16" />
<area onmouseover="showarea('Left Bicep')" onmouseout="cleararea()" onclick="showtimer('Left Bicep')" shape="circle" class="noborder icolor2e3192" coords="179,171,16" />
<area onmouseover="showarea('Right Bicep')" onmouseout="cleararea()" onclick="showtimer('Right Bicep')" shape="circle" class="noborder icolor2e3192" coords="70,168,16" />
<area onmouseover="showarea('Abdomen')" onmouseout="cleararea()" onclick="showtimer('Abdomen')" shape="circle" class="noborder icolor2e3192" coords="123,185,35" />
<area onmouseover="showarea('Left Shoulder')" onmouseout="cleararea()" onclick="showtimer('Left Shoulder')" shape="circle" class="noborder icolor2e3192" coords="166,132,26" />
<area onmouseover="showarea('Right Shoulder')" onmouseout="cleararea()" onclick="showtimer('Right Shoulder')" shape="circle" class="noborder icolor2e3192" coords="83,130,26" />
<area onmouseover="showarea('Temple')" onmouseout="cleararea()" onclick="showtimer('Temple')" shape="circle" class="noborder icolor2e3192" coords="536,51,16" />
<area onMouseOver="showarea('Forehead')" onmouseout="cleararea()" onclick="showtimer('Forehead')" shape=CIRCLE class="noborder icolor2e3192" coords=122,32,13>
</MAP> 
</DIV>
<div id="area" style="font-size:20px;font-weight:bold;"></div>
</td>
<td valign="top" width="400">
<div id="timer">
<div id="timerareadiv">Please select an area to begin timing your roll out!</div><br />	
<input type="radio" name="type" value="stopwatch" onclick="selectdiv('stopwatch')" checked /> Stopwatch
<input type="radio" name="type" value="timer" onclick="selectdiv('timer')" /> Timer<br /><br />
<div id="stopwatchlog"></div>

<div id="savebutton" style="display:none"><br /><button type="button" onclick="savetolog()">Record in daily log</button></div><br />
<div id="stopwatchdiv" style="display:block;width:400px;height:455px;background-image:url('images/stopwatchbackground.png');position:absolute;">
<div style="position:relative;;top:150px;left:0px;" align="center">
<span style="background-color:black;color:#0cff00;padding:2px;font-size:36px;border:groove 5px #fefefe" id="stopwatchtime">00:00:00</span><br /><br />
<table><tr><td>
<div id="startstopwatch"><button type="button" onclick="startstopwatch()">Start Stopwatch</button></div>
<div id="stopstopwatch" style="display:none"><button type="button" onclick="stopstopwatch()">Stop Stopwatch</button></div></td>
<td><button type="button" onclick="clearstopwatch()">Reset Stopwatch</button></td></tr></table>
</div></div><br />

<div id="timerdiv" style="display:none;">
Set timer for <select id="minutes" name="minutes" onchange="settimer()"><option value="1">1</option>
	<? for($i=5;$i<=60;$i+=5){ echo '<option value="'.$i.'">'.$i.'</option>'; } ?></select> minutes<br /><br />
<span style="background-color:black;color:#0cff00;padding:2px;font-size:36px;border:groove 5px #fefefe" id="timertime">00:01:00</span><br /><br />
<div id="starttimer"><button type="button" onclick="starttimer()">Start Timer</button></div>
<div id="stoptimer" style="display:none;"><button type="button" onclick="stoptimer()">Stop Timer</button></div>
<div id="completed" style="display:none;">Completed!</div></div>
</div>
<div id="savebutton" style="display:none"><br /><button type="button" onclick="savetolog()">Record in daily log</button></div><br />
</td>
<td valign="top"><div id="log"><table border="1" cellpadding="2"><tr><td colspan="2"><b>Daily Log - <? echo date('n/j/Y') ?></b></td></tr><tr><td colspan="2">Start rolling!</td></tr></table><br /><br />
</div><br />
<table border="1" cellpadding="2"><tr><td>Saved Workouts</td></tr>
<? $result=mysql_query("SELECT * FROM bodychart");
while($row=mysql_fetch_array($result)){
	echo '<tr><td><a href="javascript:writelog2(\''.$row['areas'].'\',\''.$row['times'].'\',\'savedworkout\',\''.$row['date'].'\')">'.$row['date'].'</a></td></tr>';
}
?>
</table>
<div id="savedworkout"></div></td></tr></table>