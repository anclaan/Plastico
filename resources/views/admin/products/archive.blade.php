@extends('admin.main')

@section('title', '| Produkty')

@section('content')
<div style="border-bottom-style: solid;">
	<h1>Archiwum - produkty</h1>
</div>
<div class="panel-body">
	<table class="table table-striped table-bordered" id="tabelaProduktow" style="font-size: 15px;">
    <thead>
      <tr>
        <th>Nazwa</th>
        <th>Typ produktu</th>
        <th>Opis</th>
        <th>Zarządzaj</th>
      </tr>
    </thead>

    <tbody>
    @foreach ($produkty as $produkt)

      <tr>
        <td style="font-weight: bold;">{{$produkt->nazwa}}</td>
        <td>{{$produkt->typ['nazwa']}}</td>
        <td style="max-width: 800px;">{{$produkt->opis}}</td>
        <td style="width:128px;">
          <a id ="edit-modal" class="button"
                data-id="{{$produkt->id}}"
                data-nazwa="{{$produkt->nazwa}}"
                data-typ="{{$produkt->typ['nazwa']}}"
                data-opis="{{$produkt->opis}}">
                <span class="btn btn-info"> Edytuj</span>
            </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>





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
