<html><head><script>
var divs=['subjective','objective','assessment','plan'];
var active='';
function scrollintoview(page){
  document.getElementById(page+'hr').scrollIntoView();
 // var coding=''; if(page=='assessmenticd.php') coding='coding';
  for(var i=0;i<divs.length;i++){
	  document.getElementById(divs[i]+'td').style.backgroundImage="url('/nlimages/navbg.png')";
	  document.getElementById(divs[i]+'link').style.color="#606062";
	  document.getElementById(divs[i]+'link').style.fontWeight="normal";
  }
  document.getElementById(page+'td').style.backgroundImage="url('/nlimages/navbgactive.png')";
  document.getElementById(page+'link').style.color="white";
  document.getElementById(page+'link').style.fontWeight="bold";
  active=page;
}
</script>
<link href="{{ asset('assets/front/styles.css') }}" type="text/css" rel="stylesheet">
</head><body class="font" ')"="" style="margin:0;padding:0;">
<script>
function showvisitdates(){
	if(document.getElementById('visitdropdown').style.display=='none')
		document.getElementById('visitdropdown').style.display='block';
	else if(document.getElementById('visitdropdown').style.display=='block')
		document.getElementById('visitdropdown').style.display='none';
}
</script>
<form name="encform" action="{{route('insertcounter')}}" method="POST">
@csrf
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table id="mainmenutable" style="background-color:#5f5f61;color:white;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;"><tbody><tr><td width="130" valign="middle">
	<a href="{{route('demo')}}">
		<img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle"><a href="{{route('logout')}}">
			<img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="{{route('admin')}}">
	<img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td>
<td align="center">Welcome,<br>Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="">
<input type="hidden" name="gotodate">
<font size="+1"><strong>Patient selected:</strong> khatri, Punam    <script>if(window.innerWidth<1280) document.write('<br>');else document.write('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <strong>Visit: </strong> <select name="pick" onchange="javascript:pickencounter();">
			<option value="" selected="">Select</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{ asset('nlimages/calendar.png') }}" onclick="showvisitdates()" ;="">
		<div style="position:absolute;width:100%;top:25px;left:0px;background-color:#f1f1f1;display:none;color:black;border:2px solid #d9d9d9;z-index:2;text-align:center;" id="visitdropdown"></div>
	</font>
</td>
<td width="12%" align="right"><a href="{{route('demo')}}" style="color:white;font-size:18px;">Patient Portal</a></td><td style="border-left:none;" width="4%" align="right"><a href="manage.php?clear=true">
<img src="{{ asset('nlimages/home.png') }}" style="display:inline;"></a></td></tr>

<tr style="height:2px;" bgcolor="#ce0205"><td colspan="4" style="height:2px;padding:0px;" width="100%"></td></tr></tbody></table>
</div>
<table height="52"><tbody><tr><td>
	<img src="{{ asset('assets/front/images/spacer.png') }}" height="52"></td></tr></tbody></table>
