@extends('auth.users.users-layouts.app')

@section('users.auth')

  <header class="sticky-top shadow d-flex align-items-center gap-3 text-light p-3 install-header">
    <a href="{{ route('welcome') }}" class="text-light" style="text-decoration: none;">
      <span class="material-symbols-outlined m-0 align-middle">
        arrow_back_ios_new
      </span>
    </a>
    <h3 class="m-0">e-Support</h3>
  </header>
  <main>
    <div class="py-3 install-banner">
      <div class="d-flex justify-content-center">
        <img src="{{ asset('images/logos/brgy-nancayasan-logo-removebg-enhanced.png') }}" alt="logo" style="height: 8rem;">
      </div>
      <div class="text-light">
        <h4 class="text-center mb-2">e-Support App</h4>
        <div class="container container-sm">
          <p class="text-center">Install the e-Support app to access the services of the barangay, stay updated on job opportunities, and discover local places.</p>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-light d-flex d-none" id="install">Install e-Support <span class="material-symbols-outlined ms-1">download</span></button>
      </div>
      <div id="thanks" class="d-none">
        <h5 class="text-center text-light">Thank you for installing our app!</h5>
      </div>
      <div class="text-light mt-3">
        <p class="text-center mb-1"><small>Available on Google Chrome, Microsoft Edge, Firefox, and Safari on IOS.</small></p>
        <p class="text-center"><a href="https://intercom.help/progressier/en/articles/5703021-on-what-devices-can-you-install-a-pwa" target="_blank" class="text-light"><small>See supported browser here</small></a></p>
      </div>
    </div>
    <div class="container mt-4 py-3">
      <div class="py-2 px-3 d-flex justify-content-between align-items-center rounded dropdown-btn" data-target="first-info" data-arrow="first-arrow">
        <h5 class="text-white m-0">HOW TO INSTALL ON ANDROID?</h5>
        <span id="first-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
      </div>
      <div id="first-info" class="border-bottom border-start border-end rounded overflow-hidden mb-4 dropdown-info">
        <h5>Things to remember when trying to install e-Support on Android device!</h5>
        <p>Your device should have a strong internet connection to install the e-Support application. Otherwise, you will only have the shortcut version on your home screen.It is recommend to use Google Chrome Browser to get the WebAPK of e-Support App.</p>
        <div class="rounded border px-3 py-2 mb-3">
          <p class="m-0"><small class="fw-semibold">Option 1</small></p>
          <h5 class="fw-semibold">Popup Install</h5>
          <p class="m-0">A pop-up appears at the top part at your screen showing "Install e-Support".</p>
        </div>
        <div class="rounded border px-3 py-2 mb-3">
          <p class="m-0"><small class="fw-semibold">Option 2</small></p>
          <img src="{{ asset('images/pwa-guides/e-support-install1.png') }}" class="object-fit-contain w-100" alt="image" style="height: 10rem; object-position: left;">
          <h5 class="fw-semibold">Install App from toolbar</h5>
          <p class="m-0">Navigate to the top right corner of your browser and click on the icon located in the toolbar that is three dots stocked on top of one another. A drop down list will appear under the icon, Find the "Install App" menu and click to install.</p>
        </div>
        <div class="rounded border px-3 py-2">
          <p class="m-0"><small class="fw-semibold">Option 3</small></p>
          <img src="{{ asset('images/pwa-guides/e-support-install2.png') }}" class="object-fit-contain w-100" alt="image" style="height: 10rem; object-position: left;">
          <h5 class="fw-semibold">Install on your device</h5>
          <p class="m-0">Find the "Install e-Support" button, a pop-out will open and click install.</p>
        </div>
      </div>
      <div class="py-2 px-3 d-flex justify-content-between align-items-center rounded dropdown-btn" data-target="second-info" data-arrow="second-arrow">
        <h5 class="text-white m-0">HOW TO INSTALL ON IOS?</h5>
        <span id="second-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
      </div>
      <div id="second-info" class="border-bottom border-start border-end rounded overflow-hidden mb-4 dropdown-info">
        <h5>Things to remember when trying to install e-Support on iOS device!</h5>
        <p>Installing a PWA on iOS only works from the safari browser, beyond that restriction, it's quite similar to android.</p>
        <div class="rounded border px-3 py-2">
          <img src="{{ asset('images/pwa-guides/e-support-install3.png') }}" class="object-fit-contain w-100" alt="image" style="height: 10rem; object-position: left;">
          <h5 class="fw-semibold">Install App from "Share"</h5>
          <p class="m-0">First, navogate to the site in Safari browser, Press the "Share" button and select "Add to home screen" from the popup. Lastly, tap "Add" in the top right corner to finish installing the PWA. It will now be on your home screen.</p>
        </div>
      </div>
      <div class="py-2 px-3 d-flex justify-content-between align-items-center rounded dropdown-btn" data-target="third-info" data-arrow="third-arrow">
        <h5 class="text-white m-0">HOW TO INSTALL ON WINDOWS AND MAC?</h5>
        <span id="third-arrow" class="material-symbols-outlined text-white fs-1">arrow_left</span>
      </div>
      <div id="third-info" class="border-bottom border-start border-end rounded overflow-hidden mb-4 dropdown-info">
        <div class="rounded border px-3 py-2 mb-3">
          <p class="m-0"><small class="fw-semibold">Option 1</small></p>
          <h5 class="fw-semibold">Install App from Address Bar</h5>
          <p class="m-0">Go to the address bar of your browser. From the right side, you will see a monitor screen with arrow down icon on the side, Click install and it will automatically pop out of your browser, Once installed, a shortcut icon will appear on your desktop homescreen.</p>
        </div>
        <div class="rounded border px-3 py-2 mb-3">
          <p class="m-0"><small class="fw-semibold">Option 2</small></p>
          <img src="{{ asset('images/pwa-guides/e-support-install4.png') }}" class="object-fit-contain w-100" alt="image" style="height: 10rem; object-position: left;">
          <h5 class="fw-semibold">Install App from toolbar</h5>
          <p class="m-0">Navigate to the top right corner of your browser and click on the icon located in the toolbar that is three dots stocked on top of one another. A drop down list will appear under the icon, Find the "Install App" menu and click to install.</p>
        </div>
        <div class="rounded border px-3 py-2">
          <p class="m-0"><small class="fw-semibold">Option 3</small></p>
          <img src="{{ asset('images/pwa-guides/e-support-install5.png') }}" class="object-fit-contain w-100" alt="image" style="height: 10rem; object-position: left;">
          <h5 class="fw-semibold">Install on your device</h5>
          <p class="m-0">Find the "Install e-Support" button, a pop-out will open and click install.</p>
        </div>
      </div>
    </div>
  </main>
  <div>

  </div>

