<html>

<head>
    <link href="{{ asset('/styles.css') }}" type="text/css" rel="stylesheet">
</head>

<body class="font" style="margin:0;padding:0;">
    <div style="position:fixed;top:0px;left:0px;z-index:1;width:100%">
        <table id="mainmenutable"
            style="background-color:#5f5f61;color:white;background-image:url('//nlimages/headerbg.png');background-repeat:repeat-x;"
            width="100%" height="50" cellspacing="0" cellpadding="5" border="0">
            <tbody>
                <tr height="50">
                    <td style="padding:0px;" width="30%">
                        <table style="color:white;">
                            <tbody>
                                <tr style="padding:0px;">
                                    <td style="padding:0px;" width="150" valign="middle" align="center"><a
                                            href="{{ route('patient') }}"><img
                                                src="{{ asset('/nlimages/up2speedsmall.png') }}"
                                                style="display:inline;" height="50"></a></td>
                                    <td width="20"></td>
                                    <td width="50" valign="middle" align="left"><a href="{{ route('logout') }}"><img
                                                src="{{ asset('/nlimages/logouticon.png') }}"
                                                height="60"></a></td>
                                    <td width="50" valign="middle" align="left">
                                        <a href="{{ route('patient') }}"><img
                                                src="{{ asset('/nlimages/adminicon.png') }}"
                                                height="60"></a>
                                    </td>
                                    <td width="300" align="center">Welcome,<br>Admin User</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="border-right:none;" id="tdpatientvisit" width="58%" valign="middle" align="left">
                    </td>
                    <td width="12%" align="right"><a href="{{ route('patient') }}"
                            style="color:white;font-size:18px;"><img
                                src="{{ asset('/nlimages/adminportal.png') }}" style="display:inline;"
                                width="65"></a></td>
                    <td style="border-left:none;" width="4%" align="right"><a href="{{ route('portalhome') }}"><img
                                src="{{ asset('/nlimages/home.png') }}" style="display:inline;"
                                width="65"></a></td>
                </tr>
                <tr style="height:2px;" bgcolor="#ce0205">
                    <td colspan="4" style="height:2px;padding:0px;" width="100%"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <table height="77">
        <tbody>
            <tr>
                <td><img src="{{ asset('/images/spacer.png') }}" height="77"></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td width="100" valign="top" bgcolor="#191023">
                    <img src="{{ asset('/images/spacer.png') }}" width="100" height="1">
                    <div style="position:fixed;top:77px;left:0px;width:100px;height:100%;background-color:#191023;">
                        <script>
                            function changebg(id, onoff, coding) {
                                if (onoff == 'on') document.getElementById(id + 'tr').style.backgroundColor = 'red';
                                if (onoff == 'off') document.getElementById(id + 'tr').style.backgroundColor = '';
                            }

                        </script>

                        <table style="background-color:#191023;" width="100" cellspacing="0" cellpadding="5" border="0">
                            <tbody>
                                <tr onmouseover="changebg('portalhome.php','on');"
                                    onmouseout="changebg('portalhome.php','off')" height="100">
                                    <td style="padding:10px;" "="" width=" 100" valign="middle" height="100"
                                        align="center">
                                        <a href="{{ route('portalhome') }}"
                                            style="color:white;text-decoration:none;font-size:12px;top:10px;">
                                            <div id="portalhome.phptr"
                                                style="vertical-align:middle;width:100%;height:80px;padding:0px;">
                                                <br><img src="{{ asset('/nlimages/portal/dashboard.png') }}"
                                                    style="display:inline;" height="30"> <br>
                                                <div style="position:relative;top:10px;">Dashboard</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr height="100">
                                    <td style="padding:10px;" "="" width=" 100" valign="middle" height="100"
                                        align="center">
                                        <a href="" style="color:white;text-decoration:none;font-size:12px;top:10px;">
                                            <div id="portalprofile.phptr"
                                                style="vertical-align:middle;width:100%;height:80px;padding:0px;background-color:red;">
                                                <br><img
                                                    src="{{ asset('/nlimages/portal/profileactive.png') }}"
                                                    style="display:inline;" height="30"> <br>
                                                <div style="position:relative;top:10px;">Profile</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr onmouseover="changebg('portalreports.php','on');"
                                    onmouseout="changebg('portalreports.php','off')" height="100">
                                    <td style="padding:10px;" "="" width=" 100" valign="middle" height="100"
                                        align="center">
                                        <a href="" style="color:white;text-decoration:none;font-size:12px;top:10px;">
                                            <div id="portalreports.phptr"
                                                style="vertical-align:middle;width:100%;height:80px;padding:0px;">
                                                <br><img src="{{ asset('/nlimages/portal/reports.png') }}"
                                                    style="display:inline;" height="30"> <br>
                                                <div style="position:relative;top:10px;">Reports</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr onmouseover="changebg('portalpictures.php','on');"
                                    onmouseout="changebg('portalpictures.php','off')" height="100">
                                    <td style="padding:10px;" "="" width=" 100" valign="middle" height="100"
                                        align="center">
                                        <a href="" style="color:white;text-decoration:none;font-size:12px;top:10px;">
                                            <div id="portalpictures.phptr"
                                                style="vertical-align:middle;width:100%;height:80px;padding:0px;">
                                                <br><img src="{{ asset('/nlimages/portal/picture.png') }}"
                                                    style="display:inline;" height="30"> <br>
                                                <div style="position:relative;top:10px;">Picture</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr onmouseover="changebg('portalvideos.php','on');"
                                    onmouseout="changebg('portalvideos.php','off')" height="100">
                                    <td style="padding:10px;" "="" width=" 100" valign="middle" height="100"
                                        align="center">
                                        <a href="" style="color:white;text-decoration:none;font-size:12px;top:10px;">
                                            <div id="portalvideos.phptr"
                                                style="vertical-align:middle;width:100%;height:80px;padding:0px;">
                                                <br><img src="{{ asset('/nlimages/portal/video.png') }}"
                                                    style="display:inline;" height="30"> <br>
                                                <div style="position:relative;top:10px;">Video</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr onmouseover="changebg('portalforms.php','on');"
                                    onmouseout="changebg('portalforms.php','off')" height="100">
                                    <td style="padding:10px;" "="" width=" 100" valign="middle" height="100"
                                        align="center">
                                        <a href="portalforms.php"
                                            style="color:white;text-decoration:none;font-size:12px;top:10px;">
                                            <div id="portalforms.phptr"
                                                style="vertical-align: middle; width: 100%; height: 80px; padding: 0px;">
                                                <br><img src="{{ asset('/nlimages/portal/payments.png') }}"
                                                    style="display:inline;" height="30"> <br>
                                                <div style="position:relative;top:10px;">Payment</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr onmouseover="changebg('portalusers.php','on');"
                                    onmouseout="changebg('portalusers.php','off')" height="100">
                                    <td style="padding:10px;" "="" width=" 100" valign="middle" height="100"
                                        align="center">
                                        <a href="portalusers.php"
                                            style="color:white;text-decoration:none;font-size:12px;top:10px;">
                                            <div id="portalusers.phptr"
                                                style="vertical-align: middle; width: 100%; height: 80px; padding: 0px;">
                                                <br><img src="{{ asset('/nlimages/portal/users.png') }}"
                                                    style="display:inline;" height="30"> <br>
                                                <div style="position:relative;top:10px;">Users</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr onmouseover="changebg('portalcalendar.php','on');"
                                    onmouseout="changebg('portalcalendar.php','off')" height="100">
                                    <td style="padding:10px;" "="" width=" 100" valign="middle" height="100"
                                        align="center">
                                        <a href="" style="color:white;text-decoration:none;font-size:12px;top:10px;">
                                            <div id="portalcalendar.phptr"
                                                style="vertical-align:middle;width:100%;height:80px;padding:0px;">
                                                <br><img src="{{ asset('/nlimages/portal//planner.png') }}"
                                                    style="display:inline;" height="30"> <br>
                                                <div style="position:relative;top:10px;">Planner</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr onmouseover="changebg('','on');" onmouseout="changebg('','off')" height="100">
                                    <td style="padding:10px;" "="" width=" 100" valign="middle" height="100"
                                        align="center">
                                        <a href="{{ route('logout') }}"
                                            style="color:white;text-decoration:none;font-size:12px;top:10px;">
                                            <div id="logout.phptr"
                                                style="vertical-align:middle;width:100%;height:80px;padding:0px;">
                                                <br><img src="{{ asset('/nlimages/portal/logout.png') }}"
                                                    style="display:inline;" height="30"> <br>
                                                <div style="position:relative;top:10px;">Logout</div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td id="viewport" width="100%" valign="top" align="left">
                    <table width="100%" cellpadding="10 ">
                        <tbody>
                            <tr>
                                <td width="100%" valign="top">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
