Notas 
==============================

# Obtendo token, com usuário e senha

```
POST /oauth HTTP/1.1
Accept: application/json
Content-Type: application/json

{
    "grant_type": "password",
    "username": "testuser",
    "password": "testpass",
    "client_id": "testclient2",
    "client_secret": "test"
}
```