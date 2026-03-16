const VERSION = '1.2.0';
const CACHE_NAME = `bisnisonlinebgs-v${VERSION}`;

const ASSETS_TO_CACHE = [
    './',
    './index.php',
    './assets/libs/bootstrap/css/bootstrap.min.css',
    './assets/libs/jquery/jquery.min.js',
    './assets/libs/bootstrap/js/bootstrap.bundle.min.js',
    './assets/libs/aos/aos.js',
    './assets/libs/aos/aos.css',
    './assets/libs/bootstrap-icons/font/bootstrap-icons.min.css',
    './assets/images/logo.png',
    './assets/images/loading.gif'
];

// Install - cache core assets, skip waiting agar langsung aktif
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => cache.addAll(ASSETS_TO_CACHE))
            .then(() => self.skipWaiting())
    );
});

// Activate - hapus cache lama, ambil alih semua tab/client langsung (clients.claim)
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys()
            .then(cacheNames => Promise.all(
                cacheNames
                    .filter(name => name !== CACHE_NAME)
                    .map(name => caches.delete(name))
            ))
            .then(() => self.clients.claim())
    );
});

// Fetch - HANYA tangani request ke same-origin
// Request ke origin lain (api.bisnisonlinebgs.com, cloudflareinsights.com, dll)
// dibiarkan lewat langsung ke jaringan tanpa diproses SW
self.addEventListener('fetch', event => {
    const url = new URL(event.request.url);

    // Skip semua request cross-origin - jangan panggil event.respondWith()
    if (url.origin !== self.location.origin) {
        return;
    }

    // Hanya handle GET
    if (event.request.method !== 'GET') {
        return;
    }

    // Navigasi (HTML) - network first, fallback ke cache
    if (event.request.mode === 'navigate') {
        event.respondWith(
            fetch(event.request)
                .catch(() => caches.match(event.request).then(r => r || caches.match('./')))
        );
        return;
    }

    // Aset statis - cache first, fallback ke network
    event.respondWith(
        caches.match(event.request).then(cached => {
            if (cached) return cached;

            return fetch(event.request).then(response => {
                // Cache hanya aset gambar dan font
                if (response.ok &&
                    (url.pathname.includes('/assets/images/') ||
                     url.pathname.includes('/assets/fonts/'))) {
                    const clone = response.clone();
                    caches.open(CACHE_NAME).then(cache => cache.put(event.request, clone));
                }
                return response;
            });
        })
    );
});
