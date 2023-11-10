importScripts(
  'https://storage.googleapis.com/workbox-cdn/releases/6.4.1/workbox-sw.js'
);
// workbox.setConfig({debug: false});

const recipes = workbox.recipes;
const precaching = workbox.precaching;
const routing = workbox.routing;
const strategies = workbox.strategies;
const expiration = workbox.expiration;
const cacheableResponse = workbox.cacheableResponse;
const backgroundSync = workbox.backgroundSync;

const queue = new backgroundSync.Queue('e-Support-queue');


// precaching assets
precaching.precacheAndRoute([
  // {url: '/login', revision: '383676'},
  {url: '/offline.html', revision: null},
  {url: '/images/fallback-icons/no-wifi.png', revision: null},
  {url: '/css/auth/users.css', revision: null},
  {url: 'css/resident/resident-layout.css', revision: null},
  {url: 'images/logos/brgy-nancayasan-logo.png', revision: null},
  {url: 'images/welcome-bg.png', revision: null},
  {url: 'js/resident/resident-sidebar.js', revision: null},
  {url: 'js/app.js', revision: null},
]);


// routing.registerRoute(
//   ({url}) => 
//     url.origin === 'https://fonts.googleapis.com' || 
//     url.origin === 'https://cdn.jsdelivr.net' ||
//     url.origin === 'https://code.jquery.com' ||
//     url.origin === 'https://kit.fontawesome.com',
//   new strategies.StaleWhileRevalidate({
//     cacheName: 'links',
//   })
// );

// caching cdns and links
routing.registerRoute(
  ({url}) => 
    (
      url.origin === 'https://fonts.googleapis.com' || 
      url.origin === 'https://cdn.jsdelivr.net' ||
      url.origin === 'https://cdn.jsdelivr.net' ||
      url.origin === 'https://cdn.jsdelivr.net' ||
      url.origin === 'https://cdn.jsdelivr.net' ||
      url.origin === 'https://cdn.jsdelivr.net' ||
      url.origin === 'https://code.jquery.com' ||
      url.origin === 'https://kit.fontawesome.com' ||
      url.origin === 'https://fonts.gstatic.com'
    )
    &&
    (
      url.pathname === '/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0' || 
      url.pathname === '/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' ||
      url.pathname === '/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js' ||
      url.pathname === '/npm/swiper@11/swiper-bundle.min.css' ||
      url.pathname === '/npm/swiper@11/swiper-bundle.min.js' ||
      url.pathname === '/npm/sweetalert2@11' ||
      url.pathname === '/jquery-3.7.0.min.js' ||
      url.pathname === '/0541fe1713.js'
    ),
  new strategies.NetworkFirst({
    cacheName: 'cdn-links',
    plugins: [
      new cacheableResponse.CacheableResponsePlugin({
        statuses: [0, 200],
      }),
      new expiration.ExpirationPlugin({
        maxEntries: 50,
        maxAgeSeconds: 7 * 24 * 60 * 60, // 1 week
      }),
    ]
  })
);



// POST requests
let networkOnly = new strategies.NetworkOnly({
  plugins: [
    new backgroundSync.BackgroundSyncPlugin(queue,{
      maxRetentionTime: 24 * 60, // Retry for max of 24 Hours
    })
  ],
});

const postHandler = async (args) => {
  try {
    const response = await networkOnly.handle(args);
    return response || await caches.match('/offline.html');
  } catch (error) {
    return await caches.match('/offline.html');
  }
};

routing.registerRoute(
  ({url, request}) => 
    (
      request.method === 'POST' || request.method === 'PATCH'
    ) 
    &&
    (
      url.pathname.startsWith('/resident/') ||
      url.pathname === '/resetPassword' ||
      url.pathname === '/forgotPassword' ||
      url.pathname === '/login-validate' ||
      url.pathname === '/forgotPassword'
    ),
  postHandler,
  'POST'
);

routing.registerRoute(
  ({request}) => request.destination === 'image',
  new strategies.CacheFirst({
    cacheName: 'images',
    plugins: [
      new cacheableResponse.CacheableResponsePlugin({
        statuses: [0, 200],
      }),
      new expiration.ExpirationPlugin({
        maxEntries: 50,
        maxAgeSeconds: 7 * 24 * 60 * 60, // 1 week
      }),
    ]
  })
);


// routing.registerRoute(
//   ({url}) => 
//     url.pathname === '/login-validate' || 
//     url.pathname === '/forgotPassword' || 
//     url.pathname === '/resetPassword' || 
//     url.pathname === '/resident/logout' || 
//     url.pathname === '/resident/business-clearance' || 
//     url.pathname === '/resident/indigency' || 
//     url.pathname === '/resident/brgy-clearance' ||
//     url.pathname === '/resident/report',
//   async ({url, request, event, params}) => {
//     fetch(request).then(response => {
//       console.log(request);
//       return response;
//     });
//   },
//   'POST'
// );


// GET requests
let networkFirst = new strategies.NetworkFirst({
  cacheName: 'e-Support-responses',
  plugins: [
    new cacheableResponse.CacheableResponsePlugin({
      statuses: [0, 200],
    }),
    new expiration.ExpirationPlugin({
      maxEntries: 50,
      maxAgeSeconds: 7 * 24 * 60 * 60, // 1 week
    }),
  ]
});

const getHandler = async (args) => {
  try {
    const response = await networkFirst.handle(args);
    return response || await caches.match('/offline.html');
  } catch (error) {
    return await caches.match('/offline.html');
  }
};


routing.registerRoute(
  ({url, request}) => 
    request.method === 'GET' &&
    (
      url.pathname.startsWith('/resident/') ||
      url.pathname.startsWith('/business/') ||
      url.pathname === '/login' ||
      url.pathname === '/register-resident' ||
      url.pathname === '/privacy-policy' ||
      url.pathname === '/terms-and-conditions' ||
      url.pathname === '/register-company' ||
      url.pathname === '/forgot-password' ||
      url.pathname === '/resident-otp-verification' ||
      url.pathname === '/company-otp-verification' ||
      url.pathname.startsWith('reset-password/')
    ),
  getHandler,
    // (
    //   url.pathname.startsWith('/resident/') || 
    //   url.pathname === '/register-resident' ||
    //   url.pathname === '/privacy-policy' ||
    //   url.pathname === '/terms-and-conditions' ||
    //   url.pathname === '/forgot-password' ||
    //   url.pathname === '/register-company' ||
    //   url.pathname.startsWith('/business/')
    // ) && 
    // (
      // request.method === 'GET'
    // ),
    // (
    //   url.pathname !== '/login-validate' || 
    //   url.pathname !== '/forgotPassword' || 
    //   url.pathname !== '/resetPassword' || 
    //   url.pathname !== '/resident/logout' || 
    //   url.pathname !== '/resident/business-clearance' || 
    //   url.pathname !== '/resident/indigency' || 
    //   url.pathname !== '/resident/brgy-clearance' ||
    //   url.pathname !== '/resident/report'
    // ),
  // new strategies.NetworkFirst({
  //   cacheName: 'e-Support-responses',
  //   plugins: [
  //     new cacheableResponse.CacheableResponsePlugin({
  //       statuses: [0, 200],
  //     }),
  //     new expiration.ExpirationPlugin({
  //       maxEntries: 50,
  //       maxAgeSeconds: 7 * 24 * 60 * 60, // 1 week
  //     }),
  //   ]
  // }),
);