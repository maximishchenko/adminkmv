// scroll events
window.onscroll = function() {
    // stickyNavbar();
    scrollToTop();
}


// Scroll to top
function scrollToTop() {
    scroll_button = document.getElementById("scroll_top");
    if (window.pageYOffset >= 100) {
        scroll_button.style.display = "flex";
    } else {
        scroll_button.style.display = "none";
    }
    scroll_button.addEventListener("click", function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        return false;
    });
}

// Sticky header
var navbar = document.querySelector("header");
var sticky = navbar.offsetTop;
function stickyNavbar() {

    if (window.pageYOffset >= sticky + 300) {
        navbar.classList.add("header_sticky")
    } else {
        navbar.classList.remove("header_sticky");
    }
}  


let feedbackModal = new GraphModal();
document.addEventListener("DOMContentLoaded", function () {

    // Feedback modal event
    document.querySelectorAll('button[data-callback-modal]').forEach(el => el.addEventListener('click', function (e) {
      // if (policyModal.isOpen == true) {
      //   policyModal.close();
      // }
      // if (thanksModalItem.isOpen == true) {
      //   thanksModalItem.close();
      // }
      feedbackModal.open('feedback');
      document.getElementById("callback_submit_btn_modal").disabled = true;
    }));

    // Begin Ajax Form Submit
    // Находит формы. Для каждой формы прослушивает событие отправки формы
    // Ко всем формам в модальных окнах необходимо добавить data-аттрибут data-modal-form, 
    // т.к. необходимо их скрывать при отправке, но такая необходимость отсутствует у inline-форм
    // Если форма содержит data-attribute со значением data-modal-form, то форма после отправки будет
    // скрыта и показано модальное окно, если аттрибута не существует - просто модальное окно 
    let form = document.querySelectorAll('form');
    form.forEach(el =>
      el.addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        let formAction = this.action;
        let formMethod = this.method;
        let request = new XMLHttpRequest();
        request.open(formMethod,formAction);
        request.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content);
        request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        request.send(formData);
        
        this.reset();
        
        //let isModalForm = this.getAttribute('data-modal-form');
        //if (isModalForm != null) {
        //  feedbackModal.close();
        //}
        //thanksModalItem.open("successfully");


        request.addEventListener('load', () => {
          if (request.status === 200) {
            console.log('Form Submit Successfully');
          } else {
            console.error('Error submitting form');
          }
        });
        request.addEventListener('error', () => {
          console.error('Error submitting form');
        });
      })
    );
    // End Ajax Form Submit

    
    // Start agreement button activation by checkbox
    let agreementCheckbox = document.querySelectorAll('input[data-agreement-checkbox]');
    agreementCheckbox.forEach(el => el.addEventListener('change', function() {
      let parentForm = this.form;
      let submitButton = parentForm.querySelector('button[type="submit"]');
      if (this.checked) {
        submitButton.disabled = false;
      } else {
        submitButton.disabled = true;
      }
    }));
    // End agreement button activation by checkbox


    // Phone Input
    var phoneInputs = document.querySelectorAll('input[data-tel-input]');
  
    var getInputNumbersValue = function (input) {
      // Return stripped input value — just numbers
      return input.value.replace(/\D/g, '');
    }
  
    var onPhonePaste = function (e) {
      var input = e.target,
        inputNumbersValue = getInputNumbersValue(input);
      var pasted = e.clipboardData || window.clipboardData;
      if (pasted) {
        var pastedText = pasted.getData('Text');
        if (/\D/g.test(pastedText)) {
          // Attempt to paste non-numeric symbol — remove all non-numeric symbols,
          // formatting will be in onPhoneInput handler
          input.value = inputNumbersValue;
          return;
        }
      }
    }
  
    var onPhoneInput = function (e) {
      var input = e.target,
        inputNumbersValue = getInputNumbersValue(input),
        selectionStart = input.selectionStart,
        formattedInputValue = "";
  
      if (!inputNumbersValue) {
        return input.value = "";
      }
  
      if (input.value.length != selectionStart) {
        // Editing in the middle of input, not last symbol
        if (e.data && /\D/g.test(e.data)) {
          // Attempt to input non-numeric symbol
          input.value = inputNumbersValue;
        }
        return;
      }
  
      if (["7", "8", "9"].indexOf(inputNumbersValue[0]) > -1) {
        if (inputNumbersValue[0] == "9") inputNumbersValue = "7" + inputNumbersValue;
        var firstSymbols = (inputNumbersValue[0] == "8") ? "8" : "+7";
        formattedInputValue = input.value = firstSymbols + " ";
        if (inputNumbersValue.length > 1) {
          formattedInputValue += '(' + inputNumbersValue.substring(1, 4);
        }
        if (inputNumbersValue.length >= 5) {
          formattedInputValue += ') ' + inputNumbersValue.substring(4, 7);
        }
        if (inputNumbersValue.length >= 8) {
          formattedInputValue += '-' + inputNumbersValue.substring(7, 9);
        }
        if (inputNumbersValue.length >= 10) {
          formattedInputValue += '-' + inputNumbersValue.substring(9, 11);
        }
      } else {
        formattedInputValue = '+' + inputNumbersValue.substring(0, 16);
      }
      input.value = formattedInputValue;
    }
    var onPhoneKeyDown = function (e) {
      // Clear input after remove last symbol
      var inputValue = e.target.value.replace(/\D/g, '');
      if (e.keyCode == 8 && inputValue.length == 1) {
        e.target.value = "";
      }
    }
    for (var phoneInput of phoneInputs) {
      phoneInput.addEventListener('keydown', onPhoneKeyDown);
      phoneInput.addEventListener('input', onPhoneInput, false);
      phoneInput.addEventListener('paste', onPhonePaste, false);
    }
})



// // Forms
// document.querySelectorAll(".callback_btn")
//   .forEach(el => el.addEventListener("click",  function(e) {
//         let callback_modal = document.querySelector(".modal");
//         callback_modal.classList.toggle("active");
// }));
// document.querySelectorAll(".close")
//   .forEach(el => el.addEventListener("click",  function(e) {
//         let callback_modal = document.querySelector(".modal");
//         callback_modal.classList.toggle("active");
// }));