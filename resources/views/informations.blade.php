<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إدارة معلومات المستخدمين</title>
</head>
<body>

    @if (session('success'))
        <div style="color: green; font-weight: bold; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <h1>إضافة بيانات جديدة</h1>

    <form method="POST" action="{{ route('store') }}">
        @csrf
        <label for="username">اسم المستخدم:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="age">العمر:</label><br>
        <input type="number" id="age" name="age" required><br><br>

        <label for="password">كلمة المرور:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">إضافة</button>
    </form>

    <hr>

    <h3>User Informations</h3>

    <table border="1" cellpadding="10" cellspacing="0">
  
      <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Age</th>
                <th>Procedures</th>
            </tr>
        </thead>


        <tbody>
      
      @foreach ($infos as $info)

            <tr>
                
<td>{{ $info->id }}</td>
                <td>{{ $info->username }}</td>
                <td>{{ $info->age }}</td>
              
  <td>
                    <form method="POST" action="{{ route('delete', $info) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')" style="color:red;">حذف</button>
                    </form>
                    <a href="{{route('edit', $info->id)}}" style="margin-left: 10px;">تعديل</a> </td>

            </tr>
        
    @endforeach
        </tbody>


    </table>

</body>
</html>
