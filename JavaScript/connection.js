const connexion_bouton = document.querySelector(".btn-outline-primary")
console.log(connexion_bouton)

const inscription_bouton = document.querySelector(".btn-outline-info")
console.log(inscription_bouton)

const connexion_form = document.getElementById("formulaire_connection")
const inscription_form = document.getElementById("formulaire_inscription")

connexion_bouton.addEventListener("click", () => {
    connexion_form.style.display = "block"
    inscription_form.style.display = "none"
})

inscription_bouton.addEventListener("click", () => {
    inscription_form.style.display = "block"
    connexion_form.style.display = "none"
})


let theme = localStorage.getItem("actual_theme")

const boutons = document.querySelectorAll(".bouton")

if(theme === "white"){
    settings.style.backgroundColor = "whitesmoke"
    boutons.forEach(element => {
        element.style.backgroundColor = "grey"
    });
}