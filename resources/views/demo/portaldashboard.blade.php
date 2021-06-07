<html>
<head>
	<link href="{{ asset('assets/front/styles.css') }}" type="text/css" rel="stylesheet">
</head>
<body class="font" style="margin:0;padding:0;">
<form name="encform" action="" method="post">
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table style="background-color:#5f5f61;color:white;" width="100%" height="52" cellspacing="0" cellpadding="5" border="0">
	<tbody><tr height="50"><td width="30%">
<table style="color:white;">
	<tbody><tr><td width="130" valign="middle"><a href="{{ route('demo') }}">
		<img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle"><a href="{{ route('logout') }}"><img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="admin.php"><img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td><td width="10"></td>
<td align="center">Welcome, Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" width="40%" valign="middle" align="center">

</td><td width="20%" align="right"><a href="{{ route('demo') }}" style="color:white;font-size:18px;">Admin Portal</a></td><td style="border-left:none;" width="10%" align="right"><a href="{{route('patientportal')}}"><img src="{{ asset('nlimages/home.png') }}" style="display:inline;"></a></td></tr>

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
<tr id="portalcalendar.phptr" onmouseover="changebg('portalcalendar.php','on');" onmouseout="changebg('portalcalendar.php','off')" height="50"><td width="75" valign="middle" align="right">
	<img src="{{ asset('nlimages/portal/calendar.png') }}" style="display:inline;" height="30"> </td><td style="font-size:18px;">&nbsp;&nbsp;<a href="{{ route('portalcalendar') }}" style="color:black;text-decoration:none;">Calendar</a></td></tr><tr id="" onmouseover="changebg('portaldashboard.php','on');" onmouseout="changebg('portaldashboard.php','off')" style="" height="50"><td width="75" valign="middle" align="right">
	<img src="{{ asset('nlimages/portal/dashboard.png') }}" style="display:inline;" height="30"> </td><td style="font-size:18px;">&nbsp;&nbsp;
		<a href="{{ route('portaldashboard') }}" style="color:black;text-decoration:none;">Dashboard</a></td></tr><tr id="" onmouseover="changebg('portalcustomers.php','on');" onmouseout="changebg('portalcustomers.php','off')" style="" height="50"><td width="75" valign="middle" align="right">
	<img src="{{ asset('nlimages/portal/customers.png') }}" style="display:inline;" height="30"> </td><td style="font-size:18px;">&nbsp;&nbsp;<a href="{{ route('portalcustomers') }}" style="color:black;text-decoration:none;">Customers</a></td></tr><tr id="portalcheckout.phptr" onmouseover="changebg('portalcheckout.php','on');" onmouseout="changebg('portalcheckout.php','off')" style="" height="50"><td width="75" valign="middle" align="right">
	<img src="{{ asset('nlimages/portal/checkout.png') }}" style="display:inline;" height="30"> </td><td style="font-size:18px;">&nbsp;&nbsp;<a href="{{ route('portalcheckout') }}" style="color:black;text-decoration:none;">Checkout</a></td></tr><tr id="portalreports.phptr" onmouseover="changebg('portalreports.php','on');" onmouseout="changebg('portalreports.php','off')" style="" height="50"><td width="75" valign="middle" align="right">
	<img src="{{ asset('nlimages/portal/reports.png') }}" style="display:inline;" height="30"> </td><td style="font-size:18px;">&nbsp;&nbsp;<a href="{{ route('portalreports')}}" style="color:black;text-decoration:none;">Reports</a></td></tr><tr id="portalforms.phptr" onmouseover="changebg('portalforms.php','on');" onmouseout="changebg('portalforms.php','off')" style="" height="50"><td width="75" valign="middle" align="right">
	<img src="{{ asset('nlimages/portal/forms.png') }}" style="display:inline;" height="30"> </td><td style="font-size:18px;">&nbsp;&nbsp;<a href="{{ route('portalforms') }}" style="color:black;text-decoration:none;">Forms</a></td></tr>
</tbody></table>
</div>
</td>
<td id="viewport" width="100%" valign="top" align="left">
<table width="100%" cellpadding="10 "><tbody><tr><td width="100%" valign="top">
    </td></tr></tbody></table></td></tr></tbody></table>
</form></body></html>
