@extends('layouts.layoutWelcome')

@section('titleWelcome')
<title>TrouveTonResto</title>
@endsection

@section('contentWelcome')
      <!-- Checking if shops were found or not -->
      @if(count($shops)==0)
        <script>
          alert("Aucun restaurant trouvé");
          window.location.replace("/");//If not, then we redirect the user to home screen
        </script>
      @else
      <!-- List of matching shops -->
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <ul class="list-group"  >
              <div class="col-sm-12 col-12 text-center"  style="padding-bottom:2%;">
                <h2>---Liste des commerces---</h2>
              </div>
              @foreach ($shops as $shop)
                <!-- One shop area -->
                <button type="button" id="{{$shop->siret}}"  onclick="red({{$shop->siret}})" class="list-group-item btn mycard researchButtonList  mysearchlist">
                  <div class="container noBoundsContainer">
                    <div class="row" class="">
                      <div class="col-md-4 col-sm-12 col-12" style="width:100%;">
                        <img class="img-fluid rounded float-left" src="{{$shop->profilepicture}}" style="height:100%; width:100%;">
                      </div>
                      <div class="col-md-8 col-sm-12 col-12">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-12 text-center">
                            <span class="badge-primary mybadgename"><h4>{{$shop->name}}</h4></span>
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
              @endforeach
            </ul>
          </div>
        </div>
        <!-- Managing pagination -->
        <div class="row" style="margin-bottom: 10%;">
          <div class="offset-sm-5 col-sm-2 col-12">
            {{$shops->links()}}
          </div>
        </div>
      </div>
      @endif


<script type="text/javascript">
  //Function called when click on a shop card and redirect the user on shop page
	function red(id){
		var uri = '/shop/'.concat(id);
		window.location.replace(uri);
	}
</script>

@endsection
