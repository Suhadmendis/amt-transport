 <?php



public function getDriverName($Driver_ref)
{


	$sql = "SELECT * FROM driver_master_file where driver_ref = '" . $Driver_ref . "'";
    $result = $conn->query($sql);
    $row = $result->fetch();
    return $row['driver_name'];
}












?>