@extends('front.layouts.app')

@section('content')
<tbody><tr>
         <td style="width:1092px;padding:10px;" valign="top">
                    <div style="background-color:rgba(255, 255, 255, 0.75); position:relative;top:0px;left:0px;width:1062px;z-index:0" id="backgrounddiv">
          <div style="position:relative;top:0px;left:0px;width:1062px;opacity:1;z-index:1;padding-top:10px;padding-left:5px;padding-right:5px;">
          <script>
function swap2(id,onoff){
if(onoff=='on')
	document.getElementById(id).src="assets/front/images/home/"+id+"active.png";
else
	document.getElementById(id).src="assets/front/images/home/"+id+".png";
}
var isMobile = {
                        Android: function() {
                            return navigator.userAgent.match(/Android/i);
                        },
                        BlackBerry: function() {
                            return navigator.userAgent.match(/BlackBerry/i);
                        },
                        iOS: function() {
                            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                        },
                        Opera: function() {
                            return navigator.userAgent.match(/Opera Mini/i);
                        },
                        Windows: function() {
                            return navigator.userAgent.match(/IEMobile/i);
                        },
                        any: function() {
                            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                        }
                    };
                    
                    if(isMobile.any()) {
                       window.location = "http://www.up2speedtraining.com/mobile/index.html";
                    }
                    else{
                        //alert('desktop');
                    }
</script>

<link href="{{ asset('assets/front/style.css') }}" rel="stylesheet" type="text/css">

<center><table cellspacing="5px" cellpadding="5px"><tbody><tr><td colspan="2"></td></tr><tr><td><a href="{{ URL::route('sportsperformance') }}"><img src="{{ asset('assets/front/images/home/iStock.jpg') }}" width="500" height="500"></a></td>
<td><a href="{{ URL::route('sportswellness') }}"><img src="{{ asset('assets/front/images/home/MUSCLE FLOSSING ROLLER small.png') }}" width="500" height="500"></a></td></tr>
<tr><td><a href="{{ URL::route('fitness') }}"><img src="{{ asset('assets/front/images/home/homemr4resized.png') }}" width="500" height="500"></a></td>
<td><a href="{{ URL::route('bodychart') }}"><img src="{{ asset('assets/front/images/home/homemr4resized.png') }}" width="500" height="500"></a></td></tr></tbody></table></center>
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
@endSection