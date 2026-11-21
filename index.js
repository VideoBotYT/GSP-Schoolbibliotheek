const darswitch = document.getElementById("darkswitch");

if (localStorage.getItem("darkmode") == null) {
    localStorage.setItem("darkmode", false.toString());
}
let darktoggle = (localStorage.getItem("darkmode") !== "false");
for (let i = 0; i < document.body.children.length; i++) {
    darswitch.textContent = (darktoggle) ? "sunny" : "nightlight";
    document.body.children[i].classList.add((darktoggle) ? "dark" : "light");
}

function darkmode() {
    darktoggle = (localStorage.getItem("darkmode") === "false");
    localStorage.setItem("darkmode", darktoggle.toString());

    darswitch.textContent = (darktoggle) ? "sunny" : "nightlight";
    document.body.classList.remove((darktoggle) ? "light" : "dark");
    document.body.classList.add((darktoggle) ? "dark" : "light");
    for (let i = 0; i < document.body.children.length; i++) {
        document.body.children[i].classList.remove((darktoggle) ? "light" : "dark");
        document.body.children[i].classList.add((darktoggle) ? "dark" : "light");
    }

    darswitch.classList.remove((darktoggle) ? "light" : "dark");
    darswitch.classList.add((darktoggle) ? "dark" : "light");
}