<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <h2>編輯學生 {{$data->id}}</h2>
        <form action="{{route('students.update', ['student' => $data['id']])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="name">姓名</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{$data->name}}">
            </div>
            <div class="mb-3 mt-3">
                <label for="phone">電話</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{$data->phoneRelation->phone_number ?? ''}}">
            </div>
            <div class="mb-3 mt-3">
                <label for="hobbies">興趣</label>
                <input type="text" class="form-control" id="hobbies" name="hobbies"
                    value="{{$data->hobbyString ?? ''}}">
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
    </div>
</body>

</html>