document.addEventListener('DOMContentLoaded', function() {
    // Booking modal functionality
    const bookingModal = document.getElementById('booking-modal');
    const successModal = document.getElementById('success-modal');
    const bookNowButtons = document.querySelectorAll('.book-now-btn');
    const closeModalButton = document.getElementById('close-modal');
    const closeSuccessModalButton = document.getElementById('close-success-modal');
    const confirmBookingButton = document.getElementById('confirm-booking');

    // Open booking modal when "Book Now" is clicked
    bookNowButtons.forEach(button => {
        button.addEventListener('click', function() {
            const doctorName = this.getAttribute('data-doctor');
            const doctorSpecialty = this.getAttribute('data-specialty');
            
            document.getElementById('doctor-name').textContent = doctorName;
            document.getElementById('doctor-specialty').textContent = doctorSpecialty;
            
            bookingModal.classList.remove('hidden');
        });
    });

    // Close booking modal
    closeModalButton.addEventListener('click', function() {
        bookingModal.classList.add('hidden');
    });

    // Close success modal
    closeSuccessModalButton.addEventListener('click', function() {
        successModal.classList.add('hidden');
    });

    // Confirm booking
    confirmBookingButton.addEventListener('click', function() {
        const form = document.getElementById('booking-form');
        
        if (form.checkValidity()) {
            // Get form values
            const doctorName = document.getElementById('doctor-name').textContent;
            const doctorSpecialty = document.getElementById('doctor-specialty').textContent;
            const appointmentDate = document.getElementById('appointment-date').value;
            const appointmentTime = document.getElementById('appointment-time').value;
            
            // Format date for display
            const formattedDate = new Date(appointmentDate).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            
            // Format time for display
            const timeValue = appointmentTime;
            let formattedTime = '';
            
            if (timeValue) {
                const [hours, minutes] = timeValue.split(':');
                const hour = parseInt(hours);
                formattedTime = `${hour > 12 ? hour - 12 : hour}:${minutes} ${hour >= 12 ? 'PM' : 'AM'}`;
            }
            
            // Update success modal with appointment details
            document.getElementById('success-doctor').textContent = doctorName;
            document.getElementById('success-specialty').textContent = doctorSpecialty;
            document.getElementById('success-date').textContent = formattedDate;
            document.getElementById('success-time').textContent = formattedTime;
            
            // Hide booking modal and show success modal
            bookingModal.classList.add('hidden');
            successModal.classList.remove('hidden');
        } else {
            // Trigger browser's form validation
            form.reportValidity();
        }
    });

    // Search button functionality
    document.getElementById('search-button').addEventListener('click', function() {
        // In a real application, this would trigger a search with the selected filters
        // For this demo, we'll just scroll to the results
        document.querySelector('.doctor-card').scrollIntoView({ behavior: 'smooth' });
    });

    // File upload functionality
    const fileUpload = document.getElementById('file-upload');
    const fileList = document.getElementById('file-list');
    const fileListUl = fileList.querySelector('ul');

    fileUpload.addEventListener('change', function(e) {
        const files = e.target.files;
        
        if (files.length > 0) {
            fileList.classList.remove('hidden');
            fileListUl.innerHTML = '';
            
            Array.from(files).forEach(file => {
                const li = document.createElement('li');
                li.className = 'px-4 py-3 flex items-center justify-between text-sm';
                
                const div = document.createElement('div');
                div.className = 'flex items-center';
                
                const icon = document.createElement('span');
                icon.className = 'flex-shrink-0 h-5 w-5 text-gray-400';
                icon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" /></svg>';
                
                const nameSpan = document.createElement('span');
                nameSpan.className = 'ml-2 truncate';
                nameSpan.textContent = file.name;
                
                div.appendChild(icon);
                div.appendChild(nameSpan);
                
                const sizeSpan = document.createElement('span');
                sizeSpan.className = 'ml-2 text-gray-500';
                sizeSpan.textContent = formatFileSize(file.size);
                
                li.appendChild(div);
                li.appendChild(sizeSpan);
                
                fileListUl.appendChild(li);
            });
        } else {
            fileList.classList.add('hidden');
        }
    });

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(1) + ' ' + sizes[i]);
    }
});