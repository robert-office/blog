<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

<script>
  @if(Session::has('success'))
  		toastr.success("{{ Session::get('success') }}");
  @endif

  @if(Session::has('info'))
  		toastr.info("{{ Session::get('info') }}");
  @endif

  @if(Session::has('warning'))
  		toastr.warning("{{ Session::get('warning') }}");
  @endif

  @if(Session::has('error'))
  		toastr.error("{{ Session::get('error') }}");
  @endif
</script>
