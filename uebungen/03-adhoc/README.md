# Übung 03

Ad-Hoc Befehle auf der Maschine ausführen

## Details

Manche Befehle muss man nur einmal auf einem Host ausführen, und benötigt dafür kein Playbook. Zu diesem Zweck werden wir in dieser Übung die folgenden Schritte durchführen:

* Uptime des Hosts herausfinden
* Hostname des Hosts herausfinden
* Betriebssystem des Hosts (Linux) herausfinden
* NTP installieren (mit Module shell und apt-get)
* NTP deinstallieren (mit Modul apt)

## Durchführung

```
ansible all -m shell -a "uptime"
ansible all -m shell -a "hostname"
ansible all -m shell -a "lsb_release -a"
ansible all -b -m shell -a "apt-get install -y ntp"
ansible all -b -m apt -a "name=ntp state=absent"
```

## gewünschtes Ergebnis

Abhängig vom jeweiligen Befehl sollte das Ergebnis in etwa wie folgt aussehen:

* uptime
```
host1 | SUCCESS | rc=0 >>
 10:19:07 up 13 min,  1 user,  load average: 0.00, 0.02, 0.03

host2 | SUCCESS | rc=0 >>
 10:19:07 up 13 min,  1 user,  load average: 0.00, 0.02, 0.04

```

* hostname
```
host1 | SUCCESS | rc=0 >>
ip-172-31-42-58

host2 | SUCCESS | rc=0 >>
ip-172-31-41-18


```

* lsb_release -a
```
host1 | SUCCESS | rc=0 >>
Distributor ID:	Ubuntu
Description:	Ubuntu 16.04.3 LTS
Release:	16.04
Codename:	xenialNo LSB modules are available.

host2 | SUCCESS | rc=0 >>
Distributor ID:	Ubuntu
Description:	Ubuntu 16.04.3 LTS
Release:	16.04
Codename:	xenialNo LSB modules are available.

```

