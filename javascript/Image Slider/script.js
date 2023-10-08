(function(){
    const pictures = [
        "1",
        "2",
        "3",
        "4"
    ];

    const buttons = document.querySelectorAll(".btn");
    const imgContainer = document.querySelector(".img-container");
    let counter = 0;

    buttons.forEach(function (button){
        button.addEventListener("click", function(e){
            if(button.classList.contains('btn-left')){
                counter--;
                if(counter < 0){
                    counter = pictures.length - 1;
                }
                image.src = `images/${pictures[counter]}.jpg`;
            }

            if(button.classList.contains('btn-right')){
                counter++;
                if(counter > pictures.length - 1){
                    counter = 0;
                }
                image.src = `images/${pictures[counter]}.jpg`;
            }
        })
    })

})();