<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .student-list {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .student-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .student-item:last-child {
            border-bottom: none;
        }

        .student-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }

        .student-info {
            flex-grow: 1;
        }

        .student-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .student-meta {
            font-size: 14px;
            color: #666;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="student-list">
            <h2 class="text-center text-primary mb-3">Danh sách sinh viên</h2>

            <div class="d-flex justify-content-end mb-3">
                <a href="index.php?action=create" class="btn btn-success">➕ Thêm sinh viên</a>
            </div>

            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="student-item">
            <img src="uploads/<?php echo htmlspecialchars($row['Hinh'] ?: 'default-avatar.jpg'); ?>" 
     class="student-avatar" 
     alt="Hình sinh viên">


                <div class="student-info">
                    <div class="student-name">
                        <?php echo htmlspecialchars($row['HoTen']); ?>  
                        <?php echo ($row['GioiTinh'] === 'Nam') ? '♂️' : '♀️'; ?>
                    </div>
                    <div class="student-meta">
                        Mã SV: <?php echo htmlspecialchars($row['MaSV']); ?> |
                        Ngành: <?php echo htmlspecialchars($row['TenNganh']); ?>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="index.php?action=show&id=<?php echo $row['MaSV']; ?>" class="btn btn-info btn-sm">📄</a>
                    <a href="index.php?action=edit&id=<?php echo $row['MaSV']; ?>" class="btn btn-warning btn-sm">✏️</a>
                    <a href="index.php?action=delete&id=<?php echo $row['MaSV']; ?>" 
                       class="btn btn-danger btn-sm" 
                       onclick="return confirm('Bạn có chắc chắn muốn xóa?')">🗑️</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
