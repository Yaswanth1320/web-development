const scriptURL = 'https://script.google.com/macros/s/AKfycbwuY00uIeh1F5Iv56bRgrCkKn4MgUt1AuFwTyZSVITTTKZK0b-SOdQd_WOeo5IoG3tgaQ/exec'
  const form = document.forms['submit-to-google-sheet'];
  const msg = document.getElementById("msg");
  const input = document.getElementById("input");

  form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response =>{
            msg.innerHTML = "Thank you for subscribing!";
            setTimeout(()=>{
                msg.innerHTML = "";
            },5000)
            form.reset()
      })
      .catch(error => console.error('Error!', error.message))
  })