<table width="100%" height="100%" cellspacing="0" cellpadding="0">
<tbody><tr><td width="238" valign="top" bgcolor="#f1f1f1">
<img src="{{ asset('assets/front/images/spacer.png') }}" width="238" height="1"><div id="sidebar" style="position:fixed;top:52px;left:0px;width:238px;height:100%;background-color:#f1f1f1;">
<script>
function changebg(id,onoff,coding){
	if(id!=active){
		if(onoff=='on') document.getElementById(id+'td').style.backgroundImage='url(/assets/nlimages/navbg'+coding+'on.png)';
		if(onoff=='off') document.getElementById(id+'td').style.backgroundImage='url(/nlimages/navbg'+coding+'.png)';
	}
}
</script>
<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr><td "="" align="center">
	<img src="{{ asset('nlimages/patientinformation.png') }}"></td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="ientinfo.phptd" onmouseover="changebg('ientinfo.php','on','');" onmouseout="changebg('ientinfo.php','off','')" align="center">
		<a href="patientinfo.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a>

	</td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="ilyhistory.phptd" onmouseover="changebg('ilyhistory.php','on','');" onmouseout="changebg('ilyhistory.php','off','')" align="center"><a href="familyhistory.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a>

	</td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="ialhistory.phptd" onmouseover="changebg('ialhistory.php','on','');" onmouseout="changebg('ialhistory.php','off','')" align="center"><a href="socialhistory.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Social History</div></a>

	</td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="existingconditions.phptd" onmouseover="changebg('existingconditions.php','on','');" onmouseout="changebg('existingconditions.php','off','')" align="center"><a href="preexistingconditions.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Pre-Existing Conditions</div></a>


	</td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="uranceinfo.phptd" onmouseover="changebg('uranceinfo.php','on','');" onmouseout="changebg('uranceinfo.php','off','')" align="center"><a href="insuranceinfo.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Insurance Info</div></a>

	</td></tr><tr><td "="" align="center">
		<img src="{{ asset('nlimages/visitinformation.png') }}"></td></tr><tr height="40"><td style="background-color: rgb(96, 96, 105); border-top: 2px solid black; border-left: 2px solid black; border-right: 2px solid black; background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="subjectivetd" onmouseover="changebg('subjective','on','');" onmouseout="changebg('subjective','off','')" align="center"><a href="soap.php?p=subjective" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Subjective</div></a>


	</td></tr><tr height="40"><td style="background-color: rgb(96, 96, 105); border-left: 2px solid black; border-right: 2px solid black; background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="objectivetd" onmouseover="changebg('objective','on','');" onmouseout="changebg('objective','off','')" align="center"><a href="soap.php?p=objective" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Objective</div></a>


	</td></tr><tr height="40"><td style="background-color: rgb(96, 96, 105); border-left: 2px solid black; border-right: 2px solid black; background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="assessmenttd" onmouseover="changebg('assessment','on','');" onmouseout="changebg('assessment','off','')" align="center"><a href="soap.php?p=assessment" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Assessment</div></a>


	</td></tr><tr height="40"><td style="background-color: rgb(96, 96, 105); border-left: 2px solid black; border-right: 2px solid black; background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="plantd" onmouseover="changebg('plan','on','');" onmouseout="changebg('plan','off','')" align="center"><a href="soap.php?p=plan" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Plan</div></a>


	</td></tr><tr height="40"><td style="border-top: 2px solid black; background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="gressnotes.phptd" onmouseover="changebg('gressnotes.php','on','');" onmouseout="changebg('gressnotes.php','off','')" align="center"><a href="progressnotes.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Progress Notes</div></a>


	</td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbgcoding.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="essmenticd.phptd" onmouseover="changebg('essmenticd.php','on','coding');" onmouseout="changebg('essmenticd.php','off','coding')" align="center"><a href="assessmenticd.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Daily Coding</div></a>


	</td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="orithm.phptd" onmouseover="changebg('orithm.php','on','');" onmouseout="changebg('orithm.php','off','')" align="center"><a href="algorithm.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Algorithm</div></a>


	</td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="gress.phptd" onmouseover="changebg('gress.php','on','');" onmouseout="changebg('gress.php','off','')" align="center"><a href="progress.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Overview</div></a>



	</td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="msrom.phptd" onmouseover="changebg('msrom.php','on','');" onmouseout="changebg('msrom.php','off','')" align="center"><a href="examsrom.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exams</div></a>


	</td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgexercises.png');background-repeat:no-repeat;background-position:center;" id="rcises.phptd" onmouseover="changebg('rcises.php','on','exercises');" onmouseout="changebg('rcises.php','off','exercises')" align="center"><a href="exercises.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exercises</div></a>


	</td></tr><tr height="40"><td style="background-image:url('nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="eduler.phptd" onmouseover="changebg('eduler.php','on','');" onmouseout="changebg('eduler.php','off','')" align="center"><a href="scheduler.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
