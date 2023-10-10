const inputValue = document.getElementById("input-box");
const listCont = document.getElementById("list-result");

function addTask(){
    if(inputValue.value == ''){
        alert("Input field can't be empty");
    }
    else{
        let liElement = document.createElement('li');
        liElement.innerHTML = inputValue.value;
        listCont.appendChild(liElement);
        let span = document.createElement("span");
        span.innerHTML = "\u00d7";
        liElement.appendChild(span);
    }
    inputValue.value = "";
    saveData();
}

listCont.addEventListener("click", function(e){
    if(e.target.tagName === "LI"){
        e.target.classList.toggle("checked");
        saveData();
    }
    else if(e.target.tagName === "SPAN"){
        e.target.parentElement.remove();
        saveData();
    }
    {

    }
},false);


function saveData(){
    localStorage.setItem("data", listCont.innerHTML);
}

function load(){
    listCont.innerHTML = localStorage.getItem("data");
}

load();