# Übung 07

Webserver und Datenbank konfigurieren, Dienste neu starten

## Details

Diese Übung konfiguriert den Webserver (genauer gesagt das PHP) und die Datenbank, und startet bei Änderungen die Dienste mittels eines Triggers neu.

Im Folgenden wollen wir

* Das Error-Logging und weitere Einstellungen in PHP anpassen
* Die Datenbank auf allen Netzwerkgeräten aktivieren
* Einen neuen Datenbanknutzer erstellen
* Eine neue Datenbank erstellen

Das Passwort für den Datenbanknutzer wird dynamisch erstellt, und in einer Datei _db-account-test.txt_ im Hauptverzeichnis gespeichert.


## Durchführung

```
ansible-playbook site.yml
```

## gewünschtes Ergebnis

```

PLAY [Regeln auf allen Webserver Maschinen durchsetzen] ************************

TASK [setup] *******************************************************************
ok: [host2]

TASK [Configure php.ini] *******************************************************
changed: [host2] => (item={u'regexp': u'^short_open_tag', u'line': u'short_open_tag = On', u'state': u'present'})
changed: [host2] => (item={u'regexp': u'^error_reporting', u'line': u'error_reporting = E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_USER_DEPRECATED & ~E_STRICT', u'state': u'present'})
changed: [host2] => (item={u'regexp': u'^upload_max_filesize', u'line': u'upload_max_filesize = 64M', u'state': u'present'})
changed: [host2] => (item={u'regexp': u'^allow_url_fopen', u'line': u'allow_url_fopen = Off', u'state': u'present'})
changed: [host2] => (item={u'regexp': u'^;?date.timezone', u'line': u'date.timezone = "Europe/Berlin"', u'state': u'present'})

RUNNING HANDLER [restart apache] ***********************************************
changed: [host2]

PLAY [Regeln auf allen Datenbank Maschinen durchsetzen] ************************

TASK [setup] *******************************************************************
ok: [host1]

TASK [Configure postgresql.conf] ***********************************************
changed: [host1] => (item={u'regexp': u'^listen_addresses', u'line': u"listen_addresses = '*'", u'state': u'present'})

TASK [Configure pg_hba.conf] ***************************************************
changed: [host1] => (item={u'line': u'host  test  test  0/0  md5', u'state': u'present'})

TASK [user "test"] *************************************************************
changed: [host1]

TASK [database "test"] *********************************************************
changed: [host1]

RUNNING HANDLER [restart postgresql] *******************************************
changed: [host1]

PLAY RECAP *********************************************************************
host1                      : ok=6    changed=5    unreachable=0    failed=0   
host2                      : ok=3    changed=2    unreachable=0    failed=0 

```
