<?php
include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/DBWCoursework_3012813/web_application/css/styles.css">
</head>

<body>

    <div class="toggle-switch">
        <label class="switch-label">
            <input type="checkbox" class="checkbox" id="themeToggle">
            <span class="slider"></span>
        </label>
    </div>
    <!--welcome section with heading and introduction --> 
    <main>
        <section class="welcomeAndIntro">
            <div class="center-content">
                <h2>Hello &amp;<br>Welcome.</h2>
                <p>
                    Enigma Inc. A company that puts value into 
                    every task, no matter how big or small.
                </p>
            </div>
            <button>
                <a href="dashboard.php" class="get_access-button">Get access</a>
           </button>
        </section>
    </main> 

    

     <!--about section with more info --> 
    <section class="about-section">
        <div class="main">
            <div class="about-info">
                <h2>About Us</h2>
                <p>
                    Welcome to Enigma Inc., a leading company in creative solutions.
                    With our hand picked team, we are available 24/7 as a supporting
                    hand for our customers, constantly striving to better our support. 
                    Join us and start benfiting from the many services we can bring to you.
                </p>
            </div>
            <div class="about-image">
                <img src="/DBWCoursework_3012813/web_application/data/about-image.png" alt="About Us Image">
            </div>
        </div>
    </section>
    
    <!--java link for theme switching --> 
    <script src="/DBWCoursework_3012813/web_application/html/dark.js"></script>

    <!-- incline java for dropwdown menu --> 
    <script>
        const toggleBtn = document.querySelector(".toggle-btn");
        const toggleBtnIcon = document.querySelector(".toggle-btn i");
        const dropDownMenu = document.querySelector(".dropDownMenu");
        // toggle dropdwon menu visibility on button click
        toggleBtn.onclick = function () {
            dropDownMenu.classList.toggle("display");

            const isDisplay = dropDownMenu.classList.contains("display");
            toggleBtnIcon.classList = isDisplay ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
        }
    </script>

    <!--footer with copyright info --> 
    <footer>
        <p>&copy; 2024 Enigma Inc | <a href="/privacy-policy">Privacy Policy</a></p>
    </footer>


    

</body>
</html>
