let theme = localStorage.getItem("actual_theme")

const clear_button = document.getElementById("clear")
const settings = document.getElementById("settings")
const main = document.getElementById("main")

const poubelle = document.querySelector(".trash")
const menu_delet = document.querySelector("#delet")

const boutons = document.querySelectorAll(".bouton")
const connection = document.querySelector(".connection")

const yes = document.querySelector("#yes")
const no = document.querySelector("#no")

console.log(poubelle)
console.log(menu_delet)

poubelle.addEventListener('click', () => {
    menu_delet.style.display = "block"
})

no.addEventListener("click", () => {
    menu_delet.style.display = "none"
})

yes.addEventListener("click", () => {
    removePostByTrash(poubelle)
    menu_delet.style.display = "none"
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
        console.log("pas encore dans la condition")
        console.log("la fenêtre doit se fermer")
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


const liste_posts = document.querySelectorAll(".post")
console.log(`liste des posts : ${liste_posts}`)

liste_posts.forEach(element => {
    console.log(`liste des posts : ${element.innerHTML}`)
});

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
        liste_posts.forEach(actual_post => {
            const nameOfTag = actual_post.childNodes[3].textContent
            console.log(`Le tag du poste actuel : ${nameOfTag}`)
            if(nameOfTag != `#${tag_name.textContent}`){
                actual_post.style.display = "none"
            }
        });
    })
});

clear.addEventListener("click", () => {
    liste_posts.forEach(element => {
        element.style.display = "block"
    });
})

//anime.addEventListener("click", () => {
//    console.log(anime.textContent)
//    liste_posts.forEach(actual_post => {
//        const nameOfTag = actual_post.childNodes[3].textContent
//        console.log(`nameOfTage : ${nameOfTag}`)
//        console.log(`anime : ${typeof anime.textContent}`)
//        if(nameOfTag != `#${anime.textContent}`){
//            actual_post.style.display = "none"
//        }
//    });
//})