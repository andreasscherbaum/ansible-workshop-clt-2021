# Übung 04

Ein Playbook verstehen und ausführen

## Details

Playbooks sind die Beschreibung des Sollzustandes, den die Konfiguration einer Maschine haben soll. Im Folgenden wollen wir

* die Hostnamen auf all unseren Maschinen setzen
* NTP auf all unseren Maschinen installieren und
* Sicherstellen, dass der NTP daemon läuft

Führen wir das Playbook ein zweites Mal aus (der Sollzustand besteht also bereits), wird die Ausgabe von Ansible zeigen, dass keine weiteren Änderungen durchgeführt wurden (Idempotenz).

## Durchführung

```
ansible-playbook site.yml

ansible-playbook site.yml
```

## gewünschtes Ergebnis

* erstes Mal
```

PLAY [Set hostnames] ***********************************************************

TASK [setup] *******************************************************************
ok: [host1]
ok: [host2]

TASK [Set hostname] ************************************************************
changed: [host2]
changed: [host1]

PLAY [Install NTP] *************************************************************

TASK [setup] *******************************************************************
ok: [host1]
ok: [host2]

TASK [Install NTP package] *****************************************************
changed: [host2]
changed: [host1]

TASK [Ensure ntp is running] ***************************************************
ok: [host2]
ok: [host1]

PLAY RECAP *********************************************************************
host1                      : ok=5    changed=2    unreachable=0    failed=0   
host2                      : ok=5    changed=2    unreachable=0    failed=0   

```


* zweites Mal
```

PLAY [Set hostnames] ***********************************************************

TASK [setup] *******************************************************************
ok: [host1]
ok: [host2]

TASK [Set hostname] ************************************************************
ok: [host2]
ok: [host1]

PLAY [Install NTP] *************************************************************

TASK [setup] *******************************************************************
ok: [host1]
ok: [host2]

TASK [Install NTP package] *****************************************************
ok: [host1]
ok: [host2]

TASK [Ensure ntp is running] ***************************************************
ok: [host2]
ok: [host1]

PLAY RECAP *********************************************************************
host1                      : ok=5    changed=0    unreachable=0    failed=0   
host2                      : ok=5    changed=0    unreachable=0    failed=0   

```
