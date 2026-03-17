// Service Worker cleanup mode.
// Tujuan: nonaktifkan SW lama yang sempat intercept request eksternal dan menimbulkan error CSP.
self.addEventListener('install', () => {
    self.skipWaiting();
});

self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys()
            .then(keys => Promise.all(keys.map(key => caches.delete(key))))
            .then(() => self.registration.unregister())
            .then(() => self.clients.matchAll({ includeUncontrolled: true }))
            .then(clients => Promise.all(clients.map(client => client.navigate(client.url))))
    );
});
