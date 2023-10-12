
const passwordBox = document.getElementById("password");
const length = 20;

const upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
const lowerCase = "abcdefghijklmnopqrstuvwxyz";
const number = "0123456789";
const special = "@#$%^&*()_+~|}{[]></-=";

const allChar = upperCase + lowerCase + number + special;

function generatePassword(){
    let password = "";
    password += upperCase[Math.floor(Math.random() * upperCase.length)];
    password += lowerCase[Math.floor(Math.random() * lowerCase.length)];
    password += number[Math.floor(Math.random() * number.length)];
    password += special[Math.floor(Math.random() * special.length)];

    while(length > password.length){
        password += allChar[Math.floor(Math.random() * allChar.length)];
    }
    passwordBox.value = password;
}

function copyPassword(){
    passwordBox.select();
    document.execCommand("copy");
}