// document.querySelector('form').addEventListener('submit', function (e) {
//     e.preventDefault();

//     // Get the email input value
//     const email = document.querySelector('.form-field.email input').value;

//     // Validate the email format
//     if (!validateEmail(email)) {
//         alert('Invalid email format');
//         return;
//     }

//     // Send the email to the server for verification
//     fetch('verify_email.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify({ email: email }),
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.valid) {
//                 alert('Email is valid. Proceed with login.');
//                 // Perform login logic here
//             } else {
//                 alert('Invalid email. Please check your email or register.');
//             }
//         })
//         .catch(error => console.error('Error:', error));
// });

// function validateEmail(email) {
//     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     return emailRegex.test(email);
// }
