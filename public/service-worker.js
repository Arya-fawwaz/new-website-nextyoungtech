const CACHE_NAME = 'nytech-cache-v1';
const ASSETS_TO_CACHE = [
  '/',
  '/css/app.css',
  '/js/app.js',
  '/favicon.ico',
  '/images/feature_3d_webgl.png',
  '/images/feature_speed.png',
  '/images/feature_secure.png',
  '/images/feature_seo.png',
  '/images/feature_responsive.png',
  '/images/feature_whatsapp.png'
];

// Install Event - Pre-cache assets
self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      console.log('[Service Worker] Pre-caching offline assets');
      return cache.addAll(ASSETS_TO_CACHE).catch(err => {
        console.warn('[Service Worker] Failed to pre-cache some assets:', err);
      });
    })
  );
  self.skipWaiting();
});

// Activate Event - Clean old caches
self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cache) => {
          if (cache !== CACHE_NAME) {
            console.log('[Service Worker] Clearing old cache');
            return caches.delete(cache);
          }
        })
      );
    })
  );
  self.clients.claim();
});

// Fetch Event - Network First falling back to Cache
self.addEventListener('fetch', (event) => {
  // Only handle GET requests and local assets to avoid CORS errors and POST issues
  if (event.request.method !== 'GET' || !event.request.url.startsWith(self.location.origin)) {
    return;
  }

  // Bypass specific system routes like admin portal or oauth
  if (event.request.url.includes('/admin') || event.request.url.includes('/auth/google')) {
    return;
  }

  event.respondWith(
    fetch(event.request)
      .then((response) => {
        // Clone and store fresh response to cache
        if (response.status === 200) {
          const responseClone = response.clone();
          caches.open(CACHE_NAME).then((cache) => {
            cache.put(event.request, responseClone);
          });
        }
        return response;
      })
      .catch(() => {
        // Fallback to cache if network is down
        return caches.match(event.request);
      })
  );
});
