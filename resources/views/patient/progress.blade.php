@extends('layouts.managePO')

@section('content')
 <div class="year-encounter">
                        <div id="visitlist">
                            <table id="visittable" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr height="30">
                                        @php
                                        $currentYear = 0;
                                        @endphp
                                        @forelse ($yearVisits as $i => $visit)
                                            @php
                                            if(null != request('year'))
                                            $currentYear = request('year');
                                            elseif (isset($currentVisit))
                                            $currentYear = $currentVisit->dateyear;
                                            else
                                            if ($i == 0) {
                                            $currentYear = $visit['year'];
                                            }
                                            @endphp
                                            <td id="yeartd"
                                                class="year-tab text-center {{ $currentYear == $visit['year'] ? 'active' : '' }}">
                                                <a href="javascript:pickayear('{{ $visit['year']}},{{$visit['count'] }}');" style="color:black;text-decoration:none;">{{ $visit['year'] }}</a>
                                                <!--<a href="{{ route('manage', [request('id'), $visit['year']]) }}"-->
                                                <!--    class="text-dark">-->
                                                <!--    {{ $visit['year'] }}-->
                                                <!--</a>-->
                                                ({{ $visit['count'] }})
                                            </td>
                                        @empty
                                            <h4 class="text-center">
                                                No Visits
                                            </h4>
                                        @endforelse
                                        @foreach ($visits as $visit)
                                            @if ($visit->billing == 'ready')
                                                @php
                                                $billsrc='billingready';
                                                @endphp
                                            @elseif($visit->billing=='complete')
                                                @php
                                                $billsrc='billingcomplete';
                                                @endphp
                                            @else
                                                @php
                                                $billsrc='billingincomplete';
                                                @endphp
                                            @endif
                                            @if ($visit->payment == 'partial')
                                                @php
                                                $paysrc='paymentpartial';
                                                @endphp
                                            @elseif($visit->payment=='full')
                                                @php
                                                $paysrc ='paymentfull';
                                                @endphp
                                            @else
                                                @php
                                                $paysrc='paymentwaiting';
                                                @endphp
                                            @endif
                                            @if ($visit->dateyear == $currentYear)
                                                @php
                                                $printyear = true;
                                                $activeClass='';
                                                if (null != request('encId')) {
                                                if ($visit->id == (request('encId'))) {
                                                $activeClass = 'active';
                                                }
                                                }
                                                $dateURL = route('soap', [request('id'), $visit->encounterdatesort]);
                                                @endphp
                                                @isset($dateTabs)
                                                    @php
                                                    $dateURL = route('assessmentICD', [request('id'), $visit->id]);
                                                    @endphp
                                                @endisset
                                                <td id="yeartd" class="date-tab {{ $activeClass }} text-center">
                                                    <img src="{{ asset('/nlimages/billing/' . $billsrc . '.png') }}"
                                                        width="15" height="15" style="display:inline;"
                                                        onclick="changeBill('{{ $visit->id }}', '{{ $visit->encounterdate }}','{{ $visit->billing }}')">
                                                    <a href="{{ $dateURL }}" class="text-dark">
                                                        {{ $visit->encounterdatesort }}
                                                    </a>
                                                    <img id="headerbilling{{ $visit->id }}"
                                                        src="{{ asset('/nlimages/billing/' . $paysrc . '.png') }}"
                                                        width="15" height="15" style="display:inline;"
                                                        onclick="headerpreview('{{ $visit->id }}', '{{ $visit->encounterdate }}', '{{ $data->billing }}', '{{ $visit->payment }}', '{{ $visit->billingclaimnumber }}', '{{ $visit->billingdatesent }}', '{{ $visit->billingamount }}', '{{ $visit->codedamount }}', '{{ $visit->billingpaid }}', '{{ $visit->billingnotes }}', '{{ $visit->paymentnotes }}')">
                                                </td>
                                            @else
                                                @php
                                                $printyear = false;
                                                @endphp
                                            @endif
                                            {{-- @if (null != request('year'))
                                                @if ($visit->dateyear == request('year'))
                                                @endif
                                                @else
                                                @if ($visit->dateyear == date('Y'))
                                                    @php
                                                    $printyear = false;
                                                    @endphp
                                                    <td id="yeartd" class="date-tab text-center">
                                                        <img src="{{ asset('/nlimages/billing/' . $billsrc . '.png') }}"
                                                            width="15" height="15" style="display:inline;"
                                                            onclick="changeBill('{{ $visit->id }}', '{{ $visit->encounterdate }}','{{ $visit->billing }}')">
                                                        <a href="{{ route('soap', [request('id'), $visit->encounterdatesort]) }}"
                                                            class="text-dark">
                                                            {{ $visit->encounterdatesort }}
                                                        </a>
                                                        <img id="hea
                                                        derbilling{{ $visit->id }}"
                                                            src="{{ asset('/nlimages/billing/' . $paysrc . '.png') }}"
                                                            height="15" style="display:inline;" width="15"
                                                            onclick="headerpreview('{{ $visit->id }}', '{{ $visit->encounterdate }}',
                                                            '{{ $data->billing }}', '{{ $visit->payment }}', '{{ $visit->billingclaimnumber }}',
                                                            '{{ $visit->billingdatesent }}', '{{ $visit->billingamount }}',
                                                            '{{ $visit->codedamount }}', '{{ $visit->billingpaid }}',
                                                            '{{ $visit->billingnotes }}', '{{ $visit->paymentnotes }}')">
                                                    </td>
                                                @endif
                                            @endif --}}
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
<script>
function changebg(id,onoff,coding){
	if(id!=active){
		if(onoff=='on') document.getElementById(id+'td').style.backgroundImage='url(/nlimages/navbg'+coding+'on.png)';
		if(onoff=='off') document.getElementById(id+'td').style.backgroundImage='url(/nlimages/navbg'+coding+'.png)';
	}
}
</script>





