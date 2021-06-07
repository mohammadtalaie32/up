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

<form name="encform" enctype="multipart/form-data" action="" method="get">
	 @csrf
<input type="hidden" class="form-control" name="patient_id" value="">

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
		<td background="{{ asset('nlimages/navbgactive.png')}}" style="background-repeat:no-repeat;background-position:center;" align="center"><b><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a></b></td></tr>

	<tr height="35"><td background="{{ asset('nlimages/navbgpatient.png')}}"style="background-repeat:no-repeat;background-position:center;"  align="center" >
		<a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a></td></tr>

	<tr height="35"><td background="{{ asset('nlimages/navbgpatient.png')}}" style="background-repeat:no-repeat;background-position:center;" align="center">
		<a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Social History</div></a></td></tr>

	<tr height="35"><td background ="{{ asset('nlimages/navbgpatient.png')}}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Pre-Existing Conditions</div></a></td></tr>

	<tr height="35"><td background ="{{ asset('nlimages/navbgpatient.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Insurance Info</div></a></td></tr>


	<tr height="35"><td background ="{{ asset('nlimages/navbgpatient.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Billing</div></a></td></tr><tr><td "="" align="center">

		<img src="{{ asset('nlimages/visitinformation.png') }}"></td></tr><tr height="35">
			<td background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;">

				<div style="width:100%;height:100%">Subjective</div></a></td></tr><tr height="35"><td background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">

				Objective</div></a></td></tr><tr height="35"><td background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="" style="color:white;text-decoration:none;">

					<div style="width:100%;height:100%">Assessment</div></a></td></tr><tr height="35"><td background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center">
						<a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Plan</div></a></td></tr>

					<tr height="35">
					<td background="{{ asset('nlimages/navbgcoding.png') }}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Daily Coding</div></a></td></tr>
					<tr height="35">
					<td background="{{ asset('nlimages/navbgexercises.png') }}"style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Exercises</div></a></td></tr><tr height="35">
					<td background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Progress Notes</div></a></td></tr>

					<tr height="35"><td background="{{ asset('nlimages/navbgpatient.png') }}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Algorithm</div></a></td></tr>

					<tr height="35"><td background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Patient Overview</div></a></td></tr><tr height="35">

					<td background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Exams</div></a></td></tr>

					<tr height="35"><td background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
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
var categories=['EXERCISE','MOBILITY','STRETCHING','CARDIO','SPORT','ALL'];
	var backdiv='<a href="javascript:show(\'Categories\');"><-- All Categories</a>'
	var categoryselect='<td><img src="/nlimages/exerciseicons/mobilityback.png" width="25" height="25" onclick="show(\'Categories\');show(\'MOBILITY\');"></td><td><img src="/nlimages/exerciseicons/cardioback.png" width="25" height="25" onclick="show(\'Categories\');show(\'CARDIO\');"></td><td><img src="/nlimages/exerciseicons/exerciseback.png" width="25" height="25" onclick="show(\'Categories\');show(\'EXERCISE\');"></td><td><img src="/nlimages/exerciseicons/stretchingback.png" width="25" height="25" onclick="show(\'Categories\');show(\'STRETCHING\');"></td><td><img src="/nlimages/exerciseicons/sportback.png" width="25" height="25" onclick="show(\'Categories\');show(\'SPORT\');"></td>';
	var lastshown;
	var categoryon,caton;
