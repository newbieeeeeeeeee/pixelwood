<!DOCTYPE html>
<html>
<head>
    
    <title>DZG JIN AH| WOODFINDER</title>
    <link rel="icon" type="image/x-icon" href="dzg.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
         .navbar-brand img {
        width: 30px;
        height: 30px;
        margin-right: 10px;
        vertical-align: middle;
    }

    .navbar-brand {
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        color: #515151; /* Adjust color as needed */
    }
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
        body {
      background-image: url('Images/dzgicon.webp');
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <a class="navbar-brand" href="#">
            <img src="Images/dzgicon.webp" alt="DZG findwood Logo">
            DZG findwood
        </a>
    </nav>
    <div class="container">
        <br>
        <br>
        <br>
    <div class="row">
            <div class="col-md-6">
                <button class="btn btn-secondary btn-block" onclick="previousAll()">Previous All</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-secondary btn-block" onclick="nextAll()">Next All</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-container input-group-append">
                    <input type="number" class="form-control urlInput" data-frame="frame1" placeholder="Land 4462(Input number here for search)" min="1" max="999">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" onclick="updateURL('frame1')">Go</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-container input-group-append">
                    <input type="number" class="form-control urlInput" data-frame="frame2" placeholder="Land 4416(Input number here for search)" min="1" max="999">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" onclick="updateURL('frame2')">Go</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 hidden">
                <!-- <button class="btn btn-secondary btn-block" onclick="updateURLs()"></button> -->
            </div>
            <div class="col-md-12">
                <button class="btn btn-secondary btn-block" onclick="randomAll()">Draw(Random Lands) x 4</button>
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
                <div class="input-container input-group-append">
                    <input type="number" class="form-control urlInput" data-frame="frame3" placeholder="Land 1224(Input number here for search)" min="1" max="999">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" onclick="updateURL('frame3')">Go</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-container input-group-append">
                    <input type="number" class="form-control urlInput" data-frame="frame4" placeholder="Land 1095(Input number here for search)" min="1" max="999">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" onclick="updateURL('frame4')">Go</button>
                    </div>
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
    <br>
    <footer class="footer bg-secondary">
        <div class="container">
            <span>&copy; Jin Ah</span>
        </div>
    </footer>

    <script>
        function updateURL(base) {
            var input = document.querySelector('.urlInput[data-frame="' + base + '"]');
            var newDigits = input.value;
            if (newDigits >= 1 && newDigits <= 999) {
                var frame = document.getElementById(base);
                var newURL = frame.src.split('/');
                newURL[newURL.length - 1] = newDigits;
                frame.src = newURL.join('/');
            } else {
                alert("Please enter a number between 1 and 999.");
            }
        }

        function updateURLs() {
            var urlInputs = document.querySelectorAll('.urlInput');
            urlInputs.forEach(function(input) {
                var frameId = input.dataset.frame;
                updateURL(frameId);
            });
        }

        function randomAll() {
            for (let i = 1; i <= 4; i++) {
                var frameId = 'frame' + i;
                var frame = document.getElementById(frameId);
                var randomDigits = Math.floor(Math.random() * 999) + 1; // Generate random number between 1 and 999
                var newURL = frame.src.split('/');
                newURL[newURL.length - 1] = randomDigits;
                frame.src = newURL.join('/');
                document.querySelector('.urlInput[data-frame="' + frameId + '"]').value = randomDigits; // Update textbox with random number
            }
        }

        function next(frameId) {
            var frame = document.getElementById(frameId);
            var currentDigits = parseInt(frame.src.substring(frame.src.lastIndexOf('/') + 1));
            var nextDigits = currentDigits + 1;
            if (nextDigits > 999) {
                nextDigits = 1;
            }
            var newURL = frame.src.split('/');
            newURL[newURL.length - 1] = nextDigits;
            frame.src = newURL.join('/');
            document.querySelector('.urlInput[data-frame="' + frameId + '"]').value = nextDigits; // Update textbox with next number
        }

        function previous(frameId) {
            var frame = document.getElementById(frameId);
            var currentDigits = parseInt(frame.src.substring(frame.src.lastIndexOf('/') + 1));
            var previousDigits = currentDigits - 1;
            if (previousDigits < 1) {
                previousDigits = 999;
            }
            var newURL = frame.src.split('/');
            newURL[newURL.length - 1] = previousDigits;
            frame.src = newURL.join('/');
            document.querySelector('.urlInput[data-frame="' + frameId + '"]').value = previousDigits; // Update textbox with previous number
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
