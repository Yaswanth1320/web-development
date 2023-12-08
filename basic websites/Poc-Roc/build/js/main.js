
const initApp = () =>{
    const btn = document.getElementById("hamburger-button")
    const menu = document.getElementById("mobile-menu")

    const toggleMenu = () =>{
        console.log("clicked")
        menu.classList.toggle('hidden')
        menu.classList.toggle('flex')
    }

    btn.addEventListener('click', toggleMenu)
    menu.addEventListener('click', toggleMenu)
}

document.getElementById('DOMContentLoaded', initApp)