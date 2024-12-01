document.addEventListener("DOMContentLoaded", function() {
    let backgroundCanvas = document.createElement("div");
    backgroundCanvas.style.cssText = "position: fixed; top: 50%; left: 50%; width: 0; height: 0; z-index: 1; \
    background: rgba(0,0,0,0.9) none center/contain no-repeat; transition: all .8s ease-out; cursor: zoom-out;";
    document.body.appendChild(backgroundCanvas);
    backgroundCanvas.onclick = function() { 
        backgroundCanvas.style.inset = "50% auto auto 50%";
        backgroundCanvas.style.width = "0";
        backgroundCanvas.style.height = "0";
    };

let zoomInImgLinks = document.getElementsByClassName("photos");
    for(var i=0; i<zoomInImgLinks.length; ++i) zoomInImgLinks[i].addEventListener("click", function(e) {
        e.preventDefault();
        backgroundCanvas.style.backgroundImage = "url('"+e.target.parentNode.href+"')";
        backgroundCanvas.style.inset = "0 auto auto 0";
        backgroundCanvas.style.width = "100%";
        backgroundCanvas.style.height = "100%";
    })
})