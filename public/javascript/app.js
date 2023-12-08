let alerts = document.querySelectorAll('.alert');


//  si messages d'alerte, on les fait disparaitre au bout de 3 secondes.
if (alerts.length > 0) {
  alerts.forEach((alert) => {
    setTimeout(() => {
      alert.classList.add('d-none');
    }, 3000);
  });
}
