<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Students Index</h2>
  <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>
  <div>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    <a href="{{ route('students.create') }}" class="btn btn-secondary">Export</a>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th width=10%>id</th>
        <th width=60%>Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

        {{-- blade --}}
      @foreach ($data as $value)
      <tr>
        <td>{{ $value['id'] }}</td>
        <td>{{ $value['name'] }}</td>
        <th>
            <a href="{{ route('students.edit', ['student' => $value['id']]) }}" class="btn btn-warning">Edit</a>
        </th>
      </tr>
        @endforeach

        {{-- 原生php --}}

        <?php foreach ($data as $value) :?>
        <?php endforeach; ?>
        
    </tbody>
  </table>
</div>

</body>
</html>
