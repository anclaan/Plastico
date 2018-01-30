@if (Session::has('success'))

  <div class="alert alert-success" role="alert">
      <Strong>Świetnie! </strong>{{Session::get('success')}}



  </div>
@endif
