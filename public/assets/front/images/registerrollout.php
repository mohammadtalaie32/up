<?
include("macros.php");
include("registerform.php");
include("bodychartjs.php");
$areas=$_POST['areas'];
$times=$_POST['times'];
connectmysql();
	writeheader();
	echo '<input type="hidden" id="areas" name="areas" value="'.$areas.'"><input type="hidden" id="times" name="times" value="'.$times.'">';
	echo 'Thank you for using the rollout tracker! In order to save your progress and use advanced features such as workout statistics, you must register a profile with up2speedtraining. Please enter the following information below and your results will be saved!<br><br>';
	echo '<table><tr><td>';
	writeregisterform();
	echo '</td><td><div id="log"></div><script>
	writelog(true);
	</script>';
	echo '</td></tr></table>';
	writecloser();
?>