<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('client.index') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Client</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('achat') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Achat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pack-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Pack</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pack-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('produit.index') }}">
              <i class="bi bi-circle"></i><span>Produit</span>
            </a>
          </li>
          <li>
            <a href="{{ route('pack.index') }}">
              <i class="bi bi-circle"></i><span>Listes</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#billet-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Billet</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="billet-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('billet.index') }}">
              <i class="bi bi-circle"></i><span>Vente</span>
            </a>
          </li>
          <li>
            <a href="{{ route('paiement.index') }}">
              <i class="bi bi-circle"></i><span>Paiement</span>
            </a>
          </li>
          <li>
            <a href="{{ route('bilan') }}">
              <i class="bi bi-circle"></i><span>Bilan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#livraison-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Livraison</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="livraison-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('arret.index') }}">
              <i class="bi bi-circle"></i><span>Arret</span>
            </a>
          </li>
          <li>
            <a href="{{ route('axe.index') }}">
              <i class="bi bi-circle"></i><span>Axe</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('statistique') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Statistique</span>
        </a>
    </li>
    </ul>
    </aside><!-- End Sidebar-->
