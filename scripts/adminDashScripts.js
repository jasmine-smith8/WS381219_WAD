$(document).ready(function() {
    // Function to load users data via AJAX
    function loadUsers() {
        // Fetch the users from the PHP script
        fetch('./php/getUsers.php')
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                // Clear any existing table rows
                const tableBody = document.querySelector('#table tbody');
                tableBody.innerHTML = '';

                // Loop through the data and append rows to the table
                data.forEach(user => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${user.userID}</td>
                        <td>${user.firstName}</td>
                        <td>${user.lastName}</td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching users:', error);
            });
    }
    $('.btnDeleteUser').click(function (e) {
        e.preventDefault();
 
        const userID = $(this).attr('userID');
 
        Swal.fire({
            title: "Are you sure you want to delete this user?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete them!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Make an AJAX request using the userID to the backend and delete the user.
                $.post('./php/deleteUser.php', { userID: userID }, function (response) {
                    if (response == 'true') {
                        // Reload the page
                        Swal.fire({
                            title: "User Deleted!",
                            text: "The user has been deleted.",
                            icon: "success",
                            heightAuto: false
                        }).then(() => {
                            window.location.reload();
                            loadUsers();
                        });
                    } else {
                        Swal.fire({
                            title: "Something went wrong!",
                            text: response,
                            icon: "error",
                            heightAuto: false
                        });
                    }
                });
            }
        });
    });

    $('.btnCreateUser').click(function (e) {
        e.preventDefault();
 
        let firstName = $('#firstName').val();
        let lastName = $('#lastName').val();
        let email = $('#txtUserEmail').val();
        let password = $('#txtUserPassword').val();
 
        Swal.fire({
            title: "Are you sure you want to bring a new love into your life?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, add them!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Make an AJAX request using the userID to the backend and delete the user.
                $.post('./php/createUser.php', 
                    {
                        firstName: firstName,
                        lastName: lastName,
                        txtUserEmail: email,
                        txtUserPassword: password, 
                    },
                    function (response) {
                    if (response == 'true') {
                        // Reload the page
                        Swal.fire({
                            title: "User Added!",
                            text: "The user has been added.",
                            icon: "success",
                            heightAuto: false
                        }).then(() => {
                            window.location.reload();
                            loadUsers();
                        });
                    } else {
                        Swal.fire({
                            title: "Something went wrong!",
                            text: response,
                            icon: "error",
                            heightAuto: false
                        });
                    }
                });
            }
        });
    });

    let editUserID = 0;
    
    $('.btnEditUser').click(function (e) {
        e.preventDefault();
    
        let userID = $(this).attr('userID');
    
        $.post('./php/fetchUserData.php', { userID: userID }, function (res) {
            let user = JSON.parse(res);
    
            $('#firstName').val(user.firstName);
            $('#lastName').val(user.lastName);
    
            editUserID = userID;
        
            $('#modalEditUser').modal('show');
        });
    });
    
    $('#formEditUser').submit(function (e) {
        e.preventDefault();
    
        let firstName = $('#firstName').val();
        let lastName = $('#lastName').val();
    
        // Sets the data to be sent to the backend
        $.post('./php/editUser.php',
            {
                userID: editUserID,
                firstName: firstName,
                lastName: lastName 
            },
            function (response) {
                if (response == 'true') {
                    Swal.fire({
                        title: "User Updated!",
                        text: "The user has been updated.",
                        icon: "success",
                        heightAuto: false
                    }).then(() => {
                        window.location.reload();
                        loadUsers();
                    });
                } else {
                    Swal.fire({
                        title: "Something went wrong!",
                        text: response,
                        icon: "error",
                        heightAuto: false
                    });
                }
            
        });
    });
});