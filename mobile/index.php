<!DOCTYPE html>
<html>
<head>
    <title>Miesto žaidimas</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta charset="utf-8">
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAFnFO3ySluSuha6r1vYekiRQNy_ewe8RNLHRa7cwLE-yWPUZNWBSV43OE1hhpvzIXRf04qzvWdmKBEw" type="text/javascript">
    </script>
    <script type="text/javascript">
    
    // modified from http://www.weltmeer.ch/divelog/
        // globals
        var map=null;
        var geocoder = new GClientGeocoder();
        function initialize() {
    // GLog.write("initialize()");
          if (GBrowserIsCompatible()) {
            map = new GMap2(document.getElementById("map_canvas"));
            map.addControl(new GScaleControl());
            map.addControl(new google.maps.MenuMapTypeControl());
            map.setCenter (new GLatLng(55.169438, 23.88127499999996), 2);}
        }

        function findAddress() {
            var coun4=document.getElementById("countryselect").value;
                geocoder.getLocations(coun4, function(response)
            {
            if ((response.Status.code == 200) && 
                        (response.Placemark.length > 0)) {
            var box = response.Placemark[0].ExtendedData.LatLonBox;
            var sw=new GLatLng(box.south,box.west);
            var ne=new GLatLng(box.north,box.east);
            var bounds = new GLatLngBounds(sw,ne);
            centerAndZoomOnBounds(bounds);
                    }
            });
        }

    function centerAndZoomOnBounds(bounds) {
        var center = bounds.getCenter();
        var newZoom = map.getBoundsZoomLevel(bounds);
            if (map.getZoom() != newZoom) {
            map.setCenter(center, newZoom);
        } 	else {
            map.panTo(center);
        }
    }
    </script>
</head>
<body>
        <form action="insert.php" method="post" class="contact">
            <fieldset class="contact-inner">
              <p class="contact-input">
                <input id="text" type="text" name="name" maxlength="255" placeholder="Vardas..."></p>
              <p class="contact-input">
                <input type="text" name="surname" maxlength="255" placeholder="Pavardė...">
              </p>
              <p class="contact-input">
                <input type="text" name="car_nr" maxlength="10" placeholder="Valstybinis automobilio nr...">
              </p>
              <p class="contact-input">
                <input type="text" name="mobile_nr" maxlength="15" placeholder="Kontaktinio telefono numeris... 86..">
              </p>
              <p class="contact-input">
                <input type="text" name="email" maxlength="100" placeholder="Elektroninis paštas...">
              </p>

              <p class="contact-input">
                <label for="countryselect" class="select">
                  <select id="countryselect" name="city" class="textfeld"  onclick="findAddress();return false"  onchange="findAddress();return false" onfocus="">
                    <option value=''>Miestas....</option>
                    <?php
                        require_once('database.php');
                        require_once('functions.php');
                        $rows = getCities();
                        if ($rows)
                        {
                            foreach ($rows as $row)
                            {
                    ?>
                                <option value="<?php echo $row['miestai']; ?>"><?php echo $row['miestai']; ?></option>
                      <?php } ?>
                  <?php } ?>
                  </select>
                </label>
              </p>
              
                <div id="map_canvas" style="width:400px;height:250px;float:center"></div>
                <script type="text/javascript">
                initialize();
                </script>
              
              <p class="contact-input"></p>
                <h1><input type='checkbox' name='rules' value='2' id='checkbox' />Susipažinau ir sutinku su <a href="rules.php" class='checkbox'> akcijos taisyklėmis</a></h1>
            
                <h5>*Visi laukeliai privalomi</h5>
              
              <p class="contact-submit"> <input type="submit" value="Registruoti"></p>
            </fieldset>
        </form>
</body>
</html>