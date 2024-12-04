<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthsync</title>
    <style>
        @font-face {
            font-family: Montserrat;
            src: url(../font/Montserrat-VariableFont_wght.ttf);
        }

        @font-face {
            font-family: Roboto;
            src: url(../font/RobotoFlex-VariableFont_GRAD\,XOPQ\,XTRA\,YOPQ\,YTAS\,YTDE\,YTFI\,YTLC\,YTUC\,opsz\,slnt\,wdth\,wght.ttf);
        }

        body {
            padding: 0%;
            margin: 0%;
            overflow: auto;
        }

        .nav-btn {
            background-color: transparent;
            border: 3px solid #9dbdea;
            border-radius: 10px;
            display: flex;
            align-items: center;
            height: 50%;
            width: fit-content;
        }

        .nav-btn:hover {
            border: 3px solid #70a5ef;
        }

        .nav-btn:hover .nav-btn-label {
            color: #70a5ef;
        }

        .nav-btn:hover .svg {
            fill: #70a5ef;
        }

        .nav-btn:hover .st0 {
            stroke: #70a5ef;
        }

        .nav-btn:hover .fil0 {
            fill: #70a5ef;
        }

        .nav-btn-label {
            font-family: Roboto;
            font-size: 1.2rem;
            margin-right: 3%;
            color: #9dbdea;
        }

        /*for icon*/
        .st0 {
            fill: none;
            stroke: #9dbdea;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-miterlimit: 10;
        }

        .fil0 {
            fill: #9dbdea
        }

        #nav-bar {
            background-color: white;
            position: absolute;
            top: 0%;
            width: 100%;
            height: 13%;
        }

        #logo-container {
            background-color: white;
            position: absolute;
            left: 2%;
            width: fit-content;
            height: 100%;
        }

        #logo {
            background-color: transparent;
            position: absolute;
            height: 100%;
            width: auto;
        }

        #nav-btn-container {
            background-color: white;
            position: absolute;
            height: 100%;
            width: 52%;
            left: 15%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
    </style>
</head>

