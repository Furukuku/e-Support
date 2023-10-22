const staticCache = 'e-Support-static-v2';
const dynamicCache = 'e-Support-dynamic-v2';

const assets = [
  '/login',
  'fallback.blade.php',
  'css/auth/users.css',
  'css/resident/resident-layout.css',
  'images/logos/brgy-nancayasan-logo.png',
  'images/welcome-bg.png',
  'js/resident/resident-sidebar.js',
  'js/app.js',
  'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
  'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0',
  'https://fonts.gstatic.com/s/materialsymbolsoutlined/v141/kJF1BvYX7BgnkSrUwT8OhrdQw4oELdPIeeII9v6oDMzByHX9rA6RzazHD_dY43zj-jCxv3fzvRNU22ZXGJpEpjC_1n-q_4MrImHCIJIZrDDxHOej.woff2',
  'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
  'https://cdn.jsdelivr.net/npm/sweetalert2@11',
  'https://code.jquery.com/jquery-3.7.0.min.js',
  'https://kit.fontawesome.com/0541fe1713.js'
];


// cache size limit function
// const limitCacheSize = (name, size) => {
//   cache.open(name).then(cache => {
//     cache.keys().then(keys => {
//       if(keys.length > size){
//         cache.delete(keys[0]).then(limitCacheSize(name, size));
//       }
//     })
//   });
// };


// install service worker
self.addEventListener("install", event => {
  // console.log("Service worker installed", event);
  event.waitUntil(
    caches.open(staticCache).then(cache => {
      return cache.addAll(assets);
    })
  );
});

// activates service worker
self.addEventListener("activate", event => {
  // console.log("Service worker activated", event);
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if(cache !== staticCache && cache !== dynamicCache){
            console.log('Cleaning old caches.');
            return caches.delete(cache);
          }
        })
      );
      // return Promise.all(keys
      //   .filter(key => key !== staticCache && key !== dynamicCache)
      //   .map(key => caches.delete(key)));
    })
  );
});

// fetch requests
// self.addEventListener("fetch", event => {
//   // console.log("URL requested:", event.request);
//   // if (event.request.url.indexOf( '/resident/logout' ) !== -1 ) {
//   //   return false;
//   // }
//   event.respondWith(
//     fetch(event.request)
//       .then(res => {
//         const resClone = res.clone();
//         caches.open(dynamicCache).then(cache => {
//           cache.put(event.request, resClone);
//         });
//         return res;
//       })
//       .catch(err => {
//         caches.match(event.request).then(res => {
//           return res;
//         }).catch(err => {
//           return caches.match('fallback.blade.php');
//         });
//       })
//   );
// });


self.addEventListener("fetch", event => {
  event.respondWith(
    fetch(event.request).then(response => {
      return caches.open(dynamicCache).then(cache => {
        if(event.request.method !== "POST"){
          cache.put(event.request, response.clone());
        }
        return response;
      });
    })
    .catch(error => {
      caches.match(event.request).then(response => {
        return response;
      })
      .catch(err => {
        return caches.match('fallback.blade.php');
      });
    })
  );
});