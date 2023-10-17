
let imgBox = document.getElementById("qrBox");
let imgImage = document.getElementById("qrImg");
let qrText = document.getElementById("inputValue");

function generateQR(){
    imgImage.src ="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data="+qrText.value;
    imgBox.classList.add("show-img");
}

