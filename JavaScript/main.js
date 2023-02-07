let theme = localStorage.getItem("actual_theme")

const clear_button = document.getElementById("clear")
const settings = document.getElementById("settings")
const main = document.getElementById("main")

const poubelle = document.querySelectorAll(".trash")
const menu_delet = document.querySelector("#delet")

poubelle.forEach(element => {
    console.log(poubelle)
    const actual_poubelle = element.innerHTML
    console.log(`poubelle actuelle : ${actual_poubelle}`)
    element.addEventListener('click', () => {
        console.log("détecte le clique")
        menu_delet.style.display = "block"

        no.addEventListener("click", () => {
            menu_delet.style.display = "none"
        })
        
        yes.addEventListener("click", () => {
            removePostByTrash(element)
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

textarea.addEventListener("input", () => {
    text_post = textarea.value
    console.log(text_post)
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
        feed.insertAdjacentHTML("afterbegin", `<div class="post">

        <div class="profile">

            <div class="identity">

                <div class="mini_profile_picture">
                    <img class="photo" src="assets/photos de profile/yugo_TP.jpg" alt="mini photo de profile">
                </div>

                <div class="username">
                    Quentin
                </div>

            </div>

            <div class="trash">
                <img src="assets/icones/poubelle.png" alt="">
            </div>

        </div>

        <div class="nameOfTag">
            #${text_tag}
        </div>

        <div class="text">
            ${text_post}
        </div>

        <div class="image">
            
        </div>

    </div>`)
    publish.style.display = "none"

    const poubelle = document.querySelectorAll(".trash")

    poubelle.forEach(element => {
        console.log(poubelle)
        const actual_poubelle = element.innerHTML
        console.log(`poubelle actuelle : ${actual_poubelle}`)
        element.addEventListener('click', () => {
            console.log("détecte le clique")
            menu_delet.style.display = "block"
    
            no.addEventListener("click", () => {
                menu_delet.style.display = "none"
            })
            
            yes.addEventListener("click", () => {
                removePostByTrash(element)
                menu_delet.style.display = "none"
            })
        })
    })
    }


})



const removePostByTrash = (trash) => {
    const profile = trash.parentNode
    console.log(profile)

    const post = profile.parentNode
    console.log(post)
    
    const nameOfTag = post.querySelector(".nameOfTag")

    const text = post.querySelector(".text")

    const image = post.querySelector(".image")

    post.removeChild(profile)
    post.removeChild(nameOfTag)
    post.removeChild(text)
    post.removeChild(image)
    post.remove()
}



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

const sport = document.getElementById("Sport")
const culture = document.getElementById("Culture")
const video_game = document.getElementById("video_game")
const histoire = document.getElementById("Histoire")
const cinema = document.getElementById("Cinema")
const litterature = document.getElementById("Litterature")
const tech = document.getElementById("Tech")
const musique = document.getElementById("Musique")
const anime = document.getElementById("Anime")
const sondage = document.getElementById("Sondage")

const clear = document.getElementById("clear")

const liste_of_selected_tags = [sport, culture, video_game, histoire, cinema, litterature, tech, musique, anime, sondage]

liste_of_selected_tags.forEach(tag_name => {
    tag_name.addEventListener("click", () => {
        const liste_posts = document.querySelectorAll(".post")
        liste_posts.forEach(actual_post => {
            const nameOfTag = actual_post.childNodes[3].textContent
            console.log(`Le tag du poste actuel : ${nameOfTag}`)
            actual_post.style.display = "block"
            if(nameOfTag.trim() != `#${tag_name.textContent.trim()}`){ //.trim() efface les espaces inutiles qui faisaient rater la condition
                actual_post.style.display = "none"
                actual_post.style.backgroundColor = tag_name.style.backgroundColor
            }
        });
    })
});

clear.addEventListener("click", () => {
    const liste_posts = document.querySelectorAll(".post")
    liste_posts.forEach(element => {
        element.style.display = "block"
        element.style.backgroundColor = "none"
    });
})




//RESPONSIVE PART (MOBILE)


const general_posts = document.getElementById("posts")


const mobile_burger = document.getElementById("burger_menu")
const mobile_tag_menu = document.getElementById("mobile_tag_menu")
const mobile_post = document.getElementById("mobile_post")

const menu = document.querySelector(".menu")
const tag_page = document.getElementById("tags")

mobile_burger.addEventListener("click", () => {
    if(menu.style.display == "none"){
        menu.style.display = "block"
        mobile_tag_menu.style.visibility = "hidden"
        mobile_post.style.visibility = "hidden"
        general_posts.style.display = "none"
    }
    else{
        menu.style.display = "none"
        mobile_tag_menu.style.visibility = "visible"
        mobile_post.style.visibility = "visible"
        general_posts.style.display = "block"
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