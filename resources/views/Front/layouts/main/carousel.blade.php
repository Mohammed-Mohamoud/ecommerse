<style>
    #imagee{
        height: 200px;
        width: 50%;
        margin: 0% 25%;
    }
    </style>
         <div class="col-md-6">
            @foreach ($data['sliders'] as $image)
            <div class="mySlides">
              <img src="{{$image->photo}}" id="image">
            </div>
            @endforeach
         </div>
          <script>
              setInterval(() => {
                currentSlide(1)
              }, 6000);
            var slideIndex = 1;
            showSlides(slideIndex);


            function currentSlide(n) {
              showSlides(slideIndex += n);
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
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
              captionText.innerHTML = dots[slideIndex-1].alt;
            }
            </script>
