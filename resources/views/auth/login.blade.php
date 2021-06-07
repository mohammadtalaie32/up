<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('/styles.css') }}" type="text/css" rel="stylesheet" />
<body class="font" onLoad="javascript:scrollintoview('')" style="margin:0;padding:0;">
    <div style="position:fixed;top:0px;left:0px;z-index:1">
        <table width="100%" height="52" border=0 cellspacing=0 cellpadding=5 style="background-color:#5f5f61;color:white;">
            <tr height="50">
                <td>
                    <a href="">
                        <img src="{{ asset('/nlimages/up2speedsmall.png') }}" width="116" height="30"></a>
                    </td>
                    <td width="90%" align="center" style="border-right:none;" valign="middle"></td>
                    <td width="10%" align="right" style="border-left:none;"></td>
            </tr>
        </table>
    </div>
    <table width="100%" height="100%" cellspacing="0" cellpadding="0" bgcolor="#f1f1f1">
        <tr width="100%" height="100%">
            
            <td width="100%" height="100%" valign="middle" align="center">
                <div style="width:800px;height:495px;background-image:url('/nlimages/rounded.png');">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <input type="hidden" name="submit" value="true">
                        <br><br><br>
                        {{-- background, border-radius, padding-bottom, padding-top added by Gonesh Chandra Das --}}
                        <table width="785" style="background: #cecece;     border-radius: 45px;     padding-bottom: 61px;     padding-top: 45px;"><tr><td width="100%" align="center" bgcolor="#f1f1f1"><hr><font size="+2">Login</font><hr></td></tr>
                        <tr><td><br><br><br></td></tr>
                        
                        <tr><td align="center" width="100%">
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block" style="width: 35%; color: red;">
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <table width="300" bgcolor="white" style="border:1px black solid;">
                                <tr><td colspan="2" align="center"><br><br><br></td></tr>
                                <tr><td align="right" width="50%">Username: </td><td> <input name="username" style="width:100px;" autofocus required="Please Enter Username"></td></tr>
                                <tr><td align="right" width="50%">Password: </td><td> <input type="password" name="password" style="width:100px;" required="Please Enter Pasword"></td></tr>
                                <tr><td colspan="2" align="center"><input type="checkbox" name="remember" value="true" id="remember"> Remember me</td></tr>
                                <tr><td colspan="2"><br></td></tr>
                                <tr><td colspan="2" align="center"><input type="image" src="{{ asset('/nlimages/loginbutton.png') }}"></td></tr>
                                <tr><td colspan="2"><br><br></td></tr>
                            </table>
                        </td></tr></table><br><br><br>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</body>   