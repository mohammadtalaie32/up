@extends('layouts.manage')
@section('content')
    <form name="encform" enctype="multipart/form-data" action="{{ route('udateInsuranceinfo', $data->id) }}" method="POST">
        @csrf
        @method(' PUT') <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
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
        @php
        $printyear = false;
        @endphp
        <table width="100%" cellpadding="10">
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
                                //     document.getElementById('patientid').value = patientid;
                                //     document.getElementById('encounterdate').value = date;
                                //     document.getElementById('action').value = action;
                                //     document.form.submit();
                            }

                            function newencountersubmit() {
                                window.alert('Please select a patient!');
                            }

                            function showhide(id, phone) {
                                if (document.getElementById('encounter' + id).style.display ==
                                    'block' && phone != 'phone') {
                                    document.getElementById('encounter' + id).style.display = 'none';
                                    document.getElementById('img' + id).src =
                                        '//images/plus.png';
                                    document.getElementById('selectedpatients').value = document
                                        .getElementById('selectedpatients').value.replace(id + '%SE%',
                                            '');
                                } else if (document.getElementById('encounter' + id).style.display ==
                                    'none') {
                                    document.getElementById('encounter' + id).style.display = 'block';
                                    document.getElementById('img' + id).src =
                                        '//images/minus.png';
                                    document.getElementById('selectedpatients').value += id + '%SE%';
                                }
                            }

                            function showall() {
                                for (var i = 0; i < patientids.length; i++) {
                                    document.getElementById('encounter' + patientids[i]).style.display =
                                        'block';
                                    document.getElementById('img' + patientids[i]).src =
                                        '//images/minus.png';
                                    document.getElementById('selectedpatients').value += patientids[i] +
                                        '%SE%';
                                }
                            }

                            function hideall() {
                                for (var i = 0; i < patientids.length; i++) {
                                    document.getElementById('encounter' + patientids[i]).style.display =
                                        'none';
                                    document.getElementById('img' + patientids[i]).src =
                                        '//images/plus.png';
                                    document.getElementById('selectedpatients').value = '';
                                }
                            }

                            function printsubmit() {
                                document.manageform.action = "manage.php?print=true";
                                document.manageform.submit();
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
                                                        <td align="center">
                                                            <a href="{{route('newpatient')}}">
                                                                <img src="{{ asset('/nlimages/newpatient.png') }}"
                                                                    height="50">
                                                                <br><br>New Patient
                                                            </a>
                                                        </td>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                        <td align="center">
                                                            <a href="{{route("newencounter", request('id'))}}">
                                                                <img src="{{ asset('/nlimages/newvisit.png') }}"
                                                                    height="50">
                                                                <br><br>
                                                                New Visit
                                                            </a>
                                                        </td>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                        <td align="center"><a href="javascript:printsubmit();">
                                                                <img src="{{ asset('/nlimages/printicon.png') }}"
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
                            <form action="manage.php" method="post" autocomplete="off" name="manageform">
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
                                                                                    <div class="autocompletefirst">
                                                                                        <input id="firstname" type="text"
                                                                                            name="firstname" value="">
                                                                                    </div>
                                                                                </td>
                                                                                <td>Last Name:
                                                                                    <div class="autocompletelast">

                                                                                        <input id="lastname" type="text"
                                                                                            name="lastname" value="">
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Show
                                                                                        Only:</strong>
                                                                                </td>
                                                                                <td colspan="2"><input type="radio"
                                                                                        name="showonly" value="cash">
                                                                                    Cash Patients
                                                                                    <input type="radio" name="showonly"
                                                                                        value="insurance">
                                                                                    Insurance Patients
                                                                                    <input type="radio" name="showonly"
                                                                                        value="pi"> PI
                                                                                    Patients
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Visit:</strong>
                                                                                </td>
                                                                                <td>Date:
                                                                                    <select name="datemonth">
                                                                                        <option value="1">1
                                                                                        </option>
                                                                                        <option value="2">2
                                                                                        </option>
                                                                                        <option value="3">3
                                                                                        </option>
                                                                                        <option value="4">4
                                                                                        </option>
                                                                                        <option value="5">5
                                                                                        </option>
                                                                                        <option value="6">6
                                                                                        </option>
                                                                                        <option value="7">7
                                                                                        </option>
                                                                                        <option value="8">8
                                                                                        </option>
                                                                                        <option value="9" selected="">
                                                                                            9</option>
                                                                                        <option value="10">
                                                                                            10</option>
                                                                                        <option value="11">
                                                                                            11</option>
                                                                                        <option value="12">
                                                                                            12</option>
                                                                                    </select>
                                                                                    <select name="dateday">
                                                                                        <option value="1">1
                                                                                        </option>
                                                                                        <option value="2">2
                                                                                        </option>
                                                                                        <option value="3">3
                                                                                        </option>
                                                                                        <option value="4">4
                                                                                        </option>
                                                                                        <option value="5">5
                                                                                        </option>
                                                                                        <option value="6">6
                                                                                        </option>
                                                                                        <option value="7">7
                                                                                        </option>
                                                                                        <option value="8">8
                                                                                        </option>
                                                                                        <option value="9">9
                                                                                        </option>
                                                                                        <option value="10">
                                                                                            10</option>
                                                                                        <option value="11">
                                                                                            11</option>
                                                                                        <option value="12">
                                                                                            12</option>
                                                                                        <option value="13">
                                                                                            13</option>
                                                                                        <option value="14">
                                                                                            14</option>
                                                                                        <option value="15">
                                                                                            15</option>
                                                                                        <option value="16">
                                                                                            16</option>
                                                                                        <option value="17">
                                                                                            17</option>
                                                                                        <option value="18" selected="">
                                                                                            18</option>
                                                                                        <option value="19">
                                                                                            19</option>
                                                                                        <option value="20">
                                                                                            20</option>
                                                                                        <option value="21">
                                                                                            21</option>
                                                                                        <option value="22">
                                                                                            22</option>
                                                                                        <option value="23">
                                                                                            23</option>
                                                                                        <option value="24">
                                                                                            24</option>
                                                                                        <option value="25">
                                                                                            25</option>
                                                                                        <option value="26">
                                                                                            26</option>
                                                                                        <option value="27">
                                                                                            27</option>
                                                                                        <option value="28">
                                                                                            28</option>
                                                                                        <option value="29">
                                                                                            29</option>
                                                                                        <option value="30">
                                                                                            30</option>
                                                                                        <option value="31">
                                                                                            31</option>
                                                                                    </select>
                                                                                    <select name="dateyear">
                                                                                        <option value="2015">
                                                                                            2015
                                                                                        </option>
                                                                                        <option value="2016">
                                                                                            2016
                                                                                        </option>
                                                                                        <option value="2017">
                                                                                            2017
                                                                                        </option>
                                                                                        <option value="2018">
                                                                                            2018
                                                                                        </option>
                                                                                        <option value="2019">
                                                                                            2019
                                                                                        </option>
                                                                                        <option value="2020" >                                                                                       2020
                                                                                        </option>
                                                                                        <option value="2021" selected="">
                                                                                            2021
                                                                                        </option>
                                                                                        <option value="2022">
                                                                                            2022
                                                                                        </option>
                                                                                        <option value="2023">
                                                                                            2023
                                                                                        </option>
                                                                                        <!--Year 2021,2022 and 2023 added by Gonesh Chandra Das-->
                                                                                    </select>
                                                                                </td>
                                                                                <td><b>Select range:</b>
                                                                                    <input type="radio" name="selectrange"
                                                                                        value="visits" checked="">
                                                                                    Visits <input type="radio"
                                                                                        name="selectrange"
                                                                                        value="lastaccessed">
                                                                                    Last accessed
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td>
                                                                                    Select Dates:
                                                                                    <select name="onor">
                                                                                        <option value="All" selected="">
                                                                                            All</option>
                                                                                        <option value="On">
                                                                                            On</option>
                                                                                        <option value="On or Before">
                                                                                            On or Before
                                                                                        </option>
                                                                                        <option value="On or After">
                                                                                            On or After
                                                                                        </option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td>
                                                                                                </td>
                                                                                                <td><input type="radio"
                                                                                                        name="last"
                                                                                                        value="Today">
                                                                                                    Today
                                                                                                </td>
                                                                                                <td><input type="radio"
                                                                                                        name="last"
                                                                                                        value="Yesterday">
                                                                                                    Yesterday
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Last:
                                                                                                </td>
                                                                                                <td><input type="radio"
                                                                                                        name="last"
                                                                                                        value="3 Days">
                                                                                                    3
                                                                                                    Days
                                                                                                </td>
                                                                                                <td><input type="radio"
                                                                                                        name="last"
                                                                                                        value="Week">
                                                                                                    Week
                                                                                                </td>
                                                                                                <td><input type="radio"
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
                                                                <td valign="top" align="center"><br>
                                                                    <input type="image" alt="Filter"
                                                                        src="{{ asset('/nlimages/filterbutton.png') }}"
                                                                        width="101">
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
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><b>Filtered By: </b>
                                                        </td>
                                                        <td width="30">&nbsp;</td>
                                                        <td><a href="manage.php?clear=true">
                                                                <img
                                                                    src="{{ asset('/nlimages/clearbuttonorange.png') }}"></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><br>Select a patient to view data, or select an
                                            option to jump to that section: <br> <br>
                                            <script>
                                                function submitsort() {
                                                    if ("Filter" != "Filter")
                                                        document.manageform.filter.value = '';
                                                    document.manageform.submit();
                                                }

                                                function submitdefault(thedefault) {
                                                    document.manageform.changedefault.value =
                                                        thedefault;
                                                    document.manageform.submit();

                                                }

                                            </script>
                                            <input type="hidden" name="changedefault">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Sort by: <select name="sortby"
                                                                onchange="javascript:submitsort();" id="sortby">
                                                                <option value="lastname" selected="">
                                                                    Last Name</option>
                                                                <option value="firstname">First Name
                                                                </option>
                                                                <option value="created">Recently Created
                                                                </option>
                                                                <option value="accessed">Recently
                                                                    Accessed</option>
                                                                <option value="cash">Cash Patients
                                                                </option>
                                                                <option value="insurance">Insurance
                                                                    Patients</option>
                                                                <option value="piwc">PI / WC Patients
                                                                </option>
                                                            </select>
                                                            (Default View)</td>
                                                        <td>
                                                            <div id="showbillingpayment" style="display: block;"><input
                                                                    type="radio" name="showbillpay" id="showall"
                                                                    onclick="filterbillpay();" checked="">
                                                                Show All
                                                                <strong>Billing</strong>: <input type="radio"
                                                                    name="showbillpay" id="showincomplete"
                                                                    onclick="filterbillpay();">
                                                                Incomplete <input type="radio" name="showbillpay"
                                                                    id="showready" onclick="filterbillpay();"> Ready
                                                                <input type="radio" name="showbillpay" id="showcomplete"
                                                                    onclick="filterbillpay();"> Complete
                                                                <strong>Payment</strong>: <input type="radio"
                                                                    name="showbillpay" id="showwaiting"
                                                                    onclick="filterbillpay();"> Waiting
                                                                <input type="radio" name="showbillpay" id="showpartial"
                                                                    onclick="filterbillpay();"> Partial
                                                                <input type="radio" name="showbillpay" id="showfull"
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

                        {{-------------------------- Patient Visits
                        ---------------}}

                        <form name="form" action="manage.php" method="post" autocomplete="off"
                            onsubmit="javascript:submitStar();bpsubmit();phonesubmit();">
                            <input type="hidden" name="filter" value="Filter"> <input type="hidden" name="passfilterpatient"
                                value="11">
                            <input type="hidden" name="passfirstname" value="">
                            <input type="hidden" name="passlastname" value="">
                            <input type="hidden" name="starpid" id="starpid">
                            <input type="hidden" name="staronoff">
                            <input type="hidden" name="starpriority">
                            <input type="hidden" name="starnotes">
                            <input type="hidden" name="billpayuniquekey">
                            <input type="hidden" name="billorpay">
                            <input type="hidden" name="billpaystatus">
                            <input type="hidden" name="billingstatus" id="billingstatus"><input type="hidden"
                                name="paymentstatus" id="paymentstatus"><input type="hidden" name="billingclaimnumber"
                                id="billingclaimnumber"><input type="hidden" name="billingdatesent"
                                id="billingdatesent"><input type="hidden" name="billingamount" id="billingamount"><input
                                type="hidden" name="billingnotes" id="billingnotes"><input type="hidden"
                                name="billingdeductible" id="billingdeductible"><input type="hidden" name="billingpaid"
                                id="billingpaid"><input type="hidden" name="paymentnotes" id="paymentnotes"><input
                                type="hidden" name="phonecall" id="phonecall"><input type="hidden" name="phonecalldate"
                                id="phonecalldate"><input type="hidden" name="phonecalltime" id="phonecalltime"><input
                                type="hidden" name="phonecallnumber" id="phonecallnumber"><input type="hidden"
                                name="phonecallemail" id="phonecallemail"><input type="hidden" name="phonecallnotes"
                                id="phonecallnotes"><input type="hidden" name="selectedpatients" id="selectedpatients"
                                value="">
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
                                <table style="border-top:2px solid #999494;border-bottom:2px solid #999494;" width="85%"
                                    cellspacing="0" cellpadding="10">
                                    <tbody>
                                        <tr>
                                            <td width="4%" align="center"></td>
                                            <td width="5%" align="left"></td>
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
                                <div id="patienttable11">
                                    <table style="border-top:1px solid black;" width="85%" cellspacing="0" cellpadding="0"
                                        bgcolor="#d2d2d0">
                                        <tbody>
                                            <tr height="25" id="patientRow{{ $data->id }}">
                                                <td width="6%" align="center">
                                                    <table id="patient11">
                                                        <tbody>
                                                            <tr height="20">
                                                                <td style="padding-top:0px;padding-bottom:0px;width:25px;"
                                                                    align="center">
                                                                    <div style="position:relative;">
                                                                        <table width="25">
                                                                            <tbody>
                                                                                <tr>
                                                                                    {{--
                                                                                    star
                                                                                    submit Pending
                                                                                    --}}
                                                                                    <td width="25" align="center">
                                                                                        @if ($data->starred == 'yes')
                                                                                            <img src="{{ asset('nlimages/manageicons/star' . $data->starpriority . 'active.png') }}"
                                                                                                onmouseover="previewstar({{ $data->id }},'on');"
                                                                                                onmouseout="previewstar({{ $data->id }},'off');"
                                                                                                onclick="showstar({{ $data->id }})"
                                                                                                ondblclick="submitStar({{ $data->id }},'off');"
                                                                                                height="20">
                                                                                        @else
                                                                                            <img src="{{ asset('nlimages/manageicons/starinactive.png') }}"
                                                                                                onmouseover="previewstar({{ $data->id }},'on');"
                                                                                                onmouseout="previewstar({{ $data->id }},'off');"
                                                                                                onclick="showstar({{ $data->id }})"
                                                                                                ondblclick="submitStar({{ $data->id }},'');"
                                                                                                height="20">
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div style="text-align: left; position: absolute; top: 23px; min-height: 230px; min-width: 300px; display: none; background-color: rgb(253, 255, 122); border: 1px solid rgb(255, 144, 0); z-index: 1; padding: 15px;"
                                                                            id="stardiv{{ $data->id }}">
                                                                            (Double-click to
                                                                            star/unstar)
                                                                            <span style="float:right;">
                                                                                <img src="{{ asset('images/delete.png') }}"
                                                                                    onclick="showstar({{ $data->id }});"
                                                                                    width="20" height="20">
                                                                            </span><br><br>
                                                                            <table cellspacing="0" cellpadding="0">
                                                                                <tbody>
                                                                                    <tr valign="bottom">
                                                                                        <td width="80">
                                                                                            Priority:</td>
                                                                                        <td width="35" valign="bottom">
                                                                                            <img id="starbilling{{ $data->id }}"
                                                                                                src={{ asset('nlimages/manageicons/' . ($data->starred == 'yes' && $data->starpriority == 'billing' ? 'starbillingactive' : 'starbillinginactive') . '.png') }}
                                                                                                onclick="starchange({{ $data->id }},'billing');"
                                                                                                ondblclick="submitStar({{ $data->id }},'billing');"
                                                                                                height="20">
                                                                                        </td>
                                                                                        <td width="35" valign="bottom">
                                                                                            <img id="starhigh{{ $data->id }}"
                                                                                                src={{ asset('nlimages/manageicons/' . ($data->starred == 'yes' && $data->starpriority == 'high' /*|| $data->starpriority == ''*/ ? 'starhighactive' : 'starhighinactive') . '.png') }}
                                                                                                onclick="starchange({{ $data->id }},'high')"
                                                                                                ondblclick="submitStar({{ $data->id }},'high');"
                                                                                                height="20">
                                                                                        </td>
                                                                                        <td width="35" valign="bottom">
                                                                                            <img id="starmedium{{ $data->id }}"
                                                                                                src={{ asset('nlimages/manageicons/' . ($data->starpriority == 'medium' ? 'starmediumactive' : 'starmediuminactive') . '.png') }}
                                                                                                onclick="starchange({{ $data->id }},'medium');"
                                                                                                ondblclick="submitStar({{ $data->id }},'medium');"
                                                                                                height="20">
                                                                                        </td>
                                                                                        <td width="35" valign="bottom">
                                                                                            <img id="starlow{{ $data->id }}"
                                                                                                src={{ asset('nlimages/manageicons/' . ($data->starpriority == 'low' ? 'starlowactive' : 'starlowinactive') . '.png') }}
                                                                                                onclick="starchange({{ $data->id }},'low');"
                                                                                                ondblclick="submitStar({{ $data->id }},'low');"
                                                                                                height="20">
                                                                                        </td>
                                                                                        <td width="30"><a
                                                                                                href="javascript:submitStar({{ $data->id }},'off');">Unstar</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table><br>
                                                                            <input type="hidden"
                                                                                id="starpriority{{ $data->id }}"
                                                                                value="{{ $data->starpriority != '' ? $data->starpriority : 'high' }}">
                                                                            <center>
                                                                                <textarea style="width:250px;height:75px;"
                                                                                    id="starnotes{{ $data->id }}">{{ $data->starnotes }}</textarea>
                                                                                <br><br>
                                                                                <button type='button' class="btn p-0">
                                                                                    <img src="{{ asset('nlimages/submitbutton.png') }}"
                                                                                        alt="Submit"
                                                                                        onclick="submitStar({{ $data->id }})">
                                                                                </button>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td style="padding=top:0px;padding-bottom:0px;" width="25"
                                                                    align="center">
                                                                    <div style="position:relative;">
                                                                        @if (count($visits))
                                                                            @if ($visits[0]->phonecall == 'yes')
                                                                                <img id="phonecallicon{{ $data->id }}"
                                                                                    src="{{ asset('nlimages/manageicons/phoneactive.png') }}"
                                                                                    onmouseover="previewphoneall({{ $data->id }},'on');"
                                                                                    onmouseout="previewphoneall({{ $data->id }},'off');"
                                                                                    onclick="showphoneall({{ $data->id }});"
                                                                                    width="20" height="20">
                                                                                <div style="text-align:left;position:absolute;top:23px;left;0px;min-height:350px;min-width:300px;display:none;background-color:#d2d2d2;border:1px solid #e62129;z-index:1;padding:15px;"
                                                                                    id="phoneall{{ $data->id }}">
                                                                                    <table width="100%">
                                                                                        <tr class="mt-3">
                                                                                            <td colspan='2'
                                                                                                style="text-align: right;">
                                                                                                <img src="{{ asset('images/delete.png') }}"
                                                                                                    onclick="showphoneall({{ $data->id }});">
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td> <br> </td>
                                                                                        </tr>
                                                                                        <tr style="text-align: center;">
                                                                                            <th colspan="2">
                                                                                                Call for
                                                                                                visit:
                                                                                                {{ $visits[0]->encounterdate }}
                                                                                            </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td> <br> </td>
                                                                                        </tr>
                                                                                        <tr style="text-align: center;">
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
                                                                                                {{ $visits[0]->phonecalldate != '' ? $visits[0]->phonecalldate : 'Not listed' }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Time Called:
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $visits[0]->phonecalltime != '' ? $visits[0]->phonecalltime : 'Not listed' }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Patient
                                                                                                Cell:
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $data->cellphone != '' ? $data->cellphone : 'Not listed' }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                Patient
                                                                                                Email:
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $data->email != '' ? $data->email : 'Not listed' }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td> <br> </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <b>Note:</b>
                                                                                                <br>
                                                                                                {{ $visits[0]->phonecallnotes != '' ? $visits[0]->phonecallnotes : 'Not listed' }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            @else
                                                                                <img id="phonecallicon{{ $data->id }}"
                                                                                    src="{{ asset('nlimages/manageicons/phoneinactive.png') }}"
                                                                                    onmouseover="previewphoneall({{ $data->id }},'on');"
                                                                                    onmouseout="previewphoneall({{ $data->id }},'off');"
                                                                                    onclick="showphoneall({{ $data->id }});"
                                                                                    width="20" height="20">
                                                                            @endif
                                                                        @else
                                                                            <img id="phonecallicon{{ $data->id }}"
                                                                                src="{{ asset('nlimages/manageicons/phoneinactive.png') }}"
                                                                                onmouseover="previewphoneall({{ $data->id }},'on');"
                                                                                onmouseout="previewphoneall({{ $data->id }},'off');"
                                                                                onclick="showphoneall({{ $data->id }});"
                                                                                width="20" height="20">
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                {{-- Insurance info
                                                                Pending
                                                                --}}
                                                                <td style="padding-top:0px;padding-bottom:0px;text-align:center;"
                                                                    width="25">
                                                                    <div style="position:relative;" class="no-print">
                                                                        @php
                                                                        $icon = 'cashicon';
                                                                        $pi = '';
                                                                        $data->pitype = str_replace_array('%SE%', [''],
                                                                        $data->pitype);
                                                                        $data->carriername = str_replace_array('%SE%',
                                                                        [''],
                                                                        $data->carriername);
                                                                        $data->claimsadjuster =
                                                                        str_replace_array('%SE%',
                                                                        [''],
                                                                        $data->claimsadjuster);
                                                                        $data->phonenumber = str_replace_array('%SE%',
                                                                        [''],
                                                                        $data->phonenumber);
                                                                        $data->copay0 = str_replace_array('%SE%', [''],
                                                                        $data->copay0);
                                                                        $data->coinsurance0 = str_replace_array('%SE%',
                                                                        [''],
                                                                        $data->coinsurance0);
                                                                        $data->coinsurancedp0 =
                                                                        str_replace_array('%SE%',
                                                                        [''],
                                                                        $data->coinsurancedp0);
                                                                        $data->visitsused = str_replace_array('%SE%',
                                                                        [''],
                                                                        $data->visitsused);
                                                                        $data->visitsauthorized =
                                                                        str_replace_array('%SE%', [''],
                                                                        $data->visitsauthorized);
                                                                        $data->paymenttype = str_replace_array('%SE%',
                                                                        [''],
                                                                        $data->paymenttype);
                                                                        $data->costpervisit = str_replace_array('%SE%',
                                                                        [''],
                                                                        $data->costpervisit);
                                                                        $data->Deliver_packages =
                                                                        str_replace_array('%SE%', [''],
                                                                        $data->Deliver_packages);
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
                                                                                <a
                                                                                    href="{{ route('insuranceinfo', $data->id) }}">
                                                                                    <img src={{ asset("nlimages/manageicons/$icon.png") }}
                                                                                        style="z-index:-1;"
                                                                                        onmouseover="showpayment({{ $data->id }});"
                                                                                        onmouseout="hidepayment({{ $data->id }});"
                                                                                        width="20" height="20">
                                                                                </a>
                                                                                <div style="text-align:left;position:absolute;top:23px;left;0px;min-height:275px;min-width:400px;display:none;background-color:#ebf5e5;border:1px solid #15b100;z-index:1;padding:15px;"
                                                                                    id="paymentdrop{{ $data->id }}">
                                                                                    {{ $pi }}
                                                                                    <br>
                                                                                    @php
                                                                                    $thisYearVisits =
                                                                                    count($visits)?$visits[0]->dateyear:0;
                                                                                    @endphp
                                                                                    Insurance carrier:
                                                                                    {{ $data->carriername != '' ? $data->carriername : 'Not listed' }}<br><br>
                                                                                    Name of Adjuster:
                                                                                    {{ $data->claimsadjuster != '' ? $data->claimsadjuster : 'Not listed' }}
                                                                                    <br><br>
                                                                                    Phone #:
                                                                                    {{ $data->phonenumber != '' ? $data->phonenumber : 'Not listed' }}
                                                                                    <br>
                                                                                    Co-pay:
                                                                                    {{ $data->copay0 != '' ? $data->copay0 : 'Not listed' }}
                                                                                    <br><br>
                                                                                    Co-Pay:
                                                                                    {{ $data->coinsurance0 != '' ? $data->coinsurance0 : 'Not listed' }}
                                                                                    <br>
                                                                                    Co-insurance:
                                                                                    {{ $data->coinsurance0 != '' ? ($data->coinsurancedp0 != '$' ? '' : '$') . $data->coinsurance0 . ($data->coinsurancedp0 != '$' ? '' : '$') : 'Not listed' }}
                                                                                    <br><br>
                                                                                    @php
                                                                                    $visitsused =
                                                                                    is_numeric($data->visitsused) ?
                                                                                    $data->visitsused : 0;
                                                                                    @endphp
                                                                                    Visits Used
                                                                                    <b>({{ date('Y') }})</b>:
                                                                                    {{ $thisYearVisits + $visitsused }}
                                                                                    {{ $data->visitsauthorized == '' ? '' : ' out of  ' . $data->visitsauthorized }}
                                                                                    <br><br>
                                                                                    Visits Prior:
                                                                                    {{ $data->visitsused != '' ? $data->visitsused : '0 / Up2Speed: ' . $thisYearVisits }}
                                                                                    <br>
                                                                                    Visits Remaining:
                                                                                    {{ $data->visitsauthorized != '' ? ($data->visitsauthorized == 'UNLIMITED' ? '∞' : (float) preg_replace('/[^0-9.]/', '', $data->visitsauthorized) - ($thisYearVisits + $visitsused)) : 'N/A' }}
                                                                                </div>
                                                                            @else
                                                                                @if ($data->paymenttype == 'Cash')
                                                                                    @php
                                                                                    $icon = 'cashicon';
                                                                                    @endphp
                                                                                @endif
                                                                                <a
                                                                                    href="{{ route('insuranceinfo', $data->id) }}">
                                                                                    <img src={{ asset("nlimages/manageicons/$icon.png") }}
                                                                                        style="z-index:-1;"
                                                                                        onmouseover="showpayment({{ $data->id }});"
                                                                                        onmouseout="hidepayment({{ $data->id }});"
                                                                                        width="20" height="20">
                                                                                </a>
                                                                                <div style="text-align:left;position:absolute;top:23px;left;0px;height:275px;width:400px;display:none;background-color:#ebf5e5;border:1px solid #15b100;z-index:1;padding:15px;"
                                                                                    id="paymentdrop{{ $data->id }}">
                                                                                    Cost per visit:
                                                                                    {{ $data->costpervisit != '' ? '$' . $data->costpervisit : 'Not listed' }}
                                                                                    <br>
                                                                                    Package:
                                                                                    {{ $data->Deliver_packages != '' ? $data->Deliver_packages : 'Not listed' }}
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <img src="{{ asset('nlimages/spacer.png') }}"
                                                                                style="z-index:-1;"
                                                                                onmouseover="showpayment({{ $data->id }});"
                                                                                onmouseout="hidepayment({{ $data->id }});"
                                                                                width="20" height="20">
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td style="padding-top:0px;padding-bottom:0px;" width="25">
                                                                    <img src="{{ asset('/images/spacer.png') }}" width="20"
                                                                        height="20">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="20%" valign="middle">
                                                    {{ $data->lastname }}, {{ $data->firstname }}
                                                </td>
                                                <td width="49%" align="left">
                                                    <img src="{{ asset('/images/spacer.png') }}" id="billingimg11"
                                                        width="15" height="15">
                                                </td>
                                                <td width="10%" align="center">
                                                    {{-- Billing info & Patient info
                                                    Pending
                                                    --}}
                                                    <table cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="20" align="center"><a
                                                                        href={{ route('edit', $data->id) }}>
                                                                        <img src="{{ asset('/nlimages/patienticonnew.png') }}"
                                                                            class="no-print" height="20"></a></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                <td width="20" align="center">
                                                                    <a href={{ route('billing', $data->id) }}>
                                                                        <img src="{{ asset('/nlimages/billingnew.png') }}"
                                                                            class="no-print" height="20">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                                {{-- Delete visit Pending
                                                --}}
                                                <td width="10%" align="center">
                                                    <button type="button" class="btn p-0"
                                                        onclick="deletePatient('{{ $data->id }}', '{{ $data->firstname }}', '{{ $data->lastname }}','{{ route('patient') }}')">
                                                        <img src="{{ asset('nlimages/delete.png') }}" height="20">
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="position: relative;padding:0px 6rem 0px 6rem;">
                                    <table style="border:1px solid gray" width="100%" cellspacing="0" cellpadding="5" class="bg-{{$icon}}">
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
                                            @forelse ($visits as $ind => $visitRecord)
                                                @php
                                                $visitRecord->billing = str_replace_array('%SE%',
                                                [''],$visitRecord->billing);
                                                $visitRecord->payment = str_replace_array('%SE%',
                                                [''],$visitRecord->payment);
                                                $visitRecord->paymentnotes = str_replace_array('%SE%',
                                                [''],$visitRecord->paymentnotes);
                                                @endphp
                                                <tr id="visitRow{{ $visitRecord->id }}">
                                                    <td class="text-center border-bottom">
                                                        <img src={{ asset('nlimages/manageicons/' . ($visitRecord->phonecall == 'yes' ? 'phoneactive' : 'phoneinactive') . '.png') }}
                                                            width="20" height="20" style="display:inline"
                                                            onclick="showphone($visitRecord->id,$data->id)"
                                                            ondblclick="markphoned($visitRecord->id,$visitRecord->phonecall,$data->patient_id)">

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
                                                        @if ($data->paymenttype == 'Insurance')
                                                            <img src="{{ asset('/nlimages/billing/' . $billsrc . '.png') }}"
                                                                width="15" height="15" style="display:inline;"
                                                                onmouseover="previewbp('{{ $visitRecord->id }}','billing','on')"
                                                                onmouseout="previewbp('{{ $visitRecord->id }}','billing','off');"
                                                                onclick="showbp('{{ $visitRecord->id }}','billing','{{ $visitRecord->billing }}','{{ $data->id }}')">
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
                                                                                value="incomplete"
                                                                                name="billingStatus{{ $visitRecord->id }}"
                                                                                {{ $visitRecord->billing == 'incomplete' || $visitRecord->billing == '' ? 'checked' : '' }}>
                                                                            Incomplete
                                                                            <input type="radio"
                                                                                id="billingready{{ $visitRecord->id }}"
                                                                                value="ready"
                                                                                name="billingStatus{{ $visitRecord->id }}"
                                                                                {{ $visitRecord->billing == 'ready' ? 'checked' : '' }}>
                                                                            Ready
                                                                            <input type="radio"
                                                                                id="billingcomplete{{ $visitRecord->id }}"
                                                                                value="complete"
                                                                                name="billingStatus{{ $visitRecord->id }}"
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
                                                        <a href="javascript:encountersubmit({{ $data->id }},'{{ $visitRecord->encounterdate }}','soap.php?p=subjective')"
                                                            id="encounterlink{{ $visitRecord->id }}">
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
                                                        @if ($data->paymenttype == 'Cash' || $visitRecord->billing == 'complete')
                                                            <div style="position:relative;">
                                                                <img src="{{ asset('/nlimages/billing/' . $paysrc . '.png') }}"
                                                                    width="15" height="15" style="display:inline;"
                                                                    onmouseover="previewbp({{ $visitRecord->id }},'payment','on')"
                                                                    onmouseout="previewbp({{ $visitRecord->id }},'payment','off')"
                                                                    onclick="showbp('{{ $visitRecord->id }}','payment','{{ $visitRecord->payment }}','{{ $visitRecord->patient_id }}')">
                                                                @if ($visitRecord->paymentnotes == '')
                                                                    <img src="{{ asset('images/spacer.png') }}" width="15"
                                                                        height="15">
                                                                @else
                                                                    <img src={{ asset('nlimages/notes.png') }} width="15"
                                                                        height="15">
                                                                @endif
                                                                <img src="{{ asset('images/spacer.png') }}"
                                                                    id="metdeductible{{ $visitRecord->id }}" width="15"
                                                                    height="15">
                                                                <img src="{{ asset('images/spacer.png') }}"
                                                                    id="cashpaid{{ $visitRecord->id }}" width="15" height="15">

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
                                                                                    name="paymentStatus{{ $visitRecord->id }}"
                                                                                    {{ $visitRecord->payment == 'waiting' || $visitRecord->payment == '' ? 'checked' : '' }}>
                                                                                Waiting
                                                                                <input type="radio"
                                                                                    id="paymentpartial{{ $visitRecord->id }}"
                                                                                    value="partial"
                                                                                    name="paymentStatus{{ $visitRecord->id }}"
                                                                                    {{ $visitRecord->payment == 'partial' ? 'checked' : '' }}>
                                                                                Partial
                                                                                <input type="radio"
                                                                                    id="paymentfull{{ $visitRecord->id }}"
                                                                                    value="full"
                                                                                    name="paymentStatus{{ $visitRecord->id }}"
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
                                                                    if($printyear){ $ytdpaid=0;
                                                                    $metdeductible=false; }
                                                                    $thispaid=str_replace('$','',$visitRecord->billingpaid);
                                                                    $ytdpaid+=(float) $thispaid;
                                                                    //$deductibleyears=explode('%SE%',$data['billingdeductibleyear']);
                                                                    $deductibleyears=explode('%SP%',$data->billingdeductibleyear);
                                                                    //$billingdeductibles=explode('%SE%',$data['billingdeductible']);
                                                                    $billingdeductibles=explode('%SP%',$data->billingdeductible);
                                                                    (float) $deductible=0;
                                                                    for($di=0;$di<sizeof($deductibleyears);$di++){
                                                                        if($deductibleyears[$di]==$visitRecord->dateyear){
                                                                        (float)
                                                                        $deductible=$billingdeductibles[$di]; } }
                                                                        if(!(float) $deductible){ if($data->
                                                                        insnetwork=='in')
                                                                        (float)
                                                                        $deductible=str_replace('$','',$data->insindeductible);
                                                                        else
                                                                        (float)
                                                                        $deductible=str_replace('$','',$data->insoutdeductible);
                                                                        }
                                                                        //(float)
                                                                        $deductible=str_replace('$','',$data->billingdeductible);
                                                                        if(!(float) $deductible){
                                                                        $insoutdeductible=explode('%SE%',$data->insoutdeductible);
                                                                        $insoutdeductible=$insoutdeductible[0];
                                                                        (float)
                                                                        $deductible=str_replace('$','',$insoutdeductible);
                                                                        }
                                                                        if($ytdpaid>=(float) $deductible){
                                                                        $paidtooffice=$ytdpaid-(float) $deductible;
                                                                        $paidtodeductible=(float) $deductible;
                                                                        $deductibleremaining=0; }
                                                                        else{ $paidtooffice=0;
                                                                        $paidtodeductible=$ytdpaid;
                                                                        $deductibleremaining=(float)
                                                                        $deductible-$ytdpaid; }
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
                                                                        if($ytdpaid>(float) $deductible&&$thispaid
                                                                        <=$ytdpaid-(float) $deductible){
                                                                            echo 'Of the <strong>$ ' .$thispaid.'</strong>
                                                                            for this
                                                                            visit, the entire amount was paid to
                                                                            Up2Speed.';
                                                                            $paidto='Up2Speed'; }
                                                                            if($ytdpaid>(float)
                                                                            $deductible&&$thispaid>$ytdpaid-(float)
                                                                            $deductible){
                                                                            echo 'Of the <strong>$
                                                                                '.$thispaid.'</strong> for this
                                                                            visit, <strong>$
                                                                                '.($thispaid-($ytdpaid-(float)
                                                                                $deductible)).'</strong>
                                                                            went to
                                                                            the deductible, and <strong>$
                                                                                '.($ytdpaid-(float)
                                                                                $deductible)
                                                                                .'</strong> went to Up2Speed.';
                                                                            $paidto='Both';}
                                                                            if($ytdpaid<=(float) $deductible){
                                                                                echo 'Of the <strong>$' .$thispaid.'</strong>
                                                                                for this
                                                                                visit, <strong>$
                                                                                    '.$thispaid.'</strong> went to
                                                                                the deductible.';
                                                                                $paidto='Deductible'; }
                                                                                if($paidto!='') echo '<script>
                                                                                    document.getElementById(
                                                                                            "paidto'.$visitRecord->id.'"
                                                                                        ).innerText =
                                                                                        "('.$paidto.')";

                                                                                </script> ';
                                                                                if($paidto=='Both'||($ytdpaid>(float)
                                                                                $deductible&&!$metdeductible)){
                                                                                echo '<script>
                                                                                    document.getElementById(
                                                                                            "metdeductible'.$visitRecord->id.'"
                                                                                        ).src =
                                                                                        root+"/nlimages/manageicons/metdeductible.png?time=true";

                                                                                </script>';
                                                                                $metdeductible=true;
                                                                                }
                                                                                if(($metdeductible||$ytdpaid>(float)
                                                                                $deductible)&&$thispaid!=''&&$thispaid!='0'&&$thispaid!='$0'){
                                                                                echo '<script>
                                                                                    document.getElementById(
                                                                                            "cashpaid'.$visitRecord->id.'"
                                                                                        ).src =
                                                                                        root+"/nlimages/manageicons/cashpaid.png";

                                                                                </script>';
                                                                                }
                                                                                }
                                                                                @endphp
                                                                </div>
                                                        @endif
                                                    </td>
                                                    <td class="border-bottom">
                                                        <img src={{ asset('images/spacer.png') }} width="65" height="3">
                                                    </td>
                                                    <td class="border-bottom">
                                                        <img src={{ asset('images/spacer.png') }} width="65" height="3">
                                                    </td>
                                                    <td class="border-bottom">
                                                        <img src={{ asset('images/spacer.png') }} width="65" height="3">
                                                    </td>
                                                    <td class="border-bottom">
                                                        <img src={{ asset('images/spacer.png') }} width="65" height="3">
                                                    </td>
                                                    <td class="border-bottom text-left" valign="middle">
                                                        <table cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="20" align="center" align="center">
                                                                    <a
                                                                        href="{{ route('progressNotes', [$data->id, "$visitRecord->id"]) }}">
                                                                        <img src={{ asset('nlimages/notesnew.png') }}
                                                                            height="20" class="no-print" style="display:inline">
                                                                    </a>
                                                                </td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                <td width="20" align="center">
                                                                    <a
                                                                        href="{{ route('assessmentICD', [$data->id, $visitRecord->id]) }}">
                                                                        <img src={{ asset('nlimages/progressnew.png') }}
                                                                            height="20" class="no-print" style="display:inline">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td class="border-bottom text-center">
                                                        <button type="button" class="btn p-0"
                                                            onclick="deleteVisit('{{ $visitRecord->id }}', '{{ $visitRecord->encounterdate }}')">
                                                            <img src={{ asset('nlimages/deletenew.png') }} height="20"
                                                                class="no-print">
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
                            </center><br>
                            <center>
                                <table class="no-print" width="80%">
                                    <tbody>
                                        <tr>
                                            <td width="100%" align="right"><img
                                                    src="{{ asset('/nlimages/showallbutton.png') }}"
                                                    onclick="javascript:showall()">
                                                <img src="{{ asset('/nlimages/hideallbutton.png') }}"
                                                    onclick="javascript:hideall()">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
@section('scripts')
<script>
    var patientids = ['11'];

</script>
<script>
    var firstname = ['Cash', 'Johnny', 'Johnny', 'jimmy', 'Frank', 'Jim',
        'Ben', 'Md Sano', '', 'Testvisit'
    ];

</script>
<script>
    var lastname = ['Patient', 'Test', 'Sample', 'Buffett', 'Sample',
        'Jones', 'Horton', 'Islam', '', ''
    ];

</script>
<script>
    autocomplete(document.getElementById("firstname"), firstname,
        'autocompletefirst');
    autocomplete(document.getElementById("lastname"), lastname,
        'autocompletelast');
    document.getElementById('paymentimg11').src =
        '//nlimages/billing/paymentfull.png';
    document.getElementById('showbillingpayment').style.display = 'block';
    var allpatientids = ['11'];

</script>

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
@endsection
