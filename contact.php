<?php
// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include('admin-panel/includes/config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(strip_tags($_POST['phone']));
    $company = htmlspecialchars(strip_tags($_POST['company']));
    $movingTo = htmlspecialchars(strip_tags($_POST['movingTo']));
    $movingFrom = htmlspecialchars(strip_tags($_POST['movingFrom']));
    $movingDate = !empty($_POST['movingDate']) ? date('Y-m-d', strtotime($_POST['movingDate'])) : null;
    $message = htmlspecialchars(strip_tags($_POST['message']));

    // Insert into database
    $sql = "INSERT INTO enquiries (name, email, phone, company, moving_to, moving_from, moving_date, message) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $email, $phone, $company, $movingTo, $movingFrom, $movingDate, $message);

    if ($stmt->execute()) {
        // Send email notification
        $to = "samshakul@gmail.com";
        $subjectMail = "New Enquiry from " . $name;
        $body = "
            <h3>New Enquiry Details</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Company:</strong> $company</p>
            <p><strong>Moving To:</strong> $movingTo</p>
            <p><strong>Moving From:</strong> $movingFrom</p>
            <p><strong>Moving Date:</strong> $movingDate</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: samshakul@gmail.com" . "\r\n"; 

        if (mail($to, $subjectMail, $body, $headers)) {
          echo "<script>alert('Your enquiry has been submitted and a notification has been sent.');</script>";
      } else {
          echo "<script>alert('Your enquiry was submitted, but the notification email failed to send.');</script>";
      }
      
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close resources
    $stmt->close();
    $conn->close();
}
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
            <style>
              .form-container {
  max-width: 800px;
  margin: 0 auto;
}

.grid-layout {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;
}

.grid-layout .form-group {
  display: flex;
  flex-direction: column;
}

.grid-layout .full-width {
  grid-column: span 2;
}

label {
  font-weight: bold;
  margin-bottom: 0.5rem;
}

textarea {
  resize: none;
}

/* Responsive Design */
@media (max-width: 768px) {
  .grid-layout {
    grid-template-columns: 1fr;
  }

  .grid-layout .full-width {
    grid-column: span 1;
  }
}
            </style>
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
           <!-- Hero Section -->
        <section class="hero4 d-flex align-items-center text-center text-black">
          <div class="container">
            <h1 class="display-4 fw-bold">Contact us</h1>
          </div>          
          </section>
          <section class="form-section py-5 bg-light">
  <div class="container">
    <div class="row">
      <!-- Form Section -->
      <div class="col-lg-12">
        <div class="form-container p-4 bg-white rounded shadow-sm">
          <h2 class="text-center fw-bold text-success mb-4">Contact Us</h2>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="grid-layout">
              <!-- Row 1 -->
              <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" class="form-control" required>
              </div>

              <!-- Row 2 -->
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control">
              </div>
              <div class="form-group">
                <label for="company">Company</label>
                <input type="text" id="company" name="company" class="form-control">
              </div>

              <!-- Row 3 -->
              <div class="form-group">
                <label for="moving-to">Moving from *</label>
                <input type="text" id="moving-to" name="movingTo" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="moving-from">Moving to *</label>
                <input type="text" id="moving-from" name="movingFrom" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="moving-date">Moving date</label>
                <input type="date" id="moving-date" name="movingDate" class="form-control">
              </div>

              <!-- Row 4 -->
              <div class="form-group full-width">
                <label for="message">Message *</label>
                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
              </div>
            </div>
            <!-- Submit Button -->
            <div class="form-group text-center mt-4">
              <button type="submit" class="btn btn-success w-100" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
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
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
              </body>      
        </html>
                 