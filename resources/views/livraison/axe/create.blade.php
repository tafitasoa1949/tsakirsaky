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
              <h5 class="card-title">Ajouter Pack</h5>
              <!-- Vertical Form -->
              <form class="row g-3" action="{{ route('axeInsert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-11">
                    <label for="inputEmail4" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="inputEmail4" name="nom">
                    @error('nom')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                  </div>
                  <div class="col-12">
                    <div class="row">
                        <div class="col-md-11">
                            <label for="inputNanme4" class="form-label">Arret</label>
                            <select class="form-select" aria-label="Default select example" name="idarret">
                                <option selected="">Arret</option>
                                @foreach ($arrets as $ar)
                                    <option value="{{ $ar->id }}">{{ $ar->nom }}</option>
                                @endforeach
                            </select>
                            @error('idarret')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-1">
                            <button type="button" id="ajoutCase" class="btn btn-primary btn-sm" style="margin-top: 30%"><i class="bi bi-plus-square"></i></button>
                        </div>
                    </div>
                </div>
                <div id="plus"></div>
                <div class="text-center">
                  <button type="submit" class="btn btn-success">Enregistrer</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
        {{--  --}}
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
  <script>
    document.getElementById('ajoutCase').addEventListener('click', function() {
        // Créer un nouveau div pour la colonne du produit
        var colProduit = document.createElement('div');
        colProduit.className = 'col-md-11';

        // Créer un label pour le produit
        var labelProduit = document.createElement('label');
        labelProduit.setAttribute('for', 'inputNanme4');
        labelProduit.className = 'form-label';
        labelProduit.textContent = 'Arret';

        // Créer un select pour les produits
        var selectProduit = document.createElement('select');
        selectProduit.className = 'form-select';
        selectProduit.setAttribute('aria-label', 'Default select example');
        selectProduit.name = 'idarret[]';
        var arrrets = {!! json_encode($arrets) !!};

        // Créer une option par défaut
        var optionDefault = document.createElement('option');
        optionDefault.selected = true;
        optionDefault.textContent = 'Arret';
        selectProduit.appendChild(optionDefault);


        // Itérer sur la liste de produits pour créer des options
        arrrets.forEach(function(ar) {
            var option = document.createElement('option');
            option.value = ar.id;
            option.textContent = ar.nom;
            selectProduit.appendChild(option);
        });


        // Ajouter les éléments au div de la colonne du produit
        colProduit.appendChild(labelProduit);
        colProduit.appendChild(selectProduit);
        // Créer un div pour la row et ajouter la classe 'row'
        var row = document.createElement('div');
        row.classList.add('row');
        row.appendChild(colProduit);


        var colSup = document.createElement('div');
        colSup.classList.add('col-12');
        colSup.appendChild(row);

        // Ajouter la row à l'élément avec l'ID 'plus'
        var plus = document.getElementById('plus');
        if (plus) {
            plus.appendChild(colSup);
        } else {
            console.error('L\'élément avec l\'ID "plus" n\'existe pas.');
        }
    });
    </script>
</body>

</html>
