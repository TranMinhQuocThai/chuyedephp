@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">  
    <!-- Banner Giới Thiệu -->
    <div class="text-center text-white py-5" style="background:  #383733;">
        <h1 class="fw-bold display-4">Về Chúng Tôi</h1>
        <p class="lead fs-4">Khám phá hành trình và giá trị của <strong>FoodStore</strong></p>
    </div>
    
    <!-- Nội dung giới thiệu -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('build/assets/about-us.jpg') }}" class="img-fluid rounded shadow-lg w-100" alt="Về chúng tôi">
            </div>
            <div class="col-md-6">
                <h2 class="text-black fw-bold"><b>Sứ mệnh của chúng tôi</b></h2>
                <p class="fs-5">
                    Tại <strong>FoodStore</strong>, chúng tôi cam kết mang đến cho bạn những món ăn, Đồ uống không chỉ ngon miệng mà còn đảm bảo an toàn, chất lượng. 
                    Mỗi nguyên liệu đều được tuyển chọn kỹ lưỡng, chế biến theo quy trình khép kín để giữ nguyên độ tươi ngon.
                </p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check-circle text-success"></i> Nguyên liệu sạch 100%</li>
                    <li><i class="fas fa-check-circle text-success"></i> Giao hàng nhanh chóng trong vòng 30 phút</li>
                    <li><i class="fas fa-check-circle text-success"></i> Đội ngũ đầu bếp chuyên nghiệp</li>
                    <li><i class="fas fa-check-circle text-success"></i> Dịch vụ chăm sóc khách hàng tận tâm</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Giá trị cốt lõi -->
    <div class="container my-5">
        <h2 class="text-center fw-bold text-black"><b>Giá trị cốt lõi</b></h2>
        <div class="row text-center">
            <div class="col-md-4">
                <i class="fas fa-seedling fa-3x text-success"></i>
                <h4 class="mt-3">Tươi Sạch</h4>
                <p>Chỉ sử dụng nguyên liệu tươi ngon, không hóa chất, không chất bảo quản.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-heart fa-3x text-danger"></i>
                <h4 class="mt-3">Tận Tâm</h4>
                <p>Luôn đặt khách hàng lên hàng đầu, phục vụ tận tình, chu đáo.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-truck fa-3x text-primary"></i>
                <h4 class="mt-3">Nhanh Chóng</h4>
                <p>Giao hàng tận nơi nhanh chóng, đảm bảo đúng giờ và nóng hổi.</p>
            </div>
        </div>
    </div>

<!-- Đội ngũ của chúng tôi -->
<div class="container my-5 bg-light p-5 rounded">
    <h2 class="text-center text-black fw-bold"><b>Đội ngũ của chúng tôi</b></h2>
    <div class="row text-center mt-4">
        <div class="col-md-3">
            <img src="{{ asset('build/assets/chef1.png') }}" class="img-fluid rounded-circle object-fit-cover" style="width: 150px; height: 150px;" alt="Đầu bếp">
            <h5 class="mt-2">Trần Minh Quốc Thái</h5>
            <p>Bếp trưởng với hơn 5 năm kinh nghiệm.</p>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('build/assets/chef2.jpg') }}" class="img-fluid rounded-circle object-fit-cover" style="width: 150px; height: 150px;" alt="Đầu bếp">
            <h5 class="mt-2">Trịnh Văn Nam</h5>
            <p>Chuyên gia sáng tạo món ăn mới.</p>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('build/assets/chef3.jpg') }}" class="img-fluid rounded-circle object-fit-cover" style="width: 150px; height: 150px;" alt="Đầu bếp">
            <h5 class="mt-2">Nguyễn Thị Phương Thảo</h5>
            <p>Nhân viên Pha chế.</p>
        </div>
        <div class="col-md-3">
            <img src="{{ asset('build/assets/chef4.jpg') }}" class="img-fluid rounded-circle object-fit-cover" style="width: 150px; height: 150px;" alt="Đầu bếp">
            <h5 class="mt-2">Lê Văn Quang</h5>
            <p>Chăm sóc Khách hàng.</p>
        </div>
    </div>
</div>

    <!-- Khách hàng nói gì? -->
    <div class="container my-5">
        <h2 class="text-center fw-bold text-black"><B>Khách hàng nói gì về chúng tôi?</B></h2>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <div class="card shadow-lg h-100">
                    <div class="card-body">
                        <i class="fas fa-user-circle fa-3x text-secondary"></i>
                        <p class="mt-3"><strong>Trần Anh Tuấn</strong></p>
                        <p>"Món ăn tuyệt vời! Giao hàng nhanh, đồ ăn nóng hổi. Sẽ tiếp tục ủng hộ."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg h-100">
                    <div class="card-body">
                        <i class="fas fa-user-circle fa-3x text-secondary"></i>
                        <p class="mt-3"><strong>Lê Tuấn Tài</strong></p>
                        <p>"Đồ ăn ngon, sạch sẽ, giá cả hợp lý. Đặc biệt thích dịch vụ khách hàng ở đây."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg h-100">
                    <div class="card-body">
                        <i class="fas fa-user-circle fa-3x text-secondary"></i>
                        <p class="mt-3"><strong>Trần Anh Phi Hùng</strong></p>
                        <p>"Chất lượng phục vụ rất tốt, thực đơn phong phú. Chắc chắn sẽ quay lại nhiều lần."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
@include('layouts.footer')
@endsection
