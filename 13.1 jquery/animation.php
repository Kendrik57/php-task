img {
    width: 300px;
    height: 200px;
    display: block;
    position: relative; /* Added this line */
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery Effects and Animation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .container {
            margin-bottom: 20px;
        }
        img {
            width: 300px;
            height: 200px;
            display: block;
            position: relative; /* Ensure positioning for animation */
        }
    </style>
</head>
<body>

    <div class="container">
        <button id="buttonA">Fade Out / In</button>
        <img id="imageA" src="https://via.placeholder.com/300x200.jpg" alt="Image A">
    </div>

    <div class="container">
        <button id="buttonB">Slide Up / Down</button>
        <img id="imageB" src="https://via.placeholder.com/300x200.jpg" alt="Image B">
    </div>

    <div class="container">
        <button id="buttonC">Move Left / Right</button>
        <img id="imageC" src="https://via.placeholder.com/300x200.jpg" alt="Image C">
    </div>

    <script>
        $(document).ready(function() {
            // Button A: Fade Out / In
            $("#buttonA").click(function() {
                $("#imageA").fadeToggle();
            });

            // Button B: Slide Up / Down
            $("#buttonB").click(function() {
                $("#imageB").slideToggle();
            });

            // Button C: Move Left / Right
            var isMoved = false;
            $("#buttonC").click(function() {
                if (!isMoved) {
                    $("#imageC").animate({left: '300px'}, "slow");
                    isMoved = true;
                } else {
                    $("#imageC").animate({left: '0px'}, "slow");
                    isMoved = false;
                }
            });
        });
    </script>

</body>
</html>

