@if (session()->has('error'))
    <input type="hidden" id="msg" value="{{ session('error') }}">
    <script>
        window.onload = function() {
            var msg = $("#msg").val() ;
            notif({
                type: "error",
                msg: $("#msg").val(),
                autohide: false
            })
        }
    </script>
@endif



@if ($errors->any())
    <input type="hidden" id="msg" value="{{ $errors->all()[0] }}">
    <script>
        window.onload = function() {
            var msg = $("#msg").val() ;
            notif({
                type: "error",
                msg: $("#msg").val(),
                autohide: false
            })
        }
    </script>
@endif


@if (session()->has('success'))
    <input type="hidden" id="msg" value="{{ session('success') }}">
    <script>
        window.onload = function() {
            var msg = $("#msg").val() ;
            notif({
                msg: $("#msg").val(),
                type: "success"
            })
        }
    </script>
@endif



