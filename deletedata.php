<?php 

require_once('dbcon.php');

$deleterecords = " DELETE FROM numbers ";
$deleterecordsresult = $conn->query($deleterecords);


$autoincrementnullified = " ALTER TABLE numbers AUTO_INCREMENT = 1 ";
$autoincrementnullifiedresult = $conn->query($autoincrementnullified);

echo '<script type="text/javascript">
alert("All the entried in the records has been deleted!!");
window.open("index.html","_self");
</script>';


mysqli_close($conn);

?>