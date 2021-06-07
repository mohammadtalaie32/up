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
<form name="encform" enctype="multipart/form-data" action="{{ route('updatefamilyhistory',$data->id)}}" method="POST">
	 @csrf
     @method('PUT')
  <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table id="mainmenutable" style="background-color:#5f5f61;color:white;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;"><tbody><tr><td width="130" valign="middle">
	<a href="{{route('demo')}}">
		<img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle">
			<a href="{{route('logout')}}">
			<img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="{{route('admin')}}">
<img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td>
<td align="center">Welcome,<br>Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="patientinfo.php">
<input type="hidden" name="gotodate">
<font size="+1"><strong>Patient selected:</strong>{{ $data->lastname }},{{ $data->firstname }}<script>if(window.innerWidth<1280) document.write('<br>');else document.write('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <strong>Visit: </strong> <select name="pick" onchange="javascript:pickencounter();">
			<option value="" selected="">Select</option><option value="08/31/2020"></option></select>&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="{{ asset('nlimages/calendar.png') }}" onclick="showvisitdates()" ;="">
		<div style="position:absolute;width:100%;top:25px;left:0px;background-color:#f1f1f1;display:none;color:black;border:2px solid #d9d9d9;z-index:2;text-align:center;" id="visitdropdown"><a href="javascript:pickanencounter('');" style="text-decoration:none;color:black">
		 <b>#1:</b>
		 <img src="{{ asset('nlimages/radioinactive.png') }}" height="14"> </a> <a href="javascript:pickanencounter('','editvisits.php')">
		 <img src="{{ asset('nlimages/edit.png') }}" height="14"></a><br></div></font></td><td width="12%" align="right">
		 <a href="{{route('demo')}}" style="color:white;font-size:18px;">Patient Portal</a></td><td style="border-left:none;" width="4%" align="right">
		 	<a href="{{route('demo')}}?clear=true">
		 	<img src="{{ asset('nlimages/home.png') }}" style="display:inline;"></a></td></tr>

<tr style="height:2px;" bgcolor="#ce0205"><td colspan="4" style="height:2px;padding:0px;" width="100%"></td></tr></tbody></table>
</div>
<table height="52"><tbody><tr><td><img src="{{ asset('assets/front/images/spacer.png') }}" height="52"></td></tr></tbody></table>
<table width="100%" height="100%" cellspacing="0" cellpadding="0">
<tbody><tr><td width="238" valign="top" bgcolor="#f1f1f1">
<img src="{{ asset('assets/front/images/spacer.png') }}" width="238" height="1"><div id="sidebar" style="position:fixed;top:52px;left:0px;width:238px;height:100%;background-color:#f1f1f1;">
<script>
function changebg(id,onoff,coding){
	if(id!=active){
		if(onoff=='on') document.getElementById(id+'td').style.backgroundImage=
			'url(/nlimages/navbg'+coding+'on.png)';
		if(onoff=='off') document.getElementById(id+'td').style.backgroundImage=
			'url(/nlimages/navbg'+coding+'.png)';
	}
}
</script>
<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr><td "="" align="center">
	<img src="{{ asset('nlimages/patientinformation.png') }}"></td></tr><tr height="40">
		<td style="background-image: url(&quot;'/nlimages/navbg.png'&quot;); background-repeat: no-repeat; background-position: center center;" id="ientinfo.phptd" onmouseover="changebg('ientinfo.php','on','');" onmouseout="changebg('ientinfo.php','off','')" align="center"><a href="{{ route('patient.edit',$data->id)}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a></td></tr><tr height="40">
			<td style="background-image:url('/nlimages/navbgactive.png');background-repeat:no-repeat;background-position:center;" id="ilyhistory.phptd" align="center"><b><a href="{{ URL::to('/familyhostory/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a></b></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="ialhistory.phptd" onmouseover="changebg('ialhistory.php','on','');" onmouseout="changebg('ialhistory.php','off','')" align="center">
				<a href="{{URL::to('/socialhistory/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Social History</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;'/nlimages/navbg'.png&quot;); background-repeat: no-repeat; background-position: center center;" id="existingconditions.phptd" onmouseover="changebg('existingconditions.php','on','');" onmouseout="changebg('existingconditions.php','off','')" align="center">
					<a href="{{ URL::to('/preexistingconditions/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Pre-Existing Conditions</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="uranceinfo.phptd" onmouseover="changebg('uranceinfo.php','on','');" onmouseout="changebg('uranceinfo.php','off','')" align="center">
						<a href="{{ URL::to('/insuranceinfo/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Insurance Info</div></a></td></tr><tr><td "="" align="center"><img src="{{ asset('nlimages/visitinformation.png') }}"></td></tr><tr height="40"><td style="background-color:#606069;border-top:2px solid black;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="subjectivetd" onmouseover="changebg('subjective','on','');" onmouseout="changebg('subjective','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Subjective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="objectivetd" onmouseover="changebg('objective','on','');" onmouseout="changebg('objective','off','')" align="center">
				<a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Objective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="assessmenttd" onmouseover="changebg('assessment','on','');" onmouseout="changebg('assessment','off','')" align="center">
				<a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Assessment</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="plantd" onmouseover="changebg('plan','on','');" onmouseout="changebg('plan','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Plan</div></a></td></tr><tr height="40"><td style="border-top:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gressnotes.phptd" onmouseover="changebg('gressnotes.php','on','');" onmouseout="changebg('gressnotes.php','off','')" align="center">
				<a href="{{ route('progressnotes') }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Progress Notes</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgcoding.png');background-repeat:no-repeat;background-position:center;" id="essmenticd.phptd" onmouseover="changebg('essmenticd.php','on','coding');" onmouseout="changebg('essmenticd.php','off','coding')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Daily Coding</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="orithm.phptd" onmouseover="changebg('orithm.php','on','');" onmouseout="changebg('orithm.php','off','')" align="center">
				<a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Algorithm</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gress.phptd" onmouseover="changebg('gress.php','on','');" onmouseout="changebg('gress.php','off','')" align="center">
				<a href="{{ route('progress') }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Overview</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="msrom.phptd" onmouseover="changebg('msrom.php','on','');" onmouseout="changebg('msrom.php','off','')" align="center">
				<a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exams</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgexercises.png');background-repeat:no-repeat;background-position:center;" id="rcises.phptd" onmouseover="changebg('rcises.php','on','exercises');" onmouseout="changebg('rcises.php','off','exercises')" align="center">
				<a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exercises</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="eduler.phptd" onmouseover="changebg('eduler.php','on','');" onmouseout="changebg('eduler.php','off','')" align="center">
				<a href="{{ route('scheduler') }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
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
<td style="width:90px" valign="middle" align="left">&nbsp;<a href=""><img src="{{ asset('nlimages/plus.png') }}" style="display:inline"></a> <a href=""><img src="{{ asset('nlimages/edit.png') }}" style="display:inline"></a>
<a href=""><img src="{{ asset('nlimages/print.png') }}"></a></td>
<td style="background-repeat:no-repeat;background-image:url('/nlimages/tab.png');width:150px;" align="center"><b><font color="white"></font></b> <a href="javascript:pickanencounter('');" style="color:white;"></a></td><td>&nbsp;</td>
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
<form action="familyhistory.php" method="post">
<input type="hidden" name="submit" value="true">
<table width="80%" cellspacing="0" cellpadding="5" border="0">
<tbody><tr><td colspan="13" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><font size="+2">Family History</font></td></tr>
<tr><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">&nbsp;</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Back</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Heart</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Stroke</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Cancer</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Diabetes</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">High BP</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Arthritis</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">High Cholesterol</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Osteoporosis</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Thyroid</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Good Health</td><td style="border-top:2px solid #999494;border-bottom:2px solid #999494;">Unknown</td></tr><tr bgcolor="#f1f1f1"><td>Mother:</td>
	<td align="center">
		<input type="checkbox" name="Mother[]"
		value="Back" {{in_array("Back",$mother)? "checked" :" "}}></td><td align="center">
		<input type="checkbox" name="Mother[]" value="Heart"
		{{in_array("Heart",$mother)? "checked" :" "}}></td>
		<td align="center">
		<input type="checkbox" name="Mother[]"
		value="Stroke" {{in_array("Stroke",$mother)? "checked" :" "}}></td><td align="center">
		<input type="checkbox" name="Mother[]"
		value="Cancer" {{in_array("Cancer",$mother)? "checked" :" "}}></td><td align="center">
		<input type="checkbox" name="Mother[]"
		value="Diabetes" {{in_array("Diabetes",$mother)? "checked" :" "}}></td><td align="center">
		<input type="checkbox" name="Mother[]" value="High BP"
		{{in_array("High BP",$mother)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Mother[]"
		value="Arthritis" {{in_array("Arthritis",$mother)? "checked" :" "}}></td><td align="center">
		<input type="checkbox" name="Mother[]"
		value="High Cholesterol" {{in_array("High Cholesterol",$mother)? "checked" :" "}}></td><td align="center">
		<input type="checkbox" name="Mother[]"
		value="Osteoporosis" {{in_array("Osteoporosis",$mother)? "checked" :" "}}></td><td align="center">
		<input type="checkbox" name="Mother[]"
		value="Thyroid" {{in_array("Thyroid",$mother)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Mother[]"
		value="Good Health" {{in_array("Good Health",$mother)? "checked" :" "}}></td><td align="center">
		<input type="checkbox" name="Mother[]"
	   value="Unknown" {{in_array("Unknown",$mother)? "checked" :" "}}></td></tr><tr><td>Father:</td><td align="center">
	   	<input type="checkbox" name="Father[]"
	   	value="Back" {{in_array("Back",$father)? "checked" :" "}}></td>
	   	<td align="center"><input type="checkbox" name="Father[]" value="Heart" {{in_array("Heart",$father)? "checked" :" "}}></td>
	   	<td align="center"><input type="checkbox" name="Father[]"
	   	value="Stroke" {{in_array("Stroke",$father)? "checked" :" "}}></td><td align="center">
	   	<input type="checkbox" name="Father[]"
	   	value="Cancer" {{in_array("Cancer",$father)? "checked" :" "}}></td><td align="center">
	   	<input type="checkbox" name="Father[]"
	   	value="Diabetes" {{in_array("Diabetes",$father)? "checked" :" "}}></td><td align="center">
	   	<input type="checkbox" name="Father[]" value="High BP" {{in_array("High BP",$father)? "checked" :" "}}></td>
	   	<td align="center"><input type="checkbox" name="Father[]" value="Arthritis" {{in_array("Arthritis",$father)? "checked" :" "}}></td><td align="center">
	   	<input type="checkbox" name="Father[]"
	    value="High Cholesterol" {{in_array("High Cholesterol",$father)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Father[]"
	    value="Osteoporosis" {{in_array("Osteoporosis",$father)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Father[]"
	    value="Thyroid" {{in_array("Thyroid",$father)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Father[]"
	    value="Good Health" {{in_array("Good Health",$father)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Father[]"
	    value="Unknown" {{in_array("Unknown",$father)? "checked" :" "}}></td></tr><tr bgcolor="#f1f1f1"><td>Sisters:</td><td align="center">
	    <input type="checkbox" name="Sisters[]"
	    value="Back" {{in_array("Back",$sister)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Sisters[]"
	    value="Heart" {{in_array("Heart",$sister)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Sisters[]" value="Stroke" {{in_array("Stroke",$sister)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Sisters[]" value="Cancer" {{in_array("Cancer",$sister)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Sisters[]"
	    value="Diabetes" {{in_array("Diabetes",$sister)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Sisters[]"
	    value="High BP" {{in_array("High BP",$sister)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Sisters[]" value="Arthritis" {{in_array("Arthritis",$sister)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Sisters[]"
	    value="High Cholesterol" {{in_array("High Cholesterol",$sister)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Sisters[]"
	    value="Osteoporosis" {{in_array("Osteoporosis",$sister)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Sisters[]"
	    value="Thyroid" {{in_array("Thyroid",$sister)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Sisters[]"
	    value="Good Health" {{in_array("Good Health",$sister)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Sisters[]"
	    value="Unknown" {{in_array("Unknown",$sister)? "checked" :" "}}></td></tr><tr><td>Brothers:</td><td align="center">
	    <input type="checkbox" name="Brothers[]"
	    value="Back" {{in_array("Back",$brother)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Brothers[]" value="Heart" {{in_array("Heart",$sister)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Brothers[]"
	    value="Stroke" {{in_array("Stroke",$brother)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Brothers[]"
	    value="Cancer" {{in_array("Cancer",$brother)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Brothers[]" value="Diabetes" {{in_array("Diabetes",$brother)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Brothers[]"
	    value="High BP" {{in_array("High BP",$brother)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Brothers[]"
	    value="Arthritis" {{in_array("Arthritis",$brother)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Brothers[]"
	    value="High Cholesterol" {{in_array("High Cholesterol",$brother)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Brothers[]"
	    value="Osteoporosis" {{in_array("Osteoporosis",$brother)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Brothers[]"
	    value="Thyroid" {{in_array("Thyroid",$brother)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Brothers[]" value="Good Health" {{in_array("Good Health",$brother)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Brothers[]"
	    value="Unknown" {{in_array("Unknown",$brother)? "checked" :" "}}></td></tr><tr bgcolor="#f1f1f1"><td>Children:</td><td align="center"><input type="checkbox" name="Children[]"
	    value="Back" {{in_array("Back",$children)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Children[]"
	    value="Heart" {{in_array("Heart",$children)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Children[]"
	    value="Stroke" {{in_array("Stroke",$children)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Children[]"
	    value="Cancer" {{in_array("Cancer",$children)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Children[]" value="Diabetes" {{in_array("Diabetes",$children)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Children[]"
	    value="High BP" {{in_array("High BP",$children)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Children[]"
	    value="Arthritis" {{in_array("Arthritis",$children)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Children[]" value="High Cholesterol" {{in_array("High Cholesterol",$children)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Children[]"
	    value="Osteoporosis" {{in_array("High Cholesterol",$children)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Children[]"
	    value="Thyroid" {{in_array("Thyroid",$children)? "checked" :" "}}></td><td align="center">
	    <input type="checkbox" name="Children[]"
	    value="Good Health" {{in_array("Good Healths",$children)? "checked" :" "}}></td><td align="center"><input type="checkbox" name="Children[]" value="Unknown" {{in_array("Unknown",$children)? "checked" :" "}}></td></tr><tr bgcolor="#d9d9d9"><td colspan="13" style="border-top:2px solid #999494;border-bottom:2px solid #999494;padding-top:10px;padding-bottom:10px" align="right">
	<input type="image" src="{{ asset('nlimages/savebutton.png') }}"></td></tr>
</tbody></table>
</form>
</center>

<center>
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block" style="width: 60%; margin-top: 100px;">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>{{ $message }}</strong>
    </div>
@endif
</center>
    </td></tr></tbody></table></td></tr></tbody></table>
</form></body></html>