</div>
</td>



<td id="viewport" width="100%" valign="top" align="left">
<script>
function pickencounter(){
	document.encform.submit();
}
function pickanencounter(thedate,theaction){
	document.encform.gotodate.value=thedate;
	if(theaction!=null) document.encform.page.value=theaction;
	document.encform.submit();
}
</script>

<div id="visitlist" style="position: fixed; width: 1268px; left: 238px; top: 52px; height: 47px; z-index: 1; overflow: auto hidden; display: inline-block; white-space: nowrap;">
<table style="width: 1268px;" id="visittable" cellspacing="0" cellpadding="0" border="0" bgcolor="#d9d9d9">
<tbody><tr height="30">
<td style="width:90px" valign="middle" align="left">&nbsp;<a href=""><img src="{{ asset('nlimages/plus.png') }}" style="display:inline"></a> <a href="editvisits.php"><img src="{{ asset('nlimages/edit.png') }}" style="display:inline"></a>
<a href="?print=true"><img src="{{ asset('nlimages/print.png') }}"></a></td>
<td>&nbsp;</td>
</tr></tbody></table></div>
<script>
var position=90;
var viewportwidth=document.getElementById('viewport').offsetWidth;
document.getElementById('visitlist').style.width=document.getElementById('viewport').offsetWidth;
if(parseInt(document.getElementById('visittable').style.width.replace('px',''))<parseInt(document.getElementById('viewport').offsetWidth))
	document.getElementById('visittable').style.width=document.getElementById('viewport').offsetWidth;
if(position+150>viewportwidth)
document.getElementById('visitlist').scrollLeft=position;
</script>
<table height="30"><tbody><tr><td><img src="{{ asset('assets/front/images/spacer.png') }}" height="30"></td></tr></tbody></table>
        <br>

<table width="100%" cellpadding="10 "><tbody><tr><td width="100%" valign="top">
<script>

if(window.innerWidth<1280){
	document.getElementById('visitlist').style.top='69px';
	document.getElementById('sidebar').style.top='72px';
	document.getElementById('mainmenutable').style.height='70px';
}

</script>
<hr>
<font size="+2">New visit</font>
<hr>
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
function changeforward(num){
	for(var i=num+1;document.getElementById('datemonth'+i);i++){
		document.getElementById('datemonth'+i).value=document.getElementById('datemonth'+num).value;
	}
	for(var i=num+1;document.getElementById('dateyear'+i);i++){
		document.getElementById('dateyear'+i).value=document.getElementById('dateyear'+num).value;
	}
}
function adddate(){
	var arr=new Array();
	var numdates=parseInt(document.getElementById('numdates').value);
	var datestr='<Tr><td width="75" style="font-size:24px"><b>#'+(numdates+1)+':</b></td><td style="font-size:24px"><select id="datemonth" name="datemonth" style="width:60px;height:40px;font-size:24px" onchange="changeforward('+numdates+')"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8" selected>8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select> <select id="dateday" name="dateday" style="width:60px;height:40px;font-size:24px"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19" selected>19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> <select id="dateyear" name="dateyear" style="width:120px;height:40px;font-size:24px" onchange="changeforward('+numdates+')"><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020" selected>2020</option></select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time : <input id="time" name="time" style="width:100px;height:40px;font-size:24px"></td></Tr></table>';
	var strtoadd=datestr.replace(/datemonth/g,'datemonth'+numdates);
	strtoadd=strtoadd.replace(/dateday/g,'dateday'+numdates);
	strtoadd=strtoadd.replace(/dateyear/g,'dateyear'+numdates);
	strtoadd=strtoadd.replace(/time/g,'time'+numdates);
	for(var i=0;i<numdates;i++){
		arr[i]=[document.getElementById('datemonth'+i).value,document.getElementById('dateday'+i).value,document.getElementById('dateyear'+i).value,document.getElementById('time'+i).value];
	}
	var datesdiv=document.getElementById('datesdiv');
	datesdiv.innerHTML=datesdiv.innerHTML.replace('</table>','')+strtoadd;
	for(var i=0;i<numdates;i++){
		document.getElementById('datemonth'+i).value=arr[i][0];
		document.getElementById('dateday'+i).value=arr[i][1];
		document.getElementById('dateyear'+i).value=arr[i][2];
		document.getElementById('time'+i).value=arr[i][3];
	}
	document.getElementById('datemonth'+numdates).value=document.getElementById('datemonth'+(numdates-1)).value;
	document.getElementById('numdates').value=numdates+1;
	document.getElementById('showalgorithm').style.display='none';
}
</script>
<form name="form" action="" method="">
<input type="hidden" id="numdates" name="numdates" value="1">

