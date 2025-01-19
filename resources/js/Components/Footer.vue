<template>
  <footer>
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-3">
          <img src="@/Assets/images/logo.png" class="w-full" alt="logo" />
          <p class="mt-3 text-lg font-bold mb-0 text-white">{{ $t('company_name') }}</p>
          <p class="mt-2 text-white">{{ $t('slogan') }}</p>
          <div class="flex gap-4">
            <i class="text-white fab fa-facebook-f text-2xl"></i>
            <i class="text-white fab fa-twitter text-2xl"></i>
            <i class="text-white fab fa-instagram text-2xl"></i>
            <i class="text-white fab fa-youtube text-2xl"></i>
            <i class="text-white fab fa-linkedin-in text-2xl"></i>
            <i class="text-white fab fa-pinterest text-2xl"></i>
          </div>
          <div>
            <h5 class="text-white mt-4">{{ $t('contact_info') }}</h5>
            <div class="flex gap-4 mt-4">
              <i class="text-white fas fa-phone-alt text-2xl"></i>
              <p class="text-white">{{ $t('phone') }}: 1900 1000</p>
            </div>
            <div class="flex gap-4">
              <i class="fas fa-envelope text-2xl text-white"></i>
              <p class="text-white">{{ $t('email') }}: contact@dalatt.com</p>
            </div>
            <div class="flex gap-4">
              <i class="fas fa-map text-2xl text-white"></i>
              <p class="text-white">{{ $t('address') }}: 123 Đường 3/2, Phường 12, Quận 10, TP.HCM</p>
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
                  <a href="#">{{ $t('introduction') }}</a>
                </li>
                <li>
                  <a href="#">{{ $t('history') }}</a>
                </li>
                <li>
                  <a href="#">{{ $t('vision_mission') }}</a>
                </li>
                <li>
                  <a href="#">{{ $t('awards') }}</a>
                </li>
                <li>
                  <a href="#">{{ $t('partners') }}</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-7">
              <h5 class="font-bold mb-0 text-white">{{ $t('terms_conditions') }}</h5>
              <hr />
              <ul class="list-unstyled flex flex-col gap-3">
                <li>
                  <a href="#">{{ $t('privacy_policy') }}</a>
                </li>
                <li>
                  <a href="#">{{ $t('return_policy') }}</a>
                </li>
                <li>
                  <a href="#">{{ $t('shipping_policy') }}</a>
                </li>
                <li>
                  <a href="#">{{ $t('payment_policy') }}</a>
                </li>
                <li>
                  <a href="#">{{ $t('terms_of_use') }}</a>
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
              <a href="#">{{ $t('license_number') }}: 123456789</a>
            </li>
            <li>
              <a href="#">{{ $t('license_date') }}: 01/01/2021</a>
            </li>
            <li>
              <a href="#">{{ $t('license_place') }}: Sở kế hoạch Đà Lạt</a>
            </li>
            <li>
              <a href="#">{{ $t('address') }}: 123 Đường 3/2, Phường 12, Quận 10, TP.HCM</a>
            </li>
            <li>
              <a href="#">{{ $t('phone') }}: 1900 1000</a>
            </li>
            <li>
              <a href="#">{{ $t('reserved') }}</a>
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
