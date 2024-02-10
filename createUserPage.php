<?php
// Include the file containing SQL functions for user creation
include_once 'createUserSQL.php';

// Include insertUser.php only if it hasn't been included before
if (!function_exists('createUser')) {
    include_once 'insertUser.php';
}

// Initalise error variables for form validation
$errorEMP_NUM = $errorEMP_FNAME = $errorEMP_LNAME = $errorROLES = $errorEMAIL = $errorPHONE_NUM = $errorHIRE_DATE = $errorJOB_ID  = "";

// Variable to check if all fields are filled
$allFields = "yes";

// Check if form has been submitted
if (isset($_POST['submit'])) {
    // Validate each form field
    if ($_POST['EMP_NUM'] == "") {
        $errorEMP_NUM = "Employee number is mandatory";
        $allFields = "no";
    }

    if ($_POST['EMP_FNAME'] == "") {
        $errorEMP_FNAME = "First name is mandatory";
        $allFields = "no";
    }

    if ($_POST['EMP_LNAME'] == "") {
        $errorEMP_LNAME = "Last name is mandatory";
        $allFields = "no";
    }



    if ($_POST['ROLES']==""){
            $errorROLES = "Role is mandatory";
            $allFields = "no";

    }

    if ($_POST['EMAIL']==""){
            $errorEMAIL = "Email is mandatory";
            $allFields = "no";

    }

    if ($_POST['HIRE_DATE']==""){
        $errorHIRE_DATE = "Hire date is mandatory";
        $allFields = "no";

    }

    if ($_POST['JOB_ID']==""){
        $errorJOB_ID = "Job name is mandatory";
        $allFields = "no";

    }



    //if all fields are filled call createUser function and redirect to userCreationSummary
    if($allFields == "yes")
    {
            $createUser = createUser();
            header('Location: userCreationSummary.php?createUser='.$createUser);

    }

}


// Initialize variables to avoid undefined variable warnings
$errorEMP_NUM = isset($errorEMP_NUM) ? $errorEMP_NUM : '';
$errorEMP_FNAME = isset($errorEMP_FNAME) ? $errorEMP_FNAME : '';
$errorEMP_LNAME = isset($errorEMP_LNAME) ? $errorEMP_LNAME : '';
$errorROLES = isset($errorROLES) ? $errorROLES : '';
$errorEMAIL = isset($errorEMAIL) ? $errorEMAIL : '';
$errorPHONE_NUM = isset($errorPHONE_NUM) ? $errorPHONE_NUM : '';
$errorHIRE_DATE = isset($errorHIRE_DATE) ? $errorHIRE_DATE : '';
$errorJOB_ID = isset($errorJOB_ID) ? $errorJOB_ID : '';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Creation Form</title>
    <link rel="stylesheet" href="/DBWCoursework_3012813/web_application/css/styles.css">
</head>

<div class="container pb-5">

    <main role="main" class="pb-3">

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="post">

                    <div class="form-group">
                        <label for = "EMP_NUM" class="control-label labelFont">Employee Number</label>
                        <input id = "EMP_NUM" class="form-control" type="text" name="EMP_NUM">
                        <span class="text-danger"><?php echo $errorEMP_NUM; ?></span>
                    </div>

                    <div class="form-group">
                        <label for = "EMP_FNAME" class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name="EMP_FNAME">
                        <span class="text-danger"><?php echo $errorEMP_FNAME; ?></span>
                    </div>

                    <div class="form-group">
                        <label for = "EMP_MNAME" class="control-label labelFont">Middle Name</label>
                        <input class="form-control" type="text" name="EMP_MNAME">
                    </div>

                    <div class="form-group">
                        <label for = "EMP_LNAME" class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name="EMP_LNAME">
                        <span class="text-danger"><?php echo $errorEMP_LNAME; ?></span>
                    </div>


                    <div class="form-group">
                        <label for = "ROLES" class="control-label labelFont">Roles</label>
                        <select name="ROLES" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                        <span class="text-danger"><?php echo $errorROLES; ?></span>
                    </div>


                    <div class="form-group">
                        <label for = "EMAIL" class="control-label labelFont">Email</label>
                        <input class="form-control" type="text" name="EMAIL">
                        <span class="text-danger"><?php echo $errorEMAIL; ?></span>
                    </div>

                    <div class="form-group">
                        <label for = "PHONE_NUM" class="control-label labelFont">Phone Number</label>
                        <input class="form-control" type="text" name="PHONE_NUM">
                        <span class="text-danger"><?php echo $errorPHONE_NUM; ?></span>
                    </div>

                    <div class="form-group">
                        <label for = "HIRE_DATE" class="control-label labelFont">Hire Date</label>
                        <input class="form-control" type="text" name="HIRE_DATE">
                        <span class="text-danger"><?php echo $errorHIRE_DATE; ?></span>
                    </div>

                    <div class="form-group">
                        <label class="control-label labelFont">Job Name</label>
                        <select name="JOB_ID" class="form-control">
                            <option value="1">Database Designer</option>
                            <option value="2">Systems Analyst</option>
                            <option value="3">Elect. Engineer</option>
                            <option value="4">Programmer</option>
                            <option value="5">Clerical Support</option>
                            <option value="6">General Support</option>
                            <option value="7">DSS Analyst</option>
                            <option value="8">Applications Designer</option>
                        </select>
                        <span class="text-danger"><?php echo $errorJOB_ID; ?></span>
                    </div>


                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Create User" name="submit">
                    </div>

                </form>
            </div>
        </div>

    </main>
</div>
