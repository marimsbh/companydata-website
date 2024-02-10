<?php

$dbPath = 'C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db';
$db = new SQLite3($dbPath);

if ($db) {
    echo "Database is successfully connected";
} else {
    echo "Fail to connect to the database";
}

?>
