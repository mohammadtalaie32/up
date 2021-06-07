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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script>
        $(function() {
            csrf = $('input[name ="_token"]').val();
        });

    </script>
    <link href="{{ asset('css/styles.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/functions.js') }}"></script>
    <script src="{{ asset('js/manage.js') }}"></script>
</head>

<body>
    {{-- Navigation Bar --}}
    <div style="position:fixed;top:0px;left:0px;right:0;z-index:1;width:100%;">
        <table background="{{ asset('/nlimages/headerbg.png') }}" id="mainmenutable"
            style="background-color:#5f5f61;color:white;background-repeat:repeat-x;" width="100%" height="50"
            cellspacing="0" cellpadding="5" border="0">
            <tbody>
                <tr height="50">
                    <td style="padding:0px;" width="30%">
                        <table style="color:white;">
                            <tbody>
                                <tr style="padding:0px;">
                                    <td style="padding:0px;" width="150" valign="middle" align="center">
                                        <a href="{{ route('patient') }}">
                                            <img src="{{ asset('/nlimages/up2speedsmall.png') }}"
                                                style="display:inline;" height="50">
                                        </a>
                                    </td>
                                    <td width="20"></td>
                                    <td width="50" valign="middle" align="left">
                                        <a href="{{ route('logout') }}">
                                            <img src="{{ asset('/nlimages/logouticon.png') }}" height="60">
                                        </a>
                                    </td>
                                    <td width="50" valign="middle" align="left">
                                        <a href="{{ route('admin') }}">
                                            <img src="{{ asset('/nlimages/adminicon.png') }}" height="60">
                                        </a>
                                    </td>
                                    <td width="300" align="center">Welcome,<br>Admin User</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="border-right:none;" id="tdpatientvisit" width="50%" valign="middle" align="center">
                        <input type="hidden" name="page" value="patientinfo.php">
                        <input type="hidden" name="gotodate">
                        <input type="hidden" name="encounterviewyear">
                        <input type="hidden" name="markbilling">
                        <table>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td width="10">
                                        @php
                                        $icon;
                                        $pi;
                                        $data->paymenttype = str_replace_array("%SE%", [''], $data->paymenttype);
                                        @endphp
                                        @if ($data->paymenttype != '')
                                            @if ($data->paymenttype == 'Insurance')
                                                @php
                                                $icon = 'insuranceicon';
                                                $pi = '';
                                                @endphp
                                                @if ($data->pitype != '')
                                                    @php
                                                    $icon = 'piicon';
                                                    $pi = "Insurance is: $data->pitype"
                                                    @endphp
                                                @endif
                                                <img src={{ asset("nlimages/manageicons/$icon.png") }} width="35"
                                                    height="35">
                                            @else
                                                @if ($data->paymenttype == 'Cash')
                                                    <img src={{ asset('nlimages/manageicons/cashicon.png') }} width="35"
                                                        height="35">
                                                @endif
                                            @endif
                                        @else
                                            <img src="{{ asset('/nlimages/spacer.png') }}" width="35" height="35">
                                        @endif
                                    </td>
                                    <td style="color:white;">
                                        <font size="+1">
                                            <strong>Patient selected:</strong>
                                            {{ $data->lastname }}, {{ $data->firstname }}&nbsp;&nbsp;
                                            <a href="{{ route('patient') }}">
                                                <img src="{{ asset('/nlimages/checkwhitebox.png') }}"
                                                    style="display:in-line;position:absolute;top:22px;" height="30">
                                            </a>
                                            &nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div style="display:inline;position:relative;"> <strong>Visit: </strong>
                                                <select name="pick" onchange="javascript:pickencounter();">
                                                    <option value="" selected="">Select</option>
                                                    @foreach ($visits as $visit)
                                                        <option value="{{ $visit->id }}">
                                                            {{ $visit->datemonth }}/{{ $visit->dateday }}/{{ $visit->dateyear }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <img src="{{ asset('/nlimages/calendar.png') }}"
                                                    onclick="showvisitdates()"
                                                    style="display:in-line;position:absolute;top:-6px;" height="30">
                                                @if (count($visits) == 0)
                                                    <div style="position:absolute;width:300;top:107px;left:0px;background-color:#f1f1f1;display:none;color:black;border:2px solid #d9d9d9;z-index:1;text-align:center;"
                                                        id="visitdropdown"></div>
                                                @else
                                                    <div style="position:absolute;width:300;top:107px;left:0px;background-color:#f1f1f1;display:none;color:black;border:2px solid #d9d9d9;z-index:1;text-align:center;"
                                                        id="visitdropdown">
                                                        @foreach ($visits as $visit)
                                                            <b>#1:</b>
                                                            <img src="{{ asset('/nlimages/radioactive.png') }}"
                                                                height="14">
                                                            {{ $visit->datemonth }}/{{ $visit->dateday }}/{{ $visit->dateyear }}
                                                            <a
                                                                href="javascript:pickanencounter('04/09/2020','editvisits.php')"><img
                                                                    src="{{ asset('/nlimages/edit.png') }}"
                                                                    height="14"></a><br>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </font>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="12%" align="right">
                        <a href="{{ route('portalhome') }}" style="color:white;font-size:18px;">
                            <img src="{{ asset('/nlimages/patientportal.png') }}" style="display:inline;" width="65">
                        </a>
                    </td>
                    <td style="border-left:none;" width="4%" align="right">
                        <a href="{{ route('patient') }}">
                            <img src="{{ asset('/nlimages/home.png') }}" style="display:inline;" width="65">
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
                                                        <a href="{{ URL::to('/newencounter/' . $data->id) }}">
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
                                <tr>
                                    <td align=" center">
                                        <img src="{{ asset('/nlimages/patientinformation.png') }}">
                                    </td>
                                </tr>
                                <tr height="35">
                                    <td class="side-link {{ Route::current()->getName() == 'edit' ? 'active' : '' }}"
                                        id="ientinfo.phptd" align="center">
                                        <b>
                                            <a href="{{ route('edit', $data->id) }}"
                                                style="color:white;text-decoration:none;">
                                                <div style="width:100%;height:100%">Patient Info</div>
                                            </a>
                                        </b>
                                    </td>
                                </tr>
                                <tr height="35">
                                    <td class="side-link {{ Route::current()->getName() == 'familyhistory' ? 'active' : '' }}"
                                        align="center">
                                        <a href="{{ route('familyhistory', $data->id) }}"
                                            style="color:white;text-decoration:none;">
                                            <div style="width:100%;height:100%">Family History</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr height="35">
                                    <td class="side-link {{ Route::current()->getName() == 'socialhistory' ? 'active' : '' }}"
                                        align="center">
                                        <a href="{{ route('socialhistory', $data->id) }}"
                                            style="color:white;text-decoration:none;">
                                            <div style="width:100%;height:100%">Social History</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr height="35">
                                    <td class="side-link
                                             {{ Route::current()->getName() == 'preexistingconditions' ? 'active' : '' }}"
                                        align="center">
                                        <a href="{{ URL::to('/preexistingconditions/' . $data->id) }}"
                                            style="color:white;text-decoration:none;">
                                            <div style="width:100%;height:100%">Pre-Existing Conditions</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr height="35">
                                    <td class="side-link {{ Route::current()->getName() == 'insuranceinfo' ? 'active' : '' }}"
                                        align="center">
                                        <a href="{{ URL::to('/insuranceinfo/' . $data->id) }}"
                                            style="color:white;text-decoration:none;">
                                            <div style="width:100%;height:100%">Insurance Info</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr height="35">
                                    <td class="side-link {{ Route::current()->getName() == 'billing' ? 'active' : '' }}"
                                        align="center">
                                        <a href="{{ route('billing', $data->id) }}"
                                            style="color:white;text-decoration:none;">
                                            <div style="width:100%;height:100%">Billing</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <img src="{{ asset('/nlimages/visitinformation.png') }}">
                                    </td>
                                </tr>
                             
                                    <tr height="35">
      <td class="tdbg1" background ="{{ asset('nlimages/navbg.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center"><a href="{{ URL::to('/subjective/'.$data->id) }}" style="color:white;text-decoration:none;">

        <div style="width:100%;height:100%">Subjective</div></a></td></tr>
		<tr height="35"><td class="tdbg1" background ="{{ asset('nlimages/navbgactive.png')}}"style="background-repeat:no-repeat;background-position:center;" align="center">
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

          <tr height="35"><td class="tdbg" background="{{ asset('nlimages/navbgpatient.png') }}" style="background-repeat:no-repeat;background-position:center;" align="center"><a href="{{URL::to('/scheduler1/'.$data->id) }}" style="color:white;text-decoration:none;"><div style="width:100%;height:100%">Scheduler</div></a></td></tr>
                           
                                @empty($dateTabs)
                                    <td>
                                        <h5 class="text-muted text-center">
                                            Select a Visit to show options
                                        </h5>
                                    </td>
                                @endempty
                            </tbody>
                        </table>
                    </div>
                </td>
                <td id="viewport" width="100%" valign="top" align="left">
                   
                    <div style="text-align:left;position:fixed;top:107px;right:0px;min-height:330px;width:320px;display:none;background-color:#ebf5e5;border:1px solid #15b100;z-index:+2;padding:15px;"
                        id="headerbp">
                    </div>
                    <div class="alert alert-light shadow-lg fixed-top alert-dismissible fade show"
                        style="top:25px;left:35%;right:20%;display:none;z-index:5" id="alertDiv" role="alert">
                        <span id="billAlert"></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @yield('content')
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
<script>
    if (window.innerWidth < 1280)
        document.getElementById('tdpatientvisit').style.textAlign = 'center';

    function showvisitdates() {
        if (document.getElementById('visitdropdown').style.display == 'none')
            document.getElementById('visitdropdown').style.display = 'block';
        else if (document.getElementById('visitdropdown').style.display == 'block')
            document.getElementById('visitdropdown').style.display = 'none';
    }

</script>
