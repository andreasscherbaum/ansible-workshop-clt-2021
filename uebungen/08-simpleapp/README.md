# Übung 08

Eine Applikation installieren

## Details

In dieser Übung wird eine (sehr) einfache PHP-Applikation auf den Webserver kopiert.

Im Folgenden wollen wir

* das copy-Modul nutzen, um Dateien auf hosts zu kopieren
* das debug-Modul nutzen, um Ausgaben zu erzeugen

## Durchführung

```
ansible-playbook site.yml
```

## gewünschtes Ergebnis

```

PLAY [Installieren einer PHP-Anwendung] ****************************************

TASK [setup] *******************************************************************
ok: [host2]

TASK [Copy application] ********************************************************
changed: [host2]

TASK [debug] *******************************************************************
ok: [host2] => {
    "msg": "Die URL lautet: http://35.158.111.38/phpinfo.php"
}

PLAY RECAP *********************************************************************
host2                      : ok=3    changed=1    unreachable=0    failed=0   

```
