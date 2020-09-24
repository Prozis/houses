@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>

</div>
@endif

@if(session('succes'))
  <div class="alert alert-success">
    {{ session('succes')}}

  </div>
@endif
