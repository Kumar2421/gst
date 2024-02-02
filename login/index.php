
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" defer></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
      <!-- Add this before your closing </head> tag -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="https://unpkg.com/gsap@3.9.0/dist/ScrollTrigger.min.js"></script>

</head>
<body>
    <div class="container-xxl" id="scroll-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 " id="first-outer" >
                      <div class="first-inner">
                        <h1 class="welcome-head ">Welcome to! <span class="welcome-span">rathna groups</span> <br><span class="welcome-span2">gst portal</span> </h1>
                      <p class="wel-para">Unlocking the door with your login, you enter a digital haven where your contributions are cherished. Welcome to a community that values and appreciates every aspect of who you are.</p>
                      </div>
                      <div class="row">
                        <div class="col-lg-10">
                          <div class="box"><span>Login to Your Insightful Universe</span> </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-6 col-12 " id="login-container">
                        <div class="login-card" id="login-inner">
                            <div class="login-card-content">
                              <div class="header">
                                <div class="logo">
                                </div>
                              
                              
                              </div>
                              <form method="post" id="loginForm">
                            <div class="form-field email">
                                <div class="icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <input type="email" id="email" placeholder="Email" name="email" autocomplete="username">
                            </div>
                            <div class="form-field password">
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <input type="password" id="password" placeholder="Password" name="password" autocomplete="current-password">
                            </div>
                            <button type="button" id="loginButton">Login</button>
                            <!-- Add Forget Password link -->
                            <a class="forget-link" href="forget_password_hompage.php">Forget Password</a>
                          </form>
                          <script>
                              $(document).ready(function () {
                                  $('#password').keypress(function (e) {
                                      if (e.which === 13) { // Check if Enter key is pressed
                                          loginUser();
                                      }
                                  });

                                  $('#loginButton').on('click', function () {
                                      loginUser();
                                  });

                                  function loginUser() {
                                      var email = $('#email').val();
                                      var password = $('#password').val();

                                      $.ajax({
                                          type: 'POST',
                                          url: 'login_verification.php', // Change this to your PHP file
                                          data: { email: email, password: password },
                                          dataType: 'json',
                                          success: function (response) {
                                              if (response.success) {
                                                  alert('Login successful!');
                                                  window.location.href = response.redirect;
                                              } else {
                                                  alert('Login failed. Please check your credentials.');
                                                  console.error(response.errors);
                                              }
                                          },
                                          error: function (xhr, status, error) {
                                              console.error('Error:', xhr.responseText);
                                              alert('Error: Unable to login. Check the console for details.');
                                          }
                                      });
                                  }
                              });
                          </script>


                
                            
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js"></script>
    <script>gsap.registerPlugin(ScrollTrigger);

    const container = document.querySelector("#scroll-container")

    let height
    function setHeight() {
      height = container.clientHeight
      document.body.style.height = height + "px"
    }
    ScrollTrigger.addEventListener("refreshInit", setHeight)

    // smooth scrolling container
    gsap.to(container, {
      y: () => -(height - document.documentElement.clientHeight),
      ease: "none",
      scrollTrigger: {
        trigger: document.body,
        start: "top top",
        end: "bottom bottom",
        scrub: 0.5,
        invalidateOnRefresh: true
      }
    })

    const sections = gsap.utils.toArray('.appear-down')

    sections.forEach(function (sec, i) {	
      const y = sec.offsetTop - 100
      sec.querySelector('p').innerText = `y: ${y}, h: ${sec.clientHeight}`
      gsap.fromTo(sec, {
        y: 100,
        opacity: 0,
        scale: 0.9,
      }, {
        y: 0,
        opacity: 1,
        scale: 1,
        scrollTrigger: {
          trigger: sec,
          scrub: 1,
          start: 'top bottom',
          end: '+=200',
          markers: true,
        }
      })
    })
    </script>
</body>
</html>
    