let toastBox = document.getElementById("toastContainer");
let successMsg = '<i class="fa-solid fa-circle-check"></i> Successfully submitted';
let errorMsg = '<i class="fa-solid fa-circle-xmark"></i> Error ocuured fix the error!';
let invaildMsg = '<i class="fa-solid fa-circle-exclamation"></i> Invalid syntax';


function showToast(msg){
    let toast = document.createElement('div');
    toast.classList.add('toast');
    toast.innerHTML = msg;
    toastBox.appendChild(toast);

    if(msg.includes('error')){
        toast.classList.add('error');
    }
    if(msg.includes('Invalid')){
        toast.classList.add('invalid');
    }
    
    setTimeout(()=>{
        toast.remove();
    },5000);
}