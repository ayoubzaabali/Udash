window.onload = async() => {
    // preloade hide
    document.querySelector(".preloader").style.display = "none";

    // add animation to top element
    document.querySelector(".up").classList.add("upan");

    // add animation reveal to all elements
    window.addEventListener("scroll", reveal);

    // images animation
    let guys = document.querySelector(".guys")
    let img = guys.children
    let i = 0;
    setInterval(() => {
        removeDisplays(img);
        img[i].classList.toggle("display");
        i++;
        if (i == img.length)
            i = 0;
    }, 4000);

    // code here
    // Make the DIV element draggable:
    dragElement(document.getElementById("sidebar"));

    function dragElement(elmnt) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        if (document.getElementById(elmnt.id + "header")) {
            // if present, the header is where you move the DIV from:
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            // otherwise, move the DIV from anywhere inside the DIV:
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            // stop moving when mouse button is released:
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }

}


// remove displays from image slider
function removeDisplays(img) {
    for (let i = 0; i < img.length; i++) {
        if (img[i].classList.contains("display"))
            img[i].classList.remove("display");
    }
}

// animations function
function reveal() {
    var reveals = document.querySelectorAll(".reveal");
    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

// Create a condition that targets viewports at least 768px wide
const mediaQuery = window.matchMedia('(min-width: 601px)')

function handleTabletChange(e) {
    // Check if the media query is true
    if (e.matches) {
        // Then log the following message to the console
        let side = document.querySelector("#sidebar");
        window.onscroll = () => {
            console.log('Full document height, with scrolled out part: ' + window.pageYOffset);
            if (window.pageYOffset < 100) {
                side.classList.add("sidevis")
            } else {
                side.classList.remove("sidevis")
            }
        }


    }
}

// Register event listener
mediaQuery.addListener(handleTabletChange)

// Initial check
handleTabletChange(mediaQuery)