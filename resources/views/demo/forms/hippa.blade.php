<html><head><script>
var divs=['subjective','objective','assessment','plan'];
var active='';
function scrollintoview(page){
  document.getElementById(page+'hr').scrollIntoView();
 // var coding=''; if(page=='assessmenticd.php') coding='coding';
  for(var i=0;i<divs.length;i++){
	  document.getElementById(divs[i]+'td').style.backgroundImage="url('/nlimages/navbg.png')";
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
<form>
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table id="mainmenutable" style="background-color:#5f5f61;color:white;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;"><tbody><tr><td width="130" valign="middle">
	<a href="{{route('demo')}}">
		<img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle">
			<a href="{{route('logout')}}">
				<img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="{{ route('admin') }}"><img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td>
<td align="center">Welcome,<br>Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="forms.php">
<input type="hidden" name="gotodate">
<font size="+1">Please select a patient to begin!</font></td><td width="12%" align="right"><a href="{{route('patientportal')}}" style="color:white;font-size:18px;">Patient Portal</a></td><td style="border-left:none;" width="4%" align="right">
<a href="{{ route('demo')}}">
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
		if(onoff=='on') document.getElementById(id+'td').style.backgroundImage='url(/nlimages/navbg'+coding+'on.png)';
		if(onoff=='off') document.getElementById(id+'td').style.backgroundImage='url(/nlimages/navbg'+coding+'.png)';
	}
}
</script>
<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr><td>&nbsp;</td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="age.phptd" onmouseover="changebg('age.php','on','');" onmouseout="changebg('age.php','off','')" align="center"><a href="{{ route('demo')}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">All Patients</div></a></td></tr><tr><td>&nbsp;</td></tr><tr height="40"><td style="background-image:url('/nlimages/navbg.png');background-repeat:no-repeat;background-position:center;" id="patient.phptd" onmouseover="changebg('patient.php','on','');" onmouseout="changebg('patient.php','off','')" align="center"><a href="{{route('patient.create')}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">New Patient</div></a></td></tr></tbody></table>
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
<table width="100%" cellpadding="10 "><tbody><tr><td width="100%" valign="top">
<script>

if(window.innerWidth<1280){
	document.getElementById('visitlist').style.top='69px';
	document.getElementById('sidebar').style.top='72px';
	document.getElementById('mainmenutable').style.height='70px';
}

</script>
<div align="justify"><h2>HIPAA Form</h2><br>
PATIENT PRIVACY ACT<br><br>

This notice describes how chiropractic and medical information about you may be used and disclosed and how you can get access to this information. Please review it carefully. In the course of your case as a patient with Up 2 Speed Sports Performance and Therapy we may use or disclose personal information about you in the following ways: -Your protected health information, including your clinical records, may be disclosed to another health provider or hospital if it is necessary to refer you for further diagnosis, assessment, or treatment. -Your health care records as well as your billing records may be disclosed to another party, such as an insurance carrier, an HMO, a PPO, or your employer, if they are or may be responsible for payment of services provided to you. -Your name, address, phone number, and your health records may be used to contact you regarding appointment reminders, information about alternatives to your present care, or other health related information that may be of interest to you. You have the right to request restrictions on our use of your protected health information for treatment, payment, or operation purposes. Such requests are not automatic and require the agreement of this office. I understand that this office uses an open treatment area and I may be treated in front on other patients. I may request a private room to be used for my treatment. Health information or information about my case may be discussed in front of the other chiropractors in the office or the office receptionist. A private room can be requested to discuss any health information about yourself. If you are not at home to receive an appointment reminder or other related information, a message may be left on your answering machine or with a person in your household. You have the right to confidential communications and to request restrictions relative to such contacts. You also have the right to be contacted by alternative means or at alternative locations. We are permitted/may be required to use or disclose your health information without your authorization in these following circumstances: -If we provide health care services to you in an emergency. -If we are required by law to provide care to and we are unable to obtain your consent after attempting to do so. -If there are substantial barriers to communicating with you, but in our professional judgement, we believe that you intend for us to provide care. -If we are ordered by courts or another appropriate agency. You have the right to receive an accounting of any such disclosures made by this office. Any use or disclosure of your protected health information, other than as outlined above, will only be made upon your written authorization. If you provide an authorization for release of information you have the right to revoke that authorization at a later date. <br><br>

PRIVACY NOTICE Information that we use or disclose based on this privacy notice may be subject to re-disclosure by the person to whom we provided the information and may no longer be protected by federal privacy rules. We normally provide information about your health to you in person at the time you receive chiropractic care from us. We may also mail information to you regarding your health care or about the status of your account. If you would like to receive this information in a specific form, please advise us in writing as to your preference. You have the right to inspect and/or copy your health information for as long as the information remains in our files. In addition, you have the right to request an amendment to your health information. Request to inspect, copy, or amend your health related information should be provided to us in writing. We are required by state and federal law to maintain the privacy of your patient file and health protected information therein. We are also required to provide you with this notice of our privacy practices with respect to your health information. We are further required by law to abide by the terms of this notice while it is in effect. If you would like further information or have a complaint regarding our privacy notice, our privacy practice, or any aspect of private activities, you should direct your complaints to: Dr. Michael A. Sanchez, D.C. You also have the right to log a complaint with the Secretary of Department of Health and Human Services. If you choose to log a complaint with this office or with the Secretary, your care will continue and not be disadvantaged by this office or our staff in any manner whatsoever. This notice is effective January 1, 2003. This notice and any alterations or amendments made herein will expire seven years after the date upon which the record was created. My signature acknowledges that I have received a copy of this notice. <br><br>
Do you consent to above PATIENT PRIVACY ACT? <br><br>
</div>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>    <br>Signed: <canvas style="border: 1px solid black; touch-action: none;" width="300" height="70"></canvas><br><br>
Date: <input><br><br>
    <input type="image" src="{{ asset('nlimages/submitbutton.png') }}">

    <script>
var canvas = document.querySelector("canvas");

var signaturePad = new SignaturePad(canvas);

// Returns signature image as data URL (see https://mdn.io/todataurl for the list of possible parameters)
signaturePad.toDataURL(); // save image as PNG
signaturePad.toDataURL("image/jpeg"); // save image as JPEG
signaturePad.toDataURL("image/svg+xml"); // save image as SVG

// Draws signature image from data URL.
// NOTE: This method does not populate internal data structure that represents drawn signature. Thus, after using #fromDataURL, #toData won't work properly.
signaturePad.fromDataURL("data:image/png;base64,iVBORw0K...");

// Returns signature image as an array of point groups
const data = signaturePad.toData();

// Draws signature image from an array of point groups
signaturePad.fromData(data);

// Clears the canvas
signaturePad.clear();

// Returns true if canvas is empty, otherwise returns false
signaturePad.isEmpty();

// Unbinds all event handlers
signaturePad.off();

// Rebinds all event handlers
signaturePad.on();	</script>
        </td></tr></tbody></table></td></tr></tbody></table>
</form></body></html>
