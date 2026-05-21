// Navbar scroll behavior
const navbar = document.getElementById('main-nav');
if (navbar) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 60) {
            navbar.classList.add('nav-scrolled');
        } else {
            navbar.classList.remove('nav-scrolled');
        }
    }, { passive: true });
}

// Mobile menu
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
if (menuBtn && mobileMenu) {
    menuBtn.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.contains('opacity-100');
        if (isOpen) {
            mobileMenu.classList.remove('opacity-100', 'pointer-events-auto');
            mobileMenu.classList.add('opacity-0', 'pointer-events-none');
            menuBtn.setAttribute('aria-expanded', 'false');
        } else {
            mobileMenu.classList.remove('opacity-0', 'pointer-events-none');
            mobileMenu.classList.add('opacity-100', 'pointer-events-auto');
            menuBtn.setAttribute('aria-expanded', 'true');
        }
    });

    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('opacity-100', 'pointer-events-auto');
            mobileMenu.classList.add('opacity-0', 'pointer-events-none');
            menuBtn.setAttribute('aria-expanded', 'false');
        });
    });
}

// Testimonials carousel
(function () {
    const track = document.getElementById('testimonials-track');
    const prevBtn = document.getElementById('testimonials-prev');
    const nextBtn = document.getElementById('testimonials-next');
    const dotsContainer = document.getElementById('testimonials-dots');

    if (!track) return;

    const cards = track.querySelectorAll('[data-testimonial]');
    if (!cards.length) return;

    let current = 0;
    const total = cards.length;

    function getVisibleCount() {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 640) return 2;
        return 1;
    }

    function maxIndex() {
        return Math.max(0, total - getVisibleCount());
    }

    function getCardWidth() {
        return cards[0].getBoundingClientRect().width;
    }

    function getGap() {
        const cs = getComputedStyle(track);
        return parseInt(cs.gap || cs.columnGap || '0');
    }

    function goTo(index) {
        current = Math.min(Math.max(0, index), maxIndex());
        const offset = current * (getCardWidth() + getGap());
        track.style.transform = `translateX(-${offset}px)`;
        updateDots();
        updateButtons();
    }

    function updateDots() {
        if (!dotsContainer) return;
        dotsContainer.querySelectorAll('button').forEach((dot, i) => {
            if (i === current) {
                dot.style.width = '1.5rem';
                dot.style.backgroundColor = '#B8955A';
            } else {
                dot.style.width = '0.375rem';
                dot.style.backgroundColor = '#D6D3D1';
            }
        });
    }

    function updateButtons() {
        if (prevBtn) prevBtn.disabled = current === 0;
        if (nextBtn) nextBtn.disabled = current >= maxIndex();
    }

    if (dotsContainer) {
        const dotCount = maxIndex() + 1;
        for (let i = 0; i < dotCount; i++) {
            const dot = document.createElement('button');
            dot.style.height = '0.375rem';
            dot.style.borderRadius = '9999px';
            dot.style.transition = 'all 0.3s ease';
            dot.setAttribute('aria-label', `Depoimento ${i + 1}`);
            dot.addEventListener('click', () => goTo(i));
            dotsContainer.appendChild(dot);
        }
    }

    if (prevBtn) prevBtn.addEventListener('click', () => goTo(current - 1));
    if (nextBtn) nextBtn.addEventListener('click', () => goTo(current + 1));

    let autoplay = setInterval(() => goTo(current + 1 > maxIndex() ? 0 : current + 1), 6000);

    track.addEventListener('mouseenter', () => clearInterval(autoplay));
    track.addEventListener('mouseleave', () => {
        autoplay = setInterval(() => goTo(current + 1 > maxIndex() ? 0 : current + 1), 6000);
    });

    let touchStartX = 0;
    track.parentElement.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
    track.parentElement.addEventListener('touchend', e => {
        const diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) goTo(diff > 0 ? current + 1 : current - 1);
    }, { passive: true });

    window.addEventListener('resize', () => goTo(Math.min(current, maxIndex())), { passive: true });

    goTo(0);
})();

// Scroll reveal animation
(function () {
    const targets = document.querySelectorAll('[data-reveal]');
    if (!targets.length || !window.IntersectionObserver) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    targets.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(24px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        el.style.transitionDelay = el.dataset.delay || '0ms';
        observer.observe(el);
    });
})();
