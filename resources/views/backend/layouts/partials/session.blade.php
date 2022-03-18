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



@php($errorBag = $errorBag ?? 'default')
@if ($errors->{$errorBag}->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->{$errorBag}->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        <div class="alert-body">
            {{ session()->get('success') }}
        </div>
    </div>
@endif
