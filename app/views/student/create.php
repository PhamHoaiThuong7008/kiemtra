<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên mới</title>
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
            text-align: center;
        }
        .preview-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            display: none;
            border: 1px solid #ccc;
            padding: 5px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">Thêm sinh viên mới</div>
            <div class="card-body">
                <form action="index.php?action=store" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    
                    <!-- Mã sinh viên -->
                    <div class="mb-3">
                        <label for="MaSV" class="form-label">📌 Mã sinh viên</label>
                        <input type="text" class="form-control" id="MaSV" name="MaSV" required>
                    </div>

                    <!-- Họ tên -->
                    <div class="mb-3">
                        <label for="HoTen" class="form-label">👤 Họ tên</label>
                        <input type="text" class="form-control" id="HoTen" name="HoTen" required>
                    </div>

                    <!-- Giới tính -->
                    <div class="mb-3">
                        <label for="GioiTinh" class="form-label">⚤ Giới tính</label>
                        <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                            <option value="Nam">🧑 Nam</option>
                            <option value="Nữ">👩 Nữ</option>
                        </select>
                    </div>

                    <!-- Ngày sinh -->
                    <div class="mb-3">
                        <label for="NgaySinh" class="form-label">📅 Ngày sinh</label>
                        <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
                    </div>

                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="Hinh" class="form-label">🖼️ Hình ảnh</label>
                        <input type="file" class="form-control" id="Hinh" name="Hinh" accept="image/*" onchange="previewImage()">
                        <img id="preview" class="preview-img">
                    </div>

                    <!-- Ngành học -->
                    <div class="mb-3">
                        <label for="MaNganh" class="form-label">🎓 Ngành học</label>
                        <select class="form-select" id="MaNganh" name="MaNganh" required>
                            <option value="">-- Chọn ngành học --</option>
                            <option value="CNTT">💻 Công nghệ thông tin</option>
                            <option value="QTKD">📈 Quản trị kinh doanh</option>
                        </select>
                    </div>

                    <!-- Nút bấm -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">✔️ Thêm sinh viên</button>
                        <a href="index.php?action=index" class="btn btn-secondary">🔙 Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Hiển thị ảnh xem trước khi tải lên
        function previewImage() {
            var file = document.getElementById("Hinh").files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("preview").src = e.target.result;
                    document.getElementById("preview").style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        }

        // Kiểm tra form trước khi submit
        function validateForm() {
            var maSV = document.getElementById("MaSV").value.trim();
            var hoTen = document.getElementById("HoTen").value.trim();
            var ngaySinh = document.getElementById("NgaySinh").value;
            var maNganh = document.getElementById("MaNganh").value;

            if (maSV === "" || hoTen === "" || ngaySinh === "" || maNganh === "") {
                alert("Vui lòng nhập đầy đủ thông tin!");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
