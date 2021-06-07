<html>
<head>
	<link href="{{ asset('assets/front/styles.css') }}" type="text/css" rel="stylesheet">
</head>
<body class="font" style="margin:0;padding:0;">
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table style="background-color:#5f5f61;color:white;" width="100%" height="52" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;">
	<tbody><tr><td><img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></td><td width="10"></td><td align="center"></td></tr></tbody></table>
</td>
<td style="border-right:none;" width="40%" valign="middle" align="center">

</td><td width="20%" align="right"></td><td style="border-left:none;" width="10%" align="right"></td></tr>

<tr style="height:2px;" bgcolor="#ce0205"><td colspan="4" style="height:2px;padding:0px;" width="100%"></td></tr></tbody></table>
</div>
<table height="52"><tbody><tr><td><img src="{{ asset('assets/front/images/spacer.png') }}" height="52"></td></tr></tbody></table>
<table width="100%" height="100%" cellspacing="0" cellpadding="0">
<tbody><tr><td width="238" valign="top" bgcolor="#f1f1f1">
<img src="{{ asset('assets/front/images/spacer.png') }}" width="238" height="1">
<div style="position:fixed;top:52px;left:0px;width:238px;height:100%;background-color:#f1f1f1;">
<script>
function changebg(id,onoff,coding){
		if(onoff=='on') document.getElementById(id+'tr').style.backgroundColor='red';
		if(onoff=='off') document.getElementById(id+'tr').style.backgroundColor='';
}
</script>

<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr><td colspan="2">&nbsp;</td></tr>
<tr id="registernewuser.phptr" style="background-color:red;" height="50"><td width="75" valign="middle" align="right">
	<img src="{{ asset('nlimages/portal/customersactive.png') }}" style="display:inline;" height="30"> </td><td style="font-size:18px;">&nbsp;&nbsp;<a href="{{ route('newuser.store') }}" style="color:white;text-decoration:none;">Register</a></td></tr>
</tbody></table>
</div>
</td>
<td id="viewport" width="100%" valign="top" align="left">
<table width="100%" cellpadding="10 "><tbody><tr><td width="100%" valign="top">
<hr><b><font size="+2">Register New Account</font></b><hr>
<font color="red"></font><br>
<form action="{{ route('newuser.store') }}" method="POST">
@csrf
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
	@if ($message = Session::get('error'))
    	<div class="alert alert-danger alert-block" style="width: 35%; color: red;">
        	<strong>{{ $message }}</strong>
        </div>
    @endif
<table width="80%" cellspacing="0" cellpadding="10" border="0">
<tbody><tr bgcolor="#f1f1f1"><td colspan="8" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><b>Personal Information</b></td></tr>
<tr><td>First name:</td><td><input name="firstname" value=""></td><td>M.I.</td><td><input name="middleinitial" value=""></td>
<td>Last Name</td><td colspan="3"><input name="lastname" value=""></td></tr>
<tr><td>Street Address:</td><td><input name="street" value=""></td><td>City:</td><td><input name="city" value=""></td>
<td>State:</td><td><select name="state"><option value="" selected=""></option>
<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option></select></td><td>Zip Code:</td><td><input name="zip" value=""></td></tr>
<script>
function showpassword(conf){
	document.getElementById(conf).type='text';
}
function hidepassword(conf){
	document.getElementById(conf).type='password';
}
</script>
<tr>
<td>Email:</td><td><input name="email" value=""></td><td>Cell Phone:</td><td><input name="cellphone" value=""></td><td>DOB:</td><td><input name="dobmonth" id="month" value="mm" style="color:gray;" onfocus="affect('month');" onblur="out('month');" size="1"> / <input name="dobday" id="day" value="dd" style="color:gray;" onfocus="affect('day');" onblur="out('day');" size="1"> / <input name="dobyear" id="year" value="yyyy" style="color:gray;" onfocus="affect('year');" onblur="out('year');" size="2"></td><td>Sex:</td><td>
<input type="radio" name="sex" value="male"> Male
<input type="radio" name="sex" value="female"> Female</td></tr>
<tr bgcolor="#f1f1f1"><td colspan="8" style="border-top:2px solid #999494;border-bottom:2px solid #999494;"><b>User Account</b></td></tr>
<tr><td colspan="6">
<table cellpadding="5"><tbody><tr><td>Please choose a username: </td><td><input name="username" value=""></td></tr>
<tr><td>Please choose a password: </td><td valign="middle"><input name="password" id="password" type="password"> <img src="{{ asset('nlimages/eye.png') }}" style="display:inline;" onmousedown="showpassword('password');" onmouseup="hidepassword('password');" width="20"></td></tr>
<tr><td>Please confirm password: </td><td valign="middle"><input name="confirmpassword" id="confirmpassword" type="password"> <img src="{{ asset('nlimages/eye.png') }}" style="display:inline;" onmousedown="showpassword('confirmpassword');" onmouseup="hidepassword('confirmpassword');" width="20"></td></tr>
<tr><td>Invite code:<br>(existing patients) </td><td valign="top"><input name="invitecode" value=""></td></tr></tbody></table>
</td></tr>
<tr bgcolor="#d9d9d9"><td colspan="8" style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
<input type="image" src="{{ asset('nlimages/registerbutton.png') }}"></td></tr>
</tbody></table></center>
</form></td></tr></tbody></table></td></tr></tbody></table></body></html>
