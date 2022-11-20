function toggleFormElements(bDisabled) { 
    let inputs = document.getElementsByTagName("input"); 
    for (let i = 1; i < inputs.length; i++) { 
        inputs[i].disabled = bDisabled;
    } 
    let selects = document.getElementsByTagName("select");
    for (let i = 0; i < selects.length; i++) {
        selects[i].disabled = bDisabled;
    }
    let textareas = document.getElementsByTagName("textarea"); 
    for (let i = 1; i < textareas.length; i++) { 
        textareas[i].disabled = bDisabled;
    }
    let buttons = document.getElementsByTagName("button");
    for (let i =2; i < buttons.length; i++) {
        buttons[i].disabled = bDisabled;
    }

    letdisableformlink = document.getElementById("enableedit");
    letdisableformlink.style.display = bDisabled ? "block" : "none";
    submiteditsbutton = document.getElementById("submitedits");
    submiteditsbutton.style.display = !bDisabled ? "block" : "none";
    canceleditslink = document.getElementById("canceledits");
    canceleditslink.style.display = !bDisabled ? "block" : "none";

}