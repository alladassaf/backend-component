const navLinks = document.querySelectorAll("nav ul li")

navLinks.forEach(link => {
    const anchorEl = link.querySelector('a')
    const anchor = link.querySelector('a').href.split('/')
    const anchorRef = anchor[anchor.length - 1]

    // console.log(anchorRef)
    const pathArr = window.location.pathname.split("/")
    const path = pathArr[pathArr.length - 1]

    if (path == anchorRef) {
        
        console.log(anchorEl)
        anchorEl.style.color = "lightblue"
    }

})