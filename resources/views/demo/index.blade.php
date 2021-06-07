<html><head><script>
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
<form name="encform" action="manage.php" method="post">
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
<table id="mainmenutable" style="background-color:#5f5f61;color:white;" width="100%" height="50" cellspacing="0" cellpadding="5" border="0"><tbody><tr height="50"><td width="30%">
<table style="color:white;"><tbody><tr><td width="130" valign="middle"><a href="{{ asset('demo') }}">
    <img src="{{ asset('nlimages/up2speedsmall.png') }}" style="display:inline;" width="116" height="30"></a></td><td width="50" valign="middle"><a href="logout.php">
        <img src="{{ asset('nlimages/logouticon.png') }}" width="35" height="30"></a></td><td width="50" valign="middle">
<a href="{{ route('admin') }}"><img src="{{ asset('nlimages/adminicon.png') }}" width="35" height="30"></a></td>
<td align="center">Welcome,<br>Demo User</td></tr></tbody></table></td>
<td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
<script>if(window.innerWidth<1280) document.getElementById('tdpatientvisit').style.textAlign='center';</script>
<input type="hidden" name="page" value="">
<input type="hidden" name="gotodate">
<font size="+1">Please select a patient to begin!</font></td><td width="12%" align="right"><a href="{{ route('patientportal')}}" style="color:white;font-size:18px;">Patient Portal</a></td><td style="border-left:none;" width="4%" align="right"><a href="{{ route('demo') }}?clear=true">
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
        if(onoff=='on') document.getElementById(id+'td').style.backgroundImage='url(nlimages/navbg'+coding+'on.png)';
        if(onoff=='off') document.getElementById(id+'td').style.backgroundImage='url(nlimages/navbg'+coding+'.png)';
    }
}
</script>
<table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
<tbody><tr><td>&nbsp;</td></tr><tr height="40">

