<html>
<head>
  <title>Up2Speed Training Center</title>
  <link href="{{ asset('assets/front/style.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/front/jqueryprogressbar/jquery-ui.css') }}">
  <script src="{{ asset('assets/front/jqueryprogressbar/jquery-1.10.2.js') }}"></script>
  <script src="{{ asset('assets/front/jqueryprogressbar/jquery-ui.js') }}"></script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
<!--
function setheight(){
  var header=136+50;
  var screenheight=window.innerHeight;
  //document.write(divheight+'true');
  var difference=screenheight-header;
  //  document.getElementBy
  //else{
  var tableheight=document.getElementById('backgroundtable').clientHeight;
  var divheight=document.getElementById('backgrounddiv').clientHeight;
  //document.write(document.getElementById('backgrounddiv').style.height+'>'+difference);
  if(document.getElementById('backgrounddiv').clientHeight<difference){
    document.getElementById('backgroundtable').style.backgroundSize='1092 px '+difference+' px';
    document.getElementById('backgrounddiv').style.height=difference;
  }
  else{
    document.getElementById('backgroundtable').style.backgroundSize='1092 px '+tableheight+' px';
    document.getElementById('backgrounddiv').style.height=tableheight;
  }
  //document.getElementById('containertable').style.height=otherheight+divheight;
  //document.getElementById('supercontainertable').style.height=otherheight+divheight;
}
//-->
</script>
</head>
<body style="margin-top:0px;margin-bottom:0px;margin-right:0px;margin-left:0px; onLoad=" javascript:setheight();"="">
<table style="width:100%;height:100%" id="supercontainertable" cellspacing="0" cellpadding="0" bgcolor="#d7d7d8">
 <tbody><tr>
  <td align="center">
  <table style="width:1152px;height:100%" id="containertable" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
     <tbody><tr>
      <td style="width:30px" class="leftborder"></td>
      <td style="width:1092px;height:100%" valign="top">
       <table style="width:1092px;height:136px;" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <tbody><tr style="height:136px;">
         <td width="546" align="center">
      <a href="{{ URL::route('index') }}"><img src="{{ asset('assets/front/images/headers/up2speed.png') }}" style="width:373px;display:inline" width="373"></a>
     </td>
     <td style="width:546px;background-color:#d7d7d8;">
          <center><a href="{{ URL::route('bodychart') }}"><img src="{{ asset('assets/front/images/headers/muscleflossingbrsmall.png') }}" width="400"></a></center>
         </td>
        </tr>
       </tbody></table>
     <script>
    function swap(id,onoff){
      if(onoff=='on'){
        document.getElementById(id).src="assets/front/images/navbar/"+id+"active.png";
      }
      else
        document.getElementById(id).src="assets/front/images/navbar/"+id+".png";
    }
    </script> 
     <table style="width:1092px;height:50px" cellspacing="0" cellpadding="0">
          <tbody><tr style="height:50px"><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('index') }}">
            <img src="{{ asset('assets/front/images/navbar/index.png') }}" id="index" style="height:50px;" onmouseover="javascript:swap('index','on')" onmouseout="javascript:swap('index','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('sportsperformance') }}">
            <img src="{{ asset('assets/front/images/navbar/sportsperformance.png') }}" id="sportsperformance" style="height:50px;" onmouseover="javascript:swap('sportsperformance','on')" onmouseout="javascript:swap('sportsperformance','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('sportswellness') }}">
            <img src="{{ asset('assets/front/images/navbar/sportswellness.png') }}" id="sportswellness" style="height:50px;" onmouseover="javascript:swap('sportswellness','on')" onmouseout="javascript:swap('sportswellness','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('fitness') }}">
            <img src="{{ asset('assets/front/images/navbar/fitness.png') }}" id="fitness" style="height:50px;" onmouseover="javascript:swap('fitness','on')" onmouseout="javascript:swap('fitness','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('aboutus') }}">
            <img src="{{ asset('assets/front/images/navbar/aboutus.png') }}" id="aboutus" style="height:50px;" onmouseover="javascript:swap('aboutus','on')" onmouseout="javascript:swap('aboutus','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('bodychart') }}">
            <img src="{{ asset('assets/front/images/navbar/bodychart.png') }}" id="bodychart" style="height:50px;" onmouseover="javascript:swap('bodychart','on')" onmouseout="javascript:swap('bodychart','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('loginuser') }}">
            <img src="{{ asset('assets/front/images/navbar/login.png') }}" id="login" style="height:50px;" onmouseover="javascript:swap('login','on')" onmouseout="javascript:swap('login','off')" border="0"></a></td></tr></tbody></table>       <table style="width:1092px;background-image:url('assets/front/images/loginslide/1.jpg');
        background-size:100% 100%;" id="backgroundtable">
        <tbody><tr>
         <td style="width:1092px;" valign="top">
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
  //added 4-9
  document.getElementById('vasbefore').style.display='block';
  
  currentarea=str;
  clearstopwatch();
  stopstopwatch();
  document.getElementById('stopwatchlog').innerText='';
  
  document.getElementById('vasafter').style.display='none';
  document.getElementById('savebutton').style.display='none';
  document.getElementById('saved').style.display='none';
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
    return /*hours+':'+*/minutes+':'+seconds;
}
function clearstopwatch(){
  time=0;
  document.getElementById('stopwatchtime').innerText=gettime(time);
}
function startstopwatch(){
  if(currentarea=='') document.getElementById('timerareadiv').innerHTML='<font color="red"><b>Please select an area!</b></font>';
  else{
    document.getElementById('startstopwatch').style.display="none";
    document.getElementById('stopstopwatch').style.display="block";
    i=setInterval(function() {
      time++;
      document.getElementById('stopwatchtime').innerText=gettime(time);
      //if(time==5)
      //  clearInterval(i);
    },1000);
  }
}
function stopstopwatch(){
  var localcurrentarea=document.getElementById('currentarea').value;
  document.getElementById('startstopwatch').style.display="block";
  document.getElementById('stopstopwatch').style.display="none";
  var logstring='<center>You have rolled out your:<br><b>';
  logstring+=localcurrentarea;
  logstring+='</b><br>For: <b>';
  if(gettime(time,'hours')!=0) logstring+=gettime(time,'hours')+' hours, ';
  if(gettime(time,'minutes')!=0) logstring+=gettime(time,'minutes')+' minutes, ';
  logstring+=gettime(time,'seconds')+' seconds.</b></center><br>'
  <!--
  //savetolog(\''+localcurrentarea+'\',\''+gettime(time,'minutes')+':'+gettime(time,'seconds')+'\');
  
  document.getElementById('stopwatchlog').innerHTML=logstring;
  document.getElementById('vasafter').style.display='block';
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
  if(document.getElementById('vasbeforevals').value!='')
    document.getElementById('vasbeforevals').value=document.getElementById('vasbeforevals').value+'-SE-';
  document.getElementById('vasbeforevals').value=document.getElementById('vasbeforevals').value+document.getElementById('vasscalebefore').value;
  if(document.getElementById('vasaftervals').value!='')
    document.getElementById('vasaftervals').value=document.getElementById('vasaftervals').value+'-SE-';
  document.getElementById('vasaftervals').value=document.getElementById('vasaftervals').value+document.getElementById('vasscaleafter').value;
  document.getElementById('savebutton').style.display='none';
  document.getElementById('saved').style.display='block';
  document.getElementById('vasbefore').style.display='none';
  writelog();
}
function writelog2(areas,times,div,date){
  var areasarr=areas.split('-SE-');
  var timesarr=times.split('-SE-');
  var forlog='<table border="1" cellpadding="2" width="286"><tr><td colspan="2"><b>';
  if(date=='') forlog+='Daily Log - 8/8/2020';
  else forlog+='Saved Log - '+date;
  forlog+='</b></td></tr><tr><td width>Area</td><td>Time</td></tr>';
  for(var i=0;i<areasarr.length;i++){
    forlog+='<tr><td>'+areasarr[i]+'</td><td>'+timesarr[i]+'</td></tr>';
    //document.getElementById('currentarea').value+' '+gettime(time)+'<br>';
  }
  if(date=='')
  forlog+='<tr><td colspan="2" align="center"><input type="submit" value="Save workout!"></td></tr>';
  forlog+='</table>';
  document.getElementById(div).innerHTML=forlog;
}
var isanarea=false;
function writelog(savebutton){
  var areasarr=document.getElementById('areas').value.split('-SE-');
  var timesarr=document.getElementById('times').value.split('-SE-');
  var vasbefore=document.getElementById('vasbeforevals').value.split('-SE-');
  var vasafter=document.getElementById('vasaftervals').value.split('-SE-');
  var forlog='<table border="1" cellpadding="2" width="286"><tr><td colspan="4" valign="top" align="center"><b>Daily Log - 8/8/2020</b></td></tr><tr><td width="143" align="center"><b>Area</b></td><td width="143" align="center"><b>Time</b></td><td align="center"><b>VAS</b><br>Before</td><td align="center"><b>VAS</b><br>After</td></tr>';
  for(var i=0;i<areasarr.length||i<5;i++){
    if(areasarr[i]!=''&&areasarr[i]!=null){
      //if(!isanarea) document.getElementById('thesavebutton').style.border='2px solid green';
      isanarea=true;
      forlog+='<tr><td align="center">'+areasarr[i]+'</td><td align="center">'+timesarr[i]+'</td><td align="center">'+vasbefore[i]+'</td><td align="center">'+vasafter[i]+'</td></tr>';
    }
    else
      forlog+='<tr><td align="center">----------</td><td align="center">----------</td><td align="center">------</td><td align="center">------</td></tr>';
    //document.getElementById('currentarea').value+' '+gettime(time)+'<br>';
  }
  if(areasarr.length>=5)
      forlog+='<tr><td align="center">----------</td><td align="center">----------</td><td align="center">------</td><td align="center">------</td></tr>';
  if(!savebutton){ 
    forlog+='<tr><td colspan="4" align="center"><input type="submit" value="Save workout!" id="thesavebutton"';
    if(isanarea) forlog+=' style="border:2px solid green"'; 
    else forlog+=' disabled';
    forlog+='></td></tr>';
  }
  forlog+='</table>';
  document.getElementById('log').innerHTML=forlog;
}
</script><form name="form" action="registerrollout.php" method="post">
<input type="hidden" name="currentarea" id="currentarea">
<input type="hidden" name="areas" id="areas">
<input type="hidden" name="times" id="times">
<input type="hidden" name="vasbeforevals" id="vasbeforevals">
<input type="hidden" name="vasaftervals" id="vasaftervals">
<script type="text/javascript" src="{{ asset('assets/front/mapper.js') }}"></script>
<br>
<center>
<div style="background-color:rgba(255, 255, 255, 0.75);position:relative;top:0px;left:0px;width:1072px;height:100%;z-index:0">
<div style="position:relative;top:0px;left:0px;width:1072px;height:100%;opacity:1;z-index:1">
<table width="1085" cellspacing="0" cellpadding="0">
    <tbody><tr>
    <td width="500" valign="top" align="center">
      <div id="timerareadiv">Please select an area to begin timing your roll out!</div><br>
      <div style="position: relative; height: 522px; width: 499px; padding: 0px; user-select: none;">
