import logging

# Configurazione del logging
logging.basicConfig(level=logging.INFO)

# Funzione per registrare eventi nel log
def log_evento(evento: str):
    logging.info(f"Evento: {evento}")

# Funzione di validazione degli input
def valida_input(input_utente: str) -> bool:
    return 0 < len(input_utente) < 256
