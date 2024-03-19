<?php
// Khởi tạo session
session_start();

// Mảng dữ liệu người dùng giả lập
$users = [
  [
    'email' => 'laptrinhtrung@gmail.com',
    'password' => '123',
  ],
  [
    'email' => 'example2@gmail.com',
    'password' => 'password2',
  ],
];

// Xử lý dữ liệu đăng nhập
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Tìm kiếm người dùng trong mảng
  $user = array_filter($users, function ($user) use ($email, $password) {
    return $user['email'] === $email && $user['password'] === $password;
  });

  // Nếu đăng nhập thành công
  if ($user) {
    // Lưu thông tin người dùng vào session
    $_SESSION['user_id'] = $user[0]['email'];
    $_SESSION['username'] = $user[0]['username'];

    // Chuyển hướng đến trang đăng nhập thành công
    header('Location: success.php');
    exit();
  } else {
    // Thông báo lỗi đăng nhập
    echo "<p style='color: red'>Đăng nhập không thành công!</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
</head>
<body>
  <h1>Đăng nhập</h1>
  <form method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Mật khẩu:</label>
    <input type="password" name="password" id="password" required>
    <br><br>
    <button type="submit" name="submit">Đăng nhập</button>
  </form>
</body>
</html>

