document.addEventListener('DOMContentLoaded', function () {

   const rowContainer = document.querySelector('.second-row-container');
   const row = document.querySelector('.second-row');
   const leftBtn = document.getElementById('leftbtn');
   const rightBtn = document.getElementById('rightbtn');
   const scrollAmount = 330; // Same as min-width of .col



   rightBtn.addEventListener('click', function () {
      row.scrollBy({ left: scrollAmount, behavior: 'smooth' });
   })

   leftBtn.addEventListener('click', function () {
      row.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
   })



   let colHead = document.querySelectorAll('.col-head');

   colHead.forEach(head => {
      let para = head.parentElement.lastElementChild;
      let icon = head.querySelector('i');
      head.addEventListener('click', function () {
         para.classList.toggle('col-para-flex');
         icon.classList.toggle('active-i');
      })
   })


      let images = [
         "cuts2.png", "cuts3.png", "cuts4.png", , "cuts9.png", "cuts10.png",
         "cuts12.png", "cuts15.png",
         "cuts16.png", "cuts18.png", "cuts19.png", "cuts23.png", "cuts24.png", "cuts25.png",
         "cuts29.png", "cuts30.png",
         "cuts31.png", "cuts35.png",
         "cuts36.png", "cuts37.png", "cuts38.png"
      ];

      let imageElements = document.querySelectorAll(".third-row .col img");

      function changeImageRandomly(imgElement) {
         let randomIndex = Math.floor(Math.random() * images.length); // Random image select karega
         imgElement.src = `/Websites/Barber_web/images/${images[randomIndex]}`; // Image update karega
         
         let randomTime = Math.floor(Math.random() * 5000) + 2000; // 2-7 seconds ka random time
  
         setTimeout(() => {
            changeImageRandomly(imgElement); // Recursive function taake infinite loop chale
         }, randomTime);
      }

      // Har image element ke liye random image change ka function chalayen
      imageElements.forEach(img => {
         changeImageRandomly(img);
      });
  

}); 