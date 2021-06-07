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
<form name="encform" enctype="multipart/form-data"
	action="{{ route('patient.update',$data->id) }}" method="POST">
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
			<option value="" selected="">Select</option><option value="08/31/2020">08/31/2020</option></select>&nbsp;&nbsp;&nbsp;&nbsp;
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
		<td style="background-image:url('/nlimages/navbgactive.png');background-repeat:no-repeat;background-position:center;" id="ientinfo.phptd" align="center"><b><a href="{{route('patient.edit',$data->id )}}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a></b></td></tr><tr height="40">
			<td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="ilyhistory.phptd" onmouseover="changebg('ilyhistory.php','on','');" onmouseout="changebg('ilyhistory.php','off','')" align="center">
				<a href="{{URL::to('/familyhistory/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="ialhistory.phptd" onmouseover="changebg('ialhistory.php','on','');" onmouseout="changebg('ialhistory.php','off','')" align="center">
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

<div id="visitlist" style="position: fixed; width: 1111px; left: 238px; top: 52px; height: 47px; z-index: 1; overflow: auto hidden; display: inline-block; white-space: nowrap;">
<table style="width: 1111px;" id="visittable" cellspacing="0" cellpadding="0" border="0" bgcolor="#d9d9d9">
<tbody><tr height="30">
<td style="width:90px" valign="middle" align="left">&nbsp;
	<a href="">
<img src="{{ asset('nlimages/plus.png') }}" style="display:inline"></a> <a href=""><img src="{{ asset('nlimages/edit.png') }}" style="display:inline"></a>
<a href="{{ route('patient.edit',$data->id) }}?print=true">
	<img src="{{ asset('nlimages/print.png') }}"></a></td>
