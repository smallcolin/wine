@if(count($errors)>0)
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
 <script>
    @foreach($errors->all() as $error)

                toastr.options = {
                      "debug": false,
                      "positionClass": "toast-top-right",
                      "onclick": null,
                      "fadeIn": 300,
                      "fadeOut": 1000,
                      "timeOut": 5000,
                      "extendedTimeOut": 1000
                    }
                toastr.error("{{$error}}")
    @endforeach
</script>
@endif

@if(session('success'))
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
 <script>
            @if(Session::has('success'))
               toastr.options = {
                      "debug": false,
                      "positionClass": "toast-top-right",
                      "onclick": null,
                      "fadeIn": 300,
                      "fadeOut": 1000,
                      "timeOut": 5000,
                      "extendedTimeOut": 1000
                    }
                toastr.success("{{Session::get('success')}}")
 @endif
</script>

@endif


@if(session('info'))
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
 <script>
            @if(Session::has('info'))
               toastr.options = {
                      "debug": false,
                      "positionClass": "toast-top-right",
                      "onclick": null,
                      "fadeIn": 300,
                      "fadeOut": 1000,
                      "timeOut": 5000,
                      "extendedTimeOut": 1000
                    }
                toastr.info("{{Session::get('info')}}")
 @endif
</script>

@endif

@if(session('error'))
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
 <script>
            @if(Session::has('error'))
               toastr.options = {
                      "debug": false,
                      "positionClass": "toast-top-right",
                      "onclick": null,
                      "fadeIn": 300,
                      "fadeOut": 1000,
                      "timeOut": 5000,
                      "extendedTimeOut": 1000
                    }
                toastr.info("{{Session::get('error')}}")
 @endif
</script>

@endif
