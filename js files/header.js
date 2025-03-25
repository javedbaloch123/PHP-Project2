document.addEventListener('DOMContentLoaded',function(){

    let cartContainer = document.querySelector('.cart-menu');
    let cartMenu = cartContainer.querySelector('.menu-box');
    let cartIcon = document.getElementById('menuIcon');
    
   
     cartIcon.addEventListener('click',function(){
        cartContainer.style.visibility = 'visible';
        cartMenu.style.right = '0';
     })

     document.addEventListener('click',function(e){
        if(e.target.classList.contains('cart-menu')){
            cartContainer.style.visibility = 'hidden';
            cartMenu.style.right = '-40%';

        }else if(e.target.classList.contains('fa-xmark')){
            cartContainer.style.visibility = 'hidden';
            cartMenu.style.right = '-40%';
        }
     })




     let mobileIcon = document.querySelector('.fa-arrow-up');
     let mobileHeader = document.querySelector('.mobile-header');
     
     mobileIcon.addEventListener('click',function(){
        mobileHeader.classList.toggle('mobile-header-active');
        mobileIcon.classList.toggle('mobile-icon-transform');
     })


     function handleDropDown() {
        let linkBox = document.querySelector('.links ul .div-box');
        let linkTag = document.getElementById('linkTag');
        
        // Check if screen is large
        let isLargeScreen = window.matchMedia("(min-width: 768px)").matches;
    
        if (isLargeScreen) {
            // Desktop: Mouseover for dropdown
            linkTag.addEventListener('mouseover', function () {
                linkBox.style.display = 'block';
            });
    
            linkTag.addEventListener('mouseleave', function () {
                linkBox.style.display = 'none';
            });
            mobileHeader.classList.remove('mobile-header-active');
            mobileIcon.classList.remove('mobile-icon-transform');
        } else {
            
            // Mobile: Click to show dropdown
            let MobilelinkTag = document.getElementById('MobilelinkTag');
            let mobileDivBox = document.getElementById('mobileDivBox');

            MobilelinkTag.addEventListener('click', function () {
                mobileDivBox.style.display = mobileDivBox.style.display === 'block' ? 'none' : 'block';
                
            });
        }
    }
    
    // Run function on page load
    handleDropDown();
    
    // Listen for screen resize & reapply logic
    window.addEventListener('resize', handleDropDown);
    


    
      
});

 
 