# Übung 09

Eine Applikation per "template" installieren, Dateien aktualisieren

## Details

In dieser Übung werden mehrere PHP-Applikationen auf den Webserver kopiert. Dabei wird eine Datei konfiguriert - Variablen in der Datei werden ersetzt.

Im Folgenden wollen wir

* das template-Modul nutzen, um Dateien auf hosts zu kopieren
* Dateien in den Templates werden ersetzt
* das debug-Modul nutzen, um Ausgaben zu erzeugen

## Durchführung

```
ansible-playbook site.yml
```

## gewünschtes Ergebnis

```

PLAY [Installieren mehrerer PHP-Anwendungen] ***********************************

TASK [setup] *******************************************************************
ok: [host2]

TASK [Copy application] ********************************************************
ok: [host2] => (item=phpinfo.php)
ok: [host2] => (item=database.php)
ok: [host2] => (item=index.php)

TASK [debug] *******************************************************************
ok: [host2] => {
    "msg": "Die URL lautet: http://18.194.123.198/index.php"
}

PLAY RECAP *********************************************************************
host2                      : ok=3    changed=1    unreachable=0    failed=0   

```
