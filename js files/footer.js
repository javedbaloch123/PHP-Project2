document.addEventListener("DOMContentLoaded", function () {
    let slideMenu = document.querySelector('.slideMenu-section');
    let bookbtn = document.querySelector('.bookbtn');
    let h5 = document.querySelector('.back-btn');

    bookbtn.addEventListener('click', function () {
        slideMenu.style.right = slideMenu.style.right === '50px' ? '-377px' : '50px';
        bookbtn.style.display = 'none';

    })

    document.getElementById("crossbtn").addEventListener("click", function () {
        document.querySelector(".slideMenu-section").style.right = "-377px";
        bookbtn.style.display = 'block';
    });


    let currentStep = 1;
    const totalSteps = 4;

    function showStep(step) {
        document.querySelectorAll(".first-section, .second-real-container, .third-section, .forth-section").forEach((section, index) => {
            if (index + 1 === step) {
                section.classList.add("active-section");
                section.classList.remove("prev-section");
            } else if (index + 1 < step) {
                h5.innerHTML = 'Choose a service';
                section.classList.remove("active-section");
                section.classList.add("prev-section");
            } else {
                section.classList.remove("active-section", "prev-section");
            }
        });
    }



    document.querySelectorAll(".next-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    document.querySelectorAll(".back-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
                if (currentStep === 1) {
                    h5.innerHTML = 'Choose a location';
                }
            }
        });
    });

    showStep(currentStep);


    let cols = document.querySelectorAll('.second-real-container .col');

    cols.forEach(col => {
        col.addEventListener('click', function () {

            let id = col.getAttribute('data-id');
            if (id !== null) {
                let colImage = col.querySelector('img').src;
                let colName = col.querySelector('span').innerHTML;
                let secondImage = document.querySelector('.third-section .hidden-row .div .confirm-row .second-row img');
                secondImage.src = colImage;
                let name = document.querySelector('.third-section .hidden-row .div .confirm-row .second-row .div span');
                name.innerHTML = colName;
                fetch('fetch_data.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ col_id: id }),
                })

                    .then(response => response.json())
                    .then(data => {
                        let col = document.querySelector('.second');
                        col.innerHTML = ``;

                        let cuts = ['Scissor Cut', 'Clipper Cut', 'Buzz Cut', 'Beared Cut', 'Strait-Razor']
                        let price = [];
                        if (data.status === 'success' && Array.isArray(data.data)) {
                            let barberData = data.data[0];
                            price.push(barberData.scissor);
                            price.push(barberData.clipper);
                            price.push(barberData.buzz);
                            price.push(barberData.beared);
                            price.push(barberData.starit_razor);
                            for (let i = 0; i < cuts.length; i++) {
                                col.innerHTML += `<div class="col">
                         <i class="fa-solid fa-circle-info"></i>
                            <h4>${cuts[i]}</h4>
                            <span>45 min</span>
                            <strong>$${price[i]}</strong>
                        </div>`;
                            }
                            cardClick();

                        } else {
                            console.error("Invalid data received:", data);
                        }
                    })
            } else {
                fetch('fetch_common_data.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                })

                    .then(response => response.json())
                    .then(data => {
                        let col = document.querySelector('.second');
                        col.innerHTML = ``;

                        let cuts = ['Scissor Cut', 'Clipper Cut', 'Buzz Cut', 'Beared Cut', 'Strait-Razor']
                        let price = [];
                        if (data.status === 'success' && Array.isArray(data.data)) {
                            let barberData = data.data[0];
                            price.push(barberData.scissor);
                            price.push(barberData.clipper);
                            price.push(barberData.buzz);
                            price.push(barberData.beared);
                            price.push(barberData.strait_razor);
                            for (let i = 0; i < cuts.length; i++) {
                                col.innerHTML += `<div class="col">
                         <i class="fa-solid fa-circle-info"></i>
                            <h4>${cuts[i]}</h4>
                            <span>45 min</span>
                            <strong>$${price[i]}</strong>
                        </div>`;
                            }
                            cardClick();
                        } else {
                            console.error("Invalid data received:", data);
                        }
                    })
            }


        })



    })



    let select = document.querySelector('#select');
    select.addEventListener('change', function () {
        let col = document.querySelector('.second');
        col.innerHTML = ``;
        let item = select.value;

        fetch('search.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ item: item })
        })

            .then(response => response.json())
            .then(data => {
                let itemData = data.data[0];

                for (let key in itemData) {

                    col.innerHTML += `<div class="col">
                         <i class="fa-solid fa-circle-info"></i>
                            <h4>${key} Cut</h4>
                            <span>45 min</span>
                            <strong>$${itemData[key]}</strong>
                        </div>`;
                }
                cardClick();
            })
    })


    // {/* <i class="fa-solid fa-xmark"></i> */}

    let domCard = document.querySelector('.dom-card');
    let icon = document.querySelector('.dom-card i');
    domCard.addEventListener('mouseover', function () {
        icon.classList.remove('fa-check');
        icon.classList.add('fa-xmark');
    })

    domCard.addEventListener('mouseleave', function () {
        icon.classList.add('fa-check');
        icon.classList.remove('fa-xmark');
    })


    function cardClick() {
        let cards = document.querySelectorAll('.second .col');
        let visibleRow = document.querySelector('.visible-row');
        let hiddenRow = document.querySelector('.hidden-row');
        let calRow = hiddenRow.querySelector('.cal-row');
        let price = calRow.querySelector('.span1');
        price.style.display = 'none';
        cards.forEach(card => {

            card.addEventListener('click', function () {
                selectCard();

                function selectCard() {

                    let h4 = domCard.querySelector('h4');
                    let strong = domCard.querySelector('strong');
                    let selecth4 = card.querySelector('h4').innerHTML;
                    let selectstrong = card.querySelector('strong').innerHTML;
                    let cutName = document.querySelector('.third-section .hidden-row .div .confirm-row .second-row p');

                    cutName.innerHTML = selecth4;
                    h4.innerHTML = selecth4;
                    strong.innerHTML = selectstrong;

                    let span1 = calRow.querySelector('.span1');
                    span1.innerHTML = selectstrong;


                }

                visibleRow.style.visibility = 'hidden';
                visibleRow.style.opacity = '0';
                setTimeout(() => {
                    hiddenRow.style.visibility = 'visible';
                    hiddenRow.style.opacity = '1';
                    hiddenRow.style.top = '0';
                }, 50)

                setTimeout(() => {
                    calRow.style.opacity = '1';
                    calRow.style.transform = 'none';
                    calRow.style.bottom = '6px';

                    setTimeout(() => {
                        spinnerhide();
                    }, 2000)
                }, 1000)
            })
        });

        domCard.addEventListener('click', function () {
            calRow.style.opacity = '0';
            calRow.style.transform = 'Scale(.5)';
            calRow.style.bottom = '0px';

            hiddenRow.style.visibility = 'hidden';
            hiddenRow.style.opacity = '0';
            hiddenRow.style.top = '70vh';

            setTimeout(() => {
                visibleRow.style.visibility = 'visible';
                visibleRow.style.opacity = '1';
                visibleRow.style.transition = '.3s';

            }, 50)


        })

        function spinnerhide() {
            let spinner = calRow.querySelector('.spinner');

            price.style.display = 'block';
            spinner.style.display = 'none';

        }

        function spinnerShow() {
            let spinner = calRow.querySelector('.spinner');
            spinner.style.display = 'block';
            price.style.display = 'none';
        }

        let calCol = document.querySelectorAll('.cal-col');
        calCol.forEach(col => {
            col.addEventListener('click', function (e) {
                spinnerShow();
                col.classList.toggle('active-col');
                let priceText = col.querySelector('strong').innerText;
                let domCardPrice = domCard.querySelector('strong').innerText;
                let domPrice = parseFloat(domCardPrice.replace('$', ''));
                let price = parseFloat(priceText.replace('$', ''));




                setTimeout(() => {
                    let span1 = calRow.querySelector('.span1').innerText;
                    let spanPrice = parseFloat(span1.replace('$', ''));
                    if (e.target.classList.contains('active-col')) {
                        let span = calRow.querySelector('.span1').innerHTML = spanPrice + price + '$';
                        console.log(spanPrice + price)
                    } else {
                        let span = calRow.querySelector('.span1').innerHTML = spanPrice - price + '$';
                        console.log(spanPrice - price)
                    }
                }, 1000)

                setTimeout(() => {
                    spinnerhide();
                }, 2000)
            });
        });


        let confirmRow = document.querySelector('.confirm-row');
        let icon = document.querySelector('.third-section .hidden-row .div .confirm-row .first-row div i');
        let cutP = confirmRow.querySelector('#cut-p');
        let subP = confirmRow.querySelector('#sub-t');

        calRow.addEventListener('click', function () {
            confirmRow.style.display = 'flex';
            setTimeout(() => {
                confirmRow.style.top = '-7px';
            }, 100);
            setTimeout(() => {
                let spanValue = calRow.querySelector('.span1').innerText;
                cutP.innerHTML = spanValue;
                subP.innerHTML = spanValue;
                console.log(spanValue);
            }, 3000);

        })

        icon.addEventListener('click', function () {
            confirmRow.style.top = '100%';
            setTimeout(() => {
                confirmRow.style.display = 'none';
            }, 500)
        })


        let dateCol = document.querySelectorAll('.date-row .col');
        let calender = document.querySelector('.calender-section');
        let Timesection = document.querySelector('.time-section');
        let cols = Timesection.querySelectorAll('.first-row .f-col');
        dateCol.forEach(col => {

            let timeslots = {
                22: ["10:00 AM", "12:00 PM", "3:00 PM"],
                23: ["9:00 AM", "1:00 PM", "4:00 PM"],
                24: ["2:00 PM", "3:00 PM", "10:00 AM"],
                26: ["11:00 AM", "2:30 PM"],
                27: ["9:00 AM", "12:00 PM", "5:00 PM"],
                28: ["8:00 AM", "10:30 AM", "4:00 PM"]
            };

            if (col.classList.contains('active')) {
                col.addEventListener('click', function () {
                    calender.style.display = 'none';
                    Timesection.style.opacity = '1';
                    Timesection.style.visibility = 'visible';
                    Timesection.style.top = '0px';
                    Timesection.style.transform = 'scale(1)';
                    let clicked = parseInt(col.innerText);
                    cols.forEach(cl => {
                        cl.innerText = clicked;
                        let dates = [22, 23, 24, 26, 27, 28];

                        if (dates.includes(clicked)) {
                            cl.classList.add('active'); // Add class if match is found
                        }

                        clicked++;
                    });

                    cols.forEach((col, index) => {
                        if (col.classList.contains('active')) {
                             
                            // Add default class to the first column
                            if (index === 0) {
                                col.classList.add('show');
                            }
            
                            col.addEventListener('click', function () {
                                // Remove 'active' class from all columns
                                cols.forEach(c => c.classList.remove('show'));
            
                                // Add 'active' class to the clicked column
                                col.classList.add('show');
                            });
                        }
                      col.addEventListener('click',function(){
                        let date = parseInt(col.innerHTML);
                        let timecols = document.querySelector('.slideMenu-div .forth-section .time-section .third .row');
                        timecols.innerHTML = '';
                        
                        timeslots[date].forEach(time =>{
                            timecols.innerHTML += `<div class="col">
                            <i class="fa-solid fa-sun"></i>
                            <span>${time}</span>
                            </div>`;
                        })
                        
                      })
                     
                    });

                    let daycols = Timesection.querySelectorAll('.second .s-col');
                    
                    daycols.forEach((day, index) => {
                        if (cols[index]) { // Ensure index exists
                            let dateValue = parseInt(cols[index].innerHTML); // Date value lein
                            day.innerHTML = getDayOfDate(dateValue).slice(0,3); // Day replace karein
                        }
                    });
                })
 
            }
        });
 
        function getDayOfDate(day) {
            let today = new Date(); // Current date lein
            let year = today.getFullYear(); // Current year
            let month = today.getMonth(); // Current month (0-based index)
            
            let specificDate = new Date(year, month, day); // Specific date ka object
            let dayIndex = specificDate.getDay(); // Day ka index (0-6)
            
            let days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            return days[dayIndex]; // Day name return karega
        }
        
    


    }

  
 

});