<img src="assets/front/images/bodychartwithareas.png" id="gmipam_0_image" style="position: absolute; height: 522px; width: 499px; left: 0px; top: 0px;"><canvas id="gmipam_0_canvas" style="height: 522px; width: 499px; position: absolute; left: 0px; top: 0px; opacity: 1;" height="522" width="499"></canvas><div id="footballfieldMap_blind" class="blind_area" style="position: absolute; height: 522px; width: 499px; left: 0px; top: 0px;"> </div><img src="{{ asset('assets/front/images/bodychartwithareas.png') }}" class="" name="footballfield" usemap="#footballfieldMap" id="gmipam_0" style="position: absolute; height: 522px; width: 499px; left: 0px; top: 0px; user-select: none; opacity: 0;" width="499" height="522" border="1">
<map name="footballfieldMap"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Outer Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Outer Thigh')" shape="poly" class="noborder icolor2e3192" coords="145,319,148,282,155,268,158,286,155,317,152,335,146,352,145,342" id="footballfieldMap_0"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Outer Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Outer Thigh')" shape="poly" class="noborder icolor2e3192" coords="63,310,60,285,64,269,71,287,75,321,75,338,72,350,67,335" id="footballfieldMap_1"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="75,306,72,263,78,244,84,253,88,273,87,306,79,333" id="footballfieldMap_2"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Bicep')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Bicep')" shape="poly" class="noborder icolor2e3192" coords="48,170,40,159,41,145,49,137,60,139,65,157,57,171" id="footballfieldMap_3"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Bicep')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Bicep')" shape="poly" class="noborder icolor2e3192" coords="170,173,161,163,159,146,167,138,178,143,183,153,178,169" id="footballfieldMap_4"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Elbow')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Elbow')" shape="poly" class="noborder icolor2e3192" coords="48,220,38,213,37,191,44,172,58,174,64,193,57,215" id="footballfieldMap_5"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Shoulder')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Shoulder')" shape="poly" class="noborder icolor2e3192" coords="167,138,156,128,155,103,163,93,175,101,180,120,175,134" id="footballfieldMap_6"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Thigh')" shape="poly" class="noborder icolor2e3192" coords="132,306,130,263,136,244,142,253,146,273,145,306,137,333" id="footballfieldMap_7"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Shoulder')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Shoulder')" shape="poly" class="noborder icolor2e3192" coords="49,130,45,119,49,101,59,91,68,102,67,126,57,135" id="footballfieldMap_8"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Elbow')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Elbow')" shape="poly" class="noborder icolor2e3192" coords="169,221,160,207,162,184,170,176,181,181,188,200,179,221" id="footballfieldMap_9"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Lower Abdomen')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Lower Abdomen')" shape="poly" class="noborder icolor2e3192" coords="105,236,91,228,98,223,110,220,121,223,128,228,119,234" id="footballfieldMap_10"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Abdomen')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Abdomen')" shape="poly" class="noborder icolor2e3192" coords="85,220,85,200,102,180,111,182,111,201,103,215,91,226" id="footballfieldMap_11"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Abdomen')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Abdomen')" shape="poly" class="noborder icolor2e3192" coords="122,222,113,205,111,190,116,178,128,190,137,207,134,227" id="footballfieldMap_12"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="252,219,246,208,247,187,252,181,258,188,258,202,256,212" id="footballfieldMap_13"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="237,216,233,210,231,191,237,181,242,187,244,201,243,209" id="footballfieldMap_14"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Outer Calf')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Outer Calf')" shape="poly" class="noborder icolor2e3192" coords="327,490,326,450,329,404,338,373,342,392,340,424,336,458" id="footballfieldMap_15"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Outer Calf')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Outer Calf')" shape="poly" class="noborder icolor2e3192" coords="294,495,287,452,289,415,293,375,298,396,301,419,300,461" id="footballfieldMap_16"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Inner Calf')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Inner Calf')" shape="poly" class="noborder icolor2e3192" coords="319,493,313,453,313,403,319,375,323,393,325,414,325,451" id="footballfieldMap_17"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Outer Calf')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Outer Calf')" shape="poly" class="noborder icolor2e3192" coords="282,494,271,437,269,401,273,374,278,392,284,434,284,467" id="footballfieldMap_18"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="376,264,368,255,363,228,370,215,380,224,382,243,381,257" id="footballfieldMap_19"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="369,205,367,195,367,188,373,178,380,185,379,205,373,211" id="footballfieldMap_20"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="358,215,354,205,352,188,358,178,364,187,365,198,364,210" id="footballfieldMap_21"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('IT Band 3')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('IT Band 3')" shape="poly" class="noborder icolor2e3192" coords="443,376,439,363,443,343,452,335,462,347,460,366,452,376" id="footballfieldMap_22"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('IT Band 2')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('IT Band 2')" shape="poly" class="noborder icolor2e3192" coords="450,333,445,313,452,301,462,297,469,308,467,323,460,334" id="footballfieldMap_23"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('IT Band 1')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('IT Band 1')" shape="poly" class="noborder icolor2e3192" coords="453,290,451,274,458,260,470,260,474,274,472,288,462,297" id="footballfieldMap_24"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Hip')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Hip')" shape="poly" class="noborder icolor2e3192" coords="453,249,454,231,461,220,470,221,476,234,475,250,466,258" id="footballfieldMap_25"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Glut Side')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Glut Side')" shape="poly" class="noborder icolor2e3192" coords="427,270,417,258,421,237,430,227,443,225,451,238,445,258" id="footballfieldMap_26"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Shoulder Side Front')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Shoulder Side Front')" shape="poly" class="noborder icolor2e3192" coords="450,140,449,125,448,111,455,101,462,113,460,136,456,143" id="footballfieldMap_27"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Shoulder Side Middle')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Shoulder Side Middle')" shape="poly" class="noborder icolor2e3192" coords="433,146,422,133,424,110,432,99,441,105,448,121,441,143" id="footballfieldMap_28"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Shoulder Side Back')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Shoulder Side Back')" shape="poly" class="noborder icolor2e3192" coords="409,135,409,130,408,119,409,110,418,117,422,134,419,144" id="footballfieldMap_29"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="357,120,348,108,350,99,361,98,368,106,370,115,370,122" id="footballfieldMap_30"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="320,98,308,85,305,72,316,73,327,82,333,91,334,101" id="footballfieldMap_31"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="270,94,276,84,289,73,299,75,297,83,286,98,272,104" id="footballfieldMap_32"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="238,116,241,107,248,99,261,98,262,106,257,114,245,120" id="footballfieldMap_33"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="264,135,260,128,259,113,267,102,277,110,277,129,270,137" id="footballfieldMap_34"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="285,134,280,125,283,108,290,98,299,107,300,129,290,138" id="footballfieldMap_35"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="311,130,308,120,310,107,317,97,326,108,325,127,317,140" id="footballfieldMap_36"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="334,132,330,119,331,105,340,99,348,105,349,126,343,135" id="footballfieldMap_37"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Calf Side')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Calf Side')" shape="poly" class="noborder icolor2e3192" coords="427,451,432,419,442,404,445,416,444,450,436,487,429,492,425,478" id="footballfieldMap_38"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Inner Hamstring')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Inner Hamstring')" shape="poly" class="noborder icolor2e3192" coords="309,327,312,292,319,278,327,292,328,344,323,370,317,372,311,352" id="footballfieldMap_39"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Inner Hamstring')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Inner Hamstring')" shape="poly" class="noborder icolor2e3192" coords="283,328,286,293,293,279,301,293,302,345,297,371,291,373,285,353" id="footballfieldMap_40"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Outer Hamstring')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Outer Hamstring')" shape="poly" class="noborder icolor2e3192" coords="330,325,333,292,340,278,352,289,351,324,343,361,335,369,331,350" id="footballfieldMap_41"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Outer Hamstring')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Outer Hamstring')" shape="poly" class="noborder icolor2e3192" coords="264,330,267,293,274,279,281,297,282,330,281,355,275,369,269,363" id="footballfieldMap_42"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Glut')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Glut')" shape="poly" class="noborder icolor2e3192" coords="269,261,270,241,280,231,292,236,300,257,297,273,287,278,276,273" id="footballfieldMap_43"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="240,264,232,258,233,231,240,217,245,214,252,229,249,251" id="footballfieldMap_44"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="239,176,236,159,239,131,248,121,257,130,259,154,250,179" id="footballfieldMap_45"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="356,174,350,154,352,133,359,123,368,134,374,161,368,179" id="footballfieldMap_46"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="282,165,283,149,291,142,297,148,300,164,295,183,286,182" id="footballfieldMap_47"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="309,165,310,149,318,142,324,148,327,164,322,183,313,182" id="footballfieldMap_48"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="282,212,283,196,291,189,297,195,300,211,295,230,286,229" id="footballfieldMap_49"><area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="310,210,312,195,319,187,326,194,328,209,323,230,315,229" id="footballfieldMap_50">
  <area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Glut')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Glut')" shape="poly" class="noborder icolor2e3192" coords="312,259,321,235,338,231,346,243,342,268,327,278,318,275" id="footballfieldMap_51">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Knee')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Knee')" shape="circle" class="noborder icolor2e3192" coords="133,375,16" id="footballfieldMap_52">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Inner Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Inner Thigh')" shape="poly" class="noborder icolor2e3192" coords="114,312,114,261,129,262,129,313" id="footballfieldMap_53">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Inner Thigh')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Inner Thigh')" shape="poly" class="noborder icolor2e3192" coords="89,313,89,260,103,261,104,313" id="footballfieldMap_54">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Ankle')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Ankle')" shape="circle" class="noborder icolor2e3192" coords="128,487,13" id="footballfieldMap_55">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Ankle')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Ankle')" shape="circle" class="noborder icolor2e3192" coords="99,487,13" id="footballfieldMap_56">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Knee')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Knee')" shape="circle" class="noborder icolor2e3192" coords="91,376,16" id="footballfieldMap_57">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Wrist')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Wrist')" shape="circle" class="noborder icolor2e3192" coords="180,254,14" id="footballfieldMap_58">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Wrist')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Wrist')" shape="circle" class="noborder icolor2e3192" coords="42,256,14" id="footballfieldMap_59">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Right Pectoral')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Right Pectoral')" shape="circle" class="noborder icolor2e3192" coords="140,117,17" id="footballfieldMap_60">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Left Pectoral')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Left Pectoral')" shape="circle" class="noborder icolor2e3192" coords="85,117,17" id="footballfieldMap_61">
