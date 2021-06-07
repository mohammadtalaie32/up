@extends('layouts.main')

@section('content')
@section('nav-item')
    <td style="border-left:none;" width="4%" align="right">
        <a href="{{ route('patient') }}">
            <img src="{{ asset('/nlimages/home.png') }}" style="display:inline;" width="65">
        </a>
    </td>
@endsection
    <form name="encform" action="manage.php" method="post">
        <table width="100%" cellpadding="10 ">
            <tbody>
                <tr>
                    <td width="100%" valign="top">
                        <script>
                            if (window.innerWidth < 1280) {
                                if (document.getElementById('visitlist')) document.getElementById(
                                    'visitlist').style.top = '69px';
                                document.getElementById('sidebar').style.top = '72px';
                                document.getElementById('mainmenutable').style.height = '70px';
                            }

                        </script>
                        <script>
                            function selectview(view) {
                                document.getElementById('schedulerview').value = view;
                                document.viewform.submit();
                            }

                        </script>
                        <form action="scheduler.php" method="post" name="viewform">
                            <input type="hidden" name="schedulerview" id="schedulerview">
                            <input type="hidden" name="scrollto" id="scrollto3" value="1000">
                            <table style="border-bottom:1px solid #696969;" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="border-bottom:3px solid #4cc4bd" width="100" valign="top" height="40"
                                            align="center"><a style="text-decoration:none;color:#4cc4bd;font-size:24px;"
                                                href="javascript:selectview('day');">Day</a></td>
                                        <td width="100" valign="top" align="center"><a
                                                style="text-decoration:none;color:#696969;font-size:24px;"
                                                href="javascript:selectview('week');">Week</a></td>
                                        <td width="100" valign="top" align="center"><a
                                                style="text-decoration:none;color:#696969;font-size:24px;"
                                                href="javascript:selectview('month');">Month</a></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <script>
                            function changemonth(month, year) {
                                document.getElementById('month').value = month;
                                document.getElementById('year').value = year;
                                document.schedulerform.submit();
                            }

                            function pickday(month, day, year) {
                                document.getElementById('themonth').value = month;
                                document.getElementById('theyear').value = year;
                                document.getElementById('theday').value = day;
                                document.schedulerform.submit();
                            }
                            var oldbg;

                            function changebg(onoff, theday) {
                                if (onoff == 'on') oldbg = document.getElementById(theday + 'tr').style
                                    .backgroundColor;
                                if (onoff == 'on') {
                                    if (oldbg == 'white') document.getElementById(theday + 'tr').style
                                        .backgroundColor = '#ffd5d5';
                                    else document.getElementById(theday + 'tr').style.backgroundColor =
                                        '#937070';
                                    //if(oldbg=='white') document.getElementById(theday+'tr').style.color='white';
                                }
                                if (onoff == 'off') {
                                    document.getElementById(theday + 'tr').style.backgroundColor =
                                        oldbg;
                                }
                                //if(oldbg=='white') document.getElementById(theday+'tr').style.color='black'; oldbg='';
                            }

                        </script>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td width="300" valign="top">
                                        <form action="scheduler.php" method="post" name="schedulerform">
                                            <input type="hidden" name="todelete" id="todelete">
                                            <input type="hidden" name="scrollto" id="scrollto" value="1000">
                                            <input type="hidden" name="month" id="month" value="">
                                            <input type="hidden" name="year" id="year" value="">
                                            <input type="hidden" name="themonth" id="themonth" value="">
                                            <input type="hidden" name="theyear" id="theyear" value="">
                                            <input type="hidden" name="theday" id="theday" value="">
                                            <table cellspacing="0" cellpadding="3" border="1">
                                                <tbody>
                                                    <tr>
                                                        <td align="center"><a
                                                                href="javascript:changemonth('7','20');">&lt;</a>
                                                        </td>
                                                        <td colspan="5" align="center"><b>August
                                                                2020</b></td>
                                                        <td align="center"><a
                                                                href="javascript:changemonth('9','20');">&gt;</a>
                                                        </td>
                                                    </tr>
                                                    <tr height="30">
                                                        <td id="1595779200tr"
                                                            style="background-Color:#696969;color:white;1px solid black"
                                                            onmouseover="changebg('on','1595779200');"
                                                            onmouseout="changebg('off','1595779200');"
                                                            onclick="javascript:pickday('07','26','20');" width="30"
                                                            align="center">26</td>
                                                        <td id="1595865600tr"
                                                            style="background-Color:#696969;color:white;1px solid black"
                                                            onmouseover="changebg('on','1595865600');"
                                                            onmouseout="changebg('off','1595865600');"
                                                            onclick="javascript:pickday('07','27','20');" width="30"
                                                            align="center">27</td>
                                                        <td id="1595952000tr"
                                                            style="background-Color:#696969;color:white;1px solid black"
                                                            onmouseover="changebg('on','1595952000');"
                                                            onmouseout="changebg('off','1595952000');"
                                                            onclick="javascript:pickday('07','28','20');" width="30"
                                                            align="center">28</td>
                                                        <td id="1596038400tr"
                                                            style="background-Color:#696969;color:white;1px solid black"
                                                            onmouseover="changebg('on','1596038400');"
                                                            onmouseout="changebg('off','1596038400');"
                                                            onclick="javascript:pickday('07','29','20');" width="30"
                                                            align="center">29</td>
                                                        <td id="1596124800tr"
                                                            style="background-Color:#696969;color:white;1px solid black"
                                                            onmouseover="changebg('on','1596124800');"
                                                            onmouseout="changebg('off','1596124800');"
                                                            onclick="javascript:pickday('07','30','20');" width="30"
                                                            align="center">30</td>
                                                        <td id="1596211200tr"
                                                            style="background-color: rgb(105, 105, 105); color: white;"
                                                            onmouseover="changebg('on','1596211200');"
                                                            onmouseout="changebg('off','1596211200');"
                                                            onclick="javascript:pickday('07','31','20');" width="30"
                                                            align="center">31</td>
                                                        <td id="1596297600tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1596297600');"
                                                            onmouseout="changebg('off','1596297600');"
                                                            onclick="javascript:pickday('08','1','20');" width="30"
                                                            align="center">1</td>
                                                    </tr>
                                                    <tr height="30">
                                                        <td id="1596384000tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1596384000');"
                                                            onmouseout="changebg('off','1596384000');"
                                                            onclick="javascript:pickday('08','2','20');" width="30"
                                                            align="center">2</td>
                                                        <td id="1596470400tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1596470400');"
                                                            onmouseout="changebg('off','1596470400');"
                                                            onclick="javascript:pickday('08','3','20');" width="30"
                                                            align="center">3</td>
                                                        <td id="1596556800tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1596556800');"
                                                            onmouseout="changebg('off','1596556800');"
                                                            onclick="javascript:pickday('08','4','20');" width="30"
                                                            align="center">4</td>
                                                        <td id="1596643200tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1596643200');"
                                                            onmouseout="changebg('off','1596643200');"
                                                            onclick="javascript:pickday('08','5','20');" width="30"
                                                            align="center">5</td>
                                                        <td id="1596729600tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1596729600');"
                                                            onmouseout="changebg('off','1596729600');"
                                                            onclick="javascript:pickday('08','6','20');" width="30"
                                                            align="center">6</td>
                                                        <td id="1596816000tr" style="background-color: white; color: black;"
                                                            onmouseover="changebg('on','1596816000');"
                                                            onmouseout="changebg('off','1596816000');"
                                                            onclick="javascript:pickday('08','7','20');" width="30"
                                                            align="center">7</td>
                                                        <td id="1596902400tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1596902400');"
                                                            onmouseout="changebg('off','1596902400');"
                                                            onclick="javascript:pickday('08','8','20');" width="30"
                                                            align="center">8</td>
                                                    </tr>
                                                    <tr height="30">
                                                        <td id="1596988800tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1596988800');"
                                                            onmouseout="changebg('off','1596988800');"
                                                            onclick="javascript:pickday('08','9','20');" width="30"
                                                            align="center">9</td>
                                                        <td id="1597075200tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1597075200');"
                                                            onmouseout="changebg('off','1597075200');"
                                                            onclick="javascript:pickday('08','10','20');" width="30"
                                                            align="center">10</td>
                                                        <td id="1597161600tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1597161600');"
                                                            onmouseout="changebg('off','1597161600');"
                                                            onclick="javascript:pickday('08','11','20');" width="30"
                                                            align="center">11</td>
                                                        <td id="1597248000tr" style="background-color: white; color: black;"
                                                            onmouseover="changebg('on','1597248000');"
                                                            onmouseout="changebg('off','1597248000');"
                                                            onclick="javascript:pickday('08','12','20');" width="30"
                                                            align="center">12</td>
                                                        <td id="1597334400tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1597334400');"
                                                            onmouseout="changebg('off','1597334400');"
                                                            onclick="javascript:pickday('08','13','20');" width="30"
                                                            align="center">13</td>
                                                        <td id="1597420800tr" style="background-color: white; color: black;"
                                                            onmouseover="changebg('on','1597420800');"
                                                            onmouseout="changebg('off','1597420800');"
                                                            onclick="javascript:pickday('08','14','20');" width="30"
                                                            align="center">14</td>
                                                        <td id="1597507200tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1597507200');"
                                                            onmouseout="changebg('off','1597507200');"
                                                            onclick="javascript:pickday('08','15','20');" width="30"
                                                            align="center">15</td>
                                                    </tr>
                                                    <tr height="30">
                                                        <td id="1597593600tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1597593600');"
                                                            onmouseout="changebg('off','1597593600');"
                                                            onclick="javascript:pickday('08','16','20');" width="30"
                                                            align="center">16</td>
                                                        <td id="1597680000tr" style="background-color: white; color: black;"
                                                            onmouseover="changebg('on','1597680000');"
                                                            onmouseout="changebg('off','1597680000');"
                                                            onclick="javascript:pickday('08','17','20');" width="30"
                                                            align="center">17</td>
                                                        <td id="1597766400tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1597766400');"
                                                            onmouseout="changebg('off','1597766400');"
                                                            onclick="javascript:pickday('08','18','20');" width="30"
                                                            align="center">18</td>
                                                        <td id="1597852800tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1597852800');"
                                                            onmouseout="changebg('off','1597852800');"
                                                            onclick="javascript:pickday('08','19','20');" width="30"
                                                            align="center">19</td>
                                                        <td id="1597939200tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1597939200');"
                                                            onmouseout="changebg('off','1597939200');"
                                                            onclick="javascript:pickday('08','20','20');" width="30"
                                                            align="center">20</td>
                                                        <td id="1598025600tr" style="background-color: white; color: black;"
                                                            onmouseover="changebg('on','1598025600');"
                                                            onmouseout="changebg('off','1598025600');"
                                                            onclick="javascript:pickday('08','21','20');" width="30"
                                                            align="center">21</td>
                                                        <td id="1598112000tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1598112000');"
                                                            onmouseout="changebg('off','1598112000');"
                                                            onclick="javascript:pickday('08','22','20');" width="30"
                                                            align="center">22</td>
                                                    </tr>
                                                    <tr height="30">
                                                        <td id="1598198400tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1598198400');"
                                                            onmouseout="changebg('off','1598198400');"
                                                            onclick="javascript:pickday('08','23','20');" width="30"
                                                            align="center">23</td>
                                                        <td id="1598284800tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1598284800');"
                                                            onmouseout="changebg('off','1598284800');"
                                                            onclick="javascript:pickday('08','24','20');" width="30"
                                                            align="center">24</td>
                                                        <td id="1598371200tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1598371200');"
                                                            onmouseout="changebg('off','1598371200');"
                                                            onclick="javascript:pickday('08','25','20');" width="30"
                                                            align="center">25</td>
                                                        <td id="1598457600tr"
                                                            style="background-color: rgb(159, 255, 146); color: black; border: 3px solid rgb(114, 183, 236); padding: 0px;"
                                                            onmouseover="changebg('on','1598457600');"
                                                            onmouseout="changebg('off','1598457600');"
                                                            onclick="javascript:pickday('08','26','20');" width="30"
                                                            align="center">26</td>
                                                        <td id="1598544000tr" style="background-color: white; color: black;"
                                                            onmouseover="changebg('on','1598544000');"
                                                            onmouseout="changebg('off','1598544000');"
                                                            onclick="javascript:pickday('08','27','20');" width="30"
                                                            align="center">27</td>
                                                        <td id="1598630400tr" style="background-color: white; color: black;"
                                                            onmouseover="changebg('on','1598630400');"
                                                            onmouseout="changebg('off','1598630400');"
                                                            onclick="javascript:pickday('08','28','20');" width="30"
                                                            align="center">28</td>
                                                        <td id="1598716800tr" style="background-color: white; color: black;"
                                                            onmouseover="changebg('on','1598716800');"
                                                            onmouseout="changebg('off','1598716800');"
                                                            onclick="javascript:pickday('08','29','20');" width="30"
                                                            align="center">29</td>
                                                    </tr>
                                                    <tr height="30">
                                                        <td id="1598803200tr"
                                                            style="background-Color:white;color:black;1px solid black"
                                                            onmouseover="changebg('on','1598803200');"
                                                            onmouseout="changebg('off','1598803200');"
                                                            onclick="javascript:pickday('08','30','20');" width="30"
                                                            align="center">30</td>
                                                        <td id="1598889600tr" style="background-color: white; color: black;"
                                                            onmouseover="changebg('on','1598889600');"
                                                            onmouseout="changebg('off','1598889600');"
                                                            onclick="javascript:pickday('08','31','20');" width="30"
                                                            align="center">31</td>
                                                        <td id="1598976000tr"
                                                            style="background-Color:#696969;color:white;1px solid black"
                                                            onmouseover="changebg('on','1598976000');"
                                                            onmouseout="changebg('off','1598976000');"
                                                            onclick="javascript:pickday('09','1','20');" width="30"
                                                            align="center">1</td>
                                                        <td id="1599062400tr"
                                                            style="background-Color:#696969;color:white;1px solid black"
                                                            onmouseover="changebg('on','1599062400');"
                                                            onmouseout="changebg('off','1599062400');"
                                                            onclick="javascript:pickday('09','2','20');" width="30"
                                                            align="center">2</td>
                                                        <td id="1599148800tr"
                                                            style="background-Color:#696969;color:white;1px solid black"
                                                            onmouseover="changebg('on','1599148800');"
                                                            onmouseout="changebg('off','1599148800');"
                                                            onclick="javascript:pickday('09','3','20');" width="30"
                                                            align="center">3</td>
                                                        <td id="1599235200tr"
                                                            style="background-color: rgb(105, 105, 105); color: white;"
                                                            onmouseover="changebg('on','1599235200');"
                                                            onmouseout="changebg('off','1599235200');"
                                                            onclick="javascript:pickday('09','4','20');" width="30"
                                                            align="center">4</td>
                                                        <td id="1599321600tr"
                                                            style="background-color: rgb(105, 105, 105); color: white;"
                                                            onmouseover="changebg('on','1599321600');"
                                                            onmouseout="changebg('off','1599321600');"
                                                            onclick="javascript:pickday('09','5','20');" width="30"
                                                            align="center">5</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </td>
                                    <td valign="top">
                                        <table width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="background-color:#696969;color:white;" width="100%"
                                                        align="center"><b>
                                                            Wednesday August 26th, 2020</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <script>
                                            var newshown;

                                            function hidenew() {
                                                document.getElementById('newapptdiv').style.display =
                                                    'none';
                                            }
                                            var globaltime;

                                            function newappointment(index, timeshow) {
                                                globaltime = timeshow;
                                                document.getElementById('newappttime').innerHTML =
                                                    '<center><b>' + timeshow + '</b></center>';
                                                document.getElementById('modifyapptdiv').style.display =
                                                    'none';
                                                document.getElementById('newapptdiv').style.display =
                                                    'block';
                                                var x = event.clientX; // Get the horizontal coordinate
                                                var y = event.clientY;
                                                var height = parseInt(document.getElementById(
                                                    'newapptdiv').style.height) + 25;
                                                var width = parseInt(document.getElementById(
                                                    'newapptdiv').style.width) + 25;
                                                if ((y + height) > window.innerHeight) {
                                                    y -= height;
                                                }
                                                if ((x + width) > window.innerWidth) {
                                                    x -= width;
                                                }
                                                //window.alert((y+document.getElementById('newapptdiv').offsetHeight)+'>'+window.innerHeight);
                                                document.getElementById('newapptdiv').style.left = x;
                                                document.getElementById('newapptdiv').style.top = y;
                                            }

                                            function dayhover(onoff, theday) {
                                                if (onoff == 'on') {
                                                    document.getElementById(theday + 'tr').style
                                                        .backgroundColor = '#ffd5d5';
                                                }
                                                if (onoff == 'off') {
                                                    document.getElementById(theday + 'tr').style
                                                        .backgroundColor = 'white';
                                                }
                                            }

                                            function appthover(onoff, theappt) {
                                                if (onoff == 'on') {
                                                    document.getElementById(theappt + 'apptdiv').style
                                                        .backgroundColor = 'red';
                                                }
                                                if (onoff == 'off') {
                                                    document.getElementById(theappt + 'apptdiv').style
                                                        .backgroundColor = 'pink';
                                                }
                                            }

                                            function editappointment() {
                                                endtime = globaltime.split(':');
                                                endtime[0]++;
                                                endtime = endtime.join(':');
                                                document.getElementById('starttime').value = globaltime;
                                                document.getElementById('newapptdiv').style.display =
                                                    'none';
                                                document.getElementById('apptcontainerdiv').style
                                                    .display = 'block';
                                                document.getElementById('apptdiv').style.display =
                                                    'block';

                                            }

                                            function deleteappointment() {
                                                if (window.confirm(
                                                        'Are you sure you want to delete this appointment?'
                                                    )) {
                                                    document.getElementById('todelete').value =
                                                        modifying;
                                                    document.schedulerform.submit();
                                                }
                                            }
                                            var modifying;

                                            function showmodifydropdown(i) {
                                                modifying = i;
                                                document.getElementById('newapptdiv').style.display =
                                                    'none';
                                                var x = event.clientX; // Get the horizontal coordinate
                                                var y = event.clientY;
                                                var height = parseInt(document.getElementById(
                                                    'modifyapptdiv').style.height);
                                                var width = parseInt(document.getElementById(
                                                    'modifyapptdiv').style.width);
                                                if ((y + height) > window.innerHeight) {
                                                    y -= height;
                                                }
                                                if ((x + width) > window.innerWidth) {
                                                    x -= width;
                                                }
                                                document.getElementById('modifyapptdiv').style.left = x;
                                                document.getElementById('modifyapptdiv').style.top = y;
                                                document.getElementById('modifyapptdiv').style.display =
                                                    'block';
                                            }

                                            function hidewindows() {
                                                modifying = null;
                                                document.getElementById('newapptdiv').style.display =
                                                    'none';
                                                document.getElementById('modifyapptdiv').style.display =
                                                    'none';
                                                document.getElementById('scrollto').value = document
                                                    .getElementById('daydiv').scrollTop;
                                                document.getElementById('scrollto2').value = document
                                                    .getElementById('daydiv').scrollTop;
                                                document.getElementById('scrollto3').value = document
                                                    .getElementById('daydiv').scrollTop;
                                            }

                                            function closeappointment() {
                                                document.getElementById('apptcontainerdiv').style
                                                    .display = 'none';
                                                document.getElementById('apptdiv').style.display =
                                                    'none';
                                            }

                                        </script>
                                        <div id="daydiv"
                                            style="overflow: hidden auto; display: inline-block; white-space: nowrap; width: 100%; height: 761px;"
                                            onscroll="hidewindows()">
                                            <div id="newapptdiv"
                                                style="position: absolute; width: 300px; height: 300px; border: 2px solid black; background-color: rgb(170, 240, 255); display: none; padding: 10px; z-index: 1; left: 836px; top: 300px;">
                                                <div id="newappttime">
                                                    <center><b>8:45 AM</b></center>
                                                </div><img src={{asset("/nlimages/scheduler/newappointment.png")}}
                                                    onclick="javascript:editappointment();" height="50">
                                                New Appointment<br><br>
                                                <img src={{asset("/nlimages/scheduler/editworking.png")}} height="50"> Edit Working
                                                Hours<br><br>
                                                <img src={{asset("/nlimages/scheduler/addtowaitlist.png")}} height="50"> Add to
                                                Waitlist<br><br>
                                                <img src={{asset("/nlimages/scheduler/personaltask.png")}} height="50"> Personal
                                                Task
                                            </div>

                                            <div id="modifyapptdiv"
                                                style="position:absolute;width:300px;height:300px;border:2px solid black;background-Color:#f1f1f1;display:none;padding:10px;z-index:1;">
                                                <div id="newappttime"></div><img src={{asset("/nlimages/scheduler/newappointment.png")}}
                                                    onclick="javascript:editappointment();" height="50">
                                                Edit Appointment<br><br>
                                                <img src={{asset("/nlimages/delete.png")}} onclick="javascript:deleteappointment();"
                                                    height="50"> Delete Appointment
                                            </div>
                                            <div style="position:absolute;width:100%;height:100%;top:0px;left:0px;display:none;background-color:#f1f1f1;opacity:.5;"
                                                id="apptcontainerdiv" align="center">
                                            </div>
                                            <div id="apptdiv"
                                                style="position:absolute;width:500px;height:500px;top:200px;left:500px;background-color:white;opacity:1;display:none;padding:20px;z-index:2;">
                                                <form name="form" action="scheduler.php" method="post">
                                                    <input type="hidden" name="newappointment" value="true">
                                                    <input type="hidden" name="scrollto" id="scrollto2" value="1000">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">Service with Dr. Michael
                                                                    Sanchez:<br>
                                                                    <select name="package">
                                                                        <option>Select Service</option>
                                                                        <option disabled="">EVALUTATION
                                                                            Sports Performance</option>
                                                                        <option value="Evaluation Sports (up to 30 mins) ">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evaluation
                                                                            Sports (up to 30 mins)
                                                                        </option>
                                                                        <option value="Evaluation Sports (up to 60 mins) ">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evaluation
                                                                            Sports (up to 60 mins)
                                                                        </option>
                                                                        <option disabled="">INS. Co-Pay-
                                                                        </option>
                                                                        <option value="Co-Pay $0 - Combo: Rehab/Treatment">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Co-Pay
                                                                            $0 - Combo: Rehab/Treatment
                                                                        </option>
                                                                        <option value="Co-Pay $10 - Combo: Rehab/Treatment">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Co-Pay
                                                                            $10 - Combo: Rehab/Treatment
                                                                        </option>
                                                                        <option value="Co-Pay $15 - Combo: Rehab/Treatment">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Co-Pay
                                                                            $15 - Combo: Rehab/Treatment
                                                                        </option>
                                                                        <option value="Co-Pay $20 - Combo: Rehab/Treatment">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Co-Pay
                                                                            $20 - Combo: Rehab/Treatment
                                                                        </option>
                                                                        <option value="Co-Pay $25 - Combo: Rehab/Treatment">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Co-Pay
                                                                            $25 - Combo: Rehab/Treatment
                                                                        </option>
                                                                        <option value="Co-Pay $30 - Combo: Rehab/Treatment">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Co-Pay
                                                                            $30 - Combo: Rehab/Treatment
                                                                        </option>
                                                                        <option disabled="">CASH- Combo:
                                                                            Rehabilitation Therapy
                                                                        </option>
                                                                        <option
                                                                            value="1X A WK-Combo: Rehab/Treatment 12 Visits / ($95)">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1X
                                                                            A WK-Combo: Rehab/Treatment
                                                                            12 Visits / ($95)</option>
                                                                        <option
                                                                            value="2X A WK-Combo: Rehab/Treatment 24 Visits / ($85)">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2X
                                                                            A WK-Combo: Rehab/Treatment
                                                                            24 Visits / ($85)</option>
                                                                        <option
                                                                            value="3X A WK-Combo: Rehab/Treatment 36 Visits / ($75)">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3X
                                                                            A WK-Combo: Rehab/Treatment
                                                                            36 Visits / ($75)</option>
                                                                        <option value="1 yr Purchased 48 @ $95 per visit">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1
                                                                            yr Purchased 48 @ $95 per
                                                                            visit</option>
                                                                        <option disabled="">Soft Tissue
                                                                            Work (w/ Chiro Adjustments)
                                                                        </option>
                                                                        <option
                                                                            value="30 min. - Soft Tissue per Session (w/ Adjustments)">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;30
                                                                            min. - Soft Tissue per
                                                                            Session (w/ Adjustments)
                                                                        </option>
                                                                        <option
                                                                            value="30 min. - Soft Tissue  (w/ Adjustments) (10 Sessions)">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;30
                                                                            min. - Soft Tissue (w/
                                                                            Adjustments) (10 Sessions)
                                                                        </option>
                                                                        <option
                                                                            value="1.5 hours- Soft Tissue per Session (w/Adjustments) 1.5 hours">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5
                                                                            hours- Soft Tissue per
                                                                            Session (w/Adjustments) 1.5
                                                                            hours</option>
                                                                        <option
                                                                            value="1.5 hours- Soft Tissue w/Adjustments - (10 sessions)">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5
                                                                            hours- Soft Tissue
                                                                            w/Adjustments - (10
                                                                            sessions)</option>
                                                                        <option disabled="">Chiropractic
                                                                            Adjustment</option>
                                                                        <option value="Chiropractic Adjustment">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chiropractic
                                                                            Adjustment</option>
                                                                        <option disabled="">Private
                                                                        </option>
                                                                        <option value="Private Session">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Private
                                                                            Session</option>
                                                                        <option disabled="">PI</option>
                                                                        <option value="Work Comp">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Work
                                                                            Comp</option>
                                                                        <option value="Auto Accident">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Auto
                                                                            Accident</option>
                                                                        <option disabled="">Performance
                                                                        </option>
                                                                        <option value="PREMIUM - $85 / 5 Sessions">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PREMIUM
                                                                            - $85 / 5 Sessions</option>
                                                                        <option value="PREMIUM - $75 / 10 Sessions">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PREMIUM
                                                                            - $75 / 10 Sessions</option>
                                                                        <option disabled="">Laser
                                                                            Treatment (Class 4 Laser)
                                                                        </option>
                                                                        <option value="Class 4 Laser (up to 15 min)">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class
                                                                            4 Laser (up to 15 min)
                                                                        </option>
                                                                        <option value="Class 4 Laser (10 sessions)">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class
                                                                            4 Laser (10 sessions)
                                                                        </option>
                                                                        <option disabled="">TEAM
                                                                            TRAINING</option>
                                                                        <option value="BASKETBALL">
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BASKETBALL
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Date:<br><input name="date" value="08/26/2020"></td>
                                                                <td>Time:<br><input name="starttime" id="starttime">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Price:<br><input name="price" id="price"></td>
                                                                <td>Duration:<br><input name="duration" id="duration">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">Appointment
                                                                    Type:<br><select name="appttype">
                                                                        <option></option>
                                                                        <option value="NR">NR</option>
                                                                        <option value="NNR">NNR</option>
                                                                        <option value="RR">RR</option>
                                                                        <option value="RNR">RNR</option>
                                                                    </select></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <input type="submit" value="Save"><input type="button" value="Cancel"
                                                        onclick="closeappointment();">
                                                </form>
                                            </div>
                                            <table id="appttable" width="100%" cellspacing="0" cellpadding="5" border="1">
                                                <tbody>
                                                    <tr height="20">
                                                        <td width="75">12:00 AM</td>
                                                        <td id="0-0tr" onmouseover="dayhover('on','0-0');"
                                                            onmouseout="dayhover('off','0-0');"
                                                            onclick="newappointment('0','12:00 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="0-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">12:15 AM</td>
                                                        <td id="0-15tr" onmouseover="dayhover('on','0-15');"
                                                            onmouseout="dayhover('off','0-15');"
                                                            onclick="newappointment('0','12:15 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="0-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">12:30 AM</td>
                                                        <td id="0-30tr" onmouseover="dayhover('on','0-30');"
                                                            onmouseout="dayhover('off','0-30');"
                                                            onclick="newappointment('0','12:30 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="0-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">12:45 AM</td>
                                                        <td id="0-45tr" onmouseover="dayhover('on','0-45');"
                                                            onmouseout="dayhover('off','0-45');"
                                                            onclick="newappointment('0','12:45 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="0-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">1:00 AM</td>
                                                        <td id="1-0tr" onmouseover="dayhover('on','1-0');"
                                                            onmouseout="dayhover('off','1-0');"
                                                            onclick="newappointment('1','1:00 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="1-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">1:15 AM</td>
                                                        <td id="1-15tr" onmouseover="dayhover('on','1-15');"
                                                            onmouseout="dayhover('off','1-15');"
                                                            onclick="newappointment('1','1:15 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="1-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">1:30 AM</td>
                                                        <td id="1-30tr" onmouseover="dayhover('on','1-30');"
                                                            onmouseout="dayhover('off','1-30');"
                                                            onclick="newappointment('1','1:30 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="1-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">1:45 AM</td>
                                                        <td id="1-45tr" onmouseover="dayhover('on','1-45');"
                                                            onmouseout="dayhover('off','1-45');"
                                                            onclick="newappointment('1','1:45 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="1-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">2:00 AM</td>
                                                        <td id="2-0tr" onmouseover="dayhover('on','2-0');"
                                                            onmouseout="dayhover('off','2-0');"
                                                            onclick="newappointment('2','2:00 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="2-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">2:15 AM</td>
                                                        <td id="2-15tr" onmouseover="dayhover('on','2-15');"
                                                            onmouseout="dayhover('off','2-15');"
                                                            onclick="newappointment('2','2:15 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="2-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">2:30 AM</td>
                                                        <td id="2-30tr" onmouseover="dayhover('on','2-30');"
                                                            onmouseout="dayhover('off','2-30');"
                                                            onclick="newappointment('2','2:30 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="2-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">2:45 AM</td>
                                                        <td id="2-45tr" onmouseover="dayhover('on','2-45');"
                                                            onmouseout="dayhover('off','2-45');"
                                                            onclick="newappointment('2','2:45 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="2-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">3:00 AM</td>
                                                        <td id="3-0tr" onmouseover="dayhover('on','3-0');"
                                                            onmouseout="dayhover('off','3-0');"
                                                            onclick="newappointment('3','3:00 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="3-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">3:15 AM</td>
                                                        <td id="3-15tr" onmouseover="dayhover('on','3-15');"
                                                            onmouseout="dayhover('off','3-15');"
                                                            onclick="newappointment('3','3:15 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="3-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">3:30 AM</td>
                                                        <td id="3-30tr" onmouseover="dayhover('on','3-30');"
                                                            onmouseout="dayhover('off','3-30');"
                                                            onclick="newappointment('3','3:30 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="3-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">3:45 AM</td>
                                                        <td id="3-45tr" onmouseover="dayhover('on','3-45');"
                                                            onmouseout="dayhover('off','3-45');"
                                                            onclick="newappointment('3','3:45 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="3-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">4:00 AM</td>
                                                        <td id="4-0tr" onmouseover="dayhover('on','4-0');"
                                                            onmouseout="dayhover('off','4-0');"
                                                            onclick="newappointment('4','4:00 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="4-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">4:15 AM</td>
                                                        <td id="4-15tr" onmouseover="dayhover('on','4-15');"
                                                            onmouseout="dayhover('off','4-15');"
                                                            onclick="newappointment('4','4:15 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="4-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">4:30 AM</td>
                                                        <td id="4-30tr" onmouseover="dayhover('on','4-30');"
                                                            onmouseout="dayhover('off','4-30');"
                                                            onclick="newappointment('4','4:30 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="4-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">4:45 AM</td>
                                                        <td id="4-45tr" onmouseover="dayhover('on','4-45');"
                                                            onmouseout="dayhover('off','4-45');"
                                                            onclick="newappointment('4','4:45 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="4-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">5:00 AM</td>
                                                        <td id="5-0tr" onmouseover="dayhover('on','5-0');"
                                                            onmouseout="dayhover('off','5-0');"
                                                            onclick="newappointment('5','5:00 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="5-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">5:15 AM</td>
                                                        <td id="5-15tr" onmouseover="dayhover('on','5-15');"
                                                            onmouseout="dayhover('off','5-15');"
                                                            onclick="newappointment('5','5:15 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="5-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">5:30 AM</td>
                                                        <td id="5-30tr" onmouseover="dayhover('on','5-30');"
                                                            onmouseout="dayhover('off','5-30');"
                                                            onclick="newappointment('5','5:30 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="5-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">5:45 AM</td>
                                                        <td id="5-45tr" onmouseover="dayhover('on','5-45');"
                                                            onmouseout="dayhover('off','5-45');"
                                                            onclick="newappointment('5','5:45 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="5-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">6:00 AM</td>
                                                        <td id="6-0tr" onmouseover="dayhover('on','6-0');"
                                                            onmouseout="dayhover('off','6-0');"
                                                            onclick="newappointment('6','6:00 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="6-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">6:15 AM</td>
                                                        <td id="6-15tr" onmouseover="dayhover('on','6-15');"
                                                            onmouseout="dayhover('off','6-15');"
                                                            onclick="newappointment('6','6:15 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="6-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">6:30 AM</td>
                                                        <td id="6-30tr" onmouseover="dayhover('on','6-30');"
                                                            onmouseout="dayhover('off','6-30');"
                                                            onclick="newappointment('6','6:30 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="6-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">6:45 AM</td>
                                                        <td id="6-45tr" onmouseover="dayhover('on','6-45');"
                                                            onmouseout="dayhover('off','6-45');"
                                                            onclick="newappointment('6','6:45 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="6-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">7:00 AM</td>
                                                        <td id="7-0tr" onmouseover="dayhover('on','7-0');"
                                                            onmouseout="dayhover('off','7-0');"
                                                            onclick="newappointment('7','7:00 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="7-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">7:15 AM</td>
                                                        <td id="7-15tr" onmouseover="dayhover('on','7-15');"
                                                            onmouseout="dayhover('off','7-15');"
                                                            onclick="newappointment('7','7:15 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="7-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">7:30 AM</td>
                                                        <td id="7-30tr" onmouseover="dayhover('on','7-30');"
                                                            onmouseout="dayhover('off','7-30');"
                                                            onclick="newappointment('7','7:30 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="7-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">7:45 AM</td>
                                                        <td id="7-45tr" onmouseover="dayhover('on','7-45');"
                                                            onmouseout="dayhover('off','7-45');"
                                                            onclick="newappointment('7','7:45 AM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="7-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">8:00 AM</td>
                                                        <td id="8-0tr" onmouseover="dayhover('on','8-0');"
                                                            onmouseout="dayhover('off','8-0');"
                                                            onclick="newappointment('8','8:00 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="8-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">8:15 AM</td>
                                                        <td id="8-15tr" onmouseover="dayhover('on','8-15');"
                                                            onmouseout="dayhover('off','8-15');"
                                                            onclick="newappointment('8','8:15 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="8-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">8:30 AM</td>
                                                        <td id="8-30tr" onmouseover="dayhover('on','8-30');"
                                                            onmouseout="dayhover('off','8-30');"
                                                            onclick="newappointment('8','8:30 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="8-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">8:45 AM</td>
                                                        <td id="8-45tr" onmouseover="dayhover('on','8-45');"
                                                            onmouseout="dayhover('off','8-45');"
                                                            onclick="newappointment('8','8:45 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="8-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">9:00 AM</td>
                                                        <td id="9-0tr" onmouseover="dayhover('on','9-0');"
                                                            onmouseout="dayhover('off','9-0');"
                                                            onclick="newappointment('9','9:00 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="9-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">9:15 AM</td>
                                                        <td id="9-15tr" onmouseover="dayhover('on','9-15');"
                                                            onmouseout="dayhover('off','9-15');"
                                                            onclick="newappointment('9','9:15 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="9-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">9:30 AM</td>
                                                        <td id="9-30tr" onmouseover="dayhover('on','9-30');"
                                                            onmouseout="dayhover('off','9-30');"
                                                            onclick="newappointment('9','9:30 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="9-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">9:45 AM</td>
                                                        <td id="9-45tr" onmouseover="dayhover('on','9-45');"
                                                            onmouseout="dayhover('off','9-45');"
                                                            onclick="newappointment('9','9:45 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="9-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">10:00 AM</td>
                                                        <td id="10-0tr" onmouseover="dayhover('on','10-0');"
                                                            onmouseout="dayhover('off','10-0');"
                                                            onclick="newappointment('10','10:00 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="10-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">10:15 AM</td>
                                                        <td id="10-15tr" onmouseover="dayhover('on','10-15');"
                                                            onmouseout="dayhover('off','10-15');"
                                                            onclick="newappointment('10','10:15 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="10-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">10:30 AM</td>
                                                        <td id="10-30tr" onmouseover="dayhover('on','10-30');"
                                                            onmouseout="dayhover('off','10-30');"
                                                            onclick="newappointment('10','10:30 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="10-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">10:45 AM</td>
                                                        <td id="10-45tr" onmouseover="dayhover('on','10-45');"
                                                            onmouseout="dayhover('off','10-45');"
                                                            onclick="newappointment('10','10:45 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="10-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">11:00 AM</td>
                                                        <td id="11-0tr" onmouseover="dayhover('on','11-0');"
                                                            onmouseout="dayhover('off','11-0');"
                                                            onclick="newappointment('11','11:00 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="11-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">11:15 AM</td>
                                                        <td id="11-15tr" onmouseover="dayhover('on','11-15');"
                                                            onmouseout="dayhover('off','11-15');"
                                                            onclick="newappointment('11','11:15 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="11-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">11:30 AM</td>
                                                        <td id="11-30tr" onmouseover="dayhover('on','11-30');"
                                                            onmouseout="dayhover('off','11-30');"
                                                            onclick="newappointment('11','11:30 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="11-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">11:45 AM</td>
                                                        <td id="11-45tr" onmouseover="dayhover('on','11-45');"
                                                            onmouseout="dayhover('off','11-45');"
                                                            onclick="newappointment('11','11:45 AM');"
                                                            style="background-color: white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="11-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">12:00 PM</td>
                                                        <td id="12-0tr" onmouseover="dayhover('on','12-0');"
                                                            onmouseout="dayhover('off','12-0');"
                                                            onclick="newappointment('12','12:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="12-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">12:15 PM</td>
                                                        <td id="12-15tr" onmouseover="dayhover('on','12-15');"
                                                            onmouseout="dayhover('off','12-15');"
                                                            onclick="newappointment('12','12:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="12-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">12:30 PM</td>
                                                        <td id="12-30tr" onmouseover="dayhover('on','12-30');"
                                                            onmouseout="dayhover('off','12-30');"
                                                            onclick="newappointment('12','12:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="12-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">12:45 PM</td>
                                                        <td id="12-45tr" onmouseover="dayhover('on','12-45');"
                                                            onmouseout="dayhover('off','12-45');"
                                                            onclick="newappointment('12','12:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="12-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">1:00 PM</td>
                                                        <td id="13-0tr" onmouseover="dayhover('on','13-0');"
                                                            onmouseout="dayhover('off','13-0');"
                                                            onclick="newappointment('13','1:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="13-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">1:15 PM</td>
                                                        <td id="13-15tr" onmouseover="dayhover('on','13-15');"
                                                            onmouseout="dayhover('off','13-15');"
                                                            onclick="newappointment('13','1:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="13-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">1:30 PM</td>
                                                        <td id="13-30tr" onmouseover="dayhover('on','13-30');"
                                                            onmouseout="dayhover('off','13-30');"
                                                            onclick="newappointment('13','1:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="13-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">1:45 PM</td>
                                                        <td id="13-45tr" onmouseover="dayhover('on','13-45');"
                                                            onmouseout="dayhover('off','13-45');"
                                                            onclick="newappointment('13','1:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="13-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">2:00 PM</td>
                                                        <td id="14-0tr" onmouseover="dayhover('on','14-0');"
                                                            onmouseout="dayhover('off','14-0');"
                                                            onclick="newappointment('14','2:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="14-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">2:15 PM</td>
                                                        <td id="14-15tr" onmouseover="dayhover('on','14-15');"
                                                            onmouseout="dayhover('off','14-15');"
                                                            onclick="newappointment('14','2:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="14-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">2:30 PM</td>
                                                        <td id="14-30tr" onmouseover="dayhover('on','14-30');"
                                                            onmouseout="dayhover('off','14-30');"
                                                            onclick="newappointment('14','2:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="14-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">2:45 PM</td>
                                                        <td id="14-45tr" onmouseover="dayhover('on','14-45');"
                                                            onmouseout="dayhover('off','14-45');"
                                                            onclick="newappointment('14','2:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="14-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">3:00 PM</td>
                                                        <td id="15-0tr" onmouseover="dayhover('on','15-0');"
                                                            onmouseout="dayhover('off','15-0');"
                                                            onclick="newappointment('15','3:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="15-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">3:15 PM</td>
                                                        <td id="15-15tr" onmouseover="dayhover('on','15-15');"
                                                            onmouseout="dayhover('off','15-15');"
                                                            onclick="newappointment('15','3:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="15-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">3:30 PM</td>
                                                        <td id="15-30tr" onmouseover="dayhover('on','15-30');"
                                                            onmouseout="dayhover('off','15-30');"
                                                            onclick="newappointment('15','3:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="15-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">3:45 PM</td>
                                                        <td id="15-45tr" onmouseover="dayhover('on','15-45');"
                                                            onmouseout="dayhover('off','15-45');"
                                                            onclick="newappointment('15','3:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="15-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">4:00 PM</td>
                                                        <td id="16-0tr" onmouseover="dayhover('on','16-0');"
                                                            onmouseout="dayhover('off','16-0');"
                                                            onclick="newappointment('16','4:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="16-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">4:15 PM</td>
                                                        <td id="16-15tr" onmouseover="dayhover('on','16-15');"
                                                            onmouseout="dayhover('off','16-15');"
                                                            onclick="newappointment('16','4:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="16-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">4:30 PM</td>
                                                        <td id="16-30tr" onmouseover="dayhover('on','16-30');"
                                                            onmouseout="dayhover('off','16-30');"
                                                            onclick="newappointment('16','4:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="16-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">4:45 PM</td>
                                                        <td id="16-45tr" onmouseover="dayhover('on','16-45');"
                                                            onmouseout="dayhover('off','16-45');"
                                                            onclick="newappointment('16','4:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="16-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">5:00 PM</td>
                                                        <td id="17-0tr" onmouseover="dayhover('on','17-0');"
                                                            onmouseout="dayhover('off','17-0');"
                                                            onclick="newappointment('17','5:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="17-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">5:15 PM</td>
                                                        <td id="17-15tr" onmouseover="dayhover('on','17-15');"
                                                            onmouseout="dayhover('off','17-15');"
                                                            onclick="newappointment('17','5:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="17-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">5:30 PM</td>
                                                        <td id="17-30tr" onmouseover="dayhover('on','17-30');"
                                                            onmouseout="dayhover('off','17-30');"
                                                            onclick="newappointment('17','5:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="17-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">5:45 PM</td>
                                                        <td id="17-45tr" onmouseover="dayhover('on','17-45');"
                                                            onmouseout="dayhover('off','17-45');"
                                                            onclick="newappointment('17','5:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="17-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">6:00 PM</td>
                                                        <td id="18-0tr" onmouseover="dayhover('on','18-0');"
                                                            onmouseout="dayhover('off','18-0');"
                                                            onclick="newappointment('18','6:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="18-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">6:15 PM</td>
                                                        <td id="18-15tr" onmouseover="dayhover('on','18-15');"
                                                            onmouseout="dayhover('off','18-15');"
                                                            onclick="newappointment('18','6:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="18-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">6:30 PM</td>
                                                        <td id="18-30tr" onmouseover="dayhover('on','18-30');"
                                                            onmouseout="dayhover('off','18-30');"
                                                            onclick="newappointment('18','6:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="18-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">6:45 PM</td>
                                                        <td id="18-45tr" onmouseover="dayhover('on','18-45');"
                                                            onmouseout="dayhover('off','18-45');"
                                                            onclick="newappointment('18','6:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="18-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">7:00 PM</td>
                                                        <td id="19-0tr" onmouseover="dayhover('on','19-0');"
                                                            onmouseout="dayhover('off','19-0');"
                                                            onclick="newappointment('19','7:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="19-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">7:15 PM</td>
                                                        <td id="19-15tr" onmouseover="dayhover('on','19-15');"
                                                            onmouseout="dayhover('off','19-15');"
                                                            onclick="newappointment('19','7:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="19-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">7:30 PM</td>
                                                        <td id="19-30tr" onmouseover="dayhover('on','19-30');"
                                                            onmouseout="dayhover('off','19-30');"
                                                            onclick="newappointment('19','7:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="19-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">7:45 PM</td>
                                                        <td id="19-45tr" onmouseover="dayhover('on','19-45');"
                                                            onmouseout="dayhover('off','19-45');"
                                                            onclick="newappointment('19','7:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="19-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">8:00 PM</td>
                                                        <td id="20-0tr" onmouseover="dayhover('on','20-0');"
                                                            onmouseout="dayhover('off','20-0');"
                                                            onclick="newappointment('20','8:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="20-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">8:15 PM</td>
                                                        <td id="20-15tr" onmouseover="dayhover('on','20-15');"
                                                            onmouseout="dayhover('off','20-15');"
                                                            onclick="newappointment('20','8:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="20-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">8:30 PM</td>
                                                        <td id="20-30tr" onmouseover="dayhover('on','20-30');"
                                                            onmouseout="dayhover('off','20-30');"
                                                            onclick="newappointment('20','8:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="20-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">8:45 PM</td>
                                                        <td id="20-45tr" onmouseover="dayhover('on','20-45');"
                                                            onmouseout="dayhover('off','20-45');"
                                                            onclick="newappointment('20','8:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="20-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">9:00 PM</td>
                                                        <td id="21-0tr" onmouseover="dayhover('on','21-0');"
                                                            onmouseout="dayhover('off','21-0');"
                                                            onclick="newappointment('21','9:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="21-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">9:15 PM</td>
                                                        <td id="21-15tr" onmouseover="dayhover('on','21-15');"
                                                            onmouseout="dayhover('off','21-15');"
                                                            onclick="newappointment('21','9:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="21-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">9:30 PM</td>
                                                        <td id="21-30tr" onmouseover="dayhover('on','21-30');"
                                                            onmouseout="dayhover('off','21-30');"
                                                            onclick="newappointment('21','9:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="21-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">9:45 PM</td>
                                                        <td id="21-45tr" onmouseover="dayhover('on','21-45');"
                                                            onmouseout="dayhover('off','21-45');"
                                                            onclick="newappointment('21','9:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="21-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">10:00 PM</td>
                                                        <td id="22-0tr" onmouseover="dayhover('on','22-0');"
                                                            onmouseout="dayhover('off','22-0');"
                                                            onclick="newappointment('22','10:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="22-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">10:15 PM</td>
                                                        <td id="22-15tr" onmouseover="dayhover('on','22-15');"
                                                            onmouseout="dayhover('off','22-15');"
                                                            onclick="newappointment('22','10:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="22-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">10:30 PM</td>
                                                        <td id="22-30tr" onmouseover="dayhover('on','22-30');"
                                                            onmouseout="dayhover('off','22-30');"
                                                            onclick="newappointment('22','10:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="22-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">10:45 PM</td>
                                                        <td id="22-45tr" onmouseover="dayhover('on','22-45');"
                                                            onmouseout="dayhover('off','22-45');"
                                                            onclick="newappointment('22','10:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="22-45div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">11:00 PM</td>
                                                        <td id="23-0tr" onmouseover="dayhover('on','23-0');"
                                                            onmouseout="dayhover('off','23-0');"
                                                            onclick="newappointment('23','11:00 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="23-0div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">11:15 PM</td>
                                                        <td id="23-15tr" onmouseover="dayhover('on','23-15');"
                                                            onmouseout="dayhover('off','23-15');"
                                                            onclick="newappointment('23','11:15 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="23-15div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">11:30 PM</td>
                                                        <td id="23-30tr" onmouseover="dayhover('on','23-30');"
                                                            onmouseout="dayhover('off','23-30');"
                                                            onclick="newappointment('23','11:30 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="23-30div"></div>
                                                        </td>
                                                    </tr>
                                                    <tr height="20">
                                                        <td width="75">11:45 PM</td>
                                                        <td id="23-45tr" onmouseover="dayhover('on','23-45');"
                                                            onmouseout="dayhover('off','23-45');"
                                                            onclick="newappointment('23','11:45 PM');"
                                                            style="background-color:white;" valign="top">
                                                            <div style="position:relative;width:0px;height:0px;z-index:0;"
                                                                id="23-45div"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <script>
            /*var tablewidth;
                                        var slots=[];
                                        function populateappts(hour,minute,duration){
                                        if(!Array.isArray(slots[hour])) slots[hour]=[];
                                        for(var i=0;i<duration;i+=15){
                                        slots[hour][minute+i]=0;
                                        slots++;
                                        }
                                        tablewidth=document.getElementById('appttable').offsetWidth-125;
                                        var trheight=document.getElementById(hour+'-'+minute+'tr').offsetHeight;
                                        var height=duration/15*trheight;
                                        //var divwidth=(tablewidth-(25*(minute.length-1)))/minute.length;
                                        var divwidth=tablewidth;
                                        //for(var i=0;i<minute.length;i++){
                                        var left=-5;//+(divwidth+25)*i;
                                        document.getElementById(hour+'-'+minute+'div').innerHTML+='<div style="position:absolute;top:-5px;left:'+left+';width:'+divwidth+'px;height:'+height+'px;border:1px red solid;background-color:pink;"></div>';
                                        //}
                                        }*/

        </script>
        Array
        (
        )
        <br>
        <script>
            document.getElementById('daydiv').style.height = window.innerHeight - 220;
            document.getElementById('daydiv').scrollTop = 1000; //populateappts(9,0,90);
            //populateappts(9,15,90);

        </script>
    </form>
@endsection
