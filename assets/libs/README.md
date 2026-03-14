# Library Assets

Folder ini berisi semua library JavaScript dan CSS yang digunakan secara offline.

## Cara Download Library

### 1. Bootstrap 5.3.3
Download dari: https://github.com/twbs/bootstrap/releases/download/v5.3.3/bootstrap-5.3.3-dist.zip

Ekstrak dan letakkan:
- `css/bootstrap.min.css` → `assets/libs/bootstrap/css/bootstrap.min.css`
- `js/bootstrap.bundle.min.js` → `assets/libs/bootstrap/js/bootstrap.bundle.min.js`

### 2. jQuery 3.7.1
Download dari: https://code.jquery.com/jquery-3.7.1.min.js

Letakkan di: `assets/libs/jquery/jquery.min.js`

### 3. Bootstrap Icons 1.11.3
Download dari: https://github.com/twbs/icons/releases/download/v1.11.3/bootstrap-icons-1.11.3.zip

Ekstrak dan letakkan:
- `font/bootstrap-icons.min.css` → `assets/libs/bootstrap-icons/font/bootstrap-icons.min.css`
- `font/fonts/*` → `assets/libs/bootstrap-icons/font/fonts/`

### 4. AOS (Animate On Scroll) 2.3.4
Download dari: https://unpkg.com/aos@2.3.4/dist/

Letakkan:
- `aos.css` → `assets/libs/aos/aos.css`
- `aos.js` → `assets/libs/aos/aos.js`

## Struktur Folder

```
assets/libs/
├── bootstrap/
│   ├── css/
│   │   └── bootstrap.min.css
│   └── js/
│       └── bootstrap.bundle.min.js
├── jquery/
│   └── jquery.min.js
├── bootstrap-icons/
│   └── font/
│       ├── bootstrap-icons.min.css
│       └── fonts/
│           ├── bootstrap-icons.woff
│           └── bootstrap-icons.woff2
├── aos/
│   ├── aos.css
│   └── aos.js
├── fontawesome/        (sudah ada)
└── fontawesome-6/      (sudah ada)
```

## Quick Download Script (Windows PowerShell)

```powershell
# Bootstrap CSS
Invoke-WebRequest -Uri "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" -OutFile "bootstrap/css/bootstrap.min.css"

# Bootstrap JS
Invoke-WebRequest -Uri "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" -OutFile "bootstrap/js/bootstrap.bundle.min.js"

# jQuery
Invoke-WebRequest -Uri "https://code.jquery.com/jquery-3.7.1.min.js" -OutFile "jquery/jquery.min.js"

# Bootstrap Icons CSS
Invoke-WebRequest -Uri "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" -OutFile "bootstrap-icons/font/bootstrap-icons.min.css"

# AOS CSS
Invoke-WebRequest -Uri "https://unpkg.com/aos@2.3.4/dist/aos.css" -OutFile "aos/aos.css"

# AOS JS
Invoke-WebRequest -Uri "https://unpkg.com/aos@2.3.4/dist/aos.js" -OutFile "aos/aos.js"
```
