let theme = localStorage.getItem("actual_theme")

const clear_button = document.getElementById("clear")
const settings = document.getElementById("settings")
const main = document.getElementById("main")

const poubelle = document.querySelectorAll(".trash")
const menu_delet = document.querySelector("#delet")
const validation_button = document.getElementById("input_yes_form")

poubelle.forEach(element => { //poubelle étant la liste de toutes les images de suppression de post
    element.addEventListener('click', () => {
        console.log("l'id actuel de la poublle sélectionnée")
        console.log(element.id)
        validation_button.value = element.id
        menu_delet.style.display = "block"
        no.addEventListener("click", () => {
            menu_delet.style.display = "none"
        })
        yes.addEventListener("click", () => {
            menu_delet.style.display = "none"
        })
    })
})

const boutons = document.querySelectorAll(".bouton")
const connection = document.querySelector(".connection")

const yes = document.querySelector("#yes")
const no = document.querySelector("#no")

console.log(menu_delet)


const do_a_post = document.getElementById("do_a_post")
const publish = document.getElementById("publish")

do_a_post.addEventListener("click", () => {
    publish.style.display = "block"
})




let textarea = document.getElementById("content_text_input")
let text_post = textarea.value
console.log(text_post)
let actual_message = ""


if(!localStorage.getItem("message_started")){
    actual_message = localStorage.setItem("message_started", "")
}
else{
    actual_message = localStorage.getItem("message_started")
    textarea.innerHTML = actual_message
    console.log("Le texte enregistré : " + localStorage.getItem("message_started"))
}

textarea.addEventListener("input", () => {
    text_post = textarea.value
    console.log(text_post)
    actual_message = textarea.value
    localStorage.setItem("message_started",actual_message)
})




let tag = document.getElementById("liste_tags")
let value_tag = tag.value
let text_tag = tag.options[tag.selectedIndex].text
console.log(value_tag)

tag.addEventListener("input", () => {
    value_tag = tag.value
    text_tag = tag.options[tag.selectedIndex].text
    console.log(`Le tag actuel ${value_tag}`)
    console.log(`Son type : ${typeof text_tag}`)
})



const publish_button = document.getElementById("submit_button")
const cancel_button = document.getElementById("cancel_button")
const feed = document.getElementById("post_content")

cancel_button.addEventListener("click", () => {
    publish.style.display = "none"
})

publish_button.addEventListener("click", () => {

    if(text_tag === "Choisissez un tag"){
        for (let i = 0; i < 3; i++) {
            setTimeout(() => {
                tag.style.backgroundColor = "red"
            },500 * i)
            // 0 2 4
            
            setTimeout(() => {
                tag.style.backgroundColor = "black"
            },250 + 500 * i)
            // 1 3 5
          }
    }

    else if(text_post === ""){
        setInterval(() => {
            textarea.style.animation = "trembler 1s"
        })
        textarea.style.animation = "none"
    }

    else{
        publish.style.display = "none"
        localStorage.removeItem("message_started");
    }


})



console.log(theme)
if(theme === "white"){
    clear_button.style.backgroundColor = "whitesmoke"
    clear_button.style.color = "black"
    clear_button.style.border = "3px solid black"
    publish.style.backgroundColor = "grey"
    textarea.style.backgroundColor = "whitesmoke"
    textarea.style.color = "grey"
    tag.style.backgroundColor = "white"
    tag.style.backgroundColor = "black"
    do_a_post.style.backgroundColor = "grey"
    main.style.backgroundColor = "whitesmoke"
    menu_delet.style.backgroundColor = "grey"
    yes.style.backgroundColor = "whitesmoke"
    no.style.backgroundColor = "whitesmoke"
    boutons.forEach(element => {
        element.style.backgroundColor = "grey"
    });
    connection.style.backgroundColor = "grey"
}

const sport = document.getElementById("sport")
const culture = document.getElementById("culture")
const video_game = document.getElementById("video_game")
const histoire = document.getElementById("histoire")
const cinema = document.getElementById("cinema")
const litterature = document.getElementById("litterature")
const tech = document.getElementById("tech")
const musique = document.getElementById("musique")
const anime = document.getElementById("anime")
const art = document.getElementById("art")

const clear = document.getElementById("clear")

const liste_of_selected_tags = [sport, culture, video_game, histoire, cinema, litterature, tech, musique, anime, art]

liste_of_selected_tags.forEach(tag_name => {
    tag_name.addEventListener("click", () => {
        const style = getComputedStyle(tag_name)
        const actual_tag_color = style.backgroundColor
        console.log("Le CSS du post actuel : " + actual_tag_color)
        const liste_posts = document.querySelectorAll(".post")
        liste_posts.forEach(actual_post => {
            const nameOfTag = actual_post.childNodes[3].textContent
            console.log(`Le tag du poste actuel : ${nameOfTag}`)
            actual_post.style.display = "block"
            actual_post.style.border = "5px solid " + actual_tag_color
            if(nameOfTag.trim() != `#${tag_name.textContent.trim()}`){
                //.trim() efface les espaces inutiles qui faisaient rater la condition
                actual_post.style.display = "none"
            }
        });
    })
});

clear.addEventListener("click", () => {
    const liste_posts = document.querySelectorAll(".post")
    liste_posts.forEach(element => {
        element.style.display = "block"
        element.style.backgroundColor = "none"
        element.style.border = "5px solid black"
    });
})




//RESPONSIVE PART (MOBILE)


const general_posts = document.getElementById("posts")


const mobile_burger = document.getElementById("burger_menu")
const mobile_tag_menu = document.getElementById("mobile_tag_menu")
const mobile_post = document.getElementById("mobile_post")

const menu = document.getElementById("menu")
const tag_page = document.getElementById("tags")

mobile_burger.addEventListener("click", () => {
    menu.classList.toggle("menu-active")
    menu.classList.toggle("menu")
    if(menu.className === "menu-active"){
        mobile_tag_menu.style.visibility = "hidden"
        mobile_post.style.visibility = "hidden"
        document.body.style.overflow = "hidden"
    }
    else{
        mobile_tag_menu.style.visibility = "visible"
        mobile_post.style.visibility = "visible"
        document.body.style.overflow = "unset"
}
})



mobile_tag_menu.addEventListener("click", () => {
    if(tag_page.style.display == "none"){
        tag_page.style.display = "block"
        general_posts.style.display = "none"
        mobile_burger.style.visibility = "hidden"
        mobile_post.style.visibility = "hidden"
        mobile_tag_menu.innerHTML = `<img src="assets/icones/etiqueté.png" alt="">`
    }
    else{
        tag_page.style.display = "none"
        mobile_burger.style.visibility = "visible"
        mobile_post.style.visibility = "visible"
        general_posts.style.display = "block"
        mobile_tag_menu.innerHTML = `<img src="assets/icones/etiqueter.png" alt="">`
    }
})

mobile_post.addEventListener("click", () => {
    publish.style.display = "block"
})

const connected_or_not = document.getElementById("post_content")
let result_of_connection = connected_or_not.getAttribute("value")
//if(!localStorage.getItem("alerted")){
//    let alerted = localStorage.setItem("alerted", false)
//    console.log("bah le truc là : " + alerted)
//}

if(result_of_connection == "is_not_connected"){
    connected_or_not.style.filter = "blur(0.2rem)"
    do_a_post.style.display = "none"
    //if(alerted === false){
        setTimeout(() => {
            alert("Veuillez vous connecter pour accéder au site.")
        },1000)
        localStorage.setItem("alerted", true)
    //}
}


let last_tag = document.getElementById("las_tag")
console.log("Le dernier tag : " + last_tag)