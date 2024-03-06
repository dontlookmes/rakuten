<?php
// Tên tệp tin cần xử lý
$inputFileName = 'page2.txt';

// Đọc nội dung từ tệp cũ
$content = file_get_contents($inputFileName);

// Sử dụng biểu thức chính quy để xóa khoảng trắng nằm giữa cặp dấu ><
$cleanedContent = preg_replace('/>(\s+)</', '><', $content);

// Tên tệp tin mới để ghi
$outputFileName = 'output.txt';

// Ghi nội dung đã được làm sạch vào tệp tin mới
file_put_contents($outputFileName, $cleanedContent);

echo 'Xử lý thành công!';
?>