<script>
var yearon="2020";
function pickayear(theyear,visitcount){
	window.alert(visitcount);
	//if(theyear!=yearon){
		//document.encform.encounterviewyear.value=theyear;
		//if(theaction!=null) document.encform.page.value=theaction;
		//document.encform.submit();
		for(var i=0;document.getElementById('encountertd'+yearon+i);i++){
			document.getElementById('encountertd'+yearon+i).style.display='none';
		}
		for(var i=0;document.getElementById('encountertd'+yeartd+i);i++){
			document.getElementById('encountertd'+yeartd+i).style.display='table-cell';
			greatesti=i;
		}
		if(document.getElementById('yeartd'+yearon))
			document.getElementById('yeartd'+yearon).style.backgroundImage='url(nlimages/tabyearinactive.png)';
		document.getElementById('yeartd'+theyear).style.backgroundImage='url(nlimages/tabyearactive.png)';
		yearon=theyear;
		if(parseInt(document.getElementById('viewport').offsetWidth)<basewidth+(greatesti+1)*150){
			document.getElementById('visittable').style.width=basewidth+(greatesti+1)*150+'px';
		}
		else{
			document.getElementById('visittable').style.width=parseInt(document.getElementById('viewport').offsetWidth)+'px';
		}
	//}
}
function pickencounter(){
	document.encform.submit();
}
function pickanencounter(thedate,theaction){
	document.encform.gotodate.value=thedate;
	if(theaction!=null) document.encform.page.value=theaction;
	document.encform.submit();
}
</script>


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
	    document.getElementById(date+'img').src='http://bh-67.whb.tempwebhost.net/~phoenix/nlimages/radioinactive.png';
	}
	else if(document.getElementById(date).style.display=='none'){
		  document.getElementById(date+'img').src='http://bh-67.whb.tempwebhost.net/~phoenix/nlimages/radioactive.png';
		document.getElementById(date+'link').style.color='#86c441';
		document.getElementById(date).style.display='block';
	}
}
function showall(){
	for(var i=0;i<dates.length;i++){  document.getElementById(dates[i]+'img').src='http://bh-67.whb.tempwebhost.net/~phoenix/nlimages/radioactive.png';
		 document.getElementById(dates[i]+'link').style.color='#86c441';
	document.getElementById(dates[i]).style.display='block';
	 //document.getElementById('objective'+i).style.display='block';
	  }
}
function hideall(){
	for(var i=0;i<dates.length;i++){   document.getElementById(dates[i]+'img').src='http://bh-67.whb.tempwebhost.net/~phoenix/nlimages/radioinactive.png';
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
<a id="03/27/2020link" href="javascript:showdate('03/27/2020');" style="text-decoration: none; color: black;"><img src="http://bh-67.whb.tempwebhost.net/~phoenix/nlimages/radioinactive.png" id="03/27/2020img" height="10"> 03/27/2020</a>&nbsp;&nbsp;&nbsp;<a href="javascript:showall()">Show All</a>&nbsp;&nbsp;&nbsp;<a href="javascript:hideall()">Hide All</a><br><br>
<table style="border:1px solid #d9d9d9" width="100%" cellspacing="0" cellpadding="5" border="1">
	<tbody><tr style="color:white" bgcolor="#606062"><td width="5%">&nbsp;</td><td width="20%" align="center"><b>Chief Complaint</b></td><td width="15%" align="center"><b>Status</b></td><td width="10%" align="center"><b>Phase</b></td>
	<td width="10%" align="center"><b>Severity</b></td>
	<td width="10%" align="center"><b>Paint Type</b></td><td width="10%" align="center"><b>Pain Int</b></td><td width="10%" align="center"><b>% Change</b></td><td width="10%" align="center"><b>Problem Side</b></td></tr></tbody></table>
<div id="03/27/2020" style="display: none;">
<table width="100%" cellspacing="0" cellpadding="5">
	<tbody><tr><td colspan="9" bgcolor="#d2d3d5">03/27/2020 <a href="javascript:showobjective('0');">Objective</a></td></tr><tr><td width="5%" align="center"><img src="http://bh-67.whb.tempwebhost.net/~phoenix/images/graph.png" onclick="javascript:graph('')"></td><td width="20%"></td><td width="15%" align="center"></td><td width="10%" align="center"></td><td width="10%" align="center"></td><td width="10%" align="center"></td><td width="10%" align="center"></td><td width="10%" align="center">N/A</td><td width="10%" align="center"></td></tr></tbody></table><div id="objective0" style="display:none;">
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
    </td></tr></tbody></table></td></tr>
    </form>
    @endsection('content')