<td style="background-image:url(&quot;nlimages/navbgactive.png&quot;);background-repeat:no-repeat;background-position:center;" id="age.phptd" align="center"><b><a href="manage.php" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">All Patients</div></a></b></td>
</tr><tr height="40">
<td style="background-image: url(&quot;nlimages/navbg.png&quot;); background-repeat: no-repeat; background-position: center center;" id="patient.phptd" onmouseover="changebg('patient.php','on','');" onmouseout="changebg('patient.php','off','')" align="center"><a href="{{ route('patient.create')}}" style="color:#606062;text-decoration:none;"><div style="width:100%;height:100%">New Patient</div></a></td></tr></tbody></table>
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

                                        <!--Make sure the form has the autocomplete function switched off:-->
                                <style>
                                    * { box-sizing: border-box; }
                                    .autocompletefirst {
                                    /*the container must be positioned relative:*/
                                        position: relative;
                                        display: inline-block;
                                    }
                                    .autocompletefirst-items {
                                        font: 16px Arial;
                                        position: absolute;
                                        border: 1px solid #d4d4d4;
                                        border-bottom: none;
                                        border-top: none;
                                        z-index: 99;
                                        /*position the autocomplete items to be the same width as the container:*/
                                        top: 100%;
                                        left: 0;
                                        right: 0;
                                    }
                                    .autocompletefirst-items div {
                                        font: 16px Arial;
                                        padding: 10px;
                                        cursor: pointer;
                                        background-color: #fff;
                                        border-bottom: 1px solid #d4d4d4;
                                    }
                                    .autocompletefirst-items div:hover {
                                        font: 16px Arial;
                                        /*when hovering an item:*/
                                        background-color: #e9e9e9;
                                    }
                                    .autocompletefirst-active {
                                        /*when navigating through the items using the arrow keys:*/
                                        font: 16px Arial;
                                        background-color: DodgerBlue !important;
                                        color: #ffffff;
                                    }

                                    .autocompletelast {
                                    /*the container must be positioned relative:*/
                                        position: relative;
                                        display: inline-block;
                                    }
                                    .autocompletelast-items {
                                        font: 16px Arial;
                                        position: absolute;
                                        border: 1px solid #d4d4d4;
                                        border-bottom: none;
                                        border-top: none;
                                        z-index: 99;
                                        /*position the autocompletelast items to be the same width as the container:*/
                                        top: 100%;
                                        left: 0;
                                        right: 0;
                                    }
                                    .autocompletelast-items div {
                                        font: 16px Arial;
                                        padding: 10px;
                                        cursor: pointer;
                                        background-color: #fff;
                                        border-bottom: 1px solid #d4d4d4;
                                    }
                                    .autocompletelast-items div:hover {
                                        font: 16px Arial;
                                        /*when hovering an item:*/
                                        background-color: #e9e9e9;
                                    }
                                    .autocompletelast-active {
                                        /*when navigating through the items using the arrow keys:*/
                                        font: 16px Arial;
                                        background-color: DodgerBlue !important;
                                        color: #ffffff;
                                    }
                                </style>

                                <script>
                                    function autocomplete(inp, arr,div) {
                                        /*the autocomplete function takes two arguments,
                                        the text field element and an array of possible autocompleted values:*/
                                        var currentFocus;
                                        /*execute a function when someone writes in the text field:*/
                                        inp.addEventListener("input", function(e) {
                                            var a, b, i, val = this.value;
                                            /*close any already open lists of autocompleted values*/
                                            closeAllLists();
                                            if (!val) { return false;}
                                            currentFocus = -1;
                                            /*create a DIV element that will contain the items (values):*/
                                            a = document.createElement("DIV");
                                            a.setAttribute("id", this.id + div+"-list");
                                            a.setAttribute("class", div+"-items");
                                            /*append the DIV element as a child of the autocomplete container:*/
                                            this.parentNode.appendChild(a);
                                                /*for each item in the array...*/
                                            for (i = 0; i < arr.length; i++) {
                                                /*check if the item starts with the same letters as the text field value:*/
                                                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                                                /*create a DIV element for each matching element:*/
                                                b = document.createElement("DIV");
                                                /*make the matching letters bold:*/
                                                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                                                b.innerHTML += arr[i].substr(val.length);
                                                /*insert a input field that will hold the current array item's value:*/
                                                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                                                /*execute a function when someone clicks on the item value (DIV element):*/
                                                b.addEventListener("click", function(e) {
                                                /*insert the value for the autocomplete text field:*/
                                                inp.value = this.getElementsByTagName("input")[0].value;
                                                /*close the list of autocompleted values,
                                                (or any other open lists of autocompleted values:*/
                                                closeAllLists();
                                            });
                                            a.appendChild(b);
                                        }
                                    }
                                });
                                /*execute a function presses a key on the keyboard:*/
                                inp.addEventListener("keydown", function(e) {
                                var x = document.getElementById(this.id + div+"-list");
                                    if (x) x = x.getElementsByTagName("div");
                                    if (e.keyCode == 40) {
                                    /*If the arrow DOWN key is pressed,
                                    increase the currentFocus variable:*/
                                    currentFocus++;
                                    /*and and make the current item more visible:*/
                                    addActive(x);
                                    } else if (e.keyCode == 38) { //up
                                    /*If the arrow UP key is pressed,
                                    decrease the currentFocus variable:*/
                                    currentFocus--;
                                    /*and and make the current item more visible:*/
                                    addActive(x);
                                    } else if (e.keyCode == 13) {
                                         /*If the ENTER key is pressed, prevent the form from being submitted,*/
                                        e.preventDefault();
                                        if (currentFocus > -1) {
                                            /*and simulate a click on the "active" item:*/
                                            if (x) x[currentFocus].click();
                                        }
                                    }
                                });
                                function addActive(x) {
                                    /*a function to classify an item as "active":*/
                                    if (!x) return false;
                                    /*start by removing the "active" class on all items:*/
                                    removeActive(x);
                                    if (currentFocus >= x.length) currentFocus = 0;
                                    if (currentFocus < 0) currentFocus = (x.length - 1);
                                        /*add class "autocomplete-active":*/
                                    x[currentFocus].classList.add(div+"-active");
                                }
                                function removeActive(x) {
                                    /*a function to remove the "active" class from all autocomplete items:*/
                                    for (var i = 0; i < x.length; i++) {
                                        x[i].classList.remove(div+"-active");
                                    }
                                }
                                function closeAllLists(elmnt) {
                                        /*close all autocomplete lists in the document,
                                        except the one passed as an argument:*/
                                    var x = document.getElementsByClassName(div+"-items");
                                        for (var i = 0; i < x.length; i++) {
                                            if (elmnt != x[i] && elmnt != inp) {
                                                 x[i].parentNode.removeChild(x[i]);
                                            }
                                        }
                                    }
                                    /*execute a function when someone clicks in the document:*/
                                    document.addEventListener("click", function (e) {
                                        closeAllLists(e.target);
                                    });
                                }
                                </script>
                                <script>
                                    function formsubmit(patientid,theaction){
                                        document.getElementById('patientid').value=patientid;
                                        if(theaction!=null) document.getElementById('action').value=theaction;
                                        document.form.submit();
                                    }
                                    function showfilter(){
                                        if(document.getElementById('filterdiv').style.display=='block')
                                        document.getElementById('filterdiv').style.display='none';
                                        else if(document.getElementById('filterdiv').style.display=='none')
                                        document.getElementById('filterdiv').style.display='block';
                                    }
                                    function encountersubmit(patientid,date,action){
                                        document.getElementById('patientid').value="";
                                        document.getElementById('encounterdate').value=date;
                                        document.getElementById('action').value=action;
                                        document.form.submit();
                                    }
                                    function newencountersubmit(){
                                        if(document.form.patientselect.value!=""){
                                            document.getElementById('patientid').value=document.form.patientselect.value;
                                            document.getElementById('newencounter').value='true';
                                            document.form.submit();
                                        }
                                        else window.alert('Please select a patient!');
                                        }
                                        function showhide(id){
                                            if(document.getElementById('encounter'+id).style.display=='block'){
                                                document.getElementById('encounter'+id).style.display='none';
                                                document.getElementById('img'+id).src='images/plus.png';
                                                document.getElementById('selectedpatients').value=document.getElementById('selectedpatients').value.replace(id+'%SE%','');
                                            }
                                            else if(document.getElementById('encounter'+id).style.display=='none'){
                                                document.getElementById('encounter'+id).style.display='block';
                                                document.getElementById('img'+id).src='images/minus.png';
                                                document.getElementById('selectedpatients').value+=id+'%SE%';
                                            }
                                        }
                                        function showall(){
                                            for(var i=0;i<patientids.length;i++){
                                                document.getElementById('encounter'+patientids[i]).style.display='block';
                                                document.getElementById('img'+patientids[i]).src='images/minus.png';
                                                document.getElementById('selectedpatients').value+=patientids[i]+'%SE%';
                                            }
                                        }
                                        function hideall(){
                                            for(var i=0;i<patientids.length;i++){
                                                document.getElementById('encounter'+patientids[i]).style.display='none';
                                                document.getElementById('img'+patientids[i]).src='images/plus.png';
                                                document.getElementById('selectedpatients').value='';
                                            }
                                        }

                                function printsubmit(){
                                    document.form.action="?print=true";
                                        document.form.submit();
                                }
                            </script>
                            <center>
                                <hr>
                                <table width="80%">
                                    <tbody>
                                        <tr>
                                            <td width="50%"><font size="+2">All Patients</font>
                                            </td>
                                            <td width="50%" align="right">
                                                <table class="no-print">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <a href="{{ route('patient.create')}}">
                                                                    <img src="{{ asset('nlimages/newpatient.png') }}" height="30"><br><br>New<br>Patient</a>
                                                            </td>
                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="center">
                                                                <a href="javascript:newencountersubmit();">
                                                                    <img src="{{ asset('nlimages/newvisit.png') }}" height="30"><br><br>New<br>Visit
                                                                </a>
                                                            </td>
                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </td><td align="center">
                                                                <a href="javascript:showfilter();">
                                                                    <img src="{{ asset('nlimages/eye.png') }}" height="30"><br><br>Filter<br><br>
                                                                </a>
                                                            </td>
                                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                            <td align="center">
                                                                <a href="javascript:window.print()">
                                                                    <img src="{{ asset('nlimages/print.png') }}" height="30"><br><br>Print<br>
                                                                    <br>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                            </center>
                            <br>
                            <div id="filterdiv" style="display:none">
                                <form action="{{ route('search') }}"  autocomplete="off" name="manageform" method="get">
                                    @csrf
                                    <input type="hidden" name="filter" value="Filter">
                                        <center>
                                            <table width="80%" cellpadding="10" bgcolor="#f1f1f1">
                                                <tbody>
                                                    <tr>
                                                        <td width="100%">
                                                            <b>Filter By:</b><br><br>
                                                            <table width="100%" cellpadding="5">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <strong>Patient:</strong>
                                                                        </td>
                                                                        <td>First Name:
                                                                            <div class="autocompletefirst">
                                                                                <input id="firstname" type="text" name="firstname" value="">
                                                                            </div>
                                                                        </td>
                                                                        <td>Last Name:
                                                                            <div class="autocompletelast">

                                                                                <input id="lastname" type="text" name="lastname" value="">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <input type="image" alt="Filter" src="{{ asset('nlimages/filterbutton.png') }}">
                                                                        </td>
                                                                    </tr>
                                                                <tr>
                                                                    <td><strong>Show Only:</strong>
                                                                    </td>
                                                                    <td colspan="2"><input type="radio" name="showonly" value="cash"> Cash Patients
                                                                    <input type="radio" name="showonly" value="insurance"> Insurance Patients
                                                                    <input type="radio" name="showonly" value="pi"> PI Patients
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Visit:</strong>
                                                                </td>
                                                                <td>Date:
                                                                    <select name="datemonth">
                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8" selected="">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                                                                    </select>
                                                                    <select name="dateday">
                                                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9" selected="">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
                                                                    </select>
                                                                    <select name="dateyear"><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020" selected="">2020</option></select></td><td><b>Select range:</b> <input type="radio" name="selectrange" value="visits" checked=""> Visits <input type="radio" name="selectrange" value="lastaccessed"> Last accessed
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>Select Dates: <select name="onor"><option value="All" selected="">All</option><option value="On">On</option><option value="On or Before">On or Before</option><option value="On or After">On or After</option></select>
</td><td><table><tbody><tr><td></td><td><input type="radio" name="last" value="Today"> Today</td><td><input type="radio" name="last" value="Yesterday"> Yesterday </td></tr>
<tr><td>Last:</td><td><input type="radio" name="last" value="3 Days"> 3 Days</td><td><input type="radio" name="last" value="Week"> Week</td><td><input type="radio" name="last" value="Month"> Month</td>
</tr></tbody></table> </td></tr></tbody></table>
</td></tr></tbody></table><br>
</center></form></div>
<center><table class="no-print" width="80%"><tbody><tr><td>Select a patient to view data, or select an option to jump to that section: <br> <br>
<script>
function submitsort(){
    if(""!="Filter")
    document.manageform.filter.value='';
    document.manageform.submit();
}
function submitdefault(thedefault){
    document.manageform.changedefault.value=thedefault;
    document.manageform.submit();

}
</script>
<input type="hidden" name="changedefault">
Sort by: <select name="sortby" onchange="javascript:submitsort();" id="sortby">
<option value="lastname">Last Name</option>
<option value="firstname">First Name</option>
<option value="created">Recently Created</option>
<option value="accessed" selected="">Recently Accessed</option></select>
<a href="javascript:submitdefault('accessed');">Make default view</a><br><br>
</td></tr></tbody></table></center><br>
<form name="form" action=""  autocomplete="off">
<input type="hidden" name="" id="" value="">
<input type="hidden" name="" id="">
<input type="hidden" name="" id="">
<input type="hidden" name="" id="">
<input type="hidden" name="" >
<input type="hidden" name="">
<input type="hidden" name="">
<input type="hidden" name="" id="" value="">
<center>
	@if ($message = Session::get('success'))
	   <div class="alert alert-success alert-block" style="width: 35%;">
	       <button type="button" class="close" data-dismiss="alert">×</button>
	       <strong>{{ $message }}</strong>
        </div>
    @endif
