<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            max-width: 600px;
            margin: auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control, .form-select {
            border-radius: 8px;
        }

        img {
            border-radius: 8px;
            max-width: 150px;
            display: block;
            margin: 10px auto;
        }

        .btn {
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card p-4">
            <h2 class="text-center text-primary mb-4">Sửa thông tin sinh viên</h2>

            <?php $student = $result->fetch(PDO::FETCH_ASSOC); ?>

            <form action="index.php?action=update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="MaSV" value="<?php echo htmlspecialchars($student['MaSV']); ?>">
                <input type="hidden" name="HinhCu" value="<?php echo htmlspecialchars($student['Hinh']); ?>">

                <div class="mb-3">
                    <label for="HoTen" class="form-label fw-bold">Họ tên</label>
                    <input type="text" class="form-control" id="HoTen" name="HoTen"
                        value="<?php echo htmlspecialchars($student['HoTen']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="GioiTinh" class="form-label fw-bold">Giới tính</label>
                    <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                        <option value="Nam" <?php echo $student['GioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                        <option value="Nữ" <?php echo $student['GioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="NgaySinh" class="form-label fw-bold">Ngày sinh</label>
                    <input type="date" class="form-control" id="NgaySinh" name="NgaySinh"
                        value="<?php echo htmlspecialchars($student['NgaySinh']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="Hinh" class="form-label fw-bold">Hình ảnh</label>
                    <?php if ($student['Hinh']): ?>
                        <img src="<?php echo htmlspecialchars($student['Hinh']); ?>" alt="Hình sinh viên">
                    <?php endif; ?>
                    <input type="file" class="form-control mt-2" id="Hinh" name="Hinh">
                </div>

                <div class="mb-3">
                    <label for="MaNganh" class="form-label fw-bold">Ngành học</label>
                    <select class="form-select" id="MaNganh" name="MaNganh" required>
                        <option value="CNTT" <?php echo $student['MaNganh'] == 'CNTT' ? 'selected' : ''; ?>>Công nghệ thông tin</option>
                        <option value="QTKD" <?php echo $student['MaNganh'] == 'QTKD' ? 'selected' : ''; ?>>Quản trị kinh doanh</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="index.php?action=index" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
