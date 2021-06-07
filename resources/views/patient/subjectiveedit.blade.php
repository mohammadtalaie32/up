<html><head><title>Up2Speed</title><script>
var myimages=new Array()
function preloadimages(){
for (i=0;i<preloadimages.arguments.length;i++){
myimages[i]=new Image()
myimages[i].src=preloadimages.arguments[i]
}      
}
//Enter path of images to be preloaded inside parenthesis. Extend list as desired.
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
<form name="encform" enctype="multipart/form-data" 
    action="{{ route('insertSoap') }}" method="POST">
@csrf
<input type="hidden" class="form-control" name="visit_id" value="{{$data->id}}">
<input type="hidden" class="form-control" name="patient_id" value="{{$data->patient_id}}">

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
<table><tbody><tr><td></td><td width="10"></td><td style="color:white;"><font size="+1"><strong>Patient selected:</strong> {{$data->lastname }},{{$data->firstname }}&nbsp;&nbsp;
      <a href="?clear=true">
            <img src="{{ asset('nlimages/checkwhitebox.png') }}" style="display:in-line;position:absolute;top:22px;" height="30"></a>&nbsp;    <script>
      if(window.innerWidth<=1412) document.write('<br>');else document.write('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div style="display:inline;position:relative;"> <strong>Visit: </strong> <select name="pick" onchange="javascript:pickencounter();">
                  <option value="" selected="">Select</option>
                 
                  <option value=>
                 
                  </option>
                  
            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                  <img src="{{ asset('nlimages/calendar.png') }}" onclick="showvisitdates()" ;="" style="display:in-line;position:absolute;top:-6px;" height="30">
      <div style="position: absolute; width: 300px; top: 107px; left: 0px; background-color: rgb(241, 241, 241); display: block; color: black; border: 2px solid rgb(217, 217, 217); z-index: 1; text-align: center;" id="visitdropdown"> <b>#1:</b> 
      <img src="{{ asset('nlimages/radioactive.png') }}" height="14">  <a href="javascript:pickanencounter('03/27/2020','editvisits.php')">
            <img src="{{ asset('nlimages/edit.png') }}" height="14"></a><br></div>

      </div>

    </font></td></tr></tbody></table></td>

      <td width="12%" align="right"><a href="{{ route('portalhome') }}" style="color:white;font-size:18px;">
            <img src="{{ asset('nlimages/patientportal.png') }}" style="display:inline;" width="65"></a></td><td style="border-left:none;" width="4%" align="right">
                  <a href="{{ route('patient')}}">
                        <img src="{{ asset('nlimages/home.png') }}" style="display:inline;" width="65"></a></td></tr>
<tr style="height:2px;" bgcolor="#ce0205"><td colspan="4" style="height:2px;padding:0px;" width="100%"></td></tr></tbody></table>
</div>
<table height="77"><tbody><tr><td><img src="{{ asset('images/spacer.png') }}" height="77"></td></tr></tbody></table>
<table width="100%" cellspacing="0" cellpadding="0">
<tbody><tr><td width="238" valign="top" bgcolor="#f1f1f1">
<img src="{{ asset('images/spacer.png') }}" width="238" height="1"><div id="sidebar" style="position:fixed;top:0px;left:0px;width:238px;height:100%;background-color:#f1f1f1;overflow-y:auto;overflow-x:hidden;"><div style="position:relative;height:77px;"></div>
<script>
function changebg(id,onoff,coding){
      if(id!=active){
            if(onoff=='on') document.getElementById(id+'td').style.backgroundImage='url(nlimages/navbg'+coding+'on.png)';
            if(onoff=='off') document.getElementById(id+'td').style.backgroundImage='url(nlimages/navbg'+coding+'.png)';
      }
}
</script>
<style type="text/css">
      
</style>
<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr style="background-color:#d9d9d9;"><td style="padding:0px;" align="center"><table width="200"><tbody><tr>
<td style="width:50px;padding:0px;" valign="middle" align="center"><a href="?print=true">
      <img src="{{ asset('nlimages/print.png') }}" width="40"></a></td>
<td style="width:100px;padding:0px;" valign="middle" align="center"><a href="{{ URL::to('/newencounter/'.$data->id) }}">
      <img src="{{ asset('nlimages/new.png') }}" style="display:inline" width="40"></a></td>
<td style="width:50px;padding:0px;" valign="middle" align="center"> </td></tr>
<tr><td valign="top" align="center"><a style="color:black;text-decoration:none;" href="?print=true">PRINT</a></td><td style="padding:0px;" valign="top" align="center"><a style="color:black;text-decoration:none;" href="{{ URL::to('/newencounter/'.$data->id) }}">NEW VISIT</a></td><td valign="top" align="center"></td></tr></tbody></table></td></tr>
<tr><td "="" align="center">
      <img src="{{ asset('nlimages/patientinformation.png') }}"></td></tr><tr height="35">
            <td background="{{ asset('nlimages/navbgpatient.png')}}" style="background-repeat:no-repeat;background-position:center;" id="ientinfo.phptd" align="center"><b><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Patient Info</div></a></b></td></tr>

      <tr height="35"><td class="tdbg" background="{{ asset('nlimages/navbgpatient.png')}}"style="background-repeat:no-repeat;background-position:center;"  align="center" >
            <a href="{{URL::to('/familyhistory/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Family History</div></a></td></tr>

      <tr height="35"><td background="{{ asset('nlimages/navbgpatient.png')}}" style="background-repeat:no-repeat;background-position:center;" align="center">
            <a href="{{URL::to('/socialhistory/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Social History</div></a></td></tr>

      <tr height="35"><td background ="{{ asset('nlimages/navbgpatient.png')}}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="{{URL::to('/preexistingconditions/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Pre-Existing Conditions</div></a></td></tr>

      <tr height="35"><td background ="{{ asset('nlimages/navbgpatient.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="
            {{ URL::to('/insuranceinfo/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Insurance Info</div></a></td></tr>


      <tr height="35"><td background ="{{ asset('nlimages/navbgpatient.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Billing</div></a></td></tr><tr><td "="" align="center">

            <img src="{{ asset('nlimages/visitinformation.png') }}"></td></tr><tr height="35">
                  <td background ="{{ asset('nlimages/navbgactive.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;">

                        <div style="width:100%;height:100%">Subjective</div></a></td></tr><tr height="35"><td background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">

                        Objective</div></a></td></tr><tr height="35"><td background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="" style="color:white;text-decoration:none;">

                              <div style="width:100%;height:100%">Assessment</div></a></td></tr><tr height="35"><td background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center">
                                    <a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Plan</div></a></td></tr>

                              <tr height="35">
                              <td background="{{ asset('nlimages/navbgcoding.png') }}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Daily Coding</div></a></td></tr>
                              <tr height="35">
                              <td background="{{ asset('nlimages/navbgexercises.png') }}"style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="{{URL::to('/exercises/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Exercises</div></a></td></tr><tr height="35">
                              <td background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;"  align="center">
                                    <a href="{{URL::to('/algorithm/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Progress Notes</div></a></td></tr>

                              <tr height="35"><td background="{{ asset('nlimages/navbgpatient.png') }}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="{{URL::to('/algorithm/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Algorithm</div></a></td></tr>

                              <tr height="35"><td background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="{{URL::to('/progress/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Patient Overview</div></a></td></tr><tr height="35">

                              <td background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;"  align="center"><a href="{{URL::to('/examsrom/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Exams</div></a></td></tr>

                              <tr height="35"><td background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;" align="center"><a href="{{URL::to('/scheduler1/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
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
<table height="30"><tbody><tr><td><img src="{{ asset('images/spacer.png') }}" height="30"></td></tr></tbody></table>
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
function whichsubmitted(which){
      document.soapform.whichsubmit.value=which;
}
</script><form name="soapform" action="soap.php?p=subjective" method="post">
<input type="hidden" name="whichsubmit"><script>
var complaints={'Left Pectoral':['Left Pectoral stiffness','Left Pectoral pain','Left Pectoral spasm','Side'],'Right Pectoral':['Right Pectoral stiffness','Right Pectoral pain','Right Pectoral spasm'],'Left Shoulder':['Left Shoulder stiffness','Left Shoulder pain','Left Shoulder spasm','Left tightness','Left frozen shoulder'],'Right Shoulder':['Right Shoulder stiffness','Right Shoulder pain','Right Shoulder spasm'],'Right Neck':['Right Neck stiffness','Right Neck pain','Right Neck spasm','Right and Left sided head ache'],'Left Neck':['Left Neck stiffness','Left Neck pain','Left Neck spasm','Bilateral Neck Pain','Poor Posture','Left  pain, swelling and stiffness'],'Right Mid Back':['Right poor posture/ Rounded shoulders','Right Scapula pain','Right Mid Back Pain','Right Mid Back Stiffness','Right Spasm'],'Left Wrist':['Left Wrist stiffness','Left Wrist pain','Left Wrist spasm'],'Right Wrist':['Right Wrist stiffness','Right Wrist pain','Right Wrist spasm'],'Left Elbow':['Left Elbow stiffness','Left Elbow pain','Left Elbow spasm','left','left'],'Right Elbow':['Right Elbow stiffness','Right Elbow pain','Right Elbow spasm'],'Hip':['Hip stiffness','Hip pain','Hip spasm','hip tenderness'],'Right Knee':['Right Knee stiffness','Right Knee pain','Right Knee spasm'],'Left Knee':['Left Knee stiffness','Left Knee pain','Left Knee spasm'],'Right Ankle':['Right Ankle stiffness','Right Ankle pain','Right Ankle spasm'],'Left Ankle':['Left Ankle stiffness','Left Ankle pain','Left Ankle spasm'],'Left Abdomen':['Left Abdomen stiffness','Left Abdomen pain','Left Abdomen spasm'],'Right Inner Thigh':['Right Inner Thigh stiffness','Right Inner Thigh pain','Right Inner Thigh spasm'],'Left Glut':['Left Glut stiffness','Left Glut pain','Left Glut spasm','Left Hip','Bilateral hip tightness'],'Left Outer Hamstring':['Left Outer Hamstring stiffness','Left Outer Hamstring pain','Left Outer Hamstring spasm','Left Leg'],'Right Outer Thigh':['Right Outer Thigh stiffness','Right Outer Thigh pain','Right Outer Thigh spasm','Right IT Band'],'Right Glut':['Right Glut stiffness','Right Glute pain','Right Glute spasm','Right  Hip','Right  Deep Glute Pain'],'Right Abdomen':['Right Abdomen stiffness','Right Abdomen pain','Right Abdomen spasm','Right Psoas'],'Cervical':['Cervical stiffness','Cervical pain','Cervical spasm'],'Left Outer Thigh':['Left Outer Thigh stiffness','Left Outer Thigh pain','Left Outer Thigh spasm','Left IT Band'],'Left Mid Back':['Left poor posture/ Rounded shoulders','Left Scapula pain','Left Mid Back Pain','Left Mid Back Stiffness','Left Spasm','Bilateral  lower mid back Pain.'],'Left Upper Back':['Left Upper Back stiffness','Left Upper Back pain','Left Upper Back spasm','bilateral pain neck - belt '],'Right Upper Back':['Right Upper Back stiffness','Right Upper Back pain','Right Upper Back spasm','Right Poor Posture/ Rounded shoulders','Poor Posture/ Rounded shoulders'],'Right Lower Back':['Right Lower Back stiffness','Right Lower Back pain','Right Lower Back spasm','Right poor posture/ Rounded shoulders'],'Left Lower Back':['Left Lower Back stiffness','Left Lower Back pain','Left Lower Back spasm','Bilateral Back Pain'],'IT Band 1':['IT Band 1 stiffness','IT Band 1 pain','IT Band 1 spasm','IT Band 1,2,3 Region pain'],'Headache':['Headache stiffness','Headache pain','Headache spasm','Concusion']};
function showtimer(area){
      document.getElementById('modifyarea').value=area;
      var chiefcomplaints = document.getElementById("chiefcomplaints");
      chiefcomplaints.options.length = 0;
      if(complaints[area]==null){
            chiefcomplaints.options[chiefcomplaints.options.length] = new Option(area+' stiffness', area+' stiffness');
            chiefcomplaints.options[chiefcomplaints.options.length] = new Option(area+' pain', area+' pain');
            chiefcomplaints.options[chiefcomplaints.options.length] = new Option(area+' spasm', area+' spasm'); 
      }
      else{
            for(var i=0;i<complaints[area].length;i++){
                  chiefcomplaints.options[chiefcomplaints.options.length] = new Option(complaints[area][i], complaints[area][i]);
            }
      }
      //if(complaints[document.getElementById('modifyarea').value]!='') document.write(complaints[document.getElementById('modifyarea').value]);
}
function showarea(area){
      document.getElementById('area').innerHTML=area;
}
function deleteindex(){
      document.getElementById('deletei').value='true';
      document.soapform.save.value='';
      document.soapform.submit();
}
function saveform(){
      document.soapform.submit();
}
function addpaintype(i){
      var str=document.getElementById('paintypediv'+i).innerText;
      if(str==''){
            document.getElementById('paintype'+i).value=document.getElementById('paintypeother'+i).value;
            document.getElementById('paintypediv'+i).innerText=document.getElementById('paintypeother'+i).value;
      }
      else{
            document.getElementById('paintype'+i).value=str+', '+document.getElementById('paintypeother'+i).value;
            document.getElementById('paintypediv'+i).innerText=str+', '+document.getElementById('paintypeother'+i).value;
      }
            document.getElementById('paintypeselect'+i).style.display='block';
            document.getElementById('paintypeother'+i).style.display='none';
            document.getElementById('paintypeother'+i).value='';
            document.getElementById('paintypeenter'+i).style.display='none';
            document.getElementById('paintypeselect'+i).value='Add'
}
function paintype(i){
      var paintypeselect=document.getElementById('paintypeselect'+i);
      var str=document.getElementById('paintypediv'+i).innerText;
      if(document.getElementById('paintypeselect'+i).value=='Other...'){
            document.getElementById('paintypeselect'+i).style.display='none';
            document.getElementById('paintypeother'+i).style.display='block';
            document.getElementById('paintypeenter'+i).style.display='block';
      }
      else if(document.getElementById('paintypeselect'+i).value=='Clear'){
            document.getElementById('paintypediv'+i).innerText='';
            document.getElementById('paintype'+i).value='';
            paintypeselect.options[paintypeselect.options.length-1] = null;
            paintypeselect.options[paintypeselect.options.length-1] = null;
            paintypeselect.value='Select';
      }
      else{
            if(str==''){
                  document.getElementById('paintype'+i).value=document.getElementById('paintypeselect'+i).value;
                  document.getElementById('paintypediv'+i).innerText=document.getElementById('paintypeselect'+i).value;
            }
            else{
                  document.getElementById('paintype'+i).value=str+', '+document.getElementById('paintypeselect'+i).value;
                  document.getElementById('paintypediv'+i).innerText=str+', '+document.getElementById('paintypeselect'+i).value;
            }
            if(paintypeselect.options[paintypeselect.options.length-1].value!='Clear'){
                  paintypeselect.options[paintypeselect.options.length] = new Option('Add');
                  paintypeselect.options[paintypeselect.options.length] = new Option('Clear');
            }
            paintypeselect.value='Add';
      }
}
function poppt(str,i){
      if(str!='Select'&&str!=''){
            document.getElementById('paintypediv'+i).innerText=str;
            document.getElementById('paintype'+i).value=str;
            var paintypeselect=document.getElementById('paintypeselect'+i);
            paintypeselect.options[paintypeselect.options.length] = new Option('Add');
            paintypeselect.options[paintypeselect.options.length] = new Option('Clear');
            paintypeselect.value='Add';
      }
}
var painints=[''];
function affectvalues(i,type,previous){
      var status=document.getElementById('statusselect'+i);
      var percentchange=document.getElementById('percentchange'+i);
      var betterorworse=document.getElementById('betterorworse'+i);
      var painint=document.getElementById('painintselect'+i);
      var severity=document.getElementById('severityselect'+i);
      if(type=='status'){
            document.getElementById('statustd'+i).style.backgroundColor='#c1ffc2';
            document.getElementById('percentchangetd'+i).style.backgroundColor='#ffd8d8';
            document.getElementById('paininttd'+i).style.backgroundColor='#ffd8d8';
            document.getElementById('severitytd'+i).style.backgroundColor='#ffd8d8';
            if(status.value=='improved'){ betterorworse.value="+"; percentchange.value='40';}
            if(status.value=='much improved'){ betterorworse.value="+"; percentchange.value='60'; }
            if(status.value=='slightly improved'){ betterorworse.value="+"; percentchange.value='20'; }
            if(status.value=='worse'){ betterorworse.value="-"; percentchange.value='40';}
            if(status.value=='much worse'){ betterorworse.value="-"; percentchange.value='60'; }
            if(status.value=='slightly worse'){ betterorworse.value="-"; percentchange.value='20'; }
            if(status.value=='remained unchanged'){ betterorworse.value="-"; percentchange.value='0'; }
            if(status.value=='resolved'){ betterorworse.value="-"; percentchange.value=previous*10; }
            if(status.value!='new problem'&&status.value!='not reported') affectvalues(i,'percentchange',previous);
      }
      if(type=='percentchange'){
            document.getElementById('statustd'+i).style.backgroundColor='#ffd8d8';
            document.getElementById('percentchangetd'+i).style.backgroundColor='#c1ffc2';
            document.getElementById('paininttd'+i).style.backgroundColor='#ffd8d8';
            document.getElementById('severitytd'+i).style.backgroundColor='#ffd8d8';
            var percentchange=document.getElementById('percentchange'+i).value;
            var betterorworse=document.getElementById('betterorworse'+i).value;
            if(betterorworse=='+') percentchange*=-1;
            var newpainint=parseInt(previous)+(parseInt(percentchange)/10);
            if(newpainint>10) newpainint=10; if(newpainint<0) newpainint=0;
            painint.value=newpainint;
            if(percentchange==0) status.value='remained unchanged';     if(percentchange>0&&percentchange<=20) status.value='slightly worse';
      if(percentchange>20&&percentchange<=40) status.value='worse';     if(percentchange>40&&percentchange<=60) status.value='much worse';
      if(percentchange<0&&percentchange>=-20) status.value='slightly improved';     if(percentchange<-20&&percentchange>=-40) status.value='improved';
      if(percentchange<-40&&percentchange>=-60) status.value='much improved'; 
            
            if(painint.value==0) severity.value='resolved'; if(painint.value<=3&&painint.value>0) severity.value='slight'; if(painint.value<=5&&painint.value>3) severity.value='mild'; if(painint.value<=7&&painint.value>5) severity.value='moderate'; if(painint.value<=10&&painint.value>7) severity.value='severe';
      }
      if(type=='painint'){
            document.getElementById('statustd'+i).style.backgroundColor='#ffd8d8';
            document.getElementById('percentchangetd'+i).style.backgroundColor='#c1ffc2';
            document.getElementById('paininttd'+i).style.backgroundColor='#c1ffc2';
            document.getElementById('severitytd'+i).style.backgroundColor='#ffd8d8';
            //document.getElementById('contentstr').innerText=painints[i]+' '+painint.value;
            if(painint.value==0) severity.value='resolved'; if(painint.value<=3&&painint.value>0) severity.value='slight'; if(painint.value<=5&&painint.value>3) severity.value='mild'; if(painint.value<=7&&painint.value>5) severity.value='moderate'; if(painint.value<=10&&painint.value>7) severity.value='severe';
            var percentchange=(parseInt(previous)-painint.value)*-10;
            if(percentchange==0) status.value='remained unchanged';     if(percentchange>0&&percentchange<=20) status.value='slightly worse';
            if(percentchange>20&&percentchange<=40) status.value='worse';     if(percentchange>40) status.value='much worse';
            if(percentchange<0&&percentchange>=-20) status.value='slightly improved';     if(percentchange<-20&&percentchange>=-40) status.value='improved';
            if(percentchange<-40) status.value='much improved';
            if(painint.value==0) status.value='resolved';
            if(percentchange>=0){ document.getElementById('betterorworse'+i).value='-'; }
            else{ document.getElementById('betterorworse'+i).value='+'; percentchange*=-1; }
            document.getElementById('percentchange'+i).value=percentchange;
      }
      if(type=='severity'){
            document.getElementById('statustd'+i).style.backgroundColor='#ffd8d8';
            document.getElementById('percentchangetd'+i).style.backgroundColor='#ffd8d8';
            document.getElementById('paininttd'+i).style.backgroundColor='#ffd8d8';
            document.getElementById('severitytd'+i).style.backgroundColor='#c1ffc2';
            if(severity.value=='slight'){ painint.value='2';}if(severity.value=='mild') painint.value='4';
            if(severity.value=='moderate') painint.value='6'; if(severity.value=='severe') painint.value='8';
      }
}
function modifysubmit(){
      document.soapform.action="modifycomplaints.php";
      document.soapform.submit();
}
function changebody(nextorprev){
      var sides=['front','back','side','foot'];
      var index;
      for(var i=0;i<sides.length;i++){
            if(document.getElementById(sides[i]).style.display=='block'){
                  index=i;                
            }
      }
      if(nextorprev=='next'){ index+=1; if(index>=sides.length) index=0; 
      }
      if(nextorprev=='previous'){ index-=1; if(index<0) index=sides.length-1; }
      //document.getElementById('frontbackside').value=sides[i];
      for(var i=0;i<sides.length;i++){
            if(i==index){ document.getElementById('dot'+i).src="{{asset('nlimages/dotactive.png')}}"; document.getElementById(sides[i]).style.display='block'; }
            else{ document.getElementById('dot'+i).src='{{asset('nlimages/dotinactive.png')}}'; document.getElementById(sides[i]).style.display='none'; }
      }
      document.getElementById('bodyside').value=sides[index];
}
function showsubjective(){
      if(document.getElementById('addsubjective').style.display=='block'){
            document.getElementById('addsubjective').style.display='none'
            document.getElementById('showadd').src="{{asset('nlimages/selectarea.png')}}";
      }
      else if(document.getElementById('addsubjective').style.display=='none'){
            document.getElementById('addsubjective').style.display='block'
            document.getElementById('showadd').src="{{asset('nlimages/hidebutton.png')}}";
      }
}
function showdiv(key){
      if(document.getElementById(key+'div').style.display=='none'){
            document.getElementById(key+'div').style.display='block';
            document.getElementById(key+'img').src='{{url('nlimages/minus.png')}}';
      }
      else{
            document.getElementById(key+'div').style.display='none';
            document.getElementById(key+'img').src='{{url('nlimages/plus.png')}}';
      }
}
function submitcomplaints(){
      document.getElementById('bodyshow').value='true';
      document.soapform.save.value="";
      document.soapform.submit();
}
</script>
<hr id="subjectivehr"><font size="+2">Subjective Complaints</font>  <hr />
<input type="hidden" name="modifyarea" id="modifyarea" />
<input name="deletei" id="deletei" type="hidden" />
<input name="save" id="save" value="true" type="hidden">
<input name="bodyside" id="bodyside" type="hidden" value="front">
<input type="hidden" name="bodyshow" id="bodyshow" />
<div id="addsubjective" style="display:none;">
<table width="1200"><tr><td valign="top" width="25%" align="center">
<b>Current complaints:</b><br /><br />
<br></td><td width="5%">
<img src="{{ asset('nlimages/17.png') }}" width="25" style="display:inline;"  onclick="javascript:changebody('previous');"></td><td width="40%" align="center" valign="center">
<script src="{{ asset('mapper.js') }}"></script>
<script>
function show(id){
      document.getElementById('front').style.display='none';
      document.getElementById('back').style.display='none';
      document.getElementById('side').style.display='none';
      document.getElementById('foot').style.display='none';
      document.getElementById(id).style.display='block';
      if(document.getElementById('frontbackside')) document.getElementById('frontbackside').value=id;
}</script>
<DIV id="front" style="display:block;">
<IMG src="{{ asset('images/bodyfront.png') }}" class="mapper" name=bodyfront width="210" height="522" border=1 useMap=#frontmap style="display:inline;">
<MAP name=frontmap><area onmouseover="showarea('Right Foot')" onmouseout="cleararea()" onclick="showtimer('Right Foot')" shape="poly" class="noborder icolor2e3192" coords="82,511,95,516,110,515,114,501,99,493,83,501" /><area onmouseover="showarea('Left Foot')" onmouseout="cleararea()" onclick="showtimer('Left Foot')" shape="poly" class="noborder icolor2e3192" coords="113,512,126,517,141,516,146,503,132,495,114,502" /><area onmouseover="showarea('Left Wrist')" onmouseout="cleararea()" onclick="showtimer('Left Wrist')" shape="circle" class="noborder icolor2e3192" coords="180,254,14" /><area onmouseover="showarea('Left Inner Knee')" onmouseout="cleararea()" onclick="showtimer('Left Inner Knee')" shape="poly" class="noborder icolor2e3192" coords="113,342,121,355,127,344,128,328,122,320,114,329" /><area onmouseover="showarea('Right Inner Knee')" onmouseout="cleararea()" onclick="showtimer('Right Inner Knee')" shape="poly" class="noborder icolor2e3192" coords="90,341,98,354,104,343,105,327,99,319,91,328" /><area onmouseover="showarea('Headache')" onmouseout="cleararea()" onclick="showtimer('Headache')" shape="poly" class="noborder icolor2e3192" coords="111,37,97,31,90,17,100,5,123,5,136,19,127,32" /><area onmouseover="showarea('Left Outer Thigh')" onmouseout="cleararea()" onclick="showtimer('Left Outer Thigh')" shape="poly" class="noborder icolor2e3192" coords="145,319,148,282,155,268,158,286,155,317,152,335,146,352,145,342" /><area onmouseover="showarea('Right Outer Thigh')" onmouseout="cleararea()" onclick="showtimer('Right Outer Thigh')" shape="poly" class="noborder icolor2e3192" coords="63,310,60,285,64,269,71,287,75,321,75,338,72,350,67,335" /><area onmouseover="showarea('Right Thigh')" onmouseout="cleararea()" onclick="showtimer('Right Thigh')" shape="poly" class="noborder icolor2e3192" coords="75,306,72,263,78,244,84,253,88,273,87,306,79,333" /><area onmouseover="showarea('Right Bicep')" onmouseout="cleararea()" onclick="showtimer('Right Bicep')" shape="poly" class="noborder icolor2e3192" coords="48,170,40,159,41,145,49,137,60,139,65,157,57,171" /><area onmouseover="showarea('Left Bicep')" onmouseout="cleararea()" onclick="showtimer('Left Bicep')" shape="poly" class="noborder icolor2e3192" coords="170,173,161,163,159,146,167,138,178,143,183,153,178,169" /><area onmouseover="showarea('Right Elbow')" onmouseout="cleararea()" onclick="showtimer('Right Elbow')" shape="poly" class="noborder icolor2e3192" coords="48,220,38,213,37,191,44,172,58,174,64,193,57,215" /><area onmouseover="showarea('Left Shoulder')" onmouseout="cleararea()" onclick="showtimer('Left Shoulder')" shape="poly" class="noborder icolor2e3192" coords="167,138,156,128,155,103,163,93,175,101,180,120,175,134" /><area onmouseover="showarea('Left Thigh')" onmouseout="cleararea()" onclick="showtimer('Left Thigh')" shape="poly" class="noborder icolor2e3192" coords="132,306,130,263,136,244,142,253,146,273,145,306,137,333" /><area onmouseover="showarea('Right Shoulder')" onmouseout="cleararea()" onclick="showtimer('Right Shoulder')" shape="poly" class="noborder icolor2e3192" coords="49,130,45,119,49,101,59,91,68,102,67,126,57,135" /><area onmouseover="showarea('Left Elbow')" onmouseout="cleararea()" onclick="showtimer('Left Elbow')" shape="poly" class="noborder icolor2e3192" coords="169,221,160,207,162,184,170,176,181,181,188,200,179,221" /><area onmouseover="showarea('Lower Abdomen')" onmouseout="cleararea()" onclick="showtimer('Lower Abdomen')" shape="poly" class="noborder icolor2e3192" coords="106,235,92,227,99,222,111,219,122,222,129,227,120,233" /><area onmouseover="showarea('Right Abdomen')" onmouseout="cleararea()" onclick="showtimer('Right Abdomen')" shape="poly" class="noborder icolor2e3192" coords="85,220,85,200,102,180,111,182,111,201,103,215,91,226" /><area onmouseover="showarea('Left Abdomen')" onmouseout="cleararea()" onclick="showtimer('Left Abdomen')" shape="poly" class="noborder icolor2e3192" coords="122,222,113,205,111,190,116,178,128,190,137,207,134,227" />
  <area onmouseover="showarea('Left Knee')" onmouseout="cleararea()" onclick="showtimer('Left Knee')" shape="circle" class="noborder icolor2e3192" coords="133,375,16" />
<area onmouseover="showarea('Left Inner Thigh')" onmouseout="cleararea()" onclick="showtimer('Left Inner Thigh')" shape="poly" class="noborder icolor2e3192" coords="114,312,114,261,129,262,129,313" />
<area onmouseover="showarea('Right Inner Thigh')" onmouseout="cleararea()" onclick="showtimer('Right Inner Thigh')" shape="poly" class="noborder icolor2e3192" coords="89,313,89,260,103,261,104,313" />
<area onmouseover="showarea('Left Ankle')" onmouseout="cleararea()" onclick="showtimer('Left Ankle')" shape="circle" class="noborder icolor2e3192" coords="128,481,13" />
<area onmouseover="showarea('Right Ankle')" onmouseout="cleararea()" onclick="showtimer('Right Ankle')" shape="circle" class="noborder icolor2e3192" coords="99,482,13" />
<area onmouseover="showarea('Right Knee')" onmouseout="cleararea()" onclick="showtimer('Right Knee')" shape="circle" class="noborder icolor2e3192" coords="91,376,16" />
<area onmouseover="showarea('Right Wrist')" onmouseout="cleararea()" onclick="showtimer('Right Wrist')" shape="circle" class="noborder icolor2e3192" coords="42,256,14" />
<area onmouseover="showarea('Left Pectoral')" onmouseout="cleararea()" onclick="showtimer('Left Pectoral')" shape="circle" class="noborder icolor2e3192" coords="140,117,17" />
<area onmouseover="showarea('Right Pectoral')" onmouseout="cleararea()" onclick="showtimer('Right Pectoral')" shape="circle" class="noborder icolor2e3192" coords="85,117,17" />
<area onmouseover="showarea('Temple')" onmouseout="cleararea()" onclick="showtimer('Temple')" shape="circle" class="noborder icolor2e3192" coords="536,51,16" />
</MAP> 
</DIV>

<DIV id="back" style="display:none">
<IMG src="{{ asset('images/bodyback.png') }}" class="mapper" name=bodyback width="210" height="522" border=1 useMap=#backmap style="display:inline;">
<MAP name=backmap><area onmouseover="showarea('Cervical')" onmouseout="cleararea()" onclick="showtimer('Cervical')" shape="poly" class="noborder icolor2e3192" coords="88,73,78,65,85,60,97,57,109,57,119,65,109,75" /><area onmouseover="showarea('Right Foot')" onmouseout="cleararea()" onclick="showtimer('Right Foot')" shape="poly" class="noborder icolor2e3192" coords="105,511,123,516,136,506,130,496,117,494,102,499" /><area onmouseover="showarea('Left Foot')" onmouseout="cleararea()" onclick="showtimer('Left Foot')" shape="poly" class="noborder icolor2e3192" coords="69,511,82,516,97,515,98,499,86,493,69,497" /><area onmouseover="showarea('Headache')" onmouseout="cleararea()" onclick="showtimer('Headache')" shape="poly" class="noborder icolor2e3192" coords="104,36,87,32,80,20,90,8,113,8,121,20,116,29" /><area onmouseover="showarea('Right Shoulder')" onmouseout="cleararea()" onclick="showtimer('Right Shoulder')" shape="poly" class="noborder icolor2e3192" coords="154,120,145,108,147,99,158,98,165,106,167,115,167,122" /><area onmouseover="showarea('Left Elbow')" onmouseout="cleararea()" onclick="showtimer('Left Elbow')" shape="poly" class="noborder icolor2e3192" coords="34,217,30,211,28,192,34,182,39,188,41,202,40,210" /><area onmouseover="showarea('Left Bicep')" onmouseout="cleararea()" onclick="showtimer('Left Bicep')" shape="poly" class="noborder icolor2e3192" coords="36,177,33,160,36,132,45,122,54,131,56,155,47,180" /><area onmouseover="showarea('Left Glut')" onmouseout="cleararea()" onclick="showtimer('Left Glut')" shape="poly" class="noborder icolor2e3192" coords="66,261,67,241,77,231,89,236,97,257,94,273,84,278,73,273" /><area onmouseover="showarea('Left Inner Hamstring')" onmouseout="cleararea()" onclick="showtimer('Left Inner Hamstring')" shape="poly" class="noborder icolor2e3192" coords="80,328,83,293,90,279,98,293,99,345,94,371,88,373,82,353" /><area onmouseover="showarea('Left Outer Calf')" onmouseout="cleararea()" onclick="showtimer('Left Outer Calf')" shape="poly" class="noborder icolor2e3192" coords="79,494,68,437,66,401,70,374,75,392,81,434,81,467" /><area onmouseover="showarea('Left Upper Back')" onmouseout="cleararea()" onclick="showtimer('Left Upper Back')" shape="poly" class="noborder icolor2e3192" coords="61,135,57,128,56,113,64,102,74,110,74,129,67,137" /><area onmouseover="showarea('Left Elbow')" onmouseout="cleararea()" onclick="showtimer('Left Elbow')" shape="poly" class="noborder icolor2e3192" coords="49,220,43,209,44,188,49,182,55,189,55,203,53,213" /><area onmouseover="showarea('Right Wrist')" onmouseout="cleararea()" onclick="showtimer('Right Wrist')" shape="poly" class="noborder icolor2e3192" coords="173,263,165,254,160,227,167,214,177,223,179,242,178,256" /><area onmouseover="showarea('Right Glut')" onmouseout="cleararea()" onclick="showtimer('Right Glut')" shape="poly" class="noborder icolor2e3192" coords="109,259,118,235,135,231,143,243,139,268,124,278,115,275" /><area onmouseover="showarea('Right Inner Calf')" onmouseout="cleararea()" onclick="showtimer('Right Inner Calf')" shape="poly" class="noborder icolor2e3192" coords="116,492,110,452,110,402,116,374,120,392,122,413,122,450" /><area onmouseover="showarea('Right Lower Back')" onmouseout="cleararea()" onclick="showtimer('Right Lower Back')" shape="poly" class="noborder icolor2e3192" coords="107,209,109,194,116,186,123,193,125,208,120,229,112,228" /><area onmouseover="showarea('Right Elbow')" onmouseout="cleararea()" onclick="showtimer('Right Elbow')" shape="poly" class="noborder icolor2e3192" coords="166,205,164,195,164,188,170,178,177,185,176,205,170,211" /><area onmouseover="showarea('Right Inner Hamstring')" onmouseout="cleararea()" onclick="showtimer('Right Inner Hamstring')" shape="poly" class="noborder icolor2e3192" coords="106,327,109,292,116,278,124,292,125,344,120,370,114,372,108,352" /><area onmouseover="showarea('Right Bicep')" onmouseout="cleararea()" onclick="showtimer('Right Bicep')" shape="poly" class="noborder icolor2e3192" coords="153,174,147,154,149,133,156,123,165,134,171,161,165,179" /><area onmouseover="showarea('Left Mid Back')" onmouseout="cleararea()" onclick="showtimer('Left Mid Back')" shape="poly" class="noborder icolor2e3192" coords="79,166,80,150,88,143,94,149,97,165,92,184,83,183" /><area onmouseover="showarea('Left Lower Back')" onmouseout="cleararea()" onclick="showtimer('Left Lower Back')" shape="poly" class="noborder icolor2e3192" coords="79,212,80,196,88,189,94,195,97,211,92,230,83,229" /><area onmouseover="showarea('Right Outer Calf')" onmouseout="cleararea()" onclick="showtimer('Right Outer Calf')" shape="poly" class="noborder icolor2e3192" coords="124,489,123,449,126,403,135,372,139,391,137,423,133,457" /><area onmouseover="showarea('Left Upper Back')" onmouseout="cleararea()" onclick="showtimer('Left Upper Back')" shape="poly" class="noborder icolor2e3192" coords="83,134,78,125,81,108,88,98,97,107,98,129,88,138" /><area onmouseover="showarea('Left Wrist')" onmouseout="cleararea()" onclick="showtimer('Left Wrist')" shape="poly" class="noborder icolor2e3192" coords="37,264,29,258,30,231,37,217,42,214,49,229,46,251" /><area onmouseover="showarea('Right Upper Back')" onmouseout="cleararea()" onclick="showtimer('Right Upper Back')" shape="poly" class="noborder icolor2e3192" coords="131,132,127,119,128,105,137,99,145,105,146,126,140,135" /><area onmouseover="showarea('Right Elbow')" onmouseout="cleararea()" onclick="showtimer('Right Elbow')" shape="poly" class="noborder icolor2e3192" coords="155,215,151,205,149,188,155,178,161,187,162,198,161,210" /><area onmouseover="showarea('Left Shoulder')" onmouseout="cleararea()" onclick="showtimer('Left Shoulder')" shape="poly" class="noborder icolor2e3192" coords="34,116,37,107,44,99,57,98,58,106,53,114,41,120" /><area onmouseover="showarea('Right Mid Back')" onmouseout="cleararea()" onclick="showtimer('Right Mid Back')" shape="poly" class="noborder icolor2e3192" coords="106,165,107,149,115,142,121,148,124,164,119,183,110,182" /><area onmouseover="showarea('Right Outer Hamstring')" onmouseout="cleararea()" onclick="showtimer('Right Outer Hamstring')" shape="poly" class="noborder icolor2e3192" coords="127,325,130,292,137,278,149,289,148,324,140,361,132,369,128,350" /><area onmouseover="showarea('Right Neck')" onmouseout="cleararea()" onclick="showtimer('Right Neck')" shape="poly" class="noborder icolor2e3192" coords="117,98,105,85,102,72,113,73,124,82,130,91,131,101" /><area onmouseover="showarea('Right Upper Back')" onmouseout="cleararea()" onclick="showtimer('Right Upper Back')" shape="poly" class="noborder icolor2e3192" coords="108,130,105,120,107,107,114,97,123,108,122,127,114,140" /><area onmouseover="showarea('Left Outer Hamstring')" onmouseout="cleararea()" onclick="showtimer('Left Outer Hamstring')" shape="poly" class="noborder icolor2e3192" coords="61,330,64,293,71,279,78,297,79,330,78,355,72,369,66,363" /><area onmouseover="showarea('Left Neck')" onmouseout="cleararea()" onclick="showtimer('Left Neck')" shape="poly" class="noborder icolor2e3192" coords="67,94,73,84,86,73,96,75,94,83,83,98,69,104" />
  <area onmouseover="showarea('Left Inner Calf')" onmouseout="cleararea()" onclick="showtimer('Left Inner Calf')" shape="poly" class="noborder icolor2e3192" coords="91,495,84,452,86,415,90,375,95,396,98,419,97,461" />
  <area onmouseover="showarea('Temple')" onmouseout="cleararea()" onclick="showtimer('Temple')" shape="circle" class="noborder icolor2e3192" coords="536,51,16" />
</MAP> 
</DIV>


<DIV id="side" style="display:none">
<IMG src="{{ asset('images/bodyside.png') }}" class="mapper" name=bodyside width="210" height="522" border=1 useMap=#sidemap style="display:inline;">
<MAP name=sidemap><area onmouseover="showarea('Foot')" onmouseout="cleararea()" onclick="showtimer('Foot')" shape="poly" class="noborder icolor2e3192" coords="95,515,80,506,94,496,118,493,142,495,152,506,128,516" /><area onmouseover="showarea('Headache')" onmouseout="cleararea()" onclick="showtimer('Headache')" shape="poly" class="noborder icolor2e3192" coords="115,37,95,33,86,22,96,10,127,10,136,21,131,34" /><area onmouseover="showarea('Forearm')" onmouseout="cleararea()" onclick="showtimer('Forearm')" shape="poly" class="noborder icolor2e3192" coords="108,258,103,249,104,235,109,219,117,229,120,242,118,255" /><area onmouseover="showarea('Elbow')" onmouseout="cleararea()" onclick="showtimer('Elbow')" shape="poly" class="noborder icolor2e3192" coords="104,219,96,206,97,192,105,181,113,186,115,201,114,214" /><area onmouseover="showarea('Shoulder Side Middle')" onmouseout="cleararea()" onclick="showtimer('Shoulder Side Middle')" shape="poly" class="noborder icolor2e3192" coords="104,220,96,207,97,193,105,182,113,187,115,202,111,213" /><area onmouseover="showarea('Bicep Side')" onmouseout="cleararea()" onclick="showtimer('Bicep Side')" shape="poly" class="noborder icolor2e3192" coords="97,183,90,170,91,156,99,145,108,151,112,165,107,183" /><area onmouseover="showarea('Hip')" onmouseout="cleararea()" onclick="showtimer('Hip')" shape="poly" class="noborder icolor2e3192" coords="122,243,120,225,124,214,133,214,139,225,141,236,135,252" /><area onmouseover="showarea('Glut Side')" onmouseout="cleararea()" onclick="showtimer('Glut Side')" shape="poly" class="noborder icolor2e3192" coords="84,272,78,257,82,236,91,226,99,234,101,246,98,261" /><area onmouseover="showarea('Shoulder Side Front')" onmouseout="cleararea()" onclick="showtimer('Shoulder Side Front')" shape="poly" class="noborder icolor2e3192" coords="111,139,110,124,109,110,116,100,123,112,121,135,117,142" /><area onmouseover="showarea('Shoulder Side Middle')" onmouseout="cleararea()" onclick="showtimer('Shoulder Side Middle')" shape="poly" class="noborder icolor2e3192" coords="94,145,83,132,85,109,93,98,102,104,109,120,102,142" /><area onmouseover="showarea('Shoulder Side Back')" onmouseout="cleararea()" onclick="showtimer('Shoulder Side Back')" shape="poly" class="noborder icolor2e3192" coords="70,134,70,129,69,118,70,109,79,116,83,133,80,143" /><area onmouseover="showarea('Calf Side')" onmouseout="cleararea()" onclick="showtimer('Calf Side')" shape="poly" class="noborder icolor2e3192" coords="88,451,93,419,103,404,106,416,105,450,97,487,90,492,86,478" /><area onmouseover="showarea('IT Band 3')" onmouseout="cleararea()" onclick="showtimer('IT Band 3')" shape="poly" class="noborder icolor2e3192" coords="104,376,100,363,104,343,113,335,123,347,121,366,113,376" /><area onmouseover="showarea('IT Band 2')" onmouseout="cleararea()" onclick="showtimer('IT Band 2')" shape="poly" class="noborder icolor2e3192" coords="111,333,106,313,113,301,123,297,130,308,128,323,121,334" /><area onmouseover="showarea('IT Band 1')" onmouseout="cleararea()" onclick="showtimer('IT Band 1')" shape="poly" class="noborder icolor2e3192" coords="114,290,112,274,119,260,131,260,135,274,133,288,123,297" />
  <area onmouseover="showarea('Temple')" onmouseout="cleararea()" onclick="showtimer('Temple')" shape="circle" class="noborder icolor2e3192" coords="536,51,16" />
</MAP> 
</DIV>
<DIV id="foot" style="display:none;">
<IMG src="{{ asset('') }}" class="mapper" name=bodyfoot width="210" height="522" border=1 useMap=#footmap style="display:inline;">
<MAP name=footmap><area onmouseover="showarea('Ball of Foot')" onmouseout="cleararea()" onclick="showtimer('Ball of Foot')" shape="poly" class="noborder icolor2e3192" coords="122,176,154,157,163,141,159,128,131,117,86,119,55,135,35,150,36,175,71,187" /><area onmouseover="showarea('Arch of Foot')" onmouseout="cleararea()" onclick="showtimer('Arch of Foot')" shape="poly" class="noborder icolor2e3192" coords="89,292,120,288,141,262,145,232,135,203,110,192,82,197,60,220,57,245,63,271" /><area onmouseover="showarea('Heel of Foot')" onmouseout="cleararea()" onclick="showtimer('Heel of Foot')" shape="poly" class="noborder icolor2e3192" coords="96,462,113,459,128,448,132,432,127,418,112,407,96,404,73,417,70,437,79,455" /><area onmouseover="showarea('Arch of Foot')" onmouseout="cleararea()" onclick="showtimer('Arch of Foot')" shape="poly" class="noborder icolor2e3192" coords="82,383,116,386,145,365,150,335,133,313,111,307,88,310,65,323,60,355,61,355" />
</MAP> 
</DIV>

<br />
<img src="{{asset('nlimages/dotactive.png')}}" style="display:inline;" id="dot0"> <img src="{{asset('nlimages/dotinactive.png')}}" style="display:inline;" id="dot1"> <img src="{{asset('nlimages/dotinactive.png')}}" style="display:inline;" id="dot2"> <img src="{{asset('nlimages/dotinactive.png')}}" style="display:inline;" id="dot3">
</td>
<td width="5%">
<img src="{{ asset('nlimages/16.png') }}" width="25" style="display:inline;" onclick="javascript:changebody('next');"></td>
</td>
<td valign="top" width="25%">
<div id="area"><br></div><br />
<table><tr><td>
<select multiple size="10" name="chiefcomplaints[]" id="chiefcomplaints" style="width:200px"><option value="">
Select an area for complaints!</option></select><br /><br />
<center><img src="{{ asset('nlimages/addbutton.png') }}" onclick="javascript:whichsubmitted('subjective');submitcomplaints();"> 
<img src="{{ asset('nlimages/modifybutton.png') }}" onclick="javascript:modifysubmit()"></center></td></tr></table>
</td></tr></table>
</div>
<table><tr><td><b>Patient Complaints - This Visit</b><br /><br /><img src="{{ asset('nlimages/selectarea.png') }}" id="showadd" onclick="showsubjective()">
 </td><td><div id="contentstr"></div></td></tr></table><br>
<table cellspacing="0" cellpadding="5" border=1 style="border:1px solid #f1f1f1;" width="100%"><tr><td width="35"></td><td width="240">Chief Complaint</td><td width="180">Status</td><td width="110">% Change</td><td width="80">Pain #</td><td width="80">Severity</td><td width="80">Phase</td><td width="100">Pain Type</td><td width="100">Problem Side</td></tr></table>
<br />
<img src="{{ asset('nlimages/savebutton.png') }}" height="25" onclick="javascript:whichsubmitted('subjective');saveform();" alt="Save"> <img src="{{ asset('nlimages/deletebutton.png') }}" onclick="javascript:deleteindex()" alt="Delete"><br /><br /><hr id="objectivehr"><font size="+2">Objective</font> <hr><br><script>
var adjustments=['Cervical','OCC','C1','C2','C3','C4','C5','C6','C7','Thoracic','T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12','Lumbar','L1','L2','L3','L5','L5','Sac','Coccyx','Pubs','Pelvis','RSI','LSI','Sphenoid','TMJ','OCCEx','Clavicle','Shoulder','Elbow','Wrist','Hand','Ribs','Hip','Knee','Ankle','Foot','Other'];

function clearform(){
      for(var i=0;i<adjustments.length;i++){
            document.getElementById(adjustments[i]+'LTadjustment').checked=false;
            document.getElementById(adjustments[i]+'RTadjustment').checked=false;
            document.getElementById(adjustments[i]+'LTfixation').checked=false;
            document.getElementById(adjustments[i]+'RTfixation').checked=false;
            document.getElementById(adjustments[i]+'LTtenderness1').checked=false;
            document.getElementById(adjustments[i]+'LTtenderness2').checked=false;
            document.getElementById(adjustments[i]+'LTtenderness3').checked=false;
            document.getElementById(adjustments[i]+'LTtenderness4').checked=false;
            document.getElementById(adjustments[i]+'RTtenderness1').checked=false;
            document.getElementById(adjustments[i]+'RTtenderness2').checked=false;
            document.getElementById(adjustments[i]+'RTtenderness3').checked=false;
            document.getElementById(adjustments[i]+'RTtenderness4').checked=false;
            if(document.getElementById('adjustmenttypeselect'+i).value!=''){
                  document.getElementById('adjustmenttypeselect'+i).value='Clear';
                  adjustmenttype(i,adjustments[i]);
            }
      }
}
function showpopu (){
      document.getElementById('cervical').style.display='none';
      document.getElementById('thoracic').style.display='none';
      document.getElementById('lumbar').style.display='none';
      document.getElementById('all').style.display='none';
      document.getElementById(document.getElementById('showpop').value).style.display='block';
}
      var cervical=['C1','C2','C5','C6','C7'];
      var thoracic=['T1','T2','T5','T6','T7'];
      var lumbar=['L5','L5'];
      var allarr=['C1','C2','C5','C6','C7','T1','T2','T5','T6','T7','L5','L5'];
function populate(type,side){
      var arr;
      if(type=='cervical') arr=cervical;
      else if(type=='lumbar') arr=lumbar;
      else if(type=='thoracic') arr=thoracic;
      else arr=allarr;
      for(var i=0;i<arr.length;i++){
            if(side=='left'){ document.getElementById(arr[i]+'LTfixation').checked=true; document.getElementById(arr[i]+'RTfixation').checked=false; 
                  document.getElementById(arr[i]+'LTadjustment').checked=true; document.getElementById(arr[i]+'RTadjustment').checked=false; }
            if(side=='right'){ document.getElementById(arr[i]+'LTfixation').checked=false; document.getElementById(arr[i]+'RTfixation').checked=true;
                  document.getElementById(arr[i]+'LTadjustment').checked=false; document.getElementById(arr[i]+'RTadjustment').checked=true; }
            if(side=='all'){ document.getElementById(arr[i]+'LTfixation').checked=true; document.getElementById(arr[i]+'RTfixation').checked=true;
                  document.getElementById(arr[i]+'LTadjustment').checked=true; document.getElementById(arr[i]+'RTadjustment').checked=true; }
      }
}
function populatetenderness(type,val){
      var arr;
      if(type=='cervical') arr=cervical;
      else if(type=='lumbar') arr=lumbar;
      else if(type=='thoracic') arr=thoracic;
      else arr=allarr;
      //var arr=['C1','C2','C5','C6','C7','T1','T2','T5','T6','T7','L5','L5'];
      //var tenderness=document.getElementById(arr[i]+'LTtenderness');
      for(var i=0;i<arr.length;i++){
            var radio;
            if(type=='cervical') radio=document.soapform.populatecervical;
            if(type=='thoracic') radio=document.soapform.populatethoracic;
            if(type=='lumbar') radio=document.soapform.populatelumbar;
            if(type=='all') radio=document.soapform.populateall;
            if(radio.value=='leftonly')
                  document.getElementById(arr[i]+'LTtenderness'+val).checked='true';
            else if(radio.value=='rightonly')
                  document.getElementById(arr[i]+'RTtenderness'+val).checked='true';
            else{
                  document.getElementById(arr[i]+'LTtenderness'+val).checked='true';
                  document.getElementById(arr[i]+'RTtenderness'+val).checked='true';
            }
      }
}
</script>

<table><tr><td>
<input type="hidden" name="objectivesubmit" value="Save">
<input type="image" src="{{ asset('nlimages/savebutton.png') }}" height="25" onclick="javascript:whichsubmitted('objective');"> <img src="{{ asset('nlimages/clearbutton.png') }}" alt="Clear" onclick="javascript:clearform();" /></td><td>Pre-populate: <select onchange="javascript:showpopu();" id="showpop"><option value="" selected></option><option value="cervical">Cervical</option><option value="thoracic">Thoracic</option><option value="lumbar">Lumbar</option><option value="all">All</option></select></td><td>
<div id="cervical" style="display:none;border:1px solid #d9d9d9;padding:5px;">

<b>C1 / C2, C5-C7</b> <u>Fixations</u>:<input type="radio"  name="populatecervical" value="leftonly" onclick="populate('cervical','left');"> Left <input type="radio" name="populatecervical" value="rightonly" onclick="populate('cervical','right');"> Right
<input type="radio" name="populatecervical" value="all" onclick="populate('cervical','all');"> Both <u>Tenderness</u>: 
<input type="radio" name="tendernesscervical" value="1" onclick="populatetenderness('cervical','1')"> 1 <input type="radio" name="tendernesscervical" value="2"  onclick="populatetenderness('cervical','2')" /> 2 <input type="radio" name="tendernesscervical" value="3" onclick="populatetenderness('cervical','3')" /> 3
 <input type="radio" name="tendernesscervical" value="4" onclick="populatetenderness('cervical','4')" /> 4
</div>

<div id="thoracic" style="display:none;border:1px solid #d9d9d9;padding:5px;">
<b>T1 / T2, T5-T7</b> <u>Fixations</u>:<input type="radio"  name="populatethoracic" value="leftonly" onclick="populate('thoracic','left');"> Left <input type="radio" name="populatethoracic" value="rightonly" onclick="populate('thoracic','right');"> Right<input type="radio" name="populatecervical" value="all" onclick="populate('thoracic','all');"> Both <u>Tenderness</u>: 
<input type="radio" name="tendernessthoracic" value="1" onclick="populatetenderness('thoracic','1')"> 1 <input type="radio" name="tendernessthoracic" value="2"  onclick="populatetenderness('thoracic','2')" /> 2 <input type="radio" name="tendernessthoracic" value="3" onclick="populatetenderness('thoracic','3')" /> 3
 <input type="radio" name="tendernessthoracic" value="4" onclick="populatetenderness('thoracic','4')" /> 4
</div>
<div id="lumbar" style="display:none;border:1px solid #d9d9d9;padding:5px;">
<b>L4 / L5</b> <u>Fixations</u>:<input type="radio"  name="populatelumbar" value="leftonly" onclick="populate('cervical','left');"> Left <input type="radio" name="populatelumbar" value="rightonly" onclick="populate('lumbar','right');"> Right<input type="radio" name="populatelumbar" value="all" onclick="populate('lumbar','all');"> Both <u>Tenderness</u>:<input type="radio" name="tendernesslumbar" value="1" onclick="populatetenderness('lumbar','1')"> 1 <input type="radio" name="tendernesslumbar" value="2"  onclick="populatetenderness('lumbar','2')" /> 2 <input type="radio" name="tendernesslumbar" value="3" onclick="populatetenderness('lumbar','3')" /> 3
<input type="radio" name="tendernesslumbar" value="4" onclick="populatetenderness('lumbar','4')" /> 4
</div>
<div id="all" style="display:none;border:1px solid #d9d9d9;padding:5px;"><b>C1 / C2, C5-C7, T1 / T2, T5-T7, L4 / L5</b> <u>Fixations</u>:<input type="radio"  name="populateall" value="leftonly" onclick="populate('all','left');"> Left<input type="radio" name="populateall" value="rightonly" onclick="populate('all','right');"> Right<input type="radio" name="populateall" value="all" onclick="populate('all','all');"> Both <u>Tenderness</u>:<input type="radio" name="tendernessall" value="1" onclick="populatetenderness('all','1')"> 1 <input type="radio" name="tendernessall" value="2"  onclick="populatetenderness('all','2')" /> 2 <input type="radio" name="tendernessall" value="3" onclick="populatetenderness('all','3')" /> 3
 <input type="radio" name="tendernessall" value="4" onclick="populatetenderness('all','4')" /> 4
</div>
</td></tr></table>
<table width="100%"><tr><td width="5%" valign="top">
</td>
<td width="95%">
<script>
      var cervicalall=['OCC','C1','C2','C3','C4','C5','C6','C7'];
      var thoracicall=['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12'];
      var lumbarall=['L1','L2','L3','L5','L5'];
function adjustmenttype(i,area){
      var end=i;
      var arr;
      if(i==0){ end=8; arr=cervicalall; }
      if(i==9){ end=21; arr=thoracicall; }
      if(i==22){ end=27; arr=lumbarall; }
      for(var i2=parseInt(i)+1,i3=0;i2<=end;i2++,i3++){
            if(document.getElementById(arr[i3]+'RTadjustment').checked||document.getElementById(arr[i3]+'LTadjustment').checked){
                  document.getElementById('adjustmenttypeselect'+i2).value=document.getElementById('adjustmenttypeselect'+i).value;
                  adjustmenttype(i2,area);
            }
      }
      var adjustmenttypeselect=document.getElementById('adjustmenttypeselect'+i);
      var str=document.getElementById('adjustmenttypediv'+i).innerText;
      if(document.getElementById('adjustmenttypeselect'+i).value=='Clear'){
            document.getElementById('adjustmenttypediv'+i).innerText='';
            document.getElementById('adjustmenttype'+i).value='';
            adjustmenttypeselect.options[adjustmenttypeselect.options.length-1] = null;
            adjustmenttypeselect.options[adjustmenttypeselect.options.length-1] = null;
            adjustmenttypeselect.value='Select';
      }
      else{
            if(str==''){
                  document.getElementById('adjustmenttype'+i).value=document.getElementById('adjustmenttypeselect'+i).value;
                  document.getElementById('adjustmenttypediv'+i).innerText=document.getElementById('adjustmenttypeselect'+i).value;
            }
            else{
                  document.getElementById('adjustmenttype'+i).value=str+', '+document.getElementById('adjustmenttypeselect'+i).value;
                  document.getElementById('adjustmenttypediv'+i).innerText=str+', '+document.getElementById('adjustmenttypeselect'+i).value;
            }
            if(adjustmenttypeselect.options[adjustmenttypeselect.options.length-1].value!='Clear'){
                  adjustmenttypeselect.options[adjustmenttypeselect.options.length] = new Option('Add');
                  adjustmenttypeselect.options[adjustmenttypeselect.options.length] = new Option('Clear');
            }
            adjustmenttypeselect.value='Add';
      }
      adjustdivs();
}
function adjpoppt(str,i){
      if(str!='Select'&&str!=''){
            document.getElementById('adjustmenttypediv'+i).innerText=str;
            document.getElementById('adjustmenttype'+i).value=str;
            var adjustmenttypeselect=document.getElementById('adjustmenttypeselect'+i);
            adjustmenttypeselect.options[adjustmenttypeselect.options.length] = new Option('Add');
            adjustmenttypeselect.options[adjustmenttypeselect.options.length] = new Option('Clear');
            adjustmenttypeselect.value='Add';
      }
}
function adjustdivs(){
      var cervicaldiv=['C1','C2','C3','C4','C5','C6','C7'];
      var thoracicdiv=['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12'];
      var lumbardiv=['L1','L2','L3','L5','L5'];
      var upperdiv=['Clavicle','Shoulder','Elbow','Wrist','Hand'];
      var ribsdiv=['Ribs'];
      var lowerdiv=['Hip','Knee','Ankle','Foot','Other'];
      var cervicalheight=0;
      for(var i=0;i<cervicaldiv.length;i++){
            cervicalheight+=parseInt(document.getElementById(cervicaldiv[i]+'tr').offsetHeight);
      }
      if(cervicalheight>cervicaldiv.length*33)
            document.getElementById('C1labeldiv').style.bottom='16px';
      else
            document.getElementById('C1labeldiv').style.bottom='8px';
      document.getElementById('C1labeldiv').style.height=cervicalheight+'px';
      document.getElementById('C1labeltr').style.height=cervicalheight+'px';
      var thoracicheight=0;
      for(var i=0;i<thoracicdiv.length;i++){
            thoracicheight+=parseInt(document.getElementById(thoracicdiv[i]+'tr').offsetHeight);
      }
      if(thoracicheight>thoracicdiv.length*33)
            document.getElementById('T1labeldiv').style.bottom='16px';
      else
            document.getElementById('T1labeldiv').style.bottom='8px';
      document.getElementById('T1labeldiv').style.height=thoracicheight+'px';
      document.getElementById('T1labeltr').style.height=thoracicheight+'px';
      var lumbarheight=0;
      for(var i=0;i<lumbardiv.length;i++){
            lumbarheight+=parseInt(document.getElementById(lumbardiv[i]+'tr').offsetHeight);
      }
      if(lumbarheight>lumbardiv.length*33)
            document.getElementById('L1labeldiv').style.bottom='16px';
      else
            document.getElementById('L1labeldiv').style.bottom='8px';
      document.getElementById('L1labeldiv').style.height=lumbarheight+'px';
      document.getElementById('L1labeltr').style.height=lumbarheight+'px';
      var upperheight=0;
      for(var i=0;i<upperdiv.length;i++){
            upperheight+=parseInt(document.getElementById(upperdiv[i]+'tr').offsetHeight);
      }
      if(upperheight>upperdiv.length*33)
            document.getElementById('Claviclelabeldiv').style.bottom='16px';
      else
            document.getElementById('Claviclelabeldiv').style.bottom='8px';
      document.getElementById('Claviclelabeldiv').style.height=upperheight+'px';
      document.getElementById('Claviclelabeltr').style.height=upperheight+'px';
      var ribsheight=0;
      for(var i=0;i<ribsdiv.length;i++){
            ribsheight+=parseInt(document.getElementById(ribsdiv[i]+'tr').offsetHeight);
      }
      if(ribsheight>ribsdiv.length*33)
            document.getElementById('Ribslabeldiv').style.bottom='16px';
      else
            document.getElementById('Ribslabeldiv').style.bottom='8px';
      document.getElementById('Ribslabeldiv').style.height=ribsheight+'px';
      document.getElementById('Ribslabeltr').style.height=ribsheight+'px';
      var lowerheight=0;
      for(var i=0;i<lowerdiv.length;i++){
            lowerheight+=parseInt(document.getElementById(lowerdiv[i]+'tr').offsetHeight);
      }
      if(lowerheight>lowerdiv.length*33)
            document.getElementById('Hiplabeldiv').style.bottom='16px';
      else
            document.getElementById('Hiplabeldiv').style.bottom='8px';
      document.getElementById('Hiplabeldiv').style.height=lowerheight+'px';
      document.getElementById('Hiplabeltr').style.height=lowerheight+'px';
}
function populateareas(area,type){
      var arr=[];
      if(area=='Cervical') arr=cervicalall; if(area=='Lumbar') arr=lumbarall; if(area=='Thoracic') arr=thoracicall;
      for(var i=0;i<arr.length;i++){
            if(document.getElementById(area+type).checked){ document.getElementById(arr[i]+type).checked='true';
            document.getElementById(arr[i]+type).onchange(); }
            if(!document.getElementById(area+type).checked){ document.getElementById(arr[i]+type).checked='';
            document.getElementById(arr[i]+type).onchange(); }
      }
      if(type=='LTadjustment'){
            if(document.getElementById(area+type).checked) document.getElementById(area+'LTfixation').checked='true';
            if(!document.getElementById(area+type).checked) document.getElementById(area+'LTfixation').checked='';
      }
      if(type=='RTadjustment'){
            if(document.getElementById(area+type).checked) document.getElementById(area+'RTfixation').checked='true';
            if(!document.getElementById(area+type).checked) document.getElementById(area+'RTfixation').checked='';
      }
}
function cleartenderness(adj){
      for(var i=1;i<=4;i++){
            document.getElementById(adj+'LTtenderness'+i).checked=false;
            document.getElementById(adj+'RTtenderness'+i).checked=false;
      }
}
</script>
      <table border="1" cellspacing=0 cellpadding=5 width="100%" style="border:1px solid #f1f1f1;">
<tr bgcolor="#f1f1f1"><td colspan="3" align="center" width="15%">Fixations</td>
<td colspan="3" align="center" width="15%">Region Adjusted</td>
<td colspan="4" align="center" width="45%">Tenderness / Muscle Spasm<br>( slight = 1 ) ( mild = 2 ) ( moderate = 3 ) ( severe = 4 )</td><td width="20%">Adjustment Type</td></tr>
<tr><td>&nbsp;</td><td align="center">LT</td><td align="center">RT</td><td>&nbsp;</td><td align="center">LT</td><td align="center">RT</td><td>&nbsp;</td><td align="center">LT</td><td align="center">RT</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr bgcolor="#ffd8d8" id="Cervicaltr"><td>Cervical</td><td align="center">
  <input type="checkbox" id="CervicalLTfixation" name="CervicalLTfixation" value="true" onchange="javascript:populateareas('Cervical','LTfixation');">
      </td><td align="center">
  <input type="checkbox" id="CervicalRTfixation" name="CervicalRTfixation" value="true" onchange="javascript:populateareas('Cervical','RTfixation');"></td>
      <td>Cervical</td><td align="center"><input type="checkbox" name="CervicalLTadjustment" id="CervicalLTadjustment" value="true" onchange="javascript:populateareas('Cervical','LTadjustment');"></td><td align="center"><input type="checkbox" name="CervicalRTadjustment" id="CervicalRTadjustment" value="true" onchange="javascript:populateareas('Cervical','RTadjustment');"></td>
      <td>Cervical</td><td align="center"><input type="radio" name="CervicalLTtenderness" id="CervicalLTtenderness1" value="1" onchange="javascript:tendernessall('Cervical','LTtenderness1');" > 1
      <input type="radio" name="CervicalLTtenderness" id="CervicalLTtenderness2" value="2" onchange="javascript:tendernessall('Cervical','LTtenderness2');" > 2
      <input type="radio" name="CervicalLTtenderness" id="CervicalLTtenderness3" value="3" onchange="javascript:tendernessall('Cervical','LTtenderness3');" > 3
      <input type="radio" name="CervicalLTtenderness" id="CervicalLTtenderness4" value="4" onchange="javascript:tendernessall('Cervical','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="CervicalRTtenderness" id="CervicalRTtenderness1" value="1" onchange="javascript:tendernessall('Cervical','RTtenderness1');" > 1
      <input type="radio" name="CervicalRTtenderness" id="CervicalRTtenderness2" value="2" onchange="javascript:tendernessall('Cervical','RTtenderness2');" > 2
      <input type="radio" name="CervicalRTtenderness" id="CervicalRTtenderness3" value="3" onchange="javascript:tendernessall('Cervical','RTtenderness3');" > 3
      <input type="radio" name="CervicalRTtenderness" id="CervicalRTtenderness4" value="4" onchange="javascript:tendernessall('Cervical','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Cervical');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv0"></div>
    <input type="hidden" name="Cervicaladjustmenttype" id="adjustmenttype0" />
      <select name="adjustmenttypeselect0" id="adjustmenttypeselect0" onchange="javascript:adjustmenttype('0','Cervical')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',0);</script>    
    </tr><tr id="OCCtr"><td>OCC</td><td align="center"><input type="checkbox" id="OCCLTfixation" name="OCCLTfixation" value="true" onchange="javascript:populateareas('OCC','LTfixation');">
      </td><td align="center"><input type="checkbox" id="OCCRTfixation" name="OCCRTfixation" value="true" onchange="javascript:populateareas('OCC','RTfixation');"></td>
      <td>OCC</td><td align="center"><input type="checkbox" name="OCCLTadjustment" id="OCCLTadjustment" value="true" onchange="javascript:populateareas('OCC','LTadjustment');"></td><td align="center"><input type="checkbox" name="OCCRTadjustment" id="OCCRTadjustment" value="true" onchange="javascript:populateareas('OCC','RTadjustment');"></td>
      <td>OCC</td><td align="center"><input type="radio" name="OCCLTtenderness" id="OCCLTtenderness1" value="1" onchange="javascript:tendernessall('OCC','LTtenderness1');" > 1
      <input type="radio" name="OCCLTtenderness" id="OCCLTtenderness2" value="2" onchange="javascript:tendernessall('OCC','LTtenderness2');" > 2
      <input type="radio" name="OCCLTtenderness" id="OCCLTtenderness3" value="3" onchange="javascript:tendernessall('OCC','LTtenderness3');" > 3
      <input type="radio" name="OCCLTtenderness" id="OCCLTtenderness4" value="4" onchange="javascript:tendernessall('OCC','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="OCCRTtenderness" id="OCCRTtenderness1" value="1" onchange="javascript:tendernessall('OCC','RTtenderness1');" > 1
      <input type="radio" name="OCCRTtenderness" id="OCCRTtenderness2" value="2" onchange="javascript:tendernessall('OCC','RTtenderness2');" > 2
      <input type="radio" name="OCCRTtenderness" id="OCCRTtenderness3" value="3" onchange="javascript:tendernessall('OCC','RTtenderness3');" > 3
      <input type="radio" name="OCCRTtenderness" id="OCCRTtenderness4" value="4" onchange="javascript:tendernessall('OCC','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('OCC');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv1"></div>
    <input type="hidden" name="OCCadjustmenttype" id="adjustmenttype1" />
      <select name="adjustmenttypeselect1" id="adjustmenttypeselect1" onchange="javascript:adjustmenttype('1','OCC')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',1);</script>    
    </tr><tr bgcolor="#d9f0f6" id="C1tr"><td><div style="position:absolute;width:0px;height:0px;"><div style="position:relative;right:60px;bottom:8px;width:50px;height:230px;border:1px solid #d9d9d9;background-color:#d9f0f6;color:white;vertical-align:middle;z-index:-1" id="C1labeldiv">
      <table width="50 height="230"><tr height="230" id="C1labeltr"><td width="50" valign="middle" align="center"><b>C<br>E<br>R<br>V<br>I<br>C<br>A<br>L</b><br></b></td></tr></table></div></div>C1</td><td align="center"><input type="checkbox" id="C1LTfixation" name="C1LTfixation" value="true" onchange="javascript:populateareas('C1','LTfixation');">
      </td><td align="center"><input type="checkbox" id="C1RTfixation" name="C1RTfixation" value="true" onchange="javascript:populateareas('C1','RTfixation');"></td>
      <td>C1</td><td align="center"><input type="checkbox" name="C1LTadjustment" id="C1LTadjustment" value="true" onchange="javascript:populateareas('C1','LTadjustment');"></td><td align="center"><input type="checkbox" name="C1RTadjustment" id="C1RTadjustment" value="true" onchange="javascript:populateareas('C1','RTadjustment');"></td>
      <td>C1</td><td align="center"><input type="radio" name="C1LTtenderness" id="C1LTtenderness1" value="1" onchange="javascript:tendernessall('C1','LTtenderness1');" > 1
      <input type="radio" name="C1LTtenderness" id="C1LTtenderness2" value="2" onchange="javascript:tendernessall('C1','LTtenderness2');" > 2
      <input type="radio" name="C1LTtenderness" id="C1LTtenderness3" value="3" onchange="javascript:tendernessall('C1','LTtenderness3');" > 3
      <input type="radio" name="C1LTtenderness" id="C1LTtenderness4" value="4" onchange="javascript:tendernessall('C1','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="C1RTtenderness" id="C1RTtenderness1" value="1" onchange="javascript:tendernessall('C1','RTtenderness1');" > 1
      <input type="radio" name="C1RTtenderness" id="C1RTtenderness2" value="2" onchange="javascript:tendernessall('C1','RTtenderness2');" > 2
      <input type="radio" name="C1RTtenderness" id="C1RTtenderness3" value="3" onchange="javascript:tendernessall('C1','RTtenderness3');" > 3
      <input type="radio" name="C1RTtenderness" id="C1RTtenderness4" value="4" onchange="javascript:tendernessall('C1','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('C1');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv2"></div>
    <input type="hidden" name="C1adjustmenttype" id="adjustmenttype2" />
      <select name="adjustmenttypeselect2" id="adjustmenttypeselect2" onchange="javascript:adjustmenttype('2','C1')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',2);</script>    
    </tr><tr bgcolor="#d9f0f6" id="C2tr"><td>C2</td><td align="center"><input type="checkbox" id="C2LTfixation" name="C2LTfixation" value="true" onchange="javascript:populateareas('C2','LTfixation');">
      </td><td align="center"><input type="checkbox" id="C2RTfixation" name="C2RTfixation" value="true" onchange="javascript:populateareas('C2','RTfixation');"></td>
      <td>C2</td><td align="center"><input type="checkbox" name="C2LTadjustment" id="C2LTadjustment" value="true" onchange="javascript:populateareas('C2','LTadjustment');"></td><td align="center"><input type="checkbox" name="C2RTadjustment" id="C2RTadjustment" value="true" onchange="javascript:populateareas('C2','RTadjustment');"></td>
      <td>C2</td><td align="center"><input type="radio" name="C2LTtenderness" id="C2LTtenderness1" value="1" onchange="javascript:tendernessall('C2','LTtenderness1');" > 1
      <input type="radio" name="C2LTtenderness" id="C2LTtenderness2" value="2" onchange="javascript:tendernessall('C2','LTtenderness2');" > 2
      <input type="radio" name="C2LTtenderness" id="C2LTtenderness3" value="3" onchange="javascript:tendernessall('C2','LTtenderness3');" > 3
      <input type="radio" name="C2LTtenderness" id="C2LTtenderness4" value="4" onchange="javascript:tendernessall('C2','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="C2RTtenderness" id="C2RTtenderness1" value="1" onchange="javascript:tendernessall('C2','RTtenderness1');" > 1
      <input type="radio" name="C2RTtenderness" id="C2RTtenderness2" value="2" onchange="javascript:tendernessall('C2','RTtenderness2');" > 2
      <input type="radio" name="C2RTtenderness" id="C2RTtenderness3" value="3" onchange="javascript:tendernessall('C2','RTtenderness3');" > 3
      <input type="radio" name="C2RTtenderness" id="C2RTtenderness4" value="4" onchange="javascript:tendernessall('C2','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('C2');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv3"></div>
    <input type="hidden" name="C2adjustmenttype" id="adjustmenttype3" />
      <select name="adjustmenttypeselect3" id="adjustmenttypeselect3" onchange="javascript:adjustmenttype('3','C2')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',3);</script>    
    </tr><tr bgcolor="#d9f0f6" id="C3tr"><td>C3</td><td align="center"><input type="checkbox" id="C3LTfixation" name="C3LTfixation" value="true" onchange="javascript:populateareas('C3','LTfixation');">
      </td><td align="center"><input type="checkbox" id="C3RTfixation" name="C3RTfixation" value="true" onchange="javascript:populateareas('C3','RTfixation');"></td>
      <td>C3</td><td align="center"><input type="checkbox" name="C3LTadjustment" id="C3LTadjustment" value="true" onchange="javascript:populateareas('C3','LTadjustment');"></td><td align="center"><input type="checkbox" name="C3RTadjustment" id="C3RTadjustment" value="true" onchange="javascript:populateareas('C3','RTadjustment');"></td>
      <td>C3</td><td align="center"><input type="radio" name="C3LTtenderness" id="C3LTtenderness1" value="1" onchange="javascript:tendernessall('C3','LTtenderness1');" > 1
      <input type="radio" name="C3LTtenderness" id="C3LTtenderness2" value="2" onchange="javascript:tendernessall('C3','LTtenderness2');" > 2
      <input type="radio" name="C3LTtenderness" id="C3LTtenderness3" value="3" onchange="javascript:tendernessall('C3','LTtenderness3');" > 3
      <input type="radio" name="C3LTtenderness" id="C3LTtenderness4" value="4" onchange="javascript:tendernessall('C3','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="C3RTtenderness" id="C3RTtenderness1" value="1" onchange="javascript:tendernessall('C3','RTtenderness1');" > 1
      <input type="radio" name="C3RTtenderness" id="C3RTtenderness2" value="2" onchange="javascript:tendernessall('C3','RTtenderness2');" > 2
      <input type="radio" name="C3RTtenderness" id="C3RTtenderness3" value="3" onchange="javascript:tendernessall('C3','RTtenderness3');" > 3
      <input type="radio" name="C3RTtenderness" id="C3RTtenderness4" value="4" onchange="javascript:tendernessall('C3','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('C3');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv4"></div>
    <input type="hidden" name="C3adjustmenttype" id="adjustmenttype4" />
      <select name="adjustmenttypeselect4" id="adjustmenttypeselect4" onchange="javascript:adjustmenttype('4','C3')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',4);</script>    
    </tr><tr bgcolor="#d9f0f6" id="C4tr"><td>C4</td><td align="center"><input type="checkbox" id="C4LTfixation" name="C4LTfixation" value="true" onchange="javascript:populateareas('C4','LTfixation');">
      </td><td align="center"><input type="checkbox" id="C4RTfixation" name="C4RTfixation" value="true" onchange="javascript:populateareas('C4','RTfixation');"></td>
      <td>C4</td><td align="center"><input type="checkbox" name="C4LTadjustment" id="C4LTadjustment" value="true" onchange="javascript:populateareas('C4','LTadjustment');"></td><td align="center"><input type="checkbox" name="C4RTadjustment" id="C4RTadjustment" value="true" onchange="javascript:populateareas('C4','RTadjustment');"></td>
      <td>C4</td><td align="center"><input type="radio" name="C4LTtenderness" id="C4LTtenderness1" value="1" onchange="javascript:tendernessall('C4','LTtenderness1');" > 1
      <input type="radio" name="C4LTtenderness" id="C4LTtenderness2" value="2" onchange="javascript:tendernessall('C4','LTtenderness2');" > 2
      <input type="radio" name="C4LTtenderness" id="C4LTtenderness3" value="3" onchange="javascript:tendernessall('C4','LTtenderness3');" > 3
      <input type="radio" name="C4LTtenderness" id="C4LTtenderness4" value="4" onchange="javascript:tendernessall('C4','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="C4RTtenderness" id="C4RTtenderness1" value="1" onchange="javascript:tendernessall('C4','RTtenderness1');" > 1
      <input type="radio" name="C4RTtenderness" id="C4RTtenderness2" value="2" onchange="javascript:tendernessall('C4','RTtenderness2');" > 2
      <input type="radio" name="C4RTtenderness" id="C4RTtenderness3" value="3" onchange="javascript:tendernessall('C4','RTtenderness3');" > 3
      <input type="radio" name="C4RTtenderness" id="C4RTtenderness4" value="4" onchange="javascript:tendernessall('C4','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('C4');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv5"></div>
    <input type="hidden" name="C4adjustmenttype" id="adjustmenttype5" />
      <select name="adjustmenttypeselect5" id="adjustmenttypeselect5" onchange="javascript:adjustmenttype('5','C4')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',5);</script>    
    </tr><tr bgcolor="#d9f0f6" id="C5tr"><td>C5</td><td align="center"><input type="checkbox" id="C5LTfixation" name="C5LTfixation" value="true" onchange="javascript:populateareas('C5','LTfixation');">
      </td><td align="center"><input type="checkbox" id="C5RTfixation" name="C5RTfixation" value="true" onchange="javascript:populateareas('C5','RTfixation');"></td>
      <td>C5</td><td align="center"><input type="checkbox" name="C5LTadjustment" id="C5LTadjustment" value="true" onchange="javascript:populateareas('C5','LTadjustment');"></td><td align="center"><input type="checkbox" name="C5RTadjustment" id="C5RTadjustment" value="true" onchange="javascript:populateareas('C5','RTadjustment');"></td>
      <td>C5</td><td align="center"><input type="radio" name="C5LTtenderness" id="C5LTtenderness1" value="1" onchange="javascript:tendernessall('C5','LTtenderness1');" > 1
      <input type="radio" name="C5LTtenderness" id="C5LTtenderness2" value="2" onchange="javascript:tendernessall('C5','LTtenderness2');" > 2
      <input type="radio" name="C5LTtenderness" id="C5LTtenderness3" value="3" onchange="javascript:tendernessall('C5','LTtenderness3');" > 3
      <input type="radio" name="C5LTtenderness" id="C5LTtenderness4" value="4" onchange="javascript:tendernessall('C5','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="C5RTtenderness" id="C5RTtenderness1" value="1" onchange="javascript:tendernessall('C5','RTtenderness1');" > 1
      <input type="radio" name="C5RTtenderness" id="C5RTtenderness2" value="2" onchange="javascript:tendernessall('C5','RTtenderness2');" > 2
      <input type="radio" name="C5RTtenderness" id="C5RTtenderness3" value="3" onchange="javascript:tendernessall('C5','RTtenderness3');" > 3
      <input type="radio" name="C5RTtenderness" id="C5RTtenderness4" value="4" onchange="javascript:tendernessall('C5','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('C5');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv6"></div>
    <input type="hidden" name="C5adjustmenttype" id="adjustmenttype6" />
      <select name="adjustmenttypeselect6" id="adjustmenttypeselect6" onchange="javascript:adjustmenttype('6','C5')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',6);</script>    
    </tr><tr bgcolor="#d9f0f6" id="C6tr"><td>C6</td><td align="center"><input type="checkbox" id="C6LTfixation" name="C6LTfixation" value="true" onchange="javascript:populateareas('C6','LTfixation');">
      </td><td align="center"><input type="checkbox" id="C6RTfixation" name="C6RTfixation" value="true" onchange="javascript:populateareas('C6','RTfixation');"></td>
      <td>C6</td><td align="center"><input type="checkbox" name="C6LTadjustment" id="C6LTadjustment" value="true" onchange="javascript:populateareas('C6','LTadjustment');"></td><td align="center"><input type="checkbox" name="C6RTadjustment" id="C6RTadjustment" value="true" onchange="javascript:populateareas('C6','RTadjustment');"></td>
      <td>C6</td><td align="center"><input type="radio" name="C6LTtenderness" id="C6LTtenderness1" value="1" onchange="javascript:tendernessall('C6','LTtenderness1');" > 1
      <input type="radio" name="C6LTtenderness" id="C6LTtenderness2" value="2" onchange="javascript:tendernessall('C6','LTtenderness2');" > 2
      <input type="radio" name="C6LTtenderness" id="C6LTtenderness3" value="3" onchange="javascript:tendernessall('C6','LTtenderness3');" > 3
      <input type="radio" name="C6LTtenderness" id="C6LTtenderness4" value="4" onchange="javascript:tendernessall('C6','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="C6RTtenderness" id="C6RTtenderness1" value="1" onchange="javascript:tendernessall('C6','RTtenderness1');" > 1
      <input type="radio" name="C6RTtenderness" id="C6RTtenderness2" value="2" onchange="javascript:tendernessall('C6','RTtenderness2');" > 2
      <input type="radio" name="C6RTtenderness" id="C6RTtenderness3" value="3" onchange="javascript:tendernessall('C6','RTtenderness3');" > 3
      <input type="radio" name="C6RTtenderness" id="C6RTtenderness4" value="4" onchange="javascript:tendernessall('C6','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('C6');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv7"></div>
    <input type="hidden" name="C6adjustmenttype" id="adjustmenttype7" />
      <select name="adjustmenttypeselect7" id="adjustmenttypeselect7" onchange="javascript:adjustmenttype('7','C6')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',7);</script>    
    </tr><tr bgcolor="#d9f0f6" id="C7tr"><td>C7</td><td align="center"><input type="checkbox" id="C7LTfixation" name="C7LTfixation" value="true" onchange="javascript:populateareas('C7','LTfixation');">
      </td><td align="center"><input type="checkbox" id="C7RTfixation" name="C7RTfixation" value="true" onchange="javascript:populateareas('C7','RTfixation');"></td>
      <td>C7</td><td align="center"><input type="checkbox" name="C7LTadjustment" id="C7LTadjustment" value="true" onchange="javascript:populateareas('C7','LTadjustment');"></td><td align="center"><input type="checkbox" name="C7RTadjustment" id="C7RTadjustment" value="true" onchange="javascript:populateareas('C7','RTadjustment');"></td>
      <td>C7</td><td align="center"><input type="radio" name="C7LTtenderness" id="C7LTtenderness1" value="1" onchange="javascript:tendernessall('C7','LTtenderness1');" > 1
      <input type="radio" name="C7LTtenderness" id="C7LTtenderness2" value="2" onchange="javascript:tendernessall('C7','LTtenderness2');" > 2
      <input type="radio" name="C7LTtenderness" id="C7LTtenderness3" value="3" onchange="javascript:tendernessall('C7','LTtenderness3');" > 3
      <input type="radio" name="C7LTtenderness" id="C7LTtenderness4" value="4" onchange="javascript:tendernessall('C7','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="C7RTtenderness" id="C7RTtenderness1" value="1" onchange="javascript:tendernessall('C7','RTtenderness1');" > 1
      <input type="radio" name="C7RTtenderness" id="C7RTtenderness2" value="2" onchange="javascript:tendernessall('C7','RTtenderness2');" > 2
      <input type="radio" name="C7RTtenderness" id="C7RTtenderness3" value="3" onchange="javascript:tendernessall('C7','RTtenderness3');" > 3
      <input type="radio" name="C7RTtenderness" id="C7RTtenderness4" value="4" onchange="javascript:tendernessall('C7','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('C7');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv8"></div>
    <input type="hidden" name="C7adjustmenttype" id="adjustmenttype8" />
      <select name="adjustmenttypeselect8" id="adjustmenttypeselect8" onchange="javascript:adjustmenttype('8','C7')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',8);</script>    
    </tr><tr bgcolor="#ffd8d8" id="Thoracictr"><td>Thoracic</td><td align="center"><input type="checkbox" id="ThoracicLTfixation" name="ThoracicLTfixation" value="true" onchange="javascript:populateareas('Thoracic','LTfixation');">
      </td><td align="center"><input type="checkbox" id="ThoracicRTfixation" name="ThoracicRTfixation" value="true" onchange="javascript:populateareas('Thoracic','RTfixation');"></td>
      <td>Thoracic</td><td align="center"><input type="checkbox" name="ThoracicLTadjustment" id="ThoracicLTadjustment" value="true" onchange="javascript:populateareas('Thoracic','LTadjustment');"></td><td align="center"><input type="checkbox" name="ThoracicRTadjustment" id="ThoracicRTadjustment" value="true" onchange="javascript:populateareas('Thoracic','RTadjustment');"></td>
      <td>Thoracic</td><td align="center"><input type="radio" name="ThoracicLTtenderness" id="ThoracicLTtenderness1" value="1" onchange="javascript:tendernessall('Thoracic','LTtenderness1');" > 1
      <input type="radio" name="ThoracicLTtenderness" id="ThoracicLTtenderness2" value="2" onchange="javascript:tendernessall('Thoracic','LTtenderness2');" > 2
      <input type="radio" name="ThoracicLTtenderness" id="ThoracicLTtenderness3" value="3" onchange="javascript:tendernessall('Thoracic','LTtenderness3');" > 3
      <input type="radio" name="ThoracicLTtenderness" id="ThoracicLTtenderness4" value="4" onchange="javascript:tendernessall('Thoracic','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="ThoracicRTtenderness" id="ThoracicRTtenderness1" value="1" onchange="javascript:tendernessall('Thoracic','RTtenderness1');" > 1
      <input type="radio" name="ThoracicRTtenderness" id="ThoracicRTtenderness2" value="2" onchange="javascript:tendernessall('Thoracic','RTtenderness2');" > 2
      <input type="radio" name="ThoracicRTtenderness" id="ThoracicRTtenderness3" value="3" onchange="javascript:tendernessall('Thoracic','RTtenderness3');" > 3
      <input type="radio" name="ThoracicRTtenderness" id="ThoracicRTtenderness4" value="4" onchange="javascript:tendernessall('Thoracic','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Thoracic');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv9"></div>
    <input type="hidden" name="Thoracicadjustmenttype" id="adjustmenttype9" />
      <select name="adjustmenttypeselect9" id="adjustmenttypeselect9" onchange="javascript:adjustmenttype('9','Thoracic')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',9);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T1tr"><td><div style="position:absolute;width:0px;height:0px;"><div style="position:relative;right:60px;bottom:8px;width:50px;height:393px;border:1px solid #d9d9d9;background-color:#d9f6e2;color:white;vertical-align:middle;z-index:-1" id="T1labeldiv">
      <table width="50 height="393"><tr height="393" id="T1labeltr"><td width="50" valign="middle" align="center"><b>T<br>H<br>O<br>R<br>A<br>C<br>I<br>C</b><br></b></td></tr></table></div></div>T1</td><td align="center"><input type="checkbox" id="T1LTfixation" name="T1LTfixation" value="true" onchange="javascript:populateareas('T1','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T1RTfixation" name="T1RTfixation" value="true" onchange="javascript:populateareas('T1','RTfixation');"></td>
      <td>T1</td><td align="center"><input type="checkbox" name="T1LTadjustment" id="T1LTadjustment" value="true" onchange="javascript:populateareas('T1','LTadjustment');"></td><td align="center"><input type="checkbox" name="T1RTadjustment" id="T1RTadjustment" value="true" onchange="javascript:populateareas('T1','RTadjustment');"></td>
      <td>T1</td><td align="center"><input type="radio" name="T1LTtenderness" id="T1LTtenderness1" value="1" onchange="javascript:tendernessall('T1','LTtenderness1');" > 1
      <input type="radio" name="T1LTtenderness" id="T1LTtenderness2" value="2" onchange="javascript:tendernessall('T1','LTtenderness2');" > 2
      <input type="radio" name="T1LTtenderness" id="T1LTtenderness3" value="3" onchange="javascript:tendernessall('T1','LTtenderness3');" > 3
      <input type="radio" name="T1LTtenderness" id="T1LTtenderness4" value="4" onchange="javascript:tendernessall('T1','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T1RTtenderness" id="T1RTtenderness1" value="1" onchange="javascript:tendernessall('T1','RTtenderness1');" > 1
      <input type="radio" name="T1RTtenderness" id="T1RTtenderness2" value="2" onchange="javascript:tendernessall('T1','RTtenderness2');" > 2
      <input type="radio" name="T1RTtenderness" id="T1RTtenderness3" value="3" onchange="javascript:tendernessall('T1','RTtenderness3');" > 3
      <input type="radio" name="T1RTtenderness" id="T1RTtenderness4" value="4" onchange="javascript:tendernessall('T1','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T1');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv10"></div>
    <input type="hidden" name="T1adjustmenttype" id="adjustmenttype10" />
      <select name="adjustmenttypeselect10" id="adjustmenttypeselect10" onchange="javascript:adjustmenttype('10','T1')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',10);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T2tr"><td>T2</td><td align="center"><input type="checkbox" id="T2LTfixation" name="T2LTfixation" value="true" onchange="javascript:populateareas('T2','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T2RTfixation" name="T2RTfixation" value="true" onchange="javascript:populateareas('T2','RTfixation');"></td>
      <td>T2</td><td align="center"><input type="checkbox" name="T2LTadjustment" id="T2LTadjustment" value="true" onchange="javascript:populateareas('T2','LTadjustment');"></td><td align="center"><input type="checkbox" name="T2RTadjustment" id="T2RTadjustment" value="true" onchange="javascript:populateareas('T2','RTadjustment');"></td>
      <td>T2</td><td align="center"><input type="radio" name="T2LTtenderness" id="T2LTtenderness1" value="1" onchange="javascript:tendernessall('T2','LTtenderness1');" > 1
      <input type="radio" name="T2LTtenderness" id="T2LTtenderness2" value="2" onchange="javascript:tendernessall('T2','LTtenderness2');" > 2
      <input type="radio" name="T2LTtenderness" id="T2LTtenderness3" value="3" onchange="javascript:tendernessall('T2','LTtenderness3');" > 3
      <input type="radio" name="T2LTtenderness" id="T2LTtenderness4" value="4" onchange="javascript:tendernessall('T2','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T2RTtenderness" id="T2RTtenderness1" value="1" onchange="javascript:tendernessall('T2','RTtenderness1');" > 1
      <input type="radio" name="T2RTtenderness" id="T2RTtenderness2" value="2" onchange="javascript:tendernessall('T2','RTtenderness2');" > 2
      <input type="radio" name="T2RTtenderness" id="T2RTtenderness3" value="3" onchange="javascript:tendernessall('T2','RTtenderness3');" > 3
      <input type="radio" name="T2RTtenderness" id="T2RTtenderness4" value="4" onchange="javascript:tendernessall('T2','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T2');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv11"></div>
    <input type="hidden" name="T2adjustmenttype" id="adjustmenttype11" />
      <select name="adjustmenttypeselecT11" id="adjustmenttypeselecT11" onchange="javascript:adjustmenttype('11','T2')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',11);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T3tr"><td>T3</td><td align="center"><input type="checkbox" id="T3LTfixation" name="T3LTfixation" value="true" onchange="javascript:populateareas('T3','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T3RTfixation" name="T3RTfixation" value="true" onchange="javascript:populateareas('T3','RTfixation');"></td>
      <td>T3</td><td align="center"><input type="checkbox" name="T3LTadjustment" id="T3LTadjustment" value="true" onchange="javascript:populateareas('T3','LTadjustment');"></td><td align="center"><input type="checkbox" name="T3RTadjustment" id="T3RTadjustment" value="true" onchange="javascript:populateareas('T3','RTadjustment');"></td>
      <td>T3</td><td align="center"><input type="radio" name="T3LTtenderness" id="T3LTtenderness1" value="1" onchange="javascript:tendernessall('T3','LTtenderness1');" > 1
      <input type="radio" name="T3LTtenderness" id="T3LTtenderness2" value="2" onchange="javascript:tendernessall('T3','LTtenderness2');" > 2
      <input type="radio" name="T3LTtenderness" id="T3LTtenderness3" value="3" onchange="javascript:tendernessall('T3','LTtenderness3');" > 3
      <input type="radio" name="T3LTtenderness" id="T3LTtenderness4" value="4" onchange="javascript:tendernessall('T3','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T3RTtenderness" id="T3RTtenderness1" value="1" onchange="javascript:tendernessall('T3','RTtenderness1');" > 1
      <input type="radio" name="T3RTtenderness" id="T3RTtenderness2" value="2" onchange="javascript:tendernessall('T3','RTtenderness2');" > 2
      <input type="radio" name="T3RTtenderness" id="T3RTtenderness3" value="3" onchange="javascript:tendernessall('T3','RTtenderness3');" > 3
      <input type="radio" name="T3RTtenderness" id="T3RTtenderness4" value="4" onchange="javascript:tendernessall('T3','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T3');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv12"></div>
    <input type="hidden" name="T3adjustmenttype" id="adjustmenttype12" />
      <select name="adjustmenttypeselecT12" id="adjustmenttypeselecT12" onchange="javascript:adjustmenttype('12','T3')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',12);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T4tr"><td>T4</td><td align="center"><input type="checkbox" id="T4LTfixation" name="T4LTfixation" value="true" onchange="javascript:populateareas('T4','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T4RTfixation" name="T4RTfixation" value="true" onchange="javascript:populateareas('T4','RTfixation');"></td>
      <td>T4</td><td align="center"><input type="checkbox" name="T4LTadjustment" id="T4LTadjustment" value="true" onchange="javascript:populateareas('T4','LTadjustment');"></td><td align="center"><input type="checkbox" name="T4RTadjustment" id="T4RTadjustment" value="true" onchange="javascript:populateareas('T4','RTadjustment');"></td>
      <td>T4</td><td align="center"><input type="radio" name="T4LTtenderness" id="T4LTtenderness1" value="1" onchange="javascript:tendernessall('T4','LTtenderness1');" > 1
      <input type="radio" name="T4LTtenderness" id="T4LTtenderness2" value="2" onchange="javascript:tendernessall('T4','LTtenderness2');" > 2
      <input type="radio" name="T4LTtenderness" id="T4LTtenderness3" value="3" onchange="javascript:tendernessall('T4','LTtenderness3');" > 3
      <input type="radio" name="T4LTtenderness" id="T4LTtenderness4" value="4" onchange="javascript:tendernessall('T4','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T4RTtenderness" id="T4RTtenderness1" value="1" onchange="javascript:tendernessall('T4','RTtenderness1');" > 1
      <input type="radio" name="T4RTtenderness" id="T4RTtenderness2" value="2" onchange="javascript:tendernessall('T4','RTtenderness2');" > 2
      <input type="radio" name="T4RTtenderness" id="T4RTtenderness3" value="3" onchange="javascript:tendernessall('T4','RTtenderness3');" > 3
      <input type="radio" name="T4RTtenderness" id="T4RTtenderness4" value="4" onchange="javascript:tendernessall('T4','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T4');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv13"></div>
    <input type="hidden" name="T4adjustmenttype" id="adjustmenttype13" />
      <select name="adjustmenttypeselect13" id="adjustmenttypeselect13" onchange="javascript:adjustmenttype('13','T4')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',13);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T5tr"><td>T5</td><td align="center"><input type="checkbox" id="T5LTfixation" name="T5LTfixation" value="true" onchange="javascript:populateareas('T5','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T5RTfixation" name="T5RTfixation" value="true" onchange="javascript:populateareas('T5','RTfixation');"></td>
      <td>T5</td><td align="center"><input type="checkbox" name="T5LTadjustment" id="T5LTadjustment" value="true" onchange="javascript:populateareas('T5','LTadjustment');"></td><td align="center"><input type="checkbox" name="T5RTadjustment" id="T5RTadjustment" value="true" onchange="javascript:populateareas('T5','RTadjustment');"></td>
      <td>T5</td><td align="center"><input type="radio" name="T5LTtenderness" id="T5LTtenderness1" value="1" onchange="javascript:tendernessall('T5','LTtenderness1');" > 1
      <input type="radio" name="T5LTtenderness" id="T5LTtenderness2" value="2" onchange="javascript:tendernessall('T5','LTtenderness2');" > 2
      <input type="radio" name="T5LTtenderness" id="T5LTtenderness3" value="3" onchange="javascript:tendernessall('T5','LTtenderness3');" > 3
      <input type="radio" name="T5LTtenderness" id="T5LTtenderness4" value="4" onchange="javascript:tendernessall('T5','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T5RTtenderness" id="T5RTtenderness1" value="1" onchange="javascript:tendernessall('T5','RTtenderness1');" > 1
      <input type="radio" name="T5RTtenderness" id="T5RTtenderness2" value="2" onchange="javascript:tendernessall('T5','RTtenderness2');" > 2
      <input type="radio" name="T5RTtenderness" id="T5RTtenderness3" value="3" onchange="javascript:tendernessall('T5','RTtenderness3');" > 3
      <input type="radio" name="T5RTtenderness" id="T5RTtenderness4" value="4" onchange="javascript:tendernessall('T5','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T5');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv14"></div>
    <input type="hidden" name="T5adjustmenttype" id="adjustmenttype14" />
      <select name="adjustmenttypeselect14" id="adjustmenttypeselect14" onchange="javascript:adjustmenttype('14','T5')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',14);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T6tr"><td>T6</td><td align="center"><input type="checkbox" id="T6LTfixation" name="T6LTfixation" value="true" onchange="javascript:populateareas('T6','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T6RTfixation" name="T6RTfixation" value="true" onchange="javascript:populateareas('T6','RTfixation');"></td>
      <td>T6</td><td align="center"><input type="checkbox" name="T6LTadjustment" id="T6LTadjustment" value="true" onchange="javascript:populateareas('T6','LTadjustment');"></td><td align="center"><input type="checkbox" name="T6RTadjustment" id="T6RTadjustment" value="true" onchange="javascript:populateareas('T6','RTadjustment');"></td>
      <td>T6</td><td align="center"><input type="radio" name="T6LTtenderness" id="T6LTtenderness1" value="1" onchange="javascript:tendernessall('T6','LTtenderness1');" > 1
      <input type="radio" name="T6LTtenderness" id="T6LTtenderness2" value="2" onchange="javascript:tendernessall('T6','LTtenderness2');" > 2
      <input type="radio" name="T6LTtenderness" id="T6LTtenderness3" value="3" onchange="javascript:tendernessall('T6','LTtenderness3');" > 3
      <input type="radio" name="T6LTtenderness" id="T6LTtenderness4" value="4" onchange="javascript:tendernessall('T6','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T6RTtenderness" id="T6RTtenderness1" value="1" onchange="javascript:tendernessall('T6','RTtenderness1');" > 1
      <input type="radio" name="T6RTtenderness" id="T6RTtenderness2" value="2" onchange="javascript:tendernessall('T6','RTtenderness2');" > 2
      <input type="radio" name="T6RTtenderness" id="T6RTtenderness3" value="3" onchange="javascript:tendernessall('T6','RTtenderness3');" > 3
      <input type="radio" name="T6RTtenderness" id="T6RTtenderness4" value="4" onchange="javascript:tendernessall('T6','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T6');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv15"></div>
    <input type="hidden" name="T6adjustmenttype" id="adjustmenttype15" />
      <select name="adjustmenttypeselect15" id="adjustmenttypeselect15" onchange="javascript:adjustmenttype('15','T6')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',15);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T7tr"><td>T7</td><td align="center"><input type="checkbox" id="T7LTfixation" name="T7LTfixation" value="true" onchange="javascript:populateareas('T7','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T7RTfixation" name="T7RTfixation" value="true" onchange="javascript:populateareas('T7','RTfixation');"></td>
      <td>T7</td><td align="center"><input type="checkbox" name="T7LTadjustment" id="T7LTadjustment" value="true" onchange="javascript:populateareas('T7','LTadjustment');"></td><td align="center"><input type="checkbox" name="T7RTadjustment" id="T7RTadjustment" value="true" onchange="javascript:populateareas('T7','RTadjustment');"></td>
      <td>T7</td><td align="center"><input type="radio" name="T7LTtenderness" id="T7LTtenderness1" value="1" onchange="javascript:tendernessall('T7','LTtenderness1');" > 1
      <input type="radio" name="T7LTtenderness" id="T7LTtenderness2" value="2" onchange="javascript:tendernessall('T7','LTtenderness2');" > 2
      <input type="radio" name="T7LTtenderness" id="T7LTtenderness3" value="3" onchange="javascript:tendernessall('T7','LTtenderness3');" > 3
      <input type="radio" name="T7LTtenderness" id="T7LTtenderness4" value="4" onchange="javascript:tendernessall('T7','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T7RTtenderness" id="T7RTtenderness1" value="1" onchange="javascript:tendernessall('T7','RTtenderness1');" > 1
      <input type="radio" name="T7RTtenderness" id="T7RTtenderness2" value="2" onchange="javascript:tendernessall('T7','RTtenderness2');" > 2
      <input type="radio" name="T7RTtenderness" id="T7RTtenderness3" value="3" onchange="javascript:tendernessall('T7','RTtenderness3');" > 3
      <input type="radio" name="T7RTtenderness" id="T7RTtenderness4" value="4" onchange="javascript:tendernessall('T7','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T7');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv16"></div>
    <input type="hidden" name="T7adjustmenttype" id="adjustmenttype16" />
      <select name="adjustmenttypeselect16" id="adjustmenttypeselect16" onchange="javascript:adjustmenttype('16','T7')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',16);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T8tr"><td>T8</td><td align="center"><input type="checkbox" id="T8LTfixation" name="T8LTfixation" value="true" onchange="javascript:populateareas('T8','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T8RTfixation" name="T8RTfixation" value="true" onchange="javascript:populateareas('T8','RTfixation');"></td>
      <td>T8</td><td align="center"><input type="checkbox" name="T8LTadjustment" id="T8LTadjustment" value="true" onchange="javascript:populateareas('T8','LTadjustment');"></td><td align="center"><input type="checkbox" name="T8RTadjustment" id="T8RTadjustment" value="true" onchange="javascript:populateareas('T8','RTadjustment');"></td>
      <td>T8</td><td align="center"><input type="radio" name="T8LTtenderness" id="T8LTtenderness1" value="1" onchange="javascript:tendernessall('T8','LTtenderness1');" > 1
      <input type="radio" name="T8LTtenderness" id="T8LTtenderness2" value="2" onchange="javascript:tendernessall('T8','LTtenderness2');" > 2
      <input type="radio" name="T8LTtenderness" id="T8LTtenderness3" value="3" onchange="javascript:tendernessall('T8','LTtenderness3');" > 3
      <input type="radio" name="T8LTtenderness" id="T8LTtenderness4" value="4" onchange="javascript:tendernessall('T8','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T8RTtenderness" id="T8RTtenderness1" value="1" onchange="javascript:tendernessall('T8','RTtenderness1');" > 1
      <input type="radio" name="T8RTtenderness" id="T8RTtenderness2" value="2" onchange="javascript:tendernessall('T8','RTtenderness2');" > 2
      <input type="radio" name="T8RTtenderness" id="T8RTtenderness3" value="3" onchange="javascript:tendernessall('T8','RTtenderness3');" > 3
      <input type="radio" name="T8RTtenderness" id="T8RTtenderness4" value="4" onchange="javascript:tendernessall('T8','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T8');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv17"></div>
    <input type="hidden" name="T8adjustmenttype" id="adjustmenttype17" />
      <select name="adjustmenttypeselect17" id="adjustmenttypeselect17" onchange="javascript:adjustmenttype('17','T8')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',17);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T9tr"><td>T9</td><td align="center"><input type="checkbox" id="T9LTfixation" name="T9LTfixation" value="true" onchange="javascript:populateareas('T9','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T9RTfixation" name="T9RTfixation" value="true" onchange="javascript:populateareas('T9','RTfixation');"></td>
      <td>T9</td><td align="center"><input type="checkbox" name="T9LTadjustment" id="T9LTadjustment" value="true" onchange="javascript:populateareas('T9','LTadjustment');"></td><td align="center"><input type="checkbox" name="T9RTadjustment" id="T9RTadjustment" value="true" onchange="javascript:populateareas('T9','RTadjustment');"></td>
      <td>T9</td><td align="center"><input type="radio" name="T9LTtenderness" id="T9LTtenderness1" value="1" onchange="javascript:tendernessall('T9','LTtenderness1');" > 1
      <input type="radio" name="T9LTtenderness" id="T9LTtenderness2" value="2" onchange="javascript:tendernessall('T9','LTtenderness2');" > 2
      <input type="radio" name="T9LTtenderness" id="T9LTtenderness3" value="3" onchange="javascript:tendernessall('T9','LTtenderness3');" > 3
      <input type="radio" name="T9LTtenderness" id="T9LTtenderness4" value="4" onchange="javascript:tendernessall('T9','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T9RTtenderness" id="T9RTtenderness1" value="1" onchange="javascript:tendernessall('T9','RTtenderness1');" > 1
      <input type="radio" name="T9RTtenderness" id="T9RTtenderness2" value="2" onchange="javascript:tendernessall('T9','RTtenderness2');" > 2
      <input type="radio" name="T9RTtenderness" id="T9RTtenderness3" value="3" onchange="javascript:tendernessall('T9','RTtenderness3');" > 3
      <input type="radio" name="T9RTtenderness" id="T9RTtenderness4" value="4" onchange="javascript:tendernessall('T9','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T9');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv18"></div>
    <input type="hidden" name="T9adjustmenttype" id="adjustmenttype18" />
      <select name="adjustmenttypeselect18" id="adjustmenttypeselect18" onchange="javascript:adjustmenttype('18','T9')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',18);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T10tr"><td>T10</td><td align="center"><input type="checkbox" id="T10LTfixation" name="T10LTfixation" value="true" onchange="javascript:populateareas('T10','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T10RTfixation" name="T10RTfixation" value="true" onchange="javascript:populateareas('T10','RTfixation');"></td>
      <td>T10</td><td align="center"><input type="checkbox" name="T10LTadjustment" id="T10LTadjustment" value="true" onchange="javascript:populateareas('T10','LTadjustment');"></td><td align="center"><input type="checkbox" name="T10RTadjustment" id="T10RTadjustment" value="true" onchange="javascript:populateareas('T10','RTadjustment');"></td>
      <td>T10</td><td align="center"><input type="radio" name="T10LTtenderness" id="T10LTtenderness1" value="1" onchange="javascript:tendernessall('T10','LTtenderness1');" > 1
      <input type="radio" name="T10LTtenderness" id="T10LTtenderness2" value="2" onchange="javascript:tendernessall('T10','LTtenderness2');" > 2
      <input type="radio" name="T10LTtenderness" id="T10LTtenderness3" value="3" onchange="javascript:tendernessall('T10','LTtenderness3');" > 3
      <input type="radio" name="T10LTtenderness" id="T10LTtenderness4" value="4" onchange="javascript:tendernessall('T10','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T10RTtenderness" id="T10RTtenderness1" value="1" onchange="javascript:tendernessall('T10','RTtenderness1');" > 1
      <input type="radio" name="T10RTtenderness" id="T10RTtenderness2" value="2" onchange="javascript:tendernessall('T10','RTtenderness2');" > 2
      <input type="radio" name="T10RTtenderness" id="T10RTtenderness3" value="3" onchange="javascript:tendernessall('T10','RTtenderness3');" > 3
      <input type="radio" name="T10RTtenderness" id="T10RTtenderness4" value="4" onchange="javascript:tendernessall('T10','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T10');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv19"></div>
    <input type="hidden" name="T10adjustmenttype" id="adjustmenttype19" />
      <select name="adjustmenttypeselect19" id="adjustmenttypeselect19" onchange="javascript:adjustmenttype('19','T10')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',19);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T11tr"><td>T11</td><td align="center"><input type="checkbox" id="T11LTfixation" name="T11LTfixation" value="true" onchange="javascript:populateareas('T11','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T11RTfixation" name="T11RTfixation" value="true" onchange="javascript:populateareas('T11','RTfixation');"></td>
      <td>T11</td><td align="center"><input type="checkbox" name="T11LTadjustment" id="T11LTadjustment" value="true" onchange="javascript:populateareas('T11','LTadjustment');"></td><td align="center"><input type="checkbox" name="T11RTadjustment" id="T11RTadjustment" value="true" onchange="javascript:populateareas('T11','RTadjustment');"></td>
      <td>T11</td><td align="center"><input type="radio" name="T11LTtenderness" id="T11LTtenderness1" value="1" onchange="javascript:tendernessall('T11','LTtenderness1');" > 1
      <input type="radio" name="T11LTtenderness" id="T11LTtenderness2" value="2" onchange="javascript:tendernessall('T11','LTtenderness2');" > 2
      <input type="radio" name="T11LTtenderness" id="T11LTtenderness3" value="3" onchange="javascript:tendernessall('T11','LTtenderness3');" > 3
      <input type="radio" name="T11LTtenderness" id="T11LTtenderness4" value="4" onchange="javascript:tendernessall('T11','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T11RTtenderness" id="T11RTtenderness1" value="1" onchange="javascript:tendernessall('T11','RTtenderness1');" > 1
      <input type="radio" name="T11RTtenderness" id="T11RTtenderness2" value="2" onchange="javascript:tendernessall('T11','RTtenderness2');" > 2
      <input type="radio" name="T11RTtenderness" id="T11RTtenderness3" value="3" onchange="javascript:tendernessall('T11','RTtenderness3');" > 3
      <input type="radio" name="T11RTtenderness" id="T11RTtenderness4" value="4" onchange="javascript:tendernessall('T11','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T11');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv20"></div>
    <input type="hidden" name="T11adjustmenttype" id="adjustmenttype20" />
      <select name="adjustmenttypeselect20" id="adjustmenttypeselect20" onchange="javascript:adjustmenttype('20','T11')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',20);</script>    
    </tr><tr bgcolor="#d9f6e2" id="T12tr"><td>T12</td><td align="center"><input type="checkbox" id="T12LTfixation" name="T12LTfixation" value="true" onchange="javascript:populateareas('T12','LTfixation');">
      </td><td align="center"><input type="checkbox" id="T12RTfixation" name="T12RTfixation" value="true" onchange="javascript:populateareas('T12','RTfixation');"></td>
      <td>T12</td><td align="center"><input type="checkbox" name="T12LTadjustment" id="T12LTadjustment" value="true" onchange="javascript:populateareas('T12','LTadjustment');"></td><td align="center"><input type="checkbox" name="T12RTadjustment" id="T12RTadjustment" value="true" onchange="javascript:populateareas('T12','RTadjustment');"></td>
      <td>T12</td><td align="center"><input type="radio" name="T12LTtenderness" id="T12LTtenderness1" value="1" onchange="javascript:tendernessall('T12','LTtenderness1');" > 1
      <input type="radio" name="T12LTtenderness" id="T12LTtenderness2" value="2" onchange="javascript:tendernessall('T12','LTtenderness2');" > 2
      <input type="radio" name="T12LTtenderness" id="T12LTtenderness3" value="3" onchange="javascript:tendernessall('T12','LTtenderness3');" > 3
      <input type="radio" name="T12LTtenderness" id="T12LTtenderness4" value="4" onchange="javascript:tendernessall('T12','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="T12RTtenderness" id="T12RTtenderness1" value="1" onchange="javascript:tendernessall('T12','RTtenderness1');" > 1
      <input type="radio" name="T12RTtenderness" id="T12RTtenderness2" value="2" onchange="javascript:tendernessall('T12','RTtenderness2');" > 2
      <input type="radio" name="T12RTtenderness" id="T12RTtenderness3" value="3" onchange="javascript:tendernessall('T12','RTtenderness3');" > 3
      <input type="radio" name="T12RTtenderness" id="T12RTtenderness4" value="4" onchange="javascript:tendernessall('T12','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('T12');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv21"></div>
    <input type="hidden" name="T12adjustmenttype" id="adjustmenttype21" />
      <select name="adjustmenttypeselect21" id="adjustmenttypeselect21" onchange="javascript:adjustmenttype('21','T12')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',21);</script>    
    </tr><tr bgcolor="#ffd8d8" id="Lumbartr"><td>Lumbar</td><td align="center"><input type="checkbox" id="LumbarLTfixation" name="LumbarLTfixation" value="true" onchange="javascript:populateareas('Lumbar','LTfixation');">
      </td><td align="center"><input type="checkbox" id="LumbarRTfixation" name="LumbarRTfixation" value="true" onchange="javascript:populateareas('Lumbar','RTfixation');"></td>
      <td>Lumbar</td><td align="center"><input type="checkbox" name="LumbarLTadjustment" id="LumbarLTadjustment" value="true" onchange="javascript:populateareas('Lumbar','LTadjustment');"></td><td align="center"><input type="checkbox" name="LumbarRTadjustment" id="LumbarRTadjustment" value="true" onchange="javascript:populateareas('Lumbar','RTadjustment');"></td>
      <td>Lumbar</td><td align="center"><input type="radio" name="LumbarLTtenderness" id="LumbarLTtenderness1" value="1" onchange="javascript:tendernessall('Lumbar','LTtenderness1');" > 1
      <input type="radio" name="LumbarLTtenderness" id="LumbarLTtenderness2" value="2" onchange="javascript:tendernessall('Lumbar','LTtenderness2');" > 2
      <input type="radio" name="LumbarLTtenderness" id="LumbarLTtenderness3" value="3" onchange="javascript:tendernessall('Lumbar','LTtenderness3');" > 3
      <input type="radio" name="LumbarLTtenderness" id="LumbarLTtenderness4" value="4" onchange="javascript:tendernessall('Lumbar','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="LumbarRTtenderness" id="LumbarRTtenderness1" value="1" onchange="javascript:tendernessall('Lumbar','RTtenderness1');" > 1
      <input type="radio" name="LumbarRTtenderness" id="LumbarRTtenderness2" value="2" onchange="javascript:tendernessall('Lumbar','RTtenderness2');" > 2
      <input type="radio" name="LumbarRTtenderness" id="LumbarRTtenderness3" value="3" onchange="javascript:tendernessall('Lumbar','RTtenderness3');" > 3
      <input type="radio" name="LumbarRTtenderness" id="LumbarRTtenderness4" value="4" onchange="javascript:tendernessall('Lumbar','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Lumbar');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv22"></div>
    <input type="hidden" name="Lumbaradjustmenttype" id="adjustmenttype22" />
      <select name="adjustmenttypeselect22" id="adjustmenttypeselect22" onchange="javascript:adjustmenttype('22','Lumbar')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',22);</script>    
    </tr><tr bgcolor="#f6f5d9" id="L1tr"><td><div style="position:absolute;width:0px;height:0px;"><div style="position:relative;right:60px;bottom:8px;width:50px;height:163px;border:1px solid #d9d9d9;background-color:#f6f5d9;color:white;vertical-align:middle;z-index:-1" id="L1labeldiv">
      <table width="50 height="163"><tr height="163" id="L1labeltr"><td width="50" valign="middle" align="center"><b>L<br>U<br>M<br>B<br>A<br>R</b><br></b></td></tr></table></div></div>L1</td><td align="center"><input type="checkbox" id="L1LTfixation" name="L1LTfixation" value="true" onchange="javascript:populateareas('L1','LTfixation');">
      </td><td align="center"><input type="checkbox" id="L1RTfixation" name="L1RTfixation" value="true" onchange="javascript:populateareas('L1','RTfixation');"></td>
      <td>L1</td><td align="center"><input type="checkbox" name="L1LTadjustment" id="L1LTadjustment" value="true" onchange="javascript:populateareas('L1','LTadjustment');"></td><td align="center"><input type="checkbox" name="L1RTadjustment" id="L1RTadjustment" value="true" onchange="javascript:populateareas('L1','RTadjustment');"></td>
      <td>L1</td><td align="center"><input type="radio" name="L1LTtenderness" id="L1LTtenderness1" value="1" onchange="javascript:tendernessall('L1','LTtenderness1');" > 1
      <input type="radio" name="L1LTtenderness" id="L1LTtenderness2" value="2" onchange="javascript:tendernessall('L1','LTtenderness2');" > 2
      <input type="radio" name="L1LTtenderness" id="L1LTtenderness3" value="3" onchange="javascript:tendernessall('L1','LTtenderness3');" > 3
      <input type="radio" name="L1LTtenderness" id="L1LTtenderness4" value="4" onchange="javascript:tendernessall('L1','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="L1RTtenderness" id="L1RTtenderness1" value="1" onchange="javascript:tendernessall('L1','RTtenderness1');" > 1
      <input type="radio" name="L1RTtenderness" id="L1RTtenderness2" value="2" onchange="javascript:tendernessall('L1','RTtenderness2');" > 2
      <input type="radio" name="L1RTtenderness" id="L1RTtenderness3" value="3" onchange="javascript:tendernessall('L1','RTtenderness3');" > 3
      <input type="radio" name="L1RTtenderness" id="L1RTtenderness4" value="4" onchange="javascript:tendernessall('L1','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('L1');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv23"></div>
    <input type="hidden" name="L1adjustmenttype" id="adjustmenttype23" />
      <select name="adjustmenttypeselect23" id="adjustmenttypeselect23" onchange="javascript:adjustmenttype('23','L1')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',23);</script>    
    </tr><tr bgcolor="#f6f5d9" id="L2tr"><td>L2</td><td align="center"><input type="checkbox" id="L2LTfixation" name="L2LTfixation" value="true" onchange="javascript:populateareas('L2','LTfixation');">
      </td><td align="center"><input type="checkbox" id="L2RTfixation" name="L2RTfixation" value="true" onchange="javascript:populateareas('L2','RTfixation');"></td>
      <td>L2</td><td align="center"><input type="checkbox" name="L2LTadjustment" id="L2LTadjustment" value="true" onchange="javascript:populateareas('L2','LTadjustment');"></td><td align="center"><input type="checkbox" name="L2RTadjustment" id="L2RTadjustment" value="true" onchange="javascript:populateareas('L2','RTadjustment');"></td>
      <td>L2</td><td align="center"><input type="radio" name="L2LTtenderness" id="L2LTtenderness1" value="1" onchange="javascript:tendernessall('L2','LTtenderness1');" > 1
      <input type="radio" name="L2LTtenderness" id="L2LTtenderness2" value="2" onchange="javascript:tendernessall('L2','LTtenderness2');" > 2
      <input type="radio" name="L2LTtenderness" id="L2LTtenderness3" value="3" onchange="javascript:tendernessall('L2','LTtenderness3');" > 3
      <input type="radio" name="L2LTtenderness" id="L2LTtenderness4" value="4" onchange="javascript:tendernessall('L2','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="L2RTtenderness" id="L2RTtenderness1" value="1" onchange="javascript:tendernessall('L2','RTtenderness1');" > 1
      <input type="radio" name="L2RTtenderness" id="L2RTtenderness2" value="2" onchange="javascript:tendernessall('L2','RTtenderness2');" > 2
      <input type="radio" name="L2RTtenderness" id="L2RTtenderness3" value="3" onchange="javascript:tendernessall('L2','RTtenderness3');" > 3
      <input type="radio" name="L2RTtenderness" id="L2RTtenderness4" value="4" onchange="javascript:tendernessall('L2','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('L2');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv24"></div>
    <input type="hidden" name="L2adjustmenttype" id="adjustmenttype24" />
      <select name="adjustmenttypeselect24" id="adjustmenttypeselect24" onchange="javascript:adjustmenttype('24','L2')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',24);</script>    
    </tr><tr bgcolor="#f6f5d9" id="L3tr"><td>L3</td><td align="center"><input type="checkbox" id="L3LTfixation" name="L3LTfixation" value="true" onchange="javascript:populateareas('L3','LTfixation');">
      </td><td align="center"><input type="checkbox" id="L3RTfixation" name="L3RTfixation" value="true" onchange="javascript:populateareas('L3','RTfixation');"></td>
      <td>L3</td><td align="center"><input type="checkbox" name="L3LTadjustment" id="L3LTadjustment" value="true" onchange="javascript:populateareas('L3','LTadjustment');"></td><td align="center"><input type="checkbox" name="L3RTadjustment" id="L3RTadjustment" value="true" onchange="javascript:populateareas('L3','RTadjustment');"></td>
      <td>L3</td><td align="center"><input type="radio" name="L3LTtenderness" id="L3LTtenderness1" value="1" onchange="javascript:tendernessall('L3','LTtenderness1');" > 1
      <input type="radio" name="L3LTtenderness" id="L3LTtenderness2" value="2" onchange="javascript:tendernessall('L3','LTtenderness2');" > 2
      <input type="radio" name="L3LTtenderness" id="L3LTtenderness3" value="3" onchange="javascript:tendernessall('L3','LTtenderness3');" > 3
      <input type="radio" name="L3LTtenderness" id="L3LTtenderness4" value="4" onchange="javascript:tendernessall('L3','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="L3RTtenderness" id="L3RTtenderness1" value="1" onchange="javascript:tendernessall('L3','RTtenderness1');" > 1
      <input type="radio" name="L3RTtenderness" id="L3RTtenderness2" value="2" onchange="javascript:tendernessall('L3','RTtenderness2');" > 2
      <input type="radio" name="L3RTtenderness" id="L3RTtenderness3" value="3" onchange="javascript:tendernessall('L3','RTtenderness3');" > 3
      <input type="radio" name="L3RTtenderness" id="L3RTtenderness4" value="4" onchange="javascript:tendernessall('L3','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('L3');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv25"></div>
    <input type="hidden" name="L3adjustmenttype" id="adjustmenttype25" />
      <select name="adjustmenttypeselect25" id="adjustmenttypeselect25" onchange="javascript:adjustmenttype('25','L3')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',25);</script>    
    </tr><tr bgcolor="#f6f5d9" id="L5tr"><td>L5</td><td align="center"><input type="checkbox" id="L5LTfixation" name="L5LTfixation" value="true" onchange="javascript:populateareas('L5','LTfixation');">
      </td><td align="center"><input type="checkbox" id="L5RTfixation" name="L5RTfixation" value="true" onchange="javascript:populateareas('L5','RTfixation');"></td>
      <td>L5</td><td align="center"><input type="checkbox" name="L5LTadjustment" id="L5LTadjustment" value="true" onchange="javascript:populateareas('L5','LTadjustment');"></td><td align="center"><input type="checkbox" name="L5RTadjustment" id="L5RTadjustment" value="true" onchange="javascript:populateareas('L5','RTadjustment');"></td>
      <td>L5</td><td align="center"><input type="radio" name="L5LTtenderness" id="L5LTtenderness1" value="1" onchange="javascript:tendernessall('L5','LTtenderness1');" > 1
      <input type="radio" name="L5LTtenderness" id="L5LTtenderness2" value="2" onchange="javascript:tendernessall('L5','LTtenderness2');" > 2
      <input type="radio" name="L5LTtenderness" id="L5LTtenderness3" value="3" onchange="javascript:tendernessall('L5','LTtenderness3');" > 3
      <input type="radio" name="L5LTtenderness" id="L5LTtenderness4" value="4" onchange="javascript:tendernessall('L5','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="L5RTtenderness" id="L5RTtenderness1" value="1" onchange="javascript:tendernessall('L5','RTtenderness1');" > 1
      <input type="radio" name="L5RTtenderness" id="L5RTtenderness2" value="2" onchange="javascript:tendernessall('L5','RTtenderness2');" > 2
      <input type="radio" name="L5RTtenderness" id="L5RTtenderness3" value="3" onchange="javascript:tendernessall('L5','RTtenderness3');" > 3
      <input type="radio" name="L5RTtenderness" id="L5RTtenderness4" value="4" onchange="javascript:tendernessall('L5','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('L5');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv26"></div>
    <input type="hidden" name="L5adjustmenttype" id="adjustmenttype26" />
      <select name="adjustmenttypeselect26" id="adjustmenttypeselect26" onchange="javascript:adjustmenttype('26','L5')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',26);</script>    
    </tr><tr bgcolor="#f6f5d9" id="L5tr"><td>L5</td><td align="center"><input type="checkbox" id="L5LTfixation" name="L5LTfixation" value="true" onchange="javascript:populateareas('L5','LTfixation');">
      </td><td align="center"><input type="checkbox" id="L5RTfixation" name="L5RTfixation" value="true" onchange="javascript:populateareas('L5','RTfixation');"></td>
      <td>L5</td><td align="center"><input type="checkbox" name="L5LTadjustment" id="L5LTadjustment" value="true" onchange="javascript:populateareas('L5','LTadjustment');"></td><td align="center"><input type="checkbox" name="L5RTadjustment" id="L5RTadjustment" value="true" onchange="javascript:populateareas('L5','RTadjustment');"></td>
      <td>L5</td><td align="center"><input type="radio" name="L5LTtenderness" id="L5LTtenderness1" value="1" onchange="javascript:tendernessall('L5','LTtenderness1');" > 1
      <input type="radio" name="L5LTtenderness" id="L5LTtenderness2" value="2" onchange="javascript:tendernessall('L5','LTtenderness2');" > 2
      <input type="radio" name="L5LTtenderness" id="L5LTtenderness3" value="3" onchange="javascript:tendernessall('L5','LTtenderness3');" > 3
      <input type="radio" name="L5LTtenderness" id="L5LTtenderness4" value="4" onchange="javascript:tendernessall('L5','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="L5RTtenderness" id="L5RTtenderness1" value="1" onchange="javascript:tendernessall('L5','RTtenderness1');" > 1
      <input type="radio" name="L5RTtenderness" id="L5RTtenderness2" value="2" onchange="javascript:tendernessall('L5','RTtenderness2');" > 2
      <input type="radio" name="L5RTtenderness" id="L5RTtenderness3" value="3" onchange="javascript:tendernessall('L5','RTtenderness3');" > 3
      <input type="radio" name="L5RTtenderness" id="L5RTtenderness4" value="4" onchange="javascript:tendernessall('L5','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('L5');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv27"></div>
    <input type="hidden" name="L5adjustmenttype" id="adjustmenttype27" />
      <select name="adjustmenttypeselect27" id="adjustmenttypeselect27" onchange="javascript:adjustmenttype('27','L5')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',27);</script>    
    </tr><tr bgcolor="#f1f1f1" id="Sactr"><td>Sac</td><td align="center"><input type="checkbox" id="SacLTfixation" name="SacLTfixation" value="true" onchange="javascript:populateareas('Sac','LTfixation');">
      </td><td align="center"><input type="checkbox" id="SacRTfixation" name="SacRTfixation" value="true" onchange="javascript:populateareas('Sac','RTfixation');"></td>
      <td>Sac</td><td align="center"><input type="checkbox" name="SacLTadjustment" id="SacLTadjustment" value="true" onchange="javascript:populateareas('Sac','LTadjustment');"></td><td align="center"><input type="checkbox" name="SacRTadjustment" id="SacRTadjustment" value="true" onchange="javascript:populateareas('Sac','RTadjustment');"></td>
      <td>Sac</td><td align="center"><input type="radio" name="SacLTtenderness" id="SacLTtenderness1" value="1" onchange="javascript:tendernessall('Sac','LTtenderness1');" > 1
      <input type="radio" name="SacLTtenderness" id="SacLTtenderness2" value="2" onchange="javascript:tendernessall('Sac','LTtenderness2');" > 2
      <input type="radio" name="SacLTtenderness" id="SacLTtenderness3" value="3" onchange="javascript:tendernessall('Sac','LTtenderness3');" > 3
      <input type="radio" name="SacLTtenderness" id="SacLTtenderness4" value="4" onchange="javascript:tendernessall('Sac','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="SacRTtenderness" id="SacRTtenderness1" value="1" onchange="javascript:tendernessall('Sac','RTtenderness1');" > 1
      <input type="radio" name="SacRTtenderness" id="SacRTtenderness2" value="2" onchange="javascript:tendernessall('Sac','RTtenderness2');" > 2
      <input type="radio" name="SacRTtenderness" id="SacRTtenderness3" value="3" onchange="javascript:tendernessall('Sac','RTtenderness3');" > 3
      <input type="radio" name="SacRTtenderness" id="SacRTtenderness4" value="4" onchange="javascript:tendernessall('Sac','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Sac');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv28"></div>
    <input type="hidden" name="Sacadjustmenttype" id="adjustmenttype28" />
      <select name="adjustmenttypeselect28" id="adjustmenttypeselect28" onchange="javascript:adjustmenttype('28','Sac')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',28);</script>    
    </tr><tr id="Coccyxtr"><td>Coccyx</td><td align="center"><input type="checkbox" id="CoccyxLTfixation" name="CoccyxLTfixation" value="true" onchange="javascript:populateareas('Coccyx','LTfixation');">
      </td><td align="center"><input type="checkbox" id="CoccyxRTfixation" name="CoccyxRTfixation" value="true" onchange="javascript:populateareas('Coccyx','RTfixation');"></td>
      <td>Coccyx</td><td align="center"><input type="checkbox" name="CoccyxLTadjustment" id="CoccyxLTadjustment" value="true" onchange="javascript:populateareas('Coccyx','LTadjustment');"></td><td align="center"><input type="checkbox" name="CoccyxRTadjustment" id="CoccyxRTadjustment" value="true" onchange="javascript:populateareas('Coccyx','RTadjustment');"></td>
      <td>Coccyx</td><td align="center"><input type="radio" name="CoccyxLTtenderness" id="CoccyxLTtenderness1" value="1" onchange="javascript:tendernessall('Coccyx','LTtenderness1');" > 1
      <input type="radio" name="CoccyxLTtenderness" id="CoccyxLTtenderness2" value="2" onchange="javascript:tendernessall('Coccyx','LTtenderness2');" > 2
      <input type="radio" name="CoccyxLTtenderness" id="CoccyxLTtenderness3" value="3" onchange="javascript:tendernessall('Coccyx','LTtenderness3');" > 3
      <input type="radio" name="CoccyxLTtenderness" id="CoccyxLTtenderness4" value="4" onchange="javascript:tendernessall('Coccyx','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="CoccyxRTtenderness" id="CoccyxRTtenderness1" value="1" onchange="javascript:tendernessall('Coccyx','RTtenderness1');" > 1
      <input type="radio" name="CoccyxRTtenderness" id="CoccyxRTtenderness2" value="2" onchange="javascript:tendernessall('Coccyx','RTtenderness2');" > 2
      <input type="radio" name="CoccyxRTtenderness" id="CoccyxRTtenderness3" value="3" onchange="javascript:tendernessall('Coccyx','RTtenderness3');" > 3
      <input type="radio" name="CoccyxRTtenderness" id="CoccyxRTtenderness4" value="4" onchange="javascript:tendernessall('Coccyx','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Coccyx');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv29"></div>
    <input type="hidden" name="Coccyxadjustmenttype" id="adjustmenttype29" />
      <select name="adjustmenttypeselect29" id="adjustmenttypeselect29" onchange="javascript:adjustmenttype('29','Coccyx')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',29);</script>    
    </tr><tr bgcolor="#f1f1f1" id="Pubstr"><td>Pubs</td><td align="center"><input type="checkbox" id="PubsLTfixation" name="PubsLTfixation" value="true" onchange="javascript:populateareas('Pubs','LTfixation');">
      </td><td align="center"><input type="checkbox" id="PubsRTfixation" name="PubsRTfixation" value="true" onchange="javascript:populateareas('Pubs','RTfixation');"></td>
      <td>Pubs</td><td align="center"><input type="checkbox" name="PubsLTadjustment" id="PubsLTadjustment" value="true" onchange="javascript:populateareas('Pubs','LTadjustment');"></td><td align="center"><input type="checkbox" name="PubsRTadjustment" id="PubsRTadjustment" value="true" onchange="javascript:populateareas('Pubs','RTadjustment');"></td>
      <td>Pubs</td><td align="center"><input type="radio" name="PubsLTtenderness" id="PubsLTtenderness1" value="1" onchange="javascript:tendernessall('Pubs','LTtenderness1');" > 1
      <input type="radio" name="PubsLTtenderness" id="PubsLTtenderness2" value="2" onchange="javascript:tendernessall('Pubs','LTtenderness2');" > 2
      <input type="radio" name="PubsLTtenderness" id="PubsLTtenderness3" value="3" onchange="javascript:tendernessall('Pubs','LTtenderness3');" > 3
      <input type="radio" name="PubsLTtenderness" id="PubsLTtenderness4" value="4" onchange="javascript:tendernessall('Pubs','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="PubsRTtenderness" id="PubsRTtenderness1" value="1" onchange="javascript:tendernessall('Pubs','RTtenderness1');" > 1
      <input type="radio" name="PubsRTtenderness" id="PubsRTtenderness2" value="2" onchange="javascript:tendernessall('Pubs','RTtenderness2');" > 2
      <input type="radio" name="PubsRTtenderness" id="PubsRTtenderness3" value="3" onchange="javascript:tendernessall('Pubs','RTtenderness3');" > 3
      <input type="radio" name="PubsRTtenderness" id="PubsRTtenderness4" value="4" onchange="javascript:tendernessall('Pubs','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Pubs');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv30"></div>
    <input type="hidden" name="Pubsadjustmenttype" id="adjustmenttype30" />
      <select name="adjustmenttypeselect30" id="adjustmenttypeselect30" onchange="javascript:adjustmenttype('30','Pubs')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',30);</script>    
    </tr><tr id="Pelvistr"><td>Pelvis</td><td align="center"><input type="checkbox" id="PelvisLTfixation" name="PelvisLTfixation" value="true" onchange="javascript:populateareas('Pelvis','LTfixation');">
      </td><td align="center"><input type="checkbox" id="PelvisRTfixation" name="PelvisRTfixation" value="true" onchange="javascript:populateareas('Pelvis','RTfixation');"></td>
      <td>Pelvis</td><td align="center"><input type="checkbox" name="PelvisLTadjustment" id="PelvisLTadjustment" value="true" onchange="javascript:populateareas('Pelvis','LTadjustment');"></td><td align="center"><input type="checkbox" name="PelvisRTadjustment" id="PelvisRTadjustment" value="true" onchange="javascript:populateareas('Pelvis','RTadjustment');"></td>
      <td>Pelvis</td><td align="center"><input type="radio" name="PelvisLTtenderness" id="PelvisLTtenderness1" value="1" onchange="javascript:tendernessall('Pelvis','LTtenderness1');" > 1
      <input type="radio" name="PelvisLTtenderness" id="PelvisLTtenderness2" value="2" onchange="javascript:tendernessall('Pelvis','LTtenderness2');" > 2
      <input type="radio" name="PelvisLTtenderness" id="PelvisLTtenderness3" value="3" onchange="javascript:tendernessall('Pelvis','LTtenderness3');" > 3
      <input type="radio" name="PelvisLTtenderness" id="PelvisLTtenderness4" value="4" onchange="javascript:tendernessall('Pelvis','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="PelvisRTtenderness" id="PelvisRTtenderness1" value="1" onchange="javascript:tendernessall('Pelvis','RTtenderness1');" > 1
      <input type="radio" name="PelvisRTtenderness" id="PelvisRTtenderness2" value="2" onchange="javascript:tendernessall('Pelvis','RTtenderness2');" > 2
      <input type="radio" name="PelvisRTtenderness" id="PelvisRTtenderness3" value="3" onchange="javascript:tendernessall('Pelvis','RTtenderness3');" > 3
      <input type="radio" name="PelvisRTtenderness" id="PelvisRTtenderness4" value="4" onchange="javascript:tendernessall('Pelvis','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Pelvis');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv31"></div>
    <input type="hidden" name="Pelvisadjustmenttype" id="adjustmenttype31" />
      <select name="adjustmenttypeselect31" id="adjustmenttypeselect31" onchange="javascript:adjustmenttype('31','Pelvis')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',31);</script>    
    </tr><tr bgcolor="#f1f1f1" id="RSItr"><td>RSI</td><td align="center"><input type="checkbox" id="RSILTfixation" name="RSILTfixation" value="true" onchange="javascript:populateareas('RSI','LTfixation');">
      </td><td align="center"><input type="checkbox" id="RSIRTfixation" name="RSIRTfixation" value="true" onchange="javascript:populateareas('RSI','RTfixation');"></td>
      <td>RSI</td><td align="center"><input type="checkbox" name="RSILTadjustment" id="RSILTadjustment" value="true" onchange="javascript:populateareas('RSI','LTadjustment');"></td><td align="center"><input type="checkbox" name="RSIRTadjustment" id="RSIRTadjustment" value="true" onchange="javascript:populateareas('RSI','RTadjustment');"></td>
      <td>RSI</td><td align="center"><input type="radio" name="RSILTtenderness" id="RSILTtenderness1" value="1" onchange="javascript:tendernessall('RSI','LTtenderness1');" > 1
      <input type="radio" name="RSILTtenderness" id="RSILTtenderness2" value="2" onchange="javascript:tendernessall('RSI','LTtenderness2');" > 2
      <input type="radio" name="RSILTtenderness" id="RSILTtenderness3" value="3" onchange="javascript:tendernessall('RSI','LTtenderness3');" > 3
      <input type="radio" name="RSILTtenderness" id="RSILTtenderness4" value="4" onchange="javascript:tendernessall('RSI','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="RSIRTtenderness" id="RSIRTtenderness1" value="1" onchange="javascript:tendernessall('RSI','RTtenderness1');" > 1
      <input type="radio" name="RSIRTtenderness" id="RSIRTtenderness2" value="2" onchange="javascript:tendernessall('RSI','RTtenderness2');" > 2
      <input type="radio" name="RSIRTtenderness" id="RSIRTtenderness3" value="3" onchange="javascript:tendernessall('RSI','RTtenderness3');" > 3
      <input type="radio" name="RSIRTtenderness" id="RSIRTtenderness4" value="4" onchange="javascript:tendernessall('RSI','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('RSI');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv32"></div>
    <input type="hidden" name="RSIadjustmenttype" id="adjustmenttype32" />
      <select name="adjustmenttypeselect32" id="adjustmenttypeselect32" onchange="javascript:adjustmenttype('32','RSI')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',32);</script>    
    </tr><tr id="LSItr"><td>LSI</td><td align="center"><input type="checkbox" id="LSILTfixation" name="LSILTfixation" value="true" onchange="javascript:populateareas('LSI','LTfixation');">
      </td><td align="center"><input type="checkbox" id="LSIRTfixation" name="LSIRTfixation" value="true" onchange="javascript:populateareas('LSI','RTfixation');"></td>
      <td>LSI</td><td align="center"><input type="checkbox" name="LSILTadjustment" id="LSILTadjustment" value="true" onchange="javascript:populateareas('LSI','LTadjustment');"></td><td align="center"><input type="checkbox" name="LSIRTadjustment" id="LSIRTadjustment" value="true" onchange="javascript:populateareas('LSI','RTadjustment');"></td>
      <td>LSI</td><td align="center"><input type="radio" name="LSILTtenderness" id="LSILTtenderness1" value="1" onchange="javascript:tendernessall('LSI','LTtenderness1');" > 1
      <input type="radio" name="LSILTtenderness" id="LSILTtenderness2" value="2" onchange="javascript:tendernessall('LSI','LTtenderness2');" > 2
      <input type="radio" name="LSILTtenderness" id="LSILTtenderness3" value="3" onchange="javascript:tendernessall('LSI','LTtenderness3');" > 3
      <input type="radio" name="LSILTtenderness" id="LSILTtenderness4" value="4" onchange="javascript:tendernessall('LSI','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="LSIRTtenderness" id="LSIRTtenderness1" value="1" onchange="javascript:tendernessall('LSI','RTtenderness1');" > 1
      <input type="radio" name="LSIRTtenderness" id="LSIRTtenderness2" value="2" onchange="javascript:tendernessall('LSI','RTtenderness2');" > 2
      <input type="radio" name="LSIRTtenderness" id="LSIRTtenderness3" value="3" onchange="javascript:tendernessall('LSI','RTtenderness3');" > 3
      <input type="radio" name="LSIRTtenderness" id="LSIRTtenderness4" value="4" onchange="javascript:tendernessall('LSI','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('LSI');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv33"></div>
    <input type="hidden" name="LSIadjustmenttype" id="adjustmenttype33" />
      <select name="adjustmenttypeselect33" id="adjustmenttypeselect33" onchange="javascript:adjustmenttype('33','LSI')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',33);</script>    
    </tr><tr bgcolor="#f1f1f1" id="Sphenoidtr"><td>Sphenoid</td><td align="center"><input type="checkbox" id="SphenoidLTfixation" name="SphenoidLTfixation" value="true" onchange="javascript:populateareas('Sphenoid','LTfixation');">
      </td><td align="center"><input type="checkbox" id="SphenoidRTfixation" name="SphenoidRTfixation" value="true" onchange="javascript:populateareas('Sphenoid','RTfixation');"></td>
      <td>Sphenoid</td><td align="center"><input type="checkbox" name="SphenoidLTadjustment" id="SphenoidLTadjustment" value="true" onchange="javascript:populateareas('Sphenoid','LTadjustment');"></td><td align="center"><input type="checkbox" name="SphenoidRTadjustment" id="SphenoidRTadjustment" value="true" onchange="javascript:populateareas('Sphenoid','RTadjustment');"></td>
      <td>Sphenoid</td><td align="center"><input type="radio" name="SphenoidLTtenderness" id="SphenoidLTtenderness1" value="1" onchange="javascript:tendernessall('Sphenoid','LTtenderness1');" > 1
      <input type="radio" name="SphenoidLTtenderness" id="SphenoidLTtenderness2" value="2" onchange="javascript:tendernessall('Sphenoid','LTtenderness2');" > 2
      <input type="radio" name="SphenoidLTtenderness" id="SphenoidLTtenderness3" value="3" onchange="javascript:tendernessall('Sphenoid','LTtenderness3');" > 3
      <input type="radio" name="SphenoidLTtenderness" id="SphenoidLTtenderness4" value="4" onchange="javascript:tendernessall('Sphenoid','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="SphenoidRTtenderness" id="SphenoidRTtenderness1" value="1" onchange="javascript:tendernessall('Sphenoid','RTtenderness1');" > 1
      <input type="radio" name="SphenoidRTtenderness" id="SphenoidRTtenderness2" value="2" onchange="javascript:tendernessall('Sphenoid','RTtenderness2');" > 2
      <input type="radio" name="SphenoidRTtenderness" id="SphenoidRTtenderness3" value="3" onchange="javascript:tendernessall('Sphenoid','RTtenderness3');" > 3
      <input type="radio" name="SphenoidRTtenderness" id="SphenoidRTtenderness4" value="4" onchange="javascript:tendernessall('Sphenoid','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Sphenoid');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv34"></div>
    <input type="hidden" name="Sphenoidadjustmenttype" id="adjustmenttype34" />
      <select name="adjustmenttypeselect34" id="adjustmenttypeselect34" onchange="javascript:adjustmenttype('34','Sphenoid')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',34);</script>    
    </tr><tr id="TMJtr"><td>TMJ</td><td align="center"><input type="checkbox" id="TMJLTfixation" name="TMJLTfixation" value="true" onchange="javascript:populateareas('TMJ','LTfixation');">
      </td><td align="center"><input type="checkbox" id="TMJRTfixation" name="TMJRTfixation" value="true" onchange="javascript:populateareas('TMJ','RTfixation');"></td>
      <td>TMJ</td><td align="center"><input type="checkbox" name="TMJLTadjustment" id="TMJLTadjustment" value="true" onchange="javascript:populateareas('TMJ','LTadjustment');"></td><td align="center"><input type="checkbox" name="TMJRTadjustment" id="TMJRTadjustment" value="true" onchange="javascript:populateareas('TMJ','RTadjustment');"></td>
      <td>TMJ</td><td align="center"><input type="radio" name="TMJLTtenderness" id="TMJLTtenderness1" value="1" onchange="javascript:tendernessall('TMJ','LTtenderness1');" > 1
      <input type="radio" name="TMJLTtenderness" id="TMJLTtenderness2" value="2" onchange="javascript:tendernessall('TMJ','LTtenderness2');" > 2
      <input type="radio" name="TMJLTtenderness" id="TMJLTtenderness3" value="3" onchange="javascript:tendernessall('TMJ','LTtenderness3');" > 3
      <input type="radio" name="TMJLTtenderness" id="TMJLTtenderness4" value="4" onchange="javascript:tendernessall('TMJ','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="TMJRTtenderness" id="TMJRTtenderness1" value="1" onchange="javascript:tendernessall('TMJ','RTtenderness1');" > 1
      <input type="radio" name="TMJRTtenderness" id="TMJRTtenderness2" value="2" onchange="javascript:tendernessall('TMJ','RTtenderness2');" > 2
      <input type="radio" name="TMJRTtenderness" id="TMJRTtenderness3" value="3" onchange="javascript:tendernessall('TMJ','RTtenderness3');" > 3
      <input type="radio" name="TMJRTtenderness" id="TMJRTtenderness4" value="4" onchange="javascript:tendernessall('TMJ','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('TMJ');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv35"></div>
    <input type="hidden" name="TMJadjustmenttype" id="adjustmenttype35" />
      <select name="adjustmenttypeselect35" id="adjustmenttypeselect35" onchange="javascript:adjustmenttype('35','TMJ')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',35);</script>    
    </tr><tr bgcolor="#f1f1f1" id="OCCExtr"><td>OCCEx</td><td align="center"><input type="checkbox" id="OCCExLTfixation" name="OCCExLTfixation" value="true" onchange="javascript:populateareas('OCCEx','LTfixation');">
      </td><td align="center"><input type="checkbox" id="OCCExRTfixation" name="OCCExRTfixation" value="true" onchange="javascript:populateareas('OCCEx','RTfixation');"></td>
      <td>OCCEx</td><td align="center"><input type="checkbox" name="OCCExLTadjustment" id="OCCExLTadjustment" value="true" onchange="javascript:populateareas('OCCEx','LTadjustment');"></td><td align="center"><input type="checkbox" name="OCCExRTadjustment" id="OCCExRTadjustment" value="true" onchange="javascript:populateareas('OCCEx','RTadjustment');"></td>
      <td>OCCEx</td><td align="center"><input type="radio" name="OCCExLTtenderness" id="OCCExLTtenderness1" value="1" onchange="javascript:tendernessall('OCCEx','LTtenderness1');" > 1
      <input type="radio" name="OCCExLTtenderness" id="OCCExLTtenderness2" value="2" onchange="javascript:tendernessall('OCCEx','LTtenderness2');" > 2
      <input type="radio" name="OCCExLTtenderness" id="OCCExLTtenderness3" value="3" onchange="javascript:tendernessall('OCCEx','LTtenderness3');" > 3
      <input type="radio" name="OCCExLTtenderness" id="OCCExLTtenderness4" value="4" onchange="javascript:tendernessall('OCCEx','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="OCCExRTtenderness" id="OCCExRTtenderness1" value="1" onchange="javascript:tendernessall('OCCEx','RTtenderness1');" > 1
      <input type="radio" name="OCCExRTtenderness" id="OCCExRTtenderness2" value="2" onchange="javascript:tendernessall('OCCEx','RTtenderness2');" > 2
      <input type="radio" name="OCCExRTtenderness" id="OCCExRTtenderness3" value="3" onchange="javascript:tendernessall('OCCEx','RTtenderness3');" > 3
      <input type="radio" name="OCCExRTtenderness" id="OCCExRTtenderness4" value="4" onchange="javascript:tendernessall('OCCEx','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('OCCEx');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv36"></div>
    <input type="hidden" name="OCCExadjustmenttype" id="adjustmenttype36" />
      <select name="adjustmenttypeselect36" id="adjustmenttypeselect36" onchange="javascript:adjustmenttype('36','OCCEx')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',36);</script>    
    </tr><tr bgcolor="#e3deef" id="Clavicletr"><td><div style="position:absolute;width:0px;height:0px;"><div style="position:relative;right:60px;bottom:8px;width:50px;height:165px;border:1px solid #d9d9d9;background-color:#e3deef;color:white;vertical-align:middle;z-index:-1" id="Claviclelabeldiv">
      <table width="50 height="165"><tr height="165" id="Claviclelabeltr"><td width="50" valign="middle" align="center"><b><b>U<br>P<br>P<br>E<br>R</b><br></b></td></tr></table></div></div>Clavicle</td><td align="center"><input type="checkbox" id="ClavicleLTfixation" name="ClavicleLTfixation" value="true" onchange="javascript:populateareas('Clavicle','LTfixation');">
      </td><td align="center"><input type="checkbox" id="ClavicleRTfixation" name="ClavicleRTfixation" value="true" onchange="javascript:populateareas('Clavicle','RTfixation');"></td>
      <td>Clavicle</td><td align="center"><input type="checkbox" name="ClavicleLTadjustment" id="ClavicleLTadjustment" value="true" onchange="javascript:populateareas('Clavicle','LTadjustment');"></td><td align="center"><input type="checkbox" name="ClavicleRTadjustment" id="ClavicleRTadjustment" value="true" onchange="javascript:populateareas('Clavicle','RTadjustment');"></td>
      <td>Clavicle</td><td align="center"><input type="radio" name="ClavicleLTtenderness" id="ClavicleLTtenderness1" value="1" onchange="javascript:tendernessall('Clavicle','LTtenderness1');" > 1
      <input type="radio" name="ClavicleLTtenderness" id="ClavicleLTtenderness2" value="2" onchange="javascript:tendernessall('Clavicle','LTtenderness2');" > 2
      <input type="radio" name="ClavicleLTtenderness" id="ClavicleLTtenderness3" value="3" onchange="javascript:tendernessall('Clavicle','LTtenderness3');" > 3
      <input type="radio" name="ClavicleLTtenderness" id="ClavicleLTtenderness4" value="4" onchange="javascript:tendernessall('Clavicle','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="ClavicleRTtenderness" id="ClavicleRTtenderness1" value="1" onchange="javascript:tendernessall('Clavicle','RTtenderness1');" > 1
      <input type="radio" name="ClavicleRTtenderness" id="ClavicleRTtenderness2" value="2" onchange="javascript:tendernessall('Clavicle','RTtenderness2');" > 2
      <input type="radio" name="ClavicleRTtenderness" id="ClavicleRTtenderness3" value="3" onchange="javascript:tendernessall('Clavicle','RTtenderness3');" > 3
      <input type="radio" name="ClavicleRTtenderness" id="ClavicleRTtenderness4" value="4" onchange="javascript:tendernessall('Clavicle','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Clavicle');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv37"></div>
    <input type="hidden" name="Clavicleadjustmenttype" id="adjustmenttype37" />
      <select name="adjustmenttypeselect37" id="adjustmenttypeselect37" onchange="javascript:adjustmenttype('37','Clavicle')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',37);</script>    
    </tr><tr bgcolor="#e3deef" id="Shouldertr"><td>Shoulder</td><td align="center"><input type="checkbox" id="ShoulderLTfixation" name="ShoulderLTfixation" value="true" onchange="javascript:populateareas('Shoulder','LTfixation');">
      </td><td align="center"><input type="checkbox" id="ShoulderRTfixation" name="ShoulderRTfixation" value="true" onchange="javascript:populateareas('Shoulder','RTfixation');"></td>
      <td>Shoulder</td><td align="center"><input type="checkbox" name="ShoulderLTadjustment" id="ShoulderLTadjustment" value="true" onchange="javascript:populateareas('Shoulder','LTadjustment');"></td><td align="center"><input type="checkbox" name="ShoulderRTadjustment" id="ShoulderRTadjustment" value="true" onchange="javascript:populateareas('Shoulder','RTadjustment');"></td>
      <td>Shoulder</td><td align="center"><input type="radio" name="ShoulderLTtenderness" id="ShoulderLTtenderness1" value="1" onchange="javascript:tendernessall('Shoulder','LTtenderness1');" > 1
      <input type="radio" name="ShoulderLTtenderness" id="ShoulderLTtenderness2" value="2" onchange="javascript:tendernessall('Shoulder','LTtenderness2');" > 2
      <input type="radio" name="ShoulderLTtenderness" id="ShoulderLTtenderness3" value="3" onchange="javascript:tendernessall('Shoulder','LTtenderness3');" > 3
      <input type="radio" name="ShoulderLTtenderness" id="ShoulderLTtenderness4" value="4" onchange="javascript:tendernessall('Shoulder','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="ShoulderRTtenderness" id="ShoulderRTtenderness1" value="1" onchange="javascript:tendernessall('Shoulder','RTtenderness1');" > 1
      <input type="radio" name="ShoulderRTtenderness" id="ShoulderRTtenderness2" value="2" onchange="javascript:tendernessall('Shoulder','RTtenderness2');" > 2
      <input type="radio" name="ShoulderRTtenderness" id="ShoulderRTtenderness3" value="3" onchange="javascript:tendernessall('Shoulder','RTtenderness3');" > 3
      <input type="radio" name="ShoulderRTtenderness" id="ShoulderRTtenderness4" value="4" onchange="javascript:tendernessall('Shoulder','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Shoulder');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv38"></div>
    <input type="hidden" name="Shoulderadjustmenttype" id="adjustmenttype38" />
      <select name="adjustmenttypeselect38" id="adjustmenttypeselect38" onchange="javascript:adjustmenttype('38','Shoulder')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',38);</script>    
    </tr><tr bgcolor="#e3deef" id="Elbowtr"><td>Elbow</td><td align="center"><input type="checkbox" id="ElbowLTfixation" name="ElbowLTfixation" value="true" onchange="javascript:populateareas('Elbow','LTfixation');">
      </td><td align="center"><input type="checkbox" id="ElbowRTfixation" name="ElbowRTfixation" value="true" onchange="javascript:populateareas('Elbow','RTfixation');"></td>
      <td>Elbow</td><td align="center"><input type="checkbox" name="ElbowLTadjustment" id="ElbowLTadjustment" value="true" onchange="javascript:populateareas('Elbow','LTadjustment');"></td><td align="center"><input type="checkbox" name="ElbowRTadjustment" id="ElbowRTadjustment" value="true" onchange="javascript:populateareas('Elbow','RTadjustment');"></td>
      <td>Elbow</td><td align="center"><input type="radio" name="ElbowLTtenderness" id="ElbowLTtenderness1" value="1" onchange="javascript:tendernessall('Elbow','LTtenderness1');" > 1
      <input type="radio" name="ElbowLTtenderness" id="ElbowLTtenderness2" value="2" onchange="javascript:tendernessall('Elbow','LTtenderness2');" > 2
      <input type="radio" name="ElbowLTtenderness" id="ElbowLTtenderness3" value="3" onchange="javascript:tendernessall('Elbow','LTtenderness3');" > 3
      <input type="radio" name="ElbowLTtenderness" id="ElbowLTtenderness4" value="4" onchange="javascript:tendernessall('Elbow','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="ElbowRTtenderness" id="ElbowRTtenderness1" value="1" onchange="javascript:tendernessall('Elbow','RTtenderness1');" > 1
      <input type="radio" name="ElbowRTtenderness" id="ElbowRTtenderness2" value="2" onchange="javascript:tendernessall('Elbow','RTtenderness2');" > 2
      <input type="radio" name="ElbowRTtenderness" id="ElbowRTtenderness3" value="3" onchange="javascript:tendernessall('Elbow','RTtenderness3');" > 3
      <input type="radio" name="ElbowRTtenderness" id="ElbowRTtenderness4" value="4" onchange="javascript:tendernessall('Elbow','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Elbow');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv39"></div>
    <input type="hidden" name="Elbowadjustmenttype" id="adjustmenttype39" />
      <select name="adjustmenttypeselect39" id="adjustmenttypeselect39" onchange="javascript:adjustmenttype('39','Elbow')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',39);</script>    
    </tr><tr bgcolor="#e3deef" id="Wristtr"><td>Wrist</td><td align="center"><input type="checkbox" id="WristLTfixation" name="WristLTfixation" value="true" onchange="javascript:populateareas('Wrist','LTfixation');">
      </td><td align="center"><input type="checkbox" id="WristRTfixation" name="WristRTfixation" value="true" onchange="javascript:populateareas('Wrist','RTfixation');"></td>
      <td>Wrist</td><td align="center"><input type="checkbox" name="WristLTadjustment" id="WristLTadjustment" value="true" onchange="javascript:populateareas('Wrist','LTadjustment');"></td><td align="center"><input type="checkbox" name="WristRTadjustment" id="WristRTadjustment" value="true" onchange="javascript:populateareas('Wrist','RTadjustment');"></td>
      <td>Wrist</td><td align="center"><input type="radio" name="WristLTtenderness" id="WristLTtenderness1" value="1" onchange="javascript:tendernessall('Wrist','LTtenderness1');" > 1
      <input type="radio" name="WristLTtenderness" id="WristLTtenderness2" value="2" onchange="javascript:tendernessall('Wrist','LTtenderness2');" > 2
      <input type="radio" name="WristLTtenderness" id="WristLTtenderness3" value="3" onchange="javascript:tendernessall('Wrist','LTtenderness3');" > 3
      <input type="radio" name="WristLTtenderness" id="WristLTtenderness4" value="4" onchange="javascript:tendernessall('Wrist','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="WristRTtenderness" id="WristRTtenderness1" value="1" onchange="javascript:tendernessall('Wrist','RTtenderness1');" > 1
      <input type="radio" name="WristRTtenderness" id="WristRTtenderness2" value="2" onchange="javascript:tendernessall('Wrist','RTtenderness2');" > 2
      <input type="radio" name="WristRTtenderness" id="WristRTtenderness3" value="3" onchange="javascript:tendernessall('Wrist','RTtenderness3');" > 3
      <input type="radio" name="WristRTtenderness" id="WristRTtenderness4" value="4" onchange="javascript:tendernessall('Wrist','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Wrist');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv40"></div>
    <input type="hidden" name="Wristadjustmenttype" id="adjustmenttype40" />
      <select name="adjustmenttypeselect40" id="adjustmenttypeselect40" onchange="javascript:adjustmenttype('40','Wrist')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',40);</script>    
    </tr><tr bgcolor="#e3deef" id="Handtr"><td>Hand</td><td align="center"><input type="checkbox" id="HandLTfixation" name="HandLTfixation" value="true" onchange="javascript:populateareas('Hand','LTfixation');">
      </td><td align="center"><input type="checkbox" id="HandRTfixation" name="HandRTfixation" value="true" onchange="javascript:populateareas('Hand','RTfixation');"></td>
      <td>Hand</td><td align="center"><input type="checkbox" name="HandLTadjustment" id="HandLTadjustment" value="true" onchange="javascript:populateareas('Hand','LTadjustment');"></td><td align="center"><input type="checkbox" name="HandRTadjustment" id="HandRTadjustment" value="true" onchange="javascript:populateareas('Hand','RTadjustment');"></td>
      <td>Hand</td><td align="center"><input type="radio" name="HandLTtenderness" id="HandLTtenderness1" value="1" onchange="javascript:tendernessall('Hand','LTtenderness1');" > 1
      <input type="radio" name="HandLTtenderness" id="HandLTtenderness2" value="2" onchange="javascript:tendernessall('Hand','LTtenderness2');" > 2
      <input type="radio" name="HandLTtenderness" id="HandLTtenderness3" value="3" onchange="javascript:tendernessall('Hand','LTtenderness3');" > 3
      <input type="radio" name="HandLTtenderness" id="HandLTtenderness4" value="4" onchange="javascript:tendernessall('Hand','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="HandRTtenderness" id="HandRTtenderness1" value="1" onchange="javascript:tendernessall('Hand','RTtenderness1');" > 1
      <input type="radio" name="HandRTtenderness" id="HandRTtenderness2" value="2" onchange="javascript:tendernessall('Hand','RTtenderness2');" > 2
      <input type="radio" name="HandRTtenderness" id="HandRTtenderness3" value="3" onchange="javascript:tendernessall('Hand','RTtenderness3');" > 3
      <input type="radio" name="HandRTtenderness" id="HandRTtenderness4" value="4" onchange="javascript:tendernessall('Hand','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Hand');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv41"></div>
    <input type="hidden" name="Handadjustmenttype" id="adjustmenttype41" />
      <select name="adjustmenttypeselect41" id="adjustmenttypeselect41" onchange="javascript:adjustmenttype('41','Hand')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',41);</script>    
    </tr><tr bgcolor="#ffe7cf" id="Ribstr"><td><div style="position:absolute;width:0px;height:0px;"><div style="position:relative;right:60px;bottom:8px;width:50px;height:33px;border:1px solid #d9d9d9;background-color:#ffe7cf;color:white;vertical-align:middle;z-index:-1" id="Ribslabeldiv">
      <table width="50 height="33"><tr height="33" id="Ribslabeltr"><td width="50" valign="middle" align="center"><b>RIBS</b><br></b></td></tr></table></div></div>Ribs</td><td align="center"><input type="checkbox" id="RibsLTfixation" name="RibsLTfixation" value="true" onchange="javascript:populateareas('Ribs','LTfixation');">
      </td><td align="center"><input type="checkbox" id="RibsRTfixation" name="RibsRTfixation" value="true" onchange="javascript:populateareas('Ribs','RTfixation');"></td>
      <td>Ribs</td><td align="center"><input type="checkbox" name="RibsLTadjustment" id="RibsLTadjustment" value="true" onchange="javascript:populateareas('Ribs','LTadjustment');"></td><td align="center"><input type="checkbox" name="RibsRTadjustment" id="RibsRTadjustment" value="true" onchange="javascript:populateareas('Ribs','RTadjustment');"></td>
      <td>Ribs</td><td align="center"><input type="radio" name="RibsLTtenderness" id="RibsLTtenderness1" value="1" onchange="javascript:tendernessall('Ribs','LTtenderness1');" > 1
      <input type="radio" name="RibsLTtenderness" id="RibsLTtenderness2" value="2" onchange="javascript:tendernessall('Ribs','LTtenderness2');" > 2
      <input type="radio" name="RibsLTtenderness" id="RibsLTtenderness3" value="3" onchange="javascript:tendernessall('Ribs','LTtenderness3');" > 3
      <input type="radio" name="RibsLTtenderness" id="RibsLTtenderness4" value="4" onchange="javascript:tendernessall('Ribs','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="RibsRTtenderness" id="RibsRTtenderness1" value="1" onchange="javascript:tendernessall('Ribs','RTtenderness1');" > 1
      <input type="radio" name="RibsRTtenderness" id="RibsRTtenderness2" value="2" onchange="javascript:tendernessall('Ribs','RTtenderness2');" > 2
      <input type="radio" name="RibsRTtenderness" id="RibsRTtenderness3" value="3" onchange="javascript:tendernessall('Ribs','RTtenderness3');" > 3
      <input type="radio" name="RibsRTtenderness" id="RibsRTtenderness4" value="4" onchange="javascript:tendernessall('Ribs','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Ribs');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv42"></div>
    <input type="hidden" name="Ribsadjustmenttype" id="adjustmenttype42" />
      <select name="adjustmenttypeselect42" id="adjustmenttypeselect42" onchange="javascript:adjustmenttype('42','Ribs')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',42);</script>    
    </tr><tr bgcolor="#ffecec" id="Hiptr"><td><div style="position:absolute;width:0px;height:0px;"><div style="position:relative;right:60px;bottom:8px;width:50px;height:164px;border:1px solid #d9d9d9;background-color:#ffecec;color:white;vertical-align:middle;z-index:-1" id="Hiplabeldiv">
      <table width="50 height="164"><tr height="164" id="Hiplabeltr"><td width="50" valign="middle" align="center"><b>L<br>O<br>W<br>E<br>R</b><br></b></td></tr></table></div></div>Hip</td><td align="center"><input type="checkbox" id="HipLTfixation" name="HipLTfixation" value="true" onchange="javascript:populateareas('Hip','LTfixation');">
      </td><td align="center"><input type="checkbox" id="HipRTfixation" name="HipRTfixation" value="true" onchange="javascript:populateareas('Hip','RTfixation');"></td>
      <td>Hip</td><td align="center"><input type="checkbox" name="HipLTadjustment" id="HipLTadjustment" value="true" onchange="javascript:populateareas('Hip','LTadjustment');"></td><td align="center"><input type="checkbox" name="HipRTadjustment" id="HipRTadjustment" value="true" onchange="javascript:populateareas('Hip','RTadjustment');"></td>
      <td>Hip</td><td align="center"><input type="radio" name="HipLTtenderness" id="HipLTtenderness1" value="1" onchange="javascript:tendernessall('Hip','LTtenderness1');" > 1
      <input type="radio" name="HipLTtenderness" id="HipLTtenderness2" value="2" onchange="javascript:tendernessall('Hip','LTtenderness2');" > 2
      <input type="radio" name="HipLTtenderness" id="HipLTtenderness3" value="3" onchange="javascript:tendernessall('Hip','LTtenderness3');" > 3
      <input type="radio" name="HipLTtenderness" id="HipLTtenderness4" value="4" onchange="javascript:tendernessall('Hip','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="HipRTtenderness" id="HipRTtenderness1" value="1" onchange="javascript:tendernessall('Hip','RTtenderness1');" > 1
      <input type="radio" name="HipRTtenderness" id="HipRTtenderness2" value="2" onchange="javascript:tendernessall('Hip','RTtenderness2');" > 2
      <input type="radio" name="HipRTtenderness" id="HipRTtenderness3" value="3" onchange="javascript:tendernessall('Hip','RTtenderness3');" > 3
      <input type="radio" name="HipRTtenderness" id="HipRTtenderness4" value="4" onchange="javascript:tendernessall('Hip','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Hip');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv43"></div>
    <input type="hidden" name="Hipadjustmenttype" id="adjustmenttype43" />
      <select name="adjustmenttypeselect43" id="adjustmenttypeselect43" onchange="javascript:adjustmenttype('43','Hip')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',43);</script>    
    </tr><tr bgcolor="#ffecec" id="Kneetr"><td>Knee</td><td align="center"><input type="checkbox" id="KneeLTfixation" name="KneeLTfixation" value="true" onchange="javascript:populateareas('Knee','LTfixation');">
      </td><td align="center"><input type="checkbox" id="KneeRTfixation" name="KneeRTfixation" value="true" onchange="javascript:populateareas('Knee','RTfixation');"></td>
      <td>Knee</td><td align="center"><input type="checkbox" name="KneeLTadjustment" id="KneeLTadjustment" value="true" onchange="javascript:populateareas('Knee','LTadjustment');"></td><td align="center"><input type="checkbox" name="KneeRTadjustment" id="KneeRTadjustment" value="true" onchange="javascript:populateareas('Knee','RTadjustment');"></td>
      <td>Knee</td><td align="center"><input type="radio" name="KneeLTtenderness" id="KneeLTtenderness1" value="1" onchange="javascript:tendernessall('Knee','LTtenderness1');" > 1
      <input type="radio" name="KneeLTtenderness" id="KneeLTtenderness2" value="2" onchange="javascript:tendernessall('Knee','LTtenderness2');" > 2
      <input type="radio" name="KneeLTtenderness" id="KneeLTtenderness3" value="3" onchange="javascript:tendernessall('Knee','LTtenderness3');" > 3
      <input type="radio" name="KneeLTtenderness" id="KneeLTtenderness4" value="4" onchange="javascript:tendernessall('Knee','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="KneeRTtenderness" id="KneeRTtenderness1" value="1" onchange="javascript:tendernessall('Knee','RTtenderness1');" > 1
      <input type="radio" name="KneeRTtenderness" id="KneeRTtenderness2" value="2" onchange="javascript:tendernessall('Knee','RTtenderness2');" > 2
      <input type="radio" name="KneeRTtenderness" id="KneeRTtenderness3" value="3" onchange="javascript:tendernessall('Knee','RTtenderness3');" > 3
      <input type="radio" name="KneeRTtenderness" id="KneeRTtenderness4" value="4" onchange="javascript:tendernessall('Knee','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Knee');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv44"></div>
    <input type="hidden" name="Kneeadjustmenttype" id="adjustmenttype44" />
      <select name="adjustmenttypeselect44" id="adjustmenttypeselect44" onchange="javascript:adjustmenttype('44','Knee')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',44);</script>    
    </tr><tr bgcolor="#ffecec" id="Ankletr"><td>Ankle</td><td align="center"><input type="checkbox" id="AnkleLTfixation" name="AnkleLTfixation" value="true" onchange="javascript:populateareas('Ankle','LTfixation');">
      </td><td align="center"><input type="checkbox" id="AnkleRTfixation" name="AnkleRTfixation" value="true" onchange="javascript:populateareas('Ankle','RTfixation');"></td>
      <td>Ankle</td><td align="center"><input type="checkbox" name="AnkleLTadjustment" id="AnkleLTadjustment" value="true" onchange="javascript:populateareas('Ankle','LTadjustment');"></td><td align="center"><input type="checkbox" name="AnkleRTadjustment" id="AnkleRTadjustment" value="true" onchange="javascript:populateareas('Ankle','RTadjustment');"></td>
      <td>Ankle</td><td align="center"><input type="radio" name="AnkleLTtenderness" id="AnkleLTtenderness1" value="1" onchange="javascript:tendernessall('Ankle','LTtenderness1');" > 1
      <input type="radio" name="AnkleLTtenderness" id="AnkleLTtenderness2" value="2" onchange="javascript:tendernessall('Ankle','LTtenderness2');" > 2
      <input type="radio" name="AnkleLTtenderness" id="AnkleLTtenderness3" value="3" onchange="javascript:tendernessall('Ankle','LTtenderness3');" > 3
      <input type="radio" name="AnkleLTtenderness" id="AnkleLTtenderness4" value="4" onchange="javascript:tendernessall('Ankle','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="AnkleRTtenderness" id="AnkleRTtenderness1" value="1" onchange="javascript:tendernessall('Ankle','RTtenderness1');" > 1
      <input type="radio" name="AnkleRTtenderness" id="AnkleRTtenderness2" value="2" onchange="javascript:tendernessall('Ankle','RTtenderness2');" > 2
      <input type="radio" name="AnkleRTtenderness" id="AnkleRTtenderness3" value="3" onchange="javascript:tendernessall('Ankle','RTtenderness3');" > 3
      <input type="radio" name="AnkleRTtenderness" id="AnkleRTtenderness4" value="4" onchange="javascript:tendernessall('Ankle','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Ankle');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv45"></div>
    <input type="hidden" name="Ankleadjustmenttype" id="adjustmenttype45" />
      <select name="adjustmenttypeselect45" id="adjustmenttypeselect45" onchange="javascript:adjustmenttype('45','Ankle')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',45);</script>    
    </tr><tr bgcolor="#ffecec" id="Foottr"><td>Foot</td><td align="center"><input type="checkbox" id="FootLTfixation" name="FootLTfixation" value="true" onchange="javascript:populateareas('Foot','LTfixation');">
      </td><td align="center"><input type="checkbox" id="FootRTfixation" name="FootRTfixation" value="true" onchange="javascript:populateareas('Foot','RTfixation');"></td>
      <td>Foot</td><td align="center"><input type="checkbox" name="FootLTadjustment" id="FootLTadjustment" value="true" onchange="javascript:populateareas('Foot','LTadjustment');"></td><td align="center"><input type="checkbox" name="FootRTadjustment" id="FootRTadjustment" value="true" onchange="javascript:populateareas('Foot','RTadjustment');"></td>
      <td>Foot</td><td align="center"><input type="radio" name="FootLTtenderness" id="FootLTtenderness1" value="1" onchange="javascript:tendernessall('Foot','LTtenderness1');" > 1
      <input type="radio" name="FootLTtenderness" id="FootLTtenderness2" value="2" onchange="javascript:tendernessall('Foot','LTtenderness2');" > 2
      <input type="radio" name="FootLTtenderness" id="FootLTtenderness3" value="3" onchange="javascript:tendernessall('Foot','LTtenderness3');" > 3
      <input type="radio" name="FootLTtenderness" id="FootLTtenderness4" value="4" onchange="javascript:tendernessall('Foot','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="FootRTtenderness" id="FootRTtenderness1" value="1" onchange="javascript:tendernessall('Foot','RTtenderness1');" > 1
      <input type="radio" name="FootRTtenderness" id="FootRTtenderness2" value="2" onchange="javascript:tendernessall('Foot','RTtenderness2');" > 2
      <input type="radio" name="FootRTtenderness" id="FootRTtenderness3" value="3" onchange="javascript:tendernessall('Foot','RTtenderness3');" > 3
      <input type="radio" name="FootRTtenderness" id="FootRTtenderness4" value="4" onchange="javascript:tendernessall('Foot','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Foot');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv46"></div>
    <input type="hidden" name="Footadjustmenttype" id="adjustmenttype46" />
      <select name="adjustmenttypeselect46" id="adjustmenttypeselect46" onchange="javascript:adjustmenttype('46','Foot')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',46);</script>    
    </tr><tr bgcolor="#ffecec" id="Othertr"><td>Other</td><td align="center"><input type="checkbox" id="OtherLTfixation" name="OtherLTfixation" value="true" onchange="javascript:populateareas('Other','LTfixation');">
      </td><td align="center"><input type="checkbox" id="OtherRTfixation" name="OtherRTfixation" value="true" onchange="javascript:populateareas('Other','RTfixation');"></td>
      <td>Other</td><td align="center"><input type="checkbox" name="OtherLTadjustment" id="OtherLTadjustment" value="true" onchange="javascript:populateareas('Other','LTadjustment');"></td><td align="center"><input type="checkbox" name="OtherRTadjustment" id="OtherRTadjustment" value="true" onchange="javascript:populateareas('Other','RTadjustment');"></td>
      <td>Other</td><td align="center"><input type="radio" name="OtherLTtenderness" id="OtherLTtenderness1" value="1" onchange="javascript:tendernessall('Other','LTtenderness1');" > 1
      <input type="radio" name="OtherLTtenderness" id="OtherLTtenderness2" value="2" onchange="javascript:tendernessall('Other','LTtenderness2');" > 2
      <input type="radio" name="OtherLTtenderness" id="OtherLTtenderness3" value="3" onchange="javascript:tendernessall('Other','LTtenderness3');" > 3
      <input type="radio" name="OtherLTtenderness" id="OtherLTtenderness4" value="4" onchange="javascript:tendernessall('Other','LTtenderness4');" > 4</td>
      <td align="center"><input type="radio" name="OtherRTtenderness" id="OtherRTtenderness1" value="1" onchange="javascript:tendernessall('Other','RTtenderness1');" > 1
      <input type="radio" name="OtherRTtenderness" id="OtherRTtenderness2" value="2" onchange="javascript:tendernessall('Other','RTtenderness2');" > 2
      <input type="radio" name="OtherRTtenderness" id="OtherRTtenderness3" value="3" onchange="javascript:tendernessall('Other','RTtenderness3');" > 3
      <input type="radio" name="OtherRTtenderness" id="OtherRTtenderness4" value="4" onchange="javascript:tendernessall('Other','RTtenderness4');" > 4</td>
      <td><input type="button" onclick="cleartenderness('Other');" value="Clear"></td>
      <td>    <div id="adjustmenttypediv47"></div>
    <input type="hidden" name="Otheradjustmenttype" id="adjustmenttype47" />
      <select name="adjustmenttypeselect47" id="adjustmenttypeselect47" onchange="javascript:adjustmenttype('47','Other')">
      <option value=""></option><option value="Activator">Activator</option><option value="Blocking">Blocking</option><option value="Combo Blocking w/ Drop Table">Combo Blocking w/ Drop Table</option><option value="Diversified">Diversified</option><option value="Drop Table">Drop Table</option><option value="Extremity">Extremity</option></select><script>adjpoppt('',47);</script>    
    </tr><tr><td>&nbsp;</td><td align="center">LT</td><td align="center">RT</td><td>&nbsp;</td><td align="center">LT</td><td align="center">RT</td><td>&nbsp;</td><td align="center">LT</td><td align="center">RT</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr bgcolor="#f1f1f1"><td colspan="3" align="center" width="15%">Fixations</td>
<td colspan="3" align="center" width="15%">Region Adjusted</td>
<td colspan="4" align="center" width="45%">Tenderness / Muscle Spasm</td><td width="20%">Adjustment Type</td></tr>
</table></td></tr></table><br>
<input type="image" src="{{ asset('nlimages/savebutton.png') }}" height="25" onclick="javascript:whichsubmitted('objective');"> <img src="{{asset('nlimages/clearbutton.png')}}" alt="Clear" onclick="javascript:clearform();" />
<script> adjustdivs(); </script><hr id="assessmenthr">
<font size="+2">Assessment:</font><hr />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="soap.php?p=assessment">Notes</a> | <a href="assessmenticd.php">ICD/CPT</a><br /><br />

<script>
function selectall(id,status){
      var start=0,finish=0;
      if(id==0){ start=0; finish=6; }
      if(id==6){ start=6; finish=11; }
      if(document.getElementById(id+'select'+status).checked){
            for(var i=start;i<finish;i++){
            document.getElementById(i+'check'+status).checked=true;
            }
      }
      else{
            for(var i=start;i<finish;i++){
            document.getElementById(i+'check'+status).checked=false;
            }
      }
}
</script>
<input type="hidden" name="assessmentsubmit" value="Submit">
<table><tr><td>
Condition Status:</td><td><select name="conditionstatus"><option value="">Select Condition Status</option><option value="Acute">Acute</option><option value="Chronic">Chronic</option><option value="Permanent">Permanent</option><option value="Plateau">Plateau</option><option value="Subacute">Subacute</option><option value="Flare">Flare</option></select></td></tr>
<tr><td>Current Progress:</td><td><select name="currentprogress"><option value="">Select Current Progress</option><option value="Excellent">Excellent</option><option value="Good">Good</option><option value="Fair">Fair</option><option value="Poor">Poor</option></select></td></tr></table>
<table>
<tr><td>&nbsp;</td><td>
<table border="1" cellspacing="0" cellpadding="5" style="border:1px solid #d9d9d9;"><tr><td style="border-bottom:none;"><strong>Improved</strong></td><td><input type="checkbox" id="0selectImproved" onchange="javascript:selectall(0,'Improved')"></td><td style="border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="0checkImproved" name="Improved[]" value="Pain"> Pain &darr;</td><td style="border-left:none;border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="1checkImproved" name="Improved[]" value="Edema"> Edema &darr;</td><td style="border-left:none;border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="2checkImproved" name="Improved[]" value="Tissue & Vascular Enhancement"> Tissue & Vascular Enhancement &darr;</td><td style="border-left:none;border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="3checkImproved" name="Improved[]" value="Joint Mobilization"> Joint Mobilization &uarr;</td><td style="border-left:none;border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="4checkImproved" name="Improved[]" value="Trigger Point"> Trigger Point &darr;</td><td style="border-left:none;border-left:none;border-right:none;"><input type="checkbox" id="5checkImproved" name="Improved[]" value="ROM"> ROM &uarr;</td></tr><tr><td style="border-top:none;">&nbsp;</td><td><input type="checkbox" id="6selectImproved" onchange="javascript:selectall(6,'Improved')"></td><td style="border-left:none;border-right:none;"><input type="checkbox" id="6checkImproved" name="Improved[]" value="Adhesion"> Adhesion &darr;</td><td style="border-left:none;border-right:none;"><input type="checkbox" id="7checkImproved" name="Improved[]" value="Myo Spasm"> Myo Spasm &darr;</td><td style="border-left:none;border-right:none;"><input type="checkbox" id="8checkImproved" name="Improved[]" value="Disc Pressure"> Disc Pressure &darr;</td><td style="border-left:none;border-right:none;"><input type="checkbox" id="9checkImproved" name="Improved[]" value="Endurance"> Endurance &uarr;</td><td style="border-left:none;border-right:none;border-left:none;"><input type="checkbox" id="10checkImproved" name="Improved[]" value="Strength"> Strength &uarr;</td><td style="border-left:none;">&nbsp;</td></tr></table><br><table border="1" cellspacing="0" cellpadding="5" style="border:1px solid #d9d9d9;"><tr><td style="border-bottom:none;"><strong>Worsened</strong></td><td><input type="checkbox" id="0selectWorsened" onchange="javascript:selectall(0,'Worsened')"></td><td style="border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="0checkWorsened" name="Worsened[]" value="Pain"> Pain &darr;</td><td style="border-left:none;border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="1checkWorsened" name="Worsened[]" value="Edema"> Edema &darr;</td><td style="border-left:none;border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="2checkWorsened" name="Worsened[]" value="Tissue & Vascular Enhancement"> Tissue & Vascular Enhancement &darr;</td><td style="border-left:none;border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="3checkWorsened" name="Worsened[]" value="Joint Mobilization"> Joint Mobilization &uarr;</td><td style="border-left:none;border-right:none;border-left:none;border-right:none;"><input type="checkbox" id="4checkWorsened" name="Worsened[]" value="Trigger Point"> Trigger Point &darr;</td><td style="border-left:none;border-left:none;border-right:none;"><input type="checkbox" id="5checkWorsened" name="Worsened[]" value="ROM"> ROM &uarr;</td></tr><tr><td style="border-top:none;">&nbsp;</td><td><input type="checkbox" id="6selectWorsened" onchange="javascript:selectall(6,'Worsened')"></td><td style="border-left:none;border-right:none;"><input type="checkbox" id="6checkWorsened" name="Worsened[]" value="Adhesion"> Adhesion &darr;</td><td style="border-left:none;border-right:none;"><input type="checkbox" id="7checkWorsened" name="Worsened[]" value="Myo Spasm"> Myo Spasm &darr;</td><td style="border-left:none;border-right:none;"><input type="checkbox" id="8checkWorsened" name="Worsened[]" value="Disc Pressure"> Disc Pressure &darr;</td><td style="border-left:none;border-right:none;"><input type="checkbox" id="9checkWorsened" name="Worsened[]" value="Endurance"> Endurance &uarr;</td><td style="border-left:none;border-right:none;border-left:none;"><input type="checkbox" id="10checkWorsened" name="Worsened[]" value="Strength"> Strength &uarr;</td><td style="border-left:none;">&nbsp;</td></tr></table><br></td></tr></table>
<input type="image" src="{{ asset('nlimages/savebutton.png') }}" height="25" alt="Save" onclick="javascript:whichsubmitted('assessment');"><br><hr id="planhr">
<font size="+2">Plan</font> <hr />
<input type="hidden" name="plansubmit" value="true">
Visit <select name="numvisits"><option value="" selected></option><option value="1" >1</option><option value="2" >2</option><option value="3" >3</option><option value="4" >4</option><option value="5" >5</option></select> times a week, for 
 <select name="numweeks"><option value="" selected></option><option value="1" >1</option><option value="2" >2</option><option value="3" >3</option><option value="4" >4</option><option value="5" >5</option><option value="6" >6</option><option value="7" >7</option><option value="8" >8</option></select> weeks<br><br>
<input type="image" src="{{ asset('nlimages/savebutton.png') }}" height="25" onclick="javascript:whichsubmitted('plan');"><Br>
 <hr>
<font size="+2">Notes</font> <hr>
<br /><textarea cols="150" rows="10" name="notes"></textarea><br /><br>
<input type="image" src="{{ asset('nlimages/savebutton.png') }}" height="25" onclick="javascript:whichsubmitted('plan');"></form>    </td></tr></table></td></tr></table></body>
