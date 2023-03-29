<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
 </head>
    <body>
        <main class="container">
        <h6>Crea in</h6>
        <h1>{{strstr(Session::get('user')->email,'@',true)}}</h1>
       
        Scegli un formato<br>
          Non temere, poi potrai sempre cambiare questa impostazione. Hover to preview.
        </div>
        <form id="new-padlet">
            @csrf()
            <select name="type">
              <option>Tela</option>
              <option>Timeline</option>
              <option>Griglia</option>
              <option>Lista</option>
              <option>Muro</option>
              <option>Mappa</option>
            </select>
            <button type="submit">+</button>
        </form>
    </main>
          <script>
          (() => {
            let form = document.getElementById("new-padlet");
          
            form.addEventListener("submit", (e) => {
              e.preventDefault();
              const formData = new FormData(form);
              console.log(formData);
              fetch("{{ route('create-padlet') }}", {
                method: "POST",
                body:formData
              })
                .then((response) => response.text())
                .then((result) => {
                  console.log("Success:", result);
                  console.log(result['id']);
                  let jsonresult=JSON.parse(result);
                    var url = "{{ route('padlet', ':id') }}";
                    url = url.replace(':id', jsonresult['id']);
                    location.href = url;
                })
                .catch((error) => {
                  console.error("Error:", error);
                });
            });
          })();
        </script>
    </body>
    
</html>