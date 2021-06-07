<html><head><script>
var divs=['subjective','objective','assessment','plan'];
var active='';
function scrollintoview(page){
  document.getElementById(page+'hr').scrollIntoView();
 // var coding=''; if(page=='assessmenticd.php') coding='coding';
  for(var i=0;i<divs.length;i++){
	  document.getElementById(divs[i]+'td').style.backgroundImage="url('/assets/demonlimages/navbg.png')";
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
<form name="encform" enctype="multipart/form-data" action="{" method="POST">
	 @csrf
     @method('PUT')
  <input type="hidden" class="form-control" name="id" value="">
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table id="mainmenutable" style="background-color:#5f5f61;color:white;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;"><tbody><tr><td width="130" valign="middle"><a href="{{route('demo')}}"><img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle"><a href="{{route('logout')}}"><img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="{{ route('admin')}}"><img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td>
<td align="center">Welcome,<br>Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="insuranceinfo.php">
<input type="hidden" name="gotodate">
<font size="+1"><strong>Patient selected:</strong> ,  <script>if(window.innerWidth<1280) document.write('<br>');else document.write('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <strong>Visit: </strong> <select name="pick" onchange="javascript:pickencounter();">
			<option value="" selected="">Select</option><option value=""></option></select>&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="{{ asset('nlimages/calendar.png') }}" onclick="showvisitdates()" ;="">
		<div style="position:absolute;width:100%;top:25px;left:0px;background-color:#f1f1f1;display:none;color:black;border:2px solid #d9d9d9;z-index:2;text-align:center;" id="visitdropdown"><a href="javascript:pickanencounter('');" style="text-decoration:none;color:black">
		 <b>#1:</b> <img src="{{ asset('nlimages/radioinactive.png') }}" height="14"> 03/27/2020</a> <a href="javascript:pickanencounter('','editvisits.php')">
		 	<img src="{{ asset('nlimages/edit.png') }}" height="14"></a><br></div></font></td><td width="12%" align="right"><a href="{{route('patientportal')}}" style="color:white;font-size:18px;">Patient Portal</a></td><td style="border-left:none;" width="4%" align="right"><a href="{{route('demo')}}?clear=true"><img src="{{ asset('assets//demo/nlimages/home.png') }}" style="display:inline;"></a></td></tr>

<tr style="height:2px;" bgcolor="#ce0205"><td colspan="4" style="height:2px;padding:0px;" width="100%"></td></tr></tbody></table>
</div>
<table height="52"><tbody><tr><td><img src="{{ asset('assets/front/images/spacer.png') }}" height="52"></td></tr></tbody></table>
<table width="100%" height="100%" cellspacing="0" cellpadding="0">
<tbody><tr><td width="238" valign="top" bgcolor="#f1f1f1">
<img src="{{ asset('assets/front/images/spacer.png') }}" width="238" height="1"><div id="sidebar" style="position:fixed;top:52px;left:0px;width:238px;height:100%;background-color:#f1f1f1;">
<script>
function changebg(id,onoff,coding){
	if(id!=active){
		if(onoff=='on') document.getElementById(id+'td').style.backgroundImage='url(/nlimages/navbg'+coding+'on.png)';
		if(onoff=='off') document.getElementById(id+'td').style.backgroundImage='url(/nlimages/navbg'+coding+'.png)';
	}
}
</script>
<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr><td "="" align="center"><img src="{{ asset('nlimages/patientinformation.png') }}"></td></tr><tr height="40"><td style="background-image: url(&quot;/asssets/demo/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ientinfo.phptd" onmouseover="changebg('ientinfo.php','on','');" onmouseout="changebg('ientinfo.php','off','')" align="center"><a href="patientinfo.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ilyhistory.phptd" onmouseover="changebg('ilyhistory.php','on','');" onmouseout="changebg('ilyhistory.php','off','')" align="center"><a href="familyhistory.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ialhistory.phptd" onmouseover="changebg('ialhistory.php','on','');" onmouseout="changebg('ialhistory.php','off','')" align="center"><a href="socialhistory.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Social History</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="existingconditions.phptd" onmouseover="changebg('existingconditions.php','on','');" onmouseout="changebg('existingconditions.php','off','')" align="center"><a href="preexistingconditions.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Pre-Existing Conditions</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgactive.png');background-repeat:no-repeat;background-position:center;" id="uranceinfo.phptd" align="center"><b><a href="insuranceinfo.php" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Insurance Info</div></a></b></td></tr><tr><td "="" align="center"><img src="{{ asset('nlimages/visitinformation.png') }}"></td></tr><tr height="40"><td style="background-color:#606069;border-top:2px solid black;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="subjectivetd" onmouseover="changebg('subjective','on','');" onmouseout="changebg('subjective','off','')" align="center"><a href="soap.php?p=subjective" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Subjective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="objectivetd" onmouseover="changebg('objective','on','');" onmouseout="changebg('objective','off','')" align="center"><a href="soap.php?p=objective" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Objective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="assessmenttd" onmouseover="changebg('assessment','on','');" onmouseout="changebg('assessment','off','')" align="center"><a href="soap.php?p=assessment" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Assessment</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="plantd" onmouseover="changebg('plan','on','');" onmouseout="changebg('plan','off','')" align="center"><a href="soap.php?p=plan" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Plan</div></a></td></tr><tr height="40"><td style="border-top:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gressnotes.phptd" onmouseover="changebg('gressnotes.php','on','');" onmouseout="changebg('gressnotes.php','off','')" align="center"><a href="progressnotes.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Progress Notes</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgcoding.png');background-repeat:no-repeat;background-position:center;" id="essmenticd.phptd" onmouseover="changebg('essmenticd.php','on','coding');" onmouseout="changebg('essmenticd.php','off','coding')" align="center"><a href="assessmenticd.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Daily Coding</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="orithm.phptd" onmouseover="changebg('orithm.php','on','');" onmouseout="changebg('orithm.php','off','')" align="center"><a href="algorithm.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Algorithm</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gress.phptd" onmouseover="changebg('gress.php','on','');" onmouseout="changebg('gress.php','off','')" align="center"><a href="progress.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Overview</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="msrom.phptd" onmouseover="changebg('msrom.php','on','');" onmouseout="changebg('msrom.php','off','')" align="center"><a href="examsrom.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exams</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgexercises.png');background-repeat:no-repeat;background-position:center;" id="rcises.phptd" onmouseover="changebg('rcises.php','on','exercises');" onmouseout="changebg('rcises.php','off','exercises')" align="center"><a href="exercises.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exercises</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="eduler.phptd" onmouseover="changebg('eduler.php','on','');" onmouseout="changebg('eduler.php','off','')" align="center"><a href="scheduler.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
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

<div id="visitlist" style="position: fixed; width: 1448px; left: 238px; top: 52px; height: 47px; z-index: 1; overflow: auto hidden; display: inline-block; white-space: nowrap;">
<table style="width: 1448px;" id="visittable" cellspacing="0" cellpadding="0" border="0" bgcolor="#d9d9d9">
<tbody><tr height="30">
<td style="width:90px" valign="middle" align="left">&nbsp;<a href="newencounter.php"><img src="{{ asset('nlimages/plus.png') }}" style="display:inline"></a> <a href="editvisits.php"><img src="{{ asset('nlimages/edit.png') }}" style="display:inline"></a>
<a href="insuranceinfo.php?print=true"><img src="{{ asset('nlimages/print.png') }}"></a></td>
<td style="background-repeat:no-repeat;background-image:url('/nlimages/tab.png');width:150px;" align="center"><b><font color="white">1:</font></b> <a href="javascript:pickanencounter('');" style="color:white;">03/27/2020</a></td><td>&nbsp;</td>
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
<div id="visitlist" style="position: fixed; width: 1268px; left: 238px; top: 52px; height: 47px; z-index: 1; overflow: auto hidden; display: inline-block; white-space: nowrap;">
<table style="width: 1268px;" id="visittable" cellspacing="0" cellpadding="0" border="0" bgcolor="#d9d9d9">
<tbody><tr height="30">
<td style="width:90px" valign="middle" align="left">&nbsp;<a href="newencounter.php"><img src="nlimages/plus.png" style="display:inline"></a> <a href="editvisits.php"><img src="nlimages/edit.png" style="display:inline"></a>
<a href="algorithm.php?print=true"><img src="nlimages/print.png"></a></td>
<td style="background-repeat:no-repeat;background-image:url('nlimages/tab.png');width:150px;" align="center"><b><font color="white">1:</font></b> <a href="javascript:pickanencounter('03/27/2020');" style="color:white;">03/27/2020</a></td><td>&nbsp;</td>
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
<table height="30"><tbody><tr><td><img src="images/spacer.png" height="30"></td></tr></tbody></table>
        <br>

<table width="100%" cellpadding="10 "><tbody><tr><td width="100%" valign="top">
<script>

if(window.innerWidth<1280){
	document.getElementById('visitlist').style.top='69px';
	document.getElementById('sidebar').style.top='72px';
	document.getElementById('mainmenutable').style.height='70px';
}

</script>
<hr><font size="+2">Algorithm</font><hr><br>
<script>
function dropdown(key){
	var shown=document.getElementById('shown');
	if(document.getElementById(key+'div').style.display=='block'){
		document.getElementById(key+'img').src='images/plus.png';
		document.getElementById(key+'div').style.display='none';
		shown.value=shown.value.replace(key,'');
	}
	else if(document.getElementById(key+'div').style.display=='none'){
		document.getElementById(key+'img').src='images/minus.png';
		document.getElementById(key+'div').style.display='block';
		if(shown.value!='') shown.value=shown.value+',';
		shown.value=shown.value+key;
	}
}
function formsubmit(operation,complaint,affectdate){
	if(operation!='typeselect'||(operation=='typeselect'&&document.getElementById('paintype'+affectdate).value!='')){
		document.form.operation.value=operation;
		document.form.complaint.value=complaint;
		document.form.affecteddate.value=affectdate;
		document.form.submit();
	}
	else{
		if(window.confirm('Nothing entered for pain type, are you sure you want to continue? This will overwrite any selected pain types with no value.')){
			document.form.operation.value=operation;
			document.form.complaint.value=complaint;
			document.form.affecteddate.value=affectdate;
			document.form.submit();
		}
	}
}
function selectphase(i,i2){
	if(document.getElementById(i+'phasetd'+i2).style.backgroundColor=="rgb(253, 249, 151)"){
		if(i%2==0) document.getElementById(i+'phasetd'+i2).style.backgroundColor="a9e1ff";
		else document.getElementById(i+'phasetd'+i2).style.backgroundColor="ffd89f";
		document.getElementById('phaseselected'+i).value=document.getElementById('phaseselected'+i).value.replace(i2+',','');
	}
	else{
		document.getElementById(i+'phasetd'+i2).style.backgroundColor="#fdf997";
		document.getElementById('phaseselected'+i).value+=i2+',';
	}
}
function selecttype(i,i2){
	if(document.getElementById(i+'typetd'+i2).style.backgroundColor=="rgb(182, 253, 151)"){
		if(i%2==0) document.getElementById(i+'typetd'+i2).style.backgroundColor="a9e1ff";
		else document.getElementById(i+'typetd'+i2).style.backgroundColor="ffd89f";
		document.getElementById('typeselected'+i).value=document.getElementById('typeselected'+i).value.replace(i2+',','');
	}
	else{
		document.getElementById(i+'typetd'+i2).style.backgroundColor="#b6fd97";
		document.getElementById('typeselected'+i).value+=i2+',';
	}
}
function selectall(){
	for(var i=0;document.getElementById('selectcomplaint'+i);i++){
		if(document.getElementById('selectallcheck').checked)
			document.getElementById('selectcomplaint'+i).checked=true;
		else
			document.getElementById('selectcomplaint'+i).checked=false;
	}
}
function addpaintype(i){
	var str=document.getElementById('paintypediv'+i).innerText;
	if(str==''){
		document.getElementById('paintype'+i).value=document.getElementById('paintypeother'+i).value;
		document.getElementById('paintypediv'+i).innerText=document.getElementById('paintypeother'+i).value;
	}
	else{
		document.getElementById('paintype'+i).value=str+', '+document.getElementById('paintypeother'+i).value;
		document.getElementById('paintypediv'+i).innerText=str+', '+document.getElementById('paintypeother'+i).value;
	}
		document.getElementById('paintypeselect'+i).style.display='block';
		document.getElementById('paintypeother'+i).style.display='none';
		document.getElementById('paintypeother'+i).value='';
		document.getElementById('paintypeenter'+i).style.display='none';
		document.getElementById('paintypeselect'+i).value='Add'
}
function paintype(i){
	var paintypeselect=document.getElementById('paintypeselect'+i);
	var str=document.getElementById('paintypediv'+i).innerText;
	if(document.getElementById('paintypeselect'+i).value=='Other...'){
		document.getElementById('paintypeselect'+i).style.display='none';
		document.getElementById('paintypeother'+i).style.display='block';
		document.getElementById('paintypeenter'+i).style.display='block';
	}
	else if(document.getElementById('paintypeselect'+i).value=='Clear'){
		document.getElementById('paintypediv'+i).innerText='';
		document.getElementById('paintype'+i).value='';
		paintypeselect.options[paintypeselect.options.length-1] = null;
		paintypeselect.options[paintypeselect.options.length-1] = null;
		paintypeselect.value='Select';
	}
	else{
		if(str==''){
			document.getElementById('paintype'+i).value=document.getElementById('paintypeselect'+i).value;
			document.getElementById('paintypediv'+i).innerText=document.getElementById('paintypeselect'+i).value;
		}
		else{
			document.getElementById('paintype'+i).value=str+', '+document.getElementById('paintypeselect'+i).value;
			document.getElementById('paintypediv'+i).innerText=str+', '+document.getElementById('paintypeselect'+i).value;
		}
		if(paintypeselect.options[paintypeselect.options.length-1].value!='Clear'){
			paintypeselect.options[paintypeselect.options.length] = new Option('Add');
			paintypeselect.options[paintypeselect.options.length] = new Option('Clear');
		}
		paintypeselect.value='Add';
	}
}
</script><form name="form" action="algorithm.php" method="post" style="display:inline;">
<input type="hidden" name="shown" id="shown">
<input type="hidden" name="operation">
<input type="hidden" name="complaint">
<input type="hidden" name="affecteddate">
<input type="hidden" name="complaints" value="">
<table width="100%" cellspacing="0" cellpadding="5" border="1"><tbody><tr bgcolor="#ffd8d8"><td width="10"><input type="checkbox" id="selectallcheck" onclick="javascript:selectall()"></td><td><strong>Auto Increment All Selected</strong>: <select name="autoincrementall"><option value="100">100%</option><option value="90">90%</option><option value="80">80%</option><option value="70">70%</option><option value="60">60%</option><option value="50">50%</option><option value="40">40%</option><option value="30">30%</option><option value="20">20%</option><option value="10">10%</option><option value="0">0%</option></select> <select name="betterworseall"><option value="better">Better</option><option value="worse">Worse</option></select> From: <select name="autoincrementfromall"><option value="03/27/2020">03/27/2020</option></select> To: <select name="autoincrementtoall"><option value="03/27/2020" selected="">03/27/2020</option></select> <input type="button" name="autoincrementsubmit" value="Go" onclick="javascript:formsubmit('autoincrement','all');"></td></tr></tbody></table></form><script>
</script>
    </td></tr></tbody></table></td></tr></tbody></table>
</form></body>
