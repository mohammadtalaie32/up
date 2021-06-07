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
<form>
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table id="mainmenutable" style="background-color:#5f5f61;color:white;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;"><tbody><tr><td width="130" valign="middle">
	<a href="{{route('demo')}}">
		<img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle">
			<a href="{{route('logout')}}">
				<img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="{{ route('admin') }}"><img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td>
<td align="center">Welcome,<br>Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="forms.php">
<input type="hidden" name="gotodate">
<font size="+1">Please select a patient to begin!</font></td><td width="12%" align="right"><a href="{{route('patientportal')}}" style="color:white;font-size:18px;">Patient Portal</a></td><td style="border-left:none;" width="4%" align="right">
<a href="{{ route('demo')}}">
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
		if(onoff=='on') document.getElementById(id+'td').style.backgroundImage='url(/nlimages/navbg'+coding+'on.png)';
		if(onoff=='off') document.getElementById(id+'td').style.backgroundImage='url(/nlimages/navbg'+coding+'.png)';
	}
}
</script>
<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr><td>&nbsp;</td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="age.phptd" onmouseover="changebg('age.php','on','');" onmouseout="changebg('age.php','off','')" align="center"><a href="{{ route('demo')}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">All Patients</div></a></td></tr><tr><td>&nbsp;</td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="patient.phptd" onmouseover="changebg('patient.php','on','');" onmouseout="changebg('patient.php','off','')" align="center"><a href="{{route('patient.create')}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">New Patient</div></a></td></tr></tbody></table>
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
<table width="100%" cellpadding="10 "><tbody><tr><td width="100%" valign="top">
<script>

if(window.innerWidth<1280){
	document.getElementById('visitlist').style.top='69px';
	document.getElementById('sidebar').style.top='72px';
	document.getElementById('mainmenutable').style.height='70px';
}

</script>

