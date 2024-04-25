document.addEventListener('DOMContentLoaded', function () {
    var viewButtons = document.querySelectorAll('.view-customer');
    var customerDetailsContainer = document.getElementById('customerDetails');

    viewButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        var custic = this.getAttribute('data-custic');
        var custname = this.getAttribute('data-custname');
        var custphone = this.getAttribute('data-custphone');
        var devicetype = this.getAttribute('data-devicetype');
        var brand = this.getAttribute('data-brand');
        var model = this.getAttribute('data-model');
        var problem = this.getAttribute('data-problem');
        var regdate = this.getAttribute('data-regdate');

        var customerDetailsHTML = `
          <p><strong>IC Number:</strong> ${custic}</p>
          <p><strong>Name:</strong> ${custname}</p>
          <p><strong>Phone Number:</strong> ${custphone}</p>
          <p><strong>Device Type:</strong> ${devicetype}</p>
          <p><strong>Brand:</strong> ${brand}</p>
          <p><strong>Model:</strong> ${model}</p>
          <p><strong>Problem:</strong> ${problem}</p>
          <p><strong>Registration Date:</strong> ${regdate}</p>
          
        `;

        customerDetailsContainer.innerHTML = customerDetailsHTML;
      });
    });
  });