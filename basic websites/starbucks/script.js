// let navbar = document.querySelector(".navbar");

// document.querySelector("#menu-btn").onclick = () =>{
//     navbar.classList.toggle('active');
// }
 

const burgerMenu = document.getElementById("menu-btn");

let navbar = document.querySelector(".navbar");

burgerMenu.addEventListener("click", () => {
  navbar.classList.toggle("active");
  console.log("working");
});