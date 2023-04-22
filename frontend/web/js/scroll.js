window.onscroll = function() {
    scroll_button = document.getElementById("scroll_top");
    if (window.pageYOffset >= 100) {
        scroll_button.style.display = "flex";
    } else {
        scroll_button.style.display = "none";
    }
    scroll_button.addEventListener("click", function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        return false;
    });
}