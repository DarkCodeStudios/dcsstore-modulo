import unittest
from dcsstore.security import genera_hash_password, verifica_password, proteggi_da_xss

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
