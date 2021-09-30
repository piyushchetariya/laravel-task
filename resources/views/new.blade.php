<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
	<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<a href="{{route('homee')}}"><button type="button" class="btn btn-primary">ADD USERS</button></a>
<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>

<br>
{{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'searchuser', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
  <div class="form-group mb-2">
    <input type="text" class="form-control" id="filter" name="filter"  value="">
  </div>
  <button type="submit" class="btn btn-primary">Search</button>
  {{ Form::close() }}

<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Country</th>
      <th scope="col">City</th>
      <th scope="col">Document</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <tr>
    @if(count($cus)==0)
NO Data Available
@endif
    @foreach ($cus as $d)
      <td>{{$d->id}}</td>
      <td>{{$d->username}}</td>
      <td>{{$d->email}}</td>
      <td>{{$d->mobile}}</td>
      <td>{{$d->c}}</td>
      <td>{{$d->d}}</td>
      <td>{{$d->document}}</td>
      <td>
      <a href="{{route('edit',[$d->id])}}"><button type="button" class="btn btn-primary">Edit</button></a>
      <a href="{{route('delete',[$d->id])}}"><button type="button" class="btn btn-primary">Delete</button></a>
      </td>

    </tr>
    @endforeach
    <br>
  </tbody>
</table>
