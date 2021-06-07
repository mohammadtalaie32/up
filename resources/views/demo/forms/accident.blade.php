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
<b>Auto-Accident History :</b><br><br>
<table width="1050" cellspacing="0" cellpadding="5" border="1"><tbody><tr><td width="450">
Date of Accident :	</td><td width="300"><input name="date" value=""></td>
<td width="150">Time of Accident : </td><td width="150"><input name="time" size="10"> <select name="ampm"><option value="AM">AM</option><option value="PM">PM</option></select></td></tr>
<tr><td>
What type of vehicle were you in? : Make :	</td><td><input name="vehiclemake"></td>
<td>Year : </td><td><input name="vehicleyear"></td></tr>
<tr><td>Where were you in the vehicle? : </td><td><input type="checkbox" name="where[]" value="Passenger"> Passenger<br>
<input type="checkbox" name="where[]" value="Front"> Front <input type="checkbox" name="where[]" value="Back"> Back<br>  <input type="checkbox" name="where[]" value="Left-Side"> Left-Side<input type="checkbox" name="where[]" value="Right-Side"> Right-Side</td></tr>
<tr><td>What was the speed of your vehicle?	</td><td><input name="vehiclespeed" value=""></td></tr>
<tr><td>Was it ?</td>
<td> <input type="radio" name="wasit" value="DayLight"> DayLight <input type="radio" name="wasit" value="Night"> Night <input type="radio" name="wasit" value="Dusk"> Dusk <input type="radio" name="wasit" value="Dawn"> Dawn </td></tr>
<tr><td>What was the visibility?</td>
<td><input type="radio" name="wasit" value="Excellent"> Excellent <input type="radio" name="wasit" value="Reduced"> Reduced </td></tr>
<tr><td>Type of Road?</td>
<td><input type="radio" name="wasit" value="2-Lane"> 2-Lane <input type="radio" name="wasit" value="3-Lane"> 3-Lane <input type="radio" name="wasit" value="4-Lane"> 4-Lane <input type="radio" name="wasit" value="Tar"> Tar </td></tr>
<tr><td>What were the Road conditions?</td>
<td><input type="radio" name="wasit" value="Slippery"> Slippery <input type="radio" name="wasit" value="Wet"> Wet <input type="radio" name="wasit" value="Dry"> Dry <input type="radio" name="wasit" value="Damp"> Damp <input type="radio" name="wasit" value="Muddy"> Muddy <input type="radio" name="wasit" value="Sandy"> Sandy <input type="radio" name="wasit" value="Icy"> Icy </td></tr>
<tr><td>Did it happen at?</td>
<td><input type="radio" name="wasit" value="Traffic Light"> Traffic Light <input type="radio" name="wasit" value="Stop Sign"> Stop Sign <input type="radio" name="wasit" value="Intersection"> Intersection <input type="radio" name="wasit" value="Highway"> Highway </td></tr>
<tr><td>Was your Car Hit?</td>
<td><input type="radio" name="wasit" value="Front"> Front <input type="radio" name="wasit" value="Back"> Back <input type="radio" name="wasit" value="Left-Side"> Left-Side <input type="radio" name="wasit" value="Right-Side"> Right-Side </td></tr>
<tr><td>If you Struck another car, did you strike it at?</td>
<td><input type="radio" name="wasit" value="Front"> Front <input type="radio" name="wasit" value="Back"> Back <input type="radio" name="wasit" value="Left-Side"> Left-Side <input type="radio" name="wasit" value="Right-Side"> Right-Side </td></tr>
<tr><td>Damage to your Car?	</td><td><input name="damagetoyourcar" value=""></td></tr>
<tr><td>Damage to the another Car?</td><td><input name="damagetoanothercar" value=""></td></tr>
<tr><td>Air Bags Deployed?	</td>
<td><input type="radio" name="wasit" value="Yes"> Yes <input type="radio" name="wasit" value="No"> No </td></tr>
<tr><td>Was Police Report Filed?</td>
<td><input type="radio" name="wasit" value="Yes"> Yes <input type="radio" name="wasit" value="No"> No </td></tr>
<tr><td colspan="4"><hr></td></tr>
<tr><td>Did you hit any part of your body during the collision, for example: head on dash, chest on steering wheel?	</td>
<td><input type="radio" name="wasit" value="Yes"> Yes <input type="radio" name="wasit" value="No"> No </td></tr>
<tr><td>If yes,  which part and how :</td><td><input name="whichpart" value=""></td></tr>
<tr><td>What was the position of your head and neck prior to impact :	</td>
<td><input type="radio" name="wasit" value="Up"> Up <input type="radio" name="wasit" value="Down"> Down <input type="radio" name="wasit" value="Level"> Level <input type="radio" name="wasit" value="Straight"> Straight </td></tr>
<tr><td>Were you reclined?	</td>
<td><input type="radio" name="wasit" value="Yes"> Yes <input type="radio" name="wasit" value="No"> No </td></tr>
<tr><td>Seats Belt On?	</td>
<td><input type="radio" name="wasit" value="Yes"> Yes <input type="radio" name="wasit" value="No"> No </td></tr>
<tr><td>Shoulder Harnest On :	</td>
<td><input type="radio" name="wasit" value="Yes"> Yes <input type="radio" name="wasit" value="No"> No </td></tr>
<tr><td>Position of Headrest?	</td>
<td><input type="radio" name="wasit" value="Adjusted Low"> Adjusted Low <input type="radio" name="wasit" value="Adjusted High"> Adjusted High <input type="radio" name="wasit" value="Improperly Adjusted"> Improperly Adjusted <input type="radio" name="wasit" value="Normal"> Normal </td></tr>
<tr><td>Were you conscious after the accident?	</td>
<td><input type="radio" name="conscious" value="Yes"> Yes <input type="radio" name="conscious" value="No"> No </td></tr>
<tr><td>Did you receive emergency care at the scene?</td>
<td><input type="radio" name="emergencycare" value="Yes"> Yes <input type="radio" name="emergencycare" value="No"> No </td></tr>
<tr><td>Were you hospitalized?	</td>
<td><input type="radio" name="hospitalized" value="Yes"> Yes <input type="radio" name="hospitalized" value="No"> No </td></tr>
<tr><td>If yes, for how long? :	<input name="howlonghospitalized" value=""></td></tr>
<tr><td>Describe any additional details about the Accident :</td><td><textarea name="additionaldetails"></textarea></td></tr>
<tr><td colspan="4"><hr></td></tr>
<tr><td>Have you retained an Attorney?	</td>
<td><input type="radio" name="attorney" value="Yes"> Yes <input type="radio" name="attorney" value="No"> No </td></tr>
<tr><td>If yes, Name and Address of Attorney:	</td><td><input></td></tr>
    </tbody></table></td></tr></tbody></table>
</td></tr></tbody></table></form></body></html>
