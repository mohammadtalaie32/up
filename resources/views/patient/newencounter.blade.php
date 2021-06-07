@extends('layouts.manage')

@section('content')
    <form name="encform" enctype="multipart/form-data" action="{{ url('insertnewencounter') }}" method="POST">
        @csrf
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
                        <hr>
                        <font size="+2">New visit</font>
                        <hr>
                        <script>
                            var slider = document.getElementById("myRange");
                            var output = document.getElementById("demo");
                            output.innerHTML = slider.value; // Display the default slider value

                            // Update the current slider value (each time you drag the slider handle)
                            slider.oninput = function() {
                                output.innerHTML = this.value;
                            }

                        </script>
                        <form name="form" action="newencounter.php" method="post">
                            <input type="hidden" name="submitted" value="true">
                            <input type="hidden" id="numdates" name="numdates" value="1">
                            <b>Visit Basic Information</b><br><br>

                            <font style="font-size:20px">Date of Service : </font><br><br>
                            <div id="">
                                <table id="dynamicTable" cellspacing="0" cellpadding="2">
                                    <tbody>
                                        <tr>
                                            <td style="font-size:24px" width="75"><b>#1:</b></td>
                                            <td style="font-size:24px"><select name="addmore[0][datemonth]" id=""
                                                    style="width:60px;height:40px;font-size:24px"
                                                    onchange="changeforward(0)">
                                                    <option value=""></option>
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>

                                                <select name="addmore[0][dateday]" id=""
                                                    style="width:60px;height:40px;font-size:24px">
                                                    <option value=""></option>
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>

                                                <select name="addmore[0][dateyear]" id=""
                                                    style="width:120px;height:40px;font-size:24px"
                                                    onchange="changeforward(0)">
                                                    <option value=""></option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>

                                                </select>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time
                                                : <input id="time0" name="addmore[0][time]"
                                                    style="width:100px;height:40px;font-size:24px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td style="font-size:24px">Billing Type : <select name="addmore[0][billingtype]"
                                                    id="billingtype0" style="font-size:24px;">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                                <input type="hidden" name="addmore[0][patient_id]" value="{{ $data->id }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br><button type="button" name="add" id="add" class="button">Add Another
                                Visit</button>
                            <div id="showalgorithm" style="font-size:20px;">
                                <table width="500">
                                    <tbody>
                                        <tr>
                                            <td colspan="4"><br></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="font-size:20px;"><br><br>
                                                <input type="hidden" name="" value="newvisit"><input type="checkbox"
                                                    name="initialexam" value="true" checked=""> Populate initial exam
                                                IL-99202
                                                NE<br><br>No previous visits to use to populate.
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="notnewvisit" style="display:none;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td style="font-size:20px;">Mark Visit as Billing Ready
                                                </td>
                                                <td colspan="3"><input type="radio" id="markvisityes" name="markvisit"
                                                        value="yes"> Yes <input type="radio" name="markvisit" value="no"> No
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:20px;">Mark Patient as Starred for
                                                    Billing</td>
                                                <td colspan="3"><input type="radio" id="markbillingyes" name="" value="yes">
                                                    Yes <input type="radio" name="markstar" value="no"> No</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:20px;">Omit exams from daily
                                                    coding:</td>
                                                <td colspan="3"><input type="radio" id="omitexamsyes" name="omitexams"
                                                        value="yes"> Yes <input type="radio" id="omitexamsno"
                                                        name="omitexams" value="no"> No</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:20px;">

                                                    <style type="text/css">
                                                        .button {
                                                            background: none !important;
                                                            border: none;
                                                            padding: 0 !important;
                                                            /*optional*/
                                                            font-family: arial, sans-serif;
                                                            /*input has OS specific font-family*/
                                                            color: #0000ee;
                                                            text-decoration: underline;
                                                            cursor: pointer;
                                                            font-size: 20px;
                                                        }

                                                    </style>
                                                    <script type="text/javascript">
                                                        var i = 0;
                                                        var v = 1;
                                                        $("#add").click(function() {
                                                            ++i;
                                                            ++v;
                                                            $("#dynamicTable").append(
                                                                '<Tr><td width="75" style="font-size:24px"><b>#' +
                                                                v +
                                                                ':</b></td><td style="font-size:24px"><select id="datemonth" name="addmore[' +
                                                                i +
                                                                '][datemonth]" style="width:60px;height:40px;font-size:24px"><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09" selected>9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select> <select id="dateday" name="addmore[' +
                                                                i +
                                                                '][dateday]" style="width:60px;height:40px;font-size:24px"><option value="1">1</option><option value="2" selected>2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> <select id="dateyear" name="addmore[' +
                                                                i +
                                                                '][dateyear]" style="width:120px;height:40px;font-size:24px" ><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020" selected>2020</option><option value="2021">2021</option><option value="2022">2022</option></select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time : <input id="time" name="addmore[' +
                                                                i +
                                                                '][time]" style="width:100px;height:40px;font-size:24px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td style="font-size:24px">Billing Type : <select name="addmore[' +
                                                                i +
                                                                '][[billingtype]" id="billingtype" style="font-size:24px;"><option value=""></option><option value=""></option></select><input type="hidden" class="" name="addmore[' +
                                                                i +
                                                                '][patient_id]" value="{{ $data->id }}"></td></Tr>'
                                                            );
                                                        });
                                                        $(document).on('click', '.remove-tr',
                                                            function() {
                                                                $(this).parents('tr').remove();
                                                            });

                                                    </script>

                                                    <script>
                                                        function newornot() {
                                                            if (document.getElementById('encounter')
                                                                .value == 'newvisit') {
                                                                document.getElementById('notnewvisit')
                                                                    .style.display = 'none';
                                                                document.getElementById('markvisityes')
                                                                    .checked = false;
                                                                document.getElementById(
                                                                        'markbillingyes').checked =
                                                                    false;
                                                                document.getElementById('omitexamsyes')
                                                                    .checked = false;
                                                                document.getElementById('markvisitno')
                                                                    .checked = false;
                                                                document.getElementById('markbillingno')
                                                                    .checked = false;
                                                                document.getElementById('omitexamsno')
                                                                    .checked = false;
                                                            } else {
                                                                document.getElementById('notnewvisit')
                                                                    .style.display = 'block';
                                                                document.getElementById('markvisityes')
                                                                    .checked = true;
                                                                document.getElementById(
                                                                    'markbillingyes').checked = true;
                                                                document.getElementById('omitexamsyes')
                                                                    .checked = true;
                                                            }
                                                        }

                                                        function setslider() {
                                                            var populateas = document.getElementById(
                                                                'populateas').value;
                                                            var value;
                                                            if (populateas == 'remained unchanged')
                                                                value = 0;
                                                            if (populateas == 'slightly improved')
                                                                value = 20;
                                                            if (populateas == 'improved') value = 40;
                                                            if (populateas == 'much improved') value =
                                                                60;
                                                            if (populateas == 'slightly worse')
                                                                value = -20;
                                                            if (populateas == 'worse') value = -40;
                                                            if (populateas == 'much worse') value = -60;
                                                            if (populateas == 'resolved') value = 100;
                                                            document.getElementById('range').value =
                                                                value;
                                                            popdiv('select');
                                                        }

                                                    </script>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" style="font-size:20px;">
                                                    <script>
                                                        function popdiv(from) {
                                                            var value;
                                                            if (from == 'slider') {
                                                                value = document.getElementById('range')
                                                                    .value;
                                                                document.getElementById('percimp')
                                                                    .value = value;
                                                            }
                                                            if (from == 'input') {
                                                                value = document.getElementById(
                                                                    'percimp').value;
                                                                document.getElementById('range').value =
                                                                    value;
                                                            }
                                                            var populateas;
                                                            if (from == 'select') document
                                                                .getElementById('percimp').value =
                                                                document.getElementById('range').value;
                                                            else {
                                                                if (value == 0) populateas =
                                                                    'remained unchanged';
                                                                if (value <= 20 && value > 0)
                                                                    populateas = 'slightly improved';
                                                                if (value <= 40 && value > 20)
                                                                    populateas = 'improved';
                                                                if (value >= 40) populateas =
                                                                    'much improved';
                                                                if (value >= -20 && value < 0)
                                                                    populateas = 'slightly worse';
                                                                if (value >= -40 && value < -5)
                                                                    populateas = 'worse';
                                                                if (value < -40) populateas =
                                                                    'much worse';
                                                                if (value == 100) populateas =
                                                                    'resolved';
                                                                document.getElementById('populateas')
                                                                    .value = populateas;
                                                            }
                                                        }

                                                    </script>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br><br>
                            <input type="image" src="{{ asset('/nlimages/savebutton.png') }}" height="25">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