function show(cat,category,level){
	document.getElementById('subcategorydiv').innerHTML='';
	subon='';
	if(category==''){ category=categoryon; caton=cat; }
	if(level=='back'){
		document.getElementById('backdiv').innerHTML='<table><tr><td width="150">'+backdiv+'</td>'+categoryselect+'</tr></table><br><b>'+cat+'</b>';
		document.getElementById(category+'headingdiv').style.display='none';
		document.getElementById(cat+'categorydiv').style.display='block';
		if(/*category=='ROLLING'||*/category=='CARDIO'){
			show('Categories');
			return;
		}
	}
	else if(level=='heading'){
		if(/*category=='MOBILITY'||*/category=='CARDIO'){
		document.getElementById('backdiv').innerHTML='<table><tr><td width="150"><a href="javascript:show(\''+category+'\',\''+cat+'\',\'back\');"><-- All Categories</a></td>'+categoryselect.split('show(\'Categories\');').join('show(\''+category+'\',\''+cat+'\',\'back\');')+'</tr></table><br><b>'+cat+'</b>';
		}
		else{
		document.getElementById('backdiv').innerHTML='<table><tr><td width="150"><a href="javascript:show(\''+category+'\',\''+cat+'\',\'back\');"><-- '+category+'</a></td>'+categoryselect.split('show(\'Categories\');').join('show(\''+category+'\',\''+cat+'\',\'back\');')+'</tr></table><br><b>'+cat+'</b>';
		}
		document.getElementById(category+'categorydiv').style.display='none';
		document.getElementById(cat+'headingdiv').style.display='block';
	}
	else{
		if(cat=='Categories'){
			document.getElementById('categories').style.display='block';
			document.getElementById('backdiv').innerHTML='<br><br><b>EXERCISES - ALL CATEGORIES</b><br>';
			for(var i=0;i<categories.length;i++){
				document.getElementById(categories[i]+'categorydiv').style.display='none';
			}
		}
		else{
			document.getElementById('categories').style.display='none';
			document.getElementById('backdiv').innerHTML='<table><tr><td width="150">'+backdiv+'</td>'+categoryselect+'</tr></table><br><b>'+cat+'</b>';
			for(var i=0;i<categories.length;i++){
				document.getElementById(categories[i]+'categorydiv').style.display='none';
			}
			document.getElementById(cat+'categorydiv').style.display='block';
		}
	}
	categoryon=category;
	caton=cat;
	if(cat=='CARDIO'&&category==null){
		show('CARDIO','CARDIO','heading');
		return;
	}
	/*if(cat=='MOBILITY'&&category==null){
		show('ROLLING','MOBILITY','heading');
		return;
	}*/
}
changed=false;
function customauto(type,auto){
	if(auto=='auto'){
	for(var i=0;i<numrows;i++){
		if(document.getElementById('overwrite').checked||document.getElementById(type+i).value==''){
			if(type=='lbs'){
				document.getElementById('lbs10'+i).style.display='none';
				document.getElementById('lbs100'+i).style.display='none';
				document.getElementById('lbs10'+i).value='Other';
				document.getElementById('lbs100'+i).value='Other';
			}
			else{
				document.getElementById(type+i).style.display='none';
				document.getElementById(type+i).value='Other';
			}
			if(type!='side') document.getElementById(type+'divcustom'+i).style.display='block';
			document.getElementById(type+'custom'+i).value=document.getElementById(type+'customauto').value;
		}
	}
	changed=true;
	}
}
function autofill(type,i){
	if(document.getElementById(type+i).value=='Other'){
		if(type!='side'&&type!='notes'){
			if(type!='lbs100'&&type!='lbs10'){ document.getElementById(type+i).style.display='none';
			document.getElementById(type+'divcustom'+i).style.display='block'; }
			else{ document.getElementById('lbs100'+i).style.display='none'; document.getElementById('lbs10'+i).style.display='none';
			document.getElementById('lbsdivcustom'+i).style.display='block'; }
		}
	}
	else{
		for(var i=0;i<numrows;i++){
			if(document.getElementById('overwrite').checked||document.getElementById(type+i).value==''){
				if(type!='side') document.getElementById(type+'divcustom'+i).style.display='none';
				if(type!='lbs10'&&type!='lbs100') document.getElementById(type+i).style.display='block';
				else{ document.getElementById('lbs100'+i).style.display='block';document.getElementById('lbs10'+i).style.display='block'; }
				document.getElementById(type+i).value=document.getElementById(type+'auto').value;
			}
		}
		changed=true;
	}
	if(document.getElementById('savediv').style.display!='block'){document.getElementById('nosavediv').style.display='none'; document.getElementById('savediv').style.display='block'; }
}
function custom(type,i){
	if(type!='side'&&type!='notes'){
		if(document.getElementById(type+i).value=='Other'){
			if(type!='lbs100'&&type!='lbs10'){ document.getElementById(type+i).style.display='none';
			document.getElementById(type+'divcustom'+i).style.display='block'; }
			else{ document.getElementById('lbs100'+i).style.display='none'; document.getElementById('lbs10'+i).style.display='none';
			document.getElementById('lbsdivcustom'+i).style.display='block'; }
		}
	}
	changed=true;
	if(document.getElementById('savediv').style.display!='block'){document.getElementById('nosavediv').style.display='none'; document.getElementById('savediv').style.display='block'; }
}
var numrows=0;
var pushcategory=[],exercise=[],reps=[],sets=[],lbs100=[],lbs10=[],dist=[],time=[],notes=[],side=[],repscustom=[],setscustom=[],lbscustom=[],distcustom=[],timecustom=[];
function setselect(auto){ var thenumrow=numrows; if(auto=='auto'){ thenumrow=auto; var toreturn ='<select style="width:40px;" id="sets'+thenumrow+'" name="sets'+thenumrow+'" onchange="custom(\'sets\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select><div id="setsdivcustom'+thenumrow+'" style="display:none;"><input id="setscustom'+thenumrow+'" name="setscustom'+thenumrow+'"onchange="customauto(\'sets\',\''+thenumrow+'\')" style="width:40px;"></div>'; return toreturn.replace('custom(','autofill('); } else return '<select style="width:40px;" id="sets'+thenumrow+'" name="sets'+thenumrow+'" onchange="custom(\'sets\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select><div id="setsdivcustom'+thenumrow+'" style="display:none;"><input id="setscustom'+thenumrow+'" name="setscustom'+thenumrow+'"onchange="customauto(\'sets\',\''+thenumrow+'\')" style="width:40px;"></div>'; } function repselect(auto){ var thenumrow=numrows; if(auto=='auto'){ thenumrow=auto; var toreturn ='<select style="width:40px;" id="reps'+thenumrow+'" name="reps'+thenumrow+'" onchange="custom(\'reps\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option></select><div id="repsdivcustom'+thenumrow+'" style="display:none;"><input id="repscustom'+thenumrow+'" name="repscustom'+thenumrow+'"onchange="customauto(\'reps\',\''+thenumrow+'\')" style="width:40px;"></div>'; return toreturn.replace('custom(','autofill('); } else return '<select style="width:40px;" id="reps'+thenumrow+'" name="reps'+thenumrow+'" onchange="custom(\'reps\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option></select><div id="repsdivcustom'+thenumrow+'" style="display:none;"><input id="repscustom'+thenumrow+'" name="repscustom'+thenumrow+'"onchange="customauto(\'reps\',\''+thenumrow+'\')" style="width:40px;"></div>'; }function distselect(auto){ var thenumrow=numrows; if(auto=='auto'){ thenumrow=auto; var toreturn ='<select style="width:50px;" id="dist'+thenumrow+'" name="dist'+thenumrow+'" onchange="custom(\'dist\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="100 yd">100 yd</option><option value="200 yd">200 yd</option><option value="400 yd">400 yd</option><option value="800 yd">800 yd</option><option value="1/4 mi">1/4 mi</option><option value="1/2 mi">1/2 mi</option><option value="1 mi">1 mi</option></select><div id="distdivcustom'+thenumrow+'" style="display:none;"><input id="distcustom'+thenumrow+'" name="distcustom'+thenumrow+'"onchange="customauto(\'dist\',\''+thenumrow+'\')" style="width:40px;"></div>'; return toreturn.replace('custom(','autofill('); } else return '<select style="width:50px;" id="dist'+thenumrow+'" name="dist'+thenumrow+'" onchange="custom(\'dist\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="100 yd">100 yd</option><option value="200 yd">200 yd</option><option value="400 yd">400 yd</option><option value="800 yd">800 yd</option><option value="1/4 mi">1/4 mi</option><option value="1/2 mi">1/2 mi</option><option value="1 mi">1 mi</option></select><div id="distdivcustom'+thenumrow+'" style="display:none;"><input id="distcustom'+thenumrow+'" name="distcustom'+thenumrow+'"onchange="customauto(\'dist\',\''+thenumrow+'\')" style="width:40px;"></div>'; }
function lbs100select(auto){ var thenumrow=numrows; if(auto=='auto'){ thenumrow=auto; var toreturn ='<select style="width:32px;" id="lbs100'+thenumrow+'" name="lbs100'+thenumrow+'" onchange="custom(\'lbs100\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="100">100</option><option value="200">200</option><option value="300">300</option><option value="400">400</option><option value="500">500</option><option value="600">600</option><option value="700">700</option><option value="800">800</option><option value="900">900</option></select>'; return toreturn.replace('custom(','autofill('); } else return '<select style="width:32px;" id="lbs100'+thenumrow+'" name="lbs100'+thenumrow+'" onchange="custom(\'lbs100\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="100">100</option><option value="200">200</option><option value="300">300</option><option value="400">400</option><option value="500">500</option><option value="600">600</option><option value="700">700</option><option value="800">800</option><option value="900">900</option></select>'; }function lbs10select(auto){ var thenumrow=numrows; if(auto=='auto'){ thenumrow=auto; var toreturn ='<select style="width:40px;" id="lbs10'+thenumrow+'" name="lbs10'+thenumrow+'" onchange="custom(\'lbs10\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="00">00</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="60">60</option><option value="70">70</option><option value="80">80</option><option value="90">90</option></select><div id="lbsdivcustom'+thenumrow+'" style="display:none;"><input id="lbscustom'+thenumrow+'" name="lbscustom'+thenumrow+'"onchange="customauto(\'lbs\',\''+thenumrow+'\')" style="width:40px;"></div>'; return toreturn.replace('custom(','autofill('); } else return '<select style="width:40px;" id="lbs10'+thenumrow+'" name="lbs10'+thenumrow+'" onchange="custom(\'lbs10\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="00">00</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="60">60</option><option value="70">70</option><option value="80">80</option><option value="90">90</option></select><div id="lbsdivcustom'+thenumrow+'" style="display:none;"><input id="lbscustom'+thenumrow+'" name="lbscustom'+thenumrow+'"onchange="customauto(\'lbs\',\''+thenumrow+'\')" style="width:40px;"></div>'; }function timeselect(auto){ var thenumrow=numrows; if(auto=='auto'){ thenumrow=auto; var toreturn ='<select style="width:50px;" id="time'+thenumrow+'" name="time'+thenumrow+'" onchange="custom(\'time\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="0:15">0:15</option><option value="0:30">0:30</option><option value="0:45">0:45</option><option value="1:00">1:00</option><option value="1:30">1:30</option><option value="2:00">2:00</option><option value="3:00">3:00</option><option value="4:00">4:00</option><option value="5:00">5:00</option><option value="10:00">10:00</option></select><div id="timedivcustom'+thenumrow+'" style="display:none;"><input id="timecustom'+thenumrow+'" name="timecustom'+thenumrow+'"onchange="customauto(\'time\',\''+thenumrow+'\')" style="width:40px;"></div>'; return toreturn.replace('custom(','autofill('); } else return '<select style="width:50px;" id="time'+thenumrow+'" name="time'+thenumrow+'" onchange="custom(\'time\',\''+thenumrow+'\');"><option value=""></option><option value="Other">Other</option><option value="0:15">0:15</option><option value="0:30">0:30</option><option value="0:45">0:45</option><option value="1:00">1:00</option><option value="1:30">1:30</option><option value="2:00">2:00</option><option value="3:00">3:00</option><option value="4:00">4:00</option><option value="5:00">5:00</option><option value="10:00">10:00</option></select><div id="timedivcustom'+thenumrow+'" style="display:none;"><input id="timecustom'+thenumrow+'" name="timecustom'+thenumrow+'"onchange="customauto(\'time\',\''+thenumrow+'\')" style="width:40px;"></div>';}var photos={'COMBO- ROLLER BALL OR STRAP':'COMBO- ROLLER BALL OR STRAP.gif','1/2 SURFACE':'1@SLASH@2 SURFACE.gif','Ant Tib':'Ant Tib.gif','BALL':'BALL.gif','Back and Glute':'Back and Glute.JPG','Back and Glute':'Back and Glute.gif','Back':'Back.gif','Ball Slams':'Ball Slams.jpg','Ball Squat':'Ball Squat.JPG','Evaluation Sports (30) MINS':'Evaluation Sports (30) MINS..gif','Evaluation Sports (60) MINS':'Evaluation Sports (60) MINS..gif','Foot':'Foot.JPG','Fore Arm ':'Fore Arm .JPG','Glute':'Glute.JPG','Glute':'Glute.gif','Hamstring double legged':'Hamstring double legged.JPG','Hamstring single legged':'Hamstring single legged.JPG','Hamstring':'Hamstring.JPG','Hamstring':'Hamstring.gif','Hamstrng':'Hamstrng.gif','Lat / shoulder':'Lat @SLASH@ shoulder.jpg','New Patient (up to 30 min)':'New Patient (up to 30 min).gif','Pec / Chest':'Pec @SLASH@ Chest.jpg','Private Session':'Private Session.jpg','Prone X Bands Push Ups':'Prone X Bands Push Ups.JPG','Prone':'Prone.JPG','Psoas':'Psoas.gif','Push Ups':'Push Ups.jpg','Quad':'Quad.gif','Side Single Leg With Hip':'Side Single Leg With Hip.JPG','Supine X Bands':'Supine X Bands.JPG','V up with Bands':'V up with Bands.JPG','Wall':'Wall.jpg','instructions':'instructions.php','not-Back and Glute':'not-Back and Glute.JPG','not-Psoas':'not-Psoas.JPG'};var lastphoto;
function showphoto(i){
	if(lastphoto!=null) document.getElementById('photo'+lastphoto).style.display='none';
	document.getElementById('photo'+i).style.display='block';
	lastphoto=i;
}
function hidephoto(i){
	document.getElementById('photo'+i).style.display='none';
}
function populatelist(text,category,auto,picture){
	if(numrows==0){ document.getElementById('exerciselist').innerHTML=
		document.getElementById('exerciselist').innerHTML.replace('<tr><td colspan="12">No exercises yet, select an exercise to add to list!</td></tr>','<tr style="border-top:1px solid #696969;border-bottom:1px solid #696969;padding:10px;background-color:#f1f1f1"><td colspan="2"></td><td>Auto-Fill ( Overwrite <input type="checkbox" id="overwrite" value="true">)</td>'+
	'<td width="15"></td><td align="center">'+setselect('auto')+'</td><td align="center">'+repselect('auto')+'</td><td align="center">'+lbs100select('auto')+lbs10select('auto')+'</td><td align="center">'+distselect('auto')+'</td><td align="center"><img src="nlimages/timericon.png"></td><td align="center">'+timeselect('auto')+
	'</td><td><select id="sideauto" name="sideauto" onchange="autofill(\'side\',\'auto\');"><option value=""></option><option value="L">L</option><option value="R">R</option><option value="B">B</option></select><td></tr>');
	}
	if(auto!='auto'){ document.getElementById('nosavediv').style.display='none'; document.getElementById('savediv').style.display='block'; }
	if(numrows>0){pushcategory.push(document.getElementById('category'+(numrows-1)).value);
	exercise.push(document.getElementById('exercise'+(numrows-1)).value);
	reps.push(document.getElementById('reps'+(numrows-1)).value);
	sets.push(document.getElementById('sets'+(numrows-1)).value);
	lbs100.push(document.getElementById('lbs100'+(numrows-1)).value);
	lbs10.push(document.getElementById('lbs10'+(numrows-1)).value);
	dist.push(document.getElementById('dist'+(numrows-1)).value);
	time.push(document.getElementById('time'+(numrows-1)).value);
	notes.push(document.getElementById('notes'+(numrows-1)).value);
	side.push(document.getElementById('side'+(numrows-1)).value);
	repscustom.push(document.getElementById('repscustom'+(numrows-1)).value);
	setscustom.push(document.getElementById('setscustom'+(numrows-1)).value);
	lbscustom.push(document.getElementById('lbscustom'+(numrows-1)).value);
	distcustom.push(document.getElementById('distcustom'+(numrows-1)).value);
	timecustom.push(document.getElementById('timecustom'+(numrows-1)).value);
	}
	var newinnerhtml='<tr style="border-top:1px solid #696969;border-bottom:1px solid #696969;padding:10px;">';
	if(photos[picture]!=null) newinnerhtml+='<td><div style="position:relative;display:block;"><img style="z-index:0;" src="nlimages/manageicons/photoicon.png" height="15" style="z-index:0;display:inline;" onmouseover="showphoto(\''+numrows+'\');" onmouseout="hidephoto(\''+numrows+'\');"><div style="position:absolute;top:23px;left:0px;height:auto;width:auto;display:none;z-index:1;background-color:#83f5ff;border:2px solid #00eaff;" id="photo'+numrows+'"><img src="exercisephotos/'+photos[picture]+'" height="200"></div></div></td>';
	else newinnerhtml+='<td></td>';
	newinnerhtml+='<td align="center"><img src="nlimages/exerciseicons/'+category+'icon.png" style="display:inline;"></td><td><input type="hidden" name="category'+numrows+'" id="category'+numrows+'" value="'+category+'"><input type="hidden" name="exercise'+numrows+'" id="exercise'+numrows+'" value="'+text+'">'+text+'</td>'+
	'<td width="15">'+
	'<img src="nlimages/notes.png" onclick="javascript:shownotes('+numrows+');" style="display:inline;"></td><td align="center">'+setselect()+'</td><td align="center">'+repselect()+'</td><td align="center">'+lbs100select()+lbs10select()+'</td><td align="center">'+distselect()+'</td><td align="center"><img src="nlimages/timericon.png"></td><td align="center">'+timeselect()+
	'</td><td><select id="side'+numrows+'" name="side'+numrows+'" onchange="custom(\'side\','+numrows+');"><option value=""></option><option value="L">L</option><option value="R">R</option><option value="B">B</option></select><td><img src="nlimages/delete.png" onclick="deleterow('+numrows+');"></td></tr>'+
	'<tr id="notestr'+numrows+'" style="display:none;"><td colspan="12" align="center"><textarea onchange="custom(\'notes\');" id="notes'+numrows+'" name="notes'+numrows+'" style="width:620px"></textarea></td></tr></table>';
	document.getElementById('exerciselist').innerHTML=document.getElementById('exerciselist').innerHTML.replace('</table>',newinnerhtml);
	for(var i=0;i<numrows;i++){
		document.getElementById('category'+i).value=pushcategory[i];
		document.getElementById('exercise'+i).value=exercise[i];
		document.getElementById('reps'+i).value=reps[i];
		document.getElementById('sets'+i).value=sets[i];
		document.getElementById('lbs100'+i).value=lbs100[i];
		document.getElementById('lbs10'+i).value=lbs10[i];
		document.getElementById('dist'+i).value=dist[i];
		document.getElementById('time'+i).value=time[i];
		document.getElementById('notes'+i).value=notes[i];
		document.getElementById('side'+i).value=side[i];
		document.getElementById('repscustom'+i).value=repscustom[i];
		document.getElementById('setscustom'+i).value=setscustom[i];
		document.getElementById('lbscustom'+i).value=lbscustom[i];
		document.getElementById('distcustom'+i).value=distcustom[i];
		document.getElementById('timecustom'+i).value=timecustom[i];
	}
	numrows++;
	document.getElementById('numrows').value=numrows;
	if(auto!='auto') changed=true;
}
function deleterow(row){
	document.exerciseform.todelete.value=row;
	document.exerciseform.submit();
}
function shownotes(num){
	if(document.getElementById('notestr'+num+'').style.display=='table-row')
	document.getElementById('notestr'+num+'').style.display='none';
	else
	document.getElementById('notestr'+num+'').style.display='table-row';
	 document.getElementById('nosavediv').style.display='none'; document.getElementById('savediv').style.display='block';
	 changed=true;
}
</script>
<table><tr><td valign="top" width="550"><div id="backdiv"><br><br><b>EXERCISES - ALL CATEGORIES</b><br></div><br>
<div id="categories">
<table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr>
<td width="100" height="100" align="center" onclick="show('MOBILITY');"><img src="{{ asset('nlimages/mobilityback.png') }}
" width="100" height="100"></td>
<td width="100" height="100" align="center" onclick="show('CARDIO');"><img src="{{ asset('nlimages/cardioback.png') }}" width="100" height="100"></td>
<td width="100" height="100" align="center" onclick="show('EXERCISE');"><img src="{{ asset('nlimages/exerciseback.png') }}" width="100" height="100"></td>
<td width="100"></td>
<td width="100"></td>
</tr>
<tr><td width="100" height="100" align="center" onclick="show('STRETCHING');"><img src="{{ asset('nlimages/stretchingback.jpg') }}" width="100" height="100"></td>
<td width="100" height="100" align="center" onclick="show('SPORT');">
	<img src="{{ asset('nlimages/sportback.png') }}" width="100" height="100"></td>
