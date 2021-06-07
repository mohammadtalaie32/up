<html>
<head>
  <title>Up2Speed Training Center</title>
  <link href="{{ asset('assets/front/style.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/front/jqueryprogressbar/jquery-ui.css') }}">
  <script src="{{ asset('assets/front/jqueryprogressbar/jquery-1.10.2.js') }}"></script>
  <script src="{{ asset('assets/front/jqueryprogressbar/jquery-ui.js') }}"></script>
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
          <a href="{{ URL::route('index') }}"><img src="{{ asset('assets/front/images/headers/up2speed.png') }}" style="width:373px;display:inline" width="373"></a>
         </td>
         <td style="width:546px;background-color:#d7d7d8;">
          <center><a href="{{ URL::route('bodychart') }}"><img src="{{ asset('assets/front/images/headers/muscleflossingbrsmall.png') }}" width="400"></a></center>
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
            <a href="{{ URL::route('aboutus') }}">
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
          <table><tbody><tr><td valign="top"><img src="{{ asset('assets/front/images/fitness.png') }}"></td>
<td>
<img src="{{ asset('assets/front/images/headers/environment.png') }}"><br><br>
<li style="color:blue"><font style="font-size:20px" color="black"><b>BOOT CAMP</b></font></li>
<li style="color:blue"><font style="font-size:20px" color="black"><b>SMALL GROUP</b></font></li>
<li style="color:blue"><font style="font-size:20px" color="black"><b>SEMI-PRIVATE</b></font></li>
<li style="color:blue"><font style="font-size:20px" color="black"><b>PRIVATE</b></font></li><br>
<img src="{{ asset('assets/front/images/headers/goals.png') }}">
<ul style="list-style-image: url(assets/front/images/bulletblue.png)">
<li>FAT LOSS
</li><li>POSTURE
</li><li>FUNCTIONAL X-TRAINING
</li><li>NUTRITIONAL CONSULTATION
</li><li>MUSCLE BUILDING
</li><li>CORE TRAINING
</li><li>DECREASE BLOOD PRESSURE
</li><li>PRESCRIBED DIABETIC EXCERCISE
</li><li>LOWER BAD CHOLESTEROL
</li></ul>
</td></tr></tbody></table>
          </div>
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