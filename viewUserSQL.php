<?php

include_once 'viewUser.php';

function getUsers() {
    $db = getDatabaseConnection();

    //SQL query to get employee data from db with joins
    $sql = "
        SELECT
            EMPLOYEES.EMP_NUM,
            EMPLOYEES.EMP_FNAME,
            EMPLOYEES.EMP_MNAME,
            EMPLOYEES.EMP_LNAME,
            EMPLOYEES.ROLES,
            EMPLOYEES.EMAIL,
            EMPLOYEES.PHONE_NUM,
            EMPLOYEES.HIRE_DATE,
            JOBS.JOB_CLASS,
            JOBS.CHG_HOUR,
            DEPARTMENTS.DEPT_NAME
        FROM
            EMPLOYEES
        JOIN
            JOBS ON EMPLOYEES.JOB_ID = JOBS.JOB_ID
        JOIN
            DEPARTMENTS ON EMPLOYEES.DEPARTMENT_ID = DEPARTMENTS.DEPARTMENT_ID
    ";

    $stmt = $db->prepare($sql);

    //check if statment is prepared succesfully
    if ($stmt) {
        $result = $stmt->execute();

        $arrayResult = [];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $arrayResult[] = $row;
        }

        //return array contaning employee data
        return $arrayResult;
    } else {
        die($db->lastErrorMsg());
    }
}

//call function and store result in userData
$userData = getUsers();


foreach ($userData as $user) {
}
