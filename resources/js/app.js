import './bootstrap';
import 'bootstrap';

// ── Scroll-reveal via IntersectionObserver ──
const initScrollReveal = () => {
    const els = document.querySelectorAll('[data-animate]');
    if (!els.length) return;

    const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    els.forEach(el => io.observe(el));
};

// ── Mobile nav toggle ──
const initMobileNav = () => {
    const toggle  = document.getElementById('mobile-menu-toggle');
    const menu    = document.getElementById('mobile-menu');
    const iconMenu  = document.getElementById('icon-menu');
    const iconClose = document.getElementById('icon-close');
    if (!toggle || !menu) return;

    const open  = () => { menu.classList.remove('hidden'); iconMenu?.classList.add('hidden');  iconClose?.classList.remove('hidden'); };
    const close = () => { menu.classList.add('hidden');    iconMenu?.classList.remove('hidden'); iconClose?.classList.add('hidden'); };

    toggle.addEventListener('click', () => menu.classList.contains('hidden') ? open() : close());

    // Close when clicking a nav link in the mobile menu
    menu.querySelectorAll('a').forEach(a => a.addEventListener('click', close));
};

// ── Sticky header shadow ──
const initStickyHeader = () => {
    const header = document.getElementById('public-header');
    if (!header) return;

    const update = () => {
        if (window.scrollY > 30) {
            header.style.boxShadow = '0 4px 24px rgba(0,0,0,0.08)';
        } else {
            header.style.boxShadow = 'none';
        }
    };

    window.addEventListener('scroll', update, { passive: true });
    update();
};

// ── Gallery lightbox ──
const initGalleryLightbox = () => {
    const items   = document.querySelectorAll('.gallery-item');
    const overlay = document.getElementById('gallery-lightbox');
    if (!overlay) return;

    const img     = overlay.querySelector('#lightbox-img');
    const caption = overlay.querySelector('#lightbox-caption');
    const close   = overlay.querySelector('#lightbox-close');

    const openLightbox = (src, cap) => {
        img.src = src;
        caption.textContent = cap;
        overlay.classList.remove('hidden');
        overlay.style.opacity = '0';
        requestAnimationFrame(() => {
            overlay.style.transition = 'opacity 0.25s ease';
            overlay.style.opacity = '1';
        });
        document.body.style.overflow = 'hidden';
    };

    const closeLightbox = () => {
        overlay.style.opacity = '0';
        setTimeout(() => {
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }, 250);
    };

    items.forEach(item => {
        item.addEventListener('click', () => openLightbox(item.dataset.src, item.dataset.caption || ''));
    });

    close?.addEventListener('click', closeLightbox);
    overlay.addEventListener('click', e => { if (e.target === overlay) closeLightbox(); });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
};

// ── Flash message auto-hide ──
const initFlashMessages = () => {
    document.querySelectorAll('.flash-message').forEach(el => {
        setTimeout(() => {
            el.style.transition = 'opacity 0.5s, transform 0.5s';
            el.style.opacity    = '0';
            el.style.transform  = 'translateY(-10px)';
            setTimeout(() => el.remove(), 500);
        }, 4500);
    });
};

// ── Smooth active nav link highlighting ──
const initActiveNavHighlight = () => {
    const sections = document.querySelectorAll('section[id], footer[id]');
    const links    = document.querySelectorAll('.nav-link-public');
    if (!sections.length || !links.length) return;

    const io = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                links.forEach(l => l.classList.remove('text-amber-600'));
                const active = document.querySelector(`.nav-link-public[href*="#${entry.target.id}"]`);
                active?.classList.add('text-amber-600');
            }
        });
    }, { threshold: 0.4 });

    sections.forEach(s => io.observe(s));
};

// ── Counter animation for stat numbers ──
const initCounters = () => {
    const counters = document.querySelectorAll('[data-count]');
    if (!counters.length) return;

    const io = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el  = entry.target;
            const end = parseInt(el.dataset.count);
            let   cur = 0;
            const step = Math.ceil(end / 50);
            const timer = setInterval(() => {
                cur = Math.min(cur + step, end);
                el.textContent = cur + (el.dataset.suffix || '');
                if (cur >= end) clearInterval(timer);
            }, 30);
            io.unobserve(el);
        });
    }, { threshold: 0.5 });

    counters.forEach(el => io.observe(el));
};

// ── Initialize all ──
document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
    initMobileNav();
    initStickyHeader();
    initGalleryLightbox();
    initFlashMessages();
    initActiveNavHighlight();
    initCounters();
});
