document.addEventListener("DOMContentLoaded", function(event) {
  
  function OTPInput() {
    const inputs = document.querySelectorAll('#otp > *[id]');
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].addEventListener('keydown', function(event) { 
        if (event.key==="Backspace" ) {
          inputs[i].value='' ;
          if (i !==0) inputs[i - 1].focus(); 
        } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) {
          return true; 
        } else if (event.keyCode> 47 && event.keyCode < 58) { 
          inputs[i].value=event.key;
           if (i !==inputs.length - 1) inputs[i + 1].focus();
           event.preventDefault(); 
          } else if (event.keyCode> 64 && event.keyCode < 91) { 
            inputs[i].value=String.fromCharCode(event.keyCode); 
            if (i !==inputs.length - 1) inputs[i + 1].focus(); 
            event.preventDefault(); 
          } 
        } 
      }); 
    } 
  } 
  
  OTPInput();
  
});




// Multi Step Form
const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".step-forms");
const progressSteps = document.querySelectorAll(".progress-step");


let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
   
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
    
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("step-forms-active") &&
      formStep.classList.remove("step-forms-active");
  });

  formSteps[formStepsNum].classList.add("step-forms-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
      
    } else {
      progressStep.classList.remove("progress-step-active");
   
    }
  });

  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum) {
      
      progressStep.classList.add("progress-step-check");
    } else {
   
      progressStep.classList.remove("progress-step-check");
    }
  });
 
  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}



// Dashboard
/* globals Chart:false */

(() => {
  'use strict'

  // Graphs
  const ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          24003,
          23489,
          24092,
          12034
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          boxPadding: 3
        }
      }
    }
  })
})()
