import './bootstrap';
import 'bootstrap';

// Animate on scroll – lightweight IntersectionObserver
const observeElements = () => {
    const els = document.querySelectorAll('[data-animate]');
    if (!els.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
                entry.target.style.opacity = '1';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    els.forEach(el => {
        el.style.opacity = '0';
        observer.observe(el);
    });
};

// Mobile nav toggle
const initMobileNav = () => {
    const toggle = document.getElementById('mobile-menu-toggle');
    const menu   = document.getElementById('mobile-menu');
    if (!toggle || !menu) return;

    toggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        const icon = toggle.querySelector('svg');
        if (icon) {
            icon.classList.toggle('rotate-90');
        }
    });
};

// Sticky header shadow on scroll
const initStickyHeader = () => {
    const header = document.getElementById('public-header');
    if (!header) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.classList.add('shadow-md', 'bg-white/98');
        } else {
            header.classList.remove('shadow-md', 'bg-white/98');
        }
    });
};

// Gallery lightbox (simple)
const initGalleryLightbox = () => {
    const items   = document.querySelectorAll('.gallery-item');
    const overlay = document.getElementById('gallery-lightbox');
    if (!overlay) return;

    const img     = overlay.querySelector('#lightbox-img');
    const caption = overlay.querySelector('#lightbox-caption');
    const close   = overlay.querySelector('#lightbox-close');

    items.forEach(item => {
        item.addEventListener('click', () => {
            const src = item.dataset.src;
            const cap = item.dataset.caption || '';
            img.src     = src;
            caption.textContent = cap;
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    });

    const closeLightbox = () => {
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
    };

    close.addEventListener('click', closeLightbox);
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
    });
};

// Flash message auto-hide
const initFlashMessages = () => {
    const flashes = document.querySelectorAll('.flash-message');
    flashes.forEach(flash => {
        setTimeout(() => {
            flash.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            flash.style.opacity    = '0';
            flash.style.transform  = 'translateY(-10px)';
            setTimeout(() => flash.remove(), 500);
        }, 4000);
    });
};

// Admin sidebar active state
const initSidebarActive = () => {
    const links = document.querySelectorAll('.sidebar-link');
    const current = window.location.pathname;
    links.forEach(link => {
        if (link.getAttribute('href') === current) {
            link.classList.add('active');
        }
    });
};

// Initialize all
document.addEventListener('DOMContentLoaded', () => {
    observeElements();
    initMobileNav();
    initStickyHeader();
    initGalleryLightbox();
    initFlashMessages();
    initSidebarActive();
});
