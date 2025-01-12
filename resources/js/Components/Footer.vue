<template>
  <footer>
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-3">
          <img src="@/Assets/images/logo.png" class="w-full" alt="logo" />
          <p class="mt-3 text-lg font-bold mb-0 text-white">Công Ty Cổ Phần Du Lịch Lâm Đồng</p>
          <p class="mt-2 text-white">
            Lấy chất lượng phục vụ chuyên nghiệp và mức độ hài lòng của khách hàng làm tiêu chí phấn đấu.
          </p>
          <div class="flex gap-4">
            <i class="text-white fab fa-facebook-f text-2xl"></i>
            <i class="text-white fab fa-twitter text-2xl"></i>
            <i class="text-white fab fa-instagram text-2xl"></i>
            <i class="text-white fab fa-youtube text-2xl"></i>
            <i class="text-white fab fa-linkedin-in text-2xl"></i>
            <i class="text-white fab fa-pinterest text-2xl"></i>
          </div>
          <div>
            <div class="flex gap-4 mt-4">
              <i class="text-white fas fa-phone-alt text-2xl"></i>
              <p class="text-white">1900 1000</p>
            </div>
            <div class="flex gap-4">
              <i class="fas fa-envelope text-2xl text-white"></i>
              <p class="text-white">contact@dalatt.com</p>
            </div>
            <div class="flex gap-4">
              <i class="fas fa-map text-2xl text-white"></i>
              <p class="text-white">123 Đường 3/2, Phường 12, Quận 10, TP.HCM</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-5">
              <h5 class="font-bold mb-0 text-white">Về chúng tôi</h5>
              <hr />
              <ul class="list-unstyled flex flex-col gap-3">
                <li>
                  <a href="#">Giới thiệu</a>
                </li>
                <li>
                  <a href="#">Lịch sử phát triển</a>
                </li>
                <li>
                  <a href="#">Tầm nhìn - Sứ mệnh</a>
                </li>
                <li>
                  <a href="#">Giải thưởng</a>
                </li>
                <li>
                  <a href="#">Đối tác</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-7">
              <h5 class="font-bold mb-0 text-white">Điều khoản & quy định</h5>
              <hr />
              <ul class="list-unstyled flex flex-col gap-3">
                <li>
                  <a href="#">Chính sách bảo mật</a>
                </li>
                <li>
                  <a href="#">Chính sách đổi trả</a>
                </li>
                <li>
                  <a href="#">Chính sách vận chuyển</a>
                </li>
                <li>
                  <a href="#">Chính sách thanh toán</a>
                </li>
                <li>
                  <a href="#">Điều khoản sử dụng</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-12">
              <!-- Đăng ký nhận tin -->
              <h5 class="font-bold mb-3 text-white">Đăng ký nhận tin</h5>
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Email của bạn"
                  aria-label="Recipient's username"
                  aria-describedby="button-addon2"
                />
                <button class="btn btn-danger" type="button" id="button-addon2">Đăng ký</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <ul class="list-unstyled flex flex-col gap-3">
            <li>
              <a href="#">Số ĐKKD: 123456789</a>
            </li>
            <li>
              <a href="#">Ngày cấp: 01/01/2021</a>
            </li>
            <li>
              <a href="#">Nơi cấp: Sở kế hoạch Đà Lạt</a>
            </li>
            <li>
              <a href="#">Địa chỉ: 123 Đường 3/2, Phường 12, Quận 10, TP.HCM</a>
            </li>
            <li>
              <a href="#">Điện thoại: 1900 1000</a>
            </li>
            <li>
              <a href="#">© 2021 Dalattourist. All rights reserved.</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>
<style>
footer {
  background: linear-gradient(
    to right,
    rgb(26, 117, 38) 0%,
    rgb(14, 75, 22) 45%,
    rgb(14, 75, 22) 45%,
    rgb(13, 74, 21) 58%,
    rgb(26, 117, 38) 100%
  );
  color: white;
}

li a {
  list-style: none;
  text-decoration: none;
  color: white;
  display: block;
}
</style>
