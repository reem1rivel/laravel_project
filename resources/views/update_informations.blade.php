<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل بيانات المستخدم</title>
</head>
<body>

 @if (session('success'))
        <div style="color: green; font-weight: bold; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <h1>تعديل بيانات المستخدم</h1>

    <form method="POST" action="{{ route('update', $edit_info->id) }}">
        @csrf
        @method('PUT')

        <label for="username">اسم المستخدم:</label><br>
        <input type="text" id="username" name="username" value="{{ $edit_info->username }}" required><br><br>

        <label for="age">العمر:</label><br>
        <input type="number" id="age" name="age" value="{{ $edit_info->age }}" required><br><br>

        <label for="password">كلمة المرور الجديدة (اختياري):</label><br>
        <input type="password" id="password" name="password"><br><br>

        <button type="submit">تحديث البيانات</button>
    </form>

</body>
</html>