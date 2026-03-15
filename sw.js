const VERSION = '1.0.5';
const CACHE_NAME = `bisnisonlinebgs-v${VERSION}`;

const ASSETS_TO_CACHE = [
    './',
    './index.php',
    `./assets/css/style.css?v=${VERSION}`,
    `./assets/js/app.js?v=${VERSION}`,
    './assets/libs/bootstrap/css/bootstrap.min.css',
    './assets/libs/jquery/jquery.min.js',
    './assets/libs/bootstrap/js/bootstrap.bundle.min.js',
    './assets/libs/aos/aos.js',
    './assets/libs/aos/aos.css',
    './assets/libs/bootstrap-icons/font/bootstrap-icons.min.css',
    './assets/images/logo.png',
    './assets/images/loading.gif'
];

// Install Event - caching assets
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                console.log('SW: Pre-caching assets');
                return cache.addAll(ASSETS_TO_CACHE);
            })
            .then(() => self.skipWaiting())
    );
});

// Activate Event - cleanup old caches
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cache => {
                    if (cache !== CACHE_NAME) {
                        console.log('SW: Clearing old cache', cache);
                        return caches.delete(cache);
                    }
                })
            );
        })
    );
});

// Fetch Event - network first for HTML, cache first for others
self.addEventListener('fetch', event => {
    const url = new URL(event.request.url);
    
    // For navigation requests (pages), try network first
    if (event.request.mode === 'navigate' || (event.request.method === 'GET' && event.request.headers.get('accept').includes('text/html'))) {
        event.respondWith(
            fetch(event.request)
                .catch(() => caches.match(event.request) || caches.match('./'))
        );
        return;
    }

    // For static assets, try cache first
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request).then(fetchResponse => {
                    // Cache images or other assets dynamically if needed
                    if (url.origin === self.location.origin && 
                        (url.pathname.includes('/assets/images/') || url.pathname.includes('/assets/fonts/'))) {
                        return caches.open(CACHE_NAME).then(cache => {
                            cache.put(event.request, fetchResponse.clone());
                            return fetchResponse;
                        });
                    }
                    return fetchResponse;
                });
            })
    );
});
