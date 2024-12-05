<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--jQuery CDN-->
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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

        #side-nav-bar {
            position: absolute;
            top: 30%;
            left: 7%;
            height: 25%;
            width: 9%;
            border: 0px solid black;
            display: flex;
            justify-content: center;
            flex-direction: column;
            gap: 10%;
        }

        .side-nav-btn-label {
            font-family: Roboto;
            font-size: 1.2rem;
            color: #9dbdea;
        }

        .side-nav-btn {
            background-color: transparent;
            border: 3px solid #9dbdea;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 28%;
            width: 100%;
        }

        .side-nav-btn:hover {
            border: 3px solid #70a5ef;
        }

        .side-nav-btn:hover .side-nav-btn-label {
            color: #70a5ef;
        }
    </style>
</head>

<body>
    <div id="side-nav-bar">
        <button class="side-nav-btn" id="general-nav-btn">
            <label class="side-nav-btn-label">General</label>
        </button>

        <button class="side-nav-btn" id="password-nav-btn">
            <label class="side-nav-btn-label">Password</label>
        </button>

        <button class="side-nav-btn" id="logout-nav-btn">
            <label class="side-nav-btn-label">Logout</label>
        </button>
    </div>
</body>
<script>
    document.getElementById("general-nav-btn").addEventListener("click", function(){
        window.location.href = "../patient/profile.php";
    })
    document.getElementById("password-nav-btn").addEventListener("click", function(){
        window.location.href = "../patient/profile-password.php";
    })
    document.getElementById("logout-nav-btn").addEventListener("click", function(){
        window.location.replace("../patient/logout.php");
    })
</script>
</html>