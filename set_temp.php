<?php
$temp_no=$_GET['number'];
$file = fopen("globals_temp.php", "w") or die("Unable to open file!");
$txt = "<?php\n";
fwrite($file, $txt);
$txt = "\$temp_no=".$temp_no.";\n";
fwrite($file, $txt);
$txt = "?>";
fwrite($file, $txt);
fclose($file);

$file = fopen("globals_year.php", "w") or die("Unable to open file!");
$txt = "<?php\n";
fwrite($file, $txt);
$txt = "\$year=0;\n";
fwrite($file, $txt);
$txt = "?>";
fwrite($file, $txt);
fclose($file);
header("Location:title.php");

?>