@extends('layouts.app')

@section('content')
<!-- <div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Tim Developer</h4>
</div> -->

<!-- <div class="container" style="margin-top: 60px;">
  <div class="row">
    <div class="col-md-8 col-xl-6 text-center mx-auto">
      <div class="pagetitle">
        <h3>Who We Are?</h3>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">Sistem Pickup Sampah</h5>
      <p class="text-center">Sistem Pickup Sampah adalah sebuah sistem yang dirancang untuk memudahkan pengangkutan
        sampah dari para pelanggan. Sistem ini dapat digunakan ketika ada situasi di mana tong sampah pelanggan sudah
        penuh atau ketika ada kebutuhan mendesak untuk mengangkut sampah tersebut.
        Dengan menggunakan Sistem Pickup Sampah, pengelolaan sampah menjadi lebih efisien dan terorganisir. Ini
        merupakan solusi yang ramah lingkungan dan membantu menciptakan lingkungan yang bersih dan sehat bagi
        masyarakat.</p>

      <div style="text-align: center;">
        <img src="assets/img/pici12.jpg" class="d-block mx-auto" alt="..." style="max-width: 100%; height: auto;">
      </div>
    </div>
  </div>
</div> -->

<div class="col-md-8 col-xl-6 text-center mx-auto mt-5">
  <div class="pagetitle">
    <h3>Our Location</h3>
  </div>
</div>

<div class="container">
  <div class="card mb-5" style="height: 500px;">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.860988565207!2d110.20098536023431!3d-7.480598642500152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f64777c918b%3A0xd4c97c30d77a4fab!2sGemulung%2C%20Banyuwangi%2C%20Kec.%20Bandongan%2C%20Kabupaten%20Magelang%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1705392701994!5m2!1sid!2sid"
      width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>

<section id="section" class="section">
  <div class="container">
    <div class="col-md-8 col-xl-6 text-center mx-auto">
      <div class="pagetitle" data-aos="fade-up">
        <h3 class="">Our Great Team</h3>
      </div>
    </div>

    <div class="row" data-aos="fade-left">

      <div class="col-lg-4 col-md-6 text-center mx-auto">
        <div class="member" data-aos="zoom-in" data-aos-delay="100">
          <div class="pic"><img src="{{ asset('assets/img/dafi.jpg') }}" class="img-fluid" alt=""
              style="height: 300px;">
          </div>
          <!-- <img src="{{ asset('assets/img/logo ppmt.jpg') }}" alt="logo-ppmt-banyuwangi"
          style="width: 300px; margin-bottom: 10px;"> -->
          <div class="pagetitle">
            <h1>Dafi Kurniawan Yusuf</h1>
            <span>UI/UX Designer</span>
            <div class="social">
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 text-center mx-auto">
        <div class="member" data-aos="zoom-in" data-aos-delay="200">
          <div class="pic"><img src="{{ asset('assets/img/andika.jpg') }}" class="img-fluid" alt=""
              style="height: 300px;">
          </div>
          <div class="pagetitle">
            <h1>Andika Setya Kurniwan</h1>
            <span>Database Admin</span>
            <div class="social">
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 text-center mx-auto">
        <div class="member" data-aos="zoom-in" data-aos-delay="300">
          <div class="pic"><img src="{{ asset('assets/img/ilham.jpg') }}" class="img-fluid" alt=""
              style="height: 300px;">
          </div>
          <div class="pagetitle">
            <h1>Audi Ilham Atmaja</h1>
            <span>Software Engineer</span>
            <div class="social">
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <div class="col-md-8 mt-5 col-xl-6 text-center mx-auto">
    <div class="pagetitle" data-aos="fade-up">
      <h3 class="">Support</h3>
    </div>
  </div>

  <div class="row" data-aos="fade-left">

    <div class="col-lg-3 col-md-6 text-center mx-auto">
      <div class="member" data-aos="zoom-in" data-aos-delay="100">
        <div class="pic"><img src="{{ asset('assets/img/shifa.jpg') }}" class="img-fluid" alt="" style="height: 300px;">
        </div>
        <!-- <img src="{{ asset('assets/img/logo ppmt.jpg') }}" alt="logo-ppmt-banyuwangi"
        style="width: 300px; margin-bottom: 10px;"> -->
        <div class="pagetitle">
          <h1>Shifa Fauzia</h1>
          <span>Support</span>
          <div class="social">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mt-lg-0 text-center mx-auto">
      <div class="member" data-aos="zoom-in" data-aos-delay="200">
        <div class="pic"><img src="{{ asset('assets/img/anniza.jpg') }}" class="img-fluid" alt=""
            style="height: 300px;">
        </div>
        <div class="pagetitle">
          <h1>Anniza Alifia Nurhayu</h1>
          <span>Support</span>
          <div class="social">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>

  </div>


</section>

@endsection