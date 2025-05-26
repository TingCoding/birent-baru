// Handle file upload display
document.querySelectorAll('.file-input').forEach(input => {
    input.addEventListener('change', function() {
        const label = this.parentNode.querySelector('.file-upload-btn');
        const fileText = label.querySelector('.file-upload-text:last-child');
        
        if (this.files.length > 0) {
            fileText.textContent = this.files[0].name;
        } else {
            fileText.textContent = 'No file chosen';
        }
    });
});

const submitBtn = document.querySelector('.submit-btn');

submitBtn.addEventListener("click", function (e) {
    e.preventDefault(); // Mencegah submit default
    
    // Menggunakan ID yang sesuai dengan blade template
    const phone = document.getElementById("PhoneNumber").value.trim();
    const address = document.getElementById("Address").value.trim();
    const startdate = document.getElementById("StartDate").value.trim();
    const enddate = document.getElementById("EndDate").value.trim();
    const idCard = document.getElementById("IDCard").files.length;
    const driverLicense = document.getElementById("DriverLicense").files.length;
    
    // Validasi semua field yang diperlukan
    if (!phone || !address || !startdate || !enddate || idCard === 0 || driverLicense === 0) {
        Swal.fire({
            title: 'Data Tidak Lengkap!',
            text: 'Harap isi semua kolom sebelum melanjutkan.',
            icon: 'warning',
            confirmButtonText: 'OK',
            background: '#fff3cd',
            color: '#856404'
        });
        return;
    }

    // Validasi tanggal
    const startDate = new Date(startdate);
    const endDate = new Date(enddate);
    
    if (endDate < startDate) {
        Swal.fire({
            title: 'Tanggal Tidak Valid!',
            text: 'Tanggal akhir tidak boleh lebih awal dari tanggal mulai.',
            icon: 'error',
            confirmButtonText: 'OK',
            background: '#f8d7da',
            color: '#721c24'
        });
        return;
    }

    // Jika semua validasi lolos, submit form
    const form = document.getElementById('rental-form');
    
    Swal.fire({
        title: 'Mengirim Data...',
        text: 'Mohon tunggu sebentar.',
        icon: 'info',
        allowOutsideClick: false,
        showConfirmButton: false,
        willOpen: () => {
            Swal.showLoading();
        }
    });

    // Submit form secara programmatik
    form.submit();
});