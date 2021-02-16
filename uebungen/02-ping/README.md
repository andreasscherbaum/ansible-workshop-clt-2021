# Übung 02

Erreichbarkeit der Maschine überprüfen

## Durchführung

```
ansible all -m ping
```

## gewünschtes Ergebnis

```
host2 | SUCCESS => {
    "changed": false, 
    "ping": "pong"
}
host1 | SUCCESS => {
    "changed": false, 
    "ping": "pong"
}
```