@endsection

@section('script')

  <script>

    const dropBtn = document.querySelectorAll('.dropdown-btn');

    dropBtn.forEach(btn => {
      const targetId = btn.getAttribute('data-target');
      const arrowId = btn.getAttribute('data-arrow');

      btn.addEventListener('click', () => {
        const target = document.getElementById(targetId);
        const arrow = document.getElementById(arrowId);

        target.classList.toggle('open');
        arrow.classList.toggle('rotate');
      });
    });



    const installButton = document.getElementById("install");
    const thanks = document.getElementById("thanks");
    // This variable will save the event for later use.
    let deferredPrompt;
    window.addEventListener('beforeinstallprompt', (e) => {
      // Prevents the default mini-infobar or install dialog from appearing on mobile
      e.preventDefault();
      // Save the event because you'll need to trigger it later.
      deferredPrompt = e;
      // Show your customized install prompt for your PWA
      // Your own UI doesn't have to be a single element, you
      // can have buttons in different locations, or wait to prompt
      // as part of a critical journey.
      showInAppInstallPromotion();
    });

    // Gather the data from your custom install UI event listener
    installButton.addEventListener('click', async () => {
      // deferredPrompt is a global variable we've been using in the sample to capture the `beforeinstallevent`
      deferredPrompt.prompt();
      // Find out whether the user confirmed the installation or not
      const { outcome } = await deferredPrompt.userChoice;
      // The deferredPrompt can only be used once.
      deferredPrompt = null;
      // Act on the user's choice
      if (outcome === 'accepted') {
        installButton.classList.add('d-none');
      } else if (outcome === 'dismissed') {
        installButton.classList.remove('d-none');
      }
    });

    window.addEventListener("appinstalled", () => {
      thanks.classList.remove('d-none');
      installButton.classList.add('d-none');
      window.location.replace('/login');
    });

    function showInAppInstallPromotion(){
      installButton.classList.remove('d-none');
    }

  </script>

@endsection