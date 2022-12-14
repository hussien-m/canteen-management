<footer class="bg-dark text-white" style="direction: rtl;">
    <div class="container py-4">
      <div class="row py-5">
        <div class="col-md-4 mb-3 mb-md-0">
          <h6 class="text-uppercase mb-3">صفحاتنا على التواصل الاجتماعي</h6>
          <ul class="list-unstyled mb-0 me-2">
            <li><a class="footer-link" href="#!">تويتر</a></li>
            <li><a class="footer-link" href="#!">انستجرام</a></li>
            <li><a class="footer-link" href="#!">فيسبوك</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
          <h6 class="text-uppercase mb-3">الشركة</h6>
          <ul class="list-unstyled mb-0 me-2">
            <li><a class="footer-link" href="#!">ماذا نفعل</a></li>
            <li><a class="footer-link" href="#!">الخدمات المتاحة</a></li>
            <li><a class="footer-link" href="#!">الاسئلة الشائعة</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h6 class="text-uppercase mb-3 ">الموقع</h6>
          <ul class="list-unstyled mb-0 me-2">
            <li><a class="footer-link" href="#!">الرئيسية</a></li>
            <li><a class="footer-link" href="#!">من نحن</a></li>
            <li><a class="footer-link" href="#!">اتصل بنا</a></li>
          </ul>
        </div>
      </div>
      <div class="border-top pt-4" style="border-color: #1d1d1d !important">
        <div class="row">
          <div class="col-md-6 text-center text-md-end">
            <p class="small text-muted mb-0">PoweredBy <a target="_blank" class="text-white reset-anchor" href="{{url('/')}}">Zahmaapp.com</a></p>
          </div>

          <div  class="col-md-6 text-center text-md-start">
            <p class="small text-muted mb-0">&copy; جميع الحقوق محفوظة موقع زحمة.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- JavaScript files-->
  <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
  <script src="{{asset('frontend/js/front.js')}}"></script>

  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</div>


    @livewireScripts
</body>
</html>
