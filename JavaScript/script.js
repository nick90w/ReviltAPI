
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
    




/*


function revealMessage() {
    document.getElementById("Hidden").style.display = "block";
    window.addEventListener("scroll", reveal);

    function reveal() {
        var reveals = document.querySelectorAll('.Hidden')

        for (var i = 0; i < reveals.length; i++)

        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 0;

        if (revealtop < windowheight - revealpoint)
        {
            reveals[i].classList.add('active');

        }
        else
        {
            reveals[i].classList.remove('active');

        }
    }

}
*/
