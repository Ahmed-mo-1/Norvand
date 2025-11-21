<script>

var imageno = 1;
displayimg(imageno);

function nextimg(n) {displayimg(imageno += n)}

function displayimg(n){
var i ;
var image = document.getElementsByClassName("image");
var next = document.querySelector(".next");
var prev = document.querySelector(".prev");

if(n >= image.length){imageno = image.length; next.style.opacity = "0.5";}
else{next.style.opacity = "1";}
if(n <= 1){imageno = 1; prev.style.opacity = "0.5";}
else {prev.style.opacity = "1";}
for(i=0 ; i < image.length ; i++){ image[i].style.visibility = "hidden" ; image[i].style.height = "0" ; image[i].style.opacity = "0" ; image[i].style.transform =" translateX(0%)";
    image[i].style.position = "absolute" ; image[i].style.top = "0";
}



image[imageno - 1].style.height ="auto" ;
image[imageno - 1].style.position = "static";
image[imageno - 1].style.transform =" translateX(0%)" ;
image[imageno - 1].style.visibility ="visible" ;
image[imageno - 1].style.opacity ="1" ;
image[imageno - 1].style.transition ="2s" ;



}


</script>