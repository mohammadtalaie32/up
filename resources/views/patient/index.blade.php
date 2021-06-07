<!DOCTYPE html>
<html lang="en">

<head>
    @csrf
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Up2Speed</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script>
        $(function() {
            csrf = $('input[name ="_token"]').val();
        });

    </script>
    <script src="{{ asset('js/functions.js') }}"></script>
   </head>

<body class="font" style="margin:0;padding:0;">
{{-- Navigation Bar --}}
<div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
    <table id="mainmenutable"
           style="background-color:#5f5f61;color:white;background-image:url('nlimages/headerbg.png');background-repeat:repeat-x;"
           width="100%" height="50" cellspacing="0" cellpadding="5" border="0">
        <tbody>
        <tr height="50">
            <td style="padding:0px;" width="30%">
                <table style="color:white;">
                    <tbody>
                    <tr style="padding:0px;">
                        <td style="padding:0px;" width="150" valign="middle" align="center"><a
                                    href="{{ route('patient') }}">
                                <img src="{{ asset('/nlimages/up2speedsmall.png') }}"
                                     style="display:inline;" height="50"></a></td>
                        <td width="20"></td>
                        <td width="50" valign="middle" align="left">
                            <a href="{{ route('logout') }}">
                                <img src="{{ asset('/nlimages/logouticon.png') }}" height="60"></a>
                        </td>
                        <td width="50" valign="middle" align="left">
                            <a href="{{ route('admin') }}"><img src="{{ asset('/nlimages/adminicon.png') }}"
                                                                height="60"></a>
                        </td>
                        <td width="300" align="center">
                            Welcome,
                            @auth
                                <br>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                            @endauth
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>

            <td style="border-right:none;" id="tdpatientvisit" width="50%" valign="middle" align="center">
                <input type="hidden" name="page" value="">
                <input type="hidden" name="gotodate">
                <input type="hidden" name="encounterviewyear">
                <input type="hidden" name="markbilling">
                <form name="headerform" action="" method="" style="display:inline">
                    <font size="+1">Please select a patient to begin!</font>&nbsp;&nbsp;&nbsp;
                    <select
                            name="patientid" id="headerpatientid" style="width:150px" onchange="goToManage(event);">
                        <option value="" selected="">Select...</option>
                        @foreach ($starPriority as $sp1)
                            @foreach ($sp1 as $rec)
                                <option value="{{ $rec->id }}">
                                    {{ $rec->firstname }}, {{ $rec->lastname }} <br>
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                </form>
            </td>
            <td width="12%" align="right">
                <a href="{{ route('portalhome') }}" style="color:white;font-size:18px;">
                    <img src="{{ asset('/nlimages/patientportal.png') }}" style="display:inline;" width="65">
                </a>
            </td>
        </tr>
        <tr style="height:2px;" bgcolor="#ce0205">
            <td colspan="4" style="height:2px;padding:0px;" width="100%"></td>
        </tr>
        </tbody>
    </table>
</div>

{{-- spacer --}}
<table height="77">
    <tbody>
    <tr>
        <td><img src="{{ asset('/images/spacer.png') }}" height="77"></td>
    </tr>
    </tbody>
</table>

