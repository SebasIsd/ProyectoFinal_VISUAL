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
<section class="contact-section">
  <div class="section-title">
    <h2>Contáctanos</h2>
    <p>Nuestro equipo está listo para ayudarte</p>
</div>
  <!-- Equipo de trabajo -->
  <div class="team-section">
    <div class="team-container">
      <!-- Miembro 1 -->
      <div class="team-member">
        <div class="member-photo">
          <img src="img/vivi.jpg" alt="Miembro del equipo">
          <div class="social-links">
            <a href="https://wa.me/593988519822" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-whatsapp"></i>
            <a href="https://www.facebook.com/viviana.sarco.7"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
        <div class="member-info">
          <h4>Viviana Sarco</h4>
          <p class="position">Estudiante FISEI</p>
          <p class="bio">Encargada en la configuracion del Back</p>
        </div>
      </div>

            <div class="team-member">
        <div class="member-photo">
          <img src="img/alex.jpg" alt="Miembro del equipo">
          <div class="social-links">
            <a href="https://wa.me/593998316691" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-whatsapp"></i>
            <a href="#"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
        <div class="member-info">
          <h4>Alex Reyes</h4>
          <p class="position">Estudiante FISEI</p>
          <p class="bio">Experto en soporte técnico y Back </p>
        </div>
      </div>
    
      <!-- Miembro 3 -->
      <div class="team-member">
        <div class="member-photo">
          <img src="img/anthony.jpg" alt="Miembro del equipo">
          <div class="social-links">
            <a href="https://wa.me/593987859944" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-whatsapp"></i>
            <a href="https://www.facebook.com/antthony.monge"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
        <div class="member-info">
          <h4>Anthony Semblantes</h4>
          <p class="position">Estudiante FISEI</p>
          <p class="bio">Experto en implementación y soporte técnico y Front</p>
        </div>
      </div>

      
      <!-- Miembro 2 -->
      <div class="team-member">
        <div class="member-photo">
          <img src="img/yo.jpg" alt="Miembro del equipo">
          <div class="social-links">
            <a href="https://wa.me/593995781009" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-whatsapp"></i>
            <a href="https://www.facebook.com/sebas.santana.531037"><i class="fab fa-facebook"></i></a>
          </div>
        </div>
        <div class="member-info">
          <h4>Sebastian Santana</h4>
          <p class="position">Estudiante FISEI</p>
          <p class="bio">Estudiante y Apasionado por crear Front innovadores</p>
        </div>
      </div>


    </div>
  </div>
  
</section>

<style>
  /* Estilos para la sección de contacto */
  .contact-section {
    max-width: 1200px;
    margin: 3rem auto;
    padding: 2rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .contact-section .section-title {
    text-align: center;
    margin-bottom: 3rem;
  }

  .contact-section .section-title h2 {
    color: var(--uta-rojo);
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
  }

  .contact-section .section-title p {
    color: #666;
    font-size: 1.2rem;
  }

  .contact-container {
    display: flex;
    gap: 2rem;
    margin-bottom: 4rem;
  }

  .contact-info, .contact-form {
    flex: 1;
  }

  .contact-info h3, .contact-form h3 {
    color: var(--uta-oscuro);
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.5rem;
  }

  .contact-info h3::after, .contact-form h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--uta-rojo);
  }

  .contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
  }

  .contact-item i {
    color: var(--uta-rojo);
    margin-right: 1rem;
    font-size: 1.2rem;
    margin-top: 0.2rem;
  }

  .contact-item p {
    margin: 0;
    color: #555;
  }

  .form-group {
    margin-bottom: 1.5rem;
  }

  .form-group input,
  .form-group textarea {
    width: 100%;
    padding: 0.8rem 1rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-family: 'Poppins', sans-serif;
    font-size: 1rem;
    transition: var(--transicion);
  }

  .form-group input:focus,
  .form-group textarea:focus {
    outline: none;
    border-color: var(--uta-rojo);
    box-shadow: 0 0 0 2px rgba(139, 0, 0, 0.1);
  }

  .submit-btn {
    background: var(--uta-rojo);
    color: white;
    border: none;
    padding: 0.8rem 2rem;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 4px;
    cursor: pointer;
    transition: var(--transicion);
  }

  .submit-btn:hover {
    background: var(--uta-oscuro);
    transform: translateY(-2px);
  }

  /* Estilos para el equipo */
  .team-section {
    margin-top: 4rem;
  }

  .team-section h3 {
    text-align: center;
    font-size: 2rem;
    color: var(--uta-oscuro);
    margin-bottom: 3rem;
    position: relative;
  }

  .team-section h3::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: var(--uta-rojo);
  }

  .team-container {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
  }

  .team-member {
    flex: 1 1 300px;
    max-width: 350px;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: var(--transicion);
  }

  .team-member:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
  }

  .member-photo {
    position: relative;
    height: 300px;
    overflow: hidden;
  }

  .member-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transicion);
  }

  .team-member:hover .member-photo img {
    transform: scale(1.05);
  }

  .social-links {
    position: absolute;
    bottom: -50px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 1rem;
    background: rgba(139, 0, 0, 0.8);
    padding: 1rem;
    transition: var(--transicion);
  }

  .team-member:hover .social-links {
    bottom: 0;
  }

  .social-links a {
    color: white;
    font-size: 1.2rem;
    transition: var(--transicion);
  }

  .social-links a:hover {
    transform: translateY(-3px);
  }

  .member-info {
    padding: 1.5rem;
    text-align: center;
  }

  .member-info h4 {
    color: var(--uta-oscuro);
    font-size: 1.4rem;
    margin-bottom: 0.5rem;
  }

  .position {
    color: var(--uta-rojo);
    font-weight: 500;
    margin-bottom: 1rem;
  }

  .bio {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
  }

  /* Responsive */
  @media (max-width: 992px) {
    .contact-container {
      flex-direction: column;
    }
    
    .team-member {
      flex: 1 1 45%;
    }
  }

  @media (max-width: 768px) {
    .team-member {
      flex: 1 1 100%;
      max-width: 400px;
    }
  }
</style>

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>