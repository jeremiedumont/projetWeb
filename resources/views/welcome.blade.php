@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>

@endsection

@section('contentWelcome')


<div class="container-fluid h-100 w-100" >
    <!-- Map -->
    <div class="row h-50 w-100" id="divRowMap">
      <div class="col-12 col-sm-12">
        <!-- Map input field -->
        <div class="mysearchlist mycard myInputMap" id="divInputMap">
          <input type="text" name="inputMap" id="inputMap" placeholder="Ville"/>
        </div>
        <!-- Spinner during city request -->
        <div class="spinner-border" id="myspin"></div>
        <!-- Map element -->
        <div name="mapid" id="mapid" class="mycard mymap"></div>
      </div>
    </div>

    <div class="row">
        <!-- Button Search By City -->
        <div class="offset-md-2 col-md-4 offset-sm-1 col-sm-5  text-center">
            <div class="btn-lg mycard mysearchbut">
              <input type="text" name="inputCity" id="inputCity" placeholder="Rechercher par ville" style="width:60%;"/>
              <img src="images/search.png" class=" col-sm-4 col-4 imgSearch" onclick="processDataByCity()">
            </div>
        </div>
        <!-- Button Search By Name -->
        <div class=" col-md-4 col-sm-5  text-center" >
            <div class="mysearchbut mycard btn-lg">
              <input type="text" name="inputName" id="inputName" placeholder="Rechercher par nom" style="width:60%;"/>
              <img src="images/search.png" class=" col-sm-4 col-4 imgSearch"  onclick="processDataByName()">
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    var listNames=[];
    var listCities=[];
    //Map instance
    var mymap = L.map('mapid').setView([46, 5], 6);
    //Map bacground layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 15}).addTo(mymap);
    //decoding names and cities of shops for autocompletion
    var ar = <?php echo json_encode($shops) ?>;
    for (var i = 0; i < ar.length; i++){
      var name = ar[i].name;
      var city = ar[i].city;

      listNames.push(name);
      listCities.push(city);
    }
    //Deleting duplicate elements
    let listNamesUnique = [...new Set(listNames)];
    let listCitiesUnique = [...new Set(listCities)];
    //treating enter key on input map field
    $("#inputMap").on('keyup', function (e) {
      if (e.keyCode == 13) {
          //display spinner during request
          document.getElementById("myspin").style.display='inline';
          //request sending city entered and receiving infos on shops to display on map
          $.ajax({
            url:"{{ url('/ajaxMarkers') }}",
            type:'GET',
            data :{city:document.getElementById("inputMap").value},
            datatype : "JSON",
            success : function(tab){
              document.getElementById("myspin").style.display='none';
              document.getElementById("mapid").style.opacity=1;
              var tab = $.parseJSON(tab);
              for (var i = 0; i < tab.length; i++){
                var siret = tab[i].siret;
                var name = tab[i].name;
                var lat = tab[i].lat;
                var long = tab[i].long;
                //building markers with infos received
                var marker = L.marker([lat, long]).addTo(mymap);
                const content = "<div><div class=\"row\"><h3>"+name+"</h3></div><div class=\"row\"> <button style=\"width:100%;\" onclick=\"markerClicked("+siret+"\)\"class=\"btn btn-primary\">Voir</button</div></div>";
                marker.setZIndexOffset(2000000);
                marker.bindPopup(content);
                //centering view on displayed shops
                if(i==0){//we choose the first element
                  mymap.setView([lat, long], 10);
                }
              }
            }
          });
      }
    });

    $("#inputCity").on('keyup', function (e) {
      if (e.keyCode == 13) {
          processDataByCity();
      }
    });

    $("#inputName").on('keyup', function (e) {
      if (e.keyCode == 13) {
          processDataByName();
      }
    });


    $('#inputName').autocomplete({source:listNamesUnique});
    $('#inputCity').autocomplete({source:listCitiesUnique});
    $('#inputMap').autocomplete({source:listCitiesUnique});

    function markerClicked(siret){
      var uri = "/shop/"+siret;
      window.location.replace(uri);
    }
    function processDataByCity(){
        var city = document.getElementById("inputCity").value;
        var uri = "/researchCity/".concat(city);
        window.location.replace(uri);
    }
    function processDataByName(){
        var name =document.getElementById("inputName").value;
        var uri = "/researchName/".concat(name);
        window.location.replace(uri);
    }

</script>

@endsection
