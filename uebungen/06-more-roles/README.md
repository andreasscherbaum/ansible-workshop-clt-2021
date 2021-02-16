# Übung 06

Rollen verstehen und anwenden

## Details

In dieser Übung verwenden wir verschiedene Rollen um bestimmte Pakete zu installieren. Die Rollen werden jetzt nicht mehr auf allen Maschinen angewandt, sondern es wird eine Unterscheidung mittels der Gruppen im Inventory getroffen.

Im Folgenden wollen wir

* Apache mittels einer Rolle installieren
* PostgreSQL Datenbank mittels einer Rolle installieren

## Durchführung

```
ansible-playbook site.yml
```

## gewünschtes Ergebnis

```

PLAY [Regeln auf allen Webserver Maschinen durchsetzen] ************************

TASK [setup] *******************************************************************
ok: [host2]

TASK [apache : Install Apache2 + PHP packages] *********************************
changed: [host2] => (item=[u'apache2', u'apache2-utils', u'libapache2-mod-php', u'php', u'php-dev', u'php-pgsql', u'php-pear', u'php-gettext', u'postgresql-client-common', u'postgresql-client'])

TASK [apache : Ensure Apache2 is running] **************************************
ok: [host2]

PLAY [Regeln auf allen Datenbank Maschinen durchsetzen] ************************

TASK [Gathering Facts] *********************************************************
ok: [host1]

TASK [postgresql : Add apt-key for PostgreSQL repository] **********************
ok: [host1]

TASK [postgresql : Read lsb_release version] ***********************************
ok: [host1]

TASK [postgresql : PostgreSQL APT repository] **********************************
ok: [host1]

TASK [postgresql : Install PostgreSQL packages] ********************************
changed: [host1] => (item=postgresql-9.6)
ok: [host1] => (item=postgresql-client-9.6)
ok: [host1] => (item=postgresql-contrib-9.6)
changed: [host1] => (item=python-psycopg2)

TASK [postgresql : Ensure PostgreSQL is running] *******************************
ok: [host1]

PLAY RECAP *********************************************************************
host1                      : ok=3    changed=1    unreachable=0    failed=0   
host2                      : ok=3    changed=1    unreachable=0    failed=0 

```