{{-- main content and sidebar --}}
<table width="100%" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
        {{-- Sidebar menu --}}
        <td width="238" valign="top" bgcolor="#f1f1f1">
            <img src="{{ asset('/images/spacer.png') }}" width="238" height="1">
            <div id="sidebar"
                 style="position:fixed;top:0px;left:0px;width:238px;height:100%;background-color:#f1f1f1;overflow-y:auto;overflow-x:hidden;">
                <div style="position:relative;height:77px;"></div>
                <table style="background-color:#f1f1f1;" width="238" cellspacing="0" cellpadding="5" border="0">
                    <tbody>

                   <tr style="background-color:#d9d9d9;">
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
                                    </td>
                                    <td style="width:50px;padding:0px;" valign="middle" align="center">
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" align="center"><a
                                                style="color:black;text-decoration:none;"
                                                href="newpatient.php?print=true">PRINT</a></td>
                                    <td style="padding:0px;" valign="top" align="center"></td>
                                    <td valign="top" align="center"></td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr height="35">
                        <td class="side-link active "
                            id="age.phptd" onmouseover="changebg('age.php','on','patient');"
                            onmouseout="changebg('age.php','off','patient')" align="center">
                            <b>
                            <a href="{{ route('patient') }}" style="color:black;text-decoration:none;">
                                <div style="width:100%;height:100%">All Patients</div>
                            </a>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr height="35">
                        <td class="side-link"
                            id="patient.phptd" align="center"><a href="{{ route('newpatient') }}"
                                                                    style="color:black;text-decoration:none;">
                                    <div style="width:100%;height:100%">New Patient</div>
                                </a></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr height="35">
                        <td class="side-link @if(Route::current()->getName() == 'scheduler') active @endif"
                            id="eduler.phptd" onmouseover="changebg('eduler.php','on','patient');"
                            onmouseout="changebg('eduler.php','off','patient')" align="center"><a
                                    href="{{ route('scheduler') }}" style="color:black;text-decoration:none;">
                                <div style="width:100%;height:100%">Scheduler</div>
                            </a></td>
                    </tr>
                    </tbody>
                </table>


            </div>
        </td>



        {{-- Main content --}}
        <td id="viewport" width="100%" valign="top" align="left">
            <div class="alert alert-light shadow-lg fixed-top alert-dismissible fade show"
                 style="top:25px;left:35%;right:20%;display:none;z-index:5" id="alertDiv" role="alert">
                <span id="billAlert"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="encform" action="" method="">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td id="viewport" width="100%" valign="top" align="left">
                            <table width="100%" cellpadding="10">
                                <tbody>
                                <tr>
                                    <td width="100%" valign="top">
                                        <script>
                                            function formsubmit(patientid, theaction) {
                                                document.getElementById('patientid').value = patientid;
                                                if (theaction != null) document.getElementById('action').value =
                                                    theaction;
                                                document.form.submit();
                                            }

                                            function showfilter() {
                                                if (document.getElementById('filterdiv').style.display == 'block')
                                                    document.getElementById('filterdiv').style.display = 'none';
                                                else if (document.getElementById('filterdiv').style.display == 'none')
                                                    document.getElementById('filterdiv').style.display = 'block';
                                            }

                                            function encountersubmit(patientid, date, action) {
                                                // document.getElementById('patientid').value = patientid;
                                                // document.getElementById('encounterdate').value = date;
                                                // document.getElementById('action').value = action;
                                                //document.form.submit();
                                            }

                                            function newencountersubmit() {
                                                if (document.form.patientselect.value != "") {
                                                    document.getElementById('patientid').value = document.form
                                                        .patientselect.value;
                                                    document.getElementById('newencounter').value = 'true';
                                                    document.form.submit();
                                                } else
                                                    window.alert('Please select a patient!');
                                            }

                                            function showhide(id, phone = '') {
                                                if (document.getElementById('encounter' + id).style.display ==
                                                    'block') {
                                                    document.getElementById('encounter' + id).style.display = 'none';
                                                    document.getElementById('img' + id).src = 'images/plus.png';
                                                    document.getElementById('selectedpatients').value = document
                                                        .getElementById('selectedpatients').value.replace(id + '%SE%',
                                                            '');
                                                } else if (document.getElementById('encounter' + id).style.display ==
                                                    'none') {
                                                    document.getElementById('encounter' + id).style.display = 'block';
                                                    document.getElementById('img' + id).src =
                                                        'images/minus.png';
                                                    document.getElementById('selectedpatients').value += id + '%SE%';
                                                }
                                            }

                                            function showall() {
                                                for (var i = 0; i < patientids.length; i++) {
                                                    document.getElementById('encounter' + patientids[i]).style.display =
                                                        'block';
                                                    document.getElementById('img' + patientids[i]).src =
                                                        'images/minus.png';
                                                    document.getElementById('selectedpatients').value += patientids[i] +
                                                        '%SE%';
                                                }
                                            }

                                            function hideall() {
                                                for (var i = 0; i < patientids.length; i++) {
                                                    document.getElementById('encounter' + patientids[i]).style.display =
                                                        'none';
                                                    document.getElementById('img' + patientids[i]).src =
                                                        'images/plus.png';
                                                    document.getElementById('selectedpatients').value = '';
                                                }
                                            }

                                            function deletevisit(patientid, encounterdate) {
                                                if (window.confirm(
                                                    'Are you sure you want to delete all record for the visit on ' +
                                                    encounterdate + '?')) {
                                                    document.form.patientid.value = patientid;
                                                    document.form.encounterdate.value = encounterdate;
                                                    document.form.deleteencounter.value = "true";
                                                    document.form.submit();
                                                }
                                            }

                                            function printsubmit() {
                                                document.form.action = "?print=true";
                                                document.form.submit();
                                            }

                                        </script>
                                        <center>
                                            <hr>
                                            <table width="80%">
                                                <tbody>
                                                <tr>
                                                    <td width="50%">
                                                        <font size="+2">All Patients</font>
                                                    </td>
                                                    <td width="50%" align="right">
                                                        <table class="no-print">
                                                            <tbody>
                                                            <tr>
                                                                <td align="center"><a
                                                                            href="{{ route('newpatient') }}">
                                                                        <img src="{{ asset('nlimages/newpatient.png') }}"
                                                                             height="50"><br><br>New Patient</a>
                                                                </td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </td>
                                                                <td align="center"><a
                                                                            href="">
                                                                        <img src="{{ asset('nlimages/newvisit.png') }}"
                                                                             height="50"><br><br>New Visit</a>
                                                                </td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </td>
                                                                <td align="center"><a
                                                                            href="javascript:printsubmit();"><img
                                                                                src="{{ asset('nlimages/printicon.png') }}"
                                                                                height="50"><br><br>Print</a></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                        </center><br>
                                        <div id="filterdiv" style="display:block">
                                            <form action="" method="" autocomplete="off" name="manageform">
                                                <input type="hidden" name="patientid">
                                                <input type="hidden" name="filterpatient">
                                                <input type="hidden" name="starshowfirst" value="">
                                                <input type="hidden" name="phoneshowfirst" value="">
                                                <input type="hidden" name="filter" value="Filter">
                                                <center>
                                                    <table width="80%" cellpadding="10" bgcolor="#f1f1f1">
                                                        <tbody>
                                                        <tr>
                                                            <td width="100%">
                                                                <b>Filter By:</b><br><br>
                                                                <table width="100%">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <table width="100%" cellpadding="5">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td><strong>Patient:</strong>
                                                                                    </td>
                                                                                    <td>First Name:
                                                                                        <div
                                                                                                class="autocompletefirst">
                                                                                            <input
                                                                                                    id="firstname"
                                                                                                    type="text"
                                                                                                    name="firstname"
                                                                                                    value="{{Request::get('firstname')}}">
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>Last Name:
                                                                                        <div
                                                                                                class="autocompletelast">

                                                                                            <input
                                                                                                    id="lastname"
                                                                                                    type="text"
                                                                                                    name="lastname"
                                                                                                    value="{{Request::get('lastname')}}">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><strong>Show
                                                                                            Only:</strong>
                                                                                    </td>
                                                                                    <td colspan="2">
                                                                                        <input type="radio" name="showonly" value="cash" @if(Request::input('showonly') == 'cash') checked @endif>Cash Patients </input>

                                                                                        <input type="radio" name="showonly" value="insurance" @if(Request::input('showonly') == 'insurance') checked @endif>Insurance Patients</input>

                                                                                        <input type="radio" name="showonly" value="pi" @if(Request::input('showonly') == 'pi') checked @endif> PI Patients</input>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><strong>Visit:</strong>
                                                                                    </td>
                                                                                    <td>Date:
                                                                                        <select
                                                                                                name="datemonth">
                                                                                            <option @if(Request::input('datemonth') == 1) selected @endif
                                                                                                    value="1">1
                                                                                            </option>
                                                                                            <option @if(Request::input('datemonth') == 2) selected @endif
                                                                                                    value="2">2
                                                                                            </option>
                                                                                            <option @if(Request::input('datemonth') == 3) selected @endif
                                                                                                    value="3">3
                                                                                            </option>
                                                                                            <option @if(Request::input('datemonth') == 4) selected @endif
                                                                                                    value="4">4
                                                                                            </option>
                                                                                            <option @if(Request::input('datemonth') == 5) selected @endif
                                                                                                    value="5">5
                                                                                            </option>
                                                                                            <option @if(Request::input('datemonth') == 6) selected @endif
                                                                                                    value="6">6
                                                                                            </option>
                                                                                            <option @if(Request::input('datemonth') == 7) selected @endif
                                                                                                    value="7">7
                                                                                            </option>
                                                                                            <option @if(Request::input('datemonth') == 8) selected @endif
                                                                                                    value="8"
                                                                                                    >
                                                                                                8</option>
                                                                                            <option @if(Request::input('datemonth') == 9) selected @endif
                                                                                                    value="9">9
                                                                                            </option>
                                                                                            <option @if(Request::input('datemonth') == 10) selected @endif
                                                                                                    value="10">
                                                                                                10</option>
                                                                                            <option @if(Request::input('datemonth') == 11) selected @endif
                                                                                                    value="11">
                                                                                                11</option>
                                                                                            <option @if(Request::input('datemonth') == 12) selected @endif
                                                                                                    value="12">
                                                                                                12</option>
                                                                                        </select>
                                                                                        <select
                                                                                                name="dateday">
                                                                                            <option @if(Request::input('dateday') == 1) selected @endif
                                                                                                    value="1">1
                                                                                            </option>
                                                                                            <option @if(Request::input('dateday') == 2) selected @endif
                                                                                                    value="2">2
                                                                                            </option>
                                                                                            <option @if(Request::input('dateday') == 3) selected @endif
                                                                                                    value="3">3
                                                                                            </option>
                                                                                            <option @if(Request::input('dateday') == 4) selected @endif
                                                                                                    value="4">4
                                                                                            </option>
                                                                                            <option @if(Request::input('dateday') == 5) selected @endif
                                                                                                    value="5">5
                                                                                            </option>
                                                                                            <option @if(Request::input('dateday') == 6) selected @endif
                                                                                                    value="6">6
                                                                                            </option>
                                                                                            <option @if(Request::input('dateday') == 7) selected @endif
                                                                                                    value="7">7
                                                                                            </option>
                                                                                            <option @if(Request::input('dateday') == 8) selected @endif
                                                                                                    value="8">8
                                                                                            </option>
                                                                                            <option @if(Request::input('dateday') == 9) selected @endif
                                                                                                    value="9">9
                                                                                            </option>
                                                                                            <option @if(Request::input('dateday') == 10) selected @endif
                                                                                                    value="10">
                                                                                                10</option>
                                                                                            <option @if(Request::input('dateday') == 11) selected @endif
                                                                                                    value="11">
                                                                                                11</option>
                                                                                            <option @if(Request::input('dateday') == 12) selected @endif
                                                                                                    value="12">
                                                                                                12</option>
                                                                                            <option @if(Request::input('dateday') == 13) selected @endif
                                                                                                    value="13">
                                                                                                13</option>
                                                                                            <option @if(Request::input('dateday') == 14) selected @endif
                                                                                                    value="14">
                                                                                                14</option>
                                                                                            <option @if(Request::input('dateday') == 15) selected @endif
                                                                                                    value="15">
                                                                                                15</option>
                                                                                            <option @if(Request::input('dateday') == 16) selected @endif
                                                                                                    value="16">
                                                                                                16</option>
                                                                                            <option @if(Request::input('dateday') == 17) selected @endif
                                                                                                    value="17">
                                                                                                17</option>
                                                                                            <option @if(Request::input('dateday') == 18) selected @endif
                                                                                                    value="18">
                                                                                                18</option>
                                                                                            <option @if(Request::input('dateday') == 19) selected @endif
                                                                                                    value="19">
                                                                                                19</option>
                                                                                            <option @if(Request::input('dateday') == 20) selected @endif
                                                                                                    value="20">
                                                                                                20</option>
                                                                                            <option @if(Request::input('dateday') == 21) selected @endif
                                                                                                    value="21">
                                                                                                21</option>
                                                                                            <option @if(Request::input('dateday') == 22) selected @endif
                                                                                                    value="22">
                                                                                                22</option>
                                                                                            <option @if(Request::input('dateday') == 23) selected @endif
                                                                                                    value="23">
                                                                                                23</option>
                                                                                            <option @if(Request::input('dateday') == 24) selected @endif
                                                                                                    value="24">
                                                                                                24</option>
                                                                                            <option @if(Request::input('dateday') == 25) selected @endif
                                                                                                    value="25">
                                                                                                25</option>
                                                                                            <option @if(Request::input('dateday') == 26) selected @endif
                                                                                                    value="26">
                                                                                                26</option>
                                                                                            <option @if(Request::input('dateday') == 27) selected @endif
                                                                                                    value="27"
                                                                                                    >
                                                                                                27</option>
                                                                                            <option @if(Request::input('dateday') == 28) selected @endif
                                                                                                    value="28">
                                                                                                28</option>
                                                                                            <option @if(Request::input('dateday') == 29) selected @endif
                                                                                                    value="29">
                                                                                                29</option>
                                                                                            <option @if(Request::input('dateday') == 30) selected @endif
                                                                                                    value="30">
                                                                                                30</option>
                                                                                            <option @if(Request::input('dateday') == 31) selected @endif
                                                                                                    value="31">
                                                                                                31</option>
                                                                                        </select>
                                                                                        <select
                                                                                                name="dateyear">
                                                                                            <option  @if(Request::input('dateyear') == 2015) selected @endif
                                                                                                    value="2015">
                                                                                                2015
                                                                                            </option>
                                                                                            <option @if(Request::input('dateyear') == 2016) selected @endif
                                                                                                    value="2016">
                                                                                                2016
                                                                                            </option>
                                                                                            <option @if(Request::input('dateyear') == 2017) selected @endif
                                                                                                    value="2017">
                                                                                                2017
                                                                                            </option>
                                                                                            <option @if(Request::input('dateyear') == 2018) selected @endif
                                                                                                    value="2018">
                                                                                                2018
                                                                                            </option>
                                                                                            <option @if(Request::input('dateyear') == 2019) selected @endif
                                                                                                    value="2019">
                                                                                                2019
                                                                                            </option>
                                                                                            <option @if(Request::input('dateyear') == 2020) selected @endif
                                                                                                    value="2020"
                                                                                                        >
                                                                                                2020
                                                                                            </option>
                                                                                            <option @if(Request::input('dateyear') == 2021) selected @endif
                                                                                                    value="2021"
                                                                                                        >
                                                                                                2021
                                                                                            </option>
                                                                                            <option @if(Request::input('dateyear') == 2022) selected @endif
                                                                                                    value="2022"
                                                                                                        >
                                                                                                2022
                                                                                            </option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td><b>Select range:</b>
                                                                                        <input type="radio" name="selectrange" value="visits" @if(Request::input('selectrange') != 'lastaccessed') checked @endif>Visits</input>
                                                                                        <input type="radio" name="selectrange" value="lastaccessed" @if(Request::input('selectrange') == 'lastaccessed') checked @endif>Last accessed</input>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td>
                                                                                        Select Dates:
                                                                                        <select name="onor">
                                                                                            <option value="All">All</option>
                                                                                            <option value="On" @if(Request::get('onor') == 'On') selected @endif>On</option>
                                                                                            <option value="On or Before" @if(Request::get('onor') == 'On or Before') selected @endif>On or Before</option>
                                                                                            <option value="On or After" @if(Request::get('onor') == 'On or After') selected @endif>On or After</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table>
                                                                                            <tbody>
                                                                                            <tr>
                                                                                                <td>
                                                                                                </td>
                                                                                                <td><input
                                                                                                        @if(Request::get('last') == 'Today') checked @endif
                                                                                                            type="radio"
                                                                                                            name="last"
                                                                                                            value="Today">
                                                                                                    Today
                                                                                                </td>
                                                                                                <td><input  @if(Request::get('last') == 'Yesterday') checked @endif
                                                                                                            type="radio"
                                                                                                            name="last"
                                                                                                            value="Yesterday">
                                                                                                    Yesterday
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Last:
                                                                                                </td>
                                                                                                <td><input
                                                                                                        @if(Request::get('last') == '3 Days') checked @endif
                                                                                                            type="radio"
                                                                                                            name="last"
                                                                                                            value="3 Days">
                                                                                                    3
                                                                                                    Days
                                                                                                </td>
                                                                                                <td><input @if(Request::get('last') == 'Week') checked @endif
                                                                                                            type="radio"
                                                                                                            name="last"
                                                                                                            value="Week">
                                                                                                    Week
                                                                                                </td>
                                                                                                <td><input @if(Request::get('last') == 'Month') checked @endif
                                                                                                            type="radio"
                                                                                                            name="last"
                                                                                                            value="Month">
                                                                                                    Month
                                                                                                </td>
                                                                                            </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td valign="top" align="center">
                                                                            <br><input type="image" alt="Filter"
                                                                                       src="{{ asset('nlimages/filterbutton.png') }}"
                                                                                       width="101">
                                                                            <br>
                                                                            <a href="{{ url('/patient') }}" class="btn btn-primary" >Clear Filter</a>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table><br>
                                                </center>
                                            </form>
                                        </div>
                                        <center>
                                            <table class="no-print" width="80%">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        Select a patient to view record, or select an option to jump
                                                        to that section: <br> <br>
                                                        <script>
                                                            function submitsort() {
                                                                if ("" != "Filter")
                                                                    document.manageform.filter.value = '';
                                                                document.manageform.submit();
                                                            }

                                                            function submitdefault(thedefault) {
                                                                document.manageform.changedefault.value = thedefault;
                                                                document.manageform.submit();

                                                            }

                                                        </script>
                                                        <input type="hidden" name="changedefault">
                                                        <table>
                                                            <tbody>
                                                            <tr>
                                                                <td>Sort by:
                                                                    <select name="sortby" onchange="javascript:submitsort();" id="sortby">
                                                                        <option value="lastname" @if(Request::get('sortby') == 'lastname') selected @endif>
                                                                            Last Name</option>
                                                                        <option value="firstname" @if(Request::get('sortby') == 'firstname') selected @endif>First Name
                                                                        </option>
                                                                        <option value="created" @if(Request::get('sortby') == 'created') selected @endif>Recently Created
                                                                        </option>
                                                                        <option value="accessed" @if(Request::get('sortby') == 'accessed') selected @endif>Recently
                                                                            Accessed</option>
                                                                        <option value="cash" @if(Request::get('sortby') == 'cash') selected @endif>Cash Patients
                                                                        </option>
                                                                        <option value="insurance" @if(Request::get('sortby') == 'insurance') selected @endif>Insurance
                                                                            Patients</option>
                                                                        <option value="piwc" @if(Request::get('sortby') == 'piwc') selected @endif>PI / WC Patients
                                                                        </option>
                                                                    </select>
                                                                    (Default View)
                                                                </td>
                                                                <td>
                                                                    <div id="showbillingpayment"
                                                                         style="display: block;"><input
                                                                                type="radio" name="showbillpay"
                                                                                id="showall"
                                                                                onclick="filterbillpay();"
                                                                                checked=""> Show All
                                                                        <strong>Billing</strong>: <input
                                                                                type="radio" name="showbillpay"
                                                                                id="showincomplete"
                                                                                onclick="filterbillpay();">
                                                                        Incomplete <input type="radio"
                                                                                          name="showbillpay" id="showready"
                                                                                          onclick="filterbillpay();"> Ready
                                                                        <input type="radio" name="showbillpay"
                                                                               id="showcomplete"
                                                                               onclick="filterbillpay();"> Complete
                                                                        <strong>Payment</strong>: <input
                                                                                type="radio" name="showbillpay"
                                                                                id="showwaiting"
                                                                                onclick="filterbillpay();"> Waiting
                                                                        <input type="radio" name="showbillpay"
                                                                               id="showpartial"
                                                                               onclick="filterbillpay();"> Partial
                                                                        <input type="radio" name="showbillpay"
                                                                               id="showfull"
                                                                               onclick="filterbillpay();"> Full
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </center><br>
                                        <form name="form" action="" method="" autocomplete="off"
                                              onsubmit="javascript:submitStar();bpsubmit();phonesubmit();">
                                            <input type="hidden" name="passfilterpatient" value="">
                                            <input type="hidden" name="passfirstname" value="">
                                            <input type="hidden" name="passlastname" value="">
                                            <input type="hidden" name="starpid" id="starpid">
                                            <input type="hidden" name="staronoff">
                                            <input type="hidden" name="starpriority">
                                            <input type="hidden" name="starnotes">
                                            <input type="hidden" name="billpayuniquekey">
                                            <input type="hidden" name="billorpay">
                                            <input type="hidden" name="billpaystatus">
                                            <input type="hidden" name="billingstatus" id="billingstatus"><input
                                                    type="hidden" name="paymentstatus" id="paymentstatus"><input
                                                    type="hidden" name="billingclaimnumber" id="billingclaimnumber"><input
                                                    type="hidden" name="billingdatesent" id="billingdatesent"><input
                                                    type="hidden" name="billingamount" id="billingamount"><input
                                                    type="hidden" name="billingnotes" id="billingnotes"><input type="hidden"
                                                                                                               name="billingdeductible" id="billingdeductible"><input type="hidden"
                                                                                                                                                                      name="billingpaid" id="billingpaid"><input type="hidden"
                                                                                                                                                                                                                 name="paymentnotes" id="paymentnotes"><input type="hidden"
                                                                                                                                                                                                                                                              name="phonecall" id="phonecall"><input type="hidden"
                                                                                                                                                                                                                                                                                                     name="phonecalldate" id="phonecalldate"><input type="hidden"
                                                                                                                                                                                                                                                                                                                                                    name="phonecalltime" id="phonecalltime"><input type="hidden"
                                                                                                                                                                                                                                                                                                                                                                                                   name="phonecallnumber" id="phonecallnumber"><input type="hidden"
                                                                                                                                                                                                                                                                                                                                                                                                                                                      name="phonecallemail" id="phonecallemail"><input type="hidden"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       name="phonecallnotes" id="phonecallnotes"><input type="hidden"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        name="selectedpatients" id="selectedpatients">
                                            <input type="hidden" name="patientid" id="patientid">
                                            <input type="hidden" name="encounterdate" id="encounterdate">
                                            <input type="hidden" name="newencounter" id="newencounter">
                                            <input type="hidden" name="action" id="action">
                                            <input type="hidden" name="deletepatient">
                                            <input type="hidden" name="deleteencounter">
                                            <input type="hidden" name="sortby" id="formsortby" value="lastname">
                                            <input type="hidden" name="markphone" id="markphone">
                                            <input type="hidden" name="markphonestatus" id="markphonestatus">
                                            <input type="hidden" name="markonly" id="markonly">
                                            <center>
                                                <script>
                                                    function starfirstsubmit(yn) {
                                                        document.manageform.starshowfirst.value = yn;
                                                        document.manageform.submit();
                                                    }

                                                    function phonefirstsubmit(yn) {
                                                        document.manageform.phoneshowfirst.value = yn;
                                                        document.manageform.submit();
                                                    }

                                                </script>
                                                <table
                                                        style="border-top:2px solid #999494;border-bottom:2px solid #999494;"
                                                        width="85%" cellspacing="0" cellpadding="10">
                                                    <tbody>
                                                    <tr>
                                                        <td width="4%" align="center"></td>
                                                        <td width="2%" align="left">
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <img src="{{ asset('nlimages/starfirst.png') }}"
                                                                             onclick="starfirstsubmit('no');"
                                                                             height="20">
                                                                    </td>
                                                                    <td>
                                                                        <img src="{{ asset('nlimages/phonefirstinactive.png') }}"
                                                                             onclick="phonefirstsubmit('yes');"
                                                                             height="20">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="2%" align="center"></td>
                                                        <td width="72%"><b>Patient Name</b></td>
                                                        <td class="no-print" width="10%" align="center">
                                                            <b>Shortcuts</b>
                                                        </td>
                                                        <td class="no-print" width="10%" align="center">
                                                            <b>Delete</b>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <script>
                                                    function showphoto(i) {
                                                        document.getElementById('photo' + i).style.display = 'block';
                                                    }

                                                    function hidephoto(i) {
                                                        document.getElementById('photo' + i).style.display = 'none';
                                                    }

                                                    function showpayment(i) {
                                                        document.getElementById('paymentdrop' + i).style.display =
                                                            'block';
                                                    }

                                                    function hidepayment(i) {
                                                        document.getElementById('paymentdrop' + i).style.display =
                                                            'none';
                                                    }

                                                    function changeinputcolor(uniquekey) {
                                                        document.getElementById('billingamount' + uniquekey).style
                                                            .color = 'black';
                                                    }

                                                    var phoneshown;

                                                    function showphone(uniquekey, patient) {
                                                        if (document.getElementById('phone' + uniquekey)) {
                                                            if (document.getElementById('phone' + uniquekey).style
                                                                .display == 'none') {
                                                                document.getElementById('phone' + uniquekey).style
                                                                    .display = 'block';
                                                                document.form.markphone.value = uniquekey;
                                                                document.form.selectedpatients.value = patient;
                                                            } else if (document.getElementById('phone' + uniquekey)
                                                                .style.display == 'block') {
                                                                document.getElementById('phone' + uniquekey).style
                                                                    .display = 'none';
                                                                document.form.markphone.value = '';
                                                                document.form.selectedpatients.value = '';
                                                            }
                                                            if (phoneshown != null && phoneshown != uniquekey) document
                                                                .getElementById('phone' + phoneshown).style.display =
                                                                'none';
                                                            phoneshown = uniquekey;
                                                        }
                                                    }

                                                    function phonesubmit() {
                                                        if (document.form.markphone.value != '') {
                                                            var phonearr = ['phonecalldate', 'phonecalltime',
                                                                'phonecallnumber', 'phonecallemail',
                                                                'phonecallnotes'
                                                            ];
                                                            for (var i = 0; i < phonearr.length; i++) {
                                                                document.getElementById(phonearr[i]).value = document
                                                                    .getElementById(phonearr[i] + document.form
                                                                        .markphone.value).value;
                                                            }

                                                            if (document.getElementById('phonecall' + document.form
                                                                .markphone.value + 'yes').checked) document
                                                                .getElementById('phonecall').value = 'yes';
                                                            else {
                                                                document.getElementById('phonecall').value = 'no';
                                                            }
                                                        }
                                                    }

                                                    function phonestatus(uniquekey, yesno) {
                                                        if (yesno == 'yes') {
                                                            document.getElementById('phonecall' + uniquekey + 'no')
                                                                .checked = false;
                                                            document.getElementById('phonecall').value = 'yes';
                                                        }
                                                        if (yesno == 'no') {
                                                            document.getElementById('phonecall' + uniquekey + 'yes')
                                                                .checked = false;
                                                            document.getElementById('phonecall').value = 'no';
                                                        }
                                                    }

                                                    function markphoned(uniquekey, status, patient) {
                                                        document.form.markphone.value = uniquekey;
                                                        document.form.markphonestatus.value = status;
                                                        document.form.selectedpatients.value = patient;
                                                        document.form.markonly.value = 'true';
                                                        document.form.submit();
                                                    }
                                                    var shownphone = '';
                                                    var patienthascall = [];

                                                    function previewphoneall(patientid, onoff) {
                                                        // if (patienthascall[patientid]) {
                                                        if (shownphone == '') {
                                                            if (document.getElementById('phoneall' + patientid)) {
                                                                if (onoff == 'on') {
                                                                    document.getElementById(
                                                                        'phoneall' + patientid)
                                                                        .style.display =
                                                                        'block'
                                                                } else {
                                                                    document.getElementById('phoneall' + patientid)
                                                                        .style.display = 'none';
                                                                }
                                                            }
                                                        }
                                                        // }
                                                    }

                                                    function showphoneall(patientid) {
                                                        // if (patienthascall[patientid]) {
                                                        if (document.getElementById('phoneall' + patientid).style
                                                            .display == 'block' && shownphone == '') {
                                                            if (shownphone != '') document.getElementById(
                                                                'phoneall' + shownphone).style.display = 'none';
                                                            document.getElementById('phoneall' + patientid).style
                                                                .display = 'block';
                                                            //document.form.starpid.value=patientid;
                                                            shownphone = patientid;
                                                        } else {
                                                            document.getElementById('phoneall' + patientid).style
                                                                .display = 'none';
                                                            //document.form.starpid.value='';
                                                            shownphone = '';
                                                        }
                                                        // }
                                                    }
                                                    var bpshown,
                                                        shown,
                                                        shownuk;

                                                    function bpsubmit() {
                                                        if (document.form.billorpay.value != '' && document.form
                                                            .billpayuniquekey.value != "") {
                                                            var billarr = ['billingclaimnumber', 'billingdatesent',
                                                                'billingamount', 'billingnotes'
                                                            ];
                                                            var payarr = [ /*'billingdeductible',*/ 'billingpaid',
                                                                'paymentnotes'
                                                            ];
                                                            var arr;
                                                            if (document.form.billorpay.value == 'billing') arr =
                                                                billarr;
                                                            if (document.form.billorpay.value == 'payment') arr =
                                                                payarr;
                                                            for (var i = 0; i < arr.length; i++) {
                                                                document.getElementById(arr[i]).value = document
                                                                    .getElementById(arr[i] + document.form
                                                                        .billpayuniquekey.value).value;
                                                            }
                                                            //billingincomplete,billingready,billingcomplete,paymentwaiting,paymentpartial,paymentfull
                                                        }
                                                    }

                                                    function filterbillpay() {
                                                        var billingsrc, paymentsrc;
                                                        for (var i = 0; i < allpatientids.length; i++) {
                                                            billingsrc = document.getElementById('billingimg' +
                                                                allpatientids[i]).src.split('/');
                                                            paymentsrc = document.getElementById('paymentimg' +
                                                                allpatientids[i]).src.split('/');
                                                            billingsrc = billingsrc[billingsrc.length - 1];
                                                            paymentsrc = paymentsrc[paymentsrc.length - 1];
                                                            if (document.getElementById("showall").checked) {
                                                                document.getElementById('patienttable' + allpatientids[
                                                                    i]).style.display = 'block';
                                                                document.getElementById('encounter' + allpatientids[i])
                                                                    .style.display = 'none';
                                                            } else if (document.getElementById("showcomplete")
                                                                .checked && billingsrc == 'billingcomplete.png') {
                                                                document.getElementById('patienttable' + allpatientids[
                                                                    i]).style.display = 'block';
                                                                document.getElementById('encounter' + allpatientids[i])
                                                                    .style.display = 'block';
                                                            } else if (document.getElementById("showincomplete")
                                                                .checked && billingsrc == 'billingincomplete.png') {
                                                                document.getElementById('patienttable' + allpatientids[
                                                                    i]).style.display = 'block';
                                                                document.getElementById('encounter' + allpatientids[i])
                                                                    .style.display = 'block';
                                                            } else if (document.getElementById("showready").checked &&
                                                                billingsrc == 'billingready.png') {
                                                                document.getElementById('patienttable' + allpatientids[
                                                                    i]).style.display = 'block';
                                                                document.getElementById('encounter' + allpatientids[i])
                                                                    .style.display = 'block';
                                                            } else if (document.getElementById("showwaiting").checked &&
                                                                paymentsrc == 'paymentwaiting.png') {
                                                                document.getElementById('patienttable' + allpatientids[
                                                                    i]).style.display = 'block';
                                                                document.getElementById('encounter' + allpatientids[i])
                                                                    .style.display = 'block';
                                                            } else if (document.getElementById("showpartial").checked &&
                                                                paymentsrc == 'paymentpartial.png') {
                                                                document.getElementById('patienttable' + allpatientids[
                                                                    i]).style.display = 'block';
                                                                document.getElementById('encounter' + allpatientids[i])
                                                                    .style.display = 'block';
                                                            } else if (document.getElementById("showfull").checked &&
                                                                paymentsrc == 'paymentfull.png') {
                                                                document.getElementById('patienttable' + allpatientids[
                                                                    i]).style.display = 'block';
                                                                document.getElementById('encounter' + allpatientids[i])
                                                                    .style.display = 'block';
                                                            } else {
                                                                document.getElementById('patienttable' + allpatientids[
                                                                    i]).style.display = 'none';
                                                                document.getElementById('encounter' + allpatientids[i])
                                                                    .style.display = 'none';
                                                            }
                                                            //if(document.getElementById("showincomplete").checked=='true')
                                                            //if(document.getElementById("showready").checked=='true')
                                                            //if(document.getElementById("showpartial").checked=='true')
                                                            //if(document.getElementById("showfull").checked=='true')
                                                            //if(document.getElementById("showwaiting").checked=='true')
                                                        }
                                                    }

                                                    function showhideyear(pid, year) {
                                                        // if (document.getElementById('patientid' + pid + 'year' +
                                                        //         year)) {
                                                        if (document.getElementById('patientid' + pid + 'year' + year)
                                                            .style.display == 'none') {
                                                            document.getElementById('patientid' + pid + 'year' + year)
                                                                .style.display = 'block';
                                                            document.getElementById('patientid' + pid + 'year' + year +
                                                                'plus').src = 'images/minus.png';
                                                        } else if (document.getElementById('patientid' + pid +
                                                            'year' + year).style.display == 'block') {
                                                            document.getElementById('patientid' + pid + 'year' +
                                                                year).style.display = 'none';
                                                            document.getElementById('patientid' + pid + 'year' +
                                                                year + 'plus').src = 'images/plus.png';
                                                        }
                                                        // }
                                                    }

                                                </script>
                                                <div id="patienttable0">
                                                    @foreach ($starPriority as $pKey=>$sp)
                                                        @foreach ($sp as $index => $record)
                                                            @php
                                                                $encount = $encounters($record->id);
                                                                $thisYearVisits = $encount['thisYearVisits'];
                                                                $visitYears = $encount['years'];
                                                                $encount = $encount['encounter'];

                                                                //for blue / billing
                                                                $compcount=0;$readycount=0;$incompletecount=0;
                                                                //for green / payment
                                                                $waitingcount=0;$partialcount=0;$fullcount=0;

                                                                /*$looopcount=0;$bArray=[];$pArray=[];*/
                                                                //$recordptyperay = explode('%SE%',$record->paymenttype);
                                                                $recordptyperay = str_replace_array('%SE%', [''],$record->paymenttype);

                                                                foreach($visitYears as $ye){
                                                                    foreach($ye[2] as $v ){
                                                                        $billing = str_replace_array('%SE%', [''],$v->billing);
                                                                        $payment = str_replace_array('%SE%', [''],$v->payment);

                                                                        /*$looopcount++;*/
                                                                        //$billing = $v->billing;
                                                                        /*array_push($bArray,$billing);*/
                                                                        //$payment = $v->payment;
                                                                        /*array_push($pArray,$payment);*/

                                                                        //blue
                                                                        //if( array_search('Insurance',$recordptyperay) ){
                                                                        if( $recordptyperay=='Insurance' ){
                                                                            if($billing=="ready"){              $readycount++;      }
                                                                            elseif($billing=="complete"){       $compcount++;       }
                                                                            else/*if($billing=="incomplete")*/{ $incompletecount++; }
                                                                        }
                                                                        //green
                                                                        //if (array_search('Cash',$recordptyperay) || $billing == 'complete'){
                                                                        if ($recordptyperay== 'Cash' || $billing == 'complete'){

                                                                            if($payment=="partial"){            $partialcount++;}
                                                                            elseif($payment=="full"){           $fullcount++;   }
                                                                            else/*if($payment=="waiting")*/{    $waitingcount++;}
                                                                        }
                                                                    }
                                                                }

                                                                $countofbillingToshow   =   0; $bimagename =   '';
                                                                $countofPaymentsToshow  =   0; $gimagename =   '';
                                                                if($incompletecount){ $countofbillingToshow=$incompletecount; $bimagename="blue-0";}
                                                                elseif($readycount){  $countofbillingToshow=$readycount;      $bimagename="blue-50";}
                                                                elseif($compcount){   $countofbillingToshow=$compcount;       $bimagename="";}


                                                                if($waitingcount){    $countofPaymentsToshow=$waitingcount;   $gimagename="green-0";}
                                                                elseif($partialcount){$countofPaymentsToshow=$partialcount;   $gimagename="green-50";}
                                                                elseif($fullcount){   $countofPaymentsToshow=$fullcount;      $gimagename="green-100";}



                                                                //echo "record->paymenttype: ".$record->paymenttype."<br>";
                                                                //echo "recordptyperay: ".implode('  ',$recordptyperay)."<br>";
                                                                //echo 'countofPaymentsToshow:'.$countofPaymentsToshow.' | '.'gimagename:'.$gimagename."<br>";
                                                                //echo 'waitingcount:'.$waitingcount.' | '.'partialcount:'.$partialcount.' | '.'fullcount:'.$fullcount;
                                                                //echo "<br>";
                                                                //echo "looopcount". $looopcount ;
                                                                // "<br>bArray:".implode(',',$bArray)."<br>pArray:".implode(',',$pArray)
                                                                //echo "<br>";
                                                                //echo 'countofbillingToshow:'.$countofbillingToshow.' | '.'bimagename:'.$bimagename."<br>";
                                                                //echo 'incompletecount:'.$incompletecount.' | '.'readycount:'.$readycount.' | '.'compcount:'.$compcount."<br>";
                                                                //dd($record);


                                                            @endphp
                                                            <table style="border-top:1px solid black;" width="85%"
                                                                   cellspacing="0" cellpadding="0" bgcolor="#d2d2d0">
                                                                <tbody>
                                                                <tr height="25" bgcolor="{{$index % 2? '#FFFFFF':'#d2d2d0'}}" id="patientRow{{$record->id}}">
                                                                    <th class="text-center table-sr bg-{{$pKey}}">
                                                                        {{$index+1}}
                                                                    </th>
                                                                    <td width="2%" align="center">
                                                                        <a href="{{url('/edit/'.$record->id)}}">
                                                                            View
                                                                        </a>
                                                                    </td>
                                                                    <td width="6%" align="center">
                                                                        <table id="patient{{ $record->id }}">
                                                                            <tbody>
                                                                            <tr height="20">
                                                                                <td style="padding-top:0px;padding-bottom:0px;width:25px;"
                                                                                    align="center">
                                                                                    <div style="position:relative;">
                                                                                        <table width="25">
                                                                                            <tbody>
                                                                                            <tr>
                                                                                                <td width="25"
                                                                                                    align="center">
                                                                                                    @if ($record->starred == 'yes')
                                                                                                        <img src="{{ asset('nlimages/manageicons/star' . $record->starpriority . 'active.png') }}"
                                                                                                             onmouseover="previewstar({{ $record->id }},'on');"
                                                                                                             onmouseout="previewstar({{ $record->id }},'off');"
                                                                                                             onclick="showstar({{ $record->id }})"
                                                                                                             ondblclick="submitStar({{ $record->id }},'off');"
                                                                                                             height="20">
                                                                                                    @else
                                                                                                        <img src="{{ asset('nlimages/manageicons/starinactive.png') }}"
                                                                                                             onmouseover="previewstar({{ $record->id }},'on');"
                                                                                                             onmouseout="previewstar({{ $record->id }},'off');"
                                                                                                             onclick="showstar({{ $record->id }})"
                                                                                                             ondblclick="submitStar({{ $record->id }},'');"
                                                                                                             height="20">
                                                                                                    @endif
                                                                                                </td>
                                                                                            </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <div style="text-align: left; position: absolute; top: 23px; min-height: 230px; min-width: 300px; display: none; background-color: rgb(253, 255, 122); border: 1px solid rgb(255, 144, 0); z-index: 1; padding: 15px;"
                                                                                             id="stardiv{{ $record->id }}">
                                                                                            (Double-click to
                                                                                            star/unstar)
                                                                                            <span style="float:right;">
                                                                                                                        <img src="{{ asset('images/delete.png') }}"
                                                                                                                             onclick="showstar({{ $record->id }});"
                                                                                                                             width="20"
                                                                                                                             height="20">
                                                                                                                        </span><br><br>
                                                                                            <table cellspacing="0"
                                                                                                   cellpadding="0">
                                                                                                <tbody>
                                                                                                <tr valign="bottom">
                                                                                                    <td width="80">
                                                                                                        Priority:</td>
                                                                                                    <td width="35"
                                                                                                        valign="bottom">
                                                                                                        <img id="starbilling{{ $record->id }}"
                                                                                                             src={{ asset('nlimages/manageicons/' . ($record->starred == 'yes' && $record->starpriority == 'billing' ? 'starbillingactive' : 'starbillinginactive') . '.png') }}
                                                                                                                     onclick="starchange({{ $record->id }},'billing');"
                                                                                                             ondblclick="submitStar(true);"
                                                                                                             height="20">
                                                                                                    </td>
                                                                                                    <td width="35"
                                                                                                        valign="bottom">
                                                                                                        <img id="starhigh{{ $record->id }}"
                                                                                                             src={{ asset('nlimages/manageicons/' . ($record->starred == 'yes' && $record->starpriority == 'high' /*|| $record->starpriority == ''*/ ? 'starhighactive' : 'starhighinactive') . '.png') }}
                                                                                                                     onclick="starchange({{ $record->id }},'high')"
                                                                                                             ondblclick="submitStar(true);"
                                                                                                             height="20">
                                                                                                    </td>
                                                                                                    <td width="35"
                                                                                                        valign="bottom">
                                                                                                        <img id="starmedium{{ $record->id }}"
                                                                                                             src={{ asset('nlimages/manageicons/' . ($record->starpriority == 'medium' ? 'starmediumactive' : 'starmediuminactive') . '.png') }}
                                                                                                                     onclick="starchange({{ $record->id }},'medium');"
                                                                                                             ondblclick="submitStar(true);"
                                                                                                             height="20">
                                                                                                    </td>
                                                                                                    <td width="35"
                                                                                                        valign="bottom">
                                                                                                        <img id="starlow{{ $record->id }}"
                                                                                                             src={{ asset('nlimages/manageicons/' . ($record->starpriority == 'low' ? 'starlowactive' : 'starlowinactive') . '.png') }}
                                                                                                                     onclick="starchange({{ $record->id }},'low');"
                                                                                                             ondblclick="submitStar(true);"
                                                                                                             height="20">
                                                                                                    </td>
                                                                                                    <td width="30"><a
                                                                                                                href="javascript:submitStar({{ $record->id }},'off');">Unstar</a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table><br>
                                                                                            <input type="hidden"
                                                                                                   id="starpriority{{ $record->id }}"
                                                                                                   value="{{ $record->starpriority != '' ? $record->starpriority : 'high' }}">
                                                                                            <center>
                                                                                                                        <textarea
                                                                                                                                style="width:250px;height:75px;"
                                                                                                                                id="starnotes{{ $record->id }}">{{ $record->starnotes }}</textarea><br><br>
                                                                                                <button type='button' class="btn p-0">
                                                                                                    <img src="{{ asset('nlimages/submitbutton.png') }}"
                                                                                                         alt="Submit"
                                                                                                         onclick="submitStar({{ $record->id }})">
                                                                                                </button>
                                                                                            </center>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td style="padding=top:0px;padding-bottom:0px;"
                                                                                    width="25" align="center">
                                                                                    <div style="position:relative;">
                                                                                        @php
                                                                                            $phoneCount = 0;
                                                                                        @endphp
                                                                                        @forelse ($phoneCall as $pc)
                                                                                            @if ($pc->patient_id == $record->id)
                                                                                                @php
                                                                                                    $phoneCount++;
                                                                                                @endphp
                                                                                                @if ($pc->phonecall == 'yes')
                                                                                                    <img id="phonecallicon{{ $record->id }}"
                                                                                                         src="{{ asset('nlimages/manageicons/phoneactive.png') }}"
                                                                                                         onmouseover="previewphoneall({{ $record->id }},'on');"
                                                                                                         onmouseout="previewphoneall({{ $record->id }},'off');"
                                                                                                         onclick="showphoneall({{ $record->id }});"
                                                                                                         width="20" height="20">
                                                                                                    <div style="text-align:left;position:absolute;top:23px;left;0px;min-height:350px;min-width:300px;display:none;background-color:#d2d2d2;border:1px solid #e62129;z-index:1;padding:15px;"
                                                                                                         id="phoneall{{ $record->id }}">
                                                                                                        <table width="100%">
                                                                                                            <tr class="mt-3">
                                                                                                                <td colspan='2'
                                                                                                                    style="text-align: right;">
                                                                                                                    <img src="{{ asset('images/delete.png') }}"
                                                                                                                         onclick="showphoneall({{ $record->id }});">
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td> <br> </td>
                                                                                                            </tr>
                                                                                                            <tr
                                                                                                                    style="text-align: center;">
                                                                                                                <th colspan="2">
                                                                                                                    Call for
                                                                                                                    visit:
                                                                                                                    {{ $encount->encounterdate }}
                                                                                                                </th>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td> <br> </td>
                                                                                                            </tr>
                                                                                                            <tr
                                                                                                                    style="text-align: center;">
                                                                                                                <td colspan="2">
                                                                                                                    (Most recent
                                                                                                                    call needed)
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td> <br> </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Date Called:
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    {{ $encount->phonecalldate != '' ? $encount->phonecalldate : 'Not listed' }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Time Called:
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    {{ $encount->phonecalltime != '' ? $encount->phonecalltime : 'Not listed' }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Patient
                                                                                                                    Cell:
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    {{ $record->cellphone != '' ? $record->cellphone : 'Not listed' }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Patient
                                                                                                                    Email:
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    {{ $record->email != '' ? $record->email : 'Not listed' }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td> <br> </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <b>Note:</b>
                                                                                                                    <br>
                                                                                                                    {{ $encount->phonecallnotes != '' ? $encount->phonecallnotes : 'Not listed' }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                @else
                                                                                                    <img id="phonecallicon{{ $record->id }}"
                                                                                                         src="{{ asset('nlimages/manageicons/phoneinactive.png') }}"
                                                                                                         onmouseover="previewphoneall({{ $record->id }},'on');"
                                                                                                         onmouseout="previewphoneall({{ $record->id }},'off');"
                                                                                                         onclick="showphoneall({{ $record->id }});"
                                                                                                         width="20" height="20">
                                                                                                @endif
                                                                                            @endif
                                                                                        @empty
                                                                                            <img id="phonecallicon{{ $record->id }}"
                                                                                                 src="{{ asset('nlimages/manageicons/phoneinactive.png') }}"
                                                                                                 onmouseover="previewphoneall({{ $record->id }},'on');"
                                                                                                 onmouseout="previewphoneall({{ $record->id }},'off');"
                                                                                                 onclick="showphoneall({{ $record->id }});"
                                                                                                 width="20" height="20">
                                                                                        @endforelse
                                                                                        @if (!$phoneCount)
                                                                                            <img id="phonecallicon{{ $record->id }}"
                                                                                                 src="{{ asset('nlimages/manageicons/phoneinactive.png') }}"
                                                                                                 onmouseover="previewphoneall({{ $record->id }},'on');"
                                                                                                 onmouseout="previewphoneall({{ $record->id }},'off');"
                                                                                                 onclick="showphoneall({{ $record->id }});" width="20"
                                                                                                 height="20">
                                                                                        @endif
                                                                                    </div>
                                                                                </td>
                                                                                <td style="padding-top:0px;padding-bottom:0px;text-align:center;" width="25">
                                                                                    <div style="position:relative;" class="no-print">
                                                                                        @php
                                                                                            $record->pitype = str_replace_array('%SE%', [''], $record->pitype);
                                                                                            $record->carriername = str_replace_array('%SE%', [''],
                                                                                            $record->carriername);
                                                                                            $record->claimsadjuster = str_replace_array('%SE%', [''],
                                                                                            $record->claimsadjuster);
                                                                                            $record->phonenumber = str_replace_array('%SE%', [''],
                                                                                            $record->phonenumber);
                                                                                            $record->copay0 = str_replace_array('%SE%', [''], $record->copay0);
                                                                                            $record->coinsurance0 = str_replace_array('%SE%', [''],
                                                                                            $record->coinsurance0);
                                                                                            $record->coinsurancedp0 = str_replace_array('%SE%', [''],
                                                                                            $record->coinsurancedp0);
                                                                                            $record->visitsused = str_replace_array('%SE%', [''],
                                                                                            $record->visitsused);
                                                                                            $record->visitsauthorized = str_replace_array('%SE%', [''],
                                                                                            $record->visitsauthorized);
                                                                                            $record->paymenttype = str_replace_array('%SE%', [''],
                                                                                            $record->paymenttype);
                                                                                            $record->costpervisit = str_replace_array('%SE%', [''],
                                                                                            $record->costpervisit);
                                                                                            $record->Deliver_packages = str_replace_array('%SE%', [''],
                                                                                            $record->Deliver_packages);
                                                                                            $icon = 'cashicon';
                                                                                            $pi = '';
                                                                                        @endphp
                                                                                        @if ($record->paymenttype != '')
                                                                                            @if ($record->paymenttype == 'Insurance')
                                                                                                @php
                                                                                                    $icon = 'insuranceicon';
                                                                                                    $pi = '';
                                                                                                @endphp
                                                                                                @if ($record->pitype != '')
                                                                                                    @php
                                                                                                        $icon = 'piicon';
                                                                                                        $pi = "Insurance is: $record->pitype"
                                                                                                    @endphp
                                                                                                @endif
                                                                                                <a href="{{route('insuranceinfo', $record->id)}}">
                                                                                                    <img src={{ asset("nlimages/manageicons/$icon.png") }}
                                                                                                            style="z-index:-1;"
                                                                                                         onmouseover="showpayment({{ $record->id }});"
                                                                                                         onmouseout="hidepayment({{ $record->id }});" width="20"
                                                                                                         height="20">
                                                                                                </a>
                                                                                                <div style="text-align:left;position:absolute;top:23px;left;0px;min-height:275px;min-width:400px;display:none;background-color:#ebf5e5;border:1px solid #15b100;z-index:1;padding:15px;"
                                                                                                     id="paymentdrop{{ $record->id }}">
                                                                                                    {{ $pi }}
                                                                                                    <br>
                                                                                                    Insurance carrier:
                                                                                                    {{ $record->carriername != '' ? $record->carriername : 'Not listed' }}<br><br>
                                                                                                    Name of Adjuster:
                                                                                                    {{ $record->claimsadjuster != '' ? $record->claimsadjuster : 'Not listed' }}
                                                                                                    <br><br>
                                                                                                    Phone #:
                                                                                                    {{ $record->phonenumber != '' ? $record->phonenumber : 'Not listed' }}
                                                                                                    <br>
                                                                                                    Co-pay:
                                                                                                    {{ $record->copay0 != '' ? $record->copay0 : 'Not listed' }}
                                                                                                    <br><br>
                                                                                                    Co-Pay:
                                                                                                    {{ $record->coinsurance0 != '' ? $record->coinsurance0 : 'Not listed' }}
                                                                                                    <br>
                                                                                                    Co-insurance:
                                                                                                    {{ $record->coinsurance0 != '' ? ($record->coinsurancedp0 != '$' ? '' : '$') . $record->coinsurance0 . ($record->coinsurancedp0 != '$' ? '' : '$') : 'Not listed' }}
                                                                                                    <br><br>
                                                                                                    @php
                                                                                                        $visitsused = is_numeric($record->visitsused) ?
                                                                                                        $record->visitsused : 0;
                                                                                                    @endphp
                                                                                                    Visits Used <b>({{ date('Y') }})</b>:
                                                                                                    {{ $thisYearVisits + $visitsused }}
                                                                                                    {{ $record->visitsauthorized == '' ? '' : ' out of  ' . $record->visitsauthorized }}
                                                                                                    <br><br>
                                                                                                    Visits Prior:
                                                                                                    {{ $record->visitsused != '' ? $record->visitsused : '0 / Up2Speed: ' . $thisYearVisits }}
                                                                                                    <br>
                                                                                                    Visits Remaining:
                                                                                                    {{ $record->visitsauthorized != '' ? ($record->visitsauthorized == 'UNLIMITED' ? '∞' : (float) preg_replace('/[^0-9.]/', '', $record->visitsauthorized) - ($thisYearVisits + $visitsused)) : 'N/A' }}
                                                                                                </div>
                                                                                            @else
                                                                                                @if ($record->paymenttype == 'Cash')
                                                                                                    @php
                                                                                                        $icon = 'cashicon';
                                                                                                    @endphp
                                                                                                @endif
                                                                                                <a  href="{{route('insuranceinfo', $record->id)}}">
                                                                                                    <img src={{ asset("nlimages/manageicons/$icon.png") }}
                                                                                                            style="z-index:-1;"
                                                                                                         onmouseover="showpayment({{ $record->id }});"
                                                                                                         onmouseout="hidepayment({{ $record->id }});" width="20"
                                                                                                         height="20">
                                                                                                </a>
                                                                                                <div style="text-align:left;position:absolute;top:23px;left;0px;height:275px;width:400px;display:none;background-color:#ebf5e5;border:1px solid #15b100;z-index:1;padding:15px;"
                                                                                                     id="paymentdrop{{ $record->id }}">
                                                                                                    Cost per visit:
                                                                                                    {{ $record->costpervisit != '' ? '$' . $record->costpervisit : 'Not listed' }}
                                                                                                    <br>
                                                                                                    Package:
                                                                                                    {{ $record->Deliver_packages != '' ? $record->Deliver_packages : 'Not listed' }}
                                                                                                </div>
                                                                                            @endif
                                                                                        @else
                                                                                            <img src="{{ asset('nlimages/spacer.png') }}" style="z-index:-1;"
                                                                                                 onmouseover="showpayment({{ $record->id }});"
                                                                                                 onmouseout="hidepayment({{ $record->id }});" width="20" height="20">
                                                                                        @endif
                                                                                    </div>
                                                                                </td>
                                                                                <td style="padding-top:0px;padding-bottom:0px;" width="25">
                                                                                    <img src="{{ asset('nlimages/manageicons/photoicon.png') }}" onmouseover="showphoto({{ $record->id }});"
                                                                                                 onmouseout="hidephoto({{ $record->id }});" width="20" height="20" width="20" height="20" />

                                                                                    <div style="position: absolute;  left: 446px;; height: 100px; width: 75px; display: none; z-index: 1;" id="photo{{ $record->id }}"><img src="patientphotos/{{ $record->id }}.jpg" height="200" ></div>                                 </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>

                                                                    </td>
                                                                    <td width="20%" valign="middle">
                                                                        <a href="javascript:showhide({{ $record->id }});" style="text-decoration:none;color:black">
                                                                            <img src="{{ asset('images/plus.png') }}" id="img{{ $record->id }}" class="no-print">
                                                                            {{ $record->lastname }}, {{ $record->firstname }}
                                                                        </a>
                                                                    </td>
 @if ($record->paymenttype == 'Insurance')
<td width="49%" align="left">
    <img src="nlimages/billing/billingready.png" width="15" height="15" id="billingimg{{ $record->id }}">
    <img src="nlimages/billing/paymentwaiting.png" width="15" height="15" id="paymentimg{{ $record->id }}"></td>
@else
<td width="49%" align="left">
    <img src="nlimages/billing/paymentwaiting.png" width="15" height="15" id="paymentimg{{ $record->id }}"></td>
@endif







                                                                    <td width="10%" align="center">
                                                                        <table cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td width="20" align="center">
                                                                                    <a href="{{ route('edit', $record->id) }}">
                                                                                        <img src="{{ asset('nlimages/patienticonnew.png') }}" class="no-print"
                                                                                             height="20">
                                                                                    </a>
                                                                                </td>
                                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                <td width="20" align="center">
                                                                                    <a href={{route("billing", $record->id)}}>
                                                                                        <img src="{{ asset('nlimages/billingnew.png') }}" class="no-print"
                                                                                             height="20">
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td width="10%" align="center">
                                                                        <button type="button" class="btn p-0" onclick="deletePatient('{{$record->id }}', '{{ $record->firstname }}', '{{ $record->lastname }}')">
                                                                            <img src="{{ asset('nlimages/delete.png') }}" height="20">
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <div id="encounter{{ $record->id }}" style="display: none;position: relative;padding:0px 6rem 0px 6rem;">
                                                                @forelse ($visitYears as $index => $year)
                                                                    @php
                                                                        if ($year[0] != date('Y')) {
                                                                        $printyear = true;
                                                                        } else {
                                                                        $printyear=false;
                                                                        }
                                                                    @endphp
                                                                    <div style="text-align:left;"  class="bg-{{$icon}}">
                                                                        @if (count($year))
                                                                            <a style="display:block;color:black;text-decoration:none;width:100%;border-bottom:1px solid gray;"
                                                                               href="javascript:showhideyear({{ $record->id }},{{ $year[0] }})">
                                                                                <img id="patientid{{ $record->id }}year{{ $year[0] }}plus"
                                                                                     src="{{ $year[0] == date('Y') ? 'images/minus.png' : 'images/plus.png' }}" width="10"
                                                                                     height="10">
                                                                                <b style="display:inline-block; margin:2px 0 2px 0;">{{ $year[0] }}</b>
                                                                                {{ $year[1]->count }}
                                                                                Visit(s)
                                                                            </a>
                                                                            <div id="patientid{{ $record->id }}year{{ $year[0] }}"
                                                                                 style="display:{{ $year[0] == date('Y') ? 'block' : 'none' }};">
                                                                                <table id="patientid{{ $record->id }}'year{{ $year[0] }}index{{ $index }}"
                                                                                       style="border:1px solid gray" width="100%" cellspacing="0" cellpadding="5">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th class="text-left border-bottom"></th>
                                                                                        <th class="text-center border-bottom">Visit #</th>
                                                                                        <th class="text-left border-bottom"></th>
                                                                                        <th class="text-left border-bottom"></th>
                                                                                        <th class="text-left border-bottom"></th>
                                                                                        <th colspan="4" class="border-bottom"></th>
                                                                                        <th class=" border-bottom" colspan="2"></th>
                                                                                        <th class=" border-bottom"></th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    @forelse ($year[2] as $ind => $visitRecord)
                                                                                        @php
                                                                                            $visitRecord->billing = str_replace_array( '%SE%', [''],$visitRecord->billing);
                                                                                            $visitRecord->payment = str_replace_array('%SE%', [''],$visitRecord->payment);
                                                                                            $visitRecord->paymentnotes = str_replace_array('%SE%', [''],$visitRecord->paymentnotes);

                                                                                        @endphp
                                                                                        <tr id="visitRow{{ $visitRecord->id }}">
                                                                                            <td class="text-center border-bottom">
                                                                                                <img src={{asset("nlimages/manageicons/".($visitRecord->phonecall == 'yes' ? 'phoneactive' : 'phoneinactive').".png")}}
                                                                                                        width="20" height="20" style="display:inline"
                                                                                                     onclick="showphone({{$visitRecord->id}},{{$record->id}})"
                                                                                                     ondblclick="markphoned({{$visitRecord->id}},{{$visitRecord->phonecall}},{{$record->patient_id}})">
                                                                                            </td>
                                                                                            <td class="text-center border-bottom">
                                                                                                {{ $ind + 1 }}
                                                                                            </td>
                                                                                            <td class="text-center border-bottom" style="position:relative">
                                                                                                @if ($visitRecord->billing == 'ready')
                                                                                                    @php
                                                                                                        $billsrc='billingready';
                                                                                                    @endphp
                                                                                                @elseif($visitRecord->billing=='complete')
                                                                                                    @php
                                                                                                        $billsrc='billingcomplete';
                                                                                                    @endphp
                                                                                                @else
                                                                                                    @php
                                                                                                        $billsrc='billingincomplete';
                                                                                                    @endphp
                                                                                                @endif


                                                                                                    {{--<span>{{$visitRecord->billing}}</span>--}}
                                                                                                @if ($record->paymenttype == 'Insurance')
                                                                                                    <img src="{{ asset('/nlimages/billing/' . $billsrc . '.png') }}"
                                                                                                         width="15" height="15" style="display:inline;"
                                                                                                         onmouseover="previewbp('{{ $visitRecord->id }}','billing','on')"
                                                                                                         onmouseout="previewbp('{{ $visitRecord->id }}','billing','off');"
                                                                                                         onclick="showbp('{{ $visitRecord->id }}','billing','{{ $visitRecord->billing }}','{{ $record->id }}')">
                                                                                                    <div style="text-align:left;position:absolute;top:23px;left;0px;min-height:260px;min-width:500px;display:none;background-color:#8dd8ff;border:1px solid #005c8b;z-index:1;padding:15px;"
                                                                                                         id="billing{{ $visitRecord->id }}">
                                                                                                        <table width="100%">
                                                                                                            <tr>
                                                                                                                <td align="center">
                                                                                                                    <b>Billing</b>:
                                                                                                                    {{ $visitRecord->encounterdate }}
                                                                                                                    <Br><br>
                                                                                                                    <input type="radio"
                                                                                                                           id="billingincomplete{{ $visitRecord->id }}"
                                                                                                                           value="incomplete" name="billingStatus{{$visitRecord->id}}"
                                                                                                                            {{ $visitRecord->billing == 'incomplete' || $visitRecord->billing == '' ? 'checked' : '' }}>
                                                                                                                    Incomplete
                                                                                                                    <input type="radio"
                                                                                                                           id="billingready{{ $visitRecord->id }}"
                                                                                                                           value="ready" name="billingStatus{{$visitRecord->id}}"
                                                                                                                            {{ $visitRecord->billing == 'ready' ? 'checked' : '' }}>
                                                                                                                    Ready
                                                                                                                    <input type="radio"
                                                                                                                           id="billingcomplete{{ $visitRecord->id }}"
                                                                                                                           value="complete" name="billingStatus{{$visitRecord->id}}"
                                                                                                                            {{ $visitRecord->billing == 'complete' ? 'checked' : '' }}>
                                                                                                                    Complete
                                                                                                                    <br><br>
                                                                                                                </td>
                                                                                                                <td class="text-right">
                                                                                                                    <img src={{ asset('images/delete.png') }}
                                                                                                                            onclick="showbp({{ $visitRecord->id }},'billing')">
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Claim #: </td>
                                                                                                                <td>
                                                                                                                    <input id="billingclaimnumber{{ $visitRecord->id }}"
                                                                                                                           value="{{ $visitRecord->billingclaimnumber }}">
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Date Sent: </td>
                                                                                                                <td>
                                                                                                                    <input id="billingdatesent{{ $visitRecord->id }}"
                                                                                                                           value="{{ $visitRecord->billingdatesent }}">
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Billed Amount:</td>
                                                                                                                <td valign="top">
                                                                                                                    $ <input
                                                                                                                            onchange="javascript:changeinputcolor({{ $visitRecord->id }})"
                                                                                                                            id="billingamount{{ $visitRecord->id }}"
                                                                                                                            value="{{ $visitRecord->billingamount != '' ? $visitRecord->billingamount : ($visitRecord->codedamount != '' ? $visitRecord->codedamount : 0) }}"
                                                                                                                            style="width:75px;{{ $visitRecord->billingamount == '' && $visitRecord->codedamount != '' ? 'color:#1200fe;' : '' }}">
                                                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                                    {{ $visitRecord->codedamount != '' ? 'Coded: $' . $visitRecord->codedamount : 'Not coded' }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Insurance Paid: </td>
                                                                                                                <td>{{ $visitRecord->billingpaid != '' ? $visitRecord->billingpaid : 'Not listed' }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                        <table width="100%">
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <b>Notes:</b>
                                                                                                                    <Br>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td align="left" valign="middle">
                                                                                                                                        <textarea id="billingnotes{{ $visitRecord->id }}"
                                                                                                                                                  style="width:320px;height:50px">{{ $visitRecord->billingnotes }}</textarea>
                                                                                                                </td>
                                                                                                                <td align="center">
                                                                                                                    <button type="button" class="btn p-0"
                                                                                                                            onclick="submitBilling({{ $visitRecord->id }})">
                                                                                                                        <img src={{ asset('nlimages/submitbutton.png') }}
                                                                                                                                alt="Submit">
                                                                                                                    </button>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                @endif


                                                                                            </td>
                                                                                            <td class="border-bottom">
                                                                                                {{-- <a href="javascript:encountersubmit({{ $record->id }},'{{ $visitRecord->encounterdate }}','soap.php?p=subjective')" id="encounterlink{{ $visitRecord->id }}"> --}}
                                                                                                <a href="{{ url('subjective/'.$record->id) }}" id="encounterlink{{ $visitRecord->id }}">
                                                                                                    {{ $visitRecord->encounterdate }}
                                                                                                </a>
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            </td>
                                                                                            <td class="border-bottom">
                                                                                                @if ($visitRecord->payment == 'partial')
                                                                                                    @php
                                                                                                        $paysrc='paymentpartial';
                                                                                                    @endphp
                                                                                                @elseif($visitRecord->payment=='full')
                                                                                                    @php
                                                                                                        $paysrc ='paymentfull';
                                                                                                    @endphp
                                                                                                @else
                                                                                                    @php
                                                                                                        $paysrc='paymentwaiting';
                                                                                                    @endphp
                                                                                                @endif

                                                                                                    {{--<span>{{$visitRecord->payment}}</span>--}}
                                                                                                @if ($record->paymenttype == 'Cash' || $visitRecord->billing == 'complete')
                                                                                                    <div style="position:relative;">
                                                                                                        <img src="{{asset('/nlimages/billing/'.$paysrc.'.png')}}" width="15" height="15"
                                                                                                             style="display:inline;"
                                                                                                             onmouseover="previewbp({{ $visitRecord->id }},'payment','on')"
                                                                                                             onmouseout="previewbp({{ $visitRecord->id }},'payment','off')"
                                                                                                             onclick="showbp('{{ $visitRecord->id }}','payment','{{ $visitRecord->payment }}','{{ $visitRecord->patient_id }}')">
                                                                                                        @if ($visitRecord->paymentnotes == '')
                                                                                                            <img src="{{asset('images/spacer.png')}}" width="15" height="15">
                                                                                                        @else
                                                                                                            <img src={{asset("nlimages/notes.png")}} width="15" height="15">
                                                                                                        @endif
                                                                                                        <img src="{{asset('images/spacer.png')}}" id="metdeductible{{ $visitRecord->id }}" width="15"
                                                                                                             height="15">
                                                                                                        <img src="{{asset('images/spacer.png')}}" id="cashpaid{{ $visitRecord->id }}" width="15" height="15">
                                                                                                        <div style="text-align:left;position:absolute;top:23px;left:-200px;min-height:370px;min-width:500px;display:none;background-color:#ebf5e5;border:1px solid #15b100;z-index:1;padding:15px;"
                                                                                                             id="payment{{ $visitRecord->id }}">
                                                                                                            <table width="100%">
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <b>Payment</b>:
                                                                                                                        {{ $visitRecord->encounterdate }}
                                                                                                                        <br><Br>
                                                                                                                    </td>
                                                                                                                    <td class="text-center">
                                                                                                                        <input type="radio"
                                                                                                                               id="paymentwaiting{{ $visitRecord->id }}"
                                                                                                                               value="waiting"
                                                                                                                               name="paymentStatus{{$visitRecord->id}}"
                                                                                                                                {{ $visitRecord->payment == 'waiting' || $visitRecord->payment == '' ? 'checked' : '' }}>
                                                                                                                        Waiting
                                                                                                                        <input type="radio"
                                                                                                                               id="paymentpartial{{ $visitRecord->id }}"
                                                                                                                               value="partial"
                                                                                                                               name="paymentStatus{{$visitRecord->id}}"
                                                                                                                                {{ $visitRecord->payment == 'partial' ? 'checked' : '' }}>
                                                                                                                        Partial
                                                                                                                        <input type="radio"
                                                                                                                               id="paymentfull{{ $visitRecord->id }}"
                                                                                                                               value="full"
                                                                                                                               name="paymentStatus{{$visitRecord->id}}"
                                                                                                                                {{ $visitRecord->payment == 'full' ? 'checked' : '' }}>
                                                                                                                        Full<Br><Br>
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <img src={{ asset('images/delete.png') }}
                                                                                                                                onclick="showbp('{{ $visitRecord->id }}','payment')">
                                                                                                                        <br><br>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Claim #:
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        {{ $visitRecord->billingclaimnumber != '' ? $visitRecord->billingclaimnumber : 'Not listed' }}
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>Date Sent: </td>
                                                                                                                    <td>{{ $visitRecord->billingdatesent != '' ? $visitRecord->billingdatesent : 'Not listed' }}
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>Billed Amount: </td>
                                                                                                                    <td>
                                                                                                                        {{ $visitRecord->billingamount != '' ? '$' . $visitRecord->billingamount : 'Not listed' }}
                                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                                        {{ $visitRecord->codedamount != '' ? 'Coded: $' . $visitRecord->codedamount : 'Not coded' }}
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Insurance Payment:
                                                                                                                        <br>
                                                                                                                        <div id="paidto{{ $visitRecord->id }}">
                                                                                                                            <Br>
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        $ <input id="billingpaid{{ $visitRecord->id }}"
                                                                                                                                 value="{{ $visitRecord->billingpaid }}">
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </table>
                                                                                                            <table width="100%">
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        <b>Notes:</b>
                                                                                                                        <Br>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td align="left" valign="middle">
                                                                                                                                            <textarea
                                                                                                                                                    id="paymentnotes{{ $visitRecord->id }}"
                                                                                                                                                    style="width:320px;height:50px">{{ $visitRecord->paymentnotes }}</textarea>
                                                                                                                    </td>
                                                                                                                    <td align="center">
                                                                                                                        <button type="button" class="btn p-0">
                                                                                                                            <img src={{ asset('nlimages/submitbutton.png') }}
                                                                                                                                    alt="Submit"
                                                                                                                                 onclick="paymentSumbit('{{ $visitRecord->id }}')">
                                                                                                                        </button>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </table>
                                                                                                            <br>
                                                                                                            @php
                                                                                                                $ytdpaid=0;
                                                                                                                $metdeductible=true;
                                                                                                                if($printyear){
                                                                                                                    $ytdpaid=0;
                                                                                                                    $metdeductible=false;
                                                                                                                }
                                                                                                                $thispaid=str_replace('$','',$visitRecord->billingpaid);
                                                                                                                $ytdpaid+=(float) $thispaid;
                                                                                                                //$deductibleyears=explode('%SE%',$record['billingdeductibleyear']);
                                                                                                                $deductibleyears=explode('%SP%',$record->billingdeductibleyear);
                                                                                                                //$billingdeductibles=explode('%SE%',$record['billingdeductible']);
                                                                                                                $billingdeductibles=explode('%SP%',$record->billingdeductible);
                                                                                                                (float) $deductible=0;
                                                                                                                for($di=0;$di<sizeof($deductibleyears);$di++){
                                                                                                                    if($deductibleyears[$di]==$visitRecord->dateyear){
                                                                                                                        (float) $deductible=$billingdeductibles[$di];
                                                                                                                    }
                                                                                                                }
                                                                                                                if(!(float) $deductible){
                                                                                                                    if($record->insnetwork=='in')
                                                                                                                        (float)$deductible=str_replace('$','',$record->insindeductible);
                                                                                                                    else
                                                                                                                        (float)$deductible=str_replace('$','',$record->insoutdeductible);
                                                                                                                }
                                                                                                                $deductible=str_replace('$','',$record->billingdeductible);
                                                                                                                if(!(float) $deductible){
                                                                                                                    $insoutdeductible=explode('%SE%',$record->insoutdeductible);
                                                                                                                    $insoutdeductible=$insoutdeductible[0];
                                                                                                                    (float)
                                                                                                                    $deductible=str_replace('$','',$insoutdeductible);
                                                                                                                }
                                                                                                                if($ytdpaid>=(float) $deductible){
                                                                                                                    $paidtooffice=$ytdpaid-(float) $deductible;
                                                                                                                    $paidtodeductible=(float) $deductible;
                                                                                                                    $deductibleremaining=0;
                                                                                                                } else{
                                                                                                                    $paidtooffice=0;
                                                                                                                    $paidtodeductible=$ytdpaid;
                                                                                                                    $deductibleremaining=(float) $deductible-$ytdpaid;
                                                                                                                }
                                                                                                            @endphp
                                                                                                            &nbsp;&nbsp;&nbsp;
                                                                                                            <b>On this date:</b>
                                                                                                            <br>YTD insurance
                                                                                                            paid: $ <strong>{{ $ytdpaid }}</strong>
                                                                                                            <br>
                                                                                                            Of <strong>$ </strong> deductible, $
                                                                                                            <strong>{{ $paidtodeductible }}</strong> has
                                                                                                            been paid.
                                                                                                            <strong>
                                                                                                                $ {{ $deductibleremaining }}</strong>
                                                                                                            remaining<br>
                                                                                                            <strong>$ {{ $paidtooffice }}</strong> has
                                                                                                            been paid year to
                                                                                                            date to office.<br>
                                                                                                            @php
                                                                                                                if($thispaid!=''){
                                                                                                                    $paidto='';
                                                                                                                    if($ytdpaid>(float) $deductible&&$thispaid<=$ytdpaid-(float) $deductible){
                                                                                                                        echo 'Of the <strong>$ ' .$thispaid.'</strong>
                                                                                                                        for this
                                                                                                                        visit, the entire amount was paid to
                                                                                                                        Up2Speed.';
                                                                                                                        $paidto='Up2Speed';
                                                                                                                    }
                                                                                                                    if($ytdpaid>(float)$deductible&&$thispaid>$ytdpaid-(float)$deductible) {
                                                                                                                        echo 'Of the <strong>$'.$thispaid.'</strong> for this visit, <strong>$'
                                                                                                                            .($thispaid-($ytdpaid-(float)$deductible))
                                                                                                                            .'</strong> went to the deductible, and <strong>$ '
                                                                                                                            .($ytdpaid-(float)$deductible)
                                                                                                                            .'</strong> went to Up2Speed.';
                                                                                                                        $paidto='Both';
                                                                                                                    }
                                                                                                                    if($ytdpaid<=(float) $deductible) {
                                                                                                                        echo 'Of the <strong>$' .$thispaid.'</strong> for this visit, <strong>$ '
                                                                                                                            .$thispaid
                                                                                                                            .'</strong> went to the deductible.';
                                                                                                                        $paidto='Deductible';
                                                                                                                    }
                                                                                                                    if($paidto!='')
                                                                                                                        echo '<script> document.getElementById( "paidto'.$visitRecord->id.'").innerText = "('.$paidto.')"; </script> ';
                                                                                                                    if($paidto=='Both'||($ytdpaid>(float)$deductible&&!$metdeductible)){
                                                                                                                        echo '<script> document.getElementById( "metdeductible'.$visitRecord->id
                                                                                                                            .'" ).src = root+"/nlimages/manageicons/metdeductible.png?time=true"; </script>';
                                                                                                                        $metdeductible=true;
                                                                                                                    }
                                                                                                                    if(($metdeductible||$ytdpaid>(float)$deductible)&&$thispaid!=''&&$thispaid!='0'&&$thispaid!='$0'){
                                                                                                                        echo '<script> document.getElementById( "cashpaid'.$visitRecord->id
                                                                                                                            .'" ).src = root+"/nlimages/manageicons/cashpaid.png";</script>';
                                                                                                                    }
                                                                                                                }
                                                                                                            @endphp
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif



                                                                                            </td>
                                                                                            <td class="border-bottom">
                                                                                                <img src={{asset('images/spacer.png')}} width="65" height="3">
                                                                                            </td>
                                                                                            <td class="border-bottom">
                                                                                                <img src={{asset('images/spacer.png')}} width="65" height="3">
                                                                                            </td>
                                                                                            <td class="border-bottom">
                                                                                                <img src={{asset('images/spacer.png')}} width="65" height="3">
                                                                                            </td>
                                                                                            <td class="border-bottom">
                                                                                                <img src={{asset('images/spacer.png')}} width="65" height="3">
                                                                                            </td>
                                                                                            <td class="border-bottom text-left" valign="middle">
                                                                                                <table cellspacing="0" cellpadding="0">
                                                                                                    <tr>
                                                                                                        <td width="20" align="center" align="center">
                                                                                                            <a
                                                                                                                    href="{{ route('progressNotes', [$record->id, "$visitRecord->id"]) }}">
                                                                                                                <img src={{ asset('nlimages/notesnew.png') }}
                                                                                                                        height="20" class="no-print" style="display:inline">
                                                                                                            </a>
                                                                                                        </td>
                                                                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                                                        <td width="20" align="center">
                                                                                                            <a
                                                                                                                    href="{{ route('assessmentICD', [$record->id, $visitRecord->id]) }}">
                                                                                                                <img src={{ asset('nlimages/progressnew.png') }}
                                                                                                                        height="20" class="no-print" style="display:inline">
                                                                                                            </a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                            <td class="border-bottom text-center">
                                                                                                <button type="button" class="btn p-0" onclick="deleteVisit('{{ $visitRecord->id }}', '{{ $visitRecord->encounterdate }}')">
                                                                                                    <img src={{ asset('nlimages/deletenew.png') }} height="20" class="no-print">
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @empty
                                                                                        <tr>
                                                                                            <td class="text-center">
                                                                                                <h3>
                                                                                                    No Visits
                                                                                                </h3>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforelse
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        @else
                                                                            <h3 class="text-center">
                                                                                No Visits
                                                                            </h3>
                                                                        @endif
                                                                    </div>
                                                                @empty
                                                                    <h3 class="text-center">
                                                                        No Visits
                                                                    </h3>
                                                                @endforelse
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </center>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </td>
                        <td width="10%" align="center">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <br>
            <br>
            <center>
                <table class="no-print" width="80%">
                    <tbody>
                    <tr>
{{--                        <td width="100%" align="right">--}}
{{--                            <img src="{{ asset('nlimages/showallbutton.png') }}" onclick="javascript:showall()">--}}
{{--                            <img src="{{ asset('nlimages/hideallbutton.png') }}" onclick="javascript:hideall()">--}}
{{--                        </td>--}}
                        <td>

{{--                            This is Where The Paginator Goes!--}}

                            {{ $sp->appends(Request::except('page')) }}

{{--                            @foreach ($starPriority as $pKey=>$sp)--}}
{{--                                @foreach ($sp as $index => $record)--}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>
<script>
    if (window.innerWidth < 1280) {
        document.getElementById('tdpatientvisit').style.textAlign = 'center';
        if (document.getElementById('visitlist')) document.getElementById('visitlist').style.top = '69px';
        document.getElementById('sidebar').style.top = '72px';
        document.getElementById('mainmenutable').style.height = '70px';
    }

</script>
<script>
    function goToManage(e) {
        window.location = "/edit/" + e.currentTarget.value;
    }

</script>
<script>
    function changebg(id, onoff, coding) {
        if (id != active) {
            if (onoff == 'on') document.getElementById(id + 'td').style.backgroundImage =
                'url(/nlimages/navbg' + coding + 'on.png)';
            if (onoff == 'off') document.getElementById(id + 'td').style.backgroundImage =
                'url(/nlimages/navbg' + coding + '.png)';
        }
    }

</script>

<script src="{{asset('js/patients.js')}}"></script>
<script>
    function autocomplete(inp, arr, div) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + div + "-list");
            a.setAttribute("class", div + "-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val
                    .toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val
                        .length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[
                        i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName(
                            "input")[0].value;
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
            var x = document.getElementById(this.id + div + "-list");
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
            x[currentFocus].classList.add(div + "-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove(div + "-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName(div + "-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function(e) {
            closeAllLists(e.target);
        });
    }

</script>
