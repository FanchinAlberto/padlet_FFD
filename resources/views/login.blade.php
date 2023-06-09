<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <body>
      <div class="row justify-content-md-center mt-5 mb-5">
      <div class="col-md-auto">
         <style>
            .rounded-t-5 {
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            }
            @media (min-width: 992px) {
            .rounded-tr-lg-0 {
            border-top-right-radius: 0;
            }
            .rounded-bl-lg-5 {
            border-bottom-left-radius: 0.5rem;
            }
            }
         </style>
         <div class="card mb-3">
            <div class="row g-0 d-flex align-items-center text-center">
               <div class="col-lg-4 d-none d-lg-flex">
                  <img src="https://mycalcas.com/wp-content/uploads/2022/02/padlet.png" alt="SAS"
                     class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
               </div>
               <div class="col-lg-8">
                  <div class="card-body py-5 px-md-5">
                     
                     <form method="POST">
					 @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                           <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required/>
                           <label class="form-label" for="exampleInputEmail1">Email address</label>
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                           <input type="password" name="password"id="exampleInputPassword1" placeholder="Password" required class="form-control" />
                           <label class="form-label" for="exampleInputPassword1">Password</label>
                        </div>
                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                           <div class="col d-flex justify-content-center">
                              <!-- Checkbox -->
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                 <label class="form-check-label" for="form2Example31"> Remember me </label>
                              </div>
                           </div>
                           <div class="col">
                              <!-- Simple link -->
                              <a href="#!">Forgot password?</a>
                           </div>
                        </div>
                        <div class="col">
                           <!-- Simple link -->
                           Don't have an account yet?<a href="{{route('register')}}"> Sign up</a>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4 mt-2">Sign in</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </main>
   </body>
</html>

