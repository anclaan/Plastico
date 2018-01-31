@extends('admin.main')

@section('title', '| Produkty')

@section('content')

<h2>Produkty</h2>
<div class="panel-body">
	<table class="table table-striped table-bordered" id="tabelaProduktow">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nazwa</th>
        <th>Typ produktu</th>
        <th>Opis</th>
        <th>Zarządzaj</th>
      </tr>
    </thead>

    <tbody>
    @foreach ($produkty as $produkt)

      <tr>
        <td>{{$produkt->id}}</td>
        <td>{{$produkt->nazwa}}</td>
        <td>{{$produkt->typ['nazwa']}}</td>
        <td>{{$produkt->opis}}</td>
        <td style="width:128px;">
          <a id ="edit-modal" class="button"
                data-id="{{$produkt->id}}"
                data-nazwa="{{$produkt->nazwa}}"
                data-typ="{{$produkt->typ['nazwa']}}"
                data-opis="{{$produkt->opis}}">
                <span class="btn btn-info"> Edytuj</span>
            </a>
            <a href={{ action('ProductsController@destroy', $produkt->id)}}>
               <span class="btn btn-danger">Usuń</span</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <a id="dodajProdukt" role="button" type="button" class="btn btn-success"style="float: left;">Dodaj nowy produkt</a>
</div>




{{Form::open(['route'=>'products.create', 'method'=>'GET', 'role'=>'form']) }}
<div id = "responsive-modal" class = "modal" tabindex="-1" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4>Dodaj nowy produkt</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
              {{ Form::label('nazwa', 'Nazwa produktu') }}
              {{ Form::text('nazwa', old('nazwa'), ['class'=>'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('typy', 'Typ produktu') }}
            {!! Form::select('typy', $typy, null,['class' => 'form-control'] ) !!}
          </div>
          <div class="form-group">
              {{ Form::label('opis', 'Opis produktu') }}
              {{ Form::textarea('opis', old('opis'), ['class'=>'form-control']) }}
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

{!!Form::open(['route'=>['products.update',1], 'method'=>'PUT', 'id'=>'updatemodal'])!!}
<div id = "myModal" class = "modal fade" tabindex="-1" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4>Edycja produktu</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
              {{ Form::label('_nazwa', 'Nazwa produktu') }}
              {{ Form::text('_nazwa', old('_nazwa'), ['class'=>'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::label('_typy', 'Typ produktu') }}
            {!! Form::select('_typy', $typy, null,['class' => 'form-control'] ) !!}
          </div>
          <div class="form-group">
              {{ Form::label('_opis', 'Opis produktu') }}
              {{ Form::textarea('_opis', old('_opis'), ['class'=>'form-control']) }}
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
{{ Form::close() }}
@endsection

@section('js')
  {!! Html::script('js/admin/products.js') !!}
@endsection
