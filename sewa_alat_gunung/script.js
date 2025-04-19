document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

const modal = document.getElementById("rent-modal");
const btn = document.querySelectorAll(".rent-now")[0];
const span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
  modal.style.display = 'block';
};

span.onclick = function () {
  modal.style.display = 'none';
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}

document.getElementById('rent-form').addEventListener('submit', function (e) {
  e.preventDefault();
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;

  if (name === '' || email === '') {
    alert('Nama dan emali wajib diisi!');
  } else {
    alert('Terimakasih telah menghubungi kami, ' + name + '!');
    modal.style.display = 'none';
  }
});