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
<font size="+2"><b>Back Index</b></font><br><br>
This questionnaire will give your provider information about how your back condition affects your everyday life. Please answer every section by marking the one statement that applies to you. If two or more statements in one section apply, please mark the one statement that most closely describes your problem.<br><br>
<table width="100%" cellpadding="3"><tbody><tr><td width="50%">
<b>Pain Intensity</b><br>
<input type="radio" name="painintensity" value="0"> (0) The pain comes and goes and is very mild.<br>
<input type="radio" name="painintensity" value="1"> (1) The pain is mild and does not vary much.<br>
<input type="radio" name="painintensity" value="2"> (2) The pain comes and goes and is moderate.<br>
<input type="radio" name="painintensity" value="3"> (3) The pain is moderate and does not vary much.<br>
<input type="radio" name="painintensity" value="4"> (4) The pain comes and goes and is very severe.<br>
<input type="radio" name="painintensity" value="5"> (5) The pain is very severe and does not vary much.<br><br>
<b>Sleeping</b><br>
<input type="radio" name="sleeping" value="0"> (0) I get no pain in bed.<br>
<input type="radio" name="sleeping" value="1"> (1) I get pain in bed but it does not prevent me from sleeping well.<br>
<input type="radio" name="sleeping" value="2"> (2) Because of pain my normal sleep is reduced by less than 25%.<br>
<input type="radio" name="sleeping" value="3"> (3) Because of pain my normal sleep is reduced by less than 50%.<br>
<input type="radio" name="sleeping" value="4"> (4) Because of pain my normal sleep is reduced by less than 75%.<br>
<input type="radio" name="sleeping" value="5"> (5) Pain prevents me from sleeping at all.<br><br>
<b>Sitting</b><br>
<input type="radio" name="sitting" value="0"> (0) I can sit in any chair as long as I like.<br>
<input type="radio" name="sitting" value="1"> (1) I can only sit in my favorite chair as long as I like.<br>
<input type="radio" name="sitting" value="2"> (2) Pain prevents me from sitting more than 1 hour.<br>
<input type="radio" name="sitting" value="3"> (3) Pain prevents me from sitting more than 1/2 hour.<br>
<input type="radio" name="sitting" value="4"> (4) Pain prevents me from sitting more than 10 minutes.<br>
<input type="radio" name="sitting" value="5"> (5) I avoid sitting because it increases pain immediately.<br><br>
<b>Standing</b><br>
<input type="radio" name="standing" value="0"> (0) I can stand as long as I want without pain.<br>
<input type="radio" name="standing" value="1"> (1) I have some pain while standing but it does not increase with time.<br>
<input type="radio" name="standing" value="2"> (2) I cannot stand for longer than 1 hour without increasing pain.<br>
<input type="radio" name="standing" value="3"> (3) I cannot stand for longer than 1/2 hour without increasing pain.<br>
<input type="radio" name="standing" value="4"> (4) I cannot stand for longer than 10 minutes without increasing pain.<br>
<input type="radio" name="standing" value="5"> (5) I avoid standing because it increases pain immediately.<br><br>
<b>Walking</b><br>
<input type="radio" name="walking" value="0"> (0) I have no pain while walking.<br>
<input type="radio" name="walking" value="1"> (1) I have some pain while walking but it doesn't increase with distance.<br>
<input type="radio" name="walking" value="2"> (2) I cannot walk more than 1 mile without increasing pain.<br>
<input type="radio" name="walking" value="3"> (3) I cannot walk more than 1/2 mile without increasing pain.<br>
<input type="radio" name="walking" value="4"> (4) I cannot walk more than 1/4 mile without increasing pain.<br>
<input type="radio" name="walking" value="5"> (5) I cannot walk at all without increasing pain.</td>
<td width="50%">
<b>Personal Care</b><br>
<input type="radio" name="personalcare" value="0"> (0) I do not have to change my way of washing or dressing in order to avoid pain.<br>
<input type="radio" name="personalcare" value="1"> (1) I do not normally change my way of washing or dressing even though is causes some pain.<br>
<input type="radio" name="personalcare" value="2"> (2) Washing and dressing increases the pain but I manage not to change my way of doing it.<br>
<input type="radio" name="personalcare" value="3"> (3) Washing and dressing increases the pain and I find it necessary to change my way of doing it.<br>
<input type="radio" name="personalcare" value="4"> (4) Because of the pain I am unable to do some washing and dressing without help.<br>
<input type="radio" name="personalcare" value="5"> (5) Because of the pain I am unable to do any washing and dressing without help.<br><br>
<b>Lifting</b><br>
<input type="radio" name="lifting" value="0"> (0) I can lift heavy weights without extra pain.<br>
<input type="radio" name="lifting" value="1"> (1) I can lift heavy weights but it causes extra pain.<br>
<input type="radio" name="lifting" value="2"> (2) Pain prevents me from lifting heavy weights off the floor.<br>
<input type="radio" name="lifting" value="3"> (3) Pain prevents me from lifting heavy weights off the floor, but I can manage if they are conveniently positioned (e.g., on a table).<br>
<input type="radio" name="lifting" value="4"> (4) Pain prevents me from lifting heavy weights off the floor, but I can manage light to medium weight if they are conveniently positioned.<br>
<input type="radio" name="lifting" value="5"> (5) I can only lift very light weights.<br><br>
<b>Traveling</b><br>
<input type="radio" name="traveling" value="0"> (0) I get no pain while traveling.<br>
<input type="radio" name="traveling" value="1"> (1) I get some pain while traveling but none of my usual forms of travel make it worse.<br>
<input type="radio" name="traveling" value="2"> (2) I get extra pain while traveling but it does not cause me to seek alternate forms of travel.<br>
<input type="radio" name="traveling" value="3"> (3) I get extra pain while traveling which causes me to seek alternate forms of travel.<br>
<input type="radio" name="traveling" value="4"> (4) Pain restricts all forms of travel except that done while lying down.<br>
<input type="radio" name="traveling" value="5"> (5) Pain restricts all forms of travel.<br><br>
<b>Social Life</b><br>
<input type="radio" name="sociallife" value="0"> (0) My social life is normal and gives me no extra pain.<br>
<input type="radio" name="sociallife" value="1"> (1) My social life is normal but increases the degress of pain.<br>
<input type="radio" name="sociallife" value="2"> (2) Pain has no significant affect on my social life apart from limiting my more energetic interests (e.g., dancing, etc).<br>
<input type="radio" name="sociallife" value="3"> (3) Pain has restricted my social life and I do not go out very often.<br>
<input type="radio" name="sociallife" value="4"> (4) Pain has restricted my social life to my home.<br>
<input type="radio" name="sociallife" value="5"> (5) I have hardly any socail life because of the pain.<br><br>
<b>Changing degree of pain</b><br>
<input type="radio" name="changing" value="0"> (0) My pain is rapidly getting better.<br>
<input type="radio" name="changing" value="1"> (1) My pain fluctuates but overall is definitely getting better.<br>
<input type="radio" name="changing" value="2"> (2) My pain seems to be getting better but improvement is slow.<br>
<input type="radio" name="changing" value="3"> (3) My pain is neither getting better or worse.<br>
<input type="radio" name="changing" value="4"> (4) My pain is gradually worsening.<br>
<input type="radio" name="changing" value="5"> (5) My pain is rapidly worsening.<br><br>
    </td></tr></tbody></table></td></tr></tbody></table>
</td></tr></tbody></table></form></body></html>
