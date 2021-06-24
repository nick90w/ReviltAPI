
    window.addEventListener('scroll', () => {
        let content = document.querySelectorAll('.Hidden');
        for (var i = 0; i < content.length; i++) {


            let contentPosition = content[i].getBoundingClientRect().top;
            let screenPosition = window.innerHeight;
            if (contentPosition < screenPosition) {
                content[i].classList.add('active');

            } else {
                content[i].classList.remove('active');

              }
        }
    })


// Wrap every letter in a span
var textWrapper = document.querySelector('.ml10 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({ loop: true })
    .add({
        targets: '.ml10 .letter',
        rotateY: [-90, 0],
        duration: 1300,
        delay: (el, i) => 60 * i
    }).add({
        targets: '.ml10',
        opacity: 0,
        duration: 3000,
        easing: "easeOutExpo",
        delay: 100
    });



//=========================================

var i = 0; 			// Start Point
var images = [];	// Images Array
var time = 5000;	// Time Between Switch

// Image List
images[0] = "../SlideShowImages/DummyImage.jpg";
images[1] = "../SlideShowImages/JonkoLucas.jpg";

// Change Image
function changeImg() {
    document.SlideShowImage.src = images[i];

    // Check If Index Is Under Max
    if (i < images.length - 1) {
        // Add 1 to Index
        i++;
    } else {
        // Reset Back To O
        i = 0;
    }

    // Run function every x seconds
    setTimeout("changeImg()", time);
}

// Run function when page loads
window.onload = changeImg;
