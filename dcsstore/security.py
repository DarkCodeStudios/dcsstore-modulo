import bcrypt
import bleach
from sqlalchemy import create_engine, text

# Funzione per generare l'hash della password con bcrypt
def genera_hash_password(password: str) -> str:
    salt = bcrypt.gensalt()
    hashed_password = bcrypt.hashpw(password.encode(), salt)
    return hashed_password

# Funzione per verificare la password con l'hash
def verifica_password(password: str, hashed_password: bytes) -> bool:
    return bcrypt.checkpw(password.encode(), hashed_password)

# Protezione da attacchi XSS usando bleach
def proteggi_da_xss(input_utente: str) -> str:
    return bleach.clean(input_utente)

# Connessione al database usando SQLAlchemy
engine = create_engine('sqlite:///database.db')

# Prevenzione di SQL Injection usando query parametrizzate
def esegui_query_sicura(valore):
    with engine.connect() as conn:
        result = conn.execute(text("SELECT * FROM users WHERE username = :valore"), {"valore": valore})
        return result.fetchall()
