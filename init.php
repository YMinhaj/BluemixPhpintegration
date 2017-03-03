<!--
/**
* Copyright 2015 IBM Corp. All Rights Reserved.
*
* Licensed under the Apache License, Version 2.0 (the “License”);
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* https://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an “AS IS” BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/
-->

<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP MySQL Sample Application</title>
    <link rel="stylesheet" href="style.css" />
</head>

<?php

$sqlTable="DROP TABLE IF EXISTS table_check";
if ($mysqli->query($sqlTable)) {
    echo "Table dropped successfully! <br>";
} else {
	//echo "Cannot drop table. "  . mysqli_error();
}


echo "Executing CREATE TABLE Query...<br>";
$sqlTable="
CREATE TABLE table_check (
 id bigint(20) NOT NULL AUTO_INCREMENT,
 name varchar(64) NULL,
 age varchar(23) NULL,
 nationality varchar(64) NULL,
 TIME TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
 image varchar(300) NULL,
 PRIMARY KEY (id)
) DEFAULT CHARSET=utf8
";



if ($mysqli->query($sqlTable)) {
    echo "Table created successfully!<br>";
} else {
	echo "ERROR: Cannot create table. "  . mysqli_error();
	die();
}


?>


<button class = "mybutton" onclick="window.location = 'index.php';">Back</button>

</html>