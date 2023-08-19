<style>
    .whats-app {
      position: fixed;
      width: 50px;
      height: 50px;
      bottom: 40px;
      background-color: #25d366;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      font-size: 30px;
      box-shadow: 3px 4px 3px #999;
      right: 15px;
      z-index: 100;
    }
    .panduan {
      position: fixed;
      width: 50px;
      height: 50px;
      bottom: 120px;
      background-color: #72A4A5;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      font-size: 30px;
      box-shadow: 0px 4px 16px 0px rgba(114, 164, 165, 0.35);
      right: 15px;
      z-index: 100;
    }

    .my-float {
      margin-top: 10px;
    }
    .my-float-2{
      margin-top: 10px;
    }
</style>
  <!-- whatsapp icon -->
  <a class="whats-app" href="https://api.whatsapp.com/send?phone=085864931764" target="_blank">
    <i class="fa-brands  fa-whatsapp my-float"></i>
  </a>
  <a href="" class="panduan" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="fa-solid fa-question my-float-2"></i>
  </a>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-center fs-5" id="exampleModalLabel">Panduan Pemesanan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li>Registrasi Akun</li>
          <li>Sign in</li>
          <li>Pilih Layanan</li>
          <li>Input Informasi Sepatu Yang akan ditreatment</li>
          <li>Lakukan Pembayaran</li>
          <li>Antar Sepatu</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- whatsapp icon -->