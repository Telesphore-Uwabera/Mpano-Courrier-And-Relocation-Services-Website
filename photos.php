<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('admin-panel/includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="images/logo.png">
        <title>Mpano Courier And Relocation Services</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/styles.css">
      </head>      
      <body>
        <!-- Navigation Bar -->
        <header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="images/logo.png" alt="Mpano Logo" height="50">
              </a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="services">Services</a></li>
                  <li class="nav-item dropdown">
                    <a 
                      class="nav-link dropdown-toggle" 
                      href="#" 
                      id="networkDropdown" 
                      role="button" 
                      data-bs-toggle="dropdown" 
                      aria-expanded="false"
                    >
                      Our Network
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="networkDropdown">
                      <li><a class="dropdown-item" href="gasabo">Gasabo</a></li>
                      <li><a class="dropdown-item" href="kicukiro">Kicukiro</a></li>
                      <li><a class="dropdown-item" href="nyarugenge">Nyarugenge</a></li>
                      <li><a class="dropdown-item" href="provinces">Provinces</a></li>
                    </ul>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="corporate">Corporate</a></li>
                <li class="nav-item"><a class="nav-link" href="faqs">FAQs</a></li>
                <li class="nav-item"><a class="nav-link" href="contact">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="photos">Photos</a></li>
                </ul>
              </div>
            </div>
        </header>
        <section class="contact-info-bar bg-light py-2">
          <div class="container">
            <div class="row text-center align-items-center">
              <!-- Location -->
              <div class="col-md-3 col-sm-6 mb-2 mb-md-0">
                <i class="fas fa-map-marker-alt text-success me-2"></i>
                <span>Nyamirambo, KN2 Ave</span>
              </div>
        
              <!-- Social Media -->
<div class="col-md-3 col-sm-6 mb-2 mb-md-0">
  <a href="https://www.facebook.com/profile.php?id=61569679978769" target="_blank" class="text-decoration-none">
    <i class="fab fa-facebook text-primary me-2"></i>
  </a>
  <a href="https://www.instagram.com/mpanoservices?igsh=MXMwdW5uY2lwbmtjbA==" target="_blank" class="text-decoration-none">
    <i class="fab fa-instagram text-danger me-2"></i>
  </a>
  <a href="https://wa.me/250791176705" target="_blank" class="text-decoration-none">
    <i class="fab fa-whatsapp text-success me-2"></i>
  </a>
  <span>Mpano Services</span>
</div>

        
              <!-- Phone Numbers -->
              <div class="col-md-3 col-sm-6 mb-2 mb-md-0">
                <i class="fas fa-phone-alt text-success me-2"></i>
                <span>0780620735, 0791176705</span>
              </div>
        
              <!-- Email -->
              <div class="col-md-3 col-sm-6">
                <i class="fas fa-envelope text-danger me-2"></i>
                <span>mpanocourrierandrelocationserv@gmail.com</span>
              </div>
            </div>
          </div>
        </section>    
        <section>
        <div class="container bg-light py-5">
    <div class="text-center mb-4">
        <h3 class="text-dark display-6">Photo Gallery</h3>
        <h4 class="text-muted">Our Recent Works</h4>
    </div>

    <!-- Photo Gallery -->
    <div id="photo-gallery" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php
        // Query to select images from the gallery table
        $sql = "SELECT id, caption, image_path FROM gallery";
        $result = $conn->query($sql);

        // Check if any rows are returned
        if ($result->num_rows > 0) {
            // Loop through each image
            while ($row = $result->fetch_assoc()) {
                $caption = htmlspecialchars($row['caption']); 
                $imagePath = 'admin-panel/' . htmlspecialchars($row['image_path']);
                
                echo '
                <div class="gallery-item">
                    <img src="' . $imagePath . '" alt="' . $caption . '" class="w-32 h-32 object-cover mx-auto">
                    <p class="text-center mt-2">' . $caption . '</p>
                </div>';
            }
        } else {
            echo '<p>No images found in the gallery.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</div>
</section>

        
        <footer class="footer bg-success text-white py-4">
            <div class="container text-center">
              <!-- Logo Section -->
              <div class="row align-items-center mb-3">
                <div class="col-md-4">
                  <img src="images/logo.png" alt="Mpano Courier and Relocation Services Logo" class="footer-logo mb-2" style="max-width: 50px; height: ;">
                </div>
                <div class="col-md-4">
                  <h5 class="mb-0">2 Years in Service</h5>
                </div>
                <div class="col-md-4">
                  <h6 class="mb-2">Follow Us</h6>
                  <a href="https://www.facebook.com" class="text-white mx-2" target="_blank" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="https://www.twitter.com" class="text-white mx-2" target="_blank" title="X">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="https://www.instagram.com" class="text-white mx-2" target="_blank" title="Instagram">
                    <i class="fab fa-instagram"></i>
                  </a>
                </div>
              </div>
          
              <!-- Divider Line -->
              <hr class="border-white my-3">
          
              <!-- Links Section -->
              <div class="row text-center">
                <div class="col-md-6">
                  <a href="contact" class="text-white text-decoration-none">Contact Us</a>
                </div>
                <div class="col-md-6">
                  <a href="terms" class="text-white text-decoration-none">Terms & Conditions</a>
                </div>
              </div>
          
              <!-- Bottom Text -->
              <p class="mt-3 mb-0 small">&copy; 2024 Mpano Courier and Relocation Services. All Rights Reserved.</p>
            </div>
          </footer>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="/js/dist/main.min.js" defer></script>
            </div><!-- container -->
            
            <script>
                window.onload = function() {
                    fetch('/api/photos')  // Fetch photos from backend API
                        .then(response => response.json())
                        .then(data => {
                            const gallery = document.getElementById('photo-gallery');
                            data.photos.forEach(photo => {
                                const img = document.createElement('img');
                                img.src = photo.url;
                                img.alt = photo.description;
                                img.classList.add('cms-w-full', 'cms-h-full', 'cms-object-cover');
                                const div = document.createElement('div');
                                div.classList.add('cms-bg-cover');
                                div.appendChild(img);
                                gallery.appendChild(div);
                            });
                        })
                        .catch(error => console.error('Error fetching photos:', error));
                };
            </script>
        
              </body>      
        </html>
        