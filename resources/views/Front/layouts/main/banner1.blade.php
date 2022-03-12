<style>
    #image{
        height: 200px;
        width: 50%;
        margin: 0% 25%;
    }
    </style>
         <div class="col-md-3">
            @foreach ($data['banners'] as $image)
            <div class="mySlides1">
              <img src="{{$image->photo}}" id="image">
            </div>
            @endforeach
         </div>
          <script>
              setInterval(() => {
                currentSlide1(1)
              }, 1000);
            var slideIndex1 = 1;
            showSlides1(slideIndex1);


            function currentSlide1(n) {
              showSlides1(slideIndex1 += n);
            }

            function showSlides1(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides1");
              var dots = document.getElementsByClassName("demo");
              var captionText = document.getElementById("caption");
              if (n > slides.length) {slideIndex1 = 1}
              if (n < 1) {slideIndex1 = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex1-1].style.display = "block";
              dots[slideIndex1-1].className += " active";
              captionText.innerHTML = dots[slideIndex1-1].alt;
            }
            </script>
