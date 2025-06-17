<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    :root {
      --uta-rojo: #8B0000;
      --uta-oscuro: #6b0000;
      --uta-claro: #f9f9f9;
      --sombra: 0 4px 6px rgba(0, 0, 0, 0.1);
      --transicion: all 0.3s ease;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: var(--uta-claro);
      color: #333;
      line-height: 1.6;
    }

    nav {
      background-color: var(--uta-oscuro);
      display: flex;
      justify-content: center;
      box-shadow: var(--sombra);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    nav a {
      color: white;
      padding: 1.2rem 2rem;
      text-decoration: none;
      font-weight: 500;
      letter-spacing: 0.5px;
      transition: var(--transicion);
      position: relative;
    }

    nav a:hover {
      background-color: var(--uta-rojo);
    }

    nav a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 3px;
      background: white;
      transition: var(--transicion);
    }

    nav a:hover::after {
      width: 70%;
    }

    .carousel-container {
      position: relative;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      overflow: hidden;
      border-radius: 8px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .carousel {
      position: relative;
      height: 500px;
      overflow: hidden;
    }

    .slides {
      display: flex;
      height: 100%;
      transition: transform 0.7s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    .slide {
      min-width: 100%;
      position: relative;
    }

    .slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }

    .slide-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
      padding: 2rem;
      color: white;
    }

    .slide-title {
      font-size: 2rem;
      margin-bottom: 0.5rem;
      font-weight: 600;
    }

    .slide-desc {
      font-size: 1.1rem;
      opacity: 0.9;
      max-width: 60%;
    }

    .carousel-controls {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
      padding: 0 1rem;
    }

    .carousel-button {
      background-color: rgba(255,255,255,0.2);
      color: white;
      border: none;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transicion);
      backdrop-filter: blur(5px);
    }

    .carousel-button:hover {
      background-color: var(--uta-rojo);
      transform: scale(1.1);
    }

    .carousel-indicators {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
    }

    .indicator {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: rgba(255,255,255,0.5);
      cursor: pointer;
      transition: var(--transicion);
    }

    .indicator.active {
      background-color: white;
      transform: scale(1.2);
    }

    main {
      max-width: 1200px;
      margin: 3rem auto;
      padding: 2rem;
      background: white;
      border-radius: 8px;
      box-shadow: var(--sombra);
    }

    .bloque {
      display: flex;
      align-items: flex-start;
      margin-bottom: 60px;
      transition: var(--transicion);
    }

    .bloque:hover {
      transform: translateY(-5px);
    }

    .titulo {
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--uta-rojo);
      margin-right: 40px;
      position: relative;
      min-width: 150px;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }

    .titulo::before {
      content: "";
      position: absolute;
      left: -20px;
      top: 0;
      bottom: 0;
      width: 6px;
      background-color: var(--uta-rojo);
      border-radius: 3px;
    }

    .contenido {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #444;
      text-align: justify;
      flex: 1;
    }

    .contenido p {
      margin-bottom: 1.5rem;
    }

    .contenido strong {
      color: var(--uta-oscuro);
      font-weight: 600;
    }

    .contenido em {
      font-style: italic;
      color: #555;
    }

    .section-title {
      text-align: center;
      color: var(--uta-rojo);
      font-size: 2.5rem;
      margin: 3rem 0;
      position: relative;
    }

    .section-title::after {
      content: '';
      display: block;
      width: 100px;
      height: 4px;
      background: var(--uta-rojo);
      margin: 15px auto;
      border-radius: 2px;
    }

    .cards-container {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      justify-content: center;
      padding: 0 2rem;
      margin-bottom: 4rem;
    }

    .card {
      flex: 1 1 300px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      overflow: hidden;
      max-width: 350px;
      transition: var(--transicion);
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .card-img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-bottom: 3px solid var(--uta-rojo);
    }

    .card-content {
      padding: 1.5rem;
    }

    .card-title {
      color: var(--uta-oscuro);
      font-size: 1.3rem;
      margin-bottom: 1rem;
      font-weight: 600;
    }

    .card-text {
      text-align: justify;
      font-size: 1rem;
      color: #555;
    }

    footer {
      background-color: var(--uta-rojo);
      color: white;
      text-align: center;
      padding: 2rem;
      font-size: 1rem;
      width: 98,8%;
      margin-top: 3rem;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .footer-logo {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .footer-links {
      display: flex;
      gap: 2rem;
      margin-bottom: 1.5rem;
    }

    .footer-links a {
      color: white;
      text-decoration: none;
      transition: var(--transicion);
    }

    .footer-links a:hover {
      text-decoration: underline;
      opacity: 0.9;
    }

    .copyright {
      opacity: 0.8;
      font-size: 0.9rem;
    }

    @media screen and (max-width: 992px) {
      .carousel {
        height: 400px;
      }
      
      .bloque {
        flex-direction: column;
      }

      .titulo {
        margin-bottom: 20px;
        margin-right: 0;
      }

      .titulo::before {
        left: 0;
        top: -15px;
        height: 5px;
        width: 80px;
        bottom: auto;
      }
    }

    @media screen and (max-width: 768px) {
      nav {
        flex-direction: column;
        align-items: center;
      }

      nav a {
        width: 100%;
        text-align: center;
        padding: 1rem;
      }

      .carousel {
        height: 300px;
      }

      .slide-overlay {
        padding: 1rem;
      }

      .slide-title {
        font-size: 1.5rem;
      }

      .slide-desc {
        font-size: 1rem;
        max-width: 100%;
      }

      .carousel-button {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
      }

      main {
        padding: 1.5rem;
        margin: 1.5rem auto;
      }

      .section-title {
        font-size: 2rem;
      }
    }

    @media screen and (max-width: 576px) {
      .carousel {
        height: 250px;
      }

      .slide-overlay {
        display: none;
      }

      .cards-container {
        padding: 0;
      }

      .card {
        flex: 1 1 100%;
      }
    }
  </style>
</head>
<body>

<!-- Header -->
<nav>
  <a href="index.php?action=inicio">Inicio</a>
  <a href="index.php?action=nosotros">Nosotros</a>
  <a href="index.php?action=servicios">Servicios</a>
  <a href="index.php?action=contactanos">Contáctanos</a>
</nav>
<br>
<!-- Carrusel Mejorado -->
<div class="carousel-container">
  <div class="carousel">
    <div class="slides" id="slides">
      <div class="slide">
        <img src="img/uta.jpg" alt="Campus UTA"/>
        <div class="slide-overlay">
          <h3 class="slide-title">Universidad Técnica de Ambato</h3>
          <p class="slide-desc">Institución de educación superior comprometida con la excelencia académica</p>
        </div>
      </div>
      <div class="slide">
        <img src="img/fisei.jpg" alt="Facultad FISEI"/>
        <div class="slide-overlay">
          <h3 class="slide-title">Facultad de Ingeniería en Sistemas</h3>
          <p class="slide-desc">Formando los profesionales tecnológicos del futuro</p>
        </div>
      </div>
      <div class="slide">
        <img src="img/ing.jpg" alt="Ingenierías UTA"/>
        <div class="slide-overlay">
          <h3 class="slide-title">Excelencia en Ingenierías</h3>
          <p class="slide-desc">Programas académicos de alto nivel y calidad</p>
        </div>
      </div>
    </div>
    
    <div class="carousel-controls">
      <button class="carousel-button" onclick="prevSlide()">❮</button>
      <button class="carousel-button" onclick="nextSlide()">❯</button>
    </div>
    
    <div class="carousel-indicators" id="indicators">
      <div class="indicator active" onclick="goToSlide(0)"></div>
      <div class="indicator" onclick="goToSlide(1)"></div>
      <div class="indicator" onclick="goToSlide(2)"></div>
    </div>
  </div>
</div>

<main>
  <div class="bloque">
    <div class="titulo">MISIÓN</div>
    <div class="contenido">
      <p><strong>Nuestra misión</strong> es <em>formar líderes profesionales</em> competentes, con pensamiento crítico y conciencia humanista. A través de la <strong>docencia, investigación y vinculación</strong> con la sociedad, impulsamos la transformación del conocimiento en soluciones para el desarrollo del país.</p>
      <p>Fomentamos la excelencia académica y el compromiso ético, construyendo un entorno que estimule la creatividad, la innovación y el servicio a la comunidad.</p>
    </div>
  </div>

  <div class="bloque">
    <div class="titulo">VISIÓN</div>
    <div class="contenido">
      <p><strong>Nuestra visión</strong> es consolidarnos como una <strong>universidad de referencia nacional e internacional</strong>, reconocida por sus niveles de excelencia en la formación de profesionales y su impacto positivo en la sociedad.</p>
      <p>Aspiramos a ser un <em>centro de innovación</em>, con liderazgo en ciencia y tecnología, comprometido con el bienestar social y el desarrollo sostenible del Ecuador y el mundo.</p>
    </div>
  </div>
</main>

<h2 class="section-title">Objetivos Estratégicos Institucionales</h2>

<div class="cards-container">
  <div class="card">
    <img src="img/liderazgo.jpg" alt="Formación Profesional" class="card-img">
    <div class="card-content">
      <h3 class="card-title">Formación Profesional</h3>
      <p class="card-text">
        Formar y especializar profesionales con liderazgo, responsabilidad social y conocimientos científicos, tecnológicos y artísticos que impulsen el desarrollo socioeconómico del país y el Buen Vivir.
      </p>
    </div>
  </div>

  <div class="card">
    <img src="img/innovacion.jpg" alt="Investigación e Innovación" class="card-img">
    <div class="card-content">
      <h3 class="card-title">Investigación e Innovación</h3>
      <p class="card-text">
        Realizar investigación científica y social que fomente la innovación, el crecimiento productivo y la superación de los problemas de desarrollo del país con calidad, pertinencia y ética.
      </p>
    </div>
  </div>

  <div class="card">
    <img src="img/vinculacion.jpg" alt="Vinculación con la Sociedad" class="card-img">
    <div class="card-content">
      <h3 class="card-title">Vinculación con la Sociedad</h3>
      <p class="card-text">
        Vincular la labor universitaria con el entorno productivo, cultural y social mediante la transferencia de conocimiento, la tecnología, y la producción de bienes y servicios.
      </p>
    </div>
  </div>
</div>

<script>
  let currentIndex = 0;
  const slides = document.getElementById('slides');
  const indicators = document.querySelectorAll('.indicator');
  const totalSlides = document.querySelectorAll('.slide').length;
  let slideInterval;

  function updateSlidePosition() {
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
    updateIndicators();
  }

  function updateIndicators() {
    indicators.forEach((indicator, index) => {
      indicator.classList.toggle('active', index === currentIndex);
    });
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlidePosition();
    resetInterval();
  }

  function prevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateSlidePosition();
    resetInterval();
  }

  function goToSlide(index) {
    currentIndex = index;
    updateSlidePosition();
    resetInterval();
  }

  function resetInterval() {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, 5000);
  }

  // Iniciar el carrusel automático
  slideInterval = setInterval(nextSlide, 5000);

  // Pausar el carrusel cuando el mouse está sobre él
  document.querySelector('.carousel').addEventListener('mouseenter', () => {
    clearInterval(slideInterval);
  });

  // Reanudar el carrusel cuando el mouse sale
  document.querySelector('.carousel').addEventListener('mouseleave', () => {
    resetInterval();
  });

  // Manejar eventos táctiles para dispositivos móviles
  let touchStartX = 0;
  let touchEndX = 0;

  document.querySelector('.carousel').addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
    clearInterval(slideInterval);
  });

  document.querySelector('.carousel').addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
    resetInterval();
  });

  function handleSwipe() {
    const threshold = 50;
    if (touchEndX < touchStartX - threshold) {
      nextSlide();
    } else if (touchEndX > touchStartX + threshold) {
      prevSlide();
    }
  }
</script>

</body>
</html>