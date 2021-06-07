@extends('layouts.manage',['dateTabs'=>route('progressNotes', [request('id'), $currentVisit->id])])

@section('content')
    <form name="encform" enctype="multipart/form-data" action="{" method="POST">
        <input type="hidden" class="form-control" name="id" value="">
        <script>
            function pickencounter() {
                document.encform.submit();
            }

            function pickanencounter(thedate, theaction) {
                document.encform.gotodate.value = thedate;
                if (theaction != null) document.encform.page.value = theaction;
                document.encform.submit();
            }

        </script>
        <script>
            var position = 90;
            var viewportwidth = document.getElementById('viewport').offsetWidth;
            document.getElementById('visitlist').style.width = document.getElementById('viewport')
                .offsetWidth;
            if (parseInt(document.getElementById('visittable').style.width.replace('px', '')) <
                parseInt(document.getElementById('viewport').offsetWidth))
                document.getElementById('visittable').style.width = document.getElementById('viewport')
                .offsetWidth;
            if (position + 150 > viewportwidth)
                document.getElementById('visitlist').scrollLeft = position;

        </script>
        <table height="30">
            <tbody>
                <tr>
                    <td><img src="{{ asset('/images/spacer.png') }}" height="30"></td>
                </tr>
            </tbody>
        </table>
        <br>

        <table width="100%" cellpadding="10 ">
            <tbody>
                <tr>
                    <td width="100%" valign="top">
                        <script>
                            if (window.innerWidth < 1280) {
                                document.getElementById('visitlist').style.top = '69px';
                                document.getElementById('sidebar').style.top = '72px';
                                document.getElementById('mainmenutable').style.height = '70px';
                            }

                        </script>
                        <table width="100%" cellpadding="5" border="1">
                            <tr>
                                <td width="100%" style="background-color:#CCC;border-top:none;"><strong>Progress Note:
                                        Visit On - {{ $currentVisit->encounterdate }}
                                    </strong>
                                </td>
                            </tr>
                        </table><br>
                        M.A. SANCHEZ CHIROPRACTIC CORP.<br>
                        Dr. Michael Sanchez, D.C.<br>
                        7071 Commerce Circle Ste A, Pleasanton, CA 94588.<br>
                        Phone : 9256000650, Fax : 9256008251<br>
                        <hr>
                        <table width="50%">
                            <tr>
                                <td>data Name :</td>
                                <td>
                                    {{ $data->lastname }}, {{ $data->firstname }}, {{ $data->middleinitial }}
                                </td>
                                <td>data DOB :</td>
                                <td>
                                    {{ $data->dob }}
                                </td>
                                <td>Patient ID :
                                    {{ $data->id }}
                                </td>
                            </tr>
                            <tr>
                                <td>Date of Visit : </td>
                                <td>
                                    {{ $currentVisit->encounterdate }}
                                </td>
                                <td>Visit Type :</td>
                            </tr>
                            <tr>
                                <td>
                                    Referring Physician :
                                </td>
                                <td></td>
                                <td>
                                    Check-In Time :
                                </td>
                                <td></td>
                                <td>
                                    Check-Out Time :
                                </td>
                                <td></td>
                        </table>
                        <hr>
                        <b>
                            <b>SUBJECTIVE :</b>
                            <br>
                            Chief Complaints:
                            @php $chiefcomplaints=explode("%SE%",$currentVisit->chiefcomplaints);
                            $paintype=explode("%SE%",$currentVisit->paintype);
                            $painint=explode("%SE%",$currentVisit->painint);
                            $status=explode("%SE%",$currentVisit->status);
                            for($i=0;$i<sizeof($chiefcomplaints);$i++){if($i>0) echo ', '; echo $chiefcomplaints[$i];}
                                @endphp
                                <br><br>The patient stated the following today:<br><br>
                                @php
                                echo '<table width="100%" cellspacing=0 cellpadding=5 border=1>';
                                    for($i=0;$i<sizeof($chiefcomplaints);$i++){ if($i%3==0){ if($i!=0) echo '</tr>' ;
                                        echo '<tr bgcolor="#d9d9d9"><td align="center"><b>Complaint #' .($i+1).'</b>
                    </td>';
                    if($i+2<=sizeof($chiefcomplaints)) echo '<td align="center"><b>Complaint #' .($i+2).'</b>
                        </td>';
                        if($i+3<=sizeof($chiefcomplaints)) echo '<td align="center"><b>Complaint #' .($i+3).'</b>
                            </td>';
                            echo '
                </tr>
                <tr bgcolor="#f1f1f1">';
                    echo '<td>
                        <font size="+1"><b>Pain/Discomfort</b>: '.$chiefcomplaints[$i].'</b></font>
                    </td>';
                    if($i+1<sizeof($chiefcomplaints)) echo '<td><font size="+1"><b>Pain/Discomfort</b>: '
                        .$chiefcomplaints[$i+1].'</b>
                        </font>
                        </td>';
                        if($i+2<sizeof($chiefcomplaints)) echo '<td><font size="+1"><b>Pain/Discomfort</b>: '
                            .$chiefcomplaints[$i+2].'</b>
                            </font>
                            </td>';
                            echo '
                <tr>';
                    }
                    echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Type</b>:
                        '.$paintype[$i].'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Pain Intensity</b>:
                        '.$painint[$i].'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Status</b>: '.$status[$i].'<br></td>';
                    }
                    echo '
        </table>';
        @endphp
        </b>
        </td>
        </tbody>
        </table>
    </form>
@endsection
