
let scrollContainer = document.querySelector(".container");
let backbtn = document.getElementById("backBtn");
let nextbtn = document.getElementById("nextBtn");

scrollContainer.addEventListener('wheel', (evt)=>{
    evt.preventDefault();
    scrollContainer.scrollLeft += evt.deltaY;
});

nextbtn.addEventListener('click', ()=>{
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft += 900;
});

backbtn.addEventListener('click', ()=>{
    scrollContainer.style.scrollBehavior = "smooth";
    scrollContainer.scrollLeft -= 900;
});