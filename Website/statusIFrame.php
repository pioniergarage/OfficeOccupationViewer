<html>
    <head>
    <title>Ist jemand im Launchpad?</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style-officeOccupationView.css"/>
    </head>
    <body>
        <div id="wrapper" style="text-align: center">
            <div id="yourdiv" style="display: inline-block;">
                <div class="header">
                    <h1>Ist das <img type="image" src="/ressourcen/LaunchpadKurz.png" alt="Launchpad Logo" width="22%" align="top"> offen?</h1>
                </div>
                <p>
                    <div>
                        <?php
                             // This fancy PHP script is displaing the door state

                            // '' immer nehmen!
                            // Code convention
                            // Bei if 1. Typischer Fall, dann andere
                            // Komplexität vermeiden. if(), if else(), ...
                            // Versuchen HTMl und php trennen.
                            // php storm, suplimeText als Editor


                            // Insert your configuration here
                            $host="127.0.0.1";
                            $user="test";
                            $password="test2";
                            $database="door";
                            $query = "SELECT stat FROM DoorStatus WHERE id =1;";

                                // Connect to MySQL Database
                            $link = mysql_connect($host, $user, $password);

                            // Connect to the database
                            if (!mysql_select_db($database, $link)) {
                                echo "Could not select database";
                                exit;
                            }

                                // Performe querry
                            $result = mysql_query($query, $link);
                            if (!$result) { // check for errors.
                                echo 'Could not run query: ' . mysql_error();
                            } else {
                              $row = mysql_fetch_row($result);
                              if($row[0] == 1) { ?>
                                  <!--Images by http://openclipart.org/image/320px/svg_to_png/66421/traffic-semaphore-silhouette-green.png-->
                                <h1>Ja</h1> <br> <img type="image" src="/ressourcen/traffic-semaphore-silhouette-green.png">
                                <?php }
                              else { ?>
                                  <!--Images by http://openclipart.org/image/320px/svg_to_png/66427/traffic-semaphore-silhouette-red.png-->
                                  <h1>Nein</h1>  <br><img type="image" src="/ressourcen/traffic-semaphore-silhouette-red.png">
                              <?php }
                            }
                        ?>
                    </div>
                </p>
                </div>
            </div>
        </body>
</html>
