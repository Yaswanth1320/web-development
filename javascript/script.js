const apiKey = "zwTrPVObICzZk2HzPTA0s9rTwU7vpTX-WzEZ_WgtGYo";

const form = document.querySelector("form");
const inputValue = document.getElementById("search");
const search = document.querySelector(".search-btn");
const more = document.getElementById("more-btn");

let input = "";
let page = 1 ;

async function serachImages(){
    input = inputValue.value;
    const url = `https://api.unsplash.com/search/photos?;
    page=${page}&query=${input}&client_id=${apiKey}`;

    const response = await fetch(url);
    const data = await response.json();

    const results = data.results;

    if (page === 1){
        search.innerHTML = "";

    }
    results.map((result) =>{
        const imageWrapper = document.createElement('div');
        imageWrapper.classList.add("results");
        const image = document.createElement('img');
        image.src = result.urls.small;
        image.alt = result.alt_description;
        const link = document.createElement('a');
        link.href = result.link.html;
        link.target = "_blank";
        link.textContent = result.alt_description;

        imageWrapper.appendChild(image);
        imageWrapper.appendChild(link);
        imageWrapper.appendChild(imageWrapper);
    });

    page++;
    if (page > 1){
        more.style.display = "block";
        
    }
}