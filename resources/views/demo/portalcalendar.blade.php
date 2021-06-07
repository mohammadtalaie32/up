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
<script>
function changebg2(i){
	document.getElementById(i).style.backgroundColor="#e58080";
}
function changeback(i){
	document.getElementById(i).style.backgroundColor="#ffffff";
}
function creatediv(time){
	newDiv = document.createElement("div");
	newDiv.id="newDiv";
	var nexttime=time+1;
	var ampm='AM';var nextampm='AM';
	var showtime=time;
	var shownexttime=nexttime
	if(time>12){
		ampm='PM';
		showtime-=12;
	}
	else if(time==12)
		ampm='PM';
	if(nexttime>12){
		nextampm='PM';
		shownexttime-=12;
	}
	if(nexttime==12)
		nextampm='PM';
	newDiv.innerHTML = '<div align="right"><a href="javascript:removechild()"><img src="images/xsmall.png"></a></div><br><form name=deleteform action= method=post>Start time: <select name="starttime"><option value="'+time+'">'+showtime+':00 '+ampm+'</option></select><br>End time: <select name="starttime"><option value="'+nexttime+'">'+shownexttime+':00 '+nextampm+'</option></select><br>Event name: <input name="eventname"><br>Event description: <input name="eventdescription"><br><br><input type="submit" value="Submit"></form>';
	newDiv.style.position='absolute';
	//screenwidth=screen.width;
	//screenheight=screen.height;
	newDiv.style.left='500px';
	newDiv.style.top='500px';
	newDiv.style.width='400px';
	newDiv.style.height='300px';
	newDiv.style.border='2px solid #004389';
	newDiv.style.background='#C5E2FF';
//	newDiv.style.border-left: 1px solid red";
	// add the newly created element and it's content into the DOM
	//my_div = document.getElementById("upload");
	document.body.appendChild(newDiv);
}
function removechild(){
	document.body.removeChild(document.getElementById("newDiv"));
}
</script>
<b>View:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('portalcalendar') }}?view=day">Day</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{ route('portalcalendar') }}?view=week">Week</a><br><br><center></center><div id="maintable" style="position:relative;"><table cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
	<table><tbody><tr><td style="border-bottom:solid 1px black" height="40">5:00 AM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">6:00 AM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">7:00 AM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">8:00 AM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">9:00 AM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">10:00 AM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">11:00 AM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">12:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">1:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">2:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">3:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">4:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">5:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">6:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">7:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">8:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">9:00 PM</td></tr><tr><td style="border-bottom:solid 1px black" height="40">10:00 PM</td></tr></tbody></table></td><td width="700"><table width="700"><tbody><tr><td id="5" style="border-bottom: 1px solid black; background-color: rgb(255, 255, 255);" onmouseover="changebg2('5')" onmouseout="changeback('5')" onclick="creatediv(5);" width="700" height="40"></td></tr><tr><td id="6" style="border-bottom: 1px solid black; background-color: rgb(255, 255, 255);" onmouseover="changebg2('6')" onmouseout="changeback('6')" onclick="creatediv(6);" width="700" height="40"></td></tr><tr><td id="7" style="border-bottom: 1px solid black; background-color: rgb(255, 255, 255);" onmouseover="changebg2('7')" onmouseout="changeback('7')" onclick="creatediv(7);" width="700" height="40"></td></tr><tr><td id="8" style="border-bottom: 1px solid black; background-color: rgb(255, 255, 255);" onmouseover="changebg2('8')" onmouseout="changeback('8')" onclick="creatediv(8);" width="700" height="40"></td></tr><tr><td id="9" style="border-bottom: 1px solid black; background-color: rgb(255, 255, 255);" onmouseover="changebg2('9')" onmouseout="changeback('9')" onclick="creatediv(9);" width="700" height="40"></td></tr><tr><td id="10" style="border-bottom: 1px solid black; background-color: rgb(255, 255, 255);" onmouseover="changebg2('10')" onmouseout="changeback('10')" onclick="creatediv(10);" width="700" height="40"></td></tr><tr><td id="11" style="border-bottom: 1px solid black; background-color: rgb(255, 255, 255);" onmouseover="changebg2('11')" onmouseout="changeback('11')" onclick="creatediv(11);" width="700" height="40"></td></tr><tr><td id="12" style="border-bottom:solid 1px black" onmouseover="changebg2('12')" onmouseout="changeback('12')" onclick="creatediv(12);" width="700" height="40"></td></tr><tr><td id="13" style="border-bottom:solid 1px black" onmouseover="changebg2('13')" onmouseout="changeback('13')" onclick="creatediv(13);" width="700" height="40"></td></tr><tr><td id="14" style="border-bottom:solid 1px black" onmouseover="changebg2('14')" onmouseout="changeback('14')" onclick="creatediv(14);" width="700" height="40"></td></tr><tr><td id="15" style="border-bottom:solid 1px black" onmouseover="changebg2('15')" onmouseout="changeback('15')" onclick="creatediv(15);" width="700" height="40"></td></tr><tr><td id="16" style="border-bottom:solid 1px black" onmouseover="changebg2('16')" onmouseout="changeback('16')" onclick="creatediv(16);" width="700" height="40"></td></tr><tr><td id="17" style="border-bottom:solid 1px black" onmouseover="changebg2('17')" onmouseout="changeback('17')" onclick="creatediv(17);" width="700" height="40"></td></tr><tr><td id="18" style="border-bottom:solid 1px black" onmouseover="changebg2('18')" onmouseout="changeback('18')" onclick="creatediv(18);" width="700" height="40"></td></tr><tr><td id="19" style="border-bottom:solid 1px black" onmouseover="changebg2('19')" onmouseout="changeback('19')" onclick="creatediv(19);" width="700" height="40"></td></tr><tr><td id="20" style="border-bottom:solid 1px black" onmouseover="changebg2('20')" onmouseout="changeback('20')" onclick="creatediv(20);" width="700" height="40"></td></tr><tr><td id="21" style="border-bottom:solid 1px black" onmouseover="changebg2('21')" onmouseout="changeback('21')" onclick="creatediv(21);" width="700" height="40"></td></tr><tr><td id="22" style="border-bottom:solid 1px black" onmouseover="changebg2('22')" onmouseout="changeback('22')" onclick="creatediv(22);" width="700" height="40"></td></tr></tbody></table></td></tr></tbody></table></div>    </td></tr></tbody></table></td></tr></tbody></table>
</form></body></html>
