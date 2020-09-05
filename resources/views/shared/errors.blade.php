@if($errors->has($name))
  <div class='alert alert_danger'>
    {{$errors->first($name)}}
  </div>
@endif