<td width="100" height="100"><a href="exerciselog.php">
	<img src="{{ asset('nlimages/myworkoutback.png') }}" width="100" height="100"></a></td>
</tr></table>
</div>
<div id="MOBILITYcategorydiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td id="ROLLER-MOBILITY" background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="show('ROLLER','MOBILITY','heading')">ROLLER</td><td id="BALL-MOBILITY" background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="show('BALL','MOBILITY','heading')">BALL</td><td id="COMBO- ROLLER BALL OR STRAP-MOBILITY" background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="show('COMBO- ROLLER BALL OR STRAP','MOBILITY','heading')">COMBO- ROLLER BALL OR STRAP</td><td id="1/2 SURFACE-MOBILITY" background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="show('1/2 SURFACE','MOBILITY','heading')">1/2 SURFACE</td><td width="100"></td></tr></table></div><div id="CARDIOcategorydiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td id="CARDIO-CARDIO" background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="show('CARDIO','CARDIO','heading')">CARDIO</td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div><div id="EXERCISEcategorydiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td id="BALL SLAMS-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('BALL SLAMS','EXERCISE','heading')">BALL SLAMS</td><td id="KETTLE BELL-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('KETTLE BELL','EXERCISE','heading')">KETTLE BELL</td><td id="ROPE-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('ROPE','EXERCISE','heading')">ROPE</td><td id="SQUATS-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('SQUATS','EXERCISE','heading')">SQUATS</td><td id="ROWS with BANDS-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('ROWS with BANDS','EXERCISE','heading')">ROWS with BANDS</td></tr><tr><td id="FLOOR EXERCISE-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('FLOOR EXERCISE','EXERCISE','heading')">FLOOR EXERCISE</td><td id="ABS-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('ABS','EXERCISE','heading')">ABS</td><td id="kO8 / TRX SUSPENSION-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('kO8 / TRX SUSPENSION','EXERCISE','heading')">kO8 / TRX SUSPENSION</td><td id="SWISS BALL-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('SWISS BALL','EXERCISE','heading')">SWISS BALL</td><td id="BENCH PRESS-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('BENCH PRESS','EXERCISE','heading')">BENCH PRESS</td></tr><tr><td id="Boxing-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('Boxing','EXERCISE','heading')">Boxing</td><td id="VIBRATION PLATFORM-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('VIBRATION PLATFORM','EXERCISE','heading')">VIBRATION PLATFORM</td><td id="SLED-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('SLED','EXERCISE','heading')">SLED</td><td id="BAR BELLS-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('BAR BELLS','EXERCISE','heading')">BAR BELLS</td><td id="DUMBELLS-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('DUMBELLS','EXERCISE','heading')">DUMBELLS</td></tr><tr><td id="EARTHQUAKE BAR-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('EARTHQUAKE BAR','EXERCISE','heading')">EARTHQUAKE BAR</td><td id="BODY BLADE-EXERCISE" background="nlimages/blueback.png" width="100" height="100" align="center" onclick="show('BODY BLADE','EXERCISE','heading')">BODY BLADE</td></tr></table></div><div id="STRETCHINGcategorydiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td id="PLANKING-STRETCHING" background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="show('PLANKING','STRETCHING','heading')">PLANKING</td><td id="SWISS BALL-STRETCHING" background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="show('SWISS BALL','STRETCHING','heading')">SWISS BALL</td><td id="Dynamic Warm up-STRETCHING" background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="show('Dynamic Warm up','STRETCHING','heading')">Dynamic Warm up</td><td id="BANDS-STRETCHING" background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="show('BANDS','STRETCHING','heading')">BANDS</td><td width="100"></td></tr></table></div><div id="SPORTcategorydiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td id="LADDER DRILLS-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('LADDER DRILLS','SPORT','heading')">LADDER DRILLS</td><td id="GAIT TRAINING-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('GAIT TRAINING','SPORT','heading')">GAIT TRAINING</td><td id="JUMPING-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('JUMPING','SPORT','heading')">JUMPING</td><td id="BASKETBALL-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('BASKETBALL','SPORT','heading')">BASKETBALL</td><td id="BASEBALL-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('BASEBALL','SPORT','heading')">BASEBALL</td></tr><tr><td id="FOOTBALL-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('FOOTBALL','SPORT','heading')">FOOTBALL</td><td id="GOLF-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('GOLF','SPORT','heading')">GOLF</td><td id="LACROSSE-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('LACROSSE','SPORT','heading')">LACROSSE</td><td id="SOCCER-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('SOCCER','SPORT','heading')">SOCCER</td><td id="TENNIS-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('TENNIS','SPORT','heading')">TENNIS</td></tr><tr><td id="VOLLEYBALL-SPORT" background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="show('VOLLEYBALL','SPORT','heading')">VOLLEYBALL</td></tr></table></div><div id="ALLcategorydiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div><script>var subheadings={};
var subon;
function showsubcategories(heading,text,category,color){
	var thealert='';
	var thehtml='<b>'+text+'<br><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr>';
	//for (var prop in subheadings) {
	if(subheadings[text]!=null){
		for(var i=0;i<subheadings[text].length||i<5;i++){
			if(i>=subheadings[text].length) thehtml+='<td></td>';
			else{
				if(i%5==0) thehtml+='</tr><tr>';
				thehtml+='<td background="nlimages/'+color+'back.png" width="100" height="100" align="center" onclick="populatelist(\'<u>'+text+'</u><br>'+subheadings[text][i]+'\',\''+category+'\',\'\',\''+subheadings[text][i]+'\');">'+subheadings[text][i]+'</td>';
				thealert+=text+':'+subheadings[text][i]+',';
			}
		}
		thehtml+='</tr></table>';
	}
    //}
	if(subon==text){
		populatelist('<u>'+heading+'</u><br>'+text,category,'',subheadings[text][i]);
		document.getElementById('subcategorydiv').innerHTML='';
		subon='';
	}
	else{
		document.getElementById('subcategorydiv').innerHTML=thehtml;
		subon=text;
	}
	//populatelist(\'<u>'.strtoupper($headings[$i]['category']).'</u><br>'.$headings[$i]['text'].'\',\''.strtolower($headings[$i]['category']).'\',\''.$headings[$i]['text'].'\',\'\',\''.$headings[$i]['text'].'\');
}
</script>
<div id="ROLLERheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>ROLLER</u><br>IT-Band','mobility','','IT-Band');">IT-Band</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>ROLLER</u><br>Quad','mobility','','Quad');">Quad</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>ROLLER</u><br>Adductors','mobility','','Adductors');">Adductors</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>ROLLER</u><br>Calf','mobility','','Calf');">Calf</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>ROLLER</u><br>Ant Tib','mobility','','Ant Tib');">Ant Tib</td></tr><tr><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>ROLLER</u><br>Hamstring','mobility','','Hamstring');">Hamstring</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>ROLLER</u><br>Glute','mobility','','Glute');">Glute</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>ROLLER</u><br>Back','mobility','','Back');">Back</td></tr></table></div>
	<div id="BALLheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>BALL</u><br>Psoas','mobility','','Psoas');">Psoas</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>BALL</u><br>Glute','mobility','','Glute');">Glute</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>BALL</u><br>Pec / Chest','mobility','','Pec / Chest');">Pec / Chest</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>BALL</u><br>Foot','mobility','','Foot');">Foot</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>BALL</u><br>Forearm','mobility','','Forearm');">Forearm</td></tr></table></div>
	<div id="COMBO- ROLLER BALL OR STRAPheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>COMBO- ROLLER BALL OR STRAP</u><br>Glute','mobility','','Glute');">Glute</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>COMBO- ROLLER BALL OR STRAP</u><br>Back and Glute','mobility','','Back and Glute');">Back and Glute</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>COMBO- ROLLER BALL OR STRAP</u><br>Ant. Chain','mobility','','Ant. Chain');">Ant. Chain</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>COMBO- ROLLER BALL OR STRAP</u><br>Post. Chain','mobility','','Post. Chain');">Post. Chain</td><td width="100"></td></tr></table></div>
	<div id="1/2 SURFACEheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>1/2 SURFACE</u><br>Post. Chain Stretch','mobility','','Post. Chain Stretch');">Post. Chain Stretch</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>1/2 SURFACE</u><br>Calves','mobility','','Calves');">Calves</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>1/2 SURFACE</u><br>Hamstrings','mobility','','Hamstrings');">Hamstrings</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>1/2 SURFACE</u><br>Lower Back','mobility','','Lower Back');">Lower Back</td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>1/2 SURFACE</u><br>Positive Shin','mobility','','Positive Shin');">Positive Shin</td></tr><tr><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>1/2 SURFACE</u><br>Balance- Horizontal ','mobility','','Balance- Horizontal ');">Balance- Horizontal </td><td background="{{ asset('nlimages/greenback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>1/2 SURFACE</u><br>Balance- Perpendicular','mobility','','Balance- Perpendicular');">Balance- Perpendicular</td></tr></table></div>
	<div id="CARDIOheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Hiking','cardio','','Hiking');">Hiking</td><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Recumbent Bike','cardio','','Recumbent Bike');">Recumbent Bike</td><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Jump Rope','cardio','','Jump Rope');">Jump Rope</td><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Rower','cardio','','Rower');">Rower</td><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Running','cardio','','Running');">Running</td></tr><tr><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Swimming','cardio','','Swimming');">Swimming</td><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Stair Climber','cardio','','Stair Climber');">Stair Climber</td><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Treadmill','cardio','','Treadmill');">Treadmill</td><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Versa Climber','cardio','','Versa Climber');">Versa Climber</td><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Walking','cardio','','Walking');">Walking</td></tr><tr><td background="{{ asset('nlimages/orangeback.png') }}
