document.addEventListener('DOMContentLoaded', function() {
    // Booking modal functionality
    const bookingModal = document.getElementById('booking-modal');
    const bookNowButtons = document.querySelectorAll('.book-now-btn');
    const closeModalButton = document.getElementById('close-modal');
    const bookingForm = document.getElementById('booking-form');

    // Open booking modal when "Book Now" is clicked
    bookNowButtons.forEach(button => {
        button.addEventListener('click', function() {
            const doctorId = this.getAttribute('data-doctor-id');
            document.getElementById('doctor_id').value = doctorId;
            
            bookingModal.classList.remove('hidden');
        });
    });

    // Handle form submission
    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        console.log('Form Data:', Object.fromEntries(formData));
        
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => {
            console.log('Response:', response);
            return response.json();
        })
        .then(data => {
            console.log('Response Data:', data);
            if (data.success) {
                // Close booking modal
                bookingModal.classList.add('hidden');
                // Reload the page to show updated data
                window.location.reload();
            } else {
                alert('Failed to book appointment: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while booking the appointment. Please try again.');
        });
    });

    // Close booking modal
    closeModalButton.addEventListener('click', function() {
        bookingModal.classList.add('hidden');
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target === bookingModal) {
            bookingModal.classList.add('hidden');
        }
    });
}); 