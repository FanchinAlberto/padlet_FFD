<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   
    <body>
        
        <div id="container-all">
            <div><a href="{{route('login')}}">go to login</a></div>
            <form action="{{ route('do-register') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="hello@example.com" required/>
            <input type="password" name="password" placeholder="*******" required/>
            <button type="submit">Invia</button>
            </form>
        </div>
        
    </body>
</html>