<?php 
require_once('visitors_connections.php');//the file with connection code and functions

/* if ($_GET['start'] == "") $start = 0;
else $start = $_GET['start'];
$limit = 15;  */

$result = mysqli_query($visitors,"SELECT * FROM visitors_table");


function showVisitors($visitors)
{


echo '<table style="width:100%; border:1px dashed #CCC" cellpadding="3">
<tr>
<td style="width:15%;border-bottom:1px solid #CCC">IP</td>
<td style="width:15%;border-bottom:1px solid #CCC">Browser</td>
<td style="width:15%;border-bottom:1px solid #CCC">Time</td>
<td style="width:30%;border-bottom:1px solid #CCC">Refferer</td>
<td style="width:25%;border-bottom:1px solid #CCC">Page</td>
</tr>';


while($row_visitors = mysqli_fetch_array($result)) {
 echo '<tr>
        <td>'.$row_visitors['visitors_ip'].'</td>
        <td>'.$row_visitors['visitors_browser'].'</td>
        <td>'.$row_visitors['visitors_hour'].':'.$row_visitors['visitors_minute'].'</td>
        <td>'.$row_visitors['visitors_refferer'].'</td>
        <td>'.$row_visitors['visitors_page'].'</td>
       </tr>';
}
mysqli_close($visitors);

echo'</table>';
}



/* paginate($start,$limit,$result->num_rows,"display_visits.php",""); */


?>