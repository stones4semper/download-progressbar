<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rangers Fc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <h1 class="pen-title">
        Download button with progress indicator 
        <a class="reset">reset</a>
    </h1>
    <div class="pen-wrapper">
        <div class="pen-wrapper__inner">            
            <div class="button-wrapper">
                <button class="button" data-filename="video.mp4">
                    <span class="button__text button__text--download">
                        Download
                        <svg class="icon button__icon--cloud-download">
                            <use xlink:href="#icon-cloud-download"></use>
                        </svg>
                    </span>
                </button>
                <div class="pie-loader">
                    <svg>
                        <circle r="40" cx="80" cy="80" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <symbol id="icon-cloud-download" viewBox="0 0 1024 1024">
                <title>cloud-download</title>
                <path class="path1" d="M640 85.333q78 0 149.167 30.5t122.5 81.833 81.833 122.5 30.5 149.167q0 85-35 160.667t-96.667 129.167-140 77.5l21-20.667q18-18.333 28-42.667 9.333-22.667 9.333-49.333 0-6.667-0.333-9.333 59.333-41.333 93.833-105.833t34.5-139.5q0-60.667-23.667-116t-63.667-95.333-95.333-63.667-116-23.667q-55.333 0-106.5 19.833t-90 53.833-65 81.333-33.833 101h-88.667q-70.667 0-120.667 50t-50 120.667q0 38.667 15.167 71.667t39.833 54.167 54.833 33 60.833 11.833h50q11.667 29.333 30 48l37.667 37.333h-117.667q-69.667 0-128.5-34.333t-93.167-93.167-34.333-128.5 34.333-128.5 93.167-93.167 128.5-34.333h22q26.333-74.333 79.333-132.167t126.833-90.833 155.833-33zM554.667 426.667q17.667 0 30.167 12.5t12.5 30.167v281l55-55.333q12.333-12.333 30.333-12.333 18.333 0 30.5 12.167t12.167 30.5q0 18-12.333 30.333l-128 128q-12.333 12.333-30.333 12.333t-30.333-12.333l-128-128q-12.333-13-12.333-30.333 0-17.667 12.5-30.167t30.167-12.5q18 0 30.333 12.333l55 55.333v-281q0-17.667 12.5-30.167t30.167-12.5z"></path>
            </symbol>
            <symbol id="icon-checkmark" viewBox="0 0 1024 1024">
                <title>checkmark</title>
                <path class="path1" d="M864 128l-480 480-224-224-160 160 384 384 640-640z"></path>
            </symbol>
        </defs>
    </svg>
</body>
</html>