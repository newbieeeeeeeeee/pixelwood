<!DOCTYPE html>
<html>
<head>
    <title>DZG JIN AH| WOODFINDER</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        iframe {
            width: 100%;
            height: 50vh;
            border: none;
        }
        .input-container {
            display: flex;
            align-items: center;
        }
        .input-container input {
            flex-grow: 1;
        }
        .input-container button {
            margin-left: 10px;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">DZG findwood</a>
    </nav>
    <div class="container">
    <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-block" onclick="previousAll()">Previous All</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-block" onclick="nextAll()">Next All</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-container">
                    <input type="text" class="form-control urlInput" data-frame="frame1" placeholder="Land 4462" maxlength="4">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-container">
                    <input type="text" class="form-control urlInput" data-frame="frame2" placeholder="Land 4416" maxlength="4">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary btn-block" onclick="updateURLs()">Go</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-block" onclick="randomAll()">Random All</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="iframe-wrapper">
                    <iframe id="frame1" src="https://play.pixels.xyz/pixels/share/4462"></iframe>
                    <div class="iframe-controls">
                        <button class="btn btn-secondary btn-block" onclick="previous('frame1')">Previous</button>
                        <button class="btn btn-secondary btn-block" onclick="next('frame1')">Next</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="iframe-wrapper">
                    <iframe id="frame2" src="https://play.pixels.xyz/pixels/share/4416"></iframe>
                    <div class="iframe-controls">
                        <button class="btn btn-secondary btn-block" onclick="previous('frame2')">Previous</button>
                        <button class="btn btn-secondary btn-block" onclick="next('frame2')">Next</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-container">
                    <input type="text" class="form-control urlInput" data-frame="frame3" placeholder="Land 1224" maxlength="4">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-container">
                    <input type="text" class="form-control urlInput" data-frame="frame4" placeholder="Land 1095" maxlength="4">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="iframe-wrapper">
                    <iframe id="frame3" src="https://play.pixels.xyz/pixels/share/1224"></iframe>
                    <div class="iframe-controls">
                        <button class="btn btn-secondary btn-block" onclick="previous('frame3')">Previous</button>
                        <button class="btn btn-secondary btn-block" onclick="next('frame3')">Next</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="iframe-wrapper">
                    <iframe id="frame4" src="https://play.pixels.xyz/pixels/share/1095"></iframe>
                    <div class="iframe-controls">
                        <button class="btn btn-secondary btn-block" onclick="previous('frame4')">Previous</button>
                        <button class="btn btn-secondary btn-block" onclick="next('frame4')">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer bg-light">
        <div class="container">
            <span>&copy; Jin Ah</span>
        </div>
    </footer>

    <script>
        function updateURL(base, newDigits) {
            return base.substring(0, base.length - 4) + newDigits;
        }

        function updateURLs() {
            var urlInputs = document.querySelectorAll('.urlInput');
            urlInputs.forEach(function(input) {
                var frameId = input.dataset.frame;
                var frame = document.getElementById(frameId);
                var newDigits = input.value;
                if (newDigits.length === 4 && !isNaN(newDigits) && parseInt(newDigits) <= 5000) {
                    var newURL = updateURL(frame.src, newDigits.padStart(4, '0'));
                    frame.src = newURL;
                } else {
                    alert("Please enter a valid 4-digit number (maximum 5000).");
                }
            });
        }

        function randomAll() {
            for (let i = 1; i <= 4; i++) {
                var frameId = 'frame' + i;
                var frame = document.getElementById(frameId);
                var randomDigits = Math.floor(1000 + Math.random() * 4000); // Generate random 4-digit number between 1000 and 5000
                var newURL = updateURL(frame.src, randomDigits.toString().padStart(4, '0'));
                frame.src = newURL;
                document.querySelector('.urlInput[data-frame="' + frameId + '"]').value = randomDigits.toString(); // Update textbox with random number
            }
        }

        function next(frameId) {
            var frame = document.getElementById(frameId);
            var currentDigits = parseInt(frame.src.substring(frame.src.length - 4));
            var nextDigits = currentDigits + 1;
            if (nextDigits > 5000) {
                nextDigits = 1000;
            }
            var newURL = updateURL(frame.src, nextDigits.toString().padStart(4, '0'));
            frame.src = newURL;
            document.querySelector('.urlInput[data-frame="' + frameId + '"]').value = nextDigits.toString(); // Update textbox with next number
        }

        function previous(frameId) {
            var frame = document.getElementById(frameId);
            var currentDigits = parseInt(frame.src.substring(frame.src.length - 4));
            var previousDigits = currentDigits - 1;
            if (previousDigits < 1000) {
                previousDigits = 5000;
            }
            var newURL = updateURL(frame.src, previousDigits.toString().padStart(4, '0'));
            frame.src = newURL;
            document.querySelector('.urlInput[data-frame="' + frameId + '"]').value = previousDigits.toString(); // Update textbox with previous number
        }

        function nextAll() {
            for (let i = 1; i <= 4; i++) {
                next('frame' + i);
            }
        }

        function previousAll() {
            for (let i = 1; i <= 4; i++) {
                previous('frame' + i);
            }
        }
    </script>
</body>
</html>
