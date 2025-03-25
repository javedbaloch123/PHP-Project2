 let btn = document.querySelectorAll('table .btn');
 let  spinner = document.querySelector('.spinner-div');
 let serviceCol = document.querySelector('.service-col');
 let currCol = document.querySelector('.current-col');

 let img = document.querySelector('.service-col img');
 let h2 = document.querySelector('.service-col .name');
 let count = document.querySelector('#count');
 let type = document.querySelector('#type');
 let price = document.querySelector('#price');
 let backBtn = document.querySelector('.service-col #back');
 let addBtn = document.querySelector('.main-container .addbtn');
 console.log(addBtn)

 addBtn.addEventListener('click',function(){
  window.location.href = 'add_barber.php';
   console.log('hi')
 })
 backBtn.addEventListener('click',function(){
   location.reload();
 })


 btn.forEach(btn => {
      btn.addEventListener('click',function(e){
        let id = btn.getAttribute('data-id');
          
        fetch('send_data.php',{
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
        },
          body: JSON.stringify({id: id}),
        })
        .then(response=> response.json())
        .then(data =>{
          if(data.status === 'success'){
            
            img.src = '/Websites/Barber_web/admin/images/' + data.row.image;
            h2.innerHTML = data.row.name;
            
            // 🟢 Services Table Update
            let tableBody = document.querySelector(".service-col tbody");
            tableBody.innerHTML = ""; 
 
            let services = [
              { type: "Buzz Cut", price: data.row.buzz },
              { type: "Clipper Cut", price: data.row.clipper },
              { type: "Scissor Cut", price: data.row.scissor },
              { type: "Straight Razor", price: data.row.starit_razor },
              { type: "Beard Trim", price: data.row.beared },
              { type: "Sunday Special", price: data.row.sunday }
          ];

          services.forEach((service, index) => {
            let row = `
                <tr>
                    <th scope="row">${index + 1}</th>
                    <td>${service.type}</td>
                    <td>${service.price}</td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });

            spinner.style.display = 'flex';
            setTimeout(()=>{
              spinner.style.display = 'none';
              serviceCol.style.display = 'flex';
              currCol.style.display = 'none';
            },2000);
          }else{
            alert('data not available');
          }
            
        })
        .catch(error => {
          console.error('Error:', error);
      });

      })
 });