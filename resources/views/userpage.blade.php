<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <body>
        <h1>Titolo</h1>
        <button onclick="partecipaForm()">partecipa ad un padlet</button>
        <div><a href='{{route("create-padlet")}}'>crea un padlet</a></div>
        <div id="container-all">
        @if(Session::get('logged'))
        
        @foreach($padlet as $pad)
        @if($pad->user_id==Session::get('user')->id)
        <div><a href="{{ route('padlet', $pad->id)}}">
        <div style="height: 200px;  width:200px; background-color: rgb({{substr($pad->color,strpos($pad->color,'r')+1,strpos($pad->color,'g')-1)}},{{substr($pad->color,strpos($pad->color,'g')+1,strpos($pad->color,'b')-strpos($pad->color,'g')-1)}},{{substr($pad->color,strpos($pad->color,'b')+1)}});">
        </div>
            <div>
                {{$pad->name}}{{strstr(Session::get('user')->email,'@',true)}}{{$pad->created_at}}
            </div>
        </a></div>
        @endif
            @endforeach
        @endif
        </div>
    </body>
    <script>
      function partecipaForm(){
        let div=document.createElement('div');
            div.id="container";
            document.getElementById('container-all').appendChild(div);
            let divTop=document.createElement('div');
            div.style.backgroundColor="grey";
            div.style.height="200px";
            div.style.width="400px";
            div.style.cssFloat="top";
            div.style.marginTop="15%";
            div.style.display="flex";
           
            //divTop.style.justifyContent="center";
           
            let form=document.createElement('form');
            let buttonPublish=document.createElement('button');
            div.appendChild(form);
            form.appendChild(buttonPublish);
            buttonPublish.style.borderRadius="50%";
            buttonPublish.textContent="Invia";
            buttonPublish.type="submit";
            //InsertPost(form);
            let input=document.createElement('input');
            form.appendChild(input);
            input.placeholder="Oggetto";
            input.style.marginTop="5%";
            input.style.border=0;
            input.name="content";
            let buttonX=document.createElement('button');
            form.appendChild(buttonX);
            buttonX.style.borderRadius="50%";
            buttonX.textContent="annulla";
            buttonX.style.marginRight="50%";
            cancelDivPartecipa(buttonX, div);
           
      }
      function cancelDivPartecipa(button, div){
            button.addEventListener("click", function() {
                document.getElementById('container-all').removeChild(div);
            });
    }
    function route(button){
        button.addEventListener("click", function() {
            var url = document.getElementByName('content').value;
                    
                    location.href = url;
            });
    }
    </script>
</html>