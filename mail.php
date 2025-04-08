<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = htmlspecialchars($_POST['name']);
    $guests = htmlspecialchars($_POST['guests']);
    $message = htmlspecialchars($_POST['message']);

    // Email của admin (địa chỉ nhận thư)
    $to = "admin@example.com"; // Thay bằng email của bạn

    // Tiêu đề email
    $subject = "Tin nhắn mới từ biểu mẫu Sổ lưu bút";

    // Nội dung email
    $body = "Bạn nhận được một tin nhắn mới từ website:\n\n";
    $body .= "Họ tên: " . $name . "\n";
    $body .= "Tham dự: " . $guests . "\n";
    $body .= "Lời chúc: " . $message . "\n";

    // Header email
    $headers = "From: no-reply@yourwebsite.com\r\n"; // Thay bằng email gửi
    $headers .= "Reply-To: no-reply@yourwebsite.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Gửi email
    if (mail($to, $subject, $body, $headers)) {
        // Trả về thông báo thành công
        echo "<script>alert('Cảm ơn bạn đã gửi thư cho chúng mình.'); window.location.href='index.html';</script>";
    } else {
        // Trả về thông báo lỗi
        echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại sau.'); window.history.back();</script>";
    }
} else {
    // Nếu không phải phương thức POST, chuyển hướng về trang chủ
    header("Location: index.html");
    exit();
}
?>

