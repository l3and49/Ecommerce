let count = 1;
document.getElementById("radio1").checked = true;

setInterval(function(){
    nextImage();
}, 4000)

function nextImage() {
    count++;
    if(count>4){
        count = 1;
    }
    document.getElementById("radio"+count).checked = true;
}

///////////////////////////////////////////////////////////

/* 
const input = document.querySelector("search")
input.removeAttribute("disabled")

window.sr = ScrollReveal({ reset: true});

sr.reveal('.inicio-container',{duration: 1000});

sr.reveal('.produtos-container');

sr.reveal('.sobre-informacoes-container',{
    rotate: { x: 0, y: 80, z: 0},
    duration: 2000
}); */