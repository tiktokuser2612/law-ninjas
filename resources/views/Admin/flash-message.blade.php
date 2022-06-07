  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

  @if(Session::has('success'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.closeDuration = 100;
    toastr.success("{{ session('success') }}");
  </script>
  @endif

  @if(Session::has('error'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.closeDuration = 100;
    toastr.error("{{ session('error') }}");
  </script>
  @endif

  @if(Session::has('info'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.closeDuration = 100;
    toastr.info("{{ session('info') }}");
  </script>
  @endif

  @if(Session::has('warning'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.closeDuration = 100;
    toastr.warning("{{ session('warning') }}");
  </script>
  @endif

 
