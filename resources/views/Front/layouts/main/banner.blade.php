<style>
    #image{
        height: 200px;
        width: 50%;
        margin: 0% 25%;
    }
    </style>
         <div class="col-md-3">
            @foreach ($data['banners'] as $image)
            <div class="mySlides2">
              <img src="{{$image->photo}}" id="image">
            </div>
            @endforeach
         </div>
          <script>
              setInterval(() => {
                currentSlide2(1)
              }, 5000);
            var slideIndex2 = 1;
            showSlides2(slideIndex2);


            function currentSlide2(n) {
              showSlides2(slideIndex2 += n);
            }

            function showSlides2(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides2");
              var dots = document.getElementsByClassName("demo");
              var captionText = document.getElementById("caption");
              if (n > slides.length) {slideIndex2 = 1}
              if (n < 1) {slideIndex2 = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex2-1].style.display = "block";
              dots[slideIndex2-1].className += " active";
              captionText.innerHTML = dots[slideIndex2-1].alt;
            }
            </script>
