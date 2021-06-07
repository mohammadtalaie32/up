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
</script>
<div align="justify"><h2>ARBITRATION AGREEMENT AND INFORMED CONSENT</h2><br><br>
Article 1: It is understood that any dispute as to medical malpractice, that is as to  whether any medical services rendered under this contract were unnecessary or unauthorized or were improperly, negligently or incompetently rendered, will be determined by submission to arbitration as provided by California law, and not by a lawsuit or resort to court process except as California law provides for judicial review of arbitration proceedings. Both parties to this contract, by entering it, are giving up their constitutional right to have any such dispute decided in a court of law before a jury, and instead are accepting the use of arbitration. <br><br>

Article 2: All Claims Must be Arbitrated: It is the intention of the parties that this agreement bind all parties whose claims may arise out of or relate to treatment or services provided by the health care provider including any heirs or past, present or future spouse(s) of the patient in relation to all claims, including loss of consortium. This agreement is also intended to bind any children of the patient whether born or unborn at the time of the occurrence giving rise to any claim. This agreement is intended to bind the patient and the health care provider and/or other licensed health care providers or preceptorship interns who now or in the future treat the patient while employed by, working or associated with or serving as back-up for the health care provider, including those working at the health care provider?s clinic or office or any other clinic or office, whether signatories to this form or not. All claims for monetary damages exceeding the jurisdictional limit of the small claims court against the health care provider, and/or the health care provider?s associates, association, corporation, partnership, employees, agents and estate, must be arbitrated including, without limitation, claims for loss of consortium, wrongful death, emotional distress or punitive damages. This agreement is intended to create an open book account unless and until revoked. <br><br>

Article 3: Procedures and Applicable Law: A demand for arbitration must be communicated in writing to all parties. Each party shall select an arbitrator (party arbitrator) within thirty days and a third arbitrator (neutral arbitrator) shall be selected by the arbitrators appointed by the parties within thirty days thereafter. Each party to the arbitration shall pay such party?s pro rata share of the expenses and fees of the neutral arbitrator, together with other expenses of the arbitration incurred or approved by the neutral arbitrator, not including counsel fees, witness fees or other expenses incurred by a party for such party?s own benefit. <br><br>

Article 4: General Provisions: All claims based upon the same incident, transaction or related circumstances shall be arbitrated in one processing. A claim shall be waived and forever barred if (1) on the date notice thereof is received, the claim, if asserted in a civil action, would be barred by the applicable California statute of limitations, or (2) the claimant fails to pursue the arbitration claim in accordance with the procedures prescribed herein with reasonable diligence. <br><br>

Article 5: Revocation: This agreement may be revoked by written notice delivered to the health care provider within 30 days of signature and if not revoked will govern all professional services received by the patient and all other disputes between the parties. <br><br>

Article 6: Retroactive Effect: If patient intends this agreement to cover services rendered before the date it is signed (for example, emergency treatment) patient should initial below. Effective as of the date of first professional services. If any provision of this Arbitration Agreement is held invalid or unenforceable, the remaining provisions shall remain in full force and shall not be affected by the invalidity of any other provision. I understand that I have the right to receive a copy of this arbitration agreement. By my signature below, I acknowledge that I have received a copy. <br><br>


***NOTICE: BY SIGNING THIS CONTRACT YOU ARE AGREEING TO HAVE ANY ISSUE OF MEDICAL MALPRACTICE DECIDED BY NEUTRAL ARBITRATION AND YOU ARE GIVING UP YOUR RIGHT TO A JURY OR COURT TRIAL, SEE ARTICLE 1.<br><br>

<input type="checkbox"> 1) I hereby request and consent to the performance of chiropractic adjustments and other chiropractic procedures including various modes of physical therapy and diagnostic x-rays, on me (or the patient named below, for whom I am legally responsible) by the doctor of chiropractic named below and/or other licensed doctors of chiropractic who now or in the future treat me while employed by, working with or associated with or serving as back-up for the doctor of chiropractic named below, including those working at the clinic or office listed below or any other office or clinic, whether signatories to this form or not. <br><br>

<input type="checkbox"> 2) I have had an opportunity to discuss with the Doctor of Chiropractic named below, and/or with other office or clinic personnel the nature and purpose of chiropractic adjustments and other procedures. I understand that results are not guaranteed. <br><br>

<input type="checkbox"> 3) I understand and am informed that, as with the practice of medicine chiropractic carries some risks to treatment, including, but not limited to fractures, disc injuries, strokes, dislocations and sprains. I do not expect the doctor to be able to anticipate and explain all risks and complications, and I wish to rely on the doctor to exercise judgement during the procedure which the doctor feels at the time, based upon the facts then known, is in my best interests. <br><br>

