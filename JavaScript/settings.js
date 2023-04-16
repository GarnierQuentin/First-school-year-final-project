const dark_theme = document.querySelector('#dark_theme')
const white_theme = document.querySelector('#white_theme')

const boutons = document.querySelectorAll(".bouton")
const connection = document.querySelector(".connection")

const mobile_navbar = document.getElementById("mobile_navbar")

if(!localStorage.getItem("actual_theme")){
    let theme = localStorage.setItem("actual_theme", "black")
}
else{
    theme = localStorage.getItem("actual_theme")
}


const settings = document.querySelector('#settings')

if(typeof theme != "undefined"){
    if(theme === "white"){
        settings.style.backgroundColor = "whitesmoke"
        boutons.forEach(element => {
            element.style.backgroundColor = "grey"
        });
        connection.style.backgroundColor = "grey"
    }
}

white_theme.addEventListener('click', () => {
    settings.style.backgroundColor = "whitesmoke"
    settings.style.transition = "all 1s"
    localStorage.setItem("actual_theme", "white")
    boutons.forEach(element => {
        element.style.backgroundColor = "grey"
    });
    connection.style.backgroundColor = "grey"
    mobile_navbar.style.backgroundColor ="grey"
})

dark_theme.addEventListener('click', () => {
    settings.style.backgroundColor = "grey"
    localStorage.setItem("actual_theme", "black")
    boutons.forEach(element => {
        element.style.backgroundColor = "whitesmoke"
    });
    connection.style.backgroundColor = "whitesmoke"
    mobile_navbar.style.backgroundColor ="whitesmoke"
})





//RESPONSIVE PART (MOBILE)


const mobile_burger = document.getElementById("burger_menu")

const menu = document.getElementById("menu")
const tag_page = document.getElementById("tags")

mobile_tag_menu.style.visibility = "hidden"
mobile_post.style.visibility = "hidden"

mobile_burger.addEventListener("click", () => {
    menu.classList.toggle("menu-active")
    menu.classList.toggle("menu")
    if(menu.className === "menu-active"){
        document.body.style.overflow = "hidden"
    }
    else{
        document.body.style.overflow = "unset"
}
})