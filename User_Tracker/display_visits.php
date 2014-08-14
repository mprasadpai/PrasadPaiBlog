<?php 
require_once('visitors_connections.php');//the file with connection code and functions



$result = mysqli_query($visitors,"SELECT * FROM visitors_table");


function showVisitors($visitors)
{

$result = mysqli_query($visitors,"SELECT * FROM visitors_table LIMIT 7");
echo '<table style="width:100%; border:1px dashed #CCC" cellpadding="3">
<tr>
<td style="width:15%;border-bottom:1px solid #CCC">IP</td>
<td style="width:15%;border-bottom:1px solid #CCC">Date</td>
<td style="width:15%;border-bottom:1px solid #CCC">Time</td>

</tr>';


while($row_visitors = mysqli_fetch_array($result)) {
 echo '<tr>
        <td>'.$row_visitors['visitors_ip'].'</td>
        <td>'.$row_visitors['visitors_day'].'-'.$row_visitors['visitors_month'].'-'.$row_visitors['visitors_year'].'</td>
        <td>'.$row_visitors['visitors_hour'].':'.$row_visitors['visitors_minute'].'</td>
       </tr>';
}
mysqli_close($visitors);

echo'</table>';

}



/* paginate($start,$limit,$result->num_rows,"display_visits.php",""); */


?>