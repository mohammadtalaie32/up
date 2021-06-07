

<!--text/x-generic getassessmenticd.blade.php ( ASCII English text, with very long lines )-->
@extends('layouts.managePO')

@section('content')

 <div class="year-encounter">
                        <div id="visitlist">
                            <table id="visittable" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr height="30">
                                        @php
                                        $currentYear = 0;
                                        @endphp
                                        @forelse ($yearVisits as $i => $visit)
                                            @php
                                            if(null != request('year'))
                                            $currentYear = request('year');
                                            elseif (isset($currentVisit))
                                            $currentYear = $currentVisit->dateyear;
                                            else
                                            if ($i == 0) {
                                            $currentYear = $visit['year'];
                                            }
                                            @endphp
                                            <td id="yeartd"
                                                class="year-tab text-center {{ $currentYear == $visit['year'] ? 'active' : '' }}">
                                                <a href="{{ route('manage', [request('id'), $visit['year']]) }}"
                                                    class="text-dark">
                                                    {{ $visit['year'] }}
                                                </a>
                                                ({{ $visit['count'] }})
                                            </td>
                                        @empty
                                            <h4 class="text-center">
                                                No Visits
                                            </h4>
                                        @endforelse
                                        @foreach ($visits as $visit)
                                            @if ($visit->billing == 'ready')
                                                @php
                                                $billsrc='billingready';
                                                @endphp
                                            @elseif($visit->billing=='complete')
                                                @php
                                                $billsrc='billingcomplete';
                                                @endphp
                                            @else
                                                @php
                                                $billsrc='billingincomplete';
                                                @endphp
                                            @endif
                                            @if ($visit->payment == 'partial')
                                                @php
                                                $paysrc='paymentpartial';
                                                @endphp
                                            @elseif($visit->payment=='full')
                                                @php
                                                $paysrc ='paymentfull';
                                                @endphp
                                            @else
                                                @php
                                                $paysrc='paymentwaiting';
                                                @endphp
                                            @endif
                                            @if ($visit->dateyear == $currentYear)
                                                @php
                                                $printyear = true;
                                                $activeClass='';
                                                if (null != request('encId')) {
                                                if ($visit->id == (request('encId'))) {
                                                $activeClass = 'active';
                                                }
                                                }
                                                $dateURL = route('soap', [request('id'), $visit->encounterdatesort]);
                                                @endphp
                                                @isset($dateTabs)
                                                    @php
                                                    $dateURL = route('assessmentICD', [request('id'), $visit->id]);
                                                    @endphp
                                                @endisset
                                                <td id="yeartd" class="date-tab {{ $activeClass }} text-center">
                                                    <img src="{{ asset('/nlimages/billing/' . $billsrc . '.png') }}"
                                                        width="15" height="15" style="display:inline;"
                                                        onclick="changeBill('{{ $visit->id }}', '{{ $visit->encounterdate }}','{{ $visit->billing }}')">
                                                    <a href="{{ $dateURL }}" class="text-dark">
                                                        {{ $visit->encounterdatesort }}
                                                    </a>
                                                    <img id="headerbilling{{ $visit->id }}"
                                                        src="{{ asset('/nlimages/billing/' . $paysrc . '.png') }}"
                                                        width="15" height="15" style="display:inline;"
                                                        onclick="headerpreview('{{ $visit->id }}', '{{ $visit->encounterdate }}', '{{ $data->billing }}', '{{ $visit->payment }}', '{{ $visit->billingclaimnumber }}', '{{ $visit->billingdatesent }}', '{{ $visit->billingamount }}', '{{ $visit->codedamount }}', '{{ $visit->billingpaid }}', '{{ $visit->billingnotes }}', '{{ $visit->paymentnotes }}')">
                                                </td>
                                            @else
                                                @php
                                                $printyear = false;
                                                @endphp
                                            @endif
                                            {{-- @if (null != request('year'))
                                                @if ($visit->dateyear == request('year'))
                                                @endif
                                                @else
                                                @if ($visit->dateyear == date('Y'))
                                                    @php
                                                    $printyear = false;
                                                    @endphp
                                                    <td id="yeartd" class="date-tab text-center">
                                                        <img src="{{ asset('/nlimages/billing/' . $billsrc . '.png') }}"
                                                            width="15" height="15" style="display:inline;"
                                                            onclick="changeBill('{{ $visit->id }}', '{{ $visit->encounterdate }}','{{ $visit->billing }}')">
                                                        <a href="{{ route('soap', [request('id'), $visit->encounterdatesort]) }}"
                                                            class="text-dark">
                                                            {{ $visit->encounterdatesort }}
                                                        </a>
                                                        <img id="hea
                                                        derbilling{{ $visit->id }}"
                                                            src="{{ asset('/nlimages/billing/' . $paysrc . '.png') }}"
                                                            height="15" style="display:inline;" width="15"
                                                            onclick="headerpreview('{{ $visit->id }}', '{{ $visit->encounterdate }}',
                                                            '{{ $data->billing }}', '{{ $visit->payment }}', '{{ $visit->billingclaimnumber }}',
                                                            '{{ $visit->billingdatesent }}', '{{ $visit->billingamount }}',
                                                            '{{ $visit->codedamount }}', '{{ $visit->billingpaid }}',
                                                            '{{ $visit->billingnotes }}', '{{ $visit->paymentnotes }}')">
                                                    </td>
                                                @endif
                                            @endif --}}
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
<script>
    function selectte(key, index, letter) {
        if (document.getElementById('dxcodeselect' + key + index).value == 'manage') {
            if (window.confirm(
                    'Are you sure you want to leave the current page to edit favorites? All unsaved changes will be lost.'
					
                )) {
                window.location.href = 'favoritesmanage.php';
            } else {
                return;
            }
        }
        if (document.getElementById('dxcodeselect' + key + index).value != '' && document.getElementById(
                'dxcodeselect' + key + index).value != 'Select a code') {
            if (document.getElementById('showpointerdiv' + letter).innerText.indexOf('TE (97110)') == -1) {
                document.getElementById('selectpointer97110').value = letter;
                selectpointer('97110', 'TE (97110)', '0', 'procmod', 'vertical');
            }
        } else {
            removepointer('97110', 'TE (97110)', '0', 'procmod', 'vertical', letter, 'green');
        }
    }

    function checkarea(area, arr) {
        if (area != '') {
            if ((!document.getElementById(area + 'check').checked) && document.getElementById(arr).checked) {
                document.getElementById(area + 'check').checked = true;
                document.getElementById(area + 'check').onchange();
            }
        }
        if (document.getElementById(arr + 'td')) {
            if (document.getElementById(arr).checked) document.getElementById(arr + 'td').style.backgroundImage =
                'url(//nlimages/chart/pinkbg.png)';
            else {
                var bg = 'graybg';
                if (area == 'cervical' || area == 'thoracic' || area == 'lumbar' || area == 'si') bg = 'bluebg';
                if (area == 'shoulder' || area == 'elbow' || area == 'wrist') bg = 'purplebg';
                if (area == 'hip' || area == 'knee' || area == 'ankle' || area == 'foot') bg = 'orangebg';
                if (area != '') document.getElementById(arr + 'td').style.backgroundImage =
                    'url(//nlimages/chart/' + bg + '.png)';
            }
        }
    }

    function checktd(checktd, tdid, color) {
        if (color == null) color = 'gray';
        if (document.getElementById(checktd)) {
            if (document.getElementById(checktd).checked) {
                if (document.getElementById(tdid)) document.getElementById(tdid).style.backgroundImage =
                    'url(//nlimages/chart/pinkbg.png)';
                if (document.getElementById(checktd + 'img')) document.getElementById(checktd + 'img').src =
                    '//nlimages/chart/check.png';
            } else {
                if (document.getElementById(tdid)) document.getElementById(tdid).style.backgroundImage =
                    'url(//nlimages/chart/' + color + 'bg.png)';
                if (document.getElementById(checktd + 'img')) document.getElementById(checktd + 'img').src =
                    '/assets//demo2/limages/spacer.png';
            }
        }
    }
    var caton = [];

    function checkadd(index, category) {
        caton[index] = category;
        if (document.getElementById('dxcodeselect' + category + index)) {
            if (document.getElementById('dxcodeselect' + category + index).value == 'add') {
                document.getElementById('dxcodeselect' + category + index).style.display = 'none';
                document.getElementById('addcodediv' + index).style.display = 'block';
            }
        }
    }

    function hideadd(index) {
        document.getElementById('dxcodeselect' + caton[index] + index).value = '';
        document.getElementById('dxcodeselect' + caton[index] + index).style.display = 'block';
        document.getElementById('addcodediv' + index).style.display = 'none';
        caton[index] = null;
    }

</script>

<script>
    function writeunits() {
        var abcs = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'
        ];
        for (var i = 0; i < abcs.length; i++) {
            document.getElementById('showunits' + i).innerHTML = '';
        }
        var letters = ['te', 'mr', 'neure', 'mass', 'trac', 'es', 'us', 'inflz'];
        var codes = ['97110', '97140', '97112', '97124', '97012', '97032', '97035', '97026'];
        var units = [],
            pointers = [];
        var str = '';
        for (var i = 0, i2 = 0; i < letters.length; i++) {
            units[i] = document.getElementById(letters[i] + 'select').value;
            if (units[i] != '') {
                var text, code;
                if (letters[i] == 'mass') {
                    thecode = procon.split('%SE%');
                    text = thecode[0];
                    code = thecode[1];
                }
                //window.alert(thecode);}
                else if (letters[i] == 'inflz') {
                    thecode = modon.split('%SE%');
                    text = thecode[0];
                    code = thecode[1];
                } else {
                    text = letters[i];
                    code = codes[i];
                }
                document.getElementById('showunits' + i2).innerHTML = text.toUpperCase().replace('NEURE', 'NEURO') +
                    ' (' + code + '): <b>' + document.getElementById(letters[i] + 'select').value + ' units</b>';
                i2++;
            }
        }
    }

</script>
@section('content')
    
<script>
    <form name="encform" enctype="multipart/form-data" action="" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="patient_id" value="">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td id="viewport" width="100%" valign="top" align="left">
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
                                } else if (window.confirm(' Mark billing for visit ' + thedate + ' as ' + billq + '
    ?')) { document.encform.gotodate.value=thedate; if (theaction !=null) document.encform.page.value=theaction;
    document.encform.markbilling.value=bill; document.encform.submit(); } } var basewidth=0; var greatesti; function
    pickayear(theyear) { //window.alert(yearon); //if(theyear!=yearon){
    //document.encform.encounterviewyear.value=theyear; //if(theaction!=null) document.encform.page.value=theaction;
    //document.encform.submit(); for (var i=0; document.getElementById('encountertd' + yearon + i); i++) {
    document.getElementById('encountertd' + yearon + i).style.display='none' ; } for (var i=0;
    document.getElementById('encountertd' + theyear + i); i++) { document.getElementById('encountertd' + theyear +
    i).style.display='table-cell' ; greatesti=i; } if (document.getElementById('yeartd' + yearon))
    document.getElementById('yeartd' + yearon).style.backgroundImage='url(nlimages/tabyearinactive.png)' ;
    document.getElementById('yeartd' + theyear).style.backgroundImage='url(nlimages/tabyearactive.png)' ;
    yearon=theyear; if (parseInt(document.getElementById('viewport').offsetWidth) < basewidth + (greatesti + 1) * 150) {
    document.getElementById('visittable').style.width=basewidth + (greatesti + 1) * 150 + 'px' ; } else {
    document.getElementById('visittable').style.width=parseInt(document .getElementById('viewport').offsetWidth) + 'px'
    ; } //} } function changewidth() { /*window.alert(parseInt(document.getElementById('viewport').offsetWidth)+' '+(basewidth+greatesti*150));	
                                if(parseInt(document.getElementById(' viewport').offsetWidth)<basewidth+greatesti*150)
    document.getElementById('visittable').style.width=basewidth+(greatesti+1)*150+'px';*/ } /*for(var
    i=0;document.getElementById('encountertd'+yearoon+i);i++){
    document.getElementById('encountertd'+yearoon+i).style.display='table-cell' ; greatesti=i; }*/
    window.addEventListener("resize", changewidth); var headershown='' ; function headerpreview(uniquekey,
    encounterdate, billing, payment, claimnumber, datesent, billedamount, codedamount, billingpaid, billingnotes,
    paymentnotes) { var xpos=document.getElementById('headerbilling' + uniquekey).getBoundingClientRect() .left; if
    (document.getElementById('headerbp')) { if (headershown=='' || headershown !=uniquekey) { if (xpos - 130 + 300 -
    208> parseInt(document.getElementById('viewport')
    .offsetWidth)) document.getElementById('headerbp').style.left = document
    .getElementById('viewport').offsetWidth + 238 - 355;
    //window.alert(parseInt(document.getElementById('viewport').offsetWidth)+' '+(xpos-130+300-238).toString());
    else document.getElementById('headerbp').style.left = xpos - 130;
    document.getElementById('headerbp').innerHTML =
    '<table style="border:1px solid #fefefe;" border="1" cellspacing="0" cellpadding="2" width="100%">
        <tr>
            <td><u>' +
                    encounterdate + '</u></td>
            <td align="right">' +
                '<span style="float:right;"><a href="javascript:headerpreview(\'' +
                                            uniquekey +
                                            '\');"><img src="images/delete.png"></a></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>' +
        '<tr>
            <td><b>Billing</b>: </td>
            <td>' + billing + '</td>
        </tr>' +
        '<tr>
            <td>Claim #: </td>
            <td>' + claimnumber + '</td>
        </tr>' +
        '<tr>
            <td>Date Sent: </td>
            <td>' + datesent + '</td>
        </tr>' +
        '<tr>
            <td>Billed Amount: <span style="float:right;">$</span></td>
            <td>' +
                billedamount + '</td>
        </tr>' +
        '<tr>
            <td>(Coded Amount:) <span style="float:right;">$</span></td>
            <td>' +
                codedamount + '</td>
        </tr>' +
        '<tr>
            <td colspan="2"><strong>Billing Notes:</strong></td>
        </tr>
        <tr>
            <td colspan="2">' +
                billingnotes + '</td>
        </tr>' +
        '<tr>
            <td><b>Payment</b>: </td>
            <td>' + payment + '</td>
        </tr>' +
        '<tr>
            <td>Insurance Payment: <span style="float:right;">$</span></td>
            <td>' +
                billingpaid + '</td>
        </tr>' +
        '<tr>
            <td colspan="2"><strong>Payment Notes:</strong></td>
        </tr>
        <tr>
            <td colspan="2">' +
                paymentnotes + '</td>
        </tr>
    </table>';
    document.getElementById('headerbp').style.display = 'block';
    headershown = uniquekey;
    } else {
    document.getElementById('headerbp').style.display = 'none';
    headershown = '';
    }
    }
    }

    </script>
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
                    <script src="{{ asset('/functions.js') }}"></script>

                    <script>
                        function populateselect(index) {
                            document.getElementById('dxcodecervical' + index).style.display =
                                'none';
                            document.getElementById('dxcodethoracic' + index).style.display =
                                'none';
                            document.getElementById('dxcodelumbar' + index).style.display = 'none';
                            document.getElementById('dxcodepelvis' + index).style.display = 'none';
                            document.getElementById('dxcodegeneralspinal' + index).style.display =
                                'none';
                            document.getElementById('dxcodeupperextremity' + index).style.display =
                                'none';
                            document.getElementById('dxcodelowerextremity' + index).style.display =
                                'none';
                            document.getElementById('dxcodeheadache' + index).style.display =
                                'none';
                            document.getElementById('dxcodegeneral' + index).style.display = 'none';
                            document.getElementById('dxcodedefault' + index).style.display = "none";
                            if (document.getElementById('dx' + index).value != '')
                                document.getElementById('dxcode' + document.getElementById('dx' +
                                    index).value + index).style.display = "block";

                            else
                                document.getElementById('dxcodedefault' + index).style.display =
                                "block";
                        }

                        function closeexercises() {
                            if (changed) {
                                if (window.confirm('Are you sure you want to discard changes?')) {
                                    document.getElementById('teexercisediv').style.display = 'none';
                                }
                            } else
                                document.getElementById('teexercisediv').style.display = 'none';
                        }

                        function markbilled() {
                            document.form.markbilling.value = 'true';
                            document.form.submit();
                        }

                    </script>

                    <div id="teexercisediv"
                        style="position:absolute;width:1200px;height:auto;border:2px solid #004389;background:#C5E2FF;display:none;z-index:1;padding:10px;">
                        <table width="100%">
                            <tr>
                                <td>
                                    <font color="red">Please save any changes to coding before
                                        exercise edits are made. Any unsaved changes will be lost if
                                        exercises are saved.</font>
                                </td>
                                <td align="right"><img src="nlimages/closebutton.png" alt="Close"
                                        onclick="javascript:closeexercises();"></td>
                            </tr>
                        </table>
                        <script>
                            var categories = ['EXERCISE', 'MOBILITY', 'STRETCHING', 'CARDIO',
                                'SPORT', 'ALL'
                            ];
                            var backdiv =
                                '<a href="javascript:show(\'Categories\');"><-- All Categories</a>'
                            var categoryselect =
                                '<td><img src="nlimages/exerciseicons/mobilityback.png" width="25" height="25" onclick="show(\'Categories\');show(\'MOBILITY\');"></td><td><img src="nlimages/exerciseicons/cardioback.png" width="25" height="25" onclick="show(\'Categories\');show(\'CARDIO\');"></td><td><img src="nlimages/exerciseicons/exerciseback.png" width="25" height="25" onclick="show(\'Categories\');show(\'EXERCISE\');"></td><td><img src="nlimages/exerciseicons/stretchingback.png" width="25" height="25" onclick="show(\'Categories\');show(\'STRETCHING\');"></td><td><img src="nlimages/exerciseicons/sportback.png" width="25" height="25" onclick="show(\'Categories\');show(\'SPORT\');"></td>';
                            var lastshown;
                            var categoryon, caton;

                            function show(cat, category, level) {
                                document.getElementById('subcategorydiv').innerHTML = '';
                                subon = '';
                                if (category == '') {
                                    category = categoryon;
                                    caton = cat;
                                }
                                if (level == 'back') {
                                    document.getElementById('backdiv').innerHTML =
                                        '<table><tr><td width="150">' + backdiv + '</td>' +
                                        categoryselect + '</tr></table><br><b>' + cat + '</b>';
                                    document.getElementById(category + 'headingdiv').style.display =
                                        'none';
                                    document.getElementById(cat + 'categorydiv').style.display =
                                        'block';
                                    if ( /*category=='ROLLING'||*/ category == 'CARDIO') {
                                        show('Categories');
                                        return;
                                    }
                                } else if (level == 'heading') {
                                    if ( /*category=='MOBILITY'||*/ category == 'CARDIO') {
                                        document.getElementById('backdiv').innerHTML =
                                            '<table><tr><td width="150"><a href="javascript:show(\'' +
                                            category + '\',\'' + cat +
                                            '\',\'back\');"><-- All Categories</a></td>' +
                                            categoryselect.split('show(\'Categories\');').join(
                                                'show(\'' + category + '\',\'' + cat +
                                                '\',\'back\');') + '</tr></table><br><b>' + cat +
                                            '</b>';
                                    } else {
                                        document.getElementById('backdiv').innerHTML =
                                            '<table><tr><td width="150"><a href="javascript:show(\'' +
                                            category + '\',\'' + cat + '\',\'back\');"><-- ' +
                                            category + '</a></td>' + categoryselect.split(
                                                'show(\'Categories\');').join('show(\'' + category +
                                                '\',\'' + cat + '\',\'back\');') +
                                            '</tr></table><br><b>' + cat + '</b>';
                                    }
                                    document.getElementById(category + 'categorydiv').style
                                        .display = 'none';
                                    document.getElementById(cat + 'headingdiv').style.display =
                                        'block';
                                } else {
                                    if (cat == 'Categories') {
                                        document.getElementById('categories').style.display =
                                            'block';
                                        document.getElementById('backdiv').innerHTML =
                                            '<br><br><b>EXERCISES - ALL CATEGORIES</b><br>';
                                        for (var i = 0; i < categories.length; i++) {
                                            document.getElementById(categories[i] + 'categorydiv')
                                                .style.display = 'none';
                                        }
                                    } else {
                                        document.getElementById('categories').style.display =
                                            'none';
                                        document.getElementById('backdiv').innerHTML =
                                            '<table><tr><td width="150">' + backdiv + '</td>' +
                                            categoryselect + '</tr></table><br><b>' + cat + '</b>';
                                        for (var i = 0; i < categories.length; i++) {
                                            document.getElementById(categories[i] + 'categorydiv')
                                                .style.display = 'none';
                                        }
                                        document.getElementById(cat + 'categorydiv').style.display =
                                            'block';
                                    }
                                }
                                categoryon = category;
                                caton = cat;
                                if (cat == 'CARDIO' && category == null) {
                                    show('CARDIO', 'CARDIO', 'heading');
                                    return;
                                }
                                /*if(cat=='MOBILITY'&&category==null){
                                show('ROLLING','MOBILITY','heading');
                                return;
                                }*/
                            }
                            changed = false;

                            function customauto(type, auto) {
                                if (auto == 'auto') {
                                    for (var i = 0; i < numrows; i++) {
                                        if (document.getElementById('overwrite').checked || document
                                            .getElementById(type + i).value == '') {
                                            if (type == 'lbs') {
                                                document.getElementById('lbs10' + i).style.display =
                                                    'none';
                                                document.getElementById('lbs100' + i).style
                                                    .display = 'none';
                                                document.getElementById('lbs10' + i).value =
                                                    'Other';
                                                document.getElementById('lbs100' + i).value =
                                                    'Other';
                                            } else {
                                                document.getElementById(type + i).style.display =
                                                    'none';
                                                document.getElementById(type + i).value = 'Other';
                                            }
                                            if (type != 'side') document.getElementById(type +
                                                'divcustom' + i).style.display = 'block';
                                            document.getElementById(type + 'custom' + i).value =
                                                document.getElementById(type + 'customauto').value;
                                        }
                                    }
                                    changed = true;
                                }
                            }

                            function autofill(type, i) {
                                if (document.getElementById(type + i).value == 'Other') {
                                    if (type != 'side' && type != 'notes') {
                                        if (type != 'lbs100' && type != 'lbs10') {
                                            document.getElementById(type + i).style.display =
                                                'none';
                                            document.getElementById(type + 'divcustom' + i).style
                                                .display = 'block';
                                        } else {
                                            document.getElementById('lbs100' + i).style.display =
                                                'none';
                                            document.getElementById('lbs10' + i).style.display =
                                                'none';
                                            document.getElementById('lbsdivcustom' + i).style
                                                .display = 'block';
                                        }
                                    }
                                } else {
                                    for (var i = 0; i < numrows; i++) {
                                        if (document.getElementById('overwrite').checked || document
                                            .getElementById(type + i).value == '') {
                                            if (type != 'side') document.getElementById(type +
                                                'divcustom' + i).style.display = 'none';
                                            if (type != 'lbs10' && type != 'lbs100') document
                                                .getElementById(type + i).style.display = 'block';
                                            else {
                                                document.getElementById('lbs100' + i).style
                                                    .display = 'block';
                                                document.getElementById('lbs10' + i).style.display =
                                                    'block';
                                            }
                                            document.getElementById(type + i).value = document
                                                .getElementById(type + 'auto').value;
                                        }
                                    }
                                    changed = true;
                                }
                                if (document.getElementById('savediv').style.display != 'block') {
                                    document.getElementById('nosavediv').style.display = 'none';
                                    document.getElementById('savediv').style.display = 'block';
                                }
                            }

                            function custom(type, i) {
                                if (type != 'side' && type != 'notes') {
                                    if (document.getElementById(type + i).value == 'Other') {
                                        if (type != 'lbs100' && type != 'lbs10') {
                                            document.getElementById(type + i).style.display =
                                                'none';
                                            document.getElementById(type + 'divcustom' + i).style
                                                .display = 'block';
                                        } else {
                                            document.getElementById('lbs100' + i).style.display =
                                                'none';
                                            document.getElementById('lbs10' + i).style.display =
                                                'none';
                                            document.getElementById('lbsdivcustom' + i).style
                                                .display = 'block';
                                        }
                                    }
                                }
                                changed = true;
                                if (document.getElementById('savediv').style.display != 'block') {
                                    document.getElementById('nosavediv').style.display = 'none';
                                    document.getElementById('savediv').style.display = 'block';
                                }
                            }
                            var numrows = 0;
                            var pushcategory = [],
                                exercise = [],
                                reps = [],
                                sets = [],
                                lbs100 = [],
                                lbs10 = [],
                                dist = [],
                                time = [],
                                notes = [],
                                side = [],
                                repscustom = [],
                                setscustom = [],
                                lbscustom = [],
                                distcustom = [],
                                timecustom = [];

                            function setselect(auto) {
                                var thenumrow = numrows;
                                if (auto == 'auto') {
                                    thenumrow = auto;
                                    var toreturn = '<select style="width:40px;" id="sets' +
                                        thenumrow + '" name="sets' + thenumrow +
                                        '" onchange="custom(\'sets\',\'' + thenumrow +
                                        '\');"><option value=""></option><option value="Other">Other</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select><div id="setsdivcustom' +
                                        thenumrow +
                                        '" style="display:none;"><input id="setscustom' +
                                        thenumrow + '" name="setscustom' + thenumrow +
                                        '"onchange="customauto(\'sets\',\'' + thenumrow +
                                        '\')" style="width:40px;"></div>';
                                    return toreturn.replace('custom(', 'autofill(');
                                } else return '<select style="width:40px;" id="sets' + thenumrow +
                                    '" name="sets' + thenumrow +
                                    '" onchange="custom(\'sets\',\'' + thenumrow +
                                    '\');"><option value=""></option><option value="Other">Other</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select><div id="setsdivcustom' +
                                    thenumrow +
                                    '" style="display:none;"><input id="setscustom' +
                                    thenumrow + '" name="setscustom' + thenumrow +
                                    '"onchange="customauto(\'sets\',\'' + thenumrow +
                                    '\')" style="width:40px;"></div>';
                            }

                            function repselect(auto) {
                                var thenumrow = numrows;
                                if (auto == 'auto') {
                                    thenumrow = auto;
                                    var toreturn = '<select style="width:40px;" id="reps' +
                                        thenumrow + '" name="reps' + thenumrow +
                                        '" onchange="custom(\'reps\',\'' + thenumrow +
                                        '\');"><option value=""></option><option value="Other">Other</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option></select><div id="repsdivcustom' +
                                        thenumrow +
                                        '" style="display:none;"><input id="repscustom' +
                                        thenumrow + '" name="repscustom' + thenumrow +
                                        '"onchange="customauto(\'reps\',\'' + thenumrow +
                                        '\')" style="width:40px;"></div>';
                                    return toreturn.replace('custom(', 'autofill(');
                                } else return '<select style="width:40px;" id="reps' + thenumrow +
                                    '" name="reps' + thenumrow +
                                    '" onchange="custom(\'reps\',\'' + thenumrow +
                                    '\');"><option value=""></option><option value="Other">Other</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option></select><div id="repsdivcustom' +
                                    thenumrow +
                                    '" style="display:none;"><input id="repscustom' +
                                    thenumrow + '" name="repscustom' + thenumrow +
                                    '"onchange="customauto(\'reps\',\'' + thenumrow +
                                    '\')" style="width:40px;"></div>';
                            }

                            function distselect(auto) {
                                var thenumrow = numrows;
                                if (auto == 'auto') {
                                    thenumrow = auto;
                                    var toreturn = '<select style="width:50px;" id="dist' +
                                        thenumrow + '" name="dist' + thenumrow +
                                        '" onchange="custom(\'dist\',\'' + thenumrow +
                                        '\');"><option value=""></option><option value="Other">Other</option><option value="100 yd">100 yd</option><option value="200 yd">200 yd</option><option value="400 yd">400 yd</option><option value="800 yd">800 yd</option><option value="1/4 mi">1/4 mi</option><option value="1/2 mi">1/2 mi</option><option value="1 mi">1 mi</option></select><div id="distdivcustom' +
                                        thenumrow +
                                        '" style="display:none;"><input id="distcustom' +
                                        thenumrow + '" name="distcustom' + thenumrow +
                                        '"onchange="customauto(\'dist\',\'' + thenumrow +
                                        '\')" style="width:40px;"></div>';
                                    return toreturn.replace('custom(', 'autofill(');
                                } else return '<select style="width:50px;" id="dist' + thenumrow +
                                    '" name="dist' + thenumrow +
                                    '" onchange="custom(\'dist\',\'' + thenumrow +
                                    '\');"><option value=""></option><option value="Other">Other</option><option value="100 yd">100 yd</option><option value="200 yd">200 yd</option><option value="400 yd">400 yd</option><option value="800 yd">800 yd</option><option value="1/4 mi">1/4 mi</option><option value="1/2 mi">1/2 mi</option><option value="1 mi">1 mi</option></select><div id="distdivcustom' +
                                    thenumrow +
                                    '" style="display:none;"><input id="distcustom' +
                                    thenumrow + '" name="distcustom' + thenumrow +
                                    '"onchange="customauto(\'dist\',\'' + thenumrow +
                                    '\')" style="width:40px;"></div>';
                            }

                            function lbs100select(auto) {
                                var thenumrow = numrows;
                                if (auto == 'auto') {
                                    thenumrow = auto;
                                    var toreturn = '<select style="width:32px;" id="lbs100' +
                                        thenumrow + '" name="lbs100' + thenumrow +
                                        '" onchange="custom(\'lbs100\',\'' + thenumrow +
                                        '\');"><option value=""></option><option value="Other">Other</option><option value="100">100</option><option value="200">200</option><option value="300">300</option><option value="400">400</option><option value="500">500</option><option value="600">600</option><option value="700">700</option><option value="800">800</option><option value="900">900</option></select>';
                                    return toreturn.replace('custom(', 'autofill(');
                                } else return '<select style="width:32px;" id="lbs100' + thenumrow +
                                    '" name="lbs100' + thenumrow +
                                    '" onchange="custom(\'lbs100\',\'' + thenumrow +
                                    '\');"><option value=""></option><option value="Other">Other</option><option value="100">100</option><option value="200">200</option><option value="300">300</option><option value="400">400</option><option value="500">500</option><option value="600">600</option><option value="700">700</option><option value="800">800</option><option value="900">900</option></select>';
                            }

                            function lbs10select(auto) {
                                var thenumrow = numrows;
                                if (auto == 'auto') {
                                    thenumrow = auto;
                                    var toreturn = '<select style="width:40px;" id="lbs10' +
                                        thenumrow + '" name="lbs10' + thenumrow +
                                        '" onchange="custom(\'lbs10\',\'' + thenumrow +
                                        '\');"><option value=""></option><option value="Other">Other</option><option value="00">00</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="60">60</option><option value="70">70</option><option value="80">80</option><option value="90">90</option></select><div id="lbsdivcustom' +
                                        thenumrow + '" style="display:none;"><input id="lbscustom' +
                                        thenumrow + '" name="lbscustom' + thenumrow +
                                        '"onchange="customauto(\'lbs\',\'' + thenumrow +
                                        '\')" style="width:40px;"></div>';
                                    return toreturn.replace('custom(', 'autofill(');
                                } else return '<select style="width:40px;" id="lbs10' + thenumrow +
                                    '" name="lbs10' + thenumrow +
                                    '" onchange="custom(\'lbs10\',\'' + thenumrow +
                                    '\');"><option value=""></option><option value="Other">Other</option><option value="00">00</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="60">60</option><option value="70">70</option><option value="80">80</option><option value="90">90</option></select><div id="lbsdivcustom' +
                                    thenumrow + '" style="display:none;"><input id="lbscustom' +
                                    thenumrow + '" name="lbscustom' + thenumrow +
                                    '"onchange="customauto(\'lbs\',\'' + thenumrow +
                                    '\')" style="width:40px;"></div>';
                            }

                            function timeselect(auto) {
                                var thenumrow = numrows;
                                if (auto == 'auto') {
                                    thenumrow = auto;
                                    var toreturn = '<select style="width:50px;" id="time' +
                                        thenumrow + '" name="time' + thenumrow +
                                        '" onchange="custom(\'time\',\'' + thenumrow +
                                        '\');"><option value=""></option><option value="Other">Other</option><option value="0:15">0:15</option><option value="0:30">0:30</option><option value="0:45">0:45</option><option value="1:00">1:00</option><option value="1:30">1:30</option><option value="2:00">2:00</option><option value="3:00">3:00</option><option value="4:00">4:00</option><option value="5:00">5:00</option><option value="10:00">10:00</option></select><div id="timedivcustom' +
                                        thenumrow +
                                        '" style="display:none;"><input id="timecustom' +
                                        thenumrow + '" name="timecustom' + thenumrow +
                                        '"onchange="customauto(\'time\',\'' + thenumrow +
                                        '\')" style="width:40px;"></div>';
                                    return toreturn.replace('custom(', 'autofill(');
                                } else return '<select style="width:50px;" id="time' + thenumrow +
                                    '" name="time' + thenumrow +
                                    '" onchange="custom(\'time\',\'' + thenumrow +
                                    '\');"><option value=""></option><option value="Other">Other</option><option value="0:15">0:15</option><option value="0:30">0:30</option><option value="0:45">0:45</option><option value="1:00">1:00</option><option value="1:30">1:30</option><option value="2:00">2:00</option><option value="3:00">3:00</option><option value="4:00">4:00</option><option value="5:00">5:00</option><option value="10:00">10:00</option></select><div id="timedivcustom' +
                                    thenumrow +
                                    '" style="display:none;"><input id="timecustom' +
                                    thenumrow + '" name="timecustom' + thenumrow +
                                    '"onchange="customauto(\'time\',\'' + thenumrow +
                                    '\')" style="width:40px;"></div>';
                            }
                            var photos = {
                                'COMBO- ROLLER BALL OR STRAP': 'COMBO- ROLLER BALL OR STRAP.gif',
                                '1/2 SURFACE': '1@SLASH@2 SURFACE.gif',
                                'Ant Tib': 'Ant Tib.gif',
                                'BALL': 'BALL.gif',
                                'Back and Glute': 'Back and Glute.JPG',
                                'Back and Glute': 'Back and Glute.gif',
                                'Back': 'Back.gif',
                                'Ball Slams': 'Ball Slams.jpg',
                                'Ball Squat': 'Ball Squat.JPG',
                                'Evaluation Sports (30) MINS': 'Evaluation Sports (30) MINS..gif',
                                'Evaluation Sports (60) MINS': 'Evaluation Sports (60) MINS..gif',
                                'Foot': 'Foot.JPG',
                                'Fore Arm ': 'Fore Arm .JPG',
                                'Glute': 'Glute.JPG',
                                'Glute': 'Glute.gif',
                                'Hamstring double legged': 'Hamstring double legged.JPG',
                                'Hamstring single legged': 'Hamstring single legged.JPG',
                                'Hamstring': 'Hamstring.JPG',
                                'Hamstring': 'Hamstring.gif',
                                'Hamstrng': 'Hamstrng.gif',
                                'Lat / shoulder': 'Lat @SLASH@ shoulder.jpg',
                                'New Patient (up to 30 min)': 'New Patient (up to 30 min).gif',
                                'Pec / Chest': 'Pec @SLASH@ Chest.jpg',
                                'Private Session': 'Private Session.jpg',
                                'Prone X Bands Push Ups': 'Prone X Bands Push Ups.JPG',
                                'Prone': 'Prone.JPG',
                                'Psoas': 'Psoas.gif',
                                'Push Ups': 'Push Ups.jpg',
                                'Quad': 'Quad.gif',
                                'Side Single Leg With Hip': 'Side Single Leg With Hip.JPG',
                                'Supine X Bands': 'Supine X Bands.JPG',
                                'V up with Bands': 'V up with Bands.JPG',
                                'Wall': 'Wall.jpg',
                                'instructions': 'instructions.php',
                                'not-Back and Glute': 'not-Back and Glute.JPG',
                                'not-Psoas': 'not-Psoas.JPG'
                            };
                            var lastphoto;

                            function showphoto(i) {
                                if (lastphoto != null) document.getElementById('photo' + lastphoto)
                                    .style.display = 'none';
                                document.getElementById('photo' + i).style.display = 'block';
                                lastphoto = i;
                            }

                            function hidephoto(i) {
                                document.getElementById('photo' + i).style.display = 'none';
                            }

                            function populatelist(text, category, auto, picture) {
                                if (numrows == 0) {
                                    document.getElementById('exerciselist').innerHTML =
                                        document.getElementById('exerciselist').innerHTML.replace(
                                            '<tr><td colspan="12">No exercises yet, select an exercise to add to list!</td></tr>',
                                            '<tr style="border-top:1px solid #696969;border-bottom:1px solid #696969;padding:10px;background-color:#f1f1f1"><td colspan="2"></td><td>Auto-Fill ( Overwrite <input type="checkbox" id="overwrite" value="true">)</td>' +
                                            '<td width="15"></td><td align="center">' + setselect(
                                                'auto') + '</td><td align="center">' + repselect(
                                                'auto') + '</td><td align="center">' + lbs100select(
                                                'auto') + lbs10select('auto') +
                                            '</td><td align="center">' + distselect('auto') +
                                            '</td><td align="center"><img src="nlimages/timericon.png"></td><td align="center">' +
                                            timeselect('auto') +
                                            '</td><td><select id="sideauto" name="sideauto" onchange="autofill(\'side\',\'auto\');"><option value=""></option><option value="L">L</option><option value="R">R</option><option value="B">B</option></select><td></tr>'
                                        );
                                }
                                if (auto != 'auto') {
                                    document.getElementById('nosavediv').style.display = 'none';
                                    document.getElementById('savediv').style.display = 'block';
                                }
                                if (numrows > 0) {
                                    pushcategory.push(document.getElementById('category' + (
                                        numrows - 1)).value);
                                    exercise.push(document.getElementById('exercise' + (numrows -
                                        1)).value);
                                    reps.push(document.getElementById('reps' + (numrows - 1))
                                        .value);
                                    sets.push(document.getElementById('sets' + (numrows - 1))
                                        .value);
                                    lbs100.push(document.getElementById('lbs100' + (numrows - 1))
                                        .value);
                                    lbs10.push(document.getElementById('lbs10' + (numrows - 1))
                                        .value);
                                    dist.push(document.getElementById('dist' + (numrows - 1))
                                        .value);
                                    time.push(document.getElementById('time' + (numrows - 1))
                                        .value);
                                    notes.push(document.getElementById('notes' + (numrows - 1))
                                        .value);
                                    side.push(document.getElementById('side' + (numrows - 1))
                                        .value);
                                    repscustom.push(document.getElementById('repscustom' + (
                                        numrows - 1)).value);
                                    setscustom.push(document.getElementById('setscustom' + (
                                        numrows - 1)).value);
                                    lbscustom.push(document.getElementById('lbscustom' + (numrows -
                                        1)).value);
                                    distcustom.push(document.getElementById('distcustom' + (
                                        numrows - 1)).value);
                                    timecustom.push(document.getElementById('timecustom' + (
                                        numrows - 1)).value);
                                }
                                var newinnerhtml =
                                    '<tr style="border-top:1px solid #696969;border-bottom:1px solid #696969;padding:10px;">';
                                if (photos[picture] != null) newinnerhtml +=
                                    '<td><div style="position:relative;display:block;"><img style="z-index:0;" src="nlimages/manageicons/photoicon.png" height="15" style="z-index:0;display:inline;" onmouseover="showphoto(\'' +
                                    numrows + '\');" onmouseout="hidephoto(\'' + numrows +
                                    '\');"><div style="position:absolute;top:23px;left:0px;height:auto;width:auto;display:none;z-index:1;background-color:#83f5ff;border:2px solid #00eaff;" id="photo' +
                                    numrows + '"><img src="exercisephotos/' + photos[picture] +
                                    '" height="200"></div></div></td>';
                                else newinnerhtml += '<td></td>';
                                newinnerhtml +=
                                    '<td align="center"><img src="nlimages/exerciseicons/' +
                                    category +
                                    'icon.png" style="display:inline;"></td><td><input type="hidden" name="category' +
                                    numrows + '" id="category' + numrows + '" value="' + category +
                                    '"><input type="hidden" name="exercise' + numrows +
                                    '" id="exercise' + numrows + '" value="' + text + '">' + text +
                                    '</td>' +
                                    '<td width="15">' +
                                    '<img src="nlimages/notes.png" onclick="javascript:shownotes(' +
                                    numrows +
                                    ');" style="display:inline;"></td><td align="center">' +
                                    setselect() + '</td><td align="center">' + repselect() +
                                    '</td><td align="center">' + lbs100select() + lbs10select() +
                                    '</td><td align="center">' + distselect() +
                                    '</td><td align="center"><img src="nlimages/timericon.png"></td><td align="center">' +
                                    timeselect() +
                                    '</td><td><select id="side' + numrows + '" name="side' +
                                    numrows + '" onchange="custom(\'side\',' + numrows +
                                    ');"><option value=""></option><option value="L">L</option><option value="R">R</option><option value="B">B</option></select><td><img src="nlimages/delete.png" onclick="deleterow(' +
                                    numrows + ');"></td></tr>' +
                                    '<tr id="notestr' + numrows +
                                    '" style="display:none;"><td colspan="12" align="center"><textarea onchange="custom(\'notes\');" id="notes' +
                                    numrows + '" name="notes' + numrows +
                                    '" style="width:620px"></textarea></td></tr></table>';
                                document.getElementById('exerciselist').innerHTML = document
                                    .getElementById('exerciselist').innerHTML.replace('</table>',
                                        newinnerhtml);
                                for (var i = 0; i < numrows; i++) {
                                    document.getElementById('category' + i).value = pushcategory[i];
                                    document.getElementById('exercise' + i).value = exercise[i];
                                    document.getElementById('reps' + i).value = reps[i];
                                    document.getElementById('sets' + i).value = sets[i];
                                    document.getElementById('lbs100' + i).value = lbs100[i];
                                    document.getElementById('lbs10' + i).value = lbs10[i];
                                    document.getElementById('dist' + i).value = dist[i];
                                    document.getElementById('time' + i).value = time[i];
                                    document.getElementById('notes' + i).value = notes[i];
                                    document.getElementById('side' + i).value = side[i];
                                    document.getElementById('repscustom' + i).value = repscustom[i];
                                    document.getElementById('setscustom' + i).value = setscustom[i];
                                    document.getElementById('lbscustom' + i).value = lbscustom[i];
                                    document.getElementById('distcustom' + i).value = distcustom[i];
                                    document.getElementById('timecustom' + i).value = timecustom[i];
                                }
                                numrows++;
                                document.getElementById('numrows').value = numrows;
                                if (auto != 'auto') changed = true;
                            }

                            function deleterow(row) {
                                document.exerciseform.todelete.value = row;
                                document.exerciseform.submit();
                            }

                            function shownotes(num) {
                                if (document.getElementById('notestr' + num + '').style.display ==
                                    'table-row')
                                    document.getElementById('notestr' + num + '').style.display =
                                    'none';
                                else
                                    document.getElementById('notestr' + num + '').style.display =
                                    'table-row';
                                document.getElementById('nosavediv').style.display = 'none';
                                document.getElementById('savediv').style.display = 'block';
                                changed = true;
                            }

                        </script>
                        <table>
                            <tr>
                                <td valign="top" width="550">
                                    <div id="backdiv"><br><br><b>EXERCISES - ALL CATEGORIES</b><br>
                                    </div><br>
                                    <div id="categories">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td width="100" height="100" align="center" onclick="show('MOBILITY');">
                                                    <img src="nlimages/mobilityback.png" width="100" height="100">
                                                </td>
                                                <td width="100" height="100" align="center" onclick="show('CARDIO');">
                                                    <img src="nlimages/cardioback.png" width="100" height="100">
                                                </td>
                                                <td width="100" height="100" align="center" onclick="show('EXERCISE');">
                                                    <img src="nlimages/exerciseback.png" width="100" height="100">
                                                </td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                            <tr>
                                                <td width="100" height="100" align="center"
                                                    onclick="show('STRETCHING');"><img src="nlimages/stretchingback.jpg"
                                                        width="100" height="100"></td>
                                                <td width="100" height="100" align="center" onclick="show('SPORT');">
                                                    <img src="nlimages/sportback.png" width="100" height="100">
                                                </td>
                                                <td width="100" height="100"><a href="exerciselog.php"><img
                                                            src="nlimages/myworkoutback.png" width="100"
                                                            height="100"></a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="MOBILITYcategorydiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td id="ROLLER-MOBILITY" background="nlimages/greenback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('ROLLER','MOBILITY','heading')">
                                                    ROLLER</td>
                                                <td id="BALL-MOBILITY" background="nlimages/greenback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('BALL','MOBILITY','heading')">BALL
                                                </td>
                                                <td id="COMBO- ROLLER BALL OR STRAP-MOBILITY"
                                                    background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="show('COMBO- ROLLER BALL OR STRAP','MOBILITY','heading')">
                                                    COMBO- ROLLER BALL OR STRAP</td>
                                                <td id="1/2 SURFACE-MOBILITY" background="nlimages/greenback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('1/2 SURFACE','MOBILITY','heading')">
                                                    1/2 SURFACE</td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="CARDIOcategorydiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td id="CARDIO-CARDIO" background="nlimages/orangeback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('CARDIO','CARDIO','heading')">
                                                    CARDIO</td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="EXERCISEcategorydiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td id="BALL SLAMS-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('BALL SLAMS','EXERCISE','heading')">
                                                    BALL SLAMS</td>
                                                <td id="KETTLE BELL-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('KETTLE BELL','EXERCISE','heading')">
                                                    KETTLE BELL</td>
                                                <td id="ROPE-EXERCISE" background="nlimages/blueback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('ROPE','EXERCISE','heading')">ROPE
                                                </td>
                                                <td id="SQUATS-EXERCISE" background="nlimages/blueback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('SQUATS','EXERCISE','heading')">
                                                    SQUATS</td>
                                                <td id="ROWS with BANDS-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('ROWS with BANDS','EXERCISE','heading')">
                                                    ROWS with BANDS</td>
                                            </tr>
                                            <tr>
                                                <td id="FLOOR EXERCISE-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('FLOOR EXERCISE','EXERCISE','heading')">
                                                    FLOOR EXERCISE</td>
                                                <td id="ABS-EXERCISE" background="nlimages/blueback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('ABS','EXERCISE','heading')">ABS
                                                </td>
                                                <td id="kO8 / TRX SUSPENSION-EXERCISE"
                                                    background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="show('kO8 / TRX SUSPENSION','EXERCISE','heading')">
                                                    kO8 / TRX SUSPENSION</td>
                                                <td id="SWISS BALL-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('SWISS BALL','EXERCISE','heading')">
                                                    SWISS BALL</td>
                                                <td id="BENCH PRESS-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('BENCH PRESS','EXERCISE','heading')">
                                                    BENCH PRESS</td>
                                            </tr>
                                            <tr>
                                                <td id="Boxing-EXERCISE" background="nlimages/blueback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('Boxing','EXERCISE','heading')">
                                                    Boxing</td>
                                                <td id="VIBRATION PLATFORM-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('VIBRATION PLATFORM','EXERCISE','heading')">
                                                    VIBRATION PLATFORM</td>
                                                <td id="SLED-EXERCISE" background="nlimages/blueback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('SLED','EXERCISE','heading')">SLED
                                                </td>
                                                <td id="BAR BELLS-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('BAR BELLS','EXERCISE','heading')">
                                                    BAR BELLS</td>
                                                <td id="DUMBELLS-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('DUMBELLS','EXERCISE','heading')">
                                                    DUMBELLS</td>
                                            </tr>
                                            <tr>
                                                <td id="EARTHQUAKE BAR-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('EARTHQUAKE BAR','EXERCISE','heading')">
                                                    EARTHQUAKE BAR</td>
                                                <td id="BODY BLADE-EXERCISE" background="nlimages/blueback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('BODY BLADE','EXERCISE','heading')">
                                                    BODY BLADE</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="STRETCHINGcategorydiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td id="PLANKING-STRETCHING" background="nlimages/purpleback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('PLANKING','STRETCHING','heading')">
                                                    PLANKING</td>
                                                <td id="SWISS BALL-STRETCHING" background="nlimages/purpleback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('SWISS BALL','STRETCHING','heading')">
                                                    SWISS BALL</td>
                                                <td id="Dynamic Warm up-STRETCHING" background="nlimages/purpleback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('Dynamic Warm up','STRETCHING','heading')">
                                                    Dynamic Warm up</td>
                                                <td id="BANDS-STRETCHING" background="nlimages/purpleback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('BANDS','STRETCHING','heading')">
                                                    BANDS</td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="SPORTcategorydiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td id="LADDER DRILLS-SPORT" background="nlimages/redback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('LADDER DRILLS','SPORT','heading')">
                                                    LADDER DRILLS</td>
                                                <td id="GAIT TRAINING-SPORT" background="nlimages/redback.png"
                                                    width="100" height="100" align="center"
                                                    onclick="show('GAIT TRAINING','SPORT','heading')">
                                                    GAIT TRAINING</td>
                                                <td id="JUMPING-SPORT" background="nlimages/redback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('JUMPING','SPORT','heading')">
                                                    JUMPING</td>
                                                <td id="BASKETBALL-SPORT" background="nlimages/redback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('BASKETBALL','SPORT','heading')">
                                                    BASKETBALL</td>
                                                <td id="BASEBALL-SPORT" background="nlimages/redback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('BASEBALL','SPORT','heading')">
                                                    BASEBALL</td>
                                            </tr>
                                            <tr>
                                                <td id="FOOTBALL-SPORT" background="nlimages/redback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('FOOTBALL','SPORT','heading')">
                                                    FOOTBALL</td>
                                                <td id="GOLF-SPORT" background="nlimages/redback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('GOLF','SPORT','heading')">GOLF
                                                </td>
                                                <td id="LACROSSE-SPORT" background="nlimages/redback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('LACROSSE','SPORT','heading')">
                                                    LACROSSE</td>
                                                <td id="SOCCER-SPORT" background="nlimages/redback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('SOCCER','SPORT','heading')">
                                                    SOCCER</td>
                                                <td id="TENNIS-SPORT" background="nlimages/redback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('TENNIS','SPORT','heading')">
                                                    TENNIS</td>
                                            </tr>
                                            <tr>
                                                <td id="VOLLEYBALL-SPORT" background="nlimages/redback.png" width="100"
                                                    height="100" align="center"
                                                    onclick="show('VOLLEYBALL','SPORT','heading')">
                                                    VOLLEYBALL</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="ALLcategorydiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <script>
                                        var subheadings = {};
                                        var subon;

                                        function showsubcategories(heading, text, category, color) {
                                            var thealert = '';
                                            var thehtml = '<b>' + text +
                                                '<br><table cellspacing="10" cellpadding="0" style="color:white" width="550"><tr>';
                                            //for (var prop in subheadings) {
                                            if (subheadings[text] != null) {
                                                for (var i = 0; i < subheadings[text].length || i <
                                                    5; i++) {
                                                    if (i >= subheadings[text].length) thehtml +=
                                                        '<td></td>';
                                                    else {
                                                        if (i % 5 == 0) thehtml += '</tr><tr>';
                                                        thehtml += '<td background="nlimages/' +
                                                            color +
                                                            'back.png" width="100" height="100" align="center" onclick="populatelist(\'<u>' +
                                                            text + '</u><br>' + subheadings[text][
                                                                i
                                                            ] + '\',\'' + category + '\',\'\',\'' +
                                                            subheadings[text][i] + '\');">' +
                                                            subheadings[text][i] + '</td>';
                                                        thealert += text + ':' + subheadings[text][
                                                            i
                                                        ] + ',';
                                                    }
                                                }
                                                thehtml += '</tr></table>';
                                            }
                                            //}
                                            if (subon == text) {
                                                populatelist('<u>' + heading + '</u><br>' + text,
                                                    category, '', subheadings[text][i]);
                                                document.getElementById('subcategorydiv')
                                                    .innerHTML = '';
                                                subon = '';
                                            } else {
                                                document.getElementById('subcategorydiv')
                                                    .innerHTML = thehtml;
                                                subon = text;
                                            }
                                            //populatelist(\'<u>'.strtoupper($headings[$i]['category']).'</u><br>'.$headings[$i]['text'].'\',\''.strtolower($headings[$i]['category']).'\',\''.$headings[$i]['text'].'\',\'\',\''.$headings[$i]['text'].'\');
                                        }

                                    </script>
                                    <div id="ROLLERheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROLLER</u><br>IT-Band','mobility','','IT-Band');">
                                                    IT-Band</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROLLER</u><br>Quad','mobility','','Quad');">
                                                    Quad</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROLLER</u><br>Adductors','mobility','','Adductors');">
                                                    Adductors</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROLLER</u><br>Calf','mobility','','Calf');">
                                                    Calf</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROLLER</u><br>Ant Tib','mobility','','Ant Tib');">
                                                    Ant Tib</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROLLER</u><br>Hamstring','mobility','','Hamstring');">
                                                    Hamstring</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROLLER</u><br>Glute','mobility','','Glute');">
                                                    Glute</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROLLER</u><br>Back','mobility','','Back');">
                                                    Back</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="BALLheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BALL</u><br>Psoas','mobility','','Psoas');">
                                                    Psoas</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BALL</u><br>Glute','mobility','','Glute');">
                                                    Glute</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BALL</u><br>Pec / Chest','mobility','','Pec / Chest');">
                                                    Pec / Chest</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BALL</u><br>Foot','mobility','','Foot');">
                                                    Foot</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BALL</u><br>Forearm','mobility','','Forearm');">
                                                    Forearm</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="COMBO- ROLLER BALL OR STRAPheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>COMBO- ROLLER BALL OR STRAP</u><br>Glute','mobility','','Glute');">
                                                    Glute</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>COMBO- ROLLER BALL OR STRAP</u><br>Back and Glute','mobility','','Back and Glute');">
                                                    Back and Glute</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>COMBO- ROLLER BALL OR STRAP</u><br>Ant. Chain','mobility','','Ant. Chain');">
                                                    Ant. Chain</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>COMBO- ROLLER BALL OR STRAP</u><br>Post. Chain','mobility','','Post. Chain');">
                                                    Post. Chain</td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="1/2 SURFACEheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>1/2 SURFACE</u><br>Post. Chain Stretch','mobility','','Post. Chain Stretch');">
                                                    Post. Chain Stretch</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>1/2 SURFACE</u><br>Calves','mobility','','Calves');">
                                                    Calves</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>1/2 SURFACE</u><br>Hamstrings','mobility','','Hamstrings');">
                                                    Hamstrings</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>1/2 SURFACE</u><br>Lower Back','mobility','','Lower Back');">
                                                    Lower Back</td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>1/2 SURFACE</u><br>Positive Shin','mobility','','Positive Shin');">
                                                    Positive Shin</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>1/2 SURFACE</u><br>Balance- Horizontal ','mobility','','Balance- Horizontal ');">
                                                    Balance- Horizontal </td>
                                                <td background="nlimages/greenback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>1/2 SURFACE</u><br>Balance- Perpendicular','mobility','','Balance- Perpendicular');">
                                                    Balance- Perpendicular</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="CARDIOheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Hiking','cardio','','Hiking');">
                                                    Hiking</td>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Recumbent Bike','cardio','','Recumbent Bike');">
                                                    Recumbent Bike</td>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Jump Rope','cardio','','Jump Rope');">
                                                    Jump Rope</td>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Rower','cardio','','Rower');">
                                                    Rower</td>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Running','cardio','','Running');">
                                                    Running</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Swimming','cardio','','Swimming');">
                                                    Swimming</td>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Stair Climber','cardio','','Stair Climber');">
                                                    Stair Climber</td>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Treadmill','cardio','','Treadmill');">
                                                    Treadmill</td>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Versa Climber','cardio','','Versa Climber');">
                                                    Versa Climber</td>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Walking','cardio','','Walking');">
                                                    Walking</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/orangeback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>CARDIO</u><br>Assult Air Bike','cardio','','Assult Air Bike');">
                                                    Assult Air Bike</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="BALL SLAMSheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    if (subheadings['Ball Slams'] == null)
                                                        subheadings['Ball Slams'] = [];
                                                    subheadings['Ball Slams'].push('Forward');

                                                </script>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="showsubcategories('BALL SLAMS','Ball Slams','exercise','blue')">
                                                    Ball Slams<br>(<u>more</u>)</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BALL SLAMS</u><br>Wall','exercise','','Wall');">
                                                    Wall</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BALL SLAMS</u><br>Floor','exercise','','Floor');">
                                                    Floor</td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="KETTLE BELLheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>KETTLE BELL</u><br>Double Arm Swing','exercise','','Double Arm Swing');">
                                                    Double Arm Swing</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>KETTLE BELL</u><br>Single Arm Swing','exercise','','Single Arm Swing');">
                                                    Single Arm Swing</td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="ROPEheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROPE</u><br>Double','exercise','','Double');">
                                                    Double</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROPE</u><br>Single','exercise','','Single');">
                                                    Single</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROPE</u><br>Circle In/Out','exercise','','Circle In/Out');">
                                                    Circle In/Out</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROPE</u><br>Over The Bridge','exercise','','Over The Bridge');">
                                                    Over The Bridge</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROPE</u><br>Pull Ups','exercise','','Pull Ups');">
                                                    Pull Ups</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="SQUATSheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SQUATS</u><br>Wall Squat','exercise','','Wall Squat');">
                                                    Wall Squat</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SQUATS</u><br>Ball Squat','exercise','','Ball Squat');">
                                                    Ball Squat</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SQUATS</u><br>Barbell','exercise','','Barbell');">
                                                    Barbell</td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="ROWS with BANDSheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROWS with BANDS</u><br>Seated','exercise','','Seated');">
                                                    Seated</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROWS with BANDS</u><br>Standing','exercise','','Standing');">
                                                    Standing</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROWS with BANDS</u><br>Squat','exercise','','Squat');">
                                                    Squat</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ROWS with BANDS</u><br>Moving - Side to Side','exercise','','Moving - Side to Side');">
                                                    Moving - Side to Side</td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="FLOOR EXERCISEheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FLOOR EXERCISE</u><br>Push Ups','exercise','','Push Ups');">
                                                    Push Ups</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FLOOR EXERCISE</u><br>Push Ups With Bands','exercise','','Push Ups With Bands');">
                                                    Push Ups With Bands</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FLOOR EXERCISE</u><br>Mountain Climbers','exercise','','Mountain Climbers');">
                                                    Mountain Climbers</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FLOOR EXERCISE</u><br>V up with Bands','exercise','','V up with Bands');">
                                                    V up with Bands</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FLOOR EXERCISE</u><br>Prone X Bands Push Ups','exercise','','Prone X Bands Push Ups');">
                                                    Prone X Bands Push Ups</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FLOOR EXERCISE</u><br>Supine X Bands','exercise','','Supine X Bands');">
                                                    Supine X Bands</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="ABSheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ABS</u><br>Alphabet','exercise','','Alphabet');">
                                                    Alphabet</td>
                                                <script>
                                                    if (subheadings['Bicycles'] == null)
                                                        subheadings['Bicycles'] = [];
                                                    subheadings['Bicycles'].push('Forward');

                                                </script>
                                                <script>
                                                    if (subheadings['Bicycles'] == null)
                                                        subheadings['Bicycles'] = [];
                                                    subheadings['Bicycles'].push('Reverse');

                                                </script>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="showsubcategories('ABS','Bicycles','exercise','blue')">
                                                    Bicycles<br>(<u>more</u>)</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ABS</u><br>With Ball','exercise','','With Ball');">
                                                    With Ball</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ABS</u><br>Wheel','exercise','','Wheel');">
                                                    Wheel</td>
                                                <script>
                                                    if (subheadings['Bosu'] == null) subheadings[
                                                        'Bosu'] = [];
                                                    subheadings['Bosu'].push('gh');

                                                </script>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="showsubcategories('ABS','Bosu','exercise','blue')">
                                                    Bosu<br>(<u>more</u>)</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>ABS</u><br>Band','exercise','','Band');">
                                                    Band</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="kO8 / TRX SUSPENSIONheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>kO8 / TRX SUSPENSION</u><br>Abs','exercise','','Abs');">
                                                    Abs</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>kO8 / TRX SUSPENSION</u><br>Pike','exercise','','Pike');">
                                                    Pike</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>kO8 / TRX SUSPENSION</u><br>Squats','exercise','','Squats');">
                                                    Squats</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>kO8 / TRX SUSPENSION</u><br>Squats W/ Rows','exercise','','Squats W/ Rows');">
                                                    Squats W/ Rows</td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="SWISS BALLheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Corkscrew','exercise','','Corkscrew');">
                                                    Corkscrew</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>1 Leg','exercise','','1 Leg');">
                                                    1 Leg</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Opposite Arm/Leg','exercise','','Opposite Arm/Leg');">
                                                    Opposite Arm/Leg</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>On Ball','exercise','','On Ball');">
                                                    On Ball</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Russian Twists/Rolls','exercise','','Russian Twists/Rolls');">
                                                    Russian Twists/Rolls</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Hip Ext Over Ball','exercise','','Hip Ext Over Ball');">
                                                    Hip Ext Over Ball</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Reverse Hyper Over Ball','exercise','','Reverse Hyper Over Ball');">
                                                    Reverse Hyper Over Ball</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Single Leg Balance With Rotation','exercise','','Single Leg Balance With Rotation');">
                                                    Single Leg Balance With Rotation</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Sky Diver','exercise','','Sky Diver');">
                                                    Sky Diver</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Ball Extensions','exercise','','Ball Extensions');">
                                                    Ball Extensions</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Swimmer','exercise','','Swimmer');">
                                                    Swimmer</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Hamstring double legged','exercise','','Hamstring double legged');">
                                                    Hamstring double legged</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Hamstring single legged','exercise','','Hamstring single legged');">
                                                    Hamstring single legged</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Push Ups','exercise','','Push Ups');">
                                                    Push Ups</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="BENCH PRESSheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BENCH PRESS</u><br>Dumbell And Or Barbell','exercise','','Dumbell And Or Barbell');">
                                                    Dumbell And Or Barbell</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BENCH PRESS</u><br>With Bands','exercise','','With Bands');">
                                                    With Bands</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BENCH PRESS</u><br>With Swiss Ball','exercise','','With Swiss Ball');">
                                                    With Swiss Ball</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BENCH PRESS</u><br>Decline','exercise','','Decline');">
                                                    Decline</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BENCH PRESS</u><br>Flat','exercise','','Flat');">
                                                    Flat</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BENCH PRESS</u><br>Incline','exercise','','Incline');">
                                                    Incline</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BENCH PRESS</u><br>Towel','exercise','','Towel');">
                                                    Towel</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BENCH PRESS</u><br>Earth Quake Bar','exercise','','Earth Quake Bar');">
                                                    Earth Quake Bar</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="Boxingheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>Boxing</u><br>Punching bag','exercise','','Punching bag');">
                                                    Punching bag</td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="VIBRATION PLATFORMheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>VIBRATION PLATFORM</u><br>Squat 2 feet','exercise','','Squat 2 feet');">
                                                    Squat 2 feet</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>VIBRATION PLATFORM</u><br>Squat Single Leg  Particular','exercise','','Squat Single Leg  Particular');">
                                                    Squat Single Leg Particular</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>VIBRATION PLATFORM</u><br>Squat Single Leg  Horizontal','exercise','','Squat Single Leg  Horizontal');">
                                                    Squat Single Leg Horizontal</td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>VIBRATION PLATFORM</u><br>Push Ups','exercise','','Push Ups');">
                                                    Push Ups</td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="SLEDheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SLED</u><br>Push ','exercise','','Push ');">
                                                    Push </td>
                                                <td background="nlimages/blueback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SLED</u><br>Pull','exercise','','Pull');">
                                                    Pull</td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="BAR BELLSheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById('BAR BELLS-EXERCISE')
                                                        .onclick = function() {
                                                            populatelist(
                                                                '<u>EXERCISE</u><br>BAR BELLS',
                                                                'exercise', 'BAR BELLS', '',
                                                                'BAR BELLS');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="DUMBELLSheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById('DUMBELLS-EXERCISE')
                                                        .onclick = function() {
                                                            populatelist(
                                                                '<u>EXERCISE</u><br>DUMBELLS',
                                                                'exercise', 'DUMBELLS', '',
                                                                'DUMBELLS');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="EARTHQUAKE BARheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById(
                                                            'EARTHQUAKE BAR-EXERCISE').onclick =
                                                        function() {
                                                            populatelist(
                                                                '<u>EXERCISE</u><br>EARTHQUAKE BAR',
                                                                'exercise', 'EARTHQUAKE BAR',
                                                                '', 'EARTHQUAKE BAR');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="BODY BLADEheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById('BODY BLADE-EXERCISE')
                                                        .onclick = function() {
                                                            populatelist(
                                                                '<u>EXERCISE</u><br>BODY BLADE',
                                                                'exercise', 'BODY BLADE', '',
                                                                'BODY BLADE');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="PLANKINGheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>PLANKING</u><br>Prone','stretching','','Prone');">
                                                    Prone</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>PLANKING</u><br>Supine','stretching','','Supine');">
                                                    Supine</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>PLANKING</u><br>Side','stretching','','Side');">
                                                    Side</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>PLANKING</u><br>Side Single Leg With Hip','stretching','','Side Single Leg With Hip');">
                                                    Side Single Leg With Hip</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>PLANKING</u><br>Hip Hinge','stretching','','Hip Hinge');">
                                                    Hip Hinge</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>PLANKING</u><br>Side Single Leg (ADD) and Single','stretching','','Side Single Leg (ADD) and Single');">
                                                    Side Single Leg (ADD) and Single</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="SWISS BALLheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Corkscrew','stretching','','Corkscrew');">
                                                    Corkscrew</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>1 Leg','stretching','','1 Leg');">
                                                    1 Leg</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Opposite Arm/Leg','stretching','','Opposite Arm/Leg');">
                                                    Opposite Arm/Leg</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>On Ball','stretching','','On Ball');">
                                                    On Ball</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Russian Twists/Rolls','stretching','','Russian Twists/Rolls');">
                                                    Russian Twists/Rolls</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Hip Ext Over Ball','stretching','','Hip Ext Over Ball');">
                                                    Hip Ext Over Ball</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Reverse Hyper Over Ball','stretching','','Reverse Hyper Over Ball');">
                                                    Reverse Hyper Over Ball</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Single Leg Balance With Rotation','stretching','','Single Leg Balance With Rotation');">
                                                    Single Leg Balance With Rotation</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Sky Diver','stretching','','Sky Diver');">
                                                    Sky Diver</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Ball Extensions','stretching','','Ball Extensions');">
                                                    Ball Extensions</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Swimmer','stretching','','Swimmer');">
                                                    Swimmer</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Hamstring double legged','stretching','','Hamstring double legged');">
                                                    Hamstring double legged</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Hamstring single legged','stretching','','Hamstring single legged');">
                                                    Hamstring single legged</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>SWISS BALL</u><br>Push Ups','stretching','','Push Ups');">
                                                    Push Ups</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="Dynamic Warm upheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>Dynamic Warm up</u><br>Frankinsteins','stretching','','Frankinsteins');">
                                                    Frankinsteins</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>Dynamic Warm up</u><br>Hip Hinge','stretching','','Hip Hinge');">
                                                    Hip Hinge</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>Dynamic Warm up</u><br>Mountain Climbers','stretching','','Mountain Climbers');">
                                                    Mountain Climbers</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>Dynamic Warm up</u><br>Skips','stretching','','Skips');">
                                                    Skips</td>
                                                <td background="nlimages/purpleback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>Dynamic Warm up</u><br>Jump Rope','stretching','','Jump Rope');">
                                                    Jump Rope</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="BANDSheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById('BANDS-STRETCHING')
                                                        .onclick = function() {
                                                            populatelist(
                                                                '<u>STRETCHING</u><br>BANDS',
                                                                'stretching', 'BANDS', '',
                                                                'BANDS');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="LADDER DRILLSheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>LADDER DRILLS</u><br>Ladder','sport','','Ladder');">
                                                    Ladder</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>LADDER DRILLS</u><br>Lunges','sport','','Lunges');">
                                                    Lunges</td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="GAIT TRAININGheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>GAIT TRAINING</u><br>Heel - Mid Stance - Toe Off','sport','','Heel - Mid Stance - Toe Off');">
                                                    Heel - Mid Stance - Toe Off</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>GAIT TRAINING</u><br>Walking','sport','','Walking');">
                                                    Walking</td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="JUMPINGheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>JUMPING</u><br>Single Leg','sport','','Single Leg');">
                                                    Single Leg</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>JUMPING</u><br>Double','sport','','Double');">
                                                    Double</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>JUMPING</u><br>Bench / Box Crunch','sport','','Bench / Box Crunch');">
                                                    Bench / Box Crunch</td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="BASKETBALLheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>#1','sport','','#1');">
                                                    #1</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>#2','sport','','#2');">
                                                    #2</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>#3','sport','','#3');">
                                                    #3</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>#4','sport','','#4');">
                                                    #4</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>#5','sport','','#5');">
                                                    #5</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>DRIBBLING','sport','','DRIBBLING');">
                                                    DRIBBLING</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>1','sport','','1');">
                                                    1</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>2','sport','','2');">
                                                    2</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>3','sport','','3');">
                                                    3</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>4','sport','','4');">
                                                    4</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>5','sport','','5');">
                                                    5</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>6','sport','','6');">
                                                    6</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>7','sport','','7');">
                                                    7</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>8','sport','','8');">
                                                    8</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>9','sport','','9');">
                                                    9</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>10','sport','','10');">
                                                    10</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASKETBALL</u><br>SHOOTING MACHINE','sport','','SHOOTING MACHINE');">
                                                    SHOOTING MACHINE</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="BASEBALLheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASEBALL</u><br>PITCHER','sport','','PITCHER');">
                                                    PITCHER</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASEBALL</u><br>CATCHER','sport','','CATCHER');">
                                                    CATCHER</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASEBALL</u><br>INFIELDER','sport','','INFIELDER');">
                                                    INFIELDER</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASEBALL</u><br>OUTFIELDER','sport','','OUTFIELDER');">
                                                    OUTFIELDER</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>BASEBALL</u><br>BATTING','sport','','BATTING');">
                                                    BATTING</td>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('5 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('10 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('15 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('20 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('25 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('30 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('35 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('40 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('45 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('50 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('55 YRDS');

                                                </script>
                                                <script>
                                                    if (subheadings['THROWING'] == null)
                                                        subheadings['THROWING'] = [];
                                                    subheadings['THROWING'].push('60 YRDS');

                                                </script>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="showsubcategories('BASEBALL','THROWING','sport','red')">
                                                    THROWING<br>(<u>more</u>)</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="FOOTBALLheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>OFFENSE','sport','','OFFENSE');">
                                                    OFFENSE</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>QB','sport','','QB');">
                                                    QB</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>RB','sport','','RB');">
                                                    RB</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>WR','sport','','WR');">
                                                    WR</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>TE','sport','','TE');">
                                                    TE</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>OL','sport','','OL');">
                                                    OL</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>CENTER','sport','','CENTER');">
                                                    CENTER</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>LONG SNAPPER','sport','','LONG SNAPPER');">
                                                    LONG SNAPPER</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>DEFENSE','sport','','DEFENSE');">
                                                    DEFENSE</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>DL','sport','','DL');">
                                                    DL</td>
                                            </tr>
                                            <tr>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>DT','sport','','DT');">
                                                    DT</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>LB','sport','','LB');">
                                                    LB</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>CB','sport','','CB');">
                                                    CB</td>
                                                <td background="nlimages/redback.png" width="100" height="100"
                                                    align="center"
                                                    onclick="populatelist('<u>FOOTBALL</u><br>SAFETY','sport','','SAFETY');">
                                                    SAFETY</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="GOLFheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById('GOLF-SPORT').onclick =
                                                        function() {
                                                            populatelist('<u>SPORT</u><br>GOLF',
                                                                'sport', 'GOLF', '', 'GOLF');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="LACROSSEheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById('LACROSSE-SPORT')
                                                        .onclick = function() {
                                                            populatelist('<u>SPORT</u><br>LACROSSE',
                                                                'sport', 'LACROSSE', '',
                                                                'LACROSSE');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="SOCCERheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById('SOCCER-SPORT')
                                                        .onclick = function() {
                                                            populatelist('<u>SPORT</u><br>SOCCER',
                                                                'sport', 'SOCCER', '', 'SOCCER');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="TENNISheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById('TENNIS-SPORT')
                                                        .onclick = function() {
                                                            populatelist('<u>SPORT</u><br>TENNIS',
                                                                'sport', 'TENNIS', '', 'TENNIS');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div id="VOLLEYBALLheadingdiv" style="display:none">
                                        <table cellspacing="10" cellpadding="0" style="color:white" width="550">
                                            <tr>
                                                <script>
                                                    document.getElementById('VOLLEYBALL-SPORT')
                                                        .onclick = function() {
                                                            populatelist(
                                                                '<u>SPORT</u><br>VOLLEYBALL',
                                                                'sport', 'VOLLEYBALL', '',
                                                                'VOLLEYBALL');
                                                        };

                                                </script>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                                <td width="100"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <br>
                                    <div id="subcategorydiv"></div>
                                </td>
                                <td valign="top">
                                    <center><br><br><Br><br>
                                        <form action="exercises.php" method="post" name="exerciseform">
                                            <input type="hidden" name="sendto" value="assessmenticd.php"><input
                                                type="hidden" name="exercisesubmit" value="true">
                                            <input type="hidden" name="todelete">
                                            <input type="hidden" name="numrows" id="numrows" value="0">
                                            <div id="exerciselist">
                                                <table width="635" cellpadding="3" cellspacing="0" border="1"
                                                    rules="rows">
                                                    <tr
                                                        style="border-top:1px solid #696969;border-bottom:1px solid #696969;padding:10px">
                                                        <td style="padding:0px;" colspan="7" align="center"><input
                                                                style="width:455px;background-image:url(nlimages/redback.png);background-size:450px 35px;color:white;font-size:24px;text-align:center;"
                                                                name="exercisename" value="WORKOUT">
                                                        </td>
                                                        <td colspan="5" bgcolor="black" align="center">
                                                            <font color="white" size="+2">09/07/2020
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color:black;color:white;">
                                                        <td width="15"></td>
                                                        <td width="15"></td>
                                                        <td align="center" width="210" colspan="2">
                                                            <b>Exercise</b>
                                                        </td>
                                                        <td align="center" width="50"><b>Sets</b>
                                                        </td>
                                                        <td align="center" width="50"><b>Reps</b>
                                                        </td>
                                                        <td align="center" width="75"><b>Lbs.</b>
                                                        </td>
                                                        <td align="center" width="50"><b>Dist.</b>
                                                        </td>
                                                        <td width="15"></td>
                                                        <td align="center" width="50"><b>Time</b>
                                                        </td>
                                                        <td><b>Side</b></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="12">No exercises yet, select an
                                                            exercise to add to list!</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <br />
                                            <div id="nosavediv"><input type="image"
                                                    src="nlimages/savebuttoninactive.png"></div>
                                            <div id="savediv" style="display:none;"><input type="image"
                                                    src="nlimages/savebutton.png" height="25"></div>
                                        </form>
                                    </center>
                                </td>
                            </tr>

                        </table>
                        <script>
                            function sendemail() {
                                if (changed) {
                                    if (window.confirm(
                                            'You have changes that will be lost if sending these exercises without saving first! Continue?'
                                        )) {
                                        document.getElementById('emailsubmit').value = 'true';
                                        document.emailform.submit();
                                    }
                                } else {
                                    document.getElementById('emailsubmit').value = 'true';
                                    document.emailform.submit();
                                }
                            }

                            function showemail() {
                                document.getElementById('emaillink').style.display = 'none';
                                javascript: document.getElementById('emaildiv').style.display =
                                    'block';
                            }

                        </script>
                        </form>
                        <script>
                            populatelist('<u>ROWS with BANDS</u><br>Moving - Side to Side', 'exercise', 'auto',
                                'Moving - Side to Side');

                        </script>
                    </div>
                    <form name="form" action="chartsubmit.php" method="post">
                        <input type="hidden" name="starpid">
                        <input type="hidden" name="staronoff">
                        <input type="hidden" name="markbilling">
                        <input type="hidden" name="uniquekey" value="" />
                        <title>SOAP Notes</title>
                        <table width="100%">
                            <tr>
                                <td width="50%" align="left"> <a href="assessmenticd.php?print=true">Print this page</a>
                                </td>
                                <td width="50%">
                                    <div align="right">Number of Visit: <font size="+2">1</font> of 1 (2020)</div>
                                </td>
                            </tr>
                        </table>
                        <hr />
                        <div class="pagebreak">
                            <table width="100%">
                                <tr>
                                    <td width="80%">
                                        <table width="100%" cellpadding="5">
                                            <tr>
                                                <td>Patient ID</td>
                                                <td> : </td>
                                                <td>12</td>
                                            </tr>
                                            <tr>
                                                <td>Patient Name</td>
                                                <td> : </td>
                                                <td>Testvisit </td>
                                                <td>Date</td>
                                            </tr>
                                            <tr>
                                                <td>Ins Name</td>
                                                <td> : </td>
                                                <td></td>
                                                <td>09/07/2020
                                            </tr>
                                            <tr>
                                                <td>DOB</td>
                                                <td> : </td>
                                                <td>mm/dd/yyyy</td>
                                                <td>Treatment Plan</td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td> : </td>
                                                <td> </td>
                                                <td>
                                                    Visit <select name="numvisits">
                                                        <option value="" selected></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select> times a week, for
                                                    <select name="numweeks">
                                                        <option value="" selected></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                    </select> weeks
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="20%" align="right" valign="middle">
                                        <img src="nlimages/manageicons/starinactive.png"
                                            style="position:relative;right:25px;" width="50" height="50"
                                            onclick="star('12','on');">
                                        <script>
                                            function star(pid, onoff) {
                                                if (onoff == 'on' || window.confirm(
                                                        'Are you sure you want to unstar this patient?')) {
                                                    document.form.starpid.value = pid;
                                                    document.form.staronoff.value = onoff;
                                                    document.form.submit();
                                                }
                                            }

                                        </script><input type="image" src="nlimages/chart/savebutton2.png"
                                            class="no-print"><br><Br>
                                        <img src="nlimages/chart/billingincomplete.png" onclick="markbilled();"><br><br>
                                        <div id="totalbilled" style="color:green;"></div>
                                        <script>
                                            function showbreakdown() {
                                                if (document.getElementById('breakdown').style.display == 'block')
                                                    document.getElementById('breakdown').style.display = 'none';
                                                else
                                                    document.getElementById('breakdown').style.display = 'block';
                                                document.getElementById('breakdown').style.height = document
                                                    .getElementById(
                                                        'breakdowntable').offsetHeight + 75;
                                            }

                                        </script>
                                        <div style="position:relative"><a href="javascript:showbreakdown();">Billing
                                                Breakdown</a>
                                            <div id="breakdown"
                                                style="position:absolute;top:20px;right:0px;height:800px;width:300px;background-color:#8dd8ff;border:1px solid #005c8b;z-index:+2;display:none;text-align:left;padding:25px;">
                                                <b>Billing</b><span style="float:right"><a
                                                        href="javascript:showbreakdown();"><img src="images/delete.png"
                                                            width="20" height="20"></a></span><br><Br>
                                                <table width="100%" cellpadding="2" cellspacing="0" border="1"
                                                    bordercolor="#696969" id="breakdowntable">
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center"><strong>Total billed</strong>:
                                                            $0.00</td>
                                                    </tr>
                                                </table>
                                                <script>
                                                    document.getElementById("totalbilled").innerHTML =
                                                        "<b>Total billed: $0.00</b>";

                                                </script>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <hr />
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="75%">
                                        <table width="100%">
                                            <tr>
                                                <td width="6%" align="center"><b>Pointers</b></td>
                                                <td width="10%" align="center"><strong>Category</strong></td>
                                                <td width="15%" align="center"><strong>ICD</strong></td>
                                                <td width="57%" align="center"><strong>CPT</strong></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="12%" align="center" style="border-left:1px solid black;padding:5px;">
                                        <b>Units</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellpadding="5" width="100%">
                                            <tr>
                                                <td width="6%" align="center"><b>A</b></td>
                                                <td width="15%"><select name="dxcategory1" id="dx1"
                                                        onchange="populateselect('1');exampopulate();">
                                                        <option value=""></option>
                                                        <option value="cervical">Cervical</option>
                                                        <option value="thoracic">Thoracic</option>
                                                        <option value="lumbar">Lumbar/SI</option>
                                                        <option value="pelvis">Pelvis Sacrum Coccyx</option>
                                                        <option value="generalspinal">General Spinal</option>
                                                        <option value="upperextremity">Upper Extremity</option>
                                                        <option value="lowerextremity">Lower Extremity</option>
                                                        <option value="headache">Headache</option>
                                                        <option value="general">General</option>
                                                    </select></td>
                                                <td width="20%">
                                                    <div id="dxcodedefault1" style="display:block;"><select
                                                            style="width:300px;">
                                                            <option value="" selected>Select a category for codes
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodecervical1" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectcervical1"
                                                            name="dxcodecervical1" style="width:260px"
                                                            onchange="selectte('cervical','1','A');checkadd('1','cervical');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="G54.0 Brachial Plexus disorders">G54.0
                                                                Brachial Plexus
                                                                disorders</option>
                                                            <option value="G54.2 Cervical root disorders">G54.2 Cervical
                                                                root disorders
                                                            </option>
                                                            <option value="M40.292 Cervical kyphosis, other">M40.292
                                                                Cervical kyphosis,
                                                                other</option>
                                                            <option value="M43.12 Sponylolisthesis, cervical region">
                                                                M43.12
                                                                Sponylolisthesis, cervical region</option>
                                                            <option value="M43.6 Torticollis">M43.6 Torticollis</option>
                                                            <option value="M46.02 Spinal enthesopathy, cervical region">
                                                                M46.02 Spinal
                                                                enthesopathy, cervical region</option>
                                                            <option
                                                                value="M47.12 Spondylosis w/out myelopathy, cervical region">
                                                                M47.12
                                                                Spondylosis w/out myelopathy, cervical region</option>
                                                            <option
                                                                value="M48.02 Spinal Stenosis, cervical region (C3-C7)">
                                                                M48.02
                                                                Spinal Stenosis, cervical region (C3-C7)</option>
                                                            <option
                                                                value="M48.32 Traumatic spondylopathy, cervical region">
                                                                M48.32
                                                                Traumatic spondylopathy, cervical region</option>
                                                            <option value="M50.01 IVD disorder w/ myelopathy Cervical">
                                                                M50.01 IVD
                                                                disorder w/ myelopathy Cervical</option>
                                                            <option
                                                                value="M50.12 Cervical disc disorder w/ radiculopathy">
                                                                M50.12
                                                                Cervical disc disorder w/ radiculopathy</option>
                                                            <option value="M50.20 Cervical disc displacement">M50.20
                                                                Cervical disc
                                                                displacement</option>
                                                            <option value="M50.30 Cervical disc disgnereation">M50.30
                                                                Cervical disc
                                                                disgnereation</option>
                                                            <option value="M50.90 Cervical disc disorder">M50.90
                                                                Cervical disc disorder
                                                            </option>
                                                            <option value="M53.0 Cervicocranial syndrome">M53.0
                                                                Cervicocranial syndrome
                                                            </option>
                                                            <option value="M53.1 Cervicobrachial syndrome">M53.1
                                                                Cervicobrachial
                                                                syndrome</option>
                                                            <option value="M54.12 Radiculopathy, cervical region">M54.12
                                                                Radiculopathy,
                                                                cervical region</option>
                                                            <option value="M54.2 Cervicalgia">M54.2 Cervicalgia</option>
                                                            <option value="M62.838 Muscle spasm, other">M62.838 Muscle
                                                                spasm, other
                                                            </option>
                                                            <option value="S13.4XXA Cervical sprain">S13.4XXA Cervical
                                                                sprain</option>
                                                            <option value="S14.2XXA Nerve root injury, cervical">
                                                                S14.2XXA Nerve root
                                                                injury, cervical</option>
                                                            <option value="S143.XXA Brachial plexus injury">S143.XXA
                                                                Brachial plexus
                                                                injury</option>
                                                            <option value="S16.1XXA Strain, Neck muscles">S16.1XXA
                                                                Strain, Neck muscles
                                                            </option>
                                                            <option
                                                                value="M99.00 Segmental Somatic Dysfunction Occiptal-Head">
                                                                M99.00
                                                                Segmental Somatic Dysfunction Occiptal-Head</option>
                                                            <option
                                                                value="M99.01 Segmental Somatic Dysfunction of Cervical Region">
                                                                M99.01 Segmental Somatic Dysfunction of Cervical Region
                                                            </option>
                                                            <option
                                                                value="S13.4XXA Spain of ligaments of cervical spine, initial encounter">
                                                                S13.4XXA Spain of ligaments of cervical spine, initial
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S16.1XXA Strain of muscle, fascia and tendon at next level, initial encounter">
                                                                S16.1XXA Strain of muscle, fascia and tendon at next
                                                                level, initial
                                                                encounter</option>
                                                            <option
                                                                value="S14.2XXA Injury nerve root cervical, initial encounter">
                                                                S14.2XXA Injury nerve root cervical, initial encounter
                                                            </option>
                                                            <option value="G54.1 Nerve root lesion cervical">G54.1 Nerve
                                                                root lesion
                                                                cervical</option>
                                                            <option
                                                                value="M50.33 Disc degeneration cervicothoracic region">
                                                                M50.33 Disc
                                                                degeneration cervicothoracic region</option>
                                                            <option value="M50.22 Cervical disc displacement C3-C7">
                                                                M50.22 Cervical disc
                                                                displacement C3-C7</option>
                                                            <option value="M50.23 Cervical disc displacement C7-T1">
                                                                M50.23 Cervical disc
                                                                displacement C7-T1</option>
                                                            <option value="M50.31 Cervical disc degeneration C2-C4">
                                                                M50.31 Cervical disc
                                                                degeneration C2-C4</option>
                                                            <option value="M50.32 Cervical disc degeneration C3-C7">
                                                                M50.32 Cervical disc
                                                                degeneration C3-C7</option>
                                                            <option value="M50.33 Cervical disc degeneration C7-T1">
                                                                M50.33 Cervical disc
                                                                degeneration C7-T1</option>
                                                            <option value="M53.2X2 Cervical spine instabilities">M53.2X2
                                                                Cervical spine
                                                                instabilities</option>
                                                            <option value="M40.202 Kyphosis unspecified cervical">
                                                                M40.202 Kyphosis
                                                                unspecified cervical</option>
                                                            <option value="S13.4XXS Sequela sprain neck ligaments">
                                                                S13.4XXS Sequela
                                                                sprain neck ligaments</option>
                                                            <option
                                                                value="M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial region">
                                                                M50.11 Cervical disc disorder with radiculopathy,
                                                                occipito-atlanto-axial
                                                                region</option>
                                                            <option
                                                                value="M50.12 Cervical disc disorder with radiculopathy, mid-cervical region">
                                                                M50.12 Cervical disc disorder with radiculopathy,
                                                                mid-cervical region
                                                            </option>
                                                            <option
                                                                value="M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region">
                                                                M50.13 Cervical disc disorder with radiculopathy,
                                                                cervicothoracic region
                                                            </option>
                                                            <option
                                                                value="M50.31 Other cervical disc degeneration, occipito-atlanto-axial region">
                                                                M50.31 Other cervical disc degeneration,
                                                                occipito-atlanto-axial region
                                                            </option>
                                                            <option
                                                                value="M50.32 Other cervical disc degeneration, mid-cervical region">
                                                                M50.32 Other cervical disc degeneration, mid-cervical
                                                                region</option>
                                                            <option
                                                                value="M50.33 Other cervical disc degeneration, cervicothoracic region">
                                                                M50.33 Other cervical disc degeneration, cervicothoracic
                                                                region</option>
                                                        </select></div>
                                                    <div id="dxcodethoracic1" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectthoracic1"
                                                            name="dxcodethoracic1" style="width:260px"
                                                            onchange="selectte('thoracic','1','A');checkadd('1','thoracic');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M99.02 Segmental dysf./Sublux, thoracic">
                                                                M99.02 Segmental
                                                                dysf./Sublux, thoracic</option>
                                                            <option value="G54.3 Thoracic root disorders">G54.3 Thoracic
                                                                root disorders
                                                            </option>
                                                            <option value="M43.14 Spondylolistesis, thoracic region">
                                                                M43.14
                                                                Spondylolistesis, thoracic region</option>
                                                            <option value="M46.04 Spinal enthesopathy, thoracic region">
                                                                M46.04 Spinal
                                                                enthesopathy, thoracic region</option>
                                                            <option
                                                                value="M47.24 Spondylosis w/ radiculopathy, thoracic region">
                                                                M47.24
                                                                Spondylosis w/ radiculopathy, thoracic region</option>
                                                            <option
                                                                value="M47.814 Spondylosis w/out mwelopathy, thoracic">
                                                                M47.814
                                                                Spondylosis w/out mwelopathy, thoracic</option>
                                                            <option
                                                                value="M48.04 Spinal stenosis, thoracic region (T1-G12)">
                                                                M48.04
                                                                Spinal stenosis, thoracic region (T1-G12)</option>
                                                            <option
                                                                value="M51.34 Intervertebral disc degeneration, thoracic region">
                                                                M51.34 Intervertebral disc degeneration, thoracic region
                                                            </option>
                                                            <option value="M51.84 IVD Thoracic">M51.84 IVD Thoracic
                                                            </option>
                                                            <option value="M54.14 Radiculopathy, thoracic">M54.14
                                                                Radiculopathy,
                                                                thoracic</option>
                                                            <option value="M54.6 Pain in thoracic spine">M54.6 Pain in
                                                                thoracic spine
                                                            </option>
                                                            <option value="S23.3XXA Thoracic spine">S23.3XXA Thoracic
                                                                spine</option>
                                                            <option value="S24.2XXA Nerve root injury, thoracic">
                                                                S24.2XXA Nerve root
                                                                injury, thoracic</option>
                                                            <option value="MS4.6 Pain in Thoracic spine">MS4.6 Pain in
                                                                Thoracic spine
                                                            </option>
                                                            <option
                                                                value="M99.02 Segmental and somatic dysfunction of the thoracic region">
                                                                M99.02 Segmental and somatic dysfunction of the thoracic
                                                                region</option>
                                                            <option
                                                                value="M99.08 Segmental and somatic dysfunction of rib cage">
                                                                M99.08
                                                                Segmental and somatic dysfunction of rib cage</option>
                                                            <option
                                                                value="S23.3XXA Sprain of ligaments of thoracic spine, initial encounter">
                                                                S23.3XXA Sprain of ligaments of thoracic spine, initial
                                                                encounter
                                                            </option>
                                                            <option value="S23.41XA Sprain of ribs, initial encounter">
                                                                S23.41XA Sprain
                                                                of ribs, initial encounter</option>
                                                            <option
                                                                value="S23.421A Sprain of chrondrosternal joint, initial encounter">
                                                                S23.421A Sprain of chrondrosternal joint, initial
                                                                encounter</option>
                                                            <option
                                                                value="M51.14 Intervertebral disc disorders with radiculopathy, thoracic region">
                                                                M51.14 Intervertebral disc disorders with radiculopathy,
                                                                thoracic region
                                                            </option>
                                                            <option
                                                                value="M53.84 Other specified dorsopathies, thoracic region">
                                                                M53.84
                                                                Other specified dorsopathies, thoracic region</option>
                                                            <option
                                                                value="M41.114 Juvenile idiopathic scoliosis, thoracic region">
                                                                M41.114 Juvenile idiopathic scoliosis, thoracic region
                                                            </option>
                                                            <option
                                                                value="M41.124 Adolescent idiopathic scoliosis, thoracic region">
                                                                M41.124 Adolescent idiopathic scoliosis, thoracic region
                                                            </option>
                                                            <option
                                                                value="M41.44 Neuromuscular scoliosis, thoracic region">
                                                                M41.44
                                                                Neuromuscular scoliosis, thoracic region</option>
                                                            <option value="M40.00 Kyphosis postural acquired">M40.00
                                                                Kyphosis postural
                                                                acquired</option>
                                                            <option value="M40.04 Postural kyphosis thoracic">M40.04
                                                                Postural kyphosis
                                                                thoracic</option>
                                                            <option value="M40.03 Cervicothoracic">M40.03
                                                                Cervicothoracic</option>
                                                            <option
                                                                value="S29.012A Strain muscle-tendon back wall thorax acute">
                                                                S29.012A Strain muscle-tendon back wall thorax acute
                                                            </option>
                                                            <option value="G43.3 Nerve root disorder-thoracic">G43.3
                                                                Nerve root
                                                                disorder-thoracic</option>
                                                            <option
                                                                value="M53.2X4 Spinal instabilities thoracic region">
                                                                M53.2X4 Spinal
                                                                instabilities thoracic region</option>
                                                        </select></div>
                                                    <div id="dxcodelumbar1" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectlumbar1"
                                                            name="dxcodelumbar1" style="width:260px"
                                                            onchange="selectte('lumbar','1','A');checkadd('1','lumbar');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="G54.1 Lumbosacral plexus disorders">G54.1
                                                                Lumbosacral plexus
                                                                disorders</option>
                                                            <option value="G54.4 Lumbosacral root disorders">G54.4
                                                                Lumbosacral root
                                                                disorders</option>
                                                            <option value="M43.16 Spondylolisthesis, lumbar region">
                                                                M43.16
                                                                Spondylolisthesis, lumbar region</option>
                                                            <option value="M46.06 Spinal enthesopathy, lumbar region">
                                                                M46.06 Spinal
                                                                enthesopathy, lumbar region</option>
                                                            <option value="M47.896 Spondylosis, lumbar region">M47.896
                                                                Spondylosis,
                                                                lumbar region</option>
                                                            <option value="M51.06 IVD Disorder w/myelopathy lumbar">
                                                                M51.06 IVD Disorder
                                                                w/myelopathy lumbar</option>
                                                            <option
                                                                value="M51.26 Intervertebral disc displacement, lumbar">
                                                                M51.26
                                                                Intervertebral disc displacement, lumbar</option>
                                                            <option
                                                                value="M51.36 Intervertebral disc degeneration, lumbar">
                                                                M51.36
                                                                Intervertebral disc degeneration, lumbar</option>
                                                            <option value="M54.08 Lumbar facet syndrome">M54.08 Lumbar
                                                                facet syndrome
                                                            </option>
                                                            <option value="M54.16 Low back pain">M54.16 Low back pain
                                                            </option>
                                                            <option value="S33.5XXA Lumbar spine strain">S33.5XXA Lumbar
                                                                spine strain
                                                            </option>
                                                            <option value="M54.5 Low back pain">M54.5 Low back pain
                                                            </option>
                                                            <option
                                                                value="M99.03 Segmental and somatic dysfunction of lumbar region">
                                                                M99.03 Segmental and somatic dysfunction of lumbar
                                                                region</option>
                                                            <option
                                                                value="M99.04 Segmental and somatic dysfunction of sacral region">
                                                                M99.04 Segmental and somatic dysfunction of sacral
                                                                region</option>
                                                            <option
                                                                value="S33.5XXA Sprain of ligaments of lumbar spine, initial encounter">
                                                                S33.5XXA Sprain of ligaments of lumbar spine, initial
                                                                encounter</option>
                                                            <option
                                                                value="S33.6XXA Sprain of sacroiliac joint, inital encounter">
                                                                S33.6XXA Sprain of sacroiliac joint, inital encounter
                                                            </option>
                                                            <option
                                                                value="S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter">
                                                                S33.8XXA Sprain of other parts of lumbar spine and
                                                                pelvis, initial
                                                                encounter</option>
                                                            <option
                                                                value="S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial encounter">
                                                                S39.9XXA Sprain of unspecified parts of the lumbar spine
                                                                and pelvis,
                                                                initial encounter</option>
                                                            <option
                                                                value="S39.012A Strain of muscle, fascia and tendon of lower back, initial encounter">
                                                                S39.012A Strain of muscle, fascia and tendon of lower
                                                                back, initial
                                                                encounter</option>
                                                            <option
                                                                value="M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar region">
                                                                M51.15 Intervertebral disc disorders with radiculopathy,
                                                                thoracolumbar
                                                                region</option>
                                                            <option
                                                                value="M51.16 Intervertebral disc disorders with radiculopathy, lumbar region">
                                                                M51.16 Intervertebral disc disorders with radiculopathy,
                                                                lumbar region
                                                            </option>
                                                            <option
                                                                value="M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region">
                                                                M51.17 Intervertebral disc disorders with radiculopathy,
                                                                lumbosacral
                                                                region</option>
                                                            <option
                                                                value="M51.36 Other intervertebral disc degeneration, lumbar region">
                                                                M51.36 Other intervertebral disc degeneration, lumbar
                                                                region</option>
                                                            <option
                                                                value="M51.37 Other intervertebral disc degeneration, lumbosacral region">
                                                                M51.37 Other intervertebral disc degeneration,
                                                                lumbosacral region
                                                            </option>
                                                            <option
                                                                value="M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region">
                                                                M47.816 Spondylosis without myelopathy or radiculopathy,
                                                                lumbar region
                                                            </option>
                                                            <option
                                                                value="M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region">
                                                                M47.817 Spondyloses without myelopathy or radiculopathy,
                                                                lumboscral
                                                                region</option>
                                                            <option value="M54.31 Sciatica, right side">M54.31 Sciatica,
                                                                right side
                                                            </option>
                                                            <option value="M54.32 Sciatica, left side">M54.32 Sciatica,
                                                                left side
                                                            </option>
                                                            <option value="M99.03 Segmental Somatic dysfunction Lumbar">
                                                                M99.03 Segmental
                                                                Somatic dysfunction Lumbar</option>
                                                            <option
                                                                value="M99.04 Segmental Somatic dysfunction SI. Sacrum">
                                                                M99.04
                                                                Segmental Somatic dysfunction SI. Sacrum</option>
                                                            <option value="M54.41 Lumbago with sciatica, right side">
                                                                M54.41 Lumbago with
                                                                sciatica, right side</option>
                                                            <option value="M54.42 Lumbago with sciatica, left side">
                                                                M54.42 Lumbago with
                                                                sciatica, left side</option>
                                                            <option value="M54.16 Radiculopathy, lumbar region">M54.16
                                                                Radiculopathy,
                                                                lumbar region</option>
                                                            <option value="M54.17 Radiculopathy, lumboscral region">
                                                                M54.17
                                                                Radiculopathy, lumboscral region</option>
                                                            <option
                                                                value="M53.3 Sacrococcygeal disorders, not elsewhere classified">
                                                                M53.3 Sacrococcygeal disorders, not elsewhere classified
                                                            </option>
                                                            <option
                                                                value="M53.85 Other specified dorsopathies, thoracolumbar region">
                                                                M53.85 Other specified dorsopathies, thoracolumbar
                                                                region</option>
                                                            <option
                                                                value="M53.86 Other specified dorsopathies, lumbar region">
                                                                M53.86
                                                                Other specified dorsopathies, lumbar region</option>
                                                            <option value="M48.06 Spinal stenosis, lumbar region">M48.06
                                                                Spinal
                                                                stenosis, lumbar region</option>
                                                            <option
                                                                value="M41.115 Juvenile idiopathic scoliosis, thoracolumbar region">
                                                                M41.115 Juvenile idiopathic scoliosis, thoracolumbar
                                                                region</option>
                                                            <option
                                                                value="M41.116 Juvenile idiopathic scoliosis, lumbar region">
                                                                M41.116
                                                                Juvenile idiopathic scoliosis, lumbar region</option>
                                                            <option
                                                                value="M41.127 Adolescent idiopathic scoliosis, lumbosacral region">
                                                                M41.127 Adolescent idiopathic scoliosis, lumbosacral
                                                                region</option>
                                                            <option
                                                                value="M41.45 Neuromuscular scoliosis, thoracolumbar region">
                                                                M41.45
                                                                Neuromuscular scoliosis, thoracolumbar region</option>
                                                            <option
                                                                value="M41.46 Neuromuscular scoliosis, lumbar region">
                                                                M41.46
                                                                Neuromuscular scoliosis, lumbar region</option>
                                                            <option
                                                                value="M41.47 Neuromuscular scoliosis, lumbosacral region">
                                                                M41.47
                                                                Neuromuscular scoliosis, lumbosacral region</option>
                                                            <option
                                                                value="M51.26 Intervertebral disc displacement Lumbar L2-L5">
                                                                M51.26
                                                                Intervertebral disc displacement Lumbar L2-L5</option>
                                                            <option
                                                                value="M51.27 Intervertebral disc displacement L5-S1">
                                                                M51.27
                                                                Intervertebral disc displacement L5-S1</option>
                                                            <option value="M51.36 Degeneration Lumbar Disc L2-L5">M51.36
                                                                Degeneration
                                                                Lumbar Disc L2-L5</option>
                                                            <option value="M51.37 Degeneration Lumbarsacral Disc L5-S1">
                                                                M51.37
                                                                Degeneration Lumbarsacral Disc L5-S1</option>
                                                            <option value="M46.1 Sacroilitis">M46.1 Sacroilitis</option>
                                                            <option
                                                                value="M53.2X7 Spinal instabilities lumbosacral region">
                                                                M53.2X7
                                                                Spinal instabilities lumbosacral region</option>
                                                            <option value="M53.2X6 Spinal instabilities lumbar spine">
                                                                M53.2X6 Spinal
                                                                instabilities lumbar spine</option>
                                                        </select></div>
                                                    <div id="dxcodepelvis1" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectpelvis1"
                                                            name="dxcodepelvis1" style="width:260px"
                                                            onchange="selectte('pelvis','1','A');checkadd('1','pelvis');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M99.04 Segmental dysf/Sublux, sacral">M99.04
                                                                Segmental
                                                                dysf/Sublux, sacral</option>
                                                            <option value="M99.05 Segmental dysf/Sublux, pelvic">M99.05
                                                                Segmental
                                                                dysf/Sublux, pelvic</option>
                                                            <option value="M43.08 Spondylosis, sacral region">M43.08
                                                                Spondylosis, sacral
                                                                region</option>
                                                            <option value="M54.31 Sciatica, right side">M54.31 Sciatica,
                                                                right side
                                                            </option>
                                                            <option value="M54.32 Sciatica, left side">M54.32 Sciatica,
                                                                left side
                                                            </option>
                                                            <option value="S33.6 Sprain SI joint">S33.6 Sprain SI joint
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodegeneralspinal1" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectgeneralspinal1"
                                                            name="dxcodegeneralspinal1" style="width:260px"
                                                            onchange="selectte('generalspinal','1','A');checkadd('1','generalspinal');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="Q67.5 Scliosis, congenital">Q67.5 Scliosis,
                                                                congenital
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodeupperextremity1" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectupperextremity1"
                                                            name="dxcodeupperextremity1" style="width:260px"
                                                            onchange="selectte('upperextremity','1','A');checkadd('1','upperextremity');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M77.11 Lateral epicondylitis, right elbow">
                                                                M77.11 Lateral
                                                                epicondylitis, right elbow</option>
                                                            <option value="M77.12 Lateral epicondylitis, left elbow">
                                                                M77.12 Lateral
                                                                epicondylitis, left elbow</option>
                                                            <option
                                                                value="M99.07 Segmental and somatic dysfunction of upper extremity">
                                                                M99.07 Segmental and somatic dysfunction of upper
                                                                extremity</option>
                                                            <option
                                                                value="G56.01 Carpal tunnel syndrome, right upper limb">
                                                                G56.01
                                                                Carpal tunnel syndrome, right upper limb</option>
                                                            <option
                                                                value="G56.02 Carpal tunnel syndrome, left upper limb">
                                                                G56.02 Carpal
                                                                tunnel syndrome, left upper limb</option>
                                                            <option value="M75.0 Adhesive capsulitis of shoulder">M75.0
                                                                Adhesive
                                                                capsulitis of shoulder</option>
                                                            <option
                                                                value="M75.01 Adhesive capsulitis of right shoulder">
                                                                M75.01 Adhesive
                                                                capsulitis of right shoulder</option>
                                                            <option value="M75.02 Adhesive capsulitis of left shoulder">
                                                                M75.02 Adhesive
                                                                capsulitis of left shoulder</option>
                                                            <option value="M75.100 Unspec Rotator Cuff tear/rupture">
                                                                M75.100 Unspec
                                                                Rotator Cuff tear/rupture</option>
                                                            <option
                                                                value="M75.101 Unspec Rotator Cuff tear/rupture right shoulder">
                                                                M75.101 Unspec Rotator Cuff tear/rupture right shoulder
                                                            </option>
                                                            <option
                                                                value="M75.102 Unspec Rotator Cuff tear/rupture left shoulder">
                                                                M75.102 Unspec Rotator Cuff tear/rupture left shoulder
                                                            </option>
                                                            <option
                                                                value="M75.21 Bicipital tenosynovitis Right shoulder">
                                                                M75.21
                                                                Bicipital tenosynovitis Right shoulder</option>
                                                            <option
                                                                value="M75.22 Bicipital tenosynovitis Left shoulder">
                                                                M75.22
                                                                Bicipital tenosynovitis Left shoulder</option>
                                                            <option
                                                                value="M75.41 Impingement syndrome of Right shoulder">
                                                                M75.41
                                                                Impingement syndrome of Right shoulder</option>
                                                            <option
                                                                value="M75.42 Impingement syndrome of Left shoulder">
                                                                M75.42
                                                                Impingement syndrome of Left shoulder</option>
                                                            <option value="M75.5 Bursitis of shoulder">M75.5 Bursitis of
                                                                shoulder
                                                            </option>
                                                            <option value="M75.51 Bursitis of right shoulder">M75.51
                                                                Bursitis of right
                                                                shoulder</option>
                                                            <option value="M75.52 Bursitis of left shoulder">M75.52
                                                                Bursitis of left
                                                                shoulder</option>
                                                            <option value="M77.01 Medial epicondylitis, right elbow">
                                                                M77.01 Medial
                                                                epicondylitis, right elbow</option>
                                                            <option value="M77.02 Medial epicondylitis, left elbow">
                                                                M77.02 Medial
                                                                epicondylitis, left elbow</option>
                                                            <option value="M77.11 Lateral epicondylitis, right elbow">
                                                                M77.11 Lateral
                                                                epicondylitis, right elbow</option>
                                                            <option value="M77.12 Lateral epicondylitis, left elbow">
                                                                M77.12 Lateral
                                                                epicondylitis, left elbow</option>
                                                            <option
                                                                value="S43.51XA Sprain of right acromioclavicular joint, initial encounter">
                                                                S43.51XA Sprain of right acromioclavicular joint,
                                                                initial encounter
                                                            </option>
                                                            <option
                                                                value="S43.52XA Sprain of left acromioclavicular joint, initial encounter">
                                                                S43.52XA Sprain of left acromioclavicular joint, initial
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S43.411A Sprain of right coracohumeral (ligament), inital encounter">
                                                                S43.411A Sprain of right coracohumeral (ligament),
                                                                inital encounter
                                                            </option>
                                                            <option
                                                                value="S43.412A Sprain of left coracohumeral (ligament), inital encounter">
                                                                S43.412A Sprain of left coracohumeral (ligament), inital
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S43.421A Sprain of right rotator cuff capsule, initial encounter">
                                                                S43.421A Sprain of right rotator cuff capsule, initial
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S43.422A Sprain of left rotator cuff capsule, initial encounter">
                                                                S43.422A Sprain of left rotator cuff capsule, initial
                                                                encounter</option>
                                                            <option
                                                                value="S43.911A Right shoulder strain unspecified muscles, Acute">
                                                                S43.911A Right shoulder strain unspecified muscles,
                                                                Acute</option>
                                                            <option
                                                                value="S43.912A Left shoulder strain unspecified muscles, Acute">
                                                                S43.912A Left shoulder strain unspecified muscles, Acute
                                                            </option>
                                                            <option
                                                                value="S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right shoulder, initial">
                                                                S46.011A Strain of muscle(s) and tendon(s) of the
                                                                rotator cuff of right
                                                                shoulder, initial</option>
                                                            <option
                                                                value="S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left shoulder, initial">
                                                                S46.012A Strain of muscle(s) and tendon(s) of the
                                                                rotator cuff of left
                                                                shoulder, initial</option>
                                                            <option
                                                                value="S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of right shoulder">
                                                                S46.091A Other injury of muscle(s) and Tendon(s) of the
                                                                rotator cuff of
                                                                right shoulder</option>
                                                            <option
                                                                value="S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left shoulder">
                                                                S46.092A Other injury of muscle(s) and Tendon(s) of the
                                                                rotator cuff of
                                                                left shoulder</option>
                                                            <option
                                                                value="S46.811A Srain of other muscles, fascia and tendons at shoulder and upper arm level, right arm, initial encounter">
                                                                S46.811A Srain of other muscles, fascia and tendons at
                                                                shoulder and
                                                                upper arm level, right arm, initial encounter</option>
                                                            <option
                                                                value="S46.812A Srain of other muscles, fascia and tendons at shoulder and upper arm level, left arm, initial encounter">
                                                                S46.812A Srain of other muscles, fascia and tendons at
                                                                shoulder and
                                                                upper arm level, left arm, initial encounter</option>
                                                            <option value="M75.00 Frozen shoulder">M75.00 Frozen
                                                                shoulder</option>
                                                            <option value="M25.511 Pain in right shoulder">M25.511 Pain
                                                                in right
                                                                shoulder</option>
                                                            <option value="M25.512 Pain in left shoulder">M25.512 Pain
                                                                in left shoulder
                                                            </option>
                                                            <option value="M25.521 Pain in right elbow">M25.521 Pain in
                                                                right elbow
                                                            </option>
                                                            <option value="M25.522 Pain in left elbow">M25.522 Pain in
                                                                left elbow
                                                            </option>
                                                            <option value="M25.531 Pain in right wrist">M25.531 Pain in
                                                                right wrist
                                                            </option>
                                                            <option value="M25.32 Pain in left wrist">M25.32 Pain in
                                                                left wrist</option>
                                                            <option value="M79.601 Pain in right arm">M79.601 Pain in
                                                                right arm</option>
                                                            <option value="M79.602 Pain in left arm">M79.602 Pain in
                                                                left arm</option>
                                                            <option value="M79.621 Pain in right upper arm">M79.621 Pain
                                                                in right upper
                                                                arm</option>
                                                            <option value="M79.622 Pain in left upper arm">M79.622 Pain
                                                                in left upper
                                                                arm</option>
                                                            <option value="M79.631 Pain in right forearm">M79.631 Pain
                                                                in right forearm
                                                            </option>
                                                            <option value="M79.632 Pain in left forearm">M79.632 Pain in
                                                                left forearm
                                                            </option>
                                                            <option value="M79.641 Pain in right hand">M79.641 Pain in
                                                                right hand
                                                            </option>
                                                            <option value="M79.642 Pain in left hand">M79.642 Pain in
                                                                left hand</option>
                                                            <option value="M79.644 Pain in right finger(s)">M79.644 Pain
                                                                in right
                                                                finger(s)</option>
                                                            <option value="M79.645 Pain in left finger(s)">M79.645 Pain
                                                                in left
                                                                finger(s)</option>
                                                            <option value="M25.619 Stiffness of unspec. shoulder">
                                                                M25.619 Stiffness of
                                                                unspec. shoulder</option>
                                                            <option value="M89.519 Osteolysis of shoulder">M89.519
                                                                Osteolysis of
                                                                shoulder</option>
                                                            <option value="M93.919 Osteochondropathy of shoulder">
                                                                M93.919
                                                                Osteochondropathy of shoulder</option>
                                                            <option value="M60.819 Myositis of shoulder">M60.819
                                                                Myositis of shoulder
                                                            </option>
                                                            <option value="M67.419 Ganglion cyst of shoulder">M67.419
                                                                Ganglion cyst of
                                                                shoulder</option>
                                                            <option value="M25.019 Hamarthrosis of shoulder">M25.019
                                                                Hamarthrosis of
                                                                shoulder</option>
                                                            <option value="M25.719 Bone spur-osteophyte of shoulder">
                                                                M25.719 Bone
                                                                spur-osteophyte of shoulder</option>
                                                            <option value="M75.81 Tendinitis of right shoulder">M75.81
                                                                Tendinitis of
                                                                right shoulder</option>
                                                            <option value="M75.82 Tendinitis of left shoulder">M75.82
                                                                Tendinitis of left
                                                                shoulder</option>
                                                            <option value="M13.119 Monoarthritis of shoulder region">
                                                                M13.119
                                                                Monoarthritis of shoulder region</option>
                                                            <option value="S53.031S Nursemaid's Elbow, right elbow">
                                                                S53.031S Nursemaid's
                                                                Elbow, right elbow</option>
                                                            <option value="S53.032S Nursemaid's Elbow, left elbow">
                                                                S53.032S Nursemaid's
                                                                Elbow, left elbow</option>
                                                            <option value="M25.629 Stiffness of unspec. elbow">M25.629
                                                                Stiffness of
                                                                unspec. elbow</option>
                                                            <option value="M25.029 Hemarthrosis of elbow">M25.029
                                                                Hemarthrosis of elbow
                                                            </option>
                                                            <option value="M67.429 Ganglion cyst of elbow">M67.429
                                                                Ganglion cyst of
                                                                elbow</option>
                                                            <option value="M24.629 Ankylosis of elbow">M24.629 Ankylosis
                                                                of elbow
                                                            </option>
                                                            <option value="M25.729 Bone spur of elbow">M25.729 Bone spur
                                                                of elbow
                                                            </option>
                                                            <option value="M19.021 Arthriris of right elbow">M19.021
                                                                Arthriris of right
                                                                elbow</option>
                                                            <option value="M19.022 Arthritis of left elbow">M19.022
                                                                Arthritis of left
                                                                elbow</option>
                                                            <option value="M21.331 Wrist drop, right wrist">M21.331
                                                                Wrist drop, right
                                                                wrist</option>
                                                            <option value="M21.332 Wrist drop, left wrist">M21.332 Wrist
                                                                drop, left
                                                                wrist</option>
                                                            <option value="M25.639 Stiffness of unspec. wrist">M25.639
                                                                Stiffness of
                                                                unspec. wrist</option>
                                                            <option value="M25.039 Hemarthrosis of wrist">M25.039
                                                                Hemarthrosis of wrist
                                                            </option>
                                                            <option value="M67.439 Gangolian cyst of wrist">M67.439
                                                                Gangolian cyst of
                                                                wrist</option>
                                                            <option value="M25.739 Bone spur of wrist">M25.739 Bone spur
                                                                of wrist
                                                            </option>
                                                            <option value="M25.439 Effusion of unspec. wrist">M25.439
                                                                Effusion of
                                                                unspec. wrist</option>
                                                            <option value="M13.139 Monarthritis of unspec. wrist">
                                                                M13.139 Monarthritis
                                                                of unspec. wrist</option>
                                                            <option value="M25.539 Arthralgia of wrist">M25.539
                                                                Arthralgia of wrist
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodelowerextremity1" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectlowerextremity1"
                                                            name="dxcodelowerextremity1" style="width:260px"
                                                            onchange="selectte('lowerextremity','1','A');checkadd('1','lowerextremity');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M72.2 Planter fascitis">M72.2 Planter
                                                                fascitis</option>
                                                            <option value="S93.01XA Subluxation right ankle/foot">
                                                                S93.01XA Subluxation
                                                                right ankle/foot</option>
                                                            <option value="S93.02XA Subluxation left ankle/foot">
                                                                S93.02XA Subluxation
                                                                left ankle/foot</option>
                                                            <option
                                                                value="M99.06 Segmental and somatic dysfunction of lower extremity">
                                                                M99.06 Segmental and somatic dysfunction of lower
                                                                extremity</option>
                                                            <option value="M76.61 Achilles Tendinitis, Right Leg">M76.61
                                                                Achilles
                                                                Tendinitis, Right Leg</option>
                                                            <option value="M76.62 Achilles Tendinitis, Left Leg">M76.62
                                                                Achilles
                                                                Tendinitis, Left Leg</option>
                                                            <option
                                                                value="S73.191A Other sprain of right hip, initial encounter">
                                                                S73.191A Other sprain of right hip, initial encounter
                                                            </option>
                                                            <option
                                                                value="S73.192A Other sprain of left hip, initial encounter">
                                                                S73.192A Other sprain of left hip, initial encounter
                                                            </option>
                                                            <option
                                                                value="S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter">
                                                                S76.011A Strain of muscle, fascia and tendon of right
                                                                hip, initial
                                                                encounter</option>
                                                            <option
                                                                value="S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter">
                                                                S76.012A Strain of muscle, fascia and tendon of left
                                                                hip, initial
                                                                encounter</option>
                                                            <option
                                                                value="S83.91XA Sprain of unspecified site of right knee, initial encounter">
                                                                S83.91XA Sprain of unspecified site of right knee,
                                                                initial encounter
                                                            </option>
                                                            <option
                                                                value="S83.92XA Sprain of unspecified site of left knee, initial encounter">
                                                                S83.92XA Sprain of unspecified site of left knee,
                                                                initial encounter
                                                            </option>
                                                            <option value="M79.604 Pain in right leg">M79.604 Pain in
                                                                right leg</option>
                                                            <option value="M79.605 Pain in left leg">M79.605 Pain in
                                                                left leg</option>
                                                            <option value="M79.651 Pain in right thigh">M79.651 Pain in
                                                                right thigh
                                                            </option>
                                                            <option value="M79.652 Pain in left thigh">M79.652 Pain in
                                                                left thigh
                                                            </option>
                                                            <option value="M79.661 Pain in right lower leg">M79.661 Pain
                                                                in right lower
                                                                leg</option>
                                                            <option value="M79.662 Pain in left lower leg">M79.662 Pain
                                                                in left lower
                                                                leg</option>
                                                            <option value="M79.671 Pain in right foot">M79.671 Pain in
                                                                right foot
                                                            </option>
                                                            <option value="M79.672 Pain in left foot">M79.672 Pain in
                                                                left foot</option>
                                                            <option value="M79.674 Pain in right toes">M79.674 Pain in
                                                                right toes
                                                            </option>
                                                            <option value="M79.675 Pain in left toes">M79.675 Pain in
                                                                left toes</option>
                                                            <option value="M25.551 Pain in right hip">M25.551 Pain in
                                                                right hip</option>
                                                            <option value="M25.552 Pain in left hip">M25.552 Pain in
                                                                left hip</option>
                                                            <option value="M25.561 Pain in right knee">M25.561 Pain in
                                                                right knee
                                                            </option>
                                                            <option value="M25.562 Pain in left knee">M25.562 Pain in
                                                                left knee</option>
                                                            <option value="M25.571 Pain in right ankle">M25.571 Pain in
                                                                right ankle
                                                            </option>
                                                            <option value="M25.572 Pain in left ankle">M25.572 Pain in
                                                                left ankle
                                                            </option>
                                                            <option value="M76.31 Iliotibial band syndrome, right leg">
                                                                M76.31 Iliotibial
                                                                band syndrome, right leg</option>
                                                            <option value="M76.32 Iliotibial band syndrome, left leg">
                                                                M76.32 Iliotibial
                                                                band syndrome, left leg</option>
                                                            <option value="M70.50 Bursitis of unspec. knee">M70.50
                                                                Bursitis of unspec.
                                                                knee</option>
                                                            <option value="M25.069 Hemarthrosis of unspec. knee">M25.069
                                                                Hemarthrosis of
                                                                unspec. knee</option>
                                                            <option value="M94.269 Chondromalacia of unspec. knee">
                                                                M94.269
                                                                Chondromalacia of unspec. knee</option>
                                                            <option value="M67.469 Gangolian cyst of unspec. knee">
                                                                M67.469 Gangolian
                                                                cyst of unspec. knee</option>
                                                            <option value="M25.760 Bone spur of unspec. knee">M25.760
                                                                Bone spur of
                                                                unspec. knee</option>
                                                            <option value="M23.40 Loose body in spec. knee">M23.40 Loose
                                                                body in spec.
                                                                knee</option>
                                                            <option value="M25.669 Stiffness of unspec. knee">M25.669
                                                                Stiffness of
                                                                unspec. knee</option>
                                                            <option value="M70.51 Bursitis of right knee">M70.51
                                                                Bursitis of right knee
                                                            </option>
                                                            <option value="M70.52 Bursitis of left knee">M70.52 Bursitis
                                                                of left knee
                                                            </option>
                                                            <option value="M21.371 Foot drop right foot">M21.371 Foot
                                                                drop right foot
                                                            </option>
                                                            <option value="M21.372 Foot drop left foot">M21.372 Foot
                                                                drop left foot
                                                            </option>
                                                            <option value="Q72.70 Cleft foot-split foot">Q72.70 Cleft
                                                                foot-split foot
                                                            </option>
                                                            <option value="S90.30XA Contusion of foot">S90.30XA
                                                                Contusion of foot
                                                            </option>
                                                            <option value="M25.076 Hemarthrosis of unspec. foot">M25.076
                                                                Hemarthrosis of
                                                                unspec. foot</option>
                                                            <option value="M25.776 Bone spur of foot">M25.776 Bone spur
                                                                of foot</option>
                                                            <option value="T69.021A Immersion of right foot">T69.021A
                                                                Immersion of right
                                                                foot</option>
                                                            <option value="T69.022A Immersion of left foot">T69.022A
                                                                Immersion of left
                                                                foot</option>
                                                        </select></div>
                                                    <div id="dxcodeheadache1" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectheadache1"
                                                            name="dxcodeheadache1" style="width:260px"
                                                            onchange="selectte('headache','1','A');checkadd('1','headache');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="G43.001 Migraine">G43.001 Migraine</option>
                                                            <option value="G44.209 Tension-type headache">G44.209
                                                                Tension-type headache
                                                            </option>
                                                            <option value="G44.89 Headache">G44.89 Headache</option>
                                                            <option value="R42 Dizziness">R42 Dizziness</option>
                                                            <option value="R51 Headache">R51 Headache</option>
                                                            <option
                                                                value="G44.201 Tension-Type Headache, unspecified, intractable">
                                                                G44.201 Tension-Type Headache, unspecified, intractable
                                                            </option>
                                                            <option
                                                                value="G44.209 Tension-Type Headache, unspecified, not intractable">
                                                                G44.209 Tension-Type Headache, unspecified, not
                                                                intractable</option>
                                                            <option
                                                                value="G43.001 Migraine without aura, not intractable, with status migrainosus">
                                                                G43.001 Migraine without aura, not intractable, with
                                                                status migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.009 Migraine without aura, not intractable, without status migrainosus">
                                                                G43.009 Migraine without aura, not intractable, without
                                                                status
                                                                migrainosus</option>
                                                            <option
                                                                value="G43.011 Migraine without aura, intractable, with status migrainosus">
                                                                G43.011 Migraine without aura, intractable, with status
                                                                migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.019 Migraine without aura, intractable, without status migrainosus">
                                                                G43.019 Migraine without aura, intractable, without
                                                                status migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.101 Migraine with aura, not intractable, with status migrainosus">
                                                                G43.101 Migraine with aura, not intractable, with status
                                                                migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.109 Migraine with aura, not intractable, without status migrainosus">
                                                                G43.109 Migraine with aura, not intractable, without
                                                                status migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.111 Migraine with aura, intractable, with status migrainosus">
                                                                G43.111 Migraine with aura, intractable, with status
                                                                migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.119 Migraine with aura, intractable, without status migrainosus">
                                                                G43.119 Migraine with aura, intractable, without status
                                                                migrainosus
                                                            </option>
                                                            <option value="G44.219 Tension Headache episodic">G44.219
                                                                Tension Headache
                                                                episodic</option>
                                                            <option value="G44.229 Tension Headache chronic">G44.229
                                                                Tension Headache
                                                                chronic</option>
                                                            <option value="G44.319 Acute post-traumatic headache">
                                                                G44.319 Acute
                                                                post-traumatic headache</option>
                                                            <option value="G44.329 Chronic post-traumatic headache">
                                                                G44.329 Chronic
                                                                post-traumatic headache</option>
                                                            <option value="S06.0X0A Mild concussion (no loc) acute">
                                                                S06.0X0A Mild
                                                                concussion (no loc) acute</option>
                                                            <option value="S06.0X1A Mild concussion (LOC<30MINS)">
                                                                S06.0X1A Mild
                                                                concussion (LOC<30MINS)< /option>
                                                            <option value="F07.81 Post-Concussion Syndrome">F07.81
                                                                Post-Concussion
                                                                Syndrome</option>
                                                            <option value="H53.8 Blurry Vision">H53.8 Blurry Vision
                                                            </option>
                                                            <option value="H93.19 Tinnitus unspecified">H93.19 Tinnitus
                                                                unspecified
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodegeneral1" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectgeneral1"
                                                            name="dxcodegeneral1" style="width:260px"
                                                            onchange="selectte('general','1','A');checkadd('1','general');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M62.830 Muscle spasm of the back">M62.830
                                                                Muscle spasm of the
                                                                back</option>
                                                            <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                                            <option value="R42 Vertigo, dizziness & giddiness">R42
                                                                Vertigo, dizziness &
                                                                giddiness</option>
                                                            <option value="M62.830 Muscle spasm of back">M62.830 Muscle
                                                                spasm of back
                                                            </option>
                                                            <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                                            <option value="M79.7 Fibromyalgia">M79.7 Fibromyalgia
                                                            </option>
                                                            <option value="M72.8 Fascitis">M72.8 Fascitis</option>
                                                            <option value="M25.2 Limb cramp or spasm">M25.2 Limb cramp
                                                                or spasm</option>
                                                            <option
                                                                value="M62.40 Muscle contracture (neck, thoracic, lumbar)">
                                                                M62.40
                                                                Muscle contracture (neck, thoracic, lumbar)</option>
                                                            <option
                                                                value="M25.50 Unspecified Joint(s) tender/painful (NK/MBLB)">
                                                                M25.50
                                                                Unspecified Joint(s) tender/painful (NK/MBLB)</option>
                                                            <option
                                                                value="M25.60 Joint(s) stiff (next, thoracic, lumbar)">
                                                                M25.60
                                                                Joint(s) stiff (next, thoracic, lumbar)</option>
                                                            <option value="M35.7 Hypermobility syndrome">M35.7
                                                                Hypermobility syndrome
                                                            </option>
                                                            <option
                                                                value="M81.0 Age related osteoporosis w/o pathological fracture">
                                                                M81.0 Age related osteoporosis w/o pathological fracture
                                                            </option>
                                                            <option
                                                                value="M99.05 Segmental and comatic dysfunction of pelvic region">
                                                                M99.05 Segmental and comatic dysfunction of pelvic
                                                                region</option>
                                                            <option value="R20.1 Hypoesthesia of skin">R20.1
                                                                Hypoesthesia of skin
                                                            </option>
                                                            <option value="R20.2 Spin parethesia">R20.2 Spin parethesia
                                                            </option>
                                                            <option value="R20.3 Hyperesthesia of skin">R20.3
                                                                Hyperesthesia of skin
                                                            </option>
                                                            <option value="R26.81 Unsteady on feet">R26.81 Unsteady on
                                                                feet</option>
                                                            <option value="R26.2 Difficulty Walking">R26.2 Difficulty
                                                                Walking</option>
                                                        </select></div>
                                                    <div id="addcodediv1" style="display:none;">
                                                        <table width="300" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="200"><input id="dxcodeadd1" name="dxcodeadd1"
                                                                        style="width:200px" value=""></td>
                                                                <td align="center" width="40"><img
                                                                        src="nlimages/delete.png" width="15" height="15"
                                                                        onclick="hideadd('1','');"></td>
                                                                <td width="60" align="right"><a href="#">Manage</a></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                                <td bgcolor="#f1f1f1" width="59%">
                                                    <input type="hidden" name="showpointersA" id="showpointersA">
                                                    <div id="showpointerdivA"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="border-left:1px solid black;padding:5px;">
                                        <div id="showunits0"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellpadding="5" width="100%">
                                            <tr>
                                                <td width="6%" align="center"><b>B</b></td>
                                                <td width="15%"><select name="dxcategory2" id="dx2"
                                                        onchange="populateselect('2');exampopulate();">
                                                        <option value=""></option>
                                                        <option value="cervical">Cervical</option>
                                                        <option value="thoracic">Thoracic</option>
                                                        <option value="lumbar">Lumbar/SI</option>
                                                        <option value="pelvis">Pelvis Sacrum Coccyx</option>
                                                        <option value="generalspinal">General Spinal</option>
                                                        <option value="upperextremity">Upper Extremity</option>
                                                        <option value="lowerextremity">Lower Extremity</option>
                                                        <option value="headache">Headache</option>
                                                        <option value="general">General</option>
                                                    </select></td>
                                                <td width="20%">
                                                    <div id="dxcodedefault2" style="display:block;"><select
                                                            style="width:300px;">
                                                            <option value="" selected>Select a category for codes
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodecervical2" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectcervical2"
                                                            name="dxcodecervical2" style="width:260px"
                                                            onchange="selectte('cervical','2','B');checkadd('2','cervical');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="G54.0 Brachial Plexus disorders">G54.0
                                                                Brachial Plexus
                                                                disorders</option>
                                                            <option value="G54.2 Cervical root disorders">G54.2 Cervical
                                                                root disorders
                                                            </option>
                                                            <option value="M40.292 Cervical kyphosis, other">M40.292
                                                                Cervical kyphosis,
                                                                other</option>
                                                            <option value="M43.12 Sponylolisthesis, cervical region">
                                                                M43.12
                                                                Sponylolisthesis, cervical region</option>
                                                            <option value="M43.6 Torticollis">M43.6 Torticollis</option>
                                                            <option value="M46.02 Spinal enthesopathy, cervical region">
                                                                M46.02 Spinal
                                                                enthesopathy, cervical region</option>
                                                            <option
                                                                value="M47.12 Spondylosis w/out myelopathy, cervical region">
                                                                M47.12
                                                                Spondylosis w/out myelopathy, cervical region</option>
                                                            <option
                                                                value="M48.02 Spinal Stenosis, cervical region (C3-C7)">
                                                                M48.02
                                                                Spinal Stenosis, cervical region (C3-C7)</option>
                                                            <option
                                                                value="M48.32 Traumatic spondylopathy, cervical region">
                                                                M48.32
                                                                Traumatic spondylopathy, cervical region</option>
                                                            <option value="M50.01 IVD disorder w/ myelopathy Cervical">
                                                                M50.01 IVD
                                                                disorder w/ myelopathy Cervical</option>
                                                            <option
                                                                value="M50.12 Cervical disc disorder w/ radiculopathy">
                                                                M50.12
                                                                Cervical disc disorder w/ radiculopathy</option>
                                                            <option value="M50.20 Cervical disc displacement">M50.20
                                                                Cervical disc
                                                                displacement</option>
                                                            <option value="M50.30 Cervical disc disgnereation">M50.30
                                                                Cervical disc
                                                                disgnereation</option>
                                                            <option value="M50.90 Cervical disc disorder">M50.90
                                                                Cervical disc disorder
                                                            </option>
                                                            <option value="M53.0 Cervicocranial syndrome">M53.0
                                                                Cervicocranial syndrome
                                                            </option>
                                                            <option value="M53.1 Cervicobrachial syndrome">M53.1
                                                                Cervicobrachial
                                                                syndrome</option>
                                                            <option value="M54.12 Radiculopathy, cervical region">M54.12
                                                                Radiculopathy,
                                                                cervical region</option>
                                                            <option value="M54.2 Cervicalgia">M54.2 Cervicalgia</option>
                                                            <option value="M62.838 Muscle spasm, other">M62.838 Muscle
                                                                spasm, other
                                                            </option>
                                                            <option value="S13.4XXA Cervical sprain">S13.4XXA Cervical
                                                                sprain</option>
                                                            <option value="S14.2XXA Nerve root injury, cervical">
                                                                S14.2XXA Nerve root
                                                                injury, cervical</option>
                                                            <option value="S143.XXA Brachial plexus injury">S143.XXA
                                                                Brachial plexus
                                                                injury</option>
                                                            <option value="S16.1XXA Strain, Neck muscles">S16.1XXA
                                                                Strain, Neck muscles
                                                            </option>
                                                            <option
                                                                value="M99.00 Segmental Somatic Dysfunction Occiptal-Head">
                                                                M99.00
                                                                Segmental Somatic Dysfunction Occiptal-Head</option>
                                                            <option
                                                                value="M99.01 Segmental Somatic Dysfunction of Cervical Region">
                                                                M99.01 Segmental Somatic Dysfunction of Cervical Region
                                                            </option>
                                                            <option
                                                                value="S13.4XXA Spain of ligaments of cervical spine, initial encounter">
                                                                S13.4XXA Spain of ligaments of cervical spine, initial
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S16.1XXA Strain of muscle, fascia and tendon at next level, initial encounter">
                                                                S16.1XXA Strain of muscle, fascia and tendon at next
                                                                level, initial
                                                                encounter</option>
                                                            <option
                                                                value="S14.2XXA Injury nerve root cervical, initial encounter">
                                                                S14.2XXA Injury nerve root cervical, initial encounter
                                                            </option>
                                                            <option value="G54.1 Nerve root lesion cervical">G54.1 Nerve
                                                                root lesion
                                                                cervical</option>
                                                            <option
                                                                value="M50.33 Disc degeneration cervicothoracic region">
                                                                M50.33 Disc
                                                                degeneration cervicothoracic region</option>
                                                            <option value="M50.22 Cervical disc displacement C3-C7">
                                                                M50.22 Cervical disc
                                                                displacement C3-C7</option>
                                                            <option value="M50.23 Cervical disc displacement C7-T1">
                                                                M50.23 Cervical disc
                                                                displacement C7-T1</option>
                                                            <option value="M50.31 Cervical disc degeneration C2-C4">
                                                                M50.31 Cervical disc
                                                                degeneration C2-C4</option>
                                                            <option value="M50.32 Cervical disc degeneration C3-C7">
                                                                M50.32 Cervical disc
                                                                degeneration C3-C7</option>
                                                            <option value="M50.33 Cervical disc degeneration C7-T1">
                                                                M50.33 Cervical disc
                                                                degeneration C7-T1</option>
                                                            <option value="M53.2X2 Cervical spine instabilities">M53.2X2
                                                                Cervical spine
                                                                instabilities</option>
                                                            <option value="M40.202 Kyphosis unspecified cervical">
                                                                M40.202 Kyphosis
                                                                unspecified cervical</option>
                                                            <option value="S13.4XXS Sequela sprain neck ligaments">
                                                                S13.4XXS Sequela
                                                                sprain neck ligaments</option>
                                                            <option
                                                                value="M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial region">
                                                                M50.11 Cervical disc disorder with radiculopathy,
                                                                occipito-atlanto-axial
                                                                region</option>
                                                            <option
                                                                value="M50.12 Cervical disc disorder with radiculopathy, mid-cervical region">
                                                                M50.12 Cervical disc disorder with radiculopathy,
                                                                mid-cervical region
                                                            </option>
                                                            <option
                                                                value="M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region">
                                                                M50.13 Cervical disc disorder with radiculopathy,
                                                                cervicothoracic region
                                                            </option>
                                                            <option
                                                                value="M50.31 Other cervical disc degeneration, occipito-atlanto-axial region">
                                                                M50.31 Other cervical disc degeneration,
                                                                occipito-atlanto-axial region
                                                            </option>
                                                            <option
                                                                value="M50.32 Other cervical disc degeneration, mid-cervical region">
                                                                M50.32 Other cervical disc degeneration, mid-cervical
                                                                region</option>
                                                            <option
                                                                value="M50.33 Other cervical disc degeneration, cervicothoracic region">
                                                                M50.33 Other cervical disc degeneration, cervicothoracic
                                                                region</option>
                                                        </select></div>
                                                    <div id="dxcodethoracic2" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectthoracic2"
                                                            name="dxcodethoracic2" style="width:260px"
                                                            onchange="selectte('thoracic','2','B');checkadd('2','thoracic');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M99.02 Segmental dysf./Sublux, thoracic">
                                                                M99.02 Segmental
                                                                dysf./Sublux, thoracic</option>
                                                            <option value="G54.3 Thoracic root disorders">G54.3 Thoracic
                                                                root disorders
                                                            </option>
                                                            <option value="M43.14 Spondylolistesis, thoracic region">
                                                                M43.14
                                                                Spondylolistesis, thoracic region</option>
                                                            <option value="M46.04 Spinal enthesopathy, thoracic region">
                                                                M46.04 Spinal
                                                                enthesopathy, thoracic region</option>
                                                            <option
                                                                value="M47.24 Spondylosis w/ radiculopathy, thoracic region">
                                                                M47.24
                                                                Spondylosis w/ radiculopathy, thoracic region</option>
                                                            <option
                                                                value="M47.814 Spondylosis w/out mwelopathy, thoracic">
                                                                M47.814
                                                                Spondylosis w/out mwelopathy, thoracic</option>
                                                            <option
                                                                value="M48.04 Spinal stenosis, thoracic region (T1-G12)">
                                                                M48.04
                                                                Spinal stenosis, thoracic region (T1-G12)</option>
                                                            <option
                                                                value="M51.34 Intervertebral disc degeneration, thoracic region">
                                                                M51.34 Intervertebral disc degeneration, thoracic region
                                                            </option>
                                                            <option value="M51.84 IVD Thoracic">M51.84 IVD Thoracic
                                                            </option>
                                                            <option value="M54.14 Radiculopathy, thoracic">M54.14
                                                                Radiculopathy,
                                                                thoracic</option>
                                                            <option value="M54.6 Pain in thoracic spine">M54.6 Pain in
                                                                thoracic spine
                                                            </option>
                                                            <option value="S23.3XXA Thoracic spine">S23.3XXA Thoracic
                                                                spine</option>
                                                            <option value="S24.2XXA Nerve root injury, thoracic">
                                                                S24.2XXA Nerve root
                                                                injury, thoracic</option>
                                                            <option value="MS4.6 Pain in Thoracic spine">MS4.6 Pain in
                                                                Thoracic spine
                                                            </option>
                                                            <option
                                                                value="M99.02 Segmental and somatic dysfunction of the thoracic region">
                                                                M99.02 Segmental and somatic dysfunction of the thoracic
                                                                region</option>
                                                            <option
                                                                value="M99.08 Segmental and somatic dysfunction of rib cage">
                                                                M99.08
                                                                Segmental and somatic dysfunction of rib cage</option>
                                                            <option
                                                                value="S23.3XXA Sprain of ligaments of thoracic spine, initial encounter">
                                                                S23.3XXA Sprain of ligaments of thoracic spine, initial
                                                                encounter
                                                            </option>
                                                            <option value="S23.41XA Sprain of ribs, initial encounter">
                                                                S23.41XA Sprain
                                                                of ribs, initial encounter</option>
                                                            <option
                                                                value="S23.421A Sprain of chrondrosternal joint, initial encounter">
                                                                S23.421A Sprain of chrondrosternal joint, initial
                                                                encounter</option>
                                                            <option
                                                                value="M51.14 Intervertebral disc disorders with radiculopathy, thoracic region">
                                                                M51.14 Intervertebral disc disorders with radiculopathy,
                                                                thoracic region
                                                            </option>
                                                            <option
                                                                value="M53.84 Other specified dorsopathies, thoracic region">
                                                                M53.84
                                                                Other specified dorsopathies, thoracic region</option>
                                                            <option
                                                                value="M41.114 Juvenile idiopathic scoliosis, thoracic region">
                                                                M41.114 Juvenile idiopathic scoliosis, thoracic region
                                                            </option>
                                                            <option
                                                                value="M41.124 Adolescent idiopathic scoliosis, thoracic region">
                                                                M41.124 Adolescent idiopathic scoliosis, thoracic region
                                                            </option>
                                                            <option
                                                                value="M41.44 Neuromuscular scoliosis, thoracic region">
                                                                M41.44
                                                                Neuromuscular scoliosis, thoracic region</option>
                                                            <option value="M40.00 Kyphosis postural acquired">M40.00
                                                                Kyphosis postural
                                                                acquired</option>
                                                            <option value="M40.04 Postural kyphosis thoracic">M40.04
                                                                Postural kyphosis
                                                                thoracic</option>
                                                            <option value="M40.03 Cervicothoracic">M40.03
                                                                Cervicothoracic</option>
                                                            <option
                                                                value="S29.012A Strain muscle-tendon back wall thorax acute">
                                                                S29.012A Strain muscle-tendon back wall thorax acute
                                                            </option>
                                                            <option value="G43.3 Nerve root disorder-thoracic">G43.3
                                                                Nerve root
                                                                disorder-thoracic</option>
                                                            <option
                                                                value="M53.2X4 Spinal instabilities thoracic region">
                                                                M53.2X4 Spinal
                                                                instabilities thoracic region</option>
                                                        </select></div>
                                                    <div id="dxcodelumbar2" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectlumbar2"
                                                            name="dxcodelumbar2" style="width:260px"
                                                            onchange="selectte('lumbar','2','B');checkadd('2','lumbar');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="G54.1 Lumbosacral plexus disorders">G54.1
                                                                Lumbosacral plexus
                                                                disorders</option>
                                                            <option value="G54.4 Lumbosacral root disorders">G54.4
                                                                Lumbosacral root
                                                                disorders</option>
                                                            <option value="M43.16 Spondylolisthesis, lumbar region">
                                                                M43.16
                                                                Spondylolisthesis, lumbar region</option>
                                                            <option value="M46.06 Spinal enthesopathy, lumbar region">
                                                                M46.06 Spinal
                                                                enthesopathy, lumbar region</option>
                                                            <option value="M47.896 Spondylosis, lumbar region">M47.896
                                                                Spondylosis,
                                                                lumbar region</option>
                                                            <option value="M51.06 IVD Disorder w/myelopathy lumbar">
                                                                M51.06 IVD Disorder
                                                                w/myelopathy lumbar</option>
                                                            <option
                                                                value="M51.26 Intervertebral disc displacement, lumbar">
                                                                M51.26
                                                                Intervertebral disc displacement, lumbar</option>
                                                            <option
                                                                value="M51.36 Intervertebral disc degeneration, lumbar">
                                                                M51.36
                                                                Intervertebral disc degeneration, lumbar</option>
                                                            <option value="M54.08 Lumbar facet syndrome">M54.08 Lumbar
                                                                facet syndrome
                                                            </option>
                                                            <option value="M54.16 Low back pain">M54.16 Low back pain
                                                            </option>
                                                            <option value="S33.5XXA Lumbar spine strain">S33.5XXA Lumbar
                                                                spine strain
                                                            </option>
                                                            <option value="M54.5 Low back pain">M54.5 Low back pain
                                                            </option>
                                                            <option
                                                                value="M99.03 Segmental and somatic dysfunction of lumbar region">
                                                                M99.03 Segmental and somatic dysfunction of lumbar
                                                                region</option>
                                                            <option
                                                                value="M99.04 Segmental and somatic dysfunction of sacral region">
                                                                M99.04 Segmental and somatic dysfunction of sacral
                                                                region</option>
                                                            <option
                                                                value="S33.5XXA Sprain of ligaments of lumbar spine, initial encounter">
                                                                S33.5XXA Sprain of ligaments of lumbar spine, initial
                                                                encounter</option>
                                                            <option
                                                                value="S33.6XXA Sprain of sacroiliac joint, inital encounter">
                                                                S33.6XXA Sprain of sacroiliac joint, inital encounter
                                                            </option>
                                                            <option
                                                                value="S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter">
                                                                S33.8XXA Sprain of other parts of lumbar spine and
                                                                pelvis, initial
                                                                encounter</option>
                                                            <option
                                                                value="S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial encounter">
                                                                S39.9XXA Sprain of unspecified parts of the lumbar spine
                                                                and pelvis,
                                                                initial encounter</option>
                                                            <option
                                                                value="S39.012A Strain of muscle, fascia and tendon of lower back, initial encounter">
                                                                S39.012A Strain of muscle, fascia and tendon of lower
                                                                back, initial
                                                                encounter</option>
                                                            <option
                                                                value="M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar region">
                                                                M51.15 Intervertebral disc disorders with radiculopathy,
                                                                thoracolumbar
                                                                region</option>
                                                            <option
                                                                value="M51.16 Intervertebral disc disorders with radiculopathy, lumbar region">
                                                                M51.16 Intervertebral disc disorders with radiculopathy,
                                                                lumbar region
                                                            </option>
                                                            <option
                                                                value="M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region">
                                                                M51.17 Intervertebral disc disorders with radiculopathy,
                                                                lumbosacral
                                                                region</option>
                                                            <option
                                                                value="M51.36 Other intervertebral disc degeneration, lumbar region">
                                                                M51.36 Other intervertebral disc degeneration, lumbar
                                                                region</option>
                                                            <option
                                                                value="M51.37 Other intervertebral disc degeneration, lumbosacral region">
                                                                M51.37 Other intervertebral disc degeneration,
                                                                lumbosacral region
                                                            </option>
                                                            <option
                                                                value="M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region">
                                                                M47.816 Spondylosis without myelopathy or radiculopathy,
                                                                lumbar region
                                                            </option>
                                                            <option
                                                                value="M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region">
                                                                M47.817 Spondyloses without myelopathy or radiculopathy,
                                                                lumboscral
                                                                region</option>
                                                            <option value="M54.31 Sciatica, right side">M54.31 Sciatica,
                                                                right side
                                                            </option>
                                                            <option value="M54.32 Sciatica, left side">M54.32 Sciatica,
                                                                left side
                                                            </option>
                                                            <option value="M99.03 Segmental Somatic dysfunction Lumbar">
                                                                M99.03 Segmental
                                                                Somatic dysfunction Lumbar</option>
                                                            <option
                                                                value="M99.04 Segmental Somatic dysfunction SI. Sacrum">
                                                                M99.04
                                                                Segmental Somatic dysfunction SI. Sacrum</option>
                                                            <option value="M54.41 Lumbago with sciatica, right side">
                                                                M54.41 Lumbago with
                                                                sciatica, right side</option>
                                                            <option value="M54.42 Lumbago with sciatica, left side">
                                                                M54.42 Lumbago with
                                                                sciatica, left side</option>
                                                            <option value="M54.16 Radiculopathy, lumbar region">M54.16
                                                                Radiculopathy,
                                                                lumbar region</option>
                                                            <option value="M54.17 Radiculopathy, lumboscral region">
                                                                M54.17
                                                                Radiculopathy, lumboscral region</option>
                                                            <option
                                                                value="M53.3 Sacrococcygeal disorders, not elsewhere classified">
                                                                M53.3 Sacrococcygeal disorders, not elsewhere classified
                                                            </option>
                                                            <option
                                                                value="M53.85 Other specified dorsopathies, thoracolumbar region">
                                                                M53.85 Other specified dorsopathies, thoracolumbar
                                                                region</option>
                                                            <option
                                                                value="M53.86 Other specified dorsopathies, lumbar region">
                                                                M53.86
                                                                Other specified dorsopathies, lumbar region</option>
                                                            <option value="M48.06 Spinal stenosis, lumbar region">M48.06
                                                                Spinal
                                                                stenosis, lumbar region</option>
                                                            <option
                                                                value="M41.115 Juvenile idiopathic scoliosis, thoracolumbar region">
                                                                M41.115 Juvenile idiopathic scoliosis, thoracolumbar
                                                                region</option>
                                                            <option
                                                                value="M41.116 Juvenile idiopathic scoliosis, lumbar region">
                                                                M41.116
                                                                Juvenile idiopathic scoliosis, lumbar region</option>
                                                            <option
                                                                value="M41.127 Adolescent idiopathic scoliosis, lumbosacral region">
                                                                M41.127 Adolescent idiopathic scoliosis, lumbosacral
                                                                region</option>
                                                            <option
                                                                value="M41.45 Neuromuscular scoliosis, thoracolumbar region">
                                                                M41.45
                                                                Neuromuscular scoliosis, thoracolumbar region</option>
                                                            <option
                                                                value="M41.46 Neuromuscular scoliosis, lumbar region">
                                                                M41.46
                                                                Neuromuscular scoliosis, lumbar region</option>
                                                            <option
                                                                value="M41.47 Neuromuscular scoliosis, lumbosacral region">
                                                                M41.47
                                                                Neuromuscular scoliosis, lumbosacral region</option>
                                                            <option
                                                                value="M51.26 Intervertebral disc displacement Lumbar L2-L5">
                                                                M51.26
                                                                Intervertebral disc displacement Lumbar L2-L5</option>
                                                            <option
                                                                value="M51.27 Intervertebral disc displacement L5-S1">
                                                                M51.27
                                                                Intervertebral disc displacement L5-S1</option>
                                                            <option value="M51.36 Degeneration Lumbar Disc L2-L5">M51.36
                                                                Degeneration
                                                                Lumbar Disc L2-L5</option>
                                                            <option value="M51.37 Degeneration Lumbarsacral Disc L5-S1">
                                                                M51.37
                                                                Degeneration Lumbarsacral Disc L5-S1</option>
                                                            <option value="M46.1 Sacroilitis">M46.1 Sacroilitis</option>
                                                            <option
                                                                value="M53.2X7 Spinal instabilities lumbosacral region">
                                                                M53.2X7
                                                                Spinal instabilities lumbosacral region</option>
                                                            <option value="M53.2X6 Spinal instabilities lumbar spine">
                                                                M53.2X6 Spinal
                                                                instabilities lumbar spine</option>
                                                        </select></div>
                                                    <div id="dxcodepelvis2" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectpelvis2"
                                                            name="dxcodepelvis2" style="width:260px"
                                                            onchange="selectte('pelvis','2','B');checkadd('2','pelvis');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M99.04 Segmental dysf/Sublux, sacral">M99.04
                                                                Segmental
                                                                dysf/Sublux, sacral</option>
                                                            <option value="M99.05 Segmental dysf/Sublux, pelvic">M99.05
                                                                Segmental
                                                                dysf/Sublux, pelvic</option>
                                                            <option value="M43.08 Spondylosis, sacral region">M43.08
                                                                Spondylosis, sacral
                                                                region</option>
                                                            <option value="M54.31 Sciatica, right side">M54.31 Sciatica,
                                                                right side
                                                            </option>
                                                            <option value="M54.32 Sciatica, left side">M54.32 Sciatica,
                                                                left side
                                                            </option>
                                                            <option value="S33.6 Sprain SI joint">S33.6 Sprain SI joint
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodegeneralspinal2" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectgeneralspinal2"
                                                            name="dxcodegeneralspinal2" style="width:260px"
                                                            onchange="selectte('generalspinal','2','B');checkadd('2','generalspinal');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="Q67.5 Scliosis, congenital">Q67.5 Scliosis,
                                                                congenital
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodeupperextremity2" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectupperextremity2"
                                                            name="dxcodeupperextremity2" style="width:260px"
                                                            onchange="selectte('upperextremity','2','B');checkadd('2','upperextremity');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M77.11 Lateral epicondylitis, right elbow">
                                                                M77.11 Lateral
                                                                epicondylitis, right elbow</option>
                                                            <option value="M77.12 Lateral epicondylitis, left elbow">
                                                                M77.12 Lateral
                                                                epicondylitis, left elbow</option>
                                                            <option
                                                                value="M99.07 Segmental and somatic dysfunction of upper extremity">
                                                                M99.07 Segmental and somatic dysfunction of upper
                                                                extremity</option>
                                                            <option
                                                                value="G56.01 Carpal tunnel syndrome, right upper limb">
                                                                G56.01
                                                                Carpal tunnel syndrome, right upper limb</option>
                                                            <option
                                                                value="G56.02 Carpal tunnel syndrome, left upper limb">
                                                                G56.02 Carpal
                                                                tunnel syndrome, left upper limb</option>
                                                            <option value="M75.0 Adhesive capsulitis of shoulder">M75.0
                                                                Adhesive
                                                                capsulitis of shoulder</option>
                                                            <option
                                                                value="M75.01 Adhesive capsulitis of right shoulder">
                                                                M75.01 Adhesive
                                                                capsulitis of right shoulder</option>
                                                            <option value="M75.02 Adhesive capsulitis of left shoulder">
                                                                M75.02 Adhesive
                                                                capsulitis of left shoulder</option>
                                                            <option value="M75.100 Unspec Rotator Cuff tear/rupture">
                                                                M75.100 Unspec
                                                                Rotator Cuff tear/rupture</option>
                                                            <option
                                                                value="M75.101 Unspec Rotator Cuff tear/rupture right shoulder">
                                                                M75.101 Unspec Rotator Cuff tear/rupture right shoulder
                                                            </option>
                                                            <option
                                                                value="M75.102 Unspec Rotator Cuff tear/rupture left shoulder">
                                                                M75.102 Unspec Rotator Cuff tear/rupture left shoulder
                                                            </option>
                                                            <option
                                                                value="M75.21 Bicipital tenosynovitis Right shoulder">
                                                                M75.21
                                                                Bicipital tenosynovitis Right shoulder</option>
                                                            <option
                                                                value="M75.22 Bicipital tenosynovitis Left shoulder">
                                                                M75.22
                                                                Bicipital tenosynovitis Left shoulder</option>
                                                            <option
                                                                value="M75.41 Impingement syndrome of Right shoulder">
                                                                M75.41
                                                                Impingement syndrome of Right shoulder</option>
                                                            <option
                                                                value="M75.42 Impingement syndrome of Left shoulder">
                                                                M75.42
                                                                Impingement syndrome of Left shoulder</option>
                                                            <option value="M75.5 Bursitis of shoulder">M75.5 Bursitis of
                                                                shoulder
                                                            </option>
                                                            <option value="M75.51 Bursitis of right shoulder">M75.51
                                                                Bursitis of right
                                                                shoulder</option>
                                                            <option value="M75.52 Bursitis of left shoulder">M75.52
                                                                Bursitis of left
                                                                shoulder</option>
                                                            <option value="M77.01 Medial epicondylitis, right elbow">
                                                                M77.01 Medial
                                                                epicondylitis, right elbow</option>
                                                            <option value="M77.02 Medial epicondylitis, left elbow">
                                                                M77.02 Medial
                                                                epicondylitis, left elbow</option>
                                                            <option value="M77.11 Lateral epicondylitis, right elbow">
                                                                M77.11 Lateral
                                                                epicondylitis, right elbow</option>
                                                            <option value="M77.12 Lateral epicondylitis, left elbow">
                                                                M77.12 Lateral
                                                                epicondylitis, left elbow</option>
                                                            <option
                                                                value="S43.51XA Sprain of right acromioclavicular joint, initial encounter">
                                                                S43.51XA Sprain of right acromioclavicular joint,
                                                                initial encounter
                                                            </option>
                                                            <option
                                                                value="S43.52XA Sprain of left acromioclavicular joint, initial encounter">
                                                                S43.52XA Sprain of left acromioclavicular joint, initial
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S43.411A Sprain of right coracohumeral (ligament), inital encounter">
                                                                S43.411A Sprain of right coracohumeral (ligament),
                                                                inital encounter
                                                            </option>
                                                            <option
                                                                value="S43.412A Sprain of left coracohumeral (ligament), inital encounter">
                                                                S43.412A Sprain of left coracohumeral (ligament), inital
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S43.421A Sprain of right rotator cuff capsule, initial encounter">
                                                                S43.421A Sprain of right rotator cuff capsule, initial
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S43.422A Sprain of left rotator cuff capsule, initial encounter">
                                                                S43.422A Sprain of left rotator cuff capsule, initial
                                                                encounter</option>
                                                            <option
                                                                value="S43.911A Right shoulder strain unspecified muscles, Acute">
                                                                S43.911A Right shoulder strain unspecified muscles,
                                                                Acute</option>
                                                            <option
                                                                value="S43.912A Left shoulder strain unspecified muscles, Acute">
                                                                S43.912A Left shoulder strain unspecified muscles, Acute
                                                            </option>
                                                            <option
                                                                value="S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right shoulder, initial">
                                                                S46.011A Strain of muscle(s) and tendon(s) of the
                                                                rotator cuff of right
                                                                shoulder, initial</option>
                                                            <option
                                                                value="S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left shoulder, initial">
                                                                S46.012A Strain of muscle(s) and tendon(s) of the
                                                                rotator cuff of left
                                                                shoulder, initial</option>
                                                            <option
                                                                value="S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of right shoulder">
                                                                S46.091A Other injury of muscle(s) and Tendon(s) of the
                                                                rotator cuff of
                                                                right shoulder</option>
                                                            <option
                                                                value="S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left shoulder">
                                                                S46.092A Other injury of muscle(s) and Tendon(s) of the
                                                                rotator cuff of
                                                                left shoulder</option>
                                                            <option
                                                                value="S46.811A Srain of other muscles, fascia and tendons at shoulder and upper arm level, right arm, initial encounter">
                                                                S46.811A Srain of other muscles, fascia and tendons at
                                                                shoulder and
                                                                upper arm level, right arm, initial encounter</option>
                                                            <option
                                                                value="S46.812A Srain of other muscles, fascia and tendons at shoulder and upper arm level, left arm, initial encounter">
                                                                S46.812A Srain of other muscles, fascia and tendons at
                                                                shoulder and
                                                                upper arm level, left arm, initial encounter</option>
                                                            <option value="M75.00 Frozen shoulder">M75.00 Frozen
                                                                shoulder</option>
                                                            <option value="M25.511 Pain in right shoulder">M25.511 Pain
                                                                in right
                                                                shoulder</option>
                                                            <option value="M25.512 Pain in left shoulder">M25.512 Pain
                                                                in left shoulder
                                                            </option>
                                                            <option value="M25.521 Pain in right elbow">M25.521 Pain in
                                                                right elbow
                                                            </option>
                                                            <option value="M25.522 Pain in left elbow">M25.522 Pain in
                                                                left elbow
                                                            </option>
                                                            <option value="M25.531 Pain in right wrist">M25.531 Pain in
                                                                right wrist
                                                            </option>
                                                            <option value="M25.32 Pain in left wrist">M25.32 Pain in
                                                                left wrist</option>
                                                            <option value="M79.601 Pain in right arm">M79.601 Pain in
                                                                right arm</option>
                                                            <option value="M79.602 Pain in left arm">M79.602 Pain in
                                                                left arm</option>
                                                            <option value="M79.621 Pain in right upper arm">M79.621 Pain
                                                                in right upper
                                                                arm</option>
                                                            <option value="M79.622 Pain in left upper arm">M79.622 Pain
                                                                in left upper
                                                                arm</option>
                                                            <option value="M79.631 Pain in right forearm">M79.631 Pain
                                                                in right forearm
                                                            </option>
                                                            <option value="M79.632 Pain in left forearm">M79.632 Pain in
                                                                left forearm
                                                            </option>
                                                            <option value="M79.641 Pain in right hand">M79.641 Pain in
                                                                right hand
                                                            </option>
                                                            <option value="M79.642 Pain in left hand">M79.642 Pain in
                                                                left hand</option>
                                                            <option value="M79.644 Pain in right finger(s)">M79.644 Pain
                                                                in right
                                                                finger(s)</option>
                                                            <option value="M79.645 Pain in left finger(s)">M79.645 Pain
                                                                in left
                                                                finger(s)</option>
                                                            <option value="M25.619 Stiffness of unspec. shoulder">
                                                                M25.619 Stiffness of
                                                                unspec. shoulder</option>
                                                            <option value="M89.519 Osteolysis of shoulder">M89.519
                                                                Osteolysis of
                                                                shoulder</option>
                                                            <option value="M93.919 Osteochondropathy of shoulder">
                                                                M93.919
                                                                Osteochondropathy of shoulder</option>
                                                            <option value="M60.819 Myositis of shoulder">M60.819
                                                                Myositis of shoulder
                                                            </option>
                                                            <option value="M67.419 Ganglion cyst of shoulder">M67.419
                                                                Ganglion cyst of
                                                                shoulder</option>
                                                            <option value="M25.019 Hamarthrosis of shoulder">M25.019
                                                                Hamarthrosis of
                                                                shoulder</option>
                                                            <option value="M25.719 Bone spur-osteophyte of shoulder">
                                                                M25.719 Bone
                                                                spur-osteophyte of shoulder</option>
                                                            <option value="M75.81 Tendinitis of right shoulder">M75.81
                                                                Tendinitis of
                                                                right shoulder</option>
                                                            <option value="M75.82 Tendinitis of left shoulder">M75.82
                                                                Tendinitis of left
                                                                shoulder</option>
                                                            <option value="M13.119 Monoarthritis of shoulder region">
                                                                M13.119
                                                                Monoarthritis of shoulder region</option>
                                                            <option value="S53.031S Nursemaid's Elbow, right elbow">
                                                                S53.031S Nursemaid's
                                                                Elbow, right elbow</option>
                                                            <option value="S53.032S Nursemaid's Elbow, left elbow">
                                                                S53.032S Nursemaid's
                                                                Elbow, left elbow</option>
                                                            <option value="M25.629 Stiffness of unspec. elbow">M25.629
                                                                Stiffness of
                                                                unspec. elbow</option>
                                                            <option value="M25.029 Hemarthrosis of elbow">M25.029
                                                                Hemarthrosis of elbow
                                                            </option>
                                                            <option value="M67.429 Ganglion cyst of elbow">M67.429
                                                                Ganglion cyst of
                                                                elbow</option>
                                                            <option value="M24.629 Ankylosis of elbow">M24.629 Ankylosis
                                                                of elbow
                                                            </option>
                                                            <option value="M25.729 Bone spur of elbow">M25.729 Bone spur
                                                                of elbow
                                                            </option>
                                                            <option value="M19.021 Arthriris of right elbow">M19.021
                                                                Arthriris of right
                                                                elbow</option>
                                                            <option value="M19.022 Arthritis of left elbow">M19.022
                                                                Arthritis of left
                                                                elbow</option>
                                                            <option value="M21.331 Wrist drop, right wrist">M21.331
                                                                Wrist drop, right
                                                                wrist</option>
                                                            <option value="M21.332 Wrist drop, left wrist">M21.332 Wrist
                                                                drop, left
                                                                wrist</option>
                                                            <option value="M25.639 Stiffness of unspec. wrist">M25.639
                                                                Stiffness of
                                                                unspec. wrist</option>
                                                            <option value="M25.039 Hemarthrosis of wrist">M25.039
                                                                Hemarthrosis of wrist
                                                            </option>
                                                            <option value="M67.439 Gangolian cyst of wrist">M67.439
                                                                Gangolian cyst of
                                                                wrist</option>
                                                            <option value="M25.739 Bone spur of wrist">M25.739 Bone spur
                                                                of wrist
                                                            </option>
                                                            <option value="M25.439 Effusion of unspec. wrist">M25.439
                                                                Effusion of
                                                                unspec. wrist</option>
                                                            <option value="M13.139 Monarthritis of unspec. wrist">
                                                                M13.139 Monarthritis
                                                                of unspec. wrist</option>
                                                            <option value="M25.539 Arthralgia of wrist">M25.539
                                                                Arthralgia of wrist
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodelowerextremity2" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectlowerextremity2"
                                                            name="dxcodelowerextremity2" style="width:260px"
                                                            onchange="selectte('lowerextremity','2','B');checkadd('2','lowerextremity');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M72.2 Planter fascitis">M72.2 Planter
                                                                fascitis</option>
                                                            <option value="S93.01XA Subluxation right ankle/foot">
                                                                S93.01XA Subluxation
                                                                right ankle/foot</option>
                                                            <option value="S93.02XA Subluxation left ankle/foot">
                                                                S93.02XA Subluxation
                                                                left ankle/foot</option>
                                                            <option
                                                                value="M99.06 Segmental and somatic dysfunction of lower extremity">
                                                                M99.06 Segmental and somatic dysfunction of lower
                                                                extremity</option>
                                                            <option value="M76.61 Achilles Tendinitis, Right Leg">M76.61
                                                                Achilles
                                                                Tendinitis, Right Leg</option>
                                                            <option value="M76.62 Achilles Tendinitis, Left Leg">M76.62
                                                                Achilles
                                                                Tendinitis, Left Leg</option>
                                                            <option
                                                                value="S73.191A Other sprain of right hip, initial encounter">
                                                                S73.191A Other sprain of right hip, initial encounter
                                                            </option>
                                                            <option
                                                                value="S73.192A Other sprain of left hip, initial encounter">
                                                                S73.192A Other sprain of left hip, initial encounter
                                                            </option>
                                                            <option
                                                                value="S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter">
                                                                S76.011A Strain of muscle, fascia and tendon of right
                                                                hip, initial
                                                                encounter</option>
                                                            <option
                                                                value="S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter">
                                                                S76.012A Strain of muscle, fascia and tendon of left
                                                                hip, initial
                                                                encounter</option>
                                                            <option
                                                                value="S83.91XA Sprain of unspecified site of right knee, initial encounter">
                                                                S83.91XA Sprain of unspecified site of right knee,
                                                                initial encounter
                                                            </option>
                                                            <option
                                                                value="S83.92XA Sprain of unspecified site of left knee, initial encounter">
                                                                S83.92XA Sprain of unspecified site of left knee,
                                                                initial encounter
                                                            </option>
                                                            <option value="M79.604 Pain in right leg">M79.604 Pain in
                                                                right leg</option>
                                                            <option value="M79.605 Pain in left leg">M79.605 Pain in
                                                                left leg</option>
                                                            <option value="M79.651 Pain in right thigh">M79.651 Pain in
                                                                right thigh
                                                            </option>
                                                            <option value="M79.652 Pain in left thigh">M79.652 Pain in
                                                                left thigh
                                                            </option>
                                                            <option value="M79.661 Pain in right lower leg">M79.661 Pain
                                                                in right lower
                                                                leg</option>
                                                            <option value="M79.662 Pain in left lower leg">M79.662 Pain
                                                                in left lower
                                                                leg</option>
                                                            <option value="M79.671 Pain in right foot">M79.671 Pain in
                                                                right foot
                                                            </option>
                                                            <option value="M79.672 Pain in left foot">M79.672 Pain in
                                                                left foot</option>
                                                            <option value="M79.674 Pain in right toes">M79.674 Pain in
                                                                right toes
                                                            </option>
                                                            <option value="M79.675 Pain in left toes">M79.675 Pain in
                                                                left toes</option>
                                                            <option value="M25.551 Pain in right hip">M25.551 Pain in
                                                                right hip</option>
                                                            <option value="M25.552 Pain in left hip">M25.552 Pain in
                                                                left hip</option>
                                                            <option value="M25.561 Pain in right knee">M25.561 Pain in
                                                                right knee
                                                            </option>
                                                            <option value="M25.562 Pain in left knee">M25.562 Pain in
                                                                left knee</option>
                                                            <option value="M25.571 Pain in right ankle">M25.571 Pain in
                                                                right ankle
                                                            </option>
                                                            <option value="M25.572 Pain in left ankle">M25.572 Pain in
                                                                left ankle
                                                            </option>
                                                            <option value="M76.31 Iliotibial band syndrome, right leg">
                                                                M76.31 Iliotibial
                                                                band syndrome, right leg</option>
                                                            <option value="M76.32 Iliotibial band syndrome, left leg">
                                                                M76.32 Iliotibial
                                                                band syndrome, left leg</option>
                                                            <option value="M70.50 Bursitis of unspec. knee">M70.50
                                                                Bursitis of unspec.
                                                                knee</option>
                                                            <option value="M25.069 Hemarthrosis of unspec. knee">M25.069
                                                                Hemarthrosis of
                                                                unspec. knee</option>
                                                            <option value="M94.269 Chondromalacia of unspec. knee">
                                                                M94.269
                                                                Chondromalacia of unspec. knee</option>
                                                            <option value="M67.469 Gangolian cyst of unspec. knee">
                                                                M67.469 Gangolian
                                                                cyst of unspec. knee</option>
                                                            <option value="M25.760 Bone spur of unspec. knee">M25.760
                                                                Bone spur of
                                                                unspec. knee</option>
                                                            <option value="M23.40 Loose body in spec. knee">M23.40 Loose
                                                                body in spec.
                                                                knee</option>
                                                            <option value="M25.669 Stiffness of unspec. knee">M25.669
                                                                Stiffness of
                                                                unspec. knee</option>
                                                            <option value="M70.51 Bursitis of right knee">M70.51
                                                                Bursitis of right knee
                                                            </option>
                                                            <option value="M70.52 Bursitis of left knee">M70.52 Bursitis
                                                                of left knee
                                                            </option>
                                                            <option value="M21.371 Foot drop right foot">M21.371 Foot
                                                                drop right foot
                                                            </option>
                                                            <option value="M21.372 Foot drop left foot">M21.372 Foot
                                                                drop left foot
                                                            </option>
                                                            <option value="Q72.70 Cleft foot-split foot">Q72.70 Cleft
                                                                foot-split foot
                                                            </option>
                                                            <option value="S90.30XA Contusion of foot">S90.30XA
                                                                Contusion of foot
                                                            </option>
                                                            <option value="M25.076 Hemarthrosis of unspec. foot">M25.076
                                                                Hemarthrosis of
                                                                unspec. foot</option>
                                                            <option value="M25.776 Bone spur of foot">M25.776 Bone spur
                                                                of foot</option>
                                                            <option value="T69.021A Immersion of right foot">T69.021A
                                                                Immersion of right
                                                                foot</option>
                                                            <option value="T69.022A Immersion of left foot">T69.022A
                                                                Immersion of left
                                                                foot</option>
                                                        </select></div>
                                                    <div id="dxcodeheadache2" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectheadache2"
                                                            name="dxcodeheadache2" style="width:260px"
                                                            onchange="selectte('headache','2','B');checkadd('2','headache');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="G43.001 Migraine">G43.001 Migraine</option>
                                                            <option value="G44.209 Tension-type headache">G44.209
                                                                Tension-type headache
                                                            </option>
                                                            <option value="G44.89 Headache">G44.89 Headache</option>
                                                            <option value="R42 Dizziness">R42 Dizziness</option>
                                                            <option value="R51 Headache">R51 Headache</option>
                                                            <option
                                                                value="G44.201 Tension-Type Headache, unspecified, intractable">
                                                                G44.201 Tension-Type Headache, unspecified, intractable
                                                            </option>
                                                            <option
                                                                value="G44.209 Tension-Type Headache, unspecified, not intractable">
                                                                G44.209 Tension-Type Headache, unspecified, not
                                                                intractable</option>
                                                            <option
                                                                value="G43.001 Migraine without aura, not intractable, with status migrainosus">
                                                                G43.001 Migraine without aura, not intractable, with
                                                                status migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.009 Migraine without aura, not intractable, without status migrainosus">
                                                                G43.009 Migraine without aura, not intractable, without
                                                                status
                                                                migrainosus</option>
                                                            <option
                                                                value="G43.011 Migraine without aura, intractable, with status migrainosus">
                                                                G43.011 Migraine without aura, intractable, with status
                                                                migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.019 Migraine without aura, intractable, without status migrainosus">
                                                                G43.019 Migraine without aura, intractable, without
                                                                status migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.101 Migraine with aura, not intractable, with status migrainosus">
                                                                G43.101 Migraine with aura, not intractable, with status
                                                                migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.109 Migraine with aura, not intractable, without status migrainosus">
                                                                G43.109 Migraine with aura, not intractable, without
                                                                status migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.111 Migraine with aura, intractable, with status migrainosus">
                                                                G43.111 Migraine with aura, intractable, with status
                                                                migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.119 Migraine with aura, intractable, without status migrainosus">
                                                                G43.119 Migraine with aura, intractable, without status
                                                                migrainosus
                                                            </option>
                                                            <option value="G44.219 Tension Headache episodic">G44.219
                                                                Tension Headache
                                                                episodic</option>
                                                            <option value="G44.229 Tension Headache chronic">G44.229
                                                                Tension Headache
                                                                chronic</option>
                                                            <option value="G44.319 Acute post-traumatic headache">
                                                                G44.319 Acute
                                                                post-traumatic headache</option>
                                                            <option value="G44.329 Chronic post-traumatic headache">
                                                                G44.329 Chronic
                                                                post-traumatic headache</option>
                                                            <option value="S06.0X0A Mild concussion (no loc) acute">
                                                                S06.0X0A Mild
                                                                concussion (no loc) acute</option>
                                                            <option value="S06.0X1A Mild concussion (LOC<30MINS)">
                                                                S06.0X1A Mild
                                                                concussion (LOC<30MINS)< /option>
                                                            <option value="F07.81 Post-Concussion Syndrome">F07.81
                                                                Post-Concussion
                                                                Syndrome</option>
                                                            <option value="H53.8 Blurry Vision">H53.8 Blurry Vision
                                                            </option>
                                                            <option value="H93.19 Tinnitus unspecified">H93.19 Tinnitus
                                                                unspecified
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodegeneral2" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectgeneral2"
                                                            name="dxcodegeneral2" style="width:260px"
                                                            onchange="selectte('general','2','B');checkadd('2','general');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M62.830 Muscle spasm of the back">M62.830
                                                                Muscle spasm of the
                                                                back</option>
                                                            <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                                            <option value="R42 Vertigo, dizziness & giddiness">R42
                                                                Vertigo, dizziness &
                                                                giddiness</option>
                                                            <option value="M62.830 Muscle spasm of back">M62.830 Muscle
                                                                spasm of back
                                                            </option>
                                                            <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                                            <option value="M79.7 Fibromyalgia">M79.7 Fibromyalgia
                                                            </option>
                                                            <option value="M72.8 Fascitis">M72.8 Fascitis</option>
                                                            <option value="M25.2 Limb cramp or spasm">M25.2 Limb cramp
                                                                or spasm</option>
                                                            <option
                                                                value="M62.40 Muscle contracture (neck, thoracic, lumbar)">
                                                                M62.40
                                                                Muscle contracture (neck, thoracic, lumbar)</option>
                                                            <option
                                                                value="M25.50 Unspecified Joint(s) tender/painful (NK/MBLB)">
                                                                M25.50
                                                                Unspecified Joint(s) tender/painful (NK/MBLB)</option>
                                                            <option
                                                                value="M25.60 Joint(s) stiff (next, thoracic, lumbar)">
                                                                M25.60
                                                                Joint(s) stiff (next, thoracic, lumbar)</option>
                                                            <option value="M35.7 Hypermobility syndrome">M35.7
                                                                Hypermobility syndrome
                                                            </option>
                                                            <option
                                                                value="M81.0 Age related osteoporosis w/o pathological fracture">
                                                                M81.0 Age related osteoporosis w/o pathological fracture
                                                            </option>
                                                            <option
                                                                value="M99.05 Segmental and comatic dysfunction of pelvic region">
                                                                M99.05 Segmental and comatic dysfunction of pelvic
                                                                region</option>
                                                            <option value="R20.1 Hypoesthesia of skin">R20.1
                                                                Hypoesthesia of skin
                                                            </option>
                                                            <option value="R20.2 Spin parethesia">R20.2 Spin parethesia
                                                            </option>
                                                            <option value="R20.3 Hyperesthesia of skin">R20.3
                                                                Hyperesthesia of skin
                                                            </option>
                                                            <option value="R26.81 Unsteady on feet">R26.81 Unsteady on
                                                                feet</option>
                                                            <option value="R26.2 Difficulty Walking">R26.2 Difficulty
                                                                Walking</option>
                                                        </select></div>
                                                    <div id="addcodediv2" style="display:none;">
                                                        <table width="300" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="200"><input id="dxcodeadd2" name="dxcodeadd2"
                                                                        style="width:200px" value=""></td>
                                                                <td align="center" width="40"><img
                                                                        src="nlimages/delete.png" width="15" height="15"
                                                                        onclick="hideadd('2','');"></td>
                                                                <td width="60" align="right"><a href="#">Manage</a></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                                <td bgcolor="#f1f1f1" width="59%">
                                                    <input type="hidden" name="showpointersB" id="showpointersB">
                                                    <div id="showpointerdivB"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="border-left:1px solid black;padding:5px;">
                                        <div id="showunits1"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellpadding="5" width="100%">
                                            <tr>
                                                <td width="6%" align="center"><b>C</b></td>
                                                <td width="15%"><select name="dxcategory3" id="dx3"
                                                        onchange="populateselect('3');exampopulate();">
                                                        <option value=""></option>
                                                        <option value="cervical">Cervical</option>
                                                        <option value="thoracic">Thoracic</option>
                                                        <option value="lumbar">Lumbar/SI</option>
                                                        <option value="pelvis">Pelvis Sacrum Coccyx</option>
                                                        <option value="generalspinal">General Spinal</option>
                                                        <option value="upperextremity">Upper Extremity</option>
                                                        <option value="lowerextremity">Lower Extremity</option>
                                                        <option value="headache">Headache</option>
                                                        <option value="general">General</option>
                                                    </select></td>
                                                <td width="20%">
                                                    <div id="dxcodedefault3" style="display:block;"><select
                                                            style="width:300px;">
                                                            <option value="" selected>Select a category for codes
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodecervical3" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectcervical3"
                                                            name="dxcodecervical3" style="width:260px"
                                                            onchange="selectte('cervical','3','C');checkadd('3','cervical');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="G54.0 Brachial Plexus disorders">G54.0
                                                                Brachial Plexus
                                                                disorders</option>
                                                            <option value="G54.2 Cervical root disorders">G54.2 Cervical
                                                                root disorders
                                                            </option>
                                                            <option value="M40.292 Cervical kyphosis, other">M40.292
                                                                Cervical kyphosis,
                                                                other</option>
                                                            <option value="M43.12 Sponylolisthesis, cervical region">
                                                                M43.12
                                                                Sponylolisthesis, cervical region</option>
                                                            <option value="M43.6 Torticollis">M43.6 Torticollis</option>
                                                            <option value="M46.02 Spinal enthesopathy, cervical region">
                                                                M46.02 Spinal
                                                                enthesopathy, cervical region</option>
                                                            <option
                                                                value="M47.12 Spondylosis w/out myelopathy, cervical region">
                                                                M47.12
                                                                Spondylosis w/out myelopathy, cervical region</option>
                                                            <option
                                                                value="M48.02 Spinal Stenosis, cervical region (C3-C7)">
                                                                M48.02
                                                                Spinal Stenosis, cervical region (C3-C7)</option>
                                                            <option
                                                                value="M48.32 Traumatic spondylopathy, cervical region">
                                                                M48.32
                                                                Traumatic spondylopathy, cervical region</option>
                                                            <option value="M50.01 IVD disorder w/ myelopathy Cervical">
                                                                M50.01 IVD
                                                                disorder w/ myelopathy Cervical</option>
                                                            <option
                                                                value="M50.12 Cervical disc disorder w/ radiculopathy">
                                                                M50.12
                                                                Cervical disc disorder w/ radiculopathy</option>
                                                            <option value="M50.20 Cervical disc displacement">M50.20
                                                                Cervical disc
                                                                displacement</option>
                                                            <option value="M50.30 Cervical disc disgnereation">M50.30
                                                                Cervical disc
                                                                disgnereation</option>
                                                            <option value="M50.90 Cervical disc disorder">M50.90
                                                                Cervical disc disorder
                                                            </option>
                                                            <option value="M53.0 Cervicocranial syndrome">M53.0
                                                                Cervicocranial syndrome
                                                            </option>
                                                            <option value="M53.1 Cervicobrachial syndrome">M53.1
                                                                Cervicobrachial
                                                                syndrome</option>
                                                            <option value="M54.12 Radiculopathy, cervical region">M54.12
                                                                Radiculopathy,
                                                                cervical region</option>
                                                            <option value="M54.2 Cervicalgia">M54.2 Cervicalgia</option>
                                                            <option value="M62.838 Muscle spasm, other">M62.838 Muscle
                                                                spasm, other
                                                            </option>
                                                            <option value="S13.4XXA Cervical sprain">S13.4XXA Cervical
                                                                sprain</option>
                                                            <option value="S14.2XXA Nerve root injury, cervical">
                                                                S14.2XXA Nerve root
                                                                injury, cervical</option>
                                                            <option value="S143.XXA Brachial plexus injury">S143.XXA
                                                                Brachial plexus
                                                                injury</option>
                                                            <option value="S16.1XXA Strain, Neck muscles">S16.1XXA
                                                                Strain, Neck muscles
                                                            </option>
                                                            <option
                                                                value="M99.00 Segmental Somatic Dysfunction Occiptal-Head">
                                                                M99.00
                                                                Segmental Somatic Dysfunction Occiptal-Head</option>
                                                            <option
                                                                value="M99.01 Segmental Somatic Dysfunction of Cervical Region">
                                                                M99.01 Segmental Somatic Dysfunction of Cervical Region
                                                            </option>
                                                            <option
                                                                value="S13.4XXA Spain of ligaments of cervical spine, initial encounter">
                                                                S13.4XXA Spain of ligaments of cervical spine, initial
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S16.1XXA Strain of muscle, fascia and tendon at next level, initial encounter">
                                                                S16.1XXA Strain of muscle, fascia and tendon at next
                                                                level, initial
                                                                encounter</option>
                                                            <option
                                                                value="S14.2XXA Injury nerve root cervical, initial encounter">
                                                                S14.2XXA Injury nerve root cervical, initial encounter
                                                            </option>
                                                            <option value="G54.1 Nerve root lesion cervical">G54.1 Nerve
                                                                root lesion
                                                                cervical</option>
                                                            <option
                                                                value="M50.33 Disc degeneration cervicothoracic region">
                                                                M50.33 Disc
                                                                degeneration cervicothoracic region</option>
                                                            <option value="M50.22 Cervical disc displacement C3-C7">
                                                                M50.22 Cervical disc
                                                                displacement C3-C7</option>
                                                            <option value="M50.23 Cervical disc displacement C7-T1">
                                                                M50.23 Cervical disc
                                                                displacement C7-T1</option>
                                                            <option value="M50.31 Cervical disc degeneration C2-C4">
                                                                M50.31 Cervical disc
                                                                degeneration C2-C4</option>
                                                            <option value="M50.32 Cervical disc degeneration C3-C7">
                                                                M50.32 Cervical disc
                                                                degeneration C3-C7</option>
                                                            <option value="M50.33 Cervical disc degeneration C7-T1">
                                                                M50.33 Cervical disc
                                                                degeneration C7-T1</option>
                                                            <option value="M53.2X2 Cervical spine instabilities">M53.2X2
                                                                Cervical spine
                                                                instabilities</option>
                                                            <option value="M40.202 Kyphosis unspecified cervical">
                                                                M40.202 Kyphosis
                                                                unspecified cervical</option>
                                                            <option value="S13.4XXS Sequela sprain neck ligaments">
                                                                S13.4XXS Sequela
                                                                sprain neck ligaments</option>
                                                            <option
                                                                value="M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial region">
                                                                M50.11 Cervical disc disorder with radiculopathy,
                                                                occipito-atlanto-axial
                                                                region</option>
                                                            <option
                                                                value="M50.12 Cervical disc disorder with radiculopathy, mid-cervical region">
                                                                M50.12 Cervical disc disorder with radiculopathy,
                                                                mid-cervical region
                                                            </option>
                                                            <option
                                                                value="M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region">
                                                                M50.13 Cervical disc disorder with radiculopathy,
                                                                cervicothoracic region
                                                            </option>
                                                            <option
                                                                value="M50.31 Other cervical disc degeneration, occipito-atlanto-axial region">
                                                                M50.31 Other cervical disc degeneration,
                                                                occipito-atlanto-axial region
                                                            </option>
                                                            <option
                                                                value="M50.32 Other cervical disc degeneration, mid-cervical region">
                                                                M50.32 Other cervical disc degeneration, mid-cervical
                                                                region</option>
                                                            <option
                                                                value="M50.33 Other cervical disc degeneration, cervicothoracic region">
                                                                M50.33 Other cervical disc degeneration, cervicothoracic
                                                                region</option>
                                                        </select></div>
                                                    <div id="dxcodethoracic3" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectthoracic3"
                                                            name="dxcodethoracic3" style="width:260px"
                                                            onchange="selectte('thoracic','3','C');checkadd('3','thoracic');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M99.02 Segmental dysf./Sublux, thoracic">
                                                                M99.02 Segmental
                                                                dysf./Sublux, thoracic</option>
                                                            <option value="G54.3 Thoracic root disorders">G54.3 Thoracic
                                                                root disorders
                                                            </option>
                                                            <option value="M43.14 Spondylolistesis, thoracic region">
                                                                M43.14
                                                                Spondylolistesis, thoracic region</option>
                                                            <option value="M46.04 Spinal enthesopathy, thoracic region">
                                                                M46.04 Spinal
                                                                enthesopathy, thoracic region</option>
                                                            <option
                                                                value="M47.24 Spondylosis w/ radiculopathy, thoracic region">
                                                                M47.24
                                                                Spondylosis w/ radiculopathy, thoracic region</option>
                                                            <option
                                                                value="M47.814 Spondylosis w/out mwelopathy, thoracic">
                                                                M47.814
                                                                Spondylosis w/out mwelopathy, thoracic</option>
                                                            <option
                                                                value="M48.04 Spinal stenosis, thoracic region (T1-G12)">
                                                                M48.04
                                                                Spinal stenosis, thoracic region (T1-G12)</option>
                                                            <option
                                                                value="M51.34 Intervertebral disc degeneration, thoracic region">
                                                                M51.34 Intervertebral disc degeneration, thoracic region
                                                            </option>
                                                            <option value="M51.84 IVD Thoracic">M51.84 IVD Thoracic
                                                            </option>
                                                            <option value="M54.14 Radiculopathy, thoracic">M54.14
                                                                Radiculopathy,
                                                                thoracic</option>
                                                            <option value="M54.6 Pain in thoracic spine">M54.6 Pain in
                                                                thoracic spine
                                                            </option>
                                                            <option value="S23.3XXA Thoracic spine">S23.3XXA Thoracic
                                                                spine</option>
                                                            <option value="S24.2XXA Nerve root injury, thoracic">
                                                                S24.2XXA Nerve root
                                                                injury, thoracic</option>
                                                            <option value="MS4.6 Pain in Thoracic spine">MS4.6 Pain in
                                                                Thoracic spine
                                                            </option>
                                                            <option
                                                                value="M99.02 Segmental and somatic dysfunction of the thoracic region">
                                                                M99.02 Segmental and somatic dysfunction of the thoracic
                                                                region</option>
                                                            <option
                                                                value="M99.08 Segmental and somatic dysfunction of rib cage">
                                                                M99.08
                                                                Segmental and somatic dysfunction of rib cage</option>
                                                            <option
                                                                value="S23.3XXA Sprain of ligaments of thoracic spine, initial encounter">
                                                                S23.3XXA Sprain of ligaments of thoracic spine, initial
                                                                encounter
                                                            </option>
                                                            <option value="S23.41XA Sprain of ribs, initial encounter">
                                                                S23.41XA Sprain
                                                                of ribs, initial encounter</option>
                                                            <option
                                                                value="S23.421A Sprain of chrondrosternal joint, initial encounter">
                                                                S23.421A Sprain of chrondrosternal joint, initial
                                                                encounter</option>
                                                            <option
                                                                value="M51.14 Intervertebral disc disorders with radiculopathy, thoracic region">
                                                                M51.14 Intervertebral disc disorders with radiculopathy,
                                                                thoracic region
                                                            </option>
                                                            <option
                                                                value="M53.84 Other specified dorsopathies, thoracic region">
                                                                M53.84
                                                                Other specified dorsopathies, thoracic region</option>
                                                            <option
                                                                value="M41.114 Juvenile idiopathic scoliosis, thoracic region">
                                                                M41.114 Juvenile idiopathic scoliosis, thoracic region
                                                            </option>
                                                            <option
                                                                value="M41.124 Adolescent idiopathic scoliosis, thoracic region">
                                                                M41.124 Adolescent idiopathic scoliosis, thoracic region
                                                            </option>
                                                            <option
                                                                value="M41.44 Neuromuscular scoliosis, thoracic region">
                                                                M41.44
                                                                Neuromuscular scoliosis, thoracic region</option>
                                                            <option value="M40.00 Kyphosis postural acquired">M40.00
                                                                Kyphosis postural
                                                                acquired</option>
                                                            <option value="M40.04 Postural kyphosis thoracic">M40.04
                                                                Postural kyphosis
                                                                thoracic</option>
                                                            <option value="M40.03 Cervicothoracic">M40.03
                                                                Cervicothoracic</option>
                                                            <option
                                                                value="S29.012A Strain muscle-tendon back wall thorax acute">
                                                                S29.012A Strain muscle-tendon back wall thorax acute
                                                            </option>
                                                            <option value="G43.3 Nerve root disorder-thoracic">G43.3
                                                                Nerve root
                                                                disorder-thoracic</option>
                                                            <option
                                                                value="M53.2X4 Spinal instabilities thoracic region">
                                                                M53.2X4 Spinal
                                                                instabilities thoracic region</option>
                                                        </select></div>
                                                    <div id="dxcodelumbar3" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectlumbar3"
                                                            name="dxcodelumbar3" style="width:260px"
                                                            onchange="selectte('lumbar','3','C');checkadd('3','lumbar');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="G54.1 Lumbosacral plexus disorders">G54.1
                                                                Lumbosacral plexus
                                                                disorders</option>
                                                            <option value="G54.4 Lumbosacral root disorders">G54.4
                                                                Lumbosacral root
                                                                disorders</option>
                                                            <option value="M43.16 Spondylolisthesis, lumbar region">
                                                                M43.16
                                                                Spondylolisthesis, lumbar region</option>
                                                            <option value="M46.06 Spinal enthesopathy, lumbar region">
                                                                M46.06 Spinal
                                                                enthesopathy, lumbar region</option>
                                                            <option value="M47.896 Spondylosis, lumbar region">M47.896
                                                                Spondylosis,
                                                                lumbar region</option>
                                                            <option value="M51.06 IVD Disorder w/myelopathy lumbar">
                                                                M51.06 IVD Disorder
                                                                w/myelopathy lumbar</option>
                                                            <option
                                                                value="M51.26 Intervertebral disc displacement, lumbar">
                                                                M51.26
                                                                Intervertebral disc displacement, lumbar</option>
                                                            <option
                                                                value="M51.36 Intervertebral disc degeneration, lumbar">
                                                                M51.36
                                                                Intervertebral disc degeneration, lumbar</option>
                                                            <option value="M54.08 Lumbar facet syndrome">M54.08 Lumbar
                                                                facet syndrome
                                                            </option>
                                                            <option value="M54.16 Low back pain">M54.16 Low back pain
                                                            </option>
                                                            <option value="S33.5XXA Lumbar spine strain">S33.5XXA Lumbar
                                                                spine strain
                                                            </option>
                                                            <option value="M54.5 Low back pain">M54.5 Low back pain
                                                            </option>
                                                            <option
                                                                value="M99.03 Segmental and somatic dysfunction of lumbar region">
                                                                M99.03 Segmental and somatic dysfunction of lumbar
                                                                region</option>
                                                            <option
                                                                value="M99.04 Segmental and somatic dysfunction of sacral region">
                                                                M99.04 Segmental and somatic dysfunction of sacral
                                                                region</option>
                                                            <option
                                                                value="S33.5XXA Sprain of ligaments of lumbar spine, initial encounter">
                                                                S33.5XXA Sprain of ligaments of lumbar spine, initial
                                                                encounter</option>
                                                            <option
                                                                value="S33.6XXA Sprain of sacroiliac joint, inital encounter">
                                                                S33.6XXA Sprain of sacroiliac joint, inital encounter
                                                            </option>
                                                            <option
                                                                value="S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter">
                                                                S33.8XXA Sprain of other parts of lumbar spine and
                                                                pelvis, initial
                                                                encounter</option>
                                                            <option
                                                                value="S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial encounter">
                                                                S39.9XXA Sprain of unspecified parts of the lumbar spine
                                                                and pelvis,
                                                                initial encounter</option>
                                                            <option
                                                                value="S39.012A Strain of muscle, fascia and tendon of lower back, initial encounter">
                                                                S39.012A Strain of muscle, fascia and tendon of lower
                                                                back, initial
                                                                encounter</option>
                                                            <option
                                                                value="M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar region">
                                                                M51.15 Intervertebral disc disorders with radiculopathy,
                                                                thoracolumbar
                                                                region</option>
                                                            <option
                                                                value="M51.16 Intervertebral disc disorders with radiculopathy, lumbar region">
                                                                M51.16 Intervertebral disc disorders with radiculopathy,
                                                                lumbar region
                                                            </option>
                                                            <option
                                                                value="M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region">
                                                                M51.17 Intervertebral disc disorders with radiculopathy,
                                                                lumbosacral
                                                                region</option>
                                                            <option
                                                                value="M51.36 Other intervertebral disc degeneration, lumbar region">
                                                                M51.36 Other intervertebral disc degeneration, lumbar
                                                                region</option>
                                                            <option
                                                                value="M51.37 Other intervertebral disc degeneration, lumbosacral region">
                                                                M51.37 Other intervertebral disc degeneration,
                                                                lumbosacral region
                                                            </option>
                                                            <option
                                                                value="M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region">
                                                                M47.816 Spondylosis without myelopathy or radiculopathy,
                                                                lumbar region
                                                            </option>
                                                            <option
                                                                value="M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region">
                                                                M47.817 Spondyloses without myelopathy or radiculopathy,
                                                                lumboscral
                                                                region</option>
                                                            <option value="M54.31 Sciatica, right side">M54.31 Sciatica,
                                                                right side
                                                            </option>
                                                            <option value="M54.32 Sciatica, left side">M54.32 Sciatica,
                                                                left side
                                                            </option>
                                                            <option value="M99.03 Segmental Somatic dysfunction Lumbar">
                                                                M99.03 Segmental
                                                                Somatic dysfunction Lumbar</option>
                                                            <option
                                                                value="M99.04 Segmental Somatic dysfunction SI. Sacrum">
                                                                M99.04
                                                                Segmental Somatic dysfunction SI. Sacrum</option>
                                                            <option value="M54.41 Lumbago with sciatica, right side">
                                                                M54.41 Lumbago with
                                                                sciatica, right side</option>
                                                            <option value="M54.42 Lumbago with sciatica, left side">
                                                                M54.42 Lumbago with
                                                                sciatica, left side</option>
                                                            <option value="M54.16 Radiculopathy, lumbar region">M54.16
                                                                Radiculopathy,
                                                                lumbar region</option>
                                                            <option value="M54.17 Radiculopathy, lumboscral region">
                                                                M54.17
                                                                Radiculopathy, lumboscral region</option>
                                                            <option
                                                                value="M53.3 Sacrococcygeal disorders, not elsewhere classified">
                                                                M53.3 Sacrococcygeal disorders, not elsewhere classified
                                                            </option>
                                                            <option
                                                                value="M53.85 Other specified dorsopathies, thoracolumbar region">
                                                                M53.85 Other specified dorsopathies, thoracolumbar
                                                                region</option>
                                                            <option
                                                                value="M53.86 Other specified dorsopathies, lumbar region">
                                                                M53.86
                                                                Other specified dorsopathies, lumbar region</option>
                                                            <option value="M48.06 Spinal stenosis, lumbar region">M48.06
                                                                Spinal
                                                                stenosis, lumbar region</option>
                                                            <option
                                                                value="M41.115 Juvenile idiopathic scoliosis, thoracolumbar region">
                                                                M41.115 Juvenile idiopathic scoliosis, thoracolumbar
                                                                region</option>
                                                            <option
                                                                value="M41.116 Juvenile idiopathic scoliosis, lumbar region">
                                                                M41.116
                                                                Juvenile idiopathic scoliosis, lumbar region</option>
                                                            <option
                                                                value="M41.127 Adolescent idiopathic scoliosis, lumbosacral region">
                                                                M41.127 Adolescent idiopathic scoliosis, lumbosacral
                                                                region</option>
                                                            <option
                                                                value="M41.45 Neuromuscular scoliosis, thoracolumbar region">
                                                                M41.45
                                                                Neuromuscular scoliosis, thoracolumbar region</option>
                                                            <option
                                                                value="M41.46 Neuromuscular scoliosis, lumbar region">
                                                                M41.46
                                                                Neuromuscular scoliosis, lumbar region</option>
                                                            <option
                                                                value="M41.47 Neuromuscular scoliosis, lumbosacral region">
                                                                M41.47
                                                                Neuromuscular scoliosis, lumbosacral region</option>
                                                            <option
                                                                value="M51.26 Intervertebral disc displacement Lumbar L2-L5">
                                                                M51.26
                                                                Intervertebral disc displacement Lumbar L2-L5</option>
                                                            <option
                                                                value="M51.27 Intervertebral disc displacement L5-S1">
                                                                M51.27
                                                                Intervertebral disc displacement L5-S1</option>
                                                            <option value="M51.36 Degeneration Lumbar Disc L2-L5">M51.36
                                                                Degeneration
                                                                Lumbar Disc L2-L5</option>
                                                            <option value="M51.37 Degeneration Lumbarsacral Disc L5-S1">
                                                                M51.37
                                                                Degeneration Lumbarsacral Disc L5-S1</option>
                                                            <option value="M46.1 Sacroilitis">M46.1 Sacroilitis</option>
                                                            <option
                                                                value="M53.2X7 Spinal instabilities lumbosacral region">
                                                                M53.2X7
                                                                Spinal instabilities lumbosacral region</option>
                                                            <option value="M53.2X6 Spinal instabilities lumbar spine">
                                                                M53.2X6 Spinal
                                                                instabilities lumbar spine</option>
                                                        </select></div>
                                                    <div id="dxcodepelvis3" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectpelvis3"
                                                            name="dxcodepelvis3" style="width:260px"
                                                            onchange="selectte('pelvis','3','C');checkadd('3','pelvis');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M99.04 Segmental dysf/Sublux, sacral">M99.04
                                                                Segmental
                                                                dysf/Sublux, sacral</option>
                                                            <option value="M99.05 Segmental dysf/Sublux, pelvic">M99.05
                                                                Segmental
                                                                dysf/Sublux, pelvic</option>
                                                            <option value="M43.08 Spondylosis, sacral region">M43.08
                                                                Spondylosis, sacral
                                                                region</option>
                                                            <option value="M54.31 Sciatica, right side">M54.31 Sciatica,
                                                                right side
                                                            </option>
                                                            <option value="M54.32 Sciatica, left side">M54.32 Sciatica,
                                                                left side
                                                            </option>
                                                            <option value="S33.6 Sprain SI joint">S33.6 Sprain SI joint
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodegeneralspinal3" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectgeneralspinal3"
                                                            name="dxcodegeneralspinal3" style="width:260px"
                                                            onchange="selectte('generalspinal','3','C');checkadd('3','generalspinal');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="Q67.5 Scliosis, congenital">Q67.5 Scliosis,
                                                                congenital
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodeupperextremity3" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectupperextremity3"
                                                            name="dxcodeupperextremity3" style="width:260px"
                                                            onchange="selectte('upperextremity','3','C');checkadd('3','upperextremity');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M77.11 Lateral epicondylitis, right elbow">
                                                                M77.11 Lateral
                                                                epicondylitis, right elbow</option>
                                                            <option value="M77.12 Lateral epicondylitis, left elbow">
                                                                M77.12 Lateral
                                                                epicondylitis, left elbow</option>
                                                            <option
                                                                value="M99.07 Segmental and somatic dysfunction of upper extremity">
                                                                M99.07 Segmental and somatic dysfunction of upper
                                                                extremity</option>
                                                            <option
                                                                value="G56.01 Carpal tunnel syndrome, right upper limb">
                                                                G56.01
                                                                Carpal tunnel syndrome, right upper limb</option>
                                                            <option
                                                                value="G56.02 Carpal tunnel syndrome, left upper limb">
                                                                G56.02 Carpal
                                                                tunnel syndrome, left upper limb</option>
                                                            <option value="M75.0 Adhesive capsulitis of shoulder">M75.0
                                                                Adhesive
                                                                capsulitis of shoulder</option>
                                                            <option
                                                                value="M75.01 Adhesive capsulitis of right shoulder">
                                                                M75.01 Adhesive
                                                                capsulitis of right shoulder</option>
                                                            <option value="M75.02 Adhesive capsulitis of left shoulder">
                                                                M75.02 Adhesive
                                                                capsulitis of left shoulder</option>
                                                            <option value="M75.100 Unspec Rotator Cuff tear/rupture">
                                                                M75.100 Unspec
                                                                Rotator Cuff tear/rupture</option>
                                                            <option
                                                                value="M75.101 Unspec Rotator Cuff tear/rupture right shoulder">
                                                                M75.101 Unspec Rotator Cuff tear/rupture right shoulder
                                                            </option>
                                                            <option
                                                                value="M75.102 Unspec Rotator Cuff tear/rupture left shoulder">
                                                                M75.102 Unspec Rotator Cuff tear/rupture left shoulder
                                                            </option>
                                                            <option
                                                                value="M75.21 Bicipital tenosynovitis Right shoulder">
                                                                M75.21
                                                                Bicipital tenosynovitis Right shoulder</option>
                                                            <option
                                                                value="M75.22 Bicipital tenosynovitis Left shoulder">
                                                                M75.22
                                                                Bicipital tenosynovitis Left shoulder</option>
                                                            <option
                                                                value="M75.41 Impingement syndrome of Right shoulder">
                                                                M75.41
                                                                Impingement syndrome of Right shoulder</option>
                                                            <option
                                                                value="M75.42 Impingement syndrome of Left shoulder">
                                                                M75.42
                                                                Impingement syndrome of Left shoulder</option>
                                                            <option value="M75.5 Bursitis of shoulder">M75.5 Bursitis of
                                                                shoulder
                                                            </option>
                                                            <option value="M75.51 Bursitis of right shoulder">M75.51
                                                                Bursitis of right
                                                                shoulder</option>
                                                            <option value="M75.52 Bursitis of left shoulder">M75.52
                                                                Bursitis of left
                                                                shoulder</option>
                                                            <option value="M77.01 Medial epicondylitis, right elbow">
                                                                M77.01 Medial
                                                                epicondylitis, right elbow</option>
                                                            <option value="M77.02 Medial epicondylitis, left elbow">
                                                                M77.02 Medial
                                                                epicondylitis, left elbow</option>
                                                            <option value="M77.11 Lateral epicondylitis, right elbow">
                                                                M77.11 Lateral
                                                                epicondylitis, right elbow</option>
                                                            <option value="M77.12 Lateral epicondylitis, left elbow">
                                                                M77.12 Lateral
                                                                epicondylitis, left elbow</option>
                                                            <option
                                                                value="S43.51XA Sprain of right acromioclavicular joint, initial encounter">
                                                                S43.51XA Sprain of right acromioclavicular joint,
                                                                initial encounter
                                                            </option>
                                                            <option
                                                                value="S43.52XA Sprain of left acromioclavicular joint, initial encounter">
                                                                S43.52XA Sprain of left acromioclavicular joint, initial
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S43.411A Sprain of right coracohumeral (ligament), inital encounter">
                                                                S43.411A Sprain of right coracohumeral (ligament),
                                                                inital encounter
                                                            </option>
                                                            <option
                                                                value="S43.412A Sprain of left coracohumeral (ligament), inital encounter">
                                                                S43.412A Sprain of left coracohumeral (ligament), inital
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S43.421A Sprain of right rotator cuff capsule, initial encounter">
                                                                S43.421A Sprain of right rotator cuff capsule, initial
                                                                encounter
                                                            </option>
                                                            <option
                                                                value="S43.422A Sprain of left rotator cuff capsule, initial encounter">
                                                                S43.422A Sprain of left rotator cuff capsule, initial
                                                                encounter</option>
                                                            <option
                                                                value="S43.911A Right shoulder strain unspecified muscles, Acute">
                                                                S43.911A Right shoulder strain unspecified muscles,
                                                                Acute</option>
                                                            <option
                                                                value="S43.912A Left shoulder strain unspecified muscles, Acute">
                                                                S43.912A Left shoulder strain unspecified muscles, Acute
                                                            </option>
                                                            <option
                                                                value="S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right shoulder, initial">
                                                                S46.011A Strain of muscle(s) and tendon(s) of the
                                                                rotator cuff of right
                                                                shoulder, initial</option>
                                                            <option
                                                                value="S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left shoulder, initial">
                                                                S46.012A Strain of muscle(s) and tendon(s) of the
                                                                rotator cuff of left
                                                                shoulder, initial</option>
                                                            <option
                                                                value="S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of right shoulder">
                                                                S46.091A Other injury of muscle(s) and Tendon(s) of the
                                                                rotator cuff of
                                                                right shoulder</option>
                                                            <option
                                                                value="S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left shoulder">
                                                                S46.092A Other injury of muscle(s) and Tendon(s) of the
                                                                rotator cuff of
                                                                left shoulder</option>
                                                            <option
                                                                value="S46.811A Srain of other muscles, fascia and tendons at shoulder and upper arm level, right arm, initial encounter">
                                                                S46.811A Srain of other muscles, fascia and tendons at
                                                                shoulder and
                                                                upper arm level, right arm, initial encounter</option>
                                                            <option
                                                                value="S46.812A Srain of other muscles, fascia and tendons at shoulder and upper arm level, left arm, initial encounter">
                                                                S46.812A Srain of other muscles, fascia and tendons at
                                                                shoulder and
                                                                upper arm level, left arm, initial encounter</option>
                                                            <option value="M75.00 Frozen shoulder">M75.00 Frozen
                                                                shoulder</option>
                                                            <option value="M25.511 Pain in right shoulder">M25.511 Pain
                                                                in right
                                                                shoulder</option>
                                                            <option value="M25.512 Pain in left shoulder">M25.512 Pain
                                                                in left shoulder
                                                            </option>
                                                            <option value="M25.521 Pain in right elbow">M25.521 Pain in
                                                                right elbow
                                                            </option>
                                                            <option value="M25.522 Pain in left elbow">M25.522 Pain in
                                                                left elbow
                                                            </option>
                                                            <option value="M25.531 Pain in right wrist">M25.531 Pain in
                                                                right wrist
                                                            </option>
                                                            <option value="M25.32 Pain in left wrist">M25.32 Pain in
                                                                left wrist</option>
                                                            <option value="M79.601 Pain in right arm">M79.601 Pain in
                                                                right arm</option>
                                                            <option value="M79.602 Pain in left arm">M79.602 Pain in
                                                                left arm</option>
                                                            <option value="M79.621 Pain in right upper arm">M79.621 Pain
                                                                in right upper
                                                                arm</option>
                                                            <option value="M79.622 Pain in left upper arm">M79.622 Pain
                                                                in left upper
                                                                arm</option>
                                                            <option value="M79.631 Pain in right forearm">M79.631 Pain
                                                                in right forearm
                                                            </option>
                                                            <option value="M79.632 Pain in left forearm">M79.632 Pain in
                                                                left forearm
                                                            </option>
                                                            <option value="M79.641 Pain in right hand">M79.641 Pain in
                                                                right hand
                                                            </option>
                                                            <option value="M79.642 Pain in left hand">M79.642 Pain in
                                                                left hand</option>
                                                            <option value="M79.644 Pain in right finger(s)">M79.644 Pain
                                                                in right
                                                                finger(s)</option>
                                                            <option value="M79.645 Pain in left finger(s)">M79.645 Pain
                                                                in left
                                                                finger(s)</option>
                                                            <option value="M25.619 Stiffness of unspec. shoulder">
                                                                M25.619 Stiffness of
                                                                unspec. shoulder</option>
                                                            <option value="M89.519 Osteolysis of shoulder">M89.519
                                                                Osteolysis of
                                                                shoulder</option>
                                                            <option value="M93.919 Osteochondropathy of shoulder">
                                                                M93.919
                                                                Osteochondropathy of shoulder</option>
                                                            <option value="M60.819 Myositis of shoulder">M60.819
                                                                Myositis of shoulder
                                                            </option>
                                                            <option value="M67.419 Ganglion cyst of shoulder">M67.419
                                                                Ganglion cyst of
                                                                shoulder</option>
                                                            <option value="M25.019 Hamarthrosis of shoulder">M25.019
                                                                Hamarthrosis of
                                                                shoulder</option>
                                                            <option value="M25.719 Bone spur-osteophyte of shoulder">
                                                                M25.719 Bone
                                                                spur-osteophyte of shoulder</option>
                                                            <option value="M75.81 Tendinitis of right shoulder">M75.81
                                                                Tendinitis of
                                                                right shoulder</option>
                                                            <option value="M75.82 Tendinitis of left shoulder">M75.82
                                                                Tendinitis of left
                                                                shoulder</option>
                                                            <option value="M13.119 Monoarthritis of shoulder region">
                                                                M13.119
                                                                Monoarthritis of shoulder region</option>
                                                            <option value="S53.031S Nursemaid's Elbow, right elbow">
                                                                S53.031S Nursemaid's
                                                                Elbow, right elbow</option>
                                                            <option value="S53.032S Nursemaid's Elbow, left elbow">
                                                                S53.032S Nursemaid's
                                                                Elbow, left elbow</option>
                                                            <option value="M25.629 Stiffness of unspec. elbow">M25.629
                                                                Stiffness of
                                                                unspec. elbow</option>
                                                            <option value="M25.029 Hemarthrosis of elbow">M25.029
                                                                Hemarthrosis of elbow
                                                            </option>
                                                            <option value="M67.429 Ganglion cyst of elbow">M67.429
                                                                Ganglion cyst of
                                                                elbow</option>
                                                            <option value="M24.629 Ankylosis of elbow">M24.629 Ankylosis
                                                                of elbow
                                                            </option>
                                                            <option value="M25.729 Bone spur of elbow">M25.729 Bone spur
                                                                of elbow
                                                            </option>
                                                            <option value="M19.021 Arthriris of right elbow">M19.021
                                                                Arthriris of right
                                                                elbow</option>
                                                            <option value="M19.022 Arthritis of left elbow">M19.022
                                                                Arthritis of left
                                                                elbow</option>
                                                            <option value="M21.331 Wrist drop, right wrist">M21.331
                                                                Wrist drop, right
                                                                wrist</option>
                                                            <option value="M21.332 Wrist drop, left wrist">M21.332 Wrist
                                                                drop, left
                                                                wrist</option>
                                                            <option value="M25.639 Stiffness of unspec. wrist">M25.639
                                                                Stiffness of
                                                                unspec. wrist</option>
                                                            <option value="M25.039 Hemarthrosis of wrist">M25.039
                                                                Hemarthrosis of wrist
                                                            </option>
                                                            <option value="M67.439 Gangolian cyst of wrist">M67.439
                                                                Gangolian cyst of
                                                                wrist</option>
                                                            <option value="M25.739 Bone spur of wrist">M25.739 Bone spur
                                                                of wrist
                                                            </option>
                                                            <option value="M25.439 Effusion of unspec. wrist">M25.439
                                                                Effusion of
                                                                unspec. wrist</option>
                                                            <option value="M13.139 Monarthritis of unspec. wrist">
                                                                M13.139 Monarthritis
                                                                of unspec. wrist</option>
                                                            <option value="M25.539 Arthralgia of wrist">M25.539
                                                                Arthralgia of wrist
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodelowerextremity3" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectlowerextremity3"
                                                            name="dxcodelowerextremity3" style="width:260px"
                                                            onchange="selectte('lowerextremity','3','C');checkadd('3','lowerextremity');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M72.2 Planter fascitis">M72.2 Planter
                                                                fascitis</option>
                                                            <option value="S93.01XA Subluxation right ankle/foot">
                                                                S93.01XA Subluxation
                                                                right ankle/foot</option>
                                                            <option value="S93.02XA Subluxation left ankle/foot">
                                                                S93.02XA Subluxation
                                                                left ankle/foot</option>
                                                            <option
                                                                value="M99.06 Segmental and somatic dysfunction of lower extremity">
                                                                M99.06 Segmental and somatic dysfunction of lower
                                                                extremity</option>
                                                            <option value="M76.61 Achilles Tendinitis, Right Leg">M76.61
                                                                Achilles
                                                                Tendinitis, Right Leg</option>
                                                            <option value="M76.62 Achilles Tendinitis, Left Leg">M76.62
                                                                Achilles
                                                                Tendinitis, Left Leg</option>
                                                            <option
                                                                value="S73.191A Other sprain of right hip, initial encounter">
                                                                S73.191A Other sprain of right hip, initial encounter
                                                            </option>
                                                            <option
                                                                value="S73.192A Other sprain of left hip, initial encounter">
                                                                S73.192A Other sprain of left hip, initial encounter
                                                            </option>
                                                            <option
                                                                value="S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter">
                                                                S76.011A Strain of muscle, fascia and tendon of right
                                                                hip, initial
                                                                encounter</option>
                                                            <option
                                                                value="S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter">
                                                                S76.012A Strain of muscle, fascia and tendon of left
                                                                hip, initial
                                                                encounter</option>
                                                            <option
                                                                value="S83.91XA Sprain of unspecified site of right knee, initial encounter">
                                                                S83.91XA Sprain of unspecified site of right knee,
                                                                initial encounter
                                                            </option>
                                                            <option
                                                                value="S83.92XA Sprain of unspecified site of left knee, initial encounter">
                                                                S83.92XA Sprain of unspecified site of left knee,
                                                                initial encounter
                                                            </option>
                                                            <option value="M79.604 Pain in right leg">M79.604 Pain in
                                                                right leg</option>
                                                            <option value="M79.605 Pain in left leg">M79.605 Pain in
                                                                left leg</option>
                                                            <option value="M79.651 Pain in right thigh">M79.651 Pain in
                                                                right thigh
                                                            </option>
                                                            <option value="M79.652 Pain in left thigh">M79.652 Pain in
                                                                left thigh
                                                            </option>
                                                            <option value="M79.661 Pain in right lower leg">M79.661 Pain
                                                                in right lower
                                                                leg</option>
                                                            <option value="M79.662 Pain in left lower leg">M79.662 Pain
                                                                in left lower
                                                                leg</option>
                                                            <option value="M79.671 Pain in right foot">M79.671 Pain in
                                                                right foot
                                                            </option>
                                                            <option value="M79.672 Pain in left foot">M79.672 Pain in
                                                                left foot</option>
                                                            <option value="M79.674 Pain in right toes">M79.674 Pain in
                                                                right toes
                                                            </option>
                                                            <option value="M79.675 Pain in left toes">M79.675 Pain in
                                                                left toes</option>
                                                            <option value="M25.551 Pain in right hip">M25.551 Pain in
                                                                right hip</option>
                                                            <option value="M25.552 Pain in left hip">M25.552 Pain in
                                                                left hip</option>
                                                            <option value="M25.561 Pain in right knee">M25.561 Pain in
                                                                right knee
                                                            </option>
                                                            <option value="M25.562 Pain in left knee">M25.562 Pain in
                                                                left knee</option>
                                                            <option value="M25.571 Pain in right ankle">M25.571 Pain in
                                                                right ankle
                                                            </option>
                                                            <option value="M25.572 Pain in left ankle">M25.572 Pain in
                                                                left ankle
                                                            </option>
                                                            <option value="M76.31 Iliotibial band syndrome, right leg">
                                                                M76.31 Iliotibial
                                                                band syndrome, right leg</option>
                                                            <option value="M76.32 Iliotibial band syndrome, left leg">
                                                                M76.32 Iliotibial
                                                                band syndrome, left leg</option>
                                                            <option value="M70.50 Bursitis of unspec. knee">M70.50
                                                                Bursitis of unspec.
                                                                knee</option>
                                                            <option value="M25.069 Hemarthrosis of unspec. knee">M25.069
                                                                Hemarthrosis of
                                                                unspec. knee</option>
                                                            <option value="M94.269 Chondromalacia of unspec. knee">
                                                                M94.269
                                                                Chondromalacia of unspec. knee</option>
                                                            <option value="M67.469 Gangolian cyst of unspec. knee">
                                                                M67.469 Gangolian
                                                                cyst of unspec. knee</option>
                                                            <option value="M25.760 Bone spur of unspec. knee">M25.760
                                                                Bone spur of
                                                                unspec. knee</option>
                                                            <option value="M23.40 Loose body in spec. knee">M23.40 Loose
                                                                body in spec.
                                                                knee</option>
                                                            <option value="M25.669 Stiffness of unspec. knee">M25.669
                                                                Stiffness of
                                                                unspec. knee</option>
                                                            <option value="M70.51 Bursitis of right knee">M70.51
                                                                Bursitis of right knee
                                                            </option>
                                                            <option value="M70.52 Bursitis of left knee">M70.52 Bursitis
                                                                of left knee
                                                            </option>
                                                            <option value="M21.371 Foot drop right foot">M21.371 Foot
                                                                drop right foot
                                                            </option>
                                                            <option value="M21.372 Foot drop left foot">M21.372 Foot
                                                                drop left foot
                                                            </option>
                                                            <option value="Q72.70 Cleft foot-split foot">Q72.70 Cleft
                                                                foot-split foot
                                                            </option>
                                                            <option value="S90.30XA Contusion of foot">S90.30XA
                                                                Contusion of foot
                                                            </option>
                                                            <option value="M25.076 Hemarthrosis of unspec. foot">M25.076
                                                                Hemarthrosis of
                                                                unspec. foot</option>
                                                            <option value="M25.776 Bone spur of foot">M25.776 Bone spur
                                                                of foot</option>
                                                            <option value="T69.021A Immersion of right foot">T69.021A
                                                                Immersion of right
                                                                foot</option>
                                                            <option value="T69.022A Immersion of left foot">T69.022A
                                                                Immersion of left
                                                                foot</option>
                                                        </select></div>
                                                    <div id="dxcodeheadache3" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectheadache3"
                                                            name="dxcodeheadache3" style="width:260px"
                                                            onchange="selectte('headache','3','C');checkadd('3','headache');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="G43.001 Migraine">G43.001 Migraine</option>
                                                            <option value="G44.209 Tension-type headache">G44.209
                                                                Tension-type headache
                                                            </option>
                                                            <option value="G44.89 Headache">G44.89 Headache</option>
                                                            <option value="R42 Dizziness">R42 Dizziness</option>
                                                            <option value="R51 Headache">R51 Headache</option>
                                                            <option
                                                                value="G44.201 Tension-Type Headache, unspecified, intractable">
                                                                G44.201 Tension-Type Headache, unspecified, intractable
                                                            </option>
                                                            <option
                                                                value="G44.209 Tension-Type Headache, unspecified, not intractable">
                                                                G44.209 Tension-Type Headache, unspecified, not
                                                                intractable</option>
                                                            <option
                                                                value="G43.001 Migraine without aura, not intractable, with status migrainosus">
                                                                G43.001 Migraine without aura, not intractable, with
                                                                status migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.009 Migraine without aura, not intractable, without status migrainosus">
                                                                G43.009 Migraine without aura, not intractable, without
                                                                status
                                                                migrainosus</option>
                                                            <option
                                                                value="G43.011 Migraine without aura, intractable, with status migrainosus">
                                                                G43.011 Migraine without aura, intractable, with status
                                                                migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.019 Migraine without aura, intractable, without status migrainosus">
                                                                G43.019 Migraine without aura, intractable, without
                                                                status migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.101 Migraine with aura, not intractable, with status migrainosus">
                                                                G43.101 Migraine with aura, not intractable, with status
                                                                migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.109 Migraine with aura, not intractable, without status migrainosus">
                                                                G43.109 Migraine with aura, not intractable, without
                                                                status migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.111 Migraine with aura, intractable, with status migrainosus">
                                                                G43.111 Migraine with aura, intractable, with status
                                                                migrainosus
                                                            </option>
                                                            <option
                                                                value="G43.119 Migraine with aura, intractable, without status migrainosus">
                                                                G43.119 Migraine with aura, intractable, without status
                                                                migrainosus
                                                            </option>
                                                            <option value="G44.219 Tension Headache episodic">G44.219
                                                                Tension Headache
                                                                episodic</option>
                                                            <option value="G44.229 Tension Headache chronic">G44.229
                                                                Tension Headache
                                                                chronic</option>
                                                            <option value="G44.319 Acute post-traumatic headache">
                                                                G44.319 Acute
                                                                post-traumatic headache</option>
                                                            <option value="G44.329 Chronic post-traumatic headache">
                                                                G44.329 Chronic
                                                                post-traumatic headache</option>
                                                            <option value="S06.0X0A Mild concussion (no loc) acute">
                                                                S06.0X0A Mild
                                                                concussion (no loc) acute</option>
                                                            <option value="S06.0X1A Mild concussion (LOC<30MINS)">
                                                                S06.0X1A Mild
                                                                concussion (LOC<30MINS)< /option>
                                                            <option value="F07.81 Post-Concussion Syndrome">F07.81
                                                                Post-Concussion
                                                                Syndrome</option>
                                                            <option value="H53.8 Blurry Vision">H53.8 Blurry Vision
                                                            </option>
                                                            <option value="H93.19 Tinnitus unspecified">H93.19 Tinnitus
                                                                unspecified
                                                            </option>
                                                        </select></div>
                                                    <div id="dxcodegeneral3" style="display:none;"><select
                                                            style="width:300px;" id="dxcodeselectgeneral3"
                                                            name="dxcodegeneral3" style="width:260px"
                                                            onchange="selectte('general','3','C');checkadd('3','general');">
                                                            <option value="">Select a code</option>
                                                            <option value="add">Add...</option>
                                                            <option value="M62.830 Muscle spasm of the back">M62.830
                                                                Muscle spasm of the
                                                                back</option>
                                                            <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                                            <option value="R42 Vertigo, dizziness & giddiness">R42
                                                                Vertigo, dizziness &
                                                                giddiness</option>
                                                            <option value="M62.830 Muscle spasm of back">M62.830 Muscle
                                                                spasm of back
                                                            </option>
                                                            <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                                            <option value="M79.7 Fibromyalgia">M79.7 Fibromyalgia
                                                            </option>
                                                            <option value="M72.8 Fascitis">M72.8 Fascitis</option>
                                                            <option value="M25.2 Limb cramp or spasm">M25.2 Limb cramp
                                                                or spasm</option>
                                                            <option
                                                                value="M62.40 Muscle contracture (neck, thoracic, lumbar)">
                                                                M62.40
                                                                Muscle contracture (neck, thoracic, lumbar)</option>
                                                            <option
                                                                value="M25.50 Unspecified Joint(s) tender/painful (NK/MBLB)">
                                                                M25.50
                                                                Unspecified Joint(s) tender/painful (NK/MBLB)</option>
                                                            <option
                                                                value="M25.60 Joint(s) stiff (next, thoracic, lumbar)">
                                                                M25.60
                                                                Joint(s) stiff (next, thoracic, lumbar)</option>
                                                            <option value="M35.7 Hypermobility syndrome">M35.7
                                                                Hypermobility syndrome
                                                            </option>
                                                            <option
                                                                value="M81.0 Age related osteoporosis w/o pathological fracture">
                                                                M81.0 Age related osteoporosis w/o pathological fracture
                                                            </option>
                                                            <option
                                                                value="M99.05 Segmental and comatic dysfunction of pelvic region">
                                                                M99.05 Segmental and comatic dysfunction of pelvic
                                                                region</option>
                                                            <option value="R20.1 Hypoesthesia of skin">R20.1
                                                                Hypoesthesia of skin
                                                            </option>
                                                            <option value="R20.2 Spin parethesia">R20.2 Spin parethesia
                                                            </option>
                                                            <option value="R20.3 Hyperesthesia of skin">R20.3
                                                                Hyperesthesia of skin
                                                            </option>
                                                            <option value="R26.81 Unsteady on feet">R26.81 Unsteady on
                                                                feet</option>
                                                            <option value="R26.2 Difficulty Walking">R26.2 Difficulty
                                                                Walking</option>
                                                        </select></div>
                                                    <div id="addcodediv3" style="display:none;">
                                                        <table width="300" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="200"><input id="dxcodeadd3" name="dxcodeadd3"
                                                                        style="width:200px" value=""></td>
                                                                <td align="center" width="40"><img
                                                                        src="nlimages/delete.png" width="15" height="15"
                                                                        onclick="hideadd('3','');"></td>
                                                                <td width="60" align="right"><a href="#">Manage</a></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                                <td bgcolor="#f1f1f1" width="59%">
                                                    <input type="hidden" name="showpointersC" id="showpointersC">
                                                    <div id="showpointerdivC"></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="border-left:1px solid black;padding:5px;">
                                        <div id="showunits2"></div>
                                    </td>
                                </tr>
                                <td>
                                    <table cellpadding="5" width="100%">
                                        <tr>
                                            <td width="6%" align="center"><b>D</b></td>
                                            <td width="15%"><select name="dxcategory4" id="dx4"
                                                    onchange="populateselect('4');exampopulate();">
                                                    <option value=""></option>
                                                    <option value="cervical">Cervical</option>
                                                    <option value="thoracic">Thoracic</option>
                                                    <option value="lumbar">Lumbar/SI</option>
                                                    <option value="pelvis">Pelvis Sacrum Coccyx</option>
                                                    <option value="generalspinal">General Spinal</option>
                                                    <option value="upperextremity">Upper Extremity</option>
                                                    <option value="lowerextremity">Lower Extremity</option>
                                                    <option value="headache">Headache</option>
                                                    <option value="general">General</option>
                                                </select></td>
                                            <td width="20%">
                                                <div id="dxcodedefault4" style="display:block;"><select
                                                        style="width:300px;">
                                                        <option value="" selected>Select a category for codes</option>
                                                    </select></div>
                                                <div id="dxcodecervical4" style="display:none;"><select
                                                        style="width:300px;" id="dxcodeselectcervical4"
                                                        name="dxcodecervical4" style="width:260px"
                                                        onchange="selectte('cervical','4','D');checkadd('4','cervical');">
                                                        <option value="">Select a code</option>
                                                        <option value="add">Add...</option>
                                                        <option value="G54.0 Brachial Plexus disorders">G54.0 Brachial
                                                            Plexus disorders
                                                        </option>
                                                        <option value="G54.2 Cervical root disorders">G54.2 Cervical
                                                            root disorders
                                                        </option>
                                                        <option value="M40.292 Cervical kyphosis, other">M40.292
                                                            Cervical kyphosis,
                                                            other</option>
                                                        <option value="M43.12 Sponylolisthesis, cervical region">M43.12
                                                            Sponylolisthesis, cervical region</option>
                                                        <option value="M43.6 Torticollis">M43.6 Torticollis</option>
                                                        <option value="M46.02 Spinal enthesopathy, cervical region">
                                                            M46.02 Spinal
                                                            enthesopathy, cervical region</option>
                                                        <option
                                                            value="M47.12 Spondylosis w/out myelopathy, cervical region">
                                                            M47.12
                                                            Spondylosis w/out myelopathy, cervical region</option>
                                                        <option value="M48.02 Spinal Stenosis, cervical region (C3-C7)">
                                                            M48.02 Spinal
                                                            Stenosis, cervical region (C3-C7)</option>
                                                        <option value="M48.32 Traumatic spondylopathy, cervical region">
                                                            M48.32 Traumatic
                                                            spondylopathy, cervical region</option>
                                                        <option value="M50.01 IVD disorder w/ myelopathy Cervical">
                                                            M50.01 IVD disorder
                                                            w/ myelopathy Cervical</option>
                                                        <option value="M50.12 Cervical disc disorder w/ radiculopathy">
                                                            M50.12 Cervical
                                                            disc disorder w/ radiculopathy</option>
                                                        <option value="M50.20 Cervical disc displacement">M50.20
                                                            Cervical disc
                                                            displacement</option>
                                                        <option value="M50.30 Cervical disc disgnereation">M50.30
                                                            Cervical disc
                                                            disgnereation</option>
                                                        <option value="M50.90 Cervical disc disorder">M50.90 Cervical
                                                            disc disorder
                                                        </option>
                                                        <option value="M53.0 Cervicocranial syndrome">M53.0
                                                            Cervicocranial syndrome
                                                        </option>
                                                        <option value="M53.1 Cervicobrachial syndrome">M53.1
                                                            Cervicobrachial syndrome
                                                        </option>
                                                        <option value="M54.12 Radiculopathy, cervical region">M54.12
                                                            Radiculopathy,
                                                            cervical region</option>
                                                        <option value="M54.2 Cervicalgia">M54.2 Cervicalgia</option>
                                                        <option value="M62.838 Muscle spasm, other">M62.838 Muscle
                                                            spasm, other</option>
                                                        <option value="S13.4XXA Cervical sprain">S13.4XXA Cervical
                                                            sprain</option>
                                                        <option value="S14.2XXA Nerve root injury, cervical">S14.2XXA
                                                            Nerve root injury,
                                                            cervical</option>
                                                        <option value="S143.XXA Brachial plexus injury">S143.XXA
                                                            Brachial plexus injury
                                                        </option>
                                                        <option value="S16.1XXA Strain, Neck muscles">S16.1XXA Strain,
                                                            Neck muscles
                                                        </option>
                                                        <option
                                                            value="M99.00 Segmental Somatic Dysfunction Occiptal-Head">
                                                            M99.00
                                                            Segmental Somatic Dysfunction Occiptal-Head</option>
                                                        <option
                                                            value="M99.01 Segmental Somatic Dysfunction of Cervical Region">
                                                            M99.01
                                                            Segmental Somatic Dysfunction of Cervical Region</option>
                                                        <option
                                                            value="S13.4XXA Spain of ligaments of cervical spine, initial encounter">
                                                            S13.4XXA Spain of ligaments of cervical spine, initial
                                                            encounter</option>
                                                        <option
                                                            value="S16.1XXA Strain of muscle, fascia and tendon at next level, initial encounter">
                                                            S16.1XXA Strain of muscle, fascia and tendon at next level,
                                                            initial
                                                            encounter</option>
                                                        <option
                                                            value="S14.2XXA Injury nerve root cervical, initial encounter">
                                                            S14.2XXA
                                                            Injury nerve root cervical, initial encounter</option>
                                                        <option value="G54.1 Nerve root lesion cervical">G54.1 Nerve
                                                            root lesion
                                                            cervical</option>
                                                        <option value="M50.33 Disc degeneration cervicothoracic region">
                                                            M50.33 Disc
                                                            degeneration cervicothoracic region</option>
                                                        <option value="M50.22 Cervical disc displacement C3-C7">M50.22
                                                            Cervical disc
                                                            displacement C3-C7</option>
                                                        <option value="M50.23 Cervical disc displacement C7-T1">M50.23
                                                            Cervical disc
                                                            displacement C7-T1</option>
                                                        <option value="M50.31 Cervical disc degeneration C2-C4">M50.31
                                                            Cervical disc
                                                            degeneration C2-C4</option>
                                                        <option value="M50.32 Cervical disc degeneration C3-C7">M50.32
                                                            Cervical disc
                                                            degeneration C3-C7</option>
                                                        <option value="M50.33 Cervical disc degeneration C7-T1">M50.33
                                                            Cervical disc
                                                            degeneration C7-T1</option>
                                                        <option value="M53.2X2 Cervical spine instabilities">M53.2X2
                                                            Cervical spine
                                                            instabilities</option>
                                                        <option value="M40.202 Kyphosis unspecified cervical">M40.202
                                                            Kyphosis
                                                            unspecified cervical</option>
                                                        <option value="S13.4XXS Sequela sprain neck ligaments">S13.4XXS
                                                            Sequela sprain
                                                            neck ligaments</option>
                                                        <option
                                                            value="M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial region">
                                                            M50.11 Cervical disc disorder with radiculopathy,
                                                            occipito-atlanto-axial
                                                            region</option>
                                                        <option
                                                            value="M50.12 Cervical disc disorder with radiculopathy, mid-cervical region">
                                                            M50.12 Cervical disc disorder with radiculopathy,
                                                            mid-cervical region
                                                        </option>
                                                        <option
                                                            value="M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region">
                                                            M50.13 Cervical disc disorder with radiculopathy,
                                                            cervicothoracic region
                                                        </option>
                                                        <option
                                                            value="M50.31 Other cervical disc degeneration, occipito-atlanto-axial region">
                                                            M50.31 Other cervical disc degeneration,
                                                            occipito-atlanto-axial region
                                                        </option>
                                                        <option
                                                            value="M50.32 Other cervical disc degeneration, mid-cervical region">
                                                            M50.32 Other cervical disc degeneration, mid-cervical region
                                                        </option>
                                                        <option
                                                            value="M50.33 Other cervical disc degeneration, cervicothoracic region">
                                                            M50.33 Other cervical disc degeneration, cervicothoracic
                                                            region</option>
                                                    </select></div>
                                                <div id="dxcodethoracic4" style="display:none;"><select
                                                        style="width:300px;" id="dxcodeselectthoracic4"
                                                        name="dxcodethoracic4" style="width:260px"
                                                        onchange="selectte('thoracic','4','D');checkadd('4','thoracic');">
                                                        <option value="">Select a code</option>
                                                        <option value="add">Add...</option>
                                                        <option value="M99.02 Segmental dysf./Sublux, thoracic">M99.02
                                                            Segmental
                                                            dysf./Sublux, thoracic</option>
                                                        <option value="G54.3 Thoracic root disorders">G54.3 Thoracic
                                                            root disorders
                                                        </option>
                                                        <option value="M43.14 Spondylolistesis, thoracic region">M43.14
                                                            Spondylolistesis, thoracic region</option>
                                                        <option value="M46.04 Spinal enthesopathy, thoracic region">
                                                            M46.04 Spinal
                                                            enthesopathy, thoracic region</option>
                                                        <option
                                                            value="M47.24 Spondylosis w/ radiculopathy, thoracic region">
                                                            M47.24
                                                            Spondylosis w/ radiculopathy, thoracic region</option>
                                                        <option value="M47.814 Spondylosis w/out mwelopathy, thoracic">
                                                            M47.814
                                                            Spondylosis w/out mwelopathy, thoracic</option>
                                                        <option
                                                            value="M48.04 Spinal stenosis, thoracic region (T1-G12)">
                                                            M48.04 Spinal
                                                            stenosis, thoracic region (T1-G12)</option>
                                                        <option
                                                            value="M51.34 Intervertebral disc degeneration, thoracic region">
                                                            M51.34
                                                            Intervertebral disc degeneration, thoracic region</option>
                                                        <option value="M51.84 IVD Thoracic">M51.84 IVD Thoracic</option>
                                                        <option value="M54.14 Radiculopathy, thoracic">M54.14
                                                            Radiculopathy, thoracic
                                                        </option>
                                                        <option value="M54.6 Pain in thoracic spine">M54.6 Pain in
                                                            thoracic spine
                                                        </option>
                                                        <option value="S23.3XXA Thoracic spine">S23.3XXA Thoracic spine
                                                        </option>
                                                        <option value="S24.2XXA Nerve root injury, thoracic">S24.2XXA
                                                            Nerve root injury,
                                                            thoracic</option>
                                                        <option value="MS4.6 Pain in Thoracic spine">MS4.6 Pain in
                                                            Thoracic spine
                                                        </option>
                                                        <option
                                                            value="M99.02 Segmental and somatic dysfunction of the thoracic region">
                                                            M99.02 Segmental and somatic dysfunction of the thoracic
                                                            region</option>
                                                        <option
                                                            value="M99.08 Segmental and somatic dysfunction of rib cage">
                                                            M99.08
                                                            Segmental and somatic dysfunction of rib cage</option>
                                                        <option
                                                            value="S23.3XXA Sprain of ligaments of thoracic spine, initial encounter">
                                                            S23.3XXA Sprain of ligaments of thoracic spine, initial
                                                            encounter</option>
                                                        <option value="S23.41XA Sprain of ribs, initial encounter">
                                                            S23.41XA Sprain of
                                                            ribs, initial encounter</option>
                                                        <option
                                                            value="S23.421A Sprain of chrondrosternal joint, initial encounter">
                                                            S23.421A Sprain of chrondrosternal joint, initial encounter
                                                        </option>
                                                        <option
                                                            value="M51.14 Intervertebral disc disorders with radiculopathy, thoracic region">
                                                            M51.14 Intervertebral disc disorders with radiculopathy,
                                                            thoracic region
                                                        </option>
                                                        <option
                                                            value="M53.84 Other specified dorsopathies, thoracic region">
                                                            M53.84
                                                            Other specified dorsopathies, thoracic region</option>
                                                        <option
                                                            value="M41.114 Juvenile idiopathic scoliosis, thoracic region">
                                                            M41.114
                                                            Juvenile idiopathic scoliosis, thoracic region</option>
                                                        <option
                                                            value="M41.124 Adolescent idiopathic scoliosis, thoracic region">
                                                            M41.124
                                                            Adolescent idiopathic scoliosis, thoracic region</option>
                                                        <option value="M41.44 Neuromuscular scoliosis, thoracic region">
                                                            M41.44
                                                            Neuromuscular scoliosis, thoracic region</option>
                                                        <option value="M40.00 Kyphosis postural acquired">M40.00
                                                            Kyphosis postural
                                                            acquired</option>
                                                        <option value="M40.04 Postural kyphosis thoracic">M40.04
                                                            Postural kyphosis
                                                            thoracic</option>
                                                        <option value="M40.03 Cervicothoracic">M40.03 Cervicothoracic
                                                        </option>
                                                        <option
                                                            value="S29.012A Strain muscle-tendon back wall thorax acute">
                                                            S29.012A
                                                            Strain muscle-tendon back wall thorax acute</option>
                                                        <option value="G43.3 Nerve root disorder-thoracic">G43.3 Nerve
                                                            root
                                                            disorder-thoracic</option>
                                                        <option value="M53.2X4 Spinal instabilities thoracic region">
                                                            M53.2X4 Spinal
                                                            instabilities thoracic region</option>
                                                    </select></div>
                                                <div id="dxcodelumbar4" style="display:none;"><select
                                                        style="width:300px;" id="dxcodeselectlumbar4"
                                                        name="dxcodelumbar4" style="width:260px"
                                                        onchange="selectte('lumbar','4','D');checkadd('4','lumbar');">
                                                        <option value="">Select a code</option>
                                                        <option value="add">Add...</option>
                                                        <option value="G54.1 Lumbosacral plexus disorders">G54.1
                                                            Lumbosacral plexus
                                                            disorders</option>
                                                        <option value="G54.4 Lumbosacral root disorders">G54.4
                                                            Lumbosacral root
                                                            disorders</option>
                                                        <option value="M43.16 Spondylolisthesis, lumbar region">M43.16
                                                            Spondylolisthesis, lumbar region</option>
                                                        <option value="M46.06 Spinal enthesopathy, lumbar region">M46.06
                                                            Spinal
                                                            enthesopathy, lumbar region</option>
                                                        <option value="M47.896 Spondylosis, lumbar region">M47.896
                                                            Spondylosis, lumbar
                                                            region</option>
                                                        <option value="M51.06 IVD Disorder w/myelopathy lumbar">M51.06
                                                            IVD Disorder
                                                            w/myelopathy lumbar</option>
                                                        <option value="M51.26 Intervertebral disc displacement, lumbar">
                                                            M51.26
                                                            Intervertebral disc displacement, lumbar</option>
                                                        <option value="M51.36 Intervertebral disc degeneration, lumbar">
                                                            M51.36
                                                            Intervertebral disc degeneration, lumbar</option>
                                                        <option value="M54.08 Lumbar facet syndrome">M54.08 Lumbar facet
                                                            syndrome
                                                        </option>
                                                        <option value="M54.16 Low back pain">M54.16 Low back pain
                                                        </option>
                                                        <option value="S33.5XXA Lumbar spine strain">S33.5XXA Lumbar
                                                            spine strain
                                                        </option>
                                                        <option value="M54.5 Low back pain">M54.5 Low back pain</option>
                                                        <option
                                                            value="M99.03 Segmental and somatic dysfunction of lumbar region">
                                                            M99.03
                                                            Segmental and somatic dysfunction of lumbar region</option>
                                                        <option
                                                            value="M99.04 Segmental and somatic dysfunction of sacral region">
                                                            M99.04
                                                            Segmental and somatic dysfunction of sacral region</option>
                                                        <option
                                                            value="S33.5XXA Sprain of ligaments of lumbar spine, initial encounter">
                                                            S33.5XXA Sprain of ligaments of lumbar spine, initial
                                                            encounter</option>
                                                        <option
                                                            value="S33.6XXA Sprain of sacroiliac joint, inital encounter">
                                                            S33.6XXA
                                                            Sprain of sacroiliac joint, inital encounter</option>
                                                        <option
                                                            value="S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter">
                                                            S33.8XXA Sprain of other parts of lumbar spine and pelvis,
                                                            initial encounter
                                                        </option>
                                                        <option
                                                            value="S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial encounter">
                                                            S39.9XXA Sprain of unspecified parts of the lumbar spine and
                                                            pelvis, initial
                                                            encounter</option>
                                                        <option
                                                            value="S39.012A Strain of muscle, fascia and tendon of lower back, initial encounter">
                                                            S39.012A Strain of muscle, fascia and tendon of lower back,
                                                            initial
                                                            encounter</option>
                                                        <option
                                                            value="M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar region">
                                                            M51.15 Intervertebral disc disorders with radiculopathy,
                                                            thoracolumbar
                                                            region</option>
                                                        <option
                                                            value="M51.16 Intervertebral disc disorders with radiculopathy, lumbar region">
                                                            M51.16 Intervertebral disc disorders with radiculopathy,
                                                            lumbar region
                                                        </option>
                                                        <option
                                                            value="M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region">
                                                            M51.17 Intervertebral disc disorders with radiculopathy,
                                                            lumbosacral region
                                                        </option>
                                                        <option
                                                            value="M51.36 Other intervertebral disc degeneration, lumbar region">
                                                            M51.36 Other intervertebral disc degeneration, lumbar region
                                                        </option>
                                                        <option
                                                            value="M51.37 Other intervertebral disc degeneration, lumbosacral region">
                                                            M51.37 Other intervertebral disc degeneration, lumbosacral
                                                            region</option>
                                                        <option
                                                            value="M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region">
                                                            M47.816 Spondylosis without myelopathy or radiculopathy,
                                                            lumbar region
                                                        </option>
                                                        <option
                                                            value="M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region">
                                                            M47.817 Spondyloses without myelopathy or radiculopathy,
                                                            lumboscral region
                                                        </option>
                                                        <option value="M54.31 Sciatica, right side">M54.31 Sciatica,
                                                            right side</option>
                                                        <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left
                                                            side</option>
                                                        <option value="M99.03 Segmental Somatic dysfunction Lumbar">
                                                            M99.03 Segmental
                                                            Somatic dysfunction Lumbar</option>
                                                        <option value="M99.04 Segmental Somatic dysfunction SI. Sacrum">
                                                            M99.04 Segmental
                                                            Somatic dysfunction SI. Sacrum</option>
                                                        <option value="M54.41 Lumbago with sciatica, right side">M54.41
                                                            Lumbago with
                                                            sciatica, right side</option>
                                                        <option value="M54.42 Lumbago with sciatica, left side">M54.42
                                                            Lumbago with
                                                            sciatica, left side</option>
                                                        <option value="M54.16 Radiculopathy, lumbar region">M54.16
                                                            Radiculopathy, lumbar
                                                            region</option>
                                                        <option value="M54.17 Radiculopathy, lumboscral region">M54.17
                                                            Radiculopathy,
                                                            lumboscral region</option>
                                                        <option
                                                            value="M53.3 Sacrococcygeal disorders, not elsewhere classified">
                                                            M53.3
                                                            Sacrococcygeal disorders, not elsewhere classified</option>
                                                        <option
                                                            value="M53.85 Other specified dorsopathies, thoracolumbar region">
                                                            M53.85
                                                            Other specified dorsopathies, thoracolumbar region</option>
                                                        <option
                                                            value="M53.86 Other specified dorsopathies, lumbar region">
                                                            M53.86 Other
                                                            specified dorsopathies, lumbar region</option>
                                                        <option value="M48.06 Spinal stenosis, lumbar region">M48.06
                                                            Spinal stenosis,
                                                            lumbar region</option>
                                                        <option
                                                            value="M41.115 Juvenile idiopathic scoliosis, thoracolumbar region">
                                                            M41.115 Juvenile idiopathic scoliosis, thoracolumbar region
                                                        </option>
                                                        <option
                                                            value="M41.116 Juvenile idiopathic scoliosis, lumbar region">
                                                            M41.116
                                                            Juvenile idiopathic scoliosis, lumbar region</option>
                                                        <option
                                                            value="M41.127 Adolescent idiopathic scoliosis, lumbosacral region">
                                                            M41.127 Adolescent idiopathic scoliosis, lumbosacral region
                                                        </option>
                                                        <option
                                                            value="M41.45 Neuromuscular scoliosis, thoracolumbar region">
                                                            M41.45
                                                            Neuromuscular scoliosis, thoracolumbar region</option>
                                                        <option value="M41.46 Neuromuscular scoliosis, lumbar region">
                                                            M41.46
                                                            Neuromuscular scoliosis, lumbar region</option>
                                                        <option
                                                            value="M41.47 Neuromuscular scoliosis, lumbosacral region">
                                                            M41.47
                                                            Neuromuscular scoliosis, lumbosacral region</option>
                                                        <option
                                                            value="M51.26 Intervertebral disc displacement Lumbar L2-L5">
                                                            M51.26
                                                            Intervertebral disc displacement Lumbar L2-L5</option>
                                                        <option value="M51.27 Intervertebral disc displacement L5-S1">
                                                            M51.27
                                                            Intervertebral disc displacement L5-S1</option>
                                                        <option value="M51.36 Degeneration Lumbar Disc L2-L5">M51.36
                                                            Degeneration Lumbar
                                                            Disc L2-L5</option>
                                                        <option value="M51.37 Degeneration Lumbarsacral Disc L5-S1">
                                                            M51.37 Degeneration
                                                            Lumbarsacral Disc L5-S1</option>
                                                        <option value="M46.1 Sacroilitis">M46.1 Sacroilitis</option>
                                                        <option value="M53.2X7 Spinal instabilities lumbosacral region">
                                                            M53.2X7 Spinal
                                                            instabilities lumbosacral region</option>
                                                        <option value="M53.2X6 Spinal instabilities lumbar spine">
                                                            M53.2X6 Spinal
                                                            instabilities lumbar spine</option>
                                                    </select></div>
                                                <div id="dxcodepelvis4" style="display:none;"><select
                                                        style="width:300px;" id="dxcodeselectpelvis4"
                                                        name="dxcodepelvis4" style="width:260px"
                                                        onchange="selectte('pelvis','4','D');checkadd('4','pelvis');">
                                                        <option value="">Select a code</option>
                                                        <option value="add">Add...</option>
                                                        <option value="M99.04 Segmental dysf/Sublux, sacral">M99.04
                                                            Segmental
                                                            dysf/Sublux, sacral</option>
                                                        <option value="M99.05 Segmental dysf/Sublux, pelvic">M99.05
                                                            Segmental
                                                            dysf/Sublux, pelvic</option>
                                                        <option value="M43.08 Spondylosis, sacral region">M43.08
                                                            Spondylosis, sacral
                                                            region</option>
                                                        <option value="M54.31 Sciatica, right side">M54.31 Sciatica,
                                                            right side</option>
                                                        <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left
                                                            side</option>
                                                        <option value="S33.6 Sprain SI joint">S33.6 Sprain SI joint
                                                        </option>
                                                    </select></div>
                                                <div id="dxcodegeneralspinal4" style="display:none;"><select
                                                        style="width:300px;" id="dxcodeselectgeneralspinal4"
                                                        name="dxcodegeneralspinal4" style="width:260px"
                                                        onchange="selectte('generalspinal','4','D');checkadd('4','generalspinal');">
                                                        <option value="">Select a code</option>
                                                        <option value="add">Add...</option>
                                                        <option value="Q67.5 Scliosis, congenital">Q67.5 Scliosis,
                                                            congenital</option>
                                                    </select></div>
                                                <div id="dxcodeupperextremity4" style="display:none;"><select
                                                        style="width:300px;" id="dxcodeselectupperextremity4"
                                                        name="dxcodeupperextremity4" style="width:260px"
                                                        onchange="selectte('upperextremity','4','D');checkadd('4','upperextremity');">
                                                        <option value="">Select a code</option>
                                                        <option value="add">Add...</option>
                                                        <option value="M77.11 Lateral epicondylitis, right elbow">M77.11
                                                            Lateral
                                                            epicondylitis, right elbow</option>
                                                        <option value="M77.12 Lateral epicondylitis, left elbow">M77.12
                                                            Lateral
                                                            epicondylitis, left elbow</option>
                                                        <option
                                                            value="M99.07 Segmental and somatic dysfunction of upper extremity">
                                                            M99.07 Segmental and somatic dysfunction of upper extremity
                                                        </option>
                                                        <option value="G56.01 Carpal tunnel syndrome, right upper limb">
                                                            G56.01 Carpal
                                                            tunnel syndrome, right upper limb</option>
                                                        <option value="G56.02 Carpal tunnel syndrome, left upper limb">
                                                            G56.02 Carpal
                                                            tunnel syndrome, left upper limb</option>
                                                        <option value="M75.0 Adhesive capsulitis of shoulder">M75.0
                                                            Adhesive capsulitis
                                                            of shoulder</option>
                                                        <option value="M75.01 Adhesive capsulitis of right shoulder">
                                                            M75.01 Adhesive
                                                            capsulitis of right shoulder</option>
                                                        <option value="M75.02 Adhesive capsulitis of left shoulder">
                                                            M75.02 Adhesive
                                                            capsulitis of left shoulder</option>
                                                        <option value="M75.100 Unspec Rotator Cuff tear/rupture">M75.100
                                                            Unspec Rotator
                                                            Cuff tear/rupture</option>
                                                        <option
                                                            value="M75.101 Unspec Rotator Cuff tear/rupture right shoulder">
                                                            M75.101
                                                            Unspec Rotator Cuff tear/rupture right shoulder</option>
                                                        <option
                                                            value="M75.102 Unspec Rotator Cuff tear/rupture left shoulder">
                                                            M75.102
                                                            Unspec Rotator Cuff tear/rupture left shoulder</option>
                                                        <option value="M75.21 Bicipital tenosynovitis Right shoulder">
                                                            M75.21 Bicipital
                                                            tenosynovitis Right shoulder</option>
                                                        <option value="M75.22 Bicipital tenosynovitis Left shoulder">
                                                            M75.22 Bicipital
                                                            tenosynovitis Left shoulder</option>
                                                        <option value="M75.41 Impingement syndrome of Right shoulder">
                                                            M75.41 Impingement
                                                            syndrome of Right shoulder</option>
                                                        <option value="M75.42 Impingement syndrome of Left shoulder">
                                                            M75.42 Impingement
                                                            syndrome of Left shoulder</option>
                                                        <option value="M75.5 Bursitis of shoulder">M75.5 Bursitis of
                                                            shoulder</option>
                                                        <option value="M75.51 Bursitis of right shoulder">M75.51
                                                            Bursitis of right
                                                            shoulder</option>
                                                        <option value="M75.52 Bursitis of left shoulder">M75.52 Bursitis
                                                            of left
                                                            shoulder</option>
                                                        <option value="M77.01 Medial epicondylitis, right elbow">M77.01
                                                            Medial
                                                            epicondylitis, right elbow</option>
                                                        <option value="M77.02 Medial epicondylitis, left elbow">M77.02
                                                            Medial
                                                            epicondylitis, left elbow</option>
                                                        <option value="M77.11 Lateral epicondylitis, right elbow">M77.11
                                                            Lateral
                                                            epicondylitis, right elbow</option>
                                                        <option value="M77.12 Lateral epicondylitis, left elbow">M77.12
                                                            Lateral
                                                            epicondylitis, left elbow</option>
                                                        <option
                                                            value="S43.51XA Sprain of right acromioclavicular joint, initial encounter">
                                                            S43.51XA Sprain of right acromioclavicular joint, initial
                                                            encounter</option>
                                                        <option
                                                            value="S43.52XA Sprain of left acromioclavicular joint, initial encounter">
                                                            S43.52XA Sprain of left acromioclavicular joint, initial
                                                            encounter</option>
                                                        <option
                                                            value="S43.411A Sprain of right coracohumeral (ligament), inital encounter">
                                                            S43.411A Sprain of right coracohumeral (ligament), inital
                                                            encounter</option>
                                                        <option
                                                            value="S43.412A Sprain of left coracohumeral (ligament), inital encounter">
                                                            S43.412A Sprain of left coracohumeral (ligament), inital
                                                            encounter</option>
                                                        <option
                                                            value="S43.421A Sprain of right rotator cuff capsule, initial encounter">
                                                            S43.421A Sprain of right rotator cuff capsule, initial
                                                            encounter</option>
                                                        <option
                                                            value="S43.422A Sprain of left rotator cuff capsule, initial encounter">
                                                            S43.422A Sprain of left rotator cuff capsule, initial
                                                            encounter</option>
                                                        <option
                                                            value="S43.911A Right shoulder strain unspecified muscles, Acute">
                                                            S43.911A Right shoulder strain unspecified muscles, Acute
                                                        </option>
                                                        <option
                                                            value="S43.912A Left shoulder strain unspecified muscles, Acute">
                                                            S43.912A Left shoulder strain unspecified muscles, Acute
                                                        </option>
                                                        <option
                                                            value="S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right shoulder, initial">
                                                            S46.011A Strain of muscle(s) and tendon(s) of the rotator
                                                            cuff of right
                                                            shoulder, initial</option>
                                                        <option
                                                            value="S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left shoulder, initial">
                                                            S46.012A Strain of muscle(s) and tendon(s) of the rotator
                                                            cuff of left
                                                            shoulder, initial</option>
                                                        <option
                                                            value="S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of right shoulder">
                                                            S46.091A Other injury of muscle(s) and Tendon(s) of the
                                                            rotator cuff of
                                                            right shoulder</option>
                                                        <option
                                                            value="S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left shoulder">
                                                            S46.092A Other injury of muscle(s) and Tendon(s) of the
                                                            rotator cuff of left
                                                            shoulder</option>
                                                        <option
                                                            value="S46.811A Srain of other muscles, fascia and tendons at shoulder and upper arm level, right arm, initial encounter">
                                                            S46.811A Srain of other muscles, fascia and tendons at
                                                            shoulder and upper
                                                            arm level, right arm, initial encounter</option>
                                                        <option
                                                            value="S46.812A Srain of other muscles, fascia and tendons at shoulder and upper arm level, left arm, initial encounter">
                                                            S46.812A Srain of other muscles, fascia and tendons at
                                                            shoulder and upper
                                                            arm level, left arm, initial encounter</option>
                                                        <option value="M75.00 Frozen shoulder">M75.00 Frozen shoulder
                                                        </option>
                                                        <option value="M25.511 Pain in right shoulder">M25.511 Pain in
                                                            right shoulder
                                                        </option>
                                                        <option value="M25.512 Pain in left shoulder">M25.512 Pain in
                                                            left shoulder
                                                        </option>
                                                        <option value="M25.521 Pain in right elbow">M25.521 Pain in
                                                            right elbow</option>
                                                        <option value="M25.522 Pain in left elbow">M25.522 Pain in left
                                                            elbow</option>
                                                        <option value="M25.531 Pain in right wrist">M25.531 Pain in
                                                            right wrist</option>
                                                        <option value="M25.32 Pain in left wrist">M25.32 Pain in left
                                                            wrist</option>
                                                        <option value="M79.601 Pain in right arm">M79.601 Pain in right
                                                            arm</option>
                                                        <option value="M79.602 Pain in left arm">M79.602 Pain in left
                                                            arm</option>
                                                        <option value="M79.621 Pain in right upper arm">M79.621 Pain in
                                                            right upper arm
                                                        </option>
                                                        <option value="M79.622 Pain in left upper arm">M79.622 Pain in
                                                            left upper arm
                                                        </option>
                                                        <option value="M79.631 Pain in right forearm">M79.631 Pain in
                                                            right forearm
                                                        </option>
                                                        <option value="M79.632 Pain in left forearm">M79.632 Pain in
                                                            left forearm
                                                        </option>
                                                        <option value="M79.641 Pain in right hand">M79.641 Pain in right
                                                            hand</option>
                                                        <option value="M79.642 Pain in left hand">M79.642 Pain in left
                                                            hand</option>
                                                        <option value="M79.644 Pain in right finger(s)">M79.644 Pain in
                                                            right finger(s)
                                                        </option>
                                                        <option value="M79.645 Pain in left finger(s)">M79.645 Pain in
                                                            left finger(s)
                                                        </option>
                                                        <option value="M25.619 Stiffness of unspec. shoulder">M25.619
                                                            Stiffness of
                                                            unspec. shoulder</option>
                                                        <option value="M89.519 Osteolysis of shoulder">M89.519
                                                            Osteolysis of shoulder
                                                        </option>
                                                        <option value="M93.919 Osteochondropathy of shoulder">M93.919
                                                            Osteochondropathy
                                                            of shoulder</option>
                                                        <option value="M60.819 Myositis of shoulder">M60.819 Myositis of
                                                            shoulder
                                                        </option>
                                                        <option value="M67.419 Ganglion cyst of shoulder">M67.419
                                                            Ganglion cyst of
                                                            shoulder</option>
                                                        <option value="M25.019 Hamarthrosis of shoulder">M25.019
                                                            Hamarthrosis of
                                                            shoulder</option>
                                                        <option value="M25.719 Bone spur-osteophyte of shoulder">M25.719
                                                            Bone
                                                            spur-osteophyte of shoulder</option>
                                                        <option value="M75.81 Tendinitis of right shoulder">M75.81
                                                            Tendinitis of right
                                                            shoulder</option>
                                                        <option value="M75.82 Tendinitis of left shoulder">M75.82
                                                            Tendinitis of left
                                                            shoulder</option>
                                                        <option value="M13.119 Monoarthritis of shoulder region">M13.119
                                                            Monoarthritis
                                                            of shoulder region</option>
                                                        <option value="S53.031S Nursemaid's Elbow, right elbow">S53.031S
                                                            Nursemaid's
                                                            Elbow, right elbow</option>
                                                        <option value="S53.032S Nursemaid's Elbow, left elbow">S53.032S
                                                            Nursemaid's
                                                            Elbow, left elbow</option>
                                                        <option value="M25.629 Stiffness of unspec. elbow">M25.629
                                                            Stiffness of unspec.
                                                            elbow</option>
                                                        <option value="M25.029 Hemarthrosis of elbow">M25.029
                                                            Hemarthrosis of elbow
                                                        </option>
                                                        <option value="M67.429 Ganglion cyst of elbow">M67.429 Ganglion
                                                            cyst of elbow
                                                        </option>
                                                        <option value="M24.629 Ankylosis of elbow">M24.629 Ankylosis of
                                                            elbow</option>
                                                        <option value="M25.729 Bone spur of elbow">M25.729 Bone spur of
                                                            elbow</option>
                                                        <option value="M19.021 Arthriris of right elbow">M19.021
                                                            Arthriris of right
                                                            elbow</option>
                                                        <option value="M19.022 Arthritis of left elbow">M19.022
                                                            Arthritis of left elbow
                                                        </option>
                                                        <option value="M21.331 Wrist drop, right wrist">M21.331 Wrist
                                                            drop, right wrist
                                                        </option>
                                                        <option value="M21.332 Wrist drop, left wrist">M21.332 Wrist
                                                            drop, left wrist
                                                        </option>
                                                        <option value="M25.639 Stiffness of unspec. wrist">M25.639
                                                            Stiffness of unspec.
                                                            wrist</option>
                                                        <option value="M25.039 Hemarthrosis of wrist">M25.039
                                                            Hemarthrosis of wrist
                                                        </option>
                                                        <option value="M67.439 Gangolian cyst of wrist">M67.439
                                                            Gangolian cyst of wrist
                                                        </option>
                                                        <option value="M25.739 Bone spur of wrist">M25.739 Bone spur of
                                                            wrist</option>
                                                        <option value="M25.439 Effusion of unspec. wrist">M25.439
                                                            Effusion of unspec.
                                                            wrist</option>
                                                        <option value="M13.139 Monarthritis of unspec. wrist">M13.139
                                                            Monarthritis of
                                                            unspec. wrist</option>
                                                        <option value="M25.539 Arthralgia of wrist">M25.539 Arthralgia
                                                            of wrist</option>
                                                    </select></div>
                                                <div id="dxcodelowerextremity4" style="display:none;"><select
                                                        style="width:300px;" id="dxcodeselectlowerextremity4"
                                                        name="dxcodelowerextremity4" style="width:260px"
                                                        onchange="selectte('lowerextremity','4','D');checkadd('4','lowerextremity');">
                                                        <option value="">Select a code</option>
                                                        <option value="add">Add...</option>
                                                        <option value="M72.2 Planter fascitis">M72.2 Planter fascitis
                                                        </option>
                                                        <option value="S93.01XA Subluxation right ankle/foot">S93.01XA
                                                            Subluxation right
                                                            ankle/foot</option>
                                                        <option value="S93.02XA Subluxation left ankle/foot">S93.02XA
                                                            Subluxation left
                                                            ankle/foot</option>
                                                        <option
                                                            value="M99.06 Segmental and somatic dysfunction of lower extremity">
                                                            M99.06 Segmental and somatic dysfunction of lower extremity
                                                        </option>
                                                        <option value="M76.61 Achilles Tendinitis, Right Leg">M76.61
                                                            Achilles
                                                            Tendinitis, Right Leg</option>
                                                        <option value="M76.62 Achilles Tendinitis, Left Leg">M76.62
                                                            Achilles Tendinitis,
                                                            Left Leg</option>
                                                        <option
                                                            value="S73.191A Other sprain of right hip, initial encounter">
                                                            S73.191A
                                                            Other sprain of right hip, initial encounter</option>
                                                        <option
                                                            value="S73.192A Other sprain of left hip, initial encounter">
                                                            S73.192A
                                                            Other sprain of left hip, initial encounter</option>
                                                        <option
                                                            value="S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter">
                                                            S76.011A Strain of muscle, fascia and tendon of right hip,
                                                            initial encounter
                                                        </option>
                                                        <option
                                                            value="S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter">
                                                            S76.012A Strain of muscle, fascia and tendon of left hip,
                                                            initial encounter
                                                        </option>
                                                        <option
                                                            value="S83.91XA Sprain of unspecified site of right knee, initial encounter">
                                                            S83.91XA Sprain of unspecified site of right knee, initial
                                                            encounter
                                                        </option>
                                                        <option
                                                            value="S83.92XA Sprain of unspecified site of left knee, initial encounter">
                                                            S83.92XA Sprain of unspecified site of left knee, initial
                                                            encounter</option>
                                                        <option value="M79.604 Pain in right leg">M79.604 Pain in right
                                                            leg</option>
                                                        <option value="M79.605 Pain in left leg">M79.605 Pain in left
                                                            leg</option>
                                                        <option value="M79.651 Pain in right thigh">M79.651 Pain in
                                                            right thigh</option>
                                                        <option value="M79.652 Pain in left thigh">M79.652 Pain in left
                                                            thigh</option>
                                                        <option value="M79.661 Pain in right lower leg">M79.661 Pain in
                                                            right lower leg
                                                        </option>
                                                        <option value="M79.662 Pain in left lower leg">M79.662 Pain in
                                                            left lower leg
                                                        </option>
                                                        <option value="M79.671 Pain in right foot">M79.671 Pain in right
                                                            foot</option>
                                                        <option value="M79.672 Pain in left foot">M79.672 Pain in left
                                                            foot</option>
                                                        <option value="M79.674 Pain in right toes">M79.674 Pain in right
                                                            toes</option>
                                                        <option value="M79.675 Pain in left toes">M79.675 Pain in left
                                                            toes</option>
                                                        <option value="M25.551 Pain in right hip">M25.551 Pain in right
                                                            hip</option>
                                                        <option value="M25.552 Pain in left hip">M25.552 Pain in left
                                                            hip</option>
                                                        <option value="M25.561 Pain in right knee">M25.561 Pain in right
                                                            knee</option>
                                                        <option value="M25.562 Pain in left knee">M25.562 Pain in left
                                                            knee</option>
                                                        <option value="M25.571 Pain in right ankle">M25.571 Pain in
                                                            right ankle</option>
                                                        <option value="M25.572 Pain in left ankle">M25.572 Pain in left
                                                            ankle</option>
                                                        <option value="M76.31 Iliotibial band syndrome, right leg">
                                                            M76.31 Iliotibial
                                                            band syndrome, right leg</option>
                                                        <option value="M76.32 Iliotibial band syndrome, left leg">M76.32
                                                            Iliotibial band
                                                            syndrome, left leg</option>
                                                        <option value="M70.50 Bursitis of unspec. knee">M70.50 Bursitis
                                                            of unspec. knee
                                                        </option>
                                                        <option value="M25.069 Hemarthrosis of unspec. knee">M25.069
                                                            Hemarthrosis of
                                                            unspec. knee</option>
                                                        <option value="M94.269 Chondromalacia of unspec. knee">M94.269
                                                            Chondromalacia of
                                                            unspec. knee</option>
                                                        <option value="M67.469 Gangolian cyst of unspec. knee">M67.469
                                                            Gangolian cyst of
                                                            unspec. knee</option>
                                                        <option value="M25.760 Bone spur of unspec. knee">M25.760 Bone
                                                            spur of unspec.
                                                            knee</option>
                                                        <option value="M23.40 Loose body in spec. knee">M23.40 Loose
                                                            body in spec. knee
                                                        </option>
                                                        <option value="M25.669 Stiffness of unspec. knee">M25.669
                                                            Stiffness of unspec.
                                                            knee</option>
                                                        <option value="M70.51 Bursitis of right knee">M70.51 Bursitis of
                                                            right knee
                                                        </option>
                                                        <option value="M70.52 Bursitis of left knee">M70.52 Bursitis of
                                                            left knee
                                                        </option>
                                                        <option value="M21.371 Foot drop right foot">M21.371 Foot drop
                                                            right foot
                                                        </option>
                                                        <option value="M21.372 Foot drop left foot">M21.372 Foot drop
                                                            left foot</option>
                                                        <option value="Q72.70 Cleft foot-split foot">Q72.70 Cleft
                                                            foot-split foot
                                                        </option>
                                                        <option value="S90.30XA Contusion of foot">S90.30XA Contusion of
                                                            foot</option>
                                                        <option value="M25.076 Hemarthrosis of unspec. foot">M25.076
                                                            Hemarthrosis of
                                                            unspec. foot</option>
                                                        <option value="M25.776 Bone spur of foot">M25.776 Bone spur of
                                                            foot</option>
                                                        <option value="T69.021A Immersion of right foot">T69.021A
                                                            Immersion of right
                                                            foot</option>
                                                        <option value="T69.022A Immersion of left foot">T69.022A
                                                            Immersion of left foot
                                                        </option>
                                                    </select></div>
                                                <div id="dxcodeheadache4" style="display:none;"><select
                                                        style="width:300px;" id="dxcodeselectheadache4"
                                                        name="dxcodeheadache4" style="width:260px"
                                                        onchange="selectte('headache','4','D');checkadd('4','headache');">
                                                        <option value="">Select a code</option>
                                                        <option value="add">Add...</option>
                                                        <option value="G43.001 Migraine">G43.001 Migraine</option>
                                                        <option value="G44.209 Tension-type headache">G44.209
                                                            Tension-type headache
                                                        </option>
                                                        <option value="G44.89 Headache">G44.89 Headache</option>
                                                        <option value="R42 Dizziness">R42 Dizziness</option>
                                                        <option value="R51 Headache">R51 Headache</option>
                                                        <option
                                                            value="G44.201 Tension-Type Headache, unspecified, intractable">
                                                            G44.201
                                                            Tension-Type Headache, unspecified, intractable</option>
                                                        <option
                                                            value="G44.209 Tension-Type Headache, unspecified, not intractable">
                                                            G44.209 Tension-Type Headache, unspecified, not intractable
                                                        </option>
                                                        <option
                                                            value="G43.001 Migraine without aura, not intractable, with status migrainosus">
                                                            G43.001 Migraine without aura, not intractable, with status
                                                            migrainosus
                                                        </option>
                                                        <option
                                                            value="G43.009 Migraine without aura, not intractable, without status migrainosus">
                                                            G43.009 Migraine without aura, not intractable, without
                                                            status migrainosus
                                                        </option>
                                                        <option
                                                            value="G43.011 Migraine without aura, intractable, with status migrainosus">
                                                            G43.011 Migraine without aura, intractable, with status
                                                            migrainosus</option>
                                                        <option
                                                            value="G43.019 Migraine without aura, intractable, without status migrainosus">
                                                            G43.019 Migraine without aura, intractable, without status
                                                            migrainosus
                                                        </option>
                                                        <option
                                                            value="G43.101 Migraine with aura, not intractable, with status migrainosus">
                                                            G43.101 Migraine with aura, not intractable, with status
                                                            migrainosus
                                                        </option>
                                                        <option
                                                            value="G43.109 Migraine with aura, not intractable, without status migrainosus">
                                                            G43.109 Migraine with aura, not intractable, without status
                                                            migrainosus
                                                        </option>
                                                        <option
                                                            value="G43.111 Migraine with aura, intractable, with status migrainosus">
                                                            G43.111 Migraine with aura, intractable, with status
                                                            migrainosus</option>
                                                        <option
                                                            value="G43.119 Migraine with aura, intractable, without status migrainosus">
                                                            G43.119 Migraine with aura, intractable, without status
                                                            migrainosus</option>
                                                        <option value="G44.219 Tension Headache episodic">G44.219
                                                            Tension Headache
                                                            episodic</option>
                                                        <option value="G44.229 Tension Headache chronic">G44.229 Tension
                                                            Headache
                                                            chronic</option>
                                                        <option value="G44.319 Acute post-traumatic headache">G44.319
                                                            Acute
                                                            post-traumatic headache</option>
                                                        <option value="G44.329 Chronic post-traumatic headache">G44.329
                                                            Chronic
                                                            post-traumatic headache</option>
                                                        <option value="S06.0X0A Mild concussion (no loc) acute">S06.0X0A
                                                            Mild concussion
                                                            (no loc) acute</option>
                                                        <option value="S06.0X1A Mild concussion (LOC<30MINS)">S06.0X1A
                                                            Mild concussion
                                                            (LOC<30MINS)< /option>
                                                        <option value="F07.81 Post-Concussion Syndrome">F07.81
                                                            Post-Concussion Syndrome
                                                        </option>
                                                        <option value="H53.8 Blurry Vision">H53.8 Blurry Vision</option>
                                                        <option value="H93.19 Tinnitus unspecified">H93.19 Tinnitus
                                                            unspecified</option>
                                                    </select></div>
                                                <div id="dxcodegeneral4" style="display:none;"><select
                                                        style="width:300px;" id="dxcodeselectgeneral4"
                                                        name="dxcodegeneral4" style="width:260px"
                                                        onchange="selectte('general','4','D');checkadd('4','general');">
                                                        <option value="">Select a code</option>
                                                        <option value="add">Add...</option>
                                                        <option value="M62.830 Muscle spasm of the back">M62.830 Muscle
                                                            spasm of the
                                                            back</option>
                                                        <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                                        <option value="R42 Vertigo, dizziness & giddiness">R42 Vertigo,
                                                            dizziness &
                                                            giddiness</option>
                                                        <option value="M62.830 Muscle spasm of back">M62.830 Muscle
                                                            spasm of back
                                                        </option>
                                                        <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                                        <option value="M79.7 Fibromyalgia">M79.7 Fibromyalgia</option>
                                                        <option value="M72.8 Fascitis">M72.8 Fascitis</option>
                                                        <option value="M25.2 Limb cramp or spasm">M25.2 Limb cramp or
                                                            spasm</option>
                                                        <option
                                                            value="M62.40 Muscle contracture (neck, thoracic, lumbar)">
                                                            M62.40 Muscle
                                                            contracture (neck, thoracic, lumbar)</option>
                                                        <option
                                                            value="M25.50 Unspecified Joint(s) tender/painful (NK/MBLB)">
                                                            M25.50
                                                            Unspecified Joint(s) tender/painful (NK/MBLB)</option>
                                                        <option value="M25.60 Joint(s) stiff (next, thoracic, lumbar)">
                                                            M25.60 Joint(s)
                                                            stiff (next, thoracic, lumbar)</option>
                                                        <option value="M35.7 Hypermobility syndrome">M35.7 Hypermobility
                                                            syndrome
                                                        </option>
                                                        <option
                                                            value="M81.0 Age related osteoporosis w/o pathological fracture">
                                                            M81.0
                                                            Age related osteoporosis w/o pathological fracture</option>
                                                        <option
                                                            value="M99.05 Segmental and comatic dysfunction of pelvic region">
                                                            M99.05
                                                            Segmental and comatic dysfunction of pelvic region</option>
                                                        <option value="R20.1 Hypoesthesia of skin">R20.1 Hypoesthesia of
                                                            skin</option>
                                                        <option value="R20.2 Spin parethesia">R20.2 Spin parethesia
                                                        </option>
                                                        <option value="R20.3 Hyperesthesia of skin">R20.3 Hyperesthesia
                                                            of skin</option>
                                                        <option value="R26.81 Unsteady on feet">R26.81 Unsteady on feet
                                                        </option>
                                                        <option value="R26.2 Difficulty Walking">R26.2 Difficulty
                                                            Walking</option>
                                                    </select></div>
                                                <div id="addcodediv4" style="display:none;">
                                                    <table width="300" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td width="200"><input id="dxcodeadd4" name="dxcodeadd4"
                                                                    style="width:200px" value=""></td>
                                                            <td align="center" width="40"><img src="nlimages/delete.png"
                                                                    width="15" height="15" onclick="hideadd('4','');">
                                                            </td>
                                                            <td width="60" align="right"><a href="#">Manage</a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                            <td bgcolor="#f1f1f1" width="59%">
                                                <input type="hidden" name="showpointersD" id="showpointersD">
                                                <div id="showpointerdivD"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border-left:1px solid black;padding:5px;">
                                    <div id="showunits3"></div>
                                </td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="5" width="100%">
                        <tr>
                            <td width="6%" align="center"><b>E</b></td>
                            <td width="15%"><select name="dxcategory5" id="dx5"
                                    onchange="populateselect('5');exampopulate();">
                                    <option value=""></option>
                                    <option value="cervical">Cervical</option>
                                    <option value="thoracic">Thoracic</option>
                                    <option value="lumbar">Lumbar/SI</option>
                                    <option value="pelvis">Pelvis Sacrum Coccyx</option>
                                    <option value="generalspinal">General Spinal</option>
                                    <option value="upperextremity">Upper Extremity</option>
                                    <option value="lowerextremity">Lower Extremity</option>
                                    <option value="headache">Headache</option>
                                    <option value="general">General</option>
                                </select></td>
                            <td width="20%">
                                <div id="dxcodedefault5" style="display:block;"><select style="width:300px;">
                                        <option value="" selected>Select a category for codes</option>
                                    </select></div>
                                <div id="dxcodecervical5" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectcervical5" name="dxcodecervical5" style="width:260px"
                                        onchange="selectte('cervical','5','E');checkadd('5','cervical');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="G54.0 Brachial Plexus disorders">G54.0 Brachial Plexus
                                            disorders</option>
                                        <option value="G54.2 Cervical root disorders">G54.2 Cervical root disorders
                                        </option>
                                        <option value="M40.292 Cervical kyphosis, other">M40.292 Cervical kyphosis,
                                            other</option>
                                        <option value="M43.12 Sponylolisthesis, cervical region">M43.12
                                            Sponylolisthesis, cervical region</option>
                                        <option value="M43.6 Torticollis">M43.6 Torticollis</option>
                                        <option value="M46.02 Spinal enthesopathy, cervical region">M46.02 Spinal
                                            enthesopathy, cervical region</option>
                                        <option value="M47.12 Spondylosis w/out myelopathy, cervical region">M47.12
                                            Spondylosis w/out myelopathy, cervical region</option>
                                        <option value="M48.02 Spinal Stenosis, cervical region (C3-C7)">M48.02
                                            Spinal Stenosis, cervical region (C3-C7)</option>
                                        <option value="M48.32 Traumatic spondylopathy, cervical region">M48.32
                                            Traumatic spondylopathy, cervical region</option>
                                        <option value="M50.01 IVD disorder w/ myelopathy Cervical">M50.01 IVD
                                            disorder w/ myelopathy Cervical</option>
                                        <option value="M50.12 Cervical disc disorder w/ radiculopathy">M50.12
                                            Cervical disc disorder w/ radiculopathy</option>
                                        <option value="M50.20 Cervical disc displacement">M50.20 Cervical disc
                                            displacement</option>
                                        <option value="M50.30 Cervical disc disgnereation">M50.30 Cervical disc
                                            disgnereation</option>
                                        <option value="M50.90 Cervical disc disorder">M50.90 Cervical disc disorder
                                        </option>
                                        <option value="M53.0 Cervicocranial syndrome">M53.0 Cervicocranial syndrome
                                        </option>
                                        <option value="M53.1 Cervicobrachial syndrome">M53.1 Cervicobrachial
                                            syndrome</option>
                                        <option value="M54.12 Radiculopathy, cervical region">M54.12 Radiculopathy,
                                            cervical region</option>
                                        <option value="M54.2 Cervicalgia">M54.2 Cervicalgia</option>
                                        <option value="M62.838 Muscle spasm, other">M62.838 Muscle spasm, other
                                        </option>
                                        <option value="S13.4XXA Cervical sprain">S13.4XXA Cervical sprain</option>
                                        <option value="S14.2XXA Nerve root injury, cervical">S14.2XXA Nerve root
                                            injury, cervical</option>
                                        <option value="S143.XXA Brachial plexus injury">S143.XXA Brachial plexus
                                            injury</option>
                                        <option value="S16.1XXA Strain, Neck muscles">S16.1XXA Strain, Neck muscles
                                        </option>
                                        <option value="M99.00 Segmental Somatic Dysfunction Occiptal-Head">M99.00
                                            Segmental Somatic Dysfunction Occiptal-Head</option>
                                        <option value="M99.01 Segmental Somatic Dysfunction of Cervical Region">
                                            M99.01 Segmental Somatic Dysfunction of Cervical Region</option>
                                        <option
                                            value="S13.4XXA Spain of ligaments of cervical spine, initial encounter">
                                            S13.4XXA Spain of ligaments of cervical spine, initial encounter
                                        </option>
                                        <option
                                            value="S16.1XXA Strain of muscle, fascia and tendon at next level, initial encounter">
                                            S16.1XXA Strain of muscle, fascia and tendon at next level, initial
                                            encounter</option>
                                        <option value="S14.2XXA Injury nerve root cervical, initial encounter">
                                            S14.2XXA Injury nerve root cervical, initial encounter</option>
                                        <option value="G54.1 Nerve root lesion cervical">G54.1 Nerve root lesion
                                            cervical</option>
                                        <option value="M50.33 Disc degeneration cervicothoracic region">M50.33 Disc
                                            degeneration cervicothoracic region</option>
                                        <option value="M50.22 Cervical disc displacement C3-C7">M50.22 Cervical disc
                                            displacement C3-C7</option>
                                        <option value="M50.23 Cervical disc displacement C7-T1">M50.23 Cervical disc
                                            displacement C7-T1</option>
                                        <option value="M50.31 Cervical disc degeneration C2-C4">M50.31 Cervical disc
                                            degeneration C2-C4</option>
                                        <option value="M50.32 Cervical disc degeneration C3-C7">M50.32 Cervical disc
                                            degeneration C3-C7</option>
                                        <option value="M50.33 Cervical disc degeneration C7-T1">M50.33 Cervical disc
                                            degeneration C7-T1</option>
                                        <option value="M53.2X2 Cervical spine instabilities">M53.2X2 Cervical spine
                                            instabilities</option>
                                        <option value="M40.202 Kyphosis unspecified cervical">M40.202 Kyphosis
                                            unspecified cervical</option>
                                        <option value="S13.4XXS Sequela sprain neck ligaments">S13.4XXS Sequela
                                            sprain neck ligaments</option>
                                        <option
                                            value="M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial region">
                                            M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial
                                            region</option>
                                        <option
                                            value="M50.12 Cervical disc disorder with radiculopathy, mid-cervical region">
                                            M50.12 Cervical disc disorder with radiculopathy, mid-cervical region
                                        </option>
                                        <option
                                            value="M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region">
                                            M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region
                                        </option>
                                        <option
                                            value="M50.31 Other cervical disc degeneration, occipito-atlanto-axial region">
                                            M50.31 Other cervical disc degeneration, occipito-atlanto-axial region
                                        </option>
                                        <option value="M50.32 Other cervical disc degeneration, mid-cervical region">
                                            M50.32 Other cervical disc degeneration, mid-cervical region</option>
                                        <option value="M50.33 Other cervical disc degeneration, cervicothoracic region">
                                            M50.33 Other cervical disc degeneration, cervicothoracic region</option>
                                    </select></div>
                                <div id="dxcodethoracic5" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectthoracic5" name="dxcodethoracic5" style="width:260px"
                                        onchange="selectte('thoracic','5','E');checkadd('5','thoracic');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M99.02 Segmental dysf./Sublux, thoracic">M99.02 Segmental
                                            dysf./Sublux, thoracic</option>
                                        <option value="G54.3 Thoracic root disorders">G54.3 Thoracic root disorders
                                        </option>
                                        <option value="M43.14 Spondylolistesis, thoracic region">M43.14
                                            Spondylolistesis, thoracic region</option>
                                        <option value="M46.04 Spinal enthesopathy, thoracic region">M46.04 Spinal
                                            enthesopathy, thoracic region</option>
                                        <option value="M47.24 Spondylosis w/ radiculopathy, thoracic region">M47.24
                                            Spondylosis w/ radiculopathy, thoracic region</option>
                                        <option value="M47.814 Spondylosis w/out mwelopathy, thoracic">M47.814
                                            Spondylosis w/out mwelopathy, thoracic</option>
                                        <option value="M48.04 Spinal stenosis, thoracic region (T1-G12)">M48.04
                                            Spinal stenosis, thoracic region (T1-G12)</option>
                                        <option value="M51.34 Intervertebral disc degeneration, thoracic region">
                                            M51.34 Intervertebral disc degeneration, thoracic region</option>
                                        <option value="M51.84 IVD Thoracic">M51.84 IVD Thoracic</option>
                                        <option value="M54.14 Radiculopathy, thoracic">M54.14 Radiculopathy,
                                            thoracic</option>
                                        <option value="M54.6 Pain in thoracic spine">M54.6 Pain in thoracic spine
                                        </option>
                                        <option value="S23.3XXA Thoracic spine">S23.3XXA Thoracic spine</option>
                                        <option value="S24.2XXA Nerve root injury, thoracic">S24.2XXA Nerve root
                                            injury, thoracic</option>
                                        <option value="MS4.6 Pain in Thoracic spine">MS4.6 Pain in Thoracic spine
                                        </option>
                                        <option value="M99.02 Segmental and somatic dysfunction of the thoracic region">
                                            M99.02 Segmental and somatic dysfunction of the thoracic region</option>
                                        <option value="M99.08 Segmental and somatic dysfunction of rib cage">M99.08
                                            Segmental and somatic dysfunction of rib cage</option>
                                        <option
                                            value="S23.3XXA Sprain of ligaments of thoracic spine, initial encounter">
                                            S23.3XXA Sprain of ligaments of thoracic spine, initial encounter
                                        </option>
                                        <option value="S23.41XA Sprain of ribs, initial encounter">S23.41XA Sprain
                                            of ribs, initial encounter</option>
                                        <option value="S23.421A Sprain of chrondrosternal joint, initial encounter">
                                            S23.421A Sprain of chrondrosternal joint, initial encounter</option>
                                        <option
                                            value="M51.14 Intervertebral disc disorders with radiculopathy, thoracic region">
                                            M51.14 Intervertebral disc disorders with radiculopathy, thoracic region
                                        </option>
                                        <option value="M53.84 Other specified dorsopathies, thoracic region">M53.84
                                            Other specified dorsopathies, thoracic region</option>
                                        <option value="M41.114 Juvenile idiopathic scoliosis, thoracic region">
                                            M41.114 Juvenile idiopathic scoliosis, thoracic region</option>
                                        <option value="M41.124 Adolescent idiopathic scoliosis, thoracic region">
                                            M41.124 Adolescent idiopathic scoliosis, thoracic region</option>
                                        <option value="M41.44 Neuromuscular scoliosis, thoracic region">M41.44
                                            Neuromuscular scoliosis, thoracic region</option>
                                        <option value="M40.00 Kyphosis postural acquired">M40.00 Kyphosis postural
                                            acquired</option>
                                        <option value="M40.04 Postural kyphosis thoracic">M40.04 Postural kyphosis
                                            thoracic</option>
                                        <option value="M40.03 Cervicothoracic">M40.03 Cervicothoracic</option>
                                        <option value="S29.012A Strain muscle-tendon back wall thorax acute">
                                            S29.012A Strain muscle-tendon back wall thorax acute</option>
                                        <option value="G43.3 Nerve root disorder-thoracic">G43.3 Nerve root
                                            disorder-thoracic</option>
                                        <option value="M53.2X4 Spinal instabilities thoracic region">M53.2X4 Spinal
                                            instabilities thoracic region</option>
                                    </select></div>
                                <div id="dxcodelumbar5" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectlumbar5" name="dxcodelumbar5" style="width:260px"
                                        onchange="selectte('lumbar','5','E');checkadd('5','lumbar');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="G54.1 Lumbosacral plexus disorders">G54.1 Lumbosacral plexus
                                            disorders</option>
                                        <option value="G54.4 Lumbosacral root disorders">G54.4 Lumbosacral root
                                            disorders</option>
                                        <option value="M43.16 Spondylolisthesis, lumbar region">M43.16
                                            Spondylolisthesis, lumbar region</option>
                                        <option value="M46.06 Spinal enthesopathy, lumbar region">M46.06 Spinal
                                            enthesopathy, lumbar region</option>
                                        <option value="M47.896 Spondylosis, lumbar region">M47.896 Spondylosis,
                                            lumbar region</option>
                                        <option value="M51.06 IVD Disorder w/myelopathy lumbar">M51.06 IVD Disorder
                                            w/myelopathy lumbar</option>
                                        <option value="M51.26 Intervertebral disc displacement, lumbar">M51.26
                                            Intervertebral disc displacement, lumbar</option>
                                        <option value="M51.36 Intervertebral disc degeneration, lumbar">M51.36
                                            Intervertebral disc degeneration, lumbar</option>
                                        <option value="M54.08 Lumbar facet syndrome">M54.08 Lumbar facet syndrome
                                        </option>
                                        <option value="M54.16 Low back pain">M54.16 Low back pain</option>
                                        <option value="S33.5XXA Lumbar spine strain">S33.5XXA Lumbar spine strain
                                        </option>
                                        <option value="M54.5 Low back pain">M54.5 Low back pain</option>
                                        <option value="M99.03 Segmental and somatic dysfunction of lumbar region">
                                            M99.03 Segmental and somatic dysfunction of lumbar region</option>
                                        <option value="M99.04 Segmental and somatic dysfunction of sacral region">
                                            M99.04 Segmental and somatic dysfunction of sacral region</option>
                                        <option value="S33.5XXA Sprain of ligaments of lumbar spine, initial encounter">
                                            S33.5XXA Sprain of ligaments of lumbar spine, initial encounter</option>
                                        <option value="S33.6XXA Sprain of sacroiliac joint, inital encounter">
                                            S33.6XXA Sprain of sacroiliac joint, inital encounter</option>
                                        <option
                                            value="S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter">
                                            S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial
                                            encounter</option>
                                        <option
                                            value="S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial encounter">
                                            S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis,
                                            initial encounter</option>
                                        <option
                                            value="S39.012A Strain of muscle, fascia and tendon of lower back, initial encounter">
                                            S39.012A Strain of muscle, fascia and tendon of lower back, initial
                                            encounter</option>
                                        <option
                                            value="M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar region">
                                            M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar
                                            region</option>
                                        <option
                                            value="M51.16 Intervertebral disc disorders with radiculopathy, lumbar region">
                                            M51.16 Intervertebral disc disorders with radiculopathy, lumbar region
                                        </option>
                                        <option
                                            value="M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region">
                                            M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral
                                            region</option>
                                        <option value="M51.36 Other intervertebral disc degeneration, lumbar region">
                                            M51.36 Other intervertebral disc degeneration, lumbar region</option>
                                        <option
                                            value="M51.37 Other intervertebral disc degeneration, lumbosacral region">
                                            M51.37 Other intervertebral disc degeneration, lumbosacral region
                                        </option>
                                        <option
                                            value="M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region">
                                            M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region
                                        </option>
                                        <option
                                            value="M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region">
                                            M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral
                                            region</option>
                                        <option value="M54.31 Sciatica, right side">M54.31 Sciatica, right side
                                        </option>
                                        <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left side
                                        </option>
                                        <option value="M99.03 Segmental Somatic dysfunction Lumbar">M99.03 Segmental
                                            Somatic dysfunction Lumbar</option>
                                        <option value="M99.04 Segmental Somatic dysfunction SI. Sacrum">M99.04
                                            Segmental Somatic dysfunction SI. Sacrum</option>
                                        <option value="M54.41 Lumbago with sciatica, right side">M54.41 Lumbago with
                                            sciatica, right side</option>
                                        <option value="M54.42 Lumbago with sciatica, left side">M54.42 Lumbago with
                                            sciatica, left side</option>
                                        <option value="M54.16 Radiculopathy, lumbar region">M54.16 Radiculopathy,
                                            lumbar region</option>
                                        <option value="M54.17 Radiculopathy, lumboscral region">M54.17
                                            Radiculopathy, lumboscral region</option>
                                        <option value="M53.3 Sacrococcygeal disorders, not elsewhere classified">
                                            M53.3 Sacrococcygeal disorders, not elsewhere classified</option>
                                        <option value="M53.85 Other specified dorsopathies, thoracolumbar region">
                                            M53.85 Other specified dorsopathies, thoracolumbar region</option>
                                        <option value="M53.86 Other specified dorsopathies, lumbar region">M53.86
                                            Other specified dorsopathies, lumbar region</option>
                                        <option value="M48.06 Spinal stenosis, lumbar region">M48.06 Spinal
                                            stenosis, lumbar region</option>
                                        <option value="M41.115 Juvenile idiopathic scoliosis, thoracolumbar region">
                                            M41.115 Juvenile idiopathic scoliosis, thoracolumbar region</option>
                                        <option value="M41.116 Juvenile idiopathic scoliosis, lumbar region">M41.116
                                            Juvenile idiopathic scoliosis, lumbar region</option>
                                        <option value="M41.127 Adolescent idiopathic scoliosis, lumbosacral region">
                                            M41.127 Adolescent idiopathic scoliosis, lumbosacral region</option>
                                        <option value="M41.45 Neuromuscular scoliosis, thoracolumbar region">M41.45
                                            Neuromuscular scoliosis, thoracolumbar region</option>
                                        <option value="M41.46 Neuromuscular scoliosis, lumbar region">M41.46
                                            Neuromuscular scoliosis, lumbar region</option>
                                        <option value="M41.47 Neuromuscular scoliosis, lumbosacral region">M41.47
                                            Neuromuscular scoliosis, lumbosacral region</option>
                                        <option value="M51.26 Intervertebral disc displacement Lumbar L2-L5">M51.26
                                            Intervertebral disc displacement Lumbar L2-L5</option>
                                        <option value="M51.27 Intervertebral disc displacement L5-S1">M51.27
                                            Intervertebral disc displacement L5-S1</option>
                                        <option value="M51.36 Degeneration Lumbar Disc L2-L5">M51.36 Degeneration
                                            Lumbar Disc L2-L5</option>
                                        <option value="M51.37 Degeneration Lumbarsacral Disc L5-S1">M51.37
                                            Degeneration Lumbarsacral Disc L5-S1</option>
                                        <option value="M46.1 Sacroilitis">M46.1 Sacroilitis</option>
                                        <option value="M53.2X7 Spinal instabilities lumbosacral region">M53.2X7
                                            Spinal instabilities lumbosacral region</option>
                                        <option value="M53.2X6 Spinal instabilities lumbar spine">M53.2X6 Spinal
                                            instabilities lumbar spine</option>
                                    </select></div>
                                <div id="dxcodepelvis5" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectpelvis5" name="dxcodepelvis5" style="width:260px"
                                        onchange="selectte('pelvis','5','E');checkadd('5','pelvis');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M99.04 Segmental dysf/Sublux, sacral">M99.04 Segmental
                                            dysf/Sublux, sacral</option>
                                        <option value="M99.05 Segmental dysf/Sublux, pelvic">M99.05 Segmental
                                            dysf/Sublux, pelvic</option>
                                        <option value="M43.08 Spondylosis, sacral region">M43.08 Spondylosis, sacral
                                            region</option>
                                        <option value="M54.31 Sciatica, right side">M54.31 Sciatica, right side
                                        </option>
                                        <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left side
                                        </option>
                                        <option value="S33.6 Sprain SI joint">S33.6 Sprain SI joint</option>
                                    </select></div>
                                <div id="dxcodegeneralspinal5" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectgeneralspinal5" name="dxcodegeneralspinal5" style="width:260px"
                                        onchange="selectte('generalspinal','5','E');checkadd('5','generalspinal');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="Q67.5 Scliosis, congenital">Q67.5 Scliosis, congenital
                                        </option>
                                    </select></div>
                                <div id="dxcodeupperextremity5" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectupperextremity5" name="dxcodeupperextremity5"
                                        style="width:260px"
                                        onchange="selectte('upperextremity','5','E');checkadd('5','upperextremity');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M77.11 Lateral epicondylitis, right elbow">M77.11 Lateral
                                            epicondylitis, right elbow</option>
                                        <option value="M77.12 Lateral epicondylitis, left elbow">M77.12 Lateral
                                            epicondylitis, left elbow</option>
                                        <option value="M99.07 Segmental and somatic dysfunction of upper extremity">
                                            M99.07 Segmental and somatic dysfunction of upper extremity</option>
                                        <option value="G56.01 Carpal tunnel syndrome, right upper limb">G56.01
                                            Carpal tunnel syndrome, right upper limb</option>
                                        <option value="G56.02 Carpal tunnel syndrome, left upper limb">G56.02 Carpal
                                            tunnel syndrome, left upper limb</option>
                                        <option value="M75.0 Adhesive capsulitis of shoulder">M75.0 Adhesive
                                            capsulitis of shoulder</option>
                                        <option value="M75.01 Adhesive capsulitis of right shoulder">M75.01 Adhesive
                                            capsulitis of right shoulder</option>
                                        <option value="M75.02 Adhesive capsulitis of left shoulder">M75.02 Adhesive
                                            capsulitis of left shoulder</option>
                                        <option value="M75.100 Unspec Rotator Cuff tear/rupture">M75.100 Unspec
                                            Rotator Cuff tear/rupture</option>
                                        <option value="M75.101 Unspec Rotator Cuff tear/rupture right shoulder">
                                            M75.101 Unspec Rotator Cuff tear/rupture right shoulder</option>
                                        <option value="M75.102 Unspec Rotator Cuff tear/rupture left shoulder">
                                            M75.102 Unspec Rotator Cuff tear/rupture left shoulder</option>
                                        <option value="M75.21 Bicipital tenosynovitis Right shoulder">M75.21
                                            Bicipital tenosynovitis Right shoulder</option>
                                        <option value="M75.22 Bicipital tenosynovitis Left shoulder">M75.22
                                            Bicipital tenosynovitis Left shoulder</option>
                                        <option value="M75.41 Impingement syndrome of Right shoulder">M75.41
                                            Impingement syndrome of Right shoulder</option>
                                        <option value="M75.42 Impingement syndrome of Left shoulder">M75.42
                                            Impingement syndrome of Left shoulder</option>
                                        <option value="M75.5 Bursitis of shoulder">M75.5 Bursitis of shoulder
                                        </option>
                                        <option value="M75.51 Bursitis of right shoulder">M75.51 Bursitis of right
                                            shoulder</option>
                                        <option value="M75.52 Bursitis of left shoulder">M75.52 Bursitis of left
                                            shoulder</option>
                                        <option value="M77.01 Medial epicondylitis, right elbow">M77.01 Medial
                                            epicondylitis, right elbow</option>
                                        <option value="M77.02 Medial epicondylitis, left elbow">M77.02 Medial
                                            epicondylitis, left elbow</option>
                                        <option value="M77.11 Lateral epicondylitis, right elbow">M77.11 Lateral
                                            epicondylitis, right elbow</option>
                                        <option value="M77.12 Lateral epicondylitis, left elbow">M77.12 Lateral
                                            epicondylitis, left elbow</option>
                                        <option
                                            value="S43.51XA Sprain of right acromioclavicular joint, initial encounter">
                                            S43.51XA Sprain of right acromioclavicular joint, initial encounter
                                        </option>
                                        <option
                                            value="S43.52XA Sprain of left acromioclavicular joint, initial encounter">
                                            S43.52XA Sprain of left acromioclavicular joint, initial encounter
                                        </option>
                                        <option
                                            value="S43.411A Sprain of right coracohumeral (ligament), inital encounter">
                                            S43.411A Sprain of right coracohumeral (ligament), inital encounter
                                        </option>
                                        <option
                                            value="S43.412A Sprain of left coracohumeral (ligament), inital encounter">
                                            S43.412A Sprain of left coracohumeral (ligament), inital encounter
                                        </option>
                                        <option
                                            value="S43.421A Sprain of right rotator cuff capsule, initial encounter">
                                            S43.421A Sprain of right rotator cuff capsule, initial encounter
                                        </option>
                                        <option value="S43.422A Sprain of left rotator cuff capsule, initial encounter">
                                            S43.422A Sprain of left rotator cuff capsule, initial encounter</option>
                                        <option value="S43.911A Right shoulder strain unspecified muscles, Acute">
                                            S43.911A Right shoulder strain unspecified muscles, Acute</option>
                                        <option value="S43.912A Left shoulder strain unspecified muscles, Acute">
                                            S43.912A Left shoulder strain unspecified muscles, Acute</option>
                                        <option
                                            value="S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right shoulder, initial">
                                            S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right
                                            shoulder, initial</option>
                                        <option
                                            value="S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left shoulder, initial">
                                            S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left
                                            shoulder, initial</option>
                                        <option
                                            value="S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of right shoulder">
                                            S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of
                                            right shoulder</option>
                                        <option
                                            value="S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left shoulder">
                                            S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of
                                            left shoulder</option>
                                        <option
                                            value="S46.811A Srain of other muscles, fascia and tendons at shoulder and upper arm level, right arm, initial encounter">
                                            S46.811A Srain of other muscles, fascia and tendons at shoulder and
                                            upper arm level, right arm, initial encounter</option>
                                        <option
                                            value="S46.812A Srain of other muscles, fascia and tendons at shoulder and upper arm level, left arm, initial encounter">
                                            S46.812A Srain of other muscles, fascia and tendons at shoulder and
                                            upper arm level, left arm, initial encounter</option>
                                        <option value="M75.00 Frozen shoulder">M75.00 Frozen shoulder</option>
                                        <option value="M25.511 Pain in right shoulder">M25.511 Pain in right
                                            shoulder</option>
                                        <option value="M25.512 Pain in left shoulder">M25.512 Pain in left shoulder
                                        </option>
                                        <option value="M25.521 Pain in right elbow">M25.521 Pain in right elbow
                                        </option>
                                        <option value="M25.522 Pain in left elbow">M25.522 Pain in left elbow
                                        </option>
                                        <option value="M25.531 Pain in right wrist">M25.531 Pain in right wrist
                                        </option>
                                        <option value="M25.32 Pain in left wrist">M25.32 Pain in left wrist</option>
                                        <option value="M79.601 Pain in right arm">M79.601 Pain in right arm</option>
                                        <option value="M79.602 Pain in left arm">M79.602 Pain in left arm</option>
                                        <option value="M79.621 Pain in right upper arm">M79.621 Pain in right upper
                                            arm</option>
                                        <option value="M79.622 Pain in left upper arm">M79.622 Pain in left upper
                                            arm</option>
                                        <option value="M79.631 Pain in right forearm">M79.631 Pain in right forearm
                                        </option>
                                        <option value="M79.632 Pain in left forearm">M79.632 Pain in left forearm
                                        </option>
                                        <option value="M79.641 Pain in right hand">M79.641 Pain in right hand
                                        </option>
                                        <option value="M79.642 Pain in left hand">M79.642 Pain in left hand</option>
                                        <option value="M79.644 Pain in right finger(s)">M79.644 Pain in right
                                            finger(s)</option>
                                        <option value="M79.645 Pain in left finger(s)">M79.645 Pain in left
                                            finger(s)</option>
                                        <option value="M25.619 Stiffness of unspec. shoulder">M25.619 Stiffness of
                                            unspec. shoulder</option>
                                        <option value="M89.519 Osteolysis of shoulder">M89.519 Osteolysis of
                                            shoulder</option>
                                        <option value="M93.919 Osteochondropathy of shoulder">M93.919
                                            Osteochondropathy of shoulder</option>
                                        <option value="M60.819 Myositis of shoulder">M60.819 Myositis of shoulder
                                        </option>
                                        <option value="M67.419 Ganglion cyst of shoulder">M67.419 Ganglion cyst of
                                            shoulder</option>
                                        <option value="M25.019 Hamarthrosis of shoulder">M25.019 Hamarthrosis of
                                            shoulder</option>
                                        <option value="M25.719 Bone spur-osteophyte of shoulder">M25.719 Bone
                                            spur-osteophyte of shoulder</option>
                                        <option value="M75.81 Tendinitis of right shoulder">M75.81 Tendinitis of
                                            right shoulder</option>
                                        <option value="M75.82 Tendinitis of left shoulder">M75.82 Tendinitis of left
                                            shoulder</option>
                                        <option value="M13.119 Monoarthritis of shoulder region">M13.119
                                            Monoarthritis of shoulder region</option>
                                        <option value="S53.031S Nursemaid's Elbow, right elbow">S53.031S Nursemaid's
                                            Elbow, right elbow</option>
                                        <option value="S53.032S Nursemaid's Elbow, left elbow">S53.032S Nursemaid's
                                            Elbow, left elbow</option>
                                        <option value="M25.629 Stiffness of unspec. elbow">M25.629 Stiffness of
                                            unspec. elbow</option>
                                        <option value="M25.029 Hemarthrosis of elbow">M25.029 Hemarthrosis of elbow
                                        </option>
                                        <option value="M67.429 Ganglion cyst of elbow">M67.429 Ganglion cyst of
                                            elbow</option>
                                        <option value="M24.629 Ankylosis of elbow">M24.629 Ankylosis of elbow
                                        </option>
                                        <option value="M25.729 Bone spur of elbow">M25.729 Bone spur of elbow
                                        </option>
                                        <option value="M19.021 Arthriris of right elbow">M19.021 Arthriris of right
                                            elbow</option>
                                        <option value="M19.022 Arthritis of left elbow">M19.022 Arthritis of left
                                            elbow</option>
                                        <option value="M21.331 Wrist drop, right wrist">M21.331 Wrist drop, right
                                            wrist</option>
                                        <option value="M21.332 Wrist drop, left wrist">M21.332 Wrist drop, left
                                            wrist</option>
                                        <option value="M25.639 Stiffness of unspec. wrist">M25.639 Stiffness of
                                            unspec. wrist</option>
                                        <option value="M25.039 Hemarthrosis of wrist">M25.039 Hemarthrosis of wrist
                                        </option>
                                        <option value="M67.439 Gangolian cyst of wrist">M67.439 Gangolian cyst of
                                            wrist</option>
                                        <option value="M25.739 Bone spur of wrist">M25.739 Bone spur of wrist
                                        </option>
                                        <option value="M25.439 Effusion of unspec. wrist">M25.439 Effusion of
                                            unspec. wrist</option>
                                        <option value="M13.139 Monarthritis of unspec. wrist">M13.139 Monarthritis
                                            of unspec. wrist</option>
                                        <option value="M25.539 Arthralgia of wrist">M25.539 Arthralgia of wrist
                                        </option>
                                    </select></div>
                                <div id="dxcodelowerextremity5" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectlowerextremity5" name="dxcodelowerextremity5"
                                        style="width:260px"
                                        onchange="selectte('lowerextremity','5','E');checkadd('5','lowerextremity');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M72.2 Planter fascitis">M72.2 Planter fascitis</option>
                                        <option value="S93.01XA Subluxation right ankle/foot">S93.01XA Subluxation
                                            right ankle/foot</option>
                                        <option value="S93.02XA Subluxation left ankle/foot">S93.02XA Subluxation
                                            left ankle/foot</option>
                                        <option value="M99.06 Segmental and somatic dysfunction of lower extremity">
                                            M99.06 Segmental and somatic dysfunction of lower extremity</option>
                                        <option value="M76.61 Achilles Tendinitis, Right Leg">M76.61 Achilles
                                            Tendinitis, Right Leg</option>
                                        <option value="M76.62 Achilles Tendinitis, Left Leg">M76.62 Achilles
                                            Tendinitis, Left Leg</option>
                                        <option value="S73.191A Other sprain of right hip, initial encounter">
                                            S73.191A Other sprain of right hip, initial encounter</option>
                                        <option value="S73.192A Other sprain of left hip, initial encounter">
                                            S73.192A Other sprain of left hip, initial encounter</option>
                                        <option
                                            value="S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter">
                                            S76.011A Strain of muscle, fascia and tendon of right hip, initial
                                            encounter</option>
                                        <option
                                            value="S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter">
                                            S76.012A Strain of muscle, fascia and tendon of left hip, initial
                                            encounter</option>
                                        <option
                                            value="S83.91XA Sprain of unspecified site of right knee, initial encounter">
                                            S83.91XA Sprain of unspecified site of right knee, initial encounter
                                        </option>
                                        <option
                                            value="S83.92XA Sprain of unspecified site of left knee, initial encounter">
                                            S83.92XA Sprain of unspecified site of left knee, initial encounter
                                        </option>
                                        <option value="M79.604 Pain in right leg">M79.604 Pain in right leg</option>
                                        <option value="M79.605 Pain in left leg">M79.605 Pain in left leg</option>
                                        <option value="M79.651 Pain in right thigh">M79.651 Pain in right thigh
                                        </option>
                                        <option value="M79.652 Pain in left thigh">M79.652 Pain in left thigh
                                        </option>
                                        <option value="M79.661 Pain in right lower leg">M79.661 Pain in right lower
                                            leg</option>
                                        <option value="M79.662 Pain in left lower leg">M79.662 Pain in left lower
                                            leg</option>
                                        <option value="M79.671 Pain in right foot">M79.671 Pain in right foot
                                        </option>
                                        <option value="M79.672 Pain in left foot">M79.672 Pain in left foot</option>
                                        <option value="M79.674 Pain in right toes">M79.674 Pain in right toes
                                        </option>
                                        <option value="M79.675 Pain in left toes">M79.675 Pain in left toes</option>
                                        <option value="M25.551 Pain in right hip">M25.551 Pain in right hip</option>
                                        <option value="M25.552 Pain in left hip">M25.552 Pain in left hip</option>
                                        <option value="M25.561 Pain in right knee">M25.561 Pain in right knee
                                        </option>
                                        <option value="M25.562 Pain in left knee">M25.562 Pain in left knee</option>
                                        <option value="M25.571 Pain in right ankle">M25.571 Pain in right ankle
                                        </option>
                                        <option value="M25.572 Pain in left ankle">M25.572 Pain in left ankle
                                        </option>
                                        <option value="M76.31 Iliotibial band syndrome, right leg">M76.31 Iliotibial
                                            band syndrome, right leg</option>
                                        <option value="M76.32 Iliotibial band syndrome, left leg">M76.32 Iliotibial
                                            band syndrome, left leg</option>
                                        <option value="M70.50 Bursitis of unspec. knee">M70.50 Bursitis of unspec.
                                            knee</option>
                                        <option value="M25.069 Hemarthrosis of unspec. knee">M25.069 Hemarthrosis of
                                            unspec. knee</option>
                                        <option value="M94.269 Chondromalacia of unspec. knee">M94.269
                                            Chondromalacia of unspec. knee</option>
                                        <option value="M67.469 Gangolian cyst of unspec. knee">M67.469 Gangolian
                                            cyst of unspec. knee</option>
                                        <option value="M25.760 Bone spur of unspec. knee">M25.760 Bone spur of
                                            unspec. knee</option>
                                        <option value="M23.40 Loose body in spec. knee">M23.40 Loose body in spec.
                                            knee</option>
                                        <option value="M25.669 Stiffness of unspec. knee">M25.669 Stiffness of
                                            unspec. knee</option>
                                        <option value="M70.51 Bursitis of right knee">M70.51 Bursitis of right knee
                                        </option>
                                        <option value="M70.52 Bursitis of left knee">M70.52 Bursitis of left knee
                                        </option>
                                        <option value="M21.371 Foot drop right foot">M21.371 Foot drop right foot
                                        </option>
                                        <option value="M21.372 Foot drop left foot">M21.372 Foot drop left foot
                                        </option>
                                        <option value="Q72.70 Cleft foot-split foot">Q72.70 Cleft foot-split foot
                                        </option>
                                        <option value="S90.30XA Contusion of foot">S90.30XA Contusion of foot
                                        </option>
                                        <option value="M25.076 Hemarthrosis of unspec. foot">M25.076 Hemarthrosis of
                                            unspec. foot</option>
                                        <option value="M25.776 Bone spur of foot">M25.776 Bone spur of foot</option>
                                        <option value="T69.021A Immersion of right foot">T69.021A Immersion of right
                                            foot</option>
                                        <option value="T69.022A Immersion of left foot">T69.022A Immersion of left
                                            foot</option>
                                    </select></div>
                                <div id="dxcodeheadache5" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectheadache5" name="dxcodeheadache5" style="width:260px"
                                        onchange="selectte('headache','5','E');checkadd('5','headache');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="G43.001 Migraine">G43.001 Migraine</option>
                                        <option value="G44.209 Tension-type headache">G44.209 Tension-type headache
                                        </option>
                                        <option value="G44.89 Headache">G44.89 Headache</option>
                                        <option value="R42 Dizziness">R42 Dizziness</option>
                                        <option value="R51 Headache">R51 Headache</option>
                                        <option value="G44.201 Tension-Type Headache, unspecified, intractable">
                                            G44.201 Tension-Type Headache, unspecified, intractable</option>
                                        <option value="G44.209 Tension-Type Headache, unspecified, not intractable">
                                            G44.209 Tension-Type Headache, unspecified, not intractable</option>
                                        <option
                                            value="G43.001 Migraine without aura, not intractable, with status migrainosus">
                                            G43.001 Migraine without aura, not intractable, with status migrainosus
                                        </option>
                                        <option
                                            value="G43.009 Migraine without aura, not intractable, without status migrainosus">
                                            G43.009 Migraine without aura, not intractable, without status
                                            migrainosus</option>
                                        <option
                                            value="G43.011 Migraine without aura, intractable, with status migrainosus">
                                            G43.011 Migraine without aura, intractable, with status migrainosus
                                        </option>
                                        <option
                                            value="G43.019 Migraine without aura, intractable, without status migrainosus">
                                            G43.019 Migraine without aura, intractable, without status migrainosus
                                        </option>
                                        <option
                                            value="G43.101 Migraine with aura, not intractable, with status migrainosus">
                                            G43.101 Migraine with aura, not intractable, with status migrainosus
                                        </option>
                                        <option
                                            value="G43.109 Migraine with aura, not intractable, without status migrainosus">
                                            G43.109 Migraine with aura, not intractable, without status migrainosus
                                        </option>
                                        <option
                                            value="G43.111 Migraine with aura, intractable, with status migrainosus">
                                            G43.111 Migraine with aura, intractable, with status migrainosus
                                        </option>
                                        <option
                                            value="G43.119 Migraine with aura, intractable, without status migrainosus">
                                            G43.119 Migraine with aura, intractable, without status migrainosus
                                        </option>
                                        <option value="G44.219 Tension Headache episodic">G44.219 Tension Headache
                                            episodic</option>
                                        <option value="G44.229 Tension Headache chronic">G44.229 Tension Headache
                                            chronic</option>
                                        <option value="G44.319 Acute post-traumatic headache">G44.319 Acute
                                            post-traumatic headache</option>
                                        <option value="G44.329 Chronic post-traumatic headache">G44.329 Chronic
                                            post-traumatic headache</option>
                                        <option value="S06.0X0A Mild concussion (no loc) acute">S06.0X0A Mild
                                            concussion (no loc) acute</option>
                                        <option value="S06.0X1A Mild concussion (LOC<30MINS)">S06.0X1A Mild
                                            concussion (LOC<30MINS)< /option>
                                        <option value="F07.81 Post-Concussion Syndrome">F07.81 Post-Concussion
                                            Syndrome</option>
                                        <option value="H53.8 Blurry Vision">H53.8 Blurry Vision</option>
                                        <option value="H93.19 Tinnitus unspecified">H93.19 Tinnitus unspecified
                                        </option>
                                    </select></div>
                                <div id="dxcodegeneral5" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectgeneral5" name="dxcodegeneral5" style="width:260px"
                                        onchange="selectte('general','5','E');checkadd('5','general');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M62.830 Muscle spasm of the back">M62.830 Muscle spasm of the
                                            back</option>
                                        <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                        <option value="R42 Vertigo, dizziness & giddiness">R42 Vertigo, dizziness &
                                            giddiness</option>
                                        <option value="M62.830 Muscle spasm of back">M62.830 Muscle spasm of back
                                        </option>
                                        <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                        <option value="M79.7 Fibromyalgia">M79.7 Fibromyalgia</option>
                                        <option value="M72.8 Fascitis">M72.8 Fascitis</option>
                                        <option value="M25.2 Limb cramp or spasm">M25.2 Limb cramp or spasm</option>
                                        <option value="M62.40 Muscle contracture (neck, thoracic, lumbar)">M62.40
                                            Muscle contracture (neck, thoracic, lumbar)</option>
                                        <option value="M25.50 Unspecified Joint(s) tender/painful (NK/MBLB)">M25.50
                                            Unspecified Joint(s) tender/painful (NK/MBLB)</option>
                                        <option value="M25.60 Joint(s) stiff (next, thoracic, lumbar)">M25.60
                                            Joint(s) stiff (next, thoracic, lumbar)</option>
                                        <option value="M35.7 Hypermobility syndrome">M35.7 Hypermobility syndrome
                                        </option>
                                        <option value="M81.0 Age related osteoporosis w/o pathological fracture">
                                            M81.0 Age related osteoporosis w/o pathological fracture</option>
                                        <option value="M99.05 Segmental and comatic dysfunction of pelvic region">
                                            M99.05 Segmental and comatic dysfunction of pelvic region</option>
                                        <option value="R20.1 Hypoesthesia of skin">R20.1 Hypoesthesia of skin
                                        </option>
                                        <option value="R20.2 Spin parethesia">R20.2 Spin parethesia</option>
                                        <option value="R20.3 Hyperesthesia of skin">R20.3 Hyperesthesia of skin
                                        </option>
                                        <option value="R26.81 Unsteady on feet">R26.81 Unsteady on feet</option>
                                        <option value="R26.2 Difficulty Walking">R26.2 Difficulty Walking</option>
                                    </select></div>
                                <div id="addcodediv5" style="display:none;">
                                    <table width="300" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="200"><input id="dxcodeadd5" name="dxcodeadd5" style="width:200px"
                                                    value=""></td>
                                            <td align="center" width="40"><img src="nlimages/delete.png" width="15"
                                                    height="15" onclick="hideadd('5','');"></td>
                                            <td width="60" align="right"><a href="#">Manage</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td bgcolor="#f1f1f1" width="59%">
                                <input type="hidden" name="showpointersE" id="showpointersE">
                                <div id="showpointerdivE"></div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-left:1px solid black;padding:5px;">
                    <div id="showunits4"></div>
                </td>
            </tr>
            <td>
                <table cellpadding="5" width="100%">
                    <tr>
                        <td width="6%" align="center"><b>F</b></td>
                        <td width="15%"><select name="dxcategory6" id="dx6"
                                onchange="populateselect('6');exampopulate();">
                                <option value=""></option>
                                <option value="cervical">Cervical</option>
                                <option value="thoracic">Thoracic</option>
                                <option value="lumbar">Lumbar/SI</option>
                                <option value="pelvis">Pelvis Sacrum Coccyx</option>
                                <option value="generalspinal">General Spinal</option>
                                <option value="upperextremity">Upper Extremity</option>
                                <option value="lowerextremity">Lower Extremity</option>
                                <option value="headache">Headache</option>
                                <option value="general">General</option>
                            </select></td>
                        <td width="20%">
                            <div id="dxcodedefault6" style="display:block;"><select style="width:300px;">
                                    <option value="" selected>Select a category for codes</option>
                                </select></div>
                            <div id="dxcodecervical6" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectcervical6" name="dxcodecervical6" style="width:260px"
                                    onchange="selectte('cervical','6','F');checkadd('6','cervical');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="G54.0 Brachial Plexus disorders">G54.0 Brachial Plexus disorders
                                    </option>
                                    <option value="G54.2 Cervical root disorders">G54.2 Cervical root disorders
                                    </option>
                                    <option value="M40.292 Cervical kyphosis, other">M40.292 Cervical kyphosis,
                                        other</option>
                                    <option value="M43.12 Sponylolisthesis, cervical region">M43.12
                                        Sponylolisthesis, cervical region</option>
                                    <option value="M43.6 Torticollis">M43.6 Torticollis</option>
                                    <option value="M46.02 Spinal enthesopathy, cervical region">M46.02 Spinal
                                        enthesopathy, cervical region</option>
                                    <option value="M47.12 Spondylosis w/out myelopathy, cervical region">M47.12
                                        Spondylosis w/out myelopathy, cervical region</option>
                                    <option value="M48.02 Spinal Stenosis, cervical region (C3-C7)">M48.02 Spinal
                                        Stenosis, cervical region (C3-C7)</option>
                                    <option value="M48.32 Traumatic spondylopathy, cervical region">M48.32 Traumatic
                                        spondylopathy, cervical region</option>
                                    <option value="M50.01 IVD disorder w/ myelopathy Cervical">M50.01 IVD disorder
                                        w/ myelopathy Cervical</option>
                                    <option value="M50.12 Cervical disc disorder w/ radiculopathy">M50.12 Cervical
                                        disc disorder w/ radiculopathy</option>
                                    <option value="M50.20 Cervical disc displacement">M50.20 Cervical disc
                                        displacement</option>
                                    <option value="M50.30 Cervical disc disgnereation">M50.30 Cervical disc
                                        disgnereation</option>
                                    <option value="M50.90 Cervical disc disorder">M50.90 Cervical disc disorder
                                    </option>
                                    <option value="M53.0 Cervicocranial syndrome">M53.0 Cervicocranial syndrome
                                    </option>
                                    <option value="M53.1 Cervicobrachial syndrome">M53.1 Cervicobrachial syndrome
                                    </option>
                                    <option value="M54.12 Radiculopathy, cervical region">M54.12 Radiculopathy,
                                        cervical region</option>
                                    <option value="M54.2 Cervicalgia">M54.2 Cervicalgia</option>
                                    <option value="M62.838 Muscle spasm, other">M62.838 Muscle spasm, other</option>
                                    <option value="S13.4XXA Cervical sprain">S13.4XXA Cervical sprain</option>
                                    <option value="S14.2XXA Nerve root injury, cervical">S14.2XXA Nerve root injury,
                                        cervical</option>
                                    <option value="S143.XXA Brachial plexus injury">S143.XXA Brachial plexus injury
                                    </option>
                                    <option value="S16.1XXA Strain, Neck muscles">S16.1XXA Strain, Neck muscles
                                    </option>
                                    <option value="M99.00 Segmental Somatic Dysfunction Occiptal-Head">M99.00
                                        Segmental Somatic Dysfunction Occiptal-Head</option>
                                    <option value="M99.01 Segmental Somatic Dysfunction of Cervical Region">M99.01
                                        Segmental Somatic Dysfunction of Cervical Region</option>
                                    <option value="S13.4XXA Spain of ligaments of cervical spine, initial encounter">
                                        S13.4XXA Spain of ligaments of cervical spine, initial encounter</option>
                                    <option
                                        value="S16.1XXA Strain of muscle, fascia and tendon at next level, initial encounter">
                                        S16.1XXA Strain of muscle, fascia and tendon at next level, initial
                                        encounter</option>
                                    <option value="S14.2XXA Injury nerve root cervical, initial encounter">S14.2XXA
                                        Injury nerve root cervical, initial encounter</option>
                                    <option value="G54.1 Nerve root lesion cervical">G54.1 Nerve root lesion
                                        cervical</option>
                                    <option value="M50.33 Disc degeneration cervicothoracic region">M50.33 Disc
                                        degeneration cervicothoracic region</option>
                                    <option value="M50.22 Cervical disc displacement C3-C7">M50.22 Cervical disc
                                        displacement C3-C7</option>
                                    <option value="M50.23 Cervical disc displacement C7-T1">M50.23 Cervical disc
                                        displacement C7-T1</option>
                                    <option value="M50.31 Cervical disc degeneration C2-C4">M50.31 Cervical disc
                                        degeneration C2-C4</option>
                                    <option value="M50.32 Cervical disc degeneration C3-C7">M50.32 Cervical disc
                                        degeneration C3-C7</option>
                                    <option value="M50.33 Cervical disc degeneration C7-T1">M50.33 Cervical disc
                                        degeneration C7-T1</option>
                                    <option value="M53.2X2 Cervical spine instabilities">M53.2X2 Cervical spine
                                        instabilities</option>
                                    <option value="M40.202 Kyphosis unspecified cervical">M40.202 Kyphosis
                                        unspecified cervical</option>
                                    <option value="S13.4XXS Sequela sprain neck ligaments">S13.4XXS Sequela sprain
                                        neck ligaments</option>
                                    <option
                                        value="M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial region">
                                        M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial
                                        region</option>
                                    <option
                                        value="M50.12 Cervical disc disorder with radiculopathy, mid-cervical region">
                                        M50.12 Cervical disc disorder with radiculopathy, mid-cervical region
                                    </option>
                                    <option
                                        value="M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region">
                                        M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region
                                    </option>
                                    <option
                                        value="M50.31 Other cervical disc degeneration, occipito-atlanto-axial region">
                                        M50.31 Other cervical disc degeneration, occipito-atlanto-axial region
                                    </option>
                                    <option value="M50.32 Other cervical disc degeneration, mid-cervical region">
                                        M50.32 Other cervical disc degeneration, mid-cervical region</option>
                                    <option value="M50.33 Other cervical disc degeneration, cervicothoracic region">
                                        M50.33 Other cervical disc degeneration, cervicothoracic region</option>
                                </select></div>
                            <div id="dxcodethoracic6" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectthoracic6" name="dxcodethoracic6" style="width:260px"
                                    onchange="selectte('thoracic','6','F');checkadd('6','thoracic');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M99.02 Segmental dysf./Sublux, thoracic">M99.02 Segmental
                                        dysf./Sublux, thoracic</option>
                                    <option value="G54.3 Thoracic root disorders">G54.3 Thoracic root disorders
                                    </option>
                                    <option value="M43.14 Spondylolistesis, thoracic region">M43.14
                                        Spondylolistesis, thoracic region</option>
                                    <option value="M46.04 Spinal enthesopathy, thoracic region">M46.04 Spinal
                                        enthesopathy, thoracic region</option>
                                    <option value="M47.24 Spondylosis w/ radiculopathy, thoracic region">M47.24
                                        Spondylosis w/ radiculopathy, thoracic region</option>
                                    <option value="M47.814 Spondylosis w/out mwelopathy, thoracic">M47.814
                                        Spondylosis w/out mwelopathy, thoracic</option>
                                    <option value="M48.04 Spinal stenosis, thoracic region (T1-G12)">M48.04 Spinal
                                        stenosis, thoracic region (T1-G12)</option>
                                    <option value="M51.34 Intervertebral disc degeneration, thoracic region">M51.34
                                        Intervertebral disc degeneration, thoracic region</option>
                                    <option value="M51.84 IVD Thoracic">M51.84 IVD Thoracic</option>
                                    <option value="M54.14 Radiculopathy, thoracic">M54.14 Radiculopathy, thoracic
                                    </option>
                                    <option value="M54.6 Pain in thoracic spine">M54.6 Pain in thoracic spine
                                    </option>
                                    <option value="S23.3XXA Thoracic spine">S23.3XXA Thoracic spine</option>
                                    <option value="S24.2XXA Nerve root injury, thoracic">S24.2XXA Nerve root injury,
                                        thoracic</option>
                                    <option value="MS4.6 Pain in Thoracic spine">MS4.6 Pain in Thoracic spine
                                    </option>
                                    <option value="M99.02 Segmental and somatic dysfunction of the thoracic region">
                                        M99.02 Segmental and somatic dysfunction of the thoracic region</option>
                                    <option value="M99.08 Segmental and somatic dysfunction of rib cage">M99.08
                                        Segmental and somatic dysfunction of rib cage</option>
                                    <option value="S23.3XXA Sprain of ligaments of thoracic spine, initial encounter">
                                        S23.3XXA Sprain of ligaments of thoracic spine, initial encounter</option>
                                    <option value="S23.41XA Sprain of ribs, initial encounter">S23.41XA Sprain of
                                        ribs, initial encounter</option>
                                    <option value="S23.421A Sprain of chrondrosternal joint, initial encounter">
                                        S23.421A Sprain of chrondrosternal joint, initial encounter</option>
                                    <option
                                        value="M51.14 Intervertebral disc disorders with radiculopathy, thoracic region">
                                        M51.14 Intervertebral disc disorders with radiculopathy, thoracic region
                                    </option>
                                    <option value="M53.84 Other specified dorsopathies, thoracic region">M53.84
                                        Other specified dorsopathies, thoracic region</option>
                                    <option value="M41.114 Juvenile idiopathic scoliosis, thoracic region">M41.114
                                        Juvenile idiopathic scoliosis, thoracic region</option>
                                    <option value="M41.124 Adolescent idiopathic scoliosis, thoracic region">M41.124
                                        Adolescent idiopathic scoliosis, thoracic region</option>
                                    <option value="M41.44 Neuromuscular scoliosis, thoracic region">M41.44
                                        Neuromuscular scoliosis, thoracic region</option>
                                    <option value="M40.00 Kyphosis postural acquired">M40.00 Kyphosis postural
                                        acquired</option>
                                    <option value="M40.04 Postural kyphosis thoracic">M40.04 Postural kyphosis
                                        thoracic</option>
                                    <option value="M40.03 Cervicothoracic">M40.03 Cervicothoracic</option>
                                    <option value="S29.012A Strain muscle-tendon back wall thorax acute">S29.012A
                                        Strain muscle-tendon back wall thorax acute</option>
                                    <option value="G43.3 Nerve root disorder-thoracic">G43.3 Nerve root
                                        disorder-thoracic</option>
                                    <option value="M53.2X4 Spinal instabilities thoracic region">M53.2X4 Spinal
                                        instabilities thoracic region</option>
                                </select></div>
                            <div id="dxcodelumbar6" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectlumbar6" name="dxcodelumbar6" style="width:260px"
                                    onchange="selectte('lumbar','6','F');checkadd('6','lumbar');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="G54.1 Lumbosacral plexus disorders">G54.1 Lumbosacral plexus
                                        disorders</option>
                                    <option value="G54.4 Lumbosacral root disorders">G54.4 Lumbosacral root
                                        disorders</option>
                                    <option value="M43.16 Spondylolisthesis, lumbar region">M43.16
                                        Spondylolisthesis, lumbar region</option>
                                    <option value="M46.06 Spinal enthesopathy, lumbar region">M46.06 Spinal
                                        enthesopathy, lumbar region</option>
                                    <option value="M47.896 Spondylosis, lumbar region">M47.896 Spondylosis, lumbar
                                        region</option>
                                    <option value="M51.06 IVD Disorder w/myelopathy lumbar">M51.06 IVD Disorder
                                        w/myelopathy lumbar</option>
                                    <option value="M51.26 Intervertebral disc displacement, lumbar">M51.26
                                        Intervertebral disc displacement, lumbar</option>
                                    <option value="M51.36 Intervertebral disc degeneration, lumbar">M51.36
                                        Intervertebral disc degeneration, lumbar</option>
                                    <option value="M54.08 Lumbar facet syndrome">M54.08 Lumbar facet syndrome
                                    </option>
                                    <option value="M54.16 Low back pain">M54.16 Low back pain</option>
                                    <option value="S33.5XXA Lumbar spine strain">S33.5XXA Lumbar spine strain
                                    </option>
                                    <option value="M54.5 Low back pain">M54.5 Low back pain</option>
                                    <option value="M99.03 Segmental and somatic dysfunction of lumbar region">M99.03
                                        Segmental and somatic dysfunction of lumbar region</option>
                                    <option value="M99.04 Segmental and somatic dysfunction of sacral region">M99.04
                                        Segmental and somatic dysfunction of sacral region</option>
                                    <option value="S33.5XXA Sprain of ligaments of lumbar spine, initial encounter">
                                        S33.5XXA Sprain of ligaments of lumbar spine, initial encounter</option>
                                    <option value="S33.6XXA Sprain of sacroiliac joint, inital encounter">S33.6XXA
                                        Sprain of sacroiliac joint, inital encounter</option>
                                    <option
                                        value="S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter">
                                        S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter
                                    </option>
                                    <option
                                        value="S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial encounter">
                                        S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial
                                        encounter</option>
                                    <option
                                        value="S39.012A Strain of muscle, fascia and tendon of lower back, initial encounter">
                                        S39.012A Strain of muscle, fascia and tendon of lower back, initial
                                        encounter</option>
                                    <option
                                        value="M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar region">
                                        M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar
                                        region</option>
                                    <option
                                        value="M51.16 Intervertebral disc disorders with radiculopathy, lumbar region">
                                        M51.16 Intervertebral disc disorders with radiculopathy, lumbar region
                                    </option>
                                    <option
                                        value="M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region">
                                        M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region
                                    </option>
                                    <option value="M51.36 Other intervertebral disc degeneration, lumbar region">
                                        M51.36 Other intervertebral disc degeneration, lumbar region</option>
                                    <option value="M51.37 Other intervertebral disc degeneration, lumbosacral region">
                                        M51.37 Other intervertebral disc degeneration, lumbosacral region</option>
                                    <option
                                        value="M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region">
                                        M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region
                                    </option>
                                    <option
                                        value="M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region">
                                        M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region
                                    </option>
                                    <option value="M54.31 Sciatica, right side">M54.31 Sciatica, right side</option>
                                    <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left side</option>
                                    <option value="M99.03 Segmental Somatic dysfunction Lumbar">M99.03 Segmental
                                        Somatic dysfunction Lumbar</option>
                                    <option value="M99.04 Segmental Somatic dysfunction SI. Sacrum">M99.04 Segmental
                                        Somatic dysfunction SI. Sacrum</option>
                                    <option value="M54.41 Lumbago with sciatica, right side">M54.41 Lumbago with
                                        sciatica, right side</option>
                                    <option value="M54.42 Lumbago with sciatica, left side">M54.42 Lumbago with
                                        sciatica, left side</option>
                                    <option value="M54.16 Radiculopathy, lumbar region">M54.16 Radiculopathy, lumbar
                                        region</option>
                                    <option value="M54.17 Radiculopathy, lumboscral region">M54.17 Radiculopathy,
                                        lumboscral region</option>
                                    <option value="M53.3 Sacrococcygeal disorders, not elsewhere classified">M53.3
                                        Sacrococcygeal disorders, not elsewhere classified</option>
                                    <option value="M53.85 Other specified dorsopathies, thoracolumbar region">M53.85
                                        Other specified dorsopathies, thoracolumbar region</option>
                                    <option value="M53.86 Other specified dorsopathies, lumbar region">M53.86 Other
                                        specified dorsopathies, lumbar region</option>
                                    <option value="M48.06 Spinal stenosis, lumbar region">M48.06 Spinal stenosis,
                                        lumbar region</option>
                                    <option value="M41.115 Juvenile idiopathic scoliosis, thoracolumbar region">
                                        M41.115 Juvenile idiopathic scoliosis, thoracolumbar region</option>
                                    <option value="M41.116 Juvenile idiopathic scoliosis, lumbar region">M41.116
                                        Juvenile idiopathic scoliosis, lumbar region</option>
                                    <option value="M41.127 Adolescent idiopathic scoliosis, lumbosacral region">
                                        M41.127 Adolescent idiopathic scoliosis, lumbosacral region</option>
                                    <option value="M41.45 Neuromuscular scoliosis, thoracolumbar region">M41.45
                                        Neuromuscular scoliosis, thoracolumbar region</option>
                                    <option value="M41.46 Neuromuscular scoliosis, lumbar region">M41.46
                                        Neuromuscular scoliosis, lumbar region</option>
                                    <option value="M41.47 Neuromuscular scoliosis, lumbosacral region">M41.47
                                        Neuromuscular scoliosis, lumbosacral region</option>
                                    <option value="M51.26 Intervertebral disc displacement Lumbar L2-L5">M51.26
                                        Intervertebral disc displacement Lumbar L2-L5</option>
                                    <option value="M51.27 Intervertebral disc displacement L5-S1">M51.27
                                        Intervertebral disc displacement L5-S1</option>
                                    <option value="M51.36 Degeneration Lumbar Disc L2-L5">M51.36 Degeneration Lumbar
                                        Disc L2-L5</option>
                                    <option value="M51.37 Degeneration Lumbarsacral Disc L5-S1">M51.37 Degeneration
                                        Lumbarsacral Disc L5-S1</option>
                                    <option value="M46.1 Sacroilitis">M46.1 Sacroilitis</option>
                                    <option value="M53.2X7 Spinal instabilities lumbosacral region">M53.2X7 Spinal
                                        instabilities lumbosacral region</option>
                                    <option value="M53.2X6 Spinal instabilities lumbar spine">M53.2X6 Spinal
                                        instabilities lumbar spine</option>
                                </select></div>
                            <div id="dxcodepelvis6" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectpelvis6" name="dxcodepelvis6" style="width:260px"
                                    onchange="selectte('pelvis','6','F');checkadd('6','pelvis');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M99.04 Segmental dysf/Sublux, sacral">M99.04 Segmental
                                        dysf/Sublux, sacral</option>
                                    <option value="M99.05 Segmental dysf/Sublux, pelvic">M99.05 Segmental
                                        dysf/Sublux, pelvic</option>
                                    <option value="M43.08 Spondylosis, sacral region">M43.08 Spondylosis, sacral
                                        region</option>
                                    <option value="M54.31 Sciatica, right side">M54.31 Sciatica, right side</option>
                                    <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left side</option>
                                    <option value="S33.6 Sprain SI joint">S33.6 Sprain SI joint</option>
                                </select></div>
                            <div id="dxcodegeneralspinal6" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectgeneralspinal6" name="dxcodegeneralspinal6" style="width:260px"
                                    onchange="selectte('generalspinal','6','F');checkadd('6','generalspinal');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="Q67.5 Scliosis, congenital">Q67.5 Scliosis, congenital</option>
                                </select></div>
                            <div id="dxcodeupperextremity6" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectupperextremity6" name="dxcodeupperextremity6" style="width:260px"
                                    onchange="selectte('upperextremity','6','F');checkadd('6','upperextremity');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M77.11 Lateral epicondylitis, right elbow">M77.11 Lateral
                                        epicondylitis, right elbow</option>
                                    <option value="M77.12 Lateral epicondylitis, left elbow">M77.12 Lateral
                                        epicondylitis, left elbow</option>
                                    <option value="M99.07 Segmental and somatic dysfunction of upper extremity">
                                        M99.07 Segmental and somatic dysfunction of upper extremity</option>
                                    <option value="G56.01 Carpal tunnel syndrome, right upper limb">G56.01 Carpal
                                        tunnel syndrome, right upper limb</option>
                                    <option value="G56.02 Carpal tunnel syndrome, left upper limb">G56.02 Carpal
                                        tunnel syndrome, left upper limb</option>
                                    <option value="M75.0 Adhesive capsulitis of shoulder">M75.0 Adhesive capsulitis
                                        of shoulder</option>
                                    <option value="M75.01 Adhesive capsulitis of right shoulder">M75.01 Adhesive
                                        capsulitis of right shoulder</option>
                                    <option value="M75.02 Adhesive capsulitis of left shoulder">M75.02 Adhesive
                                        capsulitis of left shoulder</option>
                                    <option value="M75.100 Unspec Rotator Cuff tear/rupture">M75.100 Unspec Rotator
                                        Cuff tear/rupture</option>
                                    <option value="M75.101 Unspec Rotator Cuff tear/rupture right shoulder">M75.101
                                        Unspec Rotator Cuff tear/rupture right shoulder</option>
                                    <option value="M75.102 Unspec Rotator Cuff tear/rupture left shoulder">M75.102
                                        Unspec Rotator Cuff tear/rupture left shoulder</option>
                                    <option value="M75.21 Bicipital tenosynovitis Right shoulder">M75.21 Bicipital
                                        tenosynovitis Right shoulder</option>
                                    <option value="M75.22 Bicipital tenosynovitis Left shoulder">M75.22 Bicipital
                                        tenosynovitis Left shoulder</option>
                                    <option value="M75.41 Impingement syndrome of Right shoulder">M75.41 Impingement
                                        syndrome of Right shoulder</option>
                                    <option value="M75.42 Impingement syndrome of Left shoulder">M75.42 Impingement
                                        syndrome of Left shoulder</option>
                                    <option value="M75.5 Bursitis of shoulder">M75.5 Bursitis of shoulder</option>
                                    <option value="M75.51 Bursitis of right shoulder">M75.51 Bursitis of right
                                        shoulder</option>
                                    <option value="M75.52 Bursitis of left shoulder">M75.52 Bursitis of left
                                        shoulder</option>
                                    <option value="M77.01 Medial epicondylitis, right elbow">M77.01 Medial
                                        epicondylitis, right elbow</option>
                                    <option value="M77.02 Medial epicondylitis, left elbow">M77.02 Medial
                                        epicondylitis, left elbow</option>
                                    <option value="M77.11 Lateral epicondylitis, right elbow">M77.11 Lateral
                                        epicondylitis, right elbow</option>
                                    <option value="M77.12 Lateral epicondylitis, left elbow">M77.12 Lateral
                                        epicondylitis, left elbow</option>
                                    <option value="S43.51XA Sprain of right acromioclavicular joint, initial encounter">
                                        S43.51XA Sprain of right acromioclavicular joint, initial encounter</option>
                                    <option value="S43.52XA Sprain of left acromioclavicular joint, initial encounter">
                                        S43.52XA Sprain of left acromioclavicular joint, initial encounter</option>
                                    <option value="S43.411A Sprain of right coracohumeral (ligament), inital encounter">
                                        S43.411A Sprain of right coracohumeral (ligament), inital encounter</option>
                                    <option value="S43.412A Sprain of left coracohumeral (ligament), inital encounter">
                                        S43.412A Sprain of left coracohumeral (ligament), inital encounter</option>
                                    <option value="S43.421A Sprain of right rotator cuff capsule, initial encounter">
                                        S43.421A Sprain of right rotator cuff capsule, initial encounter</option>
                                    <option value="S43.422A Sprain of left rotator cuff capsule, initial encounter">
                                        S43.422A Sprain of left rotator cuff capsule, initial encounter</option>
                                    <option value="S43.911A Right shoulder strain unspecified muscles, Acute">
                                        S43.911A Right shoulder strain unspecified muscles, Acute</option>
                                    <option value="S43.912A Left shoulder strain unspecified muscles, Acute">
                                        S43.912A Left shoulder strain unspecified muscles, Acute</option>
                                    <option
                                        value="S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right shoulder, initial">
                                        S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right
                                        shoulder, initial</option>
                                    <option
                                        value="S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left shoulder, initial">
                                        S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left
                                        shoulder, initial</option>
                                    <option
                                        value="S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of right shoulder">
                                        S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of
                                        right shoulder</option>
                                    <option
                                        value="S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left shoulder">
                                        S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left
                                        shoulder</option>
                                    <option
                                        value="S46.811A Srain of other muscles, fascia and tendons at shoulder and upper arm level, right arm, initial encounter">
                                        S46.811A Srain of other muscles, fascia and tendons at shoulder and upper
                                        arm level, right arm, initial encounter</option>
                                    <option
                                        value="S46.812A Srain of other muscles, fascia and tendons at shoulder and upper arm level, left arm, initial encounter">
                                        S46.812A Srain of other muscles, fascia and tendons at shoulder and upper
                                        arm level, left arm, initial encounter</option>
                                    <option value="M75.00 Frozen shoulder">M75.00 Frozen shoulder</option>
                                    <option value="M25.511 Pain in right shoulder">M25.511 Pain in right shoulder
                                    </option>
                                    <option value="M25.512 Pain in left shoulder">M25.512 Pain in left shoulder
                                    </option>
                                    <option value="M25.521 Pain in right elbow">M25.521 Pain in right elbow</option>
                                    <option value="M25.522 Pain in left elbow">M25.522 Pain in left elbow</option>
                                    <option value="M25.531 Pain in right wrist">M25.531 Pain in right wrist</option>
                                    <option value="M25.32 Pain in left wrist">M25.32 Pain in left wrist</option>
                                    <option value="M79.601 Pain in right arm">M79.601 Pain in right arm</option>
                                    <option value="M79.602 Pain in left arm">M79.602 Pain in left arm</option>
                                    <option value="M79.621 Pain in right upper arm">M79.621 Pain in right upper arm
                                    </option>
                                    <option value="M79.622 Pain in left upper arm">M79.622 Pain in left upper arm
                                    </option>
                                    <option value="M79.631 Pain in right forearm">M79.631 Pain in right forearm
                                    </option>
                                    <option value="M79.632 Pain in left forearm">M79.632 Pain in left forearm
                                    </option>
                                    <option value="M79.641 Pain in right hand">M79.641 Pain in right hand</option>
                                    <option value="M79.642 Pain in left hand">M79.642 Pain in left hand</option>
                                    <option value="M79.644 Pain in right finger(s)">M79.644 Pain in right finger(s)
                                    </option>
                                    <option value="M79.645 Pain in left finger(s)">M79.645 Pain in left finger(s)
                                    </option>
                                    <option value="M25.619 Stiffness of unspec. shoulder">M25.619 Stiffness of
                                        unspec. shoulder</option>
                                    <option value="M89.519 Osteolysis of shoulder">M89.519 Osteolysis of shoulder
                                    </option>
                                    <option value="M93.919 Osteochondropathy of shoulder">M93.919 Osteochondropathy
                                        of shoulder</option>
                                    <option value="M60.819 Myositis of shoulder">M60.819 Myositis of shoulder
                                    </option>
                                    <option value="M67.419 Ganglion cyst of shoulder">M67.419 Ganglion cyst of
                                        shoulder</option>
                                    <option value="M25.019 Hamarthrosis of shoulder">M25.019 Hamarthrosis of
                                        shoulder</option>
                                    <option value="M25.719 Bone spur-osteophyte of shoulder">M25.719 Bone
                                        spur-osteophyte of shoulder</option>
                                    <option value="M75.81 Tendinitis of right shoulder">M75.81 Tendinitis of right
                                        shoulder</option>
                                    <option value="M75.82 Tendinitis of left shoulder">M75.82 Tendinitis of left
                                        shoulder</option>
                                    <option value="M13.119 Monoarthritis of shoulder region">M13.119 Monoarthritis
                                        of shoulder region</option>
                                    <option value="S53.031S Nursemaid's Elbow, right elbow">S53.031S Nursemaid's
                                        Elbow, right elbow</option>
                                    <option value="S53.032S Nursemaid's Elbow, left elbow">S53.032S Nursemaid's
                                        Elbow, left elbow</option>
                                    <option value="M25.629 Stiffness of unspec. elbow">M25.629 Stiffness of unspec.
                                        elbow</option>
                                    <option value="M25.029 Hemarthrosis of elbow">M25.029 Hemarthrosis of elbow
                                    </option>
                                    <option value="M67.429 Ganglion cyst of elbow">M67.429 Ganglion cyst of elbow
                                    </option>
                                    <option value="M24.629 Ankylosis of elbow">M24.629 Ankylosis of elbow</option>
                                    <option value="M25.729 Bone spur of elbow">M25.729 Bone spur of elbow</option>
                                    <option value="M19.021 Arthriris of right elbow">M19.021 Arthriris of right
                                        elbow</option>
                                    <option value="M19.022 Arthritis of left elbow">M19.022 Arthritis of left elbow
                                    </option>
                                    <option value="M21.331 Wrist drop, right wrist">M21.331 Wrist drop, right wrist
                                    </option>
                                    <option value="M21.332 Wrist drop, left wrist">M21.332 Wrist drop, left wrist
                                    </option>
                                    <option value="M25.639 Stiffness of unspec. wrist">M25.639 Stiffness of unspec.
                                        wrist</option>
                                    <option value="M25.039 Hemarthrosis of wrist">M25.039 Hemarthrosis of wrist
                                    </option>
                                    <option value="M67.439 Gangolian cyst of wrist">M67.439 Gangolian cyst of wrist
                                    </option>
                                    <option value="M25.739 Bone spur of wrist">M25.739 Bone spur of wrist</option>
                                    <option value="M25.439 Effusion of unspec. wrist">M25.439 Effusion of unspec.
                                        wrist</option>
                                    <option value="M13.139 Monarthritis of unspec. wrist">M13.139 Monarthritis of
                                        unspec. wrist</option>
                                    <option value="M25.539 Arthralgia of wrist">M25.539 Arthralgia of wrist</option>
                                </select></div>
                            <div id="dxcodelowerextremity6" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectlowerextremity6" name="dxcodelowerextremity6" style="width:260px"
                                    onchange="selectte('lowerextremity','6','F');checkadd('6','lowerextremity');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M72.2 Planter fascitis">M72.2 Planter fascitis</option>
                                    <option value="S93.01XA Subluxation right ankle/foot">S93.01XA Subluxation right
                                        ankle/foot</option>
                                    <option value="S93.02XA Subluxation left ankle/foot">S93.02XA Subluxation left
                                        ankle/foot</option>
                                    <option value="M99.06 Segmental and somatic dysfunction of lower extremity">
                                        M99.06 Segmental and somatic dysfunction of lower extremity</option>
                                    <option value="M76.61 Achilles Tendinitis, Right Leg">M76.61 Achilles
                                        Tendinitis, Right Leg</option>
                                    <option value="M76.62 Achilles Tendinitis, Left Leg">M76.62 Achilles Tendinitis,
                                        Left Leg</option>
                                    <option value="S73.191A Other sprain of right hip, initial encounter">S73.191A
                                        Other sprain of right hip, initial encounter</option>
                                    <option value="S73.192A Other sprain of left hip, initial encounter">S73.192A
                                        Other sprain of left hip, initial encounter</option>
                                    <option
                                        value="S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter">
                                        S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter
                                    </option>
                                    <option
                                        value="S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter">
                                        S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter
                                    </option>
                                    <option
                                        value="S83.91XA Sprain of unspecified site of right knee, initial encounter">
                                        S83.91XA Sprain of unspecified site of right knee, initial encounter
                                    </option>
                                    <option value="S83.92XA Sprain of unspecified site of left knee, initial encounter">
                                        S83.92XA Sprain of unspecified site of left knee, initial encounter</option>
                                    <option value="M79.604 Pain in right leg">M79.604 Pain in right leg</option>
                                    <option value="M79.605 Pain in left leg">M79.605 Pain in left leg</option>
                                    <option value="M79.651 Pain in right thigh">M79.651 Pain in right thigh</option>
                                    <option value="M79.652 Pain in left thigh">M79.652 Pain in left thigh</option>
                                    <option value="M79.661 Pain in right lower leg">M79.661 Pain in right lower leg
                                    </option>
                                    <option value="M79.662 Pain in left lower leg">M79.662 Pain in left lower leg
                                    </option>
                                    <option value="M79.671 Pain in right foot">M79.671 Pain in right foot</option>
                                    <option value="M79.672 Pain in left foot">M79.672 Pain in left foot</option>
                                    <option value="M79.674 Pain in right toes">M79.674 Pain in right toes</option>
                                    <option value="M79.675 Pain in left toes">M79.675 Pain in left toes</option>
                                    <option value="M25.551 Pain in right hip">M25.551 Pain in right hip</option>
                                    <option value="M25.552 Pain in left hip">M25.552 Pain in left hip</option>
                                    <option value="M25.561 Pain in right knee">M25.561 Pain in right knee</option>
                                    <option value="M25.562 Pain in left knee">M25.562 Pain in left knee</option>
                                    <option value="M25.571 Pain in right ankle">M25.571 Pain in right ankle</option>
                                    <option value="M25.572 Pain in left ankle">M25.572 Pain in left ankle</option>
                                    <option value="M76.31 Iliotibial band syndrome, right leg">M76.31 Iliotibial
                                        band syndrome, right leg</option>
                                    <option value="M76.32 Iliotibial band syndrome, left leg">M76.32 Iliotibial band
                                        syndrome, left leg</option>
                                    <option value="M70.50 Bursitis of unspec. knee">M70.50 Bursitis of unspec. knee
                                    </option>
                                    <option value="M25.069 Hemarthrosis of unspec. knee">M25.069 Hemarthrosis of
                                        unspec. knee</option>
                                    <option value="M94.269 Chondromalacia of unspec. knee">M94.269 Chondromalacia of
                                        unspec. knee</option>
                                    <option value="M67.469 Gangolian cyst of unspec. knee">M67.469 Gangolian cyst of
                                        unspec. knee</option>
                                    <option value="M25.760 Bone spur of unspec. knee">M25.760 Bone spur of unspec.
                                        knee</option>
                                    <option value="M23.40 Loose body in spec. knee">M23.40 Loose body in spec. knee
                                    </option>
                                    <option value="M25.669 Stiffness of unspec. knee">M25.669 Stiffness of unspec.
                                        knee</option>
                                    <option value="M70.51 Bursitis of right knee">M70.51 Bursitis of right knee
                                    </option>
                                    <option value="M70.52 Bursitis of left knee">M70.52 Bursitis of left knee
                                    </option>
                                    <option value="M21.371 Foot drop right foot">M21.371 Foot drop right foot
                                    </option>
                                    <option value="M21.372 Foot drop left foot">M21.372 Foot drop left foot</option>
                                    <option value="Q72.70 Cleft foot-split foot">Q72.70 Cleft foot-split foot
                                    </option>
                                    <option value="S90.30XA Contusion of foot">S90.30XA Contusion of foot</option>
                                    <option value="M25.076 Hemarthrosis of unspec. foot">M25.076 Hemarthrosis of
                                        unspec. foot</option>
                                    <option value="M25.776 Bone spur of foot">M25.776 Bone spur of foot</option>
                                    <option value="T69.021A Immersion of right foot">T69.021A Immersion of right
                                        foot</option>
                                    <option value="T69.022A Immersion of left foot">T69.022A Immersion of left foot
                                    </option>
                                </select></div>
                            <div id="dxcodeheadache6" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectheadache6" name="dxcodeheadache6" style="width:260px"
                                    onchange="selectte('headache','6','F');checkadd('6','headache');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="G43.001 Migraine">G43.001 Migraine</option>
                                    <option value="G44.209 Tension-type headache">G44.209 Tension-type headache
                                    </option>
                                    <option value="G44.89 Headache">G44.89 Headache</option>
                                    <option value="R42 Dizziness">R42 Dizziness</option>
                                    <option value="R51 Headache">R51 Headache</option>
                                    <option value="G44.201 Tension-Type Headache, unspecified, intractable">G44.201
                                        Tension-Type Headache, unspecified, intractable</option>
                                    <option value="G44.209 Tension-Type Headache, unspecified, not intractable">
                                        G44.209 Tension-Type Headache, unspecified, not intractable</option>
                                    <option
                                        value="G43.001 Migraine without aura, not intractable, with status migrainosus">
                                        G43.001 Migraine without aura, not intractable, with status migrainosus
                                    </option>
                                    <option
                                        value="G43.009 Migraine without aura, not intractable, without status migrainosus">
                                        G43.009 Migraine without aura, not intractable, without status migrainosus
                                    </option>
                                    <option value="G43.011 Migraine without aura, intractable, with status migrainosus">
                                        G43.011 Migraine without aura, intractable, with status migrainosus</option>
                                    <option
                                        value="G43.019 Migraine without aura, intractable, without status migrainosus">
                                        G43.019 Migraine without aura, intractable, without status migrainosus
                                    </option>
                                    <option
                                        value="G43.101 Migraine with aura, not intractable, with status migrainosus">
                                        G43.101 Migraine with aura, not intractable, with status migrainosus
                                    </option>
                                    <option
                                        value="G43.109 Migraine with aura, not intractable, without status migrainosus">
                                        G43.109 Migraine with aura, not intractable, without status migrainosus
                                    </option>
                                    <option value="G43.111 Migraine with aura, intractable, with status migrainosus">
                                        G43.111 Migraine with aura, intractable, with status migrainosus</option>
                                    <option value="G43.119 Migraine with aura, intractable, without status migrainosus">
                                        G43.119 Migraine with aura, intractable, without status migrainosus</option>
                                    <option value="G44.219 Tension Headache episodic">G44.219 Tension Headache
                                        episodic</option>
                                    <option value="G44.229 Tension Headache chronic">G44.229 Tension Headache
                                        chronic</option>
                                    <option value="G44.319 Acute post-traumatic headache">G44.319 Acute
                                        post-traumatic headache</option>
                                    <option value="G44.329 Chronic post-traumatic headache">G44.329 Chronic
                                        post-traumatic headache</option>
                                    <option value="S06.0X0A Mild concussion (no loc) acute">S06.0X0A Mild concussion
                                        (no loc) acute</option>
                                    <option value="S06.0X1A Mild concussion (LOC<30MINS)">S06.0X1A Mild concussion
                                        (LOC<30MINS)< /option>
                                    <option value="F07.81 Post-Concussion Syndrome">F07.81 Post-Concussion Syndrome
                                    </option>
                                    <option value="H53.8 Blurry Vision">H53.8 Blurry Vision</option>
                                    <option value="H93.19 Tinnitus unspecified">H93.19 Tinnitus unspecified</option>
                                </select></div>
                            <div id="dxcodegeneral6" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectgeneral6" name="dxcodegeneral6" style="width:260px"
                                    onchange="selectte('general','6','F');checkadd('6','general');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M62.830 Muscle spasm of the back">M62.830 Muscle spasm of the
                                        back</option>
                                    <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                    <option value="R42 Vertigo, dizziness & giddiness">R42 Vertigo, dizziness &
                                        giddiness</option>
                                    <option value="M62.830 Muscle spasm of back">M62.830 Muscle spasm of back
                                    </option>
                                    <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                    <option value="M79.7 Fibromyalgia">M79.7 Fibromyalgia</option>
                                    <option value="M72.8 Fascitis">M72.8 Fascitis</option>
                                    <option value="M25.2 Limb cramp or spasm">M25.2 Limb cramp or spasm</option>
                                    <option value="M62.40 Muscle contracture (neck, thoracic, lumbar)">M62.40 Muscle
                                        contracture (neck, thoracic, lumbar)</option>
                                    <option value="M25.50 Unspecified Joint(s) tender/painful (NK/MBLB)">M25.50
                                        Unspecified Joint(s) tender/painful (NK/MBLB)</option>
                                    <option value="M25.60 Joint(s) stiff (next, thoracic, lumbar)">M25.60 Joint(s)
                                        stiff (next, thoracic, lumbar)</option>
                                    <option value="M35.7 Hypermobility syndrome">M35.7 Hypermobility syndrome
                                    </option>
                                    <option value="M81.0 Age related osteoporosis w/o pathological fracture">M81.0
                                        Age related osteoporosis w/o pathological fracture</option>
                                    <option value="M99.05 Segmental and comatic dysfunction of pelvic region">M99.05
                                        Segmental and comatic dysfunction of pelvic region</option>
                                    <option value="R20.1 Hypoesthesia of skin">R20.1 Hypoesthesia of skin</option>
                                    <option value="R20.2 Spin parethesia">R20.2 Spin parethesia</option>
                                    <option value="R20.3 Hyperesthesia of skin">R20.3 Hyperesthesia of skin</option>
                                    <option value="R26.81 Unsteady on feet">R26.81 Unsteady on feet</option>
                                    <option value="R26.2 Difficulty Walking">R26.2 Difficulty Walking</option>
                                </select></div>
                            <div id="addcodediv6" style="display:none;">
                                <table width="300" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="200"><input id="dxcodeadd6" name="dxcodeadd6" style="width:200px"
                                                value=""></td>
                                        <td align="center" width="40"><img src="nlimages/delete.png" width="15"
                                                height="15" onclick="hideadd('6','');"></td>
                                        <td width="60" align="right"><a href="#">Manage</a></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td bgcolor="#f1f1f1" width="59%">
                            <input type="hidden" name="showpointersF" id="showpointersF">
                            <div id="showpointerdivF"></div>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="border-left:1px solid black;padding:5px;">
                <div id="showunits5"></div>
            </td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="5" width="100%">
                        <tr>
                            <td width="6%" align="center"><b>G</b></td>
                            <td width="15%"><select name="dxcategory7" id="dx7"
                                    onchange="populateselect('7');exampopulate();">
                                    <option value=""></option>
                                    <option value="cervical">Cervical</option>
                                    <option value="thoracic">Thoracic</option>
                                    <option value="lumbar">Lumbar/SI</option>
                                    <option value="pelvis">Pelvis Sacrum Coccyx</option>
                                    <option value="generalspinal">General Spinal</option>
                                    <option value="upperextremity">Upper Extremity</option>
                                    <option value="lowerextremity">Lower Extremity</option>
                                    <option value="headache">Headache</option>
                                    <option value="general">General</option>
                                </select></td>
                            <td width="20%">
                                <div id="dxcodedefault7" style="display:block;"><select style="width:300px;">
                                        <option value="" selected>Select a category for codes</option>
                                    </select></div>
                                <div id="dxcodecervical7" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectcervical7" name="dxcodecervical7" style="width:260px"
                                        onchange="selectte('cervical','7','G');checkadd('7','cervical');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="G54.0 Brachial Plexus disorders">G54.0 Brachial Plexus
                                            disorders</option>
                                        <option value="G54.2 Cervical root disorders">G54.2 Cervical root disorders
                                        </option>
                                        <option value="M40.292 Cervical kyphosis, other">M40.292 Cervical kyphosis,
                                            other</option>
                                        <option value="M43.12 Sponylolisthesis, cervical region">M43.12
                                            Sponylolisthesis, cervical region</option>
                                        <option value="M43.6 Torticollis">M43.6 Torticollis</option>
                                        <option value="M46.02 Spinal enthesopathy, cervical region">M46.02 Spinal
                                            enthesopathy, cervical region</option>
                                        <option value="M47.12 Spondylosis w/out myelopathy, cervical region">M47.12
                                            Spondylosis w/out myelopathy, cervical region</option>
                                        <option value="M48.02 Spinal Stenosis, cervical region (C3-C7)">M48.02
                                            Spinal Stenosis, cervical region (C3-C7)</option>
                                        <option value="M48.32 Traumatic spondylopathy, cervical region">M48.32
                                            Traumatic spondylopathy, cervical region</option>
                                        <option value="M50.01 IVD disorder w/ myelopathy Cervical">M50.01 IVD
                                            disorder w/ myelopathy Cervical</option>
                                        <option value="M50.12 Cervical disc disorder w/ radiculopathy">M50.12
                                            Cervical disc disorder w/ radiculopathy</option>
                                        <option value="M50.20 Cervical disc displacement">M50.20 Cervical disc
                                            displacement</option>
                                        <option value="M50.30 Cervical disc disgnereation">M50.30 Cervical disc
                                            disgnereation</option>
                                        <option value="M50.90 Cervical disc disorder">M50.90 Cervical disc disorder
                                        </option>
                                        <option value="M53.0 Cervicocranial syndrome">M53.0 Cervicocranial syndrome
                                        </option>
                                        <option value="M53.1 Cervicobrachial syndrome">M53.1 Cervicobrachial
                                            syndrome</option>
                                        <option value="M54.12 Radiculopathy, cervical region">M54.12 Radiculopathy,
                                            cervical region</option>
                                        <option value="M54.2 Cervicalgia">M54.2 Cervicalgia</option>
                                        <option value="M62.838 Muscle spasm, other">M62.838 Muscle spasm, other
                                        </option>
                                        <option value="S13.4XXA Cervical sprain">S13.4XXA Cervical sprain</option>
                                        <option value="S14.2XXA Nerve root injury, cervical">S14.2XXA Nerve root
                                            injury, cervical</option>
                                        <option value="S143.XXA Brachial plexus injury">S143.XXA Brachial plexus
                                            injury</option>
                                        <option value="S16.1XXA Strain, Neck muscles">S16.1XXA Strain, Neck muscles
                                        </option>
                                        <option value="M99.00 Segmental Somatic Dysfunction Occiptal-Head">M99.00
                                            Segmental Somatic Dysfunction Occiptal-Head</option>
                                        <option value="M99.01 Segmental Somatic Dysfunction of Cervical Region">
                                            M99.01 Segmental Somatic Dysfunction of Cervical Region</option>
                                        <option
                                            value="S13.4XXA Spain of ligaments of cervical spine, initial encounter">
                                            S13.4XXA Spain of ligaments of cervical spine, initial encounter
                                        </option>
                                        <option
                                            value="S16.1XXA Strain of muscle, fascia and tendon at next level, initial encounter">
                                            S16.1XXA Strain of muscle, fascia and tendon at next level, initial
                                            encounter</option>
                                        <option value="S14.2XXA Injury nerve root cervical, initial encounter">
                                            S14.2XXA Injury nerve root cervical, initial encounter</option>
                                        <option value="G54.1 Nerve root lesion cervical">G54.1 Nerve root lesion
                                            cervical</option>
                                        <option value="M50.33 Disc degeneration cervicothoracic region">M50.33 Disc
                                            degeneration cervicothoracic region</option>
                                        <option value="M50.22 Cervical disc displacement C3-C7">M50.22 Cervical disc
                                            displacement C3-C7</option>
                                        <option value="M50.23 Cervical disc displacement C7-T1">M50.23 Cervical disc
                                            displacement C7-T1</option>
                                        <option value="M50.31 Cervical disc degeneration C2-C4">M50.31 Cervical disc
                                            degeneration C2-C4</option>
                                        <option value="M50.32 Cervical disc degeneration C3-C7">M50.32 Cervical disc
                                            degeneration C3-C7</option>
                                        <option value="M50.33 Cervical disc degeneration C7-T1">M50.33 Cervical disc
                                            degeneration C7-T1</option>
                                        <option value="M53.2X2 Cervical spine instabilities">M53.2X2 Cervical spine
                                            instabilities</option>
                                        <option value="M40.202 Kyphosis unspecified cervical">M40.202 Kyphosis
                                            unspecified cervical</option>
                                        <option value="S13.4XXS Sequela sprain neck ligaments">S13.4XXS Sequela
                                            sprain neck ligaments</option>
                                        <option
                                            value="M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial region">
                                            M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial
                                            region</option>
                                        <option
                                            value="M50.12 Cervical disc disorder with radiculopathy, mid-cervical region">
                                            M50.12 Cervical disc disorder with radiculopathy, mid-cervical region
                                        </option>
                                        <option
                                            value="M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region">
                                            M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region
                                        </option>
                                        <option
                                            value="M50.31 Other cervical disc degeneration, occipito-atlanto-axial region">
                                            M50.31 Other cervical disc degeneration, occipito-atlanto-axial region
                                        </option>
                                        <option value="M50.32 Other cervical disc degeneration, mid-cervical region">
                                            M50.32 Other cervical disc degeneration, mid-cervical region</option>
                                        <option value="M50.33 Other cervical disc degeneration, cervicothoracic region">
                                            M50.33 Other cervical disc degeneration, cervicothoracic region</option>
                                    </select></div>
                                <div id="dxcodethoracic7" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectthoracic7" name="dxcodethoracic7" style="width:260px"
                                        onchange="selectte('thoracic','7','G');checkadd('7','thoracic');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M99.02 Segmental dysf./Sublux, thoracic">M99.02 Segmental
                                            dysf./Sublux, thoracic</option>
                                        <option value="G54.3 Thoracic root disorders">G54.3 Thoracic root disorders
                                        </option>
                                        <option value="M43.14 Spondylolistesis, thoracic region">M43.14
                                            Spondylolistesis, thoracic region</option>
                                        <option value="M46.04 Spinal enthesopathy, thoracic region">M46.04 Spinal
                                            enthesopathy, thoracic region</option>
                                        <option value="M47.24 Spondylosis w/ radiculopathy, thoracic region">M47.24
                                            Spondylosis w/ radiculopathy, thoracic region</option>
                                        <option value="M47.814 Spondylosis w/out mwelopathy, thoracic">M47.814
                                            Spondylosis w/out mwelopathy, thoracic</option>
                                        <option value="M48.04 Spinal stenosis, thoracic region (T1-G12)">M48.04
                                            Spinal stenosis, thoracic region (T1-G12)</option>
                                        <option value="M51.34 Intervertebral disc degeneration, thoracic region">
                                            M51.34 Intervertebral disc degeneration, thoracic region</option>
                                        <option value="M51.84 IVD Thoracic">M51.84 IVD Thoracic</option>
                                        <option value="M54.14 Radiculopathy, thoracic">M54.14 Radiculopathy,
                                            thoracic</option>
                                        <option value="M54.6 Pain in thoracic spine">M54.6 Pain in thoracic spine
                                        </option>
                                        <option value="S23.3XXA Thoracic spine">S23.3XXA Thoracic spine</option>
                                        <option value="S24.2XXA Nerve root injury, thoracic">S24.2XXA Nerve root
                                            injury, thoracic</option>
                                        <option value="MS4.6 Pain in Thoracic spine">MS4.6 Pain in Thoracic spine
                                        </option>
                                        <option value="M99.02 Segmental and somatic dysfunction of the thoracic region">
                                            M99.02 Segmental and somatic dysfunction of the thoracic region</option>
                                        <option value="M99.08 Segmental and somatic dysfunction of rib cage">M99.08
                                            Segmental and somatic dysfunction of rib cage</option>
                                        <option
                                            value="S23.3XXA Sprain of ligaments of thoracic spine, initial encounter">
                                            S23.3XXA Sprain of ligaments of thoracic spine, initial encounter
                                        </option>
                                        <option value="S23.41XA Sprain of ribs, initial encounter">S23.41XA Sprain
                                            of ribs, initial encounter</option>
                                        <option value="S23.421A Sprain of chrondrosternal joint, initial encounter">
                                            S23.421A Sprain of chrondrosternal joint, initial encounter</option>
                                        <option
                                            value="M51.14 Intervertebral disc disorders with radiculopathy, thoracic region">
                                            M51.14 Intervertebral disc disorders with radiculopathy, thoracic region
                                        </option>
                                        <option value="M53.84 Other specified dorsopathies, thoracic region">M53.84
                                            Other specified dorsopathies, thoracic region</option>
                                        <option value="M41.114 Juvenile idiopathic scoliosis, thoracic region">
                                            M41.114 Juvenile idiopathic scoliosis, thoracic region</option>
                                        <option value="M41.124 Adolescent idiopathic scoliosis, thoracic region">
                                            M41.124 Adolescent idiopathic scoliosis, thoracic region</option>
                                        <option value="M41.44 Neuromuscular scoliosis, thoracic region">M41.44
                                            Neuromuscular scoliosis, thoracic region</option>
                                        <option value="M40.00 Kyphosis postural acquired">M40.00 Kyphosis postural
                                            acquired</option>
                                        <option value="M40.04 Postural kyphosis thoracic">M40.04 Postural kyphosis
                                            thoracic</option>
                                        <option value="M40.03 Cervicothoracic">M40.03 Cervicothoracic</option>
                                        <option value="S29.012A Strain muscle-tendon back wall thorax acute">
                                            S29.012A Strain muscle-tendon back wall thorax acute</option>
                                        <option value="G43.3 Nerve root disorder-thoracic">G43.3 Nerve root
                                            disorder-thoracic</option>
                                        <option value="M53.2X4 Spinal instabilities thoracic region">M53.2X4 Spinal
                                            instabilities thoracic region</option>
                                    </select></div>
                                <div id="dxcodelumbar7" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectlumbar7" name="dxcodelumbar7" style="width:260px"
                                        onchange="selectte('lumbar','7','G');checkadd('7','lumbar');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="G54.1 Lumbosacral plexus disorders">G54.1 Lumbosacral plexus
                                            disorders</option>
                                        <option value="G54.4 Lumbosacral root disorders">G54.4 Lumbosacral root
                                            disorders</option>
                                        <option value="M43.16 Spondylolisthesis, lumbar region">M43.16
                                            Spondylolisthesis, lumbar region</option>
                                        <option value="M46.06 Spinal enthesopathy, lumbar region">M46.06 Spinal
                                            enthesopathy, lumbar region</option>
                                        <option value="M47.896 Spondylosis, lumbar region">M47.896 Spondylosis,
                                            lumbar region</option>
                                        <option value="M51.06 IVD Disorder w/myelopathy lumbar">M51.06 IVD Disorder
                                            w/myelopathy lumbar</option>
                                        <option value="M51.26 Intervertebral disc displacement, lumbar">M51.26
                                            Intervertebral disc displacement, lumbar</option>
                                        <option value="M51.36 Intervertebral disc degeneration, lumbar">M51.36
                                            Intervertebral disc degeneration, lumbar</option>
                                        <option value="M54.08 Lumbar facet syndrome">M54.08 Lumbar facet syndrome
                                        </option>
                                        <option value="M54.16 Low back pain">M54.16 Low back pain</option>
                                        <option value="S33.5XXA Lumbar spine strain">S33.5XXA Lumbar spine strain
                                        </option>
                                        <option value="M54.5 Low back pain">M54.5 Low back pain</option>
                                        <option value="M99.03 Segmental and somatic dysfunction of lumbar region">
                                            M99.03 Segmental and somatic dysfunction of lumbar region</option>
                                        <option value="M99.04 Segmental and somatic dysfunction of sacral region">
                                            M99.04 Segmental and somatic dysfunction of sacral region</option>
                                        <option value="S33.5XXA Sprain of ligaments of lumbar spine, initial encounter">
                                            S33.5XXA Sprain of ligaments of lumbar spine, initial encounter</option>
                                        <option value="S33.6XXA Sprain of sacroiliac joint, inital encounter">
                                            S33.6XXA Sprain of sacroiliac joint, inital encounter</option>
                                        <option
                                            value="S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter">
                                            S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial
                                            encounter</option>
                                        <option
                                            value="S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial encounter">
                                            S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis,
                                            initial encounter</option>
                                        <option
                                            value="S39.012A Strain of muscle, fascia and tendon of lower back, initial encounter">
                                            S39.012A Strain of muscle, fascia and tendon of lower back, initial
                                            encounter</option>
                                        <option
                                            value="M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar region">
                                            M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar
                                            region</option>
                                        <option
                                            value="M51.16 Intervertebral disc disorders with radiculopathy, lumbar region">
                                            M51.16 Intervertebral disc disorders with radiculopathy, lumbar region
                                        </option>
                                        <option
                                            value="M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region">
                                            M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral
                                            region</option>
                                        <option value="M51.36 Other intervertebral disc degeneration, lumbar region">
                                            M51.36 Other intervertebral disc degeneration, lumbar region</option>
                                        <option
                                            value="M51.37 Other intervertebral disc degeneration, lumbosacral region">
                                            M51.37 Other intervertebral disc degeneration, lumbosacral region
                                        </option>
                                        <option
                                            value="M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region">
                                            M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region
                                        </option>
                                        <option
                                            value="M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region">
                                            M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral
                                            region</option>
                                        <option value="M54.31 Sciatica, right side">M54.31 Sciatica, right side
                                        </option>
                                        <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left side
                                        </option>
                                        <option value="M99.03 Segmental Somatic dysfunction Lumbar">M99.03 Segmental
                                            Somatic dysfunction Lumbar</option>
                                        <option value="M99.04 Segmental Somatic dysfunction SI. Sacrum">M99.04
                                            Segmental Somatic dysfunction SI. Sacrum</option>
                                        <option value="M54.41 Lumbago with sciatica, right side">M54.41 Lumbago with
                                            sciatica, right side</option>
                                        <option value="M54.42 Lumbago with sciatica, left side">M54.42 Lumbago with
                                            sciatica, left side</option>
                                        <option value="M54.16 Radiculopathy, lumbar region">M54.16 Radiculopathy,
                                            lumbar region</option>
                                        <option value="M54.17 Radiculopathy, lumboscral region">M54.17
                                            Radiculopathy, lumboscral region</option>
                                        <option value="M53.3 Sacrococcygeal disorders, not elsewhere classified">
                                            M53.3 Sacrococcygeal disorders, not elsewhere classified</option>
                                        <option value="M53.85 Other specified dorsopathies, thoracolumbar region">
                                            M53.85 Other specified dorsopathies, thoracolumbar region</option>
                                        <option value="M53.86 Other specified dorsopathies, lumbar region">M53.86
                                            Other specified dorsopathies, lumbar region</option>
                                        <option value="M48.06 Spinal stenosis, lumbar region">M48.06 Spinal
                                            stenosis, lumbar region</option>
                                        <option value="M41.115 Juvenile idiopathic scoliosis, thoracolumbar region">
                                            M41.115 Juvenile idiopathic scoliosis, thoracolumbar region</option>
                                        <option value="M41.116 Juvenile idiopathic scoliosis, lumbar region">M41.116
                                            Juvenile idiopathic scoliosis, lumbar region</option>
                                        <option value="M41.127 Adolescent idiopathic scoliosis, lumbosacral region">
                                            M41.127 Adolescent idiopathic scoliosis, lumbosacral region</option>
                                        <option value="M41.45 Neuromuscular scoliosis, thoracolumbar region">M41.45
                                            Neuromuscular scoliosis, thoracolumbar region</option>
                                        <option value="M41.46 Neuromuscular scoliosis, lumbar region">M41.46
                                            Neuromuscular scoliosis, lumbar region</option>
                                        <option value="M41.47 Neuromuscular scoliosis, lumbosacral region">M41.47
                                            Neuromuscular scoliosis, lumbosacral region</option>
                                        <option value="M51.26 Intervertebral disc displacement Lumbar L2-L5">M51.26
                                            Intervertebral disc displacement Lumbar L2-L5</option>
                                        <option value="M51.27 Intervertebral disc displacement L5-S1">M51.27
                                            Intervertebral disc displacement L5-S1</option>
                                        <option value="M51.36 Degeneration Lumbar Disc L2-L5">M51.36 Degeneration
                                            Lumbar Disc L2-L5</option>
                                        <option value="M51.37 Degeneration Lumbarsacral Disc L5-S1">M51.37
                                            Degeneration Lumbarsacral Disc L5-S1</option>
                                        <option value="M46.1 Sacroilitis">M46.1 Sacroilitis</option>
                                        <option value="M53.2X7 Spinal instabilities lumbosacral region">M53.2X7
                                            Spinal instabilities lumbosacral region</option>
                                        <option value="M53.2X6 Spinal instabilities lumbar spine">M53.2X6 Spinal
                                            instabilities lumbar spine</option>
                                    </select></div>
                                <div id="dxcodepelvis7" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectpelvis7" name="dxcodepelvis7" style="width:260px"
                                        onchange="selectte('pelvis','7','G');checkadd('7','pelvis');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M99.04 Segmental dysf/Sublux, sacral">M99.04 Segmental
                                            dysf/Sublux, sacral</option>
                                        <option value="M99.05 Segmental dysf/Sublux, pelvic">M99.05 Segmental
                                            dysf/Sublux, pelvic</option>
                                        <option value="M43.08 Spondylosis, sacral region">M43.08 Spondylosis, sacral
                                            region</option>
                                        <option value="M54.31 Sciatica, right side">M54.31 Sciatica, right side
                                        </option>
                                        <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left side
                                        </option>
                                        <option value="S33.6 Sprain SI joint">S33.6 Sprain SI joint</option>
                                    </select></div>
                                <div id="dxcodegeneralspinal7" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectgeneralspinal7" name="dxcodegeneralspinal7" style="width:260px"
                                        onchange="selectte('generalspinal','7','G');checkadd('7','generalspinal');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="Q67.5 Scliosis, congenital">Q67.5 Scliosis, congenital
                                        </option>
                                    </select></div>
                                <div id="dxcodeupperextremity7" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectupperextremity7" name="dxcodeupperextremity7"
                                        style="width:260px"
                                        onchange="selectte('upperextremity','7','G');checkadd('7','upperextremity');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M77.11 Lateral epicondylitis, right elbow">M77.11 Lateral
                                            epicondylitis, right elbow</option>
                                        <option value="M77.12 Lateral epicondylitis, left elbow">M77.12 Lateral
                                            epicondylitis, left elbow</option>
                                        <option value="M99.07 Segmental and somatic dysfunction of upper extremity">
                                            M99.07 Segmental and somatic dysfunction of upper extremity</option>
                                        <option value="G56.01 Carpal tunnel syndrome, right upper limb">G56.01
                                            Carpal tunnel syndrome, right upper limb</option>
                                        <option value="G56.02 Carpal tunnel syndrome, left upper limb">G56.02 Carpal
                                            tunnel syndrome, left upper limb</option>
                                        <option value="M75.0 Adhesive capsulitis of shoulder">M75.0 Adhesive
                                            capsulitis of shoulder</option>
                                        <option value="M75.01 Adhesive capsulitis of right shoulder">M75.01 Adhesive
                                            capsulitis of right shoulder</option>
                                        <option value="M75.02 Adhesive capsulitis of left shoulder">M75.02 Adhesive
                                            capsulitis of left shoulder</option>
                                        <option value="M75.100 Unspec Rotator Cuff tear/rupture">M75.100 Unspec
                                            Rotator Cuff tear/rupture</option>
                                        <option value="M75.101 Unspec Rotator Cuff tear/rupture right shoulder">
                                            M75.101 Unspec Rotator Cuff tear/rupture right shoulder</option>
                                        <option value="M75.102 Unspec Rotator Cuff tear/rupture left shoulder">
                                            M75.102 Unspec Rotator Cuff tear/rupture left shoulder</option>
                                        <option value="M75.21 Bicipital tenosynovitis Right shoulder">M75.21
                                            Bicipital tenosynovitis Right shoulder</option>
                                        <option value="M75.22 Bicipital tenosynovitis Left shoulder">M75.22
                                            Bicipital tenosynovitis Left shoulder</option>
                                        <option value="M75.41 Impingement syndrome of Right shoulder">M75.41
                                            Impingement syndrome of Right shoulder</option>
                                        <option value="M75.42 Impingement syndrome of Left shoulder">M75.42
                                            Impingement syndrome of Left shoulder</option>
                                        <option value="M75.5 Bursitis of shoulder">M75.5 Bursitis of shoulder
                                        </option>
                                        <option value="M75.51 Bursitis of right shoulder">M75.51 Bursitis of right
                                            shoulder</option>
                                        <option value="M75.52 Bursitis of left shoulder">M75.52 Bursitis of left
                                            shoulder</option>
                                        <option value="M77.01 Medial epicondylitis, right elbow">M77.01 Medial
                                            epicondylitis, right elbow</option>
                                        <option value="M77.02 Medial epicondylitis, left elbow">M77.02 Medial
                                            epicondylitis, left elbow</option>
                                        <option value="M77.11 Lateral epicondylitis, right elbow">M77.11 Lateral
                                            epicondylitis, right elbow</option>
                                        <option value="M77.12 Lateral epicondylitis, left elbow">M77.12 Lateral
                                            epicondylitis, left elbow</option>
                                        <option
                                            value="S43.51XA Sprain of right acromioclavicular joint, initial encounter">
                                            S43.51XA Sprain of right acromioclavicular joint, initial encounter
                                        </option>
                                        <option
                                            value="S43.52XA Sprain of left acromioclavicular joint, initial encounter">
                                            S43.52XA Sprain of left acromioclavicular joint, initial encounter
                                        </option>
                                        <option
                                            value="S43.411A Sprain of right coracohumeral (ligament), inital encounter">
                                            S43.411A Sprain of right coracohumeral (ligament), inital encounter
                                        </option>
                                        <option
                                            value="S43.412A Sprain of left coracohumeral (ligament), inital encounter">
                                            S43.412A Sprain of left coracohumeral (ligament), inital encounter
                                        </option>
                                        <option
                                            value="S43.421A Sprain of right rotator cuff capsule, initial encounter">
                                            S43.421A Sprain of right rotator cuff capsule, initial encounter
                                        </option>
                                        <option value="S43.422A Sprain of left rotator cuff capsule, initial encounter">
                                            S43.422A Sprain of left rotator cuff capsule, initial encounter</option>
                                        <option value="S43.911A Right shoulder strain unspecified muscles, Acute">
                                            S43.911A Right shoulder strain unspecified muscles, Acute</option>
                                        <option value="S43.912A Left shoulder strain unspecified muscles, Acute">
                                            S43.912A Left shoulder strain unspecified muscles, Acute</option>
                                        <option
                                            value="S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right shoulder, initial">
                                            S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right
                                            shoulder, initial</option>
                                        <option
                                            value="S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left shoulder, initial">
                                            S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left
                                            shoulder, initial</option>
                                        <option
                                            value="S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of right shoulder">
                                            S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of
                                            right shoulder</option>
                                        <option
                                            value="S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left shoulder">
                                            S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of
                                            left shoulder</option>
                                        <option
                                            value="S46.811A Srain of other muscles, fascia and tendons at shoulder and upper arm level, right arm, initial encounter">
                                            S46.811A Srain of other muscles, fascia and tendons at shoulder and
                                            upper arm level, right arm, initial encounter</option>
                                        <option
                                            value="S46.812A Srain of other muscles, fascia and tendons at shoulder and upper arm level, left arm, initial encounter">
                                            S46.812A Srain of other muscles, fascia and tendons at shoulder and
                                            upper arm level, left arm, initial encounter</option>
                                        <option value="M75.00 Frozen shoulder">M75.00 Frozen shoulder</option>
                                        <option value="M25.511 Pain in right shoulder">M25.511 Pain in right
                                            shoulder</option>
                                        <option value="M25.512 Pain in left shoulder">M25.512 Pain in left shoulder
                                        </option>
                                        <option value="M25.521 Pain in right elbow">M25.521 Pain in right elbow
                                        </option>
                                        <option value="M25.522 Pain in left elbow">M25.522 Pain in left elbow
                                        </option>
                                        <option value="M25.531 Pain in right wrist">M25.531 Pain in right wrist
                                        </option>
                                        <option value="M25.32 Pain in left wrist">M25.32 Pain in left wrist</option>
                                        <option value="M79.601 Pain in right arm">M79.601 Pain in right arm</option>
                                        <option value="M79.602 Pain in left arm">M79.602 Pain in left arm</option>
                                        <option value="M79.621 Pain in right upper arm">M79.621 Pain in right upper
                                            arm</option>
                                        <option value="M79.622 Pain in left upper arm">M79.622 Pain in left upper
                                            arm</option>
                                        <option value="M79.631 Pain in right forearm">M79.631 Pain in right forearm
                                        </option>
                                        <option value="M79.632 Pain in left forearm">M79.632 Pain in left forearm
                                        </option>
                                        <option value="M79.641 Pain in right hand">M79.641 Pain in right hand
                                        </option>
                                        <option value="M79.642 Pain in left hand">M79.642 Pain in left hand</option>
                                        <option value="M79.644 Pain in right finger(s)">M79.644 Pain in right
                                            finger(s)</option>
                                        <option value="M79.645 Pain in left finger(s)">M79.645 Pain in left
                                            finger(s)</option>
                                        <option value="M25.619 Stiffness of unspec. shoulder">M25.619 Stiffness of
                                            unspec. shoulder</option>
                                        <option value="M89.519 Osteolysis of shoulder">M89.519 Osteolysis of
                                            shoulder</option>
                                        <option value="M93.919 Osteochondropathy of shoulder">M93.919
                                            Osteochondropathy of shoulder</option>
                                        <option value="M60.819 Myositis of shoulder">M60.819 Myositis of shoulder
                                        </option>
                                        <option value="M67.419 Ganglion cyst of shoulder">M67.419 Ganglion cyst of
                                            shoulder</option>
                                        <option value="M25.019 Hamarthrosis of shoulder">M25.019 Hamarthrosis of
                                            shoulder</option>
                                        <option value="M25.719 Bone spur-osteophyte of shoulder">M25.719 Bone
                                            spur-osteophyte of shoulder</option>
                                        <option value="M75.81 Tendinitis of right shoulder">M75.81 Tendinitis of
                                            right shoulder</option>
                                        <option value="M75.82 Tendinitis of left shoulder">M75.82 Tendinitis of left
                                            shoulder</option>
                                        <option value="M13.119 Monoarthritis of shoulder region">M13.119
                                            Monoarthritis of shoulder region</option>
                                        <option value="S53.031S Nursemaid's Elbow, right elbow">S53.031S Nursemaid's
                                            Elbow, right elbow</option>
                                        <option value="S53.032S Nursemaid's Elbow, left elbow">S53.032S Nursemaid's
                                            Elbow, left elbow</option>
                                        <option value="M25.629 Stiffness of unspec. elbow">M25.629 Stiffness of
                                            unspec. elbow</option>
                                        <option value="M25.029 Hemarthrosis of elbow">M25.029 Hemarthrosis of elbow
                                        </option>
                                        <option value="M67.429 Ganglion cyst of elbow">M67.429 Ganglion cyst of
                                            elbow</option>
                                        <option value="M24.629 Ankylosis of elbow">M24.629 Ankylosis of elbow
                                        </option>
                                        <option value="M25.729 Bone spur of elbow">M25.729 Bone spur of elbow
                                        </option>
                                        <option value="M19.021 Arthriris of right elbow">M19.021 Arthriris of right
                                            elbow</option>
                                        <option value="M19.022 Arthritis of left elbow">M19.022 Arthritis of left
                                            elbow</option>
                                        <option value="M21.331 Wrist drop, right wrist">M21.331 Wrist drop, right
                                            wrist</option>
                                        <option value="M21.332 Wrist drop, left wrist">M21.332 Wrist drop, left
                                            wrist</option>
                                        <option value="M25.639 Stiffness of unspec. wrist">M25.639 Stiffness of
                                            unspec. wrist</option>
                                        <option value="M25.039 Hemarthrosis of wrist">M25.039 Hemarthrosis of wrist
                                        </option>
                                        <option value="M67.439 Gangolian cyst of wrist">M67.439 Gangolian cyst of
                                            wrist</option>
                                        <option value="M25.739 Bone spur of wrist">M25.739 Bone spur of wrist
                                        </option>
                                        <option value="M25.439 Effusion of unspec. wrist">M25.439 Effusion of
                                            unspec. wrist</option>
                                        <option value="M13.139 Monarthritis of unspec. wrist">M13.139 Monarthritis
                                            of unspec. wrist</option>
                                        <option value="M25.539 Arthralgia of wrist">M25.539 Arthralgia of wrist
                                        </option>
                                    </select></div>
                                <div id="dxcodelowerextremity7" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectlowerextremity7" name="dxcodelowerextremity7"
                                        style="width:260px"
                                        onchange="selectte('lowerextremity','7','G');checkadd('7','lowerextremity');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M72.2 Planter fascitis">M72.2 Planter fascitis</option>
                                        <option value="S93.01XA Subluxation right ankle/foot">S93.01XA Subluxation
                                            right ankle/foot</option>
                                        <option value="S93.02XA Subluxation left ankle/foot">S93.02XA Subluxation
                                            left ankle/foot</option>
                                        <option value="M99.06 Segmental and somatic dysfunction of lower extremity">
                                            M99.06 Segmental and somatic dysfunction of lower extremity</option>
                                        <option value="M76.61 Achilles Tendinitis, Right Leg">M76.61 Achilles
                                            Tendinitis, Right Leg</option>
                                        <option value="M76.62 Achilles Tendinitis, Left Leg">M76.62 Achilles
                                            Tendinitis, Left Leg</option>
                                        <option value="S73.191A Other sprain of right hip, initial encounter">
                                            S73.191A Other sprain of right hip, initial encounter</option>
                                        <option value="S73.192A Other sprain of left hip, initial encounter">
                                            S73.192A Other sprain of left hip, initial encounter</option>
                                        <option
                                            value="S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter">
                                            S76.011A Strain of muscle, fascia and tendon of right hip, initial
                                            encounter</option>
                                        <option
                                            value="S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter">
                                            S76.012A Strain of muscle, fascia and tendon of left hip, initial
                                            encounter</option>
                                        <option
                                            value="S83.91XA Sprain of unspecified site of right knee, initial encounter">
                                            S83.91XA Sprain of unspecified site of right knee, initial encounter
                                        </option>
                                        <option
                                            value="S83.92XA Sprain of unspecified site of left knee, initial encounter">
                                            S83.92XA Sprain of unspecified site of left knee, initial encounter
                                        </option>
                                        <option value="M79.604 Pain in right leg">M79.604 Pain in right leg</option>
                                        <option value="M79.605 Pain in left leg">M79.605 Pain in left leg</option>
                                        <option value="M79.651 Pain in right thigh">M79.651 Pain in right thigh
                                        </option>
                                        <option value="M79.652 Pain in left thigh">M79.652 Pain in left thigh
                                        </option>
                                        <option value="M79.661 Pain in right lower leg">M79.661 Pain in right lower
                                            leg</option>
                                        <option value="M79.662 Pain in left lower leg">M79.662 Pain in left lower
                                            leg</option>
                                        <option value="M79.671 Pain in right foot">M79.671 Pain in right foot
                                        </option>
                                        <option value="M79.672 Pain in left foot">M79.672 Pain in left foot</option>
                                        <option value="M79.674 Pain in right toes">M79.674 Pain in right toes
                                        </option>
                                        <option value="M79.675 Pain in left toes">M79.675 Pain in left toes</option>
                                        <option value="M25.551 Pain in right hip">M25.551 Pain in right hip</option>
                                        <option value="M25.552 Pain in left hip">M25.552 Pain in left hip</option>
                                        <option value="M25.561 Pain in right knee">M25.561 Pain in right knee
                                        </option>
                                        <option value="M25.562 Pain in left knee">M25.562 Pain in left knee</option>
                                        <option value="M25.571 Pain in right ankle">M25.571 Pain in right ankle
                                        </option>
                                        <option value="M25.572 Pain in left ankle">M25.572 Pain in left ankle
                                        </option>
                                        <option value="M76.31 Iliotibial band syndrome, right leg">M76.31 Iliotibial
                                            band syndrome, right leg</option>
                                        <option value="M76.32 Iliotibial band syndrome, left leg">M76.32 Iliotibial
                                            band syndrome, left leg</option>
                                        <option value="M70.50 Bursitis of unspec. knee">M70.50 Bursitis of unspec.
                                            knee</option>
                                        <option value="M25.069 Hemarthrosis of unspec. knee">M25.069 Hemarthrosis of
                                            unspec. knee</option>
                                        <option value="M94.269 Chondromalacia of unspec. knee">M94.269
                                            Chondromalacia of unspec. knee</option>
                                        <option value="M67.469 Gangolian cyst of unspec. knee">M67.469 Gangolian
                                            cyst of unspec. knee</option>
                                        <option value="M25.760 Bone spur of unspec. knee">M25.760 Bone spur of
                                            unspec. knee</option>
                                        <option value="M23.40 Loose body in spec. knee">M23.40 Loose body in spec.
                                            knee</option>
                                        <option value="M25.669 Stiffness of unspec. knee">M25.669 Stiffness of
                                            unspec. knee</option>
                                        <option value="M70.51 Bursitis of right knee">M70.51 Bursitis of right knee
                                        </option>
                                        <option value="M70.52 Bursitis of left knee">M70.52 Bursitis of left knee
                                        </option>
                                        <option value="M21.371 Foot drop right foot">M21.371 Foot drop right foot
                                        </option>
                                        <option value="M21.372 Foot drop left foot">M21.372 Foot drop left foot
                                        </option>
                                        <option value="Q72.70 Cleft foot-split foot">Q72.70 Cleft foot-split foot
                                        </option>
                                        <option value="S90.30XA Contusion of foot">S90.30XA Contusion of foot
                                        </option>
                                        <option value="M25.076 Hemarthrosis of unspec. foot">M25.076 Hemarthrosis of
                                            unspec. foot</option>
                                        <option value="M25.776 Bone spur of foot">M25.776 Bone spur of foot</option>
                                        <option value="T69.021A Immersion of right foot">T69.021A Immersion of right
                                            foot</option>
                                        <option value="T69.022A Immersion of left foot">T69.022A Immersion of left
                                            foot</option>
                                    </select></div>
                                <div id="dxcodeheadache7" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectheadache7" name="dxcodeheadache7" style="width:260px"
                                        onchange="selectte('headache','7','G');checkadd('7','headache');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="G43.001 Migraine">G43.001 Migraine</option>
                                        <option value="G44.209 Tension-type headache">G44.209 Tension-type headache
                                        </option>
                                        <option value="G44.89 Headache">G44.89 Headache</option>
                                        <option value="R42 Dizziness">R42 Dizziness</option>
                                        <option value="R51 Headache">R51 Headache</option>
                                        <option value="G44.201 Tension-Type Headache, unspecified, intractable">
                                            G44.201 Tension-Type Headache, unspecified, intractable</option>
                                        <option value="G44.209 Tension-Type Headache, unspecified, not intractable">
                                            G44.209 Tension-Type Headache, unspecified, not intractable</option>
                                        <option
                                            value="G43.001 Migraine without aura, not intractable, with status migrainosus">
                                            G43.001 Migraine without aura, not intractable, with status migrainosus
                                        </option>
                                        <option
                                            value="G43.009 Migraine without aura, not intractable, without status migrainosus">
                                            G43.009 Migraine without aura, not intractable, without status
                                            migrainosus</option>
                                        <option
                                            value="G43.011 Migraine without aura, intractable, with status migrainosus">
                                            G43.011 Migraine without aura, intractable, with status migrainosus
                                        </option>
                                        <option
                                            value="G43.019 Migraine without aura, intractable, without status migrainosus">
                                            G43.019 Migraine without aura, intractable, without status migrainosus
                                        </option>
                                        <option
                                            value="G43.101 Migraine with aura, not intractable, with status migrainosus">
                                            G43.101 Migraine with aura, not intractable, with status migrainosus
                                        </option>
                                        <option
                                            value="G43.109 Migraine with aura, not intractable, without status migrainosus">
                                            G43.109 Migraine with aura, not intractable, without status migrainosus
                                        </option>
                                        <option
                                            value="G43.111 Migraine with aura, intractable, with status migrainosus">
                                            G43.111 Migraine with aura, intractable, with status migrainosus
                                        </option>
                                        <option
                                            value="G43.119 Migraine with aura, intractable, without status migrainosus">
                                            G43.119 Migraine with aura, intractable, without status migrainosus
                                        </option>
                                        <option value="G44.219 Tension Headache episodic">G44.219 Tension Headache
                                            episodic</option>
                                        <option value="G44.229 Tension Headache chronic">G44.229 Tension Headache
                                            chronic</option>
                                        <option value="G44.319 Acute post-traumatic headache">G44.319 Acute
                                            post-traumatic headache</option>
                                        <option value="G44.329 Chronic post-traumatic headache">G44.329 Chronic
                                            post-traumatic headache</option>
                                        <option value="S06.0X0A Mild concussion (no loc) acute">S06.0X0A Mild
                                            concussion (no loc) acute</option>
                                        <option value="S06.0X1A Mild concussion (LOC<30MINS)">S06.0X1A Mild
                                            concussion (LOC<30MINS)< /option>
                                        <option value="F07.81 Post-Concussion Syndrome">F07.81 Post-Concussion
                                            Syndrome</option>
                                        <option value="H53.8 Blurry Vision">H53.8 Blurry Vision</option>
                                        <option value="H93.19 Tinnitus unspecified">H93.19 Tinnitus unspecified
                                        </option>
                                    </select></div>
                                <div id="dxcodegeneral7" style="display:none;"><select style="width:300px;"
                                        id="dxcodeselectgeneral7" name="dxcodegeneral7" style="width:260px"
                                        onchange="selectte('general','7','G');checkadd('7','general');">
                                        <option value="">Select a code</option>
                                        <option value="add">Add...</option>
                                        <option value="M62.830 Muscle spasm of the back">M62.830 Muscle spasm of the
                                            back</option>
                                        <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                        <option value="R42 Vertigo, dizziness & giddiness">R42 Vertigo, dizziness &
                                            giddiness</option>
                                        <option value="M62.830 Muscle spasm of back">M62.830 Muscle spasm of back
                                        </option>
                                        <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                        <option value="M79.7 Fibromyalgia">M79.7 Fibromyalgia</option>
                                        <option value="M72.8 Fascitis">M72.8 Fascitis</option>
                                        <option value="M25.2 Limb cramp or spasm">M25.2 Limb cramp or spasm</option>
                                        <option value="M62.40 Muscle contracture (neck, thoracic, lumbar)">M62.40
                                            Muscle contracture (neck, thoracic, lumbar)</option>
                                        <option value="M25.50 Unspecified Joint(s) tender/painful (NK/MBLB)">M25.50
                                            Unspecified Joint(s) tender/painful (NK/MBLB)</option>
                                        <option value="M25.60 Joint(s) stiff (next, thoracic, lumbar)">M25.60
                                            Joint(s) stiff (next, thoracic, lumbar)</option>
                                        <option value="M35.7 Hypermobility syndrome">M35.7 Hypermobility syndrome
                                        </option>
                                        <option value="M81.0 Age related osteoporosis w/o pathological fracture">
                                            M81.0 Age related osteoporosis w/o pathological fracture</option>
                                        <option value="M99.05 Segmental and comatic dysfunction of pelvic region">
                                            M99.05 Segmental and comatic dysfunction of pelvic region</option>
                                        <option value="R20.1 Hypoesthesia of skin">R20.1 Hypoesthesia of skin
                                        </option>
                                        <option value="R20.2 Spin parethesia">R20.2 Spin parethesia</option>
                                        <option value="R20.3 Hyperesthesia of skin">R20.3 Hyperesthesia of skin
                                        </option>
                                        <option value="R26.81 Unsteady on feet">R26.81 Unsteady on feet</option>
                                        <option value="R26.2 Difficulty Walking">R26.2 Difficulty Walking</option>
                                    </select></div>
                                <div id="addcodediv7" style="display:none;">
                                    <table width="300" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="200"><input id="dxcodeadd7" name="dxcodeadd7" style="width:200px"
                                                    value=""></td>
                                            <td align="center" width="40"><img src="nlimages/delete.png" width="15"
                                                    height="15" onclick="hideadd('7','');"></td>
                                            <td width="60" align="right"><a href="#">Manage</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td bgcolor="#f1f1f1" width="59%">
                                <input type="hidden" name="showpointersG" id="showpointersG">
                                <div id="showpointerdivG"></div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-left:1px solid black;padding:5px;">
                    <div id="showunits6"></div>
                </td>
            </tr>
            <td>
                <table cellpadding="5" width="100%">
                    <tr>
                        <td width="6%" align="center"><b>H</b></td>
                        <td width="15%"><select name="dxcategory8" id="dx8"
                                onchange="populateselect('8');exampopulate();">
                                <option value=""></option>
                                <option value="cervical">Cervical</option>
                                <option value="thoracic">Thoracic</option>
                                <option value="lumbar">Lumbar/SI</option>
                                <option value="pelvis">Pelvis Sacrum Coccyx</option>
                                <option value="generalspinal">General Spinal</option>
                                <option value="upperextremity">Upper Extremity</option>
                                <option value="lowerextremity">Lower Extremity</option>
                                <option value="headache">Headache</option>
                                <option value="general">General</option>
                            </select></td>
                        <td width="20%">
                            <div id="dxcodedefault8" style="display:block;"><select style="width:300px;">
                                    <option value="" selected>Select a category for codes</option>
                                </select></div>
                            <div id="dxcodecervical8" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectcervical8" name="dxcodecervical8" style="width:260px"
                                    onchange="selectte('cervical','8','H');checkadd('8','cervical');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="G54.0 Brachial Plexus disorders">G54.0 Brachial Plexus disorders
                                    </option>
                                    <option value="G54.2 Cervical root disorders">G54.2 Cervical root disorders
                                    </option>
                                    <option value="M40.292 Cervical kyphosis, other">M40.292 Cervical kyphosis,
                                        other</option>
                                    <option value="M43.12 Sponylolisthesis, cervical region">M43.12
                                        Sponylolisthesis, cervical region</option>
                                    <option value="M43.6 Torticollis">M43.6 Torticollis</option>
                                    <option value="M46.02 Spinal enthesopathy, cervical region">M46.02 Spinal
                                        enthesopathy, cervical region</option>
                                    <option value="M47.12 Spondylosis w/out myelopathy, cervical region">M47.12
                                        Spondylosis w/out myelopathy, cervical region</option>
                                    <option value="M48.02 Spinal Stenosis, cervical region (C3-C7)">M48.02 Spinal
                                        Stenosis, cervical region (C3-C7)</option>
                                    <option value="M48.32 Traumatic spondylopathy, cervical region">M48.32 Traumatic
                                        spondylopathy, cervical region</option>
                                    <option value="M50.01 IVD disorder w/ myelopathy Cervical">M50.01 IVD disorder
                                        w/ myelopathy Cervical</option>
                                    <option value="M50.12 Cervical disc disorder w/ radiculopathy">M50.12 Cervical
                                        disc disorder w/ radiculopathy</option>
                                    <option value="M50.20 Cervical disc displacement">M50.20 Cervical disc
                                        displacement</option>
                                    <option value="M50.30 Cervical disc disgnereation">M50.30 Cervical disc
                                        disgnereation</option>
                                    <option value="M50.90 Cervical disc disorder">M50.90 Cervical disc disorder
                                    </option>
                                    <option value="M53.0 Cervicocranial syndrome">M53.0 Cervicocranial syndrome
                                    </option>
                                    <option value="M53.1 Cervicobrachial syndrome">M53.1 Cervicobrachial syndrome
                                    </option>
                                    <option value="M54.12 Radiculopathy, cervical region">M54.12 Radiculopathy,
                                        cervical region</option>
                                    <option value="M54.2 Cervicalgia">M54.2 Cervicalgia</option>
                                    <option value="M62.838 Muscle spasm, other">M62.838 Muscle spasm, other</option>
                                    <option value="S13.4XXA Cervical sprain">S13.4XXA Cervical sprain</option>
                                    <option value="S14.2XXA Nerve root injury, cervical">S14.2XXA Nerve root injury,
                                        cervical</option>
                                    <option value="S143.XXA Brachial plexus injury">S143.XXA Brachial plexus injury
                                    </option>
                                    <option value="S16.1XXA Strain, Neck muscles">S16.1XXA Strain, Neck muscles
                                    </option>
                                    <option value="M99.00 Segmental Somatic Dysfunction Occiptal-Head">M99.00
                                        Segmental Somatic Dysfunction Occiptal-Head</option>
                                    <option value="M99.01 Segmental Somatic Dysfunction of Cervical Region">M99.01
                                        Segmental Somatic Dysfunction of Cervical Region</option>
                                    <option value="S13.4XXA Spain of ligaments of cervical spine, initial encounter">
                                        S13.4XXA Spain of ligaments of cervical spine, initial encounter</option>
                                    <option
                                        value="S16.1XXA Strain of muscle, fascia and tendon at next level, initial encounter">
                                        S16.1XXA Strain of muscle, fascia and tendon at next level, initial
                                        encounter</option>
                                    <option value="S14.2XXA Injury nerve root cervical, initial encounter">S14.2XXA
                                        Injury nerve root cervical, initial encounter</option>
                                    <option value="G54.1 Nerve root lesion cervical">G54.1 Nerve root lesion
                                        cervical</option>
                                    <option value="M50.33 Disc degeneration cervicothoracic region">M50.33 Disc
                                        degeneration cervicothoracic region</option>
                                    <option value="M50.22 Cervical disc displacement C3-C7">M50.22 Cervical disc
                                        displacement C3-C7</option>
                                    <option value="M50.23 Cervical disc displacement C7-T1">M50.23 Cervical disc
                                        displacement C7-T1</option>
                                    <option value="M50.31 Cervical disc degeneration C2-C4">M50.31 Cervical disc
                                        degeneration C2-C4</option>
                                    <option value="M50.32 Cervical disc degeneration C3-C7">M50.32 Cervical disc
                                        degeneration C3-C7</option>
                                    <option value="M50.33 Cervical disc degeneration C7-T1">M50.33 Cervical disc
                                        degeneration C7-T1</option>
                                    <option value="M53.2X2 Cervical spine instabilities">M53.2X2 Cervical spine
                                        instabilities</option>
                                    <option value="M40.202 Kyphosis unspecified cervical">M40.202 Kyphosis
                                        unspecified cervical</option>
                                    <option value="S13.4XXS Sequela sprain neck ligaments">S13.4XXS Sequela sprain
                                        neck ligaments</option>
                                    <option
                                        value="M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial region">
                                        M50.11 Cervical disc disorder with radiculopathy, occipito-atlanto-axial
                                        region</option>
                                    <option
                                        value="M50.12 Cervical disc disorder with radiculopathy, mid-cervical region">
                                        M50.12 Cervical disc disorder with radiculopathy, mid-cervical region
                                    </option>
                                    <option
                                        value="M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region">
                                        M50.13 Cervical disc disorder with radiculopathy, cervicothoracic region
                                    </option>
                                    <option
                                        value="M50.31 Other cervical disc degeneration, occipito-atlanto-axial region">
                                        M50.31 Other cervical disc degeneration, occipito-atlanto-axial region
                                    </option>
                                    <option value="M50.32 Other cervical disc degeneration, mid-cervical region">
                                        M50.32 Other cervical disc degeneration, mid-cervical region</option>
                                    <option value="M50.33 Other cervical disc degeneration, cervicothoracic region">
                                        M50.33 Other cervical disc degeneration, cervicothoracic region</option>
                                </select></div>
                            <div id="dxcodethoracic8" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectthoracic8" name="dxcodethoracic8" style="width:260px"
                                    onchange="selectte('thoracic','8','H');checkadd('8','thoracic');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M99.02 Segmental dysf./Sublux, thoracic">M99.02 Segmental
                                        dysf./Sublux, thoracic</option>
                                    <option value="G54.3 Thoracic root disorders">G54.3 Thoracic root disorders
                                    </option>
                                    <option value="M43.14 Spondylolistesis, thoracic region">M43.14
                                        Spondylolistesis, thoracic region</option>
                                    <option value="M46.04 Spinal enthesopathy, thoracic region">M46.04 Spinal
                                        enthesopathy, thoracic region</option>
                                    <option value="M47.24 Spondylosis w/ radiculopathy, thoracic region">M47.24
                                        Spondylosis w/ radiculopathy, thoracic region</option>
                                    <option value="M47.814 Spondylosis w/out mwelopathy, thoracic">M47.814
                                        Spondylosis w/out mwelopathy, thoracic</option>
                                    <option value="M48.04 Spinal stenosis, thoracic region (T1-G12)">M48.04 Spinal
                                        stenosis, thoracic region (T1-G12)</option>
                                    <option value="M51.34 Intervertebral disc degeneration, thoracic region">M51.34
                                        Intervertebral disc degeneration, thoracic region</option>
                                    <option value="M51.84 IVD Thoracic">M51.84 IVD Thoracic</option>
                                    <option value="M54.14 Radiculopathy, thoracic">M54.14 Radiculopathy, thoracic
                                    </option>
                                    <option value="M54.6 Pain in thoracic spine">M54.6 Pain in thoracic spine
                                    </option>
                                    <option value="S23.3XXA Thoracic spine">S23.3XXA Thoracic spine</option>
                                    <option value="S24.2XXA Nerve root injury, thoracic">S24.2XXA Nerve root injury,
                                        thoracic</option>
                                    <option value="MS4.6 Pain in Thoracic spine">MS4.6 Pain in Thoracic spine
                                    </option>
                                    <option value="M99.02 Segmental and somatic dysfunction of the thoracic region">
                                        M99.02 Segmental and somatic dysfunction of the thoracic region</option>
                                    <option value="M99.08 Segmental and somatic dysfunction of rib cage">M99.08
                                        Segmental and somatic dysfunction of rib cage</option>
                                    <option value="S23.3XXA Sprain of ligaments of thoracic spine, initial encounter">
                                        S23.3XXA Sprain of ligaments of thoracic spine, initial encounter</option>
                                    <option value="S23.41XA Sprain of ribs, initial encounter">S23.41XA Sprain of
                                        ribs, initial encounter</option>
                                    <option value="S23.421A Sprain of chrondrosternal joint, initial encounter">
                                        S23.421A Sprain of chrondrosternal joint, initial encounter</option>
                                    <option
                                        value="M51.14 Intervertebral disc disorders with radiculopathy, thoracic region">
                                        M51.14 Intervertebral disc disorders with radiculopathy, thoracic region
                                    </option>
                                    <option value="M53.84 Other specified dorsopathies, thoracic region">M53.84
                                        Other specified dorsopathies, thoracic region</option>
                                    <option value="M41.114 Juvenile idiopathic scoliosis, thoracic region">M41.114
                                        Juvenile idiopathic scoliosis, thoracic region</option>
                                    <option value="M41.124 Adolescent idiopathic scoliosis, thoracic region">M41.124
                                        Adolescent idiopathic scoliosis, thoracic region</option>
                                    <option value="M41.44 Neuromuscular scoliosis, thoracic region">M41.44
                                        Neuromuscular scoliosis, thoracic region</option>
                                    <option value="M40.00 Kyphosis postural acquired">M40.00 Kyphosis postural
                                        acquired</option>
                                    <option value="M40.04 Postural kyphosis thoracic">M40.04 Postural kyphosis
                                        thoracic</option>
                                    <option value="M40.03 Cervicothoracic">M40.03 Cervicothoracic</option>
                                    <option value="S29.012A Strain muscle-tendon back wall thorax acute">S29.012A
                                        Strain muscle-tendon back wall thorax acute</option>
                                    <option value="G43.3 Nerve root disorder-thoracic">G43.3 Nerve root
                                        disorder-thoracic</option>
                                    <option value="M53.2X4 Spinal instabilities thoracic region">M53.2X4 Spinal
                                        instabilities thoracic region</option>
                                </select></div>
                            <div id="dxcodelumbar8" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectlumbar8" name="dxcodelumbar8" style="width:260px"
                                    onchange="selectte('lumbar','8','H');checkadd('8','lumbar');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="G54.1 Lumbosacral plexus disorders">G54.1 Lumbosacral plexus
                                        disorders</option>
                                    <option value="G54.4 Lumbosacral root disorders">G54.4 Lumbosacral root
                                        disorders</option>
                                    <option value="M43.16 Spondylolisthesis, lumbar region">M43.16
                                        Spondylolisthesis, lumbar region</option>
                                    <option value="M46.06 Spinal enthesopathy, lumbar region">M46.06 Spinal
                                        enthesopathy, lumbar region</option>
                                    <option value="M47.896 Spondylosis, lumbar region">M47.896 Spondylosis, lumbar
                                        region</option>
                                    <option value="M51.06 IVD Disorder w/myelopathy lumbar">M51.06 IVD Disorder
                                        w/myelopathy lumbar</option>
                                    <option value="M51.26 Intervertebral disc displacement, lumbar">M51.26
                                        Intervertebral disc displacement, lumbar</option>
                                    <option value="M51.36 Intervertebral disc degeneration, lumbar">M51.36
                                        Intervertebral disc degeneration, lumbar</option>
                                    <option value="M54.08 Lumbar facet syndrome">M54.08 Lumbar facet syndrome
                                    </option>
                                    <option value="M54.16 Low back pain">M54.16 Low back pain</option>
                                    <option value="S33.5XXA Lumbar spine strain">S33.5XXA Lumbar spine strain
                                    </option>
                                    <option value="M54.5 Low back pain">M54.5 Low back pain</option>
                                    <option value="M99.03 Segmental and somatic dysfunction of lumbar region">M99.03
                                        Segmental and somatic dysfunction of lumbar region</option>
                                    <option value="M99.04 Segmental and somatic dysfunction of sacral region">M99.04
                                        Segmental and somatic dysfunction of sacral region</option>
                                    <option value="S33.5XXA Sprain of ligaments of lumbar spine, initial encounter">
                                        S33.5XXA Sprain of ligaments of lumbar spine, initial encounter</option>
                                    <option value="S33.6XXA Sprain of sacroiliac joint, inital encounter">S33.6XXA
                                        Sprain of sacroiliac joint, inital encounter</option>
                                    <option
                                        value="S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter">
                                        S33.8XXA Sprain of other parts of lumbar spine and pelvis, initial encounter
                                    </option>
                                    <option
                                        value="S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial encounter">
                                        S39.9XXA Sprain of unspecified parts of the lumbar spine and pelvis, initial
                                        encounter</option>
                                    <option
                                        value="S39.012A Strain of muscle, fascia and tendon of lower back, initial encounter">
                                        S39.012A Strain of muscle, fascia and tendon of lower back, initial
                                        encounter</option>
                                    <option
                                        value="M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar region">
                                        M51.15 Intervertebral disc disorders with radiculopathy, thoracolumbar
                                        region</option>
                                    <option
                                        value="M51.16 Intervertebral disc disorders with radiculopathy, lumbar region">
                                        M51.16 Intervertebral disc disorders with radiculopathy, lumbar region
                                    </option>
                                    <option
                                        value="M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region">
                                        M51.17 Intervertebral disc disorders with radiculopathy, lumbosacral region
                                    </option>
                                    <option value="M51.36 Other intervertebral disc degeneration, lumbar region">
                                        M51.36 Other intervertebral disc degeneration, lumbar region</option>
                                    <option value="M51.37 Other intervertebral disc degeneration, lumbosacral region">
                                        M51.37 Other intervertebral disc degeneration, lumbosacral region</option>
                                    <option
                                        value="M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region">
                                        M47.816 Spondylosis without myelopathy or radiculopathy, lumbar region
                                    </option>
                                    <option
                                        value="M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region">
                                        M47.817 Spondyloses without myelopathy or radiculopathy, lumboscral region
                                    </option>
                                    <option value="M54.31 Sciatica, right side">M54.31 Sciatica, right side</option>
                                    <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left side</option>
                                    <option value="M99.03 Segmental Somatic dysfunction Lumbar">M99.03 Segmental
                                        Somatic dysfunction Lumbar</option>
                                    <option value="M99.04 Segmental Somatic dysfunction SI. Sacrum">M99.04 Segmental
                                        Somatic dysfunction SI. Sacrum</option>
                                    <option value="M54.41 Lumbago with sciatica, right side">M54.41 Lumbago with
                                        sciatica, right side</option>
                                    <option value="M54.42 Lumbago with sciatica, left side">M54.42 Lumbago with
                                        sciatica, left side</option>
                                    <option value="M54.16 Radiculopathy, lumbar region">M54.16 Radiculopathy, lumbar
                                        region</option>
                                    <option value="M54.17 Radiculopathy, lumboscral region">M54.17 Radiculopathy,
                                        lumboscral region</option>
                                    <option value="M53.3 Sacrococcygeal disorders, not elsewhere classified">M53.3
                                        Sacrococcygeal disorders, not elsewhere classified</option>
                                    <option value="M53.85 Other specified dorsopathies, thoracolumbar region">M53.85
                                        Other specified dorsopathies, thoracolumbar region</option>
                                    <option value="M53.86 Other specified dorsopathies, lumbar region">M53.86 Other
                                        specified dorsopathies, lumbar region</option>
                                    <option value="M48.06 Spinal stenosis, lumbar region">M48.06 Spinal stenosis,
                                        lumbar region</option>
                                    <option value="M41.115 Juvenile idiopathic scoliosis, thoracolumbar region">
                                        M41.115 Juvenile idiopathic scoliosis, thoracolumbar region</option>
                                    <option value="M41.116 Juvenile idiopathic scoliosis, lumbar region">M41.116
                                        Juvenile idiopathic scoliosis, lumbar region</option>
                                    <option value="M41.127 Adolescent idiopathic scoliosis, lumbosacral region">
                                        M41.127 Adolescent idiopathic scoliosis, lumbosacral region</option>
                                    <option value="M41.45 Neuromuscular scoliosis, thoracolumbar region">M41.45
                                        Neuromuscular scoliosis, thoracolumbar region</option>
                                    <option value="M41.46 Neuromuscular scoliosis, lumbar region">M41.46
                                        Neuromuscular scoliosis, lumbar region</option>
                                    <option value="M41.47 Neuromuscular scoliosis, lumbosacral region">M41.47
                                        Neuromuscular scoliosis, lumbosacral region</option>
                                    <option value="M51.26 Intervertebral disc displacement Lumbar L2-L5">M51.26
                                        Intervertebral disc displacement Lumbar L2-L5</option>
                                    <option value="M51.27 Intervertebral disc displacement L5-S1">M51.27
                                        Intervertebral disc displacement L5-S1</option>
                                    <option value="M51.36 Degeneration Lumbar Disc L2-L5">M51.36 Degeneration Lumbar
                                        Disc L2-L5</option>
                                    <option value="M51.37 Degeneration Lumbarsacral Disc L5-S1">M51.37 Degeneration
                                        Lumbarsacral Disc L5-S1</option>
                                    <option value="M46.1 Sacroilitis">M46.1 Sacroilitis</option>
                                    <option value="M53.2X7 Spinal instabilities lumbosacral region">M53.2X7 Spinal
                                        instabilities lumbosacral region</option>
                                    <option value="M53.2X6 Spinal instabilities lumbar spine">M53.2X6 Spinal
                                        instabilities lumbar spine</option>
                                </select></div>
                            <div id="dxcodepelvis8" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectpelvis8" name="dxcodepelvis8" style="width:260px"
                                    onchange="selectte('pelvis','8','H');checkadd('8','pelvis');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M99.04 Segmental dysf/Sublux, sacral">M99.04 Segmental
                                        dysf/Sublux, sacral</option>
                                    <option value="M99.05 Segmental dysf/Sublux, pelvic">M99.05 Segmental
                                        dysf/Sublux, pelvic</option>
                                    <option value="M43.08 Spondylosis, sacral region">M43.08 Spondylosis, sacral
                                        region</option>
                                    <option value="M54.31 Sciatica, right side">M54.31 Sciatica, right side</option>
                                    <option value="M54.32 Sciatica, left side">M54.32 Sciatica, left side</option>
                                    <option value="S33.6 Sprain SI joint">S33.6 Sprain SI joint</option>
                                </select></div>
                            <div id="dxcodegeneralspinal8" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectgeneralspinal8" name="dxcodegeneralspinal8" style="width:260px"
                                    onchange="selectte('generalspinal','8','H');checkadd('8','generalspinal');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="Q67.5 Scliosis, congenital">Q67.5 Scliosis, congenital</option>
                                </select></div>
                            <div id="dxcodeupperextremity8" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectupperextremity8" name="dxcodeupperextremity8" style="width:260px"
                                    onchange="selectte('upperextremity','8','H');checkadd('8','upperextremity');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M77.11 Lateral epicondylitis, right elbow">M77.11 Lateral
                                        epicondylitis, right elbow</option>
                                    <option value="M77.12 Lateral epicondylitis, left elbow">M77.12 Lateral
                                        epicondylitis, left elbow</option>
                                    <option value="M99.07 Segmental and somatic dysfunction of upper extremity">
                                        M99.07 Segmental and somatic dysfunction of upper extremity</option>
                                    <option value="G56.01 Carpal tunnel syndrome, right upper limb">G56.01 Carpal
                                        tunnel syndrome, right upper limb</option>
                                    <option value="G56.02 Carpal tunnel syndrome, left upper limb">G56.02 Carpal
                                        tunnel syndrome, left upper limb</option>
                                    <option value="M75.0 Adhesive capsulitis of shoulder">M75.0 Adhesive capsulitis
                                        of shoulder</option>
                                    <option value="M75.01 Adhesive capsulitis of right shoulder">M75.01 Adhesive
                                        capsulitis of right shoulder</option>
                                    <option value="M75.02 Adhesive capsulitis of left shoulder">M75.02 Adhesive
                                        capsulitis of left shoulder</option>
                                    <option value="M75.100 Unspec Rotator Cuff tear/rupture">M75.100 Unspec Rotator
                                        Cuff tear/rupture</option>
                                    <option value="M75.101 Unspec Rotator Cuff tear/rupture right shoulder">M75.101
                                        Unspec Rotator Cuff tear/rupture right shoulder</option>
                                    <option value="M75.102 Unspec Rotator Cuff tear/rupture left shoulder">M75.102
                                        Unspec Rotator Cuff tear/rupture left shoulder</option>
                                    <option value="M75.21 Bicipital tenosynovitis Right shoulder">M75.21 Bicipital
                                        tenosynovitis Right shoulder</option>
                                    <option value="M75.22 Bicipital tenosynovitis Left shoulder">M75.22 Bicipital
                                        tenosynovitis Left shoulder</option>
                                    <option value="M75.41 Impingement syndrome of Right shoulder">M75.41 Impingement
                                        syndrome of Right shoulder</option>
                                    <option value="M75.42 Impingement syndrome of Left shoulder">M75.42 Impingement
                                        syndrome of Left shoulder</option>
                                    <option value="M75.5 Bursitis of shoulder">M75.5 Bursitis of shoulder</option>
                                    <option value="M75.51 Bursitis of right shoulder">M75.51 Bursitis of right
                                        shoulder</option>
                                    <option value="M75.52 Bursitis of left shoulder">M75.52 Bursitis of left
                                        shoulder</option>
                                    <option value="M77.01 Medial epicondylitis, right elbow">M77.01 Medial
                                        epicondylitis, right elbow</option>
                                    <option value="M77.02 Medial epicondylitis, left elbow">M77.02 Medial
                                        epicondylitis, left elbow</option>
                                    <option value="M77.11 Lateral epicondylitis, right elbow">M77.11 Lateral
                                        epicondylitis, right elbow</option>
                                    <option value="M77.12 Lateral epicondylitis, left elbow">M77.12 Lateral
                                        epicondylitis, left elbow</option>
                                    <option value="S43.51XA Sprain of right acromioclavicular joint, initial encounter">
                                        S43.51XA Sprain of right acromioclavicular joint, initial encounter</option>
                                    <option value="S43.52XA Sprain of left acromioclavicular joint, initial encounter">
                                        S43.52XA Sprain of left acromioclavicular joint, initial encounter</option>
                                    <option value="S43.411A Sprain of right coracohumeral (ligament), inital encounter">
                                        S43.411A Sprain of right coracohumeral (ligament), inital encounter</option>
                                    <option value="S43.412A Sprain of left coracohumeral (ligament), inital encounter">
                                        S43.412A Sprain of left coracohumeral (ligament), inital encounter</option>
                                    <option value="S43.421A Sprain of right rotator cuff capsule, initial encounter">
                                        S43.421A Sprain of right rotator cuff capsule, initial encounter</option>
                                    <option value="S43.422A Sprain of left rotator cuff capsule, initial encounter">
                                        S43.422A Sprain of left rotator cuff capsule, initial encounter</option>
                                    <option value="S43.911A Right shoulder strain unspecified muscles, Acute">
                                        S43.911A Right shoulder strain unspecified muscles, Acute</option>
                                    <option value="S43.912A Left shoulder strain unspecified muscles, Acute">
                                        S43.912A Left shoulder strain unspecified muscles, Acute</option>
                                    <option
                                        value="S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right shoulder, initial">
                                        S46.011A Strain of muscle(s) and tendon(s) of the rotator cuff of right
                                        shoulder, initial</option>
                                    <option
                                        value="S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left shoulder, initial">
                                        S46.012A Strain of muscle(s) and tendon(s) of the rotator cuff of left
                                        shoulder, initial</option>
                                    <option
                                        value="S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of right shoulder">
                                        S46.091A Other injury of muscle(s) and Tendon(s) of the rotator cuff of
                                        right shoulder</option>
                                    <option
                                        value="S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left shoulder">
                                        S46.092A Other injury of muscle(s) and Tendon(s) of the rotator cuff of left
                                        shoulder</option>
                                    <option
                                        value="S46.811A Srain of other muscles, fascia and tendons at shoulder and upper arm level, right arm, initial encounter">
                                        S46.811A Srain of other muscles, fascia and tendons at shoulder and upper
                                        arm level, right arm, initial encounter</option>
                                    <option
                                        value="S46.812A Srain of other muscles, fascia and tendons at shoulder and upper arm level, left arm, initial encounter">
                                        S46.812A Srain of other muscles, fascia and tendons at shoulder and upper
                                        arm level, left arm, initial encounter</option>
                                    <option value="M75.00 Frozen shoulder">M75.00 Frozen shoulder</option>
                                    <option value="M25.511 Pain in right shoulder">M25.511 Pain in right shoulder
                                    </option>
                                    <option value="M25.512 Pain in left shoulder">M25.512 Pain in left shoulder
                                    </option>
                                    <option value="M25.521 Pain in right elbow">M25.521 Pain in right elbow</option>
                                    <option value="M25.522 Pain in left elbow">M25.522 Pain in left elbow</option>
                                    <option value="M25.531 Pain in right wrist">M25.531 Pain in right wrist</option>
                                    <option value="M25.32 Pain in left wrist">M25.32 Pain in left wrist</option>
                                    <option value="M79.601 Pain in right arm">M79.601 Pain in right arm</option>
                                    <option value="M79.602 Pain in left arm">M79.602 Pain in left arm</option>
                                    <option value="M79.621 Pain in right upper arm">M79.621 Pain in right upper arm
                                    </option>
                                    <option value="M79.622 Pain in left upper arm">M79.622 Pain in left upper arm
                                    </option>
                                    <option value="M79.631 Pain in right forearm">M79.631 Pain in right forearm
                                    </option>
                                    <option value="M79.632 Pain in left forearm">M79.632 Pain in left forearm
                                    </option>
                                    <option value="M79.641 Pain in right hand">M79.641 Pain in right hand</option>
                                    <option value="M79.642 Pain in left hand">M79.642 Pain in left hand</option>
                                    <option value="M79.644 Pain in right finger(s)">M79.644 Pain in right finger(s)
                                    </option>
                                    <option value="M79.645 Pain in left finger(s)">M79.645 Pain in left finger(s)
                                    </option>
                                    <option value="M25.619 Stiffness of unspec. shoulder">M25.619 Stiffness of
                                        unspec. shoulder</option>
                                    <option value="M89.519 Osteolysis of shoulder">M89.519 Osteolysis of shoulder
                                    </option>
                                    <option value="M93.919 Osteochondropathy of shoulder">M93.919 Osteochondropathy
                                        of shoulder</option>
                                    <option value="M60.819 Myositis of shoulder">M60.819 Myositis of shoulder
                                    </option>
                                    <option value="M67.419 Ganglion cyst of shoulder">M67.419 Ganglion cyst of
                                        shoulder</option>
                                    <option value="M25.019 Hamarthrosis of shoulder">M25.019 Hamarthrosis of
                                        shoulder</option>
                                    <option value="M25.719 Bone spur-osteophyte of shoulder">M25.719 Bone
                                        spur-osteophyte of shoulder</option>
                                    <option value="M75.81 Tendinitis of right shoulder">M75.81 Tendinitis of right
                                        shoulder</option>
                                    <option value="M75.82 Tendinitis of left shoulder">M75.82 Tendinitis of left
                                        shoulder</option>
                                    <option value="M13.119 Monoarthritis of shoulder region">M13.119 Monoarthritis
                                        of shoulder region</option>
                                    <option value="S53.031S Nursemaid's Elbow, right elbow">S53.031S Nursemaid's
                                        Elbow, right elbow</option>
                                    <option value="S53.032S Nursemaid's Elbow, left elbow">S53.032S Nursemaid's
                                        Elbow, left elbow</option>
                                    <option value="M25.629 Stiffness of unspec. elbow">M25.629 Stiffness of unspec.
                                        elbow</option>
                                    <option value="M25.029 Hemarthrosis of elbow">M25.029 Hemarthrosis of elbow
                                    </option>
                                    <option value="M67.429 Ganglion cyst of elbow">M67.429 Ganglion cyst of elbow
                                    </option>
                                    <option value="M24.629 Ankylosis of elbow">M24.629 Ankylosis of elbow</option>
                                    <option value="M25.729 Bone spur of elbow">M25.729 Bone spur of elbow</option>
                                    <option value="M19.021 Arthriris of right elbow">M19.021 Arthriris of right
                                        elbow</option>
                                    <option value="M19.022 Arthritis of left elbow">M19.022 Arthritis of left elbow
                                    </option>
                                    <option value="M21.331 Wrist drop, right wrist">M21.331 Wrist drop, right wrist
                                    </option>
                                    <option value="M21.332 Wrist drop, left wrist">M21.332 Wrist drop, left wrist
                                    </option>
                                    <option value="M25.639 Stiffness of unspec. wrist">M25.639 Stiffness of unspec.
                                        wrist</option>
                                    <option value="M25.039 Hemarthrosis of wrist">M25.039 Hemarthrosis of wrist
                                    </option>
                                    <option value="M67.439 Gangolian cyst of wrist">M67.439 Gangolian cyst of wrist
                                    </option>
                                    <option value="M25.739 Bone spur of wrist">M25.739 Bone spur of wrist</option>
                                    <option value="M25.439 Effusion of unspec. wrist">M25.439 Effusion of unspec.
                                        wrist</option>
                                    <option value="M13.139 Monarthritis of unspec. wrist">M13.139 Monarthritis of
                                        unspec. wrist</option>
                                    <option value="M25.539 Arthralgia of wrist">M25.539 Arthralgia of wrist</option>
                                </select></div>
                            <div id="dxcodelowerextremity8" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectlowerextremity8" name="dxcodelowerextremity8" style="width:260px"
                                    onchange="selectte('lowerextremity','8','H');checkadd('8','lowerextremity');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M72.2 Planter fascitis">M72.2 Planter fascitis</option>
                                    <option value="S93.01XA Subluxation right ankle/foot">S93.01XA Subluxation right
                                        ankle/foot</option>
                                    <option value="S93.02XA Subluxation left ankle/foot">S93.02XA Subluxation left
                                        ankle/foot</option>
                                    <option value="M99.06 Segmental and somatic dysfunction of lower extremity">
                                        M99.06 Segmental and somatic dysfunction of lower extremity</option>
                                    <option value="M76.61 Achilles Tendinitis, Right Leg">M76.61 Achilles
                                        Tendinitis, Right Leg</option>
                                    <option value="M76.62 Achilles Tendinitis, Left Leg">M76.62 Achilles Tendinitis,
                                        Left Leg</option>
                                    <option value="S73.191A Other sprain of right hip, initial encounter">S73.191A
                                        Other sprain of right hip, initial encounter</option>
                                    <option value="S73.192A Other sprain of left hip, initial encounter">S73.192A
                                        Other sprain of left hip, initial encounter</option>
                                    <option
                                        value="S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter">
                                        S76.011A Strain of muscle, fascia and tendon of right hip, initial encounter
                                    </option>
                                    <option
                                        value="S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter">
                                        S76.012A Strain of muscle, fascia and tendon of left hip, initial encounter
                                    </option>
                                    <option
                                        value="S83.91XA Sprain of unspecified site of right knee, initial encounter">
                                        S83.91XA Sprain of unspecified site of right knee, initial encounter
                                    </option>
                                    <option value="S83.92XA Sprain of unspecified site of left knee, initial encounter">
                                        S83.92XA Sprain of unspecified site of left knee, initial encounter</option>
                                    <option value="M79.604 Pain in right leg">M79.604 Pain in right leg</option>
                                    <option value="M79.605 Pain in left leg">M79.605 Pain in left leg</option>
                                    <option value="M79.651 Pain in right thigh">M79.651 Pain in right thigh</option>
                                    <option value="M79.652 Pain in left thigh">M79.652 Pain in left thigh</option>
                                    <option value="M79.661 Pain in right lower leg">M79.661 Pain in right lower leg
                                    </option>
                                    <option value="M79.662 Pain in left lower leg">M79.662 Pain in left lower leg
                                    </option>
                                    <option value="M79.671 Pain in right foot">M79.671 Pain in right foot</option>
                                    <option value="M79.672 Pain in left foot">M79.672 Pain in left foot</option>
                                    <option value="M79.674 Pain in right toes">M79.674 Pain in right toes</option>
                                    <option value="M79.675 Pain in left toes">M79.675 Pain in left toes</option>
                                    <option value="M25.551 Pain in right hip">M25.551 Pain in right hip</option>
                                    <option value="M25.552 Pain in left hip">M25.552 Pain in left hip</option>
                                    <option value="M25.561 Pain in right knee">M25.561 Pain in right knee</option>
                                    <option value="M25.562 Pain in left knee">M25.562 Pain in left knee</option>
                                    <option value="M25.571 Pain in right ankle">M25.571 Pain in right ankle</option>
                                    <option value="M25.572 Pain in left ankle">M25.572 Pain in left ankle</option>
                                    <option value="M76.31 Iliotibial band syndrome, right leg">M76.31 Iliotibial
                                        band syndrome, right leg</option>
                                    <option value="M76.32 Iliotibial band syndrome, left leg">M76.32 Iliotibial band
                                        syndrome, left leg</option>
                                    <option value="M70.50 Bursitis of unspec. knee">M70.50 Bursitis of unspec. knee
                                    </option>
                                    <option value="M25.069 Hemarthrosis of unspec. knee">M25.069 Hemarthrosis of
                                        unspec. knee</option>
                                    <option value="M94.269 Chondromalacia of unspec. knee">M94.269 Chondromalacia of
                                        unspec. knee</option>
                                    <option value="M67.469 Gangolian cyst of unspec. knee">M67.469 Gangolian cyst of
                                        unspec. knee</option>
                                    <option value="M25.760 Bone spur of unspec. knee">M25.760 Bone spur of unspec.
                                        knee</option>
                                    <option value="M23.40 Loose body in spec. knee">M23.40 Loose body in spec. knee
                                    </option>
                                    <option value="M25.669 Stiffness of unspec. knee">M25.669 Stiffness of unspec.
                                        knee</option>
                                    <option value="M70.51 Bursitis of right knee">M70.51 Bursitis of right knee
                                    </option>
                                    <option value="M70.52 Bursitis of left knee">M70.52 Bursitis of left knee
                                    </option>
                                    <option value="M21.371 Foot drop right foot">M21.371 Foot drop right foot
                                    </option>
                                    <option value="M21.372 Foot drop left foot">M21.372 Foot drop left foot</option>
                                    <option value="Q72.70 Cleft foot-split foot">Q72.70 Cleft foot-split foot
                                    </option>
                                    <option value="S90.30XA Contusion of foot">S90.30XA Contusion of foot</option>
                                    <option value="M25.076 Hemarthrosis of unspec. foot">M25.076 Hemarthrosis of
                                        unspec. foot</option>
                                    <option value="M25.776 Bone spur of foot">M25.776 Bone spur of foot</option>
                                    <option value="T69.021A Immersion of right foot">T69.021A Immersion of right
                                        foot</option>
                                    <option value="T69.022A Immersion of left foot">T69.022A Immersion of left foot
                                    </option>
                                </select></div>
                            <div id="dxcodeheadache8" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectheadache8" name="dxcodeheadache8" style="width:260px"
                                    onchange="selectte('headache','8','H');checkadd('8','headache');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="G43.001 Migraine">G43.001 Migraine</option>
                                    <option value="G44.209 Tension-type headache">G44.209 Tension-type headache
                                    </option>
                                    <option value="G44.89 Headache">G44.89 Headache</option>
                                    <option value="R42 Dizziness">R42 Dizziness</option>
                                    <option value="R51 Headache">R51 Headache</option>
                                    <option value="G44.201 Tension-Type Headache, unspecified, intractable">G44.201
                                        Tension-Type Headache, unspecified, intractable</option>
                                    <option value="G44.209 Tension-Type Headache, unspecified, not intractable">
                                        G44.209 Tension-Type Headache, unspecified, not intractable</option>
                                    <option
                                        value="G43.001 Migraine without aura, not intractable, with status migrainosus">
                                        G43.001 Migraine without aura, not intractable, with status migrainosus
                                    </option>
                                    <option
                                        value="G43.009 Migraine without aura, not intractable, without status migrainosus">
                                        G43.009 Migraine without aura, not intractable, without status migrainosus
                                    </option>
                                    <option value="G43.011 Migraine without aura, intractable, with status migrainosus">
                                        G43.011 Migraine without aura, intractable, with status migrainosus</option>
                                    <option
                                        value="G43.019 Migraine without aura, intractable, without status migrainosus">
                                        G43.019 Migraine without aura, intractable, without status migrainosus
                                    </option>
                                    <option
                                        value="G43.101 Migraine with aura, not intractable, with status migrainosus">
                                        G43.101 Migraine with aura, not intractable, with status migrainosus
                                    </option>
                                    <option
                                        value="G43.109 Migraine with aura, not intractable, without status migrainosus">
                                        G43.109 Migraine with aura, not intractable, without status migrainosus
                                    </option>
                                    <option value="G43.111 Migraine with aura, intractable, with status migrainosus">
                                        G43.111 Migraine with aura, intractable, with status migrainosus</option>
                                    <option value="G43.119 Migraine with aura, intractable, without status migrainosus">
                                        G43.119 Migraine with aura, intractable, without status migrainosus</option>
                                    <option value="G44.219 Tension Headache episodic">G44.219 Tension Headache
                                        episodic</option>
                                    <option value="G44.229 Tension Headache chronic">G44.229 Tension Headache
                                        chronic</option>
                                    <option value="G44.319 Acute post-traumatic headache">G44.319 Acute
                                        post-traumatic headache</option>
                                    <option value="G44.329 Chronic post-traumatic headache">G44.329 Chronic
                                        post-traumatic headache</option>
                                    <option value="S06.0X0A Mild concussion (no loc) acute">S06.0X0A Mild concussion
                                        (no loc) acute</option>
                                    <option value="S06.0X1A Mild concussion (LOC<30MINS)">S06.0X1A Mild concussion
                                        (LOC<30MINS)< /option>
                                    <option value="F07.81 Post-Concussion Syndrome">F07.81 Post-Concussion Syndrome
                                    </option>
                                    <option value="H53.8 Blurry Vision">H53.8 Blurry Vision</option>
                                    <option value="H93.19 Tinnitus unspecified">H93.19 Tinnitus unspecified</option>
                                </select></div>
                            <div id="dxcodegeneral8" style="display:none;"><select style="width:300px;"
                                    id="dxcodeselectgeneral8" name="dxcodegeneral8" style="width:260px"
                                    onchange="selectte('general','8','H');checkadd('8','general');">
                                    <option value="">Select a code</option>
                                    <option value="add">Add...</option>
                                    <option value="M62.830 Muscle spasm of the back">M62.830 Muscle spasm of the
                                        back</option>
                                    <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                    <option value="R42 Vertigo, dizziness & giddiness">R42 Vertigo, dizziness &
                                        giddiness</option>
                                    <option value="M62.830 Muscle spasm of back">M62.830 Muscle spasm of back
                                    </option>
                                    <option value="M79.1 Myalgia">M79.1 Myalgia</option>
                                    <option value="M79.7 Fibromyalgia">M79.7 Fibromyalgia</option>
                                    <option value="M72.8 Fascitis">M72.8 Fascitis</option>
                                    <option value="M25.2 Limb cramp or spasm">M25.2 Limb cramp or spasm</option>
                                    <option value="M62.40 Muscle contracture (neck, thoracic, lumbar)">M62.40 Muscle
                                        contracture (neck, thoracic, lumbar)</option>
                                    <option value="M25.50 Unspecified Joint(s) tender/painful (NK/MBLB)">M25.50
                                        Unspecified Joint(s) tender/painful (NK/MBLB)</option>
                                    <option value="M25.60 Joint(s) stiff (next, thoracic, lumbar)">M25.60 Joint(s)
                                        stiff (next, thoracic, lumbar)</option>
                                    <option value="M35.7 Hypermobility syndrome">M35.7 Hypermobility syndrome
                                    </option>
                                    <option value="M81.0 Age related osteoporosis w/o pathological fracture">M81.0
                                        Age related osteoporosis w/o pathological fracture</option>
                                    <option value="M99.05 Segmental and comatic dysfunction of pelvic region">M99.05
                                        Segmental and comatic dysfunction of pelvic region</option>
                                    <option value="R20.1 Hypoesthesia of skin">R20.1 Hypoesthesia of skin</option>
                                    <option value="R20.2 Spin parethesia">R20.2 Spin parethesia</option>
                                    <option value="R20.3 Hyperesthesia of skin">R20.3 Hyperesthesia of skin</option>
                                    <option value="R26.81 Unsteady on feet">R26.81 Unsteady on feet</option>
                                    <option value="R26.2 Difficulty Walking">R26.2 Difficulty Walking</option>
                                </select></div>
                            <div id="addcodediv8" style="display:none;">
                                <table width="300" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="200"><input id="dxcodeadd8" name="dxcodeadd8" style="width:200px"
                                                value=""></td>
                                        <td align="center" width="40"><img src="nlimages/delete.png" width="15"
                                                height="15" onclick="hideadd('8','');"></td>
                                        <td width="60" align="right"><a href="#">Manage</a></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td bgcolor="#f1f1f1" width="59%">
                            <input type="hidden" name="showpointersH" id="showpointersH">
                            <div id="showpointerdivH"></div>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="border-left:1px solid black;padding:5px;">
                <div id="showunits7"></div>
            </td>
            </tr>
    </table>
    </td>
    </td>
    </tr>
    </table>
    <hr />
    <table width="80%">
        <tr>
            <td><b>Exams</b>:</td>
            <td>
                <input type="checkbox" name="testcodes[]" id="testcodes1" value="IL-99202 NE"
                    onChange="javascript:exampopulate();"> IL-99202 NE
            </td>
            <td>
                <input type="checkbox" name="testcodes[]" id="testcodes2" value="L-RE EX 99212"
                    onChange="javascript:exampopulate();"> L-RE EX 99212
            </td>
            <td>
                <input type="checkbox" name="testcodes[]" id="testcodes3" value="IE-99203"
                    onChange="javascript:exampopulate();">IE-99203
            </td>
            <td>
                <input type="checkbox" name="testcodes[]" id="testcodes4" value="DET-EX 99214"
                    onChange="javascript:exampopulate();"> DET-EX 99214
            </td>
            <td>
                <input type="checkbox" name="testcodes[]" id="testcodes5" value="ID-99204"
                    onChange="javascript:exampopulate();"> ID-99204
            </td>
            <td>
                <input type="checkbox" name="testcodes[]" id="testcodes6" value="EP-EX 99213"
                    onChange="javascript:exampopulate();"> EP-EX 99213
            </td>
        </tr>
    </table>
    <script>
        var testcodes = [];

        function exampopulate() {
            testcodes = [];
            var tests = ['IL-99202 NE', 'L-RE EX 99212', 'IE-99203', 'DET-EX 99214', 'ID-99204', 'EP-EX 99213'];
            for (var i = 1; i <= 6; i++) {
                if (document.getElementById('testcodes' + i).checked) {
                    testcodes.push(document.getElementById('testcodes' + i).value);
                }
            }
            var letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
            for (var i = 0; i <= letters.length; i++) {
                var div = document.getElementById('showpointerdiv' + letters[i]);
                if (div != null) {
                    var temp = div.innerHTML;
                    for (var i2 = 0; i2 < tests.length; i2++) {
                        if (div.innerHTML.indexOf(tests[i2] + ', ') != -1)
                            div.innerHTML = div.innerHTML.replace(tests[i2] + ', ', '');
                        if (div.innerHTML.indexOf(tests[i2]) != -1)
                            div.innerHTML = div.innerHTML.replace(tests[i2], '');
                    }
                    if (document.getElementById('dx' + (i + 1)).value != '') {
                        for (var i2 = testcodes.length - 1; i2 >= 0; i2--) {
                            var strtoadd = testcodes[i2];
                            if (i2 != testcodes.length - 1 || div.innerHTML != '')
                                strtoadd += ', ';
                            div.innerHTML = strtoadd + div.innerHTML;
                        }
                    }
                }
            }
        }

    </script>
    <hr />
    </div>
    <center>
        <style type="text/css">
            .styledbg {
                background-image: url('//nlimages/chart/graybg.png');
                background-size: 100% 100%;
            }

            .spinalbg {
                background-image: url('//nlimages/chart/bluebg.png');
                background-size: 100% 100%;
            }

            .purplebg {
                background-image: url('//nlimages/chart/purplebg.png');
                background-size: 100% 100%;
            }

            .orangebg {
                background-image: url('//nlimages/chart/orangebg.png');
                background-size: 100% 100%;
            }

            .darkbg {
                background-image: url('//nlimages/chart/darkbg.png');
                background-size: 100% 100%;
            }

            .blackbg {
                color: white;
                background-image: url('//nlimages/chart/blackbg.png');
                background-size: 100% 100%;
            }

            #td {
                background-size: 100% 100%;
            }

        </style>
        <script>
            function neuropopulate() {
                if (document.getElementById('pointer97112value').value == '' && document.getElementById(
                        '97112check').checked) {
                    var pointers = document.getElementById('pointer97110value').value;
                    if (pointers != '') {
                        var pointersarr = pointers.split(', ');
                        for (var ii = 0; ii < pointersarr.length; ii++) {
                            document.getElementById('selectpointer97112').value = pointersarr[ii];
                            selectpointer('97112', 'NEURO (97112)', '2', 'procmod', 'vertical');
                        }
                    }
                }
            }

        </script>
        <table border="1" style="border:1px solid #cccccc;" cellspacing="0" cellpadding="5" width="100%">

            <tr>
                <td colspan="7" style="border:none;background-color:white;" id="tawidth">
                    <div style="position:relative">
                        <div style="position:absolute;z-index:0;"><textarea rows="8" name="notes"
                                id="notes">Notes</textarea><br />
                            <center><input type="image" src="{{ asset('/nlimages/chart/savebutton.png') }}"
                                    class="no-print"></center>
                        </div>
                </td>
                <td class="darkbg" colspan="4" align="center"
                    style="background-color:#606062;color:white;border:1px solid white;"><b>PROCEDURES - 3</b></td>
                <td class="darkbg" colspan="4" align="center"
                    style="background-color:#606062;color:white;border:1px solid white;"><b>MODALITIES - 2</b></td>
            </tr>
            <tr>
                <script>
                    var procon = 'MASS%SE%97124';

                    function changeproc(firstrun) {
                        var customproc = document.getElementById('customproc').value.split('%SE%');
                        document.getElementById('proccustomdiv').innerText = customproc[1];
                        if (!firstrun) {
                            var theprocon = procon.split('%SE%');
                            if (pointerstr[3]) {
                                while (pointerstr[3] != '') {
                                    removepointer('97124', theprocon[0] + ' (' + theprocon[1] + ')', '3', 'procmod',
                                        'vertical', null, 'green')
                                }
                            }
                            document.getElementById('massselect').value = '';
                            document.getElementById('massselect').onchange();
                        }
                        firstrun = false;
                        procon = document.getElementById('customproc').value;
                    }
                    var modon = 'INF.LZ%SE%97026';

                    function changemod(firstrun) {
                        var custommod = document.getElementById('custommod').value.split('%SE%');
                        document.getElementById('modcustomdiv').innerText = custommod[1];
                        if (!firstrun) {
                            var themodon = modon.split('%SE%');
                            if (pointerstr[7]) {
                                while (pointerstr[7] != '') {
                                    removepointer('97026', themodon[0] + ' (' + themodon[1] + ')', '7', 'procmod',
                                        'vertical', null, 'green')
                                }
                            }
                            document.getElementById('inflzselect').value = '';
                            document.getElementById('inflzselect').onchange();
                        }
                        firstrun = false;
                        modon = document.getElementById('custommod').value;
                    }

                </script>
                <td colspan="7" style="border:none;background-color:white">
                <td width="90" id="teheader" class="styledbg">
                    <center>TE</center>
                </td>
                <td width="90" id="mrheader" class="styledbg">
                    <center>MR</center>
                </td>
                <td width="90" id="neureheader" class="styledbg">
                    <center>NEURO</center>
                </td>
                <td width="90" id="massheader" style="border-right:2px black solid;" class="styledbg">
                    <center>
                        <select name="customproc" id="customproc" onChange="changeproc()">
                            <option value="MASS%SE%97124" selected>MASS</option>
                            <option value="AQTH%SE%97113">AQTH</option>
                            <option value="GAIT%SE%97116">GAIT</option>
                        </select>
                    </center>
                </td>
                <!-- PROCEDURES Aquatic Therapy 97113
    Gait Training 97116 
    MODALITIES Paraffin Bath 90718
    Whirlpool 97022//-->

                <td width="90" id="tracheader" class="styledbg">
                    <center>TRAC</center>
                </td>
                <td width="90" id="esheader" class="styledbg">
                    <center>ES</center>
                </td>
                <td width="90" id="usheader" class="styledbg">
                    <center>US</center>
                </td>
                <td width="90" id="inflzheader" class="styledbg">
                    <center>
                        <select name="custommod" id="custommod" onChange="changemod()">
                            <option value="INF.LZ%SE%97026" selected>INF.LZ</option>
                            <option value="PABA%SE%90718">PABA</option>
                            <option value="WRPL%SE%97022">WRPL</option>
                        </select>
                    </center>
                </td>
            </tr>
            <tr height="65">
                <td colspan="7" style="border:none;background-color:white">
                </td>
                <td style="word-wrap:break-word;" align="center" id="tecolumn0" onClick="tdcheck('97110');" valign="top"
                    class="styledbg"><br>
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td><input style="display:none;" id="97110check" type="checkbox" name="procedurecodes[]"
                                    value="97110" onChange="javascript:highlightcolumns('97110','te')"
                                    onclick="window.event.stopPropagation()"><img width="20" height="20" id="97110img"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                            <td align="center">
                                97110</td>
                            <td align="right"><img src="{{ asset('/nlimages/spacer.png') }}" width="20"
                                    height="20"></td>
                        </tr>
                    </table><br /><input type="hidden" id="pointer97110value" name="97110pointers">
                    <div id="pointer97110" style="width:100px;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('97110');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select97110" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer97110" name="selectpointer97110"
                            onchange="javascript:window.event.stopPropagation();selectpointer('97110','TE (97110)','0','procmod','vertical','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>
                <td style="word-wrap:break-word;" align="center" id="mrcolumn0" onClick="tdcheck('97140');" valign="top"
                    class="styledbg"><br>
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td><input style="display:none;" id="97140check" type="checkbox" name="procedurecodes[]"
                                    value="97140" onChange="javascript:highlightcolumns('97140','mr')"
                                    onclick="window.event.stopPropagation()"><img width="20" height="20" id="97140img"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                            <td align="center">
                                97140</td>
                            <td align="right"><img src="{{ asset('/nlimages/spacer.png') }}" width="20"
                                    height="20"></td>
                        </tr>
                    </table><br /><input type="hidden" id="pointer97140value" name="97140pointers">
                    <div id="pointer97140" style="width:100px;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('97140');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select97140" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer97140" name="selectpointer97140"
                            onchange="javascript:window.event.stopPropagation();selectpointer('97140','MR (97140)','1','procmod','vertical','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>
                <td style="word-wrap:break-word;" align="center" id="neurecolumn0" onClick="tdcheck('97112');"
                    valign="top" class="styledbg"><br>
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td><input style="display:none;" id="97112check" type="checkbox" name="procedurecodes[]"
                                    value="97112" onChange="javascript:highlightcolumns('97112','neure')"
                                    onclick="neuropopulate();window.event.stopPropagation()"><img width="20" height="20"
                                    id="97112img" src="{{ asset('/nlimages/spacer.png') }}">
                            </td>
                            <td align="center">
                                97112</td>
                            <td align="right"><img src="{{ asset('/nlimages/spacer.png') }}" width="20"
                                    height="20"></td>
                        </tr>
                    </table><br /><input type="hidden" id="pointer97112value" name="97112pointers">
                    <div id="pointer97112" style="width:100px;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('97112');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select97112" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer97112" name="selectpointer97112"
                            onchange="javascript:window.event.stopPropagation();selectpointer('97112','NEURO (97112)','2','procmod','vertical','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>
                <td style="word-wrap:break-word;border-right:2px black solid;" " align=" center" id="masscolumn0"
                    onClick="tdcheck('97124');" valign="top" class="styledbg"><br>
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td><input style="display:none;" id="97124check" type="checkbox" name="procedurecodes[]"
                                    value="97124" onChange="javascript:highlightcolumns('97124','mass')"
                                    onclick="window.event.stopPropagation()"><img width="20" height="20" id="97124img"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                            <td align="center">
                                <div id="proccustomdiv">97124</div>
                            </td>
                            <td align="right"><img src="{{ asset('/nlimages/spacer.png') }}" width="20"
                                    height="20"></td>
                        </tr>
                    </table><br /><input type="hidden" id="pointer97124value" name="97124pointers">
                    <div id="pointer97124" style="width:100px;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('97124');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select97124" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer97124" name="selectpointer97124"
                            onchange="javascript:window.event.stopPropagation();selectpointer('97124','MASS (97124)','3','procmod','vertical','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>
                <td style="word-wrap:break-word;" align="center" id="traccolumn0" onClick="tdcheck('97012');"
                    valign="top" class="styledbg"><br>
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td><input style="display:none;" id="97012check" type="checkbox" name="procedurecodes[]"
                                    value="97012" onChange="javascript:highlightcolumns('97012','trac')"
                                    onclick="window.event.stopPropagation()"><img width="20" height="20" id="97012img"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                            <td align="center">
                                97012</td>
                            <td align="right"><img src="{{ asset('/nlimages/spacer.png') }}" width="20"
                                    height="20"></td>
                        </tr>
                    </table><br /><input type="hidden" id="pointer97012value" name="97012pointers">
                    <div id="pointer97012" style="width:100px;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('97012');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select97012" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer97012" name="selectpointer97012"
                            onchange="javascript:window.event.stopPropagation();selectpointer('97012','TRAC (97012)','4','procmod','vertical','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>
                <td style="word-wrap:break-word;" align="center" id="escolumn0" onClick="tdcheck('97032');" valign="top"
                    class="styledbg"><br>
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td><input style="display:none;" id="97032check" type="checkbox" name="procedurecodes[]"
                                    value="97032" onChange="javascript:highlightcolumns('97032','es')"
                                    onclick="window.event.stopPropagation()"><img width="20" height="20" id="97032img"
                                    src="{{ asset('/nlimages/spacer.png') }}'"></td>
                            <td align="center">
                                97032</td>
                            <td align="right"><img src="{{ asset('/nlimages/spacer.png') }}" width="20"
                                    height="20"></td>
                        </tr>
                    </table><br /><input type="hidden" id="pointer97032value" name="97032pointers">
                    <div id="pointer97032" style="width:100px;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('97032');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select97032" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer97032" name="selectpointer97032"
                            onchange="javascript:window.event.stopPropagation();selectpointer('97032','ES (97032)','5','procmod','vertical','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>
                <td style="word-wrap:break-word;" align="center" id="uscolumn0" onClick="tdcheck('97035');" valign="top"
                    class="styledbg"><br>
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td><input style="display:none;" id="97035check" type="checkbox" name="procedurecodes[]"
                                    value="97035" onChange="javascript:highlightcolumns('97035','us')"
                                    onclick="window.event.stopPropagation()"><img width="20" height="20" id="97035img"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                            <td align="center">
                                97035</td>
                            <td align="right"><img src="{{ asset('/nlimages/spacer.png') }}" width="20"
                                    height="20"></td>
                        </tr>
                    </table><br /><input type="hidden" id="pointer97035value" name="97035pointers">
                    <div id="pointer97035" style="width:100px;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('97035');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select97035" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer97035" name="selectpointer97035"
                            onchange="javascript:window.event.stopPropagation();selectpointer('97035','US (97035)','6','procmod','vertical','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>
                <td style="word-wrap:break-word;" align="center" id="inflzcolumn0" onClick="tdcheck('97026');"
                    valign="top" class="styledbg"><br>
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td><input style="display:none;" id="97026check" type="checkbox" name="procedurecodes[]"
                                    value="97026" onChange="javascript:highlightcolumns('97026','inflz')"
                                    onclick="window.event.stopPropagation()"><img width="20" height="20" id="97026img"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                            <td align="center">
                                <div id="modcustomdiv">97026</div>
                            </td>
                            <td align="right"><img src="{{ asset('/nlimages/spacer.png') }}" width="20"
                                    height="20"></td>
                        </tr>
                    </table><br /><input type="hidden" id="pointer97026value" name="97026pointers">
                    <div id="pointer97026" style="width:100px;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('97026');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select97026" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer97026" name="selectpointer97026"
                            onchange="javascript:window.event.stopPropagation();selectpointer('97026','INFLZ (97026)','7','procmod','vertical','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>
            </tr>

            <tr>
                <td colspan="5" style="border:none;background-color:white">&nbsp;</td>
                <td class="darkbg" colspan="2" align="center"
                    style="background-color:#606062;color:white;border:1px solid white;"><b>UNITS &rarr;</b></td>
                <td class="styledbg" id="tecolumn1" align="center"><select name="teunits" id="teselect"
                        onchange="showchecks('teselect','te','97110');writeunits();">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
                <td class="styledbg" id="mrcolumn1" align="center"><select name="mrunits" id="mrselect"
                        onchange="showchecks('mrselect','mr','97140');writeunits();">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
                <td class="styledbg" id="neurecolumn1" align="center"><select name="neureunits" id="neureselect"
                        onchange="showchecks('neureselect','neure','97112');writeunits();">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
                <td class="styledbg" id="masscolumn1" align="center" style="border-right:2px black solid;"><select
                        name="massunits" id="massselect"
                        onchange="showchecks('massselect','mass','97124');writeunits();">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
                <td class="styledbg" id="traccolumn1" align="center"><select name="tracunits" id="tracselect"
                        onchange="showchecks('tracselect','trac','97012');writeunits();">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
                <td class="styledbg" id="escolumn1" align="center"><select name="esunits" id="esselect"
                        onchange="showchecks('esselect','es','97032');writeunits();">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
                <td class="styledbg" id="uscolumn1" align="center"><select name="usunits" id="usselect"
                        onchange="showchecks('usselect','us','97035');writeunits();">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
                <td class="styledbg" id="inflzcolumn1" align="center"><select name="inflzunits" id="inflzselect"
                        onchange="showchecks('inflzselect','inflz','97026');writeunits();">
                        <option value="" selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select></td>
            </tr>

            <tr>
                <td style="border:none;background-color:white" align="center">&nbsp;</td>
                <td colspan="2" style="border:none;">

                </td>
                <td colspan="2" style="border:none;">

                </td>
                <td class="darkbg" colspan="2" align="center"
                    style="background-color:#606062;color:white;border:1px solid white;"><strong>TIME
                        &rarr;</strong></td>
                <td class="styledbg" align="center" id="tecolumn2">
                    <div id="tetime"></div>
                </td>
                <td class="styledbg" align="center" id="mrcolumn2">
                    <div id="mrtime"></div>
                </td>
                <td class="styledbg" align="center" id="neurecolumn2">
                    <div id="neuretime"></div>
                </td>
                <td class="styledbg" align="center" style="border-right:2px black solid;" id="masscolumn2">
                    <div id="masstime"></div>
                </td>
                <td class="styledbg" align="center" id="traccolumn2">
                    <div id="tractime"></div>
                </td>
                <td class="styledbg" align="center" id="escolumn2">
                    <div id="estime"></div>
                </td>
                <td class="styledbg" align="center" id="uscolumn2">
                    <div id="ustime"></div>
                </td>
                <td class="styledbg" align="center" id="inflzcolumn2">
                    <div id="inflztime"></div>
                </td>
            </tr>

            <tr>
                <td colspan="5" style="border:none;background-color:white;">&nbsp;</td>
                <td class="darkbg" colspan="2" align="center"
                    style="background-color:#606062;color:white;border:1px solid white;"><strong>EXERCISES
                        &rarr;</strong></td>
                <script>
                    function checkthebox(id) {
                        if (document.getElementById(id).checked) document.getElementById(id).checked = false;
                        else document.getElementById(id).checked = true;
                    }

                    function checkallmft(id) {
                        for (var i = 1; i <= 10; i++) {
                            if (document.getElementById(id + '-0').checked)
                                document.getElementById(id + '-' + i).checked = true;
                            else
                                document.getElementById(id + '-' + i).checked = false;
                        }
                    }

                </script>
                <td class="styledbg" align="center" id="tecolumn3">
                    <div id="teplus" style="display:none"><img id="teplusimg"
                            src="url('//images/plusgreen.png')"
                            onclick="javascript:document.getElementById('teexercisediv').style.display='block';window.alert('Please save changes to the chart before you make changes to the exercises!');"
                            style="border:2px solid #0036be"></div>
                </td>
                <td class="styledbg" align="center" id="mrcolumn3">
                <td class="styledbg" align="center" id="neurecolumn3">
                    <div id="neureplus" style="display:none"><img id="neureplusimg"
                            src="url('//images/plusgreen.png')"
                            onclick="javascript:document.getElementById('teexercisediv').style.display='block';window.alert('Please save changes to the chart before you make changes to the exercises!');"
                            style="border:2px solid #0036be"></div>
                </td>
                <td class="styledbg" align="center" style="border-right:2px black solid;" id="masscolumn3">
                <td class="styledbg" align="center" id="traccolumn3">
                <td class="styledbg" align="center" id="escolumn3">
                <td class="styledbg" align="center" id="uscolumn3">
                <td class="styledbg" align="center" id="inflzcolumn3">
            </tr>
            <script>
                function borderplus(id) {
                    document.getElementById(id + 'plusimg').style.border = '2px solid #0036be';
                }

                function selectletter(id) {
                    document.getElementById('pointer' + id).style.display = 'none';
                    document.getElementById('selectpointer' + id).value = '';
                    document.getElementById('select' + id).style.display = 'block';
                }

            </script>
            <tr>
                <td colspan="5" style="border:none;background-color:white"></td>
                <td class="darkbg" colspan="2" align="center"
                    style="background-color:#606062;color:white;border-top:4px solid black;border-left:4px solid black;border-right:4px solid black;">
                    <b>ADJUSTMENTS &darr;</b>
                </td>
                <td colspan="8" style="border:none">
            </tr>
            <tr>
                <td width="100" style="border-bottom:none;border-left:none;border-right:none;color:black;"
                    id="spinaltd0" valign="middle">
                    <div style="position:relative">
                        <div id="spinalbg"
                            style="position:absolute;width:120px;height:400px;top:-25px;left:-5px;z-index:-1;background-image:url('//nlimages/chart/bluedarkbg.png');background-size:100% 100%;">
                        </div>
                    </div>
                    <center><b>Spinal</b></center>
                </td>
                <td class="spinalbg" width="100" id="cervicaltd" colspan="1" onClick="tdcheck('cervical');"
                    align="center">
                    <table width="100%">
                        <tr>
                            <td><input style="display:none;" id="cervicalcheck" name="cervicalcheck" type="checkbox"
                                    onClick="window.event.stopPropagation();"
                                    onChange="javascript:highlightrow('cervical','spinal');" value="true"> <img
                                    id="cervicalimg" width="20" height="20"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                            <td align="center">Cervical</td>
                            <td><img src="{{ asset('/nlimages/spacer.png') }}" width="20" height="20">
                            </td>
                        </tr>
                    </table>
                </td>

                <td colspan="2" width="200" style="border-bottom:none;border:none;background-color:white;">&nbsp;
                </td>
                <td class="blackbg" width="100" id="stptaptd"
                    style="background-color:#f5f5f5;padding-left:0px;padding-right:0px;" align="center">STP/TAP</td>
                <td colspan="2"
                    style="background-color:#f5f5f5;border-left:4px solid black;border-right:4px solid black;border-bottom:2px solid black;border-top:2px solid black;padding:0px;"
                    width="200">
                    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                        <tr height="30">
                            <td id="cervical1checktd" class="spinalbg" style="border:1px solid #606069;" width="25%"
                                align="center" onclick="tdcheck('cervical1');">1 <input style="display:none;"
                                    type="checkbox" name="cervicaladjustment[]" value="1" id="cervical1check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('cervical','cervical1check');">
                                <img id="cervical1img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="cervical2checktd" class="spinalbg" style="border:1px solid #606069;" width="25%"
                                align="center" onclick="tdcheck('cervical2');">2 <input style="display:none;"
                                    type="checkbox" name="cervicaladjustment[]" value="2" id="cervical2check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('cervical','cervical2check');">
                                <img id="cervical2img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="cervical3checktd" class="spinalbg" style="border:1px solid #606069;" width="25%"
                                align="center" onclick="tdcheck('cervical3');">3 <input style="display:none;"
                                    type="checkbox" name="cervicaladjustment[]" value="3" id="cervical3check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('cervical','cervical3check');">
                                <img id="cervical3img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="cervical4checktd" class="spinalbg" style="border:1px solid #606069;" width="25%"
                                align="center" onclick="tdcheck('cervical4');">4 <input style="display:none;"
                                    type="checkbox" name="cervicaladjustment[]" value="4" id="cervical4check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('cervical','cervical4check');">
                                <img id="cervical4img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                        </tr>
                        <tr height="30">
                            <td id="cervical5checktd" class="spinalbg" style="border:1px solid #606069;" width="25%"
                                align="center" onclick="tdcheck('cervical5');">5 <input style="display:none;"
                                    type="checkbox" name="cervicaladjustment[]" value="5" id="cervical5check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('cervical','cervical5check');">
                                <img id="cervical5img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="cervical6checktd" class="spinalbg" style="border:1px solid #606069;" width="25%"
                                align="center" onclick="tdcheck('cervical6');">6 <input style="display:none;"
                                    type="checkbox" name="cervicaladjustment[]" value="6" id="cervical6check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('cervical','cervical6check');">
                                <img id="cervical6img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="cervical7checktd" class="spinalbg" style="border:1px solid #606069;" width="25%"
                                align="center" onclick="tdcheck('cervical7');">7 <input style="display:none;"
                                    type="checkbox" name="cervicaladjustment[]" value="7" id="cervical7check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('cervical','cervical7check');">
                                <img id="cervical7img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td style="border:1px solid #606069;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td class="styledbg" id="tecolumn4" align="center" onclick="tdcheck('cervicalteunitarea','te')">
                    <div id="0%SE%te" style="display:none;">
                        <img id="cervicalteunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="cervicalteunitareacheck" name="cervical%SE%teunitarea" value="cervical"
                            onchange="checkarea('cervical','cervicalteunitareacheck');checktd('cervicalteunitareacheck','tecolumn4')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="mrcolumn4" align="center" onclick="tdcheck('cervicalmrunitarea','mr')">
                    <div id="0%SE%mr" style="display:none;">
                        <img id="cervicalmrunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="cervicalmrunitareacheck" name="cervical%SE%mrunitarea" value="cervical"
                            onchange="checkarea('cervical','cervicalmrunitareacheck');checktd('cervicalmrunitareacheck','mrcolumn4')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="neurecolumn4" align="center"
                    onclick="tdcheck('cervicalneureunitarea','neure')">
                    <div id="0%SE%neure" style="display:none;">
                        <img id="cervicalneureunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="cervicalneureunitareacheck" name="cervical%SE%neureunitarea" value="cervical"
                            onchange="checkarea('cervical','cervicalneureunitareacheck');checktd('cervicalneureunitareacheck','neurecolumn4')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="masscolumn4" align="center" style="border-right:2px black solid;"
                    onclick="tdcheck('cervicalmassunitarea','mass')">
                    <div id="0%SE%mass" style="display:none;">
                        <img id="cervicalmassunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="cervicalmassunitareacheck" name="cervical%SE%massunitarea" value="cervical"
                            onchange="checkarea('cervical','cervicalmassunitareacheck');checktd('cervicalmassunitareacheck','masscolumn4')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="traccolumn4" align="center" onclick="tdcheck('cervicaltracunitarea','trac')">
                    <div id="0%SE%trac" style="display:none;">
                        <img id="cervicaltracunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="cervicaltracunitareacheck" name="cervical%SE%tracunitarea" value="cervical"
                            onchange="checkarea('cervical','cervicaltracunitareacheck');checktd('cervicaltracunitareacheck','traccolumn4')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="escolumn4" align="center" onclick="tdcheck('cervicalesunitarea','es')">
                    <div id="0%SE%es" style="display:none;">
                        <img id="cervicalesunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="cervicalesunitareacheck" name="cervical%SE%esunitarea" value="cervical"
                            onchange="checkarea('cervical','cervicalesunitareacheck');checktd('cervicalesunitareacheck','escolumn4')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="uscolumn4" align="center" onclick="tdcheck('cervicalusunitarea','us')">
                    <div id="0%SE%us" style="display:none;">
                        <img id="cervicalusunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="cervicalusunitareacheck" name="cervical%SE%usunitarea" value="cervical"
                            onchange="checkarea('cervical','cervicalusunitareacheck');checktd('cervicalusunitareacheck','uscolumn4')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="inflzcolumn4" align="center"
                    onclick="tdcheck('cervicalinflzunitarea','inflz')">
                    <div id="0%SE%inflz" style="display:none;">
                        <img id="cervicalinflzunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="cervicalinflzunitareacheck" name="cervical%SE%inflzunitarea" value="cervical"
                            onchange="checkarea('cervical','cervicalinflzunitareacheck');checktd('cervicalinflzunitareacheck','inflzcolumn4')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="color:black;border:none;" id="98940td" onClick="tdcheck('98940');" valign="bottom"
                    align="center">
                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <td width="20">
                                <input type="checkbox" style="display:none;" onClick="window.event.stopPropagation();"
                                    name="macodes[]" value="98940" id="98940check"
                                    onChange="javascript:highlightboxes('98940','');">
                                <img width="20" height="20" id="98940img"
                                    src="{{ asset('/nlimages/spacer.png') }}">
                            </td>
                            <td align="center">98940<br /><strong>1-2</strong></td>
                            <td width="20"><img width="20" height="20"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                        </tr>
                    </table>
                    <div id="pointerstr98940"></div><br />
                    <input type="hidden" id="pointer98940value" name="98940pointers">
                    <div id="pointer98940">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('98940');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select98940" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer98940" name="selectpointer98940"
                            onchange="javascript:window.event.stopPropagation();selectpointer('98940','Spinal 1-2 (98940)','8','spinal','spinal','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>

                <td class="spinalbg" width="100" id="thoracictd" colspan="1" onClick="tdcheck('thoracic');"
                    align="center">
                    <table width="100%">
                        <tr>
                            <td><input style="display:none;" id="thoraciccheck" name="thoraciccheck" type="checkbox"
                                    onClick="window.event.stopPropagation();"
                                    onChange="javascript:highlightrow('thoracic','spinal');" value="true"> <img
                                    id="thoracicimg" width="20" height="20"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                            <td align="center">Thoracic</td>
                            <td><img src="{{ asset('/nlimages/spacer.png') }}" width="20" height="20">
                            </td>
                        </tr>
                    </table>
                </td>

                <td colspan="2" style="border-top:none;border-bottom:none;border:none;background-color:white;">
                    &nbsp;</td>

                <td class="blackbg" align="center" onClick="tdcheck('29200');" id="29200stptaptd"
                    style="background-color:white;padding:0px;" valign="bottom"><br /><input style="display:none;"
                        type="checkbox" onClick="window.event.stopPropagation();" name="stptapcodes[]" value="29200"
                        id="29200check"
                        onChange="javascript:checkarea('thoracic','29200check');highlightboxes('29200','stptap');">
                    <img width="25" height="25" id="29200img" src="{{ asset('/nlimages/spacer.png') }}">
                    29200<br /><br><input type="hidden" id="pointer29200value" name="29200pointers">
                    <div id="pointer29200">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('29200');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select29200" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer29200" name="selectpointer29200"
                            onchange="javascript:window.event.stopPropagation();selectpointer('29200','Thoracic STP/TAP (29200)','9','stptap','stptap','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>

                <td colspan="2"
                    style="background-color:white;border-left:4px solid black;border-right:4px solid black;border-top:2px solid black;border-bottom:2px solid black;padding:0px;"
                    id="thoradjtd">
                    <table width="100%" height="100%" cellspacing="0" cellpadding="0" style="height:100%"
                        id="thoradjdiv">
                        <tr height="30">
                            <td id="thoracic1checktd" class="spinalbg" style="border:1px solid #606069" width="22%"
                                align="center" onclick="tdcheck('thoracic1');">1 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="1" id="thoracic1check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic1check');">
                                <img id="thoracic1img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="thoracic2checktd" class="spinalbg" style="border:1px solid #606069" width="25%"
                                align="center" onclick="tdcheck('thoracic2');">2 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="2" id="thoracic2check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic2check');">
                                <img id="thoracic2img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="thoracic3checktd" class="spinalbg" style="border:1px solid #606069" width="25%"
                                align="center" onclick="tdcheck('thoracic3');">3 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="3" id="thoracic3check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic3check');">
                                <img id="thoracic3img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="thoracic4checktd" class="spinalbg" style="border:1px solid #606069" width="28%"
                                align="center" onclick="tdcheck('thoracic4');">4 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="4" id="thoracic4check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic4check');">
                                <img id="thoracic4img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                        </tr>
                        <tr height="30">
                            <td id="thoracic5checktd" class="spinalbg" style="border:1px solid #606069" width="22%"
                                align="center" onclick="tdcheck('thoracic5');">5 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="5" id="thoracic5check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic5check');">
                                <img id="thoracic5img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="thoracic6checktd" class="spinalbg" style="border:1px solid #606069" width="25%"
                                align="center" onclick="tdcheck('thoracic6');">6 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="6" id="thoracic6check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic6check');">
                                <img id="thoracic6img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="thoracic7checktd" class="spinalbg" style="border:1px solid #606069" width="25%"
                                align="center" onclick="tdcheck('thoracic7');">7 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="7" id="thoracic7check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic7check');">
                                <img id="thoracic7img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="thoracic8checktd" class="spinalbg" style="border:1px solid #606069" width="28%"
                                align="center" onclick="tdcheck('thoracic8');">8 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="8" id="thoracic8check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic8check');">
                                <img id="thoracic8img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                        </tr>
                        <tr height="30">
                            <td id="thoracic9checktd" class="spinalbg" style="border:1px solid #606069" width="22%"
                                align="center" onclick="tdcheck('thoracic9');">9 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="9" id="thoracic9check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic9check');">
                                <img id="thoracic9img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="thoracic10checktd" class="spinalbg" style="border:1px solid #606069" width="25%"
                                align="center" onclick="tdcheck('thoracic10');">10 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="10" id="thoracic10check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic10check');">
                                <img id="thoracic10img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="thoracic11checktd" class="spinalbg" style="border:1px solid #606069" width="25%"
                                align="center" onclick="tdcheck('thoracic11');">11 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="11" id="thoracic11check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic11check');">
                                <img id="thoracic11img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                            <td id="thoracic12checktd" class="spinalbg" style="border:1px solid #606069" width="28%"
                                align="center" onclick="tdcheck('thoracic12');">12 <input style="display:none;"
                                    type="checkbox" name="thoracicadjustment[]" value="12" id="thoracic12check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('thoracic','thoracic12check');">
                                <img id="thoracic12img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15">
                            </td>
                        </tr>
                    </table>
                </td>
                <td class="styledbg" id="tecolumn5" align="center" onclick="tdcheck('thoracicteunitarea','te')">
                    <div id="1%SE%te" style="display:none;">
                        <img id="thoracicteunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="thoracicteunitareacheck" name="thoracic%SE%teunitarea" value="thoracic"
                            onchange="checkarea('thoracic','thoracicteunitareacheck');checktd('thoracicteunitareacheck','tecolumn5')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="mrcolumn5" align="center" onclick="tdcheck('thoracicmrunitarea','mr')">
                    <div id="1%SE%mr" style="display:none;">
                        <img id="thoracicmrunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="thoracicmrunitareacheck" name="thoracic%SE%mrunitarea" value="thoracic"
                            onchange="checkarea('thoracic','thoracicmrunitareacheck');checktd('thoracicmrunitareacheck','mrcolumn5')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="neurecolumn5" align="center"
                    onclick="tdcheck('thoracicneureunitarea','neure')">
                    <div id="1%SE%neure" style="display:none;">
                        <img id="thoracicneureunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="thoracicneureunitareacheck" name="thoracic%SE%neureunitarea" value="thoracic"
                            onchange="checkarea('thoracic','thoracicneureunitareacheck');checktd('thoracicneureunitareacheck','neurecolumn5')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="masscolumn5" align="center" style="border-right:2px black solid;"
                    onclick="tdcheck('thoracicmassunitarea','mass')">
                    <div id="1%SE%mass" style="display:none;">
                        <img id="thoracicmassunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="thoracicmassunitareacheck" name="thoracic%SE%massunitarea" value="thoracic"
                            onchange="checkarea('thoracic','thoracicmassunitareacheck');checktd('thoracicmassunitareacheck','masscolumn5')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="traccolumn5" align="center" onclick="tdcheck('thoracictracunitarea','trac')">
                    <div id="1%SE%trac" style="display:none;">
                        <img id="thoracictracunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="thoracictracunitareacheck" name="thoracic%SE%tracunitarea" value="thoracic"
                            onchange="checkarea('thoracic','thoracictracunitareacheck');checktd('thoracictracunitareacheck','traccolumn5')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="escolumn5" align="center" onclick="tdcheck('thoracicesunitarea','es')">
                    <div id="1%SE%es" style="display:none;">
                        <img id="thoracicesunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="thoracicesunitareacheck" name="thoracic%SE%esunitarea" value="thoracic"
                            onchange="checkarea('thoracic','thoracicesunitareacheck');checktd('thoracicesunitareacheck','escolumn5')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="uscolumn5" align="center" onclick="tdcheck('thoracicusunitarea','us')">
                    <div id="1%SE%us" style="display:none;">
                        <img id="thoracicusunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="thoracicusunitareacheck" name="thoracic%SE%usunitarea" value="thoracic"
                            onchange="checkarea('thoracic','thoracicusunitareacheck');checktd('thoracicusunitareacheck','uscolumn5')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="inflzcolumn5" align="center"
                    onclick="tdcheck('thoracicinflzunitarea','inflz')">
                    <div id="1%SE%inflz" style="display:none;">
                        <img id="thoracicinflzunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="thoracicinflzunitareacheck" name="thoracic%SE%inflzunitarea" value="thoracic"
                            onchange="checkarea('thoracic','thoracicinflzunitareacheck');checktd('thoracicinflzunitareacheck','inflzcolumn5')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="color:black;border:none;" id="98941td" onClick="tdcheck('98941');">
                    <center>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td width="20"><input type="checkbox" style="display:none;" name="macodes[]"
                                        value="98941" id="98941check" onClick="window.event.stopPropagation();"
                                        onChange="javascript:highlightboxes('98941','');">
                                    <img width="20" height="20" id="98941img"
                                        src="{{ asset('/nlimages/spacer.png') }}">
                                </td>
                                <td align="center">98941<br /><b>3-4</b></td>
                                <td width="20"><img width="20" height="20"
                                        src="{{ asset('/nlimages/spacer.png') }}"></td>
                            </tr>
                        </table>
                        <div id="pointerstr98941"><br /></div>
                    </center>
                </td>

                <td class="spinalbg" width="100" id="lumbartd" colspan="1" onClick="tdcheck('lumbar');" align="center">
                    <table width="100%">
                        <tr>
                            <td><input style="display:none;" id="lumbarcheck" name="lumbarcheck" type="checkbox"
                                    onClick="window.event.stopPropagation();"
                                    onChange="javascript:highlightrow('lumbar','spinal');" value="true"> <img
                                    id="lumbarimg" width="20" height="20"
                                    src="{{ asset('/nlimages/spacer.png') }}"></td>
                            <td align="center">Lumbar</td>
                            <td><img src="{{ asset('/nlimages/spacer.png') }}" width="20" height="20">
                            </td>
                        </tr>
                    </table>
                </td>

                <td colspan="2" style="border-top:none;border-bottom:none;border:none;background-color:white;">
                    &nbsp;</td>
                <td class="blackbg" align="center" onClick="tdcheck('29799');" id="29799stptaptd"
                    style="background-color:white;padding:0px;" valign="bottom"><br /><input style="display:none;"
                        type="checkbox" onClick="window.event.stopPropagation();" name="stptapcodes[]" value="29799"
                        id="29799check"
                        onChange="javascript:checkarea('lumbar','29799check');highlightboxes('29799','stptap');">
                    <img width="25" height="25" id="29799img" src="{{ asset('/nlimages/spacer.png') }}">
                    29799<br /><br><input type="hidden" id="pointer29799value" name="29799pointers">
                    <div id="pointer29799">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('29799');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select29799" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer29799" name="selectpointer29799"
                            onchange="javascript:window.event.stopPropagation();selectpointer('29799','Lumbar STP/TAP (29799)','10','stptap','stptap','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>
                <td colspan="2"
                    style="background-color:f5f5f5;border-left:4px solid black;border-right:4px solid black;border-top:2px solid black;border-bottom:2px solid black;padding:0px;">
                    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                        <tr height="60">
                            <td id="lumbar1checktd" class="spinalbg" style="border:1px solid #606069" width="20%"
                                align="center" onclick="tdcheck('lumbar1');"><input style="display:none;"
                                    type="checkbox" name="lumbaradjustment[]" value="1" id="lumbar1check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('lumbar','lumbar1check');">
                                <img id="lumbar1img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15"><br>1
                            <td id="lumbar2checktd" class="spinalbg" style="border:1px solid #606069" width="20%"
                                align="center" onclick="tdcheck('lumbar2');"><input style="display:none;"
                                    type="checkbox" name="lumbaradjustment[]" value="2" id="lumbar2check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('lumbar','lumbar2check');">
                                <img id="lumbar2img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15"><br>2
                            <td id="lumbar3checktd" class="spinalbg" style="border:1px solid #606069" width="20%"
                                align="center" onclick="tdcheck('lumbar3');"><input style="display:none;"
                                    type="checkbox" name="lumbaradjustment[]" value="3" id="lumbar3check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('lumbar','lumbar3check');">
                                <img id="lumbar3img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15"><br>3
                            <td id="lumbar4checktd" class="spinalbg" style="border:1px solid #606069" width="20%"
                                align="center" onclick="tdcheck('lumbar4');"><input style="display:none;"
                                    type="checkbox" name="lumbaradjustment[]" value="4" id="lumbar4check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('lumbar','lumbar4check');">
                                <img id="lumbar4img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15"><br>4
                            <td id="lumbar5checktd" class="spinalbg" style="border:1px solid #606069" width="20%"
                                align="center" onclick="tdcheck('lumbar5');"><input style="display:none;"
                                    type="checkbox" name="lumbaradjustment[]" value="5" id="lumbar5check"
                                    onclick="window.event.stopPropagation();"
                                    onchange="checkarea('lumbar','lumbar5check');">
                                <img id="lumbar5img" src="{{ asset('/nlimages/spacer.png') }}" width="15"
                                    height="15"><br>5
                        </tr>
                    </table>
                </td>
                <td class="styledbg" id="tecolumn6" align="center" onclick="tdcheck('lumbarteunitarea','te')">
                    <div id="2%SE%te" style="display:none;">
                        <img id="lumbarteunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="lumbarteunitareacheck" name="lumbar%SE%teunitarea" value="lumbar"
                            onchange="checkarea('lumbar','lumbarteunitareacheck');checktd('lumbarteunitareacheck','tecolumn6')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="mrcolumn6" align="center" onclick="tdcheck('lumbarmrunitarea','mr')">
                    <div id="2%SE%mr" style="display:none;">
                        <img id="lumbarmrunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="lumbarmrunitareacheck" name="lumbar%SE%mrunitarea" value="lumbar"
                            onchange="checkarea('lumbar','lumbarmrunitareacheck');checktd('lumbarmrunitareacheck','mrcolumn6')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="neurecolumn6" align="center" onclick="tdcheck('lumbarneureunitarea','neure')">
                    <div id="2%SE%neure" style="display:none;">
                        <img id="lumbarneureunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="lumbarneureunitareacheck" name="lumbar%SE%neureunitarea" value="lumbar"
                            onchange="checkarea('lumbar','lumbarneureunitareacheck');checktd('lumbarneureunitareacheck','neurecolumn6')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="masscolumn6" align="center" style="border-right:2px black solid;"
                    onclick="tdcheck('lumbarmassunitarea','mass')">
                    <div id="2%SE%mass" style="display:none;">
                        <img id="lumbarmassunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="lumbarmassunitareacheck" name="lumbar%SE%massunitarea" value="lumbar"
                            onchange="checkarea('lumbar','lumbarmassunitareacheck');checktd('lumbarmassunitareacheck','masscolumn6')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="traccolumn6" align="center" onclick="tdcheck('lumbartracunitarea','trac')">
                    <div id="2%SE%trac" style="display:none;">
                        <img id="lumbartracunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="lumbartracunitareacheck" name="lumbar%SE%tracunitarea" value="lumbar"
                            onchange="checkarea('lumbar','lumbartracunitareacheck');checktd('lumbartracunitareacheck','traccolumn6')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="escolumn6" align="center" onclick="tdcheck('lumbaresunitarea','es')">
                    <div id="2%SE%es" style="display:none;">
                        <img id="lumbaresunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="lumbaresunitareacheck" name="lumbar%SE%esunitarea" value="lumbar"
                            onchange="checkarea('lumbar','lumbaresunitareacheck');checktd('lumbaresunitareacheck','escolumn6')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="uscolumn6" align="center" onclick="tdcheck('lumbarusunitarea','us')">
                    <div id="2%SE%us" style="display:none;">
                        <img id="lumbarusunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="lumbarusunitareacheck" name="lumbar%SE%usunitarea" value="lumbar"
                            onchange="checkarea('lumbar','lumbarusunitareacheck');checktd('lumbarusunitareacheck','uscolumn6')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
                <td class="styledbg" id="inflzcolumn6" align="center" onclick="tdcheck('lumbarinflzunitarea','inflz')">
                    <div id="2%SE%inflz" style="display:none;">
                        <img id="lumbarinflzunitareacheckimg" src="{{ asset('/nlimages/spacer.png') }}"
                            width="40" height="37"><input
                            style="width:20px;height:20px;outline:3px solid #9f9f9f;display:none;" type="checkbox"
                            id="lumbarinflzunitareacheck" name="lumbar%SE%inflzunitarea" value="lumbar"
                            onchange="checkarea('lumbar','lumbarinflzunitareacheck');checktd('lumbarinflzunitareacheck','inflzcolumn6')"
                            onclick="javascript:window.event.stopPropagation();">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="color:white;border:none;border-bottom:1px solid white;padding:1px;" id="spinaltd3"
                    align="center" valign="bottom">
                    <input type="hidden" id="pointer98941value" name="98941pointers">
                    <div id="pointer98941">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="50%">
                                    <img src="{{ asset('/nlimages/minuspointer.png') }}"
                                        style="width:100%;display:inline;" onclick="window.event.stopPropagation();"
                                        class="no-print">
                                </td>
                                <td width="50%"><img onclick="window.event.stopPropagation();selectletter('98941');"
                                        src="{{ asset('/nlimages/pluspointer.png') }}"
                                        style="width:100%;display:inline;" class="no-print"></td>
                            </tr>
                        </table>
                    </div>
                    <div id="select98941" style="position:relative;display:none;"><select
                            onclick="window.event.stopPropagation();" id="selectpointer98941" name="selectpointer98941"
                            onchange="javascript:window.event.stopPropagation();selectpointer('98941','Spinal 3-4 (98941)','11','spinal','spinal','green');">
                            <option value="" selected></option>
                            <option value="cancel">Cancel</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select><br><br></div>
                </td>

                <td class="spinalbg" width="100" id="sitd" colspan="1" onClick="tdcheck('si');" align="center">
                    <table width="100%">
                        <tr>
                            <td><input style="display:none;" id="sicheck" name="sicheck" type="checkbox"
                                    onClick="window.event.stopPropagation();"
                                    onChange="javascript:highlightrow('si','spinal');" value="true"> <img id="siimg"
                                    width="20" height="20" src="{{ asset('/nlimages/spacer.png') }}">
                            </td>
                            <td align="center">SI</td>
                            <td><img src="{{ asset('/nlimages/spacer.png') }}" width="20" height="20">
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="2" style="border-top:none;border:none;background-color:white;">&nbsp;</td>
                <td style="border-top:none;border:none;background-color:white;">&nbsp;</td>
                <td colspan="2"
                    style="background-color:white;border-left:4px solid black;border-right:4px solid black;border-bottom:4px solid black;border-top:2px solid black;padding:0px;">
                    <table width="100%" height="100%" cellspacing="0" cellpadding="0">
                        <tr height="39">
                            <td id="si1
                            
         @endsection('content')                   