<input type="checkbox"> 4) I have read, or have had read to me, the above consent. I have also had an opportunity to ask questions about its consent, and by signing below I agree to the above-named procedures. I intend this consent form to cover the entire course of treatment for my present conditions(s) and for any future condition(s) for which I seek treatment. <br><br>

DOCTOR-PATIENT RELATIONSHIP AND INFORMED CONSENT CHIROPRACTIC: It is important to acknowledge the difference between the health care specialties of Chiropractic, Osteopathy, and Medicine, and for the patient to understand what to expect from chiropractic care. It is the chiropractic premise that proper spinal alignment allows normal nerve transmission throughout the body and gives the body an opportunity to use its inherent recuperative powers. In this way, chiropractic health care seeks to restore health through natural means without the use or drugs or surgery. This gives the body maximum opportunity to utilize its inherent recuperative powers. The success of chiropractic procedures often depends on environment, underlying causes, and the physical and spinal conditions of each individual patient. It is important that the patient understands what to expect from chiropractic care. Due to the complexities of nature, and the many variables (both known and unknown) that can affect a patient's response, no doctor can promise specific results. The Doctor of Chiropractic provides a specialized, unique, non-duplicating health service. The Doctor of Chiropractic is licensed in a special area of practice and is available to work with other types of providers in your health care regime. <br><br>

ANALYSIS: Your doctor will conduct a clinical analysis for the express purpose of determining whether there is evidence that your situation may be the result of vertebral subluxation and that you might respond satisfactory to chiropractic care will be recommended in an attempt to restore spinal integrity. <br><br>

RESULTS: The purpose of chiropractic care is to promote natural health through the reduction of the vertebral subluxation. Since there are so many variables, it is difficult to predict the time schedule or the efficacy of the chiropractic adjustment on any given patient. Sometimes the response is phenomenal, however, in most cases, there is a more gradual, but quite satisfactory response. Occasionally, the results are less than expected. Two or more similar conditions may respond differently to the same type of care and actual response is not predictable. Many medical failures have found significant benefit through chiropractic care. In turn, many conditions, which do not respond to chiropractic care, may be helped through medical treatment. Chiropractic and medicine may never be so exact as to provide definite answers to all problems; however, both have made great strides in patient care. <br><br>

DIAGNOSIS: Although Doctor of Chiropractic are experts in the analysis of the structural alignment of the human spine, and its effects on the nervous system, they are not internal medical specialists. Every patient should be mindful of his/her own symptoms and should secure other opinions should he/she have any concerns as to the nature of his/her total condition. Your Doctor of Chiropractic may express an opinion as to whether or not you should take this step, but you are responsible for the final decision. <br><br>

INFORMED CONSENT FOR CHIROPRACTIC CARE: By signing below, the patient gives the doctor permission and authority to care for him/her in accordance with recognized and acceptable chiropractic analytical and corrective procedures. The chiropractic adjustment is usually beneficial and seldom causes any adverse reactions. In rare cases, undetected physical defects, deformities, or pathologies may render the patient susceptible to injury. The doctor, of course, will not give any extra adjustment if he is aware that such care may be contraindicated. Again, it is the responsibility of the patient to make it known or to learn through other health care procedures whether he/she is suffering from pathological conditions (latent or otherwise), illnesses, injuries, or deformities which would otherwise not come to the attention of the doctor. <br><br>

TO THE PATIENT: Please discuss any questions or problems with the doctor before signing this statement of understanding and consent for care. <br><br>

<input type="checkbox"> 1) I have read and understand the foregoing explanation of chiropractic care given to me. I hereby give my consent for the doctor to render chiropractor to me. <br><br>

***CONSENT TO TREATMENT OF MINOR (IF APPLICABLE)*** I/We, the undersigned, parent(s)/legal guardian of this minor do hereby authorize Dr. Michael A. Sanchez, D.C. as agent(s) for the undersigned to consent to any x-ray examination and chiropractic diagnosis or treatment, which is deemed advisable by a licensed chiropractor, be rendered under the general or special supervision of any licensed chiropractor. It is understood that this authorization is given in advance of any specific diagnosis or treatment being required but is given to provide authority to the above described agent(s) to give specific consent to any and all such diagnosis and treatment which chiropractor, meeting the requirement of authorization, may, in the exercise of his/her best judgement, deem advisable. 1) I hereby give consent on behalf of the minor for the doctor to render chiropractor to him/her. This authorization shall remain effective until the minor reaches age 18 or legal adult. <br><br>

<input type="checkbox"> 1) I have read and understand the foregoing explanation of chiropractic care given to me. I hereby give my consent for the doctor to render chiropractor to me.
</div><script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>    <br>Signed: <canvas style="border: 1px solid black; touch-action: none;" width="300" height="70"></canvas><br><br>
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