" width="100" height="100" align="center" onclick="populatelist('<u>CARDIO</u><br>Assult Air Bike','cardio','','Assult Air Bike');">Assult Air Bike</td></tr></table></div>
	<div id="BALL SLAMSheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>if(subheadings['Ball Slams']==null) subheadings['Ball Slams']=[];
		subheadings['Ball Slams'].push('Forward');</script><script>if(subheadings['Ball Slams']==null) subheadings['Ball Slams']=[];
		subheadings['Ball Slams'].push('Upward');</script><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="showsubcategories('BALL SLAMS','Ball Slams','exercise','blue')">Ball Slams<br>(<u>more</u>)</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BALL SLAMS</u><br>Wall','exercise','','Wall');">Wall</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BALL SLAMS</u><br>Floor','exercise','','Floor');">Floor</td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="KETTLE BELLheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>KETTLE BELL</u><br>Double Arm Swing','exercise','','Double Arm Swing');">Double Arm Swing</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>KETTLE BELL</u><br>Single Arm Swing','exercise','','Single Arm Swing');">Single Arm Swing</td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="ROPEheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ROPE</u><br>Double','exercise','','Double');">Double</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ROPE</u><br>Single','exercise','','Single');">Single</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ROPE</u><br>Circle In/Out','exercise','','Circle In/Out');">Circle In/Out</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ROPE</u><br>Over The Bridge','exercise','','Over The Bridge');">Over The Bridge</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ROPE</u><br>Pull Ups','exercise','','Pull Ups');">Pull Ups</td></tr></table></div>
	<div id="SQUATSheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SQUATS</u><br>Wall Squat','exercise','','Wall Squat');">Wall Squat</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SQUATS</u><br>Ball Squat','exercise','','Ball Squat');">Ball Squat</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SQUATS</u><br>Barbell','exercise','','Barbell');">Barbell</td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="ROWS with BANDSheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ROWS with BANDS</u><br>Seated','exercise','','Seated');">Seated</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ROWS with BANDS</u><br>Standing','exercise','','Standing');">Standing</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ROWS with BANDS</u><br>Squat','exercise','','Squat');">Squat</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ROWS with BANDS</u><br>Moving - Side to Side','exercise','','Moving - Side to Side');">Moving - Side to Side</td><td width="100"></td></tr></table></div>
	<div id="FLOOR EXERCISEheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>FLOOR EXERCISE</u><br>Push Ups','exercise','','Push Ups');">Push Ups</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>FLOOR EXERCISE</u><br>Push Ups With Bands','exercise','','Push Ups With Bands');">Push Ups With Bands</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>FLOOR EXERCISE</u><br>Mountain Climbers','exercise','','Mountain Climbers');">Mountain Climbers</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>FLOOR EXERCISE</u><br>V up with Bands','exercise','','V up with Bands');">V up with Bands</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>FLOOR EXERCISE</u><br>Prone X Bands Push Ups','exercise','','Prone X Bands Push Ups');">Prone X Bands Push Ups</td></tr><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>FLOOR EXERCISE</u><br>Supine X Bands','exercise','','Supine X Bands');">Supine X Bands</td></tr></table></div>
	<div id="ABSheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ABS</u><br>Alphabet','exercise','','Alphabet');">Alphabet</td><script>if(subheadings['Bicycles']==null) subheadings['Bicycles']=[];
		subheadings['Bicycles'].push('Forward');</script><script>if(subheadings['Bicycles']==null) subheadings['Bicycles']=[];
		subheadings['Bicycles'].push('Reverse');</script><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="showsubcategories('ABS','Bicycles','exercise','blue')">Bicycles<br>(<u>more</u>)</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ABS</u><br>Scissors','exercise','','Scissors');">Scissors</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ABS</u><br>With Ball','exercise','','With Ball');">With Ball</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ABS</u><br>Wheel','exercise','','Wheel');">Wheel</td></tr><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ABS</u><br>Bosu','exercise','','Bosu');">Bosu</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>ABS</u><br>Band','exercise','','Band');">Band</td></tr></table></div>
	<div id="kO8 / TRX SUSPENSIONheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>kO8 / TRX SUSPENSION</u><br>Abs','exercise','','Abs');">Abs</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>kO8 / TRX SUSPENSION</u><br>Push Ups','exercise','','Push Ups');">Push Ups</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>kO8 / TRX SUSPENSION</u><br>Pike','exercise','','Pike');">Pike</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>kO8 / TRX SUSPENSION</u><br>Squats','exercise','','Squats');">Squats</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>kO8 / TRX SUSPENSION</u><br>Squats W/ Rows','exercise','','Squats W/ Rows');">Squats W/ Rows</td></tr></table></div>
	<div id="SWISS BALLheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Corkscrew','exercise','','Corkscrew');">Corkscrew</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>1 Leg','exercise','','1 Leg');">1 Leg</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Opposite Arm/Leg','exercise','','Opposite Arm/Leg');">Opposite Arm/Leg</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>On Ball','exercise','','On Ball');">On Ball</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Russian Twists/Rolls','exercise','','Russian Twists/Rolls');">Russian Twists/Rolls</td></tr><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Hip Ext Over Ball','exercise','','Hip Ext Over Ball');">Hip Ext Over Ball</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Reverse Hyper Over Ball','exercise','','Reverse Hyper Over Ball');">Reverse Hyper Over Ball</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Single Leg Balance With Rotation','exercise','','Single Leg Balance With Rotation');">Single Leg Balance With Rotation</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Sky Diver','exercise','','Sky Diver');">Sky Diver</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Ball Extensions','exercise','','Ball Extensions');">Ball Extensions</td></tr><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Swimmer','exercise','','Swimmer');">Swimmer</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Hamstring double legged','exercise','','Hamstring double legged');">Hamstring double legged</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Hamstring single legged','exercise','','Hamstring single legged');">Hamstring single legged</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Push Ups','exercise','','Push Ups');">Push Ups</td></tr></table></div>
	<div id="BENCH PRESSheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BENCH PRESS</u><br>Dumbell And Or Barbell','exercise','','Dumbell And Or Barbell');">Dumbell And Or Barbell</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BENCH PRESS</u><br>With Bands','exercise','','With Bands');">With Bands</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BENCH PRESS</u><br>With Swiss Ball','exercise','','With Swiss Ball');">With Swiss Ball</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BENCH PRESS</u><br>Decline','exercise','','Decline');">Decline</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BENCH PRESS</u><br>Flat','exercise','','Flat');">Flat</td></tr><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BENCH PRESS</u><br>Incline','exercise','','Incline');">Incline</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BENCH PRESS</u><br>Towel','exercise','','Towel');">Towel</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>BENCH PRESS</u><br>Earth Quake Bar','exercise','','Earth Quake Bar');">Earth Quake Bar</td></tr></table></div>
	<div id="Boxingheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>Boxing</u><br>Punching bag','exercise','','Punching bag');">Punching bag</td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="VIBRATION PLATFORMheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>VIBRATION PLATFORM</u><br>Squat 2 feet','exercise','','Squat 2 feet');">Squat 2 feet</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>VIBRATION PLATFORM</u><br>Squat Single Leg  Particular','exercise','','Squat Single Leg  Particular');">Squat Single Leg  Particular</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>VIBRATION PLATFORM</u><br>Squat Single Leg  Horizontal','exercise','','Squat Single Leg  Horizontal');">Squat Single Leg  Horizontal</td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>VIBRATION PLATFORM</u><br>Push Ups','exercise','','Push Ups');">Push Ups</td><td width="100"></td></tr></table></div>
	<div id="SLEDheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SLED</u><br>Push ','exercise','','Push ');">Push </td><td background="nlimages/blueback.png" width="100" height="100" align="center" onclick="populatelist('<u>SLED</u><br>Pull','exercise','','Pull');">Pull</td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="BAR BELLSheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('BAR BELLS-EXERCISE').onclick=function(){populatelist('<u>EXERCISE</u><br>BAR BELLS','exercise','BAR BELLS','','BAR BELLS');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="DUMBELLSheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('DUMBELLS-EXERCISE').onclick=function(){populatelist('<u>EXERCISE</u><br>DUMBELLS','exercise','DUMBELLS','','DUMBELLS');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="EARTHQUAKE BARheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('EARTHQUAKE BAR-EXERCISE').onclick=function(){populatelist('<u>EXERCISE</u><br>EARTHQUAKE BAR','exercise','EARTHQUAKE BAR','','EARTHQUAKE BAR');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="BODY BLADEheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('BODY BLADE-EXERCISE').onclick=function(){populatelist('<u>EXERCISE</u><br>BODY BLADE','exercise','BODY BLADE','','BODY BLADE');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="PLANKINGheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>PLANKING</u><br>Prone','stretching','','Prone');">Prone</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>PLANKING</u><br>Supine','stretching','','Supine');">Supine</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>PLANKING</u><br>Side','stretching','','Side');">Side</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>PLANKING</u><br>Side Single Leg With Hip','stretching','','Side Single Leg With Hip');">Side Single Leg With Hip</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>PLANKING</u><br>Hip Hinge','stretching','','Hip Hinge');">Hip Hinge</td></tr><tr><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>PLANKING</u><br>Side Single Leg (ADD) and Single','stretching','','Side Single Leg (ADD) and Single');">Side Single Leg (ADD) and Single</td></tr></table></div>
	<div id="SWISS BALLheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Corkscrew','stretching','','Corkscrew');">Corkscrew</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>1 Leg','stretching','','1 Leg');">1 Leg</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Opposite Arm/Leg','stretching','','Opposite Arm/Leg');">Opposite Arm/Leg</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>On Ball','stretching','','On Ball');">On Ball</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Russian Twists/Rolls','stretching','','Russian Twists/Rolls');">Russian Twists/Rolls</td></tr><tr><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Hip Ext Over Ball','stretching','','Hip Ext Over Ball');">Hip Ext Over Ball</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Reverse Hyper Over Ball','stretching','','Reverse Hyper Over Ball');">Reverse Hyper Over Ball</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Single Leg Balance With Rotation','stretching','','Single Leg Balance With Rotation');">Single Leg Balance With Rotation</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Sky Diver','stretching','','Sky Diver');">Sky Diver</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Ball Extensions','stretching','','Ball Extensions');">Ball Extensions</td></tr><tr><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Swimmer','stretching','','Swimmer');">Swimmer</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Hamstring double legged','stretching','','Hamstring double legged');">Hamstring double legged</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Hamstring single legged','stretching','','Hamstring single legged');">Hamstring single legged</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>SWISS BALL</u><br>Push Ups','stretching','','Push Ups');">Push Ups</td></tr></table></div>
	<div id="Dynamic Warm upheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>Dynamic Warm up</u><br>Frankinsteins','stretching','','Frankinsteins');">Frankinsteins</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>Dynamic Warm up</u><br>Hip Hinge','stretching','','Hip Hinge');">Hip Hinge</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>Dynamic Warm up</u><br>Mountain Climbers','stretching','','Mountain Climbers');">Mountain Climbers</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>Dynamic Warm up</u><br>Skips','stretching','','Skips');">Skips</td><td background="nlimages/purpleback.png" width="100" height="100" align="center" onclick="populatelist('<u>Dynamic Warm up</u><br>Jump Rope','stretching','','Jump Rope');">Jump Rope</td></tr></table></div>
	<div id="BANDSheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('BANDS-STRETCHING').onclick=function(){populatelist('<u>STRETCHING</u><br>BANDS','stretching','BANDS','','BANDS');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="LADDER DRILLSheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>LADDER DRILLS</u><br>Ladder','sport','','Ladder');">Ladder</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>LADDER DRILLS</u><br>Lunges','sport','','Lunges');">Lunges</td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="GAIT TRAININGheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>GAIT TRAINING</u><br>Heel - Mid Stance - Toe Off','sport','','Heel - Mid Stance - Toe Off');">Heel - Mid Stance - Toe Off</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>GAIT TRAINING</u><br>Walking','sport','','Walking');">Walking</td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="JUMPINGheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>JUMPING</u><br>Single Leg','sport','','Single Leg');">Single Leg</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>JUMPING</u><br>Double','sport','','Double');">Double</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>JUMPING</u><br>Bench / Box Crunch','sport','','Bench / Box Crunch');">Bench / Box Crunch</td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="BASKETBALLheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>#1','sport','','#1');">#1</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>#2','sport','','#2');">#2</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>#3','sport','','#3');">#3</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>#4','sport','','#4');">#4</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>#5','sport','','#5');">#5</td></tr><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>DRIBBLING','sport','','DRIBBLING');">DRIBBLING</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>1','sport','','1');">1</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>2','sport','','2');">2</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>3','sport','','3');">3</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>4','sport','','4');">4</td></tr><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>5','sport','','5');">5</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>6','sport','','6');">6</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>7','sport','','7');">7</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>8','sport','','8');">8</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>9','sport','','9');">9</td></tr><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>10','sport','','10');">10</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASKETBALL</u><br>SHOOTING MACHINE','sport','','SHOOTING MACHINE');">SHOOTING MACHINE</td></tr></table></div>
	<div id="BASEBALLheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASEBALL</u><br>PITCHER','sport','','PITCHER');">PITCHER</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASEBALL</u><br>CATCHER','sport','','CATCHER');">CATCHER</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASEBALL</u><br>INFIELDER','sport','','INFIELDER');">INFIELDER</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASEBALL</u><br>OUTFIELDER','sport','','OUTFIELDER');">OUTFIELDER</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>BASEBALL</u><br>BATTING','sport','','BATTING');">BATTING</td><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('5 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('10 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('15 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('20 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('25 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('30 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('35 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('40 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('45 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('50 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('55 YRDS');</script><script>if(subheadings['THROWING']==null) subheadings['THROWING']=[];
		subheadings['THROWING'].push('60 YRDS');</script></tr><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="showsubcategories('BASEBALL','THROWING','sport','red')">THROWING<br>(<u>more</u>)</td></tr></table></div>
	<div id="FOOTBALLheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>OFFENSE','sport','','OFFENSE');">OFFENSE</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>QB','sport','','QB');">QB</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>RB','sport','','RB');">RB</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>WR','sport','','WR');">WR</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>TE','sport','','TE');">TE</td></tr><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>OL','sport','','OL');">OL</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>CENTER','sport','','CENTER');">CENTER</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>LONG SNAPPER','sport','','LONG SNAPPER');">LONG SNAPPER</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>DEFENSE','sport','','DEFENSE');">DEFENSE</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>DL','sport','','DL');">DL</td></tr><tr><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>DT','sport','','DT');">DT</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>LB','sport','','LB');">LB</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>CB','sport','','CB');">CB</td><td background="{{ asset('nlimages/redback.png') }}"
 width="100" height="100" align="center" onclick="populatelist('<u>FOOTBALL</u><br>SAFETY','sport','','SAFETY');">SAFETY</td></tr></table></div>
	<div id="GOLFheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('GOLF-SPORT').onclick=function(){populatelist('<u>SPORT</u><br>GOLF','sport','GOLF','','GOLF');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="LACROSSEheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('LACROSSE-SPORT').onclick=function(){populatelist('<u>SPORT</u><br>LACROSSE','sport','LACROSSE','','LACROSSE');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="SOCCERheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('SOCCER-SPORT').onclick=function(){populatelist('<u>SPORT</u><br>SOCCER','sport','SOCCER','','SOCCER');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="TENNISheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('TENNIS-SPORT').onclick=function(){populatelist('<u>SPORT</u><br>TENNIS','sport','TENNIS','','TENNIS');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
	<div id="VOLLEYBALLheadingdiv" style="display:none"><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr><script>document.getElementById('VOLLEYBALL-SPORT').onclick=function(){populatelist('<u>SPORT</u><br>VOLLEYBALL','sport','VOLLEYBALL','','VOLLEYBALL');};</script><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td><td width="100"></td></tr></table></div>
		<br><div id="subcategorydiv"></div>
</td><td valign="top"><center><br><br><Br><br><form action="exercises.php" method="get" name="exerciseform">
<input type="hidden" name="exercisesubmit" value="true">
<input type="hidden" name="todelete">
<input type="hidden" name="numrows" id="numrows" value="0"><div id="exerciselist"><table width="635" cellpadding="3" cellspacing="0" border="1" rules="rows">
<tr style="border-top:1px solid #696969;border-bottom:1px solid #696969;padding:10px"><td style="padding:0px;" colspan="7" align="center"><input style="width:455px;background-image:url('/nlimages/redback.png');background-size:450px 35px;color:white;font-size:24px;text-align:center;" name="exercisename" value="WORKOUT"></td><td colspan="5" bgcolor="black" align="center"><font color="white" size="+2">09/07/2020</font></td></tr>
<tr style="background-color:black;color:white;"><td width="15"></td><td width="15"></td>
	<td align="center" width="210" colspan="2"><b>Exercise</b></td><td align="center" width="50"><b>Sets</b></td><td align="center" width="50"><b>Reps</b></td>
	<td align="center" width="75"><b>Lbs.</b></td><td align="center" width="50"><b>Dist.</b></td><td width="15"></td><td align="center" width="50"><b>Time</b></td><td><b>Side</b></td><td></td></tr>
    <tr><td colspan="12">No exercises yet, select an exercise to add to list!</td></tr></table></div>
    <br /><div id="nosavediv">
    <input type="image" src="{{ asset('nlimages/savebuttoninactive.png') }}"></div><div id="savediv" style="display:none;">
    <input type="image" src="{{ asset('nlimages/savebutton.png') }}" height="25"></div></form>
 <form method="get" action="exercises.php" name="emailform"><input type="hidden" name="emailsubmit" id="emailsubmit">
<br><div id="emaillink"><a href="javascript:showemail();">Email to patient</a></div><div id="emaildiv" style="display:none;">Email address: <input name="emailaddress" value=""><br>Send as: <input type="radio" name="emailas" value="content" checked> Content only <input type="radio" name="emailas" value="link"> Link to account<br><br>
<img src="{{ asset('nlimages/sendbutton.png') }}" onclick="javascript:sendemail();"></form>
</center></td></tr>

    </table>
<script> function sendemail(){ if(changed){ if(window.confirm('You have changes that will be lost if sending these exercises without saving first! Continue?')){
			document.getElementById('emailsubmit').value='true';
			document.emailform.submit();
		} }
		else{
			document.getElementById('emailsubmit').value='true';
			document.emailform.submit(); }  }
function showemail(){ document.getElementById('emaillink').style.display='none';javascript:document.getElementById('emaildiv').style.display='block'; } </script>
</form>
<font color="green"><b></b></font>    </td></tr></table></td></tr></table></body>
