(function(){
    const pictures = [
        '1',
        '2',
        '3',
        '4',
        '5',
        '6'
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
                imgContainer.style.background = `url('img/${pictures[counter]}.jpg')`;
            }

            if(button.classList.contains('btn-right')){
                counter++;
                if(counter > pictures.length - 1){
                    counter = 0;
                }
                imgContainer.style.background = `url('img/${pictures[counter]}.jpg')`;
            }
        })
    })

})();