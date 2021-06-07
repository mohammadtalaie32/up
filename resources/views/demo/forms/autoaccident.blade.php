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

<font size="+2"><b>Automobile Accident Description</b></font><br><br>
Please answer the questions below. If you do not know the answer to any of the questions, do not answer that question.<br><br>
<table cellspacing="0" cellpadding="5" border="1"><tbody><tr><td>1. Your vehicle type</td><td>2. Your position in vehicle</td><td>3. What was your vehicle doing at the time of the accident?</td></tr>
<tr><td><input type="radio" name="vehicletype" value="Car"> Car <input type="radio" name="vehicletype" value="Station Wagon"> Station Wagon<br>
<input type="radio" name="vehicletype" value="Van"> Van <input type="radio" name="vehicletype" value="Pickup Truck"> Pickup Truck<br>
<input type="radio" name="vehicletype" value="Large Truck"> Large Truck <input type="radio" name="vehicletype" value="Bus"> Bus<br>
<input type="radio" name="vehicletype" value="Other"> Other <input name="vehicletypeother"></td>
<td><input type="radio" name="positioninvehicle" value="Driver"> Driver <input type="radio" name="positioninvehicle" value="Front Passenger"> Front Passenger<br>
<input type="radio" name="positioninvehicle" value="Left Rear Passenger"> Left Rear Passenger<br>
<input type="radio" name="positioninvehicle" value="Right Rear Passenger"> Right Rear Passenger<br>
<input type="radio" name="positioninvehicle" value="Other"> Other <input name="positioninvehiclother"></td>
<td><input type="radio" name="vehicledoing" value="Stopped at intersection"> Stopped at intersection
<input type="radio" name="vehicledoing" value="Stopped in traffic"> Stopped in traffic
<input type="radio" name="vehicledoing" value="Stopped at light"> Stopped at light<br>
<input type="radio" name="vehicledoing" value="Making a right turn"> Making a right turn
<input type="radio" name="vehicledoing" value="Making a left turn"> Making a left turn
<input type="radio" name="vehicledoing" value="Parking"> Parking<br>
<input type="radio" name="vehicledoing" value="Proceeding along"> Proceeding along
<input type="radio" name="vehicledoing" value="Slowing down"> Slowing down
<input type="radio" name="vehicledoing" value="Accelerating"> Accelerating<br>
<input type="radio" name="vehicledoing" value="Other"> Other <input name="vehicledoingother"></td></tr>
<tr><td>4. Time/Speed/Damage</td><td>5. Details of Accident</td><td>6. Road Condition</td></tr>
<tr><td>Time of accident <input name="time"><br>
Your vehicle's speed: <input name="speed"> mph<br>
Their vehicle's speed: <input name="theirspeed"> mph<br>
Damage to your vehicle<br>
<input type="radio" name="damage" value="Mild"> Mild <input type="radio" name="damage" value="Moderate"> Moderate<br>
<input type="radio" name="damage" value="Totaled"> Totaled</td>
<td valign="top">Visibility at time of accident<br>
<input name="visibilty" value="Poor"> Poor <input name="visibilty" value="Fair"> Fair
    </td></tr></tbody></table></td></tr></tbody></table>
</td></tr></tbody></table></form></body></html>
