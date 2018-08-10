<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  margin: 0;
}

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
  text-align: center;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: left;
  /* background-color: #222; */
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<body>

<div class="container">
  <div class="mySlides">
      <div class="col-sm-12">
        <div class="col-sm-8">
          <img src="" style="width:100%">
        </div>
          <div class="col-sm-2">
                <h2 class=""></h2>
                <p class=""></p>
                <a class="" href=""></a>
          </div>
      </div>
    </div>
  </div>

  <div class="mySlides">
      <div class="col-sm-12">
        <div class="col-sm-9">
            <img src="" style="width:100%">
          </div>
          <div class="col-sm-3">
            <h2 class=""></h2>
            <p class=""></p>
            <a class=""  href=""></a>
          </div>
    </div>
  </div>


  <div class="mySlides">
    <div class="col-sm-12">
      <div class="col-sm-9">
          <img src="" style="width:100%">
        </div>
            <div class="col-sm-3">
              <h2 class=""></h2>
              <p class=""></p>
              <a class="" href=""></a>
          </div>
        </div>
    </div>

  <div class="mySlides">
    <div class="col-sm-12">
      <div class="col-sm-9">
        <img src="" style="width:100%">
      </div>
        <div class="col-sm-3">
          <h2 class=""></h2>
          <p class=""></p>
          <a class="" href=""></a>
        </div>
      </div>
    </div>

  <!-- <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="" style="width:100%">
  </div> -->

  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p class="title-slider-homepage" id="caption"></p>
  </div>

  <div class="row img-col">
    <div class="column">
      <img class="demo cursor" src="" style="width:50%" onclick="currentSlide(1)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="" style="width:50%" onclick="currentSlide(2)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="" style="width:50%" onclick="currentSlide(3)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="" style="width:50%" onclick="currentSlide(4)" alt="">
    </div>
    <!-- <div class="column">
      <img class="demo cursor" src="" style="width:20%" onclick="currentSlide(5)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="" style="width:20%" onclick="currentSlide(6)" alt="">
    </div> -->
  </div>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "flex";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

</body>
</html>
