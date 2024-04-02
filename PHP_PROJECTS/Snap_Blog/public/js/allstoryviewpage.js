// Enable Carousel Indicators
$(".carousel-item").click(function () {
  $("#myCarousel").carousel($(this).index());
});

// // Pause the carousel when the mouse is over it
// $('#myCarousel').hover(function() {
//   $(this).carousel('pause');
// }, function() {
//   $(this).carousel('cycle');
// });

function viewStory(id) {
  let viewstorybtn = document.getElementById(id);
  let viewstorydiv = document.getElementById("viewstorydiv");
  let slideshow = document.getElementById("myCarousel");
  let viewstorygrid = document.getElementById("viewstorygrid");
  viewstorygrid.style.display = "none";
  slideshow.style.display = "none";
  viewstorydiv.style.display = "block";
}

function viewStoryGrid(id) {
  let viewstorygridbtn = document.getElementById(id);
  let viewstorydiv = document.getElementById("viewstorydiv");
  let slideshow = document.getElementById("myCarousel");
  let viewstorygrid = document.getElementById("viewstorygrid");
  viewstorygrid.style.display = "block";
  slideshow.style.display = "none";
  viewstorydiv.style.display = "none";
}

function viewSlideShow(id) {
  let viewslideshowbtn = document.getElementById(id);
  let slideshow = document.getElementById("myCarousel");
  let viewstorydiv = document.getElementById("viewstorydiv");
  let viewstorygrid = document.getElementById("viewstorygrid");
  viewstorygrid.style.display = "none";
  viewstorydiv.style.display = "none";
  slideshow.style.display = "block";

  // Activate Carousel

  $("#myCarousel").carousel();
}