<body>
    <div id="nav-bar">
        <div id="logo-container">
            <img src="../pic/s-logo.png" id="logo">
        </div>
        <div id="nav-btn-container">
            <button class="nav-btn" id="home-nav-btn">
                <svg width="40px" height="34px" viewBox="0 0 20 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                    <title>home</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Rounded" transform="translate(-816.000000, -289.000000)">
                            <g id="Action" transform="translate(100.000000, 100.000000)">
                                <g id="-Round-/-Action-/-home" transform="translate(714.000000, 186.000000)">
                                    <g transform="translate(0.000000, 0.000000)">
                                        <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M10,19 L10,14 L14,14 L14,19 C14,19.55 14.45,20 15,20 L18,20 C18.55,20 19,19.55 19,19 L19,12 L20.7,12 C21.16,12 21.38,11.43 21.03,11.13 L12.67,3.6 C12.29,3.26 11.71,3.26 11.33,3.6 L2.97,11.13 C2.63,11.43 2.84,12 3.3,12 L5,12 L5,19 C5,19.55 5.45,20 6,20 L9,20 C9.55,20 10,19.55 10,19 Z" id="🔹Icon-Color" fill="#9dbdea" class="svg"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <label class="nav-btn-label">&nbsp;&nbsp;Home</label>
            </button>

            <button class="nav-btn" id="doctor-nav-btn">
                <svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="auto" height="39px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                    <path class="st0" d="M25,13L25,13c-5.9,1.3-12.1,1.3-18,0l0,0l1.8-7.3l0,0c4.6-2.2,9.8-2.2,14.4,0l0,0L25,13z"></path>
                    <path class="st0" d="M23.2,16.8c0.6-0.7,1.2-1,1.8-0.8c0.9,0.4,1.2,2,0.7,3.6c-0.5,1.6-1.7,2.7-2.6,2.3c0,0-0.1,0-0.1-0.1
	c-0.8,3.5-3.6,6.1-7,6.1s-6.3-2.6-7-6.1c0,0-0.1,0.1-0.1,0.1c-0.9,0.4-2.1-0.7-2.6-2.3C5.7,18,6,16.4,7,16c0.6-0.2,1.3,0.1,1.8,0.8"></path>
                    <line class="st0" x1="16" y1="7" x2="16" y2="11"></line>
                    <line class="st0" x1="14" y1="9" x2="18" y2="9"></line>
                </svg>
                <label class="nav-btn-label">&nbsp;Doctor</label>
            </button>

            <button class="nav-btn" id="patient-nav-btn">
                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="auto" height="39px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 1707 1707" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Layer_x0020_1">
                        <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                        <path class="fil0" d="M837 1633c-39,0 -70,-31 -70,-70 0,-38 31,-69 70,-69 39,0 69,31 69,69 0,39 -32,70 -69,70zm215 -890c-3,0 -6,0 -9,0 -10,-2 -20,-5 -28,-11l-20 21c1,8 -1,17 -7,23 -32,33 -74,51 -118,51 -44,0 -87,-18 -118,-51 -10,-10 -8,-25 1,-35 10,-10 25,-8 35,2 21,22 50,34 82,34 21,0 41,-5 58,-15 0,-7 2,-13 7,-18l48 -49c-4,-11 -5,-22 -3,-33 2,-19 12,-36 26,-48l138 -110c-12,-78 -34,-142 -63,-195 -82,67 -153,66 -222,65 -35,0 -69,-2 -107,7 -162,34 -207,107 -218,153 1,3 2,7 2,10l0 144c0,106 51,199 130,257 3,2 7,4 9,7 51,35 113,55 180,55 66,0 128,-20 179,-55 3,-3 6,-5 10,-7 78,-58 130,-151 130,-257l0 -22 -78 61c-12,10 -28,16 -44,16zm136 -274l65 -51c10,-8 22,-13 35,-15 5,-80 -11,-144 -51,-189 -58,-66 -147,-69 -148,-69 -7,0 -12,-3 -17,-8 -51,-56 -116,-86 -190,-89 -185,-4 -386,155 -450,209 51,52 77,133 90,197 35,-46 100,-93 222,-119 43,-8 80,-8 118,-8 70,1 133,2 209,-73 6,-5 13,-6 19,-6 7,1 14,4 18,11 37,55 64,126 80,210zm147 -56c7,4 13,9 19,16 25,32 19,76 -11,103l-119 94 0 62c-2,118 -59,224 -146,291l0 87 245 0c117,0 213,79 213,176l0 439c0,14 -12,25 -25,25l-274 0 -766 0 -275 0c-14,0 -25,-11 -25,-25l0 -439c0,-97 96,-176 212,-176l248 0 0 -85c-88,-67 -145,-173 -145,-293l0 -142c-7,-97 -38,-219 -105,-269 -6,-5 -10,-11 -10,-18 0,-7 3,-14 7,-20 11,-10 263,-247 504,-238 85,2 159,34 218,97 29,3 114,16 173,86 49,56 70,132 62,229zm-38 37c-6,0 -11,1 -15,5l-246 196c-5,4 -8,10 -9,17 0,3 0,7 2,12 1,0 1,1 2,2 2,1 3,4 4,6 4,3 8,5 12,5 7,1 13,-2 18,-6l247 -195c10,-9 13,-24 4,-35 -4,-4 -11,-7 -19,-7zm-615 634c1,2 1,4 1,7l0 1c11,85 83,151 172,151 86,0 158,-64 171,-146 0,-2 -1,-4 -1,-6 0,-4 1,-8 3,-11 0,-4 0,-7 0,-10l0 -58c-52,28 -112,44 -175,44 -62,0 -120,-16 -172,-43l0 57c0,5 1,10 1,14zm-46 32l-253 0c-88,0 -163,58 -163,127l0 416 226 0 0 -201c0,-14 11,-25 25,-25 14,0 25,11 25,25l0 201 716 0 0 -201c0,-14 12,-25 25,-25 14,0 25,11 25,25l0 201 225 0 0 -416c0,-71 -73,-127 -164,-127l-251 0c-23,100 -112,176 -219,176 -106,0 -195,-76 -217,-176zm90 -561l-67 0c-14,0 -25,-11 -25,-25 0,-13 11,-25 25,-25l67 0c14,0 25,12 25,25 0,14 -11,25 -25,25zm323 0l-67 0c-14,0 -25,-11 -25,-25 0,-13 11,-25 25,-25l67 0c14,0 25,12 25,25 0,14 -11,25 -25,25zm-469 -301c-7,0 -15,-2 -19,-9 -9,-11 -6,-27 5,-34 97,-72 282,-180 427,-88 11,7 16,22 9,33 -7,11 -22,15 -34,8 -122,-76 -285,22 -373,88 -5,0 -11,2 -15,2zm257 1212c-39,0 -70,-30 -70,-69 0,-39 31,-69 70,-69 39,0 69,30 69,69 0,39 -32,69 -69,69zm0 -90c-11,0 -21,10 -21,21 0,11 10,21 21,21 11,0 20,-10 20,-21 0,-11 -9,-21 -20,-21zm0 167c-11,0 -21,9 -21,20 0,11 10,21 21,21 11,0 20,-10 20,-21 0,-11 -9,-20 -20,-20z" class="fil0"></path>
                    </g>
                </svg>
                <label class="nav-btn-label">&nbsp;Patient</label>
            </button>

            <button class="nav-btn" id="appointment-nav-btn">
                <svg version="1.1" id="doctor-11" xmlns="http://www.w3.org/2000/svg" width="auto" height="39px" viewBox="0 0 11 11">
                    <path d="M9.5,5.87c0.0017-0.8174-0.6596-1.4813-1.477-1.483S6.5417,5.0466,6.54,5.864C6.5386,6.54,6.9955,7.131,7.65,7.3v0.42
	c0,1.0245-0.8305,1.855-1.855,1.855S3.94,8.7445,3.94,7.72l0,0C3.9776,6.8275,4.3787,5.9893,5.05,5.4H5
	c0.718-0.4684,1.1564-1.2628,1.17-2.12V1.79c0-0.613-0.4969-1.11-1.11-1.11c-0.0033,0-0.0067,0-0.01,0H4.5
	c-0.2043,0-0.37,0.1657-0.37,0.37S4.2957,1.42,4.5,1.42h0.55c0.2043,0,0.37,0.1657,0.37,0.37v1.49l0,0
	c0,1.0178-0.8222,1.8445-1.84,1.85V5.4l0,0V5.13C2.5583,5.1355,1.7255,4.3117,1.72,3.29c0-0.0033,0-0.0067,0-0.01l0,0V1.79
	c0-0.2043,0.1657-0.37,0.37-0.37l0,0h0.52c0.2043,0,0.37-0.1657,0.3699-0.3701C2.9799,0.8456,2.8143,0.68,2.61,0.68H2.09
	C1.4848,0.6909,0.9999,1.1847,1,1.79v1.49C0.9978,4.1241,1.4086,4.9158,2.1,5.4l0,0c0.6676,0.591,1.065,1.429,1.1,2.32
	c0,1.4332,1.1618,2.595,2.595,2.595S8.39,9.1532,8.39,7.72V7.3C9.0424,7.1316,9.4986,6.5438,9.5,5.87z M8,6.61
	c-0.4087,0-0.74-0.3313-0.74-0.74S7.5913,5.13,8,5.13s0.74,0.3313,0.74,0.74l0,0C8.74,6.2787,8.4087,6.61,8,6.61z" fill="#9dbdea" class="svg"></path>
                </svg>
                <label class="nav-btn-label">&nbsp;Appointment</label>
            </button>

            <button class="nav-btn" id="request-nav-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="auto" height="35px"><path fill="none" d="M0 0H24V24H0z"></path><path d="M12 19c.828 0 1.5.672 1.5 1.5S12.828 22 12 22s-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm0-17c3.314 0 6 2.686 6 6 0 2.165-.753 3.29-2.674 4.923C13.399 14.56 13 15.297 13 17h-2c0-2.474.787-3.695 3.031-5.601C15.548 10.11 16 9.434 16 8c0-2.21-1.79-4-4-4S8 5.79 8 8v1H6V8c0-3.314 2.686-6 6-6z" fill="#9dbdea" class="svg"></path></svg>
                <label class="nav-btn-label">&nbsp;&nbsp;Request</label>
            </button>
        </div>
    </div>
</body>
<script>
    document.getElementById("home-nav-btn").addEventListener("click", function() {
        window.location.href = "../admin/home.php";
    })
    document.getElementById("appointment-nav-btn").addEventListener("click", function() {
        window.location.href = "../admin/appointment.php";
    })
    document.getElementById("doctor-nav-btn").addEventListener("click", function() {
        window.location.href = "../admin/doctor.php";
    })
    document.getElementById("patient-nav-btn").addEventListener("click", function() {
        window.location.href = "../admin/patient.php";
    })
    document.getElementById("request-nav-btn").addEventListener("click", function() {
        window.location.href = "../admin/request.php";
    })
</script>

</html>