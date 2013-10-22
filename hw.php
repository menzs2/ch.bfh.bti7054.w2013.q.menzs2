<html><body>
<table width="100%" height="100%">
<tr valign="top">
<td width="150">
<h1>Menu</h1>
<?php for ($i = 0; $i < 10; $i++) {
echo "<a href=\"hw.php?id=$i\">"; echo " Page $i";
echo "</a><br />";
}
?>
</td>
<td>
<h1>Main Area</h1>
<?php if (isset($_GET["id"]))
$id=$_GET["id"];
else
$id=0;
echo "This is page $id";
?>
</td>
</tr>
</table>
</body></html>