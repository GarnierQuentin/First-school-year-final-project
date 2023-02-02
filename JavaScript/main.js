const poubelle = document.querySelector(".trash")
const menu_delet = document.querySelector("#delet")

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

    const childNodes = post.childNodes
    console.log(childNodes)
    
    const nameOfTag = post.querySelector(".nameOfTag")

    const text = post.querySelector(".text")

    const image = post.querySelector(".image")

    post.removeChild(profile)
    post.removeChild(nameOfTag)
    post.removeChild(text)
    post.removeChild(image)
    post.remove()
    console.log(`child Nodes : ${childNodes}`)

}