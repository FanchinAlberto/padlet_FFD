<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   
    <body>
      
        <main class="container">
            <div><a href="{{route('register')}}">go to register</a></div>
            <div class="row justify-content-md-center mt-5 mb-5">
                <div class="col-md-auto">
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                        <div class="form-group mt-2 text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
               
            </div>
        </main>
    </body>
</html>