const CACHE_NAME = 'vw-catalog-cache-v1';
const urlsToCache = [
  '/',
  '/index.html',
  '/CFNA.html',
  '/engines.html',
  '/transmissions.html',
  '/lk.html',
  '/login.html',
  '/registration.html',
  '/styles/style.css',
  '/styles/engines.css',
  '/styles/lk.css',
  '/src/vw-logo.svg',
  '/src/vw-golf.png',
  '/manifest.json'
];

self.addEventListener('install', function (event) {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function (cache) {
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('fetch', function (event) {
  event.respondWith(
    caches.match(event.request)
      .then(function (response) {
        return response || fetch(event.request);
      })
  );
});
