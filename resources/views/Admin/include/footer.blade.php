

  <!--   Core JS Files   -->
  <script src="{{asset('Admin/assets/js/jquery-3.6.0.js')}}"></script>
  <script src="{{asset('Admin/assets/js/bootstrap.js')}}"></script>
  <script src="{{asset('Admin/assets/dropzone/dropzone.js')}}"></script>
  <script src="{{asset('Admin/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('Admin/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('Admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  {{-- <script src="{{asset('Admin/assets/js/plugins/chartjs.min.js')}}"></script> --}}
  {{-- <script src="{{asset('Admin/assets/js/plugins/Chart.extension.js')}}"></script> --}}
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('Admin/assets/js/datatables-demo.js')}}"></script>
    <script src="{{asset('Admin/assets/js/soft-ui-dashboard.min.js?v=1.0.2')}}"></script>
    <script src="{{asset('Admin/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Admin/assets/js/all.min.js')}}"></script>
    <script src="{{asset('Admin/assets/js/dataTables.bootstrap4.js')}}"></script>
@yield('script')
<script>
    var uploadedDocumentMap = {}
   Dropzone.options.dpzMultipleFiles = {
       paramName: "photos", // The name that will be used to transfer the file
       //autoProcessQueue: false,
       maxFilesize: 5, // MB
       clickable: true,
       addRemoveLinks: true,
       acceptedFiles: 'image/*',
       dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
       dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
       dictCancelUpload: "الغاء الرفع ",
       dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
       dictRemoveFile: "حذف الصوره",
       dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
       headers: {
           'X-CSRF-TOKEN':
               "{{ csrf_token() }}"
       }
       ,
       url: "{{ route('product.save.Images') }}", // Set the url
       success:
           function (file, response) {
               $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
               uploadedDocumentMap[file.name] = response.name
           }
       ,
       removedfile: function (file) {
           file.previewElement.remove()
           var name = ''
           if (typeof file.file_name !== 'undefined') {
               name = file.file_name
           } else {
               name = uploadedDocumentMap[file.name]

           }
           $('form').find('input[name="photos[]"][value="' + name + '"]').remove()

       }
       ,
       // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
       init: function () {
               @if(isset($event) && $event->document)
           var files =
           {!! json_encode($event->document) !!}
               for (var i in files) {
               var file = files[i]
               this.options.addedfile.call(this, file)
               file.previewElement.classList.add('dz-complete')
               $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
           }
           @endif
       }
   }
</script>

<script>
    setInterval(() => {
      currentSlide(1)
    }, 3000);
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

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
</body>

</html>
