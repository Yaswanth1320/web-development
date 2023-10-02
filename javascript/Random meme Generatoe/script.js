const generateMemeBtn = document.querySelector(".meme-container .generate-meme-btn");

  const memeImage = document.querySelector(".meme-container img");
  const memeTitle = document.querySelector(".meme-container .title");
  const memeAuthor = document.querySelector(".meme-container .about-author");
  
  const updateDetails = (url, title, author) => {
    memeImage.setAttribute("src", url);
    memeTitle.innerHTML = title;
    memeAuthor.innerHTML = `Meme by: ${author}`;
  };
  
  const generateMeme = () => {
    fetch("https://meme-api.com/gimme").then((response) => response.json()).then((data) => {
        updateDetails(data.url, data.title, data.author);
      });
  };
  
  generateMemeBtn.addEventListener("click", generateMeme);
  
  generateMeme();


//   "https://meme-api.com/gimme/2" to get two memes
//    "https://meme-api.com/gimme/wholesomememes" to get a sepecific genere meme