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
    <h2>學生資料表</h2>
    <p>這個表格顯示所有學生的姓名</p>
    <div>
      <a href="{{ route('students.create') }}" class="btn btn-primary">新增學生</a>
      <a href="{{ route('students.create') }}" class="btn btn-secondary">匯出</a>
    </div>
    <br>
    <table class="table table-bordered" style="text-align:center">
      <thead>
        <tr>
          <th width=10%>編號</th>
          <th width=20%>姓名</th>
          <th width=20%>電話</th>
          <th width=30%>興趣</th>
          <th width=20%>操作</th>
        </tr>
      </thead>
      <tbody>

        {{-- blade --}}
        @foreach ($data as $value)
          <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->phoneRelation->phone_number ?? '' }}</td>
            <td>
              @foreach ($value->hobbiesRelation as $hobby)
                <span class="badge bg-secondary">{{ $hobby->hobby_name }}</span>
              @endforeach
            </td>

            <th>
              <a href="{{ route('students.edit', ['student' => $value->id]) }}" class="btn btn-warning">編輯</a>
              <form action="{{ route('students.destroy', ['student' => $value->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('確定要刪除這筆資料嗎？')">刪除</button>
              </form>
            </th>
          </tr>
        @endforeach

        {{-- 原生php --}}

        <?php foreach ($data as $value):?>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>

</body>

</html>