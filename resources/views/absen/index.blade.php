@extends('layout')
@section('container')
    <style>
        @media (max-width: 575.98px) {
            #wrapper {
                flex-direction: column;
            }

            #hidden {
                display: none;
            }

            #full-h {
                min-height: auto;
            }
        }
    </style>
    <div class="container mt-5" id="full-h">
        <div class="d-flex flex-column align-items-center">
            <h1 class="fw-bold display-2" id="realtime-clock"></h1>
            <h5 class="display-6 fw-normal" id="realtime-date"></h5>
            <div class="d-flex flex-column my-5 align-items-center fw-normal fs-5">
                <span class="text-secondary">Work Hours</span>
                @if (!$data || $data->waktu_check_in == null)
                    <span>-</span>
                @elseif ($data->waktu_check_out != null)
                    <span>{{ $data->jam_kerja }}</span>
                @else
                    <span id="work-hours">00:00:00</span>
                @endif
            </div>
            <div class="d-flex gap-5 fs-5" id="wrapper">
                <form class="mx-5 d-flex align-items-center flex-column" method="post" action="{{ route('absen.store') }}">
                    @csrf
                    <span id="start-label" class="text-secondary">Start Date and Time</span>
                    @if (!$data || $data->waktu_check_in == null)
                        <p id="checkin-value">-</p>
                        <button class="btn btn-success text-white px-5 fs-4 fw-bold" id="in-btn" type="submit"
                            name="action" value="check_in">IN</button>
                    @else
                        <p id="checkin-value">{{ $data->tanggal . ', ' . $data->waktu_check_in }}</p>
                        <button class="btn btn-secondary disabled text-white px-5 fs-4 fw-bold" id="in-btn"
                            type="submit" name="action" value="check_in">IN</button>
                    @endif
                </form>
                @if (!$data || $data->waktu_check_in == null)
                    {{--  --}}
                @else
                    <div id="hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </div>
                    <form class="mx-5 d-flex align-items-center flex-column" method="post"
                        action="{{ route('absen.store') }}">
                        @csrf
                        <span class="text-secondary">End Date and Times</span>
                        @if (!$data || $data->waktu_check_out == null)
                            <p>-</p>
                            <button class="btn btn-danger text-white px-5 fs-4 fw-bold" id="out-btn" type="submit"
                                name="action" value="check_out">OUT</button>
                        @else
                            <p>{{ $data->tanggal . ', ' . $data->waktu_check_out }}</p>
                            <button class="btn btn-secondary disabled text-white px-5 fs-4 fw-bold" id="out-btn"
                                type="submit" name="action" value="check_out">OUT</button>
                        @endif
                    </form>
                @endif
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
        }

        function onChangeBtnIn() {
            let now = new Date();
            let hours = now.getHours();
            // let hours = 13;
            let minutes = now.getMinutes();
            let button = document.getElementById("in-btn");
            let checkinValue = document.getElementById('checkin-value');

            // Bandingkan waktu dengan 08:40 AM (08:40 = 8 * 60 + 40)
            if (hours > 8 || (hours === 8 && minutes >= 40)) {
                button.classList.add('btn-warning');
            }

            if (hours > 16 || (hours === 16 && minutes >= 10)) {
                button.disabled = true;
            }

            if (checkinValue.innerText !== '-') {
                button.classList.remove('btn-warning');
            }
        }

        // Update the date every second
        setInterval(updateDate, 1000);

        // Update the clock every second
        setInterval(updateClock, 1000);

        const workHours = document.getElementById("work-hours");
        const outBtn = document.getElementById("out-btn");
        const inBtn = document.getElementById("in-btn");
        let startTime;
        let intervalId;
        if (workHours) {
            startTime = parseInt(localStorage.getItem('startTime')) || Date.now();
            intervalId = setInterval(updateTimer, 1000);
        }

        function updateTimer() {
            const currentTime = Date.now();
            const elapsedTime = currentTime - startTime;
            const hours = Math.floor(elapsedTime / 3600000);
            const minutes = Math.floor((elapsedTime % 3600000) / 60000);
            const seconds = Math.floor((elapsedTime % 60000) / 1000);

            const formattedTime = padNumber(hours) + ":" + padNumber(minutes) + ":" + padNumber(seconds);
            if (workHours) {
                workHours.innerText = formattedTime;
            }
            localStorage.setItem('startTime', startTime.toString()); // Save updated startTime
        }

        function padNumber(number) {
            return (number < 10 ? "0" : "") + number;
        }

        function stopTimer() {
            clearInterval(intervalId);
            localStorage.removeItem('startTime');
        }

        window.onload = function() {
            onChangeBtnIn();
            if (inBtn.classList.contains("disabled")) {
                updateTimer();
            }

            outBtn.addEventListener("click", function() {
                stopTimer();
            });

        };
    </script>
@endsection
