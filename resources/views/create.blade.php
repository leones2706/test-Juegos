<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel CRUD Juegos Casino</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h3 class="text-center text-danger"><b>Add Nuevo juego</b> </h3>
				     <div class="form-group">
                        <form action="/post" method="post">
                         @csrf
                             <input type="text" name="nombre" class="form-control m-2" placeholder="Nombre del Juego">
                             <Textarea name="descripcion" cols="20" rows="4" class="form-control m-2" placeholder="Descripción"></Textarea>
                                <label class="m-2">URL Imagen</label>
                             <input type="url" name="url_imagen" class="form-control m-2" placeholder="URL Imagen">
                                <label class="m-2">URL Juego</label>
                             <input type="url" name="url_juego" class="form-control m-2" placeholder="URL Juego">
                            <button type="submit" class="btn btn-danger mt-3 ">Enviar</button>
                        </form>
                     </div>
                </div>
              </div>
            </div>
         </body>
</html>



