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
$cat = pg_escape_string($link,$_REQUEST['cat']);
$date =  pg_escape_string($link,$_REQUEST['date']);
$price =  pg_escape_string($link,$_REQUEST['price']);
$description = pg_escape_string($link,$_REQUEST['description']);

<form method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Example label</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Another label</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>
</form>
echo "<br>";
echo "Product ID: " ;
echo $id."<br>";
echo "Product Name: " ;
echo $name."<br>";
echo "Category: " ;
echo $cat."<br>";
echo "Date: " ;
echo $date."<br>";
echo "Price: " ;
echo $price."USD <br>";
echo "Description: " ;
echo $description."<br>";

// Attempt insert query execution

/*echo $sql;

$sql2 = "INSERT INTO Product (Id, Product_Name, Catergory, Date, Price, Descriptions) VALUES ('02', 'Me', 'CatX','2019-12-20',11,'abc')";

$sql3 = 'INSERT INTO public."Product" (
"Date", "Id", "Product_Name", "Catergory", "Descriptions", "Price") VALUES ('."
'2019-12-20'::date, '121210'::character varying(20), 'my product XYZ'::character varying(100), 'kit'::character varying(40), 'my product xyz'::character varying(200), '12'::integer)".
 'returning "Id"';
echo $sql3;*/
$sql4 = 'INSERT INTO public."Product" (
"Date", "Id", "Product_Name", "Catergory", "Descriptions", "Price") VALUES ('."
'$date'::date, '$id'::character varying(20), '$name'::character varying(100), '$cat'::character varying(40), '$description'::character varying(200), '$price'::integer)".
 'returning "Id"';

$result = pg_query($link, $sql4);
echo $result;

if($result){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . pg_error($link);
}

// Close connection

pg_close($link);
?>
