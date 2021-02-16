# ansible-workshop-clt-2021

Ansible Workshop für die Chemnitzer Linux-Tage 2021

## Inhalt

Dieses Repository enthält die Slides und Übungen für einen [Ansible](https://www.ansible.com/) Workshop während der Chemnitzer Linux-Tage 2021.


## Vortragende

* Jens Kubieziel (Spezialist für IT-Sicherheit und Datenschutzbeauftragter, [Octopi.Consulting](https://torservers.net/)) / [Homepage](https://kubieziel.de/)
* Andreas Scherbaum (Principal Software Engineer) / [Homepage](http://andreas.scherbaum.la/)
* Andreas Ufert (Senior Specialist, Zero.One.Data, DB Systel GmbH)


## Anmeldung

[Chemnitzer Linux-Tage 2021](https://chemnitzer.linux-tage.de/2021/de/programm/beitrag/125)

Hinweis: wir als Vortragende wissen nicht, wie viele Plätze im Workshop noch frei sind.


## Slides

[Slides: Server mit Ansible verwalten](https://github.com/andreasscherbaum/ansible-workshop-clt-2021/blob/master/slides/ansible-workshop.pdf)


## Vorkenntnisse

* Grundlagen in der Administration eines Linux-Systems sowie in der Benutzung von SSH
* Umgang mit einem Texteditor


## Voraussetzungen

* Laptop mit gängiger, aktueller Linux-Distribution (z.B. Ubuntu >= 18.04, Debian >= stretch)
* Installiertes Ansible >= 2.7
* Git
* SSH client


## Vorbereitungen

* Clone des Git Repos:
    ```console
    git clone https://github.com/andreasscherbaum/ansible-workshop-clt-2021
    ```
* Wechsel in das Repo:
    ```console
    cd ansible-workshop-clt-2021
    ```
* Speichern der fünf Dateien `ansible.cfg`, `inventory`, `connect-db.sh`, `connect-web.sh` und `key.pem` aus der Email mit den Zugangsdaten in das Verzeichnis `ansible-workshop-clt-2021`
* Anpassen der Zugriffsrechte für `key.pem`:
    ```console
    chmod 0600 key.pem
    ```
* Anpassen der Zugriffsrechte für `connect-db.sh` und `connect-web.sh`:
    ```console
    chmod 0700 connect-db.sh connect-web.sh
    ```
* Setzen der Umgebungsvariable `ANSIBLE_CONFIG`:
    ```console
    export ANSIBLE_CONFIG=$(pwd)
    ```

    
## Nach den Chemnitzer Linux-Tagen 2021

Die Übungen in diesem Workshop kann man auch unabhängig vom CLT 2021 in Chemnitz nutzen. Allerdings muss man dafür seine eigene Umgebung mit zwei Servern (zum Beispiel virtuellen Maschinen) aufsetzen. Auf beiden Maschinen wird Debian oder Ubuntu vorausgesetzt, außerdem muss der verwendete Unix-User "sudo"-Rechte haben. Folgende Dateien werden benötigt:


### `ansible.cfg`

Diese Datei wird im ausgecheckten Hauptverzeichnis abgelegt. Beispielinhalt:

```ini
[defaults]
inventory = $ANSIBLE_CONFIG/inventory
private_key_file = $ANSIBLE_CONFIG/key.pem
remote_user = ubuntu
host_key_checking = False
```

Der `remote_user` muss an den Nutzer angepasst werden, der sich später in die virtuellen Maschinen einloggen wird. Die Datei in `private_key_file` wird verwendet, um sich mit dem darin enthaltenen privaten Schlüssel auf den VMs anzumelden. Ist der Zugang bereits über ssh-keyless Login gewährleistet, kann diese Zeile entfernt werden.


### `inventory`

Diese Datei enthält Informationen über die virtuellen Maschinen. Diese Datei wird ebenfalls im ausgecheckten Verzeichnis abgelegt. Beispielinhalt:

```ini
[all]
host1 ansible_host=<IP VM 1>
host2 ansible_host=<IP VM 2>

[dbservers]
host1 ansible_host=<IP VM 1>

[webservers]
host2 ansible_host=<IP VM 2>
```


### `key.pm`

Diese Datei enthält den privaten Schlüssel, um sich auf den VMs anzumelden.
