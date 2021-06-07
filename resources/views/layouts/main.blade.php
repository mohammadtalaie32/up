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
                            <font size="+1">Please select a patient to begin!</font>&nbsp;&nbsp;&nbsp;<select
                                name="patientid" id="headerpatientid" style="width:150px" onchange="goToManage(event);">
                                <option value="" selected="">Select...</option>
                                @foreach ($records as $record)
                                    <option value="{{ $record->id }}">
                                        {{ $record->firstname }}, {{ $record->lastname }} <br>
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td width="12%" align="right">
                        <a href="{{ route('portalhome') }}" style="color:white;font-size:18px;">
                            <img src="{{ asset('/nlimages/patientportal.png') }}" style="display:inline;" width="65">
                        </a>
                    </td>
                    @hasSection ('nav-item')
                        @yield('nav-item')
                    @endif
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
                                    <td class="side-link" id="age.phptd" onmouseover="changebg('age.php','on','patient');" onmouseout="changebg('age.php','off','patient')" align="center">
                                        @if(Route::current() == 'patients') <b> @endif
                                            <a href="{{ route('patient') }}" style="color:black;text-decoration:none;">
                                                <div style="width:100%;height:100%">All Patients</div>
                                            </a>
                                        @if(Route::current() == 'patients') </b> @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr height="35">
                                    <td class="side-link" id="patient.phptd" align="center">
                                        @if(Request::is('newpatient')) <b> @endif
                                            <a href="{{ route('newpatient') }}"
                                                style="color:black;text-decoration:none;">
                                                <div style="width:100%;height:100%">New Patient </div>
                                            </a>
                                            @if(Request::is('newpatient')) </b> @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr height="35">
                                    <td class="side-link"
                                        id="eduler.phptd" onmouseover="changebg('eduler.php','on','patient');"
                                        onmouseout="changebg('eduler.php','off','patient')" align="center">
                                        @if(Request::is('scheduler')) <b> @endif
                                            <a href="{{ route('scheduler') }}" style="color:black;text-decoration:none;">
                                                <div style="width:100%;height:100%">Scheduler</div>
                                            </a>
                                        @if(Request::is('scheduler')) </b> @endif
                                    </td>
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
                    @yield('content')
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
@hasSection ('scripts')
    @yield('scripts')
@endif
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
        window.location = "manage/" + e.currentTarget.value;
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
