<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom Theme Style -->
    <link href="{{ ('../../build/css/custom.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
  

    <title>Koperasi </title>
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="/login">
            {{ csrf_field() }}
            <h1>Login Form</h1>
            @error('nama') 
            <div class="alert alert-danger mt-2 mr-3 ml-3" role="alert">
            {{ $message }}
            </div>
            @enderror
            @error('password') 
            <div class="alert alert-danger mt-2 mr-3 ml-3" role="alert">
            {{ $message }}
            </div>
            @enderror
              <div>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"/>
              </div>
              <div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Log in</button>
              </div>


       
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
