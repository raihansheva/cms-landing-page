<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-dashboard.css">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">

<!-- <div class="bungkus"> -->
<div class="row col d-flex gap-2">
  <div class="card col p-3" style="height: 170px; border:1px solid rgb(229, 234, 239);">
    <div class="col-12 h-50  d-flex">
      <div class="col-3 ">
        <div class="col p-3 rounded" style="width: 60px; height: 60px; background-color: #03C988 ; color: white;">
          <h2><i class="ti ti-cards text-light"></i></h2>
        </div>
      </div>
      <div class="col-9  ">
        <h3 class="pt-3" style="font-weight: bold;">Fitur</h3>
      </div>
    </div>
    <div class="col-12 h-50  d-flex">
      <div class="col-2  text-center">
        <p class="m-0 p-0 pt-2" style="font-size: 34px;"><?= $fitur ?></p>
      </div>
      <div class="col-10 ">
      </div>
    </div>
  </div>
  <div class="card col p-3" style="height: 170px; border:1px solid rgb(229, 234, 239);">
    <div class="col-12 h-50  d-flex">
      <div class="col-3 ">
        <div class="col p-3 rounded" style="width: 60px; height: 60px; background-color: #03C988 ; color: white;">
          <h2><i class="ti ti-heart text-light"></i></h2>
        </div>
      </div>
      <div class="col-9  ">
        <h3 class="pt-3" style="font-weight: bold;">Solusi</h3>
      </div>
    </div>
    <div class="col-12 h-50  d-flex">
      <div class="col-2  text-center">
        <p class="m-0 p-0 pt-2" style="font-size: 34px;"><?= $solusi ?></p>
      </div>
      <div class="col-10 ">
      </div>
    </div>
  </div>
  <div class="card col p-3" style="height: 170px; border:1px solid rgb(229, 234, 239);">
    <div class="col-12 h-50  d-flex">
      <div class="col-3 ">
        <div class="col p-3 rounded" style="width: 60px; height: 60px; background-color: #03C988 ; color: white;">
          <h2><i class="ti ti-receipt-2 text-light"></i></h2>
        </div>
      </div>
      <div class="col-9  ">
        <h3 class="pt-3" style="font-weight: bold;">Paket Harga</h3>
      </div>
    </div>
    <div class="col-12 h-50  d-flex">
      <div class="col-2  text-center">
        <p class="m-0 p-0 pt-2" style="font-size: 34px;"><?= $harga ?></p>
      </div>
      <div class="col-10 ">
      </div>
    </div>
  </div>
</div>
<!-- </div> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php $this->endsection() ?>