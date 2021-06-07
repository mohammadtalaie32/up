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
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head><body class="font" ')"="" style="margin:0;padding:0;">
<script>
function showvisitdates(){
	if(document.getElementById('visitdropdown').style.display=='none')
		document.getElementById('visitdropdown').style.display='block';
	else if(document.getElementById('visitdropdown').style.display=='block')
		document.getElementById('visitdropdown').style.display='none';
}
</script>
<form name="encform" enctype="multipart/form-data" action="{{ route('updatepreexistingconditions',$data->id)}}" method="POST">
	 @csrf
     @method('PUT')
  <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table id="mainmenutable" style="background-color:#5f5f61;color:white;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;"><tbody><tr><td width="130" valign="middle"><a href="{{route('demo')}}"><img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle"><a href="{{route('logout')}}"><img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="{{ route('admin')}}"><img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td>
<td align="center">Welcome,<br>Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="insuranceinfo.php">
<input type="hidden" name="gotodate">
<font size="+1"><strong>Patient selected:</strong> {{$data->lastname}}, {{$data->firstname}} <script>if(window.innerWidth<1280) document.write('<br>');else document.write('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <strong>Visit: </strong> <select name="pick" onchange="javascript:pickencounter();">
			<option value="" selected="">Select</option><option value="">{{$data->created_at}}</option></select>&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="{{ asset('nlimages/calendar.png') }}" onclick="showvisitdates()" ;="">
		<div style="position:absolute;width:100%;top:25px;left:0px;background-color:#f1f1f1;display:none;color:black;border:2px solid #d9d9d9;z-index:2;text-align:center;" id="visitdropdown"><a href="javascript:pickanencounter('');" style="text-decoration:none;color:black">
		 <b></b> <img src="{{ asset('nlimages/radioinactive.png') }}" height="14"></a> <a href="javascript:pickanencounter('','editvisits.php')">
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
<tbody><tr><td "="" align="center"><img src="{{ asset('nlimages/patientinformation.png') }}"></td></tr><tr height="40"><td style="background-image: url(&quot;/asssets/demo/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ientinfo.phptd" onmouseover="changebg('ientinfo.php','on','');" onmouseout="changebg('ientinfo.php','off','')" align="center"><a href="{{route('patient.edit',$data)}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ilyhistory.phptd" onmouseover="changebg('ilyhistory.php','on','');" onmouseout="changebg('ilyhistory.php','off','')" align="center"><a href="{{URL::to('/familyhistory/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ialhistory.phptd" onmouseover="changebg('ialhistory.php','on','');" onmouseout="changebg('ialhistory.php','off','')" align="center"><a href="{{URL::to('/socialhistory/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Social History</div></a></td></tr>
	<tr height="40"><td style="background-image: url('/nlimages/navbgactive.png');background-repeat:no-repeat;background-position:center;" id="existingconditions.phptd" align="center"><b><a href="{{URL::to('/preexistingconditions/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Pre-Existing Conditions</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="uranceinfo.phptd" align="center"><b><a href="{{URL::to('/insuranceinfo/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Insurance Info</div></a></b></td></tr><tr><td "="" align="center"><img src="{{ asset('nlimages/visitinformation.png') }}"></td></tr><tr height="40"><td style="background-color:#606069;border-top:2px solid black;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="subjectivetd" onmouseover="changebg('subjective','on','');" onmouseout="changebg('subjective','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Subjective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="objectivetd" onmouseover="changebg('objective','on','');" onmouseout="changebg('objective','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Objective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="assessmenttd" onmouseover="changebg('assessment','on','');" onmouseout="changebg('assessment','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Assessment</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="plantd" onmouseover="changebg('plan','on','');" onmouseout="changebg('plan','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Plan</div></a></td></tr><tr height="40"><td style="border-top:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gressnotes.phptd" onmouseover="changebg('gressnotes.php','on','');" onmouseout="changebg('gressnotes.php','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Progress Notes</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgcoding.png');background-repeat:no-repeat;background-position:center;" id="essmenticd.phptd" onmouseover="changebg('essmenticd.php','on','coding');" onmouseout="changebg('essmenticd.php','off','coding')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Daily Coding</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="orithm.phptd" onmouseover="changebg('orithm.php','on','');" onmouseout="changebg('orithm.php','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Algorithm</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gress.phptd" onmouseover="changebg('gress.php','on','');" onmouseout="changebg('gress.php','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Overview</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="msrom.phptd" onmouseover="changebg('msrom.php','on','');" onmouseout="changebg('msrom.php','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exams</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgexercises.png');background-repeat:no-repeat;background-position:center;" id="rcises.phptd" onmouseover="changebg('rcises.php','on','exercises');" onmouseout="changebg('rcises.php','off','exercises')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exercises</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="eduler.phptd" onmouseover="changebg('eduler.php','on','');" onmouseout="changebg('eduler.php','off','')" align="center"><a href="{{route('scheduler')}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
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
<center>
<form action="preexistingconditions.php" method="post">
<input type="hidden" name="submit" value="true">
<center>
<table width="80%" cellspacing="0" cellpadding="5"><tbody><tr><td colspan="4" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><font size="+2">Pre-Existing Conditions</font></td></tr>
<tr bgcolor="#f1f1f1"><td><input type="checkbox" name="preexisting[]" value="ADD/ADHD" {{in_array("ADD/ADHD",$preexisting)? "checked" :" "}}> ADD/ADHD</td>
	<td>
	<input type="checkbox" name="preexisting[]" value="Collagen vascular disease" {{in_array("Collagen vascular disease",$preexisting)? "checked" :" "}}> Collagen vascular disease</td>
	<td><input type="checkbox" name="preexisting[]"
		value="Heart murmur" {{in_array("Heart murmur",$preexisting)? "checked" :" "}}> Heart murmur</td>
	<td><input type="checkbox" name="preexisting[]"
		value="Paralysis" {{in_array("Paralysis",$preexisting)? "checked" :" "}}> Paralysis</td></tr><tr><td>
			<input type="checkbox" name="preexisting[]" value="Alcohol/drug addiction" {{in_array("Alcohol/drug addiction",$preexisting)? "checked" :" "}}> Alcohol/drug addiction</td>
	<td><input type="checkbox" name="preexisting[]"
		value="Constipation" {{in_array("Constipation",$preexisting)? "checked" :" "}}> Constipation</td>
	<td><input type="checkbox" name="preexisting[]" value="Hemorrhoids"
		{{in_array("Hemorrhoids",$preexisting)? "checked" :" "}}> Hemorrhoids</td>
	<td><input type="checkbox" name="preexisting[]"
		value="Pneumonia" {{in_array("Pneumonia",$preexisting)? "checked" :" "}}> Pneumonia</td></tr><tr bgcolor="#f1f1f1"><td><input type="checkbox" name="preexisting[]"
		value="Anemia" {{in_array("Anemia",$preexisting)? "checked" :" "}}> Anemia</td>
	<td><input type="checkbox" name="preexisting[]"
		value="Depression/anxiety" {{in_array("Depression/anxiety",$preexisting)? "checked" :" "}}> Depression/anxiety</td>
	<td><input type="checkbox" name="preexisting[]"
		value="Hepatitis" {{in_array("Hepatitis",$preexisting)? "checked" :" "}}> Hepatitis</td>
	<td><input type="checkbox" name="preexisting[]"
		value="Polio" {{in_array("Polio",$preexisting)? "checked" :" "}}> Polio</td></tr><tr><td><input type="checkbox" name="preexisting[]" value="Appenicitis" {{in_array("Appenicitis",$preexisting)? "checked" :" "}}> Appenicitis</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Diabetes" {{in_array("Diabetes",$preexisting)? "checked" :" "}}> Diabetes</td>
	<td><input type="checkbox" name="preexisting[]" value="High blood pressue" {{in_array("High blood pressue",$preexisting)? "checked" :" "}}> High blood pressue</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Prostate problems" {{in_array("Prostate problems",$preexisting)? "checked" :" "}}> Prostate problems</td></tr><tr bgcolor="#f1f1f1"><td><input type="checkbox" name="preexisting[]"
	value="Arrythmia" {{in_array("Arrythmia",$preexisting)? "checked" :" "}}> Arrythmia</td>
	<td><input type="checkbox" name="preexisting[]" value="Digestive Disorders" {{in_array("Digestive Disorders",$preexisting)? "checked" :" "}}> Digestive Disorders</td>
	<td><input type="checkbox" name="preexisting[]"
	value="High cholesterol" {{in_array("High cholesterol",$preexisting)? "checked" :" "}}> High cholesterol</td>
	<td><input type="checkbox" name="preexisting[]"
		value="Reflux/ulcers" {{in_array("Reflux/ulcers",$preexisting)? "checked" :" "}}> Reflux/ulcers</td></tr><tr><td><input type="checkbox" name="preexisting[]"
		value="Arteriosclerosis" {{in_array("Arteriosclerosis",$preexisting)? "checked" :" "}}> Arteriosclerosis</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Dizziness" {{in_array("Dizziness",$preexisting)? "checked" :" "}}> Dizziness</td>
	<td><input type="checkbox" name="preexisting[]"
	value="HIV/AIDS" {{in_array("HIV/AIDS",$preexisting)? "checked" :" "}}> HIV/AIDS</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Rheumatic fever" {{in_array("Rheumatic fever",$preexisting)? "checked" :" "}}> Rheumatic fever</td></tr><tr bgcolor="#f1f1f1"><td><input type="checkbox" name="preexisting[]"
	value="Arthiritis" {{in_array("Arthiritis",$preexisting)? "checked" :" "}}> Arthiritis</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Eating Disorder" {{in_array("Eating Disorder",$preexisting)? "checked" :" "}}> Eating Disorder</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Joint/back pain" {{in_array("Joint/back pain",$preexisting)? "checked" :" "}}> Joint/back pain</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Scoliosis" {{in_array("Scoliosis",$preexisting)? "checked" :" "}}> Scoliosis</td></tr><tr><td><input type="checkbox" name="preexisting[]" value="Asthma" {{in_array("Asthma",$preexisting)? "checked" :" "}}> Asthma</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Emphysema" {{in_array("Emphysema",$preexisting)? "checked" :" "}}> Emphysema</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Kidney infections" {{in_array("Kidney infections",$preexisting)? "checked" :" "}}> Kidney infections</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Seizures/epilepsy" {{in_array("Seizures/epilepsy",$preexisting)? "checked" :" "}}> Seizures/epilepsy</td></tr><tr bgcolor="#f1f1f1"><td><input type="checkbox" name="preexisting[]"
	value="Backaches" {{in_array("Backaches",$preexisting)? "checked" :" "}}> Backaches</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Epilepsy" {{in_array("Epilepsy",$preexisting)? "checked" :" "}}> Epilepsy</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Kidney stones" {{in_array("Kidney stones",$preexisting)? "checked" :" "}}> Kidney stones</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Sexual dysfunction" {{in_array("Sexual dysfunction",$preexisting)? "checked" :" "}}> Sexual dysfunction</td></tr><tr><td><input type="checkbox" name="preexisting[]"
	value="Bleeding disorder" {{in_array("Bleeding disorder",$preexisting)? "checked" :" "}}> Bleeding disorder</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Fatigue" {{in_array("Fatigue",$preexisting)? "checked" :" "}}> Fatigue</td>
	<td><input type="checkbox" name="preexisting[]" value="Liver disease/problems" {{in_array("Liver disease/problems",$preexisting)? "checked" :" "}}> Liver disease/problems</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Sickle cell" {{in_array("Sickle cell",$preexisting)? "checked" :" "}}> Sickle cell</td></tr><tr bgcolor="#f1f1f1"><td>
	<input type="checkbox" name="preexisting[]"
	value="Blood clots" {{in_array("Blood clots",$preexisting)? "checked" :" "}}> Blood clots</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Female Health Challenges" {{in_array("Female Health Challenges",$preexisting)? "checked" :" "}}> Female Health Challenges</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Lung disease" {{in_array("Lung disease",$preexisting)? "checked" :" "}}> Lung disease</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Sinus trouble" {{in_array("Sinus trouble",$preexisting)? "checked" :" "}}> Sinus trouble</td></tr><tr><td>
	<input type="checkbox" name="preexisting[]"
	value="Blood transfusions" {{in_array("Blood transfusions",$preexisting)? "checked" :" "}}> Blood transfusions</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Fibromyalgia" {{in_array("Fibromyalgia",$preexisting)? "checked" :" "}}> Fibromyalgia</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Measles" {{in_array("Measles",$preexisting)? "checked" :" "}}> Measles</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Stress/tension" {{in_array("Stress/tension",$preexisting)? "checked" :" "}}> Stress/tension</td></tr><tr bgcolor="#f1f1f1"><td><input type="checkbox" name="preexisting[]"
	value="Blurred vision" {{in_array("Blurred vision",$preexisting)? "checked" :" "}}> Blurred vision</td>
	<td><input type="checkbox" name="preexisting[]" value="Gallbladder disease" {{in_array("Gallbladder disease",$preexisting)? "checked" :" "}}> Gallbladder disease</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Menstrual cramps" {{in_array("Menstrual cramps",$preexisting)? "checked" :" "}}> Menstrual cramps</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Stroke" {{in_array("Stroke",$preexisting)? "checked" :" "}}> Stroke</td></tr><tr><td>
	<input type="checkbox" name="preexisting[]"
	value="Bowel problems" {{in_array("Bowel problems",$preexisting)? "checked" :" "}}> Bowel problems</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Genital Herpes" {{in_array("Genital Herpes",$preexisting)? "checked" :" "}}> Genital Herpes</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Mental disorder" {{in_array("Mental disorder",$preexisting)? "checked" :" "}}> Mental disorder</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Suicidal tendencies" {{in_array("Suicidal tendencies",$preexisting)? "checked" :" "}}> Suicidal tendencies</td></tr><tr bgcolor="#f1f1f1"><td>
	<input type="checkbox" name="preexisting[]"
	value="Broken bones" {{in_array("Broken bones",$preexisting)? "checked" :" "}}> Broken bones</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Glaucoma" {{in_array("Glaucoma",$preexisting)? "checked" :" "}}> Glaucoma</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Migraines" {{in_array("Migraines",$preexisting)? "checked" :" "}}> Migraines</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Thyroid disease" {{in_array("Thyroid disease",$preexisting)? "checked" :" "}}> Thyroid disease</td></tr><tr><td><input type="checkbox" name="preexisting[]"
	value="Cancer" {{in_array("Cancer",$preexisting)? "checked" :" "}}> Cancer</td>
	<td>
	<input type="checkbox" name="preexisting[]"
	value="Gluten Intolerance" {{in_array("Gluten Intolerance",$preexisting)? "checked" :" "}}> Gluten Intolerance</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Miscarriage" {{in_array("Miscarriage",$preexisting)? "checked" :" "}}> Miscarriage</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Tuberculosis" {{in_array("Tuberculosis",$preexisting)? "checked" :" "}}> Tuberculosis</td></tr><tr bgcolor="#f1f1f1"><td><input type="checkbox" name="preexisting[]"
	value="Carpal Tunnel" {{in_array("Carpal Tunnel",$preexisting)? "checked" :" "}}> Carpal Tunnel</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Goiter" {{in_array("Goiter",$preexisting)? "checked" :" "}}> Goiter</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Multiple Sclerosis" {{in_array("Multiple Sclerosis",$preexisting)? "checked" :" "}}> Multiple Sclerosis</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Tumors" {{in_array("Tumors",$preexisting)? "checked" :" "}}> Tumors</td></tr><tr><td><input type="checkbox" name="preexisting[]" value="Cataracts" {{in_array("Cataracts",$preexisting)? "checked" :" "}}> Cataracts</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Gout" {{in_array("Gout",$preexisting)? "checked" :" "}}> Gout</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Neck pain" {{in_array("Neck pain",$preexisting)? "checked" :" "}}> Neck pain</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Ulcers" {{in_array("Ulcers",$preexisting)? "checked" :" "}}> Ulcers</td></tr><tr bgcolor="#f1f1f1"><td><input type="checkbox" name="preexisting[]" value="Chickenpox" {{in_array("Chickenpox",$preexisting)? "checked" :" "}}> Chickenpox</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Headaches" {{in_array("Headaches",$preexisting)? "checked" :" "}}> Headaches</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Nervousness" {{in_array("Nervousness",$preexisting)? "checked" :" "}}> Nervousness</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Urine discoloration" {{in_array("Urine discoloration",$preexisting)? "checked" :" "}}> Urine discoloration</td></tr><tr><td><input type="checkbox" name="preexisting[]"
	value="Cold Sores" {{in_array("Cold Sores",$preexisting)? "checked" :" "}}> Cold Sores</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Hearing Loss" {{in_array("Hearing Loss",$preexisting)? "checked" :" "}}> Hearing Loss</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Night Sweats" {{in_array("Night Sweats",$preexisting)? "checked" :" "}}> Night Sweats</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Vertigo" {{in_array("Vertigo",$preexisting)? "checked" :" "}}> Vertigo</td></tr><tr bgcolor="#f1f1f1"><td><input type="checkbox" name="preexisting[]"
	value="Colitis" {{in_array("Colitis",$preexisting)? "checked" :" "}}> Colitis</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Heart Disease/Attacks" {{in_array("Heart Disease/Attacks",$preexisting)? "checked" :" "}}> Heart Disease/Attacks</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Osteoporosis" {{in_array("Osteoporosis",$preexisting)? "checked" :" "}}> Osteoporosis</td>
	<td><input type="checkbox" name="preexisting[]"
	value="Whooping Cough" {{in_array("Whooping Cough",$preexisting)? "checked" :" "}}> Whooping Cough</td></tr><tr bgcolor="#d9d9d9"><td colspan="4" style="border-top:2px solid #999494;border-bottom:2px solid #999494;padding-top:10px;padding-bottom:10px;" align="right"><input type="image" src="{{ asset('nlimages/savebutton.png') }}"></td></tr>
</tbody></table>
<center>
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block" style="width: 60%; margin-top: 100px;">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>{{ $message }}</strong>
    </div>
	@endif
</center>
</center>
</form>
