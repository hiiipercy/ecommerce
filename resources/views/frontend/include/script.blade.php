<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('/') }}assets/js/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('/') }}assets/js/popper.js"></script>
  <script src="{{ asset('/') }}assets/js/bootstrap.min.js"></script>
  <script src="{{ asset('/') }}assets/js/stellar.js"></script>
  <script src="{{ asset('/') }}assets/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="{{ asset('/') }}assets/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="{{ asset('/') }}assets/vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="{{ asset('/') }}assets/vendors/isotope/isotope-min.js"></script>
  <script src="{{ asset('/') }}assets/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('/') }}assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="{{ asset('/') }}assets/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="{{ asset('/') }}assets/vendors/counter-up/jquery.counterup.js"></script>
  <script src="{{ asset('/') }}assets/js/mail-script.js"></script>
  <script src="{{ asset('/') }}assets/js/theme.js"></script>
  {{-- Toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
          // toastr alert message
          function notification(status, message) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "500",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            switch (status) {
                case 'success':
                    toastr.success(message);
                    break;

                case 'error':
                    toastr.error(message);
                    break;

                case 'warning':
                    toastr.warning(message);
                    break;

                case 'info':
                    toastr.info(message);
                    break;
            }
        }

        // session flash message
        @if(session()->get('success'))
        notification('success',"{{ session()->get('success') }}")
        @elseif(session()->get('error'))
        notification('error',"{{ session()->get('error') }}")
        @elseif(session()->get('info'))
        notification('info',"{{ session()->get('info') }}")
        @elseif(session()->get('warning'))
        notification('warning',"{{ session()->get('warning') }}")
        @endif

</script>
  @stack('scripts')