<td style="background-repeat:no-repeat;background-image:url('/nlimages/tab.png');width:150px;" align="center"><b><font color="white"></font></b> <a href="javascript:pickanencounter('08/31/2020');" style="color:white;"></a></td><td>&nbsp;</td>
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
<script>
function affect(id){
	if(document.getElementById(id).value=='mm'||document.getElementById(id).value=='dd'||document.getElementById(id).value=='yyyy'){
	document.getElementById(id).value='';
	document.getElementById(id).style.color='black';
	}
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
function formsubmit(thefile){
	document.patientinfoform.deleteimage.value=thefile;
	document.patientinfoform.submit();
}
</script>
<form name="patientinfoform" enctype="multipart/form-data" action="patientinfo.php" method="post">
<input type="hidden" name="submitted" value="true">
<input type="hidden" name="deleteimage">
<center><table width="80%" cellspacing="0" cellpadding="10">
<tbody><tr><td colspan="6" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><font size="+2">Personal Info</font></td></tr>

<tr bgcolor="#f1f1f1"><td>Nickname:</td><td><input name="nickname" value="{{ old('nickname',$data->nickname) }}"></td>
<td>Street</td><td><input name="street" value="{{ old('street',$data->street) }}"></td>
<td>Case Indicator:</td><td width="200"><input name="caseindicator" value="{{ old('caseindicator',$data->caseindicator) }}"></td></tr>

<tr><td>First Name:</td><td><input name="firstname" value="{{ old('firstname',$data->firstname) }}"></td>
<td>City:</td><td><input name="city" value="{{ old('city',$data->city) }}"></td>
<td>Status:</td><td><select name="status"><option value="" selected=""></option><option value="Active" {{ old('status', $data->status) == 'Active' ? 'selected="selected"' : '' }}>Active</option>
	<option value="Inactive" {{ old('status', $data->status) == 'Inactive' ? 'selected="selected"' : '' }}>Inactive</option></select></td></tr>
<tr bgcolor="#f1f1f1"><td>Middle Initial:</td><td><input name="middleinitial"
	value="{{ old('middleinitial',$data->middleinitial) }}"></td>
<td>State:</td><td><input name="state" value="{{ old('state',$data->state) }}"></td>
<td>Referred By: <select name="referredbytype" id="referredbytype" onchange="showreferredby ();"><option value=""></option><option value="Patient" {{ old('referredbytype', $data->referredbytype) == 'Patient' ? 'selected="selected"' : '' }}>Patient</option><option value="Doctor" {{ old('referredbytype', $data->referredbytype) == 'Doctor' ? 'selected="selected"' : '' }}>Doctor</option><option value="Other" {{ old('referredbytype', $data->referredbytype) == 'Other' ? 'selected="selected"' : '' }}>Other</option></select></td><td><div id="patientdiv" style="display:none;">Name: <select name="referredbypatient"><option value=""></option><option value=" "> </option><option value=""></option><option value="Demo Patient"></option></select></div>
<div id="otherdiv" style="display:none;">Name: <input name="referredby" value="" style="width:125px"></div></td></tr>
<script>
function showreferredby(){
	if(document.getElementById('referredbytype').value=='Patient'){
		document.getElementById('patientdiv').style.display='block';
		document.getElementById('otherdiv').style.display='none';
	}
	else if(document.getElementById('referredbytype').value=='Other'||document.getElementById('referredbytype').value=='Doctor'){
		document.getElementById('patientdiv').style.display='none';
		document.getElementById('otherdiv').style.display='block';
	}
	else{
		document.getElementById('patientdiv').style.display='none';
		document.getElementById('otherdiv').style.display='none';
	}
}
showreferredby();
</script>
<tr><td>Last Name:</td><td><input name="lastname" value="{{ old('lastname',$data->lastname) }}"></td>
<td>Zip Code:</td><td><input name="zip" value="{{ old('zip',$data->zip) }}"></td>
<td>Payment Type:</td><td><select name="paymenttype" onchange="showpaymentoptions();" id="paymenttype"><option value="">Select</option>
<option value="Cash">Cash</option><option value="Insurance">Insurance</option></select></td></tr>

<tr bgcolor="#f1f1f1"><td>Suffix:</td><td><input name="suffix" value="{{ old('suffix',$data->suffix) }}"></td>
<td>Home Phone:</td><td><input name="homephone" value="{{ old('homephone',$data->homephone) }}"></td>
<td><div id="cashoptions1" style="display:none;">Cost per visit:</div><div id="insuranceoptions1" style="display:none;">Network:</div></td>
<td><div id="cashoptions2" style="display:none;">$ <input name="costpervisit" size="3" value="{{ old('costpervisit',$data->costpervisit) }}"></div><div id="insuranceoptions2" style="display:none;">
<select name="network"><option value=""></option><option value="In Network">In Network</option><option value="Out Of Network">Out Of Network</option>?</select></div></td></tr>

<tr><td>DOB:</td><td><input name="dobmonth" id="month" onfocus="affect('month');" size="1" onblur="out('month');" value="{{ old('dobmontht',$data->dobmonth) }}"> / <input name="dobday" id="day" onfocus="affect('day');" size="1" onblur="out('day');" value="{{ old('dobday',$data->dobday) }}"> / <input name="dobyear" id="year" onfocus="affect('year');" size="2" onblur="out('year');" value="{{ old('dobyear',$data->dobyear) }}"></td>

<td>Work Phone:</td><td><input name="workphone" value="{{ old('workphone',$data->workphone) }}"></td>
<td><div id="cashoptions3" style="display:none;">Package:</div><div id="insuranceoptions3" style="display:none;">Co-pay</div></td>
<td><div id="cashoptions4" style="display:none;"><select name="package"><option value=""></option>
<option value="Package 1">Package 1</option><option value="Package 2">Package 2</option></select>
</div><div id="insuranceoptions4" style="display:none;">$ <input name="copay" size="3" value="{{ old('copay',$data->copay) }}"></div></td></tr>

<tr bgcolor="#f1f1f1"><td>Sex:</td><td>
	<input type="radio" name="sex" value="male" {{ $data->sex == 'male' ? 'checked' : ''}}> Male
<input type="radio" name="sex" value="female" {{ $data->sex == 'female' ? 'checked' : ''}}> Female</td>
<td>Cell Phone:</td><td><input name="cellphone" value="{{ old('cellphone',$data->cellphone) }}"></td>
<td>Co-insurance:</td><td><input name="coinsurance" size="3" value="{{ old('coinsurance',$data->coinsurance) }}">
<select name="coinsurancedp">
<option value="$">$</option><option value="%">%</option></select></td></tr>
<script>
function showpaymentoptions(){
	for(var i=1;document.getElementById('cashoptions'+i)!=null;i++){
		if(document.getElementById('paymenttype').value=='Cash'){
			document.getElementById('cashoptions'+i).style.display='block';
			document.getElementById('insuranceoptions'+i).style.display='none';
		}
		if(document.getElementById('paymenttype').value=='Insurance'){
			document.getElementById('cashoptions'+i).style.display='none';
			document.getElementById('insuranceoptions'+i).style.display='block';
		}
		if(document.getElementById('paymenttype').value==''){
			document.getElementById('cashoptions'+i).style.display='none';
			document.getElementById('insuranceoptions'+i).style.display='none';
		}
	}
}
showpaymentoptions();
</script>
<tr><td>Alternate No:</td><td><input name="alternateno" value="{{ old('alternateno',$data->alternateno) }}"></td>
<td>Email:</td><td><input name="email" value="{{ old('email',$data->email) }}"></td>
<td><div id="cashoptions5" style="display:none;"></div><div id="insuranceoptions5" style="display:none;"></div></td>
<td><div id="cashoptions6" style="display:none"><a href="{{route('patientportal')}}">Payments</a></div><div id="insuranceoptions6" style="display:none;">
<a href="">Insurance Info</a></div></td></tr>
<tr bgcolor="#f1f1f1"><td>Appt Reminders:</td><td><input type="radio" name="apptreminders" value="on" {{ $data->apptreminder == 'on' ? 'checked' : ''}}> On <input type="radio" name="apptreminders" value="off" {{ $data->apptreminder == 'off' ? 'checked' : ''}}> Off</td>
<td>Carrier:</td><td><select name="carrier"><option value="">Select Carrier</option>
<option value="AT&amp;T" {{ old('carrier', $data->carrier) == 'AT&amp;T' ? 'selected="selected"' : '' }}>AT&amp;T</option>
<option value="T-Mobile" {{ old('carrier', $data->carrier) == 'T-Mobile' ? 'selected="selected"' : '' }}>T-Mobile</option>
<option value="Verizon" {{ old('carrier', $data->carrier) == 'Verizon' ? 'selected="selected"' : '' }}>Verizon</option>
<option value="Sprint" {{ old('carrier', $data->carrier) == 'Sprint' ? 'selected="selected"' : '' }}>Sprint</option>
<option value="Virgin Mobile" {{ old('carrier', $data->carrier) == 'Virgin Mobile' ? 'selected="selected"' : '' }}>Virgin Mobile</option>
<option value="Tracfone" {{ old('carrier', $data->carrier) == 'Tracfone' ? 'selected="selected"' : '' }}>Tracfone</option>
<option value="Metro PCS">Metro PCS</option><option value="U.S. Cellular">U.S. Cellular</option><option value="Cricket Wireless">Cricket Wireless</option><option value="Consumer Cellular">Consumer Cellular</option><option value="Boost Mobile">Boost Mobile</option><option value="Straight Talk">Straight Talk</option><option value="Thumb Cellular">Thumb Cellular</option><option value="Ultra Mobile">Ultra Mobile</option><option value="Xfinity">Xfinity</option><option value="Union Wireless">Union Wireless</option><option value="GCI Mobile">GCI Mobile</option><option value="Republic Wireless">Republic Wireless</option><option value="Project Fi Google">Project Fi Google</option></select></td>
<td>PI:</td><td>
<select name="pitype"><option value="Select"></option>
<option value="Auto Accident" {{ old('pitype', $data->pitype) == 'Auto Accident' ? 'selected="selected"' : '' }}>Auto Accident</option>
<option value="Workers Comp" {{ old('pitype', $data->pitype) == 'Workers Comp' ? 'selected="selected"' : '' }}>Workers Comp</option></select>
</td></tr>

<tr><td>Patient Photo:</td>
<td><input name="patientphoto" type="file"></td>
<td>Language:</td><td><select name="language"><option value="" selected="">Select Language</option>
<option value="English" {{ old('language', $data->language) == 'English' ? 'selected="selected"' : '' }}>English</option>
<option value="Spanish" {{ old('language', $data->language) == 'Spanish' ? 'selected="selected"' : '' }} >Spanish</option>
<option value="Chinese" {{ old('language', $data->language) == 'Chinese' ? 'selected="selected"' : '' }} >Chinese</option>
<option value="French" {{ old('language', $data->language) == 'French' ? 'selected="selected"' : '' }}>French</option>
<option value="Tagalog" {{ old('language', $data->language) == 'Tagalog' ? 'selected="selected"' : '' }}>Tagalog</option>
<option value="Vietnamese" {{ old('language', $data->language) == 'Vietnamese' ? 'selected="selected"' : '' }}>Vietnamese</option><option value="Korean">Korean</option><option value="German" {{ old('language', $data->language) == 'German' ? 'selected="selected"' : '' }}>German</option><option value="Arabic" {{ old('language', $data->language) == 'Arabic' ? 'selected="selected"' : '' }}>Arabic</option>
<option value="Russian" {{ old('language', $data->language) == 'Russian' ? 'selected="selected"' : '' }} >Russian</option>
<option value="Italian" {{ old('language', $data->language) == 'Italian' ? 'selected="selected"' : '' }} >Italian</option>
<option value="Portuguese" {{ old('language', $data->language) == 'Portuguese' ? 'selected="selected"' : '' }}>Portuguese</option>
<option value="Hindi" {{ old('language', $data->language) == 'Hindi' ? 'selected="selected"' : '' }}>Hindi</option>
<option value="Polish" {{ old('language', $data->language) == 'Polish' ? 'selected="selected"' : '' }}>Polish</option>
<option value="Japanese" {{ old('language', $data->language) == 'Japanese' ? 'selected="selected"' : '' }}>Japanese</option>
<option value="Urdu" {{ old('language', $data->language) == 'Urdu' ? 'selected="selected"' : '' }}>Urdu</option>
<option value="Persian" {{ old('language', $data->language) == 'Persian' ? 'selected="selected"' : '' }}>Persian</option>
<option value="Gujarati" {{ old('language', $data->language) == '"Gujarati' ? 'selected="selected"' : '' }}>Gujarati</option>
<option value="Greek" {{ old('language', $data->language) == '"Greek' ? 'selected="selected"' : '' }}>Greek</option>
<option value="Bengali" {{ old('language', $data->language) == '"Bengali' ? 'selected="selected"' : '' }}>Bengali</option>
<option value="Panjabi" {{ old('language', $data->language) == '"Panjabi' ? 'selected="selected"' : '' }}>Panjabi</option>
<option value="Telugu" {{ old('language', $data->language) == '"Telugu' ? 'selected="selected"' : '' }}>Telugu</option>
<option value="Armenian" {{ old('language', $data->language) == '"Armenian' ? 'selected="selected"' : '' }}>Armenian</option>
<option value="Hmong" {{ old('language', $data->language) == '"Hmong' ? 'selected="selected"' : '' }}>Hmong</option>
<option value="Hebrew" {{ old('language', $data->language) == '"Hebrew' ? 'selected="selected"' : '' }}>Hebrew</option> </select></td>
<td>Date patient created:</td>
<td><input name="datecreatedmonth" value="{{ $data->created_at->format('m') }}" size="1">
<input name="datecreatedday" value="{{ $data->created_at->format('d') }}" size="1"><input name="datecreatedyear" value="{{ $data->created_at->format('Y') }}" size="2">
</td></tr>
<input type="hidden" class="form-control" name="id"  value="{{ $data->id }}">
<tr bgcolor="#d9d9d9"><td colspan="6" align"left"="" style="border-top:2px solid #999494;border-bottom:2px solid #999494;" align="right"><input type="image" name="submitbutton" value="Save" src="{{ asset('nlimages/savebutton.png') }}"></td></tr>
</tbody></table><br></center>
</form>
    </td></tr></tbody></table>
  <center>
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block" style="width: 60%; margin-top: 100px;">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>{{ $message }}</strong>
    </div>
	@endif
</center>
</td></tr></tbody></table>
</form></body></html>
