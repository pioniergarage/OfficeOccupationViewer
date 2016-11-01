<html>
    <head>
    <title>Ist jemand im Launchpad?</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $.ajax({
                  url: "/getStatus.php"}).done(function(result) {
                    if(parseInt(result) == 0){
                        document.getElementById("image").src = "/ressourcen/traffic-semaphore-silhouette-red.png";
                    }
                    else{
                        document.getElementById("image").src = "/ressourcen/traffic-semaphore-silhouette-green.png";
                    }
                });
            }, 1000);
            });
    </script>
    </head>
    <body>
        <div id="wrapper" style="text-align: center">
            <div id="yourdiv" style="display: inline-block;">
                <div class="header">
                    <h1>Ist das <img type="image" src="http://istjemandimlaunchpad.pioniergarage.de/ressourcen/LaunchpadKurz.png" alt="Launchpad Logo" width="22%" align="top"> offen?</h1>
                </div>
                <p>
                    <div>
                        <img id="image" src="/ressourcen/traffic-semaphore-silhouette-red.png"></img>
                    </div>
                </p>
            </div>
        </div>
    </body>
</html>
