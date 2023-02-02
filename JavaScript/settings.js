const dark_theme = document.querySelector('#dark_theme')
const white_theme = document.querySelector('#white_theme')


const settings = document.querySelector('#settings')


white_theme.addEventListener('click', () => {
    settings.style.backgroundColor = "whitesmoke"
    settings.style.transition = "all 1s"
})

dark_theme.addEventListener('click', () => {
    settings.style.backgroundColor = "grey"
})