<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$HOST = "ec2-34-234-228-127.compute-1.amazonaws.com";
$PORT = "5432";
$DBNAME = "d5h9cjhocvtg35";
$USER = "hrzkrwxbergaea";
$PASSWORD = "7aa76c616ffb103f2b31405631d732a94fdc6447c8a8cadabc3d815a5ef1f0b9";
$link = pg_connect("host=ec2-34-234-228-127.compute-1.amazonaws.com
dbname=d5h9cjhocvtg35
port=5432 user=hrzkrwxbergaea
password=7aa76c616ffb103f2b31405631d732a94fdc6447c8a8cadabc3d815a5ef1f0b9 sslmode=require");

// Check connection
if($link === false){
    die("ERROR: Could not connect. ");
}
else {echo "Connected";}
// Escape user inputs for security
$id =  pg_escape_string($link,$_REQUEST['id']);
$name = pg_escape_string($link,$_REQUEST['name']);
$date =  pg_escape_string($link,$_REQUEST['date']);
echo "<br>";
echo "Customer ID: " ;
echo $id."<br>";
echo "Customer Name: " ;
echo $name."<br>";
echo "Date: " ;
echo $date."<br>";
// Attempt insert query execution
$sql1 = 'INSERT INTO public."Customer" (
"Date", "Id", "Customer_Name",) VALUES ('."'$date'::date, '$id'::character varying(20), '$name'::character varying(100)". 'returning "Id"';

$result = pg_query($link, $sql1);
echo $result."<br>";

if($result){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
}
// Close connection

pg_close($link);
?>