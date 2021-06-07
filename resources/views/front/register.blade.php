<html>
<head>
  <title>Up2Speed Training Center</title>
  <link href="{{ asset('assets/front/style.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/front/jqueryprogressbar/jquery-ui.css') }}">
  <script src="{{ asset('assets/front/jqueryprogressbar/jquery-1.10.2.js') }}"></script>
  <script src="{{ asset('assets/front/jqueryprogressbar/jquery-ui.js') }}"></script>
  <link rel="stylesheet" href="jqueryprogressbar/style.css">
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
<!--
function setheight(){
    var header=136+50;
    var screenheight=window.innerHeight;
    //document.write(divheight+'true');
    var difference=screenheight-header;
    //  document.getElementBy
    //else{
    var tableheight=document.getElementById('backgroundtable').clientHeight;
    var divheight=document.getElementById('backgrounddiv').clientHeight;
    //document.write(document.getElementById('backgrounddiv').style.height+'>'+difference);
    if(document.getElementById('backgrounddiv').clientHeight<difference){
        document.getElementById('backgroundtable').style.backgroundSize='1092 px '+difference+' px';
        document.getElementById('backgrounddiv').style.height=difference;
    }
    else{
        document.getElementById('backgroundtable').style.backgroundSize='1092 px '+tableheight+' px';
        document.getElementById('backgrounddiv').style.height=tableheight;
    }
    //document.getElementById('containertable').style.height=otherheight+divheight;
    //document.getElementById('supercontainertable').style.height=otherheight+divheight;
}
//-->
</script>
</head>

<body style="margin-top:0px;margin-bottom:0px;margin-right:0px;margin-left:0px; onLoad=" javascript:setheight();"="">
<table style="width:100%;height:100%" id="supercontainertable" cellspacing="0" cellpadding="0" bgcolor="#d7d7d8">
 <tbody><tr>
  <td align="center">
  <table style="width:1152px;height:100%" id="containertable" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
     <tbody><tr>
      <td style="width:30px" class="leftborder"></td>
      <td style="width:1092px;height:100%" valign="top">
       <table style="width:1092px;height:136px;" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <tbody><tr style="height:136px;">
         <td width="546" align="center">
      <a href="index.php"><img src="{{ asset('assets/front/images/headers/up2speed.png') }}" style="width:373px;display:inline" width="373"></a>
     </td>
     <td style="width:546px;background-color:#d7d7d8;">
          <center><a href="bodychart.php"><img src="{{ asset('assets/front/images/headers/muscleflossingbrsmall.png') }}" width="400"></a></center>
         </td>
        </tr>
       </tbody></table>
     <script>
    function swap(id,onoff){
      if(onoff=='on'){
        document.getElementById(id).src="assets/front/images/navbar/"+id+"active.png";
      }
      else
        document.getElementById(id).src="assets/front/images/navbar/"+id+".png";
    }
    </script> 
     <table style="width:1092px;height:50px" cellspacing="0" cellpadding="0">
          <tbody><tr style="height:50px"><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('index') }}">
            <img src="{{ asset('assets/front/images/navbar/index.png') }}" id="index" style="height:50px;" onmouseover="javascript:swap('index','on')" onmouseout="javascript:swap('index','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('sportsperformance') }}">
            <img src="{{ asset('assets/front/images/navbar/sportsperformance.png') }}" id="sportsperformance" style="height:50px;" onmouseover="javascript:swap('sportsperformance','on')" onmouseout="javascript:swap('sportsperformance','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('sportswellness') }}">
            <img src="{{ asset('assets/front/images/navbar/sportswellness.png') }}" id="sportswellness" style="height:50px;" onmouseover="javascript:swap('sportswellness','on')" onmouseout="javascript:swap('sportswellness','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('fitness') }}">
            <img src="{{ asset('assets/front/images/navbar/fitness.png') }}" id="fitness" style="height:50px;" onmouseover="javascript:swap('fitness','on')" onmouseout="javascript:swap('fitness','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('fitness') }}">
            <img src="{{ asset('assets/front/images/navbar/aboutus.png') }}" id="aboutus" style="height:50px;" onmouseover="javascript:swap('aboutus','on')" onmouseout="javascript:swap('aboutus','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('bodychart') }}">
            <img src="{{ asset('assets/front/images/navbar/bodychart.png') }}" id="bodychart" style="height:50px;" onmouseover="javascript:swap('bodychart','on')" onmouseout="javascript:swap('bodychart','off')" border="0"></a></td><td style="width:156px;height:50px" align="center">
            <a href="{{ URL::route('loginuser') }}">
            <img src="{{ asset('assets/front/images/navbar/login.png') }}" id="login" style="height:50px;" onmouseover="javascript:swap('login','on')" onmouseout="javascript:swap('login','off')" border="0"></a></td></tr></tbody></table>       <table style="width:1092px;background-image:url('assets/front/images/loginslide/1.jpg');
        background-size:100% 100%;" id="backgroundtable">
    <tbody><tr>
         <td style="width:1092px;padding:10px;" valign="top">
                    <div style="background-color:rgba(255, 255, 255, 0.75); position:relative;top:0px;left:0px;width:1062px;z-index:0" id="backgrounddiv">
          <div style="position:relative;top:0px;left:0px;width:1062px;opacity:1;z-index:1;padding-top:10px;padding-left:5px;padding-right:5px;">
          <script>
function show(id){
document.getElementById('divfitness').style.display='none';
document.getElementById('divwellness').style.display='none';
document.getElementById('divsportsperformance').style.display='none';
document.getElementById(id).style.display='block';
document.getElementById('reg').style.display='block';
}
</script>
<form method="POST" action="{{ route('register') }}">
@csrf
@method('POST')
<center>Please fill out the following information to register an account with Up2Speed.<br>
(Fields marked with an <font color="red">*</font> are required)<br>
<table width="350"><tbody><tr><td width="175"><font color="red">*</font>Username: </td><td width="175"><input name="username"></td></tr>
<tr><td><font color="red">*</font>Password: </td><td><input type="password" name="password"></td></tr>
<tr><td><font color="red">*</font>Confirm Password: </td><td><input type="password" name="confirmpassword"></td></tr>
<tr><td><font color="red">*</font>Email: </td><td><input name="email"></td></tr>
<tr><td>First Name: </td><td><input name="firstname"></td></tr>
<tr><td>Last Name: </td><td><input name="lastname"></td></tr>
<tr><td>Phone Number: </td><td><input name="phone"></td></tr>
<tr><td>City: </td><td><input name="city"></td></tr></tbody></table>
<table width="350"><tbody><tr><td colspan="2" align="center">Interested in:<br><input type="radio" name="interestedin" value="Fitness" onclick="javascript:show('divfitness');"> Fitness <input type="radio" name="interestedin" value="Wellness" onclick="javascript:show('divwellness');"> Wellness <input type="radio" name="interestedin" value="Sports Performance" onclick="javascript:show('divsportsperformance');"> Sports Performance</td></tr></tbody></table><br>
<input type="submit" name="submit" value="Submit" style="border:medium #090 solid;"></center>
</form>          </div>
          </div>
     </td>
        </tr>
       </tbody></table>
      </td>
      <td style="width:30px;" class="rightborder"></td>
  </tr>
   </tbody></table>
  </td>
 </tr>
</tbody></table>

</body></html>