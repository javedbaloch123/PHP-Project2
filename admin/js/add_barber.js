let backBtn = document.querySelector('.backbtn');
 
backBtn.addEventListener('click',function(){
    window.history.back();
})


document.getElementById('submitBtn').addEventListener('click', function(event) {
    event.preventDefault();
    let form = document.querySelector('#barberForm');
    let formData = new FormData(form);
    
    fetch('process_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            console.log(data);
            alert('Your Record has been Inserted');
            form.reset();
        } else {
            alert('must fill all fields');
            // form.innerHTML = data.message;
        }
    })
    .catch(error => console.error('Error:', error));
});
