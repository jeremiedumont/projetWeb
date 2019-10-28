@extends('layouts.layoutWelcome')

@section('titleWelcome')

<title>TrouveTonResto</title>

@endsection

@section('contentWelcome')

<div class="container mycard mypersinfoform">
  <div class="row">
    <div class="col-sm-12 col-12 contentForm">
      <form method="post" action="{{url('/updateAccount')}}">
        @method('PUT')
        @csrf
      <!--Name Field-->
      <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4">
                <h3 class="labelModifyInfo" >Nom :</h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input" type="text" id="inputName" name="inputName" value="{{$user->name}}">
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--First Name Field-->
      <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4">
                <h3 class="labelModifyInfo">Prénom : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input"  type="text" id="inputFirstName" name="inputFirstName" value="{{$user->firstname}}"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Mobile Field-->
      <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4">
                <h3 class="labelModifyInfo">Mobile : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input"  type="text" id="inputMobile" name="inputMobile" value="{{$user->mobile}}"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Adresse Field-->
      <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4">
                <h3 class="labelModifyInfo">Adresse : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input"  type="text" id="inputAddr" name="inputAddr" value="{{$user->addr}}"></input>
                </div>
            </div>
            </div>
          </div>
      </div>
      <!--Postal Code Field-->
      <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4">
                <h3 class="labelModifyInfo">Code Postal : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input"  type="text" id="inputPostalCode" name="inputPostalCode" value="{{$user->postalcode}}"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--City Field-->
      <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4">
                <h3 class="labelModifyInfo">Ville : </h3>
              </div>
              <div class="col-sm-5">
                <div class="mdc-text-field ">
                  <input class="mdc-text-field__input"  type="text" id="inputCity" name="inputCity" value="{{$user->city}}"></input>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-sm-12 text-center" style="margin-top:2%;">
        <button type="submit" class="btn btn-primary  w-50">Soumettre</button>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection
