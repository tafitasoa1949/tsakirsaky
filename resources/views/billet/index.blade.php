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
  <link href="{{ ('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ ('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ ('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ ('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ ('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ ('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ ('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ ('assets/css/style.css') }}" rel="stylesheet">

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
                    <h5 class="card-title">Billet vendu</h5>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('billetCreate') }}" class="btn btn-primary">Ajouter</a>
                        <form action="{{ route('filtreBillet') }}" method="GET">
                            <select name="idclient" class="form-select" onchange="this.form.submit()">
                                <option value="">Filtre par client</option>
                                @foreach ($clients as $clt)
                                    <option value="{{ $clt->id }}">{{ $clt->prenoms }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Responsable</th>
                                <th scope="col">Client</th>
                                <th scope="col">Pack</th>
                                <th scope="col">PU</th>
                                <th scope="col">Quantite</th>
                                <th scope="col">Livraison(Axe)</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($billets as $b)
                                <tr>
                                    <td>{{ $b->user->name }}</td>
                                    <td>{{ $b->client->prenoms }} {{ $b->client->nom }}</td>
                                    <td>{{ $b->pack->nom }}</td>
                                    <td>{{ $b->pack->prix }} Ar</td>
                                    <td>{{ $b->quantite }}</td>
                                    <td>{{ $b->axe->nom }}</td>
                                    <td>{{ $b->date }}</td>
                                    <td><a class="btn btn-success" href="{{ route('facturer',['id'=> $b->id]) }}">Facturer</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

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
