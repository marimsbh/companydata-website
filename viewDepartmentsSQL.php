<?php

// Include the file containing the getDatabaseConnection function
include_once 'viewDepartments.php';

//function to get department data from db
function getDepartments() {
    // Use the existing getDatabaseConnection function
    $db = getDatabaseConnection();

    //SQL query to get department data from db with joins
    $sql = "
        SELECT 
            DEPARTMENTS.DEPARTMENT_ID,
            DEPARTMENTS.DEPT_NAME,
            DEPARTMENTS.LOCATION_ID,
            LOCATIONS.STREET_NUM || ' ' || LOCATIONS.STREET_ADDRESS || ' ' || LOCATIONS.CITY AS LOCATION,
            COUNTRIES.COUNTRY_NAME,
            REGIONS.REGION_NAME
        FROM 
            DEPARTMENTS
        INNER JOIN 
            LOCATIONS ON DEPARTMENTS.LOCATION_ID = LOCATIONS.LOCATION_ID
        INNER JOIN 
            COUNTRIES ON LOCATIONS.COUNTRY_ID = COUNTRIES.COUNTRY_ID
        INNER JOIN 
            REGIONS ON COUNTRIES.REGION_ID = REGIONS.REGION_ID;

    ";

    $stmt = $db->prepare($sql);

    //check if statement prepared succesfully
    if ($stmt) {
        $result = $stmt->execute();

        $arrayResult = [];

        // Fetch associative array (column names as keys)
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $arrayResult[] = $row;
        }

        //return array contaning department data
        return $arrayResult;
    } else {
        die($db->lastErrorMsg());
    }
}

//call function and store result in departmentData
$departmentData = getDepartments();

// loop through retrieved department data
foreach ($departmentData as $department) {
}

