// Initialize Swiper
var swiper = new Swiper(".fourmindSwiper", {
    allowTouchMove: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: false,
    },
    hashNavigation: {
        watchState: true,
    },
    on: {
        init: (swiper) => {
            // Set Before Content On First Slider
            let currentSlide = document.querySelectorAll(".main-slide")[0].getAttribute('data-bullet');
            let bulletContent = document.querySelector('.swiper-pagination-bullet-active');
            if( swiper.activeIndex == 0 ) {
                bulletContent.setAttribute('data-before', currentSlide);
            }

            // Next Slider By btn-start Button
            let btnStart = document.querySelector('.btn-start');
            btnStart.addEventListener('click', () => {
                swiper.slideNext();
            });

            // Next Slider By btn-register Button
            let btnRegister = document.querySelectorAll('.btn-register');
            btnRegister.forEach((e) => {
                e.addEventListener("click", () => {
                    let courseID = e.getAttribute("data-courseID");
                    let courseTitle = e.getAttribute("data-courseTitle");
                    let courseDate = e.getAttribute("data-courseDate");
                    let courseQuiz = e.getAttribute("data-courseQuiz");
                    setCourseID(courseID);
                    setCourseTitle(courseTitle);
                    setCourseDate(courseTitle, courseDate);
                    setCourseQuiz(courseQuiz);
                    swiper.slideNext();
                });
            });

            // Next && Prev Slider By btn-next && btn-prev Button
            let btnNext = document.querySelectorAll('.btn-next');
            let btnPrev = document.querySelectorAll('.btn-prev');
            btnNext.forEach((e) => {
                e.addEventListener("click", () => {
                    validateForm(swiper);
                });
            });
            btnPrev.forEach((e) => {
                e.addEventListener("click", () => {
                    swiper.slidePrev();
                });
            }); 

        },
        slideChangeTransitionEnd: (swiper) => {
            // Set Before Content On Change Slider
            let currentSlide = document.querySelectorAll(".main-slide")[swiper.activeIndex].getAttribute('data-bullet');
            let bulletContent = document.querySelector('.swiper-pagination-bullet-active');
            bulletContent.setAttribute('data-before', currentSlide);
        },
    },
    breakpoints: {
        0: {
            direction: "horizontal",
        },
        576: {
            direction: "horizontal",
        },
        768: {
            direction: "vertical",
        },
        992: {
            direction: "vertical",
        },
        1200: {
            direction: "vertical",
        },
        1400: {
            direction: "vertical",
        },
    }
});

var card = new Swiper(".cardSwiper", {
    slidesPerView: 2,
    spaceBetween: 15,
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        576: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
        992: {
            slidesPerView: 2.5,
            spaceBetween: 30,
        },
        1200: {
            slidesPerView: 2.5,
            spaceBetween: 30,
        },
        1400: {
            slidesPerView: 2.5,
            spaceBetween: 30,
        },
    }
});

// Button Introduce Method
let introduceCallback = (url) => {
    navigator.clipboard.writeText(url);
    alert(`آدرس ${url} در حافظه کلیپ برد ذخیره شد.`);
}

// Set data-courseID in form-step-one Input
let setCourseID = (setCourseID) => {
    let setCourseIDInput = document.querySelector(".form-step-one .course-id");
    setCourseIDInput.value = setCourseID;
}

let setCourseQuiz = (setCourseQuiz) => {
    let setQuestionsTitle = document.querySelectorAll(".form-step-two label");
    arrayQuestions = setCourseQuiz.split(",");

    for (let index = 0; index < setQuestionsTitle.length; index++) {
        setQuestionsTitle[index].innerHTML = arrayQuestions[index];
    }
}

let setCourseTitle = (setCourseTitle) => {
    let setFormHeading = document.querySelectorAll(".form-heading .coursse-title");
    setFormHeading.forEach( (e) => {
        e.innerHTML = setCourseTitle;
    });
}

let setCourseDate = (courseTitle, courseDate) => {
    let setCourseTitle = document.querySelector(".info .course-title");
    let setCourseDate = document.querySelector(".info .course-date");

    setCourseTitle.innerHTML = courseTitle;
    setCourseDate.innerHTML = courseDate;
    
}

// Check form-step-one Validation
let validateForm = (swiper) => {
    let statusAll = false;
    let statusFullName = false;
    let statusJob = false;
    let statusField = false;
    let statusTel = false;
    let statusEmail = false;
    // let statusDate = false;

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	var telPattern = /^0\d{10}$/;
    let borderError = 'border-color:#FF5858;';
    let messageError = 'display:inline-block;';
    
    let formFeilds = document.querySelector(".form-step-one");
    let fullName = formFeilds.querySelector(".full-name");
    let job = formFeilds.querySelector(".job");
    let field = formFeilds.querySelector(".field");
    let tel = formFeilds.querySelector(".tel");
    let email = formFeilds.querySelector(".email");
    // let date = formFeilds.querySelector(".date:checked").value;

    let fullNameValue = fullName.value;
    let jobValue = job.value;
    let fieldValue = field.value;
    let telValue = tel.value;
    let emailValue = email.value;

    let fullNameMessage = formFeilds.querySelector(".full-name-message");
    let jobMessage = formFeilds.querySelector(".job-message");
    let fieldMessage = formFeilds.querySelector(".field-message");
    let telMessage = formFeilds.querySelector(".tel-message");
    let emailMessage = formFeilds.querySelector(".email-message");

    if( fullNameValue.trim() === '' ) {
        fullName.style.cssText = borderError;
        fullNameMessage.style.cssText = messageError;
    } else {
        fullName.removeAttribute("style");
        fullNameMessage.removeAttribute("style");
        statusFullName = true;
    }

    if( jobValue.trim() === '' ) {
        job.style.cssText = borderError;
        jobMessage.style.cssText = messageError;
    } else {
        job.removeAttribute("style");
        jobMessage.removeAttribute("style");
        statusJob = true;
    }

    if( fieldValue.trim() === '' ) {
        field.style.cssText = borderError;
        fieldMessage.style.cssText = messageError;
    } else {
        field.removeAttribute("style");
        fieldMessage.removeAttribute("style");
        statusField = true;
    }

    if( telValue.trim() === '' ) {
        tel.style.cssText = borderError;
        telMessage.style.cssText = messageError;
    } else if ( !telPattern.test(telValue) ) {
        tel.style.cssText = borderError;
        telMessage.style.cssText = messageError;
    } else {
        tel.removeAttribute("style");
        telMessage.removeAttribute("style");
        statusTel = true;
    }

    if( emailValue.trim() === '' ) {
        email.style.cssText = borderError;
        emailMessage.style.cssText = messageError;
    } else if( !emailPattern.test(emailValue) ) {
        email.style.cssText = borderError;
        emailMessage.style.cssText = messageError;
    } else {
        email.removeAttribute("style");
        emailMessage.removeAttribute("style");
        statusEmail = true;
    }

    if( statusFullName && statusJob && statusField && statusTel && statusEmail ) {
        statusAll = true;
    }

    if( statusAll ) {
        swiper.slideNext();
    }

}

let rangeCallback = (event) => {
    var wallet = document.querySelector(".wallet");
    var price = wallet.querySelector(".price");
    var rangeValue = document.querySelector('.range').value;
    price.innerHTML = rangeValue + " تومان";
}