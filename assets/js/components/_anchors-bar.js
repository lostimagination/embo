'use strict';

export const it_scroll_navigation = () => {
    const HEADER_HEIGHT = 100;
    const navElement = document.querySelector('.course-nav');

    if (!navElement) return;

    const placeholder = document.createElement('div');
    placeholder.style.display = 'none';
    placeholder.style.height = `${navElement.offsetHeight}px`;
    navElement.parentNode.insertBefore(placeholder, navElement);

    const navPosition = navElement.getBoundingClientRect().top + window.pageYOffset - HEADER_HEIGHT;

    const observerOptions = {
        root: null,
        rootMargin: `-${HEADER_HEIGHT}px 0px -50%`,
        threshold: 0
    };

    const anchorPoints = document.querySelectorAll('[id^="anchor-"]');
    const navLinks = document.querySelectorAll('.course-nav a');

    if (!anchorPoints.length || !navLinks.length) return;

    const handleNavPosition = () => {
        const scrollPosition = window.pageYOffset;

        if (scrollPosition >= navPosition - 50) {
            navElement.classList.add('is-fixed');
            placeholder.style.display = 'block';
        } else {
            navElement.classList.remove('is-fixed');
            placeholder.style.display = 'none';
        }
    };

    window.addEventListener('scroll', handleNavPosition);

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const sectionId = entry.target.id.replace('anchor-', '');

                navLinks.forEach(link => {
                    link.classList.remove('active');
                });

                const activeLink = document.querySelector(`.course-nav a[href="#${sectionId}"]`);
                if (activeLink) {
                    activeLink.classList.add('active');
                }
            }
        });
    }, observerOptions);

    anchorPoints.forEach(anchor => {
        observer.observe(anchor);
    });

    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const sectionId = link.getAttribute('href').replace('#', '');
            const targetElement = document.querySelector(`#anchor-${sectionId}`);

            if (targetElement) {
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - (HEADER_HEIGHT * 2);

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
};