* NTP installieren
```
host2 | SUCCESS | rc=0 >>
Reading package lists...
Building dependency tree...
Reading state information...
The following additional packages will be installed:
  libopts25
Suggested packages:
  ntp-doc
The following NEW packages will be installed:
  libopts25 ntp
0 upgraded, 2 newly installed, 0 to remove and 108 not upgraded.
Need to get 576 kB of archives.
After this operation, 1792 kB of additional disk space will be used.
Get:1 http://eu-central-1.ec2.archive.ubuntu.com/ubuntu xenial/main amd64 libopts25 amd64 1:5.18.7-3 [57.8 kB]
Get:2 http://eu-central-1.ec2.archive.ubuntu.com/ubuntu xenial-updates/main amd64 ntp amd64 1:4.2.8p4+dfsg-3ubuntu5.7 [518 kB]
Fetched 576 kB in 0s (32.7 MB/s)
Selecting previously unselected package libopts25:amd64.
(Reading database ... 51900 files and directories currently installed.)
Preparing to unpack .../libopts25_1%3a5.18.7-3_amd64.deb ...
Unpacking libopts25:amd64 (1:5.18.7-3) ...
Selecting previously unselected package ntp.
Preparing to unpack .../ntp_1%3a4.2.8p4+dfsg-3ubuntu5.7_amd64.deb ...
Unpacking ntp (1:4.2.8p4+dfsg-3ubuntu5.7) ...
Processing triggers for libc-bin (2.23-0ubuntu9) ...
Processing triggers for man-db (2.7.5-1) ...
Processing triggers for systemd (229-4ubuntu20) ...
Processing triggers for ureadahead (0.100.0-19) ...
Setting up libopts25:amd64 (1:5.18.7-3) ...
Setting up ntp (1:4.2.8p4+dfsg-3ubuntu5.7) ...
Processing triggers for libc-bin (2.23-0ubuntu9) ...
Processing triggers for systemd (229-4ubuntu20) ...
Processing triggers for ureadahead (0.100.0-19) ...

host1 | SUCCESS | rc=0 >>
Reading package lists...
Building dependency tree...
Reading state information...
The following additional packages will be installed:
  libopts25
Suggested packages:
  ntp-doc
The following NEW packages will be installed:
  libopts25 ntp
0 upgraded, 2 newly installed, 0 to remove and 108 not upgraded.
Need to get 576 kB of archives.
After this operation, 1792 kB of additional disk space will be used.
Get:1 http://eu-central-1.ec2.archive.ubuntu.com/ubuntu xenial/main amd64 libopts25 amd64 1:5.18.7-3 [57.8 kB]
Get:2 http://eu-central-1.ec2.archive.ubuntu.com/ubuntu xenial-updates/main amd64 ntp amd64 1:4.2.8p4+dfsg-3ubuntu5.7 [518 kB]
Fetched 576 kB in 0s (29.2 MB/s)
Selecting previously unselected package libopts25:amd64.
(Reading database ... 51900 files and directories currently installed.)
Preparing to unpack .../libopts25_1%3a5.18.7-3_amd64.deb ...
Unpacking libopts25:amd64 (1:5.18.7-3) ...
Selecting previously unselected package ntp.
Preparing to unpack .../ntp_1%3a4.2.8p4+dfsg-3ubuntu5.7_amd64.deb ...
Unpacking ntp (1:4.2.8p4+dfsg-3ubuntu5.7) ...
Processing triggers for libc-bin (2.23-0ubuntu9) ...
Processing triggers for man-db (2.7.5-1) ...
Processing triggers for systemd (229-4ubuntu20) ...
Processing triggers for ureadahead (0.100.0-19) ...
Setting up libopts25:amd64 (1:5.18.7-3) ...
Setting up ntp (1:4.2.8p4+dfsg-3ubuntu5.7) ...
Processing triggers for libc-bin (2.23-0ubuntu9) ...
Processing triggers for systemd (229-4ubuntu20) ...
Processing triggers for ureadahead (0.100.0-19) ...

```

