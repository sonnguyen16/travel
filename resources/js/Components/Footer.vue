<template>
  <footer>
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-3">
          <img src="@/Assets/images/logo.png" class="w-full" alt="logo" />
          <p class="mt-3 text-[15px] font-bold mb-0 text-white">{{ $t('company_name') }}</p>
          <p class="mt-2 text-white">{{ $t('slogan') }}</p>
          <div class="flex gap-4">
            <a target="_blank" href="https://www.facebook.com/dalattourism"
              ><i class="text-white fab fa-facebook-f text-2xl"></i
            ></a>
            <a target="_blank" href="https://www.instagram.com/datanlawaterfalls/"
              ><i class="text-white fab fa-instagram text-2xl"></i
            ></a>
            <a target="_blank" href="https://www.youtube.com/@dalattourist4922"
              ><i class="text-white fab fa-youtube text-2xl"></i
            ></a>
            <a target="_blank" href="https://www.tiktok.com/@dalattourist?is_from_webapp=1&amp;sender_device=pc"
              ><i class="text-white fab fa-tiktok text-2xl"></i
            ></a>
          </div>
          <div>
            <h5 class="text-white mt-4">{{ $t('contact_info') }}</h5>
            <div class="flex gap-4 mt-4">
              <i class="text-white fas fa-phone-alt text-2xl"></i>
              <a href="tel:84 98 1166 088" class="text-white text-decoration-none"
                >{{ $t('phone') }}: +84 98 1166 088</a
              >
            </div>
            <div class="flex gap-4 mt-3">
              <i class="fas fa-envelope text-2xl text-white"></i>
              <a href="mailto:info@dalattourist.com.vn" class="text-white text-decoration-none"
                >{{ $t('email') }}: info@dalattourist.com.vn</a
              >
            </div>
            <div class="flex gap-4 mt-3">
              <i class="fas fa-map text-2xl text-white"></i>
              <p class="text-white">{{ $t('address') }}: 1 Lê Đại Hành, Phường 1, Thành phố Đà Lạt, Lâm Đồng</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-5">
              <h5 class="font-bold mb-0 text-white">{{ $t('about_us') }}</h5>
              <hr />
              <ul class="list-unstyled flex flex-col gap-3">
                <li>
                  <Link href="/ve-chung-toi">{{ $t('introduction') }}</Link>
                </li>
                <li>
                  <Link href="/tuyen-dung">{{ $t('recruitment') }}</Link>
                </li>
                <li>
                  <Link href="/trang/lien-he">{{ $t('contact') }}</Link>
                </li>
                <li>
                  <Link href="/faq">{{ $t('faq') }}</Link>
                </li>
                <li>
                  <Link href="/thu-vien-anh">{{ $t('gallery') }}</Link>
                </li>
              </ul>
            </div>
            <div class="col-lg-7">
              <h5 class="font-bold mb-0 text-white">{{ $t('terms_conditions') }}</h5>
              <hr />
              <ul class="list-unstyled flex flex-col gap-3">
                <li>
                  <Link href="/trang/quy-dinh-chung">{{ $t('general_terms') }}</Link>
                </li>
                <li>
                  <Link href="/trang/quy-dinh-ve-thanh-toan">{{ $t('payment_policy') }}</Link>
                </li>
                <li>
                  <Link href="/trang/quy-dinh-ve-xac-nhan-thong-tin-dat-phong">{{ $t('reservation_policy') }}</Link>
                </li>
                <li>
                  <Link href="/trang/chinh-sach-giai-quyet-tranh-chap">{{ $t('dispute_resolution') }}</Link>
                </li>
                <li>
                  <Link href="/trang/chinh-sach-quyen-rieng-tu">{{ $t('privacy_policy') }}</Link>
                </li>
              </ul>
            </div>

            <div class="col-lg-12">
              <h5 class="font-bold mb-3 text-white">{{ $t('subscribe') }}</h5>
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  :placeholder="$t('your_email')"
                  aria-label="Recipient's username"
                  aria-describedby="button-addon2"
                />
                <button class="btn btn-danger" type="button" id="button-addon2">
                  {{ $t('subscribe_button') }}
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <ul class="list-unstyled flex flex-col gap-3">
            <li>
              <a href="#">{{ $t('license_number') }}: 5800271921</a>
            </li>
            <li>
              <a href="#">{{ $t('license_date') }}: 16/6/2000</a>
            </li>
            <li>
              <a href="#">{{ $t('license_place') }}: Sở kế hoạch đầu tư tỉnh Lâm Đồng</a>
            </li>
            <li>
              <a href="#">{{ new Date().getFullYear() + ' ' + $t('reserved') }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<style>
footer {
  background: #058643;
  color: white;
}

li a {
  list-style: none;
  text-decoration: none;
  color: white;
  display: block;
}
</style>
