<html>
<head>
    <title>Up2Speed</title>
    <script>
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
    
    </script>
    <script>
        var divs=['subjective','objective','assessment','plan'];
        var active='';
        function scrollintoview(page){
          document.getElementById(page+'hr').scrollIntoView();
         // var coding=''; if(page=='assessmenticd.php') coding='coding';
          for(var i=0;i<divs.length;i++){
        	  document.getElementById(divs[i]+'td').style.backgroundImage="url(nlimages/navbg.png)";
        	  document.getElementById(divs[i]+'link').style.color="#606062";
        	  document.getElementById(divs[i]+'link').style.fontWeight="normal";
          }
          document.getElementById(page+'td').style.backgroundImage="url(nlimages/navbgactive.png)";
          document.getElementById(page+'link').style.color="white";
          document.getElementById(page+'link').style.fontWeight="bold";
          active=page;
        }
    </script>
    <link href="{{ asset('assets/front/styles.css') }}" type="text/css" rel="stylesheet">
</head>
<body class="font" ')"="" style="margin:0;padding:0;">
    <script>
        function showvisitdates(){
        	if(document.getElementById('visitdropdown').style.display=='none')
        		document.getElementById('visitdropdown').style.display='block';
        	else if(document.getElementById('visitdropdown').style.display=='block')
        		document.getElementById('visitdropdown').style.display='none';
        }
    </script>
    <form name="encform" action="" method="post">
    <div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
    <table id="mainmenutable" style="background-color:#5f5f61;color:white;background-image:url('nlimages/headerbg.png');background-repeat:repeat-x;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td style="padding:0px;" width="30%">
    <table style="color:white;"><tbody><tr style="padding:0px;"><td style="padding:0px;" width="150" valign="middle" align="center"><a href="{{ route('patient') }}"><img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" height="50"></a></td><td width="20"></td><td width="50" valign="middle" align="left"><a href="{{ route('logout') }}"><img src="{{ asset('nlimages/logouticon.png') }}" height="60"></a></td><td width="50" valign="middle" align="left">
    <a href="{{ route('admin')}}">
    	<img src="{{ asset('nlimages/adminicon.png') }}" height="60"></a></td>
    <td width="300" align="center">Welcome,<br>Admin User</td></tr></tbody></table></td>
    
    <td style="border-right:none;" id="tdpatientvisit" width="50%" valign="middle" align="center">
    <script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
    <input type="hidden" name="page" value="">
    <input type="hidden" name="gotodate">
    <input type="hidden" name="encounterviewyear">
    <input type="hidden" name="markbilling">
    <script>function headerformsubmit(){
    	//document.getElementById('headerpatientid').value=patientid;
    	document.headerform.submit();
    }</script> <form name="headerform" action="" method="post" style="display:inline"><font size="+1">Please select a patient to begin!</font>&nbsp;&nbsp;&nbsp;<select name="patientid" id="headerpatientid" style="width:150px" onchange="location = this.value;"><option value="" selected="">Select...</option>@foreach($records as $record)
    	<option value="{{ route('edit',$record->id) }}">
    
    {{$record->firstname}}, {{$record->lastname}} <br>
    </option>
    @endforeach</select></form></td><td width="12%" align="right"><a href="{{ route('portalhome') }}" style="color:white;font-size:18px;"><img src="{{ asset('nlimages/patientportal.png') }}" style="display:inline;" width="65"></a></td><td style="border-left:none;" width="4%" align="right">
    	<a href="{{ route('patient') }}">
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
    <table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
    <tbody>      <tr style="background-color:#d9d9d9;">
                                        <td style="padding:0px;" align="center">
                                            <table width="200">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:50px;padding:0px;" valign="middle" align="center">
                                                            <a href="?print=true">
                                                                <img src="{{ asset('/nlimages/print.png') }}"
                                                                    width="40"></a>
                                                        </td>
                                                        <td style="width:100px;padding:0px;" valign="middle" align="center">
                                                            <a href="">
                                                                <img src="{{ asset('/nlimages/new.png') }}"
                                                                    style="display:inline" width="40"></a>
                                                        </td>
                                                        <td style="width:50px;padding:0px;" valign="middle" align="center">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="center"><a
                                                                style="color:black;text-decoration:none;"
                                                                href="?print=true">PRINT</a></td>
                                                        <td style="padding:0px;" valign="top" align="center"><a
                                                                style="color:black;text-decoration:none;" href="">NEW
                                                                VISIT</a></td>
                                                        <td valign="top" align="center"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
    <tr><td>&nbsp;</td></tr><tr height="35"><td style="background-image:url('nlimages/navbgpatient.png');background-repeat:no-repeat;background-position:center;" id="age.phptd" onmouseover="changebg('age.php','on','patient');" onmouseout="changebg('age.php','off','patient')" align="center"><a href="{{ route('patient') }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">All Patients</div></a></td></tr><tr><td>&nbsp;</td></tr><tr height="35"><td style="background-image: url('nlimages/navbgpatient.png'); background-repeat: no-repeat; background-position: center center;" id="patient.phptd" onmouseover="changebg('patient.php','on','patient');" onmouseout="changebg('patient.php','off','patient')" align="center">
    	<a href="{{ route('newpatient') }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">New Patient</div></a></td></tr><tr><td>&nbsp;</td></tr><tr height="35"><td style="background-image: url('nlimages/navbgpatient.png'); background-repeat: no-repeat; background-position: center center;" id="eduler.phptd" onmouseover="changebg('eduler.php','on','patient');" onmouseout="changebg('eduler.php','off','patient')" align="center">
    		<a href="{{ route('scheduler') }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr></tbody></table>
    </div>
    </td>
    
    
    
    <td id="viewport" width="100%" valign="top" align="left">
    <script>var yearon="2021";//pickayear(yearon);
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
    <table width="100%" cellpadding="10 "><tbody><tr><td width="100%" valign="top">
    Admin Home | <a href="{{ route('addclient')}}">Add Client</a><br><br><script>
    
    if(window.innerWidth<1280){
    	if(document.getElementById('visitlist')) document.getElementById('visitlist').style.top='69px';
    	document.getElementById('sidebar').style.top='72px';
    	document.getElementById('mainmenutable').style.height='70px';
    }
    
    </script>
    <div id="sendingmessage" style="display: none;"><b>Sending message...</b></div><script>document.getElementById('sendingmessage').style.display='none';</script><font size="+1"><b>Manage user accounts with Up2Speed</b></font> <b><font color="green"></font> <font color="red"></font></b>
    <br><br>
    <script>
    function deletepending(uniquekey){
    	document.userform.user.value=uniquekey;
    	document.userform.action='admin.php';
    	document.userform.operation.value='deletepending';
    	document.userform.submit();
    }
    function managesubmit(username,theop){
    	document.userform.user.value=username;
    	document.userform.operation.value=theop;
    	document.userform.submit();
    }
    function formsubmit(username){
    	document.userform.action="forms.php";
    	document.userform.user.value=username;
    	document.userform.submit();
    }
    function patientselect(patientid){
    	document.getElementById('patientid').value=patientid;
    //	document.getElementById('action').value='patientinfo.php';
    	document.userform.action='manage.php';
    	document.userform.submit();
    }
    function emailsubmit(patientid){
    	document.getElementById('patientid').value=patientid;
    	document.getElementById('operation').value='sendemail';
    	document.userform.action='admin.php';
    	document.userform.submit();
    }
    </script>
    <form name="userform" action="adminuser.php" method="post"><input type="hidden" name="patientid" id="patientid"><input type="hidden" name="action" id="action">
    <input type="hidden" name="user"><input type="hidden" name="operation" id="operation">
    <table width="1000" cellspacing="0" cellpadding="5" border="1">
    	<tbody><tr><td colspan="8" bgcolor="#696969"><font color="white"><b>Existing users</b></font></td></tr>
    	<tr><td align="center"></td><td></td><td align="center"><b>Name</b></td><td align="center"><b>Email</b></td>
    		<td align="center"><b>Patient ID</b></td><td align="center"><b>User Type</b></td><td align="center"><b>Delete</b></td></tr><tr bgcolor="#e1e1e1"><td align="center"></td><td></td><td width="250">Michael Sanchez</td><td width="400">docsanchezz@yahoo.com</td><td align="center"></td><td align="center">admin</td><td align="center"></td></tr><tr bgcolor="#e1e1e1"><td align="center"></td><td></td><td width="250">Admin User</td><td width="400">admin@up2.com</td><td align="center">0</td><td align="center">admin</td><td align="center"></td></tr><tr><td colspan="8" bgcolor="#696969"><font color="white"><b>Pending users</b></font></td></tr>
    	<tr><td></td><td></td><td align="center"><b>Name</b></td><td align="center"><b>Invite Email</b></td>
    	<td align="center"><b>Patient ID</b></td><td align="center"><b>Registration</b></td><td align="center"><b>Delete</b></td></tr><tr><td colspan="8">No pending users.</td></tr></tbody></table><br></form>
    <table width="1000" cellspacing="0" cellpadding="5" border="1"><tbody><tr><td colspan="5" bgcolor="#696969"><font color="white"><b>Patients without user accounts:</b></font></td></tr><tr><td>Name</td>
    	<td>Patient ID</td><td>Email</td><td>Send Invite</td></tr>
    	@foreach($records as $record)
    	<tr>
    		<td><a href="{{ route('edit',$record->id) }}">{{ $record->firstname }} {{ $record->lastname }}</a></td>
    		<td>{{ $record->id }}</td>
    		<td>{{ $record->email }}</td>
    	    <td><a href="">Email</a></td>
    	</tr>
    	@endforeach
    </tbody>
    </table>    </td></tr></tbody></table></td></tr></tbody></table>
</form>
</body>
</html>
