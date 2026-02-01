const textarea = document.getElementById("content");
const counter = document.getElementById("charCount");

textarea.addEventListener("input", function () {
    counter.textContent = textarea.value.length;
});
