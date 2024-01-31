<?php
 session_start();
 include_once('db.php');
// $errors = array();
if(!isset($_SESSION["email"])){
    header("Location: index.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="adminpanel.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" defer></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
      <script src="adminpanel.js" defer></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <header>
        <div class="container ">
            <div class="row logosection ">
                <div class="col-lg-2  col-2">
                  <div class="logo-card">
                   <img src="media/pharma-logo-2 (1).png" alt="">
                  </div>
                </div>
                <div class="col-lg-1 col-3"></div>
                <div class="col-lg-1 col-4 ">
                    <div id="menu-container">
                        <div id="menu-wrapper">
                           <div id="hamburger-menu"><span></span><span></span><span></span></div>
                           <!-- hamburger-menu -->
                        </div>
                        <!-- menu-wrapper -->
                        <ul class="menu-list accordion">
                           <li id="nav1" class="toggle accordion-toggle"> 
                              <span class="icon-plus"></span>
                              <a class="menu-link" href="#"></a>
                              <a href="admin/dasboard.php" class="onclick-stand" onclick="myFunction(this)">
                                <div class="side-option-1 p-2 " id="myElement">
                                   <i class="fas fa-tachometer-alt" style="color: #470700;font-size: 2em;"></i>
                                <a href="admin/dasboard" ><h5 class="side-head-1">DashBoard</h5></a>
                                  </div>
                               </a>
                           </li>
                           <!-- accordion-toggle -->
                           <!-- <ul class="menu-submenu accordion-content">
                              <li><a class="head" href="#">Submenu1</a></li>
                              <li><a class="head" href="#">Submenu2</a></li>
                              <li><a class="head" href="#">Submenu3</a></li>
                           </ul> -->
                           <!-- menu-submenu accordon-content-->
                           <li id="nav2" class="toggle accordion-toggle"> 
                              <span class="icon-plus"></span>
                              <a class="menu-link" href="#"></a>
                              <a href="" class="onclick-stand" onclick="myFunction(event)">
                                <div class="side-option-1 p-2 ">
                                    <i class="fas fa-file-invoice" style="color: #470700;font-size: 2em;"></i>
                                   <h5 class="side-head-1">Invoices</h5>
                                   </div>
                               </a>
                           </li>
                           <!-- accordion-toggle -->
                           <!-- <ul class="menu-submenu accordion-content">
                              <li><a class="head" href="#">Submenu1</a></li>
                              <li><a class="head" href="#">Submenu2</a></li>
                           </ul> -->
                           <!-- menu-submenu accordon-content-->
                                <li id="nav3" class="toggle accordion-toggle"> 
                              <span class="icon-plus"></span>
                              <a class="menu-link" href="#"></a>
                              <a href="">
                                <div class="side-option-1 p-2 ">
                                    <i class="fas fa-file-alt" style="color: #470700;font-size: 2em;"></i>
                                   <h5 class="side-head-1">GST Returns</h5>
                                   </div>
                               </a>
                           </li>
                           <li id="nav3" class="toggle accordion-toggle"> 
                            <span class="icon-plus"></span>
                            <a class="menu-link" href="#"></a>
                            <a href="">
                                <div class="side-option-1 p-2 ">
                                    <i class="fas fa-users" style="color: #470700;font-size: 2em;"></i>
                                   <h5 class="side-head-1">customer management</h5>
                                   </div>
                               </a>
                         </li>
                           <!-- accordion-toggle -->
                           <!-- <ul class="menu-submenu accordion-content">
                              <li><a class="head" href="#">Submenu1</a></li>
                              <li><a class="head" href="#">Submenu2</a></li>
                              <li><a class="head" href="#">Submenu3</a></li>
                              <li><a class="head" href="#">Submenu4</a></li>
                           </ul> -->
                           <!-- menu-submenu accordon-content-->
                        </ul>
                        
                        <!-- menu-list accordion-->
                     </div>
                     <!-- menu-container -->
                </div>
                <div class="col-lg-1 col-1"></div>
                <div class="col-lg-3 ">
                    <div class="searchbar">
                        <div class="input-group mb-3 ">
                            <input class="form-control mt-3" id="searchInput" type="search" placeholder="Search" aria-label="Search" id="searchInput">
                            <div class="input-group-prepend">
                                <span class="input-group-text mt-3" onclick="handleSearch()"><i class="fa-brands fa-searchengin fa-xl" style="color: #c6cfd8;"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-1"></div>
                <div class="col-lg-1">
                    <div class="notification-icon">
                        <i class="fa-solid fa-bell fa-xl" style="color: rgb(0, 0, 0);"></i>
                        <span class="notification-badge"></span>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="profile-head">
                        <img src="media/3.jpg"  alt="Profile Image" class="profile-image">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="siderbar-section" >
        <div class="container-xxl" id="#myDIV">
            <div class="row-side-bar m-2">
                <a href="admin/dasboard.php" class="onclick-stand" onclick="myFunction(this)">
                 <div class="side-option-1 p-2 " id="myElement">
                    <i class="fas fa-tachometer-alt" style="color: #470700;font-size: 2em;"></i>
                 <a href="admin/dasboard" ><h5 class="side-head-1">DashBoard</h5></a>
                   </div>
                </a>
                <a href="" class="onclick-stand" onclick="myFunction(event)">
                    <div class="side-option-1 p-2 ">
                        <i class="fa-solid fa-user" style="color: #470700;font-size: 2em;"></i>
                       <h5 class="side-head-1">Register login</h5>
                       </div>
                   </a>
               <a href="" class="onclick-stand" onclick="myFunction(event)">
                <div class="side-option-1 p-2 ">
                    <i class="fas fa-file-invoice" style="color: #470700;font-size: 2em;"></i>
                   <h5 class="side-head-1">Invoices</h5>
                   </div>
               </a>
               <a href="">
                <div class="side-option-1 p-2 ">
                    <i class="fas fa-file-alt" style="color: #470700;font-size: 2em;"></i>
                   <h5 class="side-head-1">GST Returns</h5>
                   </div>
               </a>
               <a href="">
                <div class="side-option-1 p-2 ">
                    <i class="fas fa-users" style="color: #470700;font-size: 2em;"></i>
                   <h5 class="side-head-1">customer management</h5>
                   </div>
               </a>
               <a href="">
                <div class="side-option-1 p-2 ">
                    <i class="fas fa-cogs" style="color:#470700;font-size: 2em;"></i>
                   <h5 class="side-head-1">service management</h5>
                   </div>
               </a>
               <a href="#">
                <div class="side-option-1 p-2 ">
                    <i class="fas fa-calculator" style="color: #470700;font-size: 2em;"></i>
                   <h5 class="side-head-1" style="padding-left: 20px;">tax calculation</h5>
                   </div>
               </a>
               <a href="#">
                    <div class="side-option-1 p-2">
                        <i class="fas fa-chart-bar" style="color: #470700; font-size: 2em;"></i>
                        <h5 class="side-head-1" style="padding-left: 20px;">passwordResetRequests</h5>
                    </div>
                
            
                       <?php
                            require_once "db.php"; // Include your database connection file

                            // Function to fetch password reset requests from the database
                            function getPasswordResetRequests() {
                                global $conn; // Assuming $conn is your database connection variable

                                // Replace 'adminlogin' with your actual table name
                                $query = "SELECT * FROM adminlogin WHERE passwordrequeststates = 'pending'";
                                $result = mysqli_query($conn, $query);

                                $requests = array();

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $requests[] = $row;
                                }

                                return $requests;
                            }

                            // Usage example:
                            $requests = getPasswordResetRequests();
                            ?>

                            <!-- Check if there are requests before looping through them -->
                            <?php if (!empty($requests)): ?>
                                <?php foreach ($requests as $request): ?>
                                    <div class="request">
                                        <p>Name: <?php echo $request['name']; ?></p>
                                        <p>outlet: <?php echo $request['department']; ?></p>
                                        <p>Email: <?php echo $request['email']; ?></p>
                                        <form action="admin_confirm_password_reset.php" method="POST">
                                            <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>">
                                            <button type="submit" name="accept">Accept</button>
                                            <button type="submit" name="reject">Reject</button>
                                        </form>
                                        <hr>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No password reset requests available.</p>
                            <?php endif; ?>
                        </div>
                
               </a>
               <a href="#">
                <div class="side-option-1 p-2 ">
                    <i class="fas fa-bell" style="color:#470700;font-size: 2em;"></i>
                   <h5 class="side-head-1" style="padding-left: 20px;">notifications</h5>
                   </div>
               </a>
               <div class="side-dropdown">
                <a href=""> 
                  <li class='sub-menu' ><i class="fa-solid fa-gear" style="color: #470700;font-size: 2em;margin-left: -10px;"></i><a class="settings-text" href='#settings'>Settings<div class='fa fa-caret-right' onclick="myFunction(this)"  style="padding-left: 10px;"></div></a>
                      <ul>
                          <li><a href='#settings'>Account</a></li>
                          <li><a href='#settings'>Profile</a></li>
                          <li><a href='#settings'>Password</a></li>
                          <li><a href='#settings'>Notification</a></li>
                      </ul>
                  </li>
               </a>
             </div>
                <a href="#" >
                 <div class="side-option-1 p-2 " id="hide">
                    <i class="fa-solid fa-right-from-bracket " style="color: #470700;font-size: 1.5em;padding-top: 10px;"></i>
                   <h5 class="side-head-1" id="r"  style="padding-left: 20px;">help</h5>
                   </div>
               </a>
               <a href="#">
                <div class="side-option-1 p-2" >
                    <i class="fa-solid fa-right-from-bracket " style="color: #470700;font-size: 1.5em;padding-top: 10px;"></i>
                   <!-- <h5 class="side-head-1" type="button" data-toggle="modal" data-target="#myModal" style="padding-left: 20px;">logout</h5> -->
                   <button class=" btn side-head-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">LogOut</button>

                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"  aria-labelledby="offcanvasScrollingLabel">
                     <div class="offcanvas-header" id="log-cont">
                       <h5 class="offcanvas-title" id="offcanvasScrollingLabel" style="margin-top: 5em;">LOGOUT </h5>
                       <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                     </div>
                     <div class="offcanvas-body">
                            <p class="confirm-para">Do you wish to log out of the OpenID provider?</p>
                            <div class="btn logout mt-2" id="logoutBtn">yes! logout</div>
                            <button class="btn close-btn mt-2" data-bs-dismiss="offcanvas">Close</button>
                        </div>

                        <script>
                            $(document).ready(function () {
                                $('#logoutBtn').on('click', function () {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'logout.php', // Change this to the actual path of your logout script
                                        success: function (response) {
                                            // Redirect to the login page or handle success as needed
                                            window.location.href = 'index.php';
                                        },
                                        error: function (xhr, status, error) {
                                            console.error('Error:', xhr.responseText);
                                            // Handle error as needed
                                        }
                                    });
                                });
                            });
                        </script>

                </div>
               </a>
            </div>
        </div>
    </div>
    <div class="blankbox" style="background-color: #5a14c2;">
        uchvjdhbcujdbcijhbubvujh
    </div>
    <div class="main-container ">
        <div class="container-xxl">
            <div class="row" >
                <div class="col-lg-4 col-6" >
                    <div class="searchbar2">
                        <div class="input-group mb-3 " >
                            <input class="form-control mt-3 " type="search" placeholder="Search" aria-label="Search" id="searchInput">
                            <div class="input-group-prepend">
                                <span class="input-group-text mt-3" onclick="handleSearch()"><i class="fa-brands fa-searchengin fa-xl" style="color: #c6cfd8;"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="co-lg-12">
                    <div class="row mt-3">
                        <div class="col-lg-3 col-12">
                            <div class="box" id="box-content"><span>daily visitors<br></span><h3>9,100</h3><p>27% since last month</p>
                                <i class="fa-solid fa-eye fa-xl" id="eye"></i> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 ">
                            <div class="box "><span>revenue <br></span><h3>$5,56757</h3><p>15.45% since last month</p>
                                <i class="fa-solid fa-square-poll-vertical fa-xl"></i>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="box"><span>daily visitors<br></span><h3>9,100</h3><p>27% since last month</p>
                                <i class="fa-solid fa-eye fa-xl" id="eye"></i> </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="box"><span>revenue <br></span><h3>$5,56757</h3><p>15.45% since last month</p>
                                <i class="fa-solid fa-square-poll-vertical fa-xl"></i></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-lg-3"><button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#myModal">add user</button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="report-container" style="margin-top: 1em;"> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="report-header"> 
                        <h1 class="recent-Articles">Recent News</h1> 
                        <button class="view">View All</button> 
                    </div> 
        
                    <div class="report-body"> 
                        <div class="report-topic-heading"> 
                            <h3 class="t-op">Article</h3> 
                            <h3 class="t-op">Views</h3> 
                            <h3 class="t-op">Comments</h3> 
                            <h3 class="t-op">Status</h3> 
                        </div> 
        
                        <div class="items"> 
                            <div class="item1"> 
                                <h3 class="t-op-nextlvl">Article 73</h3> 
                                <h3 class="t-op-nextlvl">2.9k</h3> 
                                <h3 class="t-op-nextlvl">210</h3> 
                                <h3 class="t-op-nextlvl label-tag">Published</h3> 
                            </div> 
        
                            <div class="item1"> 
                                <h3 class="t-op-nextlvl">Article 72</h3> 
                                <h3 class="t-op-nextlvl">1.5k</h3> 
                                <h3 class="t-op-nextlvl">360</h3> 
                                <h3 class="t-op-nextlvl label-tag">Published</h3> 
                            </div> 
        
                            <div class="item1"> 
                                <h3 class="t-op-nextlvl">Article 71</h3> 
                                <h3 class="t-op-nextlvl">1.1k</h3> 
                                <h3 class="t-op-nextlvl">150</h3> 
                                <h3 class="t-op-nextlvl label-tag">Published</h3> 
                            </div> 
        
                            <div class="item1"> 
                                <h3 class="t-op-nextlvl">Article 70</h3> 
                                <h3 class="t-op-nextlvl">1.2k</h3> 
                                <h3 class="t-op-nextlvl">420</h3> 
                                <h3 class="t-op-nextlvl label-tag">Published</h3> 
                            </div> 
        
                            <div class="item1"> 
                                <h3 class="t-op-nextlvl">Article 69</h3> 
                                <h3 class="t-op-nextlvl">2.6k</h3> 
                                <h3 class="t-op-nextlvl">190</h3> 
                                <h3 class="t-op-nextlvl label-tag">Published</h3> 
                            </div> 
        
                            <div class="item1"> 
                                <h3 class="t-op-nextlvl">Article 68</h3> 
                                <h3 class="t-op-nextlvl">1.9k</h3> 
                                <h3 class="t-op-nextlvl">390</h3> 
                                <h3 class="t-op-nextlvl label-tag">Published</h3> 
                            </div> 
        
                            <div class="item1"> 
                                <h3 class="t-op-nextlvl">Article 67</h3> 
                                <h3 class="t-op-nextlvl">1.2k</h3> 
                                <h3 class="t-op-nextlvl">580</h3> 
                                <h3 class="t-op-nextlvl label-tag">Published</h3> 
                            </div> 
        
                            <div class="item1"> 
                                <h3 class="t-op-nextlvl">Article 66</h3> 
                                <h3 class="t-op-nextlvl">3.6k</h3> 
                                <h3 class="t-op-nextlvl">160</h3> 
                                <h3 class="t-op-nextlvl label-tag">Published</h3> 
                            </div> 
        
                            <div class="item1"> 
                                <h3 class="t-op-nextlvl">Article 65</h3> 
                                <h3 class="t-op-nextlvl">1.3k</h3> 
                                <h3 class="t-op-nextlvl">220</h3> 
                                <h3 class="t-op-nextlvl label-tag">Published</h3> 
                            </div> 
        
                        </div> 
                    </div> 
                </div>
            </div>
        </div> 
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Register</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
    
                <!-- Modal body -->
               
                <div class="signIn">
                    <form id="signInForm">
                        <label for="name">name:</label>
                        <input type="name" id="name" placeholder="Enter The name here" required>
    
                        <label for="email">email:</label>
                        <input type="email" id="email" placeholder="Enter The mail id here" required>
    
                        <label for="password">password:</label>
                        <input type="password" id="password" placeholder="Enter The password here" required>
    
                        <label for="username">username:</label>
                        <input type="text" id="username" placeholder="Enter The username" required>
                         
                        <label for="department">department:</label>
                        <select id="department" required>
                            <option value="" disabled selected>Select Department</option>
                            <option value="account">account and administrator</option>
                            <option value="outlet">outlet</option>
                            <option value="outher department">other department</option>
                            <!-- Add more departments as needed -->
                        </select>

                        <button type="button" onclick="submitForm()">register</button>

                        
                    </form>
                </div>
                    
    
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <script>
           function validateEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var isValid = emailRegex.test(email);

            console.log("Email:", email);
            console.log("IsValid:", isValid);

    return isValid;
}
            
            function validatePassword(password) {
                // Validate that password has at least 8 characters
                return password.length >= 8;
            }
      
            function submitForm() {
                // Collect form data
                var nameElement = document.getElementById('name');
                var emailElement = document.getElementById('email');
                var passwordElement = document.getElementById('password');
                var usernameElement = document.getElementById('username');
                var departmentElement = document.getElementById('department');

                var name = nameElement ? nameElement.value : null;
                var email = emailElement ? emailElement.value : null;
                var password = passwordElement ? passwordElement.value : null;
                var username = usernameElement ? usernameElement.value : null;
                var department = departmentElement ? departmentElement.value : null;

    
                // Validate email and password
                if (!validateEmail(email)) {
                    alert("Invalid email format");
                    return;
                }

                if (!username) {
                alert('Please enter the username.');
                return;
               }

                if (!department) {
                alert('Please select a department.');
                return;
               }
    
                if (!validatePassword(password)) {
                    alert("Password must be at least 8 characters");
                    return;
                }
                
                var userData = {
                name:name,
                email: email,
                password: password,
                username: username,
                department: department
            };

                
    
                // Send data to save_user.php using AJAX
                $.ajax({
                    type: "POST",
                    url: "signin.php",
                    data: userData,
                    success: function (response) {
                        // Handle the response (if needed)
                        console.log(response);
                        alert("User registered successfully!");
                    },
                    error: function (error) {
                        console.error('Error:', error);
                        alert("Error: Unable to register.");
                    }
                });
            }
        </script>
    </div>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js"></script>
   <script>
    const labels = document.querySelectorAll("label");

labels.forEach(label => {
  // console.log(label.innerText);
  label.innerHTML = label.innerText
    .split('')
    .map((letter, index) => {
    return `<span style="transition-delay: ${index*30}ms">${letter}</span>`;})
    .join('');
  console.log(label.innerHTML);
});
   </script>
   
</body>
</html>