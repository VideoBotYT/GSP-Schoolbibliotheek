const darswitch = document.getElementById("darkswitch");

if (localStorage.getItem("darkmode") == null) {
    localStorage.setItem("darkmode", false);
}

applyDark(localStorage.getItem("darkmode") === "true");

function applyDark(dark){
    document.body.classList.remove((!dark) ? "dark" : "light");
    document.body.classList.add((dark) ? "dark" : "light");
    darswitch.textContent = (dark) ? "sunny" : "nightlight";
}

function darkmode() {
    let darktoggle = (localStorage.getItem("darkmode") === "false");
    localStorage.setItem("darkmode", darktoggle.toString());

    applyDark(darktoggle);
}