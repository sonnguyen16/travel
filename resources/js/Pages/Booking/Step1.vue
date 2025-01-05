<template>
  <MainLayout>
    <div class="container">
      <div class="pt-[100px] pb-[50px]">
        <div
          class="w-full mx-auto bg-white px-[20px] pt-[30px] pb-[50px] border-[1.5px] border-green-600 rounded-xl shadow-2xl"
        >
          <div class="w-full">
            <div class="relative">
              <!-- Horizontal Line -->
              <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t-2 border-green-700"></div>
              </div>
              <!-- Timeline Content -->
              <div class="grid grid-cols-3 left-0 right-0 absolute md:translate-y-[-15%] translate-y-[-6%]">
                <!-- Item 1 -->
                <div class="">
                  <div class="w-6 h-6 bg-green-700 rounded-full text-center text-white">1</div>
                  <p class="mt-2 text-green-900 font-bold">Chọn vé</p>
                </div>
                <!-- Item 2 -->
                <div class="text-center">
                  <div class="w-6 h-6 bg-green-700 rounded-full text-center text-white mx-auto">2</div>
                  <p class="mt-2 text-green-900 font-bold">Xác nhận vé</p>
                </div>
                <!-- Item 3 -->
                <div class="">
                  <div class="w-6 h-6 bg-green-700 rounded-full text-center text-white ms-auto">3</div>
                  <p class="mt-2 text-green-900 font-bold text-end">Thanh toán</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-7">
          <img src="@/Assets/images/booking1.jpg" alt="about" class="w-full rounded-xl h-100 object-cover" />
        </div>
        <div class="col-lg-5">
          <img src="@/Assets/images/booking2.jpg" alt="about" class="w-full rounded-xl h-[200px] object-cover mt-4 mb-4" />
          <img src="@/Assets/images/booking3.jpg" alt="about" class="w-full rounded-xl h-[200px] object-cover" />
        </div>
      </div>

      <div
        class="w-full mx-auto bg-white px-[20px] py-[30px] border-[1.5px] border-green-600 rounded-xl shadow-2xl mt-5"
      >
        <div class="flex justify-between">
          <h2 class="font-bold">Xe trượt thác 3 - khứ hồi</h2>
          <div>
            <p class="text-center mb-0 text-[30px]">0Đ</p>
            <p class="mb-0">0 người lớn - 0 trẻ em</p>
          </div>
        </div>
        <hr />
        <div>
          <ul class="list-disc pl-5">
            <li>Lướt qua khu rừng xanh tươi của thác Datanla trên một chiếc xe trượt hiện đại!</li>
            <li>
              Trải nghiệm cảm giác hồi hộp khi đi qua con đường dài 2400m trên chiếc xe trượt với đường trượt dài nhất
              Châu Á!
            </li>
            <li>Đường trượt đi qua Thác Nước Datanla, một trong những thác nước đẹp nhất ở Đà Lạt</li>
            <li>
              Tăng tốc hoặc chậm lại tuỳ ý bạn, cần giảm tốc của xe trượt sẽ giúp bạn có thể dừng lại để chụp ảnh hay
              ngắm cảnh tuỳ thích
            </li>
            <li>
              Được thiết kế bởi Wiegand, tàu trượt kiểu mới nhất Alpine có cần gạt giảm tốc giúp bạn kiểm soát khoảng
              cách giữa các xe
            </li>
          </ul>
        </div>
        <hr />
        <div class="flex justify-between">
          <div>
            <label for="" class="text-green-600">Chọn ngày</label>
            <div class="flex items-center">
              <i class="far fa-calendar-alt text-green-600 text-2xl"></i>
              <input type="date" class="border-none" />
            </div>
          </div>
          <div>
            <div class="flex items-center gap-5">
              <label><i class="fas fa-user-friends text-green-600 text-2xl"></i> Người lớn</label>
              <div class="flex items-center">
                <button class="border-none">
                  <i class="fas fa-minus text-green-600"></i>
                </button>
                <input type="text" class="border-none w-[40px]" value="0" />
                <button class="border-none">
                  <i class="fas fa-plus text-green-600"></i>
                </button>
              </div>
              <div class="flex items-center gap-5">
                <p class="mb-0 text-gray-500">250.000đ/1 khách</p>
                <p class="mb-0">250.000đ</p>
              </div>
            </div>
            <div class="flex items-center gap-5">
              <label><i class="fas fa-user-friends text-green-600 text-2xl"></i> Người lớn</label>
              <div class="flex items-center">
                <button class="border-none">
                  <i class="fas fa-minus text-green-600"></i>
                </button>
                <input type="text" class="border-none w-[40px]" value="0" />
                <button class="border-none">
                  <i class="fas fa-plus text-green-600"></i>
                </button>
              </div>
              <div class="flex items-center gap-5">
                <p class="mb-0 text-gray-500">250.000đ/1 khách</p>
                <p class="mb-0">250.000đ</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div
        class="w-full mx-auto bg-white px-[20px] py-[30px] border-[1.5px] border-green-600 rounded-xl shadow-2xl mt-5"
      >
        <div class="flex justify-between">
          <h2 class="font-bold">Xe trượt thác 3 - khứ hồi</h2>
          <div>
            <p class="text-center mb-0 text-[30px]">0Đ</p>
            <p class="mb-0">0 người lớn - 0 trẻ em</p>
          </div>
        </div>
        <hr />
        <div>
          <ul class="list-disc pl-5">
            <li>Lướt qua khu rừng xanh tươi của thác Datanla trên một chiếc xe trượt hiện đại!</li>
            <li>
              Trải nghiệm cảm giác hồi hộp khi đi qua con đường dài 2400m trên chiếc xe trượt với đường trượt dài nhất
              Châu Á!
            </li>
            <li>Đường trượt đi qua Thác Nước Datanla, một trong những thác nước đẹp nhất ở Đà Lạt</li>
            <li>
              Tăng tốc hoặc chậm lại tuỳ ý bạn, cần giảm tốc của xe trượt sẽ giúp bạn có thể dừng lại để chụp ảnh hay
              ngắm cảnh tuỳ thích
            </li>
            <li>
              Được thiết kế bởi Wiegand, tàu trượt kiểu mới nhất Alpine có cần gạt giảm tốc giúp bạn kiểm soát khoảng
              cách giữa các xe
            </li>
          </ul>
        </div>
        <hr />
        <div class="flex justify-between">
          <div>
            <label for="" class="text-green-600">Chọn ngày</label>
            <div class="flex items-center">
              <i class="far fa-calendar-alt text-green-600 text-2xl"></i>
              <input type="date" class="border-none" />
            </div>
          </div>
          <div>
            <div class="flex items-center gap-5">
              <label><i class="fas fa-user-friends text-green-600 text-2xl"></i> Người lớn</label>
              <div class="flex items-center">
                <button class="border-none">
                  <i class="fas fa-minus text-green-600"></i>
                </button>
                <input type="text" class="border-none w-[40px]" value="0" />
                <button class="border-none">
                  <i class="fas fa-plus text-green-600"></i>
                </button>
              </div>
              <div class="flex items-center gap-5">
                <p class="mb-0 text-gray-500">250.000đ/1 khách</p>
                <p class="mb-0">250.000đ</p>
              </div>
            </div>
            <div class="flex items-center gap-5">
              <label><i class="fas fa-user-friends text-green-600 text-2xl"></i> Người lớn</label>
              <div class="flex items-center">
                <button class="border-none">
                  <i class="fas fa-minus text-green-600"></i>
                </button>
                <input type="text" class="border-none w-[40px]" value="0" />
                <button class="border-none">
                  <i class="fas fa-plus text-green-600"></i>
                </button>
              </div>
              <div class="flex items-center gap-5">
                <p class="mb-0 text-gray-500">250.000đ/1 khách</p>
                <p class="mb-0">250.000đ</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
            <div
        class="w-full mx-auto bg-gray-100 px-[20px] py-[30px] border-[1.5px] border-green-600 rounded-xl shadow-2xl mt-5"
      >
        <h3 class="font-bold">Lưu ý khi mua vé</h3>
        <div>
          <p class="mb-0">+ Thời gian mở cửa khu vui chơi: Từ 7:15 sáng đến 17:00.</p>
          <p class="mb-0">+ Khu vui chơi ngừng nhận khách từ sau 4:30 .</p>
          <p class="mb-0">+ Quý khách hàng cao dưới 100 cm được miễn phí.</p>
          <p class="mb-0">+ Quy định để áp dụng giá vé cho trẻ em: Khách hàng cao từ 100cm đến dưới 140 cm</p>
          <p class="mb-0">
            + Quy định để áp dụng giá vé cho người cao tuổi: Là người có độ tuổi từ 60 tuổi trở lên và có mang theo giấy
            tờ tuỳ thân có hình ảnh để chứng minh
          </p class="mb-0">
          <p class="mb-0">+ Không áp dụng đồng thời các chương trình ưu đãi</p>
        </div>
      </div>
      <iframe class="my-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.023782282466!2d108.44712497482281!3d11.903432388322374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317114a1a4b93341%3A0xf8ce8eb72915c065!2zS2h1IGR1IGzhu4tjaCBUaMOhYyBEYXRhbmxh!5e0!3m2!1svi!2s!4v1736066803856!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
        <div class="col-lg-4 py-[50px]">
          <h4 class="">Ưu đãi khác</h4>
          <hr />
          <div class="flex gap-3 mt-4">
            <img
              src="@/Assets/images/promodetail1.jpg"
              alt="promo1"
              class="w-[150px] h-[100px] object-cover rounded-xl"
            />
            <div>
              <p class="mb-0">ƯU ĐÃI SỐC TẶNG HỌC SINH, SINH VIÊN: Chỉ 350K để trải nghiệm Hành Trình Trên Cao</p>
              <p class="text-sm mt-2"><i class="far fa-calendar"></i> 10/10/2021</p>
            </div>
          </div>
          <div class="flex gap-3 mt-3">
            <img
              src="@/Assets/images/promodetail2.jpg"
              alt="promo1"
              class="w-[150px] h-[100px] object-cover rounded-xl"
            />
            <div>
              <p class="mb-0">ƯU ĐÃI SỐC TẶNG HỌC SINH, SINH VIÊN: Chỉ 350K để trải nghiệm Hành Trình Trên Cao</p>
              <p class="text-sm mt-2"><i class="far fa-calendar"></i> 10/10/2021</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'
import { router } from '@inertiajs/vue3'
</script>
<style scoped></style>
