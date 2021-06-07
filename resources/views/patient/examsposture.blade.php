<html><head><title>Up2Speed</title><script>
var myimages=new Array()
function preloadimages(){
for (i=0;i<preloadimages.arguments.length;i++){
myimages[i]=new Image()
myimages[i].src=preloadimages.arguments[i]
}
}
//Enter path of images to be preloaded inside parenthesis. Extend list as desired.
// preloadimages("https://www.up2speedtraining.com/patients/nlimages/navbgon.png","https://www.up2speedtraining.com/patients/nlimages/navbgpatienton.png","https://www.up2speedtraining.com/patients/nlimages/navbgexerciseson.png","https://www.up2speedtraining.com/patients/nlimages/navbgcodingon.png")
preloadimages("{{asset('nlimages/navbgon.png')}}","{{asset('nlimages/navbgpatienton.png')}}","{{asset('nlimages/navbgexerciseson.png')}}","{{asset('nlimages/navbgcodingon.png')}}")

</script><script>
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
</script><link href="{{ asset('assets/front/styles.css') }}" type="text/css" rel="stylesheet"></head>



<body class="font" ')"="" style="margin:0;padding:0;">
<script>
function showvisitdates(){
	if(document.getElementById('visitdropdown').style.display=='none')
		document.getElementById('visitdropdown').style.display='block';
	else if(document.getElementById('visitdropdown').style.display=='block')
		document.getElementById('visitdropdown').style.display='none';
}
</script>

<form name="encform" enctype="multipart/form-data" action="{{ route('insertexamposture') }}" method="POST">
	 @csrf
<input type="hidden" class="form-control" name="patient_id" value="{{$data->id}}">

 <input type="hidden" class="form-control" name="id" value="">
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table background="{{asset('nlimages/headerbg.png')}}" id="mainmenutable" style="background-color:#5f5f61;color:white;background-repeat:repeat-x;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0">
<tbody><tr height="50"><td style="padding:0px;" width="30%">
<table style="color:white;"><tbody><tr style="padding:0px;"><td style="padding:0px;" width="150" valign="middle" align="center"><a href="{{ route('patient')}}"><img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" height="50"></a></td><td width="20"></td><td width="50" valign="middle" align="left"><a href="{{ route('logout') }}"><img src="{{ asset('nlimages/logouticon.png') }}" height="60"></a></td><td width="50" valign="middle" align="left">
<a href="{{ route('admin')}}">
	<img src="{{ asset('nlimages/adminicon.png') }}" height="60"></a></td>
<td width="300" align="center">Welcome,<br>Admin User</td></tr></tbody></table></td>

