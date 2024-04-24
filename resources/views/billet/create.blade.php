<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ ('assets/vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ ('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ ('assets/vendor/boxicons/css/boxicons.min.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ ('assets/vendor/quill/quill.snow.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ ('assets/vendor/quill/quill.bubble.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ ('assets/vendor/remixicon/remixicon.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ ('assets/vendor/simple-datatables/style.css') }}" type="text/css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ ('assets/css/style.css') }}" type="text/css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('content.header')

  @include('content.sidebar')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Blank Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vente Billet</h5>
              <!-- Vertical Form -->
              <form class="row g-3" action="{{ route('billetInsert') }}" method="POST">
                @csrf
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Responsable</label>
                    <select class="form-select" aria-label="Default select example" name="idresponsable">
                        <option selected="">Mr/Mrs</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('idresponsable')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Client</label>
                    <select class="form-select" aria-label="Default select example" name="idclient">
                        <option selected="">Client</option>
                        @foreach ($clients as $clt)
                            <option value="{{ $clt->id }}">{{ $clt->prenoms }} {{ $clt->nom }}</option>
                        @endforeach
                    </select>
                    @error('idclient')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Pack</label>
                    <select class="form-select" aria-label="Default select example" name="idpack">
                        <option selected="">Pack</option>
                        @foreach ($packs as $p)
                            <option value="{{ $p->id }}">{{ $p->nom }}</option>
                        @endforeach
                    </select>
                    @error('idpack')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Axe</label>
                    <select class="form-select" aria-label="Default select example" name="idaxe">
                        <option selected="">Axe</option>
                        @foreach ($axes as $a)
                            <option value="{{ $a->id }}">{{ $a->nom }}</option>
                        @endforeach
                    </select>
                    @error('idaxe')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Quantite</label>
                  <input type="text" class="form-control" id="inputNanme4" name="quantite">
                  @error('quantite')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Date</label>
                  <input type="date" class="form-control" id="inputEmail4" name="date">
                  @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ ('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ ('assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ ('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ ('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ ('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ ('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ ('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ ('assets/js/main.js') }}"></script>

</body>

</html>
