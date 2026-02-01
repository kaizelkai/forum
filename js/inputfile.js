const input = document.getElementById("media");
const btn = document.getElementById("mediaBtn");
const fileName = document.getElementById("fileName");
const icon = document.getElementById("icon");

input.addEventListener("change", function () {
    if (input.files.length > 0) {
        icon.textContent = "✓";
        fileName.classList.add("active");
        btn.classList.remove("btn-secondary");
        btn.classList.add("btn-success");
        fileName.textContent = input.files[0].name;
    } else {
        icon.textContent = "+";
        fileName.classList.remove("active");
        btn.classList.remove("btn-success");
        btn.classList.add("btn-secondary");
        fileName.textContent = "Aucun fichier";
    }
});
