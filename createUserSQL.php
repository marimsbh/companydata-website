<?php

function createUser()
{
    $created = false;
    $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');

    // Get the selected JOB_ID from the form
    $selectedJobID = $_POST['JOB_ID'];

    // Define a mapping array for JOB_ID to DEPARTMENT_ID
    $jobDepartmentMapping = [
        1 => 2,
        2 => 5,
        3 => 1,
        4 => 3,
        5 => 6,
        7 => 5,
        8 => 4,
    ];

    // determine the DEPARTMENT_ID based on selected JOB_ID
    $departmentID = isset($jobDepartmentMapping[$selectedJobID]) ? $jobDepartmentMapping[$selectedJobID] : null;

    // prepare SQL statemnt for inserting data in employees table
    $sql = 'INSERT INTO employees(EMP_NUM, EMP_FNAME, EMP_MNAME, EMP_LNAME, ROLES, EMAIL, PHONE_NUM, HIRE_DATE, JOB_ID, DEPARTMENT_ID) VALUES (:EMP_NUM, :EMP_FNAME, :EMP_MNAME, :EMP_LNAME, :ROLES, :EMAIL, :PHONE_NUM, :HIRE_DATE, :JOB_ID, :DEPARTMENT_ID)';

    // bind parameters to SQL statement
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':EMP_NUM', $_POST['EMP_NUM'], SQLITE3_TEXT);
    $stmt->bindParam(':EMP_FNAME', $_POST['EMP_FNAME'], SQLITE3_TEXT);
    $stmt->bindParam(':EMP_MNAME', $_POST['EMP_MNAME'], SQLITE3_TEXT);
    $stmt->bindParam(':EMP_LNAME', $_POST['EMP_LNAME'], SQLITE3_TEXT);
    $stmt->bindParam(':ROLES', $_POST['ROLES'], SQLITE3_TEXT);
    $stmt->bindParam(':EMAIL', $_POST['EMAIL'], SQLITE3_TEXT);
    $stmt->bindParam(':PHONE_NUM', $_POST['PHONE_NUM'], SQLITE3_TEXT);
    $stmt->bindParam(':HIRE_DATE', $_POST['HIRE_DATE'], SQLITE3_TEXT);
    $stmt->bindParam(':JOB_ID', $_POST['JOB_ID'], SQLITE3_TEXT);
    $stmt->bindParam(':DEPARTMENT_ID', $departmentID, SQLITE3_TEXT);

    // execute the sql statement
    $result = $stmt->execute();

    // check if execution was succesful
    if ($result) {
        $created = true;
    }

    // return status of user creation
    return $created;
}