<area onmouseover="setAreaOver(this,'gmipam_0_canvas','0,0,255','0,0,0','0.33',0,0,0);showarea('Temple')" onmouseout="setAreaOut(this,'gmipam_0_canvas',0,0);cleararea()" onclick="showtimer('Temple')" shape="circle" class="noborder icolor2e3192" coords="536,51,16" id="footballfieldMap_62">
</map> 
</div></td>
    <td width="285" valign="top" align="center">
    <table>
        <tbody><tr><td align="center">
        <div style="height:50px;">
        <div name="vasbefore" id="vasbefore" style="display:none;">VAS Scale (1-10)<br>
        Please rate pain before workout: <select name="vasscalebefore" id="vasscalebefore">
    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>        </select><br><br></div>
        </div>
            <input type="radio" name="type" value="stopwatch" onclick="selectdiv('stopwatch')" checked=""> Stopwatch
            <input type="radio" name="type" value="timer" onclick="selectdiv('timer')"> Timer<br><br>
            <div id="stopwatchdiv" style="display:block;width:250px;height:284px;background-image:url('assets/front/images/stopwatchbackground.png');position:relative;" align="center">
            <div style="position:absolute;;top:100px;left:0px;width:100%;align:center;">
            <span style="background-color:black;color:#0cff00;padding:2px;font-size:32px;border:groove 5px #fefefe" id="stopwatchtime">
            00:00</span><br><br><br>
            <table>
                <tbody><tr><td align="center">
                <div id="startstopwatch"><button type="button" onclick="startstopwatch()">Start Stopwatch</button></div>
                <div id="stopstopwatch" style="display:none"><button type="button" onclick="stopstopwatch()">Stop Stopwatch</button></div>
                <button type="button" onclick="clearstopwatch()">Reset</button>
                </td></tr>
            </tbody></table>
         </div></div>
         <div id="timer">
            <div id="timerdiv" style="display:none;">
            Set timer for <select id="minutes" name="minutes" onchange="settimer()"><option value="1">1</option>
                <option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="30">30</option><option value="35">35</option><option value="40">40</option><option value="45">45</option><option value="50">50</option><option value="55">55</option><option value="60">60</option></select> minutes<br><br>
            <span style="background-color:black;color:#0cff00;padding:2px;font-size:36px;border:groove 5px #fefefe" id="timertime">00:01:00</span><br><br>
            <div id="starttimer"><button type="button" onclick="starttimer()">Start Timer</button></div>
            <div id="stoptimer" style="display:none;"><button type="button" onclick="stoptimer()">Stop Timer</button></div>
            <div id="completed" style="display:none;">Completed!</div></div>
            </div>
        </td></tr></tbody></table>
        <div id="area" style="font-size:20px;font-weight:bold;height:100px"><h2></h2></div>
        
            <div id="savedworkout"></div>
   </td> 
   <td width="300" valign="top">
            <div id="log"><table width="286" cellpadding="2" border="1"><tbody><tr><td colspan="4" valign="top" align="center"><b>Daily Log - 8/8/2020</b></td></tr><tr><td width="143" align="center"><b>Area</b></td><td width="143" align="center"><b>Time</b></td><td align="center"><b>VAS</b><br>Before</td><td align="center"><b>VAS</b><br>After</td></tr><tr><td align="center">----------</td><td align="center">----------</td><td align="center">------</td><td align="center">------</td></tr><tr><td align="center">----------</td><td align="center">----------</td><td align="center">------</td><td align="center">------</td></tr><tr><td align="center">----------</td><td align="center">----------</td><td align="center">------</td><td align="center">------</td></tr><tr><td align="center">----------</td><td align="center">----------</td><td align="center">------</td><td align="center">------</td></tr><tr><td align="center">----------</td><td align="center">----------</td><td align="center">------</td><td align="center">------</td></tr><tr><td colspan="4" align="center"><input type="submit" value="Save workout!" id="thesavebutton" disabled=""></td></tr></tbody></table></div><br>
            <div style="height:125px;">
            <center><div id="stopwatchlog"></div>
            <div id="vasafter" style="display:none">VAS Scale - after: 
            <select name="vasscaleafter" id="vasscaleafter">
    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>        </select><br><br></div>
            <div id="savebutton" style="display:none"><button type="button" onclick="savetolog()" style="border:2px solid red">Record in daily log</button></div>
            <div id="saved" style="display:none;"><span style="color:green;">Added!</span></div>
            </center></div><br>
            <br>
            <center><a href="rolloutmanage.php">Click here</a> to manage your saved workouts and view notifications</center><br><br>
            <table width="286" cellpadding="2" border="1"><tbody><tr><td>Saved Workouts</td></tr>
            <tr><td align="center"><a href="{{ URL::route('login') }}?redirect=bodychart">Login to your account</a><br>to see saved workouts!</td></tr>            </tbody></table><br>
        </td>
  </tr></tbody></table>

            <script> writelog(); </script>
            </div></div></center>
          
          
     </form></td>
        </tr>
       </tbody></table>
      </td>
      <td style="width:30px;" class="rightborder"></td>
  </tr>
   </tbody></table>
  </td>
 </tr>
</tbody></table>

</body></html>