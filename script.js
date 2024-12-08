// Fetch states based on country selection
function fetchStates(countryId) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_states.php?country_id=" + countryId, true);
    xhr.onload = function () {
        document.getElementById("state").innerHTML = this.responseText;
    };
    xhr.send();
}

// Optional: Adding a subtle animation effect on button hover
document.addEventListener("DOMContentLoaded", () => {
    const signUpButton = document.querySelector("button");

    // Add scale effect on hover
    signUpButton.addEventListener("mouseover", () => {
        signUpButton.style.transform = "scale(1.05)";
    });

    signUpButton.addEventListener("mouseout", () => {
        signUpButton.style.transform = "scale(1)";
    });
});
