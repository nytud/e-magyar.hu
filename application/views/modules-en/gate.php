<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 text-justify">
        <h3>Mire jó? Mit csinál?</h3>
        <!--  -->
        Az e-magyar.hu Digitális Nyelvfeldolgozó Rendszer lényege, hogy
        az emberi intelligenciát igénylő szövegolvasási, szövegértési
        feladatnak egy jelentős szeletét automatikusan valósítja meg:
        a szövegben rejlő információkat
        automatikus módon fedi fel, teszi explicitté.
        <br style="margin-bottom: 0.65em"/>
        Egy tetszőleges szövegrészt feldolgozva megtudjuk
        az egyes szavak szófaját, szótövét, alaktani (morfológiai) elemzését,
        a mondatok kétféle mondattani (szintaktikai) elemzését,
        megkapjuk a főnévi csoportokat és a tulajdonneveket.
        <br style="margin-bottom: 0.65em"/>
        A rendszer egybegyűjti, egy egységes láncba integrálja
        és közzéteszi az elemzési lépéseket megvalósító
        számítógépes magyar nyelvfeldolgozó eszközöket.
        Ez által elérhetővé, közvetlenül felhasználhatóvá
        válnak ezek az eszközök
        a különféle igényű felhasználói körök számára.
        <!--  -->
        Az egyes eszközök működésének leírása az adott eszköznél található.
        <!--  A konkrét eszközök: <span style="font-weight: bold; color: grey">XXX</span> -->
        <!--  melyik mit csinál. &ndash; vagy ezt az egyes eszközöknél lássuk meg? <span style="font-weight: bold; color: grey">XXX</span> -->
        <br style="margin-bottom: 0.65em"/>
        Az eszközök integrálása
        a <a href="https://gate.ac.uk">GATE</a>
        nyelvfeldolgozó keretrendszerben valósult meg.
        Az eszközkészlet bővíthető,
        a rendszer nyitott újabb eszközök integrálására.
        <br style="margin-bottom: 0.65em"/>
        A különböző felhasználók igényei szerint
        3 módon lehet hozzáférni a rendszerhez:
        <br style="margin-bottom: 0.65em"/>
        <ol>
            <li>A legszélesebb kör számára lehetőség a honlap használata,
                mely a teljes elemzési láncot lefuttatja korlátozott szövegmennyiségen,
                az eredményt megjeleníti és letölthetővé is teszi.
            <li>A GATE rendszer <em>GATE Developer</em> nevű grafikus felhasználói felületén
                is használhatjuk a láncot, és az egyes modulokat.
                Itt többféle bemeneti szövegformátumot kezelhetünk,
                rugalmasan paraméterezhetjük az elemzőeszközöket,
                és nagyobb méretű szövegeket is feldolgozhatunk.
                Ezt ajánljuk kutatási, nyelvelemzési feladatokhoz.
                <a href="https://github.com/dlt-rilmta/hunlp-GATE#installing-under-gate-developer">Telepítés, információk</a>
            <li>A GATE rendszer <em>GATE Embedded</em> technológiája révén
                beépíthetjük az eszközöket nagyobb szoftverrendszerekbe,
                vagy használhatjuk őket önállóan.
                Ilyen felhasználásra ajánljuk a <em>gate-server</em> alkalmazást,
                mely hatékonyan valósítja meg az eszközök inicializálását,
                és kliens-szerver architektúrájú üzemeltetést tesz lehetővé.
                <a href="https://github.com/dlt-rilmta/hunlp-GATE#using-or-embedding-the-lang_hungarian-plugin-as-a-client-server-system-for-power-users">Telepítés, információk</a>
        </ol>
        <br style="margin-bottom: 0.65em"/>
        <h3>Mi a bemenet?</h3>
        <!--  -->
        A bemenet tetszőleges, magyar nyelvű, egyszerű szöveg.
        <!--  <span style="font-weight: bold; color: grey">XXX</span> esetleg a 3 felh mód szerint szálazni... -->
        <br style="margin-bottom: 0.65em"/>
        <h3>Mi a kimenet?</h3>
        <!--  -->
        A kimenet a szöveg, megjelölve benne az összes információ,
        amit az elemzőeszközök hozzáadtak.
        A kimeneti fájl GATE XML formátumú,
        a honlapról az elemzett anyag .tsv-ben is letölthető.
        <br style="margin-bottom: 0.65em"/>
        <h3>Példa.</h3>
        <!--  -->
        <!--  <span style="font-weight: bold; color: grey">XXX</span> itt legyen egy jó példamondat, ami mindent bemutat! -->
        <!--  <span style="font-weight: bold; color: grey">XXX</span> rövid szöveg kell -->
        <!--  <span style="font-weight: bold; color: grey">XXX</span> ezeket kell illusztrálni: -->
        <!--   - stb. -->
        <!--   - (leg)érdekes(ebb) morfo szóalak... (bokrok / terem / összetett szó...) -->
        <!--   - elváló igekötő! (!) <span style="font-weight: bold; color: grey">XXX</span> -->
        <!--   - vmi jó dep elemzés &ndash; bár elég lehet az igekötő... -->
        <!--   - konst: példa-konstituensek -->
        <!--   - NP-k -->
        <!--   - névelemek -->
        <!--  -->
        <!--  Csaknem rémülten észlelte , hogy ezen négy esztendő alatt az öregasszonyról őrzött emlékei pontosan úgy álltak össze , mint amikor anyagot gyűjtött Van Gogh , Cicero stb. életrajzának megírásához .  -->
        <!--  -->
        <!--  Tanított Csurgón és Siófokon , miközben beleásta magát a néprajzkutatásba : több ezer méter film- és hangfelvételt készített , megalapította a Balaton Néptánc Együttest stb. Bartók , Kodály és Vikár nyomdokaiban lépkedve Somogy folklórjának legjobb ismerőjévé vált , óriási örökséget hagyott az utókorra . -->
        <!--  -->
        <!--  ... ezek kicsit túl nehéznek tűnnek :) -->
        <!--  -->
        <!--  Támogatta a haladó eszméket , mecénása volt a kultúrának , barátságban állt Petőfivel és Jókaival stb. -->
        <!--  -->
        <!--  ... mecénása volt a kultúrának <- biztos bele lehet kötni a szintaktikai izébe, + á nem tudom, hogy jó-e, hgy leválasztja a végén a pontot (valszeg jó). :) -->
        <!--  -->
        <!--  De pl. Kovács István név esetén fennállhat, mert több Kovács István is létezik. -->
        <!--  -->
        <!--  <span style="font-weight: bold; color: grey">XXX</span> na végül a Jókaisból csináltam ezt, ami kb. minden szempontnak megfelel: -->
        <em>Bár külföldre menekülhetett volna, nem tette meg. Támogatta a haladó eszméket, barátságban állt pl. Jókai Mórral is.</em> 
        <br style="margin-bottom: 0.65em"/>
        Az e-magyar.hu a szöveg automatikus feldolgozása során
        először megállapítja a szavak &ndash; ún. <em>tokenek</em> &ndash; és mondatok határát. 
        A példában a <em>Támogatta</em> új mondatot kezd, a <em>Jókai</em> viszont nem,
        bár itt is pont után nagybetűs szó következik,
        ami tipikusan mondathatárra utal.
        Külön tokenként kezeli az írásjeleket, kivéve persze a rövidítéseknél,
        ahol a záró pont a rövidítés részét képezi,
        így a <em>pl.</em> egy egység lesz, az <em>is</em> és az azt követő pont viszont kettő.
        <br style="margin-bottom: 0.65em"/>
        Megkapjuk az egyes szavakról az alaktani információkat:
        a <em>menekülhetett</em> szóalak például múlt idejű ige, mely
        a <em>menekül</em> szótőből, a <em>het</em> képzőből és
        az <em>ett</em> igeragból épül fel.
        <!--  -->
        A magyar szóalakok jelentős részének, akár 30%-ának
        több alaktani elemzése van.
        A rendszer a szövegkönyezet alapján automatikusan
        dönt ilyen esetekben, kiválasztja a helyes elemzést,
        ez az ún. <em>egyértelműsítési</em> lépés.
        A többértelműség sokszor nem olyan nyilvánvaló,
        mint a <em>várnak</em> vagy a <em>terem</em> esetében,
        hanem rejtetten jelenik meg:
        fontos, hogy példánkban a <em>haladó</em> melléknévként elemződjön,
        ne pedig összetett főnévként,
        ami valamiféle vízi élőlényekre vonatkozó járulékot jelentene.
        <br style="margin-bottom: 0.65em"/>
        Az egyes mondatok mondattani elemzése kétféleképpen is megtörténik.
        Megkapjuk az ún. <em>függőségi elemzést,</em> ahol az egyes szavak egymáshoz
        való kapcsolatai jelennek meg, mint például, hogy a <em>barátságban</em> 
        <!-- és a <em>Jókai Mórral</em> is egyaránt &ndash; hehe csak az hibás! <span style="font-weight: bold; color: grey">XXX</span> :) -->
        az <em>állt</em> igéhez kapcsolódó határozó.
        Az <em>összetevős elemzés</em> pedig a mondat egységeit adja ki:
        a második mondat két nagyobb egységből áll,
        melyek felsorolás viszonyban vannak egymással.
        A függőségi elemzés alapján az ige-igekötő kapcsolatok
        is rendelkezésre állnak,
        erre építve egy külön segédmodul megjelöli az elváló igekötőket,
        és a hozzájuk tartozó igéket,
        példánkban a <em>tette</em> és a <em>meg</em> kapcsolatát.
        A főnévi csoportokat &ndash; pl. <em>a haladó eszméket</em>  &ndash; is
        azonosítja egy erre a célra készített modul.
        <br style="margin-bottom: 0.65em"/>
        Végül a lánc utolsó tagja megjelöli
        a tulajdonnevek fontos alosztályait, a neveket, helyeket és intézményeket,
        példánkban a <em>Jókai Mórral</em> nevet.

        <!-- == (szakmai rész) -->
        <!--  -->
        <h3>Hol található? (bináris/forrás)</h3>
        <!--  -->
        A magyar nyelvfeldolgozó eszközöket tartalmazó
        GATE <strong>Lang_Hungarian</strong> plugin a
        <a href="https://github.com/dlt-rilmta/hunlp-GATE">https://github.com/dlt-rilmta/hunlp-GATE</a>
        github repozitóriumban érhető el a <em>gate-server</em> alkalmazással együtt.
        <br style="margin-bottom: 0.65em"/>
        <h3>Milyen nyelven írt?</h3>
        <!--  -->
        Elsősorban java. 
        A java nyelven írt GATE rendszerbe a java eszközöket
        közvetlenül lehetett integrálni,
        az egyéb nyelveken (python, C++) írt modulok
        pedig a binárisok vagy saját interpreterük használatával épülnek be.  
        <br style="margin-bottom: 0.65em"/>
        <h3>Input/output adatformátum?</h3>
        <!--  -->
        <em>Bemenet:</em> a honlap és a <em>gate-server</em> esetében egyszerű szöveg (txt).
        A <em>GATE Developer</em>  esetében viszont kényelmesen
        kezelhetönk számos formátumot
        (txt, html, xml, doc, xls, docx, xlsx...),
        belőlük a rendszer automatikusan kinyeri a szöveges tartalmat.
        HTML illetve XML esetén az eredeti markup megőrződik,
        a hozzáadott információk az eredeti markuptól függetlenül kezelődik.
        <br style="margin-bottom: 0.65em"/>
        <em>Kimenet:</em> GATE XML formátum.
        A honlapról az elemzett anyag .tsv-ben is letölthető.
        <br style="margin-bottom: 0.65em"/>
        <h3>Hogyan futtatható?</h3>
        <!--  -->
        <a href="https://github.com/dlt-rilmta/hunlp-GATE#installing-under-gate-developer">Telepítés, információk</a>
        a <em>GATE Developer</em> -hez.
        <a href="https://github.com/dlt-rilmta/hunlp-GATE#using-or-embedding-the-lang_hungarian-plugin-as-a-client-server-system-for-power-users">Telepítés, információk</a>
        a <em>GATE Embedded</em> -hez.
    </div>
</section>