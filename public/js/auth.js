const form=document.getElementById("form");async function handleSubmit(t){t.preventDefault();const e=new FormData(this);await fetch("http://localhost:8080/auth",{method:this.method,body:e})}form.addEventListener("submit",handleSubmit);
//# sourceMappingURL=auth.js.map
