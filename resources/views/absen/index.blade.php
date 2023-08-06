@extends('layout')
@section('container')
    <div class="container mt-5">
        <div class="d-flex flex-column align-items-center">
            <h1 class="fw-bold display-2" id="realtime-clock"></h1>
            <h5 class="display-6 fw-normal" id="realtime-date"></h5>
            <div class="d-flex flex-column my-5 align-items-center fw-normal fs-5">
                <span class="text-secondary">Work Hours</span>
                <span>7h 10m</span>
            </div>
            <div class="d-flex gap-5 fs-5"">
                <div class="mx-5 d-flex align-items-center flex-column">
                    <span id="start-label" class="text-secondary">Start Date and Time</span>
                    <p id="start-date"></p>
                    <button class="btn btn-success text-white px-5 fs-4 fw-bold">IN</button>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </div>
                <div class="mx-5 d-flex align-items-center flex-column">
                    <span class="text-secondary">End Date and Times</span>
                    <p id="end-date"></p>
                    <button class="btn btn-danger text-white px-5 fs-4 fw-bold">OUT</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateClock() {
            let now = moment().format('h:mm:ss A');
            document.getElementById('realtime-clock').innerText = now;
        }

        function updateDate() {
            let now = moment().format('dddd, MMMM D, YYYY');
            let date = moment().format('MM/DD/YYYY');
            document.getElementById('realtime-date').innerText = now;
            document.getElementById('start-date').innerText = date + ', 08:40 am';
            document.getElementById('end-date').innerText = date + ', 04:10 pm';
        }

        // Update the date every second
        setInterval(updateDate, 1000);

        // Update the clock every second
        setInterval(updateClock, 1000);
    </script>
@endsection
