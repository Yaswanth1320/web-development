

var imgBox = document.querySelector(".img-container");
var original = document.querySelector(".original");
var orgImg = document.getElementById('orgImg');
var arrow = document.getElementById('arrow');

orgImg.style.width = imgBox.offsetWidth + 'px';
var leftSpace = imgBox.offsetLeft;

imgBox.onmousemove = function(e){
    var boxWidth = (e.pageX - leftSpace) + 'px';
    original.style.width = boxWidth;
    arrow.style.left = boxWidth;

}