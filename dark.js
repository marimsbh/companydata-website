const themeToggle = document.getElementById("themeToggle");
const toggleBtnIcon = document.querySelector(".toggle-btn i");

// Check the user's preference from localStorage or use default
const isDarkMode = localStorage.getItem("darkMode") === "enabled";

// Apply theme based on user preference
document.body.classList.toggle("dark-theme", isDarkMode);
themeToggle.checked = isDarkMode;

themeToggle.addEventListener("change", function () {
    const isDarkMode = themeToggle.checked;

    // Toggle between dark and light themes
    document.body.classList.toggle("dark-theme", isDarkMode);

    // Save user preference to localStorage
    localStorage.setItem("darkMode", isDarkMode ? "enabled" : "disabled");
});
