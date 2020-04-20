<?php 
require 'connect.php'; 

$name = $_POST['Full_name'];
$phone = $_POST['Phone'];
$email = $_POST['email'];

$sql = "INSERT INTO Peo_ple2 (Full_name, Phone, Email) VALUES ('$name', '$phone', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    echo "<script>location.href = 'index.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

