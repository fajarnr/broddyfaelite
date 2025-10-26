function toggleMenu() {
    document.getElementById('navMenu').classList.toggle('active');
}

const scrollContent = document.querySelector(".scroll-content");
const bio = document.querySelector("#bio");
const contact = document.querySelector("#contact");
const links = document.querySelectorAll(".top-menu a");

// Update active saat scroll
scrollContent.addEventListener("scroll", () => {
  let scrollTop = scrollContent.scrollTop;

  if (scrollTop >= contact.offsetTop - 100) {
    setActive("contact");
  } else {
    setActive("bio");
  }
});

// Klik smooth + langsung active
links.forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    const targetId = link.getAttribute("href");
    const target = document.querySelector(targetId);

    scrollContent.scrollTo({
      top: target.offsetTop,
      behavior: "smooth"
    });

    setActive(targetId.replace("#", ""));
  });
});

// Helper ubah active
function setActive(section) {
  links.forEach(link => link.classList.remove("active"));
  document.querySelector(`.top-menu a[href="#${section}"]`).classList.add("active");
}


// MERCH
document.addEventListener('DOMContentLoaded', () => {
    Livewire.on('sold-updated', ({ merchId, sold }) => {
        Swal.fire({
            toast: true,
            icon: 'success',
            title: `Status merch #${merchId} diubah menjadi ${sold ? 'Sold' : 'Available'}`,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });
    });

    Livewire.on('failed-update', ({ message }) => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: message,
        });
    });
});


// SHOW
Livewire.on('tiket-updated', ({ merchId, tiket }) => {
    Swal.fire({
        toast: true,
        icon: 'success',
        title: `Status tiket #${merchId} diubah menjadi ${tiket ? 'Available' : 'Sold'}`,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000
    });
});

//detail
document.addEventListener("DOMContentLoaded", () => {
    const faders = document.querySelectorAll(".fade-section");

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                obs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    faders.forEach(el => observer.observe(el));
});
