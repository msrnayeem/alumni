<!-- ================= HEADER START ================= -->
<div class="usa-header">

  <!-- TOP ROW -->
  <div class="usa-header-top">

    <!-- LOGO -->
    <div class="usa-header-logo">
      <a href="{{ url('/') }}">
        <img src="{{ asset('assets/images/logo-university-of-south.png') }}"
             alt="South Asia University Bangladesh">
      </a>
    </div>

    <!-- CONVOCATION BUTTON -->
    <div class="usa-convocation-wrap">
      <a href="#" class="usa-convocation-btn">
        Convocation
      </a>
    </div>

    <!-- INFO BLOCKS -->
    <div class="usa-info-list">

      <!-- Academic Calendar -->
      <div class="usa-info-item">
        <span class="usa-info-icon">
          <i class="fa-regular fa-calendar-days"></i>
        </span>
        <div>
          <div class="usa-info-text-title">Academic</div>
          <div class="usa-info-text-sub">Calendar</div>
        </div>
      </div>

      <!-- Email -->
      <div class="usa-info-item">
        <span class="usa-info-icon">
          <i class="fa-regular fa-envelope"></i>
        </span>
        <div>
          <div class="usa-info-text-title">Email Us</div>
          <div class="usa-info-text-sub">admission@southasiauni.ac.bd</div>
        </div>
      </div>

      <!-- Phone -->
      <div class="usa-info-item">
        <span class="usa-info-icon">
          <i class="fa-solid fa-phone-volume"></i>
        </span>
        <div>
          <div class="usa-info-text-title">Call Us</div>
          <div class="usa-info-text-sub">
            096 140 080 08, +88 017 630 306 36
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- MENU ROW -->
  <nav class="usa-nav">
    <div class="usa-nav-inner">

      <a href="{{ url('/') }}" class="usa-nav-link {{ request()->is('/') ? 'usa-nav-link-active' : '' }}">
        Home
      </a>

        <a href="{{ url('login') }}"
           class="usa-nav-link {{ request()->is('login') ? 'usa-nav-link-active' : '' }}">
          <i class="fa fa-user"></i> Graduate Login
        </a>
      
    </div>
  </nav>
</div>
<!-- ================= HEADER END ================= -->
