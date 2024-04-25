
// Add an event listener to the document to handle clicks on the "Update" buttons
document.addEventListener('click', function(event) {
    // Check if the clicked element has the class 'cust' (assigned to the "Update" buttons)
    if (event.target.classList.contains('cust')) {
        // Show the modal when the "Update" button is clicked
        $('#updateModal').modal('show');
    }
});


