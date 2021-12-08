// start scroll navbar changecoler

window.addEventListener("scroll" , ()=>{
  if(scrollY > 10 ){
 
     document.querySelector(".navbar").style.background = " linear-gradient(90deg, rgba(109,123,110,1) 0%, rgba(106,117,159,1) 100%)";
  }

  else if(scrollY < 10 ){

     document.querySelector(".navbar").style.background =  "var(--main-color)";
  }
})
setTimeout(() => {
  
  
  document.querySelector(".loader-one").style.left = "-50%"
  document.querySelector(".loader-two").style.right = "-50%"
}, 3000);
setTimeout(() => {
  
  
  document.querySelector(".loader-one").style.display = "none"
  document.querySelector(".loader-two").style.display = "-50%"
}, 3400);



setTimeout(() => {

  document.querySelector(".loader-cont").style.display = "none"

}, 2900);


// slider of home
$(".slider_home").slick({

  // normal options...
  infinite: false,
  slidesToShow: 1,
  slidesToscroll:1,
  dots: false,
  autoplay:true,
  arrows:false,
  rtl:(document.querySelector("html").getAttribute('lang')=='ar') ? true : false ,
  // the magic
  responsive: [{

      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        infinite: true,
      }

    }, {

      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        dots: false
      }

    }, {

      breakpoint: 300,
      settings: "unslick" // destroys slick

    }]
});

// slider of home
$(".slider_Advantages").slick({

  // normal options...
  infinite: false,
  slidesToShow: 3,
  slidesToscroll:1,
  dots: false,
  autoplay:true,
  arrows:false,
  rtl:(document.querySelector("html").getAttribute('lang')=='ar') ? true : false ,
  // the magic
  responsive: [{

      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        infinite: true,
        dots: true,
        autoplay:true,
        
      }

    }, {

      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        dots: true,
        autoplay:true,
      }

    }, {

      breakpoint: 300,
      settings: "unslick" // destroys slick

    }]
});
// slider of home
$(".contant-application").slick({

  // normal options...
  infinite: false,
  slidesToShow: 5,
  slidesToscroll:1,
  dots: false,
  autoplay:true,
  arrows:false,
  rtl:(document.querySelector("html").getAttribute('lang')=='ar') ? true : false ,
  // the magic
  responsive: [{

      breakpoint: 1425,
      settings: {
        slidesToShow: 3,
        infinite: true,
      }

    },
    
    
    {

      breakpoint: 769,
      settings: {
        slidesToShow: 1,
        dots: false
      }

    }, {

      breakpoint: 300,
      settings: "unslick" // destroys slick

    }]
});


// start up to 
mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
mybutton.style.display = "block";
} else {
mybutton.style.display = "none";
}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
document.body.scrollTop = 0; // For Safari
document.documentElement.scrollTo({top: 0, behavior: 'smooth'}); // For Chrome, Firefox, IE and Opera
}



document.querySelector(".menu").addEventListener("click" , ()=> {
 document.querySelector(".list-mob").style.right = "40px"
})

document.querySelector(".close").addEventListener("click" , ()=> {
if( document.querySelector(".list-mob").style.right = "800px"){
  
}
})

let elem = document.querySelectorAll(".square-ball");

TweenMax.to(elem, 1, {
  scale: 0.6,
  borderRadius: "50%",
  rotation: 360,
  repeat: -1,
  repeatDelay: 0.5,
  yoyo: true
});


