var slideIndex = [1,1];
var slideId = ["slide-content", "pg1-container",]
showSlides(1, 0);
showSlides(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "flex";  
}
// 

var slideIndex3 = [1, 1];
var slideId3 = ["slide3-container", "bottom-top-slider-container"]
showDivs(1, 0);
showDivs(1, 1);

function plusDivs(n, no) {
  showDivs(slideIndex3[no] += n, no);
}

function showDivs(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId3[no]);
  if (n > x.length) { slideIndex3[no] = 1 }
  if (n < 1) { slideIndex3[no] = x.length }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex3[no] - 1].style.display = "flex";
}

//

var slideIndex2 = [1, 1];
var slideId2 = ["under-price-slider", "under-5-slider"]
showSpan(1, 0);
showSpan(1, 1);

function plusSpan(n, no) {
  showSpan(slideIndex2[no] += n, no);
}

function showSpan(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId2[no]);
  if (n > x.length) { slideIndex2[no] = 1 }
  if (n < 1) { slideIndex2[no] = x.length }
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex2[no] - 1].style.display = "flex";
}





// click-page

let click = document.getElementById('click1');
let click2 = document.getElementById('click2');
let click3 = document.getElementById('click3');
let click4 = document.getElementById('click4');

let list = document.getElementById('page-click1');
let list2 = document.getElementById('page-click2');
let list3 = document.getElementById('page-click3');
let list4 = document.getElementById('page-click4');
click.addEventListener("click",()=>{
  list.style.display = "block";
  list2.style.display = "none";
  list3.style.display = "none";
  list4.style.display = "none";
});
click2.addEventListener("click",()=>{
  list.style.display = "none";
  list2.style.display = "block";
  list3.style.display = "none";
  list4.style.display = "none";
});
click3.addEventListener("click",()=>{
  list.style.display = "none";
  list2.style.display = "none";
  list3.style.display = "block";
  list4.style.display = "none";
});
click4.addEventListener("click",()=>{
  list.style.display = "none";
  list2.style.display = "none";
  list3.style.display = "none";
  list4.style.display = "block";
});

//under price

let clickPrice1 = document.getElementById("underTen-click");
let clickPrice2 = document.getElementById("underFive-click");
let tittle = document.getElementById('tittleUnderPrice');

let underTen = document.getElementById("under10");
let underFive = document.getElementById("under5");

clickPrice1.addEventListener("click",()=>{
  underTen.style.display = "flex";
  underFive.style.display = "none";
  tittle.innerHTML="UNDER 10$"
});
clickPrice2.addEventListener("click",()=>{
  underTen.style.display = "none";
  underFive.style.display = "flex";
  tittle.innerHTML="UNDER 5$"
});


