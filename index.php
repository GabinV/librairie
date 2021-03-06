<?php
session_start();
require_once 'fonc_bdd.php';
$bdd = OuvrirConnexion($session, $usr, $mdp);
$titre = "Librairie"; //Titre ‡ changer sur chaque page
require_once 'menu.php';
?>
<html>
<link rel="icon" type="image/png" href="favicon.png"/>
</html>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <br/><br/><br/>
    <div class="carousel-inner" role="listbox">

        <?php
        $num = $bdd->query('SELECT NUM from vitrine');
        $count = $num->rowCount();


        for ($i = 1; $i <= $count; $i++) {

            $num1 = $bdd->query('SELECT ISBN_ISSN from vitrine where NUM=' . $i . ';');
            $num1 = $num1->fetch();

            if ($i == 1) {
                echo '<div class="item active">
        <img src="couverture/' . $num1['ISBN_ISSN'] . '.jpg" alt="En construction !" style ="width:500px; height:600px; align:right"/>
        <div class="carousel-caption">
        
        </div>      
      </div>';
            } else {
                echo '<div class="item">
        <img src="couverture/' . $num1['ISBN_ISSN'] . '.jpg" alt="En construction !" style ="width:500px; height:600px; align:right"/>
        <div class="carousel-caption">
        
        </div>      
      </div>';
            }

        }
        ?>

    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php
include('band.html');
?>
<div id="googleMap"></div>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD-QWantOsGGvCL5ANHhc1mrst_yxFGZxE"></script>
<script>
    var myCenter = new google.maps.LatLng(49.230711, -0.047355);

    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 12,
            scrollwheel: false,
            draggable: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var marker = new google.maps.Marker({
            position: myCenter,
        });

        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>


<footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
        <div class="glyphicon glyphicon-chevron-up"></div>
    </a><br/>
	<span>

    <a class="up-arrow" href="a_propos.php" data-toggle="tooltip" title="A propos">
        <span align="center">

           <u> À Propos</u> |
             
        </span>
    </a>

    <span align="center">Nous Contacter | </span>
    <span align="center"><div class="glyphicon glyphicon-map-marker"></div> Adresse : Dozulé, FR |</span>
    <span align="center"><div class="glyphicon glyphicon-phone"></div> Téléphone : | </span>
    <span align="center"><div class="glyphicon glyphicon-envelope"></div> Email :</span>
	</span>
</footer>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>

</html>
