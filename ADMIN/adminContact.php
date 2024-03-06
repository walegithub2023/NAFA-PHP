<?php include 'adminHeader.php'; ?>

<?php include 'adminSideNavBar.php'; ?>

<main id="main" class="main"
 style="
    background-image: url('../IMAGES/img1.jpg'); 
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    zIndex:-1;
    "
>

    <div class="pagetitle">
      <h1>Contact</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Contact</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card" style="border-radius:1px;">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>Nigerian Defence HQ<br>Area 7, Garki, Abuja</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card" style="border-radius:1px;">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>09-8746907<br>+234 7056546750</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card" style="border-radius:1px;">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>dit@airforce.mil.ng<br>cis@airforce.mil.ng</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card" style="border-radius:1px;">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>Monday - Friday<br>8:00AM - 04:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-6">
          <div class="card p-4" style="border-radius:1px;">
            <form action="" method="post" class="php-email-form" style="padding-bottom:20px;">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit" style="border-radius:3px;">Send Message</button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->

  <?php include 'adminFooter.php'; ?>