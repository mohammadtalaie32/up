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
</head><body class="font" ')"="" style="margin:0;padding:0;">
<script>
function showvisitdates(){
	if(document.getElementById('visitdropdown').style.display=='none')
		document.getElementById('visitdropdown').style.display='block';
	else if(document.getElementById('visitdropdown').style.display=='block')
		document.getElementById('visitdropdown').style.display='none';
}
</script>
<form name="encform" enctype="multipart/form-data" action="{" method="POST">
	 @csrf
     @method('PUT')
  <input type="hidden" class="form-control" name="id" value="">
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table id="mainmenutable" style="background-color:#5f5f61;color:white;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;"><tbody><tr><td width="130" valign="middle"><a href="#"><img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle"><a href="{{route('logout')}}"><img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="{{ route('admin')}}"><img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td>
<td align="center">Welcome,<br>Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="insuranceinfo.php">
<input type="hidden" name="gotodate">
<font size="+1"><strong>Patient selected:</strong> ,  <script>if(window.innerWidth<1280) document.write('<br>');else document.write('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <strong>Visit: </strong> <select name="pick" onchange="javascript:pickencounter();">
			<option value="" selected="">Select</option><option value=""></option></select>&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="{{ asset('nlimages/calendar.png') }}" onclick="showvisitdates()" ;="">
		<div style="position:absolute;width:100%;top:25px;left:0px;background-color:#f1f1f1;display:none;color:black;border:2px solid #d9d9d9;z-index:2;text-align:center;" id="visitdropdown"><a href="javascript:pickanencounter('');" style="text-decoration:none;color:black">
		 <b>#1:</b> <img src="{{ asset('nlimages/radioinactive.png') }}" height="14"> 03/27/2020</a> <a href="javascript:pickanencounter('','editvisits.php')">
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
<tbody><tr><td "="" align="center"><img src="{{ asset('nlimages/patientinformation.png') }}"></td></tr><tr height="40"><td style="background-image: url(&quot;/asssets/demo/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ientinfo.phptd" onmouseover="changebg('ientinfo.php','on','');" onmouseout="changebg('ientinfo.php','off','')" align="center"><a href="patientinfo.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ilyhistory.phptd" onmouseover="changebg('ilyhistory.php','on','');" onmouseout="changebg('ilyhistory.php','off','')" align="center"><a href="familyhistory.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="ialhistory.phptd" onmouseover="changebg('ialhistory.php','on','');" onmouseout="changebg('ialhistory.php','off','')" align="center"><a href="socialhistory.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Social History</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="existingconditions.phptd" onmouseover="changebg('existingconditions.php','on','');" onmouseout="changebg('existingconditions.php','off','')" align="center"><a href="preexistingconditions.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Pre-Existing Conditions</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgactive.png');background-repeat:no-repeat;background-position:center;" id="uranceinfo.phptd" align="center"><b><a href="insuranceinfo.php" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Insurance Info</div></a></b></td></tr><tr><td "="" align="center"><img src="{{ asset('nlimages/visitinformation.png') }}"></td></tr><tr height="40"><td style="background-color:#606069;border-top:2px solid black;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="subjectivetd" onmouseover="changebg('subjective','on','');" onmouseout="changebg('subjective','off','')" align="center"><a href="soap.php?p=subjective" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Subjective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="objectivetd" onmouseover="changebg('objective','on','');" onmouseout="changebg('objective','off','')" align="center"><a href="soap.php?p=objective" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Objective</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="assessmenttd" onmouseover="changebg('assessment','on','');" onmouseout="changebg('assessment','off','')" align="center"><a href="soap.php?p=assessment" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Assessment</div></a></td></tr><tr height="40"><td style="background-color:#606069;border-left:2px solid black;border-right:2px solid black;background-image:url('nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="plantd" onmouseover="changebg('plan','on','');" onmouseout="changebg('plan','off','')" align="center"><a href="soap.php?p=plan" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Plan</div></a></td></tr><tr height="40"><td style="border-top:2px solid black;background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gressnotes.phptd" onmouseover="changebg('gressnotes.php','on','');" onmouseout="changebg('gressnotes.php','off','')" align="center"><a href="progressnotes.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Progress Notes</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgcoding.png');background-repeat:no-repeat;background-position:center;" id="essmenticd.phptd" onmouseover="changebg('essmenticd.php','on','coding');" onmouseout="changebg('essmenticd.php','off','coding')" align="center"><a href="assessmenticd.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Daily Coding</div></a></td></tr><tr height="40"><td style="background-image: url(&quot;/nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="orithm.phptd" onmouseover="changebg('orithm.php','on','');" onmouseout="changebg('orithm.php','off','')" align="center"><a href="algorithm.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Algorithm</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="gress.phptd" onmouseover="changebg('gress.php','on','');" onmouseout="changebg('gress.php','off','')" align="center"><a href="progress.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Patient Overview</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="msrom.phptd" onmouseover="changebg('msrom.php','on','');" onmouseout="changebg('msrom.php','off','')" align="center"><a href="examsrom.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exams</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbgexercises.png');background-repeat:no-repeat;background-position:center;" id="rcises.phptd" onmouseover="changebg('rcises.php','on','exercises');" onmouseout="changebg('rcises.php','off','exercises')" align="center"><a href="exercises.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Exercises</div></a></td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="eduler.phptd" onmouseover="changebg('eduler.php','on','');" onmouseout="changebg('eduler.php','off','')" align="center"><a href="scheduler.php" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
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
<script>
var datearr={'': '03/27/2020'};
var painarr={'': ''};
var dates=['03/27/2020'];
function showdate(date){
	//if(document.getElementById(date).style.display!='none')
	//document.write(document.getElementById(date).style.display);
	if(document.getElementById(date).style.display=='block'){
		document.getElementById(date+'link').style.color='black';
		document.getElementById(date).style.display='none';
	    document.getElementById(date+'img').src='nlimages/radioinactive.png';
	}
	else if(document.getElementById(date).style.display=='none'){
		  document.getElementById(date+'img').src='nlimages/radioactive.png';
		document.getElementById(date+'link').style.color='#86c441';
		document.getElementById(date).style.display='block';
	}
}
function showall(){
	for(var i=0;i<dates.length;i++){  document.getElementById(dates[i]+'img').src='nlimages/radioactive.png';
		 document.getElementById(dates[i]+'link').style.color='#86c441';
	document.getElementById(dates[i]).style.display='block';
	 //document.getElementById('objective'+i).style.display='block';
	  }
}
function hideall(){
	for(var i=0;i<dates.length;i++){   document.getElementById(dates[i]+'img').src='nlimages/radioinactive.png';
	document.getElementById(dates[i]+'link').style.color='black';
	 document.getElementById(dates[i]).style.display='none';
	 //document.getElementById('objective'+i).style.display='none';
	 }
}
function graph(complaint){
			if(document.getElementById('grapher').style.display=='none') document.getElementById('grapher').style.display='block';
			var colorNames = Object.keys(window.chartColors);
			var colorName = colorNames[config.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];
			var newDataset = {
				label: complaint,
				backgroundColor: newColor,
				borderColor: newColor,
				data: [],
				fill: false
			};
			var dates=datearr[complaint].split(',');
			var pains=painarr[complaint].split(',');
			for (var index = 0; index < dates.length; ++index) {
				newDataset.data.push( {x:dates[index],y:pains[index]});
			}
			//document.write('yes');
			config.data.datasets.push(newDataset);
			window.myLine.update();
}
function showobjective(i){
	if(document.getElementById('objective'+i).style.display=='block')
		document.getElementById('objective'+i).style.display='none';
	else if(document.getElementById('objective'+i).style.display=='none')
		document.getElementById('objective'+i).style.display='block';
}
function selectencounter(ed){
	document.getElementById('encounterdate').value=ed;
	document.form.submit();
}
</script>
<form name="form" action="progress.php" method="post">
<input type="hidden" name="encounterdate" id="encounterdate"></form>
<hr><font size="+2">Patient Overview</font><hr><br>
Show Dates:
<a id="03/27/2020link" href="javascript:showdate('03/27/2020');" style="text-decoration: none; color: black;"><img src="nlimages/radioinactive.png" id="03/27/2020img" height="10"> 03/27/2020</a>&nbsp;&nbsp;&nbsp;<a href="javascript:showall()">Show All</a>&nbsp;&nbsp;&nbsp;<a href="javascript:hideall()">Hide All</a><br><br>
<table style="border:1px solid #d9d9d9" width="100%" cellspacing="0" cellpadding="5" border="1">
	<tbody><tr style="color:white" bgcolor="#606062"><td width="5%">&nbsp;</td><td width="20%" align="center"><b>Chief Complaint</b></td><td width="15%" align="center"><b>Status</b></td><td width="10%" align="center"><b>Phase</b></td>
	<td width="10%" align="center"><b>Severity</b></td>
	<td width="10%" align="center"><b>Paint Type</b></td><td width="10%" align="center"><b>Pain Int</b></td><td width="10%" align="center"><b>% Change</b></td><td width="10%" align="center"><b>Problem Side</b></td></tr></tbody></table>
<div id="03/27/2020" style="display: none;">
<table width="100%" cellspacing="0" cellpadding="5">
	<tbody><tr><td colspan="9" bgcolor="#d2d3d5">03/27/2020 <a href="javascript:showobjective('0');">Objective</a></td></tr><tr><td width="5%" align="center"><img src="images/graph.png" onclick="javascript:graph('')"></td><td width="20%"></td><td width="15%" align="center"></td><td width="10%" align="center"></td><td width="10%" align="center"></td><td width="10%" align="center"></td><td width="10%" align="center"></td><td width="10%" align="center">N/A</td><td width="10%" align="center"></td></tr></tbody></table><div id="objective0" style="display:none;">
	<table style="border:1px solid #f1f1f1" width="100%" cellspacing="0" cellpadding="10" border="1"><tbody><tr><td><b><b>OBJECTIVE FINDINGS</b> :</b><br><br><b>Tenderness / Muscle Spasms</b>:  <br><b>Fixation/Restriced ROM</b>: (<b>L</b>): at Cervical, OCC, C-1, C-2, C-3, C-4, C-5, C-6, C-7<br><b>Regions Adjusted</b>: </td></tr></tbody></table></div></div><center><div id="grapher" style="display:none;">

	<script src="chartjs/Chart.min.js"></script>
	<script src="chartjs/utils.js"></script>
	<style>
	canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
	<div style="width:75%;">
		<canvas id="canvas" style="display: block; height: 0px; width: 0px;" height="0" width="0" class="chartjs-render-monitor"></canvas>
	</div>
	<br>
	<br>
	<script>

		var config = {
			type: 'line',
			data: {
				labels: ['03/27/2020'],
				datasets: [/*{
					label: 'My First dataset',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
		{ x: 1585281600000, y:  }					],
					fill: false,
				}, {
					label: 'My Second dataset',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					],
				}*/]
			},
			options: {
				responsive: true,
				lineTension: 0,
				spanGaps: true,
				elements: {
					line: {
						tension: 0 // disables bezier curves
					}
				},
				/*scale: {
					ticks: {
						min: 0,
						max: 10
					}
				},*/
				title: {
					display: true,
					text: 'Pain Scale Progression'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Date'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Pain Scale'
						}
					}]
				}

			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

	</script></div></center><br>
    </td></tr></tbody></table></td></tr></tbody></table>
</form></body></html>
