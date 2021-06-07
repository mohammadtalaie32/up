@extends('layouts.manage')

@section('content')
    <form name="encform" enctype="multipart/form-data" action="{{ route('udateInsuranceinfo', $data->id) }}" method="get">
        <script>
            var yearon = "2020"; //pickayear(yearon);

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
                    <td><img src="images/spacer.png" height="30"></td>
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
                            function checkother(i) {
                                var carrier = document.getElementById('carriername' + i).value;
                                if (carrier == 'Other') {
                                    document.getElementById('carriername' + i).style.display = 'none';
                                    document.getElementById('carriernameother' + i).style.display =
                                        'block';
                                    document.getElementById('carriernameother' + i).focus();
                                }
                            }

                            function cancelother() {
                                if (document.getElementById('carriernameother' + i).value == '') {
                                    document.getElementById('carriername' + i).style.display = 'block';
                                    document.getElementById('carriernameother' + i).style.display =
                                        'none';
                                    document.getElementById('carriername' + i).value = '';
                                }
                            }

                            function addsubmit() {
                                document.insuranceform.add.value = 'true';
                                document.insuranceform.submit();
                            }

                            function deletesubmit(i) {
                                document.insuranceform.todelete.value = i;
                                document.insuranceform.submit();
                            }

                        </script>
                    
                            <input type="hidden" name="tosubmit" value="true">
                            <input type="hidden" name="add">
                            <input type="hidden" name="toadd" value="">
                            <input type="hidden" name="tosave" value="1">
                            <input type="hidden" name="todelete">
                            <center>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td colspan="1"
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;padding:5px;">
                                                <font size="+2">Insurance Information</font>
                                                <img src="{{ asset('nlimages/addbutton.png') }}" onclick="addsubmit();"
                                                    style="display:inline">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table cellspacing="0" cellpadding="10">
                                                    <tbody>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Insurance #1:</td>
                                                            <td>
                                                                <input type="radio" name="insuranceprimary" value="0"
                                                                    checked=""> Primary
                                                            </td>
                                                            <td>
                                                                <img src="{{ asset('nlimages/deletebutton.png') }}"
                                                                    onclick="deletesubmit(0)">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Insurance Annual Reset Date:</td>
                                                            <td colspan="2">
                                                                <input name="resetmonth0" value="January" disabled="">
                                                                <input name="resetdate0" value="1" disabled="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Effective Date:</td>
                                                            <td colspan="2">
                                                                <input name="effectivemonth0" value="January" disabled="">
                                                                <input name="effectiveday0" value="1" disabled="">
                                                                <input name="effectiveyear0" value="2019" disabled="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>End Date:</td>
                                                            <td colspan="2">
                                                                <input name="endmonth0" value="January" disabled="">
                                                                <input name="endday0" value="1" disabled="">
                                                                <input name="endyear0" value="2019" disabled="">
                                                            </td>
                                                        </tr>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Carrier Name:</td>
                                                            <td colspan="2">
                                                                <select name="carriername0">
                                                                    <option value=""></option>
                                                                    <option value="BLUE CROSS BLUE SHIELD"
                                                                        {{ old('carriername0', $data->carriername0) == 'BLUE CROSS BLUE SHIELD' ? 'selected="selected"' : '' }}>
                                                                        BLUE CROSS BLUE SHIELD</option>
                                                                    <option value="AARP"
                                                                        {{ old('carriername0', $data->carriername0) == 'AARP' ? 'selected="selected"' : '' }}>
                                                                        AARP</option>
                                                                    <option value="AETNA"
                                                                        {{ old('carriername0', $data->carriername0) == 'AETNA' ? 'selected="selected"' : '' }}>
                                                                        AETNA</option>
                                                                    <option value="CIGNA"
                                                                        {{ old('carriername0', $data->carriername0) == 'CIGNA' ? 'selected="selected"' : '' }}>
                                                                        CIGNA</option>
                                                                    <option value="HEALTHCOMP"
                                                                        {{ old('carriername0', $data->carriername0) == 'HEALTHCOMP' ? 'selected="selected"' : '' }}>
                                                                        HEALTHCOMP</option>
                                                                    <option value="HEALTHNET OF CALIFORNIA &amp; OREGON"
                                                                        {{ old('carriername0', $data->carriername0) == 'HEALTHNET OF CALIFORNIA &amp; OREGON' ? 'selected="selected"' : '' }}>
                                                                        HEALTHNET OF CALIFORNIA &amp;
                                                                        OREGON</option>
                                                                    <option value="UHC - UNITED HEALTH CARE"
                                                                        {{ old('carriername0', $data->carriername0) == 'UHC - UNITED HEALTH CARE' ? 'selected="selected"' : '' }}>
                                                                        UHC - UNITED HEALTH CARE
                                                                    </option>
                                                                    <option value="UMR-WAUSAU"
                                                                        {{ old('carriername0', $data->carriername0) == 'UMR-WAUSAU' ? 'selected="selected"' : '' }}>
                                                                        UMR-WAUSAU</option>
                                                                    <option value="SECURE HORIZONS"
                                                                        {{ old('carriername0', $data->carriername0) == 'SECURE HORIZONS' ? 'selected="selected"' : '' }}>
                                                                        SECURE HORIZONS</option>
                                                                    <option value="Other"
                                                                        {{ old('carriername0', $data->carriername0) == 'Other' ? 'selected="selected"' : '' }}>
                                                                        Other</option>
                                                                </select><input name="carriernameother0"
                                                                    id="carriernameother0"
                                                                    value="{{ old('carriernameother0', $data->carriernameother0) }}"
                                                                    style="display:none;"
                                                                    onblur="javascript:cancelother();">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Insured Name:</td>
                                                            <td colspan="2">
                                                                <input name="insuredname0"
                                                                    value="{{ old('insuredname0', $data->insuredname0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Claims Adjuster:</td>
                                                            <td colspan="2">
                                                                <input name="claimsadjuster0"
                                                                    value="{{ old('claimsadjuster0', $data->claimsadjuster0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Insured DOB:</td>
                                                            <td colspan="2"><input name="insureddob0"
                                                                    value="{{ old('insureddob0', $data->insureddob0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Relationship to Insured:</td>
                                                            <td colspan="2"><select name="relationshiptoinsured0">
                                                                    <option value="Self" selected="">
                                                                        Self</option>
                                                                    <option value="Spouse"
                                                                        {{ old('relationshiptoinsured0', $data->relationshiptoinsured0) == 'Spouse' ? 'selected="selected"' : '' }}>
                                                                        Spouse</option>
                                                                    <option value="Child"
                                                                        {{ old('relationshiptoinsured0', $data->relationshiptoinsured0) == 'Child' ? 'selected="selected"' : '' }}>
                                                                        Child</option>
                                                                </select></td>
                                                        </tr>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Insured's Policy Number:</td>
                                                            <td colspan="2">
                                                                <input name="policynumber0"
                                                                    value="{{ old('policynumber0', $data->policynumber0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Group Number:</td>
                                                            <td colspan="2"><input name="groupnumber0" value=""></td>
                                                        </tr>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Claim Number:</td>
                                                            <td colspan="2">
                                                                <input name="claimnumber0"
                                                                    value="{{ old('claimnumber0', $data->claimnumber0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone Number:</td>
                                                            <td colspan="2"><input name="phonenumber0"
                                                                    value="{{ old('phonenumber0', $data->phonenumber0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Visits Used With Up2Speed:</td>
                                                            <td> <b>0</b></td>
                                                            <td>(For year <u>2020</u>)</td>
                                                        </tr>
                                                        <script>
                                                            function changetotal(i) {
                                                                var total = 0;
                                                                var visitsused = parseInt(document
                                                                    .getElementById('visitsused' +
                                                                        i).value);
                                                                if (visitsused != parseInt(document
                                                                        .getElementById('visitsused' +
                                                                            i).value)) visitsused = 0;
                                                                var visitsauthorized = parseInt(document
                                                                    .getElementById(
                                                                        'visitsauthorized' + i)
                                                                    .value);
                                                                var remainingstr =
                                                                    'Visits Remaining: <b>' + (
                                                                        visitsauthorized - (total +
                                                                            visitsused)) + '</b>';
                                                                if (visitsauthorized != parseInt(
                                                                        document.getElementById(
                                                                            'visitsauthorized' + i)
                                                                        .value)) remainingstr =
                                                                    'Visits Remaining: <b>N/A</b>';
                                                                document.getElementById(
                                                                        'totalvisitsused' + i)
                                                                    .innerHTML =
                                                                    'Total Visits Used: <b>' + (total +
                                                                        visitsused) + '</b>';
                                                                if (document.getElementById(
                                                                        'visitsauthorized' + i).value !=
                                                                    'UNLIMITED') {
                                                                    document.getElementById(
                                                                            'visitsremaining' + i)
                                                                        .innerHTML = remainingstr;
                                                                    document.getElementById(
                                                                            'unlimited' + i).checked =
                                                                        false;
                                                                } else {
                                                                    document.getElementById(
                                                                            'visitsremaining' + i)
                                                                        .innerHTML =
                                                                        "Visits Remaining: <b>&infin;</b>";
                                                                    document.getElementById(
                                                                            'unlimited' + i).checked =
                                                                        true;
                                                                }
                                                            }

                                                            function selectbg(inout, ti) {
                                                                document.getElementById('ins' + inout +
                                                                    ti).checked = 'true';
                                                                if (inout == 'in') {
                                                                    document.getElementById('tdin' + ti)
                                                                        .style.backgroundImage =
                                                                        'url(nlimages/buttonred.png)';
                                                                    document.getElementById('tdout' +
                                                                            ti).style.backgroundImage =
                                                                        'url(nlimages/buttonblack.png)';
                                                                }
                                                                if (inout == 'out') {
                                                                    document.getElementById('tdout' +
                                                                            ti).style.backgroundImage =
                                                                        'url(nlimages/buttonred.png)';
                                                                    document.getElementById('tdin' + ti)
                                                                        .style.backgroundImage =
                                                                        'url(nlimages/buttonblack.png)';
                                                                }
                                                            }

                                                            function adddeductible(ti) {
                                                                document.getElementById(
                                                                        'numdeductible' + ti).value =
                                                                    parseInt(document.getElementById(
                                                                        'numdeductible' + ti).value) +
                                                                    1;
                                                                document.getElementById("adddiv" + ti)
                                                                    .style.display = "none";
                                                                document.getElementById(
                                                                        "adddeductible" + ti).style
                                                                    .display = "table-row";
                                                            }

                                                            function removedeductible(ti) {
                                                                document.getElementById(
                                                                        'numdeductible' + ti).value =
                                                                    parseInt(document.getElementById(
                                                                        'numdeductible' + ti).value) -
                                                                    1;
                                                                document.getElementById("adddiv" + ti)
                                                                    .style.display = "block";
                                                                document.getElementById(
                                                                        "adddeductible" + ti).style
                                                                    .display = "none";
                                                            }

                                                            function deletedeductible(ti, di) {
                                                                document.getElementById(
                                                                        'deletedeductible' + ti).value =
                                                                    di;
                                                                document.insuranceform.submit();
                                                            }

                                                            function setunlimited(ti) {
                                                                if (document.getElementById(
                                                                        'unlimited' + ti).checked)
                                                                    document.getElementById(
                                                                        'visitsauthorized' + ti).value =
                                                                    'UNLIMITED';
                                                                else
                                                                    document.getElementById(
                                                                        'visitsauthorized' + ti).value =
                                                                    '';
                                                                document.getElementById(
                                                                        'visitsauthorized' + ti)
                                                                    .onchange();
                                                            }

                                                        </script>
                                                        <tr>
                                                            <td>Visits Used Elsewhere:</td>
                                                            <td>
                                                                <input name="visitsused0" id="visitsused0"
                                                                    value="{{ old('visitsused0', $data->visitsused0) }}"
                                                                    onchange="javascript:changetotal(0)">
                                                            </td>
                                                            <td>
                                                                <div id="totalvisitsused0">Total Visits
                                                                    Used: <b>0</b></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Number of Visits Authorized:</td>
                                                            <td><input style="width:100px" name="visitsauthorized0"
                                                                    id="visitsauthorized0"
                                                                    value="{{ old('visitsauthorized0', $data->visitsauthorized0) }}"
                                                                    onchange="javascript:changetotal(0)">
                                                                <input type="checkbox" id="unlimited0"
                                                                    onchange="javascript:setunlimited(0);">
                                                                Unlimited
                                                            </td>
                                                            <td>
                                                                <div id="visitsremaining0">Visits
                                                                    Remaining: <b>N/A</b></div>
                                                            </td>
                                                        </tr>
                                                        <input type="hidden" name="numdeductible0" id="numdeductible0"
                                                            value="1"><input type="hidden" name="deletedeductible0"
                                                            id="deletedeductible0">
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Deductible for billing:</td>
                                                            <td>$ <input name="billingdeductible0-0" value=""></td>
                                                            <td>For year: <input name="billingdeductibleyear0-0"
                                                                    value="{{ old('billingdeductibleyear0', $data->billingdeductibleyear0) }}">
                                                                &nbsp;&nbsp;
                                                                <img src="{{ asset('images/delete.png') }}"
                                                                    style="display:inline"
                                                                    onclick="deletedeductible('0','0')" width="15"
                                                                    height="15"><span style="float:right" id="adddiv0"><a
                                                                        href="javascript:adddeductible('0');">Add</a></span>
                                                            </td>
                                                        </tr>
                                                        <tr style="display:none;" id="adddeductible0" bgcolor="#f1f1f1">
                                                            <td></td>
                                                            <td>$
                                                                <input name="billingdeductible1"
                                                                    value="{{ old('billingdeductible1', $data->billingdeductible1) }}">
                                                            </td>
                                                            <td>
                                                                <table cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>For year:
                                                                                <input name="billingdeductibleyear1"
                                                                                    value="{{ old('billingdeductibleyear1', $data->billingdeductibleyear1) }}">
                                                                                &nbsp;&nbsp;
                                                                                <img src="{{ asset('images/delete.png') }}"
                                                                                    style="display:inline"
                                                                                    onclick="removedeductible('0');"
                                                                                    width="15" height="15">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td colspan="3" align="center">
                                                                <table width="800" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center">Use if
                                                                                the billing deductible
                                                                                has changed from year to
                                                                                year. If left blank or
                                                                                if year is not
                                                                                specified, deductible
                                                                                for billing and YTD
                                                                                calculations will
                                                                                default to deductible
                                                                                for whichever in or out
                                                                                of network is selected.
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Select:<div style="display:none"><input type="radio"
                                                                        id="insin0" name="insnetwork0" value="in">
                                                                    In
                                                                    <input type="radio" id="insout0" name="insnetwork0"
                                                                        value="out">
                                                                    Out
                                                                </div>
                                                            </td>
                                                            <td align="center">
                                                                <table width="200" height="30" cellspacing="0"
                                                                    cellpadding="0">
                                                                    <tbody>
                                                                        <tr height="30">
                                                                            <td id="tdin0"
                                                                                background="{{ asset('nlimages/buttonblack.png') }}"
                                                                                style="background-size:200px 30px;color:white;"
                                                                                width="200" align="center"><a href=""
                                                                                    style="color:white;text-decoration:none;">
                                                                                    <div style="width:200px;height:20px">
                                                                                        <b>IN
                                                                                            NETWORK</b>
                                                                                    </div>
                                                                                </a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td align="center">
                                                                <table width="200" height="30" cellspacing="0"
                                                                    cellpadding="0">
                                                                    <tbody>
                                                                        <tr height="30">
                                                                            <td id="tdout0"
                                                                                background="{{ asset('nlimages/buttonblack.png') }}"
                                                                                style="background-size:200px 30px;color:white;"
                                                                                width="200" align="center"><a href=""
                                                                                    style="color:white;text-decoration:none;">
                                                                                    <div style="width:200px;height:20px">
                                                                                        <b>OUT OF
                                                                                            NETWORK</b>
                                                                                    </div>
                                                                                </a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Deductible</td>
                                                            <td align="center">$ <input name="insindeductible0"
                                                                    value="{{ old('insindeductible0', $data->insindeductible0) }}">
                                                            </td>
                                                            <td align="center">$
                                                                <input name="insoutdeductible0"
                                                                    value="{{ old('insoutdeductible0', $data->insoutdeductible0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Remaining</td>
                                                            <td align="center">
                                                                <input name="insinremaining0"
                                                                    value="{{ old('insinremaining0', $data->insinremaining0) }}">
                                                            </td>
                                                            <td align="center">
                                                                <input name="insoutremaining0"
                                                                    value="{{ old('insoutremaining0', $data->insoutremaining0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Co-Insurance</td>
                                                            <td align="center">
                                                                <input name="insincoinsurance0"
                                                                    value="{{ old('insincoinsurance0', $data->insincoinsurance0) }}">
                                                            </td>
                                                            <td align="center">
                                                                <input name="insoutcoinsurance0"
                                                                    value="{{ old('insoutcoinsurance0', $data->insoutcoinsurance0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr bgcolor="#f1f1f1">
                                                            <td>Co-Pay</td>
                                                            <td align="center"><input name="insincopay0"
                                                                    value="{{ old('insincopay0', $data->insincopay0) }}">
                                                            </td>
                                                            <td align="center">
                                                                <input name="insoutcopay0"
                                                                    value="{{ old('insoutcopay0', $data->insoutcopay0) }}">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Notes</td>
                                                            <td colspan="2" align="center">
                                                                <textarea name="insnotes0" rows="3" cols="50">
                                                                {{ old('insnotes0', $data->insnotes0) }}</textarea>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr bgcolor="#d9d9d9">
                                            <td colspan="1"
                                                style="border-top:2px solid #999494;border-bottom:2px solid #999494;"
                                                valign="middle" align="right">
                                                <input id="savebutton" type="image"
                                                    src="{{ asset('nlimages/savebutton.png') }}" height="25">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                      
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
