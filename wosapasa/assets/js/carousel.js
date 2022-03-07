let slidePosition= 0;
const slides = document.getElementsByClassName('carousel_slide');
const totalSlides = slides.length;
slides[0].classList.add('carousel_active');



document.getElementById('next').addEventListener("click", function() {
    moveToNextSlide();
  });

document.getElementById('prev').addEventListener("click", function() {
moveToPrevSlide();
});

function updateSlidePosition() {
    for (let slide of slides) {
        slide.classList.remove('carousel_active');
        slide.classList.add('carousel_hidden_img');
    }

    slides[slidePosition].classList.add('carousel_active');
}

function moveToPrevSlide() {
    if (slidePosition === 0) {
        slidePosition = totalSlides - 1;
    } else {
        slidePosition--;
    }

    updateSlidePosition();
}

function moveToNextSlide() {
    if (slidePosition === totalSlides - 1) {
        slidePosition = 0;
    } else {
        slidePosition++;
    }

    updateSlidePosition();
}

setInterval(function(){
    if(slidePosition === totalSlides-1){
        slidePosition=0;
    }else{
    slidePosition++;
    }
    updateSlidePosition()
},5000)

// interval = setInterval(function() {
//     if (slidePosition === totalSlides - 1) {
//         slidePosition = 0;
//     } else {
//         slidePosition++;
//     }
//     updateSlidePosition()
//   }, 1000);
 
//  clearInterval(interval);