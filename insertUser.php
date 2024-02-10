<?php
//This is the function name
function createUser(){
    
    $created = false;
    $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
    $sql = 'INSERT INTO employee(EmployeeNumber, FirstName, MiddleName, LastName, Roles, Email, Phone_Num, Hire_Date, JobName, DepartmentName) VALUES (:uID, :EMP_FNAME, :EMP_MNAME, :EMP_LNAME, :ROLES, :EMAIL, :PHONE_NUM, :HIRE_DATE, :JOB_ID, :DEPARTMENT_ID)';
    $stmt = $db->prepare($sql);

    //give the values for the parameters
    $stmt->bindParam(':EMP_NUM', $_POST['EMP_NUM'], SQLITE3_TEXT);
    $stmt->bindParam(':EMP_FNAME', $_POST['EMP_FNAME'], SQLITE3_TEXT);
    $stmt->bindParam(':EMP_MNAME', $_POST['EMP_MNAME'], SQLITE3_TEXT);
    $stmt->bindParam(':EMP_LNAME', $_POST['EMP_LNAME'], SQLITE3_TEXT);
    $stmt->bindParam(':ROLES', $_POST['ROLES'], SQLITE3_TEXT);
    $stmt->bindParam(':EMAIL', $_POST['EMAIL'], SQLITE3_TEXT);
    $stmt->bindParam(':PHONE_NUM', $_POST['PHONE_NUM'], SQLITE3_TEXT);
    $stmt->bindParam(':HIRE_DATE', $_POST['HIRE_DATE'], SQLITE3_TEXT);

    //execute the sql statement
    $stmt->execute();

    //the logic
    if($stmt){
        $created = true;
    }

    return $created;
}
?>
