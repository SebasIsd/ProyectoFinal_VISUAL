<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Misión y Visión</title>
  <style>
    :root {
      --uta-rojo: #8B0000;
      --uta-oscuro: #6b0000;
      --uta-claro: #f9f9f9;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--uta-claro);
    }

    nav {
      background-color: var(--uta-oscuro);
      display: flex;
      justify-content: center;
    }

    nav a {
      color: white;
      padding: 1rem 2rem;
      text-decoration: none;
      font-weight: bold;
    }

    nav a:hover {
      background-color: rgba(139, 14, 14, 0.838);
    }

    .carousel {
      position: relative;
      overflow: hidden;
      width: 100%;
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .slide {
      min-width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .slide img {
      max-width: 100%;
      height: auto;
      display: block;
    }

    .carousel-buttons {
      position: absolute;
      top: 50%;
      width: 100%;
      display: flex;
      justify-content: space-between;
      transform: translateY(-50%);
      padding: 0 20px;
      pointer-events: none;
    }

    .carousel-button {
      background-color: rgba(0,0,0,0.4);
      color: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      font-size: 18px;
      border-radius: 50%;
      pointer-events: auto;
    }

    main {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 2rem;
      background: white;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .bloque {
      display: flex;
      align-items: flex-start;
      margin-bottom: 60px;
    }

    .titulo {
      font-size: 32px;
      font-weight: bold;
      color: var(--uta-rojo);
      margin-right: 20px;
      position: relative;
      min-width: 120px;
    }

    .titulo::before {
      content: "";
      position: absolute;
      left: -10px;
      top: 0;
      bottom: 0;
      width: 5px;
      background-color: var(--uta-rojo);
    }

    .contenido {
      font-size: 18px;
      line-height: 1.6;
      color: #000;
      text-align: justify;
      flex: 1;
    }

    footer {
      background-color: var(--uta-rojo);
      color: white;
      text-align: center;
      padding: 1rem;
      font-size: 0.9rem;
      width: 100%;
    }

    @media screen and (max-width: 768px) {
      .bloque {
        flex-direction: column;
      }

      nav {
        flex-direction: column;
      }

      nav a {
        border-top: 1px solid #aa2222;
      }

      .titulo {
        margin-bottom: 10px;
      }

      .titulo::before {
        left: 0;
        top: -10px;
        height: 5px;
        width: 100%;
        bottom: auto;
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

<!-- Carrusel -->
<div class="carousel">
  <div class="slides" id="slides">
    <div class="slide"><img src="img/uta.jpg" alt="Imagen Fisei 3" /></div>
    <div class="slide"><img src="img/fisei.jpg" alt="Imagen Fisei 1" /></div>
    <div class="slide"><img src="img/huachi.jpg" alt="Imagen Fisei 2" /></div>
    <div class="slide"><img src="img/ing.jpg" alt="Imagen Fisei 3" /></div>
  </div>
  <div class="carousel-buttons">
    <button class="carousel-button" onclick="prevSlide()">❮</button>
    <button class="carousel-button" onclick="nextSlide()">❯</button>
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

 <div style="text-align: center; margin-bottom: 2rem;">
  <h2 style="color: var(--uta-rojo); font-size: 28px; margin-bottom: 1rem;">Objetivos Estratégicos Institucionales</h2>
</div>

<div style="display: flex; flex-wrap: wrap; gap: 2rem; justify-content: center;">

 
  <div style="flex: 1 1 300px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); overflow: hidden; max-width: 350px;">
    <img src="img/liderazgo.jpg" alt="Liderazgo" style="width: 100%; height: 200px; object-fit: cover;">
    <div style="padding: 1rem;">
      <h3 style="color: var(--uta-oscuro); font-size: 20px;">Formación Profesional</h3>
      <p style="text-align: justify; font-size: 16px;">
        Formar y especializar profesionales con liderazgo, responsabilidad social y conocimientos científicos, tecnológicos y artísticos que impulsen el desarrollo socioeconómico del país y el Buen Vivir.
      </p>
    </div>
  </div>

 
  <div style="flex: 1 1 300px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); overflow: hidden; max-width: 350px;">
    <img src="img/innovacion.jpg" alt="Investigación e Innovación" style="width: 100%; height: 200px; object-fit: cover;">
    <div style="padding: 1rem;">
      <h3 style="color: var(--uta-oscuro); font-size: 20px;">Investigación e Innovación</h3>
      <p style="text-align: justify; font-size: 16px;">
        Realizar investigación científica y social que fomente la innovación, el crecimiento productivo y la superación de los problemas de desarrollo del país con calidad, pertinencia y ética.
      </p>
    </div>
  </div>

  
  <div style="flex: 1 1 300px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); overflow: hidden; max-width: 350px;">
    <img src="img/vinculacion.jpg" alt="Vinculación con la Sociedad" style="width: 100%; height: 200px; object-fit: cover;">
    <div style="padding: 1rem;">
      <h3 style="color: var(--uta-oscuro); font-size: 20px;">Vinculación con la Sociedad</h3>
      <p style="text-align: justify; font-size: 16px;">
        Vincular la labor universitaria con el entorno productivo, cultural y social mediante la transferencia de conocimiento, la tecnología, y la producción de bienes y servicios.
      </p>
    </div>
  </div>

</div>



<script>
  let index = 0;
  const slides = document.getElementById('slides');

  function showSlide(i) {
    const totalSlides = slides.children.length;
    index = (i + totalSlides) % totalSlides;
    slides.style.transform = `translateX(-${index * 100}%)`;
  }

  function nextSlide() {
    showSlide(index + 1);
  }

  function prevSlide() {
    showSlide(index - 1);
  }

  setInterval(() => {
    nextSlide();
  }, 5000);
</script>

</body>
</html>