<font size="+2"><b>Neck Index</b></font><br><br>
This questionnaire will give your provider information about how your neck condition affects your everyday life. Please answer every section by marking the one statement that applies to you. If two or more statements in one section apply, please mark the one statement that most closely describes your problem.<br><br>
<table width="100%" cellpadding="3"><tbody><tr><td width="50%">
<b>Pain Intensity</b><br>
<input type="radio" name="painintensity" value="0"> (0) I have no pain at the moment.<br>
<input type="radio" name="painintensity" value="1"> (1) The pain is very mild at the moment.<br>
<input type="radio" name="painintensity" value="2"> (2) The pain comes and goes and is moderate.<br>
<input type="radio" name="painintensity" value="3"> (3) The pain is fairly severe at the moment.<br>
<input type="radio" name="painintensity" value="4"> (4) The pain is very severe at the moment.<br>
<input type="radio" name="painintensity" value="5"> (5) The pain is the worst imaginable at the moment.<br><br>
<b>Sleeping</b><br>
<input type="radio" name="sleeping" value="0"> (0) I have no trouble sleeping.<br>
<input type="radio" name="sleeping" value="1"> (1) My sleep is slightly disturbed (less than 1 hour sleepless).<br>
<input type="radio" name="sleeping" value="2"> (2) My sleep is mildly disturbed (1-2 hours sleepless).<br>
<input type="radio" name="sleeping" value="3"> (3) My sleep is moderately disturbed (2-3 hours sleepless).<br>
<input type="radio" name="sleeping" value="4"> (4) My sleep is greatly disturbed (3-5 hours sleepless).<br>
<input type="radio" name="sleeping" value="5"> (5) My sleep is completely disturbed (5-7 hours sleepless).<br><br>
<b>Reading</b><br>
<input type="radio" name="sitting" value="0"> (0) I can read as much as I want with no neck pain.<br>
<input type="radio" name="sitting" value="1"> (1) I can read as much as I want with slight neck pain.<br>
<input type="radio" name="sitting" value="2"> (2) I can read as much as I want with moderate neck pain.<br>
<input type="radio" name="sitting" value="3"> (3) I cannot read as much as I want because of moderate neck pain.<br>
<input type="radio" name="sitting" value="4"> (4) I can hardly read at all because of severe neck pain.<br>
<input type="radio" name="sitting" value="5"> (5) I cannot read at all because of neck pain.<br><br>
<b>Concentration</b><br>
<input type="radio" name="standing" value="0"> (0) I can concentrate fully when I want with no difficulty.<br>
<input type="radio" name="standing" value="1"> (1) I can concentrate fully when I want with slight difficulty.<br>
<input type="radio" name="standing" value="2"> (2) I have a fair degree of difficulty concentrating when I want.<br>
<input type="radio" name="standing" value="3"> (3) I have a lot of difficulty concentrating when I want.<br>
<input type="radio" name="standing" value="4"> (4) I have a great deal of difficulty concentrating when I want.<br>
<input type="radio" name="standing" value="5"> (5) I cannot concentrate at all.<br><br>
<b>Work</b><br>
<input type="radio" name="walking" value="0"> (0) I can do as much work as I want.<br>
<input type="radio" name="walking" value="1"> (1) I can only do my usual work but no more.<br>
<input type="radio" name="walking" value="2"> (2) I can only do most of my usual work but no more.<br>
<input type="radio" name="walking" value="3"> (3) I cannot do my usual work.<br>
<input type="radio" name="walking" value="4"> (4) I can hardly do any work at all.<br>
<input type="radio" name="walking" value="5"> (5) I cannot do any work at all.</td>
<td width="50%">
<b>Personal Care</b><br>
<input type="radio" name="personalcare" value="0"> (0) I can look after myself normally without causing extra pain.<br>
<input type="radio" name="personalcare" value="1"> (1) I can look after mysekf normally but it causes extra pain.<br>
<input type="radio" name="personalcare" value="2"> (2) It is painful to look after myself and I am slow and careful.<br>
<input type="radio" name="personalcare" value="3"> (3) I need some help but I mange most of my personal care.<br>
<input type="radio" name="personalcare" value="4"> (4) I need help every day in most aspects of self care.<br>
<input type="radio" name="personalcare" value="5"> (5) I do not get dressed, I wash with difficulty and stay in bed.<br><br>
<b>Lifting</b><br>
<input type="radio" name="lifting" value="0"> (0) I can lift heavy weights without extra pain.<br>
<input type="radio" name="lifting" value="1"> (1) I can lift heavy weights but it causes extra pain.<br>
<input type="radio" name="lifting" value="2"> (2) Pain prevents me from lifting heavy weights off the floor, but I can manage if they are conveniently positioned (e.g., on a table).<br>
<input type="radio" name="lifting" value="3"> (3) Pain prevents me from lifting heavy weights off the floor, but I can manage light to medium weight if they are conveniently positioned.<br>
<input type="radio" name="lifting" value="4"> (4) I can only lift very light weights.<br>
<input type="radio" name="lifting" value="5"> (5) I cannot lift or carry anything at all.<br><br>
<b>Driving</b><br>
<input type="radio" name="traveling" value="0"> (0) I can drive my car without any neck pain.<br>
<input type="radio" name="traveling" value="1"> (1) I can drive my car as long as I want with slight neck pain.<br>
<input type="radio" name="traveling" value="2"> (2) I can drive my car as long as I want with moderate neck pain.<br>
<input type="radio" name="traveling" value="3"> (3) I cannot drive my car as long as I want because of moderate neck pain.<br>
<input type="radio" name="traveling" value="4"> (4) I can hardly drive at all because of severe neck pain.<br>
<input type="radio" name="traveling" value="5"> (5) I cannot drive my car at all because of neck pain.<br><br>
<b>Recreation</b><br>
<input type="radio" name="sociallife" value="0"> (0) I am able to engage in all my recreation activities without neck pain.<br>
<input type="radio" name="sociallife" value="1"> (1) I am able to engage in all my usual recreation activities with some neck pain.<br>
<input type="radio" name="sociallife" value="2"> (2) I am able to engage in most but not all my usual recreation activities because of neck pain.<br>
<input type="radio" name="sociallife" value="3"> (3) I am only able to engage in a few of my usual recreation activities because of neck pain.<br>
<input type="radio" name="sociallife" value="4"> (4) I can hardly do any recreation activities because of neck pain.<br>
<input type="radio" name="sociallife" value="5"> (5) I cannot do any recreation activities at all.<br><br>
<b>Headaches</b><br>
<input type="radio" name="changing" value="0"> (0) I have no headaches at all.<br>
<input type="radio" name="changing" value="1"> (1) I have slight headaches which comes infrequently.<br>
<input type="radio" name="changing" value="2"> (2) I have moderate headaches which come infrequently.<br>
<input type="radio" name="changing" value="3"> (3) I have moderate headaches which come frequently.<br>
<input type="radio" name="changing" value="4"> (4) I have severe headaches which come frequently.<br>
<input type="radio" name="changing" value="5"> (5) I have headaches almost all the time.<br><br>
</td></tr></tbody></table>
    </td></tr></tbody></table></td></tr></tbody></table>
</form></body></html>
