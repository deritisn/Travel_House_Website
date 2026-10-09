const header = document.querySelector('[data-header]');
const menuToggle = document.querySelector('[data-menu-toggle]');
const nav = document.querySelector('[data-nav]');

if (menuToggle && nav) {
  menuToggle.addEventListener('click', () => {
    const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
    menuToggle.setAttribute('aria-expanded', String(!isOpen));
    nav.classList.toggle('is-open', !isOpen);
    document.body.classList.toggle('menu-open', !isOpen);
  });

  nav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      menuToggle.setAttribute('aria-expanded', 'false');
      nav.classList.remove('is-open');
      document.body.classList.remove('menu-open');
    });
  });
}

const updateHeader = () => {
  header?.classList.toggle('is-scrolled', window.scrollY > 24);
  const scrollable = document.documentElement.scrollHeight - window.innerHeight;
  const progress = scrollable > 0 ? Math.min(1, Math.max(0, window.scrollY / scrollable)) : 0;
  document.documentElement.style.setProperty('--journey-progress', String(progress));
  const planeSize = 30 + (progress * 28);
  document.documentElement.style.setProperty('--plane-size', `${planeSize}px`);
  document.documentElement.style.setProperty('--plane-offset', `${planeSize / 2}px`);
  document.documentElement.style.setProperty('--plane-top', `${planeSize / -2}px`);
  document.documentElement.style.setProperty('--plane-font-size', `${planeSize * .43}px`);
};
updateHeader();
window.addEventListener('scroll', updateHeader, { passive: true });

const revealItems = document.querySelectorAll('.reveal');
if ('IntersectionObserver' in window) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px' });
  revealItems.forEach((item) => observer.observe(item));
} else {
  revealItems.forEach((item) => item.classList.add('is-visible'));
}

// Destination-board preview: feels like choosing a route at the airport.
const adventureBoard = document.querySelector('[data-adventure-board]');
if (adventureBoard) {
  const rows = [...adventureBoard.querySelectorAll('[data-adventure-image]')];
  const preview = adventureBoard.querySelector('[data-adventure-preview]');
  const previewTitle = adventureBoard.querySelector('[data-preview-title]');

  const showAdventure = (row) => {
    if (!preview) return;
    rows.forEach((item) => item.classList.toggle('is-active', item === row));
    preview.classList.add('is-switching');
    window.setTimeout(() => {
      preview.src = row.dataset.adventureImage;
      preview.alt = row.dataset.adventureAlt || '';
      if (previewTitle) previewTitle.textContent = row.querySelector('h3')?.textContent || '';
      preview.classList.remove('is-switching');
    }, 130);
  };

  rows.forEach((row) => {
    row.addEventListener('mouseenter', () => showAdventure(row));
    row.addEventListener('focus', () => showAdventure(row));
  });
}

// Gentle scene parallax. The travel cards drift like keepsakes on a table.
const motionScenes = document.querySelectorAll('[data-motion-scene]');
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const precisePointer = window.matchMedia('(pointer: fine)').matches;

if (!reduceMotion && precisePointer) {
  motionScenes.forEach((scene) => {
    const layers = [...scene.querySelectorAll('[data-parallax]')];
    scene.addEventListener('pointermove', (event) => {
      const bounds = scene.getBoundingClientRect();
      const x = (event.clientX - bounds.left) / bounds.width - 0.5;
      const y = (event.clientY - bounds.top) / bounds.height - 0.5;
      layers.forEach((layer) => {
        const power = Number(layer.dataset.parallax || 1);
        layer.style.setProperty('--parallax-x', `${x * 16 * power}px`);
        layer.style.setProperty('--parallax-y', `${y * 16 * power}px`);
      });
    });
    scene.addEventListener('pointerleave', () => {
      layers.forEach((layer) => {
        layer.style.setProperty('--parallax-x', '0px');
        layer.style.setProperty('--parallax-y', '0px');
      });
    });
  });

  document.querySelectorAll('[data-magnetic]').forEach((item) => {
    item.addEventListener('pointermove', (event) => {
      const bounds = item.getBoundingClientRect();
      const x = event.clientX - bounds.left - bounds.width / 2;
      const y = event.clientY - bounds.top - bounds.height / 2;
      item.style.transform = `translate(${x * 0.12}px, ${y * 0.12}px) rotate(5deg)`;
    });
    item.addEventListener('pointerleave', () => { item.style.transform = ''; });
  });
}
