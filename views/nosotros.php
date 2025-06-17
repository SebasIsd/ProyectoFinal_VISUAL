<html>
<head>
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
      width: 100%;
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
    <nav>
        <a href="index.php?action=inicio">Inicio</a>
        <a href="index.php?action=nosotros">Nosotros</a>
        <a href="index.php?action=servicios">Servicios</a>
        <a href="index.php?action=contactanos">Contáctanos</a>
    </nav>

<main>
    <h1 class="section-title">INGENIERÍA EN SOFTWARE - FISEI UTA</h1>
    
    <div class="bloque">
        <h2 class="titulo">DESCRIPCIÓN</h2>
        <div class="contenido">
            <p>La <strong>Ingeniería en Software</strong> de la Facultad de Ingeniería en Sistemas, Electrónica e Industrial (FISEI) de la UTA forma profesionales capaces de:</p>
            <ul>
                <li>Diseñar, desarrollar e implementar sistemas de software de calidad</li>
                <li>Gestionar proyectos tecnológicos utilizando metodologías ágiles</li>
                <li>Crear soluciones innovadoras para problemas complejos</li>
                <li>Aplicar estándares internacionales en desarrollo de software</li>
                <li>Liderar equipos multidisciplinarios en entornos tecnológicos</li>
            </ul>
        </div>
    </div>
    
    <div class="bloque">
        <h2 class="titulo">PLAN DE ESTUDIOS</h2>
        <div class="contenido">
            <p>El programa académico combina fundamentos teóricos con aplicación práctica:</p>
            
            <div class="cards-container">
                <div class="card">
                    <img src="img/basico.jpg" alt="Ciclo Básico" class="card-img">
                    <div class="card-content">
                        <h3 class="card-title">Ciclo Básico</h3>
                        <p class="card-text">
                            • Matemáticas para ingeniería<br>
                            • Física aplicada<br>
                            • Algoritmos y programación<br>
                            • Estructuras de datos
                        </p>
                    </div>
                </div>
                
                <div class="card">
                    <img src="img/media.jpg" alt="Ciclo Intermedio" class="card-img">
                    <div class="card-content">
                        <h3 class="card-title">Ciclo Intermedio</h3>
                        <p class="card-text">
                            • Bases de datos<br>
                            • Ingeniería de software<br>
                            • Redes y comunicaciones<br>
                            • Desarrollo web
                        </p>
                    </div>
                </div>
                
                <div class="card">
                    <img src="img/avanzado.jpg" alt="Ciclo Avanzado" class="card-img">
                    <div class="card-content">
                        <h3 class="card-title">Ciclo Avanzado</h3>
                        <p class="card-text">
                            • Inteligencia artificial<br>
                            • Ciberseguridad<br>
                            • Proyecto de titulación
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bloque">
        <h2 class="titulo">CAMPO LABORAL</h2>
        <div class="contenido">
            <p>Nuestros egresados trabajan en:</p>
            <ul>
                <li>Desarrollo de aplicaciones empresariales</li>
                <li>Consultoría tecnológica</li>
                <li>Gestión de proyectos de TI</li>
                <li>Seguridad informática</li>
                <li>Inteligencia artificial y ciencia de datos</li>
                <li>Emprendimiento tecnológico</li>
            </ul>
            <p><em>Convenios con más de 20 empresas del sector tecnológico</em></p>
        </div>
    </div>
    
    <div class="bloque">
        <h2 class="titulo">ADMISIÓN</h2>
        <div class="contenido">
            <p><strong>Requisitos:</strong></p>
            <ul>
                <li>Título de bachiller</li>
                <li>Prueba de admisión UTA</li>
                <li>Entrevista personal (para becas)</li>
            </ul>
            <p><strong>Duración:</strong> 5 años (9 semestres)</p>
            <p><strong>Modalidad:</strong> Presencial</p>
            <p><strong>Horarios:</strong> Matutino y Vespertino</p>
        </div>
    </div>
</main>
</body>
</html>
