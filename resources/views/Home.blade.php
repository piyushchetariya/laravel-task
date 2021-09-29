
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<Html>  
<head>   
<title>  
Registration Page  
</title>  
</head>  
<body>  
<!-- 
@if(isset($data))
{{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('update',$data->id), 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
@else   
 {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'Storeuser', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
@endif-->
{{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'Storeuser', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <h2 class="mb-4">Add User</h2>
            
                            <div class="form-group">
                             <label for="exampleFormControlInput1">Name :</label>
                             <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name" name="name" value="{{isset($data)? $data->username:(old('username')!=''? old('username'):'')}}">
                            </div>
                            @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                            @if(isset($data))
                                  <div class="form-group">
                                  <label for="exampleFormControlInput1">Email :</label>
                                  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" value="{{$data->email}}" readonly>
                                  </div>
                                  @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                  
                            @else
                                  <div class="form-group">
                                  <label for="exampleFormControlInput1">Email :</label>
                                  <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                                  </div>
                                  @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                            @endif
                            

                            <div class="form-group">
                              <label for="exampleFormControlInput1">Mobile Number :</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="name@example.com" value="{{isset($data)? $data->mobile:(old('mobile')!=''? old('mobile'):'')}}">
                            </div>  
                            @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                            <div class="form-group">
                              <label for="exampleFormControlFile1">File :
                                @if(isset($data))
                                {{$data->document}}
                                @endif
                              </label>
                              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file[]" value="{{isset($data)? $data->document:(old('file')!=''? old('file'):'')}}" multiple>
                            </div>
                            @error('file')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                          <div class="form-group mb-3">
                            Country :
                              <select  id="country-dd" class="form-control" name="country">
                                  <option value="">Select Country</option>
                                  
                                @foreach ($countries as $d)
                          
                                  <option value="{{$d->id}}">
                                      {{$d->name}}
                                  </option>

                                  @endforeach
                              
                              </select>
                              @error('country')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                          </div>

                            <div class="form-group">
                              City :
                                <select id="city-dd" class="form-control" name="city">

                                </select>
                            </div>
                            @error('city')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror


@if(isset($data))
<input type="submit" value="Update">
@else
<input type="submit" value="Submit">
@endif
                  
                </div>
            </div>
        </div>
    {{ Form::close() }}




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('fetch-cities')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        console.log(idCountry);
                        $.each(result.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });                    }
                });
            });
        });

    </script>
</body>  
</html>  