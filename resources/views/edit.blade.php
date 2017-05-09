<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

              
        <!-- Styles -->
        <style>
           
body {
  min-height: 100%;
  margin: 0;
  padding: 0;
  font: 400 1.4rem 'Lato', Verdana, Helvetica, sans-serif;
}

* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

#wrapper {
  width: 100%;
  margin: 0;
  padding: 0;
}

.container {
  width: 80%;
  margin: 0 auto;
}
section button {
  margin: 0 auto;
  font-size: 2.0rem;
  padding: 1.25rem 2.5rem;
  display: block;
  background-color: #009ac9;
  border: 1px solid transparent;
  color: #ffffff;
  font-weight: 300;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

section button:hover {
  background-color: #ffffff;
  color: #009ac9;
  border-color: #009ac9;
}


        </style>
    </head>
    <body>
        <div class="container">
<br><Br>
  <section>
<a href="{{url('/profile/edit',Auth::user()->id)}}"><button id="js-trigger-overlay" type="button">Edit Profile</button></a> 
  </section>
  <br><Br>
  <section>
<a href="{{url('/akses/edit',Auth::user()->id)}}"><button id="js-trigger-overlay" type="button">Edit Alamat Bank Sampah</button></a> 
  </section>
  </div>
    </body>
</html>
