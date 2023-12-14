<?php
$ten_tep_tin = "allproduc.txt";

// Kiểm tra xem tệp tin tồn tại không
if (file_exists($ten_tep_tin)) {
    // Mở tệp tin với chế độ đọc và ghi ('r+')
    $tep_tin = fopen($ten_tep_tin, "r+");

    // Kiểm tra xem mở tệp tin có thành công không
    if ($tep_tin) {
        // Đọc nội dung từ tệp tin
        $noidung = fread($tep_tin, filesize($ten_tep_tin));

        // Kiểm tra xem nội dung có tồn tại không
        if ($noidung !== false) {
            // Loại bỏ khoảng trắng giữa dấu ><
            $noidung = preg_replace('/>\s*</', '><', $noidung);

            // Loại bỏ khoảng trắng trước hoặc sau dấu {} và ; và .
            $noidung = preg_replace('/\s*([{};:\.])\s*/', '$1', $noidung);

            // Đặt con trỏ về đầu tệp tin để ghi lại nội dung
            fseek($tep_tin, 0);

            // Ghi lại nội dung đã được xử lý vào tệp tin
            fwrite($tep_tin, $noidung);

            // Cắt bớt nội dung nếu tệp tin mới ngắn hơn tệp tin gốc
            ftruncate($tep_tin, ftell($tep_tin));

            echo "Xử lý và ghi tệp tin thành công.";
        } else {
            echo "Không thể đọc nội dung từ tệp tin.";
        }

        // Đóng tệp tin
        fclose($tep_tin);
    } else {
        echo "Không thể mở tệp tin.";
    }
} else {
    echo "Tệp tin không tồn tại.";
}
?>
