# Server Optimizer

## Descrizione del Progetto

**Server Optimizer** è un modulo Python progettato per migliorare le **prestazioni** e la **sicurezza** di un server Python. Include tecniche avanzate come **caching** con Redis, **multiprocessing** per ottimizzazioni CPU-bound, e varie misure di sicurezza come l'hashing sicuro delle password e la protezione da attacchi XSS.

---

## Funzionalità Principali

### 1. Prestazioni
- **Caching con Redis**: Riduce il tempo di esecuzione di operazioni costose utilizzando Redis per memorizzare i risultati.
- **Multiprocessing**: Sfrutta i core della CPU per migliorare le prestazioni in operazioni CPU-bound.

### 2. Sicurezza
- **Hashing sicuro delle password**: Usa `bcrypt` per garantire l'archiviazione sicura delle password.
- **Protezione XSS**: Usa `bleach` per sanificare l'input utente ed evitare attacchi XSS.
- **Prevenzione SQL Injection**: Utilizza SQLAlchemy per eseguire query SQL sicure e parametrizzate.

---

## Struttura del Progetto

```
.
├── dcsstore
│   ├── __init__.py
│   ├── performance.py
│   ├── security.py
│   └── utils.py
├── DOC
│   └── README.md
├── LICENSE
├── README.md
├── requirements.txt
├── setup.py
└── tests
    ├── test_performance.py
    └── test_security.py
```

---

## Installazione

Per installare il modulo, puoi clonare il repository e installarlo utilizzando `pip` in modalità editabile.

### 1. Clona il repository

```bash
git clone https://github.com/tuo-nome/server_optimizer.git
cd server_optimizer
pip install -r requirements.txt
pip install -e .
```

# Test del Modulo

Per verificare che tutto funzioni correttamente, puoi eseguire i test unitari:

## 1. Test delle Prestazioni

Il file ```tests/test_performance.py ```
 verifica le ottimizzazioni delle prestazioni.
 
```python
 
Lavori in corso...
    
```

Esegui i test con il comando:

```shell  python -m unittest discover -s tests```

## 2. Test della Sicurezza

Il file ```tests/test_security.py``` verifica le funzionalità di sicurezza, come l'hashing delle password e la protezione XSS.

```python

import unittest
from server_optimizer.security import genera_hash_password, verifica_password, proteggi_da_xss

class TestSecurity(unittest.TestCase):
    def test_hash_password(self):
        password = "password123"
        hashed_password = genera_hash_password(password)
        self.assertTrue(verifica_password(password, hashed_password))

    def test_protezione_xss(self):
        input_utente = '<script>alert("XSS")</script>'
        sanificato = proteggi_da_xss(input_utente)
        self.assertEqual(sanificato, '&lt;script&gt;alert("XSS")&lt;/script&gt;')

if __name__ == "__main__":
    unittest.main()

```

# Pacchetti Python

Il modulo richiede i seguenti pacchetti Python:

- ```bcrypt```: Per hashing sicuro delle password.
- ```bleach```: Per protezione contro attacchi XSS.
- ```redis```: Per caching di operazioni costose.
- ```sqlalchemy```: Per prevenzione di SQL Injection tramite query sicure.

Installa i pachetti tramite: 

```shell
pip install -r requirements.txt

```

# Come contribuire

Contributi sono benvenuti! Puoi contribuire al progetto tramite **pull request**, suggerendo miglioramenti alle prestazioni o alla sicurezza, o segnalando bug.

## Passaggi per contribuire:

1. Effettua il **fork** della reposity.
2. Crea un nuovo **branch** per le tue modifiche (```git checkout -b feature-branch```).
3. Aggiungi le tue modifiche (```git add .```)
4. Esegui il **commit** delle modifiche (```git commit -m 'Aggiunta nuova funzionalità'```).
5. **Push** del branch (```git commit -m 'Aggiunta nuova funzionalità'```).
6. Apri una **pull request**

# Licenza

Questo progetto è distribuito sotto licenza **MIT**. Consulta il file ```LICENSE``` per maggiori informazioni.
