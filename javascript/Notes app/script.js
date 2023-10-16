
const noteContainer = document.querySelector(".container-note");
const createBtn = document.querySelector(".create-btn");
let notes = document.querySelectorAll(".container-note-input");


window.addEventListener("load", ()=>{
    noteContainer.innerHTML = localStorage.getItem("notes");
});

function updateStorage(){
    localStorage.setItem("notes", noteContainer.innerHTML);
}

document.addEventListener("keydown", event=>{
    if(event.key == "Enter"){
        document.execCommand("insertLineBreak");
        event.preventDefault();
    }
})

createBtn.addEventListener("click", ()=>{
    let inputbox = document.createElement("p");
    let img = document.createElement("img");
    inputbox.className = "container-note-input";
    inputbox.setAttribute("contenteditable","true");
    img.src ="delete.png";
    noteContainer.appendChild(inputbox).appendChild(img);
});

noteContainer.addEventListener("click", (e)=>{
    if(e.target.tagName === "IMG"){
        e.target.parentElement.remove();
        updateStorage();
    }else if(e.target.tagName === "P"){
         notes = document.querySelectorAll(".container-note-input");
         notes.forEach(nt =>{
            nt.onkeyup = function(){
                updateStorage();
            }
         });
    }
});