<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border: 1px solid #007bff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 20px;
            font-weight: bold;
        }
        .student-image {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4 text-primary">Thông tin sinh viên</h1>

        <?php 
        $student = $result->fetch(PDO::FETCH_ASSOC);
        if (!$student) {
            die("<div class='alert alert-danger'>Không tìm thấy dữ liệu sinh viên!</div>");
        }
        ?>

        <div class="card">
            <div class="card-header text-center">Chi tiết sinh viên</div>
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Cột 1: Ảnh sinh viên -->
                    <div class="col-md-4 text-center">
                        <?php if ($student['Hinh']): ?>
                            <img src="<?php echo htmlspecialchars($student['Hinh']); ?>" 
                                 alt="Hình sinh viên" 
                                 class="student-image img-fluid mb-3">
                        <?php else: ?>
                            <p class="text-muted">Không có ảnh</p>
                        <?php endif; ?>
                    </div>

                    <!-- Cột 2: Thông tin sinh viên -->
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th class="text-secondary">📌 Mã sinh viên:</th>
                                <td><?php echo htmlspecialchars($student['MaSV']); ?></td>
                            </tr>
                            <tr>
                                <th class="text-secondary">👤 Họ tên:</th>
                                <td><?php echo htmlspecialchars($student['HoTen']); ?></td>
                            </tr>
                            <tr>
                                <th class="text-secondary">⚤ Giới tính:</th>
                                <td>
                                    <?php echo ($student['GioiTinh'] == "Nam") ? "🧑 Nam" : "👩 Nữ"; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-secondary">📅 Ngày sinh:</th>
                                <td><?php echo htmlspecialchars($student['NgaySinh']); ?></td>
                            </tr>
                            <tr>
                                <th class="text-secondary">🎓 Ngành học:</th>
                                <td><?php echo htmlspecialchars($student['TenNganh']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="index.php?action=edit&id=<?php echo $student['MaSV']; ?>" class="btn btn-warning">✏️ Sửa thông tin</a>
            <a href="index.php?action=index" class="btn btn-secondary">🔙 Quay lại danh sách</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
