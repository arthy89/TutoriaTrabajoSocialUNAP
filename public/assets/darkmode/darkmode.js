// Función para aplicar el modo oscuro
function applyDarkMode() {
    $("body").addClass("dark-mode");
    $("#mainNavbar").removeClass("navbar-light").addClass("navbar-dark");
}

// Función para quitar el modo oscuro
function removeDarkMode() {
    $("body").removeClass("dark-mode");
    $("#mainNavbar").removeClass("navbar-dark").addClass("navbar-light");
}

$(document).ready(function () {
    const darkModeSwitch = $("#darkModeSwitch");

    // Verificar si hay una preferencia almacenada en localStorage
    const storedDarkMode = localStorage.getItem("darkMode");
    if (storedDarkMode === "enabled") {
        applyDarkMode();
        darkModeSwitch.prop("checked", true);
    } else {
        removeDarkMode();
        darkModeSwitch.prop("checked", false);
    }

    darkModeSwitch.change(function () {
        if ($(this).is(":checked")) {
            // Habilitar modo oscuro
            localStorage.setItem("darkMode", "enabled");
            applyDarkMode();
        } else {
            // Deshabilitar modo oscuro
            localStorage.setItem("darkMode", "disabled");
            removeDarkMode();
        }
    });
});

// Escuchar cambios en la preferencia de color del sistema
window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (e) => {
        if (e.matches) {
            // Sistema en modo oscuro
            applyDarkMode();
            localStorage.setItem("darkMode", "enabled");
        } else {
            // Sistema en modo claro
            removeDarkMode();
            localStorage.setItem("darkMode", "disabled");
        }
    });
