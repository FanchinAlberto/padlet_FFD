<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <body>
      <div id="container-all">
         <section class="text-center text-lg-start">
            <style>
               .cascading-right {
               margin-right: -50px;
               }
               @media (max-width: 991.98px) {
               .cascading-right {
               margin-right: 0;
               }
               }
            </style>
            <!-- Jumbotron -->
            <div class="container py-4">
               <div class="row g-0 align-items-center">
                  <div class="col-lg-6 mb-5 mb-lg-0">
                     <div class="card cascading-right" style="
                        background: hsla(0, 0%, 100%, 0.55);
                        backdrop-filter: blur(30px);
                        ">
                        <div class="card-body p-5 shadow-5 text-center">
                           <h2 class="fw-bold mb-5">Sign up now</h2>
                           <form action="{{ route('do-register') }}" method="POST">
                              @csrf
                              <!-- Email input -->
                              <div class="form-outline mb-4">
                                 <input type="email" name="email" placeholder="hello@example.com" required class="form-control" />
                                 <label class="form-label" for="email">Email address</label>
                              </div>
                              <!-- Password input -->
                              <div class="form-outline mb-4">
                                 <input type="password" name="password" placeholder="*******" required class="form-control" />
                                 <label class="form-label" for="password">Password</label>
                              </div>
                              <div class="col">
                                 <!-- Simple link -->
                                 Already have an account?<a href="{{route('login')}}"> Sign in</a>
                              </div>
                              <!-- Submit button -->
                              <button type="submit" class="btn btn-primary btn-block mb-4 mt-2">
                              Sign up
                              </button>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 mb-5 mb-lg-0">
                     <img src="https://mycalcas.com/wp-content/uploads/2022/02/padlet.png" class="w-100 rounded-4 shadow-4"
                        alt="" />
                  </div>
               </div>
            </div>
            <!-- Jumbotron -->
         </section>
      </div>
   </body>
</html>
