## az e-magyar.hu frissítése

Tudnivalók az e-magyar.hu frissítése elõtt:

- A változtatásokat érdemes elõször az oldal **teszt** verzióján letesztelni, ami a `/var/www/infra2test` könyvtárban található. Ez egy teszt deploy az `e-magyar.hu` git repóból (aminek a klónja itt van: `/home/gerocs/e-magyar.hu`).
- A teszt verzió által használt `Lang_Hungarian` plugin és a web service (`gate-server`) fájljai a `/home/gerocs/test/hunlp-GATE` könyvtárban vannak. Ez a `hunlp-GATE` git repó klónja.
- FONTOS: az éles és a teszt verzió egy dologban különbözik: különbözõ portokra küldik a kéréseket, az éles a 8000-re, a teszt a 8080-ra; ezt a beállítást a `gate-server.props` fájl tartalmazza; ennek így kell maradnia, nem kell committolni. Sõt, ezért kell az alábbi `git stash`, hogy a 8080 megmaradjon a tesztverzióban, ott indítsuk a szervert, **így nem lövi ki az éles szervert**.

- Tehát, ha GATE-es fájlok változtak:

`cd /home/gerocs/test/hunlp-GATE; git stash; git pull`
 
- Ha a modellek is változtak:

`./complete.sh`

- Ha a weboldal is változott:

`cd /home/gerocs/e-magyar.hu ; git pull`

ellenõrizni, hogy a `deploy/testconfig` fájlok megfelelõek,
azaz csakis a szükséges dolgokban térnek el az `application/config`-ban
található megfelelõ fájloktól.

`cd deploy ; ./deploy.sh test`

a deployban a `download`, `temp` és `parser_logs` kvtárnak rekurzíve
a `www-data` useré kell lennie csoportilag!
 
- Ezután újra kell indítani a web service-t:

ellenõrizni, hogy a `gate-server.props`-ban a port 8080!

```
cd /home/gerocs/test/hunlp-GATE
export GATE_HOME=/opt/GATE_Developer_8.1
./gate-server.sh &
```

végül tesztelés:

`http://oliphant.nytud.hu/infra2test`

-----

Ha minden OK, akkor ugyanezt elvégezni az **éles** rendszeren is.

```
cd /opt
rm -rf hunlp-GATE.bak infra2.bak
cp -rp hunlp-GATE hunlp-GATE.bak
cp -rp /var/www/infra2 infra2.bak
```

```
cd /opt/hunlp-GATE; git pull
./complete.sh
```

itt érdemes `diff`-elni: `cd /opt ; diff -r hunlp-GATE.bak hunlp-GATE` 

a deploy-hoz szükséges írási jog a `prod` szerinti kvtárba

```
cd /home/gerocs/e-magyar.hu ; git pull
cd deploy ; ./deploy.sh prod
```

a deployban a `download`, `temp` és `parser_logs` kvtárnak rekurzíve
a `www-data` useré kell lennie csoportilag,
a `parser_logs/logs.txt`-nek szintén, `664` permission-nel.
 
ellenõrizni, hogy a `gate-server.props`-ban a port 8000!

itt érdemes `diff`-elni: `diff -r /opt/infra2.bak /var/www/infra2`

```
cd /opt/hunlp-GATE
export GATE_HOME=/opt/GATE_Developer_8.1
./gate-server.sh &
```

ellenõrzés:

`http://e-magyar.hu`

-----

| mód   | dir                       | repó clone                         | port |
|-------|---------------------------|------------------------------------|------|
| teszt | `oli:/var/www/infra2test` | `oli:/home/gerocs/test/hunlp-GATE` | 8080 |
| éles  | `oli:/var/www/infra2`     | `oli:/opt/hunlp-GATE`              | 8000 |