<b>Visit Basic Information</b><br><br>

<font style="font-size:20px">Date of Service : </font><br><br>
<div id="datesdiv"><table cellspacing="0" cellpadding="2"><tbody><tr><td style="font-size:24px" width="75"><b>#1:</b></td><td style="font-size:24px"><select name="datemonth0" id="datemonth0" style="width:60px;height:40px;font-size:24px" onchange="changeforward(0)"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8" selected="">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
<select name="dateday0" id="dateday0" style="width:60px;height:40px;font-size:24px"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19" selected="">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
<select name="dateyear0" id="dateyear0" style="width:120px;height:40px;font-size:24px" onchange="changeforward(0)"><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020" selected="">2020</option></select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time : <input id="time0" name="time0" style="width:100px;height:40px;font-size:24px;"></td></tr></tbody></table></div>
<br><a href="javascript:adddate();" style="font-size:20px">Add Another Visit</a>
<div id="showalgorithm">
<table width="500">
<tbody><tr><td colspan="4"><br><br></td></tr>
<tr><td colspan="4"><br><br>
No previous visits to use.</td><td></td></tr></tbody></table>
<div id="notnewvisit"><table><tbody><tr><td colspan="4">
<script>
function newornot(){
	if(document.getElementById('encounter').value=='newvisit'){
		document.getElementById('notnewvisit').style.display='none';
	}
	else
		document.getElementById('notnewvisit').style.display='block';
}
function setslider(){
	var populateas=document.getElementById('populateas').value;
	var value;
	if(populateas=='remained unchanged') value=0; if(populateas=='slightly improved') value=20; if(populateas=='improved') value=40;
	if(populateas=='much improved') value=60;	if(populateas=='slightly worse') value=-20;	if(populateas=='worse') value=-40;
		if(populateas=='much worse') value=-60; if(populateas=='resolved') value=100;
		document.getElementById('range').value=value;
	popdiv('select');
}
</script>
</td><td></td></tr>
<tr><td colspan="4">
<script>
function popdiv(from){
	var value;
	if(from=='slider'){ value=document.getElementById('range').value; document.getElementById('percimp').value=value; }
	if(from=='input'){ value=document.getElementById('percimp').value; document.getElementById('range').value=value; }
	var populateas;
	if(from=='select') document.getElementById('percimp').value=document.getElementById('range').value;
	else{
		if(value==0) populateas='remained unchanged'; if(value<=20&&value>0) populateas='slightly improved'; if(value<=40&&value>20) populateas='improved';
		if(value>=40)populateas='much improved' ;	if(value>=-20&&value<0) populateas='slightly worse';	if(value>=-40&&value<-5) populateas='worse';
		if(value<-40) populateas='much worse'; if(value==100) populateas='resolved';
		document.getElementById('populateas').value=populateas;
	}
}
</script>
</td></tr>

</tbody></table></div></div>
<br><br>
<input type="submit" name="submit" value="Save">
</form>
    </td></tr></tbody></table></td></tr></tbody></table>
</form></body></html>
