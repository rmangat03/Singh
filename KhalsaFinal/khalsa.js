function app() {
    location.href = "index.html";
};

function search(event) {
    if (event.keyCode === 13) {
        let S_Content = document.getElementById("Search");
        location.href = "https://www.google.ca/search?q=" + S_Content.value;
    }
}
let scroll_Y_down = 5;
let stop = 0;
function smooth_scroll_form(value,page) {
    if (page === 'F'){
        stop = 500;
    } else{
        stop = 270;
    }
    let timer = setInterval(function scroll_To() {
        window.scroll(0, scroll_Y_down += value);
        if (scroll_Y_down === stop) {
            clearInterval(timer);
        }
    }, 5)
}
