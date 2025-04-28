
document.getElementById('signupForm').addEventListener('submit', function (event) {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let address = document.getElementById('address').value;

    //  empty
    if (!name || !email || !phone || !address) {
        alert("All fields are required!");
        event.preventDefault(); 
    }
});