<td style="border-right:none;" id="tdpatientvisit" width="50%" valign="middle" align="center">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="patientinfo.php">
<input type="hidden" name="gotodate">
<input type="hidden" name="encounterviewyear">
<input type="hidden" name="markbilling">
<table><tbody><tr><td></td><td width="10"></td><td style="color:white;"><font size="+1"><strong>Patient selected:</strong> &nbsp;&nbsp;
	<a href="?clear=true">
		<img src="{{ asset('nlimages/checkwhitebox.png') }}" style="display:in-line;position:absolute;top:22px;" height="30"></a>&nbsp;    <script>
	if(window.innerWidth<=1412) document.write('<br>');else document.write('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div style="display:inline;position:relative;"> <strong>Visit: </strong> <select name="pick" onchange="javascript:pickencounter();">
			<option value="" selected="">Select</option></select>&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="{{ asset('nlimages/calendar.png') }}" onclick="showvisitdates()" ;="" style="display:in-line;position:absolute;top:-6px;" height="30">
	<div style="position:absolute;width:300;top:107px;left:0px;background-color:#f1f1f1;display:none;color:black;border:2px solid #d9d9d9;z-index:1;text-align:center;" id="visitdropdown"></div></div></font></td></tr></tbody></table></td><td width="12%" align="right"><a href="{{ route('portalhome') }}" style="color:white;font-size:18px;">
		<img src="{{ asset('nlimages/patientportal.png') }}" style="display:inline;" width="65"></a></td><td style="border-left:none;" width="4%" align="right">
			<a href="{{ route('patient')}}">
				<img src="{{ asset('nlimages/home.png') }}" style="display:inline;" width="65"></a></td></tr>
<tr style="height:2px;" bgcolor="#ce0205"><td colspan="4" style="height:2px;padding:0px;" width="100%"></td></tr></tbody></table>
</div>
<table height="77"><tbody><tr><td><img src="{{ asset('assets/front/images/spacer.png') }}" height="77"></td></tr></tbody></table>
<table width="100%" cellspacing="0" cellpadding="0">
<tbody><tr><td width="238" valign="top" bgcolor="#f1f1f1">
<img src="{{ asset('assets/front/images/spacer.png') }}" width="238" height="1"><div id="sidebar" style="position:fixed;top:0px;left:0px;width:238px;height:100%;background-color:#f1f1f1;overflow-y:auto;overflow-x:hidden;"><div style="position:relative;height:77px;"></div>
<script>
function changebg(id,onoff,coding){
	if(id!=active){
		if(onoff=='on') document.getElementById(id+'td').style.backgroundImage='url(nlimages/navbg'+coding+'on.png)';
		if(onoff=='off') document.getElementById(id+'td').style.backgroundImage='url(nlimages/navbg'+coding+'.png)';
	}
}
</script>
<style type="text/css">
	.tdbg:hover
	{
		background-image: url('/nlimages/navbgpatienton.png');
	}
</style>
<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr style="background-color:#d9d9d9;"><td style="padding:0px;" align="center"><table width="200"><tbody><tr>
<td style="width:50px;padding:0px;" valign="middle" align="center"><a href="?print=true">
	<img src="{{ asset('nlimages/print.png') }}" width="40"></a></td>
<td style="width:100px;padding:0px;" valign="middle" align="center"><a href="">
	<img src="{{ asset('nlimages/new.png') }}" style="display:inline" width="40"></a></td>
<td style="width:50px;padding:0px;" valign="middle" align="center"> </td></tr>
<tr><td valign="top" align="center"><a style="color:black;text-decoration:none;" href="?print=true">PRINT</a></td><td style="padding:0px;" valign="top" align="center"><a style="color:black;text-decoration:none;" href="{{ URL::to('/newencounter/'.$data->id) }}">NEW VISIT</a></td><td valign="top" align="center"></td></tr></tbody></table></td></tr>
<tr><td "="" align="center">
	<img src="{{ asset('nlimages/patientinformation.png') }}"></td></tr><tr height="35">
		<td background="{{ asset('nlimages/navbgactive.png')}}" style="background-repeat:no-repeat;background-position:center;" id="ientinfo.phptd" align="center"><b><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a></b></td></tr>

	<tr height="35"><td class="tdbg" background="{{ asset('nlimages/navbgpatient.png')}}"style="background-repeat:no-repeat;background-position:center;"  align="center" >
		<a href="{{URL::to('/familyhistory/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a></td></tr>

	<tr height="35"><td class="tdbg" background="{{ asset('nlimages/navbgpatient.png')}}" style="background-repeat:no-repeat;background-position:center;" align="center">
		<a href="{{URL::to('/socialhistory/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Social History</div></a></td></tr>

	<tr height="35"><td class="tdbg" background ="{{ asset('nlimages/navbgpatient.png')}}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="{{URL::to('/preexistingconditions/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Pre-Existing Conditions</div></a></td></tr>

	<tr height="35"><td class="tdbg" background ="{{ asset('nlimages/navbgpatient.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="
		{{ URL::to('/insuranceinfo/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Insurance Info</div></a></td></tr>


	<tr height="35"><td class="tdbg" background ="{{ asset('nlimages/navbgpatient.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Billing</div></a></td></tr><tr><td "="" align="center">

		<img src="{{ asset('nlimages/visitinformation.png') }}"></td></tr><tr height="35">
			<td class="tdbg1" background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="{{ URL::to('/subjective/'.$data->id) }}" style="color:white;text-decoration:none;">

				<div style="width:100%;height:100%">Subjective</div></a></td></tr><tr height="35"><td class="tdbg1" background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center">
					<a href="{{ URL::to('/subjective/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">

				Objective</div></a></td></tr><tr height="35"><td td class="tdbg1" background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;"  align="center">
					<a href="{{ URL::to('/subjective/'.$data->id) }}" style="color:white;text-decoration:none;">

					<div style="width:100%;height:100%">Assessment</div></a></td></tr><tr height="35"><td class="tdbg1" background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center">
						<a href="{{ URL::to('/subjective/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Plan</div></a></td></tr>

					<tr height="35">
					<td class="tdbg2"background="{{ asset('nlimages/navbgcoding.png') }}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="{{ URL::to('/assessmenticd/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Daily Coding</div></a></td></tr>
					<tr height="35">
					<td class="tdbg3" background="{{ asset('nlimages/navbgexercises.png') }}"style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="{{URL::to('/exercises/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Exercises</div></a></td></tr><tr height="35">
					<td class="tdbg" background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;"  align="center">
						<a href="{{URL::to('/algorithm/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Progress Notes</div></a></td></tr>

					<tr height="35"><td class="tdbg"background="{{ asset('nlimages/navbgpatient.png') }}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="{{URL::to('/algorithm/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Algorithm</div></a></td></tr>

					<tr height="35"><td class="tdbg"background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="{{URL::to('/progress/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Patient Overview</div></a></td></tr><tr height="35">

					<td class="tdbg" background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="{{ URL::to('/examsrom/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Exams</div></a></td></tr>

					<tr height="35"><td class="tdbg" background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;" align="center"><a href="{{URL::to('/scheduler1/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
</div>
</td>



<td id="viewport" width="100%" valign="top" align="left">
<script>var yearon="2020";//pickayear(yearon);
</script><script>
function pickencounter(){
	document.encform.submit();
}
function pickanencounter(thedate,theaction,bill,billq){
	if(billq==null){
		document.encform.gotodate.value=thedate;
		if(theaction!=null) document.encform.page.value=theaction;
		document.encform.markbilling.value=bill;
		document.encform.submit();
	}
	else if(window.confirm('Mark billing for visit '+thedate+' as '+billq+'?')){
		document.encform.gotodate.value=thedate;
		if(theaction!=null) document.encform.page.value=theaction;
		document.encform.markbilling.value=bill;
		document.encform.submit();
	}
}
	var basewidth=0;
var greatesti;
function pickayear(theyear){
	//window.alert(yearon);
	//if(theyear!=yearon){
		//document.encform.encounterviewyear.value=theyear;
		//if(theaction!=null) document.encform.page.value=theaction;
		//document.encform.submit();
		for(var i=0;document.getElementById('encountertd'+yearon+i);i++){
			document.getElementById('encountertd'+yearon+i).style.display='none';
		}
		for(var i=0;document.getElementById('encountertd'+theyear+i);i++){
			document.getElementById('encountertd'+theyear+i).style.display='table-cell';
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
function changewidth(){
	/*window.alert(parseInt(document.getElementById('viewport').offsetWidth)+' '+(basewidth+greatesti*150));
		if(parseInt(document.getElementById('viewport').offsetWidth)<basewidth+greatesti*150)
			document.getElementById('visittable').style.width=basewidth+(greatesti+1)*150+'px';*/
}
/*for(var i=0;document.getElementById('encountertd'+yearoon+i);i++){
	document.getElementById('encountertd'+yearoon+i).style.display='table-cell';
	greatesti=i;
}*/
window.addEventListener("resize", changewidth);
var headershown='';
function headerpreview(uniquekey,encounterdate,billing,payment,claimnumber,datesent,billedamount,codedamount,billingpaid,billingnotes,paymentnotes){
	var xpos=document.getElementById('headerbilling'+uniquekey).getBoundingClientRect().left;
	if(document.getElementById('headerbp')){
		if(headershown==''||headershown!=uniquekey){
			if(xpos-130+300-208>parseInt(document.getElementById('viewport').offsetWidth)) document.getElementById('headerbp').style.left=document.getElementById('viewport').offsetWidth+238-355;
			//window.alert(parseInt(document.getElementById('viewport').offsetWidth)+' '+(xpos-130+300-238).toString());
			else document.getElementById('headerbp').style.left=xpos-130;
			document.getElementById('headerbp').innerHTML='<table style="border:1px solid #fefefe;" border="1" cellspacing="0" cellpadding="2" width="100%"><tr><td><u>'+encounterdate+'</u></td><td align="right">'+
			'<span style="float:right;"><a href="javascript:headerpreview(\''+uniquekey+'\');"><img src="images/delete.png"></a></td></tr><tr><td colspan="2">&nbsp;</td></tr>'+
				'<tr><td><b>Billing</b>: </td><td>'+billing+'</td></tr>'+
				'<tr><td>Claim #: </td><td>'+claimnumber+'</td></tr>'+
				'<tr><td>Date Sent: </td><td>'+datesent+'</td></tr>'+
				'<tr><td>Billed Amount: <span style="float:right;">$</span></td><td>'+billedamount+'</td></tr>'+
				'<tr><td>(Coded Amount:) <span style="float:right;">$</span></td><td>'+codedamount+'</td></tr>'+
				'<tr><td colspan="2"><strong>Billing Notes:</strong></td></tr><tr><td colspan="2">'+billingnotes+'</td></tr>'+
				'<tr><td><b>Payment</b>: </td><td>'+payment+'</td></tr>'+
				'<tr><td>Insurance Payment: <span style="float:right;">$</span></td><td>'+billingpaid+'</td></tr>'+
				'<tr><td colspan="2"><strong>Payment Notes:</strong></td></tr><tr><td colspan="2">'+paymentnotes+'</td></tr></table>';
			document.getElementById('headerbp').style.display='block';
			headershown=uniquekey;
		}
		else{
			document.getElementById('headerbp').style.display='none';
			headershown='';
		}
	}
}
</script>

<div id="visitlist" style="position: fixed; width: 1287px; left: 238px; top: 77px; height: auto; z-index: 1; overflow: auto visible; display: inline-block; white-space: nowrap;">
<table style="width: 1287px;" id="visittable" cellspacing="0" cellpadding="0" border="0" bgcolor="#d9d9d9">
<tbody><tr height="30"><td>&nbsp;</td>
</tr></tbody></table></div>
	<div style="text-align:left;position:fixed;top:107px;right:0px;height:330px;width:320px;display:none;background-color:#ebf5e5;border:1px solid #15b100;z-index:+2;padding:15px;" id="headerbp">
				</div>
<script>
var position=basewidth+0;
document.getElementById('visittable').style.width=basewidth+(0)*150+'px';
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
	if(document.getElementById('visitlist')) document.getElementById('visitlist').style.top='69px';
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
<a href="{{ URL::to('/examsother/'.$data->id) }}">ROM Tests</a> | Other Tests | <a href="{{ URL::to('/examsposture/'.$data->id) }}">Posture</a> | <a href="{{ URL::to('/examsall/'.$data->id) }}">All Exams</a> | <a href="{{ URL::to('/document/'.$data->id) }}">Documents</a><br><br>
<table width="50%">
<tbody><tr><td>Area</td><td>Left</td><td>Right</td></tr><tr><td>Head</td><td>
	<select name="headleft"><option value=""></option><option value="High" {{ old('headleft', $exam->headleft) == 'High' ? 'selected="selected"' : '' }}>High</option>
	<option value="Low">Low</option>
	<option value="Anterior" {{ old('headleft', $exam->headleft) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option>
	<option value="Posterior" {{ old('headleft', $exam->headleft) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('headleft', $exam->headleft) == 'Int Rotation' ? 'selected="selected"' : '' }}>Int Rotation</option>
	<option value="Ext Rotation" {{ old('headleft', $exam->headleft) == 'Ext Rotation' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('headleft', $exam->headleft) == 'Flat Foot' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('headleft', $exam->headleft) == 'Translation' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('headleft', $exam->headleft) == 'Flexion' ? 'selected="selected"' : '' }}>Flexion</option>
	<option value="Extension" {{ old('headleft', $exam->headleft) == 'Extension' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('headleft', $exam->headleft) == 'Right Lateral Bend' ? 'selected="selected"' : '' }}>Right Lateral Bend</option><option value="Left Lateral Bend"
	{{ old('headleft', $exam->headleft) == 'Left Lateral Bend' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('headleft', $exam->headleft) == 'Right Rotation' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation"
	{{ old('headleft', $exam->headleft) == 'Left Rotation' ? 'selected="selected"' : '' }}>Left Rotation</option>
	<option value="Neutral" {{ old('headleft', $exam->headleft) == 'Neutral' ? 'selected="selected"' : '' }}>Neutral</option>
	<option value="Protruded" {{ old('headleft', $exam->headleft) == 'Protruded' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('headleft', $exam->headleft) == 'Wry' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('headleft', $exam->headleft) == 'Rounded' ? 'selected="selected"' : '' }}>Rounded</option>
	<option value="Shift" {{ old('headleft', $exam->headleft) == 'Shift' ? 'selected="selected"' : '' }}>Shift</option>
	<option value="Kyphosis" {{ old('headleft', $exam->headleft) == 'Kyphosis' ? 'selected="selected"' : '' }}>Kyphosis</option>
	<option value="Valgus" {{ old('headleft', $exam->headleft) == 'Valgus' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('headleft', $exam->headleft) == 'Varus' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('headleft', $exam->headleft) == 'Pronated' ? 'selected="selected"' : '' }}>Pronated</option>
	<option value="Low Arch" {{ old('headleft', $exam->headleft) == 'Low Arch' ? 'selected="selected"' : '' }}>Low Arch</option></select></td><td>
	<select name="headright"><option value=""></option><option value="High" {{ old('headright', $exam->headright) == 'High' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('headright', $exam->headright) == 'Low' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('headright', $exam->headright) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option>
	<option value="Posterior" {{ old('headright', $exam->headright) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('headright', $exam->headright) == 'Int Rotation' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('headright', $exam->headright) == 'Ext Rotation' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('headright', $exam->headright) == 'Flat Foot' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('headright', $exam->headright) == 'Translation' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('headright', $exam->headright) == 'Flexion' ? 'selected="selected"' : '' }}>Flexion</option>
	<option value="Extension" {{ old('headright', $exam->headright) == 'Extension' ? 'selected="selected"' : '' }}>Extension</option>
	<option value="Right Lateral Bend" {{ old('headright', $exam->headright) == 'Right Lateral Bend' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('headright', $exam->headright) == 'Left Lateral Bend' ? 'selected="selected"' : '' }}>Left Lateral Bend</option><option value="Right Rotation" {{ old('headright', $exam->headright) == 'Right Rotation' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('headright', $exam->headright) == 'Left Rotation' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('headright', $exam->headright) == 'Neutral' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('headright', $exam->headright) == 'Protruded' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('headright', $exam->headright) == 'Wry' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('headright', $exam->headright) == 'Rounded' ? 'selected="selected"' : '' }}>Rounded</option>
	<option value="Shift" {{ old('headright', $exam->headright) == 'Shift' ? 'selected="selected"' : '' }}>Shift</option>
	<option value="Kyphosis" {{ old('headright', $exam->headright) == 'Kyphosis' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('headright', $exam->headright) == 'Valgus' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('headright', $exam->headright) == 'Varus' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('headright', $exam->headright) == 'Pronated' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('headright', $exam->headright) == 'Low Arch' ? 'selected="selected"' : '' }}>Low Arch</option></select></td></tr><tr><td>Shoulder</td><td>
	<select name="shoulderleft"><option value=""></option><option value="High" {{ old('shoulderleft', $exam->shoulderleft) == 'High' ? 'selected="selected"' : '' }}>High</option>
	<option value="Low" {{ old('shoulderleft', $exam->shoulderleftt) == 'Low' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('shoulderleft', $exam->shoulderleft) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior"  {{ old('shoulderleft', $exam->shoulderleft) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('shoulderleft', $exam->shoulderleft) == 'Int Rotation' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('shoulderleft', $exam->shoulderleft) == 'Ext Rotation' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('shoulderleft', $exam->shoulderleft) == 'Flat Foot' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('shoulderleft', $exam->shoulderleft) == 'Translation' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('shoulderleft', $exam->shoulderleft) == 'Flexion' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('shoulderleft', $exam->shoulderleft) == 'Extension' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('shoulderleft', $exam->shoulderleft) == 'Right Lateral Bend' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('shoulderleft', $exam->shoulderleft) == 'Left Lateral Bend' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('shoulderleft', $exam->shoulderleft) == 'Right Rotation' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('shoulderleft', $exam->shoulderleft) == 'Left Rotation' ? 'selected="selected"' : '' }}>Left Rotation</option>
	<option value="Neutral" {{ old('shoulderleft', $exam->shoulderleft) == 'Neutral' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('shoulderleft', $exam->shoulderleft) == 'Protruded' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('shoulderleft', $exam->shoulderleft) == 'Wry' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('shoulderleft', $exam->shoulderleft) == 'Rounded' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('shoulderleft', $exam->shoulderleft) == 'Shift' ? 'selected="selected"' : '' }}>Shift</option>
	<option value="Kyphosis" {{ old('shoulderleft', $exam->shoulderleft) == 'Kyphosis' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('shoulderleft', $exam->shoulderleft) == 'Valgus' ? 'selected="selected"' : '' }}>Valgus</option><option value="Varus" {{ old('shoulderleft', $exam->shoulderleft) == 'Varus' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('shoulderleft', $exam->shoulderleft) == 'Pronated' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('shoulderleft', $exam->shoulderleft) == 'Low Arch' ? 'selected="selected"' : '' }}>Low Arch</option></select></td><td>
	<select name="shoulderright"><option value=""></option><option value="High" {{ old('shoulderright', $exam->shoulderright) == 'High' ? 'selected="selected"' : '' }}>High</option>
	<option value="Low" {{ old('shoulderright', $exam->shoulderright) == 'Low' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('shoulderright', $exam->shoulderright) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('shoulderright', $exam->shoulderright) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('shoulderright', $exam->shoulderright) == 'Int Rotation' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('shoulderright', $exam->shoulderright) == 'Ext Rotation' ? 'selected="selected"' : '' }}>Ext Rotation</option>
	<option value="Flat Foot" {{ old('shoulderright', $exam->shoulderright) == 'Flat Foot' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('shoulderright', $exam->shoulderright) == 'Translation' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('shoulderright', $exam->shoulderright) == 'Flexion' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('shoulderright', $exam->shoulderright) == 'Extension' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('shoulderright', $exam->shoulderright) == 'Right Lateral Bend' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('shoulderright', $exam->shoulderright) == 'Left Lateral Bend' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation">Right Rotation</option><option value="Left Rotation" {{ old('shoulderright', $exam->shoulderright) == 'Left Rotation' ? 'selected="selected"' : '' }}>Left Rotation</option>
	<option value="Neutral" {{ old('shoulderright', $exam->shoulderright) == 'Neutral' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('shoulderright', $exam->shoulderright) == 'Protruded' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('shoulderright', $exam->shoulderright) == 'Wry' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('shoulderright', $exam->shoulderright) == 'Rounded' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('shoulderright', $exam->shoulderright) == 'Shift' ? 'selected="selected"' : '' }}>Shift</option><option value="Kyphosis" {{ old('shoulderright', $exam->shoulderright) == 'Kyphosis' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('shoulderright', $exam->shoulderright) == 'Valgus' ? 'selected="selected"' : '' }}>Valgus</option><option value="Varus" {{ old('shoulderright', $exam->shoulderright) == 'Varus' ? 'selected="selected"' : '' }}>Varus</option><option value="Pronated" {{ old('shoulderright', $exam->shoulderright) == 'Pronated' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('shoulderright', $exam->shoulderright) == 'Low Arch' ? 'selected="selected"' : '' }}>Low Arch</option></select></td></tr><tr><td>Ilium</td><td>
	<select name="iliumleft" ><option value=""></option><option value="High" {{ old('shoulderright', $exam->shoulderright) == 'High' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('shoulderright', $exam->shoulderright) == 'Low' ? 'selected="selected"' : '' }}>Low</option><option value="Anterior" {{ old('shoulderright', $exam->shoulderright) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option>
	<option value="Posterior" {{ old('shoulderright', $exam->shoulderright) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option>
	<option value="Int Rotation" {{ old('shoulderright', $exam->shoulderright) == 'Int Rotation' ? 'selected="selected"' : '' }}>Int Rotation</option>
	<option value="Ext Rotation" {{ old('shoulderright', $exam->shoulderright) == 'Ext Rotation' ? 'selected="selected"' : '' }}>Ext Rotation</option>
	<option value="Flat Foot" {{ old('shoulderright', $exam->shoulderright) == 'Flat Foot' ? 'selected="selected"' : '' }}>Flat Foot</option>
	<option value="Translation" {{ old('shoulderright', $exam->shoulderright) == 'Translation' ? 'selected="selected"' : '' }}>Translation</option>
	<option value="Flexion" {{ old('shoulderright', $exam->shoulderright) == 'Flexion' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('shoulderright', $exam->shoulderright) == 'Extension' ? 'selected="selected"' : '' }}>Extension</option>
	<option value="Right Lateral Bend" {{ old('shoulderright', $exam->shoulderright) == 'Right Lateral Bend' ? 'selected="selected"' : '' }}>Right Lateral Bend</option><option value="Left Lateral Bend" {{ old('shoulderright', $exam->shoulderright) == 'Left Lateral Bend' ? 'selected="selected"' : '' }}>Left Lateral Bend</option><option value="Right Rotation" {{ old('shoulderright', $exam->shoulderright) == 'Right Rotation' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('shoulderright', $exam->shoulderright) == 'Left Rotation' ? 'selected="selected"' : '' }}>Left Rotation</option>
	<option value="Neutral" {{ old('shoulderright', $exam->shoulderright) == 'Neutral' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('shoulderright', $exam->shoulderright) == 'Protruded' ? 'selected="selected"' : '' }}>Protruded</option>
	<option value="Wry" {{ old('shoulderright', $exam->shoulderright) == 'Wry' ? 'selected="selected"' : '' }}>Wry</option><option value="Rounded" {{ old('shoulderright', $exam->shoulderright) == 'Rounded' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('shoulderright', $exam->shoulderright) == 'Shift' ? 'selected="selected"' : '' }}>Shift</option><option value="Kyphosis" {{ old('shoulderright', $exam->shoulderright) == 'Kyphosis' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('shoulderright', $exam->shoulderright) == 'Valgus' ? 'selected="selected"' : '' }}>Valgus</option><option value="Varus" {{ old('shoulderright', $exam->shoulderright) == 'Varus' ? 'selected="selected"' : '' }}>Varus</option><option value="Pronated" {{ old('shoulderright', $exam->shoulderright) == 'Pronated' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('shoulderright', $exam->shoulderright) == 'Low Arch' ? 'selected="selected"' : '' }}>Low Arch</option></select></td><td>
	<select name="iliumright"><option value=""></option><option value="High" {{ old('iliumright', $exam->iliumright) == 'High' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('iliumright', $exam->iliumright) == 'Low' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('iliumright', $exam->iliumright) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('iliumright', $exam->iliumright) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('iliumright', $exam->iliumright) == 'Int Rotation' ? 'selected="selected"' : '' }}>Int Rotation</option>
	<option value="Ext Rotation" {{ old('iliumright', $exam->iliumright) == 'Ext Rotation' ? 'selected="selected"' : '' }}>Ext Rotation</option>
	<option value="Flat Foot" {{ old('iliumright', $exam->iliumright) == 'Flat Foot' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('iliumright', $exam->iliumright) == 'Translation' ? 'selected="selected"' : '' }}>Translation</option>
	<option value="Flexion" {{ old('iliumright', $exam->iliumright) == 'Flexion' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('iliumright', $exam->iliumright) == 'Extension' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('iliumright', $exam->iliumright) == 'Right Lateral Bend' ? 'selected="selected"' : '' }}>Right Lateral Bend</option><option value="Left Lateral Bend" {{ old('iliumright', $exam->iliumright) == 'Left Lateral Bend' ? 'selected="selected"' : '' }}>Left Lateral Bend</option><option
	value="Right Rotation" {{ old('iliumright', $exam->iliumright) == 'Right Rotation' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('iliumright', $exam->iliumright) == 'Left Rotation' ? 'selected="selected"' : '' }}>Left Rotation</option>
	<option value="Neutral" {{ old('iliumright', $exam->iliumright) == 'Neutral' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('iliumright', $exam->iliumright) == 'Protruded' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('iliumright', $exam->iliumright) == 'Wry' ? 'selected="selected"' : '' }}>Wry</option><option value="Rounded" {{ old('iliumright', $exam->iliumright) == 'Rounded' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('iliumright', $exam->iliumright) == 'Shift' ? 'selected="selected"' : '' }}>Shift</option><option value="Kyphosis" {{ old('iliumright', $exam->iliumright) == 'Kyphosis' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('iliumright', $exam->iliumright) == 'Valgus' ? 'selected="selected"' : '' }}>Valgus</option><option value="Varus" {{ old('iliumright', $exam->iliumright) == 'Varus' ? 'selected="selected"' : '' }}>Varus</option><option value="Pronated" {{ old('iliumright', $exam->iliumright) == 'Pronated' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('iliumright', $exam->iliumright) == 'Low Arch' ? 'selected="selected"' : '' }}>Low Arch</option></select></td></tr><tr><td>Foot</td><td>
	<select name="footleft"><option value=""></option><option value="High" {{ old('footleft', $exam->footleft) == 'High' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('footleft', $exam->footleft) == 'Low' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('footleft', $exam->footleft) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('footleft', $exam->footleft) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('footleft', $exam->footleft) == 'Int Rotation' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('footleft', $exam->footleft) == 'Ext Rotation' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('footleft', $exam->footleft) == 'Flat Foot' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('footleft', $exam->footleft) == 'Translation' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('footleft', $exam->footleft) == 'Flexion' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('footleft', $exam->footleft) == 'Extension' ? 'selected="selected"' : '' }}>Extension</option><option
	value="Right Lateral Bend" {{ old('footleft', $exam->footleft) == 'Right Lateral Bend' ? 'selected="selected"' : '' }}>Right Lateral Bend</option><option
	value="Left Lateral Bend" {{ old('footleft', $exam->footleft) == 'Left Lateral Bend' ? 'selected="selected"' : '' }}>Left Lateral Bend</option><option
	value="Right Rotation" {{ old('footleft', $exam->footleft) == 'Right Rotation' ? 'selected="selected"' : '' }}>Right Rotation</option><option
	value="Left Rotation" {{ old('footleft', $exam->footleft) == 'Left Rotation' ? 'selected="selected"' : '' }}>Left Rotation</option><option
	value="Neutral" {{ old('footleft', $exam->footleft) == 'Neutral' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('footleft', $exam->footleft) == 'Protruded' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('footleft', $exam->footleft) == 'Wry' ? 'selected="selected"' : '' }}>Wry</option><option value="Rounded" {{ old('footleft', $exam->footleft) == 'Rounded' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('footleft', $exam->footleft) == 'Shift' ? 'selected="selected"' : '' }}>Shift</option><option value="Kyphosis" {{ old('footleft', $exam->footleft) == 'Kyphosis' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('footleft', $exam->footleft) == 'Valgus' ? 'selected="selected"' : '' }}>Valgus</option><option value="Varus" {{ old('footleft', $exam->footleft) == 'Varus' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('footleft', $exam->footleft) == 'Pronated' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('footleft', $exam->footleft) == 'Low Arch' ? 'selected="selected"' : '' }}>Low Arch</option></select></td><td>
	<select name="footright"><option value=""></option><option value="High" {{ old('footright', $exam->footright) == 'High' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('footright', $exam->footright) == 'Low' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('footright', $exam->footright) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('footright', $exam->footright) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('footright', $exam->footright) == 'Int Rotation' ? 'selected="selected"' : '' }}>Int Rotation</option><option
	value="Ext Rotation" {{ old('footright', $exam->footright) == 'Ext Rotation' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('footright', $exam->footright) == 'Flat Foot' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('footright', $exam->footright) == 'Translation' ? 'selected="selected"' : '' }}>Translation</option>
	<option value="Flexion" {{ old('footright', $exam->footright) == 'Flexion' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('footright', $exam->footright) == 'Extension' ? 'selected="selected"' : '' }}>Extension</option><option
	value="Right Lateral Bend" {{ old('footright', $exam->footright) == 'Right Lateral Bend' ? 'selected="selected"' : '' }}>Right Lateral Bend</option><option
	value="Left Lateral Bend" {{ old('footright', $exam->footright) == 'Left Lateral Bend' ? 'selected="selected"' : '' }}>Left Lateral Bend</option><option
	value="Right Rotation" {{ old('footright', $exam->footright) == 'Right Rotation' ? 'selected="selected"' : '' }}>Right Rotation</option><option
	value="Left Rotation" {{ old('footright', $exam->footright) == 'Left Rotation' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('footright', $exam->footright) == 'Neutral' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('footright', $exam->footright) == 'Protruded' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('footright', $exam->footright) == 'Wry' ? 'selected="selected"' : '' }}>Wry</option><option value="Rounded" {{ old('footright', $exam->footright) == 'Rounded' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('footright', $exam->footright) == 'Shift' ? 'selected="selected"' : '' }}>Shift</option><option value="Kyphosis" {{ old('footright', $exam->footright) == 'Kyphosis' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('footright', $exam->footright) == 'Valgus' ? 'selected="selected"' : '' }}>Valgus</option><option value="Varus" {{ old('footright', $exam->footright) == 'Varus' ? 'selected="selected"' : '' }}>Varus</option><option value="Pronated" {{ old('footright', $exam->footright) == 'Pronated' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('footright', $exam->footright) == 'Low Arch' ? 'selected="selected"' : '' }}>Low Arch</option></select></td></tr><tr><td>General</td><td>
	<select name="generalleft" ><option value=""></option><option value="High" {{ old('generalleft', $exam->generalleft) == 'High' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('generalleft', $exam->generalleft) == 'Low' ? 'selected="selected"' : '' }}>Low</option><option value="Anterior" {{ old('generalleft', $exam->generalleft) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('generalleft', $exam->generalleft) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('generalleft', $exam->generalleft) == 'Int Rotation' ? 'selected="selected"' : '' }}>Int Rotation</option>
	<option value="Ext Rotation" {{ old('generalleft', $exam->generalleft) == 'Ext Rotation' ? 'selected="selected"' : '' }}>Ext Rotation</option>
	<option value="Flat Foot" {{ old('generalleft', $exam->generalleft) == 'Flat Foot' ? 'selected="selected"' : '' }}>Flat Foot</option><option
	value="Translation" {{ old('generalleft', $exam->generalleft) == 'Translation' ? 'selected="selected"' : '' }}>Translation</option><option
	value="Flexion" {{ old('generalleft', $exam->generalleft) == 'Flexion' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('generalleft', $exam->generalleft) == 'Extension' ? 'selected="selected"' : '' }}>Extension</option><option
	value="Right Lateral Bend" {{ old('generalleft', $exam->generalleft) == 'Right Lateral Bend' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('generalleft', $exam->generalleft) == 'Left Lateral Bend' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('generalleft', $exam->generalleft) == 'Right Rotation' ? 'selected="selected"' : '' }}>Right Rotation</option>
	<option value="Left Rotation" {{ old('generalleft', $exam->generalleft) == 'Right Rotation' ? 'selected="selected"' : '' }}>Left Rotation</option>
	<option value="Neutral" {{ old('generalleft', $exam->generalleft) == 'Neutral' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('generalleft', $exam->generalleft) == 'Protruded' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('generalleft', $exam->generalleft) == 'Wry' ? 'selected="selected"' : '' }}>Wry</option><option value="Rounded" {{ old('generalleft', $exam->generalleft) == 'Rounded' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('generalleft', $exam->generalleft) == 'Shift' ? 'selected="selected"' : '' }}>Shift</option><option value="Kyphosis" {{ old('generalleft', $exam->generalleft) == 'Kyphosis' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('generalleft', $exam->generalleft) == 'Valgus' ? 'selected="selected"' : '' }}>Valgus</option><option value="Varus" {{ old('generalleft', $exam->generalleft) == 'Varus' ? 'selected="selected"' : '' }}>Varus</option><option value="Pronated" {{ old('generalleft', $exam->generalleft) == 'Pronated' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('generalleft', $exam->generalleft) == 'Low Arch' ? 'selected="selected"' : '' }}>Low Arch</option></select></td><td>
	<select name="generalright"><option value=""></option><option value="High" {{ old('generalright', $exam->generalright) == 'High' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('generalright', $exam->generalright) == 'Low' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('generalright', $exam->generalright) == 'Anterior' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('generalright', $exam->generalright) == 'Posterior' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('generalright', $exam->generalright) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('generalright', $exam->generalright) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('generalright', $exam->generalright) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('generalright', $exam->generalright) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('generalright', $exam->generalright) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('generalright', $exam->generalright) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('generalright', $exam->generalright) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('generalright', $exam->generalright) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('generalright', $exam->generalright) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option>
	<option value="Left Rotation" {{ old('generalright', $exam->generalright) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('generalright', $exam->generalright) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('generalright', $exam->generalright) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('generalright', $exam->generalright) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('generalright', $exam->generalright) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('generalright', $exam->generalright) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option value="Kyphosis" {{ old('generalright', $exam->generalright) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('generalright', $exam->generalright) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option><option value="Varus" {{ old('generalright', $exam->generalright) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option><option value="Pronated" {{ old('generalright', $exam->generalright) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('generalright', $exam->generalright) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch</option></select></td></tr><tr><td>Thorax</td><td>
	<select name="thoraxleft"><option value=""></option><option value="High" {{ old('thoraxleft', $exam->thoraxleft) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('thoraxleft', $exam->thoraxleft) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('thoraxleft', $exam->thoraxleft) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('thoraxleft', $exam->thoraxleft) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('thoraxleft', $exam->thoraxleft) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('thoraxleft', $exam->thoraxleft) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('thoraxleft', $exam->thoraxleft) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('thoraxleft', $exam->thoraxleft) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('thoraxleft', $exam->thoraxleft) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('thoraxleft', $exam->thoraxleft) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('thoraxleft', $exam->thoraxleft) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('thoraxleft', $exam->thoraxleft) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('thoraxleft', $exam->thoraxleft) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('thoraxleft', $exam->thoraxleft) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('thoraxleft', $exam->thoraxleft) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('thoraxleft', $exam->thoraxleft) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('thoraxleft', $exam->thoraxleft) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('thoraxleft', $exam->thoraxleft) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('thoraxleft', $exam->thoraxleft) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('thoraxleft', $exam->thoraxleft) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('thoraxleft', $exam->thoraxleft) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('thoraxleft', $exam->thoraxleft) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('thoraxleft', $exam->thoraxleft) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('thoraxleft', $exam->thoraxleft) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch</option></select></td><td>
	<select name="thoraxright"><option value=""></option><option value="High" {{ old('thoraxright', $exam->thoraxright) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('thoraxright', $exam->thoraxright) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('thoraxright', $exam->thoraxright) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('thoraxright', $exam->thoraxright) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotation" {{ old('thoraxright', $exam->thoraxright) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('thoraxright', $exam->thoraxright) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('thoraxright', $exam->thoraxright) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('thoraxright', $exam->thoraxright) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('thoraxright', $exam->thoraxright) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('thoraxright', $exam->thoraxright) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('thoraxright', $exam->thoraxright) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('thoraxright', $exam->thoraxright) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('thoraxright', $exam->thoraxright) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('thoraxright', $exam->thoraxright) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('thoraxright', $exam->thoraxright) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('thoraxright', $exam->thoraxright) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('thoraxright', $exam->thoraxright) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('thoraxright', $exam->thoraxright) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('thoraxright', $exam->thoraxright) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('thoraxright', $exam->thoraxright) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('thoraxright', $exam->thoraxright) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('thoraxright', $exam->thoraxright) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('thoraxright', $exam->thoraxright) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('thoraxright', $exam->thoraxright) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch
	</select></td></tr><tr><td>Pelvis</td><td>
	<select name="pelvisleft"><option value=""></option>
	<option value="High" {{ old('pelvisleft', $exam->pelvisleft) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('pelvisleft', $exam->pelvisleft) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('pelvisleft', $exam->pelvisleft) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('pelvisleft', $exam->pelvisleft) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('pelvisleft', $exam->pelvisleft) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('pelvisleft', $exam->pelvisleft) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('pelvisleft', $exam->pelvisleft) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('pelvisleft', $exam->pelvisleft) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('pelvisleft', $exam->pelvisleft) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('pelvisleft', $exam->pelvisleft) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('pelvisleft', $exam->pelvisleft) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('pelvisleft', $exam->pelvisleft) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('pelvisleft', $exam->pelvisleft) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('pelvisleft', $exam->pelvisleft) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('pelvisleft', $exam->pelvisleft) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('pelvisleft', $exam->pelvisleft) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('pelvisleft', $exam->pelvisleft) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('pelvisleft', $exam->pelvisleft) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('pelvisleft', $exam->pelvisleft) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('pelvisleft', $exam->pelvisleft) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('pelvisleft', $exam->pelvisleft) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('pelvisleft', $exam->pelvisleft) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('pelvisleft', $exam->pelvisleft) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('pelvisleft', $exam->pelvisleft) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch
	</option></select></td><td>
	<select name="pelvisright"><option value=""></option><option value="High" {{ old('pelvisright', $exam->pelvisright) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('pelvisright', $exam->pelvisright) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('pelvisright', $exam->pelvisright) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('pelvisright', $exam->pelvisright) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('pelvisright', $exam->pelvisright) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('pelvisright', $exam->pelvisright) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('pelvisright', $exam->pelvisright) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('pelvisright', $exam->pelvisright) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('pelvisright', $exam->pelvisright) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('pelvisright', $exam->pelvisright) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('pelvisright', $exam->pelvisright) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('pelvisright', $exam->pelvisright) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('pelvisright', $exam->pelvisright) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('pelvisright', $exam->pelvisright) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('pelvisright', $exam->pelvisright) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('pelvisright', $exam->pelvisright) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('pelvisright', $exam->pelvisright) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('pelvisright', $exam->pelvisright) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('pelvisright', $exam->pelvisright) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('pelvisright', $exam->pelvisright) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('pelvisright', $exam->pelvisright) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('pelvisright', $exam->pelvisright) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('pelvisright', $exam->pelvisright) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('pelvisright', $exam->pelvisright) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch</option></select></td></tr><tr><td>Knee</td><td>
	<select name="kneeleft"><option value=""></option><option value="High" {{ old('kneeleft', $exam->kneeleft) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('kneeleft', $exam->kneeleft) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('kneeleft', $exam->kneeleft) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('kneeleft', $exam->kneeleft) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('kneeleft', $exam->kneeleft) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('kneeleft', $exam->kneeleft) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('kneeleft', $exam->kneeleft) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('kneeleft', $exam->kneeleft) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('kneeleft', $exam->kneeleft) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('kneeleft', $exam->kneeleft) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('kneeleft', $exam->kneeleft) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('kneeleft', $exam->kneeleft) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('kneeleft', $exam->kneeleft) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('kneeleft', $exam->kneeleft) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('kneeleft', $exam->kneeleft) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('kneeleft', $exam->kneeleft) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('kneeleft', $exam->kneeleft) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('kneeleft', $exam->kneeleft) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('kneeleft', $exam->kneeleft) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('kneeleft', $exam->kneeleft) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('kneeleft', $exam->kneeleft) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('kneeleft', $exam->kneeleft) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('kneeleft', $exam->kneeleft) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('kneeleft', $exam->kneeleft) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch</option></select></td><td>
	<select name="kneeright"><option value=""></option>
		<option value="High" {{ old('kneeright', $exam->kneeright) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('kneeright', $exam->kneeright) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('kneeright', $exam->kneeright) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('kneeright', $exam->kneeright) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('kneeright', $exam->kneeright) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('kneeright', $exam->kneeright) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('kneeright', $exam->kneeright) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('kneeright', $exam->kneeright) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('kneeright', $exam->kneeright) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('kneeright', $exam->kneeright) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('kneeright', $exam->kneeright) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('kneeright', $exam->kneeright) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('kneeright', $exam->kneeright) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('kneeright', $exam->kneeright) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('kneeright', $exam->kneeright) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('kneeright', $exam->kneeright) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('kneeright', $exam->kneeright) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('kneeright', $exam->kneeright) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('kneeright', $exam->kneeright) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('kneeright', $exam->kneeright) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('kneeright', $exam->kneeright) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('kneeright', $exam->kneeright) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('kneeright', $exam->kneeright) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('kneeright', $exam->kneeright) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch
	</option></select></td></tr><tr><td>Trunk</td><td>
	<select name="trunkleft"><option value=""></option>
		<option value="High" {{ old('trunkleft', $exam->trunkleft) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('trunkleft', $exam->trunkleft) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('trunkleft', $exam->trunkleft) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('trunkleft', $exam->trunkleft) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('trunkleft', $exam->trunkleft) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('trunkleft', $exam->trunkleft) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('trunkleft', $exam->trunkleft) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('trunkleft', $exam->trunkleft) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('trunkleft', $exam->trunkleft) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('trunkleft', $exam->trunkleft) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('trunkleft', $exam->trunkleft) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('trunkleft', $exam->trunkleft) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('trunkleft', $exam->trunkleft) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('trunkleft', $exam->trunkleft) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('trunkleft', $exam->trunkleft) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('trunkleft', $exam->trunkleft) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('trunkleft', $exam->trunkleft) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('trunkleft', $exam->trunkleft) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('trunkleft', $exam->trunkleft) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('trunkleft', $exam->trunkleft) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('trunkleft', $exam->trunkleft) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('trunkleft', $exam->trunkleft) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('trunkleft', $exam->trunkleft) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('trunkleft', $exam->trunkleft) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch
	</option></select></td><td>
	<select name="trunkright"><option value=""></option><option value="High" {{ old('trunkleft', $exam->trunkleft) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('trunkleft', $exam->trunkleft) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('trunkleft', $exam->trunkleft) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('trunkleft', $exam->trunkleft) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('trunkleft', $exam->trunkleft) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('trunkleft', $exam->trunkleft) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('trunkleft', $exam->trunkleft) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('trunkleft', $exam->trunkleft) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('trunkleft', $exam->trunkleft) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('trunkleft', $exam->trunkleft) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('trunkleft', $exam->trunkleft) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('trunkleft', $exam->trunkleft) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('trunkleft', $exam->trunkleft) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('trunkleft', $exam->trunkleft) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('trunkleft', $exam->trunkleft) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('trunkleft', $exam->trunkleft) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('trunkleft', $exam->trunkleft) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('trunkleft', $exam->trunkleft) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('trunkleft', $exam->trunkleft) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('trunkleft', $exam->trunkleft) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('trunkleft', $exam->trunkleft) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('trunkleft', $exam->trunkleft) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('trunkleft', $exam->trunkleft) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('trunkleft', $exam->trunkleft) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch</option></select></td></tr><tr><td>Neck</td><td>
	<select name="neckleft"><option value=""></option>
	<option value="High" {{ old('neckleft', $exam->neckleft) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('neckleft', $exam->neckleft) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('neckleft', $exam->neckleft) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('neckleft', $exam->neckleft) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('neckleft', $exam->neckleft) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('neckleft', $exam->neckleft) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('neckleft', $exam->neckleft) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('neckleft', $exam->neckleft) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('neckleft', $exam->neckleft) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('neckleft', $exam->neckleft) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('neckleft', $exam->neckleft) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('neckleft', $exam->neckleft) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('neckleft', $exam->neckleft) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('neckleft', $exam->neckleft) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('neckleft', $exam->neckleft) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('neckleft', $exam->neckleft) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('neckleft', $exam->neckleft) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('neckleft', $exam->neckleft) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('neckleft', $exam->neckleft) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('neckleft', $exam->neckleft) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('neckleft', $exam->neckleft) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('neckleft', $exam->neckleft) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('neckleft', $exam->neckleft) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('neckleft', $exam->neckleft) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch</option></select></td><td>
	<select name="neckright"><option value=""></option><option value="High" {{ old('neckright', $exam->neckright) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('neckright', $exam->neckright) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('neckright', $exam->neckright) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('neckright', $exam->neckright) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('neckright', $exam->neckright) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('neckright', $exam->neckright) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('neckright', $exam->neckright) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('neckright', $exam->neckright) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('neckright', $exam->neckright) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('neckright', $exam->neckright) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('neckright', $exam->neckright) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('neckright', $exam->neckright) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('neckright', $exam->neckright) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('neckright', $exam->neckright) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('neckright', $exam->neckright) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('neckright', $exam->neckright) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('neckright', $exam->neckright) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('neckright', $exam->neckright) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('neckright', $exam->neckright) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('neckright', $exam->neckright) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('neckright', $exam->neckright) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('neckright', $exam->neckright) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('neckright', $exam->neckright) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('neckright', $exam->neckright) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch</option></select></td></tr><tr><td>Lumbar</td><td>
	<select name="lumbarleft"><option value=""></option><option value="High" {{ old('lumbarleft', $exam->lumbarleft) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('lumbarleft', $exam->lumbarleft) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('lumbarleft', $exam->lumbarleft) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('lumbarleft', $exam->lumbarleft) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('lumbarleft', $exam->lumbarleft) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('lumbarleft', $exam->lumbarleft) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('lumbarleft', $exam->lumbarleft) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('lumbarleft', $exam->lumbarleft) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('lumbarleft', $exam->lumbarleft) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('lumbarleft', $exam->lumbarleft) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('lumbarleft', $exam->lumbarleft) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('lumbarleft', $exam->lumbarleft) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('lumbarleft', $exam->lumbarleft) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('lumbarleft', $exam->lumbarleft) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('lumbarleft', $exam->lumbarleft) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('lumbarleft', $exam->lumbarleft) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('lumbarleft', $exam->lumbarleft) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('lumbarleft', $exam->lumbarleft) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('lumbarleft', $exam->lumbarleft) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('lumbarleft', $exam->lumbarleft) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('lumbarleft', $exam->lumbarleft) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('lumbarleft', $exam->lumbarleft) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('lumbarleft', $exam->lumbarleft) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('lumbarleft', $exam->lumbarleft) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch</option></select></td><td>
	<select name="lumbarright"><option value=""></option><option value="High" {{ old('lumbarright', $exam->lumbarright) == 'High"' ? 'selected="selected"' : '' }}>High</option><option value="Low" {{ old('lumbarright', $exam->lumbarright) == 'Low"' ? 'selected="selected"' : '' }}>Low</option>
	<option value="Anterior" {{ old('lumbarright', $exam->lumbarright) == 'Anterior"' ? 'selected="selected"' : '' }}>Anterior</option><option value="Posterior" {{ old('lumbarright', $exam->lumbarright) == 'Posterior"' ? 'selected="selected"' : '' }}>Posterior</option><option value="Int Rotthoraxrightation" {{ old('lumbarright', $exam->lumbarright) == 'Int Rotation"' ? 'selected="selected"' : '' }}>Int Rotation</option><option value="Ext Rotation" {{ old('lumbarright', $exam->lumbarright) == 'Ext Rotation"' ? 'selected="selected"' : '' }}>Ext Rotation</option><option value="Flat Foot" {{ old('lumbarright', $exam->lumbarright) == 'Flat Foot"' ? 'selected="selected"' : '' }}>Flat Foot</option><option value="Translation" {{ old('lumbarright', $exam->lumbarright) == 'Translation"' ? 'selected="selected"' : '' }}>Translation</option><option value="Flexion" {{ old('lumbarright', $exam->lumbarright) == 'Flexion"' ? 'selected="selected"' : '' }}>Flexion</option><option value="Extension" {{ old('lumbarright', $exam->lumbarright) == 'Extension"' ? 'selected="selected"' : '' }}>Extension</option><option value="Right Lateral Bend" {{ old('lumbarright', $exam->lumbarright) == 'Right Lateral Bend"' ? 'selected="selected"' : '' }}>Right Lateral Bend</option>
	<option value="Left Lateral Bend" {{ old('lumbarright', $exam->lumbarright) == 'Left Lateral Bend"' ? 'selected="selected"' : '' }}>Left Lateral Bend</option>
	<option value="Right Rotation" {{ old('lumbarright', $exam->lumbarright) == 'Right Rotation"' ? 'selected="selected"' : '' }}>Right Rotation</option><option value="Left Rotation" {{ old('lumbarright', $exam->lumbarright) == 'Left Rotation"' ? 'selected="selected"' : '' }}>Left Rotation</option><option value="Neutral" {{ old('lumbarright', $exam->lumbarright) == 'Neutral"' ? 'selected="selected"' : '' }}>Neutral</option><option value="Protruded" {{ old('lumbarright', $exam->lumbarright) == 'Protruded"' ? 'selected="selected"' : '' }}>Protruded</option><option value="Wry" {{ old('lumbarright', $exam->lumbarright) == 'Wry"' ? 'selected="selected"' : '' }}>Wry</option>
	<option value="Rounded" {{ old('lumbarright', $exam->lumbarright) == 'Rounded"' ? 'selected="selected"' : '' }}>Rounded</option><option value="Shift" {{ old('lumbarright', $exam->lumbarright) == 'Shift"' ? 'selected="selected"' : '' }}>Shift</option><option
	value="Kyphosis" {{ old('lumbarright', $exam->lumbarright) == 'Kyphosis"' ? 'selected="selected"' : '' }}>Kyphosis</option><option value="Valgus" {{ old('lumbarright', $exam->lumbarright) == 'Valgus"' ? 'selected="selected"' : '' }}>Valgus</option>
	<option value="Varus" {{ old('lumbarright', $exam->lumbarright) == 'Varus"' ? 'selected="selected"' : '' }}>Varus</option>
	<option value="Pronated" {{ old('lumbarright', $exam->lumbarright) == 'Pronated"' ? 'selected="selected"' : '' }}>Pronated</option><option value="Low Arch" {{ old('lumbarright', $exam->lumbarright) == 'Low Arch"' ? 'selected="selected"' : '' }}>Low Arch</option></select></td></tr></tbody></table><br>
	<input type="image" src="{{ asset('nlimages/savebutton.png') }}" height="25"></form>    </td></tr></tbody></table></td></tr></tbody></table>
</form></body></html>
