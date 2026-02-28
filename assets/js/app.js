document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('.content-wrapper .container');
  if (container && !document.querySelector('.ux-hero')) {
    const hero = document.createElement('div');
    hero.className = 'ux-hero';
    hero.innerHTML = `
      <span class="ux-badge">Student Portal</span>
      <div>
        <h3 class="ux-hero-title">Welcome back to your learning hub</h3>
        <p class="ux-hero-sub">Sign in to unlock courses, enrollments, and personalized progress.</p>
        <div class="ux-stats">
          <div class="ux-stat-card">
            <div class="ux-stat-title">Active Courses</div>
            <div class="ux-stat-value" data-count="12">0</div>
          </div>
          <div class="ux-stat-card">
            <div class="ux-stat-title">New Sessions</div>
            <div class="ux-stat-value" data-count="5">0</div>
          </div>
          <div class="ux-stat-card">
            <div class="ux-stat-title">Fast Enrollment</div>
            <div class="ux-stat-value" data-count="2">0</div>
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
