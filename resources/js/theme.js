function lightsOff() {
    document.documentElement.classList.remove("dark"); // Remove dark mode class
    localStorage.theme = "light"; // Explicitly set theme to light
}


function lightsOn() {
    if (localStorage.theme === "dark") {
        document.documentElement.classList.remove("dark"); // Remove dark mode
        localStorage.theme = "light"; // Save preference
    } else {
        document.documentElement.classList.add("dark"); // Apply dark mode
        localStorage.theme = "dark"; // Save preference
    }
}

export{lightsOff, lightsOn};