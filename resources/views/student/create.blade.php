<!DOCTYPE html>
<html lang="en">

<head>
  <title>新增學生</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container mt-3">
    <h2>新增學生</h2>
    <form action="{{route('students.store')}}" method="POST">
      @csrf
      <div class="mb-3 mt-3">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" placeholder="輸入姓名" name="name">
      </div>
      <div class="mb-3 mt-3">
        <label for="phone">電話</label>
        <input type="text" class="form-control" id="phone" placeholder="輸入電話" name="phone">
      </div>
      <button type="submit" class="btn btn-primary">送出</button>
    </form>
  </div>

</body>

</html>