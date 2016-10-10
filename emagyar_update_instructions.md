## az e-magyar.hu frissítése

Tudnivalók az e-magyar.hu frissítése elõtt:

- A változtatásokat érdemes elõször az oldal **teszt** verzióján letesztelni, ami a `/var/www/infra2test` könyvtárban található. Ez az `e-magyar.hu` git repó klónja.
- A teszt verzió által használt `Lang_Hungarian` plugin és a web service (`gate-server`) fájljai a `/home/gerocs/test/hunlp-GATE` könyvtárban vannak. Ez a `hunlp-GATE` git repó klónja.
- FONTOS: az éles és a teszt verzió egy dologban különbözik: különbözõ portokra küldik a kéréseket, az éles a 8000-re, a teszt a 8080-ra; ezt a beállítást a `gate-server.props` fájl tartalmazza; ennek így kell maradnia, nem kell committolni

- Tehát, ha GATE-es fájlok változtak:

`cd /home/gerocs/test/hunlp-GATE; git stash; git pull`
 
- Ha a modellek is változtak:

`./complete.sh`

- Ha a weboldal is változott:

`cd /var/www/infra2test; git pull`
 
- Ezután újra kell indítani a web service-t:

```
cd /home/gerocs/test/hunlp-GATE;
export GATE_HOME=/home/joker/GATE_Developer_8.1;
./gate-server.sh &
```

végül tesztelés:

`http://oliphant.nytud.hu/infra2test`


Ha minden OK, akkor ugyanezt elvégezni az éles rendszeren is.

```
cd /home/gerocs/hunlp-GATE; git pull
./complete.sh
```

ellenõrizni, hogy a gate-server.props-ban a port 8000

`cd /var/www/infra2; git pull`

```
cd /home/gerocs/hunlp-GATE;
export GATE_HOME=/home/joker/GATE_Developer_8.1;
./gate-server.sh &
```

ellenõrzés:

`http://e-magyar.hu`

-----

| mód   | dir                       | repó clone        | port |
|-------|---------------------------|-------------------|------|
| teszt | `oli:/var/www/infra2test` | `test/hunlp-GATE` | 8080 |
| éles  | `oli:/var/www/infra2`     | `hunlp-GATE`      | 8000 |

