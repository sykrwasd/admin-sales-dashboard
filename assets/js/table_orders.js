new DataTable('#ordersTable');

document.addEventListener("click", function (e) {
        
    // For edit button
    if (e.target.classList.contains("edit-btn")) { // use contains because when using addeventlistener, it only read what in the first page
        e.preventDefault(); // prevent default link action

        const orderId = e.target.getAttribute("data-id");
        const modalBody = document.getElementById("editModalBody");

        // Show loading message
        modalBody.innerHTML = "<p class='text-center'>Loading form...</p>";

        // Fetch the edit form
        fetch(`../../actions/salesorders_fetch_form.php?id=${orderId}`)
            .then(response => response.text())
            .then(html => {
                modalBody.innerHTML = html;

                const form = document.getElementById("editOrderForm");

                form.addEventListener("submit", function (e) {
                    e.preventDefault();

                    const formData = new FormData(form);

                    fetch("../../actions/salesorders_update_order.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(res => res.text())
                    .then(response => {
                        if (response.trim() === "success") {
                            // Calling sweet alert
                            Swal.fire({
                                icon: 'success',
                                title: 'Order updated!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.reload(); // refresh table
                            });
                        }
                    });
                });
            })
            .catch(error => {
                modalBody.innerHTML = `<div class="alert alert-danger">Error loading form.</div>`;
                console.error("Error:", error);
            });
    }

    // For delete button
    if (e.target.classList.contains("delete-btn")) {
        const orderId = e.target.getAttribute("data-id");

        // Calling sweet alert
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send delete request to PHP
                fetch(`../../actions/salesorders_delete.php?id=${orderId}`)
                    .then(response => response.text())
                    .then(result => {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'The order has been deleted.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            // Reload the page to update the table
                            location.reload();
                        });
                    })
                    .catch(error => {
                        Swal.fire('Error!', 'Failed to delete the order.', 'error');
                        console.error(error);
                    });
            }
        });
    }
});