* NTP wieder deinstallieren
```
host1 | SUCCESS => {
    "changed": true, 
    "stderr": "", 
    "stdout": "Reading package lists...\nBuilding dependency tree...\nReading state information...\nThe following package was automatically installed and is no longer required:\n  libopts25\nUse 'sudo apt autoremove' to remove it.\nThe following packages will be REMOVED:\n  ntp\n0 upgraded, 0 newly installed, 1 to remove and 108 not upgraded.\nAfter this operation, 1621 kB disk space will be freed.\n(Reading database ... \r(Reading database ... 5%\r(Reading database ... 10%\r(Reading database ... 15%\r(Reading database ... 20%\r(Reading database ... 25%\r(Reading database ... 30%\r(Reading database ... 35%\r(Reading database ... 40%\r(Reading database ... 45%\r(Reading database ... 50%\r(Reading database ... 55%\r(Reading database ... 60%\r(Reading database ... 65%\r(Reading database ... 70%\r(Reading database ... 75%\r(Reading database ... 80%\r(Reading database ... 85%\r(Reading database ... 90%\r(Reading database ... 95%\r(Reading database ... 100%\r(Reading database ... 51962 files and directories currently installed.)\r\nRemoving ntp (1:4.2.8p4+dfsg-3ubuntu5.7) ...\r\nProcessing triggers for man-db (2.7.5-1) ...\r\n", 
    "stdout_lines": [
        "Reading package lists...", 
        "Building dependency tree...", 
        "Reading state information...", 
        "The following package was automatically installed and is no longer required:", 
        "  libopts25", 
        "Use 'sudo apt autoremove' to remove it.", 
        "The following packages will be REMOVED:", 
        "  ntp", 
        "0 upgraded, 0 newly installed, 1 to remove and 108 not upgraded.", 
        "After this operation, 1621 kB disk space will be freed.", 
        "(Reading database ... ", 
        "(Reading database ... 5%", 
        "(Reading database ... 10%", 
        "(Reading database ... 15%", 
        "(Reading database ... 20%", 
        "(Reading database ... 25%", 
        "(Reading database ... 30%", 
        "(Reading database ... 35%", 
        "(Reading database ... 40%", 
        "(Reading database ... 45%", 
        "(Reading database ... 50%", 
        "(Reading database ... 55%", 
        "(Reading database ... 60%", 
        "(Reading database ... 65%", 
        "(Reading database ... 70%", 
        "(Reading database ... 75%", 
        "(Reading database ... 80%", 
        "(Reading database ... 85%", 
        "(Reading database ... 90%", 
        "(Reading database ... 95%", 
        "(Reading database ... 100%", 
        "(Reading database ... 51962 files and directories currently installed.)", 
        "Removing ntp (1:4.2.8p4+dfsg-3ubuntu5.7) ...", 
        "Processing triggers for man-db (2.7.5-1) ..."
    ]
}
host2 | SUCCESS => {
    "changed": true, 
    "stderr": "", 
    "stdout": "Reading package lists...\nBuilding dependency tree...\nReading state information...\nThe following package was automatically installed and is no longer required:\n  libopts25\nUse 'sudo apt autoremove' to remove it.\nThe following packages will be REMOVED:\n  ntp\n0 upgraded, 0 newly installed, 1 to remove and 108 not upgraded.\nAfter this operation, 1621 kB disk space will be freed.\n(Reading database ... \r(Reading database ... 5%\r(Reading database ... 10%\r(Reading database ... 15%\r(Reading database ... 20%\r(Reading database ... 25%\r(Reading database ... 30%\r(Reading database ... 35%\r(Reading database ... 40%\r(Reading database ... 45%\r(Reading database ... 50%\r(Reading database ... 55%\r(Reading database ... 60%\r(Reading database ... 65%\r(Reading database ... 70%\r(Reading database ... 75%\r(Reading database ... 80%\r(Reading database ... 85%\r(Reading database ... 90%\r(Reading database ... 95%\r(Reading database ... 100%\r(Reading database ... 51962 files and directories currently installed.)\r\nRemoving ntp (1:4.2.8p4+dfsg-3ubuntu5.7) ...\r\nProcessing triggers for man-db (2.7.5-1) ...\r\n", 
    "stdout_lines": [
        "Reading package lists...", 
        "Building dependency tree...", 
        "Reading state information...", 
        "The following package was automatically installed and is no longer required:", 
        "  libopts25", 
        "Use 'sudo apt autoremove' to remove it.", 
        "The following packages will be REMOVED:", 
        "  ntp", 
        "0 upgraded, 0 newly installed, 1 to remove and 108 not upgraded.", 
        "After this operation, 1621 kB disk space will be freed.", 
        "(Reading database ... ", 
        "(Reading database ... 5%", 
        "(Reading database ... 10%", 
        "(Reading database ... 15%", 
        "(Reading database ... 20%", 
        "(Reading database ... 25%", 
        "(Reading database ... 30%", 
        "(Reading database ... 35%", 
        "(Reading database ... 40%", 
        "(Reading database ... 45%", 
        "(Reading database ... 50%", 
        "(Reading database ... 55%", 
        "(Reading database ... 60%", 
        "(Reading database ... 65%", 
        "(Reading database ... 70%", 
        "(Reading database ... 75%", 
        "(Reading database ... 80%", 
        "(Reading database ... 85%", 
        "(Reading database ... 90%", 
        "(Reading database ... 95%", 
        "(Reading database ... 100%", 
        "(Reading database ... 51962 files and directories currently installed.)", 
        "Removing ntp (1:4.2.8p4+dfsg-3ubuntu5.7) ...", 
        "Processing triggers for man-db (2.7.5-1) ..."
    ]
}

```
