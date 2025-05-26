const payBtn = document.querySelector('.pay-btn');

payBtn.addEventListener("click", function() {
    Swal.fire({
        title: 'Berhasil!',
        text: 'Your payment has been succesful! Please wait to admin verification',
        icon: 'success',
        confirmButtonText: 'OK',
        background: '#f9f9f9',
        color: '#333'
    }).then((result) => {
        if(result.isConfirmed) {
            window.location.href = "/"
        }
    })
});