<?php
header('Content-Type: text/plain');
$con = pg_connect("dbname=".getenv("POSTGRESQL_DATABASE")." "."user=".getenv("POSTGRESQL_USER")." "."password=".getenv("POSTGRESQL_PASSWORD")." "."host=".getenv("DATABASE_SERVICE_HOST")." "."port=".getenv("DATABASE_SERVICE_PORT")) or die('Could not connect to the database: ' + pg_last_error());
$result = pg_query($con, "CREATE TABLE factory(id INTEGER NOT NULL, data TEXT, PRIMARY KEY(id));");
if($result === false) {
}
else {
    pg_query($con, "COMMIT;");
}
$result=pg_query("SELECT COUNT(*) FROM factory;");
$row = pg_fetch_array($result);
if($row[0] == "0") {
    pg_query($con, "INSERT INTO factory VALUES(1, '1');");
}
if(empty($_GET["version"])) {
    $result=pg_query("SELECT * FROM factory;");
    $row = pg_fetch_array($result);
    echo "version ".$row[1];
}
else {
    $result=pg_query("UPDATE factory SET data=".$_GET["version"]." WHERE id=1;");
    echo "The postgresql factory is modified";
}
pg_close($con);
?>

