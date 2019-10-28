@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
@endsection

@section('contentWelcome')

<div class="container mypersinfoform mycard">
  <div class="row">
    <div class="col-md-10  contentForm">
      <form method="post" action="{{url("/recordDish/$menu")}}" enctype="multipart/form-data">
        @csrf
      <!--Name Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Nom :</h3>
              </div>
              <div class="col-sm-8">
                <input type="text" id="inputName" name="inputName"></input>
              </div>
            </div>
          </div>
      </div>
      <!--Price Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Prix :</h3>
              </div>
              <div class="col-sm-8">
                <input type="number" id="inputPrice" name="inputPrice" ></input>
              </div>
            </div>
          </div>
      </div>
      <!--Type Dish Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Type : </h3>
              </div>
              <div class="offset-sm-5 col-sm-3">
                <select name="inputType" class="custom-select" id="inputType">
                  <option selected>Choisir...</option>
                  <option value="0">Entree</option>
                  <option value="1">Plat</option>
                  <option value="2">Dessert</option>
                </select>
              </div>
            </div>
          </div>
      </div>
      <!--Picture Field-->
      <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-4">
                <h3>Photo : </h3>
              </div>
              <div class="col-sm-8">
                <label for="inputPicture" class="label-file text-center" style="width:40%;"><i class="material-icons iconFile" >cloud_upload</i><span id="spanPicture">Ajouter une photo</span></label>
                <input name ="inputPicture" id="inputPicture" onchange="updateLabel(this.value)" type="file" class="btn btn-primary" style="display:none;"></input>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-12 text-center" style="margin-top:2%;">
        <button type="submit" class="btn btn-primary  w-50">Soumettre</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
  function updateLabel(e){
    var index = e.lastIndexOf("\\");
    var s = e.substring(index+1, e.length);
    document.getElementById("spanPicture").innerHTML= s;
  }
</script>
@endsection
