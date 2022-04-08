<!-- start Calender SCRIPTS -->
<script defer src="{{ asset('frontend/js/thisMyTime.js') }}"></script>

<script>
    function calendarPosition(input, classCalender) {
        function getOffset(el) {
            const rect = el.getBoundingClientRect();
            return {
                left: rect.left + window.scrollX,
                top: rect.top,
                bottom: window.screen.height - rect.bottom
            };
        }
        input.addEventListener('click', function w() {
            setTimeout(function() {
                let heightInput = input.clientHeight
                let Calender = document.querySelector(classCalender)
                Calender.classList.toggle("myStyle")
                let heightCalender = Calender.clientHeight
                if (getOffset(input).bottom < heightCalender || getOffset(input).bottom < getOffset(
                        input).top) {
                    Calender.style.transform = `translateY(-${heightCalender + heightInput + 5}px)`;
                } else {
                    Calender.style.transform = `translateY(0)`;
                }
                document.querySelectorAll('.dd-select').forEach(e => {
                    e.addEventListener('click', function name(params) {
                        document.querySelector('.rd-container.rd-container-attachment')
                            .style.display = 'none'
                    })
                })
                window.addEventListener('click', function(e) {
                    if (!document.querySelector('.rd-container.rd-container-attachment')
                        .contains(e.target) && !document.querySelector('#input').contains(e
                            .target)) {
                        document.querySelector('.rd-container.rd-container-attachment').style
                            .display = 'none'
                        let Calender = document.querySelector(classCalender)
                        Calender.classList.remove("myStyle")
                    }
                });

                let myday = document.getElementsByClassName('rd-day-body')[5].classList.add(
                    'rd-day-disabled')
                document.querySelectorAll('.rd-day-body:not(.rd-day-disabled)').forEach(e => {
                    e.addEventListener('click', function name(params) {
                        thisMyTime()
                    })
                })
            }, 0);

        })
    }
    calendarPosition(document.querySelector('#input'), '.rd-container.rd-container-attachment')
    let BASE_URL = "{{ url('/') }}";
</script>
<!-- / Calender SCRIPTS -->

{{-- <script defer src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script> --}}
<script src="{{ asset('frontend/js/rome.js') }}"></script>
<script defer src="{{ asset('frontend/js/DateTimePicker.js') }}"></script>
<script defer src="{{ asset('frontend/js/common_scripts.min.js') }}"></script>
<script defer src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
<script defer src="{{ asset('frontend/js/functions.js') }}"></script>
<script defer src="{{ asset('frontend/js/min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
{{-- <script defer src="{{ asset('frontend/lib/jquery-nice-select-1.1.0/js/jquery.js') }}"></script> --}}
{{-- <script defer src="{{ asset('frontend/lib/jquery-nice-select-1.1.0/js/jquery.nice-select.js') }}"></script> --}}
<script defer src="{{ asset('frontend/js/backend.js') }}"></script>
