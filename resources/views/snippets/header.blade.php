<style>
  #logo-img img {
    width: 45px;
    height: 45px;
  }

  img {
    width: auto !important;
  }

  @media (max-width: 991px)
    {
      #menu-button {
        height: auto !important;
        padding-top: 4px !important;
      }
    }

  #main-header {
    height: auto;
  }

  .d-flex {
    display: flex;
  }

    .justify-content-between {
        justify-content: space-between;
    }

    .align-items-center {
        align-items: center !important;
    }
</style>
<!-- Container -->
<div class="container">

  <!-- Header -->
  <header id="header">

      <!-- Main Header -->
      <div id="main-header">

          <div class="container">

          <div class="d-flex justify-content-between align-items-center">



              <!-- Logo -->
              <div id="logo-img" class="d-flex justify-content-between align-items-center">
                <div id="menu-button" style="border: none; outline: none; margin-right: 10px;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" font-weight="bold" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                  </svg>
                  {{-- <span>Menu</span> --}}
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <a href="/">
                        <img style="height: 40px; width: 40px" src="{{ asset('assets/img/docs/nunya.png') }}" alt="Logo">
                  </a>
                  <div style="margin-left: 4px">
                    <span style="color: #fff; weight: 700; font-size: 20px; font-style:italic">Nunya</span>
                  </div>
                </div>

              </div>
              <!-- /Logo -->


              <div class="btn-group" style="margin-top: 4px">
                    <a href="/login" class="btn btn-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"v color="#fff" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                      </svg>
                    </a>
              </div>



          </div>

          </div>

      </div>
      <!-- /Main Header -->


      <!-- Lower Header -->
      <div id="lower-header">

          <div class="container">

          {{-- <div id="menu-button">
              <div>
              <span></span>
              <span></span>
              <span></span>
              </div>
              <span>Menu</span>
          </div> --}}

          <ul id="navigation">

              <!-- Dashboard -->
              <li class="home-button current-menu-item">

                  <a href="/"><i class="icons icon-home"></i></a>

              </li>

              {{-- <li ><a href="/">Home</a></li> --}}
              <li ><a href="/#event">Our Events</a></li>
              <li ><a href="/#news">News/Articles</a></li>
              <li ><a href="/#about">About Us</a></li>
              <li ><a href="{{ route('membership') }}">Membership</a></li>
              {{-- <li ><a href="/#sponsors">Sponsors</a></li> --}}
              <li ><a href="{{ route('contact') }}">Contact Us</a></li>



              <!-- Donate -->
              <li class="donate-button ">
                  <a href="#">Donate</a>
              </li>
              <!-- /Donate -->

          </ul>

          </div>

      </div>
      <!-- /Lower Header -->


  </header>
  <!-- /Header -->

</div>
