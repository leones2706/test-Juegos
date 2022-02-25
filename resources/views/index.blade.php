<!doctype html>
<head>
    <title>Laravel CRUD Juegos Casino</title>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <style>
        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <h3 class="text-center text-danger"><b>Laravel CRUD TEST Casino Juegos</b></h3>
        <a href="/create" type="button" class="btn btn-success">Add Nuevo juego</a>
    </div>
    <br>
    @if(session()->has('success'))
        <div class="alert alert-success col-md-12">{{ session()->get('success') }}</div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>URL Juego</th>
            <th>Imagen</th>
            <th>Estado</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->name }}</td>
                <td>{{ $post->descrip }}</td>
                <td>
                    <a href="{{URL::to($post->urlgame)}}">{{Str::limit($post->urlgame, 20)}}</a>
                </td>
                <td>
                    <a href="{{URL::to($post->urlimage)}}"><img src={{$post->urlimage}} alt="urlimagen"></a>
                </td>
                <td>
                    <input data-id="{{$post->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                           data-offstyle="danger" data-toggle="toggle" data-on="Active"
                           data-off="In-Active" {{ $post->status ==1 ? 'checked' : '' }}>
                </td>
                <td>
                    <a href="/edit/{{ $post->id }}" type="button" class="btn btn-primary">Actualizar</a>
                </td>
                <td>
                    <a href="/delete/{{$post->id}}" onclick="return confirm('¿Esta seguro de eliminar este juego?')" type="button" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
<script>
    $(function () {
        $('.toggle-class').change(function () {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var game_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/status/update',
                data: {'status': status, 'id': game_id},
                success: function (data) {
                    console.log(data.success)
                }
            });
        })
    });
</script>
</html>
