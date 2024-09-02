import './bootstrap';


if (window.location.pathname === '/') {
    import('./welcome');
}

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);
