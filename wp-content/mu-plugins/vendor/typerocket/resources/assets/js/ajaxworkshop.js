function checkoutCallbackAjaxJs() {

    let formStepOne = document.querySelector('.form-step-one');
    let courseID = formStepOne.querySelector('.course-id').value;
    let fullName = formStepOne.querySelector('.full-name').value;
    let job = formStepOne.querySelector('.job').value;
    let field = formStepOne.querySelector('.field').value;
    let tel = formStepOne.querySelector('.tel').value;
    let email = formStepOne.querySelector('.email').value;
    // let date = formStepOne.querySelector('.date').value;

    let formStepTwo = document.querySelector('.form-step-two');
    let label1 = formStepTwo.querySelectorAll('label')[0].innerHTML;
    let label2 = formStepTwo.querySelectorAll('label')[1].innerHTML;
    let label3 = formStepTwo.querySelectorAll('label')[2].innerHTML;
    let question1 = formStepTwo.querySelector('.question1').value;
    let question2 = formStepTwo.querySelector('.question2').value;
    let question3 = formStepTwo.querySelector('.question3').value;

    // let formStepThree = document.querySelector('.form-step-three');
    // let textarea4 = formStepThree.querySelector('.textarea4').value;
    // let textarea5 = formStepThree.querySelector('.textarea5').value;
    // let textarea6 = formStepThree.querySelector('.textarea6').value;

    // let formStepFour = document.querySelector('.form-step-four');
    // let textarea7 = formStepFour.querySelector('.textarea7').value;
    // var checked = formStepFour.querySelectorAll('.btn-check:checked');
    // var checkList = [];
    // var dataCheckValue;
    // checked.forEach( (item) => {
    //     dataCheckValue = item.getAttribute("data-check-value");3
    //     checkList.push(dataCheckValue);
    // });

    // let formStepFive = document.querySelector('.form-step-five');
    // let textarea8 = formStepFive.querySelector('.textarea8').value;
    // let textarea9 = formStepFive.querySelector('.textarea9').value;
    // let textarea10 = formStepFive.querySelector('.textarea10').value;

    let formStepSix = document.querySelector('.form-step-six');
    let price = formStepSix.querySelector('.range').value;

    jQuery.ajax({
        url: workshop_ajax_localize_obj.ajax_url,
        type: 'post',
        dataType: 'json',
        // method: 'post',
        // contentType : 'application/json; charset=utf-8',
        // contentType: false,
        // processData: false,
        data: {
            action: 'workshop_ajax_handle',
            submitted_nonce: workshop_ajax_localize_obj.the_nonce,
            courseID: courseID,
            fullName: fullName,
            job: job,
            field: field,
            tel: tel,
            email: email,
            label1: label1,
            label2: label2,
            label3: label3,
            question1: question1,
            question2: question2,
            question3: question3,
            price: price,
        },
        success: function (response) {
            window.location.replace("https://www.zarinpal.com/pg/StartPay/" + response.data.authority);
        },
        error: function (response) {
            alert('Error retrieving the information: ' + response.status + ' ' + response.statusText);
        }
    });

}