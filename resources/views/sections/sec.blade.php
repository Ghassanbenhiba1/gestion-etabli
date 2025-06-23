<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Galerie de l'Établissement</title>
  <style>
    :root {
      --primary-color: #3498db;
      --secondary-color: #2c3e50;
      --text-color: #555;
      --light-color: #fff;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      --transition: all 0.3s ease;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background: #f9f9f9;
      line-height: 1.6;
    }

    .section-galerie {
      padding: 60px 20px;
      background-color: var(--light-color);
      text-align: center;
    }

    .section-title {
      font-size: 2.5em;
      margin-bottom: 15px;
      color: var(--secondary-color);
      position: relative;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      position: absolute;
      width: 60%;
      height: 3px;
      background: var(--primary-color);
      bottom: -10px;
      left: 20%;
      border-radius: 3px;
    }

    .section-description {
      font-size: 1.1em;
      max-width: 800px;
      margin: 0 auto 50px auto;
      color: var(--text-color);
    }

    .carousel-container {
      width: 90%;
      max-width: 1000px;
      margin: auto;
      position: relative;
    }

    .carousel {
      position: relative;
      overflow: hidden;
      border-radius: 15px;
      box-shadow: var(--shadow);
    }

    .carousel-images {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .carousel-image {
      min-width: 100%;
      height: 500px;
      object-fit: cover;
      transition: var(--transition);
    }

    .carousel-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.6);
      color: var(--light-color);
      border: none;
      font-size: 2em;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
      z-index: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition);
    }

    .carousel-btn:hover {
      background-color: var(--primary-color);
      transform: translateY(-50%) scale(1.1);
    }

    .carousel-btn.left {
      left: 20px;
    }

    .carousel-btn.right {
      right: 20px;
    }

    .carousel-indicators {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      gap: 10px;
    }

    .indicator {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: #ccc;
      cursor: pointer;
      transition: var(--transition);
    }

    .indicator.active {
      background-color: var(--primary-color);
      transform: scale(1.2);
    }

    .image-caption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.6);
      color: var(--light-color);
      padding: 15px;
      text-align: center;
      font-size: 1.1em;
      transform: translateY(100%);
      transition: var(--transition);
    }

    .carousel-image-container {
      position: relative;
      overflow: hidden;
      width: 100%;
    }

    .carousel-image-container:hover .image-caption {
      transform: translateY(0);
    }

    @media (max-width: 768px) {
      .carousel-image {
        height: 350px;
      }

      .carousel-btn {
        width: 40px;
        height: 40px;
        font-size: 1.5em;
      }
    }

    @media (max-width: 480px) {
      .section-title {
        font-size: 2em;
      }

      .carousel-image {
        height: 250px;
      }

      .image-caption {
        font-size: 0.9em;
        padding: 10px;
      }
    }
  </style>
</head>
<body>

  <section class="section-galerie">
    <h2 class="section-title">Notre Établissement en Images</h2>
    <p class="section-description">
      Découvrez quelques aperçus de notre établissement : des infrastructures modernes, des espaces de travail agréables et un environnement propice à l'apprentissage.
    </p>

    <div class="carousel-container">
      <div class="carousel">
        <button class="carousel-btn left" onclick="prevSlide()">&#10094;</button>

        <div class="carousel-images" id="carouselImages">
          <div class="carousel-image-container">
            <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Bâtiment principal" class="carousel-image">
            <div class="image-caption">Bâtiment principal de notre établissement</div>
          </div>

          <div class="carousel-image-container">
            <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Salle de classe moderne" class="carousel-image">
            <div class="image-caption">Nos salles de classe modernes et équipées</div>
          </div>

          <div class="carousel-image-container">
            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Bibliothèque" class="carousel-image">
            <div class="image-caption">Bibliothèque avec un large choix d'ouvrages</div>
          </div>

          <div class="carousel-image-container">
            <img src="https://images.unsplash.com/photo-1541178735493-479c1a27ed24?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Laboratoire informatique" class="carousel-image">
            <div class="image-caption">Laboratoire informatique hautement équipé</div>
          </div>
        </div>

        <button class="carousel-btn right" onclick="nextSlide()">&#10095;</button>
      </div>

      <div class="carousel-indicators" id="carouselIndicators"></div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const images = document.getElementById("carouselImages");
      const indicatorsContainer = document.getElementById("carouselIndicators");
      const slides = images.children;
      const total = slides.length;
      let index = 0;
      let autoSlideInterval;

      // Fix: définir la largeur du conteneur d’images dynamiquement
      images.style.width = `${total * 100}%`;

      // Créer les indicateurs
      for (let i = 0; i < total; i++) {
        const indicator = document.createElement('div');
        indicator.classList.add('indicator');
        if (i === 0) indicator.classList.add('active');
        indicator.addEventListener('click', () => goToSlide(i));
        indicatorsContainer.appendChild(indicator);
      }

      const indicators = document.querySelectorAll('.indicator');

      function updateIndicators() {
        indicators.forEach((indicator, i) => {
          indicator.classList.toggle('active', i === index);
        });
      }

      function showSlide(i) {
        index = (i + total) % total;
        images.style.transform = `translateX(-${index * 100}%)`;
        updateIndicators();
      }

      function goToSlide(i) {
        showSlide(i);
        resetAutoSlide();
      }

      function nextSlide() {
        showSlide(index + 1);
        resetAutoSlide();
      }

      function prevSlide() {
        showSlide(index - 1);
        resetAutoSlide();
      }

      function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 5000);
      }

      function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
      }

      // Navigation clavier
      document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowRight') nextSlide();
        else if (e.key === 'ArrowLeft') prevSlide();
      });

      // Pause auto slide au survol
      const carousel = document.querySelector('.carousel');
      carousel.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
      carousel.addEventListener('mouseleave', startAutoSlide);

      // Démarrage auto
      startAutoSlide();
    });
  </script>
</body>
</html>
