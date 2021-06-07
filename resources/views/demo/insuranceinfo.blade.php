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
<form name="encform" enctype="multipart/form-data" action="{{ route('updateinsurance',$data->id)}}" method="POST">
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
		 <b></b> <img src="{{ asset('nlimages/radioinactive.png') }}" height="14"> </a> <a href="javascript:pickanencounter('','editvisits.php')">
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
<tbody><tr><td "="" align="center"><img src="{{ asset('nlimages/patientinformation.png') }}"></td></tr><tr height="40"><td style="background-image: url(&quot;/asssets/demo/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ientinfo.phptd" onmouseover="changebg('ientinfo.php','on','');" onmouseout="changebg('ientinfo.php','off','')" align="center"><a href="{{route('patient.edit',$data)}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ilyhistory.phptd" onmouseover="changebg('ilyhistory.php','on','');" onmouseout="changebg('ilyhistory.php','off','')" align="center"><a href="{{URL::to('/familyhistory/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ialhistory.phptd" onmouseover="changebg('ialhistory.php','on','');" onmouseout="changebg('ialhistory.php','off','')" align="center"><a href="{{URL::to('/socialhistory/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Social History</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="existingconditions.phptd" onmouseover="changebg('existingconditions.php','on','');" onmouseout="changebg('existingconditions.php','off','')" align="center"><a href="{{URL::to('/preexistingconditions/'.$data->id) }}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Pre-Existing Conditions</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgactive.png');background-repeat:no-repeat;background-position:center;" id="uranceinfo.phptd" align="center"><b><a href="{{URL::to('/socialhistory/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Insurance Info</div></a></b></td></tr><tr><td "="" align="center"><img src="{{ asset('nlimages/visitinformation.png') }}"></td></tr><tr height="40"><td style="background-color:#606069;border-top:2px solid black;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="subjectivetd" onmouseover="changebg('subjective','on','');" onmouseout="changebg('subjective','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Subjective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="objectivetd" onmouseover="changebg('objective','on','');" onmouseout="changebg('objective','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Objective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="assessmenttd" onmouseover="changebg('assessment','on','');" onmouseout="changebg('assessment','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Assessment</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="plantd" onmouseover="changebg('plan','on','');" onmouseout="changebg('plan','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Plan</div></a></td></tr><tr height="40"><td style="border-top:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gressnotes.phptd" onmouseover="changebg('gressnotes.php','on','');" onmouseout="changebg('gressnotes.php','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Progress Notes</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgcoding.png');background-repeat:no-repeat;background-position:center;" id="essmenticd.phptd" onmouseover="changebg('essmenticd.php','on','coding');" onmouseout="changebg('essmenticd.php','off','coding')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Daily Coding</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="orithm.phptd" onmouseover="changebg('orithm.php','on','');" onmouseout="changebg('orithm.php','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Algorithm</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gress.phptd" onmouseover="changebg('gress.php','on','');" onmouseout="changebg('gress.php','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Overview</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="msrom.phptd" onmouseover="changebg('msrom.php','on','');" onmouseout="changebg('msrom.php','off','')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exams</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgexercises.png');background-repeat:no-repeat;background-position:center;" id="rcises.phptd" onmouseover="changebg('rcises.php','on','exercises');" onmouseout="changebg('rcises.php','off','exercises')" align="center"><a href="" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exercises</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="eduler.phptd" onmouseover="changebg('eduler.php','on','');" onmouseout="changebg('eduler.php','off','')" align="center">
	<a href="{{ route('scheduler')}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
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
<form action="insuranceinfo.php" method="post">
<input type="hidden" name="submit" value="true"><center>
<table cellspacing="0" cellpadding="10">
<tbody><tr><td colspan="3" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><font size="+2">Insurance Information</font>
 </td></tr>
<tr bgcolor="#f1f1f1"><td>Carrier Name:</td><td colspan="2"><input name="carriername" value="{{ old('carriername',$data->carriername) }}"></td></tr>
<tr><td>Insured Name:</td><td colspan="2"><input name="insuredname" value="{{ old('insuredname',$data->insuredname) }}"></td></tr>
<tr><td>Claims Adjuster:</td><td colspan="2"><input name="claimsadjuster" value="{{ old('claimsadjuster',$data->claimsadjuster) }}"></td></tr>
<tr bgcolor="#f1f1f1"><td>Insured DOB:</td><td colspan="2"><input name="insureddob" value="{{ old('insureddob',$data->insureddob) }}"></td></tr>

<tr><td>Relationship to Insured:</td><td colspan="2"><select name="relationshiptoinsured">

	<option value="Self" {{ old('relationshiptoinsured', $data->relationshiptoinsured) == 'Self' ? 'selected="selected"' : '' }}>Self</option><option value="Spouse" {{ old('relationshiptoinsured', $data->relationshiptoinsured) == 'Spouse' ? 'selected="selected"' : '' }} >Spouse</option>
	<option value="Child" value="Child" {{ old('relationshiptoinsured', $data->relationshiptoinsured) == 'Child' ? 'selected="selected"' : '' }}
	>Child</option></select></td></tr>
<tr bgcolor="#f1f1f1"><td>Insured's Policy Number:</td><td colspan="2"><input name="policynumber" value="{{ old('policynumber',$data->policynumber) }}"></td></tr>
<tr><td>Group Number:</td><td colspan="2"><input name="groupnumber" value="{{ old('groupnumber',$data->groupnumber) }}"></td></tr>
<tr bgcolor="#f1f1f1"><td>Claim Number:</td><td colspan="2"><input name="claimnumber" value="{{ old('claimnumber',$data->claimnumber) }}"></td></tr>
<tr><td>Phone Number:</td><td colspan="2"><input name="phonenumber" value="{{ old('phonenumber',$data->phonenumber) }}"></td></tr>
<tr bgcolor="#f1f1f1"><td>Number of Visits Authorized:</td><td colspan="2"><input name="visitsauthorized" value="{{ old('visitsauthorized',$data->visitsauthorized) }}"></td></tr>
<tr><td>Visits Already Used:</td><td colspan="2"><input name="visitsused" value="{{ old('visitsused',$data->visitsused) }}"></td></tr>
<tr bgcolor="#f1f1f1"><td></td><td align="center"><b>IN NETWORK</b></td><td><b>OUT OF NETWORK</b></td></tr>
<tr><td>Deductible</td><td><input name="insindeductible" value="{{ old('insindeductible',$data->insindeductible) }}"></td>
	<td><input name="insoutdeductible" value="{{ old('insindeductible',$data->insindeductible) }}"></td></tr>
<tr bgcolor="#f1f1f1"><td>Remaining</td><td><input name="insinremaining" value="{{ old('insinremaining',$data->insinremaining) }}"></td>
	<td><input name="insoutremaining" value="{{ old('insoutremaining',$data->insoutremaining) }}"></td></tr>
<tr><td>Co-Insurance</td><td><input name="insincoinsurance" value="{{ old('insincoinsurance',$data->insincoinsurance) }}"></td>
	<td><input name="insoutcoinsurance" value="{{ old('insoutcoinsurance',$data->insoutcoinsurance) }}"></td></tr>
<tr bgcolor="#f1f1f1"><td>Co-Pay</td><td><input name="insincopay"
	value="{{ old('insincopay',$data->insincopay) }}"></td>
	<td><input name="insoutcopay" value="{{ old('insoutcopay',$data->insoutcopay) }}"></td></tr>
<tr><td>Notes</td><td colspan="2"><textarea name="insnotes" rows="3" cols="50">{{ $data->insnotes }}</textarea></td></tr>
<tr bgcolor="#d9d9d9"><td colspan="3" style="border-top:2px solid #999494;border-bottom:2px solid #999494;" align="right">
	<input type="image" src="{{ asset('nlimages/savebutton.png') }}"></td></tr>
<center>
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block" style="width: 60%; margin-top: 100px;">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>{{ $message }}</strong>
    </div>
	@endif
</center>
</tbody></table>
</center>
    </form></td></tr>
</tbody></table></td></tr></tbody></table>
</form></body></html>
