<html><head><script>
var divs=['subjective','objective','assessment','plan'];
var active='';
function scrollintoview(page){
  document.getElementById(page+'hr').scrollIntoView();
 // var coding=''; if(page=='assessmenticd.php') coding='coding';
  for(var i=0;i<divs.length;i++){
	  document.getElementById(divs[i]+'td').style.backgroundImage="url('nlimages/navbg.png')";
	  document.getElementById(divs[i]+'link').style.color="#606062";
	  document.getElementById(divs[i]+'link').style.fontWeight="normal";
  }
  document.getElementById(page+'td').style.backgroundImage="url('nlimages/navbgactive.png')";
  document.getElementById(page+'link').style.color="white";
  document.getElementById(page+'link').style.fontWeight="bold";
  active=page;
}
</script>
<link href="{{ asset('assets/front/styles.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/front/stylebg.css') }}" type="text/css" rel="stylesheet">
</head><body class="font" ')"="" style="margin:0;padding:0;">
<script>
function showvisitdates(){
	if(document.getElementById('visitdropdown').style.display=='none')
		document.getElementById('visitdropdown').style.display='block';
	else if(document.getElementById('visitdropdown').style.display=='block')
		document.getElementById('visitdropdown').style.display='none';
}
</script>
<form name="encform" action="{{ route('patient.store') }}" method="POST">
@csrf
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table id="mainmenutable" style="background-color:#5f5f61;color:white;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;"><tbody><tr><td width="130" valign="middle">
	<a href="{{route('demo') }}"><img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle"><a href="{{route('logout')}}">
	<img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="{{ route('admin')}}"><img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td>
<td align="center">Welcome,<br>Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="">
<input type="hidden" name="gotodate">
<font size="+1">Please select a patient to begin!</font></td><td width="12%" align="right"><a href="{{route('patientportal')}}" style="color:white;font-size:18px;">Patient Portal</a></td><td style="border-left:none;" width="4%" align="right"><a href="{{route('demo')}}?clear=true">
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
		if(onoff=='on') document.getElementById(id+'td').style.backgroundImage='url(nlimages/navbg'+coding+'on.png)';
		if(onoff=='off') document.getElementById(id+'td').style.backgroundImage='url(nlimages/navbg'+coding+'.png)';
	}
}
</script>
<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr><td>&nbsp;</td></tr><tr height="40"><td style="background-image: url('nlimages/navbg.png'); background-repeat: no-repeat; background-position: center center;" id="age.phptd" onmouseover="changebg('age.php','on','');" onmouseout="changebg('age.php','off','')" align="center"><a href="{{route('demo')}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">All Patients</div></a></td></tr><tr><td>&nbsp;</td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgactive.png');background-repeat:no-repeat;background-position:center;" id="patient.phptd" align="center"><b><a href="{{ route('patient.create')}}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">New Patient</div></a></b></td></tr></tbody></table>
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
<form action="" method="post">
<input type="hidden" name="submit" value="Save">
<script>
function affect(id){
	document.getElementById(id).value='';
	document.getElementById(id).style.color='black';
}
function out(id){
	var theval;
	if(id=='month'){ theval='mm'; }
	if(id=='day') theval='dd'; if(id=='year') theval='yyyy';
	if(document.getElementById(id).value==''){
	document.getElementById(id).style.color='gray';
	document.getElementById(id).value=theval;
	}
}
</script>
<center>
<table width="80%" cellspacing="0" cellpadding="10" border="0">
<tbody><tr><td colspan="8" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><font size="+2">New Patient</font></td></tr>
<tr bgcolor="#f1f1f1"><td colspan="8" style="border-bottom:2px solid #999494;"><b>Personal Information</b></td></tr>
<tr><td>First name:</td><td><input name="firstname"></td><td>M.I.</td><td><input name="middleinitial"></td>
<td>Last Name</td><td colspan="3"><input name="lastname"></td></tr>
<tr><td>Street:</td><td><input name="street"></td><td>City:</td><td><input name="city"></td>
<td>Zip Code:</td><td><input name="zip"></td><td>State:</td><td><select name="state"><option value="" selected=""></option>
<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option></select></td></tr>
<tr><td>Home Phone:</td><td><input name="homephone"></td><td>Work Phone:</td><td><input name="workphone"></td>
<td>Cell Phone:</td><td><input name="cellphone"></td><td>Email:</td><td><input name="email"></td></tr>
<tr><td>DOB:</td><td><input name="dobmonth" id="month" value="mm" style="color:gray;" onfocus="affect('month');" size="1" onblur="out('month');"> / <input name="dobday" id="day" value="dd" style="color:gray;" onfocus="affect('day');" size="1" onblur="out('day');"> / <input name="dobyear" id="year" value="yyyy" style="color:gray;" onfocus="affect('year');" size="2" onblur="out('year');"></td><td>SSN:</td><td><input name="ssn"></td>
<td>Marital Status:</td><td><select name="maritalstatus"><option value="" selected=""></option><option value="Single">Single</option><option value="Married">Married</option></select></td><td>Sex:</td><td><input type="radio" name="sex" value="male"> Male
<input type="radio" name="sex" value="female"> Female</td></tr>

<tr bgcolor="#f1f1f1"><td colspan="8" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><b>Employer Information</b></td></tr>

<tr><td>Employer:</td><td><input name="employer"></td><td>Occupation</td><td><input name="occupation"></td>
<td>Status:</td><td><select name="status"><option value="" selected=""></option><option value="Active">Active</option>
	<option value="Inactive">Inactive</option></select></td></tr>

<tr bgcolor="#f1f1f1"><td colspan="8" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><b>Family Information</b></td></tr>

<tr><td>Spouse Last Name:</td><td><input name="spouselastname"></td><td>First Name:</td><td><input name="spousefirstname"></td>
<td>SSN:</td><td><input name="spousessn"></td><td>DOB:</td><td><input name="spousedob"></td></tr>

<tr bgcolor="#f1f1f1"><td colspan="8" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><b>Emergency Contact</b></td></tr>
<tr><td>Name:</td><td><input name="emergencyname"></td>
<td>Relationship:</td><td><input name="emergencyrelationship"></td></tr>
<tr><td>Home Phone:</td><td><input name="emergencyhomephone"></td><td>Cell Phone:</td><td><input name="emergencycellphone"></td></tr>

<tr bgcolor="#d9d9d9"><td colspan="8" style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
<input type="image" src="{{ asset('nlimages/savebutton.png') }}"></td></tr>
</tbody></table></center>
</form>
    </td></tr></tbody></table></td></tr></tbody></table>
</form></body></html>