<table style="border-top:2px solid #999494;border-bottom:2px solid #999494;" width="80%" cellspacing="0" cellpadding="10">
<tbody><tr><td colspan="2" width="7%" align="center"></td><td width="73%"><b>Patient Name</b></td><td class="no-print" width="10%" align="center"><b>Shortcuts</b></td><td class="no-print" width="10%" align="center"><b>Delete</b></td></tr>
</tbody></table>
<script>
function showphoto(i){
    document.getElementById('photo'+i).style.display='block';
}
function hidephoto(i){
    document.getElementById('photo'+i).style.display='none';
}
function showpayment(i){
    document.getElementById('payment'+i).style.display='block';
}
function hidepayment(i){
    document.getElementById('payment'+i).style.display='none';
}
</script>

@foreach($records as $index => $record)
<table style="border-top:1px solid black ;" width="80%" cellspacing="0" cellpadding="0" class="alternate_color" >

    @if ($index % 2 == 0)
    <tbody><tr height="25" bgcolor="#d2d2d0">
    @else
    <tbody><tr height="25" bgcolor="#FFFFFF">
    @endif
    <td width="2%" align="center"><input type="radio" name="patientselect" value="1" class="no-print"></td>
    <td width="6%" align="center"><table><tbody><tr height="20"><td style="padding-top:0px;padding-bottom:0px;" width="25" align="center"></td><td style="padding-top:0px;padding-bottom:0px;" width="25"></td></tr></tbody></table></td>
    <td width="72%" valign="middle"><a href="javascript:showhide('1');" style="text-decoration:none;color:black">
    <img src="{{ asset('assets/front/images/plus.png') }}" id="img1" class="no-print"> {{ $record->lastname }} ,{{ $record->firstname }}</a></td>
    <td width="10%" align="center">
        <a href="{{ route('patient.edit',$record->id) }}"><img src="{{ asset('nlimages/patienticon.png') }}"></a>
    </td>

            <td width="10%" align="center">
                <a href="{{URL::to('/delete/'.$record->id) }}" onclick="return confirm('Are you sure you want to delete this patient?');"><img src="{{ asset('nlimages/delete.png') }}"></a>
                @csrf
                @method('DELETE')

    </td></tr></tbody>

    @endforeach
</table></div></center><br>
<script>var patientids=[];
</script>
<center><table class="no-print" width="80%"><tbody><tr><td width="100%" align="right">
    <img src="{{ asset('nlimages/showallbutton.png') }}" onclick="javascript:showall()"> <img src="{{ asset('nlimages/hideallbutton.png') }}" onclick="javascript:hideall()"></td></tr></tbody></table></center>


    </form></td></tr></tbody></table></td></tr></tbody></table>
</form>

<style type="text/css">
    .button {

    background: transparent;
    border: none !important;
    font-size:0;
}
</style>

</body></html>
