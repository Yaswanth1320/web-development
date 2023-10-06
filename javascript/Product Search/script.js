
const search = () =>{
    const searchInput = document.getElementById("search-input").value.toUpperCase();
    const itemsList = document.getElementById("product-list");
    const product = document.querySelectorAll(".product");
    const pname = itemsList.getElementsByTagName("h3");

    for(var i=0; i <pname.length; i++){
        let match = product[i].getElementsByTagName('h3')[0];
        
        if(match){
            let textValue = match.textContent || match.innerHTML;

            if(textValue.toUpperCase().indexOf(searchInput) > -1){
                product[i].style.display= "";
            }else{
                product[i].style.display= "none";
            }
        }
    }
}