const switcheridou = document.getElementById("darkswitch");

let darkmode = false;

document.body.style.backgroundColor = (darkmode) ? "black" : "white";
for (let i = 0; i < document.body.children.length; i++) {
    document.body.children[i].style.color = (darkmode) ? "white" : "black";
}

function hehe() {
    darkmode = !darkmode;
    if (darkmode) {
        switcheridou.textContent = "sunny";
        document.body.style.backgroundColor = "#141316";
        for (let i = 0; i < document.body.children.length; i++){
            document.body.children[i].style.color = "white";
        }
    }
    else {
        switcheridou.textContent = "nightlight";
        document.body.style.backgroundColor = "white";
        for (let i = 0; i < document.body.children.length; i++) {
            document.body.children[i].style.color = "black";
        }
    }
}