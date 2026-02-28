document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('.content-wrapper .container');
  if (container && !document.querySelector('.ux-hero')) {
    const hero = document.createElement('div');
    hero.className = 'ux-hero';
    hero.innerHTML = `
      <span class="ux-badge">Admin Console</span>
      <div>
        <h3 class="ux-hero-title">Command center for course operations</h3>
        <p class="ux-hero-sub">Manage students, scheduling, and reporting with clarity.</p>
        <div class="ux-stats">
          <div class="ux-stat-card">
            <div class="ux-stat-title">Active Departments</div>
            <div class="ux-stat-value" data-count="8">0</div>
          </div>
          <div class="ux-stat-card">
            <div class="ux-stat-title">Pending Requests</div>
            <div class="ux-stat-value" data-count="3">0</div>
          </div>
          <div class="ux-stat-card">
            <div class="ux-stat-title">Daily Logins</div>
            <div class="ux-stat-value" data-count="24">0</div>
          </div>
        </div>
      </div>
    `;
    container.prepend(hero);
  }

  const counters = document.querySelectorAll('[data-count]');
  counters.forEach((counter) => {
    const target = parseInt(counter.getAttribute('data-count'), 10);
    let current = 0;
    const step = Math.max(1, Math.floor(target / 20));
    const tick = () => {
      current += step;
      if (current >= target) {
        counter.textContent = target;
        return;
      }
      counter.textContent = current;
      requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  });

  const inputs = document.querySelectorAll('input.form-control');
  inputs.forEach((input) => {
    input.addEventListener('focus', () => input.classList.add('is-focused'));
    input.addEventListener('blur', () => input.classList.remove('is-focused'));
  });
});
