# Übung 05

Rollen verstehen und anwenden

## Details

Rollen sind wiederverwendbare Bausteine, die auf die gesamte Landschaft oder Teile davon angewendet werden können. Sie beschreiben einen funktional abgegrenzten Sollzustand und können von Playbooks verwendet ("aufgerufen") werden.

Im Folgenden wollen wir

* die Hostnamen mit Hilfe einer Rolle setzen
* NTP mit Hilfe einer Rolle installieren und starten

## Durchführung

```
ansible-playbook site.yml
```

## gewünschtes Ergebnis

```

PLAY [Regeln auf allen Maschinen durchsetzen] **********************************

TASK [setup] *******************************************************************
ok: [host1]
ok: [host2]

TASK [hostname : Set hostname] *************************************************
ok: [host1]
ok: [host2]

TASK [ntp : Install NTP package] ***********************************************
ok: [host1]
ok: [host2]

TASK [ntp : Ensure ntp is running] *********************************************
ok: [host2]
ok: [host1]

PLAY RECAP *********************************************************************
host1                      : ok=4    changed=0    unreachable=0    failed=0   
host2                      : ok=4    changed=0    unreachable=0    failed=0   

```
