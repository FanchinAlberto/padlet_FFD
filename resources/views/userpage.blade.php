<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   
    <body>
        <h1>Titilo</h1>
        @if(Session::get('logged'))
            <div>si
            </div>
        @endif
    </body>
</html>