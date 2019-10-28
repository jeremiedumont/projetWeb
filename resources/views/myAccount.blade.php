@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>

@endsection

@section('contentWelcome')
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-12 text-center"  style="padding-bottom:2%;">
      <h2>---Informations Personnelles---</h2>
    </div>
  </div>
  <!-- Button to change personal infos -->
  <div class="row">
    <div class="col-sm-12 col-12 text-center"   style="padding-bottom:2%;">
      <button class="btn btn-primary" type="button" onclick="modifyClicked()">Modifier Informations Personnelles</button>
    </div>
  </div>
  <div class="row">
    <!--Profile Picture field-->
    <div class="col-md-4 text-center">
      <div class="row">
        <div class="col-sm-12 col-12 text-center" >
          <img class=" h-100 img-fluid rounded mycard" src="{{Auth::user()->profilepicture}}" >
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center"  style="margin-top:1%;margin-bottom:1%;">
          <form action="{{url('/uploadprofilepicture')}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="uploadpp" class="label-file " style="width:50%;"><i class="material-icons iconFile" >cloud_upload</i><span id="spanPicture">Ajouter une photo</span></label>
            <input name ="uploadpp" id="uploadpp" type="file" class="mycard" onchange="form.submit()" style="display:none;"></input>
          </form>
        </div>
      </div>
    </div>
    <div class="offset-1 offset-md-0 col-10 col-md-8  text-center  listInfoPers mycard">
      <div class="row h-100">
        <div class="col-sm-12 my-auto">
          <!--Name Field-->
          <div class="row">
              <div class="col-sm-12 col-12">
                <div class="row">
                  <div class="col-sm-4 col-4 text-right">
                    <h4>Nom :</h4>
                  </div>
                  <div class=" col-sm-8 col-8">
                    <h4>{{$user->name}}</h4>
                  </div>
                </div>
              </div>
          </div>
          <!--First Name Field-->
          <div class="row">
              <div class="col-sm-12 col-12">
                <div class="row">
                  <div class="col-sm-4 col-4 text-right">
                    <h4>Prénom : </h4>
                  </div>
                  <div class="col-sm-8 col-8">
                    <h4>{{$user->firstname}}</h4>
                  </div>
                </div>
              </div>
          </div>
          <!--Mobile Field-->
          <div class="row">
              <div class="col-sm-12 col-12">
                <div class="row">
                  <div class="col-sm-4 col-4 text-right">
                    <h4>Mobile : </h4>
                  </div>
                  <div class="col-sm-8 col-8">
                    <h4>{{$user->mobile}}</h4>
                  </div>
                </div>
              </div>
          </div>
          <!--Adresse Field-->
          <div class="row">
              <div class="col-sm-12 col-12">
                <div class="row">
                  <div class="col-sm-4 col-4 text-right">
                    <h4>Adresse : </h4>
                  </div>
                  <div class="col-sm-8 col-8">
                    <h4>{{$user->addr}}</h4>
                  </div>
                </div>
              </div>
          </div>
          <!--Postal Code Field-->
          <div class="row">
              <div class="col-sm-12 col-12">
                <div class="row">
                  <div class="col-sm-4 col-4 text-right">
                    <h4>Code Postal : </h4>
                  </div>
                  <div class="col-sm-8 col-8">
                    <h4>{{$user->postalcode}}</h4>
                  </div>
                </div>
              </div>
          </div>
          <!--City Field-->
          <div class="row">
              <div class="col-sm-12 col-12">
                <div class="row">
                  <div class="col-sm-4 col-4 text-right">
                    <h4>Ville : </h4>
                  </div>
                  <div class="col-sm-8 col-8">
                    <h4>{{$user->city}}</h4>
                  </div>
                </div>
              </div>
          </div>
    </div>
    </div>
    </div>
  </div>
  <!-- Button to delete the account -->
  <div class="row">
    <div class="col-sm-12 col-12 text-center"   style="padding-top:2%;">
      <form id="logout-form" action="{{url('/deleteAccount')}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-primary">Supprimer compte</button>
      </form>
    </div>
  </div>
  <div class="row" style="padding-top:5%;">
    <div class="col-md-12 text-center">
      <h2>---Liste des commerces---</h2>
    </div>
  </div>
  <div class="row" style="padding-top:2%;">
    <div class="col-md-12 text-center">
      <button class="btn btn-primary"  onclick="addShopClicked()">Ajouter commerce</button>
    </div>
  </div>
</div>
<!-- List of shops -->
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-12">
      <ul class="list-group"  style="margin-bottom: 10%;">
        @foreach ($shops as $shop)
        <!-- One shop card -->
        <div class="row" style="margin-bottom: 2%;">
        <div class="offset-sm-2 offset-2 col-sm-8 col-8">
          <button type="button" id="{{$shop->siret}}"  onclick="red({{$shop->siret}})" class="list-group-item btn mysearchlist mycard" >
            <div class="container noBoundsContainer">
              <div class="row" class="">
                <div class="col-md-4 col-sm-12 col-12" style="width:100%;">
                  <img class="img-fluid rounded float-left" src="{{$shop->profilepicture}}" style="height:100%; width:100%;">
                </div>
                <div class="col-md-8 col-sm-12 col-12">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-12 text-center">
                      <span class="badge-primary mybadgename"><h4 class="my-auto" style="height:100%">{{$shop->name}}</h4></span>

                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-center">
                      {{$shop->addr}}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-center">
                      {{$shop->phone}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </button>
          </div>
          <div class="col-md-2 col-sm-2 col-2 my-auto">
          <form id="logout-form" action="{{url("deleteShop")}}" method="POST">
            @method('DELETE')
            @csrf
              <input type="text" style="display:none" value="{{$shop->siret}}" name="inputSiret">
              <button type="submit" class="deleteNoBack"><img class="img-fluid" src="/images/delete.png"></button>
          </form>
        </div>
      </div>
        @endforeach
      </ul>
    </div>
  </div>
</div>

<script>
  function modifyClicked(){
    window.location.replace("/modifyPersInfo");
  }

  function deleteAccountClicked(){
    window.location.replace("/deleteAccount");
  }

  function addShopClicked(){
    window.location.replace("/addShop");
  }

	function red(id){
		var uri = '/shop/'.concat(id);
		window.location.replace(uri);
	}
</script>

@endsection
