@extends('layouts.manage')

@section('content')
    <form name="encform" enctype="" action="{{ route('patientinfo', $data->id) }}" method="get">
        <script>
            var yearon = "2021"; //pickayear(yearon);

        </script>
        <script>
            function pickencounter() {
                document.encform.submit();
            }

            function pickanencounter(thedate, theaction, bill, billq) {
                if (billq == null) {
                    document.encform.gotodate.value = thedate;
                    if (theaction != null) document.encform.page.value = theaction;
                    document.encform.markbilling.value = bill;
                    document.encform.submit();
                } else if (window.confirm('Mark billing for visit ' + thedate + ' as ' + billq + '?')) {
                    document.encform.gotodate.value = thedate;
                    if (theaction != null) document.encform.page.value = theaction;
                    document.encform.markbilling.value = bill;
                    document.encform.submit();
                }
            }
            var basewidth = 0;
            var greatesti;

            function pickayear(theyear) {
                //window.alert(yearon);
                //if(theyear!=yearon){
                //document.encform.encounterviewyear.value=theyear;
                //if(theaction!=null) document.encform.page.value=theaction;
                //document.encform.submit();
                for (var i = 0; document.getElementById('encountertd' + yearon + i); i++) {
                    document.getElementById('encountertd' + yearon + i).style.display = 'none';
                }
                for (var i = 0; document.getElementById('encountertd' + theyear + i); i++) {
                    document.getElementById('encountertd' + theyear + i).style.display = 'table-cell';
                    greatesti = i;
                }
                if (document.getElementById('yeartd' + yearon))
                    document.getElementById('yeartd' + yearon).style.backgroundImage =
                    'url(nlimages/tabyearinactive.png)';
                document.getElementById('yeartd' + theyear).style.backgroundImage =
                    'url(nlimages/tabyearactive.png)';
                yearon = theyear;
                if (parseInt(document.getElementById('viewport').offsetWidth) < basewidth + (greatesti +
                        1) * 150) {
                    document.getElementById('visittable').style.width = basewidth + (greatesti + 1) *
                        150 + 'px';
                } else {
                    document.getElementById('visittable').style.width = parseInt(document
                        .getElementById('viewport').offsetWidth) + 'px';
                }
                //}
            }

            function changewidth() {
                /*window.alert(parseInt(document.getElementById('viewport').offsetWidth)+' '+(basewidth+greatesti*150));	
                if(parseInt(document.getElementById('viewport').offsetWidth)<basewidth+greatesti*150)
                document.getElementById('visittable').style.width=basewidth+(greatesti+1)*150+'px';*/
            }
            /*for(var i=0;document.getElementById('encountertd'+yearoon+i);i++){
            document.getElementById('encountertd'+yearoon+i).style.display='table-cell';
            greatesti=i;
            }*/
            window.addEventListener("resize", changewidth);
        </script>
        <script>
            var position = basewidth + 0;
            document.getElementById('visittable').style.width = basewidth + (0) * 150 + 'px';
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
                                if (document.getElementById('visitlist')) document.getElementById(
                                    'visitlist').style.top = '69px';
                                document.getElementById('sidebar').style.top = '72px';
                                document.getElementById('mainmenutable').style.height = '70px';
                            }

                        </script>
                        <script>
                            function affect(id) {
                                if (document.getElementById(id).value == 'mm' || document
                                    .getElementById(id).value == 'dd' || document.getElementById(id)
                                    .value == 'yyyy') {
                                    document.getElementById(id).value = '';
                                    document.getElementById(id).style.color = 'black';
                                }
                            }

                            function out(id) {
                                var theval;
                                if (id == 'month') {
                                    theval = 'mm';
                                }
                                if (id == 'day') theval = 'dd';
                                if (id == 'year') theval = 'yyyy';
                                if (document.getElementById(id).value == '') {
                                    document.getElementById(id).style.color = 'gray';
                                    document.getElementById(id).value = theval;
                                }
                            }

                            function formsubmit(thefile) {
                                document.patientinfoform.deleteimage.value = thefile;
                                document.patientinfoform.submit();
                            }

                        </script>
                     
                            <input type="hidden" name="submitted" value="true">
                            <input type="hidden" name="deleteimage">
                            <center>
                                <table width="80%" cellspacing="0" cellpadding="10">
                                    <tbody>
                                        <tr>
                                            <td colspan="8"
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;">
                                                <font size="+2">Personal Info</font>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#f1f1f1">
                                            <td width="25%">Nickname:</td>
                                            <td><input name="nickname" value="{{ old('nickname', $data->nickname) }}"></td>
                                            <td width="25%">Street</td>
                                            <td><input name="street" value="{{ old('street', $data->street) }}"></td>
                                            <td width="50%"></td>
                                            <td width="200"></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td>First Name:</td>
                                            <td><input name="firstname" value="{{ old('firstname', $data->firstname) }}">
                                            </td>
                                            <td>City:</td>
                                            <td><input name="city" value="{{ old('city', $data->city) }}"></td>
                                            <td>Status:</td>
                                            <td><select name="status">
                                                    <option value="" selected=""></option>
                                                    <option value="Active"
                                                        {{ old('status', $data->status) == 'Active' ? 'selected="selected"' : '' }}>
                                                        Active</option>
                                                    <option value="Inactive"
                                                        {{ old('status', $data->status) == 'Inactive' ? 'selected="selected"' : '' }}>
                                                        Inactive</option>
                                                </select></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td>Middle Initial:</td>
                                            <td><input name="middleinitial"
                                                    value="{{ old('middleinitial', $data->middleinitial) }}">
                                            </td>
                                            <td>State:</td>
                                            <td><input name="state" value="{{ old('state', $data->state) }}"></td>
                                            <td>Referred By: <select name="referredbytype" id="referredbytype"
                                                    onchange="showreferredby();">
                                                    <option value=""></option>
                                                    <option value="Patient"
                                                        {{ old('referredbytype', $data->referredbytype) == 'Patient' ? 'selected="selected"' : '' }}>
                                                        Patient</option>
                                                    <option value="Doctor"
                                                        {{ old('referredbytype', $data->referredbytype) == 'Doctor' ? 'selected="selected"' : '' }}>
                                                        Doctor</option>
                                                    <option value="Other"
                                                        {{ old('referredbytype', $data->referredbytype) == 'Other' ? 'selected="selected"' : '' }}>
                                                        Other</option>
                                                </select></td>
                                            <td>
                                                <div id="patientdiv" style="display:none;">Name: <select
                                                        name="referredbypatient">

                                                        @foreach ($records as $record)
                                                            <option value="{{ $record->firstname }} {{ $record->lastname }}"
                                                                {{ old('referredbypatient', $data->referredbypatient) == '$data->referredbypatient' ? 'selected="selected"' : '' }}>
                                                                {{ $record->firstname }}
                                                                {{ $record->lastname }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div id="otherdiv" style="display:none;">Name: <input name="referredby"
                                                        value="{{ old('referredby', $data->referredby) }}"
                                                        style="width:125px"></div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <script>
                                            function showreferredby() {
                                                if (document.getElementById('referredbytype').value ==
                                                    'Patient') {
                                                    document.getElementById('patientdiv').style
                                                        .display = 'block';
                                                    document.getElementById('otherdiv').style.display =
                                                        'none';
                                                } else if (document.getElementById('referredbytype')
                                                    .value == 'Other' || document.getElementById(
                                                        'referredbytype').value == 'Doctor') {
                                                    document.getElementById('patientdiv').style
                                                        .display = 'none';
                                                    document.getElementById('otherdiv').style.display =
                                                        'block';
                                                } else {
                                                    document.getElementById('patientdiv').style
                                                        .display = 'none';
                                                    document.getElementById('otherdiv').style.display =
                                                        'none';
                                                }
                                            }
                                            showreferredby();

                                            function addpayment() {
                                                document.getElementById('paymenttype1').style.display =
                                                    'block';
                                                document.getElementById('addpaymenthref').style
                                                    .display = 'none';
                                            }

                                        </script>
                                        <tr>
                                            <td>Last Name:</td>
                                            <td><input name="lastname" value="{{ old('lastname', $data->lastname) }}"></td>
                                            <td>Zip Code:</td>
                                            <td><input name="zip" value="{{ old('zip', $data->zip) }}">
                                            </td>
                                            <td>Payment Type:</td>
                                            <td><select name="paymenttype0" onchange="showpaymentoptions(0);"
                                                    id="paymenttype0">
                                                    <option value="">Select</option>
                                                    <option value="Cash"
                                                        {{ old('paymenttype0', $data->paymenttype0) == 'Cash' ? 'selected="selected"' : '' }}>
                                                        Cash</option>
                                                    <option value="Insurance"
                                                        {{ old('paymenttype0', $data->paymenttype0) == 'Insurance' ? 'selected="selected"' : '' }}>
                                                        Insurance</option>
                                                    <option value="Auto Accident"
                                                        {{ old('paymenttype0', $data->paymenttype0) == 'Auto Accident' ? 'selected="selected"' : '' }}>
                                                        Auto Accident</option>
                                                    <option value="Workers Comp"
                                                        {{ old('paymenttype0', $data->paymenttype0) == 'Workers Comp' ? 'selected="selected"' : '' }}>
                                                        Workers Comp</option>
                                                </select></td>
                                            <td></td>
                                            <td><a href="javascript:addpayment();" id="addpaymenthref">Add
                                                    Payment</a><select name="paymenttype1" onchange="showpaymentoptions(1);"
                                                    id="paymenttype1" style="display:none">
                                                    <option value="">Select</option>
                                                    <option value="Cash"
                                                        {{ old('paymenttype1', $data->paymenttype1) == 'Cash' ? 'selected="selected"' : '' }}>
                                                        Cash</option>
                                                    <option value="Insurance"
                                                        {{ old('paymenttype1', $data->paymenttype1) == 'Insurance' ? 'selected="selected"' : '' }}>
                                                        Insurance</option>
                                                    <option value="Auto Accident"
                                                        {{ old('paymenttype1', $data->paymenttype1) == 'Auto Accident' ? 'selected="selected"' : '' }}>
                                                        Auto Accident</option>
                                                    <option value="Workers Comp"
                                                        {{ old('paymenttype1', $data->paymenttype1) == 'Workers Comp' ? 'selected="selected"' : '' }}>
                                                        Workers Comp</option>
                                                </select></td>
                                            <td></td>
                                        </tr>

                                        <tr bgcolor="#f1f1f1">
                                            <td>Suffix:</td>
                                            <td><input name="suffix" value="{{ old('suffix', $data->suffix) }}"></td>
                                            <td>Home Phone:</td>
                                            <td><input name="homephone" value="{{ old('homephone', $data->homephone) }}">
                                            </td>
                                            <td>
                                                <div id="cashoptions10" style="display:none;">Cost per
                                                    visit:</div>
                                                <div id="insuranceoptions10" style="display:none;">
                                                    Network:</div>
                                            </td>
                                            <td>
                                                <div id="cashoptions20" style="display:none;">$ <input name="costpervisit0"
                                                        size="3" value="{{ old('costpervisit0', $data->costpervisit0) }}">
                                                </div>
                                                <div id="insuranceoptions20" style="display:none;">
                                                    <select name="network0">
                                                        <option value=""></option>
                                                        <option value="In Network"
                                                            {{ old('network0', $data->network0) == 'In Network' ? 'selected="selected"' : '' }}>
                                                            In Network</option>
                                                        <option value="Out Of Network"
                                                            {{ old('network0', $data->network0) == 'Out Of Network' ? 'selected="selected"' : '' }}>
                                                            Out Of Network</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="cashoptions11" style="display:none;">Cost per
                                                    visit:</div>
                                                <div id="insuranceoptions11" style="display:none;">
                                                    Network:</div>
                                            </td>
                                            <td>
                                                <div id="cashoptions21" style="display:none;">$ <input name="costpervisit1"
                                                        size="3" value="{{ old('costpervisit1', $data->costpervisit1) }}">
                                                </div>
                                                <div id="insuranceoptions21" style="display:none;">
                                                    <select name="network1">
                                                        <option value=""></option>
                                                        <option value="In Network"
                                                            {{ old('network1', $data->network1) == 'In Network' ? 'selected="selected"' : '' }}>
                                                            In Network</option>
                                                        <option value="Out Of Network"
                                                            {{ old('network1', $data->network1) == 'Out Of Network' ? 'selected="selected"' : '' }}>
                                                            Out Of Network</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>DOB:</td>
                                            <td><input name="dobmonth" id="month" onfocus="affect('month');" size="1"
                                                    onblur="out('month');" value="{{ old('dobmonth', $data->dobmonth) }}"> /
                                                <input name="dobday" id="day" onfocus="affect('day');" size="1"
                                                    onblur="out('day');" value="{{ old('dobday', $data->dobday) }}"> /
                                                <input name="dobyear" id="year" onfocus="affect('year');" size="2"
                                                    onblur="out('year');" value="{{ old('dobyear', $data->dobyear) }}">
                                            </td>
                                            <td>Work Phone:</td>
                                            <td><input name="workphone" value="{{ old('workphone', $data->workphone) }}">
                                            </td>
                                            <td>
                                                <div id="cashoptions30" style="display:none;">Package:
                                                    <a href="packageeditor.php">Edit List</a>
                                                </div>
                                                <div id="insuranceoptions30" style="display:none;">
                                                    Co-pay</div>
                                            </td>
                                            <td>
                                                <script>
                                                    function checkother(i) {
                                                        var carrier = document.getElementById(
                                                            'package' + i).value;
                                                        if (carrier == 'Other') {
                                                            document.getElementById('package' + i).style
                                                                .display = 'none';
                                                            document.getElementById('packageother' + i)
                                                                .style.display = 'block';
                                                            document.getElementById('packageother' + i)
                                                                .focus();
                                                        }
                                                    }

                                                    function cancelother(i) {
                                                        if (document.getElementById('packageother' + i)
                                                            .value == '') {
                                                            document.getElementById('package' + i).style
                                                                .display = 'block';
                                                            document.getElementById('packageother' + i)
                                                                .style.display = 'none';
                                                            document.getElementById('package' + i)
                                                                .value = '';
                                                        }
                                                    }

                                                </script>
                                                <div id="cashoptions40" style="display:none;"><select name="package0"
                                                        onchange="javascript:checkother(0);" id="package0"
                                                        style="width:150">
                                                        <option value=""></option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EVALUTATION
                                                            Sports Performance</option>
                                                        <option value="Evaluation Sports (up to 30 mins) ">
                                                            Evaluation Sports (up to 30 mins) </option>
                                                        <option value="Evaluation Sports (up to 60 mins) ">
                                                            Evaluation Sports (up to 60 mins) </option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INS. Co-Pay-
                                                        </option>
                                                        <option value="Co-Pay $0 - Combo: Rehab/Treatment">
                                                            Co-Pay $0 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $10 - Combo: Rehab/Treatment">
                                                            Co-Pay $10 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $15 - Combo: Rehab/Treatment">
                                                            Co-Pay $15 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $20 - Combo: Rehab/Treatment">
                                                            Co-Pay $20 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $25 - Combo: Rehab/Treatment">
                                                            Co-Pay $25 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $30 - Combo: Rehab/Treatment">
                                                            Co-Pay $30 - Combo: Rehab/Treatment</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CASH- Combo:
                                                            Rehabilitation Therapy</option>
                                                        <option value="1X A WK-Combo: Rehab/Treatment 12 Visits / ($95)">
                                                            1X A WK-Combo: Rehab/Treatment 12 Visits /
                                                            ($95)</option>
                                                        <option value="2X A WK-Combo: Rehab/Treatment 24 Visits / ($85)">
                                                            2X A WK-Combo: Rehab/Treatment 24 Visits /
                                                            ($85)</option>
                                                        <option value="3X A WK-Combo: Rehab/Treatment 36 Visits / ($75)">
                                                            3X A WK-Combo: Rehab/Treatment 36 Visits /
                                                            ($75)</option>
                                                        <option value="1 yr Purchased 48 @ $95 per visit">1
                                                            yr Purchased 48 @ $95 per visit</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Soft Tissue
                                                            Work (w/ Chiro Adjustments)</option>
                                                        <option value="30 min. - Soft Tissue per Session (w/ Adjustments)">
                                                            30 min. - Soft Tissue per Session (w/
                                                            Adjustments)</option>
                                                        <option
                                                            value="30 min. - Soft Tissue  (w/ Adjustments) (10 Sessions)">
                                                            30 min. - Soft Tissue (w/ Adjustments) (10
                                                            Sessions)</option>
                                                        <option
                                                            value="1.5 hours- Soft Tissue per Session (w/Adjustments) 1.5 hours">
                                                            1.5 hours- Soft Tissue per Session
                                                            (w/Adjustments) 1.5 hours</option>
                                                        <option
                                                            value="1.5 hours- Soft Tissue w/Adjustments - (10 sessions)">
                                                            1.5 hours- Soft Tissue w/Adjustments - (10
                                                            sessions)</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chiropractic
                                                            Adjustment</option>
                                                        <option value="Chiropractic Adjustment">
                                                            Chiropractic Adjustment</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Private
                                                        </option>
                                                        <option value="Private Session">Private Session
                                                        </option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PI</option>
                                                        <option value="Work Comp">Work Comp</option>
                                                        <option value="Auto Accident">Auto Accident
                                                        </option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Performance
                                                        </option>
                                                        <option value="PREMIUM - $85 / 5 Sessions">
                                                            PREMIUM - $85 / 5 Sessions</option>
                                                        <option value="PREMIUM - $75 / 10 Sessions">
                                                            PREMIUM - $75 / 10 Sessions</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laser
                                                            Treatment (Class 4 Laser)</option>
                                                        <option value="Class 4 Laser (up to 15 min)">
                                                            Class 4 Laser (up to 15 min)</option>
                                                        <option value="Class 4 Laser (10 sessions)">
                                                            Class 4 Laser (10 sessions)</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TEAM TRAINING
                                                        </option>
                                                        <option value="BASKETBALL">BASKETBALL</option>
                                                        <option value="Other">Other</option>
                                                    </select><input name="packageother0" id="packageother0" value=""
                                                        style="display:none;width:340px"
                                                        onblur="javascript:cancelother(0);">
                                                </div>
                                                <div id="insuranceoptions40" style="display:none;">$
                                                    <input name="copay0" size="3"
                                                        value="{{ old('copay0', $data->copay0) }}">
                                                </div>
                                            </td>
                                            <td>
                                                <div id="cashoptions31" style="display:none;">Package:
                                                    <a href="packageeditor.php">Edit List</a>
                                                </div>
                                                <div id="insuranceoptions31" style="display:none;">
                                                    Co-pay</div>
                                            </td>
                                            <td>
                                                <script>
                                                    function checkother(i) {
                                                        var carrier = document.getElementById(
                                                            'package' + i).value;
                                                        if (carrier == 'Other') {
                                                            document.getElementById('package' + i).style
                                                                .display = 'none';
                                                            document.getElementById('packageother' + i)
                                                                .style.display = 'block';
                                                            document.getElementById('packageother' + i)
                                                                .focus();
                                                        }
                                                    }

                                                    function cancelother(i) {
                                                        if (document.getElementById('packageother' + i)
                                                            .value == '') {
                                                            document.getElementById('package' + i).style
                                                                .display = 'block';
                                                            document.getElementById('packageother' + i)
                                                                .style.display = 'none';
                                                            document.getElementById('package' + i)
                                                                .value = '';
                                                        }
                                                    }

                                                </script>
                                                <div id="cashoptions41" style="display:none;"><select name="package1"
                                                        onchange="javascript:checkother(1);" id="package1"
                                                        style="width:150">
                                                        <option value=""></option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EVALUTATION
                                                            Sports Performance</option>
                                                        <option value="Evaluation Sports (up to 30 mins) ">
                                                            Evaluation Sports (up to 30 mins) </option>
                                                        <option value="Evaluation Sports (up to 60 mins) ">
                                                            Evaluation Sports (up to 60 mins) </option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INS. Co-Pay-
                                                        </option>
                                                        <option value="Co-Pay $0 - Combo: Rehab/Treatment">
                                                            Co-Pay $0 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $10 - Combo: Rehab/Treatment">
                                                            Co-Pay $10 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $15 - Combo: Rehab/Treatment">
                                                            Co-Pay $15 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $20 - Combo: Rehab/Treatment">
                                                            Co-Pay $20 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $25 - Combo: Rehab/Treatment">
                                                            Co-Pay $25 - Combo: Rehab/Treatment</option>
                                                        <option value="Co-Pay $30 - Combo: Rehab/Treatment">
                                                            Co-Pay $30 - Combo: Rehab/Treatment</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CASH- Combo:
                                                            Rehabilitation Therapy</option>
                                                        <option value="1X A WK-Combo: Rehab/Treatment 12 Visits / ($95)">
                                                            1X A WK-Combo: Rehab/Treatment 12 Visits /
                                                            ($95)</option>
                                                        <option value="2X A WK-Combo: Rehab/Treatment 24 Visits / ($85)">
                                                            2X A WK-Combo: Rehab/Treatment 24 Visits /
                                                            ($85)</option>
                                                        <option value="3X A WK-Combo: Rehab/Treatment 36 Visits / ($75)">
                                                            3X A WK-Combo: Rehab/Treatment 36 Visits /
                                                            ($75)</option>
                                                        <option value="1 yr Purchased 48 @ $95 per visit">1
                                                            yr Purchased 48 @ $95 per visit</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Soft Tissue
                                                            Work (w/ Chiro Adjustments)</option>
                                                        <option value="30 min. - Soft Tissue per Session (w/ Adjustments)">
                                                            30 min. - Soft Tissue per Session (w/
                                                            Adjustments)</option>
                                                        <option
                                                            value="30 min. - Soft Tissue  (w/ Adjustments) (10 Sessions)">
                                                            30 min. - Soft Tissue (w/ Adjustments) (10
                                                            Sessions)</option>
                                                        <option
                                                            value="1.5 hours- Soft Tissue per Session (w/Adjustments) 1.5 hours">
                                                            1.5 hours- Soft Tissue per Session
                                                            (w/Adjustments) 1.5 hours</option>
                                                        <option
                                                            value="1.5 hours- Soft Tissue w/Adjustments - (10 sessions)">
                                                            1.5 hours- Soft Tissue w/Adjustments - (10
                                                            sessions)</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chiropractic
                                                            Adjustment</option>
                                                        <option value="Chiropractic Adjustment">
                                                            Chiropractic Adjustment</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Private
                                                        </option>
                                                        <option value="Private Session">Private Session
                                                        </option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PI</option>
                                                        <option value="Work Comp">Work Comp</option>
                                                        <option value="Auto Accident">Auto Accident
                                                        </option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Performance
                                                        </option>
                                                        <option value="PREMIUM - $85 / 5 Sessions">
                                                            PREMIUM - $85 / 5 Sessions</option>
                                                        <option value="PREMIUM - $75 / 10 Sessions">
                                                            PREMIUM - $75 / 10 Sessions</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laser
                                                            Treatment (Class 4 Laser)</option>
                                                        <option value="Class 4 Laser (up to 15 min)">
                                                            Class 4 Laser (up to 15 min)</option>
                                                        <option value="Class 4 Laser (10 sessions)">
                                                            Class 4 Laser (10 sessions)</option>
                                                        <option disabled="">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TEAM TRAINING
                                                        </option>
                                                        <option value="BASKETBALL">BASKETBALL</option>
                                                        <option value="Other">Other</option>
                                                    </select><input name="packageother1" id="packageother1" value=""
                                                        style="display:none;width:340px"
                                                        onblur="javascript:cancelother(1);">
                                                </div>
                                                <div id="insuranceoptions41" style="display:none;">$
                                                    <input name="copay1" size="3"
                                                        value="{{ old('copay1', $data->copay1) }}">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr bgcolor="#f1f1f1">
                                            <td>Sex:</td>
                                            <td><input type="radio" name="sex" value="male"
                                                    {{ $data->sex == 'male' ? 'checked' : '' }}> Male
                                                <input type="radio" name="sex" value="female"
                                                    {{ $data->sex == 'female' ? 'checked' : '' }}>
                                                Female
                                            </td>
                                            <td>Cell Phone:</td>
                                            <td><input name="cellphone" value="{{ old('cellphone', $data->cellphone) }}">
                                            </td>
                                            <td>
                                                <div id="cashoptions50" style="display:none"></div>
                                                <div id="insuranceoptions50" style="display:none;">
                                                    Co-insurance:</div>
                                            </td>
                                            <td>
                                                <div id="cashoptions60" style="display:none"></div>
                                                <div id="insuranceoptions60" style="display:none"><input name="coinsurance0"
                                                        size="3" value="{{ old('coinsurance0', $data->coinsurance0) }}">
                                                    <select name="coinsurancedp0">
                                                        <option value="$"
                                                            {{ old('coinsurancedp0', $data->coinsurancedp0) == '$' ? 'selected="selected"' : '' }}>
                                                            $</option>
                                                        <option value="%"
                                                            {{ old('coinsurancedp0', $data->coinsurancedp0) == '%' ? 'selected="selected"' : '' }}>
                                                            %</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="cashoptions51" style="display:none"></div>
                                                <div id="insuranceoptions51" style="display:none;">
                                                    Co-insurance:</div>
                                            </td>
                                            <td>
                                                <div id="cashoptions61" style="display:none"></div>
                                                <div id="insuranceoptions61" style="display:none"><input name="coinsurance1"
                                                        size="3" value="{{ old('coinsurance1', $data->coinsurance1) }}">
                                                    <select name="coinsurancedp1">
                                                        <option value="$"
                                                            {{ old('coinsurancedp1', $data->coinsurancedp1) == '$' ? 'selected="selected"' : '' }}>
                                                            $</option>
                                                        <option value="%"
                                                            {{ old('coinsurancedp1', $data->coinsurancedp1) == '%' ? 'selected="selected"' : '' }}>
                                                            %</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <script>
                                            function showpaymentoptions(pi) {
                                                for (var i = 1; document.getElementById('cashoptions' +
                                                        i + pi) != null || document.getElementById(
                                                        'insuranceoptions' + i + pi) != null; i++) {
                                                    var paymenttype = document.getElementById(
                                                        'paymenttype' + pi).value;
                                                    if (paymenttype == 'Cash') {
                                                        document.getElementById('cashoptions' + i + pi)
                                                            .style.display = 'block';
                                                        document.getElementById('insuranceoptions' + i +
                                                            pi).style.display = 'none';
                                                    }
                                                    if (paymenttype == 'Insurance' || paymenttype ==
                                                        'Auto Accident' || paymenttype == 'Workers Comp'
                                                    ) {
                                                        document.getElementById('cashoptions' + i + pi)
                                                            .style.display = 'none';
                                                        document.getElementById('insuranceoptions' + i +
                                                            pi).style.display = 'block';
                                                    }
                                                    if (paymenttype == '') {
                                                        document.getElementById('cashoptions' + i + pi)
                                                            .style.display = 'none';
                                                        document.getElementById('insuranceoptions' + i +
                                                            pi).style.display = 'none';
                                                    }
                                                }
                                            }
                                            showpaymentoptions(0);
                                            showpaymentoptions(1);

                                        </script>
                                        <tr>
                                            <td>Alternate No:</td>
                                            <td><input name="alternateno"
                                                    value="{{ old('alternateno', $data->alternateno) }}">
                                            </td>
                                            <td>Email:</td>
                                            <td><input name="email" value="{{ old('email', $data->email) }}"></td>
                                            <td>
                                                <div id="cashoptions70" style="display:none;"></div>
                                                <div id="insuranceoptions70" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div id="cashoptions80" style="display:none"><a href="">Payments</a></div>
                                                <div id="insuranceoptions80" style="display:none;">
                                                    <a href="">Insurance Info</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="cashoptions71" style="display:none;"></div>
                                                <div id="insuranceoptions71" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div id="cashoptions81" style="display:none"><a href="p">Payments</a></div>
                                                <div id="insuranceoptions81" style="display:none;">
                                                    <a href="">Insurance Info</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#f1f1f1">
                                            <td>Appt Reminders:</td>
                                            <td><input type="radio" name="apptreminders" value="on"
                                                    {{ $data->apptreminders == 'on' ? 'checked' : '' }}>
                                                On
                                                <input type="radio" name="apptreminders" value="off"
                                                    {{ $data->apptreminders == 'off' ? 'checked' : '' }}>
                                                Off
                                            </td>
                                            <td>Carrier:</td>
                                            <td><select name="carrier">
                                                    <option value="">Select Carrier</option>
                                                    <option value="AT&amp;T"
                                                        {{ old('carrier', $data->carrier) == 'AT&T' ? 'selected="selected"' : '' }}>
                                                        AT&amp;T</option>
                                                    <option value="T-Mobile"
                                                        {{ old('carrier', $data->carrier) == 'T-Mobile' ? 'selected="selected"' : '' }}>
                                                        T-Mobile</option>
                                                    <option value="Verizon"
                                                        {{ old('carrier', $data->carrier) == 'Verizon' ? 'selected="selected"' : '' }}>
                                                        Verizon</option>
                                                    <option value="Sprint">Sprint</option>
                                                    <option value="Virgin Mobile"
                                                        {{ old('carrier', $data->carrier) == 'Virgin Mobile' ? 'selected="selected"' : '' }}>
                                                        Virgin Mobile</option>
                                                    <option value="Tracfone"
                                                        {{ old('carrier', $data->carrier) == 'Tracfone' ? 'selected="selected"' : '' }}>
                                                        Tracfone</option>
                                                    <option value="Metro PCS"
                                                        {{ old('carrier', $data->carrier) == 'Metro PCS' ? 'selected="selected"' : '' }}>
                                                        Metro PCS</option>
                                                    <option value="U.S. Cellular"
                                                        {{ old('carrier', $data->carrier) == 'U.S. Cellular' ? 'selected="selected"' : '' }}>
                                                        U.S. Cellular</option>
                                                    <option value="Cricket Wireless"
                                                        {{ old('carrier', $data->carrier) == 'Cricket Wireless' ? 'selected="selected"' : '' }}>
                                                        Cricket Wireless</option>
                                                    <option value="Consumer Cellular"
                                                        {{ old('carrier', $data->carrier) == 'Consumer Cellular' ? 'selected="selected"' : '' }}>
                                                        Consumer Cellular</option>
                                                    <option value="Boost Mobile"
                                                        {{ old('carrier', $data->carrier) == 'Boost Mobile' ? 'selected="selected"' : '' }}>
                                                        Boost Mobile</option>
                                                    <option value="Straight Talk"
                                                        {{ old('carrier', $data->carrier) == 'Straight Talk' ? 'selected="selected"' : '' }}>
                                                        Straight Talk</option>
                                                    <option value="Thumb Cellular"
                                                        {{ old('carrier', $data->carrier) == 'Thumb Cellular' ? 'selected="selected"' : '' }}>
                                                        Thumb Cellular</option>
                                                    <option value="Ultra Mobile"
                                                        {{ old('carrier', $data->carrier) == 'Ultra Mobile' ? 'selected="selected"' : '' }}>
                                                        Ultra Mobile</option>
                                                    <option value="Xfinity"
                                                        {{ old('carrier', $data->carrier) == 'Xfinity' ? 'selected="selected"' : '' }}>
                                                        Xfinity</option>
                                                    <option value="Union Wireless"
                                                        {{ old('carrier', $data->carrier) == 'Union Wireless' ? 'selected="selected"' : '' }}>
                                                        Union Wireless</option>
                                                    <option value="GCI Mobile"
                                                        {{ old('carrier', $data->carrier) == 'GCI Mobile' ? 'selected="selected"' : '' }}>
                                                        GCI Mobile</option>
                                                    <option value="Republic Wireless"
                                                        {{ old('carrier', $data->carrier) == 'Republic Wireless' ? 'selected="selected"' : '' }}>
                                                        Republic Wireless</option>
                                                    <option value="Project Fi Google"
                                                        {{ old('carrier', $data->carrier) == 'Project Fi Google' ? 'selected="selected"' : '' }}>
                                                        Project Fi Google</option>
                                                </select></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td>Patient Photo:</td>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                @if ($data->patientphoto != null)
                                                                    <img src="{!!  asset('uploadimages/' . $data->patientphoto) !!}"
                                                                        height="100">
                                                            </td>
                                                            <td valign="top">
                                                                <img src="{{ asset('/images/delete.png') }}"
                                                                    onclick="{{ URL::to('/deleteimage/' . $data->id) }}">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table><br><input name="patientphoto" type="file">
                                            </td>

                                            <td>Language:</td>
                                            <td><select name="language">
                                                    <option value="" selected="">Select Language
                                                    </option>
                                                    <option value="English"
                                                        {{ old('language', $data->language) == 'English' ? 'selected="selected"' : '' }}>
                                                        English</option>
                                                    <option value="Spanish"
                                                        {{ old('language', $data->language) == 'Spanish' ? 'selected="selected"' : '' }}>
                                                        Spanish</option>
                                                    <option value="Chinese"
                                                        {{ old('language', $data->language) == 'Chinese' ? 'selected="selected"' : '' }}>
                                                        Chinese</option>
                                                    <option value="French"
                                                        {{ old('language', $data->language) == 'French' ? 'selected="selected"' : '' }}>
                                                        French</option>
                                                    <option value="Tagalog"
                                                        {{ old('language', $data->language) == 'Tagalog' ? 'selected="selected"' : '' }}>
                                                        Tagalog</option>
                                                    <option value="Vietnamese"
                                                        {{ old('language', $data->language) == 'Vietnamese' ? 'selected="selected"' : '' }}>
                                                        Vietnamese</option>
                                                    <option value="Korean"
                                                        {{ old('language', $data->language) == 'Korean' ? 'selected="selected"' : '' }}>
                                                        Korean</option>
                                                    <option value="German"
                                                        {{ old('language', $data->language) == 'German' ? 'selected="selected"' : '' }}>
                                                        German</option>
                                                    <option value="Arabic"
                                                        {{ old('language', $data->language) == 'Arabic' ? 'selected="selected"' : '' }}>
                                                        Arabic</option>
                                                    <option value="Russian"
                                                        {{ old('language', $data->language) == 'Russian' ? 'selected="selected"' : '' }}>
                                                        Russian</option>
                                                    <option value="Italian"
                                                        {{ old('language', $data->language) == 'Italian' ? 'selected="selected"' : '' }}>
                                                        Italian</option>
                                                    <option value="Portuguese"
                                                        {{ old('language', $data->language) == 'Portuguese' ? 'selected="selected"' : '' }}>
                                                        Portuguese</option>
                                                    <option value="Hindi"
                                                        {{ old('language', $data->language) == 'Hindi' ? 'selected="selected"' : '' }}>
                                                        Hindi</option>
                                                    <option value="Polish"
                                                        {{ old('language', $data->language) == 'Polish' ? 'selected="selected"' : '' }}>
                                                        Polish</option>
                                                    <option value="Japanese"
                                                        {{ old('language', $data->language) == 'Japanese' ? 'selected="selected"' : '' }}>
                                                        Japanese</option>
                                                    <option value="Urdu"
                                                        {{ old('language', $data->language) == 'Urdu' ? 'selected="selected"' : '' }}>
                                                        Urdu</option>
                                                    <option value="Persian"
                                                        {{ old('language', $data->language) == 'Persian' ? 'selected="selected"' : '' }}>
                                                        Persian</option>
                                                    <option value="Gujarati"
                                                        {{ old('language', $data->language) == 'Gujarati' ? 'selected="selected"' : '' }}>
                                                        Gujarati</option>
                                                    <option value="Greek"
                                                        {{ old('language', $data->language) == 'Greek' ? 'selected="selected"' : '' }}>
                                                        Greek</option>
                                                    <option value="Bengali"
                                                        {{ old('language', $data->language) == 'Bengali' ? 'selected="selected"' : '' }}>
                                                        Bengali</option>
                                                    <option value="Panjabi"
                                                        {{ old('language', $data->language) == 'Panjabi' ? 'selected="selected"' : '' }}>
                                                        Panjabi</option>
                                                    <option value="Telugu"
                                                        {{ old('language', $data->language) == 'Telugu' ? 'selected="selected"' : '' }}>
                                                        Telugu</option>
                                                    <option value="Armenian"
                                                        {{ old('language', $data->language) == 'Armenian' ? 'selected="selected"' : '' }}>
                                                        Armenian</option>
                                                    <option value="Hmong"
                                                        {{ old('language', $data->language) == 'Hmong' ? 'selected="selected"' : '' }}>
                                                        Hmong</option>
                                                    <option value="Hebrew"
                                                        {{ old('language', $data->language) == 'Hebrew' ? 'selected="selected"' : '' }}>
                                                        Hebrew</option>
                                                </select></td>
                                            <td>Date patient created:</td>
                                            <td><input name="datecreatedmonth" value="{{ $data->created_at->format('m') }}"
                                                    size="1">
                                                <input name="datecreatedday" value="{{ $data->created_at->format('d') }}"
                                                    size="1"><input name="datecreatedyear"
                                                    value="{{ $data->created_at->format('Y') }}" size="2">
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr bgcolor="#d9d9d9">
                                            <td colspan="8" align"left"=""
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;"
                                                align="right"><input type="image" name="submitbutton" value="Save"
                                                    src="{{ asset('nlimages/savebutton.png') }}" height="25"></td>
                                        </tr>
                                    </tbody>
                                </table><br>
                            </center>
                     
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
