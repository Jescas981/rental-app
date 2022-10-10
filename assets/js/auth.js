const form = document.getElementById('form');



async function handleSubmit(e) {
    e.preventDefault();
    const data = new FormData(this);
    const res = await fetch('http://localhost:8080/auth', {
        method: this.method,
        body: data
    })
}

form.addEventListener('submit', handleSubmit);