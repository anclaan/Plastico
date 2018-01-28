@extends('admin.main')

@section('title', '| Klienci')

@section('content')

  <div class="panel-heading">
  <div class="panel-title">Klienci</div>
  </div>
  {{Form::open(['url'=>'admin/customers/searchCustomers', 'method'=>'GET', 'role'=>'form']) }}
  {{ csrf_field() }}
  <div>

      <div id="header">
          <h4>Wyszukaj klienta</h4>
      </div>
      <div class="row " >
        <fieldset>
      <div class="col-md-3" id="leweWyszukiwanie">
            <div class="form-group">
                    {{ Form::label('imie', 'Imię:') }}
                    {{ Form::text('imie', old('imie'), ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                    {{ Form::label('nazwisko', 'Nazwisko:') }}
                    {{ Form::text('nazwisko', old('nazwisko'), ['class'=>'form-control']) }}
            </div>

      </div>
      <div class="col-md-3" id="leweWyszukiwanie">

            <div class="form-group">
                    {{ Form::label('telefon', 'Telefon:') }}
                    {{ Form::text('telefon', old('telefon'), ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                    {{ Form::label('email', 'E-mail:') }}
                    {{ Form::text('email', old('email'), ['class'=>'form-control']) }}
            </div>
      </div>
      <div id="praweWyszukiwanie" class="col-md-3">

            <div class="form-group">
                    {{ Form::label('nip', 'NIP:') }}
                    {{ Form::text('nip', old('nip'), ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                    {{ Form::label('adres', 'Adres') }}
                    {{ Form::text('adres', old('adres'), ['class'=>'form-control']) }}
            </div>
</div>

        <div id="praweWyszukiwanie" class="col-md-3">

              <div class="form-group">
                      {{ Form::label('kod', 'Kod Pocztowy') }}
                      {{ Form::text('kod', old('kod'), ['class'=>'form-control']) }}
              </div>
              <div class="form-group">
                      {{ Form::label('poczta', 'Poczta') }}
                      {{ Form::text('poczta', old('poczta'), ['class'=>'form-control']) }}
              </div>


            </div>
        <div class="modal-footer">
            {!! Form::submit('Szukaj',['class' => 'btn btn-success']) !!}
        </div>
      </div>
    </fieldset>
    </div>
  {{ Form::close() }}
  <div class="panel-body">

  	<table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Imie</th>
              <th>Nazwisko</th>
              <th>Telefon</th>
              <th>Email</th>
              <th>NIP</th>
              <th>Adres</th>
              <th>Kod Pocztowy</th>
              <th>Poczta</th>
              <th>Zarządzaj</th>
            </tr>
          </thead>

          <tbody>
          @foreach ($klienci as $klient)
            <tr>
              <td>{{$klient->id}}</td>
              <td>{{$klient->imie}}</td>
              <td>{{$klient->nazwisko}}</td>
              <td>{{$klient->telefon}}</td>
              <td>{{$klient->email}}</td>
              <td>{{$klient->nip}}</td>
              <td>{{$klient->adres}}</td>
              <td>{{$klient->kod}}</td>
              <td>{{$klient->poczta}}</td>

                {{-- <a class="edycja" role="button" type="button" id={{$klient->id}}>
                      <span class="label label-success">Edytuj</span></a> --}}
                {{-- <a role="button" type="button" id={{$klient->id}} class="btn btn-success"></a> --}}
                {{-- <input id={{$klient->id}} type="button" value="edytuj" class="edycja"/> --}}
                {{-- <button class="btn btn-success btn-edit" data-id="{{$klient->id}}">Edytuj</button> --}}
                <td><a id ="edit-modal" class="button"
                      data-id="{{$klient->id}}"
                      data-imie="{{$klient->imie}}"
                      data-nazwisko="{{$klient->nazwisko}}"
                      data-telefon="{{$klient->telefon}}"
                      data-email="{{$klient->email}}"
                      data-nip="{{$klient->nip}}"
                      data-adres="{{$klient->adres}}"
                      data-kod="{{$klient->kod}}"
                      data-poczta="{{$klient->poczta}}">
        							<span class="btn btn-info"> Edytuj</span>
        						</a>
                <a id="usun" href={{ action('CustomersController@destroy', $klient->id) }}>
                     <span class="btn btn-danger">Usuń</span></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
          <a role="button" id="dodajKlienta" type="button" class="btn btn-success"style="float: right;">Dodaj nowego klienta</a>
  </div>
  </div>


  {{Form::open(['route'=>'customers.create', 'method'=>'GET', 'role'=>'form']) }}
      <div id = "responsive-modal" class = "modal" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h4>Dodaj nową sprawę</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    {{ Form::label('imie', 'Imię') }}
                    {{ Form::text('imie', old('imie'), ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('nazwisko', 'Nazwisko') }}
                    {{ Form::text('nazwisko', old('nazwisko'), ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('telefon', 'Nr Telefonu') }}
                    {{ Form::text('telefon', old('telefon'), ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'E-mail') }}
                    {{ Form::text('email', old('email'), ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('nip', 'NIP') }}
                    {{ Form::text('nip', old('nip'), ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('adres', 'Adres') }}
                    {{ Form::text('adres', old('adres'), ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('kod', 'Kod Pocztowy') }}
                    {{ Form::text('kod', old('kod'), ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('poczta', 'Poczta') }}
                    {{ Form::text('poczta', old('poczta'), ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>
                {!! Form::submit('Dodaj',['class' => 'btn btn-success']) !!}
            </div>
          </div>
        </div>
      </div>
      {{ Form::close() }}

        {!!Form::open(['route'=>['customers.update',1], 'method'=>'PUT', 'id'=>'updatemodal'])!!}
        <div id = "myModal" class = "modal fade" tabindex="-1" data-backdrop="static">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h4>Edytuj sprawę</h4>
                  <div class="modal-body">
                  <div class="form-group">
                      {{ Form::label('_imie', 'Imię') }}
                      {{ Form::text('_imie', old('_imie'), ['class'=>'form-control']) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('_nazwisko', 'Nazwisko') }}
                      {{ Form::text('_nazwisko', old('_nazwisko'), ['class'=>'form-control']) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('_telefon', 'Nr Telefonu') }}
                      {{ Form::text('_telefon', old('_telefon'), ['class'=>'form-control']) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('_email', 'E-mail') }}
                      {{ Form::text('_email', old('_email'), ['class'=>'form-control']) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('_nip', 'NIP') }}
                      {{ Form::text('_nip', old('_nip'), ['class'=>'form-control']) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('_adres', 'Adres') }}
                      {{ Form::text('_adres', old('_adres'), ['class'=>'form-control']) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('_kod', 'Kod Pocztowy') }}
                      {{ Form::text('_kod', old('_kod'), ['class'=>'form-control']) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('_poczta', 'Poczta') }}
                      {{ Form::text('_poczta', old('_poczta'), ['class'=>'form-control']) }}
                  </div>
              </div>
              <div class="modal-footer">

                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  <button type="button" class="btn btn default" data-dismiss="modal">Anuluj</button>
                  {!! Form::submit('Aktualizuj',['class' => 'btn btn-info']) !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      {{ Form::close() }}
@endsection

@section('js')
  {!! Html::script('js/admin/customers.js') !!}
@endsection
