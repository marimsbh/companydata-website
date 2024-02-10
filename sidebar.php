<!doctype  html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
    <link rel="stylesheet" href="/DBWCoursework_3012813/web_application/css/third.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
</head>
<body>
    <nav>
        <!--logo and menu button-->
        <div class="logo header-logo">
            <i class="fa-solid fa-bars menu-btn"></i>
            <span class="logo-name">Task managment</span>
        </div>


        <!--sidebar-->
        <div class="sidebar">
            <div class="logo">
                <i class="fa-solid fa-bars menu-btn"></i>
                <span class = "logo-name">Enigma Inc</span>
            </div>

            <div class = "sidebar-content">
                <ul>
                    <li>
                        <a href = "/DBWCoursework_3012813/web_application/php/dashboard.php" class="active">
                            <span class = "link">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href = "/DBWCoursework_3012813/web_application/php/viewUser.php">
                            <span class = "link">All Tasks</span>
                        </a>
                    </li>
                    <li>
                        <a href = "/DBWCoursework_3012813/web_application/php/viewAssignments.php">
                            <span class = "link">Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href = "/DBWCoursework_3012813/web_application/php/viewProjects.php">
                            <span class = "link">Calender</span>
                        </a>
                    </li>
                    <li>
                        <a href = "/DBWCoursework_3012813/web_application/php/viewDepartments.php">
                            <span class = "link">Departments</span>
                        </a>
                    </li>
                    <li>
                        <a href = "#">
                            <span class = "link">Folder</span>
                        </a>
                    </li>
                    <li>
                        <a href = "#">
                            <span class = "link">Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class= "overlay"></section>

    <!--java for handling menu toggle-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navBar = document.querySelector("nav"),
                menuBTN = document.querySelector(".header-logo .menu-btn"), // Adjusted selector
                overlay = document.querySelector(".overlay");

            menuBTN.addEventListener("click", () => {
                navBar.classList.toggle("display");
            });

            overlay.addEventListener("click", () => {
                navBar.classList.remove("display");
            });
        });
    </script>
    


</body>
</html>



