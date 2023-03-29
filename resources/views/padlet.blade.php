<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body style="background-color: rgb({{substr($padlet->color,strpos($padlet->color,'r')+1,strpos($padlet->color,'g')-1)}},{{substr($padlet->color,strpos($padlet->color,'g')+1,strpos($padlet->color,'b')-strpos($padlet->color,'g')-1)}},{{substr($padlet->color,strpos($padlet->color,'b')+1)}});">
        {{$padlet->name}}
        <div id="container-all" style="">
            @foreach ($posts as $p)
              @if($p->padlet_id==$padlet->id)
              
                <div>{{$p->content}}</div>
                
                @endif
            @endforeach
        </div>
        
        <button onclick="createDivInsertPost()">+
        </button>
        
        <script>
           function createDivInsertPost(){
            let div=document.createElement('div');
            div.id="container";
            document.getElementById('container-all').appendChild(div);
            let divTop=document.createElement('div');
            div.style.backgroundColor="white";
            div.style.height="400px";
            div.style.width="300px";
            div.style.cssFloat="right";
            div.style.marginTop="15%";
            div.style.width="max";
            div.style.display="flex";
          
            let buttonX=document.createElement('button');
            
            buttonX.style.borderRadius="50%";
            buttonX.textContent="X";
            buttonX.style.marginRight="50%";
            cancelDivInsertPost(buttonX, div);
            let form=document.createElement('form');
            let buttonPublish=document.createElement('button');
            div.appendChild(form);
            form.appendChild(buttonX);
            form.appendChild(buttonPublish);

            buttonPublish.style.borderRadius="50%";
            buttonPublish.textContent="Pubblica";
            buttonPublish.type="submit";
            InsertPost(form);
            let input=document.createElement('input');
            form.appendChild(input);
            input.placeholder="Oggetto";
            input.style.marginTop="5%";
            
            input.style.border=0;
            input.name="content";
            let inputFile=document.createElement('input');
            form.appendChild(inputFile);
            inputFile.type="file";
            inputFile.style.marginTop="5%";
            
            inputFile.style.border=0;
            inputFile.name="content-file";
           }
           
           function cancelDivInsertPost(button, div){
            button.addEventListener("click", function() {
                document.getElementById('container-all').removeChild(div);
            });
           }
           function InsertPost(form){
            form.addEventListener("submit", (e) => {
                
              e.preventDefault();
              const formData = new FormData(form);
              let token=document.head.querySelector('meta[name="csrf-token"]').content;
              console.log(token);
              console.log(formData);
              fetch("{{ route('padlet',$padlet->id) }}", {
                headers:{ 'X-CSRF-TOKEN': token},
                method: "POST",
                body:formData
              })
                .then((response) => response.text())
                .then((result) => {
                  console.log("Success:", result);
                 
                })
                .catch((error) => {
                  console.error("Error:", error);
                });
            });
            }
           
        </script>
    </body>
    
</html>